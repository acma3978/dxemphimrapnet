<?php defined('SYSPATH') or die('No direct script access.');

// -- Environment setup --------------------------------------------------------

// Load the core Kohana class
require SYSPATH.'classes/Kohana/Core'.EXT;

if (is_file(APPPATH.'classes/Kohana'.EXT))
{
	// Application extends the core
	require APPPATH.'classes/Kohana'.EXT;
}
else
{
	// Load empty core extension
	require SYSPATH.'classes/Kohana'.EXT;
}

/**
 * Set the default time zone.
 *
 * @link http://kohanaframework.org/guide/using.configuration
 * @link http://www.php.net/manual/timezones
 */
//date_default_timezone_set('America/Chicago');
date_default_timezone_set('Asia/Ho_Chi_Minh');

/**
 * Set the default locale.
 *
 * @link http://kohanaframework.org/guide/using.configuration
 * @link http://www.php.net/manual/function.setlocale
 */
setlocale(LC_ALL, 'en_US.utf-8');

/**
 * Enable the Kohana auto-loader.
 *
 * @link http://kohanaframework.org/guide/using.autoloading
 * @link http://www.php.net/manual/function.spl-autoload-register
 */
spl_autoload_register(['Kohana', 'auto_load']);

/**
 * Optionally, you can enable a compatibility auto-loader for use with
 * older modules that have not been updated for PSR-0.
 *
 * It is recommended to not enable this unless absolutely necessary.
 */
//spl_autoload_register(array('Kohana', 'auto_load_lowercase'));

/**
 * Enable the Kohana auto-loader for unserialization.
 *
 * @link http://www.php.net/manual/function.spl-autoload-call
 * @link http://www.php.net/manual/var.configuration#unserialize-callback-func
 */
ini_set('unserialize_callback_func', 'spl_autoload_call');

/**
 * Enable composer autoload libraries
 */
if (is_file(DOCROOT.'/vendor/autoload.php'))
{
	require DOCROOT.'/vendor/autoload.php';
}

/**
 * Set the mb_substitute_character to "none"
 *
 * @link http://www.php.net/manual/function.mb-substitute-character.php
 */
mb_substitute_character('none');

// -- Configuration and initialization -----------------------------------------

/**
 * Set the default language
 */
//I18n::lang('en-us');
I18n::lang('vi');

if (isset($_SERVER['SERVER_PROTOCOL']))
{
	// Replace the default protocol.
	HTTP::$protocol = $_SERVER['SERVER_PROTOCOL'];
}

/**
 * Set Kohana::$environment if a 'KOHANA_ENV' environment variable has been supplied.
 *
 * Note: If you supply an invalid environment name, a PHP warning will be thrown
 * saying "Couldn't find constant Kohana::<INVALID_ENV_NAME>"
 */
if (isset($_SERVER['KOHANA_ENV']))
{
	Kohana::$environment = constant('Kohana::'.strtoupper($_SERVER['KOHANA_ENV']));
}

/**
 * Initialize Kohana, setting the default options.
 *
 * The following options are available:
 *
 * - string   base_url    path, and optionally domain, of your application   NULL
 * - string   index_file  name of your index file, usually "index.php", if set to FALSE uses clean URLS     index.php
 * - string   charset     internal character set used for input and output   utf-8
 * - string   cache_dir   set the internal cache directory                   APPPATH/cache
 * - integer  cache_life  lifetime, in seconds, of items cached              60
 * - boolean  errors      enable or disable error handling                   TRUE
 * - boolean  profile     enable or disable internal profiling               TRUE
 * - boolean  caching     enable or disable internal caching                 FALSE
 * - boolean  expose      set the X-Powered-By header                        FALSE
 */
 
Kohana::init([
	'base_url'   	=> $_SERVER['HTTP_HOST'] == 'localhost' ? 'http://localhost/' : 'http://d.xemphimrap.net/',
	'index_file' 	=> '',
	'errors'		=> FALSE,
]);

/**
 * Attach the file write to logging. Multiple writers are supported.
 */
Kohana::$log->attach(new Log_File(APPPATH.'logs'));

/**
 * Attach a file reader to config. Multiple readers are supported.
 */
Kohana::$config->attach(new Config_File);

/**
 * Enable modules. Modules are referenced by a relative or absolute path.
 */
 
Kohana::modules([
	 'auth'       => MODPATH.'auth',       // Basic authentication
	 'cache'      => MODPATH.'cache',      // Caching with multiple backends
	// 'codebench'  => MODPATH.'codebench',  // Benchmarking tool
	 'database'   => MODPATH.'database',   // Database access
    // 'encrypt'    => MODPATH.'encrypt',    // Encryption support
	 'image'      => MODPATH.'image',      // Image manipulation
	// 'minion'     => MODPATH.'minion',     // CLI Tasks
	// 'orm'        => MODPATH.'orm',        // Object Relationship Mapping
	// 'pagination' => MODPATH.'pagination', // Pagination
	// 'unittest'   => MODPATH.'unittest',   // Unit testing
	// 'userguide'  => MODPATH.'userguide',  // User guide and API documentation
	 'captcha'    => MODPATH.'captcha',
	 'country'    => MODPATH.'country',
	]);

/**
 * Cookie Salt
 * @see  http://kohanaframework.org/3.3/guide/kohana/cookies
 *
 * If you have not defined a cookie salt in your Cookie class then
 * uncomment the line below and define a preferrably long salt.
 */
// Cookie::$salt = NULL;
Cookie::$salt = '123faghw62yjsksj';
/**
 * Cookie HttpOnly directive
 * If set to true, disallows cookies to be accessed from JavaScript
 * @see https://en.wikipedia.org/wiki/Session_hijacking
 */
// Cookie::$httponly = TRUE;
/**
 * If website runs on secure protocol HTTPS, allows cookies only to be transmitted
 * via HTTPS.
 * Warning: HSTS must also be enabled in .htaccess, otherwise first request
 * to http://www.example.com will still reveal this cookie
 */
// Cookie::$secure = isset($_SERVER['HTTPS']) AND $_SERVER['HTTPS'] == 'on' ? TRUE : FALSE;

/**
 * Set the routes. Each route must have a minimum of a name, a URI and a set of
 * defaults for the URI.
 */
/*Route::set('default', '(<controller>(/<action>(/<id>)))')
	->defaults([
		'controller' => 'welcome',
		'action'     => 'index',
	]);*/
	Route::set('home', '')
	->defaults(array(
		'directory'	=> 'frontend',
		'controller' => 'home',
		'action'     => 'index',
	));

    Route::set('film', '(phim(-<type_name>)/<title>_<film_id>)',
	array(
		'title' => '[^_]+'
	))
	->defaults(array(
		'directory'	=> 'frontend',
		'controller' => 'film',
		'action'     => 'index',
	));

	Route::set('watch', '(phim(-<type_name>)/<title>_<film_id>/xem-phim(/<episode_id>))',
            array(
                'title' => '[^_]+',
            ))
            ->defaults(array(
                'directory'	=> 'frontend',
                'controller' => 'watch',
                'action'     => 'index',
            ));

    Route::set('players', '(<type>/<film_id>/<episode_id>.rss)',
    array(
        'type' => '[^_]+',
        'action' 	=> 'link',
    ))
    ->defaults(array(
        'directory'	=> 'frontend/ajax',
        'controller' => 'episode',
        'action'     => 'index',
    ));

Route::set('content', '(noi-dung/<title>(_<film_id>)(/<action>))',
    array(
        'title' => '[^_]+',
        'action' 	=> 'phim',

    ))
    ->defaults(array(
        'directory'	=> 'frontend',
        'controller' => 'content',
        'action'     => 'index',
    ));

Route::set('category', '(the-loai/phim-<title_ascii>(/page-<page>))',
	array(
		'page' => '[\d]+'
	))
	->defaults(array(
		'directory'	=> 'frontend',
		'controller' => 'category',
		'action'     => 'index',
	));
Route::set('country', '(quoc-gia/phim-<name_ascii>(/page-<page>))',
	array(
		'page' => '[\d]+'
	))
	->defaults(array(
		'directory'	=> 'frontend',
		'controller' => 'country',
		'action'     => 'index',
	));

Route::set('tag', '(tag/<title_ascii>(/page-<page>))',
	array(
		'title' 	=> '.+?',
		'page' 		=> '[\d]+',
		'format'	=> 'html|php',
	))
	->defaults(array(
		'directory'	=> 'frontend',
		'controller' => 'tag',
		'action'     => 'index',
	));

Route::set('actor', '(dien-vien/<title_ascii>(_<actor_id>)(/<action>))',
		array(
				'title_ascii' => '[^_]+',
				'action' 	=> 'actor',

		))

    ->defaults(array(
        'directory'	=> 'frontend',
        'controller' => 'actor',
        'action'     => 'index',
    ));
Route::set('search', '(search/<keyword>(/page-<page>))',
	array(
		'keyword' 	=> '.+?',
		'page' 		=> '[\d]+',
		'format'	=> 'html|php',
	))
	->defaults(array(
		'directory'	=> 'frontend',
		'controller' => 'search',
		'action'     => 'index',
	));

Route::set('list', '(danh-sach/<name>(/page-<page>))',
	array(
		'name' 	=> 'phim|phim-moi|phim-moi-cap-nhat|phim-bo|phim-le|phim-chieu-rap|phim-\d{4}',
		'page' 		=> '[\d]+'
	))
	->defaults(array(
		'directory'	=> 'frontend',
		'controller' => 'list',
		'action'     => 'index',
	));

Route::set('member', 'member(/<action>)')
	->defaults(array(
		'directory'	=> 'frontend',
		'controller' => 'member',
		'action' 	=> 'login',
	));

Route::set('error', 'errors(/<action>)')
	->defaults(array(
		'directory'	=> 'frontend',
		'controller' => 'errors',
		'action'     => 'index',
	));

Route::set('page', 'post/<title>.<page_id>')
	->defaults(array(
		'directory'	=> 'frontend',
		'controller' => 'page',
		'action'     => 'index',
	));

Route::set('ajax', 'ajax(/<controller>(/<action>))')
	->defaults(array(
		'directory'	=> 'frontend/ajax',
		'controller' => 'common',
		'action'     => 'index',
	));

Route::set('captcha', 'captcha(/<group>)')
	->defaults(array(
		'controller' => 'captcha',
		'action' => 'index',
		'group' => NULL
	));

Route::set('rss', 'rss(/<group>)(.<format>)')
    ->defaults(array(
        'directory'	=> 'frontend',
        'controller' => 'rss',
        'action' => 'index',
    ));

Route::set('module', 'module(/<action>)')
	->defaults(array(
		'directory'	=> 'frontend',
		'controller' => 'module',
		'action'     => 'index',
	));



Route::set('admin', 'kute92404x(/<controller>(/<action>))')
    ->defaults(array(
        'directory'		=> 'backend',
        'controller' 	=> 'home',
        'action'     	=> 'index',
    ));


try
{
	echo Request::factory()
		->execute()
		->send_headers(TRUE)
		->body();
}

catch(Exception $e)
{
	switch($e->getCode())
	{
		case 404:
			echo View::factory('errors/404')->render();
			break;
		default:
			echo 'Error: ' . $e->getMessage();
			break;
	}
}
exit;
