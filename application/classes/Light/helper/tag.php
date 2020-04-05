<?php 

class Light_Helper_Tag {
	
	/**
	 * Helper method  to sanitize title of tag
	 * @return string
	*/
	public static function sanitize_title($value)
	{
		$config = Light_Config::get('config.tag');	
		//$value = Light_Helper_String::censor($value, Light_Config::get('config.vping'), '');

		$value = str_replace($config['remove'], '', $value);
		
		$value = preg_replace('#[^\x80-\xff\w]#', ' ', $value); 
		$value = preg_replace('#[\s-]+#u', ' ', $value); 
		$value = trim($value);
		
		$value = Light_Helper_Unicode::lower($value); // lower all for easy search
		
		return $value;
	}
	
	/**
	 * Helper method to sanitize taglist
	 *
	 * @param string	taglist, separate by comma
	 * @param boolean	Remove bad tags ?
	 * @return string	Sanitized taglist separated by comma
	*/
	public static function sanitize_taglist($tags, $remove_bad_tag = FALSE)
	{

		if(is_string($tags))
		{
			$tags = explode(',', $tags);
		}
		if( ! is_array($tags))
		{
			return '';
		}
		$config = Light_Config::get('config.tag');	
		
		$return = array();
		foreach($tags as $tag)
		{

			if($tag = self::sanitize_title($tag))
			{

				if( ! $remove_bad_tag OR ($remove_bad_tag AND self::length_appro($tag)) )
				{
					$return[$tag] = TRUE;
				}
			}
		}

		return implode(',', array_keys($return));
	}
	
	/**
	 * Checks title has length appropriate
	 *
	 * @return boolean - TRUE if the title has length appropriate
	*/
	public static function length_appro($title)
	{
		
		$config = Light_Config::get('config.tag');	
		//$length = strlen($title);
		$length = Light_Helper_Unicode::length($title);
		
		return $length >= $config['min_length'] AND $length <= $config['max_length'];
		
	}
}