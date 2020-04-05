<?php 
/**
 * Light Helper Date
 * 
 * @package: 	Light 
 * @author:		Phan Thanh Cong <chiplove.9xpro@gmail.com>
 * @version:	1.0
*/
class Light_Helper_Date {
	
	
	public static function date($time)
	{
		// TODO
		return date(Light_Config::get('config.dateformat'), $time);
	}
	
	public static function time($time)
	{
		// TODO
		return date(Light_Config::get('config.timeformat'), $time);
	}
	
	public static function datetime($time)
	{
		// TODO
		return date(Light_Config::get('config.datetimeformat'), $time);
	}
	
	/**
	 * Display remaining time until the A
	 *
	 * @param integer - time to show
	 * @param integer - current timestamp
	 * @param boolean - Show when current time is over target
	*/
	public static function remaining($time_target, $time_now = NULL, $show_on_over = TRUE)
	{
		if(empty($time_now))
		{
			$time_now = Light_Application::$time;
		}
		$timeless = NULL;
		if( ($timeless = $time_target - $time_now) > 0)
		{
			if($timeless > 86400*365)
			{
				return __('x_years_after', array(
					':days' => floor($timeless/86400*365)
				));
			}
			else if($timeless > 86400)
			{
				return __('x_days_after', array(
					':days' => floor($timeless/86400)
				));
			}
			else if($timeless > 3600)
			{
				return __('x_hours_after', array(
					':hours' => floor($timeless/3600)
				));
			}
			else
			{
				return __('x_minutes_after', array(
					':minutes' => ($minutes = floor($timeless/60)) == 0 ? 1 : $minutes 
				));
			}
		}
		else if ($show_on_over)
		{
			$over_time = $time_now - $time_target;
			if($over_time > 86400*365)
			{
				return __('x_years_ago', array(
					':days' => ceil($over_time/86400*365)
				));
			}
			else if($over_time > 86400)
			{
				return __('x_days_ago', array(
					':days' => ceil($over_time/86400)
				));
			}
			else if($over_time > 3600)
			{
				return __('x_hours_ago', array(
					':hours' => ceil($over_time/3600)
				));
			}
			else
			{
				return __('x_minutes_ago', array(
					':minutes' => ($minutes = ceil($over_time/60)) == 0 ? 1 : $minutes 
				));
			}
				
		}
		return self::datetime($time_target);
	}
}