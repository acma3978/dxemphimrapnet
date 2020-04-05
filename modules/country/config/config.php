<?php defined('SYSPATH') or die('No direct access allowed.');
return array(

	'driver'       => 'file',
	'hash_method'  => 'sha256',
	'hash_key'     => NULL,
	'lifetime'     => 1209600,
	'session_type' => Session::$default,
	'session_key'  => 'auth_user',

	// Username/password combinations for the Auth File driver
	'config' => array(
        'domain'            => trim('http://demo2.tronbohd.com/'),
        'domainMobile'      => 'http://m.tronbohd.com/',
        'subdomainImage'    => 'http://image.tronbohd.com/',
        'cacheLinkImage'       => 'https://images2-focus-opensocial.googleusercontent.com/gadgets/proxy?container=focus&gadget=a&no_expand=1&refresh=604800&url=',
        'localhost'         => 'localhost',
        'username'          => 'root',
        'password'          => '',
        'database'          => 'tronbohd_TBHDdaTax',
	),
);