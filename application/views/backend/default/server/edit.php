<?php defined('SYSPATH') or die('No direct script access.'); ?>
<div class="panel">
    <?php echo Light_Helper_Admin_Form::open(); ?>  
    	
        <?php echo Light_Helper_Admin_Form::error_messages(); ?>
        
		<?php
        	echo Light_Helper_Admin_Form::unit('title', array(
				'title'	=> 'Server name',
			));
			echo Light_Helper_Admin_Form::unit('type', array(
				'title'	=> 'Server type',
				'type'	=> 'radio',
				'option' => array(
					'watch' 	=> 'Xem online',
					'download'  => 'Download'
				),
				'_inline' => TRUE,
			));
			$flags = Light_Helper_Option::flag_items();
			foreach($flags as &$flag)
			{
				$flag = '<img src="data/images/flags/'.$flag.'.png">';	
			}
			echo Light_Helper_Admin_Form::unit('flag', array(
				'title'	=> 'Country',
				'type' => 'radio',
				'option' => $flags,
			));
			echo Light_Helper_Admin_Form::unit('display_order', array(
				'title'	=> 'Display order',
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