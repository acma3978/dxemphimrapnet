<?php 

class Light_Helper_File {
	
	/**
	 * Return data dir
	 * @return string
	*/
	public static function get_data_dir()
	{
		return Light_Config::get('config.data_path');
	}
	
	/**
	 * Return temporary dir
	 * @return string
	*/
	public static function get_temp_dir()
	{
		return Light_Config::get('config.temporary_path');
	}
	
	
	/**
	 * Gets all files and folder of the input dir
	 *
	 * @param	string	dir
	 * @param	boolean	list child dirs
	 * @param	boolean	list files
	 * @param	boolean	use recursive for fetching
	 * @return	array	
	*/
	public static function fetch_dir($dir, $list_dir = TRUE, $list_file = TRUE, $recursive = FALSE)
	{
		$dir = rtrim(realpath($dir), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
		$array = array();
		if(is_dir($dir))
		{
			if ($dh = opendir($dir)) 
			{
				while (($item = readdir($dh)) !== false) 
				{
					if(in_array($item, array('.', '..')))
					{
						continue;
					}
					if($list_dir && is_dir($dir . $item))
					{	
						$array[] = $item;
						if($recursive)
						{
							$array[$item] = self::fetch_dir($dir . $item, $list_dir, $list_file, $recursive);
						}
					}
					if($list_file && is_file($dir . $item))
					{
						$array[] = $item;
					}
				}
				closedir($dh);
			}
		}
		return $array;
	}
	
	/**
	 * Remove all files and sub dir of the input dir
	 *
	 * @param string	directory 
	 * @return void
	*/
	public static function rmdir($dir)
	{
		if($items = glob($dir . '/*'))
		{
			foreach($items as $file) 
			{
				is_dir($file) ? self::rmdir($file) : unlink($file);
			}
		}
		rmdir($dir);
	}
	
	/*
	 * Read data from source and write it to file on server
	 * 
	 * @param 	string 	url source
	 * @param 	string 	new file path
	 * @param	string	@ref $error
	 * @return 	boolean FALSE and assign error message to @ref $error
	*/
	public static function leech_file($url, $newfile_path, &$error)
	{
		$url = trim(urldecode($url));
		$url = str_replace(' ', '%20', $url);
		$url = preg_replace('#img[\d]+\.imageshack\.us#i', 'a.imageshack.us', $url); // anti imageshack
		
    $ch = curl_init($url);
                $a = 'aaa.jpg';
                
                if($fp = fopen($a, 'wb')){
          
                curl_setopt($ch, CURLOPT_FILE, $fp);
                curl_setopt($ch, CURLOPT_HEADER, 0);
            
                curl_exec($ch);
                curl_close($ch);
                fclose($fp);
                
                file_put_contents($newfile_path,file_get_contents($a));
                @unlink($a);
				return TRUE;
				}
				$error = 'Cannot load url: ' . $source_url;
		return FALSE;
	}
}