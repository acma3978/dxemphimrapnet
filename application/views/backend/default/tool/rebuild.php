<?php defined('SYSPATH') or die('No direct script access.'); ?>

<div class="panel">
	<h2 class="sub-heading"><?php echo __('Rebuild Category Infomation');?></h2>
    <?php 
		echo Light_Helper_Admin_Form::open(array('method' => 'get')); 
			echo Light_Helper_Admin_Form::unit('perpage', array(
				'title' => 'Items to process per page:',
				'default' => 10,
				'attrs' => array('class' => 'span4'),
				'help' => 'Rebuild film counters.',
			));
			echo Light_Helper_Admin_Form::unit('title', array(
				'title' => 'Rebuild title',
				'type'	=> 'checkbox',
				'option' => 'onoff',
				'default' => 0,
			));
			echo Light_Helper_Admin_Form::unit('film_count', array(
				'title' => 'Rebuild film counters',
				'type'	=> 'checkbox',
				'option' => 'onoff',
				'default' => 0,
			));
			echo Light_Helper_Admin_Form::submit(array(
				'reset' => FALSE, 
				'value' => 'Rebuild now',
			));
			echo Light_Helper_Admin_Form::hidden('rebuild', 'category'); 
		echo Light_Helper_Admin_Form::close(); 
	?> 

	<h2 class="sub-heading"><?php echo __('Rebuild User Infomation');?></h2>
    <?php 
		echo Light_Helper_Admin_Form::open(array('method' => 'get'));
			echo Light_Helper_Admin_Form::unit('perpage', array(
				'title' => 'Items to process per page:',
				'default' => 100,
				'help' => 'Rebuild post counters.',
				'attrs' => array('class' => 'span4'),
			));
			echo Light_Helper_Admin_Form::unit('fullname', array(
				'title' => 'Rebuild fullname',
				'type'	=> 'checkbox',
				'option' => 'onoff',
				'default' => 0,
			));
			echo Light_Helper_Admin_Form::unit('post_count', array(
				'title' => 'Rebuild film counters',
				'type'	=> 'checkbox',
				'option' => 'onoff',
				'default' => 0,
			));
		
			echo Light_Helper_Admin_Form::submit(array(
				'reset' => FALSE, 
				'value' => 'Rebuild now',
			)); 
			echo Light_Helper_Admin_Form::hidden('rebuild', 'user');
		 echo Light_Helper_Admin_Form::close();
	?> 

     <h2 class="sub-heading"><?php echo __('Rebuild Film Infomation');?></h2>
     <?php echo Light_Helper_Admin_Form::open(array('method' => 'get'));
	 	echo Light_Helper_Admin_Form::unit('perpage', array(
			'title' => 'Items to process per page:',
			'default' => 300,
			'attrs' => array('class' => 'span4'),
		)); 
		
		echo Light_Helper_Admin_Form::unit('title', array(
			'title' => 'Rebuild title',
			'type'	=> 'checkbox',
			'option' => 'onoff',
			'default' => 0,
		));
		echo Light_Helper_Admin_Form::unit('actors', array(
			'title' => 'Rebuild film actors',
			'type'	=> 'checkbox',
			'option' => 'onoff',
			'default' => 0,
		));
		echo Light_Helper_Admin_Form::unit('similar', array(
			'title' => 'Rebuild similar films',
			'type'	=> 'checkbox',
			'option' => 'onoff',
			'default' => 0,
		));
		echo Light_Helper_Admin_Form::unit('tags', array(
			'title' => 'Rebuild film tags',
			'type'	=> 'checkbox',
			'option' => 'onoff',
			'default' => 0,
		));
		echo Light_Helper_Admin_Form::unit('category', array(
			'title' => 'Rebuild film-category',
			'type'	=> 'checkbox',
			'option' => 'onoff',
			'default' => 0,
		));
		echo Light_Helper_Admin_Form::submit(array(
			'reset' => FALSE, 
			'value' => 'Rebuild now',
		));
		echo Light_Helper_Admin_Form::hidden('rebuild', 'film');
		echo Light_Helper_Admin_Form::close(); 
	?> 
    <h2 class="sub-heading"><?php echo __('Rebuild Tag Infomation');?></h2>
    <?php 
		echo Light_Helper_Admin_Form::open(array('method' => 'get'));
			echo Light_Helper_Admin_Form::unit('perpage', array(
				'title' => 'Items to process per page:',
				'default' => 300,
				'help' => 'Rebuild title ascii, used counters and remove tags are not used.',
				'attrs' => array('class' => 'span4'),
			));
			
			echo Light_Helper_Admin_Form::unit('remove_tags_are_not_used', array(
				'title' => 'Delete all tags are not used',
				'type'	=> 'checkbox',
				'option' => 'onoff',
				'default' => 0,
				'help'	=> 'If you want do do this action, please sure all tags has have rebuilded.',
			));
			 echo Light_Helper_Admin_Form::submit(array(
				'reset' => FALSE, 
				'value' => 'Rebuild now',
			)); 
			echo Light_Helper_Admin_Form::hidden('rebuild', 'tag');
		 echo Light_Helper_Admin_Form::close();
	?> 
</div>