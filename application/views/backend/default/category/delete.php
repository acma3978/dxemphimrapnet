<?php defined('SYSPATH') or die('No direct script access.'); ?>

<div class="control-group message warning">
    <ol>
        <li><?php echo __('Do you want delete this category ?');?></li>
        <li><?php echo __('Category id')?>: <?php echo $category['category_id']?></li>
        <li><?php echo __('Title')?>: <?php echo $category['title']?></li>
        <li><?php echo __('Film count')?>: <?php echo $category['film_count']?></li>
    </ol>    
</div>
<a href="<?php echo Light_Link::admin('category/edit?category_id=' . $category['category_id'])?>" class="btn"><?php echo __('Edit')?></a>
<a href="<?php echo Light_Link::admin('category/delete?category_id=' . $category['category_id'] . '&confirm=1')?>" onClick="return confirm('<?php echo __('Are you sure ?')?>');" class="btn"><?php echo __('Delete')?></a>
<a href="javascript:history.back(-1);" class="btn"><?php echo __('Back')?></a>