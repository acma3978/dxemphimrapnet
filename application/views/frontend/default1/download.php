<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!-- BEGIN: download -->
        	<div class="block" id="page-info">
                <div itemscope itemtype="http://schema.org/Recipe" style="z-index: -100; width: 1px; height: 1px; left: -1px; top: -1px; visibility: hidden;overflow: hidden; position: absolute;">
					<span itemprop="name">{$filminfo.title}</span>
					<img itemprop="image" src="{$filminfo.image_url}" alt="{$filminfo.title}" />
					<div id="static_rating" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
					<span itemprop="ratingValue">{$filminfo.rating}</span>
					<span itemprop="bestRating">10</span>
					<span itemprop="ratingCount">{$filminfo.liked_times}</span>
					<span><a rel="author" href="https://plus.google.com/u/0/100188763272100065945">Phim mới</a></span>
					</div>
				</div> 

                	<div class="info clear">
                    	<div class="poster col-md-5" style="padding:0">
                            <c:if is="{$filminfo.image_url} != NULL">
                                <img src="{$cache_link_img}{$filminfo.image_url}" alt="{$film.title}">
                                <c:else />
                                <img src="{$cache_link_img}{$filminfo.image_url2}" alt="{$film.title}">
                            </c:if>
                            <div class="box-bookmark" data-filmid="{$filminfo.film_id}">
                                <i class="icon i-bookmark"></i><div class="add-bookmark">Đánh dấu</div>
                            </div>
                            <h2 class="hidden">Xem mới</h2>
                            <div class="btn-groups">
                                <c:if is="{$filminfo.has_episode}">
                                    <a href="{$filminfo.link_watch}" class="btn-item btn-download" title="Tải phim {$filminfo.title}"></a>
                                    <a href="{$filminfo.link_watch}" class="btn-item btn-watch" title="Xem phim {$filminfo.title}"></a>
                                    <c:else />
                                    Phim đang cập nhật...
                                    <a href="{$filminfo.link_watch}" class="btn-trailer" title="Trailer {$filminfo.title}">Xem phim {$filminfo.title}</a>
                                </c:if>
                            </div>
                        </div>
                        <div class="col2 col-md-6" style="padding-right:0">
                            <h1 class="title vn">Phim {$filminfo.title}</h1>
                        	<h2 class="title en">{$filminfo.title_o} <span>({$filminfo.year})</span></h2>
                            <div class="bg-profile-film">
                                <div class="Bg-slimScrollDiv">
                                    <ol>
                                        <c:if is="{$filminfo.status}">
                                        <li><i class="icon icon-op i-status"></i><label>Trạng thái:</label>  <label class="red"><c:if is="{$filminfo.check_trailer} != '1'"> {$filminfo.status}<c:else /> Trailer</c:if></label></li>
                                        </c:if>
                                        <c:if is="{$filminfo.comingsoon}">
                                        <li><i class="icon icon-op i-stepepisode"></i><label>Sắp chiếu:</label> <span class="stepe"> {$filminfo.comingsoon}</span></li>
                                        </c:if>
                                        <li><i class="icon icon-op i-time"></i><label>Thời lượng:</label> {$filminfo.timeline}</li>
                                        <li><i class="icon icon-op i-views"></i><label>Lượt xem:</label> {$filminfo.views_format}</li>
                                        <li><i class="icon icon-op i-director"></i><label>Đạo diễn:</label><c:if is="{$filminfo.director}!='NULL'"> {$filminfo.director}<c:else />(Đang cập nhập)</c:if></li>
                                        <li><div class="split"><i class="icon icon-op i-category"></i><label>Thể loại:</label>
                                            <c:each from="{$filminfo.categories}" value="$category">
                                                <a href="{$category.link}" title="Phim {$category.title}"> Phim {$category.title}</a><c:if is="!{$category.is_last}">, </c:if>
                                            </c:each>
                                            </div>
                                        </li>
                                        <li><i class="icon icon-op i-country"></i><label>Quốc gia:</label> <a href="{$filminfo.country.link}" title="Phim {$filminfo.country.name}"> {$filminfo.country.name}</a></li>
                                        <li><i class="icon icon-op i-produce"></i><label>Sản xuất:</label><c:if is="{$filminfo.manufacturer}!='NULL'"> {$filminfo.manufacturer}<c:else />{$filminfo.country.name}</c:if></li>
                                        <li><i class="icon icon-op i-year"></i><label>Năm phát hành:</label> {$filminfo.year}</li>
                                        <c:if is="{$admin} == '1' || {$admin} == '2'"><li class="username"><i class="icon icon-op i-name"></i><label>Người đăng:</label> <span> {$filminfo.user_username}</span></li></c:if>
                                    </ol>
                                    <meta itemprop="uploadDate" content="{$filminfo.last_update}">
                                    <meta itemprop="description" content="{$page_description}">
                                </div>
                            </div><!--end.bg-profile-film-->
                        </div>
                        <div class="clear"></div>
                    </div>
                <div class="box-rating clear" itemtype="http://data-vocabulary.org/Review-aggregate" itemscope>
                    <!--<div class="rating-star"></div>-->
                    <div class="rating-stats">
                        <div class="like-stats">
                            <i class="icon i-like-stats" title="Lượt thích {$filminfo.liked_format}"></i>
                            <span class="votes" itemprop="votes">{$filminfo.liked_format}</span>
                            <span class="hidden" itemprop="rating" itemtype="http://data-vocabulary.org/Rating" itemscope>
                                <span itemprop="ratingValue">{$filminfo.rating}</span>
					            <span itemprop="bestRating">10</span>
                                <span itemprop="ratingCount">{$filminfo.liked_times}</span>
                            </span>
                        </div>
                    </div>

                    <div class="rating-button" >
                        <span class="fb-like like-at-rating" data-href="http://www.facebook.com/phimrapmedia" data-width="60" data-layout="button_count" data-action="like" data-share="true" data-show-faces="false"></span>
                        <span class="g-plusone" data-size="medium"></span>
                    </div>
                    <div class="Msocial">
                        <c:if is="{$collect}!=''">

                            <a title="Thông tin phim {$filminfo.title} - Facebook" href="{$collect.0}" class="azm-social azm-size-48 azm-r-square azm-facebook"><i class="fa fa-facebook"></i></a>
                            <a title="Thông tin phim {$filminfo.title} - Blogger" href="{$collect.1}" class="icon icon-sc blogger-content"></a>
                            <a title="Thông tin phim {$filminfo.title} - Wordpress" href="{$collect.2}" class="icon icon-sc wordpress-content"></a>

                        </c:if>
                    </div>

                    <!--<div class='starrr' id='star2'></div>

                    <input type='text' name='rating' value='3' id='star2_input' />-->

                </div>
                    <div class="ad_location ad_info_1">{$ad_location.ad_info_1}</div>
            </div><!--/.block-->
<c:if is="{$ad_location.ad_button_of_aftersocial}">
    <div class="ad_location ad_button_of_aftersocial">{$ad_location.ad_button_of_aftersocial}</div>
</c:if>
<div class="detail">

    <div class="blocktitle title-ik">
        <div class="main-title title-ik-actor">
            <p>Diễn viên</p>
            <span>Diễn viên trong bộ phim {$filminfo.title}</span>
        </div>
    </div>

    <div class="tabs-actor" id="item-actors">
        <div class="col-lg-12" style="padding:0">
            <div class="list_carousel carousel_actor">
                <div class="caroufredsel_wrapper clear">
                    <ul id="movie-carousel-actor">
                        <c:each from="{$filminfo.actors_link}" value="$actor">
                            <li>
                                <!--<a href="{$actor.link}" title="Diễn viên {$actor.title}">-->
                                    <div class="movie-carousel-actor-item">
                                        <a href="{$actor.link}" title="Diễn viên {$actor.title}">
                                            <c:if is="{$actor.profile.image} != NULL">
                                                <img src="{$cache_link_img}{$actor.profile.image_url}" alt="{$actor.title}">
                                                <c:else />
                                                <div class="icon non-avatar"></div>
                                            </c:if>
                                            <div class="carousel-actor-meta">
                                                <span class="name-actor">{$actor.title}</span>
                                            </div>
                                        </a>
                                    </div><!--end.movie-carousel-top-item-->
                                <!--</a>-->
                            </li>
                        </c:each>
                    </ul>
                </div>
                <a id="prevTop" class="prev" rel="nofollow" style="display: block;">
                    <span class="arrow-icon left"></span>
                </a>
                <a id="nextTop" class="next" rel="nofollow" style="display: block;">
                    <span class="arrow-icon right"></span>
                </a>
            </div>

        </div>
    <div class="blocktitle title-ik clear">
        <div class="main-title title-ik-content">
            <p>Nội dung phim</p>
            <span>Cảm nhận nội dung phim <strong>{$filminfo.title}</strong></span>
        </div>
    </div>

    <div class="tabs-content" id="info-film">
        <div class="tab text">
            {$filminfo.pagetext}
            <i class="icon ndmore"></i><a class="ndLink" title="Xem nội dung chi tiết phim {$filminfo.title}" href="{$filminfo.link_nd}">Xem phim {$filminfo.title}</a>

            <c:if is="{$filminfo.episode_timeline}">

                <div class="more-less">
                    <div class="more-block">
                        <h4>Xem phim {$filminfo.title} - {$filminfo.title_o},
                        <c:each from="{$split_timeLine.split}" value="$timeline"> {$timeline}</c:each>
                        Tập cuối, {$filminfo.title} trọn bộ, {$filminfo.title} Full HD, {$filminfo.title} lồng tiếng, {$filminfo.title} thuyết minh, {$filminfo.title} Vietsub, {$filminfo.title} bản đẹp, {$filminfo.title} bản nét</h4>
                    </div>
                </div>

                <c:else />

                <div class="more-less">
                    <div class="more-block">
                        <h4>Xem phim {$filminfo.title} - {$filminfo.title_o}, <strong>{$filminfo.title}</strong>, {$filminfo.title} Full HD, <strong>{$filminfo.title} thuyết minh</strong>, {$filminfo.title} lồng tiếng, {$filminfo.title} Vietsub, {$filminfo.title} bản đẹp, {$filminfo.title} bản cam, {$filminfo.title} chiếu rạp</h4>
                    </div>
                </div>

            </c:if>
        </div>

        <div id="item-tags" class="tags">
            <span class="label">Từ khóa: </span>
            <div class="items">
                <h2 class="inline"><a href="{$filminfo.link_tag}" title="{$filminfo.title}">{$filminfo.title}</a></h2>,
                <h3 class="inline">
                <c:each from="{$filminfo.tags_link}" value="$tag">
                <a href="{$tag.link}" title="{$tag.title}" rel="tag">{$tag.title}</a><c:if is="!{$tag.is_last}">, </c:if>
                </c:each>
                </h3>
            </div>
        </div>
    </div>

    <div class="blocktitle title-ik">
        <div class="main-title title-ik-comment">
            <p>Bình luận</p>
            <span>Bạn có thể bình luận thoải mái</span>
        </div>
    </div>
    <div id="box-comment">
        <div class="tabs" data-target="#i-comment">
            <div class="tab tab-title active" data-name="item-facebook-comment">Facebook</div>
            <div class="tab tab-title" data-name="item-google-comment">Google+</div>
        </div>
        <div id="i-comment" class="i-comment clear">

            <div class="tab item-facebook-comment">
                <div id="fb-root"></div>
                <div class="fb-comments" data-href="{$url_base}{$filminfo.link}" data-width="685" data-colorscheme="light" data-numposts="10"></div>
            </div><!--end.item-facebook-comment-->

            <div class="tab item-google-comment hide">
                <div id="g-comments" class="g-comments" data-width="685"></div>
            </div><!--end.item-google-comment-->

        </div><!--end#i-comment-->
        <div class="clear"></div>
    </div><!--end#box-comment-->

    <div class="blocktitle title-ik">
        <div class="main-title title-ik-category">
            <p>Phim cùng chuyên mục</p>
            <span>Có thể bạn muốn xem</span>
        </div>
    </div>
</div><!--end.detail-->

    <div id="item-category" class="rows">
        <ol>
        <c:each from="$phim_category" value="$film">

                <li class="col-md-4 items-category thumbnail" style="padding-right:0;">
                    <div class="item-film-inner">
                    <a href="{$film.link}" title="{$film.title}">
                        <c:if is="{$film.thumb_url} != NULL">
                            <img class="thumbImg" src="{$cache_link_img}{$film.thumb_url}" alt="{$film.title}">
                            <c:else />
                            <img class="thumbImg" src="{$cache_link_img}{$film.thumb_url_o}" alt="{$film.title}">
                        </c:if>
                        <div class="info">

                                <span class="split name-vn">{$film.title}</span>
                                <span class="split name-en">{$film.title_o}</span>

                        </div>
                        <span class="icon item-over_play"></span>
                    </a>
                    </div>
                    <span class="status">{$film.status}</span>
                    <span class="i-episode">{$film.timeline}</span>

                </li>

        </c:each>
        </ol>
    </div>
<script type="text/javascript">

/*$(document).ready(function(e){if($.browser.msie) {$('a.btn-watch').attr('onclick', "this.style.behavior='url(#default#homepage)';this.setHomePage('http://{$url_base}/?home');");}});*/
</script>
<!-- END: download -->