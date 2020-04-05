<?php defined('SYSPATH') or die('No direct script access.'); 

class Light_DataWriter_Page extends Light_DataWriter {

	protected function _get_table_name()
	{
		return 'page';
	}
	
	protected function _get_fields()
	{
		return array(
			'page_id'			=> self::UINT,
			'title'				=> self::STRING,
			'title_ascii'		=> self::STRING,
			'keywords'			=> self::STRING, // for SEOing
			'pagetext'			=> self::STRING,
			'post_user_id'		=> self::UINT,
			'active'			=> self::BOOLEAN,
			'post_date'			=> self::UINT,
		);
	}
	
	protected function _get_update_condition()
	{
		return 'page_id = ' . $this->_db->quote($this->get_existing('page_id'));
	}
	
	protected function _prepare_save()
	{
		$validation = Validation::factory($this->_new_data)
			->rule('title', 				'min_length', array(':value', 3))
			->rule('title', 				'max_length', array(':value', 250))		
			->rule('title', 				'Light_DataWriter::not_empty', array(':validation', ':value', ':field'))			
			->rule('post_user_id', 			'Light_DataWriter_User::verify_user_id', array(':validation', ':value', 'post_user_id'))
			->rule('post_user_id',			'Light_DataWriter::not_empty', array(':validation', ':value', ':field'))
			->rule('keywords',				'Light_DataWriter::not_empty', array(':validation', ':value', ':field'))	
		;
		if($this->is_insert())
		{
			$validation
				->rule('title', 			'not_empty')
				->rule('post_user_id', 		'not_empty')
				->rule('pagetext',			'not_empty')
				->rule('keywords',			'not_empty')
			;
		}
		$validation->check();
		$this->errors($validation->errors('errors'));
	}
	
	public function save($do_query = TRUE)
	{
		$start = 2;
		while(true)
		{
			$limit = 30;
			$end = $start + $limit;
			$titles = array('' => $this->title_ascii);
			for($i = $start; $i <= $end; $i ++)
			{
				$titles[$i] = $this->title_ascii . ' ' . $i;
			}
			$titles_not_avaliable = $this->_get_page_model()->get_pages_by_names_ascii($titles);
			unset($titles_not_avaliable[$this->page_id]);
			
			$not_avaliable = array();
			foreach($titles_not_avaliable as $tag)
			{
				$not_avaliable[$tag['name_ascii']] = TRUE;
			}
			foreach($titles as $title)
			{
				if( ! isset($not_avaliable[$title]))
				{
					$this->set('title_ascii', $title);
					break 2;
				}
			}
			$start = $end;
		}
		return parent::save($do_query);
	}
	
	public function filter_title($value)
	{
		$value = Light_Helper_Unicode::lower($value);
		$value = Light_Helper_Unicode::ucwords($value);
		$value = preg_replace('#[\s-]+#u', ' ', $value); 
		
		$this->set('title_ascii', Light_Helper_Base::remove_accent_vn($value));
		
		return $value;
	}
	
	public function filter_keywords($value)
	{
		if(is_string($value))
		{
			$value = explode(',', $value);			
		}
		$value = array_map('trim', (array)$value);
		$value = array_filter($value, 'strlen');
		
		return implode(',', array_unique($value));
	}
	
	protected function _get_page_model()
	{
		return $this->_get_model('Light_Model_Page');
	}
}