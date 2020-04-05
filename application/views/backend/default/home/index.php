<?php defined('SYSPATH') or die('No direct script access.'); ?>

<div class="panel">
	<form method="post" action="">
        <h2 class="sub-heading">Thông báo</h2>
        <div style="display:block;">
            <?php echo Form::textarea('admin_note', $admin_note, array('class' => 'full', 'rows' => 15));?>
        </div>
        <div>
            <?php echo Form::submit('do', __('Save'), array('class' => 'btn'));?>
        </div>
    </form>
</div>