<?php defined('SYSPATH') or die('No direct script access.'); 

/**
 * Helper class to easy use Kohana_DB to select or execute query
 * 
 * @package: 	Light 
 * @author:		Phan Thanh Cong <chiplove.9xpro@gmail.com>
 * @version:	1.0
*/
class Light_DB {
	
	/**
	 * @var Kohana_Database
	*/
	protected $_kodb;
	
	protected static $_instances = array();
	
	public static function instance($name = NULL)
	{
		if($name === NULL)
		{
			$name = 'default';
		}
		if(empty(self::$_instances[$name]))
		{
			self::$_instances[$name] = new self($name);
		}
		return self::$_instances[$name];
	}
	
	
	public function __construct($name)
	{
		$this->_kodb = Database::instance($name);
	}
	
	/**
	 * Helper method to quick delete a rows in a table
	 *
	 * @param string - table name without prefix
	 * @param string - condition 
	 * @return integer - number of affected rows
 	*/
	public function delete($table_name, $condition, $params = NULL)
	{
		if(empty($condition))
		{
			throw new Light_Exception('Missing conditions to execute delete query.');
		}
		return $this->write('
			DELETE FROM ' . $this->_kodb->quote_table($table_name) . '
			WHERE ' . $this->get_query($condition, $params) . '
		');
	}
	
	/**
	 * Execute insert query
	 *
	 * @param 	string 	SQL string	
	 * @param	mixed	Parameters to fill to placeholders (?)
	 * @return 	array list(insert id, affected_rows)
	*/
	public function insert($sql, $params = NULL)
	{
		$sql = $this->get_query($sql, $params);
		
		return DB::query(Database::INSERT, $sql)->execute($this->_kodb);
	}
	
	/**
	 * Execute update, delete query
	 *
	 * @param 	string 	SQL string
	 * @param	mixed	Parameters to fill to placeholders (?)
	 * @return 	integer affected rows
	*/
	public function write($sql, $params = NULL)
	{
		$sql = $this->get_query($sql, $params);
		
		return DB::query(Database::UPDATE, $sql)->execute($this->_kodb);
	}
	
	/**
	 * Fetch results and return it listed by column name.
	 * This always return array
	 *
	 * @param string 		SQL string
	 * @param NULL|string 	column to listed
	 * @param mixed			Parameters to fill to placeholders (?)
	 * @return array
	*/
	public function fetch_all($sql, $keyed = NULL, $params = NULL)
	{
		$sql = $this->get_query($sql, $params);

		return DB::query(Database::SELECT, $sql)
			->execute($this->_kodb)
		->as_array($keyed);
	}
	
	/**
	 * Fetch results and return all keyed
	 * This always return array keyed
	 *
	 * @param string 	SQL string
	 * @param string	column name to listed
	 * @param mixed		Parameters to fill to placeholders (?)
	 * @return array - all value of the $keyed columns
	*/
	public function fetch_all_keyed($sql, $keyed, $params = NULL)
	{
		return array_keys($this->fetch_all($sql, $keyed));
	}
	
	/**
	 * Fetch only first result. This always return array
	 *
	 * @param string 	SQL string
	 * @param mixed		Parameters to fill to placeholders (?)
	 * @return array|boolean - FALSE if have no results
	*/
	public function fetch_one($sql, $params = NULL)
	{
		$sql = $this->get_query($sql, $params);
		
		$results = DB::query(Database::SELECT, $sql)
			->execute($this->_kodb)
		->as_array();
		return reset($results);
	}
	
	
	/**
	 * Compile sql with params
	 * 
	 * Example: 
	 * 		$this->get_query('SELECT * FROM table WHERE a = ? AND b = ?', array(5, 6));
	 *		$this->get_query('SELECT * FROM table WHERE a = ?', 5);
	 * Return:	
	 * 		SElECT * FROM table WHERE a = 5 AND b = 6
	 *		SElECT * FROM table WHERE a = 5 
	 *
	 * @param	string		sql with param
	 * @param	string|array	
	 * @return	string		query string complied
	*/
	public function get_query($sql, $params = NULL)
	{
		if($params === NULL)
		{
			return $sql;
		}
		if($params !== NULL AND strpos($sql, '?') === FALSE)
		{
			throw new Light_Exception(':method: Could not find a placeholder in query: ":sql" to assgin the parameters.', array(
				':sql' => $sql,
				':method' => __METHOD__
			));
		}
		if( ! is_array($params))
		{
			$params = array($params);
		}
		if(count($params) != substr_count($sql, '?'))
		{
			throw new Light_Exception(':method: The number of parameters in query ":sql" is not equal to the number of placeholders (?)', array(
				':sql' => $sql,
				':method' => __METHOD__
			));
		}
		$placeholders = array();
		foreach($params as $key => $param)
		{	
			$placeholders[':param' . $key . ':'] = $this->quote($param);
			$position = strpos($sql, '?');
			$sql = substr($sql, 0, $position) . ':param' . $key . ':' . substr($sql, $position + 1);
		}
		return strtr($sql, $placeholders);
	}
	
	/**
	 * Quote multi values
	 * @return array
	*/

	public function quote_map(array $values)
	{
		return array_map(array($this, 'quote'), $values);
	}
	
	/** 
	 * Quote a value for an SQL query.
	*/
	public function quote($value)
	{
		return $this->_kodb->quote($value);
	}
	
	/**
	 * Quote a value for an SQL query
	*/
	public function quote_like($value, $option = 'lr')
	{
		if($option == 'l')
		{
			return $this->quote('%' . $value);
		}
		else if($option == 'r')
		{
			return $this->quote($value . '%');
		}
		return $this->quote('%' . $value . '%');
	}
}