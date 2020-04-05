<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!-- BEGIN: breadcrumbs -->
<div class="blocktitle breadcrumbs" itemscope="" itemtype="http://schema.org/BreadcrumbList">
        <div class="container">
        <div class="item" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a itemprop="item" title="Phim Mới" href="./"><span itemprop="name">Phim Mới</span></a></div>
        <c:if is="{$filminfo.type} == 1">
            <div class="item" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a itemprop="item" title="Phim lẻ" href="{$blocklinks.phim_le}"><span itemprop="name">Phim lẻ</span></a></div>
            <c:else />
            <div class="item" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a itemprop="item" title="Phim bộ" href="phim-bo/"><span itemprop="name">Phim bộ</span></a></div>
        </c:if>

        <c:if is="$route_name == 'film' || $route_name == 'watch'">

            <div class="item" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a itemprop="item" title="Phim {$filminfo.country.name}" href="{$filminfo.country.link}"><span itemprop="name">{$filminfo.country.name}</span></a></div>
        </c:if>
        <h2 class="item">
            <div class="active"><a href="{$filminfo.link}" title="{$filminfo.title}"><span title="{$filminfo.title}">{$filminfo.title}</span></a></div>
        </h2>

        <c:if is="$route_name == 'watch'">
            <div class="item last-child">
                <span>Server {$filminfo.episode.server_title} - {$filminfo.episode.name}<c:if is="{$filminfo.check_trailer} == 1">Trailer</c:if></span>
            </div>
        </c:if>
        </div>
    </div>

    <!-- END: breadcrumbs -->