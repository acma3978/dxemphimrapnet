<?php defined('SYSPATH') or die('No direct script access.'); 

class Light_Model_Server extends Light_Model {
	
	
	/**
	 * Get server's info 
	 *
	 * @param integer
	 * @return array
	*/
	public function get_server_by_id($server_id)
	{
		return $this->_db->fetch_one('
			SELECT server.*
			FROM c_server AS server
			WHERE server.server_id = ' . $this->_db->quote($server_id) . '
		');
	}
	
	/**
	 * 
	*/
	public function get_all_servers(array $fetch_options = array())
	{
		$order_clause = $this->get_order_by_clause($fetch_options, 'server.display_order');
		
		return $this->_db->fetch_all('
			SELECT server.*
			FROM c_server AS server
			' . $order_clause . '
		', 'server_id');
	}
	
	/**
	 * Get server is being used with number of episode of it for film_id
	 * @param interger film id
	 * @return array
	*/
	public function get_server_used_by_film_id($film_id)
	{
		return $this->_db->fetch_all('
			SELECT server.server_id, server.title, COUNT(episode.episode_id) AS episode_count
			FROM c_episode AS episode
			LEFT JOIN c_server AS server ON (server.server_id = episode.server_id)
			WHERE episode.film_id = ' . $this->_db->quote($film_id) . '
			GROUP BY episode.server_id
			ORDER BY server.display_order
		');
	}

    public function get_server_die_by_film_id($film_id,$option)
    {
        return $this->_db->fetch_all('
            SELECT server.server_id, server.title, episode.name, episode.episode_die AS episode_die, episode.video_url AS video_url
			FROM c_episode AS episode
			LEFT JOIN c_server AS server ON (server.server_id = episode.server_id)
			WHERE episode.film_id = ' . $this->_db->quote($film_id) . ' AND episode.episode_die = ' . $option . '
			ORDER BY server.display_order
		');
    }
	
	public function get_server_options()
	{
		$servers = $this->get_all_servers();
		$return = array();
		foreach($servers as $server_id => $server)
		{
			$return[$server_id] = $server['title'];
		}
		return $return;
	}
}