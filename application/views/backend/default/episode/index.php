<?php defined('SYSPATH') or die('No direct script access.'); ?>
<script type="text/javascript">
$(function(){
	$(".episodelist .input").each(function(){
		var input = $(this).find('.video-url input');
		check();
		function check() {
			if(input.val() == '') {
				input.parents('.input').find('.icon-remove').hide();
			} else {
				input.parents('.input').find('.icon-remove').show();
			}
		}
		input.keyup(check);
	});
	$(".icon-remove").click(function() {
		$(this).parents('.input').find('.video-url input').val('');
		$(this).hide();
	});
	// remove all
	$('.server.control-group .action').click(function(e) {
    	$(this).parents('.server').find('.episodelist .video-url input').each(function(index, element) {
         	$(this).val('');
        });
    });
});
</script>
<div class="panel episode">
    <div class="note">
        <p><strong>Lưu ý: Thông báo mọi người</strong></p>
        <ol>
            <li><label class="n">VIP</label> Chỉ duy nhất chứa các link <strong>Photos.Google</strong></li>
            <li><label class="n">VIP-1, VIP-2</label> Chứa các link <strong>Picasa,Plus,Docs,Drive.Google.com</strong></li>
            <li><label class="n">VIP-3</label> Chứa các link <strong>YouTube</strong></li>
            <li><label class="n">VIP-4, VIP-5, VIP-6</label> Chứa các link <strong>Trực tiếp từ các website khác</strong></li>
            <li><label class="n">BOX V1, BOX V2</label> Chứa các link <strong>FaceBook</strong></li>
            <li><label class="n">K BOX V1, K BOX V2</label> Chứa các link <strong>Myvideo.az</strong></li>
            <li>Còn các Server còn lại làm như bình thường, <strong>Chia A,B,C ... VIP-2 (Nếu link Gốc), VIP-5, VIP-6 Link Trực Tiếp</strong></li>
        </ol>
    </div>
    <?php echo Light_Helper_Admin_Form::open(array('action' => Light_Link::admin('episode'))); ?>  
		<?php if($messages['changed'] OR $messages['errors']) :?>
        <div class="control-group message info">
            <ol>
                <li>Có <?php echo $messages['changed']?> link được thay đổi</li>
                <?php if($messages['errors']) : ?>
                <li class="text-error">Có <?php echo $messages['errors']?> link bị lỗi</li>
                <?php endif; ?>
            </ol>    
        </div>
    	<?php endif;?>
        <?php echo Light_Helper_Admin_Form::error_messages(); ?>
        
        <?php if(!empty($film)) : 
			echo Light_Helper_Admin_Form::unit('name', array(
					'title'	=> 'Tên phim',
					'type' => 'free',
					'content' => '
					<div>
						<a href="' . Light_Link::admin('film/edit?film_id='.$film['film_id']).'">'.$film['title'].' - '.$film['title_o'].'</a>
						(<a href="' . Light_Link::film('film', $film) . '">View</a>)
					</div>
					<div>Số tập: ' . $film['episode_count'] . '</div>
					',
				));	
			endif;?>
		<?php
			if(empty($film)) :
				echo Light_Helper_Admin_Form::unit('film_id', array(
					'title'	=> 'Nhập ID của phim',
				));
			else :
				echo Light_Helper_Admin_Form::unit('film_id', array(
					'type' => 'hidden',
				));	
			endif;
			echo Light_Helper_Admin_Form::unit('start', array(
				'title'	=> 'Số tập bắt đầu',
			));
			echo Light_Helper_Admin_Form::unit('end', array(
				'title'	=> 'Số tập kết thúc',
				'help' => 'Nếu phim có 1 tập thì không cần nhập tập kết thúc',
			));
			echo Light_Helper_Admin_Form::unit('server_part_ids', array(
				'title'	=> 'Server post phim nhiều tập/ nhiều phần nhỏ',
				'type' => 'checkbox',
				'option' => Light_Helper_Option::server_items(),
				'_column' => TRUE,
				'help'	=> 'Mỗi phim có thể chia ra nhiều tập, và mỗi tập có thể chia ra nhiều phần nhỏ',
			));
			echo Light_Helper_Admin_Form::unit('part', array(
				'title'	=> 'Số phần nhỏ của mỗi tập',
				'help' => 'Mỗi tập đc chia làm mấy phần nhỏ? Nếu post 1 tập 1 link thì ko cần nhập',
				'_hr'	=> TRUE,
			));
			echo Light_Helper_Admin_Form::unit('server_full_ids', array(
				'title'	=> 'Server post 1 link full duy nhất',
				'type' => 'checkbox',
				'option' => Light_Helper_Option::server_items(),
				'_column' => TRUE,
				'help'	=> 'Mỗi phim chỉ post 1 link duy nhất (thường dùng post phim lẻ có link full) để thành viên tiện theo dõi, ko phải next sang nhiều phần chia nhỏ khác',
			));
		?>
        
       <!-- SERVER -->
        <?php foreach($selected_servers as $server_id): ?>
        <div class="control-group server">
        	<div class="title">
            	<span class="action">Remve all links</span>
            	<span class="label label-info"><?php echo $servercache[$server_id]['title'];?></span>
            </div>
            <div class="episodelist">
            	 <!-- FULL-->
            	<?php if(in_array($server_id, $filters['server_full_ids'])) : ?>
                <?php $episode = $episodecache_full[$server_id][0][0]; ?>
                    <div class="item full">
                        <div class="episode">FULL</div>
                        <div class="input">
                            <div class="part">
                            	Name: <?php echo Form::input($episode['input_name'], $episode['name'], array('class' => 'span1'));?>
                            </div>
                            <div class="link">
                                <span class="message"><i class="icon-remove"></i>
									<?php if($episode['update']['is_update'] AND !$episode['update']['error']):?>
                                        <span class="text-success"><?php echo __('Done')?></span>
                                    <?php endif;?>
                                </span>
                                <?php if($episode['update']['error']):?>
                                    <span class="text-error"><?php echo implode('', $episode['update']['message'])?></span>
                                <?php endif;?>
                                <span class="text">Link: </span>
                                <span class="video-url">
                                	<?php echo Form::input($episode['input_video_url'], $episode['video_url'], array('class' => 'span7'));?>
                                </span>
                            </div>
                        </div>
                        <?php echo Form::hidden($episode['input_episode_id'], $episode['episode_id']);?>
                    </div>
                <?php endif;?>
                
                 <!-- PART -->
                <?php if(in_array($server_id, $filters['server_part_ids'])) : ?>
                	<!-- SỐ TẬP -->
                    <?php for($episode_i = $filters['start']; $episode_i <= $filters['end']; $episode_i ++) :?>
                        <div class="item">
                            <div class="episode">Tập <?php echo $episode_i;?></div>
                            <?php foreach($episodecache_part[$server_id][$episode_i] as $episode) : ?>
                            <div class="input">
                                <div class="part">
                                	Name: <?php echo Form::input($episode['input_name'], $episode['name'], array('class' => 'span1'));?>
                                </div>
                                <div class="link">
                                    <span class="message"><i class="icon-remove"></i>
                                    	<?php if($episode['update']['is_update'] AND !$episode['update']['error']):?>
                                            <span class="text-success"><?php echo __('Done')?></span>
                                        <?php endif;?>
                                    </span>
                                    <?php if($episode['update']['error']):?>
                                        <span class="text-error"><?php echo implode('', $episode['update']['message'])?></span>
                                    <?php endif;?>
                                   <span class="text">Link: </span>
                                    <span class="video-url">
                                    	<?php echo Form::input($episode['input_video_url'], $episode['video_url'], array('class' => 'span7'));?>
                                    </span>
                                </div>
                            </div>
                            <?php echo Form::hidden($episode['input_episode_id'], $episode['episode_id']);?>
                            <?php endforeach;?>
                        </div>
                    <?php endfor;?>
                <?php endif;?>
            </div>
        </div>
        <?php endforeach; ?>

        <?php echo Light_Helper_Admin_Form::submit(); ?>  
     
     <?php echo Light_Helper_Admin_Form::close(); ?>  
</div>