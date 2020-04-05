<?php defined('SYSPATH') or die('No direct script access.'); ?>
<script type="text/javascript">
$(function(){
	$("form.search select").change(function(){
		$(this).parents('form').submit();
	});
	$("form.search .btn.edit").click(function() {
		window.location = '<?php echo Light_Link::admin('actor/edit?actor_id=')?>' + $("#keyword").val();
	});
	$("form.search .btn.delete").click(function() {
		window.location = '<?php echo Light_Link::admin('actor/delete?actor_id=')?>' + $("#keyword").val();
	});
});
</script>
<div class="page">
	Total actors: <?php echo number_format($actor_count)?>
    <div style="float:right">
		<?php echo $page_nav;?>
    </div>
</div>
<form id="search" method="get" class="form-inline search">
    <div class="">
        <div class="input-append">
            <input class="span3" id="keyword" name="keyword" size="45" type="text" value="<?php echo $filters['keyword'];?>">
            <input type="submit" class="btn btn-info" value="Search">
            <input type="button" class="btn btn-warning edit" value="Edit">
            <input type="button" class="btn btn-danger delete" value="Delete">
        </div>	
    </div>
    <div class="filters">
    	<div class="item">
        	<label>Giới tính</label> <?php echo Form::select('sex', array(
			'-1'  => __('All'),
			'1' => 'Nam',
			'2' => 'Nữ',
		), $filters['type'])?>
        </div>

        <div class="item">
            <label>Quốc gia</label> <?php echo Form::select('country_id',
			array('' => __('All')) + Light_Helper_Option::country_items()
			, $filters['country_id'])?>
        </div>

        <div class="item">
        	<?php $poster_options = array('' => __('All'));?>
        	<?php foreach($posters as $poster_id => $poster):?>
            	<?php $poster_options[$poster_id] = $poster['username']. ' (' .$poster['post_count'].')';?>
            <?php endforeach;?>
            <label>Poster</label> <?php echo Form::select('post_user_id', $poster_options, $filters['post_user_id'])?>
        </div>
        <div class="item">
            <label>Status</label> <?php echo Form::select('active', array(
			'-1'  => __('All'),
			'1' => 'Hiển thị',
			'0' => 'Ẩn',
		), $filters['active'])?>
        </div>
        <div class="item">
            <label>Sắp xếp</label> <?php echo Form::select('order_by', array(
			''  => __('None'),
			'views_day' 	=> 'Xem nhiều trong ngày',
			'views_week' 	=> 'Xem nhiều trong tuần',
			'views_month' 	=> 'Xem nhiều trong tháng',
			'views' 		=> 'Tổng số lượt xem',
			'height' => 'Chiều cao',
            'weight' => 'Cân nặng',
			'star' 			=> 'Cấp độ',
			'last_update' 	=> 'Sửa lần cuối',
		), $filters['order_by'])?>
        </div>
        <div class="item">
        	<input type="submit" class="btn btn-primary" value="View" />
        </div>
    </div>
</form>

<form method="post" action="<?php echo Light_Link::admin('actor/multi_edit')?>">
    <table class="table full actor">
        <thead>
            <tr>
                <th width="15"><input type="checkbox" class="check-all"></th>
                <th width="80"><?php echo __('Image')?></th>
                <th width=""><?php echo __('Title/ Details')?></th>
                <th width="40"><?php echo __('Delete')?></th>
            </tr>
        </thead>
        <tbody>
        	<?php foreach($actors as $actor) : ?>
            <tr>
            	<td><input type="checkbox" name="actor_ids[]" value="<?php echo $actor['actor_id']?>"></td>
                <td>
                    <?php
                        if($actor[image_url]!=NULL){
                            echo '<img src="'.$actor[small_url].'" class="thumbnail" />';
                        }else{
                            echo '<img src="'.$actor[small_url_o].'" class="thumbnail" />';
                        }
                    ?>
                </td>
                <td>
                	<div class="clearfix">

                    	[<?php echo $actor['sex'] == 1 ? 'Nam' : 'Nữ'?>] <a class="title <?php echo $actor['active'] ? '' : 'text-error strike';?>"  href="<?php echo Light_Link::admin('actor/edit?actor_id=' . $actor['actor_id'])?>"><?php echo $actor['title']?> - <?php echo $actor['title_o'];?></a> (<a href="<?php echo Light_Link::film('film', $actor)?>">View</a>)
                    </div>
                    <div class="muted">
                    	<span class="text-warning">[<?php echo Light_Helper_Date::date($actor['post_date'])?>]</span>
                        Posted by <a class="text-info" href="<?php echo Light_Link::admin('user/edit?user_id=' . $film['post_user_id']);?>"><?php echo $actor['user_username'];?></a>,
                        Quốc gia: <span class="text-success"><?php echo $actor['country_name'];?></span>
                    </div>
                    <div class="muted">
                    	Lượt xem ngày: <span class="text-error"><?php echo $film['views_day_format'];?></span>,
                        tuần: <span class="text-error"><?php echo $film['views_week_format'];?></span>,
                        tháng: <span class="text-error"><?php echo $film['views_month_format'];?></span>,
                        tổng: <span class="text-error"><?php echo $film['views_format'];?></span>.
                        Năm: <span class="text-success"><?php echo $film['year']?></span>,
                       <a href="<?php echo Light_Link::admin('comment?film_id='.$film['film_id'])?>" class="muted">Bình luận: <span class="text-success"><?php echo $actor['comment_count']?></span></a>.
                       <?php if($film['status']) :?>
                       <span class="text-warning">Status:</span> <span class="text-error"><?php echo $film['status']?></span>.
                       <?php endif;?>
               		</div>


                    <div class="muted">
                    	<span class="text-info">Tags: </span>
                        <?php 
							$tags = array_combine(explode(',', $actor['tags']), explode(',', $actor['tags_ascii']));
						?>
                        <?php $taglinks = array(); ?>
                        <?php foreach($tags as $tag => $tag_ascii): ?>
                        <?php $taglinks[] = '<a class="muted" href="'.Light_Link::build('tag', 'title_ascii='.$tag_ascii, '', FALSE).'">'.$tag.'</a>';?>
                        <?php endforeach;?>
                        <?php echo implode(', ', $taglinks);?>
                    </div>
                </td>

                <td><a class="btn btn-danger" href="<?php echo Light_Link::admin('actor/delete?actor_id=' . $actor['actor_id'])?>"><?php echo __('Delete')?></a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7">
                    <?php echo Form::select('action', array(
						'active' => __('Active'),
						'deactive' => __('Deactive'),
						'delete' => __('Delete'),
						/*'Phim chiếu tại rạp ?' => array(
							'is_in_cinemas' => 'Phim được chiếu tại rạp',
							'not_in_cinemas' => 'Loại khỏi phim chiếu rạp',
						),*/
					) + $options_select);?>
                    <?php echo Form::submit('do', __('Go'), array('class' => 'btn'))?>
                    <div style="float:right">
						<?php echo $page_nav;?>
                    </div>
                </td>
            </tr>
        </tfoot>
    </table>
</form>