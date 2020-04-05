<?php defined('SYSPATH') or die('No direct script access.'); 

class Light_Model_Comment extends Light_Model {
	
	const FETCH_USERINFO = 1;
	
	const FETCH_FILMINFO = 2;
	
	/**
	 * Quick update a field of comment
	 *
	 * @return integer	affected rows
	*/
	public function update($comment_id, $field, $value)
	{
		return $this->_db->write('
			UPDATE c_comment
			SET `' . $field . '` = ' . $this->_db->quote($value) . '
			WHERE comment_id = ' . $this->_db->quote($comment_id) . ' 
		');
	}
	
	/**
	 * @return array|boolean - FALSE if comment is not exist
	*/
	public function get_comment_by_id($comment_id, array $fetch_options = array())
	{
		$items = $this->get_comments(array('comment_id' => $comment_id), $fetch_options);
		
		return reset($items);
	}
	
	public function prepare_comment_join_options(array $fetch_options)
	{
		$select_fields = '';
		$join_tables = '';
		
		if( ! empty($fetch_options['join']))
		{
			if($fetch_options['join'] & self::FETCH_USERINFO)
			{
				$select_fields .= ',
					user.username AS user_username, user.fullname AS user_fullname,
					user.email AS user_email, user.is_vip AS user_is_vip, user.group_id AS user_group_id,
					IF(user.group_id = 1, 1, 0) AS user_is_admin, IF(user.group_id = 2, 1, 0) AS user_is_mod
				';
				$join_tables .= '
					LEFT JOIN c_user AS user ON (user.user_id = comment.post_user_id)
				';
			}
			if($fetch_options['join'] & self::FETCH_FILMINFO)
			{
				$select_fields .= ',
					film.title, film.title_ascii,
					film.title_o, film.title_o_ascii,
					IF(film.type != \'\', film.type, 1) AS type # default film type (le)
				';
				$join_tables .= '
					LEFT JOIN c_film AS film ON (film.film_id = comment.film_id)
				';
			}
		}
		return array(
			'select_fields' => $select_fields,
			'join_tables' => $join_tables,
		);
	}
	
	public function prepare_comment_conditions_for_clause(array $conditions)
	{
		$sql_conditions = array();
		foreach(array('comment_id', 'film_id', 'post_user_id', 'message', 'active') as $field)
		{
			// add suffix "2" for search
			if(isset($conditions[$field. '2']))
			{
				if(is_array($conditions[$field. '2']))
				{
					$sql_conditions[] = 'comment.' . $field . ' LIKE ' . $this->_db->quote_like($conditions[$field.'2'][0], $conditions[$field.'2'][1]);
				}
				else
				{
					$sql_conditions[] = 'comment.' . $field . ' LIKE ' . $this->_db->quote_like($conditions[$field.'2'], 'lr');
				}
			}
			if(isset($conditions[$field]))
			{
				if(is_array($conditions[$field]))
				{
					$sql_conditions[] = 'comment.' . $field . ' IN (' . implode(',', $this->_db->quote_map($conditions[$field])) . ')';
				}
				else
				{
					$sql_conditions[] = 'comment.' . $field . ' = ' . $this->_db->quote($conditions[$field]);
				}
			}
		}
		if(isset($conditions['post_date1']))
		{
			$sql_conditions[] = 'comment.post_date > ' . $this->_db->quote($conditions['post_date1']);
		}
		if(isset($conditions['post_date2']))
		{
			$sql_conditions[] = 'comment.post_date < ' . $this->_db->quote($conditions['post_date2']);
		}
		
		// search user name - must be join to user table
		if(isset($conditions['username']))
		{
			$sql_conditions[] = 'user.username LIKE ' . $this->_db->quote_like($conditions['username'], 'lr');	
		}
		return $this->get_conditions_for_clause($sql_conditions);
	}
	
	public function get_comments(array $conditions, array $fetch_options = array())
	{
		$join_options = $this->prepare_comment_join_options($fetch_options);
		$where_clause = $this->prepare_comment_conditions_for_clause($conditions);
		$order_clause = $this->get_order_by_clause($fetch_options, 'comment.comment_id');
		$limit_options = $this->prepare_limit_fetch_options($fetch_options);
		
		return $this->_db->fetch_all($this->limit_query_results('
			SELECT comment.* 
				' . $join_options['select_fields'] . '
			FROM c_comment AS comment
			' . $join_options['join_tables'] . '
			WHERE ' . $where_clause . ' 
			' . $order_clause . '
		', $limit_options['limit'], $limit_options['offset']
		), 'comment_id');
	}
	
	public function get_count_comments(array $conditions, array $fetch_options = array())
	{
		$where_clause = $this->prepare_comment_conditions_for_clause($conditions);
		$join_options = $this->prepare_comment_join_options($fetch_options);
		
		$count = $this->_db->fetch_one('
			SELECT COUNT(comment.comment_id) AS total
			FROM c_comment AS comment
				' . $join_options['join_tables'] . '
			WHERE ' . $where_clause . '
		');
		return $count['total'];
	}
}