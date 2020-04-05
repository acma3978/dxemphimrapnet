<?php defined('SYSPATH') or die('No direct script access.'); ?>

<!-- BEGIN: list-film-wrapper -->
<div class="list-film-wrapper">
    <div class="container bg-list-item clearfix">


        <div class="col-countr x42x6C">
            <div class="title-list-item">Phim việt nam</div>
            <a title="Xem thêm" class="ViewMore" href="quoc-gia/phim-viet-nam/">Xem thêm</a>

            <div class="x66x69">
                <ul class="x4Cx69">
                    <c:each from="$phim_viet_nam" value="$film">
                        <li>
                            <a href="{$film.link}" title="{$film.title}">
                                <span class="episode">{$film.status}</span>
                                <i class="iarrow icon"></i><span>[{$film.year}] {$film.title}</span>
                            </a>
                        </li>
                    </c:each>
                </ul>
            </div>
        </div>


        <div class="col-countr x42x6C">
            <div class="title-list-item">Phim hàn quốc</div>
            <a title="Xem thêm" class="ViewMore" href="quoc-gia/phim-han-quoc/">Xem thêm</a>

            <div class="x66x69">
                <ul class="x4Cx69">
                    <c:each from="$phim_han_quoc" value="$film">
                        <li>
                            <a href="{$film.link}" title="{$film.title}">
                                <span class="episode">{$film.status}</span>
                                <i class="iarrow icon"></i><span>[{$film.year}] {$film.title}</span>
                            </a>
                        </li>
                    </c:each>
                </ul>
            </div>
        </div>

        <div class="col-countr x42x6C">
            <div class="title-list-item">Phim trung quốc</div>
            <a title="Xem thêm" class="ViewMore" href="quoc-gia/phim-trung-quoc/">Xem thêm</a>

            <div class="x66x69">
                <ul class="x4Cx69">
                    <c:each from="$phim_trung_quoc" value="$film">
                        <li>
                            <a href="{$film.link}" title="{$film.title}">
                                <span class="episode">{$film.status}</span>
                                <i class="iarrow icon"></i><span>[{$film.year}] {$film.title}</span>
                            </a>
                        </li>
                    </c:each>
                </ul>
            </div>
        </div>
        <div class="col-countr x42x6C">
            <div class="title-list-item">Phim mỹ</div>
            <a title="Xem thêm" class="ViewMore" href="quoc-gia/phim-my/">Xem thêm</a>

            <div class="x66x69">
                <ul class="x4Cx69">
                    <c:each from="$phim_my" value="$film">
                        <li>
                            <a href="{$film.link}" title="{$film.title}">
                                <span class="episode">{$film.status}</span>
                                <i class="iarrow icon"></i><span>[{$film.year}] {$film.title}</span>
                            </a>
                        </li>
                    </c:each>
                </ul>
            </div>
        </div>

    </div>
</div>
<!-- END: list-film-wrapper -->