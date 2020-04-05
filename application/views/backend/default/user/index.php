<?php defined('SYSPATH') or die('No direct script access.'); ?>
<script type="text/javascript">
$(function(){
	$("#search .filters select").change(function(){
		$('form#search').submit();
	});
});
</script>
<div class="page">
	Total users: <?php echo number_format($user_count)?>
    <div style="float:right">
		<?php echo $page_nav;?>
    </div>
</div>
<form id="search" method="get" class="form-inline search">
    <div class="">
    	<div class="filters">
            <div class="item input-append">
                <input class="span3" id="keyword" name="keyword" size="16" type="text" value="<?php echo $filters['keyword'];?>">
                <input type="submit" class="btn" value="Search">
            </div>	
        	<div class="item">
                <?php echo __('User group');?>: <?php echo Form::select('group_id', 
                array('' => __('None')) + Light_Helper_Option::usergroup_items()
            , $filters['group_id']);?>
            </div>
             <div class="item">
            <?php echo __('Status');?>: <?php echo Form::select('active', array(
                -1	=> __('All'),
                1 	=> __('Active'), 
                0 	=> __('Inactive'), 	
            ), $filters['active'])?>
            </div>
            <div class="item">
            <?php echo __('Sort order');?>: <?php echo Form::select('order_by', array(
                ''	=> __('None'),
                'register_date' 	=> __('Register date'), 
                'last_activity' 	=> __('Last activity'), 	
				'is_vip' 	=> __('V.I.P Member'), 
            ), $filters['order_by'])?>
            </div>
             <div class="item">
                <input type="submit" class="btn" value="View" />
            </div>
    </div>
</form>

<form method="post" action="<?php echo Light_Link::admin('user/multi_edit')?>">
    <table class="table full">
        <thead>
            <tr>
                <th width="15"><input type="checkbox" class="check-all"></th>
                <th><?php echo __('Account');?></th>
                <th width="200"><?php echo __('Email');?></th>
                <th width="80"><?php echo __('User group');?></th>
                <th width="90"><?php echo __('Register date');?></th>
                <th width="90"><?php echo __('Last activity');?></th>
            </tr>
        </thead>
        <tbody>
        	<?php foreach($users as $user) : ?>
            <tr>
                <td><input type="checkbox" name="user_ids[]" value="<?php echo $user['user_id'];?>"></td>
                <td>
                	<a class="<?php echo $user['active'] ? '' : 'text-error strike'?>" href="<?php echo Light_Link::admin('user/edit?user_id=' . $user['user_id'])?>"><?php echo $user['username'];?>
                    	<span class="<?php echo $user['is_vip'] ? 'text-warning bold' : 'text-success'?>">(<?php echo $user['fullname'];?>)</span>
                    </a>
                    <?php if($user['post_count']) : ?>
                    <a href="<?php echo Light_Link::admin('film?post_user_id=' . $user['user_id'])?>"><span style="color:red">[<?php echo number_format($user['post_count']); ?>]</span></a>
                    <?php endif; ?>
                    
                    
                    <span class="action">
                    	<a href="<?php echo Light_Link::admin('user/edit?user_id=' . $user['user_id'])?>"><i class="icon-pencil"></i></a>
                        <a href="<?php echo Light_Link::admin('user/delete?user_id=' . $user['user_id'])?>"><i class="icon-remove"></i></a>
                    </span>
                    
                </td>
                <td><?php echo $user['email'];?></td>
                <td>
					<?php echo Light_Helper_User::group_name($user['group_id']); ?>
				</td>
                <td><?php echo Light_Helper_Date::date($user['register_date']);?></td>
                <td><?php echo Light_Helper_Date::date($user['last_activity']);?></td>
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