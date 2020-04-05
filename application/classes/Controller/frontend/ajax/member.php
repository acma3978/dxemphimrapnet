<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Frontend_Ajax_Member extends Controller_Frontend_Ajax {
	
	public function before()
	{
		parent::before();
		
		$this->_assert_ajax_only();
	}
	
	public function action_load_panel()
	{
		$html = $this->view('sign_panel')
			->set('visitor', Light_Visitor::instance())
		->render();	
		return $this->response_json(array(
			'html'		=> $html,
		));
	}
	
	public function action_remove_bookmark()
	{
		$film_id = $this->_input->filter_single('film_id', Light_Input::UINT);
		$visitor = Light_Visitor::instance();
		
		if($visitor->get('user_id') == 0) 
		{
			return $this->response_json(array(
				'error' => TRUE,
				'message' => 'You are not loggedin.',
				'alert' => TRUE,
			));
		}
		$film_ids = array_flip(explode(',', $visitor->get('bookmark_film_ids')));
		unset($film_ids[$film_id]);
		
		$this->_get_user_model()->update($visitor->get('user_id'), 'bookmark_film_ids', implode(',', array_keys($film_ids)));
		
		return $this->response_json(array(
			'error' => FALSE,
			'message' => __('Remove bookmark success.')
		));
		
	}
	
	public function action_add_bookmark()
	{
		$film_id = $this->_input->filter_single('film_id', Light_Input::UINT);
		$film_model = $this->_get_film_model();
		$visitor = Light_Visitor::instance();
		echo $film_id;
		if($visitor->get('user_id') == 0) 
		{
			return $this->response_json(array(
				'error' 	=> TRUE,
				'message' 	=> __('You are not logged in.'),
				'alert' 	=> TRUE,
			));
		}
		$film_ids = explode(',', $visitor->get('bookmark_film_ids'));
		array_push($film_ids, $film_id);
		$film_ids = array_unique($film_ids);
		
		$this->_get_user_model()->update($visitor->get('user_id'), 'bookmark_film_ids', implode(',', $film_ids));
		
		return $this->response_json(array(
			'error' => FALSE,
			'message' => __('Add bookmark success.')
		));
		
	}
	
	public function action_get_bookmarks()
	{
		$visitor = Light_Visitor::instance();
		
		if($visitor->get('user_id') == 0) 
		{
			return $this->response_json(array(
				'error' => TRUE,
				'message' => __('You are not logged in.'),
				'alert' => TRUE,
			));
		}
		if(!$film_ids = explode(',', $visitor->get('bookmark_film_ids')))
		{
			return $this->response_json(array(
				'json' => '',
				'message' => 'Have no films bookmarked',
			));
		}
		$films = $this->_get_film_model()->get_films_by_ids($film_ids, array(
			'some_fields' => TRUE,
		));
		$films = array_map('Light_Helper_Film::parse', $films);
		
		return $this->response_json(array(
			'json' => $films,
		));
	}
	
	protected function _get_user_model()
	{
		return $this->get_model('Light_Model_User');
	}
} 