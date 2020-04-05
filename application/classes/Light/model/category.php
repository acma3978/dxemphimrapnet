<?php defined('SYSPATH') or die('No direct script access.'); 

class Light_Model_Category extends Light_Model {
	
	/**
	 * Gets array categrory's infomation by category_id
	 *
	 * @param integer
	 * @return array
	*/
	public function get_category_by_id($category_id)
	{
		return $this->_db->fetch_one('
			SELECT category.*
			FROM c_category AS category
			WHERE category.category_id = ' . $this->_db->quote($category_id) . '
		');
	}
	
	/**
	 * Gets categories by array category ids
	 *
	 * @param array - Array of category ids
	 * @return array - Array of array categories
	*/
	public function get_categories_by_ids(array $category_ids)
	{
		if(empty($category_ids))
		{
			return array();
		}
		return  $this->_db->fetch_all('
			SELECT category.*
			FROM c_category AS category
			WHERE category.category_id IN (' . implode(', ', $this->_db->quote_map($category_ids)) . ')
		', 'category_id');
	}
	
	/**
	 * Gets array categrory's infomation by title_ascii
	 *
	 * @param integer
	 * @return array|boolean
	*/
	public function get_category_by_title_ascii($title_ascii)
	{
		$items = $this->get_categories_by_titles_ascii(array($title_ascii));
		
		return reset($items);
	}
	
	public function get_categories_by_titles_ascii(array $titles_ascii)
	{
		$titles_ascii = array_map('trim', $titles_ascii);
		$titles_ascii = array_filter($titles_ascii, 'strlen');
		
		if(empty($titles_ascii))
		{
			return array();
		}
		return  $this->_db->fetch_all('
			SELECT category.*
			FROM c_category AS category
			WHERE category.title_ascii IN (' . implode(', ', $this->_db->quote_map($titles_ascii)) . ')
		', 'category_id');
	}
	
	/**
	 * Preparing category conditions for clause. This alway returns a value that ca be 
	 * used in a clause such as WHERE
	 * 
	 * @param array
	 * @return string
	*/
	public function prepare_category_conditions_for_clause(array $conditions)
	{
		$sql_conditions = array();
		
		if(isset($conditions['title']))
		{
			$sql_conditions[] = 'category.title LIKE ' . $this->_db->quote_like($conditions['title'], 'lr');
		}
		
		return $this->get_conditions_for_clause($sql_conditions);
	}
	
	public function get_categories(array $conditions = array(), array $fetch_options = array())
	{
		$where_clause = $this->prepare_category_conditions_for_clause($conditions);
		$order_clause = $this->get_order_by_clause($fetch_options, 'category.display_order');
		$limit_options = $this->prepare_limit_fetch_options($fetch_options);
		
		return $this->_db->fetch_all($this->limit_query_results('
			SELECT category.*
			FROM c_category AS category
			WHERE ' . $where_clause . ' 
			' . $order_clause . '
		', $limit_options['limit'], $limit_options['offset']
		),  'category_id');
	}
	
	public function get_count_categories(array $conditions = array(), array $fetch_options = array())
	{
		$where_clause = $this->prepare_category_conditions_for_clause($conditions);
		$count = $this->_db->fetch_one('
			SELECT COUNT(category.category_id) AS total
			FROM c_category AS category
			WHERE ' . $where_clause . ' 
		');
		return $count['total'];
	}
	
	/**
	 * Return array categories listed by category_id
	 *
	 * @return array
	*/
	public function get_all_categories(array $fetch_options = array())
	{
		$order_clause = $this->get_order_by_clause($fetch_options, 'category.display_order');
		
		return  $this->_db->fetch_all('
			SELECT category.*
			FROM c_category AS category
			' . $order_clause . '
		', 'category_id');
	}
	
	/**
	 * Gets all categories by array id-title pairs for options
	 * @return array
	*/
	public function get_category_options()
	{
		$categories = $this->get_all_categories();
		$items = array();
		foreach($categories as $category_id => $category)
		{
			$items[$category_id] = $category['title'];
		}
		return $items;
	}

	/**
	 * @return integer
	*/
	public function build_film_count($category_id)
	{
		$count = $this->_get_film_model()->get_count_films_by_category_id($category_id);
		
		$this->_db->write('
			UPDATE c_category
			SET film_count = ?
			WHERE category_id = ?
		', array($count, $category_id));
		
		return $count;
	}
	
	protected function _get_film_model()
	{
		return Light_Model::create('Light_Model_Film');
	}
}