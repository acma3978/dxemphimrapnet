<?php 
/**
 * Light Helper User
 * 
 * @package: 	Light 
 * @author:		Phan Thanh Cong <chiplove.9xpro@gmail.com>
 * @version:	1.0
*/
class Light_Helper_User {
	
	
	/**
	 * Get group name of group_id
	 * @return string
	*/
	public static function group_name($group_id, $makeup = FALSE)
	{
		switch($group_id)
		{
			case 1:
				$name = 'Administrator';
				break;
			
			case 2:
				$name = 'Moderator';
				break;
		
			case 3:
				$name = 'Member';	
				break;
				
			default:
				$name = 'Unknow';	
		}
		return $name;
	}
}