<?php defined('SYSPATH') or die('No direct script access.'); ?>
<div class="panel">
    <?php echo Light_Helper_Admin_Form::open(); ?>  
    	
        <?php echo Light_Helper_Admin_Form::error_messages(); ?>
        
		<?php
        	echo Light_Helper_Admin_Form::unit('title', array(
				'title'	=> 'Tên category',
			));
			echo Light_Helper_Admin_Form::unit('description', array(
				'title'	=> 'Mô tả',
				'type' => 'textarea',
				'attrs' => array(
					'maxlength' => 150
				),
				'help' => 'Cái này giúp ích cho SEO, nên cần mô tả đầy đủ. Mô tả khéo léo để SEO tốt. Giới hạn 150 ký tự',
			));
			echo Light_Helper_Admin_Form::unit('display_order', array(
				'title'	=> 'Thứ tự hiển thị',
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