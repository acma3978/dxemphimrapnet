<?php defined('SYSPATH') or die('No direct script access.'); 

class Light_DataWriter_Ad extends Light_DataWriter {

	protected function _get_table_name()
	{
		return 'ad';
	}
	
	protected function _get_fields()
	{
		return array(
			'ad_id'				=> self::UINT,
			'name'				=> self::STRING,
			'description'		=> self::STRING,
			'code'				=> self::STRING,
			'slot'				=> self::STRING,
			'pages'				=> self::STRING,
			'start_date'		=> self::UINT,
			'end_date'			=> self::UINT,
			'display_order'		=> self::UINT,
			'active'			=> self::BOOLEAN,
		);
	}
	
	protected function _get_update_condition()
	{
		return 'ad_id = ' . $this->_db->quote($this->get_existing('ad_id'));
	}
	
	protected function _prepare_save()
	{
		$validation = Validation::factory($this->_new_data)
			->rule('name', 					'min_length', array(':value', 4))
			->rule('name', 					'max_length', array(':value', 150))
			->rule('description', 			'max_length', array(':value', 500))
			->rule('slot', 					'Light_DataWriter_Ad::verify_slot', array(':validation', ':value'))
			->rule('pages', 				'Light_DataWriter_Ad::verify_pages', array(':validation', ':value', $this))	
			->rule('slot', 					'Light_DataWriter::not_empty', array(':validation', ':value', ':field'))
			->rule('code', 					'Light_DataWriter::not_empty', array(':validation', ':value', ':field'))
			->rule('pages', 				'Light_DataWriter::not_empty', array(':validation', ':value', ':field'))
			->rule('name', 					'Light_DataWriter::not_empty', array(':validation', ':value', ':field'))
			->rule('display_order', 		'Light_DataWriter::not_empty', array(':validation', ':value', ':field'))
			
		;
		if($this->is_insert())
		{
			$validation
				->rule('slot', 				'not_empty')
				->rule('code', 				'not_empty')
				->rule('pages', 			'not_empty')
				->rule('name', 				'not_empty')
				->rule('start_date', 		'not_empty')
				->rule('end_date', 			'not_empty')
				->rule('display_order',		'not_empty')
			;
		}
		$validation->check();
		$this->errors($validation->errors('errors'));
	}
	
	public function filter_slot($value)
	{
		return strtolower($value);
	}
	
	public function filter_pages($pages)
	{
		if( is_string($pages))
		{
			$pages = explode(',', $pages);
		}
		$pages = array_map('trim', (array) $pages);
		
		foreach($pages as $page)
		{
			if($page == 'all')
			{
				return 'all';
			}
		}
		return strtolower(implode(',', $pages));
	}
	
	
	public static function verify_slot($validation, $value)
	{
		if($value !== NULL)
		{
			$all_slots = Light_Model::create('Light_Model_Ad')->get_all_ad_slots();
			if( ! in_array($value, $all_slots))
			{
				$validation->errors('slot', 'not_exists');
			}
		}
	}
	
	/**
	 * @param Kohana_Validation
	 * @param string 
	 * @param Light_DataWriter_Ad
	*/
	public static function verify_pages($validation, $value, $dw_ad)
	{
		if($value !== NULL AND $value != 'all')
		{
			if(empty($value))
			{
				$validation->errors('pages', 'not_empty');
				return;
			}
			$pages = explode(',', $value);
			foreach($pages as $page)
			{
				try 
				{
					Route::get($page);
				}
				catch(Exception $e)
				{
					$dw_ad->errors[] = __('Page ":page" not found.', array(':page' => $page));
					break;
					//$validation->errors('pages', 'not_exists');
				}
			}
		}
	}
}