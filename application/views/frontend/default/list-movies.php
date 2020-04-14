<?php defined('SYSPATH') or die('No direct script access.'); ?>

<!-- BEGIN: list-movies -->

</div>

<main class="body-wrap clearfix">

<div id="f_movie_list">
    <div class="container">
        <div id="f_block_movie_list">

            <div class="jkr1">

                <div class="f_title_list_item">Phim việt nam</div><a title="Xem thêm" class="f_icon dd-icon f_viewmore" href="quoc-gia/phim-viet-nam/">Xem thêm</a>

                <ul class="jkrelli">

                    <c:each from="$phim_viet_nam" value="$film">
                        <li>
                            <a href="{$film.link}" title="{$film.title}">
                                <span class="episode">{$film.status}</span>
                                <i class="iarrow icon"></i>
                                <span><i>[{$film.year}]</i> {$film.title}</span>
                            </a>
                        </li>
                    </c:each>

                </ul>
            </div>

            <div class="jkr1"><div class="f_title_list_item">Phim hàn quốc</div><a title="Xem thêm" class="f_icon dd-icon f_viewmore" href="quoc-gia/phim-han-quoc/">Xem thêm</a>

                <ul class="jkrelli">

                    <c:each from="$phim_han_quoc" value="$film">
                        <li>
                            <a href="{$film.link}" title="{$film.title}">
                                <span class="episode">{$film.status}</span>
                                <i class="iarrow icon"></i>
                                <span><i>[{$film.year}]</i> {$film.title}</span>
                            </a>
                        </li>
                    </c:each>

                </ul>
            </div>

            <div class="jkr1"><div class="f_title_list_item">Phim trung quốc</div><a title="Xem thêm" class="f_icon dd-icon f_viewmore" href="quoc-gia/phim-trung-quoc/">Xem thêm</a>

                <ul class="jkrelli">

                    <c:each from="$phim_trung_quoc" value="$film">
                        <li>
                            <a href="{$film.link}" title="{$film.title}">
                                <span class="episode">{$film.status}</span>
                                <i class="iarrow icon"></i>
                                <span><i>[{$film.year}]</i> {$film.title}</span>
                            </a>
                        </li>
                    </c:each>

                </ul>
            </div>

            <div class="jkr1"><div class="f_title_list_item">Phim mỹ</div><a title="Xem thêm" class="f_icon dd-icon f_viewmore" href="quoc-gia/phim-my/">Xem thêm</a>

                <ul class="jkrelli">

                    <c:each from="$phim_my" value="$film">
                        <li>
                            <a href="{$film.link}" title="{$film.title}">
                                <span class="episode">{$film.status}</span>
                                <i class="iarrow icon"></i>
                                <span><i>[{$film.year}]</i> {$film.title}</span>
                            </a>
                        </li>
                    </c:each>

                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</div>

<!-- END: list-movies -->