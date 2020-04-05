<?php defined('SYSPATH') or die('No direct script access.');



/*

 * Light Application

 * @author:     OliverCriss80 <duongtuanx436dev@gmail.com>

 * @version:    1.0

 * @release:    4.10.2016

*/



class Light_Application extends Light_Registry {

	

	const NAME = 'FilmAV.net';
    const DOMAIN = 'http://demo.filmav.net';
    const APP = 'Xem phim Sex, Phim Sex Online';
	const VERSION = '1.0';

	/**

	 * Request time 

	 * @var integer

	*/

	public static $time;

	

	/**

	 * Status of the application

	 * @var boolean

	*/

	public static $initialized = FALSE;



	/**

	 * Stores lazy loaders

	 *

	 * @var array

	*/

	protected $_lazy_loaders = array();

	

	

	/**

	 * Library path inside APPPATH

	 * @var string

	*/

	public static $library = 'library';



	/**

	 * Start the application

	 * @return void

	*/

	public static function start()

	{

		if(self::$initialized) 

		{

			return TRUE;

		}

		self::$time = $_SERVER['REQUEST_TIME']; // same time()

		

		

		// Kohana does not sanitize $_REQUEST variable

		// may we will use it, this action preparation for it

		$_REQUEST = Kohana::sanitize($_REQUEST);

		

		self::set_class_name(__CLASS__);

		

		$instance = self::instance();

		

		// add lazy loaders

		$instance->add_lazy_loader('options', array($instance, 'load_options'));



		self::$initialized = TRUE;

		

		header('X-Powered-By: ' . self::NAME . ' ' . self::VERSION);

		// Do not remove this copyright

		header('X-Copyright: TronBoHD.com');

	}

	

	/**

	 * @return Light_Options

	*/

	public function load_options()

	{

		$options = Light_Model::create('Light_Model_Registry')->get('options');

		

		return new Light_Options((array)$options);

	}

	

	

	/**

	 * Execute lazy loader for an index. The loaded data is returned via a references parameter.

	 * return TRUE if lazy loader is executed

	 *

	 * @param string $index - index of lazy loader

	 * @param mixed By ref;

	 * @return boolean - TRUE if lazy loader is executed

	*/

	public static function _youtube($tieng_anh,$tieng_viet,$ketqua,$type){
        require_once (APPPATH.'/library/api-client/src/Google_Client.php');
        require_once (APPPATH.'/library/api-client/src/contrib/Google_YouTubeService.php');
        $client = new Google_Client();
        $client->setDeveloperKey('AIzaSyBxRBanbN3dcjoLIGlR062pWQWFm6PZ8VM'); // Get Key https://code.google.com/apis/console/b/0/?noredirect#project:132896987433:access

        $youtube = new Google_YoutubeService($client);

        try {
            $searchResponse = $youtube->search->listSearch('id,snippet', array(
                'q' => $tieng_anh.$tieng_viet,
                'maxResults' => $ketqua,
            ));

            $videos = '';
            $channels = '';

            foreach ($searchResponse['items'] as $k=>$searchResult) {

                switch ($searchResult['id']['kind']) {
                    case 'youtube#video':
                        $filminfo['yu_ki'][$k]=$searchResult;

                        $mahoa_url=Controller_Frontend::_combinPass($filminfo['yu_ki'][$k][id][videoId],'encode');
                        //$mahoa_url=str_replace('/','',$mahoa_url);
                        $filminfo['yu_ki'][$k][mahoa]=$mahoa_url;

                        $url_canonical = Light_Link::film($type, $filminfo);

                        break;
                    case 'youtube#channel':
                        $channels .= sprintf('<li>%s (%s)</li>', $searchResult['snippet']['title'],
                            $searchResult['id']['channelId']);
                        break;
                }

            }

        } catch (Google_ServiceException $e) {
            $htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',
                htmlspecialchars($e->getMessage()));
        } catch (Google_Exception $e) {
            $htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
                htmlspecialchars($e->getMessage()));
        }
        return $filminfo['yu_ki'];
    }

	public function lazy_load($index, &$return)

	{

		if (isset($this->_lazy_loaders[$index]))

		{

			$lazy_loader = $this->_lazy_loaders[$index];

			

			$return = call_user_func_array($lazy_loader[0], $lazy_loader[1]);

			

			$this->offsetSet($index, $return); // set loaded data for index

			$this->remove_lazy_loader($index); // remove lazy loader cause it is called

			

			return TRUE;

		}

		return FALSE;

	}

	

	/**

	 * 

	 * @param string $index - get the value associated with $index

	 * @return mixed - Value associated with the index

	 * @throws Light_Exception - If $index is not registed

	*/

	public static function get($index)

	{

		$instance = self::instance();

		

		if( ! $instance->offsetExists($index))

		{

			if ($instance->lazy_load($index, $return))

			{

				return $return;

			}

			else

			{

				throw new Light_Exception("No entry is registered for key '$index'");

			}

		}

		return $instance->offsetGet($index);

	}

	

	/**

	 * Add lazy loaders

	 *

	 * @param string $index 

	 * @param array Callback method 

	 * @return void

	*/

	public function add_lazy_loader($index, $callback)

	{

		if ( ! is_callable($callback, true))

		{

			throw new Light_Exception("Invalid callback for lazy loading '$index'");

		}

		

		$arguments = array_slice(func_get_args(), 2);



		$this->_lazy_loaders[$index] = array($callback, $arguments);

	}

	

	/**

	 * Removes the lazy loader

	 *

	 * @param string $index 

	 * @return void

	*/

	public function remove_lazy_loader($index)

	{

		if (isset($this->_lazy_loaders[$index]))

		{

			unset($this->_lazy_loaders[$index]);

		}

	}

	

	/**

	 * Load library 

	 * @param string - filename without extension

	*/

	public static function library($filename)

	{

		$file = APPPATH . self::$library. DIRECTORY_SEPARATOR. strtr($filename, '_', '/').'.php';

		if( ! $filepath = realpath($file)) 

		{

			throw new Light_Exception('File: ":path" does not exits.', array(

				':path' => $file

			));

		}

		return require_once $filepath;

		//return require_once Kohana::find_file(self::$library, $filename);

	}

	

	/**

	 * Load Zend

	*/

	public static function load_zend($class_name)

	{

		if(class_exists($class_name)) 

		{

			return FALSE;

		}

		set_include_path(get_include_path() . PATH_SEPARATOR . APPPATH . self::$library);

		$file = strtr($class_name, '_', '/').'.php';

		if( ! file_exists($file))

		{

			throw new Light_Exception('File: ":path" does not exits.', array(

				':path' => $file

			));

		}

		return require $file;

	}

}