<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Frontend_Ajax_Episode extends Controller_Frontend_Ajax {

	private $_jwplayer_setup = array(
        "width" => "100%",
        "height" => "100%",
        "autostart" => "TRUE",
    );

    private $_country = 'VN';

	public function before()
	{
		parent::before();
		
		/*$this->_assert_ajax_only();*/
	}

	public function action_flink(){
		$fixEpisode_id = $this->_input->filter_single('fixid', Light_Input::INT);

		Light_Grab::process(NULL,NULL,NULL,$_SERVER['HTTP_HOST'],$fixEpisode_id);
	}

	public function action_link(){

		if(!empty($_SERVER['HTTP_ACCEPT_LANGUAGE']) && $_SERVER['HTTP_COOKIE'] != ''){

		$film_id = $this->_input->filter_single('film_id', Light_Input::INT);

		$episode_id = $this->_input->filter_single('episode_id', Light_Input::INT);

		$episode_model = $this->_get_episode_model();

		$film_model = $this->_get_film_model();

		$fetch_otions = array(
                'active_only' => TRUE,
                //'join'    => Light_Model_Film::FETCH_COUNTRYINFO,
            );

		$filminfo = $film_model->get_film_by_id($film_id, $fetch_otions);

		$episode = $episode_model->get_episode_by_id($episode_id);

		$data = Light_Grab::process($film_id,$episode_id,$episode['video_url'],$_SERVER['HTTP_HOST']);
		
        $embed = json_decode($data,true);

        $this->_jwplayer_setup["film"] = array(
            "film_id"=> $film_id,
            "episode_id"=> $episode_id
        );

        $this->_jwplayer_setup["logo"] = array(
            "file"=>URL::base()."player/logo/logo.png"
        );

        if(!$embed[0]['embed']){

        $this->_jwplayer_setup["playlist"] = URL::base()."players/$film_id/$episode_id.rss";
}else{

    $this->_jwplayer_setup["embed"] = $embed[0]['link'];
}
		$episodeinfo = $this->_jwplayer_setup;

		return $this->response_json(array(
		'page_title' => 'Xem Phim ' . $episode['film_title'].' | Server '.$episode['server_title'].' | '.$episode['name'],
			'episode_name' => $episode['name'],
			'server_name' => $episode['server_title'],
			'html' => $episodeinfo,
		));	
	}

	}
	
	public function action_index()
	{

		if(!empty($_SERVER['HTTP_ACCEPT_LANGUAGE']) && $_SERVER['HTTP_COOKIE'] != ''){

		$film_id = $this->_input->filter_single('film_id', Light_Input::UINT);
		$episode_id = $this->_input->filter_single('episode_id', Light_Input::UINT);
$episode_time = $this->_input->filter_single('episode-time', Light_Input::UINT);
		
		$episode_model = $this->_get_episode_model();

		$film_model = $this->_get_film_model();

		$fetch_otions = array(
                'active_only' => TRUE,
                //'join'    => Light_Model_Film::FETCH_COUNTRYINFO,
            );

		$filminfo = $film_model->get_film_by_id($film_id, $fetch_otions);

		$episode = $episode_model->get_episode_by_id($episode_id);

		if(!in_array($this->_country,Light_Config::get('config.censor.country_filter')) || empty($episode_id)){

                $video_url=$filminfo["trailer_url"];
            }else{
                $video_url=$filminfo['check_trailer']==1 ? $filminfo["trailer_url"]:$episode['video_url'];
            }
            
            $data = Light_Grab::process($film_id,$episode_id,$video_url,$_SERVER['HTTP_HOST']);

            if($data!=NULL){

				$this->response->headers('Content-Type', 'text/xml');
	            $rss .= "<rss version=\"2.0\" xmlns:jwplayer=\"http://rss.jwpcdn.com/\">\n";
	            $rss .= "<channel>\n";
	            $rss .= "<item>\n";
	            $rss .= "<title>".$filminfo['title']."</title>\n";
	            $rss .= "<description>".$filminfo['title']."</description>\n";
	            $rss .= "<jwplayer:image>".trim($filminfo['imagefan'])."</jwplayer:image>\n";


					foreach (json_decode($data,true) as $item) {

						$url_file = parse_url($item['file']);
						$url_file = str_replace("mp4_", 'mp4', $url_file);
						$query = str_replace(array(".", "&"), array("%2E", "&amp;"), $url_file["query"]);

						$url_file["query"] = $query;
						$file = Light_Link::join_url($url_file, false);

						$rss .= $item['label'] =='360p' ? "<jwplayer:source file=\"$file\" label=\"$item[label]\" type=\"$item[type]\" default=\"true\"/>\n":"<jwplayer:source file=\"$file\" label=\"$item[label]\" type=\"$item[type]\" />\n";
					}


	            $rss .= "</item>\n";
	            $rss .= "</channel>\n";
	            $rss .= "</rss>";

	            echo $rss;
	            }
           }else{
            $this->redirect('private.mp4', 301);
        }
	}

	public function action_embed()
	{

		 return $this->response_json(array(
		'page_title' => 'Xem Phim ' . $episode['film_title'].' | Server '.$episode['server_title'].' | '.$episode['name'],
			'episode_name' => $episode['name'],
			'server_name' => $episode['server_title'],
			'html' => $embed['link'],
		));	
            
	}
	
	protected function _get_episode_model()
	{
		return $this->get_model('Light_Model_Episode');
	}
	protected function _get_film_model()
	{
		return $this->get_model('Light_Model_Film');
	}
} 