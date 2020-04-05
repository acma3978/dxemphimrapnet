<?php defined('SYSPATH') or die('No direct script access.'); ?>
<div class="control-group message <?php echo $type?>">
    <ol>
    	<?php if(is_array($message)): ?>
        	<?php foreach($message as $single) : ?>
            	<li><?php echo __($single)?></li>
            <?php endforeach;?>
        <?php else :?>
    	<li><?php echo __($message)?></li>
        <?php endif; ?>
    </ol>    
</div>
<a href="javascript:history.back(-1);" class="btn"><?php echo __('Back')?></a>
<?php if( ! empty($redirect)) : ?>
	<?php if(empty($confirm)) : ?>
		<script type="text/javascript">
            setTimeout(function() {
                window.location.href = '<?php echo (strpos($redirect, '://') ? $redirect : URL::base() . $redirect)?>';
            }, <?php echo $delay?>*1000);
        </script>
        <noscript><div><a href="<?php echo $redirect;?>"><?php echo __('Click here to continue')?></a></div></noscript>
    <?php else : ?>
    	<script type="text/javascript">
        	function __confirmed() {
				window.location.href = '<?php echo (strpos($redirect, '://') ? $redirect : URL::base() . $redirect)?>';
			}
        </script>
    	<a href="javascript:__confirmed();" class="btn"><?php echo __('Continue')?></a>
        <noscript><div class="text-error">This action requires javascript to be enabled.</div></noscript>
    <?php endif;?>
<?php endif; ?>