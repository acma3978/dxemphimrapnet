<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!-- BEGIN: film -->

    <div class="detail blocktitle">
        <div class="block title-ik" id="page-info">

            <div class="poster">

                    <div class="profile_title">
                        <h1 class="title vn">Phim {$filminfo.title}</h1>
                        <h2 class="title en">{$filminfo.title_o} <span>({$filminfo.year})</span></h2>
                    </div>

                <div class="profile_img">

                    <c:if is="{$filminfo.image_url} != NULL">
                        <img class="thumbImg" src="{$cache_link_img}{$filminfo.image_url}" alt="{$film.title}">
                        <c:else />
                        <img class="thumbImg" src="{$cache_link_img}{$filminfo.image_url2}" alt="{$film.title}">
                    </c:if>

                    <div class="box-bookmark" data-filmid="{$filminfo.film_id}">
                        <i class="icon i-bookmark"></i><div class="add-bookmark">Đánh dấu</div>
                    </div>
                    <h2 class="hidden">Xem phim</h2>
                    <div class="btn-groups">
                        <c:if is="{$filminfo.has_episode}">
                            <a href="{$filminfo.link_watch}" class="icon btn-watch" title="{$filminfo.title}"></a>
                            <c:else />
                            Phim đang cập nhật...
                            <a href="{$filminfo.link_watch}" class="btn-trailer" title="Trailer {$filminfo.title}">Xem phim {$filminfo.title}</a>
                        </c:if>
                    </div>
                </div>
            </div>
            <div class="clearfix col2">
                <div class="bg-profile-film">
                    <ol>
                        <c:if is="{$filminfo.status}">
                            <li><i class="icon icon-op i-status"></i><label>Trạng thái:</label>  <c:if is="{$filminfo.check_trailer} != '1'"> <span class="red">{$filminfo.status}</span><c:else /> <span class="red">Trailer</span></c:if></li>
                        </c:if>
                        <li><i class="icon icon-op i-time"></i><label>Thời lượng:</label> {$filminfo.timeline}</li>
                        <li><i class="icon icon-op i-views"></i><label>Lượt xem:</label> {$filminfo.views_format}</li>
                        <li><i class="icon icon-op i-director"></i><label>Đạo diễn:</label><c:if is="{$filminfo.director}!='NULL'"> {$filminfo.director}<c:else />(Đang cập nhập)</c:if></li>
                        <li class="b-category"><i class="icon icon-op i-category"></i><label>Thể loại:</label>
                            <c:each from="{$filminfo.categories}" value="$category">
                                <a href="{$category.link}" title="Phim {$category.title}"> Phim {$category.title}</a><c:if is="!{$category.is_last}">, </c:if>
                            </c:each>
                        </li>
                        <li><i class="icon icon-op i-country"></i><label>Quốc gia:</label> <a href="{$filminfo.country.link}" title="Phim {$filminfo.country.name}"> {$filminfo.country.name}</a></li>
                        <li><i class="icon icon-op i-produce"></i><label>Sản xuất:</label><c:if is="{$filminfo.manufacturer}!='NULL'"> {$filminfo.manufacturer}<c:else />{$filminfo.country.name}</c:if></li>
                        <li><i class="icon icon-op i-year"></i><label>Năm phát hành:</label> {$filminfo.year}</li>
                        <li class="username"><i class="icon icon-op i-name"></i><label>Người đăng:</label> <span> {$filminfo.user_username}</span></li>
                    </ol>
                </div><!--end.bg-profile-film-->
            </div>
        </div>
        <div class="main-title title-ik-actor"><p>Diễn viên</p><span>Diễn viên mà bạn yêu thích</span></div>
            <div class="tabs-actor" id="item-actors">
                <div class="tab actor">
                    <nav id="slider-nav" class="clear">
                        <div class="movie-hot">
                            <div class="col-lg-12" style="padding:0">
                                <div class="top-movie-list block-wrapper">
                                    <div class="list_carousel">
                                        <ul id="movie-carousel-top">
                                            <c:each from="$phim_chieu_rap_hot" value="$film">
                                                <li>
                                                    <a href="{$film.link}" title="Phim {$film.title} - {$film.title_o}">
                                                        <div class="movie-carousel-top-item">
                                                            <c:if is="{$film.image_url} != NULL">
                                                                <img src="{$cache_link_img}{$film.image_url}" alt="{$film.title}">
                                                                <c:else />
                                                                <img src="{$cache_link_img}{$film.image_url_o}" alt="{$film.title}">
                                                            </c:if>

                                                            <div class="movie-carousel-top-item-meta">
                                                                <c:if is="{$film.status}">
                                                                    <i class="status">{$film.status}</i>
                                                                </c:if>
                                                                <strong>
                                                                    <span class="nameV">{$film.short_title} ({$film.year})</span>
                                                                    <span class="nameE">{$film.short_title_o}</span>
                                                                </strong>
                                                            </div>

                                                        </div><!--end.movie-carousel-top-item-->
                                                    </a>
                                                </li>
                                            </c:each>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>

        <div class="main-title title-ik-content"><p>Nội dung phim</p><span>Cảm nhận nội dung phim <strong>49 Ngày</strong></span></div>
            <div class="tabs-content" id="info-film">
                <div class="tab text">
                    Nội dung phim {$filminfo.title}
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

        <div class="main-title title-ik-comment"><p>Bình luận</p><span>Bạn có thể bình luận thoải mái</span></div>
        <div id="box-comment">
            <div class="tabs" data-target="#i-comment">
                <div class="tab tab-title active" data-name="item-facebook-comment">Facebook</div>
                <div class="tab tab-title" data-name="item-google-comment">Google+</div>
            </div>
            <div id="i-comment" class="i-comment clearfix">

                <div class="tab item-facebook-comment">
                    <div id="fb-root"></div>
                    <div class="fb-comments" data-href="{$url_base}{$filminfo.link}" data-width="685" data-colorscheme="dark"></div>
                </div><!--end.item-facebook-comment-->

                <div class="tab item-google-comment hide">
                    <div id="g-comments" class="g-comments" data-width="685"></div>
                </div><!--end.item-google-comment-->

            </div><!--end#i-comment-->
            <div class="clearfix"></div>
        </div><!--end#box-comment-->

<div class="main-title title-ik-comment"><p>Phim cùng chuyên mục</p><span>Có thể bạn muốn xem</span></div>
        <div class="item-category content">
        <div class="list-item row">
            <c:each from="$phim_category" value="$film">
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box">
                        <div class="m-item-box inner">

                            <a href="{$film.link}" title="{$film.title}">
                                <c:if is="{$film.thumb_url} != NULL">
                                    <img class="image-decoration" src="{$cache_link_img}{$film.thumb_url}" alt="{$film.title}">
                                    <c:else />
                                    <img class="image-decoration" src="{$cache_link_img}{$film.thumb_url_o}" alt="{$film.title}">
                                </c:if>
                            </a>

                            <span class="shadow status">{$film.status}</span>
                            <span class="i-episode">{$film.timeline}</span>
                        </div>

                        <div class="item-info">
                            <a href="{$film.link}" title="{$film.title}">
                                <span class="split name-vn">{$film.title} {$film.year}</span>
                                <!--<span class="split name-en">{$film.title_o}</span>-->
                                <span class="views">Lượt xem: {$film.views}</span>
                            </a>
                        </div>
                    </div>

                </div>
            </c:each>
        </div><!--end.row-->
            </div>
    <!--<c:each from="$phim_category" value="$film">
        <div class="col-md-6">
            <div class="item-film-inner item-film-teb ran-category">
                <h2>
                    <a href="{$film.link}" title="{$film.title}">
                        <c:if is="{$film.thumb_url} != NULL">
                            <img class="image-decoration" src="{$cache_link_img}{$film.thumb_url}" alt="{$film.title}">
                            <c:else />
                            <img class="image-decoration" src="{$cache_link_img}{$film.thumb_url_o}" alt="{$film.title}">
                        </c:if>
                    </a>
                    <span class="shadow status">{$film.status}</span>
                    <span class="i-episode">{$film.timeline}</span>
                    <div class="info">
                        <a href="{$film.link}" title="{$film.title}">
                            <span class="name-total">{$film.short_title_mobile_vn} - {$film.short_title_mobile_en} - {$film.year}</span>
                            <span class="views">Lượt xem: {$film.views}</span>
                        </a>
                    </div>
                </h2>
            </div>
        </div>
    </c:each>-->

    </div>
    </div><!--end.detail-->

<script type="text/javascript">
    AppPack.Public.init();

    /*$(document).ready(function(e) {
     if($.browser.msie) {
     $('a.btn-watch').attr('onclick', "this.style.behavior='url(#default#homepage)';this.setHomePage('http://{$url_base}/?home');");
     }
     });*/
</script>
<!-- END: film -->