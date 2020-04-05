<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!-- BEGIN: home -->

<div class="left-content">

                <div class="list-films film-new">
                    <div class="title-box">
                        <i class="fa fa-list-alt"></i>
                        <h2><a class="tab-label-first" href="javascript:void(0)" data-href="tat-ca-phim-bo-moi" title="Phim bộ mới cập nhật">Phim bộ mới cập nhật</a></h2>
                        <ul class="list-tab-label">
                            <li class="tab-label" data-href="phim-bo-han-quoc">Hàn Quốc</li>
                            <li class="tab-label" data-href="phim-bo-my">Mỹ</li>
                            <li class="tab-label" data-href="phim-bo-trung-quoc">Trung Quốc</li>
                            <li class="tab-label" data-href="phim-bo-thai-lan">Thái Lan</li>
                        </ul>
                        <a class="view-all" href="http://phimbathu.com/danh-sach/phim-bo.html" title="Phim bộ mới cập nhật">Xem tất cả <i class="fa fa-angle-double-right"></i></a>
                    </div>
                    <ul>
                    <c:each from="$phim_bo_moi_cap_nhat" value="$film">
                        <li class="item no-margin-left">
                            <span class="label">{$film.status}</span>
                            <!-- <span class="label-quality">Phần 2</span> -->
                            <a title="{$film.title}" href="{$film.link}">

                                <c:if is="{$film.thumb_url} != NULL">
                        <img class="img-film lazy" src="{$cache_link_img}{$film.thumb_url}" title="{$film.title}" alt="{$film.title}" style="height: 261.28px;">
                        <c:else />
                        <img class="img-film lazy" src="{$cache_link_img}{$film.thumb_url_o}" title="{$film.title}" alt="{$film.title}" style="height: 261.28px;">
                    </c:if>

                                <div class="name">
                                    <span>{$film.title}</span>
                                </div>
                                <div class="name-real">
                                    <span>{$film.title_o} ({$film.year})</span>
                                </div>
                            </a>
                        </li>
                        </c:each>
                    </ul>
                </div>

                <div class="list-films film-new">
                    <div class="title-box">
                        <i class="fa fa-caret-square-o-right"></i>
                        <h2><a class="tab-label-first" href="javascript:void(0)" data-href="tat-ca-phim-le-moi" title="Phim lẻ mới cập nhật">Phim lẻ mới cập nhật</a></h2>
                        <ul class="list-tab-label">
                            <li class="tab-label" data-href="phim-le-hanh-dong">Hành động</li>
                            <li class="tab-label" data-href="phim-le-kinh-di">Kinh dị</li>
                            <li class="tab-label" data-href="phim-le-hai-huoc">Hài hước</li>
                        </ul>
                        <a class="view-all" href="http://phimbathu.com/danh-sach/phim-le.html" title="Phim lẻ mới cập nhật">Xem tất cả <i class="fa fa-angle-double-right"></i></a>
                    </div>
                    <ul>
                    <c:each from="$phim_le_moi_cap_nhat" value="$film">
                        <li class="item no-margin-left">
                            <span class="label">{$film.status}</span>
                            <!-- <span class="label-quality">Phần 2</span> -->
                            <a title="{$film.title}" href="{$film.link}">

                                <c:if is="{$film.thumb_url} != NULL">
                        <img class="img-film lazy" src="{$cache_link_img}{$film.thumb_url}" title="{$film.title}" alt="{$film.title}" style="height: 261.28px;">
                        <c:else />
                        <img class="img-film lazy" src="{$cache_link_img}{$film.thumb_url_o}" title="{$film.title}" alt="{$film.title}" style="height: 261.28px;">
                    </c:if>

                                <div class="name">
                                    <span>{$film.title}</span>
                                </div>
                                <div class="name-real">
                                    <span>{$film.title_o} ({$film.year})</span>
                                </div>
                            </a>
                        </li>
                        </c:each>
                    </ul>
                </div>
                <div class="list-films film-new">
                    <div class="title-box">
                        <i class="fa fa-bolt"></i>
                        <h2><a class="tab-label-first" href="javascript:void(0)" data-href="tat-ca-phim-hoat-hinh" title="Phim hoạt hình">Phim hoạt hình</a></h2>
                        <ul class="list-tab-label">
                            <li class="tab-label" data-href="phim-hoat-hinh">Cartoon</li>
                            <li class="tab-label" data-href="phim-anime">Anime</li>
                        </ul>
                        <a class="view-all" href="http://phimbathu.com/the-loai/phim-hoat-hinh-7.html" title="Phim hoạt hình">Xem tất cả <i class="fa fa-angle-double-right"></i></a>
                    </div>
                    <ul>
                    <c:each from="$phim_hoat_hinh" value="$film">
                        <li class="item no-margin-left">
                            <span class="label">{$film.status}</span>
                            <!-- <span class="label-quality">Phần 2</span> -->
                            <a title="{$film.title}" href="{$film.link}">

                                <c:if is="{$film.thumb_url} != NULL">
                        <img class="img-film lazy" src="{$cache_link_img}{$film.thumb_url}" title="{$film.title}" alt="{$film.title}" style="height: 261.28px;">
                        <c:else />
                        <img class="img-film lazy" src="{$cache_link_img}{$film.thumb_url_o}" title="{$film.title}" alt="{$film.title}" style="height: 261.28px;">
                    </c:if>

                                <div class="name">
                                    <span>{$film.title}</span>
                                </div>
                                <div class="name-real">
                                    <span>{$film.title_o} ({$film.year})</span>
                                </div>
                            </a>
                        </li>
                        </c:each>
                    </ul>
                </div>
                <div class="list-films film-new">
                    <div class="title-box">
                        <i class="fa fa-bookmark"></i>
                        <h2><a class="tab-label-first" href="javascript:void(0)" data-href="tat-ca-phim-chieu-rap" title="Phim chiếu rạp">Phim chiếu rạp</a></h2>
                        <a class="view-all" href="http://phimbathu.com/danh-sach/phim-chieu-rap.html" title="Phim chiếu rạp">Xem tất cả <i class="fa fa-angle-double-right"></i></a>
                    </div>
                    <ul>
                    <c:each from="$phim_chieu_rap_hot" value="$film">
                        <li class="item no-margin-left">
                            <span class="label">{$film.status}</span>
                            <!-- <span class="label-quality">Phần 2</span> -->
                            <a title="{$film.title}" href="{$film.link}">

                                <c:if is="{$film.thumb_url} != NULL">
                        <img class="img-film lazy" src="{$cache_link_img}{$film.thumb_url}" title="{$film.title}" alt="{$film.title}" style="height: 261.28px;">
                        <c:else />
                        <img class="img-film lazy" src="{$cache_link_img}{$film.thumb_url_o}" title="{$film.title}" alt="{$film.title}" style="height: 261.28px;">
                    </c:if>

                                <div class="name">
                                    <span>{$film.title}</span>
                                </div>
                                <div class="name-real">
                                    <span>{$film.title_o} ({$film.year})</span>
                                </div>
                            </a>
                        </li>
                        </c:each>
                    </ul>
                </div>


            </div>
            

<!-- END: home -->