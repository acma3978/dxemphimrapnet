<?php defined('SYSPATH') or die('No direct script access.'); 

class Light_Model_Actor extends Light_Model {
	
	const FETCH_COUNTRYINFO = 1;
	
	const FETCH_USERINFO = 2;

	/**
	 * Quick update a field of actor
	 *
	 * @return integer	affected rows
	*/
	public function update($actor_id, $field, $value, $raw_value = FALSE)
	{
		return $this->_db->write('
			UPDATE c_actor
			SET `' . $field . '` = ' . ($raw_value ? $value : $this->_db->quote($value)) . '
			WHERE actor_id = ' . $this->_db->quote($actor_id) . '
		');
	}
	
	/**
	 * Helper method to update views for actor and reset views day, week, month
	 *
	 * @return	integer	affected rows
	*/
	public function update_views($actor_id)
	{
		$registry_model = $this->_get_registry_model();
		$current_time = Light_Application::$time;
		$registry_key = 'time_reset_actor_views';
		
		$reset_time = array(
			'day' 	=> 0,
			'week' 	=> 0,
			'month' => 0,
		); 
		try
		{
			$reset_time = $registry_model->get($registry_key);
		}
		catch(Exception $e){}
		
		// day
		if($reset_time['day'] < strtotime('today'))
		{
			$reset_time['day'] = $current_time;
			$this->_db->write('UPDATE c_actor SET `views_day` = 0');
		}
		// week
		$weeks = array(
			1 => $first_day = strtotime('first day of this month 00:00:00', $current_time),
			2 => strtotime('+1 week', $first_day),
			3 => strtotime('+2 week', $first_day),
			4 => strtotime('last day of this month 23:59:59', $current_time),
		);
		for($week = 1; $week < 5; $week ++)
		{
			if($reset_time['week'] < $weeks[$week] AND $current_time > $weeks[$week])
			{
				$reset_time['week'] = $current_time;
				$this->_db->write('UPDATE c_actor SET `views_week` = 0');
			}
		}
		// month
		if($reset_time['month'] < $weeks[1])
		{
			$reset_time['month'] = $current_time;
			$this->_db->write('UPDATE c_actor SET `views_month` = 0');
		}
		// set registry
		$registry_model->set($registry_key, $reset_time);
		
		$dw = Light_DataWriter::create('Light_DataWriter_Actor');
		$dw->set('views', 'views + 1', TRUE);
		$dw->set('views_day', 'views_day + 1', TRUE);
		$dw->set('views_week', 'views_week + 1', TRUE);
		$dw->set('views_month', 'views_month + 1', TRUE);
		$dw->set_existing('actor_id', $actor_id);
		$dw->save();
		
		return $dw->affected_rows();
	}

	/**
	 * Gets array actor's infomation by actor_id
	 *
	 * @param integer
	 * @return array|boolean - FALSE if actor is not exist
	*/
	public function get_actor_by_id($actor_id, array $fetch_options = array())
	{
		$conditions = array('actor_id' => $actor_id);
		if(isset($fetch_options['active_only']))
		{
			$conditions['active'] = 1;
			unset($fetch_options['active_only']);
		}
		$items = $this->get_actors($conditions, $fetch_options);
		
		return reset($items);
	}
	
	/**
	 * Get actors by array actor ids
	 *
	 * @param 	array - Array of actor_id
	 * @return 	array 
	*/

	public function get_actors_by_ids(array $actor_ids, array $fetch_options = array())
	{
		if(empty($actor_ids))
		{
			return array();
		}
		$items = $this->get_actors(array('actor_id' => $actor_ids), $fetch_options);
		return $items;
	}
	
	
	public function prepare_actor_conditions_for_clause(array $conditions)
	{

		$sql_conditions = array();

		foreach(array('actor_id', 'title', 'title_o', 'post_user_id', 'country_id', 'type', 'active', 'year','check_trailer','category_ids') as $field)
		{
			// add suffix "2" for search
			if(isset($conditions[$field. '2']))
			{
				if(is_array($conditions[$field. '2']))
				{

					$sql_conditions[] = 'actor.' . $field . ' LIKE ' . $this->_db->quote_like($conditions[$field.'2'][0], $conditions[$field.'2'][1]);
				}
				else
				{
					$sql_conditions[] = 'actor.' . $field . ' LIKE ' . $this->_db->quote_like($conditions[$field.'2'], 'lr');
				}
			}
			if(isset($conditions[$field]))
			{
				if(is_array($conditions[$field]))
				{

					$sql_conditions[] = 'actor.' . $field . ' IN (' . implode(',', $this->_db->quote_map($conditions[$field])) . ')';
				}
				else
				{
                    $sql_conditions[] = 'actor.' . $field . ' = ' . $this->_db->quote($conditions[$field]);
				}
			}


		}

		// array category

		if(isset($conditions['category_id']))
		{
			$sql_conditions[] = 'FIND_IN_SET(' . $this->_db->quote($conditions['category_id']) . ', actor.category_ids)';
		}

        if (isset($conditions['category_idx'])) {

            $sql_conditions[] = 'actor.category_ids LIKE ' . $this->_db->quote('%'.$conditions['category_idx'].'%') . '';

        }

		// options - by name
		if(isset($conditions['options']))
		{
			if( ! is_numeric($conditions['options']))
			{
				$conditions['options'] = Light_Helper_Film::convert_options_to_bit($conditions['options']);
			}
			$sql_conditions[] = 'actor.options & ' . $this->_db->quote($conditions['options']);
		}
		
		// search actor
		if(isset($conditions['keyword']))
		{
			$keyword = $conditions['keyword'];
			//$keyword = preg_replace('#[^\w]+#u', ' ', $keyword); 
			$keyword = preg_replace('#[\s-]+#u', ' ', $keyword); 
			$keyword = Light_Helper_Unicode::lower($keyword);
			$keyword_ascii = Light_Helper_Base::remove_accent_vn($keyword);
			/*
			$sql_conditions[] = 'MATCH(title_lower, tags, tags_ascii) AGAINST (' . $this->_db->quote($keyword) . ')';
			*/
			
			$words = explode(' ', $keyword);
			$count = count($words);
			// nối mấy từ liền nhau lại với nhau
			$word_len = ($count <= 3) ? 2 : 3; 
			
			$advanced_query = '';
			if($count >= 3)
			{
				$temp = array();
				for($i = 0; $i < $count; $i++)
				{
					$temp[] = $words[$i];
					if(count($temp) >= $word_len)
					{
						$_two_word 		  = $this->_db->quote_like(implode(' ', $temp));
						$_two_word_ascii  = $this->_db->quote_like(Light_Helper_Base::remove_accent_vn($_two_word));
						$advanced_query .= '
							OR actor.title LIKE ' . $_two_word_ascii . '
							OR actor.title_ascii LIKE ' . $_two_word_ascii . '
							OR actor.tags LIKE ' . $_two_word . '
						';	
						$temp = array();
					}
				}
			}
			$sql_conditions[] = '
				actor.title LIKE ' . $this->_db->quote_like($keyword) . '
				OR actor.title_ascii LIKE ' . $this->_db->quote_like($keyword_ascii) . '
				OR FIND_IN_SET(actor.tags, ' . $this->_db->quote($keyword) . ')
				'.($advanced_query ? $advanced_query : '
					OR actor.tags LIKE ' . $this->_db->quote_like($keyword) . '
					OR actor.tags_ascii LIKE ' . $this->_db->quote_like($keyword_ascii) . '
				').'
			';
		
		}
		return $this->get_conditions_for_clause($sql_conditions);
	}
	
	public function prepare_actor_join_options(array $fetch_options)
	{
		$select_fields = '';
		$join_tables = '';

		if( ! empty($fetch_options['join']))
		{	
			if($fetch_options['join'] & self::FETCH_COUNTRYINFO)
			{
				$select_fields .= ',
					country.name AS country_name';
				$join_tables .= '
					LEFT JOIN c_country AS country ON (country.country_id = actor.country_id)';
			}
			if($fetch_options['join'] & self::FETCH_USERINFO)
			{
				$select_fields .= ',
					user.username AS user_username, user.fullname AS user_fullname, user.nickname AS user_nickname';
				$join_tables .= '
					LEFT JOIN c_user AS user ON (user.user_id = actor.post_user_id)';
			}
		}
		return array(
			'select_fields' => $select_fields,
			'join_tables'	=> $join_tables,
		);
	}
	
	protected function _parse_actor_select_fields(array $conditions, array $fetch_options = array())
	{
		$select_fileds = 'actor.*';
		// reduce MySQL load
		if(isset($fetch_options['some_fields']))
		{
			$select_fileds = 'actor.actor_id,actor.title, actor.title_ascii, actor.image, actor.image_url, actor.height,
				actor.weight, actor.information, actor.birthday, actor.sex, actor.last_update,
				actor.star, actor.country_id, actor.tags, actor.tags_ascii,
				actor.views, actor.views_week, actor.views_month, actor.views_day
			';
		}
		if(isset($fetch_options['select_fields']) AND is_array($fetch_options['select_fields']))
		{
			$select_fileds = implode(', ', $fetch_options['select_fields']);
		}
		$select_fileds .= '';
		
		
		/** 
		 * temporary 
		 * $select_fileds = 'actor.title, actor.actor_id';
		 * addition for fulltext search
		if( isset($conditions['keyword']))
		{
			$keyword = $conditions['keyword'];
			$keyword = preg_replace('#[^\w]+#u', ' ', $keyword); 
			$keyword = preg_replace('#[\s-]+#u', ' ', $keyword); 
			$keyword = Light_Helper_Unicode::lower($keyword);
			$keyword_ascii = Light_Helper_Base::remove_accent_vn($keyword);
			
			$select_fileds .= ',
				MATCH(title_lower) AGAINST (' . $this->_db->quote($keyword) . ') AS rel0,
				MATCH(tags) AGAINST (' . $this->_db->quote($keyword) . ') AS rel1,
				MATCH(tags_ascii) AGAINST (' . $this->_db->quote($keyword) . ') AS rel2
			';
		}
		*/
		return $select_fileds;
	}
		

	
	public function get_actors(array $conditions, array $fetch_options = array())
	{
		$join_options = $this->prepare_actor_join_options($fetch_options);

		$where_clause = $this->prepare_actor_conditions_for_clause($conditions);
		$limit_options = $this->prepare_limit_fetch_options($fetch_options);
		$order_clause = $this->get_order_by_clause($fetch_options, 'actor.actor_id');

		/** fulltext search
			$order_clause = 'ORDER BY rel0 DESC, rel1 DESC, rel2 DESC';
		**/
		$select_fileds = $this->_parse_actor_select_fields($conditions, $fetch_options);

		
		return $this->_db->fetch_all($this->limit_query_results('
			SELECT ' . $select_fileds . '
				' . $join_options['select_fields'] . '
			FROM c_actor AS actor
			' . $join_options['join_tables'] . '
			WHERE ' . $where_clause . '
			' . $order_clause . '
		', $limit_options['limit'], $limit_options['offset']
		), 'actor_id');
	}	
	
	public function get_count_actors(array $conditions = array(), array $fetch_options = array())
	{
		$join_options = $this->prepare_actor_join_options($fetch_options);
		$where_clause = $this->prepare_actor_conditions_for_clause($conditions);

		$count = $this->_db->fetch_one('
			SELECT COUNT(actor.actor_id) AS total
			FROM c_actor AS actor
			' . $join_options['join_tables'] . '
			WHERE ' . $where_clause . ' 
		');
		return $count['total'];
	}
	
	
	/**
	 * Gets actor ids has similar title, tags with a actor id
	 *
	 * @param	integer	actor id
	 * @param	integer	limit ids
	 * @return	array	list actor ids
	*/
	public function get_similar_actors($actor_id, $limit = 50)
	{
		$actor = $this->get_actor_by_id($actor_id);
		
		$sql_conditions = array();
		
		$tags = explode(',', $actor['tags']);
		$tags_ascii = explode(',', $actor['tags_ascii']);
		$tags = array_combine($tags, $tags_ascii);
		foreach($tags as $tag => $tag_ascii)
		{
			$sql_conditions[] = 'FIND_IN_SET(' . $this->_db->quote($tag).', actor.tags)';
			//OR FIND_IN_SET(' . $this->_db->quote($tag_ascii) . ', actor.tags_ascii)
		}
		// same actor
		$pattern = str_replace(' ', '\s*', '#(N/?A|Đang cập nhật|Chưa có|Chưa xác định|Unknow|Update|Updating)#iu');
		if( ! preg_match($pattern, $actor['actor']))
		{
			$actors = explode(',', $actor['actor']);
			foreach($actors as $actor)
			{
				$sql_conditions[] = 'actor.actor LIKE '.$this->_db->quote_like($actor, 'lr');
			}
		}
		if(empty($sql_conditions))
		{
			return array();
		}
		
		return $this->_db->fetch_all_keyed('
			SELECT actor.actor_id
			FROM c_actor AS actor
			WHERE (' . implode(' OR ', $sql_conditions) . ')  AND actor.actor_id != ' . $this->_db->quote($actor_id) . '
		', 'actor_id');
	}
	
	/**
	 * Gets array actors by tag_id
	 * @return array
	*/
	public function get_actors_by_tag_id($tag_id, array $fetch_options = array())
	{
		$actor_ids = $this->get_actor_ids_by_tag_id($tag_id);
		
		return $this->_db->get_actors(array('actor_ids' => $actor_ids), $fetch_options);
	}
	
	/**
	 * Get array actor ids
	 * @return array
	*/
	public function get_actor_ids_by_tag_id($tag_id)
	{
		return $this->_db->fetch_all_keyed('
			SELECT actortag.actor_id
			FROM c_actortag AS actortag
			WHERE actortag.tag_id = ' . $this->_db->quote($tag_id) . '
		', 'actor_id');
	}
	
	/**
	 * @return integer
	*/
	public function get_count_actors_by_tag_id($tag_id)
	{
		$count = $this->_db->fetch_one('
			SELECT COUNT(actortag.actor_id) AS total
			FROM c_actortag AS actortag
			WHERE actortag.tag_id = ' . $this->_db->quote($tag_id) . '
		');
		return $count['total'];
	}
	
	/**
	 * @return integer
	*/
	public function get_count_actors_by_category_id($category_id)
	{
		$count = $this->_db->fetch_one('
			SELECT COUNT(actorcategory.actor_id) AS total
			FROM c_actorcategory AS actorcategory
			WHERE actorcategory.category_id = ' . $this->_db->quote($category_id) . '
		');
		
		return $count['total'];
	}

	/**
	 * Gets array poster (have post_count greater than zero)
	 * @return array
	*/
	public function get_posters()
	{
		return $this->_db->fetch_all('
			SELECT user.*
			FROM c_user AS user
			WHERE user.post_count > 0
		', 'user_id');
	}
	
	/**
	 * Gets array value-title actor options for options
	 * @return array
	*/
	public function get_actor_option_options()
	{
		$options = Light_Config::get('bitfields.actor.options');
		$return = array();
		foreach($options as $name => $info)
		{
			$return[$name] = $info['title'];
		}
		return $return;
	}	
	
	/**
	 * @return integer
	*/
	public function build_comment_count($actor_id)
	{
		$count = $this->_get_comment_model()->get_count_comments(array('actor_id' => $actor_id));
		
		$this->_db->write('
			UPDATE c_actor
			SET comment_count = ?
			WHERE actor_id = ?
		', array($count, $actor_id));
		
		return $count;		
	}
	
	/**
	 * @return array actor ids
	*/
	public function build_similar_actors($actor_id)
	{
		$smiliar_actor_ids = $this->get_similar_actors($actor_id);
		
		$this->_db->write('
			UPDATE c_actor
			SET similar_actor_ids = ?
			WHERE actor_id = ?
		', array(implode(',', $smiliar_actor_ids), $actor_id));
		
		return $smiliar_actor_ids;
	}
	
	
	/**
	 * Helper method to add an option of actor
	 *
	 * @param	integer 	actor id
	 * @param	integer		option value 
	 * @return	integer		affected rows
	*/
	public function add_option($actor_id, $bit)
	{
		return $this->_db->write('
			UPDATE c_actor
			SET options = options | ' . $this->_db->quote($bit) . '
			WHERE actor_id = ' . $this->_db->quote($actor_id) . '
		');
	}
	
	/**
	 * Helper method to remove an option of actor
	 *
	 * @param	integer 	actor id
	 * @param	integer		option value 
	 * @return	integer		affected rows
	*/
	public function remove_option($actor_id, $bit)
	{
		return $this->_db->write('
			UPDATE c_actor
			SET options = options & ~ ' . $this->_db->quote($bit) . '
			WHERE actor_id = ' . $this->_db->quote($actor_id) . '
		');
	}

	protected function _get_comment_model()
	{
		return Light_Model::create('Light_Model_Comment');
	}
	
	protected function _get_registry_model()
	{
		return Light_Model::create('Light_Model_Registry');
	}
}