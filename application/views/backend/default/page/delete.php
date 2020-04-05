<?php defined('SYSPATH') or die('No direct script access.'); ?>

<div class="control-group message warning">
    <ol>
        <li><?php echo __('Do you want delete this page ?');?></li>
        <li><?php echo __('Page id')?>: <?php echo $page['page_id']?></li>
        <li><?php echo __('Title')?>: <?php echo $page['title']?></li>
    </ol>    
</div>
<a href="<?php echo Light_Link::admin('page/edit?page_id=' . $page['page_id'])?>" class="btn"><?php echo __('Edit')?></a>
<a href="<?php echo Light_Link::admin('page/delete?page_id=' . $page['page_id'] . '&confirm=1')?>" onClick="return confirm('<?php echo __('Are you sure ?')?>');" class="btn"><?php echo __('Delete')?></a>
<a href="javascript:history.back(-1);" class="btn"><?php echo __('Back')?></a>