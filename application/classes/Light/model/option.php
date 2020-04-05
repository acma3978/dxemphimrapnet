<?php defined('SYSPATH') or die('No direct script access.'); 

class Light_Model_Option extends Light_Model {
	
	/**
	 * Merge new options and save into database
	 *
	 * @param array
	 * @return integer - affected rows
	*/
	public function save(array $new_options)
	{
		$registry_model = $this->_get_registry_model();
		$db_options = (array) $registry_model->get('options', TRUE);
		
		$options = array_merge($db_options, $new_options);
		
		return $registry_model->set('options', $options);
	}
	
	/**
	 * Delete an option by name
	 * @return integer - affected rows
	*/
	public function delete($name)
	{
		$registry_model = $this->_get_registry_model();
		$db_options = $registry_model->get('options', TRUE);
		
		unset($db_options[$name]);
		
		return $registry_model->set('options', $options);
	}
	
	protected function _get_registry_model()
	{
		return Light_Model::create('Light_Model_Registry');
	}
}