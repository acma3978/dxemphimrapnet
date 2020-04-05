<?php defined('SYSPATH') or die('No direct script access.'); ?>

<!-- BEGIN: list_film -->


    <div id="typeFilm" class="clear">
        <div class="tabs" data-target="#listFilmSub">
            <span class="icon videox"></span>
            <div class="tab active" data-name="phim_le_moi_cap_nhat">Phim bộ mới</div>
            <div class="tab" data-name="phim-bo-full">Phim bộ hoàn thành</div>
            <div class="tab" data-name="phim-bo-moi">Đài truyền hình</div>
        </div>

                    <span class="list-style-buttons">
                        <a href="#" id="gridview" class="gridx icon switcher active"></a>
                        <a href="#" id="listview" class="gridx icon switcher"></a>
			        </span>
        <ul id="sub-title" class="clearfix">
            <li>Tên Phim</li>
            <li class="timeM-grid" style="margin-left:327px">Thời gian</li>
            <li class="viewsM-grid" style="margin-left:57px">Lượt xem</li>
            <li class="filmIdM-grid" style="margin-left:76px">Tập</li>
            <li class="filmIdM-grid" style="margin-left:76px">Năm</li>
            <li class="filmIdM-grid" style="margin-left:76px">Chuyên mục</li>
        </ul>
        <div id="listFilmSub">

            <div class="list tab phim_le_moi_cap_nhat">
                <div id="primary-nav">
                    <c:each from="$phim_le_moi_cap_nhat" value="$film">
                        <div class="row" style="margin:0">
                            <div class="" style="text-align:left">
                                <a href="{$film.link}" title="{$film.title}">
                                    <div class="FmetaM">
                                                <span class="name-vn link">
                                                    {$film.short_title_sub}
                                                </span>
                                                <span class="name-en link">
                                                    {$film.short_title_o_sub}
                                                </span>
                                    </div>
                                </a>
                            </div>
                            <div class="colz-row-md-2 timedx-grid">{$film.date_format}</div>
                            <div class="colz-row-md-2 viewdx-grid">{$film.views_format}</div>
                            <div class="colz-row-md-2 statusx-grid">{$film.status}</div>
                        </div>
                    </c:each>
                </div>
            </div>

            <div class="list tab phim-bo-moi hide">
                <div id="secondary-nav">
                    <c:each from="$phim_bo_moi" value="$film">
                        <div class="row" style="margin:0">
                            <div class="" style="text-align:left">
                                <a href="{$film.link}" title="{$film.title}">

                                    <div class="FmetaM">
                                                <span class="name-vn link">
                                                    {$film.short_title_sub}
                                                </span>
                                                <span class="name-en link">
                                                    {$film.short_title_o_sub}
                                                </span>
                                    </div>
                                </a>
                            </div>
                            <div class="colz-row-md-2 timedx-grid">{$film.date_format}</div>
                            <div class="colz-row-md-2 viewdx-grid">{$film.views_format}</div>
                            <div class="colz-row-md-2 statusx-grid">{$film.status}</div>

                        </div>
                    </c:each>
                </div>
            </div>

            <div class="list tab phim-bo-full hide">
                <div id="third-nav">
                    <c:each from="$phim_bo_full" value="$film">
                        <div class="row" style="margin:0">
                            <div class="" style="text-align:left">
                                <a href="{$film.link}" title="{$film.title}">

                                    <div class="FmetaM">
                                                <span class="name-vn link">
                                                    {$film.short_title_sub}
                                                </span>
                                                <span class="name-en link">
                                                    {$film.short_title_o_sub}
                                                </span>
                                    </div>
                                </a>
                            </div>
                            <div class="colz-row-md-2 timedx-grid">{$film.date_format}</div>
                            <div class="colz-row-md-2 viewdx-grid">{$film.views_format}</div>
                            <div class="colz-row-md-2 statusx-grid">{$film.status}</div>
                        </div>
                    </c:each>
                </div>
            </div>
        </div>
    </div>

<!-- END: list_film -->