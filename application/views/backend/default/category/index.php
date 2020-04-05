<?php defined('SYSPATH') or die('No direct script access.'); ?>

<form method="post" action="<?php echo Light_Link::admin('category')?>">
    <table class="table full">
        <thead>
            <tr>
                <th colspan="2"><?php echo __('List All Categories');?></th>
            </tr>
        </thead>
        <tbody>
        	<?php foreach($categories as $category) :?>
            <tr>
            	<td width="15">
                	<?php echo Form::input('display_orders[]', $category['display_order'], array('class' => 'span1'))?> 
                    <?php echo Form::hidden('category_ids[]', $category['category_id']);?> 
                </td>
                <td>
                	<a href="<?php echo Light_Link::admin('category/delete?category_id=' . $category['category_id'])?>" class="muted">[Delete]</a>
                    <a class="<?php echo $category['active'] ? '': 'text-error strike'?>" href="<?php echo Light_Link::admin('category/edit?category_id=' . $category['category_id'])?>"><?php echo $category['title']?></a> - <?php echo $category['title_ascii'];?>
                    <span class="muted">(<?php echo $category['film_count'];?>)</span>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">
                    <?php echo $categories ? Form::submit('do', __('Save Display Order'), array('class' => 'btn')) : ''?>
                </td>
            </tr>
        </tfoot>
    </table>
</form>