<?php defined('SYSPATH') or die('No direct script access.'); 
/**
 * Light DataWriter User
 * 
 * @package: 	Light
 * @author:		Phan Thanh Cong <chiplove.9xpro@gmail.com>
 * @version:	1.0
 * @release:	Sep 13, 2012
*/
class Light_DataWriter_User extends Light_DataWriter {

	protected function _get_table_name()
	{
		return 'user';
	}
	
	protected function _get_fields()
	{
		return array(
	 		'user_id'				=> self::UINT,
			'group_id'				=> self::UINT,
			'username'				=> self::STRING,
            'nickname'				=> self::STRING,
            'phone'				=> self::UINT,
			'password'				=> self::STRING,
			'salt'					=> self::STRING,
			'email'					=> self::STRING,
			'register_date'			=> self::UINT,
			'active'				=> self::BOOLEAN,
			'current_session_id'	=> self::STRING,
			'last_activity'			=> self::UINT,
			'fullname'				=> self::STRING,
			'sex'					=> self::UINT, 
			'birthday'				=> self::UINT,
			'post_count'			=> self::UINT,	// do not includes comments
			
			// phim3s
			'bookmark_film_ids'		=> self::STRING,
			'is_vip'				=> self::BOOLEAN,
		);
	}
	
	protected function _get_update_condition()
	{
		return 'user_id = ' . $this->_db->quote($this->get_existing('user_id'));
	}
	
	
	protected function _prepare_save()
	{
		// common rules
		$validation = Validation::factory($this->_new_data)
			->rule('username', 			'min_length', array(':value', 4))
			->rule('username',			'Light_DataWriter::not_empty', array(':validation', ':value', ':field'))
			->rule('username', 			'max_length', array(':value', 12))
			->rule('username', 			'alpha_dash')

            ->rule('nickname', 			'min_length', array(':value', 4))
            ->rule('nickname', 			'max_length', array(':value', 12))

            ->rule('password',			'min_length', array(':value', 6))
			->rule('fullname', 			'min_length', array(':value', 2))
			->rule('fullname',			'Light_DataWriter::not_empty', array(':validation', ':value', ':field'))
			->rule('group_id', 			'in_array', array(':value', array(1, 2, 3))) //1- admin/ 2- mod/ 3- mem
			->rule('email',				'email')			
			->rule('sex',				'in_array', array(':value', array(
				Light_Model_User::GENDER_UNKNOW, 
				Light_Model_User::GENDER_MALE,
				Light_Model_User::GENDER_FEMALE,
			))) //female, male, n/a
		;
		// insert rules
		if($this->is_insert())
		{
			$validation
				->rule('username', 		'not_empty')
				->rule('username', 		'Light_DataWriter_User::verify_username', array(':validation', ':value'))
				->rule('fullname',		'not_empty')
				->rule('password',		'not_empty')
				->rule('salt',			'not_empty')
				->rule('group_id',		'not_empty')
				->rule('email',			'not_empty')
				->rule('email', 		'Light_DataWriter_User::verify_email', array(':validation', ':value'))
				->rule('register_date',	'not_empty')
			;
		}
		// update rules
		if($this->is_update())
		{
			$user_id = $this->get_existing('user_id');
			$validation
				->rule('username', 		'Light_DataWriter_User::verify_username', array(':validation', ':value', $user_id))
				->rule('email', 		'Light_DataWriter_User::verify_email', array(':validation', ':value', $user_id))
			;
		}
		$validation->check();
		$this->errors($validation->errors('errors'));
	}

	public function filter_username($value)
	{
		return strtolower($value);
	}
	
	public function filter_email($value)
	{
		return strtolower($value);
	}
	
	public function filter_bookmark_film_ids($value)
	{
		if(is_string($value))
		{
			$value = explode(',', $value);
		}
		if( ! is_array($value)) 
		{
			return '';
		}
		$film_ids = array_unique(array_map('intval', $value));
		$films = $this->_get_film_model()->get_films_by_ids($film_ids, array(
			'select_fields' => array('film.film_id'),
			'limit' => 50,
		));
		return implode(',', array_keys($films));
	}
	
	/**
	 * Check the user_id already exists or not.
	 * If it is NOT already exists then add error to validation
	*/
	public static function verify_user_id($validation, $user_id, $field = 'user_id')
	{
		if($user_id !== NULL)
		{
			$user_model = Light_Model::create('Light_Model_User');
			
			$user_model->get_user_by_id($user_id)
				? FALSE
				: $validation->error($field, 'not_exists');
		}
	}
	
	/**
	 * Check the user name existing or no <exclusion user_id>
	 * If it is already exists then add error to validation
	*/
	public static function verify_username($validation, $username, $exclusion_user_id = NULL)
	{
		if($username !== NULL)
		{
			$user_model = Light_Model::create('Light_Model_User');
			
			if($user = $user_model->get_user_by_name($username))
			{
				 if($exclusion_user_id !== NULL AND $user['user_id'] == $exclusion_user_id)
				 {
					 return;
				 }
				 $validation->error('username', 'already_exists');
			}
		}
	}
	
	/**
	 * Check the user email existing or no <exclusion user_id>
	 * If it is already exists then add error to validation
	*/
	public static function verify_email($validation, $email, $exclusion_user_id = NULL)
	{
		if($email !== NULL)
		{
			$user_model = Light_Model::create('Light_Model_User');
			
			if($user = $user_model->get_user_by_email($email))
			{
				 if($exclusion_user_id !== NULL AND $user['user_id'] == $exclusion_user_id)
				 {
					 return;
				 }
				 $validation->error('email', 'already_exists');
			}
		}
	}
	
	protected function _prepare_delete()
	{
		// required fields
		$required_fields = array('user_id', 'group_id', 'post_count');
		$fetch_db = FALSE;
		foreach($required_fields as $field)
		{
			if( ! $this->get_existing($field))
			{
				$fetch_db = TRUE;
				break;
			}
		}
		if($fetch_db)
		{
			$user_model = $this->_get_user_model();
			$user = $user_model->get_user_by_id($this->get_existing('user_id'));
			if(empty($user))
			{
				$this->errors[] = 'User is not exist.';	
				return;
			}
			$this->set_existing($user);
		}

		if($this->get_existing('group_id') == 1)
		{
			$this->errors[] = 'You cannot delete a super administrator.';	
		}
		
		if($this->get_existing('post_count') AND Light_Config::get('config.debug') !== TRUE)
		{
			$this->errors[] = 'You cannot delete the user because he/she has some posts. If you still want to do this, please enable DEBUG mode.';	
		}
		
	}
	
	protected function _post_delete()
	{
		// remove all comments
		$this->_db->delete('comment', 'post_user_id = ?' , $this->get('user_id'));	
	}

	
	protected function _get_film_model()
	{
		return $this->_get_model('Light_Model_Film');
	}
	
	protected function _get_user_model()
	{
		return $this->_get_model('Light_Model_User');
	}
}