<?php defined('SYSPATH') or die('No direct script access.'); 

class Light_Model_Actor extends Light_Model {

    const FETCH_FILMACTOR = 1;
	
	/**
	 * Gets array actor's infomation by actor_id
	 *
	 * @param 	integer
	 * @return 	array|boolean
	*/

	public function related_posts_title($title_ascii, array $fetch_options = array()){

	}

    public function get_actor_info_by_actor_id($actor_id, array $fetch_options = array())
    {
		$items = $this->get_actors(array('actor_id' => $actor_id), $fetch_options);

		return reset($items);
    }

	/**
	 * Gets array actor's infomation by title
	 *
	 * @param 	string
	 * @return 	array|boolean
	*/
	public function get_actor_by_title($title, array $fetch_options = array())
	{
		$items = $this->get_actors(array('title' => $title), $fetch_options);
		
		return reset($items);
	}
	
	/**
	 * Gets array actors' infomation by title without accent (vietnam language)
	 *
	 * @param 	string
	 * @return 	array|boolean
	*/
	public function get_actor_by_title_ascii($title_ascii, array $fetch_options = array())
	{
		$items = $this->get_actors(array('title_ascii' => $title_ascii), $fetch_options);
		
		return reset($items);
	}
	
	/**
	 * Get actors by array titles without accent (vietnam language)
	 *
	 * @param 	array
	 * @return 	array
	*/
	public function get_actors_by_titles_ascii(array $titles_ascii, array $fetch_options = array())
	{
		$titles_ascii = array_map('trim', $titles_ascii);
		$titles_ascii = array_filter($titles_ascii, 'strlen');
		
		if(empty($titles_ascii))
		{
			return array();
		}
		return $this->get_actors(array('title_ascii' => $titles_ascii), $fetch_options);
	}
    public function get_actors_by_titles(array $titles, array $fetch_options = array())
    {
        $titles = array_map('trim', $titles);
        $titles = array_filter($titles, 'strlen');

        if(empty($titles))
        {
            return array();
        }
        return $this->get_actors(array('title' => $titles), $fetch_options);
    }
	/**
	 * Get actors by array ids
	 *
	 * @param 	array 	Array of actor_id
	 * @return 	array	Array of array actors
	*/
	public function get_actors_by_ids(array $actor_ids)
	{
		if(empty($actor_ids))
		{
			return array();
		}
		return $this->get_actors(array('actor_id' => $titles), $fetch_options);
	}
	
	/**
	 * Get actors by array titles
	 *
	 * @param 	array	Array of titles
	 * @return 	array 	Array of array titles
	*/

	public function update_views($actor_id)
	{
		$registry_model = $this->_get_registry_model();
		$current_time = Light_Application::$time;
		$registry_key = 'time_reset_film_views';

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

	public function prepare_actor_conditions_for_clause(array $conditions)
	{
		$sql_conditions = array();

		foreach(array('actor_id', 'title', 'title_ascii','post_user_id','active') as $field)
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
		return $this->get_conditions_for_clause($sql_conditions);
	}

    public function prepare_actor_join_options(array $fetch_options)
    {
        $select_fields = '';
        $join_tables = '';

        if( ! empty($fetch_options['join']))
        {
            if($fetch_options['join'] & self::FETCH_FILMACTOR)
            {
                $select_fields .= ',
					fact.actor_id AS actor_id';
                $join_tables .= '
					LEFT JOIN c_filmactor AS fact ON (fact.actor_id = actor.actor_id)';
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
            $select_fileds = 'actor.title, actor.title_ascii, actor.height,
				actor.weight, actor.birthday, actor.country_id, actor.post_user_id,actor.views,
				actor.star, actor.sex, actor.post_date, actor.last_update,actor.used_count,actor.active
			';
        }
        if(isset($fetch_options['select_fields']) AND is_array($fetch_options['select_fields']))
        {
            $select_fileds = implode(', ', $fetch_options['select_fields']);
        }
        //$select_fileds .= ', actor.type';


        /**
         * temporary
         * $select_fileds = 'film.title, film.film_id';
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
	
	public function get_actors(array $conditions = array(), $fetch_options = array())
	{
        $join_options = $this->prepare_actor_join_options($fetch_options);

		$limit_options = $this->prepare_limit_fetch_options($fetch_options);
		$order_clause = $this->get_order_by_clause($fetch_options, 'actor.actor_id');
		$where_clause = $this->prepare_actor_conditions_for_clause($conditions);

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

    public function get_all_actors(array $fetch_options = array())
    {
        $order_clause = $this->get_order_by_clause($fetch_options, 'actor.post_date');

        return  $this->_db->fetch_all('
			SELECT actor.*
			FROM c_actor AS actor
			' . $order_clause . '
		', 'actor_id');
    }
	
	public function get_count_actors(array $conditions = array(), $fetch_options = array())
	{
		$where_clause = $this->prepare_actor_conditions_for_clause($conditions);
		
		$count = $this->_db->fetch_one('
			SELECT COUNT(actor.actor_id) AS total
			FROM c_actor AS actor
			WHERE ' . $where_clause . '
		');
		return $count['total'];
	}
	
	/**
	 * Rebuild used_count of the actor
	 *
	 * @return 	integer	Used count of the actor_id
	*/
	public function build_used_count($actor_id)
	{
		$count = $this->_get_film_model()->get_count_films_by_actor_id($actor_id);

		$this->_db->write('
			UPDATE c_actor
			SET used_count = ?
			WHERE actor_id = ?
		', array($count, $actor_id));

		return $count;
	}
	
	/**
	 * Delete all actors are not used
	 *
	 * @return 	integer	Affected rows
	*/
	public function delete_actors_are_not_used()
	{
		return $this->_db->delete('actor', 'used_count = 0');
	}

	protected function _get_registry_model()
	{
		return Light_Model::create('Light_Model_Registry');
	}

	protected function _get_film_model()
	{
		return Light_Model::create('Light_Model_Film');
	}
}