<?php defined('SYSPATH') or die('No direct access allowed.');

if($_SERVER['HTTP_HOST'] != 'localhost')
{
	return array
	(
		'default' => array

		(
			'type'       => 'mysqli',
			'connection' => array(
				'hostname'   => 'localhost',
				'database'   => 'db_fonline',
                'username'   => 'root',
				'password'   => '',

				'persistent' => FALSE,
			),
			'table_prefix' => 'c_',
			'charset'      => 'utf8',
			'caching'      => FALSE,
			'profiling'    => TRUE,
		),
	);
}
return array
(
	'default' => array
	(
		'type'       => 'mysqli',
		'connection' => array(
			'hostname'   => 'localhost',
			'database'   => 'database',
			'username'   => 'root',
			'password'   => '',
			'persistent' => FALSE,
		),
		'table_prefix' => 'c_',
		'charset'      => 'utf8',
		'caching'      => FALSE,
		'profiling'    => TRUE,
	),
);

