<?php defined('SYSPATH') or die('No direct script access.'); ?>
<div class="panel">
    <?php echo Light_Helper_Admin_Form::open(); ?>  
    	
        <?php echo Light_Helper_Admin_Form::error_messages(); ?>
        
		<?php
        	echo Light_Helper_Admin_Form::unit('title', array(
				'title'	=> 'Title',
			));
			echo Light_Helper_Admin_Form::unit('keywords', array(
				'title'	=> 'Từ khóa tìm kiếm',
				'type'	=> 'textarea',
				'help'	=> 'Ngăn cách nhau bởi dấu phẩy',
			));
			echo Light_Helper_Admin_Form::unit('pagetext', array(
				'title'	=> 'Nội dung',
				'type' => 'textarea',
				'_editor' => TRUE,
			));
			
			echo Light_Helper_Admin_Form::unit('post_date', array(
				'title'		=> 'Ngày gửi',
				'type'		=> 'free',
				'content' 	=> Light_Helper_Option::date_select('post_date', Light_Helper_Admin_Form::value('post_date')),
				'help'		=> 'Giờ phút định dạng theo 24h:Phút',
			));
			
			echo Light_Helper_Admin_Form::unit('active', array(
				'title'	=> 'Active',
				'type'	=> 'checkbox',
				'option' => 'onoff',
			));
		?>
     	<?php echo Light_Helper_Admin_Form::submit(); ?>  
     
     <?php echo Light_Helper_Admin_Form::close(); ?>  
</div>