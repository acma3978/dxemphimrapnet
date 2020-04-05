<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!-- BEGIN: film -->
<c:include template="breadcrumbs" />
<div class="black-block">
    
                <div class="box-film-player">

                <div class="movie-banner" style="background:url({$cache_link_img}{$filminfo.imagefan_url})">
                </div><!--end.movie-banner-->
                
                <div class="icon-play"> <a href="{$filminfo.link_watch}" title="{$filminfo.title}"> <i class="sp-movie-icon-play"></i> </a></div><!--end.icon-play-->
                </div><!--end.box-film-player--> 
            
</div>
<main class="body-wrap container clearfix">

<div class="position-rel block-con">
    <div class="col-lg-3 block-film-poster">
        <!-- <div class="picachu"></div>  -->
            <div class="poster-film position-aso">
                    <c:if is="{$filminfo.image_url} != NULL">
                        <c:if is="{$admin} == '1' || {$admin} == '2'">
                            <img src="{$filminfo.image_url}" alt="{$film.title}">
                            <c:else />
                            <img src="{$cache_link_img}{$filminfo.image_url}" alt="{$film.title}">
                        </c:if>

                        <c:else />

                        <c:if is="{$admin} == '1' || {$admin} == '2'">
                            <img src="{$filminfo.image_url2}" alt="{$film.title}">
                            <c:else />
                            <img src="{$cache_link_img}{$filminfo.image_url2}" alt="{$film.title}">
                        </c:if>
                    </c:if>
                    <div class="box-bookmark" data-filmid="{$filminfo.film_id}">
                        <i class="icon i-bookmark"></i>
                        <div class="add-bookmark">Đánh dấu</div>
                    </div>

             
                </div>
                <div class="clear"></div>
                </div>
                <div class="block-info-b">
                <div class="col-lg-9 block-info-c">
                    <h1 class="title vn">Phim {$filminfo.title}</h1>
                    <h2 class="title en">{$filminfo.title_o} <span>({$filminfo.year})</span></h2>
                    
                    <div class="box_star" data-score="{$filminfo.liked_times_float}" data-filmid="{$filminfo.film_id}" itemtype="http://data-vocabulary.org/Review-aggregate" itemscope>
                            <div class="icon item-big-star" itemprop="votes">{$filminfo.liked_times_float}</div>
                            <div class="item-star-rate" data-vote="{$filminfo.liked_vote}" data-rate="{$filminfo.liked_times}" data-frate="{$filminfo.liked_times_float}"></div>
                            <div class="item-hint"></div>
                   
                            
                       
                        </div>
                        <div class="fb-like like-at-rating" data-href="{$filminfo.link}" data-width="60" data-layout="box_count" data-action="like" data-show-faces="false" data-share="false"></div>
                        
                        <div class="clear bg-profile-film">
<dl class="col">
                        <dt><i class="icon icon-op i-status"></i> Trạng thái:</dt>

                        <dd class="stepemw">

                                <c:if is="{$filminfo.check_trailer} != '1'"> {$filminfo.status}
                                    <c:else /> Trailer</c:if></dd>

                                    <dt><i class="icon icon-op i-time"></i> Thời lượng:</dt>

                        <dd>{$filminfo.timeline}</dd>
                                    
                                
                                </dl>
                                <dl class="col2">

                                <dt><i class="icon icon-op i-stepepisode"></i> Sắp chiếu:</dt>
                                    <dd class="stepe"> <c:if is="{$filminfo.comingsoon}">{$filminfo.comingsoon}<c:else />N/A</c:if></dd>

                                    

                        <dt><i class="icon icon-op i-country"></i> Quốc gia:</dt>

                        <dd><a href="{$filminfo.country.link}" title="Phim {$filminfo.country.name}"> {$filminfo.country.name}</a></dd>

                                </dl>
                                </div>
                </div>
                    <div class="clear"></div>
                </div>

</div>
<div class="block-wrap padding block-bottom">
    <div class="list-actors actor-slider">
         
            <ul id="actor_slider" class="relative">
            <c:each from="{$filminfo.actors_link}" value="$actor">
                                    <li class="item">
                                        <!-- <a href="{$actor.link}" title="{$actor.title}"> -->

                                            <c:if is="{$actor.profile.image_url} != NULL">
                                                <img class="img-actor" src="{$cache_link_img}{$actor.profile.image_url}" alt="{$actor.profile.title}">
                                                <c:else />
                                                <div class="img-actor icon non-avatar"></div>
                                            </c:if>

                                            <div class="movie-carousel-top-item-meta">
                                                <strong>
                                                <span class="nameV">{$actor.profile.title}</span>
                                            </strong>
                                            </div>

                                        
                                        <!--end.movie-carousel-top-item-->
                                        <!-- </a> -->
                                    </li>
                                </c:each>
                              </ul>
            
         </div>
    <div class="clear"></div>
</div>

<div class="block-wrap padding">
    <!-- <div class="col-sidelef block-sidelef">
        dsadsad
    </div> -->
    <div class="col-middl block block-content">
    <div class="_4-u1">
        <dl>
            <dt>Đạo diễn: </dt>
            <dd><c:if is="{$filminfo.director}!='NULL'"> {$filminfo.director} <c:else /> (Đang cập nhật) </c:if></dd>

            <dt>Thể loại: </dt>
            <dd><c:each from="{$filminfo.categories}" value="$category">
                                                <a href="{$category.link}" title="Phim {$category.title}"> Phim {$category.title}</a><c:if is="!{$category.is_last}">, </c:if>
                                            </c:each>
</dd>

            <dt>Năm phát hành: </dt>
            <dd> {$filminfo.year} </dd>

            <c:if is="{$admin} == '1' || {$admin} == '2'"><dt>Người đăng: </dt>
            <dd> {$filminfo.user_username} </dd></c:if>

        </dl>
    </div>

        <div class="block-title title-ik clear">
                    <div class="main-title title-ik-content">
                        <h3>Nội dung phim</h3>
                        <span>Cảm nhận nội dung phim <strong>{$filminfo.title}</strong></span>

                        <div style="float:right" class="fb-like like-at-content" data-href="{$filminfo.link}" data-width="140" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
                    </div>

                </div>

                <div class="tabs-content" id="info-film">

                    <div class="tab text">
                        <h3><strong>{$filminfo.title}, {$filminfo.title_o} {$filminfo.year}</strong></h3>

                        {$filminfo.pagetext}
                        <i class="icon ndmore"></i><a class="ndLink" title="Xem nội dung chi tiết phim {$filminfo.title}" href="{$filminfo.link_nd}">Xem phim {$filminfo.title}</a>

                        <c:if is="{$filminfo.episode_timeline}">

                            <div class="more-less">

                            </div>

                            <c:else />

                            <div class="more-less">

                            </div>

                        </c:if>
                    </div>

                    <div id="item-tags" class="tags">
                        
                        <div class="items">
                        <span class="label">Từ khóa: </span>
                            <h2 class="inline"><a href="{$filminfo.link_tag}" title="{$filminfo.title}">{$filminfo.title}</a></h2>,

                            <c:each from="{$filminfo.tags_link}" value="$tag">
                                <h3 class="inline"><a href="{$tag.link}" title="{$tag.title}" rel="tag">{$tag.title}</a>
                                    <c:if is="!{$tag.is_last}">, </c:if>
                                </h3>
                            </c:each>

                        </div>

                        <div class="more-block _4-u3 padding" style="padding-bottom:0">
                        <h4>
                            <c:if is="{$filminfo.type} == 1">
                                Xem phim {$filminfo.title} - {$filminfo.title_o}, <strong>{$filminfo.title}</strong>, {$filminfo.title} Full HD, <strong>{$filminfo.title} thuyết minh</strong>, {$filminfo.title} lồng tiếng, {$filminfo.title} Vietsub, {$filminfo.title} bản đẹp, {$filminfo.title} bản cam, {$filminfo.title} chiếu rạp, {$filminfo.title} phụ đề, {$filminfo.title} hậu trường, {$filminfo.title} tập mới, {$filminfo.title} phần mới, {$filminfo.title} {$filminfo.year}, {$filminfo.title_o} {$filminfo.year}, {$filminfo.title} {$filminfo.country.name}, {$filminfo.title_o} {$filminfo.country.name}, xem phim {$filminfo.title_o} {$filminfo.country.name}, phim {$filminfo.title_o} {$filminfo.country.name}, {$filminfo.title_o} {$filminfo.country.name} {$filminfo.year}, {$filminfo.country.name} {$filminfo.year}, phim {$filminfo.country.name} năm {$filminfo.year}, {$filminfo.title} {$filminfo.status}
                                <c:else /> {$filminfo.title} trọn bộ, {$filminfo.title} Vietsub, {$filminfo.title} tập cuối, {$filminfo.title} Vietsub thuyết minh, {$filminfo.title} lồng tiếng, {$filminfo.title} Full hd, {$filminfo.title} bản đẹp, Hậu trường {$filminfo.title}, trailer {$filminfo.title}, {$filminfo.title} phụ đề Xem phim {$filminfo.title_o}, {$filminfo.title} {$filminfo.year}, {$filminfo.title} tập mới, {$filminfo.title} phần mới, {$filminfo.title} phụ đề, {$filminfo.title_o} {$filminfo.year}, {$filminfo.title} {$filminfo.country.name}, {$filminfo.title_o} {$filminfo.country.name}, , phim {$filminfo.title_o} {$filminfo.country.name}, {$filminfo.title_o} {$filminfo.country.name} {$filminfo.year}, {$filminfo.country.name} {$filminfo.year}, phim {$filminfo.country.name} năm {$filminfo.year}, {$filminfo.title} {$filminfo.status}
                                <c:if is="{$split_timeLine.split}">,
                                    <c:each from="{$split_timeLine.split}" value="$timeline"> {$timeline}</c:each>
                                </c:if>
                            </c:if>
                        </h4>
                    </div>
                    </div>

                    
                </div>

                <div id="box-comment">
        <div class="tabs" data-target="#i-comment">
            <div class="tab tab-title active" data-name="item-facebook-comment">Facebook</div>
            <div class="tab tab-title" data-name="item-google-comment">Google+</div>
        </div>
        <div class="clear"></div>
        <div id="i-comment" class="_4-u3 padding i-comment">

            <div class="tab item-facebook-comment">
                <div class="fb-comments" data-href="{$filminfo.link}" data-colorscheme="light" data-width="810" data-order-by="reverse_time"></div>
            </div><!--end.item-facebook-comment-->

            <div class="tab item-google-comment hide">
                <div id="g-comments" class="g-comments" data-width="810"></div>
            </div><!--end.item-google-comment-->

        </div><!--end#i-comment-->
        
    </div><!--end#box-comment-->

                <div class="blocktitle title-ik">
        <div class="main-title title-ik-category">
            
            <span>Có thể bạn muốn xem</span>
        </div>
    </div>
    <div class="block-items">
        
            <c:each from="$phim_related_title" value="$film">

                <div class="col-lg-3">
                    <div class="item" style="padding-bottom: 150%">
                    <a class="inner" href="{$film.link}" title="{$film.title}">
                        <c:if is="{$film.thumb_url} != NULL">
                            <img class="thumbImg" src="{$cache_link_img}{$film.thumb_url}" alt="{$film.title}">
                            <c:else />
                            <img class="thumbImg" src="{$cache_link_img}{$film.thumb_url_o}" alt="{$film.title}">
                        </c:if>
                        <span class="icon-play"></span>

                        <div class="description"><h3 class="split name-vn">{$film.title}</h3><h4 class="split name-en">{$film.title_o}</h4></div>

                        <div class="figure_more"><span class="figure_more_title">{$film.status}</span></div>
                        
                    </a>
                    </div><!--end.item-->
                    

                </div><!--end.items-category-->
            </c:each>
    </div><!--end#item-category-->

    <div class="blocktitle title-ik">
        <div class="main-title title-ik-category">
            <p>Phim cùng chuyên mục</p>
            <span>Có thể bạn muốn xem</span>
        </div>
    </div>
    <div class="block-items ">
        
            <c:each from="$phim_category" value="$film">

                <div class="col-lg-3">
                    <div class="item" style="padding-bottom: 150%">
                    <a class="inner" href="{$film.link}" title="{$film.title}">
                        <c:if is="{$film.thumb_url} != NULL">
                            <img class="thumbImg" src="{$cache_link_img}{$film.thumb_url}" alt="{$film.title}">
                            <c:else />
                            <img class="thumbImg" src="{$cache_link_img}{$film.thumb_url_o}" alt="{$film.title}">
                        </c:if>
                        <span class="icon-play"></span>

                        <div class="description"><h3 class="split name-vn">{$film.title}</h3><h4 class="split name-en">{$film.title_o}</h4></div>

                        <div class="figure_more"><span class="figure_more_title">{$film.status}</span></div>
                        
                    </a>
                    </div><!--end.item-->
                    

                </div><!--end.items-category-->
            </c:each>
    </div><!--end#item-category-->

    </div>

    
        <c:include template="sidebar" />
    
        <!--/.block-->

        <c:if is="{$ad_location.ad_button_of_aftersocial}">
            <div class="ad_location ad_button_of_aftersocial">{$ad_location.ad_button_of_aftersocial}</div>
        </c:if>
        <div class="detail">

            

            

        </div><!--end.detail-->
        <div class="clear"></div>
    </div>

    
    
</div>
            <!-- END: film -->