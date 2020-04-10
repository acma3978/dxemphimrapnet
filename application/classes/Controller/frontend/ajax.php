<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Frontend_Ajax extends Controller_Frontend {

	protected function _assert_ajax_only(){

		if( ! $this->request->is_ajax()) {

			throw new Light_Exception('Action avaliable via XmlHttpRequest only.', NULL, 500);

		}
	}
} 