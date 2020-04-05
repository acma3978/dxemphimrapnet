<?php defined('SYSPATH') or die('No direct script access.'); ?>
<div class="panel keywords-detected">
	<h2 class="sub-heading">Keywords income from Google Search</h2>
   <div class="control-group">
    	<a onClick="return confirm('Are you sure ?');" href="<?php echo Light_Link::admin('film/keywords_detected?film_id='.$film['film_id'].'&removeall=1')?>" class="btn btn-small"><?php echo __('Delete all')?></a>
        <a href="<?php echo Light_Link::admin('film/edit?film_id='.$film['film_id'])?>" class="btn btn-small"><?php echo __('Edit')?> <?php echo $film['title'];?></a>
    </div>
    <div class="control-group">
       <ul>
       <?php foreach($keywords as $keyword => $count) : ?>
            <li>
				<?php echo $keyword?> - <span class="label label-info" style="padding: 0 3px;"><?php echo $count?></span>
            	<span class="action">
                	<a href="<?php echo Light_Link::admin('film/keywords_detected?film_id='.$film['film_id'].'&remove='.urlencode($keyword))?>"><i class="icon-remove"></i></a>
                </span>
            </li>
       <?php endforeach;?>
       </ul>
    </div>
</div>
