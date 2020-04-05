<?php defined('SYSPATH') or die('No direct script access.'); 

class Light_DataWriter_Registry extends Light_DataWriter {

	protected function _get_table_name()
	{
		return 'registry';
	}
	
	protected function _get_fields()
	{
		return array(
			'name'				=> self::STRING,
			'value'				=> self::SERIALIZED,
		
		);
	}
	
	protected function _get_update_condition()
	{
		return 'name = ' . $this->_db->quote($this->get_existing('name'));
	}
	
	protected function _prepare_save()
	{
		$validation = Validation::factory($this->_new_data)
			->rule('name', 					'min_length', array(':value', 4))
			->rule('name', 					'max_length', array(':value', 150))
			->rule('name', 					'Light_DataWriter::not_empty', array(':validation', ':value', ':field'))
			->rule('value', 				'Light_DataWriter::not_empty', array(':validation', ':value', ':field'))		
		;
		if($this->is_insert())
		{
			$validation
				->rule('name', 					'not_empty')
				->rule('value', 				'not_empty')
			;
		}
		
		$validation->check();
		$this->errors($validation->errors('errors'));
	}
	
	public function filter_name($value)
	{
		return strtolower($value);
	}
}