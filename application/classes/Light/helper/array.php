<?php 
/**
 * Light Helper Array
 * 
 * @package: 	Light 
 * @author:		Phan Thanh Cong <chiplove.9xpro@gmail.com>
 * @version:	1.0
*/
class Light_Helper_Array {
	
	/**
	 * Parse value to array
	 * @return array
	*/
	public static function parse($value)
	{
		if(is_array($value))
		{
			return $value;
		}
		parse_str($value, $array);
		return $array;
	}

	public static function array_find($array, $search, $keys = array()){

    	foreach($array as $key => $value) {
	        if (is_array($value)) {
	            $sub = array_find_deep($value, $search, array_merge($keys, array($key)));
	            if (count($sub)) {
	                return $sub;
	            }
	        } else {
	        	
	            foreach($search as $s){
	            	
	                if($s === $key){
	                    $result[] = array($key=>$value);        
	            	}
				}	
	        }
	    }
	    return $result;
	}
}