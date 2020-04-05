<?php defined('SYSPATH') or die('No direct script access.'); 
/**
 * Light Model Request
 * 
 * @package: 	Light
 * @author:		Phan Thanh Cong <chiplove.9xpro@gmail.com>
 * @version:	1.0
 * @release:	2012.08.29
*/
class Light_Model_Request extends Light_Model {
	
	const GENDER_MALE = 1;
	const GENDER_FEMALE = 0;
	const GENDER_UNKNOW = 2;
	
	const GROUP_GUEST = 0;
	const GROUP_ADMINISTRATOR = 1;
	const GROUP_MODERATOR = 2;
	const GROUP_MEMBER = 3;
	
	
	/**
	 * Quick update a field of user
	 *
	 * @param	integer user id need to update
	 * @param	string	field name
	 * @param	mixed	value
	 * @return	integer	affected rows
	*/
	public function update($user_id, $field, $value, $raw_value = FALSE)
	{
		return $this->_db->write('
			UPDATE c_user
			SET `' . $field . '` = ' . ($raw_value ? $value : $this->_db->quote($value)) . '
			WHERE user_id = ' . $this->_db->quote($user_id) . ' 
		');
	}
	
	/**
	 * Gets array user's infomation by user_id
	 *
	 * @param 	integer $user_id
	 * @return 	array|boolean
	*/
	public function get_title_by_id($request_id, array $fetch_options = array())
	{
		$items = $this->get_title(array('request_id' => $request_id), $fetch_options);
		
		return reset($items);
	}
	
	/**
	 * Gets array user's infomation by username
	 *
	 * @param 	string $username
	 * @return 	array|boolean
	*/
	public function get_title_by_name($title, array $fetch_options = array())
	{
		$items = $this->get_title(array('title' => $title), $fetch_options);
		
		return reset($items);
	}
	
	/**
	 * Gets array user's infomation by email
	 *
	 * @param 	string
	 * @return 	array|boolean
	*/
	public function get_user_by_email($email, array $fetch_options = array())
	{
		$items = $this->get_users(array('email' => $email), $fetch_options);
		
		return reset($items);
	}
	
	/**
	 * Get users by array ids
	 *
	 * @param 	array 	Array of user_id
	 * @return 	array	Array of array users
	*/
	public function get_users_by_ids(array $user_ids, array $fetch_options = array())
	{
		if(empty($user_ids))
		{
			return array();
		}
		return $this->get_users(array('user_id' => $user_ids), $fetch_options);
	}
	
	/**
	 * Get users by array names
	 *
	 * @param 	array 	Array of names
	 * @return 	array 	Array of array users
	*/
	public function get_users_by_names(array $usernames, array $fetch_options = array())
	{
		$usernames = array_map('trim', $usernames);
		$usernames = array_filter($usernames, 'strlen');
		
		if(empty($usernames))
		{
			return array();
		}
		return $this->get_users(array('username' => $usernames), $fetch_options);
	}
	
	/**
	 * Preparing user conditions for clause. This alway returns a value that ca be 
	 * used in a clause such as WHERE
	 * 
	 * @param 	array
	 * @return 	string
	*/
	public function prepare_user_conditions_for_clause(array $conditions)
	{
		$sql_conditions = array();
		
		foreach(array('user_id', 'username', 'email', 'fullname', 'group_id', 'active') as $field)
		{
			// add suffix "2" for search
			if(isset($conditions[$field. '2']))
			{
				if(is_array($conditions[$field]))
				{
					$sql_conditions[] = 'user.' . $field . ' LIKE ' . $this->_db->quote_like($conditions[$field.'2'][0], $conditions[$field.'2'][1]);
				}
				else
				{
					$sql_conditions[] = 'user.' . $field . ' LIKE ' . $this->_db->quote_like($conditions[$field.'2'], 'lr');
				}
			}
			if(isset($conditions[$field]))
			{
				if(is_array($conditions[$field]))
				{
					$sql_conditions[] = 'user.' . $field . ' IN (' . implode(',', $this->_db->quote_map($conditions[$field])) . ')';
				}
				else
				{
					$sql_conditions[] = 'user.' . $field . ' = ' . $this->_db->quote($conditions[$field]);
				}
			}
		}
		// search users
		if(isset($conditions['keyword']))
		{
			if(is_array($conditions['keyword']))
			{
				$sql_conditions[] = '(
					user.email LIKE ' . $this->_db->quote_like($conditions['keyword'][0], $conditions['keyword'][1]) . ' 
					OR user.username LIKE ' . $this->_db->quote_like($conditions['keyword'][0], $conditions['keyword'][1]) . '
				)';
			}
			else
			{
				$sql_conditions[] = '(
					user.email LIKE ' . $this->_db->quote_like($conditions['keyword'], 'lr') . ' 
					OR user.username LIKE ' . $this->_db->quote_like($conditions['keyword'], 'lr') . '
				)';
			}
		}
		return $this->get_conditions_for_clause($sql_conditions);
	}
	
	public function prepare_user_join_options(array $fetch_options)
	{
		// TODO 
		
		return array(
			'select_fields' => '',
			'join_tables'	=> '',
		);
	}
	
	/**
	 * Get users
	 *
	 * @param 	array $conditions array of array conditions
	 * @param 	array $fetch_options
	 * @return 	array
	*/
	public function get_title(array $conditions = array(), array $fetch_options = array())
	{
		$join_options = $this->prepare_user_join_options($fetch_options);
		$where_clause = $this->prepare_user_conditions_for_clause($conditions);
		$order_clause = $this->get_order_by_clause($fetch_options, 'request.request_id');
		$limit_options = $this->prepare_limit_fetch_options($fetch_options);
		
		return $this->_db->fetch_all($this->limit_query_results('
			SELECT request.*
				' . $join_options['select_fields'] . '
			FROM c_request AS request
			' . $join_options['join_tables'] . '
			WHERE ' . $where_clause . ' 
			' . $order_clause . '
		', $limit_options['limit'], $limit_options['offset']
		), 'request_id');
	}
	
	/**
	 * @return integer
	*/
	public function get_count_users(array $conditions = array(), array $fetch_options = array())
	{
		$join_options = $this->prepare_user_join_options($fetch_options);
		$where_clause = $this->prepare_user_conditions_for_clause($conditions);
		
		$count = $this->_db->fetch_one('
			SELECT COUNT(user.user_id) AS total
			FROM c_user AS user
			' . $join_options['join_tables'] . '
			WHERE ' . $where_clause . ' 
		');
		return $count['total'];
	}

	/**
	 * Gets visitsting as user
	 * @return 	boolean|array - FALSE if user is invalid
	*/
	public function get_visiting_user_by_id($user_id)
	{
		$user = $this->get_user_by_id($user_id);
		
		if(empty($user))
		{
			return FALSE;	
		}
		return $user;
	}
	
	/**
	 * Gets visiting as guest 
	 *
	 * @return array
	*/
	public function get_visiting_guest_user()
	{
		$user = array(
			'user_id'				=> 0,
			'group_id'				=> 0,
			'username'				=> '',
			'email'					=> '',
			'password'				=> '',
			'salt'					=> '',
			'active'				=> 0,
			'post_count'			=> 0,
			
			'fullname'				=> '',
			'sex'					=> 0,
			'birthday'				=> 0,
			'register_date'			=> 0,
			
			'current_session_id'	=> '',
			'last_activity'			=> 0,
			
			// phim3s
			'bookmark_film_ids'		=> '',
			'is_vip'				=> 0,
		);
		// to do
		return $user;
	}
	
	/**
	 * Hashing password for security
	 * @param 	string $password - Real password
	 * @param 	string $salt - Salt
	 * @return 	string - Hashed password
	*/
	public function hash_password($password, $salt)
	{
		return md5(md5($password) . $salt);
	}
	
	/**
	 * Build post counters (films)
	 * @param	integer
	 * @return 	integer
	*/
	public function build_post_count($user_id)
	{
		$count = $this->_get_film_model()->get_count_films(array('post_user_id' => $user_id));
		
		$this->_db->write('
			UPDATE c_user
			SET post_count = ?
			WHERE user_id = ?
		', array($count, $user_id));
		
		return $count;
	}
	
	/**
	 * @return 	integer 	affected rows
	*/
	public function clear_session_idle()
	{
		$limit = 20; // minute
		return $this->_db->write('
			UPDATE c_user
			SET current_session_id = \'\'
			WHERE last_activity < ' . (Light_Application::$time - $limit*60) . '
		');
	}
	
	protected function _get_film_model()
	{
		return Light_Model::create('Light_Model_Film');
	}
}