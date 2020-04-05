<?php defined('SYSPATH') or die('No direct script access.'); 
/**
 * Light Model Abstract
 * 
 * @package: 	Light
 * @author:		Phan Thanh Cong <chiplove.9xpro@gmail.com>
 * @version:	1.0
 * @release:	Aug 29, 2012
*/
abstract class Light_Model {

	/**
	 * @var Light_DB
	*/
	protected $_db;
	
	public function __construct($name = NULL)
	{
		$this->_db = Light_DB::instance($name);
	}
	
	/**
	 * @return Light_DB
	*/
	protected function _get_db()
	{
		return $this->_db;
	}
	
	
	/**
	 * Applies a limit clause to the provided query if a limit value is specified.
	 * If the limit value is 0 or less, no clause is applied.
	 *
	 * @param string $query SQL query to run
	 * @param integer $limit Number of records to limit to; ignored if <= 0
	 * @param integer $offset Offset from the start of the records. 0+
	 *
	 * @return string Query with limit applied if necessary
	 */
	public function limit_query_results($sql, $limit = 0, $offset = 0)
	{
		if($limit > 0 AND $offset >= 0)
		{
			$sql .= " LIMIT $offset, $limit";
		}
		return $sql;
	}
	
	/**
	 * Gets a list of SQL conditions in the format for a clause. This always returns
	 * a value that can be used in a clause such as WHERE.
	 *
	 * @param array $sql_conditions
	 * @return string
	*/
	public function get_conditions_for_clause(array $sql_conditions)
	{
		if ($sql_conditions)
		{
			return '(' . implode(') AND (', $sql_conditions) . ')';
		}
		else
		{
			return '1=1';
		}
	}
	
	/**
	 * Gets the order by clause for an SQL query.
	 *
	 * @param array $fetch_options
	 * @param string $default - Default order 
	 *
	 * @return string Order by clause or empty string
	 */
	public function get_order_by_clause(array $fetch_options, $default = '')
	{
		if(isset($fetch_options['order']) AND is_array($fetch_options['order']))
		{
			$orders = array();
			foreach($fetch_options['order'] as $column => $sort)
			{
				$direction = (strtolower(trim($sort)) == 'desc') ? 'DESC' : 'ASC';
				$orders[] = $column . ' ' . $direction;
			}
			$order_sql = implode(', ', $orders);
		}
		if(empty($order_sql))
		{
			$order_sql = $default;
		}
		
		return 'ORDER BY ' . $order_sql;
	}
	
	/**
	 * Prepares the limit-related fetching options that can be applied to various queries.
	 * Includes: limit, offset, page, and perpage.
	 *
	 * @param array $fetch_options
	 * @return array Limit options; keys: limit, offset
	*/
	public function prepare_limit_fetch_options(array $fetch_options)
	{
		$limit_options = array('offset' => 0, 'limit' => 0);
		
		if(isset($fetch_options['limit']))
		{
			$limit_options['limit'] = intval($fetch_options['limit']);
		}
		if(isset($fetch_options['offset']))
		{
			$limit_options['offset'] = intval($fetch_options['offset']);
		}
		if(isset($fetch_options['perpage']) AND $fetch_options['perpage'] > 0)
		{
			$limit_options['limit'] = intval($fetch_options['perpage']);
		}
		if(isset($fetch_options['page']))
		{
			$page = intval($fetch_options['page']);
			if($page < 1)
			{
				$page = 1;
			}
			$limit_options['offset'] = ($page-1) * $limit_options['limit'];
		}
		return $limit_options;
	}

	
	
	/**
	 * Create new Light_Model instance
	 *
	 * return Light_Model
	*/	
	public static function create($class_name)
	{
		return new $class_name;
	}
}