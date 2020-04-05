<?php defined('SYSPATH') or die('No direct script access.'); ?>

<!-- BEGIN: carousel -->
<div class="movie-hot">
    <div class="list_carousel">
        <div class="caroufredsel_wrapper clear">

            <ul id="movie-carousel-top">
                <c:each from="$phim_moi_cap_nhat" value="$film">
                    <li>
                        <a href="{$film.link}" title="Phim {$film.title} - {$film.title_o}">
                            <div class="movie-carousel-top-item">
                                <c:if is="{$film.image_url} != NULL">
                                    <img src="{$cache_link_img}{$film.image_url}" alt="{$film.title}" />
                                    <c:else />
                                    <img src="{$cache_link_img}{$film.image_url_o}" alt="{$film.title}" />
                                </c:if>

                                <div class="movie-carousel-top-item-meta">
                                    <c:if is="{$film.status}">
                                        <i class="status">{$film.status}</i>
                                    </c:if>
                                    <strong>
                                        <span class="nameV">{$film.title} ({$film.year})</span>
                                        <span class="nameE">{$film.title_o}</span>
                                    </strong>
                                </div>

                            </div><!--end.movie-carousel-top-item-->
                        </a>
                    </li>
                </c:each>
            </ul>
        </div>

        <a id="prevTop" class="prev" rel="nofollow" style="display: block;">
            <span class="icon arrow arrow-left"></span>
        </a>
        <a id="nextTop" class="next" rel="nofollow" style="display: block;">
            <span class="icon arrow arrow-right"></span>
        </a>
    </div>
<!-- END: carousel -->