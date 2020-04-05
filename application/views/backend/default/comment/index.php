<?php defined('SYSPATH') or die('No direct script access.'); ?>
<div class="page">
	Total comments: <?php echo number_format($comment_count)?>
    <div style="float:right">
		<?php echo $page_nav;?>
    </div>
</div>
<form method="get" class="form-inline search">
    <div class="filters">
    	<div class="item">
        	<?php echo Form::select('search_by', array(
				'message' => __('Message'),
				'username' => __('Username'),
			), $filters['search_by']);?>
        </div>
    	<div class="item input-append">
            <input class="span3" id="keyword" name="keyword" size="16" type="text" value="<?php echo $filters['keyword'];?>">
            <input type="submit" class="btn" value="Search">
        </div>	
       <div class="item">
        <?php echo __('Status');?>: <?php echo Form::select('active', array(
			-1	=> __('All'),
			1 	=> __('Active'), 
			0 	=> __('Inactive'), 	
		), $filters['active'])?>
        </div>
		<div class="item">
        	<input type="submit" class="btn" value="View" />
        </div>
    </div>
</form>

<form method="post" action="<?php echo Light_Link::admin('comment/multi_edit')?>">
    <table class="table full">
        <thead>
            <tr>
            	<th width="10"><input type="checkbox" class="check-all" /></th>
                <th><?php echo __('Message');?></th>
                <th width="120"><?php echo __('Post date');?></th>
                <th width="50"><?php echo __('Status');?></th>
            </tr>
        </thead>
        <tbody>
        	<?php foreach($comments as $comment) :?>
            <tr>
            	<td><input type="checkbox" name="comment_ids[]" value="<?php echo $comment['comment_id']?>" /></td>
                <td>
                	<div>
                    	<a style="font-size:13px;" class="bold" href="<?php echo Light_Link::admin('film/edit?film_id='.$comment['film_id'])?>"><?php echo $comment['title'];?></a>
                        (<a  href="<?php echo Light_Link::film('watch', $comment); ?>">View</a>)
                        (<a href="<?php echo Light_Link::admin('comment/?film_id='.$comment['film_id'])?>">All comments</a>)
                        
                    </div>
                    <div>
                    	<a class="text-warning" href="<?php echo Light_Link::admin('user/edit?user_id='.$comment['post_user_id'])?>"><?php echo $comment['user_username'];?></a>: 
                        <span class="" style="color:#888"><?php echo wordwrap($comment['message'], 150, "\n", TRUE);?></span>
                    </div>
                </td>
                <td><?php echo Light_Helper_Date::datetime($comment['post_date'])?></td>
                    <td>
                    <?php if($comment['active']): ?>
                    	<span class="text-success">Aprroved</span>
                    <?php else :?>
                    	<span class="text-error">Pending</span>
                    <?php endif;?>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">
                	<?php echo Form::select('action', array(
						'active' => __('Active'),
						'deactive' => __('Deactive'),
						'delete' => __('Delete'),
					));?>
                    <?php echo Form::submit('do', __('Go'), array('class' => 'btn'))?>
                    <div style="float:right">
                    	<?php echo $page_nav;?>
                    </div>
                </td>
            </tr>
        </tfoot>
    </table>
</form>