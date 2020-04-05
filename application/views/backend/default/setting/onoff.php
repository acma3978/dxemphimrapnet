<?php defined('SYSPATH') or die('No direct script access.'); ?>
<div class="panel">
    <?php echo Light_Helper_Admin_Form::open(); ?>  
    	
        <?php echo Light_Helper_Admin_Form::error_messages(); ?>
        
		<?php
        	echo Light_Helper_Admin_Form::unit('web_turn', array(
				'title'	=> 'Turn on Website',
				'type' => 'radio',
				'option' => 'yesno',
				'_inline' => TRUE,
				'default' => 1,
				'help' => 'Hành động chỉ tác động đến khách và member tại frontend. Super administrator vẫn xem và hoạt động bình thường',
			));
			echo Light_Helper_Admin_Form::unit('off_message', array(
				'title'	=> 'Turn off message',
				'type' => 'textarea',
				'help' => 'Nội dung thông báo khi đóng cửa website',
			));
		?>
     	<?php echo Light_Helper_Admin_Form::submit(); ?>  
     
     <?php echo Light_Helper_Admin_Form::close(); ?>  
</div>