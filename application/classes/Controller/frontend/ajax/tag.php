<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Frontend_Ajax_Tag extends Controller_Frontend_Ajax {

	public function action_index()
	{
		die('?');
	}
	
	public function action_search()
	{
		$keyword = $this->_input->filter_single('keyword', Light_Input::STRING);
		$tag_model = $this->_get_tag_model();
		
		$tags = $tag_model->get_tags(array(
			//'title2' => $keyword,
			'title_ascii2' => Light_Helper_Base::remove_accent_vn($keyword),	
		), array(
			'limit' => 15,
			'order' => array('tag.used_count' => 'DESC')
		));	
		$results = array();
		foreach($tags as $tag_id => $tag)
		{
			$results[$tag_id] = $tag['title'];
		}
		return $this->response_json(array('json' => $results));
	}
	
	protected function _get_tag_model()
	{
		return $this->get_model('Light_Model_Tag');
	}
} 