<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>404 Page Not Found</title>
<style>
* {
	border:0;
	margin:0;
	outline:none;
	text-decoration:none;
	color:#fff;
	font-family:Verdana, Geneva, sans-serif
}
body{
	background:#000;
}
.wrapper{
	width:800px;
	margin:0 auto;
}
.click {
	text-align:center;
	font-weight:bold;
	margin-top:10px;
	color:#fff;
}
</style>
</head>
<body>
<div class="wrapper">
	<div><a href="<?php echo URL::base()?>"><img src="<?php echo URL::base()?>data/images/404.jpg" /></a></div>
    <div class="click"><a href="<?php echo URL::base()?>">Click vào đây để trở lại trang chủ</a></div>
</div>
</body>
</html>
