<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!-- BEGIN: page -->
        	<div class="block" id="page-post">
            	<div class="blocktitle breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
                    <span class="item" typeof="v:Breadcrumb"><a href="{$url_base}" title="{$web_title}" property="v:title">Phim</a></span> 
                    <h2 class="item last-child" typeof="v:Breadcrumb">{$pageinfo.title}</h2>
                </div><!--/.breadcrumbs-->
                <div class="blockbody">
                	<div class="pagetext">
                    	{$pageinfo.pagetext}
                    </div>
                    <div class="recent-page">
                    	<div class="title">Các bài viết mới nhất</div>
                    	<ul>
                        	<c:each from="$recents" value="$page">
                        	<li><a href="{$page.link}" title="{$page.title}">{$page.title}</a></li>
                            </c:each>
                        </ul>
                    </div>
                    <div class="fb-comments" data-href="{$url_canonical}" data-num-posts="5" data-width="660" data-colorscheme="light"></div>
                </div>
            </div><!--/.block-->
<!-- END: page -->