<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!-- BEGIN: tab_sidebar -->

    <c:if is="{$top_le_views_week}">
        <ol class="list-group-movie">
            <c:each from="$top_le_views_week" value="$film">
                <li class="list-film-item">
                    <div class="thumbnail">
                        <a href="{$film.link}" title="{$film.title}"> <img src="{$cache_link_img}{$film.thumb_url}" alt="{$film.title}"> </a>
                    </div>
                    <div class="meta-item"><h3 class="name-1"> <a href="{$film.link}" title="{$film.title}"> {$film.title} </a></h3><h4 class="name-2">{$film.title_o}</h4><div class="rating-small"><div class="star-ratings-css"> <span style="width: 82.749295774648%;"></span></div></div><p> <i class="fa fa-video-camera"></i> {$film.views_format} <i class="fa fa-line-chart"></i> 83%</p></div>
                </li>
            </c:each>
        </ol>
        </c:if>

    <c:if is="{$top_le_views_month}">
        <ol class="list-group-movie">
            <c:each from="$top_le_views_month" value="$film">
                <li class="list-film-item">
                    <div class="thumbnail">
                        <a href="{$film.link}" title="{$film.title}"> <img src="{$cache_link_img}{$film.thumb_url}" alt="{$film.title}"> </a>
                    </div>
                    <div class="meta-item"><h3 class="name-1"> <a href="{$film.link}" title="{$film.title}"> {$film.title} </a></h3><h4 class="name-2">{$film.title_o}</h4><div class="rating-small"><div class="star-ratings-css"> <span style="width: 82.749295774648%;"></span></div></div><p> <i class="fa fa-video-camera"></i> {$film.views_format} <i class="fa fa-line-chart"></i> 83%</p></div>
                </li>
            </c:each>
        </ol>
    </c:if>


<c:if is="{$top_bo_views_week}">
    <ol class="list-group-movie">
        <c:each from="$top_bo_views_week" value="$film">
            <li class="list-film-item">
                <div class="thumbnail">
                    <a href="{$film.link}" title="{$film.title}"> <img src="{$cache_link_img}{$film.thumb_url}" alt="{$film.title}"> </a>
                </div>
                <div class="meta-item"><h3 class="name-1"> <a href="{$film.link}" title="{$film.title}"> {$film.title} </a></h3><h4 class="name-2">{$film.title_o}</h4><div class="rating-small"><div class="star-ratings-css"> <span style="width: 82.749295774648%;"></span></div></div><p> <i class="fa fa-video-camera"></i> {$film.views_format} <i class="fa fa-line-chart"></i> 83%</p></div>
            </li>
        </c:each>
    </ol>
</c:if>

<c:if is="{$top_bo_views_month}">
    <ol class="list-group-movie">
        <c:each from="$top_bo_views_month" value="$film">
            <li class="list-film-item">
                <div class="thumbnail">
                    <a href="{$film.link}" title="{$film.title}"> <img src="{$cache_link_img}{$film.thumb_url}" alt="{$film.title}"> </a>
                </div>
                <div class="meta-item"><h3 class="name-1"> <a href="{$film.link}" title="{$film.title}"> {$film.title} </a></h3><h4 class="name-2">{$film.title_o}</h4><div class="rating-small"><div class="star-ratings-css"> <span style="width: 82.749295774648%;"></span></div></div><p> <i class="fa fa-video-camera"></i> {$film.views_format} <i class="fa fa-line-chart"></i> 83%</p></div>
            </li>
        </c:each>
    </ol>
</c:if>

<!-- END: tab_sidebar -->