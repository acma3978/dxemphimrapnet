<?php defined('SYSPATH') or die('No direct script access.'); ?>

<!-- BEGIN: body -->
<body id="LZLXFZwbv93nRy01RZST">
<div id="page">
    <div style="text-align: center; width: auto; height: auto; overflow: visible;" class="advs-top-mobile">
        <!--/* SoSmart Javascript Tag v3.0.0  */-->
    </div>
</div>
<div id="header">
    <div class="container">
        <div class="btn-humber">
            <p></p>
            <p></p>
            <p></p>
        </div>
        <c:if is="$route_name == 'home'">
                <h1><a id="logo" href="{$url_base}" title="Xem phim, Xem phim nhanh, Phim trọn bộ">TronBoHD.com</a></h1>
                <c:else />
                <a id="logo" href="{$url_base}" title="Xem phim, Xem phim nhanh, Phim trọn bộ">TronBoHD.com</a>
            </c:if>
        <!-- <a href="{$url_base}" title="Trang chủ" class="logo">
            <img alt="phimbathu.com" title="phimbathu.com" src="./trangchu_files/logo.png">
        </a> -->
        <i class="fa fa-search mobile"></i>

        <form id="search" class="search" method="GET" action="#">
            <input type="text" id="mkeyword" placeholder="Nhập tên phim hoặc diễn viên bạn cần tìm !" class="keyword"<c:if is="{$search_info.keyword}"> value="{$search_info.keyword}"</c:if>>
            <i class="submit fa fa-arrow-circle-right"></i>
            
        </form>

        


    </div>
    <div class="main-menu">
        <ul class="container">
            <li class="menu-item active">
                <a title="" href="{$url_base}"><i class="fa fa-home"></i></a>


            </li>

            <li class="menu-item ">
                <a title="Thể loại" href="#"><i class="fa fa-align-center"></i>Thể loại</a>
                <ul class="sub-menu span-2 absolute">

                <c:each from="$category_cache" value="$category">
                           

                            <li class="sub-menu-item">
                        <a title="Phim {$category.title}" href="{$category.link}">Phim {$category.title}</a>
                    </li>
                        </c:each>

                    
                </ul>


            </li>

            <li class="menu-item ">
                <a title="Quốc gia" href="#"><i class="fa fa-globe"></i>Quốc gia</a>

                <ul class="sub-menu span-3 absolute">

                <c:each from="$country_cache" value="$country">
                    
                            <li class="sub-menu-item">
                        <a title="{$country.name}" href="{$country.link}">Phim {$country.name}</a>
                    </li>
                        </c:each>

                    
                </ul>

            </li>

            <li class="menu-item ">
                <a title="Phim lẻ" href="{$blocklinks.phim_le}"><i class="fa fa-life-ring"></i>Phim lẻ</a>


                <ul class="sub-menu absolute">
                    <li class="sub-menu-item">
                        <a title="Phim lẻ 2016" href="{$blocklinks.phim_le}?year=2016">Phim lẻ 2016</a>
                    </li>
                    <li class="sub-menu-item">
                        <a title="Phim lẻ 2015" href="{$blocklinks.phim_le}?year=2015">Phim lẻ 2015</a>
                    </li>
                    <li class="sub-menu-item">
                        <a title="Phim lẻ 2014" href="{$blocklinks.phim_le}?year=2014">Phim lẻ 2014</a>
                    </li>
                    <li class="sub-menu-item">
                        <a title="Phim lẻ 2013" href="{$blocklinks.phim_le}?year=2013">Phim lẻ 2013</a>
                    </li>
                    <li class="sub-menu-item">
                        <a title="Phim lẻ 2012" href="{$blocklinks.phim_le}?year=2012">Phim lẻ 2012</a>
                    </li>
                    <li class="sub-menu-item">
                        <a title="Phim lẻ 2011" href="{$blocklinks.phim_le}?year=2011">Phim lẻ 2011</a>
                    </li>
                    <li class="sub-menu-item">
                        <a title="Phim lẻ 2010" href="{$blocklinks.phim_le}?year=2010">Phim lẻ 2010</a>
                    </li>
                </ul>
            </li>

            <li class="menu-item ">
                <a title="Phim bộ" href="{$blocklinks.phim_bo}"><i class="fa fa-camera-retro"></i>Phim bộ</a>


                <ul class="sub-menu absolute">
                    <li class="sub-menu-item">
                        <a title="Phim bộ 2016" href="{$blocklinks.phim_bo}?year=2016">Phim bộ 2016</a>
                    </li>
                    <li class="sub-menu-item">
                        <a title="Phim bộ 2015" href="{$blocklinks.phim_bo}?year=2015">Phim bộ 2015</a>
                    </li>
                    <li class="sub-menu-item">
                        <a title="Phim bộ 2014" href="{$blocklinks.phim_bo}?year=2014">Phim bộ 2014</a>
                    </li>
                    <li class="sub-menu-item">
                        <a title="Phim bộ 2013" href="{$blocklinks.phim_bo}?year=2013">Phim bộ 2013</a>
                    </li>
                    <li class="sub-menu-item">
                        <a title="Phim bộ 2012" href="{$blocklinks.phim_bo}?year=2012">Phim bộ 2012</a>
                    </li>
                    <li class="sub-menu-item">
                        <a title="Phim bộ 2011" href="{$blocklinks.phim_bo}?year=2011">Phim bộ 2011</a>
                    </li>
                    <li class="sub-menu-item">
                        <a title="Phim bộ 2010" href="{$blocklinks.phim_bo}?year=2010">Phim bộ 2010</a>
                    </li>
                </ul>
            </li>

            <li class="menu-item ">
                <a title="Phim chiếu rạp" href="{$blocklinks.phim_chieu_rap}"><i class="fa fa-film"></i>Phim chiếu rạp</a>


                <ul class="sub-menu absolute">
                    <li class="sub-menu-item">
                        <a title="Phim chiếu rạp 2016" href="{$blocklinks.phim_chieu_rap}?year=2016">Phim chiếu rạp 2016</a>
                    </li>
                    <li class="sub-menu-item">
                        <a title="Phim chiếu rạp 2015" href="{$blocklinks.phim_chieu_rap}?year=2015">Phim chiếu rạp 2015</a>
                    </li>
                    <li class="sub-menu-item">
                        <a title="Phim chiếu rạp 2014" href="{$blocklinks.phim_chieu_rap}?year=2014">Phim chiếu rạp 2014</a>
                    </li>
                    <li class="sub-menu-item">
                        <a title="Phim chiếu rạp 2013" href="{$blocklinks.phim_chieu_rap}?year=2013">Phim chiếu rạp 2013</a>
                    </li>
                    <li class="sub-menu-item">
                        <a title="Phim chiếu rạp 2012" href="{$blocklinks.phim_chieu_rap}?year=2012">Phim chiếu rạp 2012</a>
                    </li>
                </ul>
            </li>

            <li class="menu-item ">
                <a title="Phim mới" href="{$blocklinks.phim_moi}"><i class="fa fa-lightbulb-o"></i>Phim mới</a>


                <ul class="sub-menu absolute">
                    <li class="sub-menu-item">
                        <a title="Phim 2016" href="{$blocklinks.phim_2016}">Phim 2016</a>
                    </li>
                    <li class="sub-menu-item">
                        <a title="Phim 2015" href="{$blocklinks.phim_2015}">Phim 2015</a>
                    </li>
                    <li class="sub-menu-item">
                        <a title="Phim 2014" href="{$blocklinks.phim_2014}">Phim 2014</a>
                    </li>
                    <li class="sub-menu-item">
                        <a title="Phim 2013" href="{$blocklinks.phim_2013}">Phim 2013</a>
                    </li>
                    <li class="sub-menu-item">
                        <a title="Phim 2012" href="{$blocklinks.phim_2012}">Phim 2012</a>
                    </li>
                </ul>
            </li>

            <li class="menu-item ">
                <a title="Phim thuyết minh" href="{$url_base}the-loai/phim-thuyet-minh/"><i class="fa fa-comment"></i>Phim thuyết minh</a>


                
            </li>

            <li class="menu-item ">
                <a title="Phim hoạt hình" href="{$url_base}the-loai/phim-hoat-hinh/"><i class="fa fa-video-camera"></i>Phim hoạt hình</a>


            </li>

        </ul>
    </div>
</div>



<div id="content">
    <div class="main-content">
        <div class="container">
        <c:if is="$route_name == 'home'">
            <c:include template="carousel" />
            <div class="clear"></div>
</c:if>
           {$content}

            <div class="right-content">
                
                <div class="block">
                    <div class="fb-page fb_iframe_widget fb_iframe_widget_fluid" data-href="https://www.facebook.com/kenhphimmoi/" data-hide-cover="false" data-show-facepile="true" data-show-posts="false" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=997409100283248&amp;container_width=0&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2FPhimBatHu&amp;locale=en_US&amp;sdk=joey&amp;show_facepile=true&amp;show_posts=false"><span style="vertical-align: bottom; width: 340px; height: 214px;"><iframe name="f388f8c8a772f84" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:page Facebook Social Plugin" src="./trangchu_files/page.html" class="" style="border: none; visibility: visible; width: 340px; height: 214px;"></iframe></span></div>
                </div>
                <div class="trailer block">
                    <div class="caption">
                        <span class="uppercase"><i class="fa fa-bookmark"></i>Phim sắp chiếu</span>
                    </div>
                    <ul class="list-film">
                        <li class="film-item-ver">
                            <a title="Tước Tích" href="http://phimbathu.com/tuoc-tich-4793.html">
                                <img class="avatar" alt="Hãy Nhắm Mắt Khi Anh Đến" src="./trangchu_files/tuoc1-201610144(1).jpg">
                                <div class="title">
                                    <p class="name">Tước Tích</p>
                                    <p class="real-name">Legend Of Ravaging Dynasties (2016)</p>
                                </div>
                            </a>
                            <p class="star" data-rating="4.395" title="Rất hay" style="width: 200px;"><img src="./trangchu_files/star-on.png" alt="1" title="Rất hay"><img src="./trangchu_files/star-on.png" alt="2" title="Rất hay"><img src="./trangchu_files/star-on.png" alt="3" title="Rất hay"><img src="./trangchu_files/star-on.png" alt="4" title="Rất hay"><img src="./trangchu_files/star-half.png" alt="5" title="Rất hay"><input type="hidden" name="score" value="4.395" readonly="readonly"></p>
                        </li>
                        <li class="film-item-ver">
                            <a title="My Wife&#39;s Having an Affair this Week 2016" href="http://phimbathu.com/my-wifes-having-an-affair-this-week-2016-4801.html">
                                <img class="avatar" alt="Hãy Nhắm Mắt Khi Anh Đến" src="./trangchu_files/my-201610475.jpg">
                                <div class="title">
                                    <p class="name">My Wife's Having an Affair this Week 2016</p>
                                    <p class="real-name"></p>
                                </div>
                            </a>
                            <p class="star" data-rating="4.49" title="Rất hay" style="width: 200px;"><img src="./trangchu_files/star-on.png" alt="1" title="Rất hay"><img src="./trangchu_files/star-on.png" alt="2" title="Rất hay"><img src="./trangchu_files/star-on.png" alt="3" title="Rất hay"><img src="./trangchu_files/star-on.png" alt="4" title="Rất hay"><img src="./trangchu_files/star-half.png" alt="5" title="Rất hay"><input type="hidden" name="score" value="4.49" readonly="readonly"></p>
                        </li>
                        <li class="film-item-ver">
                            <a title="Hậu Duệ Của Mặt Trời Phần 2" href="http://phimbathu.com/hau-due-cua-mat-troi-phan-2-4681.html">
                                <img class="avatar" alt="Hãy Nhắm Mắt Khi Anh Đến" src="./trangchu_files/hau-201609487.jpg">
                                <div class="title">
                                    <p class="name">Hậu Duệ Của Mặt Trời Phần 2</p>
                                    <p class="real-name">Descendants Of The Sun Season 2 (2017)</p>
                                </div>
                            </a>
                            <p class="star" data-rating="4.185" title="Rất hay" style="width: 200px;"><img src="./trangchu_files/star-on.png" alt="1" title="Rất hay"><img src="./trangchu_files/star-on.png" alt="2" title="Rất hay"><img src="./trangchu_files/star-on.png" alt="3" title="Rất hay"><img src="./trangchu_files/star-on.png" alt="4" title="Rất hay"><img src="./trangchu_files/star-off.png" alt="5" title="Rất hay"><input type="hidden" name="score" value="4.185" readonly="readonly"></p>
                        </li>
                        <li class="film-item-ver">
                            <a title="Bộ Tứ Siêu Quậy" href="http://phimbathu.com/bo-tu-sieu-quay-4619.html">
                                <img class="avatar" alt="Hãy Nhắm Mắt Khi Anh Đến" src="./trangchu_files/chang1-201609634.jpg">
                                <div class="title">
                                    <p class="name">Bộ Tứ Siêu Quậy</p>
                                    <p class="real-name">Chasing (2016)</p>
                                </div>
                            </a>
                            <p class="star" data-rating="4.43" title="Rất hay" style="width: 200px;"><img src="./trangchu_files/star-on.png" alt="1" title="Rất hay"><img src="./trangchu_files/star-on.png" alt="2" title="Rất hay"><img src="./trangchu_files/star-on.png" alt="3" title="Rất hay"><img src="./trangchu_files/star-on.png" alt="4" title="Rất hay"><img src="./trangchu_files/star-half.png" alt="5" title="Rất hay"><input type="hidden" name="score" value="4.43" readonly="readonly"></p>
                        </li>
                        <li class="film-item-ver">
                            <a title="Kong: Đảo Đầu Lâu" href="http://phimbathu.com/kong-dao-dau-lau-4065.html">
                                <img class="avatar" alt="Hãy Nhắm Mắt Khi Anh Đến" src="./trangchu_files/king-201608235.jpg">
                                <div class="title">
                                    <p class="name">Kong: Đảo Đầu Lâu</p>
                                    <p class="real-name">Kong: Skull Island (2017)</p>
                                </div>
                            </a>
                            <p class="star" data-rating="3.855" title="Hay" style="width: 200px;"><img src="./trangchu_files/star-on.png" alt="1" title="Hay"><img src="./trangchu_files/star-on.png" alt="2" title="Hay"><img src="./trangchu_files/star-on.png" alt="3" title="Hay"><img src="./trangchu_files/star-on.png" alt="4" title="Hay"><img src="./trangchu_files/star-off.png" alt="5" title="Hay"><input type="hidden" name="score" value="3.855" readonly="readonly"></p>
                        </li>
                        <li class="film-item-ver">
                            <a title="Nhóc Tì Của Tiểu Thư Jones" href="http://phimbathu.com/nhoc-ti-cua-tieu-thu-jones-4587.html">
                                <img class="avatar" alt="Hãy Nhắm Mắt Khi Anh Đến" src="./trangchu_files/nhoc-201609917.jpg">
                                <div class="title">
                                    <p class="name">Nhóc Tì Của Tiểu Thư Jones</p>
                                    <p class="real-name">Bridget Jones's Baby (2016)</p>
                                </div>
                            </a>
                            <p class="star" data-rating="4.535" title="Rất hay" style="width: 200px;"><img src="./trangchu_files/star-on.png" alt="1" title="Rất hay"><img src="./trangchu_files/star-on.png" alt="2" title="Rất hay"><img src="./trangchu_files/star-on.png" alt="3" title="Rất hay"><img src="./trangchu_files/star-on.png" alt="4" title="Rất hay"><img src="./trangchu_files/star-half.png" alt="5" title="Rất hay"><input type="hidden" name="score" value="4.535" readonly="readonly"></p>
                        </li>
                        <li class="film-item-ver">
                            <a title="Đấu Phá Thương Khung" href="http://phimbathu.com/dau-pha-thuong-khung-4450.html">
                                <img class="avatar" alt="Hãy Nhắm Mắt Khi Anh Đến" src="./trangchu_files/dau-pha-201609337.png">
                                <div class="title">
                                    <p class="name">Đấu Phá Thương Khung</p>
                                    <p class="real-name">Đấu Phá Thương Khung</p>
                                </div>
                            </a>
                            <p class="star" data-rating="4.315" title="Rất hay" style="width: 200px;"><img src="./trangchu_files/star-on.png" alt="1" title="Rất hay"><img src="./trangchu_files/star-on.png" alt="2" title="Rất hay"><img src="./trangchu_files/star-on.png" alt="3" title="Rất hay"><img src="./trangchu_files/star-on.png" alt="4" title="Rất hay"><img src="./trangchu_files/star-half.png" alt="5" title="Rất hay"><input type="hidden" name="score" value="4.315" readonly="readonly"></p>
                        </li>
                        <li class="film-item-ver">
                            <a title="Ngôi Nhà Chết Chóc" href="http://phimbathu.com/ngoi-nha-chet-choc-4384.html">
                                <img class="avatar" alt="Hãy Nhắm Mắt Khi Anh Đến" src="./trangchu_files/ngoi-nha-chet-choc-201609768.jpg">
                                <div class="title">
                                    <p class="name">Ngôi Nhà Chết Chóc</p>
                                    <p class="real-name">Unspoken (2016)</p>
                                </div>
                            </a>
                            <p class="star" data-rating="4.055" title="Rất hay" style="width: 200px;"><img src="./trangchu_files/star-on.png" alt="1" title="Rất hay"><img src="./trangchu_files/star-on.png" alt="2" title="Rất hay"><img src="./trangchu_files/star-on.png" alt="3" title="Rất hay"><img src="./trangchu_files/star-on.png" alt="4" title="Rất hay"><img src="./trangchu_files/star-off.png" alt="5" title="Rất hay"><input type="hidden" name="score" value="4.055" readonly="readonly"></p>
                        </li>
                        <li class="film-item-ver">
                            <a title="Sát Nhân Trong Bóng Tối" href="http://phimbathu.com/sat-nhan-trong-bong-toi-4383.html">
                                <img class="avatar" alt="Hãy Nhắm Mắt Khi Anh Đến" src="./trangchu_files/dont-breath-201609656.jpg">
                                <div class="title">
                                    <p class="name">Sát Nhân Trong Bóng Tối</p>
                                    <p class="real-name">Don't Breath (2016)</p>
                                </div>
                            </a>
                            <p class="star" data-rating="4.155" title="Rất hay" style="width: 200px;"><img src="./trangchu_files/star-on.png" alt="1" title="Rất hay"><img src="./trangchu_files/star-on.png" alt="2" title="Rất hay"><img src="./trangchu_files/star-on.png" alt="3" title="Rất hay"><img src="./trangchu_files/star-on.png" alt="4" title="Rất hay"><img src="./trangchu_files/star-off.png" alt="5" title="Rất hay"><input type="hidden" name="score" value="4.155" readonly="readonly"></p>
                        </li>
                        <li class="film-item-ver">
                            <a title="Liên Minh Công Lý" href="http://phimbathu.com/lien-minh-cong-ly-3806.html">
                                <img class="avatar" alt="Hãy Nhắm Mắt Khi Anh Đến" src="./trangchu_files/lien-minh-cong-ly4-201608960.jpg">
                                <div class="title">
                                    <p class="name">Liên Minh Công Lý</p>
                                    <p class="real-name">Justice League 2017</p>
                                </div>
                            </a>
                            <p class="star" data-rating="3.945" title="Hay" style="width: 200px;"><img src="./trangchu_files/star-on.png" alt="1" title="Hay"><img src="./trangchu_files/star-on.png" alt="2" title="Hay"><img src="./trangchu_files/star-on.png" alt="3" title="Hay"><img src="./trangchu_files/star-on.png" alt="4" title="Hay"><img src="./trangchu_files/star-off.png" alt="5" title="Hay"><input type="hidden" name="score" value="3.945" readonly="readonly"></p>
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
                        <li class="item">
                            <span class="number-rank absolute">1</span>
                            <a href="http://phimbathu.com/running-man-1411.html">
                                <span>Running Man</span>
                            </a>
                            <div class="count_view">Lượt quan tâm: 132</div>
                        </li>
                        <li class="item">
                            <span class="number-rank absolute">2</span>
                            <a href="http://phimbathu.com/one-piece-vua-hai-tac-1451.html">
                                <span>One Piece Vua Hải Tặc</span>
                            </a>
                            <div class="count_view">Lượt quan tâm: 102</div>
                        </li>
                        <li class="item">
                            <span class="number-rank absolute">3</span>
                            <a href="http://phimbathu.com/tru-tien---thanh-van-chi-2658.html">
                                <span>Tru Tiên - Thanh Vân Chí</span>
                            </a>
                            <div class="count_view">Lượt quan tâm: 78</div>
                        </li>
                        <li class="item">
                            <span class="number-rank absolute">4</span>
                            <a href="http://phimbathu.com/naruto-shippuuden-9.html">
                                <span>Naruto Shippuuden</span>
                            </a>
                            <div class="count_view">Lượt quan tâm: 77</div>
                        </li>
                        <li class="item">
                            <span class="number-rank absolute">5</span>
                            <a href="http://phimbathu.com/muon-kieu-ghen-tuong-4053.html">
                                <span>Muôn Kiểu Ghen Tuông</span>
                            </a>
                            <div class="count_view">Lượt quan tâm: 53</div>
                        </li>
                        <li class="item">
                            <span class="number-rank absolute">6</span>
                            <a href="http://phimbathu.com/bay-vien-ngoc-rong-sieu-cap-1601.html">
                                <span>Bảy Viên Ngọc Rồng Siêu Cấp</span>
                            </a>
                            <div class="count_view">Lượt quan tâm: 47</div>
                        </li>
                        <li class="item">
                            <span class="number-rank absolute">7</span>
                            <a href="http://phimbathu.com/lo-lem-va-bon-chang-hiep-si-3679.html">
                                <span>Lọ Lem và Bốn Chàng Hiệp Sĩ</span>
                            </a>
                            <div class="count_view">Lượt quan tâm: 41</div>
                        </li>
                        <li class="item">
                            <span class="number-rank absolute">8</span>
                            <a href="http://phimbathu.com/yen-chi-2551.html">
                                <span>Yên Chi</span>
                            </a>
                            <div class="count_view">Lượt quan tâm: 39</div>
                        </li>
                        <li class="item">
                            <span class="number-rank absolute">9</span>
                            <a href="http://phimbathu.com/hoang-tu-soi-3619.html">
                                <span>Hoàng Tử Sói</span>
                            </a>
                            <div class="count_view">Lượt quan tâm: 33</div>
                        </li>
                        <li class="item">
                            <span class="number-rank absolute">10</span>
                            <a href="http://phimbathu.com/the-k2-4591.html">
                                <span>The K2</span>
                            </a>
                            <div class="count_view">Lượt quan tâm: 32</div>
                        </li>

                    </ul>
                </div>
                <!-- End most-view -->

                <div class="block tagcloud">
                    <div class="caption">
                        <span class="uppercase"><i class="fa fa-tags"></i>Tags</span>
                    </div>
                    <ul class="list-tags">


<c:each from="$tag_cloud" value="$tag">
                        <li class="btn btn-info"><a data-used="{$tag.used_count}" class="level-{$tag.level}" rel="tag" href="{$tag.link}" title="{$tag.title}">{$tag.title}</a></li>
                    </c:each>
                    

                        
                    </ul>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
    

</div>















<!-- END: body -->