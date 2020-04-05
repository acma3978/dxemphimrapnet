<?php defined('SYSPATH') or die('No direct script access.'); ?>
<script type="text/javascript">
$(function(){
	$("form.search select").change(function(){
		$(this).parents('form').submit();
	});
});
</script>
<div class="page">
	Total items: <?php echo number_format($total_items)?>
    <div style="float:right">
		<?php echo $page_nav;?>
    </div>
</div>
<form id="search" method="get" class="form-inline search">
    <div class="">
        <div class="input-append">
            <input class="span3" id="keyword" name="keyword" size="16" type="text" value="<?php echo $filters['keyword'];?>">
            <input type="submit" class="btn" value="Search">
        </div>	
    </div>
</form>

<form method="post" action="<?php echo Light_Link::admin('page/multi_edit')?>">
    <table class="table full">
        <thead>
            <tr>
                <th width="15"><input type="checkbox" class="check-all"></th>
                <th><?php echo __('Title');?></th>
                <th width="80"><?php echo __('Posted by');?></th>
                <th width="120"><?php echo __('Post date');?></th>
            </tr>
        </thead>
        <tbody>
        	<?php
			foreach($pages as $page): ?>
            <tr>
            	 <td><input type="checkbox" name="page_ids[]" value="<?php echo $page['page_id'];?>"></td>
            	<td>
                	<a class="<?php echo $page['active'] ? '' : 'text-error strike';?>" href="<?php echo Light_Link::admin('page/edit?page_id='.$page['page_id'])?>"><?php echo $page['title'];?></a> (<a href="<?php echo Light_Link::build('page', $page)?>">View</a>)
                    <span class="action">
                    	<a href="<?php echo Light_Link::admin('page/edit?page_id=' . $page['page_id'])?>"><i class="icon-pencil"></i></a>
                        <a href="<?php echo Light_Link::admin('page/delete?page_id=' . $page['page_id'])?>"><i class="icon-remove"></i></a>
                    </span>
                    
                </td>
                <td><?php echo $page['post_username'];?></td>
                <td><?php echo Light_Helper_Date::datetime($page['post_date']);?></td>
            </tr>
            <?php endforeach;?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6">
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