<?php defined('SYSPATH') or die('No direct script access.');

/**

 * Light Admin Form Helper

 *

 * Admin forms helper class, support for rendering

 * checkbox, radio, textbox, hidden, select etc.. with the general control style

 *

 *

 * @package: 	Light

 * @author:		Phan Thanh Cong <chiplove.9xpro@gmail.com>

 * @version:	1.0

 * @release:	2012.08.27

 */

class Light_Helper_Admin_Form {

    protected static $_instance = NULL;

    /**

     * Array of value indexed by field name

     * @var array

     */

    protected static $_values = array();

    /**

     * Storing errors of input field

     * @var array

     */
    public $errors = array();

    /**

     * Instance use in Controller to set values/errors to input field

     * @return Light_Helper_Admin_Form

     */

    public static function instance(){
        if(self::$_instance === NULL) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    // open form

    public static function open(array $attributes = array())
    {
        $attributes += array(
            'upload'	=> FALSE,	// boolean - use upload
            'action'	=> '',		// string - form action
            'method'	=> 'post',	// string - form method
        );

        if($attributes['upload'] AND ! isset($attributes['enctype'])) {
            $attributes['enctype'] = 'multipart/form-data';
        }

        $attributes['class'] = empty($attributes['class']) ? 'form-horizontal' : $attributes['class'];

        unset($attributes['upload']);

        return Form::open($attributes['action'], $attributes);
    }

    // close form - template must be use this to closed form

    public static function close(){
        return Form::close();
    }

    public static function hidden($name, $value){
        return Form::hidden($name, $value);
    }

    /**

     * Return input uit

     * @return string HTML rendered

     */

    public static function unit($name, array $options = array()){

        $options += array(

            'title'		=> '',		// string - label of control

            'help'		=> '',		// string - help text

            'type'		=> 'text',	// string - text|textarea|radio|checkbox|hidden|file

            '_editor'	=> FALSE, 	// boolean - embed WYSIWYG. Can use '_wysiwyg' if type = "textarea"

            'option'	=> '',		// string|array - value-text pairs items of radio/checkbox.

            // It can be string with "yesno" or "onoff" for quick option

            '_inline'	=> FALSE,	// boolean - for checkbox/radio type displayed inline

            '_column'	=> FALSE, 	// boolean - for checkbox/radio display items by 2 column

            'default'	=> NULL,	// NULL|string - default value

            'value'		=> NULL,	// NULL|string - always value. NULL if not used

            'content'	=> NULL,	// NULL|string - HTML text (type = "free"), use for overriding to $control_text

            'attrs'		=> array(),	// array - key-value pairs of attributes

            'before'	=> '',		// string - addition HTML before

            'after'		=> '',		// string - addition HTML after

            '_hr'		=> FALSE,	// boolean - add <hr /> tag to end of control-group

            'toggle'		=> FALSE,	// boolean - add <hr /> tag to end of control-group

        );

        $value = NULL;

        extract($options);

        if($value === NULL) {

            if($default !== NULL) {
                $value = $default;

            }

            // submited value

            if(isset(self::$_values[$name])) {

                $value = self::$_values[$name];

            }

        }

        if(empty($attrs['id'])) {

            $attrs['id'] = $name;

        }

        // class

        if(empty($attrs['class']))

        {

            $attrs['class'] = '';

        }

        $control_text = '';

        $label_for = TRUE;

        switch($type) {
            // hidden field don't need includes control-group

            case 'hidden':

                return self::hidden($name, $value);

                break;

            case 'file':

                //	$attrs['size'] = 60;

            case 'text':

            case 'password':

                $attrs['class'] = 'span7 ' . $attrs['class'];

                $attrs['type'] = $type;

                $control_text .= Form::input($name, $value, $attrs);

                break;

            case 'textarea':

                $attrs['class'] = 'span7 ' . $attrs['class'];

                if( ! empty($_editor) OR ! empty($_wysiwyg))

                {

                    $attrs['class'] .= ' editor Editor ckeditor'; // use ckeditor

                }

                $attrs += array('rows' => 10);

                $control_text .= Form::textarea($name, $value, $attrs);

                break;



            case 'select':

                if( ! is_array($option))

                {

                    throw new Light_Exception('Option must be an array');

                }

                foreach($option AS &$__text)

                {

                    $__text = __($__text); // translate

                }

                $control_text .= Form::select($name, $option, $value, $attrs);

                break;



            case 'radio':

                if(is_string($option) AND $option == 'yesno')

                {

                    $option = array('1' => __('Yes'), '0' => __('No'));

                }

            case 'checkbox':



                $label_for = FALSE;

                if(is_string($option) AND $option == 'onoff')

                {

                    $option = array('1' => __($title ? $title : 'Enable') );

                    $arr_toggle = array('1');

                    $title = ''; // remove title

                }



                if( ! is_array($option))

                {

                    throw new Light_Exception('Option must be an array');

                }

                $count = count($option);

                if($toggle) {

                    $title = $option[1];

                    $attrs['id'] = $name;

                    $__label .= Form::checkbox($name, $value, ($value > 0 ? TRUE : FALSE), $attrs);

                    $control_text .= $__label;
                }else{

                    $i = 0;

                    unset($attrs['id']);

                    foreach($option as $__value => $__text)

                    {

                        $__label = '<label class="' . $type . ($_inline ? ' inline' : ($_column ? ' column' : '')) . '">';

                        if($type == 'radio')

                        {

                            $__label .= Form::radio($name, $__value, strval($__value) == strval($value), $attrs);

                        }

                        else{
                            $__label .= Form::checkbox($name . ($count > 1 ? '[]' : ''), $__value, in_array($__value, (array)$value), $attrs);
                        }

                        $__label .= ' ' . __($__text) . '</label>';

                        $control_text .= $__label;
                    }

                    if($_column)

                    {

                        $control_text = '<div class="wrap-columns">' . $control_text . '</div>';

                    }
                }
                break;



            case 'free':

                $control_text .= $content;

                break;



            default:

                throw new Light_Exception('Unknow the type in ' . __METHOD__);

                break;

        }

        return '

			<div class="control-group'

        . (isset(self::instance()->errors[$name]) ? ' error' : '')

        . '">

            <label class="control-label"' . ($label_for ? ' for="' . $name . '"' : '') . '>' . __($title) . '</label>

            <div class="controls">'

        . $before

        . $control_text

        . $after

        . ($help ? '<span class="help-block">' . __($help) . '</span>' : '')

        . '</div>

        </div>

		'. ($_hr ? '<hr />' : '');

    }


    public static function muti_button($name, array $options = array()){
        $options += array(

            'title'		=> '',		// string - label of control

            'help'		=> '',		// string - help text

            'type'		=> 'text',	// string - text|textarea|radio|checkbox|hidden|file

            'value'		=> NULL,	// NULL|string - always value. NULL if not used

            'class' => NULL,

        );
        $value = NULL;

        extract($options);

        if($value === NULL) {

            if($default !== NULL) {
                $value = $default;

            }

            // submited value

            if(isset(self::$_values[$name])) {

                $value = self::$_values[$name];

            }

        }

        if(empty($attrs['id'])) {
            $str=str_replace('[]','',$name);
            $attrs['id'] = $str;
        }

        // class

        if(empty($attrs['class'])){
            $attrs['class'] = $class;
        }

        $control_text = '';

        $label_for = TRUE;

        if($type == 'text') {
            $control_text .= '<div class="input_fields_wrap">';
            $control_text .= Form::button(NULL, $value, $attrs);
            $control_text .= '<div class="control-group">'.Form::input($name, NULL, array('class'=>'span7')).'</div>';
            $control_text .= '</div>';
        }

        return '

			<div class="control-group'

        . (isset(self::instance()->errors[$name]) ? ' error' : '')

        . '">

            <label class="control-label"' . ($label_for ? ' for="' . $name . '"' : '') . '>' . __($title) . '</label>

            <div class="controls">'

        . $before

        . $control_text

        . $after

        . ($help ? '<span class="help-block">' . __($help) . '</span>' : '')

        . '</div>

        </div>

		'. ($_hr ? '<hr />' : '');

    }


    /**

     * Render submit control

     * @return string HTML rendered

     */

    public static function submit(array $options = array())

    {

        $options += array(

            'name'		=> 'do',		// string - name of submit button

            'value'		=> 'Submit',	// string - text of submit button

            'reset'		=> TRUE,		// boolean - show reset button

            'before'	=> '',			// string - addition HTML before

            'after'		=> '',			// string - addition HTML after

        );

        extract($options);



        return '

			<div class="control-group">

				<div class="controls">

					' . $before . '

					<input type="submit" name="' . $name . '" class="btn" value="' . __($value) . '">  

					' . ($reset ? '<input type="reset" class="btn" value="' . __('Reset') . '">' : '') . '

					' . $after . '

				</div>

			</div>

		';

    }







    /**

     * $object->get_values();

     */

    public function get_values($name = NULL)

    {

        if($name !== NULL)

        {

            if(isset(self::$_values[$name]))

            {

                return self::$_values[$name];

            }

            return NULL;

        }

        return $_values;

    }



    /**

     * Use for getting value in the template

     * Light_Helper_Admin_Form::value('name');

     *

     * @param string 	The field name

     * @return mixed 	Value of the field

     */

    public static function value($name = NULL)

    {

        return self::$_instance->get_values($name);

    }



    /**

     * Sets value for filling to field

     * Can set by array key-value pairs or key, value

     * Use no parameters to gets array of all $_values

     *

     * @param string|array

     * @param mixed

     * @return void

     */

    public function set_values($name, $value = NULL)

    {

        if(is_array($name))

        {

            foreach($name AS $key => $value)

            {

                $this->set_values($key, $value);

            }

        }

        else

        {

            self::$_values[$name] = $value;

        }

    }



    /**

     * Return error messages block if have

     * @return string - HTML rendered

     */

    public static function error_messages()

    {

        if( ! empty(self::instance()->errors))

        {

            $error_message = '';

            foreach(self::instance()->errors as $name => $message)

            {

                //$error_message .= '<li>' . $name . ': ' . $message . '</li>';

                $error_message .= '<li>' . $message . '</li>';

            }

            return '

				<div class="control-group message error">

					<ol>

						' . $error_message . '

					</ol>    

				</div>

			';

        }

        return '';

    }



    /**

     * Method support to sets errors to control-group

     * Can set by array key-value pairs or key, value

     * Use no paramters to gets array of all $errors

     */

    public function set_errors($name, $value = NULL)

    {

        if(is_array($name))

        {

            foreach($name AS $key => $value)

            {

                $this->set_errors($key, $value);

            }

        }

        else

        {

            self::instance()->errors[$name] = $value;

        }

    }



}