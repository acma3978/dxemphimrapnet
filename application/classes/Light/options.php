<?php defined('SYSPATH') or die('No direct script access.'); 
/**
 * Light Options
 * 
 * @package: 	Light
 * @author:		Phan Thanh Cong <chiplove.9xpro@gmail.com>
 * @version:	1.0
 * @release:	2012.08.29
*/
class Light_Options {

	/**
	 * Array options
	 *
	 * @var array
	*/
	protected $_options = array();
	
	public function __construct(array $options)
	{
		$this->set_option($options);
	}
	
	public function set_option(array $options)
	{
		$this->_options = $options;
	}
	
	/**
	 * 
	*/
	public function set($name, $value)
	{
		$this->_options[$name] = $value;
	}
	
	/**
	 * Get option by name
	 *
	 * @param string $name
	 * @return mixed
	*/
	public function get($name)
	{
		if( ! isset($this->_options[$name]))
		{
			return NULL;
		}
		return $this->_options[$name];
	}
	
	/**
	 * @return array - All options
	*/
	public function get_all()
	{
		return $this->_options;
	}
	
	public function __get($name)
	{
		return $this->get($name);
	}
	
	public function __set($name, $value)
	{
		$this->set($name, $value);
	}
	
}