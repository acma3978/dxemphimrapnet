<?php 
/**
 * Light Helper Unicode
 * 
 * @package: 	Light 
 * @author:		Phan Thanh Cong <chiplove.9xpro@gmail.com>
 * @copyright:	(c) 2011 Phan Thanh Cong
 * @version:	1.1
 * @since:		Dec 4, 2012
*/
class Light_Helper_Unicode {

	public static $encoding = 'UTF-8';
	
	/**
	 * Remove accent from an unicode string (support case sensitive and only Vietnamese typing)
	 * @param string $text
	 * @return string removed accent
	*/
	public static function remove_accent($text)
	{
		static $map = array(
			'a' => array('á','à','ả','ã','ạ','â','ấ','ầ','ẩ','ẫ','ậ','ă','ắ','ằ','ẳ','ẵ','ặ'),
			'e' => array('é','è','ẻ','ẽ','ẹ','ê','ế','ề','ể','ễ','ệ'),
			'i' => array('í','ì','ỉ','ĩ','ị'),
			'o' => array('ó','ò','ỏ','õ','ọ','ô','ố','ồ','ổ','ỗ','ộ','ơ','ớ','ờ','ở','ỡ','ợ'),
			'u' => array('ú','ù','ủ','ũ','ụ','ư','ứ','ừ','ử','ữ','ự'),
			'y' => array('ý','ỳ','ỷ','ỹ','ỵ'),
			'd' => array('đ'),
			'A' => array('Á','À','Ả','Ã','Ạ','Â','Ấ','Ầ','Ẩ','Ẫ','Ậ','Ă','Ắ','Ằ','Ẳ','Ẵ','Ặ'),
			'E' => array('É','È','Ẻ','Ẽ','Ẹ','Ê','Ế','Ề','Ể','Ễ','Ệ'),
			'I' => array('Í','Ì','Ỉ','Ĩ','Ị'),
			'O' => array('Ó','Ò','Ỏ','Õ','Ọ','Ô','Ố','Ồ','Ổ','Ỗ','Ộ','Ơ','Ớ','Ờ','Ở','Ỡ','Ợ'),
			'U' => array('Ú','Ù','Ủ','Ũ','Ụ','Ư','Ứ','Ừ','Ử','Ữ','Ự'),
			'Y' => array('Ý','Ỳ','Ỷ','Ỹ','Ỵ'),
			'D' => array('Đ'),
		);
		foreach($map as $char => $chars)
		{
			$text = str_replace($chars, $char, $text);
		}
		return $text;
	}
	
	/**
	 * Convert case of characters (for only unicode - Vietnamese typing)
	 * 
	 * @param string $text - Needed string to convert
	 * @param boolean $revert - TRUE if needs convert from lowercase to uppercase
	 * @return string
	*/
	public static function lower($text, $revert = FALSE)
	{
		if(function_exists('mb_convert_case'))
		{
			return mb_convert_case($text, $revert ? MB_CASE_UPPER : MB_CASE_LOWER, self::$encoding);
		}
		
		static $characters = array(
			'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z', // xampp on Mac OS
			// 67 chars
			'á','à','ả','ã','ạ','â','ấ','ầ','ẩ','ẫ','ậ','ă','ắ','ằ','ẳ','ẵ','ặ',
			'é','è','ẻ','ẽ','ẹ','ê','ế','ề','ể','ễ','ệ',
			'í','ì','ỉ','ĩ','ị',
			'ó','ò','ỏ','õ','ọ','ô','ố','ồ','ổ','ỗ','ộ','ơ','ớ','ờ','ở','ỡ','ợ',
			'ú','ù','ủ','ũ','ụ','ư','ứ','ừ','ử','ữ','ự',
			'ý','ỳ','ỷ','ỹ','ỵ',
			'đ',
			'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z', // xampp on Mac OS
			// 67 chars
			'Á','À','Ả','Ã','Ạ','Â','Ấ','Ầ','Ẩ','Ẫ','Ậ','Ă','Ắ','Ằ','Ẳ','Ẵ','Ặ',
			'É','È','Ẻ','Ẽ','Ẹ','Ê','Ế','Ề','Ể','Ễ','Ệ',
			'Í','Ì','Ỉ','Ĩ','Ị',
			'Ó','Ò','Ỏ','Õ','Ọ','Ô','Ố','Ồ','Ổ','Ỗ','Ộ','Ơ','Ớ','Ờ','Ở','Ỡ','Ợ',
			'Ú','Ù','Ủ','Ũ','Ụ','Ư','Ứ','Ừ','Ử','Ữ','Ự',
			'Ý','Ỳ','Ỷ','Ỹ','Ỵ',
			'Đ',
		);
		static $lower = array();
		static $upper = array();
		
		if(empty($lower))
		{
			$lower = array_slice($characters, 0, 93);
			$upper = array_slice($characters, 93);
		}
		// upper
		if($revert)
		{
			return str_replace($lower, $upper, $text);
		}
		// lower
		return str_replace($upper, $lower, $text);
	}
	
	/**
	 * Convert case of characters from lowercase to uppercase
	 * @param string $text - Needed string to convert
	 * @return string
	*/
	public static function upper($text)
	{
		return self::lower($text, TRUE);
	}
	
	/**
	 * Returns a string with the first character of each word in str capitalized, if that character is alphabetic. 
	 * @param string
	 * @return string
	*/
	public static function ucwords($text)
	{
		if(function_exists('mb_convert_case'))
		{
			return mb_convert_case($text, MB_CASE_TITLE, self::$encoding);
		}
		
		$words = explode(' ', $text);
		foreach($words as &$word)
		{
			$word = self::ucfirst($word);
		}
		return implode(' ', $words);
	}
	
	/**
	 * Returns a string with the first character of str capitalized, if that character is alphabetic. 
	 * @param string
	 * @return string
	*/
	public static function ucfirst($text)
	{
		return self::lcfirst($text, TRUE);
	}
	
	/**
	 * Returns a string with the first character of str , lowercased if that character is alphabetic
	 * @return string
	*/
	public static function lcfirst($text, $revert = FALSE)
	{
		if(function_exists('mb_substr') AND function_exists('mb_strlen'))
		{
			$original = mb_substr($text, 0, 1, self::$encoding);
			$changed = self::lower($original, $revert);
			if($original != $changed)
			{
				$text = $changed . mb_substr($text, 1, mb_strlen($text, self::$encoding), self::$encoding);
			}
			return $text;
		}
		
		$chars = preg_split('##u', $text, 3);
		$chars[1] = self::lower($chars[1], $revert);
		return implode('', $chars);
	}
	
	/** 
	 * Return number of characters of a string (use utf-8 encoding)
	 * It calculated by the number of unicode characters
	 * Eg: viết có dấu thử phát => length is 20
	 *
	 * @return integer
	*/
	public static function length($text)
	{
		if(function_exists('mb_strlen'))
		{
			return mb_strlen($text, self::$encoding);
		}
		return count(preg_split('##u', $text)) - 2;
	}
}