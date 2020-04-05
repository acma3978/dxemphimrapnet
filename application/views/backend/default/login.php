<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!doctype html>
<html lang="vi">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo __('Admin Control Panel Login') .' - ' . $web_title ?></title>
<?php
echo HTML::style('theme/backend/default/css/bootstrap.css')
. HTML::style('theme/backend/default/css/style.css')
. HTML::style('theme/backend/default/css/film.css')
;
?>
</head>
<body>
    <div class="panel login-panel">
    	<legend><?php echo __('Admin Control Panel Login')?></legend>
    	<?php echo Light_Helper_Admin_Form::open(); ?>  
    	<?php echo Light_Helper_Admin_Form::error_messages(); ?>
        
		<?php
        	echo Light_Helper_Admin_Form::unit('username', array(
				'title'	=> __('Account'),
				'attrs' => array(
					'class' => 'span3',
					'placeholder' => __('Your account'),
				)
			));
			echo Light_Helper_Admin_Form::unit('password', array(
				'title'	=> __('Password'),
				'type'	=> 'password',
				'attrs' => array(
					'class' => 'span3',
					'placeholder' => __('Password'),
				)
			));
			echo Light_Helper_Admin_Form::unit('remember', array(
				'title'	=> __('Remember me'),
				'type'	=> 'checkbox',
				'option' => 'onoff',
			));
		?>
     	<?php echo Light_Helper_Admin_Form::submit(array('reset' => FALSE)); ?>  
     
     <?php echo Light_Helper_Admin_Form::close(); ?>  
    </div>
    
</body>
</html>
