<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Frontend_Watch extends Controller_Frontend {

    private $_jwplayer_setup = array(
        "width" => "100%",
        "height" => "100%",
        "autostart" => "TRUE",
    );

    public $_country = 'VN';

	public function action_index(){

		//$country = Country::instance();

		$country = 'VN';

		$film_id = $this->_input->filter_single('film_id', Light_Input::UINT);

		$episode_id = $this->_input->filter_single('episode_id', Light_Input::UINT);

		$youtube_id = $this->_input->filter_single('episode_id', Light_Input::STRING);

        $reporterror = $this->_input->filter_single('reporterror', Light_Input::UINT);

		$film_model = $this->_get_film_model();

		$episode_model = $this->_get_episode_model();

		$fetch_otions = array(
			'active_only' => TRUE,
			//'join'	=> Light_Model_Film::FETCH_COUNTRYINFO,
		);

		if(!$filminfo = $film_model->get_film_by_id($film_id, $fetch_otions))
		{
			$this->redirect(
				Light_Link::build('error', 'action=404', 'path=' . $this->request->uri())
			);
		}
		
		$filminfo = Light_Helper_Film::parse($filminfo, array('tags' => TRUE));

		 $info_youtube=Light_Application::_youtube('Film '.$filminfo['title_o'],', Phim '.$filminfo['title'],'4','watch');

		$filminfo['is_newtab'] = !empty($episode_id);

		if($filminfo['episode_latest'] == -1)
		{
			$this->redirect($filminfo['link']);
		}

		// cache episode
		$episodes = $episode_model->get_episodes_by_film_id_for_show($film_id);

		// check correct url
		$url_canonical = Light_Link::film('watch', $filminfo + ($episode_id ? array('episode_id' => $episode_id) : array()), NULL, TRUE, TRUE);

		/*if(Light_Link::film('watch', $this->request->param(), NULL, TRUE, TRUE) != $url_canonical)
		{
			$this->redirect($url_canonical, 301);
		}*/

		$episode_cache = array();
		$server_cache = array();

		foreach($episodes as &$episode)
		{
			if(empty($episode_id))
			{
				$episode_id = $episode['episode_id'];
			}

			$episode['is_current'] = ($episode_id == $episode['episode_id']);

            if(!$filminfo['check_trailer'] AND in_array($country,Light_Config::get('config.censor.country_filter'))){
                $episode['link'] = Light_Link::film('watch', $filminfo + array('episode_id' => $episode['episode_id']));
                $episode_cache[$episode['server_id']][$episode['episode_id']] = $episode;

                $server_cache[$episode['server_id']] = array(
                    'title' 		=> $episode['server_title'],
                    'flag'   		=> $episode['server_flag'],
                    'type'   		=> $episode['server_type'],
                    'display_order'	=> $episode['server_display_order'],
                );

            }
		}

		$youtube_decode = self::_combinPass($youtube_id,'decode');

        //$filminfo[tags_link] = Light_Helper_String::rand_array($filminfo[tags_link]);

		// Nếu ko tồn tại tập theo link request thì nhảy về link đầu

        if(empty($episodes[$episode_id]) and empty($filminfo['check_trailer'])){

            $this->redirect($filminfo['link_watch']);
        }

		$filminfo['episode'] = $episodes[$episode_id];

        if(!in_array($country,Light_Config::get('config.censor.country_filter'))){

			$video_url=$filminfo["trailer_url"];
		}else{

			if(!is_int($youtube_decode)){

				$video_url = $filminfo['episode']['video_url'] = 'http://youtube.com/watch?v='.$youtube_decode;

			}else{
	
				$video_url = $filminfo['check_trailer']==1 ? $filminfo['trailer_url']:$filminfo['episode']['video_url'];
			}
		}

		//sao nó không chạy nhỉ?

        $data = Light_Grab::process($film_id,$episode_id,$video_url,$_SERVER['HTTP_HOST']);
		//check time o? day no load bao nhiêu

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
			$filminfo['setup_jwplayer'] = json_encode($this->_jwplayer_setup);
        }else{
			$filminfo['setup_jwplayer'] = FALSE;
			$filminfo['embed'] = $embed[0]['link'];

        }


		// fix for facebook comment
		$filminfo['link'] = Light_Link::film('film', $filminfo, NULL, TRUE, TRUE);
		//$filminfo['link_fbcomment'] = Light_Link::film('module', 'action=fbcomment', 'film_id=' . $film_id, TRUE, TRUE);
        $user_id = $this->_input->filter_single('user_id', Light_Input::UINT);
  
		$view_params = array(
			'filminfo' 		=> $filminfo,
			'episode_id'=>	$episode_id,
            'admin' 		=> Light_Visitor::instance()->group_id,
            'info_youtube'=>   $info_youtube,
			'url_canonical' => $url_canonical,
			'episode_cache' => $episode_cache,
			'server_cache'	=> $server_cache,
		);

		$episode = $filminfo['episode'];
        // keyword for search
        $keywords = $filminfo['tags']. ", xem phim $filminfo[title], phim $filminfo[title] online, phim $filminfo[title_o]";

        if($filminfo['comingsoon']){
            $status = $filminfo['comingsoon'];
        }else{
            $status = $filminfo['status'];
        }

        if(!empty($filminfo['check_trailer'])){
            $view_params += array(
                'page_title' => "Xem Phim $filminfo[title] ".$status,
                'page_keywords' => $filminfo[title].' '.$status.', '.$keywords,
                'page_description' => "$filminfo[title]. ".$status.", $filminfo[title_o] " . $filminfo['description'],
            );
        }

		if($episode['server_type'] == 'watch')
		{
			if($searched_by_keywords = @unserialize($filminfo['searched_by_keywords']))
			{
				$keywords .= ',' . implode(',', array_keys(array_slice($searched_by_keywords, 0, 3)));
				$keywords = implode(', ', array_unique(explode(',', $keywords)));
			}
            $view_params += array(
                'page_title' => "Xem Phim $filminfo[title] ".$status,
                'page_keywords' => $filminfo['title'].' '.$status.', '.$keywords,
                'page_description' => "$filminfo[title]. ".$status.", $filminfo[title_o] " . $filminfo['description'],
            );
		}
		else
		{
			$view_params += array(
                'page_title' => "[$episode[server_title]] $filminfo[title] Full - $filminfo[title_o]",
                'page_keywords' =>  'download ' . $filminfo['tags'],
                'page_description' => "Download $filminfo[title]: " . $filminfo['description'],
			);
		}
		// update views
		if( ! Cookie::get('watch-'.$film_id))
		{
			$film_model->update_views($film_id);
			Cookie::set('watch-'.$film_id, 1);
		}

		// check google search
		if($keyword = Light_Helper_Film::detect_keyword_from_search())
		{
			Light_Helper_Film::add_keyword_to_film($filminfo, $keyword);
		}

        if($reporterror){
            $this->_episodeDie($episode_id,$film_id,$reporterror);
        }

		$this->response_view('watch', $view_params);
	}

    protected function _episodeDie($episode_id,$film_id,$reporterror){

        // Start Xử lý tập Die
        $dw = Light_DataWriter::create('Light_DataWriter_Episode');
        $dw->set_existing('film_id', $film_id);
        $dw->set_existing('episode_id', $episode_id);
        $dw->set('episode_die', $reporterror);
        $dw->save();
    }

	protected function _get_episode_model()
	{
		return $this->get_model('Light_Model_Episode');
	}
}