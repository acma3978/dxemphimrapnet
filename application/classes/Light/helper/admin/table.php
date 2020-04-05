<?php

class Light_Helper_Admin_Table {

	/**
	 * @param array columns 
	 *	array(
	 *		array('Text 1', array('width' => 15, 'class' => 'class-name')),
	 *		array('Text 2'),						
	 *	);
	 * @param array form attributes
	 * @return string HTML rendered
	*/
	public static function open(array $columns, array $form_attributes = array())
	{
		// form attributes
		$form_attributes += array(
			'action' => '',
			'method' => 'post',
		);
		
		return Form::open($form_attributes['action'], $form_attributes) . '
			<table class="table full">
				<thead>
					' . self::_render_row($columns, 'th') . '
				</thead>
				<tbody>
		';
	}
	
	/**
	 * @param array columns 
	 *	array(
	 *		array('Text 1', array('width' => 15, 'class' => 'class-name')),
	 *		array('Text 2'),						
	 *	);
	 * @return string HTML rendered
	*/
	public static function row(array $columns)
	{
		return self::_render_row($columns);
	}
	
	/**
	 * @param array columns 
	 *	array(
	 *		array('Text 1', array('width' => 15, 'class' => 'class-name')),
	 *		array('Text 2'),						
	 *	);
	 * @return string HTML rendered
	*/
	public static function close(array $columns)
	{
		return '
			</tbody>
				<tfoot>
					' . self::_render_row($columns) . '
				</tfoot>
			</table>
		</form>
		';
	}
	
	protected static function _render_row(array $columns, $row_tag = 'td')
	{
		$column_text = '<tr>';
		foreach($columns as $column)
		{
			$attrs = array();
			$text = $column[0];
			// has attributes
			if(count($column) > 1)
			{
				$attrs = $column[1];
			}
			$column_text .= '<' . $row_tag . HTML::attributes($attrs) . '>' . __($text) . '</' . $row_tag . '>';
		}
		return $column_text . '</tr>';
	}
}