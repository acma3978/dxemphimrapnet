<?php defined('SYSPATH') or die('No direct script access.'); ?>
<div class="panel">
    <?php echo Light_Helper_Admin_Form::open(); ?>  
    
    	<?php echo Light_Helper_Admin_Form::error_messages(); ?>
        <?php
        	echo Light_Helper_Admin_Form::unit('web_title', array(
				'title'	=> 'Tiêu đề web',
				'attrs' => array(
					'maxlength' => 75,
				),
				'help' => 'Tối đa 75 ký tự',
			));
			echo Light_Helper_Admin_Form::unit('web_keywords', array(
				'title'	=> 'Từ khóa',
				//'type' => 'textarea',
				'help' => 'Các từ khóa chính của website',
			));
			echo Light_Helper_Admin_Form::unit('web_description', array(
				'title'	=> 'Mô tả',
				'type' => 'textarea',
				'attrs' => array(
					'maxlength' => 175
				),
				'help' => 'Cái này giúp ích cho SEO, nên cần mô tả đầy đủ. Mô tả khéo léo để SEO tốt. Tối đa 150 ký tự',
			));
			echo Light_Helper_Admin_Form::unit('email_contact', array(
				'title'	=> 'Email liên lạc',
				'default' => 'chiplove.9xpro@gmail.com',
			));
			echo Light_Helper_Admin_Form::unit('films_per_page', array(
				'title'	=> 'Số phim hiển thị 1 trang',
				'default' => 40,
			));
			
			echo Light_Helper_Admin_Form::unit('announcement', array(
				'title'	=> 'Thông báo',
				'type'	=> 'textarea',
				'_editor' => TRUE,
			));
		?>
     	<?php echo Light_Helper_Admin_Form::submit(); ?>  
     
     <?php echo Light_Helper_Admin_Form::close(); ?>  
</div>