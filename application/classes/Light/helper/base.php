<?php 

class Light_Helper_Base {
	
	/**
	 * Helper method to build sitemap.xml for phim3s.net
	 * this is private
	*/
	public static function build_sitemap()
	{
		$urls = array();
		$urls[] = array(
			'loc'			=> URL::base(),
			'changefreq' 	=> 'daily',
			'priority' 		=> '1.00'
			
		);

        $contents = Light_Application::get('contents');

        foreach($contents as $content)
        {
            if($content['pagetext2']!=NULL) {
                $urls[] = array(
                    'loc' => Light_Link::build('content', $content, NULL, TRUE, TRUE),
                    'changefreq' => 'daily',
                    'priority' => '0.9'
                );
            }
        }

		$categories = Light_Application::get('categories');
		foreach($categories as $category)
		{
			$urls[] = array(
				'loc' 			=> Light_Link::build('category', $category, NULL, TRUE, TRUE),
				'changefreq' 	=> 'daily',
				'priority' 		=> '0.9'
			);
		}

        $countries = Light_Application::get('countries');
        foreach($countries as $country)
        {
            $urls[] = array(
                'loc' 			=> Light_Link::build('country', $country, NULL, TRUE, TRUE),
                'changefreq' 	=> 'daily',
                'priority' 		=> '0.9'
            );
        }
        $blocklinks = array(
            'phim_chieu_rap',
            'phim_bo',
            'phim_le',
            'phim_moi',
        );
        $blocklinks = array_flip($blocklinks);
        foreach(array_keys($blocklinks) as $name)
        {
            $urls[] = array(
                'loc' 			=> Light_Link::build('list', array('name' => strtr($name, '_', '-')), NULL, TRUE, TRUE),
                'changefreq' 	=> 'daily',
                'priority' 		=> '0.8'
            );
        }
        $film_model = Light_Model::create('Light_Model_Film');
        $films = $film_model->get_films(array(
            'active' => 1,
        ), array(
            'select_fields' => array('film.film_id', 'film.title', 'film.title_o', 'film.title_ascii', 'film.title_o_ascii'),
            'order' => array('film.film_id' => 'DESC')
        ));
        foreach($films as $film)
        {
            $urls[] = array(
                'loc' 			=> Light_Link::film('film', $film, NULL, TRUE, TRUE),
                'changefreq' 	=> 'daily',
                'priority' 		=> '0.5'
            );
        }
        $xml = '<?xml version="1.0" encoding="UTF-8"?>
<urlset
    xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
    http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';

        foreach($urls as $url)
        {
            $xml .= PHP_EOL . '<url>' . PHP_EOL;
            foreach($url as $tag => $content)
            {
                $xml .= "\t<{$tag}>{$content}</{$tag}>" . PHP_EOL;
            }
            $xml .= '</url>';
        }
        $xml .= '</urlset>';

        return file_put_contents(DOCROOT . 'sitemap.xml', $xml);
	}
	
	/**
	 * Only remove accent of Vietnam language, keep original for other language.
	 * Remove all special characters, and remove much space adjacent to a space
	 * this method is private - for My site
	*/
	public static function remove_accent_vn($value)
	{
		$value = Light_Helper_Unicode::remove_accent($value);
		$value = Light_Helper_Unicode::lower($value);
		$value = preg_replace('#[^\x80-\xff\w]#', ' ', $value); // special chars
		$value = preg_replace('#[\s-]+#u', ' ', $value); 
		return trim($value);
	}
	
	
	/**
	 * @return string - HTML rendered
	*/
	public static function page_navigation($current_page, $total_page, $prefix = '?page=', $suffix = '')
	{

		if($total_page < $current_page)
		{
			$current_page = $total_page;
		}
		$html = '<span class="page_nav"><label class="desc">Page ' . $current_page . '/ ' . $total_page . '</label>';
		$nav = array(
			'next' => 2,
			'prev' => 2,
		);
		$start = (($start = $current_page - $nav['prev']) < 1) ? 1 : $start;
		$end = (($end = ($current_page + $nav['next'])) > $total_page) ? $total_page : $end; 
		
		// show first page
		if($current_page - $nav['prev'] > 1)
		{
			$html .= '<span class="item"><a href="' . $prefix . '1' . $suffix . '">1</a></span>';
		}
		else if(($temp = $current_page + $nav['next']*2) < $total_page)
		{
			$end = $temp;
		}
		if(($temp = $current_page - $nav['prev']*2) > 1 AND $current_page + $nav['next'] > $total_page)
		{
			$start = $temp;
		}
		if($start > 2)
		{
			$html .= '<span class="prev">...</span>'; //'&larr;';
		}
		for($i = $start; $i <= $end; $i ++)
		{
			if($i == $current_page)
			{
				$html .= '<span class="current">'.$i.'</span>'; // current page
			}
			else
			{
				$html .= '<span class="item"><a href="' . $prefix . $i . $suffix . '">'.$i.'</a></span>';
			}
		}
		if($end <= $total_page - $nav['next'])
		{
			$html .= '<span class="next">...</span>'; //'&rarr;';
		}
		// show end
		if($total_page - $nav['next'] > $current_page)
		{
			$html .= '<span class="item"><a href="' . $prefix . $total_page . $suffix . '">'.$total_page.'</a></span>';
		}
		// show next
		if($current_page < $total_page)
		{
			$html .= '<span class="item"><a href="' . $prefix . ($current_page + 1) . $suffix . '">'.__('Next').'</a></span>';
		}
		
		$html .= '</span>';

		return $html;
	}
}