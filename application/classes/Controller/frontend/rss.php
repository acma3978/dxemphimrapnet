<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Frontend_Rss extends Controller_Frontend {

	public function action_index()
	{
		if(isset($_GET['build_sitemap'])){
			$build = Light_Helper_Base::build_sitemap();
			var_dump($build);die;
		}
		$films = $this->_get_film_model()->get_films(array(
            'options' => 'phim_chieu_rap_hot',
			'active' => 1,
		), array(
			'join' => Light_Model_Film::FETCH_COUNTRYINFO,
			'limit' => 20,
			'order' => array(
				'film.post_date' => 'DESC'
			)
		));

		foreach($films as &$film)
		{
			$film = Light_Helper_Film::parse($film);
			$film['link'] = Light_Link::film('film', $film, NULL, TRUE, TRUE);
			$film['pub_date'] = date('r', $film['post_date']);
			$film['description'] = Light_Helper_Film::description($film['pagetext'], 500);
		}

        $this->response->headers('Content-type', 'text/xml; charset=utf-8');

        return $this->response_view('rss', array('films' => $films),TRUE);
	}
} 