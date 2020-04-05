<?php defined('SYSPATH') or die('No direct script access.'); 

class Light_DataWriter_Episode extends Light_DataWriter {

	protected function _get_table_name()
	{
		return 'episode';
	}
	
	protected function _get_fields()
	{
		return array(
	 		'episode_id'		=> self::UINT,
			'episode'			=> self::UINT,	// = 0 if server is full
			'name'				=> self::STRING,
			'film_id'			=> self::UINT,
			'server_id'			=> self::UINT,
			'video_url'			=> self::STRING,
            'episode_die'			=> self::UINT,
			'post_date'			=> self::UINT,
			'last_update'		=> self::UINT,
		);
	}
	
	protected function _get_update_condition()
	{
		return 'episode_id = ' . $this->_db->quote($this->get_existing('episode_id'));
	}
	
	protected function _prepare_save()
	{
		// common rules
		$validation = Validation::factory($this->_new_data)
			->rule('episode',				'Light_DataWriter::not_empty', array(':validation', ':value', ':field'))
			->rule('name',					'Light_DataWriter::not_empty', array(':validation', ':value', ':field'))
			->rule('film_id',				'Light_DataWriter_Film::verify_film_id', array(':validation', ':value'))	
			->rule('server_id',				'Light_DataWriter_Server::verify_server_id', array(':validation', ':value'))	
			->rule('video_url', 			'max_length', array(':value', 500))	
		;
				// insert rules
		if($this->is_insert())
		{
			$validation
				->rule('name',				'not_empty')
				->rule('video_url', 		'not_empty')
				->rule('film_id', 			'not_empty')
				->rule('server_id', 		'not_empty')
			;
		}
		$validation->check();
		$this->errors($validation->errors('errors'));
	}
	
	
	public function filter_video_url($value)
	{
		$value = trim($value);
		if(	preg_match('#https?://www\.youtube\.com/embed/([^"]+)#i', $value, $match)
			OR 	preg_match('#https?://www\.youtube\.com/v/([^\?]+)#i', $value, $match)
			OR	preg_match('#https?://www\.youtube\.com/watch\?(?:[^v]*)?v=(.+)#i', $value, $match)
		)
		{
			$id = preg_replace('#(.+?)(&.*)?#i', '$1', $match[1]);
			$id = preg_replace('#\#.*?#', '', $id);
			return 'http://www.youtube.com/watch?v='.$id;
		}
		if( stripos($value, 'http') !== 0)
		{
			return '';
		}
		return $value;
	}
}