<?php defined('SYSPATH') or die('No direct script access.'); 

class Light_DataWriter_Tag extends Light_DataWriter {

	protected function _get_table_name()
	{
		return 'tag';
	}
	
	protected function _get_fields()
	{
		return array(
	 		'tag_id'			=> self::UINT,
			'title'				=> self::STRING,
			'title_ascii'		=> self::STRING,
			'used_count'		=> self::UINT,
		);
	}
	
	protected function _get_update_condition()
	{
		return 'tag_id = ' . $this->_db->quote($this->get_existing('tag_id'));
	}


	protected function _prepare_save()
	{
		if($this->is_insert())
		{
			$validation = Validation::factory($this->_new_data)
				->rule('title',		'not_empty')
			;

			$validation->check();
			$this->errors($validation->errors('errors'));
		}
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
			$titles_not_avaliable = $this->_get_tag_model()->get_tags_by_titles_ascii($titles);
			unset($titles_not_avaliable[$this->tag_id]);
			
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
		// to do ?
	}

	/*public function filter_title($value)
	{
		$value = Light_Helper_Tag::sanitize_title($value);
		
		$title_ascii = Light_Helper_Base::remove_accent_vn($value);
		
		$this->set('title_ascii', $title_ascii);
		return $value;
	}*/
	
	
	protected function _get_tag_model()
	{
		return $this->_get_model('Light_Model_Tag');
	}
}