<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!-- BEGIN: home -->

<div class="left-content ajax-load">

    <div class="list-films film-new">
        <div class="title-box">
            <i class="fa fa-list-alt"></i>
            <h2><a class="tab-label-first" href="ajaxi-phim-bo-moi-year" data-href="ajaxi-phim-bo-moi-year" title="Phim bộ mới cập nhật">Phim bộ mới cập nhật</a></h2>
            <ul class="list-tab-label">
                <li class="tab-label" data-href="phim-bo-han-quoc">Hàn Quốc</li>
                <li class="tab-label" data-href="phim-bo-my">Mỹ</li>
                <li class="tab-label" data-href="phim-bo-trung-quoc">Trung Quốc</li>
                <li class="tab-label" data-href="phim-bo-thai-lan">Thái Lan</li>
            </ul>
            <a class="view-all" href="{$blocklinks.phim_bo}" title="Phim bộ mới cập nhật">Xem tất cả <i class="fa fa-angle-double-right"></i></a>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="ajaxi-phim-bo-moi-year"></div>
        </div>
    </div>

    <div class="list-films film-new">
        <div class="title-box">
            <i class="fa fa-caret-square-o-right"></i>
            <h2><a class="tab-label-first" href="ajaxi-phim-le-moi" data-href="ajaxi-phim-le-moi" title="Phim lẻ mới cập nhật">Phim lẻ mới cập nhật</a></h2>
            <ul class="list-tab-label">
                <li class="tab-label" data-href="phim-le-hanh-dong">Hành động</li>
                <li class="tab-label" data-href="phim-le-kinh-di">Kinh dị</li>
                <li class="tab-label" data-href="phim-le-hai-huoc">Hài hước</li>
            </ul>
            <a class="view-all" href="{$blocklinks.phim_le}" title="Phim lẻ mới cập nhật">Xem tất cả <i class="fa fa-angle-double-right"></i></a>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="ajaxi-phim-le-moi"></div>
        </div>
    </div>
    <div class="list-films film-new">
        <div class="title-box">
            <i class="fa fa-bolt"></i>
            <h2><a class="tab-label-first" href="ajaxi-phim-hoat-hinh" data-href="ajaxi-phim-hoat-hinh" title="Phim hoạt hình">Phim hoạt hình</a></h2>
            <ul class="list-tab-label">
                <li class="tab-label" data-href="phim-hoat-hinh">Cartoon</li>
                <li class="tab-label" data-href="phim-anime">Anime</li>
            </ul>
            <a class="view-all" href="{$url_base}the-loai/phim-hoat-hinh/" title="Phim hoạt hình">Xem tất cả <i class="fa fa-angle-double-right"></i></a>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="ajaxi-phim-hoat-hinh"></div>
        </div>
    </div>
    <div class="list-films film-new">
        <div class="title-box">
            <i class="fa fa-bookmark"></i>
            <h2><a class="tab-label-first" href="ajaxi-phim-chieu-rap" data-href="ajaxi-phim-chieu-rap" title="Phim chiếu rạp">Phim chiếu rạp</a></h2>
            <a class="view-all" href="{$url_base}danh-sach/phim-chieu-rap/" title="Phim chiếu rạp">Xem tất cả <i class="fa fa-angle-double-right"></i></a>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="ajaxi-phim-chieu-rap"></div>
        </div>
    </div>


</div>


<!-- END: home -->