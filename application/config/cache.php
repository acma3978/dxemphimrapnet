<?php defined('SYSPATH') or die('No direct access allowed.');

return array(
	'file'   => array(                        
		'driver'         	=> 'file',  
		'cache_dir'			=> APPPATH.'cache', // thư mục chứa cache
		'default_expire'	=> 1800, //  (miliseconds)
		'ignore_on_delete' 	=> array(),
	),
);