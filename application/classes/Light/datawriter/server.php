<?php defined('SYSPATH') or die('No direct script access.'); 

class Light_DataWriter_Server extends Light_DataWriter {

	protected function _get_table_name()
	{
		return 'server';
	}
	
	protected function _get_fields()
	{
		return array(
			'server_id'			=> self::UINT,
			'title'				=> self::STRING,
			'flag'				=> self::STRING,
			'type'				=> self::STRING,	// "watch" or "download"
			'active'			=> self::BOOLEAN,
			'display_order'		=> self::UINT,
		);
	}
	
	protected function _get_update_condition()
	{
		return 'server_id = ' . $this->_db->quote($this->get_existing('server_id'));
	}
	
	protected function _prepare_save()
	{
		// common rules
		$validation = Validation::factory($this->_new_data)
			->rule('title',				'Light_DataWriter::not_empty', array(':validation', ':value', ':field'))
			->rule('title', 			'min_length', array(':value', 2))
			->rule('title', 			'max_length', array(':value', 100))
			->rule('type', 				'in_array', array(':value', array('download', 'watch')))
		;
				// insert rules
		if($this->is_insert())
		{
			$validation
				->rule('title', 		'not_empty')
				->rule('type', 			'not_empty')
				->rule('flag', 			'not_empty')
			;
		}
		$validation->check();
		$this->errors($validation->errors('errors'));
	}
	
	protected function _prepare_delete()
	{
		$server_model = $this->_get_server_model();
		$server = $server_model->get_server_by_id($this->get_existing('server_id'));
		if(empty($server))
		{
			$this->errors[] = 'Server is not exist.';	
		}
		
		$episode_count = $this->_get_episode_model()->get_count_episodes_by_server_id($this->server_id);
		
		if($episode_count AND Light_Config::get('config.debug') !== TRUE)
		{
			$this->errors[] = 'You cannot delete this server, because its have some episode. If you still want to do this, please enable DEBUG Mode. Note: This action will delete all episodes of the server.';
		}	
	}
	
	protected function _post_delete()
	{
		// Delete all episodes
		$this->_db->delete('episode', 'server_id = ?', $this->server_id);
	}
	
	/**
	 * Check the server_id already exists or not.
	 * If it is NOT already exists then add error to validation
	*/
	public static function verify_server_id($validation, $server_id)
	{
		if($server_id !== NULL)
		{
			$server_model = Light_Model::create('Light_Model_Server');
			
			$server_model->get_server_by_id($server_id)
				? FALSE
				: $validation->error('server_id', 'not_exists');
		}
	}
	
	protected function _get_episode_model()
	{
		return $this->_get_model('Light_Model_Episode');
	}
	
	protected function _get_server_model()
	{
		return $this->_get_model('Light_Model_Server');
	}
	
}