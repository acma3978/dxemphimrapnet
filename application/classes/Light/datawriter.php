<?php defined('SYSPATH') or die('No direct script access.'); 
/**
 * Light Model Abstract
 * 
 * @package: 	Light
 * @author:		Phan Thanh Cong <chiplove.9xpro@gmail.com>
 * @version:	1.0
 * @release:	Aug 29, 2012
*/
abstract class Light_DataWriter {
	
	const INT 			= 'integer';
	const UINT 			= 'unsigned integer';
	const FLOAT			= 'float';
	const STRING 		= 'string';
	const BOOLEAN 		= 'boolean';
	const JSON			= 'json'; 			// call json_encode 
	const SERIALIZED	= 'serialized';  	// call serialize - set by array or serialized
	
	
	/**
	 * @var Light_DB
	*/
	protected $_db;
	
	public function __construct($name = NULL)
	{
		$this->_db = Light_DB::instance($name);
	}
	
	/**
	 * Return table name without prefix
	 * @return string
	*/
	abstract protected function _get_table_name();
	
	/**
	 * Returns array columns and data-type by key-value pairs
	 *
	 *	return array(
	 *		'col1' => self::INT,
	 *		'col2' => self::BOOLEAN,
	 *	);
	 *
	 * @return array
	*/
	abstract protected function _get_fields();
	
	/**
	 * Gets SQL condition to update the existing record.
	 * Ex: return 'user_id = ' . $this->quote($this->get_existing('user_id'));
	 *
	 * @return string
	*/
	abstract protected function _get_update_condition();	
	
	
	/**
	 * Prepares before save into database
	 * @return void
	*/
	abstract protected function _prepare_save();
	
	
	/**
	 * Array data (field => value) for saving to database
	 * @var array
	*/
	protected $_new_data = array();
	
	/**
	 * Array existing (field => value) if is seted
	 * @var array
	*/
	protected $_existing_data = array();
	
	/**
	 * Query result
	 * @var Kohana_Database_Results
	*/
	protected $_query = NULL;
			
	/**
	 * Caching model objects for the lifetime of the datawriter.
	 * @var array
	*/
	protected $_model_cache = array();
		
	/**
	 * Create new Light_DataWriter instance
	 *
	 * return Light_DataWriter
	*/	
	public static function create($class_name)
	{
		return new $class_name;
	}

	/**
	 * Array of errors while prepare execute
	 * @var array
	*/
	public $errors = array();
	
	/**
	 * Checking field is valid or invalid (not defined in $this->get_fields();
	 *
	 * @param string $field Field needed to checking 
	 * @param boolean $throw
	 * @return boolean
	 * @throws Light_Exception if $throw setted TRUE and $field is invalid
	*/
	public function valid_field($field, $throw = FALSE)
	{
		$valid = array_key_exists($field, $this->_get_fields());
		
		if($throw === TRUE AND $valid === FALSE)
		{
			throw new Light_Exception("Field '$field' is invalid in " . __METHOD__ . '.');
		}
		return $valid;
	}
	
	/**
	 * Gets data type of input field
	 *
	 * @param string $field
	 * @return boolean
	 * @throws Light_Exception if $throw setted TRUE and $field is invalid
	*/
	public function get_data_type($field)
	{
		$this->valid_field($field, TRUE);
		$fields = $this->_get_fields();
		
		return $fields[$field];
	}
	
	/**
	 * Set data for insert/updating  to database
	 *
	 * @param string $field
	 * @param mixed $value
	 * @param boolean $raw_value - if no, value will be filters before pushing to $_new_data
	 * @return Light_DataWriter object
	 * @throws Light_Exception if $field is invalid
	*/
	public function set($field, $value, $raw_value = FALSE)
	{
		if($this->valid_field($field, TRUE))
		{
			if($raw_value === TRUE)
			{
				$value = DB::expr($value);
			}
			else
			{
				if(method_exists($this, $func = 'filter_' . $field))
				{
					$value = $this->$func($value);
				}
				$value = $this->_filter($value, $this->get_data_type($field));
			}
			$this->_new_data[$field] = $value;
		}
		return $this;
	}
	
	/**
	 * Set exsting data by (name, value) or by array name-value pairs if $field is an array
	 *
	 * 
	 * @param string|array
	 * @param mixed
	 * @return Light_DataWriter object
	 * @throws Light_Exception if set by name, name (2 args) and name is invalid field
	*/
	public function set_existing($field, $value = NULL)
	{
		if( is_array($field))
		{
			foreach($field as $key => $value)
			{
				if($this->valid_field($key, FALSE))
				{
					$this->_existing_data[$key] = $value;
				}
			}
		}
		else
		{
			if($this->valid_field($field, TRUE))
			{
				$this->_existing_data[$field] = $value;
			}
		}
		return $this;
	}
	
	
	/**
	 * Helper method to bulk set values from an array.
	 *
	 * @param array Key-value pairs of fields and values.
	 * @return Light_DataWriter object
	*/
	public function bulk_set(array $data)
	{
		foreach($data AS $key => $value)
		{
			$this->set($key, $value);
		}
		return $this;
	}
	
	
	/**
	 * Un set data of field
	 *
	 * @param string $field
	 * @return Light_DataWriter object
	*/
	public function remove($field)
	{
		if($this->get_mew($field) !== NULL)
		{
			unset($this->_new_data[$field]);
		}
		return $this;
	}
	
	/**
	 * Filter common
	 * 
	 * @param mixed - data to clean
	 * @param mixed - type of $data 
	 * @return mixed
	 * @throws Light_Exception if $data_type is not equal any constant of Light_DataWriter
	*/
	protected function _filter($data, $data_type)
	{
		switch($data_type)
		{
			case self::INT:
				return intval($data);
			
			case self::UINT:
				return  max(0, intval($data));
				
			case self::STRING:
				return trim(strval($data)); // trim nbsp
				
			case self::FLOAT:
				return floatval($data);
				
			case self::BOOLEAN:	
				return $data ? 1 : 0;
				
			case self::JSON:
				if ( ! is_string($data))
				{
					return json_encode($data);
				}
				if (json_decode($value) === NULL)
				{
					throw new Light_Exception('Value cannot be JSON decoded.');
				}
						
			case self::SERIALIZED:
				if ( ! is_string($data))
				{
					return serialize($data);
				}
				if (@unserialize($data) === FALSE && $data != serialize(FALSE))
				{
					throw new Light_Exception('Value is not unserializable.');
				}
							
			default:
				throw new Light_Exception('Unknow data type in ' . __METHOD__ . '.');
		}
	}
	
	/**
	 * Gets data related to this object regardless of where it is defined (new or old).
	 *
	 * @param string Field name
	 * @return mixed
	*/
	public function get($field)
	{
		if(array_key_exists($field, $this->_new_data))
		{
			return $this->_new_data[$field];
		}
		return $this->get_existing($field);
	}
	
	/**
	 * Gets data from new data array. Return null if not set
	 * @param string Field name
	 * @return mixed 
	*/
	public function get_new($field)
	{
		if(array_key_exists($field, $this->_new_data))
		{
			return $this->_new_data[$field];
		}
		return NULL;	
	}
	
	/**
	 * Gets data from existing data array. Return null if not set
	 * @param string Field name
	 * @return mixed 
	*/
	public function get_existing($field)
	{
		if(array_key_exists($field, $this->_existing_data))
		{
			return $this->_existing_data[$field];
		}
		return NULL;
	}
	
	/**
	 * Returns true if this DataWriter is updating a record, rather than inserting one.
	 *
	 * @return boolean
	*/
	public function is_update()
	{
		return !empty($this->_existing_data);
	}
	
	/**
	 * Returns true if this DW is inserting a record, rather than updating one.
	 *
	 * @return boolean
	*/
	public function is_insert()
	{
		return !$this->is_update();
	} 
	
	/**
	 * Helper method to check for errors before save
	 *
	 * @access public
	*/
	public function prepare_save()
	{
		$this->_prepare_save();
	}
	
	/**
	 * Helper method to check for errors before delete
	 *
	 * @access public
	*/
	public function prepare_delete()
	{
		$this->_prepare_delete();
	}
	
	/**
	 * Execute insert/ update query
	 *
	 * @param boolean - execute query or show query string
	 * @return Light_DataWriter object
	*/
	public function save($do_query = TRUE)
	{
		$this->_query = NULL; // reset
		
		$this->_prepare_save();
		
		if($this->is_update())
		{
			$this->_update($do_query);
		}
		else
		{
			$this->_insert($do_query);
		}
		if(empty($this->errors))
		{
			$this->_post_save();
		}
		return $this;
	}
	
	/**
	 * Execute after insert/update query success
	 * @return void
	*/
	protected function _post_save(){}
	
	/**
	 * Execute after delete query success
	 * @return void
	*/
	protected function _post_delete(){}
	
	
	/**
	 * Prepares before delete a row
	 * @return void
	*/
	protected function _prepare_delete(){}
	
	/**
	 * Execute insert query and assign results to $this->_query
	 *
	 * @param boolean - execute query or show query string
	 * @return Light_DataWriter object
	*/
	public function delete($do_query = TRUE)
	{
		$this->_query = NULL; // reset
		
		$this->_prepare_delete();
		
		if($this->errors)
		{
			return $this;
		}
		if( !$condition = $this->_get_update_condition())
		{
			throw new Light_Exception('Missing delete conditions to delete the record from the database.');
		}
		$sql = DB::delete($this->_get_table_name()) . ' WHERE '. $condition;
		
		if($do_query !== TRUE)
		{
			die('Query: ' . $sql);
		}
		
		$this->_query = $this->_db->write($sql);
		
		if(empty($this->errors))
		{
			$this->_post_delete();
		}
		
		return $this;
	}
	
	/**
	 * Execute update query and assign results to $this->_query
	 * @return void
	*/
	protected function _update($do_query = TRUE)
	{
		if($this->errors)
		{
			return $this;
		}
		if( !$condition = $this->_get_update_condition())
		{
			throw new Light_Exception('Missing update conditions to update the record into the database.');
		}
		$sql = DB::update($this->_get_table_name())->set($this->_new_data) . ' WHERE ' . $condition;
		if($do_query !== TRUE)
		{
			die('Query: ' . $sql);
		}
		$this->_query = $this->_db->write($sql);
		
	}
	
	/**
	 * Execute insert query and assign results to $this->_query
	 * @return void
	*/
	protected function _insert($do_query = TRUE)
	{
		if($this->errors)
		{
			return $this;
		}
		$sql = (string) DB::insert($this->_get_table_name(), array_keys($this->_new_data))->values(array_values($this->_new_data));
		
		if($do_query !== TRUE)
		{
			die('Query: ' . $sql);
		}
		
		$this->_query = $this->_db->insert($sql);
	}
	
	/**
	 * Return the last insert id
	 * @return integer - return 0 if query is failed
	*/
	public function insert_id()
	{
		if(isset($this->_query[0]))
		{
			return $this->_query[0];
		}
		return 0;
	}
	
	/**
	 * Return number of affected rows after update/ delete
	 * @return integer - return 0 if query is failed
	*/
	public function affected_rows()
	{
		return isset($this->_query[1])
		 	? $this->_query[1]
			: $this->_query;
	}
	
	/**
	 * Method support to add error by index, value or array index-value pairs
	 * @param string|array $index
	 * @param mixed - NULL if $index is array
	 * @return void
	*/
	public function errors($index, $value = NULL)
	{
		if(is_array($index))
		{
			foreach($index as $key => $value)
			{
				$this->errors($key, $value);
			}
		}
		else
		{
			$this->errors[$index] = $value;
		}
	}
	
	
	public function __get($field)
	{
		return $this->get($field);
	}

	public function __set($field, $value)
	{
		$this->set($field, $value);
	}
	
	public function __isset($field)
	{
		return array_key_exists($field, $this->_new_data);
	}
	
	public function __unset($field)
	{
		$this->remove($field);
	}
	
	// validator
	public static function not_empty($validation, $value, $field)
	{
		if( ! Light_Valid::not_empty($value))
		{
			$validation->error($field, 'not_empty');
			return FALSE;
		}
		return TRUE;
	}
	
	/**
	 * Gets the specified model object from the cache. If it does not exist,
	 * it will be instantiated.
	 *
	 * @param string - Class name of the model to load
	 * @param boolean - create new model object or gets model from cache
	 * @return Light_Model
	*/
	protected function _get_model($model_name, $new_object = FALSE)
	{
		if($new_object === TRUE)
		{
			return Light_Model::create($model_name);
		}
		
		if(empty($this->_model_cache[$model_name]))
		{
			$this->_model_cache[$model_name] = Light_Model::create($model_name);
		}
		return $this->_model_cache[$model_name];
	}
}