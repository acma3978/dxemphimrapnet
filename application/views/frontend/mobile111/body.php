<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!-- BEGIN: body -->
<body class="hold-transition skin-blue sidebar-mini fixed">
<!-- Site wrapper -->
<div class="wrapper">

<header class="main-header">
    <!-- Logo -->
    <h1>
        <a href="{$url_base}" class="logo">
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>TronBoHD.com</b></span>
        </a>
    </h1>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <!-- search form -->
        <div id="search">
            <form action="{$url_base}" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" placeholder="Tìm kiếm phim mà bạn yêu thích..." class="form-control keyword"<c:if is="{$search_info.keyword}">value="{$search_info.keyword}"</c:if>>
                  <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                  </span>
                </div>
            </form>
        </div>
        <!-- /.search form -->
    </nav>
</header>

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="treeview" style="margin-top:5px">

                <a href="{$url_base}">
                    <i class="fa fa-home"></i> <span>Trang chủ</span>
                    <!--<small class="label pull-right bg-red">3</small>-->
                </a>

            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i>
                    <span>Thể loại</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <c:each from="$category_cache" value="$category">
                        <li><a title="Phim {$category.title}" href="{$category.link}"><i class="fa fa-circle-o"></i>  Phim {$category.title}</a></li>
                    </c:each>
                </ul>
            </li>
            <li class="treeview">
                <a href="../widgets.html">
                    <i class="fa fa-globe"></i> <span>Quốc gia</span>
                    <small class="label pull-right bg-green">new</small>
                </a>
                <ul class="treeview-menu">
                    <c:each from="$country_cache" value="$country">
                        <li><a title="Phim {$country.name}" href="{$country.link}"><i class="fa fa-circle-o"></i> {$country.name}</a></li>
                    </c:each>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-star-half-empty"></i>
                    <span>Phim lẻ</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a title="Phim lẻ 2016" href="{$blocklinks.phim_le}?year=2016"><i class="fa fa-circle-o"></i> Phim lẻ 2016</a></li>
                    <li><a title="Phim lẻ 2015" href="{$blocklinks.phim_le}?year=2015"><i class="fa fa-circle-o"></i> Phim lẻ 2015</a></li>
                    <li><a title="Phim lẻ 2014" href="{$blocklinks.phim_le}?year=2014"><i class="fa fa-circle-o"></i> Phim lẻ 2014</a></li>
                    <li><a title="Phim lẻ 2013" href="{$blocklinks.phim_le}?year=2013"><i class="fa fa-circle-o"></i> Phim lẻ 2013</a></li>
                    <li><a title="Phim lẻ 2012" href="{$blocklinks.phim_le}?year=2012"><i class="fa fa-circle-o"></i> Phim lẻ 2012</a></li>
                    <li><a title="Phim lẻ 2011" href="{$blocklinks.phim_le}?year=2011"><i class="fa fa-circle-o"></i> Phim lẻ 2011</a></li>
                    <li><a title="Phim lẻ 2010" href="{$blocklinks.phim_le}?year=2010"><i class="fa fa-circle-o"></i> Phim lẻ 2010</a></li>
                    <li><a title="Phim lẻ 2009" href="{$blocklinks.phim_le}?year=2009"><i class="fa fa-circle-o"></i> Phim lẻ 2009</a></li>
                    <li><a title="Phim lẻ 2008" href="{$blocklinks.phim_le}?year=2008"><i class="fa fa-circle-o"></i> Phim lẻ 2008</a></li>
                    <li><a title="Phim lẻ 2007" href="{$blocklinks.phim_le}?year=2007"><i class="fa fa-circle-o"></i> Phim lẻ 2007</a></li>
                    <li><a title="Phim lẻ 2006" href="{$blocklinks.phim_le}?year=2006"><i class="fa fa-circle-o"></i> Phim lẻ 2006</a></li>
                    <li><a title="Phim lẻ 2005" href="{$blocklinks.phim_le}?year=2005"><i class="fa fa-circle-o"></i> Phim lẻ 2005</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-star"></i>
                    <span>Phim bộ</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a title="Phim bộ 2016" href="{$blocklinks.phim_bo}?year=2016"><i class="fa fa-circle-o"></i> Phim bộ 2016</a></li>
                    <li><a title="Phim bộ 2015" href="{$blocklinks.phim_bo}?year=2015"><i class="fa fa-circle-o"></i> Phim bộ 2015</a></li>
                    <li><a title="Phim bộ 2014" href="{$blocklinks.phim_bo}?year=2014"><i class="fa fa-circle-o"></i> Phim bộ 2014</a></li>
                    <li><a title="Phim bộ 2013" href="{$blocklinks.phim_bo}?year=2013"><i class="fa fa-circle-o"></i> Phim bộ 2013</a></li>
                    <li><a title="Phim bộ 2012" href="{$blocklinks.phim_bo}?year=2012"><i class="fa fa-circle-o"></i> Phim bộ 2012</a></li>
                    <li><a title="Phim bộ 2011" href="{$blocklinks.phim_bo}?year=2011"><i class="fa fa-circle-o"></i> Phim bộ 2011</a></li>
                    <li><a title="Phim bộ 2010" href="{$blocklinks.phim_bo}?year=2010"><i class="fa fa-circle-o"></i> Phim bộ 2010</a></li>
                    <li><a title="Phim bộ 2009" href="{$blocklinks.phim_bo}?year=2009"><i class="fa fa-circle-o"></i> Phim bộ 2009</a></li>
                    <li><a title="Phim bộ 2008" href="{$blocklinks.phim_bo}?year=2008"><i class="fa fa-circle-o"></i> Phim bộ 2008</a></li>
                    <li><a title="Phim bộ 2007" href="{$blocklinks.phim_bo}?year=2007"><i class="fa fa-circle-o"></i> Phim bộ 2007</a></li>
                    <li><a title="Phim bộ 2006" href="{$blocklinks.phim_bo}?year=2006"><i class="fa fa-circle-o"></i> Phim bộ 2006</a></li>
                    <li><a title="Phim bộ 2005" href="{$blocklinks.phim_bo}?year=2005"><i class="fa fa-circle-o"></i> Phim bộ 2005</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-video-camera"></i> <span>Phim chiếu rạp</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a title="Phim chiếu rạp 2016" href="{$blocklinks.phim_chieu_rap}?year=2016"><i class="fa fa-circle-o"></i> Phim chiếu rạp 2016</a></li>
                    <li><a title="Phim chiếu rạp 2015" href="{$blocklinks.phim_chieu_rap}?year=2015"><i class="fa fa-circle-o"></i> Phim chiếu rạp 2015</a></li>
                    <li><a title="Phim chiếu rạp 2014" href="{$blocklinks.phim_chieu_rap}?year=2014"><i class="fa fa-circle-o"></i> Phim chiếu rạp 2014</a></li>
                    <li><a title="Phim chiếu rạp 2013" href="{$blocklinks.phim_chieu_rap}?year=2013"><i class="fa fa-circle-o"></i> Phim chiếu rạp 2013</a></li>
                    <li><a title="Phim chiếu rạp 2012" href="{$blocklinks.phim_chieu_rap}?year=2012"><i class="fa fa-circle-o"></i> Phim chiếu rạp 2012</a></li>
                    <li><a title="Phim chiếu rạp 2011" href="{$blocklinks.phim_chieu_rap}?year=2011"><i class="fa fa-circle-o"></i> Phim chiếu rạp 2011</a></li>
                    <li><a title="Phim chiếu rạp 2010" href="{$blocklinks.phim_chieu_rap}?year=2010"><i class="fa fa-circle-o"></i> Phim chiếu rạp 2010</a></li>
                    <li><a title="Phim chiếu rạp 2009" href="{$blocklinks.phim_chieu_rap}?year=2009"><i class="fa fa-circle-o"></i> Phim chiếu rạp 2009</a></li>
                    <li><a title="Phim chiếu rạp 2008" href="{$blocklinks.phim_chieu_rap}?year=2008"><i class="fa fa-circle-o"></i> Phim chiếu rạp 2008</a></li>
                    <li><a title="Phim chiếu rạp 2007" href="{$blocklinks.phim_chieu_rap}?year=2007"><i class="fa fa-circle-o"></i> Phim chiếu rạp 2007</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-caret-square-o-right"></i> <span>Phim mới</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a title="Phim mới 2016" href="{$blocklinks.phim_2016}"><i class="fa fa-circle-o"></i> Phim mới 2016</a></li>
                    <li><a title="Phim mới 2015" href="{$blocklinks.phim_2015}"><i class="fa fa-circle-o"></i> Phim mới 2015</a></li>
                    <li><a title="Phim mới 2014" href="{$blocklinks.phim_2014}"><i class="fa fa-circle-o"></i> Phim mới 2014</a></li>
                    <li><a title="Phim mới 2013" href="{$blocklinks.phim_2013}"><i class="fa fa-circle-o"></i> Phim mới 2013</a></li>
                    <li><a title="Phim mới 2012" href="{$blocklinks.phim_2012}"><i class="fa fa-circle-o"></i> Phim mới 2012</a></li>
                    <li><a title="Phim mới 2011" href="{$blocklinks.phim_2011}"><i class="fa fa-circle-o"></i> Phim mới 2011</a></li>
                    <li><a title="Phim mới 2010" href="{$blocklinks.phim_2010}"><i class="fa fa-circle-o"></i> Phim mới 2010</a></li>
                    <li><a title="Phim mới 2009" href="{$blocklinks.phim_2009}"><i class="fa fa-circle-o"></i> Phim mới 2009</a></li>
                    <li><a title="Phim mới 2008" href="{$blocklinks.phim_2008}"><i class="fa fa-circle-o"></i> Phim mới 2008</a></li>
                </ul>
            </li>
            <li>
                <a href="{$url_base}the-loai/phim-thuyet-minh/">
                    <i class="fa fa-sun-o"></i> <span>Phim thuyết minh</span>
                    <small class="label pull-right bg-green">new</small>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
<c:if is="$route_name == 'home'">
    <div class="container item-carousel-block">
        <nav id="slider-nav" class="clear">
            <c:include template="carousel" />
            <div class="clear"></div>
        </nav>
    </div>

    <section class="content item-tab-film">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Phim lẻ mới</a></li>
                <li><a href="#tab_2" data-toggle="tab">Phim bộ mới</a></li>
                <li><a href="#tab_3" data-toggle="tab">Phim bộ Full</a></li>
            </ul>
            <div id="sub-title" class="clear"><div class="col-name-left">Tên Phim</div><div class="col-episode">Tập</div></div>
            <div class="clearfix tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="phim_le_moi_cap_nhat">
                        <div id="primary-nav">
                            <div class="x66x69 flist-item">
                                <ul class="x4Cx69">
                                    <c:each from="$phim_le_moi_cap_nhat" value="$film">
                                        <li style="background:none;border-bottom:1px dashed #777">
                                            <a href="{$film.link}" title="{$film.title}">
                                                <span class="episode statusx-grid">{$film.status}</span>
                                                <div class="iconImgar">
                                                    <c:if is="{$film.small_url} != NULL">
                                                        <img src="{$cache_link_img}{$film.small_url}" alt="{$film.title}">
                                                        <c:else />
                                                        <img src="{$cache_link_img}{$film.small_url_o}" alt="{$film.title}">
                                                    </c:if>
                                                </div>

                                                <div class="Fmeta">
                                                    <span class="name-vn link">
                                                        {$film.title}
                                                    </span>
                                                    <span class="name-en link">
                                                        {$film.title_o}
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                    </c:each>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    <div class="phim-bo-moi">
                        <div id="secondary-nav">
                            <div class="x66x69 flist-item">
                                <ul class="x4Cx69">
                                    <c:each from="$phim_bo_moi" value="$film">
                                        <li style="background:none;border-bottom:1px dashed #777">
                                            <a href="{$film.link}" title="{$film.title}">
                                                <span class="episode statusx-grid">{$film.status}</span>
                                                <div class="iconImgar">
                                                    <c:if is="{$film.small_url} != NULL">
                                                        <img src="{$cache_link_img}{$film.small_url}" alt="{$film.title}">
                                                        <c:else />
                                                        <img src="{$cache_link_img}{$film.small_url_o}" alt="{$film.title}">
                                                    </c:if>
                                                </div>

                                                <div class="Fmeta">
                                                    <span class="name-vn link">
                                                        {$film.title}
                                                    </span>
                                                    <span class="name-en link">
                                                        {$film.title_o}
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                    </c:each>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
                    <div id="third-nav">
                        <div class="x66x69 flist-item">
                            <ul class="x4Cx69">
                                <c:each from="$phim_bo_full" value="$film">
                                    <li style="background:none;border-bottom:1px dashed #777">
                                        <a href="{$film.link}" title="{$film.title}">
                                            <span class="episode statusx-grid">{$film.status}</span>
                                            <div class="iconImgar">
                                                <c:if is="{$film.small_url} != NULL">
                                                    <img src="{$cache_link_img}{$film.small_url}" alt="{$film.title}">
                                                    <c:else />
                                                    <img src="{$cache_link_img}{$film.small_url_o}" alt="{$film.title}">
                                                </c:if>
                                            </div>

                                            <div class="Fmeta">
                                                    <span class="name-vn link">
                                                        {$film.title}
                                                    </span>
                                                    <span class="name-en link">
                                                        {$film.title_o}
                                                    </span>
                                            </div>
                                        </a>
                                    </li>
                                </c:each>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- nav-tabs-custom -->
    </section>

    <section class="content item-tab-film">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_4" data-toggle="tab">Sắp chiếu</a></li>
                <li><a href="#tab_5" data-toggle="tab">Phim lẻ Hot tuần</a></li>
                <li><a href="#tab_6" data-toggle="tab">Phim bộ Hot tuần</a></li>
            </ul>
            <div id="sub-title" class="clear"><div class="col-name-left">Tên Phim</div><div class="col-episode">Tập</div></div>
            <div class="clearfix tab-content">
                <div class="tab-pane active" id="tab_4">
                    <div class="phim_le_moi_cap_nhat">
                        <div id="primary-nav">
                            <div class="x66x69 flist-item">
                                <ul class="x4Cx69">
                                    <c:each from="$top_phim_trailer" value="$film">
                                        <li style="background:none;border-bottom:1px dashed #777">
                                            <a href="{$film.link}" title="{$film.title}">
                                                <span class="episode statusx-grid">{$film.status}</span>
                                                <div class="iconImgar">
                                                    <c:if is="{$film.small_url} != NULL">
                                                        <img src="{$cache_link_img}{$film.small_url}" alt="{$film.title}">
                                                        <c:else />
                                                        <img src="{$cache_link_img}{$film.small_url_o}" alt="{$film.title}">
                                                    </c:if>
                                                </div>

                                                <div class="Fmeta">
                                                    <span class="name-vn link">
                                                        {$film.title}
                                                    </span>
                                                    <span class="name-en link">
                                                        {$film.title_o}
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                    </c:each>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_5">
                    <div class="phim-bo-moi">
                        <div id="secondary-nav">
                            <div class="x66x69 flist-item">
                                <ul class="x4Cx69">
                                    <c:each from="$top_le_views_week" value="$film">
                                        <li style="background:none;border-bottom:1px dashed #777">
                                            <a href="{$film.link}" title="{$film.title}">
                                                <span class="episode statusx-grid">{$film.status}</span>
                                                <div class="iconImgar">
                                                    <c:if is="{$film.small_url} != NULL">
                                                        <img src="{$cache_link_img}{$film.small_url}" alt="{$film.title}">
                                                        <c:else />
                                                        <img src="{$cache_link_img}{$film.small_url_o}" alt="{$film.title}">
                                                    </c:if>
                                                </div>

                                                <div class="Fmeta">
                                                    <span class="name-vn link">
                                                        {$film.title}
                                                    </span>
                                                    <span class="name-en link">
                                                        {$film.title_o}
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                    </c:each>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_6">
                    <div id="third-nav">
                        <div class="x66x69 flist-item">
                            <ul class="x4Cx69">
                                <c:each from="$top_bo_views_week" value="$film">
                                    <li style="background:none;border-bottom:1px dashed #777">
                                        <a href="{$film.link}" title="{$film.title}">
                                            <span class="episode statusx-grid">{$film.status}</span>
                                            <div class="iconImgar">
                                                <c:if is="{$film.small_url} != NULL">
                                                    <img src="{$cache_link_img}{$film.small_url}" alt="{$film.title}">
                                                    <c:else />
                                                    <img src="{$cache_link_img}{$film.small_url_o}" alt="{$film.title}">
                                                </c:if>
                                            </div>

                                            <div class="Fmeta">
                                                    <span class="name-vn link">
                                                        {$film.title}
                                                    </span>
                                                    <span class="name-en link">
                                                        {$film.title_o}
                                                    </span>
                                            </div>
                                        </a>
                                    </li>
                                </c:each>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- nav-tabs-custom -->
    </section>
</c:if>

<c:if is="$route_name == 'film' || $route_name == 'watch'">
<section class="item-breadcrumb content-header blocktitle breadcrumbs" itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="">
    <div class="breadcrumb">
        <ol>
            <li class="item" itemtype="http://data-vocabulary.org/Breadcrumb" itemscope>
                <a href="{$url_base}" title="{$web_title}" itemprop="url"><i class="fa fa-home"></i> <span itemprop="title">Trang chủ</span></a>
            </li>

            <c:if is="$route_name != 'film' || $route_name != 'watch'"><i class="icon arrow"></i></c:if>

            <c:if is="{$filminfo.type} == 1">
                <i class="icon arrow"></i>
                <li class="item" itemtype="http://data-vocabulary.org/Breadcrumb" itemscope>
                    <a href="{$blocklinks.phim_le}" title="Phim lẻ" itemprop="url"><span itemprop="title">Phim lẻ</span></a>
                </li>
                <c:else />
                <li class="item" itemtype="http://data-vocabulary.org/Breadcrumb" itemscope>
                    <a href="{$blocklinks.phim_bo}" title="Phim bộ" itemprop="url"><span itemprop="title">Phim bộ</span></a>
                </li>
            </c:if>

            <c:if is="$route_name == 'film' || $route_name == 'watch'">
                <i class="icon arrow"></i>
                <li class="item" itemtype="http://data-vocabulary.org/Breadcrumb" itemscope>
                    <a href="{$filminfo.country.link}" title="Phim {$filminfo.country.name}"><span itemprop="title">{$filminfo.country.name}</span></a>
                </li>
            </c:if>

            <i class="icon arrow"></i>
            <li><h2 class="split active item">
                <a href="{$filminfo.link}" title="{$filminfo.title}"><span title="{$filminfo.title}">{$filminfo.title}</span></a>
            </h2></li>

            <c:if is="$route_name == 'watch'">
                <i class="icon arrow"></i>
                <li class="active item last-child">
                    <span>Server {$filminfo.episode.server_title} - {$filminfo.episode.name}<c:if is="{$filminfo.check_trailer} == 1">Trailer</c:if></span>
                </li>
            </c:if>
        </ol>
        <div class="clear"></div>
    </div>
</section>
</c:if>
<script type="text/javascript">
AppPack.Public.init();
</script>
<!-- END: body -->