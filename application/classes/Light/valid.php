<?php defined('SYSPATH') or die('No direct script access.'); 
/**
 * Light Valid
 * 
 * @package: 	Light
 * @author:		Phan Thanh Cong <chiplove.9xpro@gmail.com>
 * @version:	1.0
*/
class Light_Valid {
	
	/**
	 * Return TRUE if value equal zero '0' or 0
	 *
	 * @return boolean
	*/
	public static function not_zero($value)
	{
		return $value != 0;
	}
	
	/**
	 * Return TRUE if value is numeric and greater than zero
	 * 
	 *	digit_not_zero("123") => TRUE
	 *	digit_not_zero(0)	=> FALSE
	 *	digit_not_zero(-5)	=> FALSE
	 *
	 * @param	mixed
	 * @return	boolean
	*/
	public static function digit_not_zero($value)
	{
		return preg_match('#^[\d]+$#', $value) AND $value != 0; 
	}
	
	/**
	 * Return TRUE if value is ipaddress (allow localhost ip)
	 * @return boolean
	*/
	public static function ip($value)
	{
		return (bool) preg_match('/^((1?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(1?\d{1,2}|2[0-4]\d|25[0-5])$/', $value);
	}
	
	/**
	 * Return TRUE if value is not equal NULL or empty string
	 * @return boolean
	*/
	public static function not_empty($value)
	{
		if($value !== NULL)
		{
			return strval($value) !== '';
		}
		return TRUE;
	}
}