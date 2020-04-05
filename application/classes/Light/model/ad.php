<?php defined('SYSPATH') or die('No direct script access.'); 

class Light_Model_Ad extends Light_Model {
	
	public function get_ad_by_id($ad_id)
	{
		return $this->_db->fetch_one('
			SELECT ad.*
			FROM c_ad AS ad
			WHERE ad.ad_id = ' . $this->_db->quote($ad_id) . '
		');
	}
	
	public function prepare_ad_condition_for_clause(array $conditions)
	{
		$sql_conditions = array();
		if(isset($conditions['active']))
		{
			$sql_conditions[] = 'ad.active = ' . $this->_db->quote($conditions['active']);
		}
		if(isset($conditions['start_date']))
		{
			$sql_conditions[] = 'ad.start_date > ' . $this->_db->quote($conditions['start_date']);
		}
		if(isset($conditions['end_date']))
		{
			$sql_conditions[] = 'ad.end_date < ' . $this->_db->quote($conditions['end_date']);
		}
		
		return $this->get_conditions_for_clause($sql_conditions);
	}
	
	public function get_ads(array $conditions, array $fetch_options = array())
	{
		$where_clause = $this->prepare_ad_condition_for_clause($conditions);
		$order_clause = $this->get_order_by_clause($fetch_options, 'ad.display_order');

		return  $this->_db->fetch_all('
			SELECT ad.*
			FROM c_ad AS ad
			WHERE ' . $where_clause . '
			' . $order_clause . '
		', 'ad_id');
	}
	
	/**
	 *
	 * @return array
	*/
	public function get_all_ads(array $fetch_options = array())
	{
		$order_clause = $this->get_order_by_clause($fetch_options, 'ad.display_order');
		
		return  $this->_db->fetch_all('
			SELECT ad.*
			FROM c_ad AS ad
			' . $order_clause . '
		', 'ad_id');
	}
	
	
	/**
	 * Return all ad pages for option
	 * @return array
	*/
	public function get_all_ad_pages()
	{
		return array(
			'home'	=> 'Trang chủ',
			'film'  => 'Trang thông tin phim',
			'watch' => 'Trang xem phim',
			'list'  => 'Trang danh sách phim',
			'all'	=> 'Toàn bộ trang',
		);
	}
	/**
	 * Get all ad slot for option
	 * @return array
	*/
	public function get_all_ad_slots()
	{
		return array(
			'ad_header',			// cạnh logo
			'ad_above_of_content',	// hiển thị toàn page - dưới menu
			'ad_home_1',			// ở trang home
			'ad_info_1',			// banner ở dưới nút xem phim
			'ad_sidebar',			//
			'ad_above_of_player',	// trên player
			'ad_below_of_player',	// dưới player
			'ad_below_of_content',	// dưới nội dung 
			'ad_preload',
			'ad_float',
			'ad_textlink',			// text link

            'ad_xpch_left',			// text link
            'ad_xpch_right',			// text link
            'slider_film',			// text link
            'slider_hautruong',			// text link
            'ad_button_of_play',			// text link
            'ad_button_of_afterSocial',			// text link
		);
	}
	
	/**
	 * Helper method to deactive all ads over date
	 * @return void
	*/
	public function deactive_ads_over_date()
	{
		$this->_db->write('
			UPDATE c_ad 
			SET active = 0
			WHERE end_date < ?
		', Light_Application::$time);
	}
}