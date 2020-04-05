<?php defined('SYSPATH') or die('No direct script access.'); ?>
<div class="panel">
    <?php echo Light_Helper_Admin_Form::open(array('upload' => TRUE)); ?>  
    	
    	<div class="control-group">
        	<?php if( ! empty($permission['can_delete'])) : ?>
            <a href="<?php echo Light_Link::admin('film/delete?film_id=' . $film['film_id'])?>" class="btn btn-small">Delete</a>
            <?php endif; ?>
        	<?php if( ! empty($permission['can_modify_keywords_detected'])) : ?>
            <a href="<?php echo Light_Link::admin('film/keywords_detected?film_id=' . $film['film_id'])?>" class="btn btn-small">Search</a>
            <?php endif; ?>
            <?php if( ! empty($film['film_id'])) : ?>
            <a href="<?php echo Light_Link::admin('episode?film_id=' . $film['film_id'])?>" class="btn btn-small">Episode</a>
            <a target="_blank" href="<?php echo Light_Link::film('film', $film)?>" class="btn btn-small">View</a>
            <?php endif; ?>
        </div>
       
        
        <?php echo Light_Helper_Admin_Form::error_messages(); ?>
        
		<?php
        	echo Light_Helper_Admin_Form::unit('title', array(
				'title'	=> 'Tên diễn viên',
			));

			echo Light_Helper_Admin_Form::unit('tags', array(
				'title'	=> 'Từ khóa tìm kiếm',
				'type'	=> 'textarea',
				'help'	=> 'Cần tag tên diễn viên gốc, tên diễn viên tiếng Việt, và tên của những bộ phim của diễn viên này đóng. Ngăn cách nhau bởi dấu phẩy<br /><span class="text-error">Chú ý tên diển viên phải tiếng Việt có dấu. Nếu có dấu thì ghi có dấu</span>',
			));
			
			echo Light_Helper_Admin_Form::unit('height', array(
				'title'	=> 'Chiều cao',
				'help'	=> 'Chiều cao của diễn viên',
			));
            echo Light_Helper_Admin_Form::unit('weight', array(
                'title'	=> 'Cân nặng',
                'help'	=> 'Cân nặng của diễn viên',
            ));
            echo Light_Helper_Admin_Form::unit('birthday', array(
                'title'	=> 'Ngày sinh',
                'help'	=> 'Ngày sinh của diễn viên',
            ));
			/*echo Light_Helper_Admin_Form::unit('note', array(
				'title'	=> 'Ghi chú của phim',
				'type'	=> 'textarea',
				'help'	=> 'VD lịch chiếu phim hoặc gì đó. Có thể bỏ trống',
			));
			*/

			echo Light_Helper_Admin_Form::unit('imagefile', array(
				'title'	=> 'Hình minh họa',
				'type'	=> 'file',
				'help'	=> 'Upload hình hoặc nhập link ảnh vào ô bên trên',
				'after'	=> '
					<div>' . Form::input('image_value', Light_Helper_Admin_Form::value('image'), array('class' => 'span7')) . '</div>
					' . (isset($film_id) 
						? '<div><input type="text" class="span7" readonly value="'.Light_Helper_Admin_Form::value('image_url2').'"></div>'
							.'<div><input type="text" class="span7" readonly value="'.Light_Helper_Admin_Form::value('image_url').'"></div>'
						: '') . '
				',
			));
			
			echo Light_Helper_Admin_Form::unit('sex', array(
				'title'	=> 'Giới tính',
				'type'	=> 'radio',
				'option' => array(
					1 	=> 'Nam',
					2	=> 'Nữ',
				),
				'_inline'=> TRUE,
			));

			echo Light_Helper_Admin_Form::unit('country_id', array(
				'title'	=> 'Quốc gia',
				'type'	=> 'select',
				'option' => array('' => __('None')) + Light_Helper_Option::country_items(),
			));
            echo Light_Helper_Admin_Form::unit('check_trailer', array(
                'title'	=> 'Cấp độ sao',
                'type'	=> 'checkbox',
                'option' => 'onoff',
                '_inline'=> TRUE,
                'toggle'=> TRUE,
            ));

            echo Light_Helper_Admin_Form::unit('pagetext', array(
                'title'	=> 'Thông tin',
                'type'	=> 'textarea',
                '_editor' => TRUE,
                'help'	=> '<span class="text-warning">Chú ý bôi đen và Remove Formating trước khi add phim mới</span>'
            ));

			echo Light_Helper_Admin_Form::unit('active', array(
				'title'	=> 'Hiển thị phim',
				'type'	=> 'radio',
				'option' => 'yesno',
				'_inline' => TRUE,
				'default' => 1,
			));

			echo Light_Helper_Admin_Form::unit('post_date', array(
				'title'		=> 'Ngày gửi',
				'type'		=> 'free',
				'content' 	=> Light_Helper_Option::date_select('post_date', Light_Helper_Admin_Form::value('post_date')),
				'help'		=> 'Giờ phút định dạng theo 24h:Phút',
			));
			
			echo Light_Helper_Admin_Form::unit('last_update', array(
				'title'		=> 'Cập nhật lần cuối',
				'type'		=> 'free',
				'content' 	=> Light_Helper_Option::date_select('last_update', Light_Helper_Admin_Form::value('last_update')),
				'before'	=> empty($film['last_update']) ? '' : '<div>(' . Light_Helper_Date::datetime($film['last_update']) . ')</div>',
				'help'		=> 'Giờ phút định dạng theo 24h:Phút',
			));
			if( ! empty($film['film_id'])) : 
       		
			echo Light_Helper_Admin_Form::unit('posted_by', array(
				'title'		=> '',
				'type'		=> 'free',
				'content' 	=> 'Gửi bởi ' . $film['user_username'] . ' (' . $film['user_fullname'] . ')',
			));
         	endif; ?>
     	<?php echo Light_Helper_Admin_Form::submit(); ?>  
     
     <?php echo Light_Helper_Admin_Form::close(); ?>  
</div>