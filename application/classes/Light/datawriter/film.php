<?php defined('SYSPATH') or die('No direct script access.');

class Light_DataWriter_Film extends Light_DataWriter {

    protected function _get_table_name()
    {
        return 'film';
    }

    protected function _get_fields()
    {
        return array(
            'film_id'				=> self::UINT,
            'title'					=> self::STRING,
            'title_lower'			=> self::STRING,	// support search by fulltext
            'title_ascii'			=> self::STRING,
            'title_o'				=> self::STRING,	// title original
            'title_o_ascii'			=> self::STRING,
            'status'				=> self::STRING,
            'comingsoon'				=> self::STRING,
            'note'					=> self::STRING,
            'type'					=> self::UINT, 		// 1: le, 2: bo
            'country_id'			=> self::UINT,		// verify
            'episode_timeline'	    => self::UINT,
            'episode_count'			=> self::UINT,
            'episode_latest'		=> self::INT,		// default is -1
            'director'				=> self::STRING,
            'actors'					=> self::STRING,
            'actors_ascii'			=> self::STRING,
            'timeline'				=> self::STRING,
            'imagefan'				=> self::STRING,
            'manufacturer'			=> self::STRING,
            'year'					=> self::UINT,
            'pagetext'				=> self::STRING,	// text - content, description
            'pagetext2'				=> self::STRING,	// text - content, description
            'trailer_url'			=> self::STRING,
            'check_trailer'			=> self::STRING,
            'image'					=> self::STRING,	// file name hosted
            'collect'					=> self::STRING,	// file name hosted
            'image_url'				=> self::STRING,	// picasa
            'image_url2'			=> self::STRING,	// imageshack
            'post_user_id'			=> self::UINT,		// verify user_id
            'views'					=> self::UINT,		// total views
            'views_day'				=> self::UINT,		// views of day
            'views_week'			=> self::UINT,		// views of week
            'views_month'			=> self::UINT,		// views of month
            //'rate_star_count'		=> self::UINT,		// total rated stars
            //'rate_user_count'		=> self::UINT,		// total rated user
            'liked_times'			=> self::UINT,
            'active'				=> self::BOOLEAN,
            'open'					=> self::BOOLEAN,
            'post_date'				=> self::UINT,
            'last_update'			=> self::UINT,
            'last_update_episode' 	=> self::UINT,
            'tags'					=> self::STRING,
            'tags_ascii'			=> self::STRING,
            'category_ids'			=> self::STRING,
            'comment_count'			=> self::UINT,
            'searched_by_keywords'	=> self::SERIALIZED,
            'similar_film_ids'		=> self::STRING,
            'options'				=> self::STRING, 	// must be set by array or string name of option
            'completion'			=> self::FLOAT,		// đã hoàn thành bao nhiêu phần(dành cho phim bộ). Tính theo 0.1 0.2 .v.v
        );
    }

    protected function _get_update_condition()
    {
        return 'film_id = ' . $this->_db->quote($this->get_existing('film_id'));
    }


    protected function _prepare_save()
    {
        // common rules
        $validation = Validation::factory($this->_new_data)
            ->rule('title', 				'min_length', array(':value', 3))
            ->rule('title', 				'max_length', array(':value', 250))
            ->rule('title',					'Light_DataWriter::not_empty', array(':validation', ':value', ':field'))
            ->rule('title_o', 				'min_length', array(':value', 3))
            ->rule('title_o', 				'max_length', array(':value', 250))
            ->rule('title_o',				'Light_DataWriter::not_empty', array(':validation', ':value', ':field'))
            ->rule('type',					'in_array', array(':value', array(1,2)))
            ->rule('episode_count',			'Light_Valid::digit_not_zero')
            ->rule('year',					'range', array(':value', 1000, 3000))
            ->rule('episode_timeline',		'in_array', array(':value',array(0,1)))
            ->rule('country_id', 			'Light_DataWriter_Country::verify_country_id', array(':validation', ':value'))
            ->rule('post_user_id', 			'Light_DataWriter_User::verify_user_id', array(':validation', ':value', 'post_user_id'))
            ->rule('post_user_id',			'Light_DataWriter::not_empty', array(':validation', ':value', ':field'))
            ->rule('category_ids',			'Light_DataWriter::not_empty', array(':validation', ':value', ':field'))
            ->rule('tags', 					'Light_DataWriter_Film::verify_tags', array(':validation', ':value'))
            ->rule('tags', 					'Light_DataWriter::not_empty', array(':validation', ':value', ':field'))

            ->rule('actor', 					'Light_DataWriter_Film::verify_actors', array(':validation', ':value'))
            ->rule('actors', 					'Light_DataWriter::not_empty', array(':validation', ':value', ':field'))

            // addition
            ->rule('trailer_url',			'Light_DataWriter_Film::verify_trailer_url', array(':validation', ':value'))

            ->rule('director',				'Light_DataWriter::not_empty', array(':validation', ':value', ':field'))
            ->rule('timeline',				'Light_DataWriter::not_empty', array(':validation', ':value', ':field'))
            ->rule('manufacturer',			'Light_DataWriter::not_empty', array(':validation', ':value', ':field'))
            ->rule('actors',					'Light_DataWriter::not_empty', array(':validation', ':value', ':field'))
            ->rule('year',					'Light_DataWriter::not_empty', array(':validation', ':value', ':field'))
        ;

        // insert rules
        if($this->is_insert())
        {
            $validation
                ->rule('post_user_id', 		'not_empty')
                ->rule('title',				'not_empty')
                ->rule('title_o',			'not_empty')
                ->rule('pagetext',			'not_empty')
                ->rule('tags',				'not_empty')
                ->rule('director',			'not_empty')
                ->rule('timeline',			'not_empty')
                ->rule('manufacturer',		'not_empty')
                ->rule('actors',				'not_empty')
                ->rule('year',				'not_empty')
                ->rule('episode_count',		'not_empty')
                ->rule('country_id',		'not_empty')
                ->rule('post_date',			'not_empty')
                ->rule('last_update',		'not_empty')
                ->rule('category_ids',		'not_empty')
            ;
        }
        // update rules
        if($this->is_update())
        {
            $film_id = $this->get_existing('film_id');

            // Need current tags, actors, category_ids, country_id if you want to change it
            if(
                ($this->get_new('tags') AND ! $this->get_existing('tags'))
                OR ($this->get_new('actors') AND ! $this->get_existing('actors'))
                OR ($this->get_new('category_ids') AND ! $this->get_existing('category_ids'))
                OR ($this->get_new('country_id') AND ! $this->get_existing('country_id'))
            )
            {
                $this->set_existing($this->_get_film_model()->get_film_by_id($film_id));
            }
        }
        $validation->check();
        $this->errors($validation->errors('errors'));
    }

    protected function _post_save()
    {
        $film_id = $this->get_existing('film_id');

        if($this->is_insert())
        {
            $film_id = $this->insert_id();

            $this->_get_user_model()->build_post_count($this->get('post_user_id'));
        }

        // Build film_count for country
        if($this->get_existing('country_id') != $this->get_new('country_id'))
        {
            $this->_get_country_model()->build_film_count($this->get_new('country_id'));

            if($this->get_existing('country_id'))
            {
                $this->_get_country_model()->build_film_count($this->get_existing('country_id'));
            }
        }

        // CATEGORY
        if($this->get_new('category_ids') AND $new_category_ids = explode(',', $this->get_new('category_ids')))
        {
            // Remove all old filmcategory
            $this->_db->delete('filmcategory', 'film_id = ?', $film_id);

            if(!is_array($old_category_ids = $this->get_existing('category_ids')))
            {
                $old_category_ids = explode(',', $old_category_ids);
            }

            // Insert filmcategory
            foreach($new_category_ids as $category_id)
            {
                $this->_db->insert("
					REPLACE INTO c_filmcategory (film_id, category_id) VALUES ($film_id, $category_id);
				");
            }
            foreach(array_merge($old_category_ids, $new_category_ids) as $category_id)
            {
                $this->_get_category_model()->build_film_count($category_id);
            }
        }
        // TAG
        if($this->get_new('tags') AND $new_taglist = explode(',', $this->get_new('tags')))
        {
            $tag_model = $this->_get_tag_model();

            // Remove all old filmtags
            $this->_db->delete('filmtag', 'film_id = ?', $film_id);

            if( ! is_array($old_taglist = $this->get_existing('tags')))
            {
                $old_taglist = explode(',', $old_taglist);
            }

            $existing_tags = $tag_model->get_tags_by_titles($new_taglist);
            $tags_insert = $new_taglist; // tags for inserting

            // Array tag_id-title pairs to insert filmtag
            $used_tags = array();

            // Remove existing tag from array tags need to insert
            foreach($existing_tags as $tag_id => $existing_tag)
            {
                foreach($tags_insert as $key => $tag)
                {
                    if(strtolower($existing_tag['title']) == strtolower($tag))
                    {
                        unset($tags_insert[$key]);
                        $used_tags[$tag_id] = $tag;
                    }
                }
            }
            // Insert tags
            foreach($tags_insert as $tag)
            {
                $tag_dw = Light_DataWriter::create('Light_DataWriter_Tag');
                $tag_dw->set('title', $tag);
                $tag_dw->save();
                if(empty($tag_dw->errors))
                {
                    $new_tagid = $tag_dw->insert_id();
                    $used_tags[$new_tagid] = $tag;
                }
                else
                {
                    throw new Light_Exception('Have an error occured when insert new tag.');
                }
            }
            // Insert filmtag
            foreach($used_tags as $tag_id => $tag_title)
            {
                $this->_db->insert("
					REPLACE INTO c_filmtag (film_id, tag_id) VALUES ($film_id, $tag_id)
				");
            }
            //update tags to film
            if($used_tags)
            {
                $tags_ascii = $tag_model->get_tags_by_titles($used_tags);
                $used_tags_ascii = array();
                foreach($tags_ascii as $tag)
                {
                    $used_tags_ascii[$tag['title']] = $tag['title_ascii'];
                }

                $this->_db->write('
					UPDATE c_film
					SET tags = ?,
						tags_ascii = ?
					WHERE film_id = ?
				', array(
                    implode(',', array_keys($used_tags_ascii)),
                    implode(',', array_values($used_tags_ascii)),
                    $film_id
                ));
            }
            // Tags need to rebuild used_count
            $tags = $tag_model->get_tags_by_titles(array_merge($old_taglist, $new_taglist));
            foreach($tags as $tag_id => $tag)
            {
                $this->_get_tag_model()->build_used_count($tag_id);
            }
        }

        // ACTOR
        if($this->get_new('actors') AND $new_actorlist = explode(',', $this->get_new('actors')))
        {
            $actor_model = $this->_get_actor_model();

            // Remove all old filmactors
            $this->_db->delete('filmactor', 'film_id = ?', $film_id);

            if( ! is_array($old_actorlist = $this->get_existing('actors')))
            {
                $old_actorlist = explode(',', $old_actorlist);
            }

            $existing_actors = $actor_model->get_actors_by_titles($new_actorlist);
            $actors_insert = $new_actorlist; // actors for inserting

            // Array actor_id-title pairs to insert filmactor
            $used_actors = array();

            // Remove existing actor from array actors need to insert
            foreach($existing_actors as $actor_id => $existing_actor)
            {
                foreach($actors_insert as $key => $actor)
                {
                    if(strtolower($existing_actor['title']) == strtolower($actor))
                    {
                        unset($actors_insert[$key]);
                        $used_actors[$actor_id] = $actor;
                    }
                }
            }
            // Insert actors
            foreach($actors_insert as $actor)
            {
                $actor_dw = Light_DataWriter::create('Light_DataWriter_Actor');
                $actor_dw->set('title', $actor);
                $actor_dw->save();
                if(empty($actor_dw->errors))
                {
                    $new_actorid = $actor_dw->insert_id();
                    $used_actors[$new_actorid] = $actor;
                }
                else
                {
                    throw new Light_Exception('Have an error occured when insert new actor.');
                }
            }
            // Insert filmactor

            foreach($used_actors as $actor_id => $actor_title)
            {
                $this->_db->insert("
					REPLACE INTO c_filmactor (film_id, actor_id) VALUES ($film_id, $actor_id)
				");
            }

            //update actors to film
            if($used_actors)
            {
                $actors_ascii = $actor_model->get_actors_by_titles($used_actors);
                $used_actors_ascii = array();
                foreach($actors_ascii as $actor)
                {
                    $used_actors_ascii[$actor['title']] = $actor['title_ascii'];
                }

                $this->_db->write('
					UPDATE c_film
					SET actors = ?,
						actors_ascii = ?
					WHERE film_id = ?
				', array(
                    implode(',', array_keys($used_actors_ascii)),
                    implode(',', array_values($used_actors_ascii)),
                    $film_id
                ));
            }
            // Actors need to rebuild used_count
            $actors = $actor_model->get_actors_by_titles(array_merge($old_actorlist, $new_actorlist));
            foreach($actors as $actor_id => $actor)
            {
                $this->_get_actor_model()->build_used_count($actor_id);
            }
        }
    }

    protected function _prepare_delete()
    {
        // required fields
        $required_fields = array('film_id', 'tags', 'actors', 'countrty_id', 'post_user_id', 'category_ids');
        $fetch_db = FALSE;
        foreach($required_fields as $field)
        {
            if( ! $this->get_existing($field))
            {
                $fetch_db = TRUE;
                break;
            }
        }
        if($fetch_db)
        {
            $film_model = $this->_get_film_model();
            $film = $film_model->get_film_by_id($this->get_existing('film_id'));
            if(empty($film))
            {
                $this->errors[] = 'Film is not exist.';
                return;
            }
            $this->set_existing($film);
        }
    }

    protected function _post_delete()
    {
        // Remove all old filmtags
        $this->_db->delete('filmtag', 'film_id = ?', $this->film_id);
        // Remove all old filmactors
        $this->_db->delete('filmactor', 'film_id = ?', $this->film_id);
        // Remove all old filmcategory
        $this->_db->delete('filmcategory', 'film_id = ?', $this->film_id);
        // Remove all episodes
        $this->_db->delete('episode', 'film_id = ?', $this->film_id);
        // Remvove all comments
        $this->_db->delete('comment', 'film_id = ?', $this->film_id);

        // Rebuild film_count of all old categories
        if( ! is_array($old_category_ids = $this->get_existing('category_ids')))
        {
            $old_category_ids = explode(',', $old_category_ids);
        }
        foreach(array_merge($old_category_ids) as $category_id)
        {
            $this->_get_category_model()->build_film_count($category_id);
        }
        // Rebuild used_count of all old tags
        if(is_string($old_taglist = $this->get_existing('tags')))
        {
            $old_taglist = explode(',', $old_taglist);
        }
        $tags = $this->_get_tag_model()->get_tags_by_titles($old_taglist);
        foreach($tags as $tag_id => $tag)
        {
            $count = $this->_get_tag_model()->build_used_count($tag_id);
        }

        // Rebuild used_count of all old actors
        if(is_string($old_actorlist = $this->get_existing('actors')))
        {
            $old_actorlist = explode(',', $old_actorlist);
        }
        $actors = $this->_get_actor_model()->get_actors_by_titles($old_actorlist);
        foreach($actors as $actor_id => $actor)
        {
            $count = $this->_get_actor_model()->build_used_count($actor_id);
        }

        // build post_count of post_user_id
        $this->_get_user_model()->build_post_count($this->post_user_id);

        // build film count of country
        $this->_get_country_model()->build_film_count($this->country_id);
    }


    /**
     * Syns for easy search
     */
    public function filter_title($value)
    {
        $value = preg_replace('#[\s-]+#u', ' ', $value);

        // remove special chars and to lower to support fulltext search
        $value_lower = Light_Helper_Unicode::lower($value);
        $value_lower = preg_replace('#[^\x80-\xff\w]#', ' ', $value_lower);
        $this->set('title_lower', $value_lower);

        $this->set('title_ascii', Light_Helper_Base::remove_accent_vn($value));
        return $value;
    }

    /**
     * Syns for easy search
     */
    public function filter_title_o($value)
    {
        $value = preg_replace('#[\s-]+#u', ' ', $value);
        //$value = Light_Helper_Unicode::remove_accent($value);
        //$value = Light_Helper_Unicode::lower($value);
        //$value = Light_Helper_Unicode::ucwords($value);

        $this->set('title_o_ascii', Light_Helper_Base::remove_accent_vn($value));
        return $value;
    }

    /**
     * Filter category ids - remove category is invalid
     *
     * @param string|array - String category ids separated by comma / array of category id
     * @return string - category ids separated by comma
     */
    public function filter_category_ids($value)
    {
        if(is_string($value))
        {
            $value = explode(',', $value);
        }
        if( ! is_array($value) OR empty($value))
        {
            return '';
        }
        $value = array_map('trim', $value);
        $category_model = $this->_get_category_model();

        if($categories = $category_model->get_categories_by_ids($value))
        {
            return implode(',', array_keys($categories));
        }
        return '';
    }

    /**
     * Helper method to remove all links
     * this is private - for phim3s.net
     */
    public function filter_pagetext($value)
    {
        $value = preg_replace('#<img.+?src=[\'|"](?P<src>https?://[^"\']+)[\'|"].*?/?>#is', '<img src="$1" />', $value);
        $value = preg_replace('#\&lt\;/?([a-z]+).*?\&gt\;#i', '', $value);
        $value = preg_replace('#<p.*?align="center".*?>(.+?)</p>#i', '$1', $value);
        $value = preg_replace('#<div.*?align="center".*?>(.+?)</div>#i', '$1', $value);
        $value = preg_replace('#(<p.*?>)?<img.*?src="(.+?)"\s*/?>(</p>)?#iu', '<p><img src="$2" /></p>', $value);
        $value = preg_replace('# data-([\w-_]+)="([^"]+)"#', '', $value);

        // remove all links
        preg_match_all('#<a.*?href="(?P<href>.+?)".*?>(?P<text>.+?)</a>#is', $value, $matches, PREG_SET_ORDER);
        foreach($matches as $match)
        {
            if( ! stripos($match['href'], 'phim3s.net') AND !stripos($match['href'], 'bitphim.net'))
            {
                $value = str_replace($match[0], $match['text'], $value);
            }
        }
        return $value;
    }

    /**
     * Options must be set by array or string name of options
     * $dw->set('options', 'phim_hot');
     * $dw->set('options', array('phim_hot', 'phim_chieu_rap'));
     *
     * @return integer - total value of the options
     */
    public function filter_options($value)
    {
        return Light_Helper_Film::convert_options_to_bit($value);
    }

    /**
     * Filter tags, remove bad tags
     */
    public function filter_tags($value)
    {
        $value = Light_Helper_Tag::sanitize_taglist($value, FALSE); // FALSE to keep bad tags

        $tags_ascii = array_map('Light_Helper_Base::remove_accent_vn', explode(',', $value));
        $this->set('tags_ascii', implode(',', $tags_ascii));
        return $value;
    }

    public function filter_actors($value)
    {
        $value = Light_Helper_Tag::sanitize_taglist($value, FALSE); // FALSE to keep bad actors

        $actors_ascii = array_map('Light_Helper_Base::remove_accent_vn', explode(',', $value));
        $this->set('actors_ascii', implode(',', $actors_ascii));
        return $value;
    }

    public function filter_manufacturer($value)
    {
        return $this->_sanitize_list($value);
    }

    public function filter_director($value)
    {
        return $this->_sanitize_list($value);
    }

    /**
     * Trim list and remove much space adjacent to a space
     *
     * @return string - separated by comma
     */
    protected function _sanitize_list($value)
    {
        if(is_string($value))
        {
            $value = explode(',', $value);
        }
        if( ! is_array($value))
        {
            return '';
        }
        $value = array_map('trim', (array) $value);
        $value = array_filter($value, 'strlen');
        foreach($value as &$child)
        {
            $child = preg_replace('#[\s]+#u', ' ', $child);
        }

        return implode(',', array_unique($value));
    }


    /**
     * @param Kohana_Validation
     * @param string Taglist separated by comma
     */
    public static function verify_tags($validation, $tags)
    {
        if($tags !== NULL)
        {
            if(empty($tags))
            {
                return $validation->error('tags', 'not_empty');
            }
            $config = Light_Config::get('config.tag');
            $count = count($tags);

            $tags = explode(',', $tags);

            foreach($tags as $tag)
            {
                if( ! Light_Helper_Tag::length_appro($tag))
                {
                    return $validation->error('tags', 'min_max_length', array($tag, $config['min_length'], $config['max_length']));
                }
            }

            if($count > $config['limit'])
            {
                return $validation->error('tags', 'limit_count', array($config['limit'], $count));
            }

        }
    }

    public static function verify_actors($validation, $actors)
    {
        if($actors !== NULL)
        {
            if(empty($actors))
            {
                return $validation->error('actors', 'not_empty');
            }
            $config = Light_Config::get('config.actor');
            $count = count($actors);

            $actors = explode(',', $actors);
            foreach($actors as $actor)
            {
                if( ! Light_Helper_Tag::length_appro($actor))
                {
                    return $validation->error('actors', 'min_max_length', array($actor, $config['min_length'], $config['max_length']));
                }
            }
            if($count > $config['limit'])
            {
                return $validation->error('actors', 'limit_count', array($config['limit'], $count));
            }
        }
    }

    /**
     * This method is private
     * For only mysite - phim3s.net because we want to use only youtube url
     */
    public static function verify_trailer_url($validation, $value)
    {
        if($value !== NULL AND $value)
        {
            if(!preg_match('#http://www.youtube.com/watch\?v=([\w_-]+)#', $value))
            {
                $validation->error('trailer_url', 'matches');
            }
        }
    }

    /**
     * Check the film_id already exists or not.
     * If it is NOT already exists then add error to validation
     */
    public static function verify_film_id($validation, $film_id)
    {
        if($film_id !== NULL)
        {
            $film_model = Light_Model::create('Light_Model_Film');

            $film_model->get_film_by_id($film_id)
                ? FALSE
                : $validation->error('film_id', 'not_exists');
        }
    }

    protected function _get_user_model()
    {
        return $this->_get_model('Light_Model_User');
    }

    protected function _get_country_model()
    {
        return $this->_get_model('Light_Model_Country');
    }

    protected function _get_comment_model()
    {
        return $this->_get_model('Light_Model_Comment');
    }

    protected function _get_category_model()
    {
        return $this->_get_model('Light_Model_Category');
    }

    protected function _get_tag_model()
    {
        return $this->_get_model('Light_Model_Tag');
    }

    protected function _get_actor_model()
    {
        return $this->_get_model('Light_Model_Actor');
    }

    protected function _get_film_model()
    {
        return $this->_get_model('Light_Model_Film');
    }
}