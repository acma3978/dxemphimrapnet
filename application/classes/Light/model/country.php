<?php defined('SYSPATH') or die('No direct script access.'); 

class Light_Model_Country extends Light_Model {
	
	/**
	 * Gets array country infomation by country_id
	 *
	 * @param integer
	 * @return array
	*/
	public function get_country_by_id($country_id)
	{
		return $this->_db->fetch_one('
			SELECT country.*
			FROM c_country AS country
			WHERE country.country_id = ' . $this->_db->quote($country_id) . '
		');
	}
	
	/**
	 * Return array countries listed by country_id
	 *
	 * @return array
	*/
	public function get_all_countries(array $fetch_options = array())
	{
		$order_clause = $this->get_order_by_clause($fetch_options, 'country.display_order');
		
		return  $this->_db->fetch_all('
			SELECT country.*
			FROM c_country AS country
			' . $order_clause . '
		', 'country_id');
	}
	
	public function get_country_by_name_ascii($name_ascii)
	{
		$items = $this->get_countries_by_names_ascii(array($name_ascii));
		
		return reset($items);
	}
	
	
	public function get_countries_by_names_ascii(array $names_ascii)
	{
		$names_ascii = array_map('trim', $names_ascii);
		$names_ascii = array_filter($names_ascii, 'strlen');
		
		if(empty($names_ascii))
		{
			return array();
		}
		return  $this->_db->fetch_all('
			SELECT country.*
			FROM c_country AS country
			WHERE country.name_ascii IN (' . implode(', ', $this->_db->quote_map($names_ascii)) . ')
		', 'country_id');
	}
	
	/**
	 * Return array country_id -> name pairs
	 * @return array
	*/
	public function get_country_options()
	{
		$countries = $this->get_all_countries();
		$items = array();
		foreach($countries as $country_id => $country)
		{
			$items[$country_id] = $country['name'];
		}
		return $items;
	}
	
	
	
	public function build_film_count($country_id)
	{
		$count = $this->_get_film_model()->get_count_films(array('country_id' => $country_id));
		
		$this->_db->write('
			UPDATE c_country
			SET film_count = ?
			WHERE country_id = ?
		', array($count, $country_id));
		
		return $count;	
	}
	
	protected function _get_film_model()
	{
		return Light_Model::create('Light_Model_Film');
	}
}