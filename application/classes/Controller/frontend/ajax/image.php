<?php defined('SYSPATH') or die('No direct script access.');
header('Access-Control-Allow-Origin: *');
class Controller_Frontend_Ajax_Image extends Controller_Frontend_Ajax {


    public function before()
    {
        #parent::before();

        //$this->_assert_ajax_only();
    }

    public function action_processimage(){

        $config = Light_Config::get('config.film');

        $data_dir = Light_Helper_File::get_data_dir();

        $filename = Light_Link::translate_to_url($_POST['filename'], TRUE, TRUE);

        $image_file = $data_dir . $config['image_path'] . $filename.'.jpg';

        $image_wall_file = $data_dir . $config['image_path'] . $filename.'-wall.jpg';

        if($_POST['type']=='1'){

            if (file_exists($image_file)) {

                echo '<span class="iconSprite CImageicon image-cok"></span>Image: <b>Yes</b>';
            }else{
                echo '<span class="iconSprite CImageicon image-cuok"></span>Image: <b>No</b>';
            }
        }else{

            if (file_exists($image_wall_file)) {

                echo '<span class="iconSprite CImageicon image-cok"></span>Wall: <b>Yes</b>';
            }else{
                echo '<span class="iconSprite CImageicon image-cuok"></span>Wall: <b>No</b>';
            }
        }
    }

    public function action_uploadimage(){

        Light_Helper_Film::leech_image($_POST['file'], $_POST['name'],$_POST['domain']['data_path'],$_POST['domain']['temporary_path'], $_POST['wall']);
        return $_POST['name'];
    }
}