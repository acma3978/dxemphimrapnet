<?php defined('SYSPATH') or die('No direct script access.'); 

class Light_Model_Tag extends Light_Model {
	
	/**
	 * Gets array tag's infomation by tag_id
	 *
	 * @param 	integer
	 * @return 	array|boolean
	*/
	public function get_tag_by_id($tag_id, array $fetch_options = array())
	{
		$items = $this->get_tags(array('title' => $title), $fetch_options);
		
		return reset($items);
	}
	
	/**
	 * Gets array tag's infomation by title
	 *
	 * @param 	string
	 * @return 	array|boolean
	*/
	public function get_tag_by_title($title, array $fetch_options = array())
	{
		$items = $this->get_tags(array('title' => $title), $fetch_options);
		
		return reset($items);
	}
	
	/**
	 * Gets array tags' infomation by title without accent (vietnam language)
	 *
	 * @param 	string
	 * @return 	array|boolean
	*/
	public function get_tag_by_title_ascii($title_ascii, array $fetch_options = array())
	{
		$items = $this->get_tags(array('title_ascii' => $title_ascii), $fetch_options);
		
		return reset($items);
	}
	
	/**
	 * Get tags by array titles without accent (vietnam language)
	 *
	 * @param 	array
	 * @return 	array
	*/
	public function get_tags_by_titles_ascii(array $titles_ascii, array $fetch_options = array())
	{
		$titles_ascii = array_map('trim', $titles_ascii);
		$titles_ascii = array_filter($titles_ascii, 'strlen');
		
		if(empty($titles_ascii))
		{
			return array();
		}
		return $this->get_tags(array('title_ascii' => $titles_ascii), $fetch_options);
	}
	
	/**
	 * Get tags by array ids
	 *
	 * @param 	array 	Array of tag_id
	 * @return 	array	Array of array tags
	*/
	public function get_tags_by_ids(array $tag_ids)
	{
		if(empty($tag_ids))
		{
			return array();
		}
		return $this->get_tags(array('tag_id' => $titles), $fetch_options);
	}
	
	/**
	 * Get tags by array titles
	 *
	 * @param 	array	Array of titles
	 * @return 	array 	Array of array titles
	*/
	public function get_tags_by_titles(array $titles, array $fetch_options = array())
	{

		$titles = array_map('trim', $titles);
		$titles = array_filter($titles, 'strlen');

		if(empty($titles))
		{
			return array();
		}
		return $this->get_tags(array('title' => $titles), $fetch_options);
	}
	
	public function prepare_tag_conditions_for_clause(array $conditions)
	{
		$sql_conditions = array();
		
		foreach(array('tag_id', 'title', 'title_ascii') as $field)
		{
			// add suffix "2" for search
			if(isset($conditions[$field. '2']))
			{
				if(is_array($conditions[$field. '2']))
				{
					$sql_conditions[] = 'tag.' . $field . ' LIKE ' . $this->_db->quote_like($conditions[$field.'2'][0], $conditions[$field.'2'][1]);
				}
				else
				{
					$sql_conditions[] = 'tag.' . $field . ' LIKE ' . $this->_db->quote_like($conditions[$field.'2'], 'lr');
				}
			}
			if(isset($conditions[$field]))
			{
				if(is_array($conditions[$field]))
				{
					$sql_conditions[] = 'tag.' . $field . ' IN (' . implode(',', $this->_db->quote_map($conditions[$field])) . ')';
				}
				else
				{
					$sql_conditions[] = 'tag.' . $field . ' = ' . $this->_db->quote($conditions[$field]);
				}
			}
		}
		return $this->get_conditions_for_clause($sql_conditions);
	}
	
	public function get_tags(array $conditions = array(), $fetch_options = array())
	{
		$limit_options = $this->prepare_limit_fetch_options($fetch_options);
		$order_clause = $this->get_order_by_clause($fetch_options, 'tag.tag_id');
		$where_clause = $this->prepare_tag_conditions_for_clause($conditions);

		return $this->_db->fetch_all($this->limit_query_results('
			SELECT tag.*
			FROM c_tag AS tag
			WHERE ' . $where_clause . '
			' . $order_clause . '
		', $limit_options['limit'], $limit_options['offset']
		), 'tag_id');
	}
	
	public function get_count_tags(array $conditions = array(), $fetch_options = array())
	{
		$where_clause = $this->prepare_tag_conditions_for_clause($conditions);
		
		$count = $this->_db->fetch_one('
			SELECT COUNT(tag.tag_id) AS total
			FROM c_tag AS tag
			WHERE ' . $where_clause . '
		');
		return $count['total'];
	}
	
	/**
	 * Rebuild used_count of the tag
	 *
	 * @return 	integer	Used count of the tag_id
	*/
	public function build_used_count($tag_id)
	{
		$count = $this->_get_film_model()->get_count_films_by_tag_id($tag_id);
		$this->_db->write('
			UPDATE c_tag
			SET used_count = ?
			WHERE tag_id = ?
		', array($count, $tag_id));
		
		return $count;
	}
	
	/**
	 * Delete all tags are not used
	 *
	 * @return 	integer	Affected rows
	*/
	public function delete_tags_are_not_used()
	{
		return $this->_db->delete('tag', 'used_count = 0');
	}
	
	
	protected function _get_film_model()
	{
		return Light_Model::create('Light_Model_Film');
	}
}