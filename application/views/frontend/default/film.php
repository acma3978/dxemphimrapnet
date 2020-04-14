<?php defined('SYSPATH') or die('No direct script access.'); ?>

<!-- BEGIN: film -->

    <div id="f_top_movie_list">
        <div class="f_block_film">
            <a href="{$filminfo.link_watch}">
                <div class="movie-banner" style="background:url({$cache_link_img}{$filminfo.imagefan_url}) center center fixed;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;"></div>
                <div class="icon-play"><span><i class="f-movie-icon-play"></i></span></div>
            </a>
        </div>
    <div class="container">
        <div class="position-relative">
            <div class="f_block_film_title">

                <div class="col-md-3 p-0 float-left block-film-poster block-wrap">

                    <c:if is="{$filminfo.image_url} != NULL">
                        <c:if is="{$admin} == '1' || {$admin} == '2'">
                            <div class="image-banner" style="background:#e1e1e1 url('{$filminfo.image_url}');background-size:cover"></div>
                            <c:else />
                            <div class="image-banner" style="background:#e1e1e1 url('{$cache_link_img}{$filminfo.image_url}');background-size:cover"></div>
                        </c:if>
                        <c:else />
                        <c:if is="{$admin} == '1' || {$admin} == '2'">
                            <div class="image-banner" style="background:#e1e1e1 url('{$filminfo.image_url2}');background-size:cover"></div>
                            <c:else />
                            <div class="image-banner" style="background:#e1e1e1 url('{$cache_link_img}{$filminfo.image_url2}');background-size:cover"></div>
                        </c:if>
                    </c:if>

                    <!--<div class="image-banner" style="background:#e1e1e1 url('data/images/274x456.jpg');background-size:cover;height: 100%"></div>-->

                    <div class="box-bookmark" data-filmid="{$filminfo.film_id}"><i class="f_icon dd-icon i-bookmark"></i>
                        <div class="add-bookmark">Đánh dấu</div>
                    </div>
                    <ul class="btn-block">
                        <li class="item"><a data-target="#pop-trailer" class="btn btn-warning btn-trailer" title="Trailer phim {$filminfo.title}"> Trailer</a></li>
                    </ul>

                    <div class="clearfix"></div>
                </div>

                <div class="col-md-9 float-left block-info-c pt-2">

                    <h1 class="title vn">Phim {$filminfo.title}</h1>
                    <h2 class="title en">{$filminfo.title_o} <span>({$filminfo.year})</span></h2>
                    <div class="f_block_vote_stats">
                        <div class="form-group" id="rating-ability-wrapper">
                            <label class="control-label" for="rating">
                                <span class="field-label-info"></span>
                                <input type="hidden" id="selected_rating" name="selected_rating" value="" required="required">
                            </label>
                            <div class="float-left bold rating-header" style="">
                                <span class="selected-rating">0</span><small> / 5</small>
                            </div>
                            <div class="f_block_rating float-left">
                                <button type="button" class="btnrating btn btn-default btn-lg">
                                    <i class="fa fa-star" aria-hidden="true" data-attr="1" id="rating-star-1"></i>
                                </button>
                                <button type="button" class="btnrating btn btn-default btn-lg">
                                    <i class="fa fa-star" aria-hidden="true" data-attr="2" id="rating-star-2"></i>
                                </button>
                                <button type="button" class="btnrating btn btn-default btn-lg">
                                    <i class="fa fa-star" aria-hidden="true" data-attr="3" id="rating-star-3"></i>
                                </button>
                                <button type="button" class="btnrating btn btn-default btn-lg">
                                    <i class="fa fa-star" aria-hidden="true" data-attr="4" id="rating-star-4"></i>
                                </button>
                                <button type="button" class="btnrating btn btn-default btn-lg">
                                    <i class="fa fa-star" aria-hidden="true" data-attr="5" id="rating-star-5"></i>
                                </button>
                                <div class="f_block_rate"><i class="f_icon dd-icon i-like"></i><span>1605 lượt đánh giá</span></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="clearfix bg-profile-film">
                        <dl class="col row"><dt>
                                <i class="f_icon dd-icon i-director"></i>Đạo diễn: </dt>
                            <dd class="f_ellipsis"><c:if is="{$filminfo.director}!='NULL'">{$filminfo.director}<c:else />(Đang cập nhật)</c:if></dd>
                            <dt class="f_ellipsis"><i class="f_icon dd-icon i-status"></i>Trạng thái:</dt>
                            <dd style="color:red" class="f_ellipsis"><c:if is="{$filminfo.status}!='NULL'">{$filminfo.status}<c:else />(Đang cập nhật)</c:if></dd>
                            <dt><i class="f_icon dd-icon i-views"></i>Lượt xem:</dt>
                            <dd>1500</dd>
                        </dl>
                        <dl class="col row">
                            <dt><i class="f_icon dd-icon i-time"></i>Thời lượng:</dt>
                            <dd style="color:red;font-weight: bold">50 phút</dd>
                            <dt><i class="f_icon dd-icon i-quality"></i> Chất lượng:</dt>
                            <dd>1280p</dd>
                            <dt><i class="f_icon dd-icon i-medias"></i>Tập mới:</dt>
                            <dd class="f_ellipsis">1280p</dd>

                        </dl>

                        <dl class="col">
                            <dt><i class="f_icon dd-icon i-comingsoon"></i>Sắp chiếu:</dt>
                            <dd style="color:red;font-weight: bold" class="f_ellipsis" title="<c:if is="{$filminfo.comingsoon}!='NULL' || {$filminfo.comingsoon}!=''">{$filminfo.comingsoon}<c:else />N/A</c:if>"><c:if is="{$filminfo.comingsoon}!='NULL' || {$filminfo.comingsoon}!=''">{$filminfo.comingsoon}<c:else />N/A</c:if></dd>
                            <dt><i class="f_icon dd-icon i-country"></i> Quốc gia:</dt>
                            <dd><a href="{$filminfo.country.link}" title="Phim {$filminfo.country.name}"> {$filminfo.country.name}</a></dd>
                        </dl>
                    </div>
                </div>
                <div class="clearfix"></div>

                <div class=" block-wrap padding block-bottom">

                    <div id="demo" class="carousel slide f_block_carousel_actor" data-ride="carousel">

                        <!-- The slideshow -->
                        <div class="carousel-inner no-padding row">
                            <div class="carousel-item active">
                                <div class="f_item">
                                    <a href="http://google.com" title="Triệu vy">

                                        <div class="f_filmthumb" style="background-image: url('./data/images/actors/trieu-vy.jpg'); width: 100%;height: 100%"></div>
                                        <span class="f_title">Triệu vy</span>
                                    </a>
                                </div>
                                <div class="f_item">
                                    <a href="http://google.com" title="Lâm tâm như">

                                        <div class="f_filmthumb" style="background-image: url('./data/images/actors/aaa.jpg'); width: 100%;height: 100%"></div>
                                        <span class="f_title">Lâm tâm như</span>
                                    </a>
                                </div>
                                <div class="f_item">
                                    <a href="http://google.com" title="Lý tiểu long">

                                        <div class="f_filmthumb" style="background-image: url('./data/images/actors/ly-tieu-long.jpg'); width: 100%;height: 100%"></div>
                                        <span class="f_title">Lý tiểu long</span>
                                    </a>
                                </div>
                                <div class="f_item">
                                    <a href="http://google.com" title="Lý liên kiệt">

                                        <div class="f_filmthumb" style="background-image: url('./data/images/actors/ly-lien-kiet.jpg'); width: 100%;height: 100%"></div>
                                        <span class="f_title">Lý liên kiệt</span>
                                    </a>
                                </div>
                                <div class="f_item">
                                    <a href="http://google.com" title="Thành long">

                                        <div class="f_filmthumb" style="background-image: url('./data/images/actors/jackie.jpg'); width: 100%;height: 100%"></div>
                                        <span class="f_title">Thành long</span>
                                    </a>
                                </div>
                                <div class="f_item">
                                    <a href="http://google.com" title="Trương vệ kiện">

                                        <div class="f_filmthumb" style="background-image: url('./data/images/actors/truong-ve-kien.jpg'); width: 100%;height: 100%"></div>
                                        <span class="f_title">Trương vệ kiện</span>
                                    </a>
                                </div>

                            </div>
                            <div class="carousel-item">
                                <div class="f_item">
                                    <a href="http://google.com" title="Để mai tính">

                                        <div class="f_filmthumb" style="background-image: url('./data/images/actors/ly-tieu-long.jpg'); width: 100%;height: 100%"></div>
                                        <span class="f_title">Biệt Đội Bất Hảo</span>
                                    </a>
                                </div>
                                <div class="f_item">
                                    <a href="http://google.com" title="Để mai tính">

                                        <div class="f_filmthumb" style="background-image: url('./data/images/actors/ly-lien-kiet.jpg'); width: 100%;height: 100%"></div>
                                        <span class="f_title">Biệt Đội Bất Hảo</span>
                                    </a>
                                </div>
                                <div class="f_item">
                                    <a href="http://google.com" title="Để mai tính">

                                        <div class="f_filmthumb" style="background-image: url('./data/images/actors/jackie.jpg'); width: 100%;height: 100%"></div>
                                        <span class="f_title">Biệt Đội Bất Hảo</span>
                                    </a>
                                </div>
                                <div class="f_item">
                                    <a href="http://google.com" title="Để mai tính">

                                        <div class="f_filmthumb" style="background-image: url('./data/images/actors/jackie.jpg'); width: 100%;height: 100%"></div>
                                        <span class="f_title">Biệt Đội Bất Hảo</span>
                                    </a>
                                </div>
                                <div class="f_item">
                                    <a href="http://google.com" title="Để mai tính">

                                        <div class="f_filmthumb" style="background-image: url('./data/images/actors/jackie.jpg'); width: 100%;height: 100%"></div>
                                        <span class="f_title">Biệt Đội Bất Hảo</span>
                                    </a>
                                </div>
                                <div class="f_item">
                                    <a href="http://google.com" title="Để mai tính">

                                        <div class="f_filmthumb" style="background-image: url('./data/images/actors/jackie.jpg'); width: 100%;height: 100%"></div>
                                        <span class="f_title">Biệt Đội Bất Hảo</span>
                                    </a>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="f_item">
                                    <a href="http://google.com" title="Để mai tính">

                                        <div class="f_filmthumb" style="background-image: url('./data/images/actors/ly-tieu-long.jpg'); width: 100%;height: 100%"></div>
                                        <span class="f_title">Biệt Đội Bất Hảo</span>
                                    </a>
                                </div>
                                <div class="f_item">
                                    <a href="http://google.com" title="Để mai tính">

                                        <div class="f_filmthumb" style="background-image: url('./data/images/actors/ly-lien-kiet.jpg'); width: 100%;height: 100%"></div>
                                        <span class="f_title">Biệt Đội Bất Hảo</span>
                                    </a>
                                </div>
                                <div class="f_item">
                                    <a href="http://google.com" title="Để mai tính">

                                        <div class="f_filmthumb" style="background-image: url('./data/images/actors/jackie.jpg'); width: 100%;height: 100%"></div>
                                        <span class="f_title">Biệt Đội Bất Hảo</span>
                                    </a>
                                </div>
                                <div class="f_item">
                                    <a href="http://google.com" title="Để mai tính">

                                        <div class="f_filmthumb" style="background-image: url('./data/images/actors/jackie.jpg'); width: 100%;height: 100%"></div>
                                        <span class="f_title">Biệt Đội Bất Hảo</span>
                                    </a>
                                </div>
                                <div class="f_item">
                                    <a href="http://google.com" title="Để mai tính">

                                        <div class="f_filmthumb" style="background-image: url('./data/images/actors/jackie.jpg'); width: 100%;height: 100%"></div>
                                        <span class="f_title">Biệt Đội Bất Hảo</span>
                                    </a>
                                </div>
                                <div class="f_item">
                                    <a href="http://google.com" title="Để mai tính">

                                        <div class="f_filmthumb" style="background-image: url('./data/images/actors/jackie.jpg'); width: 100%;height: 100%"></div>
                                        <span class="f_title">Biệt Đội Bất Hảo</span>
                                    </a>
                                </div>

                            </div>
                        </div>

                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

</div>

<main data-title="{$filminfo.title}" data-titleascii="{$filminfo.title_ascii}" class="body-wrap clearfix">

    <div id="f_homemovies">

        <div class="container f_block_film_info">

            <div class="f_block-left float-left f_block_film">

                <c:include template="breadcrumbs" />

                <div class="f_block_info_c p-3">
                    <dl class="float-left col-md-9 pl-0">
                        <dt><i class="f_icon dd-icon i-genres"></i>Thể loại phim: </dt>
                        <dd>
                        <c:each from="{$filminfo.categories}" value="$category">
                            <a href="{$category.link}" title="{$category.title}">{$category.title}</a>
                            <c:if is="!{$category.is_last}">, </c:if>
                        </c:each>
                        </dd>
                    </dl>
                    <div class="float-left f_block_info_lc p-2 mr-3">
                        <i class="fa fa-calendar"></i><strong class="font-weight-bold display-5">Thông Tin - Lịch Chiếu</strong>
                        <span>Phim Trăng Sáng Chiếu Lòng Ta được Vietsub 2 tập vào các tối thứ 2, 3, 4 hàng tuần trên 4KOnline.net</span>
                    </div>
                    <div id="area-btn" class="float-left col-md-3">
                        <a class="btn-color btn btn-success btn btn-film-download" title="Download phim {$filminfo.title}" href="{$filminfo.link}download_{$filminfo.film_id}/">Download</a>
                    </div>

                    <div class="clearfix"></div>
                </div>

                <div class="f_block_title_a">
                    <h3 class="title">Nội dung phim
                        <span>Cảm nhận nội dung phim <strong>{$filminfo.title}</strong></span>
                    </h3>
                </div>

                <div class="f_block_content">
                    <article class="tab text">
                        <i class="f_icon dd-icon i-content"></i><h3><strong>{$filminfo.title}, {$filminfo.title} {$filminfo.year}</strong></h3>
                        <p>
                            <strong><a href="/" title="Phim"><strong>Phim</strong></a> {$filminfo.title_o}</strong> {$filminfo.pagetext}
                        </p>
                    </article>
                </div>

                <article class="f_block_item_tags">

                    <div class="items">
                        <i class="f_icon dd-icon i-tags"></i><span class="label">Từ khóa: </span>
                        <h2 class="inline"><a href="{$filminfo.link_tag}" title="{$filminfo.title}">{$filminfo.title}</a></h2>,
                        <c:each from="{$filminfo.tags_link}" value="$tag">
                            <h3 class="inline">
                                <a href="{$tag.link}" title="{$tag.title}" rel="tag">{$tag.title}</a><c:if is="!{$tag.is_last}">, </c:if>
                            </h3>
                        </c:each>
                    </div>

                </article>

                <div class="f_block_title_a">
                    <h3 class="title mt-0">Bình luận
                        <span>Hãy để lại cảm nhận của bộ phim <strong>{$filminfo.title}</strong></span>
                    </h3>
                </div>

                <c:include template="related_posts" />

                <c:include template="category_posts" />

                <div class="f_block_tags_split">

                    <h4>
                        <c:if is="{$filminfo.type} == 1">
                            Xem phim {$filminfo.title} - {$filminfo.title_o}, <strong>{$filminfo.title}</strong>, {$filminfo.title} Full HD, <strong>{$filminfo.title} thuyết minh</strong>, {$filminfo.title} lồng tiếng, {$filminfo.title} Vietsub, {$filminfo.title} bản đẹp, {$filminfo.title} bản cam, {$filminfo.title} chiếu rạp, {$filminfo.title} phụ đề, {$filminfo.title} hậu trường, {$filminfo.title} tập mới, {$filminfo.title} phần mới, {$filminfo.title} {$filminfo.year}, {$filminfo.title_o} {$filminfo.year}, {$filminfo.title} {$filminfo.country.name}, {$filminfo.title_o} {$filminfo.country.name}, xem phim {$filminfo.title_o} {$filminfo.country.name}, phim {$filminfo.title_o} {$filminfo.country.name}, {$filminfo.title_o} {$filminfo.country.name} {$filminfo.year}, {$filminfo.country.name} {$filminfo.year}, phim {$filminfo.country.name} năm {$filminfo.year}, {$filminfo.title} {$filminfo.status}
                            <c:else />
                            {$filminfo.title} trọn bộ, {$filminfo.title} Vietsub, {$filminfo.title} tập cuối, {$filminfo.title} Vietsub thuyết minh, {$filminfo.title} lồng tiếng, {$filminfo.title} Full hd, {$filminfo.title} bản đẹp, Hậu trường {$filminfo.title}, trailer {$filminfo.title}, {$filminfo.title} phụ đề Xem phim {$filminfo.title_o}, {$filminfo.title} {$filminfo.year}, {$filminfo.title} tập mới, {$filminfo.title} phần mới, {$filminfo.title} phụ đề, {$filminfo.title_o} {$filminfo.year}, {$filminfo.title} {$filminfo.country.name}, {$filminfo.title_o} {$filminfo.country.name}, , phim {$filminfo.title_o} {$filminfo.country.name}, {$filminfo.title_o} {$filminfo.country.name} {$filminfo.year}, {$filminfo.country.name} {$filminfo.year}, phim {$filminfo.country.name} năm {$filminfo.year}, {$filminfo.title} {$filminfo.status}
                            <c:if is="{$split_timeLine.split}">
                                ,
                                <c:each from="{$split_timeLine.split}" value="$timeline"> {$timeline}</c:each>
                            </c:if>
                        </c:if>
                    </h4>

                </div>

            </div>

            <c:include template="sidebar" />

            <div class="clearfix"></div>
        </div>
    </div>

<!-- END: film -->