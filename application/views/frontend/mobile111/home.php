<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!-- BEGIN: home -->

<!-- Main content -->
<section class="content">

    <div class="blocktitle title-ik clearfix">
        <div class="main-title title-ik-items">
            <p>Phim chiếu rạp mới nhất</p>
            <span>Cập nhật phim mới hôm nay</span>
        </div>
    </div>

    <div class="list-item row">
        <c:each from="$phim_chieu_rap_hot" value="$film">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box">
                    <div class="m-item-box inner">

                        <a href="{$film.link}" title="{$film.title}">
                            <c:if is="{$film.image_url} != NULL">
                                <img src="{$cache_link_img}{$film.image_url}" alt="{$film.title}">
                                <c:else />
                                <img src="{$cache_link_img}{$film.image_url_o}" alt="{$film.title}">
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

    <div class="blocktitle title-ik clearfix">
        <div class="main-title title-ik-items">
            <p>Phim lẻ mới cập nhật</p>
            <span>Cập nhật phim mới hôm nay</span>
        </div>
    </div>

    <div class="list-item row">
        <c:each from="$phim_le_moi_cap_nhat" value="$film">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box">
                    <div class="m-item-box inner">

                        <a href="{$film.link}" title="{$film.title}">
                            <c:if is="{$film.image_url} != NULL">
                                <img src="{$cache_link_img}{$film.image_url}" alt="{$film.title}">
                                <c:else />
                                <img src="{$cache_link_img}{$film.image_url_o}" alt="{$film.title}">
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

    <div class="blocktitle title-ik clearfix">
        <div class="main-title title-ik-items">
            <p>Phim bộ mới cập nhật</p>
            <span>Cập nhật phim mới hôm nay</span>
        </div>
    </div>

    <div class="list-item row">
        <c:each from="$phim_bo_moi_cap_nhat" value="$film">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box">
                    <div class="m-item-box inner">

                        <a href="{$film.link}" title="{$film.title}">
                            <c:if is="{$film.image_url} != NULL">
                                <img src="{$cache_link_img}{$film.image_url}" alt="{$film.title}">
                                <c:else />
                                <img src="{$cache_link_img}{$film.image_url_o}" alt="{$film.title}">
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

    <div class="blocktitle title-ik clearfix">
        <div class="main-title title-ik-items">
            <p>Phim võ thuật</p>
            <span>Cập nhật phim mới hôm nay</span>
        </div>
    </div>

    <div class="list-item row">
        <c:each from="$phim_vo_thuat" value="$film">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box">
                    <div class="m-item-box inner">

                        <a href="{$film.link}" title="{$film.title}">
                            <c:if is="{$film.image_url} != NULL">
                                <img src="{$cache_link_img}{$film.image_url}" alt="{$film.title}">
                                <c:else />
                                <img src="{$cache_link_img}{$film.image_url_o}" alt="{$film.title}">
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

    <div class="blocktitle title-ik clearfix">
        <div class="main-title title-ik-items">
            <p>Phim kinh dị</p>
            <span>Cập nhật phim mới hôm nay</span>
        </div>
    </div>

    <div class="list-item row">
        <c:each from="$phim_kinh_di" value="$film">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box">
                    <div class="m-item-box inner">

                        <a href="{$film.link}" title="{$film.title}">
                            <c:if is="{$film.image_url} != NULL">
                                <img src="{$cache_link_img}{$film.image_url}" alt="{$film.title}">
                                <c:else />
                                <img src="{$cache_link_img}{$film.image_url_o}" alt="{$film.title}">
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

    <div class="blocktitle title-ik clearfix">
        <div class="main-title title-ik-items">
            <p>Phim hoạt hình</p>
            <span>Cập nhật phim mới hôm nay</span>
        </div>
    </div>

    <div class="list-item row">
        <c:each from="$phim_hoat_hinh" value="$film">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box">
                    <div class="m-item-box inner">

                        <a href="{$film.link}" title="{$film.title}">
                            <c:if is="{$film.image_url} != NULL">
                                <img src="{$cache_link_img}{$film.image_url}" alt="{$film.title}">
                                <c:else />
                                <img src="{$cache_link_img}{$film.image_url_o}" alt="{$film.title}">
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

</section>
<!-- /.content -->

<!-- END: home -->