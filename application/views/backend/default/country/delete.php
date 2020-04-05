<?php defined('SYSPATH') or die('No direct script access.'); ?>

<div class="control-group message warning">
    <ol>
        <li><?php echo __('Do you want delete this country ?');?></li>
        <li><?php echo __('Category id')?>: <?php echo $country['country_id']?></li>
        <li><?php echo __('Name')?>: <?php echo $country['name']?></li>
    </ol>    
</div>
<a href="<?php echo Light_Link::admin('country/edit?country_id=' . $country['country_id'])?>" class="btn"><?php echo __('Edit')?></a>
<a href="<?php echo Light_Link::admin('country/delete?country_id=' . $country['country_id'] . '&confirm=1')?>" onClick="return confirm('<?php echo __('Are you sure ?')?>');" class="btn"><?php echo __('Delete')?></a>
<a href="javascript:history.back(-1);" class="btn"><?php echo __('Back')?></a>