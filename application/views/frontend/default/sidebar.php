<?php defined('SYSPATH') or die('No direct script access.'); ?>

<!-- BEGIN: sidebar -->

<div class="f_block-right float-left">
    <div class="block-item sidebar">

        <div class="widget">
            <span class="title">Phim sắp chiếu/ Trailer</span>
            <div class="f_block">
                <ol class="f_item_film">

                    <c:each from="{$phim_trailer.top}" value="$film">
                        <li>
                            <div class="f_item_l">
                                <div class="f_item_option">
                                    <i class="fas fa-volume-down" title="Thuyết minh"></i>
                                    <i class="fas fa-comment-dots" title="VietSub"></i>
                                </div>

                                <a href="{$film.link}" title="{$film.title}">
                                    <img src="data/images/su-menh-trai-tim-su-menh-trai-tim-2016-wall-thumb.jpg">

                                    <div class="info">
                                        <div class="ng-binding ng-scope">
                                            <span class="f_title_vn">{$film.title}</span><span class="f_title_en">{$film.title_o}</span>
                                        </div>
                                    </div>

                                </a>
                                <span class="ng-binding ageType">C18</span>
                                <span class="avgPoint ng-scope">
                                    <p class="txtPoint ng-binding">180 phút</p>
                                </span>
                            </div>
                        </li>
                    </c:each>
                    <c:each from="{$phim_trailer.last}" key="$key" value="$film">
                        <li>
                            <a href="{$film.link}" title="{$film.title}" class="font name">
                                <div class="f_thumb">
                                    <img src="data/images/phim-pha-an-trung-quoc-2.png" alt="Sut">

                                    <span class="label-range">{$key}</span>
                                </div>
                                <div class="f_detail">
                                    <p>{$film.title}</p>{$film.title_o}
                                </div>
                            </a>
                        </li>
                    </c:each>
                </ol>


            </div>
        </div>
        <div class="widget">

            <span class="title float-left">Phim lẻ</span>
            <div class="f_block float-left f_itemf">
                <ul class="nav" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="day-tab" data-toggle="tab" href="#day" role="tab" aria-controls="day" aria-selected="true">Ngày</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="week-tab" data-toggle="tab" href="#week" role="tab" aria-controls="week" aria-selected="false">Tuần</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="month-tab" data-toggle="tab" href="#month" role="tab" aria-controls="month" aria-selected="false">Tháng</a>
                    </li>
                </ul>

            </div>
            <div class="float-left tab-content">
                <div class="tab-pane fade show active" id="day" role="tabpanel" aria-labelledby="day-tab">
                    <ol class="f_item_film">
                        <li>
                            <a href="phim-/_/xem-phim/" title="dsadsd" class="font name">
                                <div class="f_thumb">
                                    <img src="data/images/phim-pha-an-trung-quoc-2.png" alt="Sut">
                                </div>
                                <div class="f_detail">
                                    <p>Sút</p>Sut
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="phim-/_/xem-phim/" title="dsadsd" class="font name">
                                <div class="f_thumb">
                                    <img src="data/images/phim-pha-an-trung-quoc-2.png" alt="Sut">
                                </div>
                                <div class="f_detail">
                                    <p>Sút</p>Sut
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="phim-/_/xem-phim/" title="dsadsd" class="font name">
                                <div class="f_thumb">
                                    <img src="data/images/phim-pha-an-trung-quoc-2.png" alt="Sut">
                                </div>
                                <div class="f_detail">
                                    <p>Sút</p>Sut
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="phim-/_/xem-phim/" title="dsadsd" class="font name">
                                <div class="f_thumb">
                                    <img src="data/images/phim-pha-an-trung-quoc-2.png" alt="Sut">
                                </div>
                                <div class="f_detail">
                                    <p>Sút</p>Sut
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="phim-/_/xem-phim/" title="dsadsd" class="font name">
                                <div class="f_thumb">
                                    <img src="data/images/phim-pha-an-trung-quoc-2.png" alt="Sut">
                                </div>
                                <div class="f_detail">
                                    <p>Sút</p>Sut
                                </div>
                            </a>
                        </li>

                    </ol>
                </div>
                <div class="tab-pane fade" id="week" role="tabpanel" aria-labelledby="week-tab">ccc</div>
                <div class="tab-pane fade" id="month" role="tabpanel" aria-labelledby="month-tab">bbb</div>
            </div>
            <div class="clearfix"></div>
        </div>

    </div>
</div>
<!-- END: sidebar -->