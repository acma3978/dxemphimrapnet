<?php defined('SYSPATH') or die('No direct script access.'); ?>

<!-- BEGIN: watch -->
<div id="f_top_movie_list">

    <div class="f_block_film f_block_player">
        <div class="movie-banner" style="background:url(data/images/108-hung-than-ac-sat-the-prince-and-the-108-demons-2015-wall.jpg) center center fixed;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;"></div>
    </div>

    <div class="container">
        <div class="position-relative">
            <div class="f_block_film_title f_block_box_player">
                <div class="block-info-c">

                    <div id="f_box_player">
                        <div id="f_block_button_watch">
                            <span class="btn btn-success"><i class="fas fa-heart"></i>Thích</span>
                            <span class="btn btn-success"><i class="fas fa-bell"></i>Theo dỗi</span>
                            <span class="btn btn-success"><i class="fas fa-window-close"></i>Tắt quảng cáo</span>
                            <span class="btn btn-success"><i class="fas fa-fast-forward"></i>Tự động chuyển tập: <strong class="text-danger">ON</strong></span>

                            <span class="btn btn-success"><i class="fas fa-step-forward"></i>Tập kế tiếp</span>
                            <span class="btn btn-success"><i class="fas fa-camera-retro"></i>Lưu ảnh</span>
                            <span class="btn btn-success"><i class="fas fa-lightbulb"></i>Tắt đèn</span>
                        </div>

                    </div>

                </div>
                <div id="f_block_episode">
                    <div class="f_tabs">
                        <div class="container">
                            <div class="row">
                                <div class="float-left col-md-2 pr-0">
                                    <ul class="nav nav-pills nav-stacked flex-column">
                                        <li class="active"><i class="f_icon dd-icon i-server"></i><a href="#server" data-toggle="pill">Server <span>VIP</span></a></li>
                                        <li><i class="f_icon dd-icon i-server"></i><a href="#server2" data-toggle="pill">Server <span>VIP 2</span></a></li>
                                        <li><i class="f_icon dd-icon i-server"></i><a href="#server3" data-toggle="pill">Server <span>VIP 3</span></a></li>
                                    </ul>
                                </div>
                                <div class="float-left col-md-10">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="server">
                                            <div class="pagination pagination-sm ">
                                                <a class="page-link" href="#">1</a>
                                                <a class="page-link" href="#">2</a>
                                                <a class="page-link" href="#">3</a>
                                                <a class="page-link" href="#">4</a>
                                                <a class="page-link" href="#">5</a>
                                                <a class="page-link" href="#">6</a>
                                                <a class="page-link" href="#">7</a>
                                                <a class="page-link" href="#">8</a>
                                                <a class="page-link" href="#">9</a>
                                                <a class="page-link" href="#">10</a>
                                                <a class="page-link" href="#">11</a>
                                                <a class="page-link" href="#">12</a>
                                                <a class="page-link" href="#">13</a>
                                                <a class="page-link" href="#">14</a>
                                                <a class="page-link" href="#">15</a>
                                                <a class="page-link" href="#">16</a>
                                                <a class="page-link" href="#">17</a>
                                                <a class="page-link" href="#">18</a>
                                                <a class="page-link" href="#">19</a>
                                                <a class="page-link" href="#">20</a>
                                                <a class="page-link" href="#">21</a>
                                                <a class="page-link" href="#">22</a>
                                                <a class="page-link" href="#">23</a>
                                                <a class="page-link" href="#">24</a>
                                                <a class="page-link" href="#">25</a>
                                                <a class="page-link" href="#">26</a>
                                                <a class="page-link" href="#">27</a>
                                                <a class="page-link" href="#">28</a>
                                                <a class="page-link" href="#">29</a>
                                                <a class="page-link" href="#">30-End</a>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="server2">
                                            <div class="pagination pagination-sm">
                                                <a class="page-link" href="#">FULL</a>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="server3">
                                            <div class="pagination pagination-sm">
                                                <a class="page-link" href="#">1-A</a>
                                                <a class="page-link" href="#">1-B</a>
                                                <a class="page-link" href="#">1-C</a>

                                                <a class="page-link" href="#">2-A</a>
                                                <a class="page-link" href="#">2-B</a>
                                                <a class="page-link" href="#">2-C</a>

                                                <a class="page-link" href="#">3-A</a>
                                                <a class="page-link" href="#">3-B</a>
                                                <a class="page-link" href="#">3-C</a>

                                                <a class="page-link" href="#">4-A</a>
                                                <a class="page-link" href="#">4-B</a>
                                                <a class="page-link" href="#">4-C</a>

                                                <a class="page-link" href="#">5-A</a>
                                                <a class="page-link" href="#">5-B</a>
                                                <a class="page-link" href="#">5-C End</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
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

                <div class="f_block_film_poster">

                    <div class="col-md-3 float-left block-film-poster p-0">
                        <div class="image-banner" style="background:#e1e1e1 url('data/images/demaitinh.jpg');background-size:cover;height: 100%"></div>

                        <div class="box-bookmark" data-filmid="9571"><i class="f_icon dd-icon i-bookmark"></i>
                            <div class="add-bookmark">Đánh dấu</div>
                        </div>

                        <ul class="btn-block">
                            <li class="item"><a data-target="#pop-trailer" class="btn btn-warning btn-trailer" title="Trailer phim Cơn Lóc Hận Thù"> Trailer</a></li>
                        </ul>
                    </div>

                    <div class="col-md-9 f_block_content_m float-left p-1">
                        {$filminfo.pagetext}
                    </div>
                    <div class="float-left col-md-9 f_block_panel_t">
                        <ol>
                            <li><i class="f_icon dd-icon i-status"></i> Trạng thái: 16/16</li>
                            <li><i class="f_icon dd-icon i-year"></i> Năm: 2019</li>
                            <li><i class="f_icon dd-icon i-country"></i> Quốc gia: Hàn Quốc</li>
                            <li><i class="f_icon dd-icon i-views"></i>12000</li>
                        </ol>
                    </div>
                    <div class="clearfix"></div>

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
                        <span>Hãy để lại cảm nhận của bộ phim <strong>Running Man</strong></span>
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
<!-- END: watch -->