<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!-- BEGIN: sidebar -->
<div class="block-col-right sidebar">
    <c:if is="$route_name == 'home'">
        <div class="widget">
            
                <span class="title">Cộng đồng Facebook</span>
                
                <div class="block" id="page-post">
                    <div></div>
                    <div class="fb-like-box" data-href="https://www.facebook.com/kenhphimmoi/" data-width="300" data-height="300" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
                    
                    
                </div><!--end.block-->
                
                
    
    </div>
</c:if>
    <!-- <div class="widget top-film-realtime">fdsfsfdsf</div> -->

    <div class="widget top-film-widget">

    <c:if is="$route_name == 'home'  || $route_name == 'film' || $route_name == 'list'">
        <span class="title">Phim lẻ xem nhiều</span>
        <div class="article-block top-film-hot">

            <div id="block-top-film">
                <div class="tabs" data-target="#i-top">
                    <div class="tab tab-title active" data-name="item-top-le-day">Top ngày</div>
                    <div class="tab tab-title" data-name="item-top-le-week">Top tuần</div>
                    <div class="tab tab-title" data-name="item-top-le-month">Top tháng</div>
                </div>
                <div class="clear"></div>
                <div id="i-top" class="i-item-film">

                    <div class="tab item-top-le-day">

                        <ol class="list-group-movie">
                            <c:each from="$top_le_views_day" value="$film">
                                <li class="list-film-item">
                                    <div class="thumbnail">


                                        <a href="{$film.link}" title="{$film.title}"> 


                                    <img src="{$cache_link_img}{$film.thumb_url}" alt="{$film.title}">
                                    
                                

                                       </a>
                                    </div>
                                    <div class="meta-item"><h3 class="name-1"> <a href="{$film.link}" title="{$film.title}"> {$film.title} </a></h3><h4 class="name-2">{$film.title_o}</h4><div class="rating-small"><div class="star-ratings-css"> <span style="width: 82.749295774648%;"></span></div></div><p> <i class="fa fa-video-camera"></i> {$film.views_format} <i class="fa fa-line-chart"></i> 83%</p></div>
                                </li>
                            </c:each>
                        </ol>

                    </div><!--end.item-facebook-comment-->

                    <div class="tab item-top-le-week hide">
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
                    </div><!--end.item-google-comment-->

                    <div class="tab item-top-le-month hide">
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
                    </div>

                </div><!--end#i-top-->
            
            </div><!--end#block-top-film-->

        </div><!--end.top-film-hot-->

        <span class="title">Phim bộ xem nhiều</span>
        <div class="article-block top-film-hot">

            <div id="block-top-film">
                <div class="tabs" data-target="#i-top02">
                    <div class="tab tab-title active" data-name="item-top-bo-day">Top ngày</div>
                    <div class="tab tab-title" data-name="item-top-bo-week">Top tuần</div>
                    <div class="tab tab-title" data-name="item-top-bo-month">Top tháng</div>
                </div>
                <div class="clear"></div>
                <div id="i-top02" class="i-item-film">

                    <div class="tab item-top-bo-day">

                        <ol class="list-group-movie">
                            <c:each from="$top_bo_views_day" value="$film">
                                <li class="list-film-item">
                                    <div class="thumbnail">
                                        <a href="{$film.link}" title="{$film.title}"> <img src="{$cache_link_img}{$film.thumb_url}" alt="{$film.title}"> </a>
                                    </div>
                                    <div class="meta-item"><h3 class="name-1"> <a href="{$film.link}" title="{$film.title}"> {$film.title} </a></h3><h4 class="name-2">{$film.title_o}</h4><div class="rating-small"><div class="star-ratings-css"> <span style="width: 82.749295774648%;"></span></div></div><p> <i class="fa fa-video-camera"></i> {$film.views_format} <i class="fa fa-line-chart"></i> 83%</p></div>
                                </li>
                            </c:each>
                        </ol>

                    </div><!--end.item-facebook-comment-->

                    <div class="tab item-top-bo-week hide">
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
                    </div><!--end.item-google-comment-->

                    <div class="tab item-top-bo-month hide">
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
                    </div>

                </div><!--end#i-top-->
            
            </div><!--end#block-top-film-->

        </div><!--end.top-film-hot-->
</c:if>
        <c:if is="$route_name == 'home'">
            <span class="title">Từ khóa nổi bật</span>
            <div class="article-block tagcloud">
                <ol>
                    <c:each from="$tag_cloud" value="$tag">
                        <li class="btn btn-info"><a data-used="{$tag.used_count}" class="level-{$tag.level}" rel="tag" href="{$tag.link}" title="{$tag.title}">{$tag.title}</a></li>
                    </c:each>
                </ol>
            </div>
        </c:if>

    </div><!--end.top-film-widget-->

</div>

<!-- END: sidebar -->