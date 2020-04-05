<?php defined('SYSPATH') or die('No direct script access.'); 

class Light_DataWriter_Category extends Light_DataWriter {

	protected function _get_table_name()
	{
		return 'category';
	}
	
	protected function _get_fields()
	{
		return array(
	 		'category_id'				=> self::UINT,
			'title'						=> self::STRING,
			'title_ascii'				=> self::STRING,
			'description'				=> self::STRING,
			'display_order'				=> self::UINT,
			'film_count'				=> self::UINT,
			'active'					=> self::BOOLEAN,
		);
	}
	
	protected function _get_update_condition()
	{
		return 'category_id = ' . $this->_db->quote($this->get_existing('category_id'));
	}
	
	protected function _prepare_save()
	{
		// common rules
		$validation = Validation::factory($this->_new_data)
			->rule('title', 				'Light_DataWriter::not_empty', array(':validation', ':value', ':field'))
			->rule('title', 				'min_length', array(':value', 4))
			->rule('title', 				'max_length', array(':value', 250))
			->rule('description', 			'Light_DataWriter::not_empty', array(':validation', ':value', ':field'))
			->rule('description', 			'max_length', array(':value', 500))
		;
		// insert rules
		if($this->is_insert())
		{
			$validation
				->rule('title',				'not_empty')
				->rule('description',		'not_empty')	
				->rule('display_order',		'not_empty')
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
			$titles_not_avaliable = $this->_get_category_model()->get_categories_by_titles_ascii($titles);
			unset($titles_not_avaliable[$this->category_id]);
			
			$not_avaliable = array();
			foreach($titles_not_avaliable as $tag)
			{
				$not_avaliable[$tag['title_ascii']] = TRUE;
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
	
	protected function _post_save()
	{
		$this->_get_category_model()->build_film_count($this->category_id);
	}

	protected function _prepare_delete()
	{
		// required fields
		$required_fields = array('category_id', 'film_count');
		$fetch_db = FALSE;
		foreach($required_fields as $field)
		{
			if( ! $this->get_existing($field))
			{
				$fetch_db = TRUE;
				break;
			}
		}
		if($fetch_db)
		{
			$category_model = $this->_get_category_model();
			$category = $category_model->get_category_by_id($this->get_existing('category_id'));
			if(empty($category))
			{
				$this->errors[] = 'Category is not exist.';	
				return;
			}
			$this->set_existing($category);
		}

		$film_count = $this->_get_film_model()->get_count_films_by_category_id($this->category_id);
		
		if($film_count AND Light_Config::get('config.debug') !== TRUE)
		{
			$this->errors[] = 'You cannot delete this category, because it have some films. If you still want to do this, please enable DEBUG mode. Note: This action can only delete from the reference table, do not delete all films of the category.';
		}
	}
	
	protected function _post_delete()
	{
		// do not delete films
		$this->_db->delete('filmcategory', 'category_id = ?', $this->category_id);
	}
	
	
	public function filter_title($value)
	{
		//$value = Light_Helper_Unicode::lower($value);
		//$value = Light_Helper_Unicode::ucwords($value);
		$value = preg_replace('#[\s-]+#u', ' ', $value); 
		
		$this->set('title_ascii', Light_Helper_Base::remove_accent_vn($value));
		
		return $value;
	}
	
	
	protected function _get_film_model()
	{
		return $this->_get_model('Light_Model_Film');
	}
	
	protected function _get_category_model()
	{
		return $this->_get_model('Light_Model_Category');
	}
}