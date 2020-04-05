<?php defined('SYSPATH') or die('No direct script access.'); ?>
<div class="panel">
    <?php echo Light_Helper_Admin_Form::open(); ?>  
    	<div class="control-group">
        	<?php if( ! empty($permission['can_delete'])) : ?>
            <a href="<?php echo Light_Link::admin('user/delete?user_id=' . $user['user_id'])?>" class="btn btn-small">Delete</a>
            <?php endif; ?>
        </div>
        
        <?php echo Light_Helper_Admin_Form::error_messages(); ?>
        
		<?php
        	echo Light_Helper_Admin_Form::unit('username', array(
				'title'	=> 'Username',
			));
            echo Light_Helper_Admin_Form::unit('nickname', array(
                'title'	=> 'Nick name',
            ));
			echo Light_Helper_Admin_Form::unit('password', array(
				'title'	=> 'Password',
				'value' => '',
			));
			echo Light_Helper_Admin_Form::unit('email', array(
				'title'	=> 'Email',
			));
            echo Light_Helper_Admin_Form::unit('phone', array(
                'title'	=> 'Phone',
            ));
			echo Light_Helper_Admin_Form::unit('group_id', array(
				'title'	=> 'User group',
				'type'	=> 'select',
				'option' => array('' => __('None')) + Light_Helper_Option::usergroup_items(),
			));
			echo Light_Helper_Admin_Form::unit('active', array(
				'title'	=> 'Active',
				'type'	=> 'radio',
				'option' => 'yesno',
				'_inline' => 1,
				'_hr'	=> 1,
			));
			
			echo Light_Helper_Admin_Form::unit('fullname', array(
				'title'	=> 'Fullname',
				
			));
			echo Light_Helper_Admin_Form::unit('sex', array(
				'title'	=> 'Sex',
				'type'	=> 'radio',
				'option' => array(
					Light_Model_User::GENDER_MALE 	=> 'Male',
					Light_Model_User::GENDER_FEMALE	=> 'Female',
					Light_Model_User::GENDER_UNKNOW	=> 'N/A',
				),
				'_inline'=> TRUE,
			));
			echo Light_Helper_Admin_Form::unit('birthday', array(
				'title'		=> 'Birthday',
				'type'		=> 'free',
				'content' 	=> Light_Helper_Option::date_select('birthday', Light_Helper_Admin_Form::value('birthday'), FALSE),
				'_hr'		=> TRUE,
			));
			
			echo Light_Helper_Admin_Form::unit('register_date', array(
				'title'		=> 'Register date',
				'type'		=> 'free',
				'content' 	=> Light_Helper_Option::date_select('register_date', Light_Helper_Admin_Form::value('register_date')),
				'help'		=> 'Giờ phút định dạng theo 24h:Phút',
			));
            
			echo Light_Helper_Admin_Form::unit('last_activity', array(
				'title'		=> 'Last activity',
				'type'		=> 'free',
				'content' 	=> Light_Helper_Option::date_select('last_activity', Light_Helper_Admin_Form::value('last_activity')),
				'help'		=> 'Giờ phút định dạng theo 24h:Phút',
				'_hr'		=> TRUE,
			));
			
			echo Light_Helper_Admin_Form::unit('bookmark_film_ids', array(
				'title'		=> 'Danh sách ID phim yêu thích',
				'type'		=> 'textarea',
				'help'		=> 'Ngăn cách nhau bởi dấu phẩy',
			));
			echo Light_Helper_Admin_Form::unit('is_vip', array(
				'title'	=> 'Thành viên V.I.P',
				'type'	=> 'checkbox',
				'option' => 'onoff',
			));
		?>
     	<?php echo Light_Helper_Admin_Form::submit(); ?>  
     
     <?php echo Light_Helper_Admin_Form::close(); ?>  
</div>