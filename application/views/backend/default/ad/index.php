<?php defined('SYSPATH') or die('No direct script access.'); ?>

<form method="post" action="<?php echo Light_Link::admin('ad')?>">
    <table class="table full">
        <thead>
            <tr>
            	<th width="10">
                	<i class="icon-ok"></i>
                </th>
                <th width="60">
                	<?php echo __('Order');?>
                </th>
            	<th><?php echo __('Details');?></th>
                <th><?php echo __('Slot');?></th>
                <th width="50"><?php echo __('Pages');?></th>
                <th width="80"><?php echo __('Start date');?></th>
                <th width="80"><?php echo __('End date');?></th>
            </tr>
        </thead>
        <tbody>
        	<?php foreach($ads as $ad):?>
            <tr>
            	<td>
					<?php echo Form::checkbox('active_' . $ad['ad_id'], 1, !empty($ad['active']));?>
                	<?php echo Form::hidden('ad_ids[]', $ad['ad_id']);?>
                </td>
                <td>    
					<?php echo Form::input('display_orders[]', $ad['display_order'], array('class' => 'span1'));?>
                </td>
               
                <td>
                	<div>
                    <a class="<?php echo ($ad['active'] ? '' : 'text-error strike')?>" href="<?php echo Light_Link::admin('ad/edit?ad_id='.$ad['ad_id'])?>" class="title" style="font-size:14px;"><?php echo $ad['name'];?></a>
                    <span class="action">
                    	<a href="<?php echo Light_Link::admin('ad/delete?ad_id='.$ad['ad_id'])?>"><i class="icon-remove"></i></a>
                    </span>
                    </div>
                    <div><?php echo $ad['description']?></div>
                    <?php /*
                    <div><textarea name="codes[]" class="full"><?php echo htmlspecialchars($ad['code'])?></textarea></div>
                    */ ?>
                </td>
                <td>
					<div><?php echo __($ad['slot']);?></div>
                    <div class="muted">(<?php echo $ad['slot']?>)</div>
                </td>
                <td><?php echo $ad['pages'];?></td>
                <td><?php echo Light_Helper_Date::datetime($ad['start_date'])?></td>
                <td>
                	<span class="<?php 
						if($ad['end_date'] < Light_Application::$time)
						{
							echo 'text-error';
						}
						else if(strtotime("+1 week") > $ad['end_date'])
						{
							echo 'text-warning';
						}
					?>"><?php echo Light_Helper_Date::remaining($ad['end_date'])?></span>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7">
                    <?php echo $ads ? Form::submit('do', __('Save'), array('class' => 'btn')) : ''?>
                </td>
            </tr>
        </tfoot>
    </table>
</form>