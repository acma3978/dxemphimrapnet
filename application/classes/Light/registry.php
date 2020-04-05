<?php defined('SYSPATH') or die('No direct script access.'); 
/**
 * Light Registry
 * 
 * @package: 	Light
 * @author:		Phan Thanh Cong <chiplove.9xpro@gmail.com>
 * @version:	1.0
*/
class Light_Registry extends ArrayObject {
	
	/**
	 * @var Light_Model_Registry
	*/
	protected $_registry_model;
	
	/**
     * Registry object provides storage for shared objects.
     * @var Light_Registry
     */
	private static $_instance = NULL;
	
	
	protected static $_class_name = 'Light_Registry';
	
	/**
	 *
	 * @return Light_Registry
	*/
	public static function instance()
	{
		if(self::$_instance === NULL)
		{
			self::$_instance = new self::$_class_name;
		}
		return self::$_instance;
	}
	
	/**
	 * Set the class name to use for the default registry instance.
	 *
	 * @param string $class_name
     * @return void
	*/
	public static function set_class_name($class_name)
	{
		self::$_class_name = $class_name;
	}
	
	/**
	 * getter method, basically same as offsetGet().
	 *
	 * @param string $index - get the value associated with $index
	 * @return mixed
	 * @throws Light_Exception if no entry is registerd for $index.
	*/
	public static function get($index)
	{
		$instance = self::instance();
		if( ! $instance->offsetExists($index))
		{
			throw new Light_Exception("No entry is registered for key '$index'");
		}
		return $instance->offsetGet($index);
	}
	
	/**
	 * setter method, basically same as offsetSet().
	 *
	 * @param string $index The location in ArrayObject to store value 
	 * @param mixed $value The object to store in the ArrayObject.
	 * @return 	void
	*/
	public static function set($index, $value)
	{
		self::instance()->offsetSet($index, $value);
	}
	
	/**
	 * @param string $index
	 * @return boolean
	*/
	public function offsetExists($index)
	{
		return array_key_exists($index, $this);
	}
	
	
	/**
	 * Helper method to save to database
	 * @param	string
	 * @param	value
	 * @return	integer	Affected rows
	*/
	public function save($index, $value)
	{
		return $this->_get_registry_model()->set($index, $value);
	}
	
	/**
	 * @return Light_Model_Registry
	*/
	protected function _get_registry_model()
	{
		if($this->_registry_model === NULL)
		{
			$this->_registry_model = Light_Model::create('Light_Model_Registry');
		}
		return $this->_registry_model;
	}
}