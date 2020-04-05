<?php

class Light_Helper_Content {

	/**
	 * Parse and add more keys to $film
	 * @return array
	*/
	public static function parse(array $film, array $parse_options = array())
	{
        $config = Light_Config::get('config.film');

		$addition = array(
			'title'					=> htmlspecialchars($film['title']),
			'short_title'			=> htmlspecialchars(Light_Helper_String::truncate($film['title'], 40)),
            'short_title_sub'			=> htmlspecialchars(Light_Helper_String::truncate($film['title'], 50)),
            'short_title_fid'			=> htmlspecialchars(Light_Helper_String::truncate($film['title'], 35)),
			'title_o'				=> htmlspecialchars($film['title_o']),
			'short_title_o'			=> htmlspecialchars(Light_Helper_String::truncate($film['title_o'], 35)),
            'short_title_o_sub'			=> htmlspecialchars(Light_Helper_String::truncate($film['title_o'], 45)),
            'short_title_o_fid'			=> htmlspecialchars(Light_Helper_String::truncate($film['title_o'], 25)),
			'description'			=> self::description($film['pagetext']),
            'description2'			=> self::description($film['pagetext2']),
			'link'					=> Light_Link::film('film', $film),
			'link_watch'			=> Light_Link::film('watch', $film),

			'image_url_o' 			=> self::get_image_imgur($film['image_url'],'1'),
            'thumb_url_o' 			=> self::get_image_imgur($film['image_url'],'2'),
            'small_url_o' 			=> self::get_image_imgur($film['image_url'],'3'),

			'image_url' 			=> self::get_image_url($film,'1',$config['img_server']),
            'thumb_url' 			=> self::get_image_url($film,'2',$config['img_server']),
            'small_url'             => self::get_image_url($film,'3',$config['img_server']),

            'short_pagetext' => Light_Helper_String::truncate_str($film['pagetext'], 330),
            'short_pagetext2' => Light_Helper_String::truncate_str($film['pagetext2'], 330),

            'date_format'			=> date('d-m',$film['last_update']),

			'liked_format'			=> number_format($film['liked_times']),
			'views_format' 			=> number_format($film['views']),
			'views_day_format' 		=> number_format($film['views_day']),
			'views_week_format' 	=> number_format($film['views_week']),
			'views_month_format' 	=> number_format($film['views_month']),
		) ;
		// fake rating
		 $film['rating'] = 0;
		for($i = 5; $i > 0; $i--)
		{
			if($film['liked_times']/$i >= 1)
			{
				$film['rating'] = $i*2;
				break;
			}
		}

		// category
		if(!empty($film['category_ids']))
		{
			$category_ids = explode(',', $film['category_ids']);
			$category_cache = Light_Application::get('categories');
			$addition['categories'] = array();
			$count = count($category_ids);
			foreach($category_ids as $key => $category_id)
			{
				$category = $category_cache[$category_id];
				$category['is_last'] = $key == $count-1;
				$addition['categories'][$category_id] = $category;
			}
		}
		// country
		if(!empty($film['country_id']))
		{
			$country_cache = Light_Application::get('countries');
			$addition['country'] = $country_cache[$film['country_id']];
		}
		// tags
		if(!empty($parse_options['tags']) AND !empty($film['tags']) AND !empty($film['tags_ascii']))
		{
			$tags = array_combine(explode(',', $film['tags']), explode(',', $film['tags_ascii']));
			$counter = 0;
			$count_tags = count($tags);
			$addition['tags_link'] = array();
			foreach($tags as $title => $title_ascii)
			{
				$addition['tags_link'][$counter] = array(
					'title'		=> $title,
					'link' 		=> Light_Link::build('tag', array('title_ascii' => $title_ascii)),
					'is_last' 	=> $counter++ == $count_tags-1,
				);
			}
		}

		return $addition + $film;
	}

	/**
	 * Helper method to get image url from $film
	 * @return string
	*/
	public static function get_image_url(array $film, $is_thumbnail = FALSE, $local = FALSE){
        if($local){

            if(Light_Config::get('config.film.link_dserver')){
                $domain = Light_Config::get('config.config.subdomainImage');
            }else{
                $domain = URL::base().'data/';
            }

            $url = $film[image];

            if (strpos($url, ".jpg")) {
                $url = str_replace(basename('.jpg'), '', $url);
            }
            if(!empty($url)) {
                if ($is_thumbnail == 1) {
                    $url .= '.jpg';
                } elseif ($is_thumbnail == 2) {
                    $url .= '-thumb.jpg';
                } elseif ($is_thumbnail == 3) {
                    $url .= '-small.jpg';
                }
                $url = $domain.'images/films/'.$film[film_id].'/'.$url;
            }else{
                $url = NULL;
            }
        }else{
            // use picasa
            $url = $film['image_url'];

            $host = parse_url($url, PHP_URL_HOST);
            $url = preg_replace('#https?://' . $host.'#i', 'http://2.bp.blogspot.com', $url);

            if(strpos(basename($url), '.'))
            {
                $url = str_replace(basename($url), '', $url);
            }
            if(!empty($url)) {
                if ($is_thumbnail == 2) {
                    $url .= 's300/';
                } elseif ($is_thumbnail == 3) {
                    $url .= 's50/';
                }
            }
        }

        return $url;
        // imageshack
        $url = $film['image_url2'];
        //$url = preg_replace('#img\d+\.#i', 'a.', $url);
        $url = preg_replace(
            '#http://img([\d]+)\.imageshack.us/img[\d]+/[\d]+/(.*?)$#',
            'http://desmond.imageshack.us/Himg$1/scaled.php?server=$1&filename=$2&res=landing',
            $url
        );
        //$url = 'http://www.gmodules.com/gadgets/proxy?refresh=86400&amp;container=ig&amp;url=' . urlencode($url);

        return htmlspecialchars($url);
	}

    public static function get_image_imgur($film, $is_thumbnail = FALSE){
        // use imgur
        $url = $film;

        if(strpos($url,'googleusercontent')!==false){
            $host = parse_url($url, PHP_URL_HOST);
            $url = preg_replace('#https?://' . $host.'#i', 'http://2.bp.blogspot.com', $url);

            if(strpos(basename($url), '.'))
            {
                $url = str_replace(basename($url), '', $url);
            }
            if(!empty($url)) {
                if ($is_thumbnail == 2) {
                    $url .= 's300/';
                } elseif ($is_thumbnail == 3) {
                    $url .= 's50/';
                }
            }
        }else{
            if (strpos($url, ".jpg")) {
                $url = str_replace(basename('.jpg'), '', $url);
            }
            if(!empty($url)){
                if ($is_thumbnail == 1) {
                    $url .= 'l.jpg';
                } elseif ($is_thumbnail == 2) {
                    $url .= 'm.jpg';
                } elseif ($is_thumbnail == 3) {
                    $url .= 's.jpg';
                }
            }
        }
        return $url;
        return htmlspecialchars($url);
    }

	/**
	 * Automatic detect keyword income from google search
	 *
	 * @return string
	*/


	/**
	 * Convert options from bit to array name
	 *
	 * @param 	integer - bit value
	 * @return 	array - Array name of option
	*/


	/**
	 * Upload image to server
	 *
	 * @param 	string	input name (type = file)
	 * @param	string  Filename for saving when upload completed (without extension)
	 * @param	array	@ref
     * @return boolean|string - FALSE if upload is failed, otherwise return filename with extension
	*/


	/**
	 * Helper method to crop, resize image, thumbnail of film
	 *
	 * @param string 	temp file
	 * @param string	filename without extension
	 * @param boolean 	delete temp file after processed
	 * @return boolean|string - FALSE if process is failed, otherwise return filename with extension
	*/


	/**
	 * Gets description from content text
	 * @return string
	*/
	public static function description($text, $length = 120)
	{
		$text = preg_replace('#\[/?(CODE|HTML|QUOTE|PHP|SPOILER|DOWNLOAD)[^\]]*?\]#i', '', $text);
		$text = preg_replace("#\r?\n#", ' ', $text);
		$text = strip_tags($text);
		$text = Light_Helper_String::truncate($text, $length);
		$text = htmlspecialchars($text);
		return $text;
	}


	/**
	 * Upload image to picasa and gets url of image uploaded
	 * @return string
	*/
}