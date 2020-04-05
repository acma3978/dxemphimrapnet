<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Custom error messages
*/

return array(
	// common
	'Upload::size'					=> ':field phải nhỏ hơn :param2',
	'Upload::image'					=> ':field phải là file ảnh',

	'Light_Valid::digit_not_zero'	=> ':field phải là số khác 0',
	
	'already_exists'				=> ':field đã tồn tại',	
	'not_exists'					=> ':field không tồn tại',
	

	'title' => array(
		'not_empty'	=> 'Tiêu đề không được để trống',
	),
	'title_o' => array(
		'not_empty'	=> 'Tiêu đề gốc không được để trống'
	),
	'episode_count'	=> array(
		'Light_Valid::digit_not_zero' => 'Tập của phim phải là số khác 0',
	),
	'year' => array(
		'range' => 'Năm phải nằm trong phạm vi từ :param2 đến :param3',
	),
	'post_user_id' => array(
		'not_empty' => 'ID của người post bài không được để trống',
	),
	'category_ids' => array(
		'not_empty' => 'Thể loại không được để trống',
	),
	'country_id' => array(
		'not_exists' => 'Quốc gia không tồn tại',
	), 
	'tags' => array(
		'not_empty' => 'Từ khóa (tags) không được để trống',
		'min_max_length' => 'Tag phải có độ dài từ :param2 đến :param3. Tag ":param1" không đạt yêu cầu',
		'limit_count' => 'Số lượng tags tối đa là :param1. Số tags hiện tại là :param2',
	),
	'pagetext' => array(
		'not_empty' => 'Nội dung không được để trống',
	),
	'director' => array(
		'not_empty' => 'Đạo diễn không được để trống',
	),
	'actor' => array(
		'not_empty' => 'Diễn viên không được để trống',
	),
	'username' => array(
		'already_exists' => 'Tên đăng nhập đã tồn tại',
		'not_empty'		=> 'Tên tài khoản không được để trống',
	),
	'fullname' => array(
		'not_empty'	=> 'Họ tên không được để trống',
	),
	'email' => array(
		'already_exists' => 'Email đã tồn tại',
	),
	'password' => array(
		'not_empty' => 'Mật khẩu không được để trống',
	),
	'password2' => array(
		'not_empty' => 'Mật khẩu xác nhận không được để trống',
	),
	'newpassword' => array(
		'matches' => 'Mật xác nhận phải giống với mật khẩu mới',
	),
	'captcha'	=> array(
		'not_empty'	=> 'Mã xác nhận không được để trống',
	),
	
	'slot.not_exists' => 'Vị trí không tồn tại',
	'pages.not_exists' => 'Trang này không tồn tại',
);
