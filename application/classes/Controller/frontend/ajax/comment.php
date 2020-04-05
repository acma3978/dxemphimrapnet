<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Frontend_Ajax_Comment extends Controller_Frontend_Ajax {

	public function before()
	{
		parent::before();
		
		$this->_assert_ajax_only();
	}

	public function action_index()
	{
		
	}
	
	public function action_post()
	{
		$film_id = $this->_input->filter_single('film_id', Light_Input::UINT);
		$message = $this->_input->filter_single('message', Light_Input::NOHTML);
		$visitor = Light_Visitor::instance();
		$film_model = $this->_get_film_model();
		$comment_model = $this->_get_comment_model();
		
		if($visitor->get('user_id') == 0)
		{
			return $this->response_json(array(
				'error' 	=> TRUE,
				'message' 	=> __('You are not logged in. Please login to post new comment.'),
				'alert' 	=> TRUE,
			));
		}
		if(empty($film_id) OR !$film = $film_model->get_film_by_id($film_id) OR !$film['active'] OR !$film['open'])
		{
			return $this->response_json(array(
				'error' 	=> TRUE,
				'message' 	=> __('This film does not allow to post new comment or has been removed.'),
				'alert' 	=> TRUE,
			));
		}
		if(strlen($message) < 10 OR strlen($message) > 1000)
		{
			return $this->response_json(array(
				'error' 	=> TRUE,
				'message' 	=> __('The length of message must be greater than :min and less than :max.', array(
					':min' => 10,
					':max' => 1000
				)),
				'alert' 	=> TRUE,
			));
		}
		// Check comment count limited per days
		$count = $comment_model->get_count_comments(array(
			'post_user_id' => $visitor->get('user_id'),
			'post_date1'	=> strtotime('today'),	
		));
		if($count >= 100)
		{
			return $this->response_json(array(
				'error' 	=> TRUE,
				'message' 	=> __('You are only allowed to post a maximum of :max comments per days.', array(
					':max' => 100
				)),
				'alert' 	=> TRUE,
			));
		}
		if($message == $this->_session->get('comment.message'))
		{
			return $this->response_json(array(
				'error' 	=> TRUE,
				'message' 	=> __('You have post a comment.'),
				'alert' 	=> TRUE,
			));
		}
		// save into database
		$dw = Light_DataWriter::create('Light_DataWriter_Comment');
		$dw->bulk_set(array(
			'message'		=> $message,
			'film_id'		=> $film_id,
			'post_user_id'	=> $visitor->get('user_id'),
			'post_date'		=> Light_Application::$time,
			'active'		=> 1,
		));
		
		// get latest comment for checking to merge new comment
		$latest = $comment_model->get_comments(array(
			'film_id' => $film_id,
			'post_user_id' => $visitor->get('user_id')
		), array(
			'order' => array('comment.post_date' => 'DESC'),
			'limit' => 1,
		));
		if(
			$old_comment = reset($latest) 
			AND $old_comment['post_user_id'] = $visitor->get('user_id') 
			AND ($old_comment['post_date'] + 7200) > Light_Application::$time // trong vòng 2 tiếng
		)
		{
			$dw->set_existing($old_comment);
			$dw->set('message', $old_comment['message'] . PHP_EOL . $message);
		}
		// dw save
		$dw->save();
		
		if($dw->affected_rows())
		{
			// save for checking again
			$this->_session->set('comment.message', $message);
			
			return $this->response_json(array(
				'error' 	=> FALSE,
				'message' 	=> __('Comment success.'),
			));
		}
		else
		{
			return $this->response_json(array(
				'error' 	=> TRUE,
				'message' 	=> __('An error occured.'),
				'alert' 	=> TRUE,
			));
		}
		
	}
	public function action_delete()
	{
		$film_id = $this->_input->filter_single('film_id', Light_Input::UINT);
		$comment_id = $this->_input->filter_single('comment_id', Light_Input::UINT);
		$visitor = Light_Visitor::instance();
		
		$response = array();
		if( ! $visitor->is_admin())
		{
			return $this->response_json(array(
				'error' 	=> TRUE,
				'message' 	=> __('You have no permission to delete the comment.'),
				'alert' 	=> TRUE,
			));
		}
		$dw = Light_DataWriter::create('Light_DataWriter_Comment');
		$dw->set_existing('comment_id', $comment_id);
		$dw->delete();
		
		return $this->response_json($response);
	}

	public function action_list()
	{
		$film_id = $this->_input->filter_single('film_id', Light_Input::UINT);
		$page = $this->_input->filter_single('page', Light_Input::UINT);
		$comment_model = $this->_get_comment_model();
		
		if($page < 1)
		{
			$page = 1;
		}
		$perpage = 10;
		$conditions = array(
			'film_id' => $film_id,
			'active' => 1,
		);
		$visitor = Light_Visitor::instance();
		
		$comment_count = $comment_model->get_count_comments($conditions);
		$comments = array();
		if( ! empty($comment_count))
		{
			$comments = $comment_model->get_comments($conditions, array(
				'order' 	=> array('comment.post_date' => 'DESC'),
				'join'		=> Light_Model_Comment::FETCH_USERINFO,
				'page' 		=> $page,
				'perpage' 	=> $perpage,
			));
			foreach($comments as &$comment)
			{
				$comment['avatar_url'] 	= 'http://www.gravatar.com/avatar/'.md5(strtolower($comment['user_email'])).'.jpeg';
				$comment['time'] 		= Light_Helper_Date::remaining($comment['post_date']);
				$comment['message'] 	= nl2br($comment['message']);
			}
		}
		$total_pages = ceil($comment_count/ $perpage);
		$page_nav = Light_Helper_Base::page_navigation($page, $total_pages, 'javascript:void(0);" data-page="', '');
		
		
		$html = $this->view('comment')
			->set('page_nav', $page_nav)
			->set('comments', $comments)
			->set('permission', array(
				'can_delete' => $visitor->is_admin(),
			))
			->render();
		
		return $this->response_json(array(
			'error' 	=> FALSE,
			'message' 	=> '',
			'html'		=> $html,
		));
	}
	
	
	protected function _get_comment_model()
	{
		return $this->get_model('Light_Model_Comment');
	}
} 