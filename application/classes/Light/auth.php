<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Light Auth
 * 
 * @package: 	Light 
 * @author:		Phan Thanh Cong <chiplove.9xpro@gmail.com>
 * @version:	1.0
 * @release:	2012.08.27
*/
class Light_Auth
{
	const AREA_KEY = 'ahgaogao9gahaehe';
	
	const SESSION_KEY = 'saho3ta87aghjah';
	
	const REMEMBER_KEY = 'ra51ywjsskfaf';
	
	public $errors = array();
	
	/**
	 * Session instance
	*/
	protected $_session;
	
	protected static $_instance;
	
	public static function instance()
	{
		if(self::$_instance === NULL) 
		{
			self::$_instance = new self;
			
			self::$_instance->_session = Session::instance();
		}
		return self::$_instance;
	}
	
	/**
	 * Autonatic complete authentication with session info or remember infomation
	*/
	public function auto()
	{
		foreach(array(self::SESSION_KEY, self::REMEMBER_KEY) as $key)
		{
			$remember = explode(';', Cookie::get($key, ''));
			if(count($remember) == 2)
			{
				list($username, $password) = $remember;
				$username = Light_Helper_String::hex2str($username);
				$real_password = $this->password($username, $user); // pasword from database
				if( ! empty($user) AND $this->client_hash($real_password) == $password)
				{
					$this->complete($user['user_id'], TRUE);
					return TRUE;
				}		
			}
			Cookie::delete($key);	
		}
		return FALSE;
	}
	
	
	/**
	 * Checking user/password for logging
	 *
	 * @param 	string 	$username - Real username
	 * @param 	string 	$password - Real password 
	 * @param 	boolean $remember - Remember infomation for login back
	 * @return 	boolean - TRUE if logging ok
	*/
	public function login($username, $password, $remember)
    {
		$user_model = $this->_get_user_model();
		$user = $user_model->get_user_by_name($username);
		
		$this->errors = array(); // reset
	
		if(empty($user))
		{
			$this->errors[] = __('Username is incorrect');
		}
		else
		{
			if($user_model->hash_password($password, $user['salt']) != $user['password'])
			{
				$this->errors[] = __('Username and password is incorrect');
			}
			if(empty($user['active']))
			{
				$this->errors[] = __('Username has been disabled');
			}
		}
		if(empty($this->errors))
		{
			$this->complete($user['user_id'], $remember);
			
			return TRUE;
		}
		return FALSE;
    }
	
	/**
	 * @param integer $user_id
	 * @param boolean $remember
	 * @return boolean login status
	*/
	public function complete($user_id, $remember = FALSE)
	{
		// setup visitor
		Light_Visitor::setup($user_id);
		$visitor = Light_Visitor::instance();
		
		if($visitor['user_id']) 
		{
			Cookie::set('cache', 1, 86400); // bypass cache - server longvnit
			if($visitor['is_vip']) 
			{
				Cookie::set('noads', 1); // no display ads
			}
			else
			{
				Cookie::delete('noads'); 
			}
			$dw = Light_DataWriter::create('Light_DataWriter_User');
			$dw->set('current_session_id', $this->_session->id());
			$dw->set('last_activity', Light_Application::$time);
			$dw->set_existing($visitor->toArray());
			$dw->save();
			
			// update session_id
			$visitor['current_session_id'] = $this->_session->id();
			
			$session_value = Light_Helper_String::str2hex($visitor['username']) . ';' . $this->client_hash($visitor['password']);
			
			Cookie::set(self::SESSION_KEY, $session_value);
			if($remember)
			{
				Cookie::set(self::REMEMBER_KEY, $session_value, 365 * 86400);	
			}
			return TRUE;
		}
		else
		{
			$this->logout(); 
		}
		return FALSE;
	}
	
	/**
	 * Set logged AREA
	*/
	public function set_logged_area($area)
	{
		$area = strtolower($area);
		Cookie::set(self::AREA_KEY, $this->client_hash($area));
		
		return $this->_session->set('logged_area', $area);
	}
	
	/**
	 * Helper method to check AREA
	*/
	public function check_area($area_name)
	{
		$logged_area_hash = Cookie::get(self::AREA_KEY);
		
		if($area_name != $this->logged_area() AND $this->client_hash($area_name) != $logged_area_hash)
		{
			return FALSE;
		}
		return TRUE;
	}
	
	/**
	 * Gets logged area 
	*/
	public function logged_area()
	{
		return $this->_session->get('logged_area');
	}

	/**
	 * Generate a hash string with client information to send to the client for the security check later
	 *
	 * @param	string	
	 * @return	string	hashed string for client remember
	*/
	public function client_hash($string)
	{
		return md5($string . md5(Light_Visitor::get_client_ip() . Light_Visitor::get_user_agent()));
	}

 	/**
	 * Get password hashed from database by username
	 *
	 * @param string
	 * @param mixed - Assign the user to reference variable
	 * @return string|null 
	*/
    public function password($username, &$user = NULL)
    {
		$user_model = $this->_get_user_model();
		$user = $user_model->get_user_by_name($username);
		return Arr::get($user, 'password');	
    }

 	
	/**
	 * @return void
	*/
 	public function logout($destroy = FALSE, $logout_all = FALSE)
	{
		$visitor = Light_Visitor::instance();
		if($visitor->get('user_id') > 0)
		{
			$dw = Light_DataWriter::create('Light_DataWriter_User');
			$dw->set('current_session_id',  '');
			$dw->set('last_activity', Light_Application::$time);
			$dw->set_existing($visitor->toArray());
			$dw->save();
		}
		Light_Visitor::setup(0);
		
		Cookie::delete('noads'); // no display ads
		Cookie::delete('cache'); // for dynamic cache - server longvnit
		Cookie::delete(self::REMEMBER_KEY);
		Cookie::delete(self::SESSION_KEY);
		Cookie::delete(self::AREA_KEY);		
	}

	/**
	 * Get user model
	 *
	 * @return Light_Model_User
	*/
	protected function _get_user_model()
	{
		static $user_model;
		
		if( $user_model == NULL)
		{
			$user_model = Light_Model::create('Light_Model_User');
		}
		return $user_model;
	}
}