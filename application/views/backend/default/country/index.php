<?php defined('SYSPATH') or die('No direct script access.'); ?>

<form method="post" action="<?php echo Light_Link::admin('country')?>">
    <table class="table full">
        <thead>
            <tr>
                <th colspan="2"><?php echo __('List All Countries');?></th>
            </tr>
        </thead>
        <tbody>
        	<?php foreach($countries as $country) :?>
            <tr>
            	<td width="15">
                	<?php echo Form::input('display_orders[]', $country['display_order'], array('class' => 'span1'))?> 
                    <?php echo Form::hidden('country_ids[]', $country['country_id']);?> 
                </td>
                <td>
                	<a href="<?php echo Light_Link::admin('country/delete?country_id=' . $country['country_id'])?>" class="muted">[Delete]</a>
                    <a class="<?php echo $country['active'] ? '': 'text-error strike'?>" href="<?php echo Light_Link::admin('country/edit?country_id=' . $country['country_id'])?>"><?php echo $country['name']?></a> - <?php echo $country['name_ascii'];?> 
                    <span class="muted">(<?php echo $country['film_count'];?>)</span>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">
                    <?php echo $countries ? Form::submit('do', __('Save Display Order'), array('class' => 'btn')) : ''?>
                </td>
            </tr>
        </tfoot>
    </table>
</form>