<?php defined('SYSPATH') or die('No direct script access.'); 

class Light_Model_Episode extends Light_Model {
	
	const FETCH_SERVERINFO = 1;
	
	const FETCH_FILMINFO = 2;
	
	/**
	 * Helper method to gets episode info 
	 *
	 * @param integer
	 * @return array|boolean
	*/
	public function get_episode_by_id($episode_id, array $fetch_options = array())
	{
		$conditions = array('episode_id' => $episode_id);
		
		$items = $this->get_episodes($conditions, $fetch_options);
		
		return reset($items);
	}
	
	
	public function prepare_episode_join_options(array $fetch_options)
	{
		$select_fields = '';
		$join_tables = '';
		
		if( ! empty($fetch_options['join']))
		{	
			if($fetch_options['join'] & self::FETCH_SERVERINFO)
			{
				$select_fields .= ',
					server.title AS server_title, server.flag AS server_flag, server.type AS server_type,
					server.active AS server_active
				';
				$join_tables .= '
					LEFT JOIN c_server AS server ON (server.server_id = episode.server_id)
				';
			}
			if($fetch_options['join'] & self::FETCH_FILMINFO)
			{
				$select_fields .= ',
					film.title AS film_title, film.title_o AS film_title_o
				';
				$join_tables .= '
					LEFT JOIN c_film AS film ON (film.film_id = episode.film_id)';
			}
		}
		return array(
			'select_fields' => $select_fields,
			'join_tables'	=> $join_tables,
		);
	}
	
	public function prepare_episode_conditions_for_clause(array $conditions)
	{
		$sql_conditions = array();
		
		foreach(array('film_id', 'server_id', 'episode_id') as $field)
		{
			if(isset($conditions[$field]))
			{
				if(is_array($conditions[$field]))
				{
					$sql_conditions[] = 'episode.' . $field . ' IN (' . implode(',', $this->_db->quote_map($conditions[$field])) . ')';
				}
				else
				{
					$sql_conditions[] = 'episode.' . $field . ' = ' . $this->_db->quote($conditions[$field]);
				}
			}
		}
		
		return $this->get_conditions_for_clause($sql_conditions);
	}
	
	public function get_episodes(array $conditions = array(), array $fetch_options = array())
	{
		$join_options = $this->prepare_episode_join_options($fetch_options);
		$where_clause = $this->prepare_episode_conditions_for_clause($conditions);
		$limit_options = $this->prepare_limit_fetch_options($fetch_options);
		$order_clause = $this->get_order_by_clause($fetch_options, 'episode.episode_id');
		
		return $this->_db->fetch_all($this->limit_query_results('
			SELECT episode.* 
				' . $join_options['select_fields'] . '
			FROM c_episode AS episode
			' . $join_options['join_tables'] . '
			WHERE ' . $where_clause . ' 
			' . $order_clause . '
		', $limit_options['limit'], $limit_options['offset']
		), 'episode_id');
	}
	
	
	/**
	 * Gets all episode of film. 
	 * order by server type (watch, download)
	 * 
	 * @return array
	*/
	public function get_episodes_by_film_id_for_show($film_id)
	{
		return $this->_db->fetch_all('
			SELECT episode.*, 
				server.title AS server_title, server.flag AS server_flag, 
				server.type AS server_type, server.display_order AS server_display_order,
				IF(server.type = \'download\', 1, 0) AS is_download
			FROM c_episode AS episode
			INNER JOIN c_server AS server ON (server.server_id = episode.server_id)
			WHERE episode.film_id = ' . $this->_db->quote($film_id) . ' 
				AND server.active = 1
			ORDER BY server.type ASC, server.display_order ASC, episode.episode ASC,  episode.name
		', 'episode_id');
	}
	
	/**
	 * Gets all episodes of film. This method help to edit/update episode list.
	 *
	 * @param integer 
	 * @return array
	*/
	public function get_episodes_by_film_id($film_id)
	{
		return $this->get_episodes(array('film_id' => $film_id), array(
			'order' => array(
				'episode.episode' => 'ASC',
				'episode.name'	=> 'ASC',
			),
		));
	}
	
	public function get_count_episodes_by_server_id($server_id)
	{
		$count = $this->_db->fetch_one('
			SELECT COUNT(episode.episode_id) AS total
			FROM c_episode AS episode
			WHERE episode.server_id = ' . $this->_db->quote($server_id) . ' 
		');
		return $count['total'];
	}
	
	/**
	 * Get the number of latest episode
	 * If have no entry, return -1
	 * @return integer
	*/
	public function get_episode_latest_by_film_id($film_id)
	{
		$episode_number = $this->_db->fetch_one('
			SELECT MAX(episode.episode) AS episode_latest
			FROM c_episode AS episode
			WHERE episode.film_id = ' . $this->_db->quote($film_id) . '
		');
		if(empty($episode_number))
		{
			$episode_number = -1;
		}
		return $episode_number;
	}
}