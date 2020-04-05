<?php defined( 'SYSPATH') or die( 'No direct script access.'); ?>
<div id="prog"></div>
<div id="result"></div>
<div class="panel">
    <h2 class="sub-heading"><?php echo __('Leech Film Infomation');?></h2>
    <?php
    echo Light_Helper_Admin_Form::open(array( 'method'=> 'get'));
    echo Light_Helper_Admin_Form::unit('link', array(
        'title' => 'Link Leech:',
        'attrs' => array('class' => 'span4'),
        'help' => 'Nhập link cần Leech
                    <ul>
                        <li>1. Xemphimso.com</li>
                        <li>2. Phim14.net</li>
                        <li>3. Phimmoi.net</li>
                        <li>4. Phimbathu.com</li>
                    </ul>',
    ));
    echo Light_Helper_Admin_Form::unit('post_date', array(
        'title' => 'Ngày gửi',
        'type' => 'free',
        'content' => Light_Helper_Option::date_select('post_date', Light_Helper_Admin_Form::value('post_date')),
        'help' => 'Giờ phút định dạng theo 24h:Phút',
    ));
    echo Light_Helper_Admin_Form::unit('last_update', array(
        'title' => 'Cập nhật lần cuối',
        'type' => 'free',
        'content' => Light_Helper_Option::date_select('last_update', Light_Helper_Admin_Form::value('last_update')),
        'before' => empty($film['last_update']) ? '' : ' <div>(' . Light_Helper_Date::datetime($film['last_update']) . ')</div>',
        'help' => 'Giờ phút định dạng theo 24h:Phút',
    ));
    if( ! empty($film['film_id'])) : echo Light_Helper_Admin_Form::unit('posted_by', array(
        'title' => '',
        'type' => 'free',
        'content' => 'Gửi bởi ' . $film['user_username'] . ' (' . $film['user_fullname'] . ')',
    ));
    endif; echo Light_Helper_Admin_Form::submit(array( 'reset' => FALSE, 'value' => 'Leech now', ));
    echo Light_Helper_Admin_Form::hidden('rebuild', 'leech');
    echo Light_Helper_Admin_Form::close(); ?>
</div>