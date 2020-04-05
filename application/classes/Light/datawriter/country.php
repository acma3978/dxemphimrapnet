<?php defined('SYSPATH') or die('No direct script access.'); 
/**
 * Light DataWriter User
 * 
 * @package: 	Light
 * @author:		Phan Thanh Cong <chiplove.9xpro@gmail.com>
 * @version:	1.0
 * @release:	Sep 13, 2012
*/
class Light_DataWriter_Country extends Light_DataWriter {

	protected function _get_table_name()
	{
		return 'country';
	}
	
	protected function _get_fields()
	{
		return array(
	 		'country_id'		=> self::UINT,
			'name'				=> self::STRING,
			'name_ascii'		=> self::STRING,
			'description'		=> self::STRING,
			'display_order'		=> self::UINT,
			'film_count'		=> self::UINT,
			'active'			=> self::BOOLEAN,
		);
	}
	
	protected function _get_update_condition()
	{
		return 'country_id = ' . $this->_db->quote($this->get_existing('country_id'));
	}
	
	
	protected function _prepare_save()
	{
		// common rules
		$validation = Validation::factory($this->_new_data)
			->rule('name', 					'Light_DataWriter::not_empty', array(':validation', ':value', ':field'))
			->rule('name', 					'min_length', array(':value', 2))
			->rule('name', 					'max_length', array(':value', 100))
			->rule('description', 			'Light_DataWriter::not_empty', array(':validation', ':value', ':field'))
			->rule('description', 			'max_length', array(':value', 500))
		;
		// insert rules
		if($this->is_insert())
		{
			$validation
				->rule('name', 			'not_empty')
				->rule('description', 	'not_empty')
			;
		}
		$validation->check();
		$this->errors($validation->errors('errors'));
	}

	public function filter_name($value)
	{
		$value = Light_Helper_Unicode::lower($value);
		$value = Light_Helper_Unicode::ucwords($value);
		$value = preg_replace('#[\s-]+#u', ' ', $value); 
		
		$this->set('name_ascii', Light_Helper_Base::remove_accent_vn($value));
		
		return $value;
	}
	
	public function save($do_query = TRUE)
	{
		$start = 2;
		while(true)
		{
			$limit = 30;
			$end = $start + $limit;
			$titles = array('' => $this->name_ascii);
			for($i = $start; $i <= $end; $i ++)
			{
				$titles[$i] = $this->name_ascii . ' ' . $i;
			}
			$titles_not_avaliable = $this->_get_country_model()->get_countries_by_names_ascii($titles);
			unset($titles_not_avaliable[$this->country_id]);
			
			$not_avaliable = array();
			foreach($titles_not_avaliable as $tag)
			{
				$not_avaliable[$tag['name_ascii']] = TRUE;
			}
			foreach($titles as $title)
			{
				if( ! isset($not_avaliable[$title]))
				{
					$this->set('name_ascii', $title);
					break 2;
				}
			}
			$start = $end;
		}
		return parent::save($do_query);
	}
	
	protected function _post_save()
	{
		$this->_get_country_model()->build_film_count($this->country_id);
	}

	protected function _prepare_delete()
	{
		// required fields
		$required_fields = array('country_id', 'film_count');
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
			$country_model = $this->_get_country_model();
			$country = $country_model->get_country_by_id($this->get_existing('country_id'));
			if(empty($country))
			{
				$this->errors[] = 'Country is not exist.';	
				return ;
			}
			$this->set_existing($country);
		}

		$film_count = $this->_get_film_model()->get_count_films(array('country_id' => $this->country_id));
		
		if($film_count AND Light_Config::get('config.debug') !== TRUE)
		{
			$this->errors[] = 'You cannot delete this country, because it have some films. If you still want to do this, please enable DEBUG Mode. Note: This action will delete all films of the country.';
		}
	}
	
	protected function _post_delete()
	{
		$films = $this->_get_film_model()->get_films(array(
			'country_id' => $this->country_id
		));
		foreach($films as $film)
		{
			$dw = Light_DataWriter::create('Light_DataWriter_Film');
			$dw->set_existing($film);
			$dw->delete();
		}
	}
	
	protected function _get_film_model()
	{
		return $this->_get_model('Light_Model_Film');
	}
	
	/**
	 * Check the country already exists or not.
	 * If it is NOT already exists then add error to validation
	*/
	public static function verify_country_id($validation, $country_id)
	{
		if($country_id !== NULL)
		{
			$country_model = Light_Model::create('Light_Model_Country');
			
			$country_model->get_country_by_id($country_id)
				? FALSE
				: $validation->error('country_id', 'not_exists');
		}
	}
	
	protected function _get_country_model()
	{
		return $this->_get_model('Light_Model_Country');
	}
}