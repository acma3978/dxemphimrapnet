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
                            <dd><c:if is="{$filminfo.director}!='NULL'">{$filminfo.director}<c:else />(Đang cập nhật)</c:if></dd>
                            <dt><i class="f_icon dd-icon i-status"></i>Trạng thái:</dt>
                            <dd style="color:red"><c:if is="{$filminfo.check_trailer} != '1'">{$filminfo.status}<c:else />Trailer</c:if></dd>
                            <dt><i class="f_icon dd-icon i-views"></i>Lượt xem:</dt>
                            <dd>1500</dd>
                        </dl>
                        <dl class="col row">
                            <dt><i class="f_icon dd-icon i-time"></i>Thời lượng:</dt>
                            <dd style="color:red;font-weight: bold">{$filminfo.timeline}</dd>
                            <dt><i class="f_icon dd-icon i-quality"></i> Chất lượng:</dt>
                            <dd>1280p</dd>
                            <dt><i class="f_icon dd-icon i-medias"></i>Tập mới:</dt>
                            <dd>1280p</dd>

                        </dl>

                        <dl class="col">
                            <dt><i class="f_icon dd-icon i-comingsoon"></i>Sắp chiếu:</dt>
                            <dd style="color:red;font-weight: bold"><c:if is="{$filminfo.comingsoon}">{$filminfo.comingsoon}<c:else />N/A</c:if></dd>
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
                        <dd><a href="the-loai/phim-hai-huoc/" title="Hài Hước">Hài Hước</a>, <a href="the-loai/phim-tv-show/" title="TV Show">TV Show</a></dd>
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
                        <i class="f_icon dd-icon i-content"></i><h3><strong>{$filminfo.title}, {$filminfo.title_o} {$filminfo.year}</strong></h3>
                        <p>
                            <strong><a href="/" title="Phim"><strong>Phim</strong></a> {$filminfo.title}</strong>{$filminfo.pagetext}
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

                <div class="f_block_title_a">
                    <h3 class="title mt-0">Phim liên quan</h3>
                    <div class="f_block_item row">
                        <div class="row col-md-3 f_wrapfilm thumb grid-item" data-trailer="YUTgFBJeYx0" data-index="YUTgFBJeYx0" ng-repeat="film in listShowingFilms">
                            <div class="f_film" data-slug="2237-biet-doi-bat-hao">
                                <a href="/phim/2237-biet-doi-bat-hao" title="Biệt Đội">
                                    <div class="f_filmthumbnail" style="background-image: url('https://s3img.vcdn.vn/mobile/123phim/2019/10/biet-doi-bat-hao-the-bad-guys-reign-of-chaos-c18-15711088419521_215x318.jpg')">
                                        <div class="hoverInfo showHover showingDetail" data-id="2237" data-slug="2237-biet-doi-bat-hao">
                                            <div class="icon-play"><span><i class="f-movie-icon-play"></i></span></div>
                                        </div>
                                        <span class="ng-binding ageType">C18</span>
                                        <span class="avgPoint ng-scope">
                                                      <p class="txtPoint ng-binding">130 phút</p>
                                                    </span>
                                    </div>

                                    <div class="f_item_option">
                                        <i class="fas fa-volume-down" title="Thuyết minh"></i>
                                        <i class="fas fa-comment-dots" title="VietSub"></i>
                                    </div>
                                    <div class="info">
                                        <div class="ng-binding ng-scope"><span class="f_title_vn">Biệt Đội Bất Hảo</span><span class="f_title_en">The Bad Guys: Reign of Chaos (C18)</span></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row col-md-3 f_wrapfilm thumb grid-item" data-trailer="YUTgFBJeYx0" data-index="YUTgFBJeYx0" ng-repeat="film in listShowingFilms">
                            <div class="f_film" data-slug="2237-biet-doi-bat-hao">
                                <a href="/phim/2237-biet-doi-bat-hao" title="Biệt Đội">
                                    <div class="f_filmthumbnail" style="background-image: url('https://s3img.vcdn.vn/mobile/123phim/2019/10/biet-doi-bat-hao-the-bad-guys-reign-of-chaos-c18-15711088419521_215x318.jpg')">
                                        <div class="hoverInfo showHover showingDetail" data-id="2237" data-slug="2237-biet-doi-bat-hao">
                                            <div class="icon-play"><span><i class="f-movie-icon-play"></i></span></div>
                                        </div>
                                        <span class="ng-binding ageType">C18</span>
                                        <span class="avgPoint ng-scope">
                                                      <p class="txtPoint ng-binding">130 phút</p>
                                                    </span>
                                    </div>

                                    <div class="f_item_option">
                                        <i class="fas fa-volume-down" title="Thuyết minh"></i>
                                        <i class="fas fa-comment-dots" title="VietSub"></i>
                                    </div>
                                    <div class="info">
                                        <div class="ng-binding ng-scope"><span class="f_title_vn">Biệt Đội Bất Hảo</span><span class="f_title_en">The Bad Guys: Reign of Chaos (C18)</span></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row col-md-3 f_wrapfilm thumb grid-item" data-trailer="YUTgFBJeYx0" data-index="YUTgFBJeYx0" ng-repeat="film in listShowingFilms">
                            <div class="f_film" data-slug="2237-biet-doi-bat-hao">
                                <a href="/phim/2237-biet-doi-bat-hao" title="Biệt Đội">
                                    <div class="f_filmthumbnail" style="background-image: url('https://s3img.vcdn.vn/mobile/123phim/2019/10/biet-doi-bat-hao-the-bad-guys-reign-of-chaos-c18-15711088419521_215x318.jpg')">
                                        <div class="hoverInfo showHover showingDetail" data-id="2237" data-slug="2237-biet-doi-bat-hao">
                                            <div class="icon-play"><span><i class="f-movie-icon-play"></i></span></div>
                                        </div>
                                        <span class="ng-binding ageType">C18</span>
                                        <span class="avgPoint ng-scope">
                                                      <p class="txtPoint ng-binding">130 phút</p>
                                                    </span>
                                    </div>

                                    <div class="f_item_option">
                                        <i class="fas fa-volume-down" title="Thuyết minh"></i>
                                        <i class="fas fa-comment-dots" title="VietSub"></i>
                                    </div>
                                    <div class="info">
                                        <div class="ng-binding ng-scope"><span class="f_title_vn">Biệt Đội Bất Hảo</span><span class="f_title_en">The Bad Guys: Reign of Chaos (C18)</span></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row col-md-3 f_wrapfilm thumb grid-item" data-trailer="YUTgFBJeYx0" data-index="YUTgFBJeYx0" ng-repeat="film in listShowingFilms">
                            <div class="f_film" data-slug="2237-biet-doi-bat-hao">
                                <a href="/phim/2237-biet-doi-bat-hao" title="Biệt Đội">
                                    <div class="f_filmthumbnail" style="background-image: url('https://s3img.vcdn.vn/mobile/123phim/2019/10/biet-doi-bat-hao-the-bad-guys-reign-of-chaos-c18-15711088419521_215x318.jpg')">
                                        <div class="hoverInfo showHover showingDetail" data-id="2237" data-slug="2237-biet-doi-bat-hao">
                                            <div class="icon-play"><span><i class="f-movie-icon-play"></i></span></div>
                                        </div>
                                        <span class="ng-binding ageType">C18</span>
                                        <span class="avgPoint ng-scope">
                                                      <p class="txtPoint ng-binding">130 phút</p>
                                                    </span>
                                    </div>

                                    <div class="f_item_option">
                                        <i class="fas fa-volume-down" title="Thuyết minh"></i>
                                        <i class="fas fa-comment-dots" title="VietSub"></i>
                                    </div>
                                    <div class="info">
                                        <div class="ng-binding ng-scope"><span class="f_title_vn">Biệt Đội Bất Hảo</span><span class="f_title_en">The Bad Guys: Reign of Chaos (C18)</span></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row col-md-3 f_wrapfilm thumb grid-item" data-trailer="YUTgFBJeYx0" data-index="YUTgFBJeYx0" ng-repeat="film in listShowingFilms">
                            <div class="f_film" data-slug="2237-biet-doi-bat-hao">
                                <a href="/phim/2237-biet-doi-bat-hao" title="Biệt Đội">
                                    <div class="f_filmthumbnail" style="background-image: url('https://s3img.vcdn.vn/mobile/123phim/2019/10/biet-doi-bat-hao-the-bad-guys-reign-of-chaos-c18-15711088419521_215x318.jpg')">
                                        <div class="hoverInfo showHover showingDetail" data-id="2237" data-slug="2237-biet-doi-bat-hao">
                                            <div class="icon-play"><span><i class="f-movie-icon-play"></i></span></div>
                                        </div>
                                        <span class="ng-binding ageType">C18</span>
                                        <span class="avgPoint ng-scope">
                                                      <p class="txtPoint ng-binding">130 phút</p>
                                                    </span>
                                    </div>

                                    <div class="f_item_option">
                                        <i class="fas fa-volume-down" title="Thuyết minh"></i>
                                        <i class="fas fa-comment-dots" title="VietSub"></i>
                                    </div>
                                    <div class="info">
                                        <div class="ng-binding ng-scope"><span class="f_title_vn">Biệt Đội Bất Hảo</span><span class="f_title_en">The Bad Guys: Reign of Chaos (C18)</span></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row col-md-3 f_wrapfilm thumb grid-item" data-trailer="YUTgFBJeYx0" data-index="YUTgFBJeYx0" ng-repeat="film in listShowingFilms">
                            <div class="f_film" data-slug="2237-biet-doi-bat-hao">
                                <a href="/phim/2237-biet-doi-bat-hao" title="Biệt Đội">
                                    <div class="f_filmthumbnail" style="background-image: url('https://s3img.vcdn.vn/mobile/123phim/2019/10/biet-doi-bat-hao-the-bad-guys-reign-of-chaos-c18-15711088419521_215x318.jpg')">
                                        <div class="hoverInfo showHover showingDetail" data-id="2237" data-slug="2237-biet-doi-bat-hao">
                                            <div class="icon-play"><span><i class="f-movie-icon-play"></i></span></div>
                                        </div>
                                        <span class="ng-binding ageType">C18</span>
                                        <span class="avgPoint ng-scope">
                                                      <p class="txtPoint ng-binding">130 phút</p>
                                                    </span>
                                    </div>

                                    <div class="f_item_option">
                                        <i class="fas fa-volume-down" title="Thuyết minh"></i>
                                        <i class="fas fa-comment-dots" title="VietSub"></i>
                                    </div>
                                    <div class="info">
                                        <div class="ng-binding ng-scope"><span class="f_title_vn">Biệt Đội Bất Hảo</span><span class="f_title_en">The Bad Guys: Reign of Chaos (C18)</span></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row col-md-3 f_wrapfilm thumb grid-item" data-trailer="YUTgFBJeYx0" data-index="YUTgFBJeYx0" ng-repeat="film in listShowingFilms">
                            <div class="f_film" data-slug="2237-biet-doi-bat-hao">
                                <a href="/phim/2237-biet-doi-bat-hao" title="Biệt Đội">
                                    <div class="f_filmthumbnail" style="background-image: url('https://s3img.vcdn.vn/mobile/123phim/2019/10/biet-doi-bat-hao-the-bad-guys-reign-of-chaos-c18-15711088419521_215x318.jpg')">
                                        <div class="hoverInfo showHover showingDetail" data-id="2237" data-slug="2237-biet-doi-bat-hao">
                                            <div class="icon-play"><span><i class="f-movie-icon-play"></i></span></div>
                                        </div>
                                        <span class="ng-binding ageType">C18</span>
                                        <span class="avgPoint ng-scope">
                                                      <p class="txtPoint ng-binding">130 phút</p>
                                                    </span>
                                    </div>

                                    <div class="f_item_option">
                                        <i class="fas fa-volume-down" title="Thuyết minh"></i>
                                        <i class="fas fa-comment-dots" title="VietSub"></i>
                                    </div>
                                    <div class="info">
                                        <div class="ng-binding ng-scope"><span class="f_title_vn">Biệt Đội Bất Hảo</span><span class="f_title_en">The Bad Guys: Reign of Chaos (C18)</span></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row col-md-3 f_wrapfilm thumb grid-item" data-trailer="YUTgFBJeYx0" data-index="YUTgFBJeYx0" ng-repeat="film in listShowingFilms">
                            <div class="f_film" data-slug="2237-biet-doi-bat-hao">
                                <a href="/phim/2237-biet-doi-bat-hao" title="Biệt Đội">
                                    <div class="f_filmthumbnail" style="background-image: url('https://s3img.vcdn.vn/mobile/123phim/2019/10/biet-doi-bat-hao-the-bad-guys-reign-of-chaos-c18-15711088419521_215x318.jpg')">
                                        <div class="hoverInfo showHover showingDetail" data-id="2237" data-slug="2237-biet-doi-bat-hao">
                                            <div class="icon-play"><span><i class="f-movie-icon-play"></i></span></div>
                                        </div>
                                        <span class="ng-binding ageType">C18</span>
                                        <span class="avgPoint ng-scope">
                                                      <p class="txtPoint ng-binding">130 phút</p>
                                                    </span>
                                    </div>

                                    <div class="f_item_option">
                                        <i class="fas fa-volume-down" title="Thuyết minh"></i>
                                        <i class="fas fa-comment-dots" title="VietSub"></i>
                                    </div>
                                    <div class="info">
                                        <div class="ng-binding ng-scope"><span class="f_title_vn">Biệt Đội Bất Hảo</span><span class="f_title_en">The Bad Guys: Reign of Chaos (C18)</span></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="f_block_title_a">
                    <h3 class="title mt-0">Phim cùng chuyên mục</h3>

                    <div class="f_block_item row">
                        <div class="row col-md-3 f_wrapfilm thumb grid-item" data-trailer="YUTgFBJeYx0" data-index="YUTgFBJeYx0" ng-repeat="film in listShowingFilms">
                            <div class="f_film" data-slug="2237-biet-doi-bat-hao">
                                <a href="/phim/2237-biet-doi-bat-hao" title="Biệt Đội">
                                    <div class="f_filmthumbnail" style="background-image: url('https://s3img.vcdn.vn/mobile/123phim/2019/10/biet-doi-bat-hao-the-bad-guys-reign-of-chaos-c18-15711088419521_215x318.jpg')">
                                        <div class="hoverInfo showHover showingDetail" data-id="2237" data-slug="2237-biet-doi-bat-hao">
                                            <div class="icon-play"><span><i class="f-movie-icon-play"></i></span></div>
                                        </div>
                                        <span class="ng-binding ageType">C18</span>
                                        <span class="avgPoint ng-scope">
                                                      <p class="txtPoint ng-binding">130 phút</p>
                                                    </span>
                                    </div>

                                    <div class="f_item_option">
                                        <i class="fas fa-volume-down" title="Thuyết minh"></i>
                                        <i class="fas fa-comment-dots" title="VietSub"></i>
                                    </div>
                                    <div class="info">
                                        <div class="ng-binding ng-scope"><span class="f_title_vn">Biệt Đội Bất Hảo</span><span class="f_title_en">The Bad Guys: Reign of Chaos (C18)</span></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row col-md-3 f_wrapfilm thumb grid-item" data-trailer="YUTgFBJeYx0" data-index="YUTgFBJeYx0" ng-repeat="film in listShowingFilms">
                            <div class="f_film" data-slug="2237-biet-doi-bat-hao">
                                <a href="/phim/2237-biet-doi-bat-hao" title="Biệt Đội">
                                    <div class="f_filmthumbnail" style="background-image: url('https://s3img.vcdn.vn/mobile/123phim/2019/10/biet-doi-bat-hao-the-bad-guys-reign-of-chaos-c18-15711088419521_215x318.jpg')">
                                        <div class="hoverInfo showHover showingDetail" data-id="2237" data-slug="2237-biet-doi-bat-hao">
                                            <div class="icon-play"><span><i class="f-movie-icon-play"></i></span></div>
                                        </div>
                                        <span class="ng-binding ageType">C18</span>
                                        <span class="avgPoint ng-scope">
                                                      <p class="txtPoint ng-binding">130 phút</p>
                                                    </span>
                                    </div>

                                    <div class="f_item_option">
                                        <i class="fas fa-volume-down" title="Thuyết minh"></i>
                                        <i class="fas fa-comment-dots" title="VietSub"></i>
                                    </div>
                                    <div class="info">
                                        <div class="ng-binding ng-scope"><span class="f_title_vn">Biệt Đội Bất Hảo</span><span class="f_title_en">The Bad Guys: Reign of Chaos (C18)</span></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row col-md-3 f_wrapfilm thumb grid-item" data-trailer="YUTgFBJeYx0" data-index="YUTgFBJeYx0" ng-repeat="film in listShowingFilms">
                            <div class="f_film" data-slug="2237-biet-doi-bat-hao">
                                <a href="/phim/2237-biet-doi-bat-hao" title="Biệt Đội">
                                    <div class="f_filmthumbnail" style="background-image: url('https://s3img.vcdn.vn/mobile/123phim/2019/10/biet-doi-bat-hao-the-bad-guys-reign-of-chaos-c18-15711088419521_215x318.jpg')">
                                        <div class="hoverInfo showHover showingDetail" data-id="2237" data-slug="2237-biet-doi-bat-hao">
                                            <div class="icon-play"><span><i class="f-movie-icon-play"></i></span></div>
                                        </div>
                                        <span class="ng-binding ageType">C18</span>
                                        <span class="avgPoint ng-scope">
                                                      <p class="txtPoint ng-binding">130 phút</p>
                                                    </span>
                                    </div>

                                    <div class="f_item_option">
                                        <i class="fas fa-volume-down" title="Thuyết minh"></i>
                                        <i class="fas fa-comment-dots" title="VietSub"></i>
                                    </div>
                                    <div class="info">
                                        <div class="ng-binding ng-scope"><span class="f_title_vn">Biệt Đội Bất Hảo</span><span class="f_title_en">The Bad Guys: Reign of Chaos (C18)</span></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row col-md-3 f_wrapfilm thumb grid-item" data-trailer="YUTgFBJeYx0" data-index="YUTgFBJeYx0" ng-repeat="film in listShowingFilms">
                            <div class="f_film" data-slug="2237-biet-doi-bat-hao">
                                <a href="/phim/2237-biet-doi-bat-hao" title="Biệt Đội">
                                    <div class="f_filmthumbnail" style="background-image: url('https://s3img.vcdn.vn/mobile/123phim/2019/10/biet-doi-bat-hao-the-bad-guys-reign-of-chaos-c18-15711088419521_215x318.jpg')">
                                        <div class="hoverInfo showHover showingDetail" data-id="2237" data-slug="2237-biet-doi-bat-hao">
                                            <div class="icon-play"><span><i class="f-movie-icon-play"></i></span></div>
                                        </div>
                                        <span class="ng-binding ageType">C18</span>
                                        <span class="avgPoint ng-scope">
                                                      <p class="txtPoint ng-binding">130 phút</p>
                                                    </span>
                                    </div>

                                    <div class="f_item_option">
                                        <i class="fas fa-volume-down" title="Thuyết minh"></i>
                                        <i class="fas fa-comment-dots" title="VietSub"></i>
                                    </div>
                                    <div class="info">
                                        <div class="ng-binding ng-scope"><span class="f_title_vn">Biệt Đội Bất Hảo</span><span class="f_title_en">The Bad Guys: Reign of Chaos (C18)</span></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row col-md-3 f_wrapfilm thumb grid-item" data-trailer="YUTgFBJeYx0" data-index="YUTgFBJeYx0" ng-repeat="film in listShowingFilms">
                            <div class="f_film" data-slug="2237-biet-doi-bat-hao">
                                <a href="/phim/2237-biet-doi-bat-hao" title="Biệt Đội">
                                    <div class="f_filmthumbnail" style="background-image: url('https://s3img.vcdn.vn/mobile/123phim/2019/10/biet-doi-bat-hao-the-bad-guys-reign-of-chaos-c18-15711088419521_215x318.jpg')">
                                        <div class="hoverInfo showHover showingDetail" data-id="2237" data-slug="2237-biet-doi-bat-hao">
                                            <div class="icon-play"><span><i class="f-movie-icon-play"></i></span></div>
                                        </div>
                                        <span class="ng-binding ageType">C18</span>
                                        <span class="avgPoint ng-scope">
                                                      <p class="txtPoint ng-binding">130 phút</p>
                                                    </span>
                                    </div>

                                    <div class="f_item_option">
                                        <i class="fas fa-volume-down" title="Thuyết minh"></i>
                                        <i class="fas fa-comment-dots" title="VietSub"></i>
                                    </div>
                                    <div class="info">
                                        <div class="ng-binding ng-scope"><span class="f_title_vn">Biệt Đội Bất Hảo</span><span class="f_title_en">The Bad Guys: Reign of Chaos (C18)</span></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row col-md-3 f_wrapfilm thumb grid-item" data-trailer="YUTgFBJeYx0" data-index="YUTgFBJeYx0" ng-repeat="film in listShowingFilms">
                            <div class="f_film" data-slug="2237-biet-doi-bat-hao">
                                <a href="/phim/2237-biet-doi-bat-hao" title="Biệt Đội">
                                    <div class="f_filmthumbnail" style="background-image: url('https://s3img.vcdn.vn/mobile/123phim/2019/10/biet-doi-bat-hao-the-bad-guys-reign-of-chaos-c18-15711088419521_215x318.jpg')">
                                        <div class="hoverInfo showHover showingDetail" data-id="2237" data-slug="2237-biet-doi-bat-hao">
                                            <div class="icon-play"><span><i class="f-movie-icon-play"></i></span></div>
                                        </div>
                                        <span class="ng-binding ageType">C18</span>
                                        <span class="avgPoint ng-scope">
                                                      <p class="txtPoint ng-binding">130 phút</p>
                                                    </span>
                                    </div>

                                    <div class="f_item_option">
                                        <i class="fas fa-volume-down" title="Thuyết minh"></i>
                                        <i class="fas fa-comment-dots" title="VietSub"></i>
                                    </div>
                                    <div class="info">
                                        <div class="ng-binding ng-scope"><span class="f_title_vn">Biệt Đội Bất Hảo</span><span class="f_title_en">The Bad Guys: Reign of Chaos (C18)</span></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row col-md-3 f_wrapfilm thumb grid-item" data-trailer="YUTgFBJeYx0" data-index="YUTgFBJeYx0" ng-repeat="film in listShowingFilms">
                            <div class="f_film" data-slug="2237-biet-doi-bat-hao">
                                <a href="/phim/2237-biet-doi-bat-hao" title="Biệt Đội">
                                    <div class="f_filmthumbnail" style="background-image: url('https://s3img.vcdn.vn/mobile/123phim/2019/10/biet-doi-bat-hao-the-bad-guys-reign-of-chaos-c18-15711088419521_215x318.jpg')">
                                        <div class="hoverInfo showHover showingDetail" data-id="2237" data-slug="2237-biet-doi-bat-hao">
                                            <div class="icon-play"><span><i class="f-movie-icon-play"></i></span></div>
                                        </div>
                                        <span class="ng-binding ageType">C18</span>
                                        <span class="avgPoint ng-scope">
                                                      <p class="txtPoint ng-binding">130 phút</p>
                                                    </span>
                                    </div>

                                    <div class="f_item_option">
                                        <i class="fas fa-volume-down" title="Thuyết minh"></i>
                                        <i class="fas fa-comment-dots" title="VietSub"></i>
                                    </div>
                                    <div class="info">
                                        <div class="ng-binding ng-scope"><span class="f_title_vn">Biệt Đội Bất Hảo</span><span class="f_title_en">The Bad Guys: Reign of Chaos (C18)</span></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row col-md-3 f_wrapfilm thumb grid-item" data-trailer="YUTgFBJeYx0" data-index="YUTgFBJeYx0" ng-repeat="film in listShowingFilms">
                            <div class="f_film" data-slug="2237-biet-doi-bat-hao">
                                <a href="/phim/2237-biet-doi-bat-hao" title="Biệt Đội">
                                    <div class="f_filmthumbnail" style="background-image: url('https://s3img.vcdn.vn/mobile/123phim/2019/10/biet-doi-bat-hao-the-bad-guys-reign-of-chaos-c18-15711088419521_215x318.jpg')">
                                        <div class="hoverInfo showHover showingDetail" data-id="2237" data-slug="2237-biet-doi-bat-hao">
                                            <div class="icon-play"><span><i class="f-movie-icon-play"></i></span></div>
                                        </div>
                                        <span class="ng-binding ageType">C18</span>
                                        <span class="avgPoint ng-scope">
                                                      <p class="txtPoint ng-binding">130 phút</p>
                                                    </span>
                                    </div>

                                    <div class="f_item_option">
                                        <i class="fas fa-volume-down" title="Thuyết minh"></i>
                                        <i class="fas fa-comment-dots" title="VietSub"></i>
                                    </div>
                                    <div class="info">
                                        <div class="ng-binding ng-scope"><span class="f_title_vn">Biệt Đội Bất Hảo</span><span class="f_title_en">The Bad Guys: Reign of Chaos (C18)</span></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="f_block_tags_split">
                    <h4>
                        <div>Running Man trọn bộ, Running Man Vietsub, Running Man tập cuối, Running Man Vietsub thuyết minh, Running Man lồng tiếng, Running Man Full hd, Running Man bản đẹp, Hậu trường Running Man, trailer Running Man, Running Man phụ đề Xem phim Running Man, Running Man 2010, Running Man tập mới, Running Man phần mới, Running Man phụ đề, Running Man 2010, Running Man Hàn Quốc, Running Man Hàn Quốc, , phim Running Man Hàn Quốc, Running Man Hàn Quốc 2010, Hàn Quốc 2010, phim Hàn Quốc năm 2010, Running Man 350/400</div>
                        <div class="morehidden">tập 1,  tập 2,  tập 3,  tập 4,  tập 5,  tập 6,  tập 7,  tập 8,  tập 9,  tập 10,  tập 11,  tập 12,  tập 13,  tập 14,  tập 15,  tập 16,  tập 17,  tập 18,  tập 19,  tập 20,  tập 21,  tập 22,  tập 23,  tập 24,  tập 25,  tập 26,  tập 27,  tập 28,  tập 29,  tập 30,  tập 31,  tập 32,  tập 33,  tập 34,  tập 35,  tập 36,  tập 37,  tập 38,  tập 39,  tập 40,  tập 41,  tập 42,  tập 43,  tập 44,  tập 45,  tập 46,  tập 47,  tập 48,  tập 49,  tập 50,  tập 51,  tập 52,  tập 53,  tập 54,  tập 55,  tập 56,  tập 57,  tập 58,  tập 59,  tập 60,  tập 61,  tập 62,  tập 63,  tập 64,  tập 65,  tập 66,  tập 67,  tập 68,  tập 69,  tập 70,  tập 71,  tập 72,  tập 73,  tập 74,  tập 75,  tập 76,  tập 77,  tập 78,  tập 79,  tập 80,  tập 81,  tập 82,  tập 83,  tập 84,  tập 85,  tập 86,  tập 87,  tập 88,  tập 89,  tập 90,  tập 91,  tập 92,  tập 93,  tập 94,  tập 95,  tập 96,  tập 97,  tập 98,  tập 99,  tập 100,  tập 101,  tập 102,  tập 103,  tập 104,  tập 105,  tập 106,  tập 107,  tập 108,  tập 109,  tập 110,  tập 111,  tập 112,  tập 113,  tập 114,  tập 115,  tập 116,  tập 117,  tập 118,  tập 119,  tập 120,  tập 121,  tập 122,  tập 123,  tập 124,  tập 125,  tập 126,  tập 127,  tập 128,  tập 129,  tập 130,  tập 131,  tập 132,  tập 133,  tập 134,  tập 135,  tập 136,  tập 137,  tập 138,  tập 139,  tập 140,  tập 141,  tập 142,  tập 143,  tập 144,  tập 145,  tập 146,  tập 147,  tập 148,  tập 149,  tập 150,  tập 151,  tập 152,  tập 153,  tập 154,  tập 155,  tập 156,  tập 157,  tập 158,  tập 159,  tập 160,  tập 161,  tập 162,  tập 163,  tập 164,  tập 165,  tập 166,  tập 167,  tập 168,  tập 169,  tập 170,  tập 171,  tập 172,  tập 173,  tập 174,  tập 175,  tập 176,  tập 177,  tập 178,  tập 179,  tập 180,  tập 181,  tập 182,  tập 183,  tập 184,  tập 185,  tập 186,  tập 187,  tập 188,  tập 189,  tập 190,  tập 191,  tập 192,  tập 193,  tập 194,  tập 195,  tập 196,  tập 197,  tập 198,  tập 199,  tập 200,  tập 201,  tập 202,  tập 203,  tập 204,  tập 205,  tập 206,  tập 207,  tập 208,  tập 209,  tập 210,  tập 211,  tập 212,  tập 213,  tập 214,  tập 215,  tập 216,  tập 217,  tập 218,  tập 219,  tập 220,  tập 221,  tập 222,  tập 223,  tập 224,  tập 225,  tập 226,  tập 227,  tập 228,  tập 229,  tập 230,  tập 231,  tập 232,  tập 233,  tập 234,  tập 235,  tập 236,  tập 237,  tập 238,  tập 239,  tập 240,  tập 241,  tập 242,  tập 243,  tập 244,  tập 245,  tập 246,  tập 247,  tập 248,  tập 249,  tập 250,  tập 251,  tập 252,  tập 253,  tập 254,  tập 255,  tập 256,  tập 257,  tập 258,  tập 259,  tập 260,  tập 261,  tập 262,  tập 263,  tập 264,  tập 265,  tập 266,  tập 267,  tập 268,  tập 269,  tập 270,  tập 271,  tập 272,  tập 273,  tập 274,  tập 275,  tập 276,  tập 277,  tập 278,  tập 279,  tập 280,  tập 281,  tập 282,  tập 283,  tập 284,  tập 285,  tập 286,  tập 287,  tập 288,  tập 289,  tập 290,  tập 291,  tập 292,  tập 293,  tập 294,  tập 295,  tập 296,  tập 297,  tập 298,  tập 299,  tập 300,  tập 301,  tập 302,  tập 303,  tập 304,  tập 305,  tập 306,  tập 307,  tập 308,  tập 309,  tập 310,  tập 311,  tập 312,  tập 313,  tập 314,  tập 315,  tập 316,  tập 317,  tập 318,  tập 319,  tập 320,  tập 321,  tập 322,  tập 323,  tập 324,  tập 325,  tập 326,  tập 327,  tập 328,  tập 329,  tập 330,  tập 331,  tập 332,  tập 333,  tập 334,  tập 335,  tập 336,  tập 337,  tập 338,  tập 339,  tập 340,  tập 341,  tập 342,  tập 343,  tập 344,  tập 345,  tập 346,  tập 347,  tập 348,  tập 349,  tập 350,  tập 351,  tập 352,  tập 353,  tập 354,  tập 355,  tập 356,  tập 357,  tập 358,  tập 359,  tập 360,  tập 361,  tập 362,  tập 363,  tập 364,  tập 365,  tập 366,  tập 367,  tập 368,  tập 369,  tập 370,  tập 371,  tập 372,  tập 373,  tập 374,  tập 375,  tập 376,  tập 377,  tập 378,  tập 379,  tập 380,  tập 381,  tập 382,  tập 383,  tập 384,  tập 385,  tập 386,  tập 387,  tập 388,  tập 389,  tập 390,  tập 391,  tập 392,  tập 393,  tập 394,  tập 395,  tập 396,  tập 397,  tập 398,  tập 399,  tập 400</div>
                        <a href="#" class="showmore">Show More</a>
                    </h4>
                </div>

            </div>

            <div class="f_block-right float-left ml-3">
                <div class="block-item sidebar">

                    <div class="widget">
                        <span class="title">Phim sắp chiếu/ Trailer</span>
                        <div class="f_block">
                            <ol class="f_item_film">
                                <li>
                                    <div class="f_item_l">
                                        <div class="f_item_option">
                                            <i class="fas fa-volume-down" title="Thuyết minh"></i>
                                            <i class="fas fa-comment-dots" title="VietSub"></i>
                                        </div>


                                        <a href="http://google.com" title="Hảo hữu">
                                            <img src="data/images/su-menh-trai-tim-su-menh-trai-tim-2016-wall-thumb.jpg">

                                            <div class="info">
                                                <div class="ng-binding ng-scope">
                                                    <span class="f_title_vn">Biệt Đội Bất Hảo</span><span class="f_title_en">The Bad Guys: Reign of Chaos (C18)</span>
                                                </div>
                                            </div>

                                        </a>
                                        <span class="ng-binding ageType">C18</span>
                                        <span class="avgPoint ng-scope">
                                                  <p class="txtPoint ng-binding">180 phút</p>
                                                </span>
                                    </div>
                                </li>
                                <li>
                                    <a href="phim-/_/xem-phim/" title="nắm" class="font name">
                                        <div class="f_thumb">
                                            <img src="data/images/phim-pha-an-trung-quoc-2.png" alt="Sut">

                                            <span class="label-range">2</span>
                                        </div>
                                        <div class="f_detail">
                                            <p>Sút</p>Sut
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="phim-/_/xem-phim/" title="nắm" class="font name">
                                        <div class="f_thumb">
                                            <img src="data/images/phim-pha-an-trung-quoc-2.png" alt="Sut">
                                            <span class="label-range">3</span>
                                        </div>
                                        <div class="f_detail">
                                            <p>Cuộc Chiến Chống Tham Nhũng Phần 2</p>Z Storm II
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="phim-/_/xem-phim/" title="nắm" class="font name">
                                        <div class="f_thumb">
                                            <img src="data/images/phim-pha-an-trung-quoc-2.png" alt="Sut">
                                            <span class="label-range">4</span>
                                        </div>
                                        <div class="f_detail">
                                            <p>Cuộc Chiến Chống Tham Nhũng Phần 2</p>Z Storm II
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="phim-/_/xem-phim/" title="nắm" class="font name">
                                        <div class="f_thumb">
                                            <img src="data/images/phim-pha-an-trung-quoc-2.png" alt="Sut">
                                            <span class="label-range">5</span>
                                        </div>
                                        <div class="f_detail">
                                            <p>Cuộc Chiến Chống Tham Nhũng Phần 2</p>Z Storm II
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="phim-/_/xem-phim/" title="nắm" class="font name">
                                        <div class="f_thumb">
                                            <img src="data/images/phim-pha-an-trung-quoc-2.png" alt="Sut">
                                            <span class="label-range">6</span>
                                        </div>
                                        <div class="f_detail">
                                            <p>Cuộc Chiến Chống Tham Nhũng Phần 2</p>Z Storm II
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="phim-/_/xem-phim/" title="nắm" class="font name">
                                        <div class="f_thumb">
                                            <img src="data/images/phim-pha-an-trung-quoc-2.png" alt="Sut">
                                            <span class="label-range">7</span>
                                        </div>
                                        <div class="f_detail">
                                            <p>Cuộc Chiến Chống Tham Nhũng Phần 2</p>Z Storm II
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="phim-/_/xem-phim/" title="nắm" class="font name">
                                        <div class="f_thumb">
                                            <img src="data/images/phim-pha-an-trung-quoc-2.png" alt="Sut">
                                            <span class="label-range">8</span>
                                        </div>
                                        <div class="f_detail">
                                            <p>Cuộc Chiến Chống Tham Nhũng Phần 2</p>Z Storm II
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="phim-/_/xem-phim/" title="nắm" class="font name">
                                        <div class="f_thumb">
                                            <img src="data/images/phim-pha-an-trung-quoc-2.png" alt="Sut">
                                            <span class="label-range">9</span>
                                        </div>
                                        <div class="f_detail">
                                            <p>Cuộc Chiến Chống Tham Nhũng Phần 2</p>Z Storm II
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="phim-/_/xem-phim/" title="nắm" class="font name">
                                        <div class="f_thumb">
                                            <img src="data/images/phim-pha-an-trung-quoc-2.png" alt="Sut">
                                            <span class="label-range">10</span>
                                        </div>
                                        <div class="f_detail">
                                            <p>Cuộc Chiến Chống Tham Nhũng Phần 2</p>Z Storm II
                                        </div>
                                    </a>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <div class="widget">

                        <span class="title float-left">Phim lẻ</span>
                        <div class="f_block float-left f_itemf">
                            <ul class="nav" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="day-tab" data-toggle="tab" href="#day" role="tab" aria-controls="day" aria-selected="true">Ngày</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="week-tab" data-toggle="tab" href="#week" role="tab" aria-controls="week" aria-selected="false">Tuần</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="month-tab" data-toggle="tab" href="#month" role="tab" aria-controls="month" aria-selected="false">Tháng</a>
                                </li>
                            </ul>

                        </div>
                        <div class="float-left tab-content">
                            <div class="tab-pane fade show active" id="day" role="tabpanel" aria-labelledby="day-tab">
                                <ol class="f_item_film">
                                    <li>
                                        <a href="phim-/_/xem-phim/" title="dsadsd" class="font name">
                                            <div class="f_thumb">
                                                <img src="data/images/phim-pha-an-trung-quoc-2.png" alt="Sut">
                                            </div>
                                            <div class="f_detail">
                                                <p>Sút</p>Sut
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="phim-/_/xem-phim/" title="dsadsd" class="font name">
                                            <div class="f_thumb">
                                                <img src="data/images/phim-pha-an-trung-quoc-2.png" alt="Sut">
                                            </div>
                                            <div class="f_detail">
                                                <p>Sút</p>Sut
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="phim-/_/xem-phim/" title="dsadsd" class="font name">
                                            <div class="f_thumb">
                                                <img src="data/images/phim-pha-an-trung-quoc-2.png" alt="Sut">
                                            </div>
                                            <div class="f_detail">
                                                <p>Sút</p>Sut
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="phim-/_/xem-phim/" title="dsadsd" class="font name">
                                            <div class="f_thumb">
                                                <img src="data/images/phim-pha-an-trung-quoc-2.png" alt="Sut">
                                            </div>
                                            <div class="f_detail">
                                                <p>Sút</p>Sut
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="phim-/_/xem-phim/" title="dsadsd" class="font name">
                                            <div class="f_thumb">
                                                <img src="data/images/phim-pha-an-trung-quoc-2.png" alt="Sut">
                                            </div>
                                            <div class="f_detail">
                                                <p>Sút</p>Sut
                                            </div>
                                        </a>
                                    </li>

                                </ol>
                            </div>
                            <div class="tab-pane fade" id="week" role="tabpanel" aria-labelledby="week-tab">ccc</div>
                            <div class="tab-pane fade" id="month" role="tabpanel" aria-labelledby="month-tab">bbb</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
<!-- END: film -->