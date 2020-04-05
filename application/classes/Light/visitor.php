<?php defined('SYSPATH') or die('No direct script access.'); 
/**
 * Light Visitor
 * 
 * @package: 	Light
 * @author:		Phan Thanh Cong <chiplove.9xpro@gmail.com>
 * @version:	1.0
 * @release:	2012.08.27
*/
class Light_Visitor implements ArrayAccess {
	
	/**
	 * 
	*/
	protected static $_instance = NULL;
	
	/**
	 * User array infomation
	*/
	protected $_user = array();
	
	
	/**
	 * 
	*/
	public static function instance()
	{
		if(self::$_instance === NULL)
		{
			self::setup(0);
		}
		return self::$_instance;
	}
	
	/**
	 * Setup visitor
	 *
	 * @parram integer $user_id 
	 * @return void
	*/
	public static function setup($user_id)
	{
		$user_id = intval($user_id);
		
		$object = new self;
		$user_model = Light_Model::create('Light_Model_User');


		if($user_id AND $user = $user_model->get_visiting_user_by_id($user_id))
		{
			$object->_user = $user;
		}
		else
		{
			$object->_user = $user_model->get_visiting_guest_user();
		}
		self::$_instance = $object;	
	}
	
	public static function get_user_id()
	{
		return self::instance()->offsetGet('user_id');
	}
	
	/**
	 * Gets the user info in array format (for areas that require actual arrays).
	 *
	 * @return array
	 */
	public function toArray()
	{
		return $this->_user;
	}
	
	/**
	 * Object-oriented approach to getting a value from the visitor
	 *
	 * @param string $name
	 *
	 * @return mixed False if the value can't be found
	 */
	public function get($name)
	{
		if (array_key_exists($name, $this->_user))
		{
			return $this->_user[$name];
		}
		else
		{
			return FALSE;
		}
	}
	
	/**
	 * For ArrayAccess.
	 *
	 * @param string $offset
	*/
	public function offsetExists($offset)
	{
		return array_key_exists($offset, $this->_user);
	}
	
	/**
	 * For ArrayAccess.
	 *
	 * @param string $offset
	*/
	public function offsetUnset($offset)
	{
		unset($this->_user[$offset]);
	}
	
	/**
	 * For ArrayAccess.
	 *
	 * @param string $offset
	*/
	public function offsetGet($offset)
	{
		return $this->_user[$offset];
	}
	
	/**
	 * For ArrayAccess.
	 *
	 * @param string $offset
	 * @param mixed $value
	*/
	public function offsetSet($offset, $value)
	{
		return $this->_user[$offset] = $value;
	}
	
	/**
	 * Magic method for array access
	*/
	public function __get($name)
	{
		return $this->get($name);
	}
	
	
	
	public function is_admin($is_super = FALSE)
	{
		$is_admin = ($this->_user['group_id'] == 1);
		
		if($is_super)
		{
			$is_admin = ($is_admin AND in_array($this->_user['user_id'], Light_Config::get('config.superadmin')));
		}
		return $is_admin;
	}
	
	public function is_moderator()
	{
		return $this->_user['group_id'] == 2;
	}
	
	/**
	 * Get client ip of visitor
	 *
	 * @return string
	*/
	public static function get_client_ip()
	{
		if( ! empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
		{
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		}
		elseif( ! empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
		{
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		else
		{
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}
	
	/**
	 * Get user agent of visitor
	 *
	 * @return string
	*/
	public static function get_user_agent()
	{
		return $_SERVER['HTTP_USER_AGENT'];
	}
	
}