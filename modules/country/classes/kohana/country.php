<?php defined('SYSPATH') or die('No direct access allowed.');

/**

 * User authorization library. Handles user login and logout, as well as secure

 * password hashing.

 *

 * @package    Kohana/Auth

 * @author     Kohana Team

 * @copyright  (c) 2007-2012 Kohana Team

 * @license    http://kohanaframework.org/license

 */

abstract class Kohana_Country {

	// Auth instances

	protected static $_instance;

	public static function instance()

	{

        require(MODPATH.'/country/classes/kohana/country/geoip.inc');

        $ip=$_SERVER['HTTP_CF_CONNECTING_IP'];

        $gi = geoip_open(MODPATH.'/country/classes/kohana/country/GeoIP.dat',GEOIP_STANDARD);

        $country_code = geoip_country_code_by_addr($gi, $ip);

        //$crawler=self::crawlerDetect($_SERVER['HTTP_USER_AGENT']);

        return $country_code;

        geoip_close($gi);

	}


} // End Country

