<?php defined('SYSPATH') or die('No direct script access.'); ?>

<div class="control-group message warning">
    <ol>
        <li><?php echo __('Do you want delete this server ?');?></li>
        <li><?php echo __('Server id')?>: <?php echo $server['server_id']?></li>
        <li><?php echo __('Title')?>: <?php echo $server['title']?></li>
    </ol>    
</div>
<a href="<?php echo Light_Link::admin('server/edit?server_id=' . $server['server_id'])?>" class="btn"><?php echo __('Edit')?></a>
<a href="<?php echo Light_Link::admin('server/delete?server_id=' . $server['server_id'] . '&confirm=1')?>" onClick="return confirm('<?php echo __('Are you sure ?')?>');" class="btn"><?php echo __('Delete')?></a>
<a href="javascript:history.back(-1);" class="btn"><?php echo __('Back')?></a>