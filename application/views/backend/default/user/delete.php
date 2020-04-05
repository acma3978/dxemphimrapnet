<?php defined('SYSPATH') or die('No direct script access.'); ?>

<div class="control-group message warning">
    <ol>
        <li><?php echo __('Do you want delete this user ?');?></li>
        <li><?php echo __('User id')?>: <?php echo $user['user_id']?></li>
        <li><?php echo __('Username')?>: <?php echo $user['username']?></li>
        <li><?php echo __('User group')?>: <?php echo Light_Helper_User::group_name($user['group_id']);?></li>
        <li><?php echo __('Post count')?>: <?php echo $user['post_count']?></li>
    </ol>    
</div>
<a href="<?php echo Light_Link::admin('user/edit?user_id=' . $user['user_id'])?>" class="btn"><?php echo __('Edit')?></a>
<a href="<?php echo Light_Link::admin('user/delete?user_id=' . $user['user_id'] . '&confirm=1')?>" onClick="return confirm('<?php echo __('Are you sure ?')?>');" class="btn"><?php echo __('Delete')?></a>
<a href="javascript:history.back(-1);" class="btn"><?php echo __('Back')?></a>