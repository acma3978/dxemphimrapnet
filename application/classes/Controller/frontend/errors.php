<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Frontend_Errors extends Controller_Frontend {

	public function action_index()
	{
		$path = $this->_input->filter_single('path', Light_Input::STRING);
		
		$options = Light_Application::get('options');
		return $this->response_view('errors/error', array(
			'path' 			=> $path,
			'page_title' 	=> 'Errors!',
		));
	}
	
	public function action_404()
	{
		$path = $this->_input->filter_single('path', Light_Input::STRING);

		if(strpos($path, '3566') !== FALSE)
		{
			header('Location: http://phim3s.net/phim/phong-tom-o-nha-1-minh_phong-tom-home-alone.3571/');
			exit;
		}
	
		
		$options = Light_Application::get('options');
		return $this->response_view('errors/404', array(
			'path' 			=> $path,
			'page_title' 	=> '404 Page Not Found',
		));
	}
	
	public function action_permission()
	{
		$path = $this->_input->filter_single('path', Light_Input::STRING);
		
		$options = Light_Application::get('options');
		return $this->response_view('errors/permission', array(
			'path' 			=> $path,
			'page_title' 	=> 'Không có quyền truy cập',
		));
	}
} 