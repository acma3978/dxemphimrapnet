<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Frontend_Ajax_Sidebar extends Controller_Frontend_Ajax {

    public function before()
    {
        parent::before();

        /*$this->_assert_ajax_only();*/
    }

    public function action_tab(){

        $type = $this->_input->filter_single('type', Light_Input::STRING);

        switch ($type){

            case 'item-top-le-week':
                if(!$top_le_views_week = $this->_cache->get('top_le_views_week'))
                {
                    $top_le_views_week = $this->_get_film(1, NULL, '10', NULL, $this->_objectSel["option"] = array('order'=>array('film.views_week' => 'DESC', 'film.last_update_episode'=>'DESC')));

                    !$this->_caching OR $this->_cache->set('top_le_views_week', $top_le_views_week);
                }

                $html = $this->view('home/tab_sidebar')
                    ->set('top_le_views_week', $top_le_views_week)
                    ->render();

                break;

            case 'item-top-le-month':
                if(!$top_le_views_month = $this->_cache->get('top_le_views_month'))
                {
                    $top_le_views_month = $this->_get_film(1, NULL, '10', NULL, $this->_objectSel["option"] = array('order'=>array('film.views_month' => 'DESC', 'film.last_update_episode'=>'DESC')));

                    !$this->_caching OR $this->_cache->set('top_le_views_month', $top_le_views_month);
                }

                $html = $this->view('home/tab_sidebar')
                    ->set('top_le_views_month', $top_le_views_month)
                    ->render();

                break;

            case 'item-top-bo-week':
                if(!$top_bo_views_week = $this->_cache->get('top_bo_views_week'))
                {
                    $top_bo_views_week = $this->_get_film(2, NULL, '10', NULL, $this->_objectSel["option"] = array('order'=>array('film.views_week' => 'DESC', 'film.last_update_episode'=>'DESC'))
                    );

                    !$this->_caching OR $this->_cache->set('top_bo_views_week', $top_bo_views_week);
                }

                $html = $this->view('home/tab_sidebar')
                    ->set('top_bo_views_week', $top_bo_views_week)
                    ->render();

                break;

            case 'item-top-bo-month':
                if(!$top_bo_views_month = $this->_cache->get('top_bo_views_month'))
                {
                    $top_bo_views_month = $this->_get_film(2, NULL, '10', NULL, $this->_objectSel["option"] = array('order'=>array('film.views_month' => 'DESC', 'film.last_update_episode'=>'DESC'))
                    );

                    !$this->_caching OR $this->_cache->set('top_bo_views_month', $top_bo_views_month);
                }

                $html = $this->view('home/tab_sidebar')
                    ->set('top_bo_views_month', $top_bo_views_month)
                    ->render();

                break;


        }

        echo $html;
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