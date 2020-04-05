<?php defined('SYSPATH') or die('No direct script access.'); ?>

<div class="control-group message warning">
    <ol>
        <li><?php echo __('Do you want delete this film ?');?></li>
        <li><?php echo __('Film id')?>: <?php echo $film['film_id']?></li>
        <li><?php echo __('Title')?>: <?php echo $film['title']?></li>
        <li><?php echo __('Title original')?>: <?php echo $film['title_o']?></li>
    </ol>    
</div>
<a href="<?php echo Light_Link::admin('film/edit?film_id=' . $film['film_id'])?>" class="btn"><?php echo __('Edit')?></a>
<a href="<?php echo Light_Link::admin('film/delete?film_id=' . $film['film_id'] . '&confirm=1')?>" onClick="return confirm('<?php echo __('Are you sure ?')?>');" class="btn"><?php echo __('Delete')?></a>
<a href="javascript:history.back(-1);" class="btn"><?php echo __('Back')?></a>