<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!-- BEGIN: home -->

<!-- Main content -->
<section class="content">

    <div class="list-films film-new">
        <div class="title-box">
            <i class="fa fa-list-alt"></i>                        <h2><a class="tab-label-first" href="javascript:void(0)" data-href="tat-ca-phim-bo-moi" title="Phim bộ mới cập nhật">Phim bộ mới cập nhật</a></h2>
            <ul class="list-tab-label">
                <li class="tab-label" data-href="phim-bo-han-quoc">Hàn Quốc</li>
                <li class="tab-label" data-href="phim-bo-my">Mỹ</li>
                <li class="tab-label" data-href="phim-bo-trung-quoc">Trung Quốc</li>
                <li class="tab-label" data-href="phim-bo-thai-lan">Thái Lan</li>
            </ul>
            <a class="view-all" href="http://phimbathu.com/danh-sach/phim-bo.html" title="Phim bộ mới cập nhật">Xem tất cả <i class="fa fa-angle-double-right"></i></a>
        </div>
        <ul>
            <c:each from="$phim_bo_full" value="$film">
                <li class="item no-margin-left">
                    <span class="label">{$film.status}</span>
                    <a title="{$film.title}" href="{$film.link}">

                        <c:if is="{$film.small_url} != NULL">
                            <img class="img-film lazy" src="{$cache_link_img}{$film.small_url}" title="{$film.title}" alt="{$film.title}" style="height: 268.38px;">
                            <c:else />
                            <img class="img-film lazy" src="{$cache_link_img}{$film.small_url_o}" title="{$film.title}" alt="{$film.title}" style="height: 268.38px;">
                        </c:if>

                        <div class="name">
                            <span>{$film.title}</span>
                        </div>
                        <div class="name-real">
                            <span>{$film.title_o} {$film.year}</span>
                        </div>
                    </a>
                </li>
            </c:each>
        </ul>
    </div>

    <div class="list-films film-new">
        <div class="title-box">
            <i class="fa fa-caret-square-o-right"></i>                        <h2><a class="tab-label-first" href="javascript:void(0)" data-href="tat-ca-phim-le-moi" title="Phim lẻ mới cập nhật">Phim lẻ mới cập nhật</a></h2>
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
                    <a title="{$film.title}" href="{$film.link}">
                        <c:if is="{$film.small_url} != NULL">
                            <img class="img-film lazy" src="{$cache_link_img}{$film.small_url}" title="{$film.title}" alt="{$film.title}" style="height: 268.38px;">
                            <c:else />
                            <img class="img-film lazy" src="{$cache_link_img}{$film.small_url_o}" title="{$film.title}" alt="{$film.title}" style="height: 268.38px;">
                        </c:if>
                        <div class="name">
                            <span>{$film.title}</span>
                        </div>
                        <div class="name-real">
                            <span>{$film.title_o} {$film.year}</span>
                        </div>
                    </a>
                </li>
            </c:each>
        </ul>
    </div>
    <div class="list-films film-new">
        <div class="title-box">
            <i class="fa fa-bolt"></i>                        <h2><a class="tab-label-first" href="javascript:void(0)" data-href="tat-ca-phim-hoat-hinh" title="Phim hoạt hình">Phim hoạt hình</a></h2>
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
                    <a title="{$film.title}" href="{$film.link}">
                        <c:if is="{$film.small_url} != NULL">
                            <img class="img-film lazy" src="{$cache_link_img}{$film.small_url}" title="{$film.title}" alt="{$film.title}" style="height: 268.38px;">
                            <c:else />
                            <img class="img-film lazy" src="{$cache_link_img}{$film.small_url_o}" title="{$film.title}" alt="{$film.title}" style="height: 268.38px;">
                        </c:if>
                        <div class="name">
                            <span>{$film.title}</span>
                        </div>
                        <div class="name-real">
                            <span>{$film.title_o} {$film.year}</span>
                        </div>
                    </a>
                </li>
            </c:each>

        </ul>
    </div>
    <div class="list-films film-new">
        <div class="title-box">
            <i class="fa fa-bookmark"></i>                        <h2><a class="tab-label-first" href="javascript:void(0)" data-href="tat-ca-phim-chieu-rap" title="Phim chiếu rạp">Phim chiếu rạp</a></h2>
            <a class="view-all" href="http://phimbathu.com/danh-sach/phim-chieu-rap.html" title="Phim chiếu rạp">Xem tất cả <i class="fa fa-angle-double-right"></i></a>
        </div>
        <ul>
            <li class="item no-margin-left">
                <span class="label">Vietsub + Thuyết minh</span>
                <a title="Đường Hầm" href="http://phimbathu.com/duong-ham-4679.html">
                    <img class="img-film lazy" src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/duong-ham-201609422.jpg" title="Đường Hầm" alt="Đường Hầm" style="height: 269.8px;">
                    <div class="name">
                        <span>Đường Hầm</span>
                    </div>
                    <div class="name-real">
                        <span>The Tunner (2016)</span>
                    </div>
                </a>
            </li>
            <li class="item ">
                <span class="label">CAM + Thuyết minh</span>
                <a title="One Piece Film Gold 2016" href="http://phimbathu.com/one-piece-film-gold-2016-3643.html">
                    <img class="img-film lazy" src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/vang-201607565.png" title="One Piece Film Gold 2016" alt="One Piece Film Gold 2016" style="height: 269.8px;">
                    <div class="name">
                        <span>One Piece Film Gold 2016</span>
                    </div>
                    <div class="name-real">
                        <span></span>
                    </div>
                </a>
            </li>
            <li class="item ">
                <span class="label">Vietsub + Thuyết minh</span>
                <a title="Alice Ở Xứ Sở Trong Gương" href="http://phimbathu.com/alice-o-xu-so-trong-guong-3726.html">
                    <img class="img-film lazy" src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/alice-201607976.jpg" title="Alice Ở Xứ Sở Trong Gương" alt="Alice Ở Xứ Sở Trong Gương" style="height: 269.8px;">
                    <div class="name">
                        <span>Alice Ở Xứ Sở Trong Gương</span>
                    </div>
                    <div class="name-real">
                        <span>Alice Through The Looking Glass (2016)</span>
                    </div>
                </a>
            </li>
            <li class="item ">
                <span class="label">Bản đẹp + Thuyết Minh</span>
                <a title="Hừng Đông 2" href="http://phimbathu.com/hung-dong-2-4329.html">
                    <img class="img-film lazy" src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/hung-dong-201608488.jpg" title="Hừng Đông 2" alt="Hừng Đông 2" style="height: 269.8px;">
                    <div class="name">
                        <span>Hừng Đông 2</span>
                    </div>
                    <div class="name-real">
                        <span>The Twilight Saga Breaking Dawn Part 2 (2012)</span>
                    </div>
                </a>
            </li>
            <li class="item no-margin-left">
                <span class="label">CAM + Vietsub</span>
                <a title="Kubo Và Cây Đàn Shamisen" href="http://phimbathu.com/kubo-va-cay-dan-shamisen-2689.html">
                    <img class="img-film lazy" src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/kubo-and-the-two-strings-poster-full-201602320.jpg" title="Kubo Và Cây Đàn Shamisen" alt="Kubo Và Cây Đàn Shamisen" style="height: 269.8px;">
                    <div class="name">
                        <span>Kubo Và Cây Đàn Shamisen</span>
                    </div>
                    <div class="name-real">
                        <span>Kubo and the Two Strings (2016)</span>
                    </div>
                </a>
            </li>
            <li class="item ">
                <span class="label">Trailer</span>
                <a title="Rogue One: Star Wars Ngoại Truyện" href="http://phimbathu.com/rogue-one-star-wars-ngoai-truyen-4747.html">
                    <img class="img-film lazy" src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/ngoai-truyen-201609895.jpg" title="Rogue One: Star Wars Ngoại Truyện" alt="Rogue One: Star Wars Ngoại Truyện" style="height: 269.8px;">
                    <div class="name">
                        <span>Rogue One: Star Wars Ngoại Truyện</span>
                    </div>
                    <div class="name-real">
                        <span>Rogue One: A Star Wars Story (2016)</span>
                    </div>
                </a>
            </li>
        </ul>
    </div>

    <div class="blocktitle title-ik clearfix">
        <div class="main-title title-ik-items">
            <p>Phim võ thuật</p>
            <span>Cập nhật phim mới hôm nay</span>
        </div>
    </div>





</section>
<!-- /.content -->

<!-- END: home -->