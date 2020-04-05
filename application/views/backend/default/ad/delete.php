<?php defined('SYSPATH') or die('No direct script access.'); ?>

<div class="control-group message warning">
    <ol>
        <li><?php echo __('Do you want delete this ad ?');?></li>
        <li><?php echo __('Ad id')?>: <?php echo $ad['ad_id']?></li>
        <li><?php echo __('Name')?>: <?php echo $ad['name']?></li>
    </ol>    
</div>
<a href="<?php echo Light_Link::admin('ad/edit?ad_id=' . $ad['ad_id'])?>" class="btn"><?php echo __('Edit')?></a>
<a href="<?php echo Light_Link::admin('ad/delete?ad_id=' . $ad['ad_id'] . '&confirm=1')?>" onClick="return confirm('<?php echo __('Are you sure ?')?>');" class="btn"><?php echo __('Delete')?></a>
<a href="javascript:history.back(-1);" class="btn"><?php echo __('Back')?></a>