<?php defined('SYSPATH') or die('No direct script access.'); ?>
<div class="panel">
    <?php echo Light_Helper_Admin_Form::open(); ?>  
    	
        <?php echo Light_Helper_Admin_Form::error_messages(); ?>
        
		<?php
        	echo Light_Helper_Admin_Form::unit('name', array(
				'title'	=> 'Tên quảng cáo',
			));
			
			echo Light_Helper_Admin_Form::unit('description', array(
				'title'	=> 'Mô tả',
				'type'	=> 'textarea',
			));
			
			echo Light_Helper_Admin_Form::unit('code', array(
				'title'	=> 'HTML code',
				'type'	=> 'textarea',
				'attrs' => array('rows' => 8),
			));
		
			echo Light_Helper_Admin_Form::unit('slot', array(
				'title'	=> 'Vị trí hiển thị',
				'type'	=> 'select',
				'option' => array('' => __('None')) + Light_Helper_Option::adslot_items(),
			));
			echo Light_Helper_Admin_Form::unit('pages', array(
				'title'	=> 'Trang hiển thị',
				'type' 	=> 'checkbox',
				'option' => Light_Helper_Option::adpage_items(),
				'help'	=> 'Nếu muốn hiển thị toàn trang chỉ cần tích vào "Toàn bộ trang"',
				//'help' => 'Hiện tại hỗ trợ 4 trang: "home", "watch", "film", "list". Ngăn cách nhau bởi dấu phẩy. Nếu muốn hiển thị ở toàn trang thì dùng "all"',
			));
			
			echo Light_Helper_Admin_Form::unit('display_order', array(
				'title'	=> 'Thứ tự hiển thị',
			));
			
			echo Light_Helper_Admin_Form::unit('start_date', array(
				'title'		=> 'Ngày bắt đầu',
				'type'		=> 'free',
				'content' 	=> Light_Helper_Option::date_select('start_date', Light_Helper_Admin_Form::value('start_date')),
			));
            
			echo Light_Helper_Admin_Form::unit('end_date', array(
				'title'		=> 'Ngày kết thúc',
				'type'		=> 'free',
				'content' 	=> Light_Helper_Option::date_select('end_date', Light_Helper_Admin_Form::value('end_date')),
				'help'		=> 'Khi vượt quá thời gian này, quảng cáo tự ngưng hiển thị',
			));
			
			echo Light_Helper_Admin_Form::unit('active', array(
				'title'	=> 'Active',
				'type'	=> 'checkbox',
				'option' => 'onoff',
				'default' => 1,
			));
		?>
     	<?php echo Light_Helper_Admin_Form::submit(); ?>  
     
     <?php echo Light_Helper_Admin_Form::close(); ?>  
</div>