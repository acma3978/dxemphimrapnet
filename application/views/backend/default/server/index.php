<?php defined('SYSPATH') or die('No direct script access.'); ?>

<form method="post" action="<?php echo Light_Link::admin('server')?>">
    <table class="table full">
        <thead>
            <tr>
                <th colspan="2"><?php echo __('List All Servers');?></th>
            </tr>
        </thead>
        <tbody>
        	<?php foreach($servers as $server) :?>
            <tr>
            	<td width="15">
                	<?php echo Form::input('display_orders[]', $server['display_order'], array('class' => 'span1'))?> 
                    <?php echo Form::hidden('server_ids[]', $server['server_id']);?> 
                </td>
                <td>
                	<a href="<?php echo Light_Link::admin('server/delete?server_id=' . $server['server_id'])?>" class="muted">[Delete]</a>
                    <img src="data/images/flags/<?php echo $server['flag']?>.png" />
                    <a class="<?php echo $server['active'] ? '': 'text-error strike'?>" href="<?php echo Light_Link::admin('server/edit?server_id=' . $server['server_id'])?>"><?php echo $server['title']?></a>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">
                    <?php echo Form::submit('do', __('Save Display Order'), array('class' => 'btn'))?>
                </td>
            </tr>
        </tfoot>
    </table>
</form>