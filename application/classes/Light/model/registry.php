<?php defined('SYSPATH') or die('No direct script access.'); 

class Light_Model_Registry extends Light_Model {
	
	protected static $_cache;

	/**
	 * Gets registry
	 * @return array
	 * @throws Light_Exception if $name is not registered
	*/
	public function get($name, $get_fom_db = FALSE)
	{
		if($get_fom_db !== TRUE)
		{
			if(empty($cached))
			{
				self::$_cache = $this->get_all_registries();
				static $cached = TRUE;
			}

			if(isset(self::$_cache[$name]))
			{
				return self::$_cache[$name];
			}
		}
		
		$data = $this->_db->fetch_one('
			SELECT registry.* 
			FROM c_registry AS registry
			WHERE name = ' . $this->_db->quote($name) . '
		');
		if(empty($data))
		{
			throw new Light_Exception('Registry "' . $name . '" has not been registered.');
		}
		if(($decode = @unserialize($data['value'])) !== FALSE)
		{
			return $decode;
		}
		return NULL;
	}
	
	public function get_all_registries()
	{
		$registry = $this->_db->fetch_all('
			SELECT registry.* 
			FROM c_registry AS registry
			ORDER BY name
		', 'name');
		
		$return = array();
		foreach($registry as $name => $data)
		{
			if(($return[$name] = @unserialize($data['value'])) === FALSE)
			{
				$return[$name] = NULL;
			}
		}
		return $return;
	}
	
	/**
	 * Helper method to write new value into database.
	 *
	 * @return integer	affected rows
	*/
	public function set($name, $value)
	{
		$value = serialize($value);
		
		return $this->_db->write('
			INSERT INTO c_registry
				(name, value)
			VALUES 
				(?, ?)
			ON DUPLICATE KEY UPDATE
				value = VALUES(value)	
		', array($name, $value));
		
	}
	
	/**
	 * Deletes a registry value from the DB
	 *
	 * @param string $itemName
	 */
	public function delete($name)
	{
		unset(self::$_cache[$name]);
		
		$this->_db->delete('registry', 'name = ?' , $name);	
	}
}