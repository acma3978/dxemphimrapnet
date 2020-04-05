<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!-- BEGIN: watch -->
<div class="black-block">
<div class="block-movie container padding-z">
    <div id="media" class="block context-menu-one box menu-1">
                        <div id="mediaplayer">
                            <div id="player"></div>
                            <script id="jwsource" type="text/javascript">
                                jwplayer.setup = {$filminfo.setup_jwplayer}
                            </script>
                        </div>
                    </div><!--end#media-->

                    <div class="media-bottom">
                        
                        <div class="box_star" data-score="{$filminfo.liked_times_float}" data-filmid="{$filminfo.film_id}" itemtype="http://data-vocabulary.org/Review-aggregate" itemscope>
                <div class="icon item-big-star" itemprop="votes">{$filminfo.liked_times_float}</div>
                <div class="item-star-rate" data-vote="{$filminfo.liked_vote}" data-rate="{$filminfo.liked_times}" data-frate="{$filminfo.liked_times_float}"></div>
                <div class="item-hint"></div>
                
            </div><!--end.box_star-->

            <div class="like-at-rating">
                <div class="fb-like" data-href="{$filminfo.link}" data-width="300" data-colorscheme="dark" data-show-faces="true" data-send="true"></div>
                <div class="social-icon">
                    <span class="g-plusone" data-size="medium"></span>
                </div>
            </div><!--end.like-at-rating-->
            <div class="clear"></div>
                    </div><!--end.media-bottom-->

                    <div class="block-episode">
                        <div class="serverlist">
                        
                        <c:if is="{$filminfo.check_trailer} != '1'">
                <c:each from="$server_cache" key="$server_id" value="$server">
                    <div class="server">
                        <div class="list_carousel clear">
                            <div class="label"><i class="icon media-icon-server"></i>{$server.title} <!--<i class="icon media-server server-{$server.flag}"></i>-->
                            </div>
                            
                            
                            <ul class="mega-carousel episodelist padding-z">
                                
                                    <c:each from="$episode_cache[$server_id]" value="$episode">
                                        <li><a data-type="{$server.type}" data-episode-id="{$episode.episode_id}" href="{$episode.link}" <c:if is="{$admin} == '1' || {$admin} == '2'">title="Server: {$server.title} - Tập {$episode.name} - Link: {$episode.video_url}"<c:else />title="Tập {$episode.name} - {$server.title}"</c:if> <c:if is="{$episode.is_current}"> class="active"</c:if>>{$episode.name}</a></li>
                                    </c:each>
                                
                            </ul>

                            <!--<a id="prevTop" class="prev-play-{$server_id}" rel="nofollow" style="display: block;">
                                <span class="arrow-icon left"></span>
                            </a>
                            <a id="nextTop" class="next-play-{$server_id" rel="nofollow" style="display: block;">
                                <span class="arrow-icon right"></span>
                            </a>-->
                        </div>
                    </div><!--/.server-->
                </c:each>
<c:else />
                                
                                </c:if>

            </div><!--end.serverlist-->

                    </div>

</div>
</div><!--end.black-block-->

<main class="body-wrap container clearfix">

<c:include template="breadcrumbs" />

<div id="block-watch">

    <div class="block-col-left">
        <div class="_4-u2 _4-u8 padding">

        <div id="profile-media">
            <div class="profile-media-img col-media-img">
            <c:if is="{$filminfo.thumb_url} != NULL">
                <img src="{$cache_link_img}{$filminfo.thumb_url}" alt="{$film.title}">
                <c:else />
                <img src="{$cache_link_img}{$filminfo.thumb_url_o}" alt="{$film.title}">
            </c:if>
        </div><!--end.profile-media-img-->

        <div class="profile-media-content col-content">
                <div class="media_content_page">
                    <c:if is="{$filminfo.pagetext2}!=''">
                        {$filminfo.short_pagetext2}
                        <c:else />
                        {$filminfo.short_pagetext}
                    </c:if>
                </div><!--end.tbhd_page-->
                <div class="media-button-more">
                    <c:if is="{$filminfo.pagetext2}!=''">
                        <a href="{$filminfo.link_nd}" title="Nội dung {$film.title}">[Xem thêm]</a>
                        <c:else />
                        <a href="{$filminfo.link}" title="Nội dung {$film.title}">[Xem thêm]</a>
                    </c:if>
                </div>
            </div><!--end.profile-media-content-->

            
        
        <div class="profile-media-status col-content fix-row">
                <dl>
                    <dt><i class="icon icon-op i-status"></i> Trạng thái: </dt>
                    <dd class="red"><c:if is="{$filminfo.check_trailer} != '1'"> {$filminfo.status}<c:else /> Trailer </c:if></dd>
                    <dt><i class="icon icon-op i-views"></i> Lượt xem: </dt>
                    <dd> {$filminfo.views_format} </dd>
                    <dt><i class="icon icon-op i-year"></i> Năm: </dt>
                    <dd> {$filminfo.year} </dd>
                    <dt><i class="icon icon-op i-country"></i> Quốc gia: </dt>
                    <dd> <a href="{$filminfo.country.link}" title="Phim {$filminfo.country.name}"> {$filminfo.country.name}</a> </dd>
                </dl>
            </div>

    </div><!--end#profile-media-->

            <div class="clear"></div>
        </div><!--end._4-u2-->
    </div>

    <div class="block-col-right">
    <div class="_4-u2 _4-u8 padding">
        <div class="fb-like-box" data-href="https://www.facebook.com/kenhphimmoi/" data-width="285" data-height="300" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
    </div>
</div>
    <div class="clear"></div>



<div class="block-wrap padding">

    <div class="block-col-left">
        <div id="page-watch" data-film-id="{$filminfo.film_id}" data-title="{$filminfo.title}">

    

    <!--<div class="note-media">
        <ins class="note-media-warning">Thông báo:</ins> <span>Hiện do tình trang bộ phim này đang trong thời gian cập nhật</span>
    </div>end.note-media-->

    

    <div class="block clear" id="movie-info">

            <div class="ad_location below_of_player">{$ad_location.ad_below_of_player}</div>

            
                <div class="_4-u3 padding">
                    <ul>
                        <li style="color:red">Khi các bạn chọn <strong>Server nào xem không được</strong> vui lòng chọn Server khác để xem</li>
                        <li>Chọn chất lượng <strong>SD</strong> để xem phim nhanh nhất, và <strong>HD</strong> để xem phim nét nhất.</li>
                        <li>Hiện nay có 1 số tập phim bị lỗi chúng tôi đang cố gắng khắc phục những link lỗi. Mong các bạn thông cảm nhé</li>
                        <li>Nếu thấy thích thì Like, <strong>thấy phim hay thì Share cho mọi người cùng xem nhé</strong>, mỗi lượt Like, Share, Comment của các bạn là động lực để Subteam và Website tiếp tục phát triển và cống hiến cho các bạn nhiều bộ phim hay hơn nữa</li>
                    </ul>
                </div>

    </div><!--end#movie-info-->
    <div id="item-tags" class="margin tags">
                        
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
    <div id="item-category" class="block-items">
        
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
    </div><!--end.block-col-left-->

    <div class="block-col-right">
        <c:include template="sidebar" />
    </div>

<div class="clear"></div>
</div><!--end.block-wrap-->
</div><!--end#block-watch-->
<script type="text/javascript">

AppPack.Watch.init('{$filminfo.film_id}');
    <c:if is="!{$filminfo.is_newtab}">
    AppPack.Watch.checkAndPlayEpisodeViewing();
    </c:if>
</script>

<!-- END: watch -->