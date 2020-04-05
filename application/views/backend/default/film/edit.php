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
				'title'	=> 'Tiêu đề phim (tiếng Việt)',
			));
			echo Light_Helper_Admin_Form::unit('title_o', array(
				'title'	=> 'Tiêu đề phim (tên gốc)',
				'help' 	=> 'Tên phim tiếng Việt thì phần này ghi ko dấu, nếu phim chiếu trên tivi thì ghi kênh chiếu. VD: VTV3, HTV9 .v.v.',
			));
			echo Light_Helper_Admin_Form::unit('tags', array(
				'title'	=> 'Từ khóa tìm kiếm',
				'type'	=> 'textarea',
				'help'	=> 'Cần tag tên phim gốc, tên phim tiếng Việt, và tên của diễn viên nổi tiếng ở trong phim (nếu có). Ngăn cách nhau bởi dấu phẩy<br /><span class="text-error">Chú ý tên phim tiếng Việt thì chỉ cần tag tên có dấu. Không tag tên ko dấu vào. Tên diễn viên cũng thế</span>',
			));
			
			echo Light_Helper_Admin_Form::unit('status', array(
				'title'	=> 'Status',
				'help'	=> 'VD cập nhật tới tập bao nhiêu hay phim có gì mới thì ghi để thành viên tiện theo dõi.(ko bắt buộc)',
			));
        echo Light_Helper_Admin_Form::unit('comingsoon', array(
            'title'	=> 'Sắp chiếu',
            'type'	=> 'text',
        ));

			echo Light_Helper_Admin_Form::unit('note', array(
				'title'	=> 'Ghi chú của phim',
				'type'	=> 'textarea',
				'help'	=> 'VD lịch chiếu phim hoặc gì đó. Có thể bỏ trống',
			));
			
			echo Light_Helper_Admin_Form::unit('options', array(
				'title'	=> 'Tùy chọn',
				'type'	=> 'checkbox',
				'option' => Light_Helper_Option::filmoption_items(),
				'_column' => TRUE,
			));
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

            echo Light_Helper_Admin_Form::unit('imagefan', array(
                'title'	=> 'Ảnh FanPage',
                'type'	=> 'text',
                'help'	=> 'Ảnh đại diện cho FanPage (Facebook) và Ảnh đại diện cho nội dung chi tiết & Player',
            ));
			
			echo Light_Helper_Admin_Form::unit('type', array(
				'title'	=> 'Kiểu phim',
				'type'	=> 'radio',
				'option' => array(
					1 	=> 'Phim lẻ',
					2	=> 'Phim bộ',
				),
				'_inline'=> TRUE,
			));

            echo Light_Helper_Admin_Form::unit('episode_timeline', array(
                'title'	=> 'Cắt tập nhỏ',
                'type'	=> 'checkbox',
                'option' => 'onoff',
                'toggle'=> TRUE,

                '_inline'=> TRUE,
                'help'	=> 'Xem phim [Tên_Phim] tập 1, tập 2, tập 3 ...',
            ));
			echo Light_Helper_Admin_Form::unit('episode_count', array(
				'title'	=> 'Số tập của phim',
				'type'	=> 'text',
			));

			echo Light_Helper_Admin_Form::unit('category_ids', array(
				'title'	=> 'Thể loại',
				'type'	=> 'checkbox',
				'option' => Light_Helper_Option::category_items(),
				'_column' => TRUE,
			));
			echo Light_Helper_Admin_Form::unit('country_id', array(
				'title'	=> 'Quốc gia',
				'type'	=> 'select',
				'option' => array('' => __('None')) + Light_Helper_Option::country_items(),
			));
			echo Light_Helper_Admin_Form::unit('director', array(
				'title'	=> 'Đạo diễn',
				'type'	=> 'text',
				'help'	=> 'Ngăn cách nhau bởi dấu phẩy',
			));
			echo Light_Helper_Admin_Form::unit('actors', array(
				'title'	=> 'Diễn viên',
				'type'	=> 'textarea',
				'help'	=> 'Ngăn cách nhau bởi dấu phẩy',
			));
        echo Light_Helper_Admin_Form::unit('quality', array(
            'title'	=> 'Chất lượng',
            'type'	=> 'text',
            'help'	=> 'VD: Nếu phim đăng chất lượng thì ghi vào 1080 hoặc 720'
        ));
			echo Light_Helper_Admin_Form::unit('timeline', array(
				'title'	=> 'Thời lượng phim',
				'type'	=> 'text',
				'help'	=> 'Độ dài của phim. VD: "90 Phút" hoặc "100 Tập" (nếu là phim nhiều tập)',
			));
			echo Light_Helper_Admin_Form::unit('manufacturer', array(
				'title'	=> 'Nhà sản xuất',
				'type'	=> 'text',
			));
			echo Light_Helper_Admin_Form::unit('year', array(
				'title'	=> 'Năm phát hành',
				'type'	=> 'text',
				'help'	=> 'VD: 2009'
			));

            echo Light_Helper_Admin_Form::unit('check_trailer', array(
                'title'	=> 'Film Trailer',
                'type'	=> 'checkbox',
                'option' => 'onoff',
                'toggle'=> TRUE,
                '_inline'=> TRUE,
            ));

			echo Light_Helper_Admin_Form::unit('trailer_url', array(
				'title'	=> 'Trailer',
				'type'	=> 'text',
				'help'	=> 'VD: http://www.youtube.com/watch?v=_rA_i73BLi4. Để trống nếu không có'
			));

            echo '
                <div class="tabs" data-target="#listFilmSub">
                    <div class="tab active" data-name="noi_dung">Nội dung</div>
                    <div class="tab" data-name="noi_dung_chi_tiet">Nội dung chi tiết</div>
                </div>

                <div id="listFilmSub">
            ';
                    echo '<div class="list tab noi_dung">';
                        echo Light_Helper_Admin_Form::unit('pagetext', array(
                            'title'	=> 'Nội dung',
                            'type'	=> 'textarea',
                            '_editor' => TRUE,
                            'help'	=> '<span class="text-warning">Chú ý bôi đen và Remove Formating trước khi add phim mới</span>'
                        ));
                    echo '</div>';

                    echo '<div class="list tab noi_dung_chi_tiet hide">';
                        echo Light_Helper_Admin_Form::unit('pagetext2', array(
                            'title'	=> 'Nội dung chi tiết',
                            'type'	=> 'textarea',
                            '_editor' => TRUE,
                            'help'	=> '<span class="text-warning">Chú ý bôi đen và Remove Formating trước khi add phim mới</span>'
                        ));
                    echo '</div>';
                echo '</div>';

        echo Light_Helper_Admin_Form::muti_button('collect[]',array(
            'title'	=> 'Nội dung sưu tầm',
            'type'	=> 'text',
            'value'	=> 'Thêm URL nội dung',
            'class' => 'add_field_button btn add',
            'help'	=> 'Khi [Viết các Blog] xong Copy đường dẫn của Link 1. Facebook, 2. Blogger, 3. Wordpress',
        ));

        echo Light_Helper_Admin_Form::unit('views', array(
            'title'	=> 'Lượt xem',
            'help'	=> 'Lượt truy cập không bắt buộc',
        ));

			echo Light_Helper_Admin_Form::unit('active', array(
				'title'	=> 'Hiển thị phim',
				'type'	=> 'radio',
				'option' => 'yesno',
				'_inline' => TRUE,
				'default' => 1,
			));
			
			echo Light_Helper_Admin_Form::unit('open', array(
				'title'	=> 'Cho phép bình luận',
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