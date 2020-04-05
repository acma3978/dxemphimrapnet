<?php 
/**
 * Light Helper String
 * 
 * @package: 	Light 
 * @author:		Phan Thanh Cong <chiplove.9xpro@gmail.com>
 * @version:	1.0
*/
class Light_Helper_String {

	/**
	 * Helper method to cut a string between from a string to another string
	 *
	 * @param	string	the string to cut 
	 * @param	string	from
	 * @param	string	to
	 * @return	string
	*/
	public static function between($text, $start, $end = '')
	{
		if(!empty($start) AND $pos = strpos($text, $start)) 
		{
			$text = substr($text, $pos + strlen($start));
		}
		if(!empty($end) AND $pos = strpos($text, $end)) 
		{
			$text = substr($text, 0, $pos);
		}
		return $text;
	}
	
	/** 
	 * Truncates a string to the given length.
	 * 
	 * Ex: Hello words => Hello ...
	 * 
	 * @param	string	the string to truncate
	 * @parram	integer	the number of characters to truncate too
	 * @param	string	the string to use to denote it was truncated
	 * @return string	the truncated string
	*/
    public static function truncate_str($text, $length = 100, $ending = '...', $exact = true, $considerHtml = true) {

        if (is_array($ending)) {

            extract($ending);

        }

        if ($considerHtml) {

            if (mb_strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {

                $text = preg_replace("/<img[^>]+\>/i", '...', $text); // Không show ảnh

                return $text;

            }

            $totalLength = mb_strlen($ending);

            $openTags = array();

            $truncate = '';

            preg_match_all('/(<\/?([\w+]+)[^>]*>)?([^<>]*)/', $text, $tags, PREG_SET_ORDER);

            foreach ($tags as $tag) {

                if (!preg_match('/img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param/s', $tag[2])) {



                    if (preg_match('/<[\w]+[^>]*>/s', $tag[0])) {

                        array_unshift($openTags, $tag[2]);



                    } else if (preg_match('/<\/([\w]+)[^>]*>/s', $tag[0], $closeTag)) {

                        $pos = array_search($closeTag[1], $openTags);



                        if ($pos !== false) {

                            array_splice($openTags, $pos, 1);

                        }

                    }

                }

                $tag[1] = preg_replace("/<img[^>]+\>/i", '', $tag[1]); // Không show ảnh

                $truncate .= $tag[1];

                $contentLength = mb_strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', ' ', $tag[3]));

                if ($contentLength + $totalLength > $length) {

                    $left = $length - $totalLength;

                    $entitiesLength = 0;

                    if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', $tag[3], $entities, PREG_OFFSET_CAPTURE)) {

                        foreach ($entities[0] as $entity) {

                            if ($entity[1] + 1 - $entitiesLength <= $left) {

                                $left--;

                                $entitiesLength += mb_strlen($entity[0]);

                            } else {

                                break;

                            }

                        }

                    }

                    $truncate .= mb_substr($tag[3], 0 , $left + $entitiesLength);

                    break;

                } else {

                    $truncate .= $tag[3];

                    $totalLength += $contentLength;

                }

                if ($totalLength >= $length) {

                    break;

                }

            }

        } else {

            if (mb_strlen($text) <= $length) {

                return $text;

            } else {

                $truncate = mb_substr($text, 0, $length - strlen($ending));
            }
        }

        if (!$exact) {

            $spacepos = mb_strrpos($truncate, ' ');

            if (isset($spacepos)) {

                if ($considerHtml) {

                    $bits = mb_substr($truncate, $spacepos);

                    preg_match_all('/<\/([a-z]+)>/', $bits, $droppedTags, PREG_SET_ORDER);

                    if (!empty($droppedTags)) {

                        foreach ($droppedTags as $closingTag) {

                            if (!in_array($closingTag[1], $openTags)) {

                                array_unshift($openTags, $closingTag[1]);

                            }

                        }

                    }

                }

                $truncate = mb_substr($truncate, 0, $spacepos);

            }

        }

        $truncate .= $ending;

        if ($considerHtml) {

            foreach ($openTags as $tag) {

                $truncate .= '</'.$tag.'>';
            }
        }

        return $truncate;
    }

    public static function rand_array(array $input, $seed=0){

        if(!isset($seed)) {
            shuffle($input);
            return $input;
        }

        if(!is_int($seed)) {
            throw new InvalidArgumentException('Invalid seed value');
        }

        mt_srand($seed);

        $random;

        foreach($input as $key=>$value) {
            $random[$key] = mt_rand();
        }

        asort($random);

        $random = array_combine(array_keys($random), array_values($input));

        ksort($random);

        return $random;

    }

	public static function truncate($text, $length, $more = '...') 
	{
		$text = trim(strval($text));
		if (strlen($text) <= $length) 
		{
			return $text;
		}
		$text = substr($text, 0, $length);
		if (substr_count($text, ' ') != 0) 
		{
			while(strlen($text) AND $text[strlen($text)-1] != ' ') 
			{
				$text = substr($text, 0, -1);
			}
		}
		if($more) 
		{
			$text .= $more;
		}
		return $text;
	}
	
	/**
	 * Remove bad words
	 * @param array 	Array bad words
	 * @param string	Replacement	
	 * @return string
	*/
	public static function censor($text, array $badwords = array(), $replacement = '')
	{

		$text = str_replace($badwords, $replacement, $text);

		return $text;
	}
	
	/**
	 * Generate a random string
	 *
	 * @param	integer	The number of characters
	 * @param	string	The type of random string
	 * @return string
	*/
	public static function rand($length = 32, $type = 'default')
	{
		switch($type)
		{
			case 'alpha':	$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
				break;
			case 'numeric':	$chars = '0123456789';
				break;		
			case 'nozero':	$chars = '123456789';
				break;			
			case 'salt':	$chars = '!@#$%^&*()_+{}[]<>,.?/';	
				break;
			default:		$chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
				break;			
		}
		$count = strlen($chars);
		$chars = str_split($chars);
		$return = '';
		while($length--)
		{
			$return .= $chars[mt_rand(0, $count - 1)];
		}
		return $return;
	}
	
	/**
	 * Convert string to hexa
	 * Eg: hello => 68656c6c6f
	 *
	 * @param	string	string needed to convert 
	 * @return	string	hex string
	*/
	public static function str2hex($str)
	{
		$array = str_split($str);
		$return = '';
		foreach($array as $e)
		{
			$return .= dechex(ord($e));
		}
		return $return;
	}
	
	/**
	 * Convert hex to string
	 * Eg: 68656c6c6f => hello
	 * 
	 * @param	string	hex string
	 * @return	string	string converted
	*/
	public static function hex2str($hexstr)
	{
		$array = str_split($hexstr, 2);
		$return = '';
		foreach($array as $b)
		{
			$return .= chr(hexdec($b));
		}
		return $return;
	}
	
	/**
	 * Returns string with all alphabetic characters converted to lowercase. 
	*/
	public static function lower($text)
	{
		return Light_Helper_Unicode::lower($text);
	}
	
	/**
	 * Returns string with all alphabetic characters converted to uppercase. 
	*/
	public static function upper($text)
	{
		return Light_Helper_Unicode::upper($text);
	}
	
	/**
	 * Returns a string with the first character of each word in str capitalized, if that character is alphabetic. 
	 * @param string
	*/
	public static function ucwords($text)
	{
		return Light_Helper_Unicode::ucwords($text);
	}
	
	/**
	 * Returns a string with the first character of str capitalized, if that character is alphabetic. 
	 * @param string
	*/
	public static function ucfirst($text)
	{
		return Light_Helper_Unicode::ucfirst($text);
	}
	
	/**
	 * Returns a string with the first character of str , lowercased if that character is alphabetic
	*/
	public static function lcfirst($text)
	{
		return Light_Helper_Unicode::lcfirst($text);
	}
}