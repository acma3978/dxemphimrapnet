<?php defined('SYSPATH') or die('No direct script access.'); ?>

<!-- BEGIN: carousel -->
<c:if is="$route_name == 'home'">
<!--   <div class="block-title-top">-->
<!--      <div class="stars"> <i></i> <i></i> <i></i> <span class="hidden-xs"><i></i> <i></i></span> </div>-->
<!--      <div class="title-film-hot">Phim hay nhất</div>-->
<!--      <div class="stars"> <i></i> <i></i> <i></i> <span class="hidden-xs"><i></i> <i></i></span> </div>-->
<!--   </div>-->

    <div id="f_top_movie_list" class="container">

        <nav id="demo" class="carousel slide f_block_carousel_hot_film row" data-ride="carousel">

            <!-- The slideshow -->
            <div class="carousel-inner no-padding row">

                <div class="carousel-item active">

                    <c:each from="{$phim_hot.top}" key="$key" value="$film">

                        <div class="f_item">
                            <a href="{$film.link}" title="{$film.title}">
                                <div class="f_filmthumb" style="background-image: url('./data/images/275x385.jpg'); width: 100%;height: 100%">
                                    <div class="hoverInfo showHover showingDetail" data-id="2237" data-slug="2237-biet-doi-bat-hao">
                                        <div class="icon-play"><span><i class="f-movie-icon-play"></i></span></div>
                                    </div>
                                    <span class="ng-binding ageType">C18</span>
                                    <span class="avgPoint ng-scope"><p class="txtPoint ng-binding">110 phút</p></span>
                                </div>
                            </a>
                            <div class="f_item_option">
                                <i class="fas fa-volume-down" title="Thuyết minh"></i>
                                <i class="fas fa-comment-dots" title="VietSub"></i>
                            </div>
                            <div class="info">
                                <div class="ng-binding ng-scope">
                                    <a href="{$film.link}" title="{$film.title}"><span class="f_title_vn">{$film.title}</span> <span class="f_title_en">{$film.title_o}</span></a>
                                </div>
                            </div>
                        </div>

                    </c:each>
                </div>
                <div class="carousel-item">
                <c:each from="{$phim_hot.last}" key="$key" value="$film">


                        <div class="f_item">
                            <a href="{$film.link}" title="{$film.title}">
                                <div class="f_filmthumb" style="background-image: url('./data/images/275x385.jpg')">
                                    <div class="hoverInfo showHover showingDetail" data-id="2237" data-slug="2237-biet-doi-bat-hao">
                                        <div class="icon-play"><span><i class="f-movie-icon-play"></i></span></div>
                                    </div>
                                    <span class="ng-binding ageType">VietSub</span>
                                    <span class="avgPoint ng-scope"><p class="txtPoint ng-binding">90 phút</p></span>
                                </div>
                            </a>
                            <div class="info">
                                <div class="ng-binding ng-scope">
                                    <a href="{$film.link}" title="{$film.title}"><span class="f_title_vn">{$film.title}</span><span class="f_title_en">{$film.title_o}</span></a>
                                </div>
                            </div>
                        </div>

                </c:each>
                </div>


            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </nav>

    </div>

        <div class="container list-film top-movie-list">

      <nav class="owl-carousel owl-theme">



      </nav>

   </div>
</c:if>
<!-- END: carousel -->