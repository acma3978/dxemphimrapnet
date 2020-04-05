<?php

/**
 * Admin Form Validation based on Kohana_Validation
 * for quick validate input field
*/
class Light_Helper_Admin_Form_Validation {

	/**
	 * @var Light_Helper_Admin_Form
	*/
	protected $_form;
	
	/**
	 * Validator
	 * @var Kohana_Validation
	*/
	protected $_validation;
	
	/**
	 * Array errors
	 * @var array
	*/
	public $errors = array();
	
	public static function factory(array $data = array())
	{
		return new self($data);
	}
	
	public function __construct(array $data = array())
	{
		$this->_form = Light_Helper_Admin_Form::instance(); // use this to get values/ hidden fields
		
		if(empty($data))
		{
			$data = $_POST;
		}
		
		$this->_validation = Validation::factory($data);
	}
	
	/**
	 * // The "username" must not be empty and have a minimum length of 4
	 *  $validation->rule('username', 'not_empty')
	 *             ->rule('username', 'min_length', array(':value', 4));
	 *
	 * @return $this;
	*/
	public function rule($field, $rule, array $params = NULL)
	{
		$this->_validation->rule($field, $rule, $params);
		
		return $this;
	}
	
	/**
	 * Add rules using an array.
	 *
	 * @param   string  $field  field name
	 * @param   array   $rules  list of callbacks
	 * @return  $this
	 */
	public function rules($field, array $rules)
	{
		$this->_validation->rules($field, $rules);
		
		return $this;
	}
	
	/**
	 * @param error group
	*/
	public function validate($errors = 'errors')
	{
		// validation 
		$this->_validation->check();
		
		$this->errors = $this->_validation->errors($errors);
		
		if( ! empty($this->errors))
		{
			$this->_form->set_errors($this->errors);
		}
		return $this;
	}
	
	/**
	 * Method support to add error by index, value or array index-value pairs
	 * @param string|array $index
	 * @param mixed - NULL if $index is array
	 * @return void
	*/
	public function errors($index, $value = NULL)
	{
		if(is_array($index))
		{
			foreach($index as $key => $value)
			{
				$this->errors($key, $value);
			}
		}
		else
		{
			$this->errors[$index] = $value;
			$this->_form->set_errors($index, $value);
		}
	}
}