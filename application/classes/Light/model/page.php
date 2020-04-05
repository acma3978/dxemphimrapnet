<?php defined('SYSPATH') or die('No direct script access.'); 

class Light_Model_Page extends Light_Model {
	
	const FETCH_USERINFO = 1;
	
	
	/**
	 * Quick update a field of page
	 *
	 * @return integer	affected rows
	*/
	public function update($page_id, $field, $value)
	{
		return $this->_db->write('
			UPDATE c_page
			SET `' . $field . '` = ' . $this->_db->quote($value) . '
			WHERE page_id = ' . $this->_db->quote($page_id) . ' 
		');
	}
	
	/**
	 * @return array|boolean
	*/
	public function get_page_by_id($page_id, array $fetch_options = array())
	{
		$items = $this->get_pages(array('page_id' => $page_id), $fetch_options);
		
		return reset($items);
	}
	
	public function get_pages_by_names_ascii(array $titles_ascii)
	{
		$titles_ascii = array_map('trim', $titles_ascii);
		$titles_ascii = array_filter($titles_ascii, 'strlen');
		
		if(empty($titles_ascii))
		{
			return array();
		}
		return  $this->_db->fetch_all('
			SELECT page.*
			FROM c_page AS page
			WHERE page.title_ascii IN (' . implode(', ', $this->_db->quote_map($titles_ascii)) . ')
		', 'page_id');
	}
	
	public function prepare_page_join_options(array $fetch_options)
	{
		$select_fields = '';
		$join_tables = '';
		
		if( ! empty($fetch_options['join']))
		{	
			if($fetch_options['join'] & self::FETCH_USERINFO)
			{
				$select_fields .= ',
					user.username AS post_username, user.fullname AS post_userfullname';
				$join_tables .= '
					LEFT JOIN c_user AS user ON (user.user_id = page.post_user_id)';
			}
		}
		return array(
			'select_fields' => $select_fields,
			'join_tables'	=> $join_tables,
		);
	}
	
	public function prepare_page_condition_for_clause(array $conditions)
	{
		$sql_conditions = array();
		if(isset($conditions['page_id']))
		{
			$sql_conditions[] = 'page.page_id = ' . $this->_db->quote($conditions['page_id']);
		}
		if(isset($conditions['active']))
		{
			$sql_conditions[] = 'page.active = ' . $this->_db->quote($conditions['active']);
		}
		if(isset($conditions['keyword']))
		{
			$sql_conditions[] = '(
				page.title LIKE ' . $this->_db->quote_like($conditions['keyword']) . '
				OR page.title_ascii LIKE ' . $this->_db->quote_like($conditions['keyword']) . '
			)';
		}
		return $this->get_conditions_for_clause($sql_conditions);
	}
	
	
	public function get_pages(array $conditions, array $fetch_options = array())
	{
		$where_clause = $this->prepare_page_condition_for_clause($conditions);
		$order_clause = $this->get_order_by_clause($fetch_options, 'page.page_id');
		$join_options = $this->prepare_page_join_options($fetch_options);

		return  $this->_db->fetch_all('
			SELECT page.*
				' . $join_options['select_fields'] . '
			FROM c_page AS page
				' . $join_options['join_tables'] . '
			WHERE ' . $where_clause . '
			' . $order_clause . '
		', 'page_id');
	}
	
	public function get_count_pages(array $conditions, array $fetch_options = array())
	{
		$where_clause = $this->prepare_page_condition_for_clause($conditions);
		$join_options = $this->prepare_page_join_options($fetch_options);
		
		$count = $this->_db->fetch_one('
			SELECT COUNT(page.page_id) AS total
			FROM c_page AS page
			WHERE ' . $where_clause . '
				' . $join_options['join_tables'] . '
		');
		
		return $count['total'];
	}
	
	
	/**
	 * @return array
	*/
	public function get_all_pages(array $fetch_options = array())
	{
		$order_clause = $this->get_order_by_clause($fetch_options, 'page.display_order');
		
		return  $this->_db->fetch_all('
			SELECT page.*
			FROM c_page AS page
			' . $order_clause . '
		', 'page_id');
	}
	
}