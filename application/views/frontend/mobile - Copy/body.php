<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!-- BEGIN: body -->
<body id="template_mobile">
<div id="page">
    <div style="text-align: center; width: auto; height: auto; overflow: visible;" class="advs-top-mobile"><!--/* SoSmart Javascript Tag v3.0.0  */-->
        <div id="sosmart_3395" data-sosmart="3395"></div>
    </div><div id="header">
        <div class="container">
            <div class="btn-humber">
                <p></p>
                <p></p>
                <p></p>
            </div>
            <a href="http://phimbathu.com/" title="Trang chủ" class="logo">
                <img alt="phimbathu.com" title="phimbathu.com" src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/logo_mobile.png">
            </a>
            <i class="fa fa-search mobile"></i>

            <form id="mform_search" method="GET" action="http://phimbathu.com/tim-kiem.html">
                <input type="text" name="q" id="mkeyword" autocomplete="off" placeholder="Nhập tên phim hoặc diễn viên bạn cần tìm !">
                <i class="fa fa-arrow-circle-right" onclick="$(&#39;#mform_search&#39;).submit();"></i>
                <div style="display: block;" id="msuggestions" class="top-search-box"></div>
            </form>




        </div>
        <div class="main-menu fix-nav">
            <ul class="container">
                <li class="menu-item active">
                    <a title="" href="http://phimbathu.com/"><i class="fa fa-home"></i></a>


                </li>

                <li class="menu-item ">
                    <a title="Thể loại" href="http://phimbathu.com/the-loai"><i class="fa fa-align-center"></i>Thể loại</a>
                    <ul class="sub-menu span-2 absolute">

                        <c:each from="$category_cache" value="$category">
                            <li class="sub-menu-item"><a title="Phim {$category.title}" href="{$category.link}"><i class="fa fa-circle-o"></i>  Phim {$category.title}</a></li>
                        </c:each>
                    </ul>


                </li>

                <li class="menu-item ">
                    <a title="Quốc gia" href="http://phimbathu.com/quoc-gia"><i class="fa fa-globe"></i>Quốc gia</a>

                    <ul class="sub-menu span-3 absolute">
                        <c:each from="$country_cache" value="$country">
                            <li  class="sub-menu-item"><a title="Phim {$country.name}" href="{$country.link}"><i class="fa fa-circle-o"></i> {$country.name}</a></li>
                        </c:each>
                    </ul>

                </li>

                <li class="menu-item ">
                    <a title="Phim lẻ" href="{$blocklinks.phim_le}"><i class="fa fa-life-ring"></i>Phim lẻ</a>

                    <ul class="sub-menu absolute">
                        <li class="sub-menu-item"><a title="Phim lẻ 2016" href="{$blocklinks.phim_le}?year=2016"><i class="fa fa-circle-o"></i> Phim lẻ 2016</a></li>
                        <li class="sub-menu-item"><a title="Phim lẻ 2015" href="{$blocklinks.phim_le}?year=2015"><i class="fa fa-circle-o"></i> Phim lẻ 2015</a></li>
                        <li class="sub-menu-item"><a title="Phim lẻ 2014" href="{$blocklinks.phim_le}?year=2014"><i class="fa fa-circle-o"></i> Phim lẻ 2014</a></li>
                        <li class="sub-menu-item"><a title="Phim lẻ 2013" href="{$blocklinks.phim_le}?year=2013"><i class="fa fa-circle-o"></i> Phim lẻ 2013</a></li>
                        <li class="sub-menu-item"><a title="Phim lẻ 2012" href="{$blocklinks.phim_le}?year=2012"><i class="fa fa-circle-o"></i> Phim lẻ 2012</a></li>
                        <li class="sub-menu-item"><a title="Phim lẻ 2011" href="{$blocklinks.phim_le}?year=2011"><i class="fa fa-circle-o"></i> Phim lẻ 2011</a></li>
                        <li class="sub-menu-item"><a title="Phim lẻ 2010" href="{$blocklinks.phim_le}?year=2010"><i class="fa fa-circle-o"></i> Phim lẻ 2010</a></li>
                        <li class="sub-menu-item"><a title="Phim lẻ 2009" href="{$blocklinks.phim_le}?year=2009"><i class="fa fa-circle-o"></i> Phim lẻ 2009</a></li>
                        <li class="sub-menu-item"><a title="Phim lẻ 2008" href="{$blocklinks.phim_le}?year=2008"><i class="fa fa-circle-o"></i> Phim lẻ 2008</a></li>
                        <li class="sub-menu-item"><a title="Phim lẻ 2007" href="{$blocklinks.phim_le}?year=2007"><i class="fa fa-circle-o"></i> Phim lẻ 2007</a></li>
                        <li class="sub-menu-item"><a title="Phim lẻ 2006" href="{$blocklinks.phim_le}?year=2006"><i class="fa fa-circle-o"></i> Phim lẻ 2006</a></li>
                        <li class="sub-menu-item"><a title="Phim lẻ 2005" href="{$blocklinks.phim_le}?year=2005"><i class="fa fa-circle-o"></i> Phim lẻ 2005</a></li>
                    </ul>
                </li>

                <li class="menu-item ">
                    <a title="Phim bộ" href="http://phimbathu.com/danh-sach/phim-bo.html"><i class="fa fa-camera-retro"></i>Phim bộ</a>


                    <ul class="sub-menu absolute">

                        <li class="sub-menu-item"><a title="Phim bộ 2016" href="{$blocklinks.phim_bo}?year=2016"><i class="fa fa-circle-o"></i> Phim bộ 2016</a></li>
                        <li class="sub-menu-item"><a title="Phim bộ 2015" href="{$blocklinks.phim_bo}?year=2015"><i class="fa fa-circle-o"></i> Phim bộ 2015</a></li>
                        <li class="sub-menu-item"><a title="Phim bộ 2014" href="{$blocklinks.phim_bo}?year=2014"><i class="fa fa-circle-o"></i> Phim bộ 2014</a></li>
                        <li class="sub-menu-item"><a title="Phim bộ 2013" href="{$blocklinks.phim_bo}?year=2013"><i class="fa fa-circle-o"></i> Phim bộ 2013</a></li>
                        <li class="sub-menu-item"><a title="Phim bộ 2012" href="{$blocklinks.phim_bo}?year=2012"><i class="fa fa-circle-o"></i> Phim bộ 2012</a></li>
                        <li class="sub-menu-item"><a title="Phim bộ 2011" href="{$blocklinks.phim_bo}?year=2011"><i class="fa fa-circle-o"></i> Phim bộ 2011</a></li>
                        <li class="sub-menu-item"><a title="Phim bộ 2010" href="{$blocklinks.phim_bo}?year=2010"><i class="fa fa-circle-o"></i> Phim bộ 2010</a></li>
                        <li class="sub-menu-item"><a title="Phim bộ 2009" href="{$blocklinks.phim_bo}?year=2009"><i class="fa fa-circle-o"></i> Phim bộ 2009</a></li>
                        <li class="sub-menu-item"><a title="Phim bộ 2008" href="{$blocklinks.phim_bo}?year=2008"><i class="fa fa-circle-o"></i> Phim bộ 2008</a></li>
                        <li class="sub-menu-item"><a title="Phim bộ 2007" href="{$blocklinks.phim_bo}?year=2007"><i class="fa fa-circle-o"></i> Phim bộ 2007</a></li>
                        <li class="sub-menu-item"><a title="Phim bộ 2006" href="{$blocklinks.phim_bo}?year=2006"><i class="fa fa-circle-o"></i> Phim bộ 2006</a></li>
                        <li class="sub-menu-item"><a title="Phim bộ 2005" href="{$blocklinks.phim_bo}?year=2005"><i class="fa fa-circle-o"></i> Phim bộ 2005</a></li>
                    </ul>
                </li>

                <li class="menu-item ">
                    <a title="Phim chiếu rạp" href="http://phimbathu.com/danh-sach/phim-chieu-rap.html"><i class="fa fa-film"></i>Phim chiếu rạp</a>


                    <ul class="sub-menu absolute">

                        <li class="sub-menu-item"><a title="Phim chiếu rạp 2016" href="{$blocklinks.phim_chieu_rap}?year=2016"><i class="fa fa-circle-o"></i> Phim chiếu rạp 2016</a></li>
                        <li class="sub-menu-item"><a title="Phim chiếu rạp 2015" href="{$blocklinks.phim_chieu_rap}?year=2015"><i class="fa fa-circle-o"></i> Phim chiếu rạp 2015</a></li>
                        <li class="sub-menu-item"><a title="Phim chiếu rạp 2014" href="{$blocklinks.phim_chieu_rap}?year=2014"><i class="fa fa-circle-o"></i> Phim chiếu rạp 2014</a></li>
                        <li class="sub-menu-item"><a title="Phim chiếu rạp 2013" href="{$blocklinks.phim_chieu_rap}?year=2013"><i class="fa fa-circle-o"></i> Phim chiếu rạp 2013</a></li>
                        <li class="sub-menu-item"><a title="Phim chiếu rạp 2012" href="{$blocklinks.phim_chieu_rap}?year=2012"><i class="fa fa-circle-o"></i> Phim chiếu rạp 2012</a></li>
                        <li class="sub-menu-item"><a title="Phim chiếu rạp 2011" href="{$blocklinks.phim_chieu_rap}?year=2011"><i class="fa fa-circle-o"></i> Phim chiếu rạp 2011</a></li>
                        <li class="sub-menu-item"><a title="Phim chiếu rạp 2010" href="{$blocklinks.phim_chieu_rap}?year=2010"><i class="fa fa-circle-o"></i> Phim chiếu rạp 2010</a></li>
                        <li class="sub-menu-item"><a title="Phim chiếu rạp 2009" href="{$blocklinks.phim_chieu_rap}?year=2009"><i class="fa fa-circle-o"></i> Phim chiếu rạp 2009</a></li>
                        <li class="sub-menu-item"><a title="Phim chiếu rạp 2008" href="{$blocklinks.phim_chieu_rap}?year=2008"><i class="fa fa-circle-o"></i> Phim chiếu rạp 2008</a></li>
                        <li class="sub-menu-item"><a title="Phim chiếu rạp 2007" href="{$blocklinks.phim_chieu_rap}?year=2007"><i class="fa fa-circle-o"></i> Phim chiếu rạp 2007</a></li>
                    </ul>
                </li>

                <li class="menu-item ">
                    <a title="Phim mới" href="http://phimbathu.com/danh-sach/phim-moi.html"><i class="fa fa-lightbulb-o"></i>Phim mới</a>


                    <ul class="sub-menu absolute">
                        <li class="sub-menu-item"><a title="Phim mới 2016" href="{$blocklinks.phim_2016}"><i class="fa fa-circle-o"></i> Phim mới 2016</a></li>
                        <li class="sub-menu-item"><a title="Phim mới 2015" href="{$blocklinks.phim_2015}"><i class="fa fa-circle-o"></i> Phim mới 2015</a></li>
                        <li class="sub-menu-item"><a title="Phim mới 2014" href="{$blocklinks.phim_2014}"><i class="fa fa-circle-o"></i> Phim mới 2014</a></li>
                        <li class="sub-menu-item"><a title="Phim mới 2013" href="{$blocklinks.phim_2013}"><i class="fa fa-circle-o"></i> Phim mới 2013</a></li>
                        <li class="sub-menu-item"><a title="Phim mới 2012" href="{$blocklinks.phim_2012}"><i class="fa fa-circle-o"></i> Phim mới 2012</a></li>
                        <li class="sub-menu-item"><a title="Phim mới 2011" href="{$blocklinks.phim_2011}"><i class="fa fa-circle-o"></i> Phim mới 2011</a></li>
                        <li class="sub-menu-item"><a title="Phim mới 2010" href="{$blocklinks.phim_2010}"><i class="fa fa-circle-o"></i> Phim mới 2010</a></li>
                        <li class="sub-menu-item"><a title="Phim mới 2009" href="{$blocklinks.phim_2009}"><i class="fa fa-circle-o"></i> Phim mới 2009</a></li>
                        <li class="sub-menu-item"><a title="Phim mới 2008" href="{$blocklinks.phim_2008}"><i class="fa fa-circle-o"></i> Phim mới 2008</a></li>
                    </ul>
                </li>

                <li class="menu-item ">
                    <a title="Phim thuyết minh" href="http://phimbathu.com/danh-sach/phim-thuyet-minh.html"><i class="fa fa-comment"></i>Phim thuyết minh</a>


                    <ul class="sub-menu absolute">
                        <li class="sub-menu-item">
                            <a title="Phim thuyết minh 2016" href="http://phimbathu.com/danh-sach/phim-thuyet-minh-2016">Phim thuyết minh 2016</a>
                        </li>
                        <li class="sub-menu-item">
                            <a title="Phim thuyết minh 2015" href="http://phimbathu.com/danh-sach/phim-thuyet-minh-2015">Phim thuyết minh 2015</a>
                        </li>
                        <li class="sub-menu-item">
                            <a title="Phim thuyết minh 2014" href="http://phimbathu.com/danh-sach/phim-thuyet-minh-2014">Phim thuyết minh 2014</a>
                        </li>
                        <li class="sub-menu-item">
                            <a title="Phim thuyết minh 2013" href="http://phimbathu.com/danh-sach/phim-thuyet-minh-2013">Phim thuyết minh 2013</a>
                        </li>
                        <li class="sub-menu-item">
                            <a title="Phim thuyết minh 2012" href="http://phimbathu.com/danh-sach/phim-thuyet-minh-2012">Phim thuyết minh 2012</a>
                        </li>
                    </ul>
                </li>

                <li class="menu-item ">
                    <a title="Phim hoạt hình" href="http://phimbathu.com/phim-anime"><i class="fa fa-video-camera"></i>Phim hoạt hình</a>


                </li>

            </ul>
        </div>
    </div>



    <div id="content">
        <div class="main-content">
            <div class="container">
                <c:if is="$route_name == 'home'">
                    <div class="list-films film-hot">
                        <h2 class="title-box"><i class="fa fa-star-o"></i><a title="Phim hot" href="http://phimbathu.com/danh-sach/phim-hot.html">Phim hot</a></h2>

                        <div class="container item-carousel-block">
                            <nav id="slider-nav" class="clear">
                                <c:include template="carousel" />
                                <div class="clear"></div>
                            </nav>
                        </div>

                    </div> <!-- End film hot-->
                    <div class="clear"></div>
                </c:if>

                <div class="left-content">
                    <c:include template="home" />
                </div> <!-- End left-content-->
                <div class="right-content">
                    <div class="widget ost">
                        <a href="http://phimbathu.com/nhac-phim-ost.html" title="Nhạc phim ost">
                            <img alt="nhạc phim ost" src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/NhacPhim2.jpg">
                        </a>
                    </div>         <div class="block">
                        <div class="fb-page fb_iframe_widget fb_iframe_widget_fluid" data-href="https://www.facebook.com/PhimBatHu" data-hide-cover="false" data-show-facepile="true" data-show-posts="false" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=997409100283248&amp;container_width=0&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2FPhimBatHu&amp;locale=en_US&amp;sdk=joey&amp;show_facepile=true&amp;show_posts=false"><span style="vertical-align: bottom; width: 340px; height: 214px;"><iframe name="f2389cfd222188" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:page Facebook Social Plugin" src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/page.html" class="" style="border: none; visibility: visible; width: 340px; height: 214px;"></iframe></span></div>
                    </div>
                    <div class="trailer block">
                        <div class="caption">
                            <span class="uppercase"><i class="fa fa-bookmark"></i>Phim sắp chiếu</span>
                        </div>
                        <ul class="list-film">
                            <li class="film-item-ver">
                                <a title="Hậu Duệ Của Mặt Trời Phần 2" href="http://phimbathu.com/hau-due-cua-mat-troi-phan-2-4681.html">
                                    <img class="avatar" alt="Hãy Nhắm Mắt Khi Anh Đến" src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/hau-201609487.jpg">
                                    <div class="title">
                                        <p class="name">Hậu Duệ Của Mặt Trời Phần 2</p>
                                        <p class="real-name">Descendants Of The Sun Season 2 (2017)</p>
                                    </div>
                                </a>
                                <p class="star" data-rating="4.2" title="Rất hay" style="width: 200px;"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="1" title="Rất hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="2" title="Rất hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="3" title="Rất hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="4" title="Rất hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-off.png" alt="5" title="Rất hay"><input type="hidden" name="score" value="4.2" readonly="readonly"></p>
                            </li>
                            <li class="film-item-ver">
                                <a title="Bộ Tứ Siêu Quậy" href="http://phimbathu.com/bo-tu-sieu-quay-4619.html">
                                    <img class="avatar" alt="Hãy Nhắm Mắt Khi Anh Đến" src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/chang1-201609634.jpg">
                                    <div class="title">
                                        <p class="name">Bộ Tứ Siêu Quậy</p>
                                        <p class="real-name">Chasing (2016)</p>
                                    </div>
                                </a>
                                <p class="star" data-rating="4.43" title="Rất hay" style="width: 200px;"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="1" title="Rất hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="2" title="Rất hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="3" title="Rất hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="4" title="Rất hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-half.png" alt="5" title="Rất hay"><input type="hidden" name="score" value="4.43" readonly="readonly"></p>
                            </li>
                            <li class="film-item-ver">
                                <a title="Kong: Đảo Đầu Lâu" href="http://phimbathu.com/kong-dao-dau-lau-4065.html">
                                    <img class="avatar" alt="Hãy Nhắm Mắt Khi Anh Đến" src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/king-201608235.jpg">
                                    <div class="title">
                                        <p class="name">Kong: Đảo Đầu Lâu</p>
                                        <p class="real-name">Kong: Skull Island (2017)</p>
                                    </div>
                                </a>
                                <p class="star" data-rating="3.855" title="Hay" style="width: 200px;"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="1" title="Hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="2" title="Hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="3" title="Hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="4" title="Hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-off.png" alt="5" title="Hay"><input type="hidden" name="score" value="3.855" readonly="readonly"></p>
                            </li>
                            <li class="film-item-ver">
                                <a title="Nhóc Tì Của Tiểu Thư Jones" href="http://phimbathu.com/nhoc-ti-cua-tieu-thu-jones-4587.html">
                                    <img class="avatar" alt="Hãy Nhắm Mắt Khi Anh Đến" src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/nhoc-201609917.jpg">
                                    <div class="title">
                                        <p class="name">Nhóc Tì Của Tiểu Thư Jones</p>
                                        <p class="real-name">Bridget Jones's Baby (2016)</p>
                                    </div>
                                </a>
                                <p class="star" data-rating="4.535" title="Rất hay" style="width: 200px;"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="1" title="Rất hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="2" title="Rất hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="3" title="Rất hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="4" title="Rất hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-half.png" alt="5" title="Rất hay"><input type="hidden" name="score" value="4.535" readonly="readonly"></p>
                            </li>
                            <li class="film-item-ver">
                                <a title="Đấu Phá Thương Khung" href="http://phimbathu.com/dau-pha-thuong-khung-4450.html">
                                    <img class="avatar" alt="Hãy Nhắm Mắt Khi Anh Đến" src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/dau-pha-201609337.png">
                                    <div class="title">
                                        <p class="name">Đấu Phá Thương Khung</p>
                                        <p class="real-name">Đấu Phá Thương Khung</p>
                                    </div>
                                </a>
                                <p class="star" data-rating="4.355" title="Rất hay" style="width: 200px;"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="1" title="Rất hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="2" title="Rất hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="3" title="Rất hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="4" title="Rất hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-half.png" alt="5" title="Rất hay"><input type="hidden" name="score" value="4.355" readonly="readonly"></p>
                            </li>
                            <li class="film-item-ver">
                                <a title="Ngôi Nhà Chết Chóc" href="http://phimbathu.com/ngoi-nha-chet-choc-4384.html">
                                    <img class="avatar" alt="Hãy Nhắm Mắt Khi Anh Đến" src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/ngoi-nha-chet-choc-201609768.jpg">
                                    <div class="title">
                                        <p class="name">Ngôi Nhà Chết Chóc</p>
                                        <p class="real-name">Unspoken (2016)</p>
                                    </div>
                                </a>
                                <p class="star" data-rating="4.055" title="Rất hay" style="width: 200px;"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="1" title="Rất hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="2" title="Rất hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="3" title="Rất hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="4" title="Rất hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-off.png" alt="5" title="Rất hay"><input type="hidden" name="score" value="4.055" readonly="readonly"></p>
                            </li>
                            <li class="film-item-ver">
                                <a title="Sát Nhân Trong Bóng Tối" href="http://phimbathu.com/sat-nhan-trong-bong-toi-4383.html">
                                    <img class="avatar" alt="Hãy Nhắm Mắt Khi Anh Đến" src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/dont-breath-201609656.jpg">
                                    <div class="title">
                                        <p class="name">Sát Nhân Trong Bóng Tối</p>
                                        <p class="real-name">Don't Breath (2016)</p>
                                    </div>
                                </a>
                                <p class="star" data-rating="4.145" title="Rất hay" style="width: 200px;"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="1" title="Rất hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="2" title="Rất hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="3" title="Rất hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="4" title="Rất hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-off.png" alt="5" title="Rất hay"><input type="hidden" name="score" value="4.145" readonly="readonly"></p>
                            </li>
                            <li class="film-item-ver">
                                <a title="Liên Minh Công Lý" href="http://phimbathu.com/lien-minh-cong-ly-3806.html">
                                    <img class="avatar" alt="Hãy Nhắm Mắt Khi Anh Đến" src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/lien-minh-cong-ly4-201608960.jpg">
                                    <div class="title">
                                        <p class="name">Liên Minh Công Lý</p>
                                        <p class="real-name">Justice League 2017</p>
                                    </div>
                                </a>
                                <p class="star" data-rating="3.945" title="Hay" style="width: 200px;"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="1" title="Hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="2" title="Hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="3" title="Hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="4" title="Hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-off.png" alt="5" title="Hay"><input type="hidden" name="score" value="3.945" readonly="readonly"></p>
                            </li>
                            <li class="film-item-ver">
                                <a title="Nữ Siêu Nhân" href="http://phimbathu.com/nu-sieu-nhan-3903.html">
                                    <img class="avatar" alt="Hãy Nhắm Mắt Khi Anh Đến" src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/wonder-woman-2-201608731.jpg">
                                    <div class="title">
                                        <p class="name">Nữ Siêu Nhân</p>
                                        <p class="real-name">Wonder Woman (2017)</p>
                                    </div>
                                </a>
                                <p class="star" data-rating="3.915" title="Hay" style="width: 200px;"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="1" title="Hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="2" title="Hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="3" title="Hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="4" title="Hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-off.png" alt="5" title="Hay"><input type="hidden" name="score" value="3.915" readonly="readonly"></p>
                            </li>
                            <li class="film-item-ver">
                                <a title="Hộ Vệ" href="http://phimbathu.com/ho-ve-3489.html">
                                    <img class="avatar" alt="Hãy Nhắm Mắt Khi Anh Đến" src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/ho-ve-1-201606975.jpg">
                                    <div class="title">
                                        <p class="name">Hộ Vệ</p>
                                        <p class="real-name">Guardians 2017</p>
                                    </div>
                                </a>
                                <p class="star" data-rating="3.85" title="Hay" style="width: 200px;"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="1" title="Hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="2" title="Hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="3" title="Hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-on.png" alt="4" title="Hay"><img src="./Xem Phim Nhanh, Xem Phim Online, Phim VietSub, Phim HD_files/star-off.png" alt="5" title="Hay"><input type="hidden" name="score" value="3.85" readonly="readonly"></p>
                            </li>

                        </ul>
                    </div>


                    <div class="most-view block">
                        <div class="caption">
                            <span class="uppercase"><i class="fa fa-bookmark"></i>Phim quan tâm</span>
                        </div>
                        <div class="tabs">
                            <div data-id="d" class="tab active">Ngày</div>
                            <div data-id="w" class="tab">Tuần</div>
                            <div data-id="m" class="tab">Tháng</div>
                        </div>
                        <div class="clear"></div>
                        <ul class="list-film">

                        </ul>
                    </div> <!-- End most-view -->

                    <div class="block tagcloud">
                        <div class="caption">
                            <span class="uppercase"><i class="fa fa-tags"></i>Tags</span>
                        </div>
                        <ul class="list-tags">
                            <li><a class="level-9" href="http://phimbathu.com/tag/o-nha-mot-minh-6416.html" title="Ở Nhà Một Mình">Ở Nhà Một Mình</a></li>
                            <li><a class="level-6" href="http://phimbathu.com/tag/co-nang-xinh-dep-5555.html" title="Cô Nàng Xinh Đẹp">Cô Nàng Xinh Đẹp</a></li>
                            <li><a class="level-10" href="http://phimbathu.com/tag/quyen-so-tu-than-3180.html" title="Quyển sổ tử thần">Quyển sổ tử thần</a></li>
                            <li><a class="level-6" href="http://phimbathu.com/tag/nguoi-tinh-kim-cuong-3136.html" title="Người tình kim cương">Người tình kim cương</a></li>
                            <li><a class="level-8" href="http://phimbathu.com/tag/phap-su-vo-tam-3076.html" title="Pháp sư vô tâm">Pháp sư vô tâm</a></li>
                            <li><a class="level-9" href="http://phimbathu.com/tag/ke-cap-mat-trang-3-3018.html" title="Kẻ cắp mặt trăng 3">Kẻ cắp mặt trăng 3</a></li>
                            <li><a class="level-8" href="http://phimbathu.com/tag/hoa-thien-cot-2692.html" title="Hoa Thiên Cốt">Hoa Thiên Cốt</a></li>
                            <li><a class="level-4" href="http://phimbathu.com/tag/naruto-shippuuden-2570.html" title="Naruto Shippuuden">Naruto Shippuuden</a></li>
                            <li><a class="level-7" href="http://phimbathu.com/tag/di-nhan-2108.html" title="Dị Nhân">Dị Nhân</a></li>
                            <li><a class="level-10" href="http://phimbathu.com/tag/ma-bup-be-707.html" title="Ma búp bê">Ma búp bê</a></li>
                            <li><a class="level-9" href="http://phimbathu.com/tag/tro-ve-tuong-lai-41.html" title="Trở về tương lai">Trở về tương lai</a></li>
                            <li><a class="level-10" href="http://phimbathu.com/tag/ke-huy-diet-34.html" title="Kẻ hủy diệt">Kẻ hủy diệt</a></li>
                            <li><a class="level-4" href="http://phimbathu.com/tag/one-piece-19.html" title="One Piece">One Piece</a></li>
                            <li><a class="level-7" href="http://phimbathu.com/tag/doraemon-14.html" title="Doraemon">Doraemon</a></li>
                            <li><a class="level-7" href="http://phimbathu.com/tag/the-avengers-9.html" title="The Avengers">The Avengers</a></li>
                            <li><a class="level-6" href="http://phimbathu.com/tag/fast-and-furious-8.html" title="Fast and Furious">Fast and Furious</a></li>
                            <li><a class="level-8" href="http://phimbathu.com/tag/chau-tinh-tri-7.html" title="Châu Tinh Trì">Châu Tinh Trì</a></li>
                            <li><a class="level-7" href="http://phimbathu.com/tag/thanh-long-6.html" title="Thành Long">Thành Long</a></li>
                            <li><a class="level-7" href="http://phimbathu.com/tag/ly-lien-kiet-5.html" title="Lý Liên Kiệt">Lý Liên Kiệt</a></li>
                            <li><a class="level-2" href="http://phimbathu.com/tag/tinh-vo-mon-4.html" title="Tinh võ môn">Tinh võ môn</a></li>
                            <li><a class="level-4" href="http://phimbathu.com/tag/hoang-phi-hong-3.html" title="Hoàng Phi Hồng">Hoàng Phi Hồng</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clear"></div>
            </div><!-- End main-content -->
        </div>

    </div><!-- content -->

    <a href="http://phimbathu.com/dong-gop-y-kien.html" class="btn-contact" title="Gửi ý kiến"><i class="fa fa-envelope-o"></i></a>


    <footer id="footer">
        <div class="container">
            <div class="desc">
                <p>
                </p><h1><a href="http://phimbathu.com/">Xem phim</a> online, &nbsp;xem phim VietSub, phim hoat hinh, phim hanh dong,&nbsp;phim moi&nbsp;2015</h1>

                <p>Phim Bất Hủ&nbsp;luôn cập nhật những bộ phim mới nhất với nhiều thể loại đa dạng:</p>

                <h3>- Phim hanh dong My 2015, phim trung quoc,&nbsp;phim vo thuat, phim chieu rap, phim tam ly, tinh cam, phim hoat hinh hay nhat, &nbsp;phim hai 2015</h3>

                <h3>- Phim han quoc, phim chau tinh tri, phim thanh long, phim kinh di, phim xa hoi den, phim ly lien kiet, phim vo thuat thai lan, phim vien tuong, phim hoat hinh naruto, phim vua hai tac, xem phim hay 2015 &nbsp;</h3>

                <p>&nbsp;</p>         <p></p>
                <p class="sitemap"><a href="http://feeds.feedburner.com/tronbohd" class="style2" title="Rss Feed">Rss</a> - <a href="http://tronbohd.com/sitemap.xml" title="Sitemap" class="style2">Sitemap</a> - <a title="Google+ - TronBoHD.com" href="https://plus.google.com/u/0/100188763272100065945">Google+</a></p>
            </div>
            <div class="info">
                <div class="column">
                    <div class="heading">Liên hệ</div>
                    <ul>
                        <li><a href="http://phimbathu.com/lien-he-quang-cao.html">Liên hệ quảng cáo</a></li>
                        <li><a href="http://phimbathu.com/hop-tac-noi-dung.html">Hợp tác nội dung</a></li>
                    </ul>
                </div>
                <div class="column">
                    <div class="heading">Điều khoản sử dụng</div>
                    <ul>
                        <li><a href="http://phimbathu.com/dieu-khoan-chung.html">Điều khoản chung</a></li>
                        <li><a href="http://phimbathu.com/ban-quyen-noi-dung.html">Bản quyền và trách nhiệm nội dung</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </footer>

    <!-- Begin comScore Tag -->
    <script>
        var comscore = comscore || [];
        comscore.push({ c1: "2", c2: "20514420" });
        (function() {
            var s = document.createElement("script"), el = document.getElementsByTagName("script")[0]; s.async = true;
            s.src = (document.location.protocol == "https:" ? "https://sb" : "http://b") + ".scorecardresearch.com/beacon.js";
            el.parentNode.insertBefore(s, el);
        })();
    </script>
    <noscript>
        &lt;img src="http://b.scorecardresearch.com/p?c1=2&amp;c2=20514420&amp;cv=2.0&amp;cj=1" /&gt;
    </noscript>
    <!-- End comScore Tag -->
    <!-- Plugin facebook -->

</div>

</body>
</html>
<!-- END: body -->