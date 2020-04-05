<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!-- BEGIN: body -->
<body>


    <header id="header" class="main-header clear">
        
        <div class="nav-menu contaimain-headerner position" style="padding:0">
            <c:if is="$route_name == 'home' || $route_name == 'watch'">
                <h1 id="logo"><a href="{$url_base}" title="Xem phim, Xem phim nhanh, Phim trọn bộ">Xem phim</a></h1>
                <c:else />
                <div id="logo"><a href="{$url_base}" title="Xem phim, Xem phim nhanh, Phim trọn bộ">Xem phim</a></div>
            </c:if>

            <div id="search">
                <form method="get" action="#">
                    <input type="text" placeholder="Nhập tên phim mà bạn muốn tìm..." class="keyword"<c:if is="{$search_info.keyword}"> value="{$search_info.keyword}"</c:if>>
                    <button type="submit" class="submit"></button>
                </form>

            </div><!--/.search-->
            <div id="sign">
                <c:include template="sign_panel" />
            </div><!--/#login-->
        </div>
        <div class="container sub-main-header">
        <dl class="col">
            <!-- <dt></dt>
            <dd><span class="btn-sm btn btn-primary" title="Yêu cầu phim dành cho bạn">Yêu cầu phim</span></dd> -->
            <c:if is="$route_name == 'film' || $route_name == 'watch'">
                <dt>Tên: </dt>
                <dd>Phim {$filminfo.title} |</dd>

                <dt><i class="icon icon-op i-status"></i>Trạng thái:</dt>

                        <dd class="stepem"><c:if is="{$filminfo.check_trailer} != '1'">
                                        <c:else />Trailer</c:if> 
                                <c:if is="{$filminfo.check_trailer} != '1'">{$filminfo.status}
                                    <c:else />Trailer</c:if></dd>
            </c:if>
        </dl>
        <dl class="col2">
            <dt>IP: </dt>
            <dd> {$ip_client}</dd>
        </dl>

         
        </div>
    </header>

    <nav class="w3-topnav w3-card-2 w3-slim topnav clear" id="nav">
        <div class="container position">
            <ul class="menu clear">
                <li style="width:80px;border-left:0"><a>Thể loại</a>
                    <ul class="sub-menu">
                        <c:each from="$category_cache" value="$category">
                            <li class="prhd_li"><a href="{$category.link}" title="Phim {$category.title}">Phim {$category.title}</a></li>
                        </c:each>
                    </ul>
                </li>
                <li style="width:85px"><a>Quốc gia</a>
                    <ul class="sub-menu">
                        <c:each from="$country_cache" value="$country">
                            <li class="prhd_li"><a href="{$country.link}" title="Phim {$country.name}">Phim {$country.name}</a></li>
                        </c:each>
                    </ul>
                </li>
                <li style="width:73px"><a href="{$blocklinks.phim_le}" title="Phim lẻ mới">Phim lẻ</a>
                    <ul class="ple sub-menu">
                        <li class="prhd_li"><a href="{$blocklinks.phim_le}?year=2016" title="Phim lẻ 2016">Phim lẻ 2016</a></li>
                        <li class="prhd_li"><a href="{$blocklinks.phim_le}?year=2015" title="Phim lẻ 2015">Phim lẻ 2015</a></li>
                        <li class="prhd_li"><a href="{$blocklinks.phim_le}?year=2014" title="Phim lẻ 2014">Phim lẻ 2014</a></li>
                        <li class="prhd_li"><a href="{$blocklinks.phim_le}?year=2013" title="Phim lẻ 2013">Phim lẻ 2013</a></li>
                        <li class="prhd_li"><a href="{$blocklinks.phim_le}?year=2012" title="Phim lẻ 2012">Phim lẻ 2012</a></li>
                        <li class="prhd_li"><a href="{$blocklinks.phim_le}?year=2011" title="Phim lẻ 2011">Phim lẻ 2011</a></li>
                        <li class="prhd_li"><a href="{$blocklinks.phim_le}?year=2010" title="Phim lẻ 2010">Phim lẻ 2010</a></li>
                        <li class="prhd_li"><a href="{$blocklinks.phim_le}?year=2009" title="Phim lẻ 2009">Phim lẻ 2009</a></li>
                        <li class="prhd_li"><a href="{$blocklinks.phim_le}?year=2008" title="Phim lẻ 2008">Phim lẻ 2008</a></li>
                        <li class="prhd_li"><a href="{$blocklinks.phim_le}?year=2007" title="Phim lẻ 2007">Phim lẻ 2007</a></li>
                        <li class="prhd_li"><a href="{$blocklinks.phim_le}?year=2006" title="Phim lẻ 2006">Phim lẻ 2006</a></li>
                        <li class="prhd_li"><a href="{$blocklinks.phim_le}?year=2005" title="Phim lẻ 2005">Phim lẻ 2005</a></li>
                    </ul>
                </li>
                <li style="width:76px"><a href="{$blocklinks.phim_bo}" title="Phim bộ mới">Phim bộ</a>
                    <ul class="pbo sub-menu">
                        <li class="prhd_li"><a href="{$blocklinks.phim_bo}?year=2016" title="Phim bộ 2015">Phim bộ 2016</a></li>
                        <li class="prhd_li"><a href="{$blocklinks.phim_bo}?year=2015" title="Phim bộ 2015">Phim bộ 2015</a></li>
                        <li class="prhd_li"><a href="{$blocklinks.phim_bo}?year=2014" title="Phim bộ 2014">Phim bộ 2014</a></li>
                        <li class="prhd_li"><a href="{$blocklinks.phim_bo}?year=2013" title="Phim bộ 2013">Phim bộ 2013</a></li>
                        <li class="prhd_li"><a href="{$blocklinks.phim_bo}?year=2012" title="Phim bộ 2012">Phim bộ 2012</a></li>
                        <li class="prhd_li"><a href="{$blocklinks.phim_bo}?year=2011" title="Phim bộ 2011">Phim bộ 2011</a></li>
                        <li class="prhd_li"><a href="{$blocklinks.phim_bo}?year=2010" title="Phim bộ 2010">Phim bộ 2010</a></li>
                        <li class="prhd_li"><a href="{$blocklinks.phim_bo}?year=2009" title="Phim bộ 2009">Phim bộ 2009</a></li>
                        <li class="prhd_li"><a href="{$blocklinks.phim_bo}?year=2008" title="Phim bộ 2008">Phim bộ 2008</a></li>
                        <li class="prhd_li"><a href="{$blocklinks.phim_bo}?year=2007" title="Phim bộ 2007">Phim bộ 2007</a></li>
                        <li class="prhd_li"><a href="{$blocklinks.phim_bo}?year=2006" title="Phim bộ 2006">Phim bộ 2006</a></li>
                        <li class="prhd_li"><a href="{$blocklinks.phim_bo}?year=2005" title="Phim bộ 2005">Phim bộ 2005</a></li>
                    </ul>
                </li>
                <li><a href="{$blocklinks.phim_chieu_rap}" title="Phim chiếu rạp">Phim chiếu rạp</a>
                    <ul class="pcr sub-menu" style="width:165px;">
                        <li><a href="{$blocklinks.phim_chieu_rap}?year=2016" title="Phim chiếu rạp 2016">Phim chiếu rạp 2016</a></li>
                        <li><a href="{$blocklinks.phim_chieu_rap}?year=2015" title="Phim chiếu rạp 2015">Phim chiếu rạp 2015</a></li>
                        <li><a href="{$blocklinks.phim_chieu_rap}?year=2014" title="Phim chiếu rạp 2014">Phim chiếu rạp 2014</a></li>
                        <li><a href="{$blocklinks.phim_chieu_rap}?year=2013" title="Phim chiếu rạp 2013">Phim chiếu rạp 2013</a></li>
                        <li><a href="{$blocklinks.phim_chieu_rap}?year=2012" title="Phim chiếu rạp 2012">Phim chiếu rạp 2012</a></li>
                        <li><a href="{$blocklinks.phim_chieu_rap}?year=2011" title="Phim chiếu rạp 2011">Phim chiếu rạp 2011</a></li>
                        <li><a href="{$blocklinks.phim_chieu_rap}?year=2010" title="Phim chiếu rạp 2010">Phim chiếu rạp 2010</a></li>
                    </ul>
                </li>
                <li style="width:82px"><a href="{$blocklinks.phim_moi}" title="Phim mới">Phim mới</a>
                    <ul class="sub-menu" style="width:105px">
                        <li><a href="{$blocklinks.phim_2016}" title="Phim 2016">Phim 2016</a></li>
                        <li><a href="{$blocklinks.phim_2015}" title="Phim 2015">Phim 2015</a></li>
                        <li><a href="{$blocklinks.phim_2014}" title="Phim 2014">Phim 2014</a></li>
                        <li><a href="{$blocklinks.phim_2013}" title="Phim 2013">Phim 2013</a></li>
                        <li><a href="{$blocklinks.phim_2012}" title="Phim 2012">Phim 2012</a></li>
                        <li><a href="{$blocklinks.phim_2011}" title="Phim 2011">Phim 2011</a></li>
                        <li><a href="{$blocklinks.phim_2010}" title="Phim 2010">Phim 2010</a></li>
                    </ul>
                </li>
                <!--<li><a href="{$url_base}{$blocklinks.dien-vien}" title="Di?n Vi�n">Di?n Vi�n</a></li>-->
                <li><a href="{$url_base}the-loai/phim-thuyet-minh/" title="Phim Thuyết Minh">Phim thuyết minh</a>
                    </li>
                <!-- <li>
                    <div class="well-large">
                        <c:include template="lightbox" />
                        <a data-toggle="modal" href="#form-content" class="btn btn-primary btn-large">Yêu cầu phim</a>
                    </div>
                </li> -->
            </ul>
            <div class="clear"></div>
        </div>
    </nav>

    

        

    <!--<div class="ad_location above_of_content container">{$ad_location.ad_above_of_content}</div>-->
    <c:if is="$route_name == 'home'">
<div class="black-block">
            
            <c:include template="carousel" />

            
        </div><!--end.black-block-->

        <c:include template="list-film-wrapper" />

        
    </c:if>
    
<!-- END: body -->