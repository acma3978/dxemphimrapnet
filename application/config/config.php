<?php defined('SYSPATH') or die('No direct access allowed.');

$config['global_xss_filtering'] = FALSE;

$application = 'application';
$modules = 'modules';
$system = 'system';

$skin="default";
$skin_mobile="mobile";
$cache_dir='template_cache';
$cache_dir_mobile='template_mobile_cache';

$cachedir=APPPATH.$cache_dir;
$cachedir_mobile=APPPATH.$cache_dir_mobile;
$system = 'system';

return array(
    // set = TRUE để thực hiện 1 số thao tác khi yêu cầu. VD như xóa 1 category có chứa nhiều post
    'debug'				=> FALSE,

    'superadmin'		=> array(1, 2),

    'moderator'			=> array(
        'ownership_of_all_films'	=> TRUE, // TRUE/FALSE
    ),

    'dateformat'		=> 'd/m/Y',
    'timeformat'		=> 'h:i A',
    'datetimeformat' 	=> 'd/m/Y, h:i A',

    'data_path'			=> 'data/',
    'temporary_path'	=> 'data/temp/',

    'skin' => array(
        'mobile_stick'          => TRUE, // Bật tắt Template Mobile
        'backend' 	            => 'default',
        'frontend' 	            => 'default',
        'cachedir'              => $cachedir,
        'frontend_mobile' 	    => $skin_mobile, // chuyển đổi thiết bị tại đây
        'cachedir_mobile'       => $cachedir_mobile
    ),

    'tag' => array(
        'remove' 		        => array('?','\\', '"', '/', "'", '=', '_', '+', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', ']', '[', '>', '<'),
        'limit'			        => 15,
        'min_length'	        => 3,
        'max_length'	        => 60
    ),

    'film'	=> array(
        'image_upload_size'	    => '300KB', // upload ảnh phim có dung lượng tối đa
        'image_upload_ext'	    => array('jpg', 'gif', 'jpeg', 'png'), // các kiểu file cho phép upload
        'image_ext'			    => '.jpg', // save image với đuôi là
        'image_path'		    => 'images/films/', // folder chứa ảnh phim (nằm trong data_path)
        'image_w'			    => 302, // chiều rộng của ảnh phim
        'image_h'			    => 440, //

        'image_quality'			=> 90, // Chất lượng ảnh Upload

        'thumb_w'			    => 200, // chiều rộng của thumbnail
        'thumb_h'			    => 283, //

        'small_w'			    => 100, // chiều rộng của small
        'small_h'			    => 133, //
		
		'image_w_wall'	    => 1310, // chiều rộng của Wall thumbnail
        'image_h_wall'		=> 490, //

        'image_w_thumb_wall'=> 350, // chiều rộng của ảnh Wall phim
        'image_h_thumb_wall'=> 175, //

        'image_w_small_wall'=> 90, // chiều rộng của ảnh Wall phim
        'image_h_small_wall'=> 40, //

        'img_server'            => TRUE, // Đọc ảnh Offline || Đọc ảnh Online
        'link_dserver'          => FALSE, // TRUE http://image.tronbohd.com or FALSE http://tronbohd.com bật tắt trong Source

        'upload_imgur'          => FALSE, // Upload ảnh lên Imgur - Mặc định sẽ Upload ảnh lên Localhost
        'upload_imageshack'     => FALSE, // Upload ảnh lên Imageshack - Mặc định sẽ Upload ảnh lên Localhost
    ),

    'censor'			        => array(
        'country_filter'		=> array('VN'), // TRAILER all ON | TRAILER vn OFF Có thể dùng array('VN','US'),
        //'grab'                  => 'http://vpnginx.space/leech/appliops.php?v='.date("d-m-Y"),
		'grab'=> 'http://localhost/players/libraries/appliops.php',
        'leech'                 => 'http://vpnginx.space/leech/leech.php?v='.date("d-m-Y"), // Online
        'cacheEpisode'          => 'OFF', // Bật tắt cache episode Online | Offline
        'cacheFile'             => TRUE, // Bật tắt cache_file TRUE | FALSE
        'cacheLinkImage'        => FALSE, // Bật tắt cache ảnh Google gadgets and proxy
	    'ratestar'                 => '8000'
    ),
);
