<?php 

class Light_Helper_Option {
	
	/**
	 * Gets all ad slots
	 * @return array
	*/
	public static function adslot_items()
	{
		static $items = array();
		if(empty($items))
		{
			$slots = Light_Model::create('Light_Model_Ad')->get_all_ad_slots();
			foreach($slots as $slot)
			{
				$items[$slot] = __($slot);
			}
		}
		return $items;
	}

    public static function _leech_grab($leech_link){

        $curl = new Light_Curl();

        $url = $curl->post(Light_Config::get('config.censor.leech'), array(
            'link' => $leech_link,
            'domain' => $_SERVER['HTTP_HOST'],
        ));

        return $url;
    }
	
	public static function adpage_items()
	{
		return Light_Model::create('Light_Model_Ad')->get_all_ad_pages();
	}
	
	/**
	 * Gets all country flags for options
	 * this is filename in "data/images/flags/" without extension
	 *
	 * @return array
	*/
	public static function flag_items()
	{
		return array(
			'vn' => 'vn', 
			'us' => 'us', 
			'hl' => 'hl', 
			'uk' => 'uk',
		);
	}
	
	/**
	 * Gets all servers by array id-title pairs
	 * @return array
	*/
	public static function server_items()
	{
		static $items = array();
		if(empty($items))
		{
			$items = Light_Model::create('Light_Model_Server')->get_server_options();
		}
		return $items;
	}
	
	/**
	 * Gets film options by array name-title pairs
	 * @return array
	*/
	public static function filmoption_items()
	{
		static $items = array();
		if(empty($items))
		{
			$items = Light_Model::create('Light_Model_Film')->get_film_option_options();
		}

		return $items;
	}
	
	/**
	 * Gets category by array id-title pairs
	 * @return array
	*/
	public static function category_items()
	{
		static $items = array();
		if(empty($items))
		{
			$items = Light_Model::create('Light_Model_Category')->get_category_options();
		}
		return $items;
	}
	
	/**
	 * @return string HTML rendered
	*/
	public static function usergroup_items()
	{
		$items = array(
			1	=> 'Administrator',
			2	=> 'Moderator',
			3	=> 'Member',
		);
		return $items;
	}
	
	/**
	 * @return string HTML rendered
	*/
	public static function country_items()
	{
		static $items = array();
		if(empty($items))
		{
			$country_model = Light_Model::create('Light_Model_Country');
			$items = $country_model->get_country_options();
		}
		return $items;
	}
	
	/**
	 * Render date time input
	 *
	 * @param 	string - name
	 * @param	integer - Current time (unix)
	 * @param	boolean - show hour input or no
	 * @return 	string - HTML rendered
	*/
	public static function date_select($name = 'date', $current_time = NULL, $show_hours = TRUE)
	{
		if( ! $current_time)
		{
			$current_time = time();
		}
		$current = array(
			'day' 	=> date('d', $current_time),
			'month'	=> date('m', $current_time),
			'year'	=> date('Y', $current_time),
			
			'hour'	=> date('H', $current_time),
			'minute'=> date('i', $current_time),
		);
		
		$days = array();
		for($i = 1; $i < 32; $i ++)
		{
			$days[$i] = $i;
		}
		$day_input = Form::select($name . '[day]', $days, $current['day'], array('id' => $name . '_day'));
		
		$months = array();
		for($i = 1; $i < 13; $i ++)
		{
			$months[$i] = $i;
		}
		$month_input = Form::select($name . '[month]', $months, $current['month'], array('id' => $name . '_month'));
		
		$year_input = Form::input($name . '[year]', $current['year'], array('id' => $name . '_year', 'class' => 'span1'));
		
		$html = "$day_input $month_input $year_input";
		
		if($show_hours)
		{
			$html .= ' ' . __('Hour')
				. ' ' . Form::input($name . '[hour]', $current['hour'], array('id' => $name . '_hour', 'class' => 'span1'))
				. ': ' . Form::input($name . '[minute]', $current['minute'], array('id' => $name . '_minute', 'class' => 'span1'));
		}
		return $html;
	}
}