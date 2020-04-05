<?php defined('SYSPATH') or die('No direct script access.'); 

class Light_DataWriter_Comment extends Light_DataWriter {

	protected function _get_table_name()
	{
		return 'comment';
	}
	
	protected function _get_fields()
	{
		return array(
			'comment_id'		=> self::UINT,
			'film_id'			=> self::UINT,
			'post_user_id'		=> self::UINT,
			'message'			=> self::STRING,
			'post_date'			=> self::UINT,
			'active'			=> self::BOOLEAN,
			
		);
	}
	
	protected function _get_update_condition()
	{
		return 'comment_id = ' . $this->_db->quote($this->get_existing('comment_id'));
	}
	
	protected function _prepare_save()
	{
		$validation = Validation::factory($this->_new_data)
			->rule('message', 			'min_length', array(':value', 10))
			->rule('message', 			'max_length', array(':value', 1000))
			->rule('post_user_id', 		'Light_DataWriter_User::verify_user_id', array(':validation', ':value', 'post_user_id'))
			->rule('post_user_id',		'Light_DataWriter::not_empty', array(':validation', ':value', ':field'))
			->rule('film_id', 			'Light_DataWriter_Film::verify_film_id', array(':validation', ':value'))
			->rule('film_id',			'Light_DataWriter::not_empty', array(':validation', ':value', ':field'))
		;
		
		if($this->is_insert())
		{
			$validation
				->rule('message', 			'not_empty')
				->rule('post_user_id', 		'not_empty')
				->rule('film_id',			'not_empty')
				->rule('message', 			'not_empty')
			;
		}
		$validation->check();
		$this->errors($validation->errors('errors'));
	}
	
	protected function _post_save()
	{
		if($this->is_insert())
		{
			$this->_get_film_model()->build_comment_count($this->get('film_id'));
		}
	}
	
	protected function _prepare_delete()
	{
		$comment_model = $this->_get_comment_model();
		
		if( ! $this->get('film_id') AND $this->get('comment_id') AND $existing = $comment_model->get_comment_by_id($this->get('comment_id')))
		{
			$this->set_existing($existing);
		}
	}
	
	protected function _post_delete()
	{
		$this->_get_film_model()->build_comment_count($this->get('film_id'));
	}
	
	protected function _get_film_model()
	{
		return $this->_get_model('Light_Model_Film');
	}
	
	protected function _get_comment_model()
	{
		return $this->_get_model('Light_Model_Comment');
	}
}