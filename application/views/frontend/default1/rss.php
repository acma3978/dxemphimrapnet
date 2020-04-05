<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!-- BEGIN: rss --><?php echo '<?xml version="1.0" encoding="utf-8"?>';?>

<rss version="2.0">
<channel>
    <title>{$web_title} - RSS Feed</title>
    <link>{$url_base}</link>
    <description>Xem phim - {$web_description}</description>
    <language>vi-vn</language>
    <copyright>Copyright (C) {$web_title}</copyright>
    <ttl>60</ttl>
    <generator>TronBoHD.com Group</generator>
    
    <c:each from="$films" value="$film">
 		<item>
    	<title>{$film.title}</title>
		<description>
	<![CDATA[
<table>
 <tr>
    <td>
        <img src="{$film.image_url}" width="200" height="270" alt="" />
    </td>
    <td>
        <a href="{$film.link}" title="{$film.title}" target="_blank"><h1 />{$film.title}</h1></a><br />
        <a href="{$film.link}" title="{$film.title_o}" target="_blank"><h2 />{$film.title_o}</h2></a><br />
        Diễn viên: {$film.actor}<br />
        Đạo diễn: {$film.director}<br />
        Quốc gia: {$film.country_name}<br />
        Thể loại: <c:each from="{$film.categories}" value="$category">
        	{$category.title}, 
        </c:each><br />
        Thời lượng: {$film.timeline}
    </td>
   </tr>
</table>
	<hr />
    {$film.description}
	]]>
	</description>
		<link>{$film.link}</link>
		<pubDate>{$film.pub_date}</pubDate>
	</item>
    </c:each>
</channel>
</rss>
<!-- END: rss -->