<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!-- BEGIN: body -->
<body>
   <header id="header" class="main-header clear">
      <div class="nav-menu contaimain-headerner position">
          <div class="container">
         <c:if is="$route_name == 'home' || $route_name == 'watch'">
            <div id="logo"></div>
            <c:else />
            <div id="logo"></div>
         </c:if>
         <div id="search">
            <form method="get" action="#">
               <input type="text" placeholder="Nhập tên phim mà bạn muốn tìm..." class="keyword"
               <c:if is="{$search_info.keyword}"> value="{$search_info.keyword}"</c:if>
               >
               <button type="submit" class="submit"></button>
            </form>
         </div>
         <!--/.search-->
<!--         <div id="sign">-->
<!--            <c:include template="sign_panel" />-->
<!--         </div>-->
          </div>
      </div>
      <div class="container sub-main-header">
         <dl class="col">
            <!-- <dt></dt>
               <dd><span class="btn-sm btn btn-primary" title="Yêu cầu phim dành cho bạn">Yêu cầu phim</span></dd> -->
            <c:if is="$route_name == 'film' || $route_name == 'watch'">
               <dt>Tên: </dt>
               <dd>Phim {$filminfo.title} |</dd>
               <dt><i class="icon icon-op i-status"></i>Trạng thái:</dt>
               <dd class="stepem">
                  <c:if is="{$filminfo.check_trailer} != '1'">
                     <c:else />
                     Trailer
                  </c:if>
                  <c:if is="{$filminfo.check_trailer} != '1'">
                     {$filminfo.status}
                     <c:else />
                     Trailer
                  </c:if>
               </dd>
            </c:if>
         </dl>
         <dl class="col2">
            <dt>IP: </dt>
            <dd> {$ip_client}</dd>
         </dl>
      </div>
   </header>
   <nav class="w3-topnav w3-card-2 w3-slim topnav" id="nav">
      <div class="container position">
         <ul class="menu clear">
             <li><a class="icon home" title="<?php echo Light_Application::APP?>" href="{$url_base}"></a></li>
            <li style="width:80px;border-left:0">
               <a>Thể loại</a>
               <ul class="sub-menu">
                  <c:each from="$category_cache" value="$category">
                     <li class="prhd_li"><a href="{$category.link}" title="Phim {$category.title}">Phim {$category.title}</a></li>
                  </c:each>
               </ul>
            </li>
            <li style="width:85px">
               <a>Quốc gia</a>
               <ul class="sub-menu">
                  <c:each from="$country_cache" value="$country">
                     <li class="prhd_li"><a href="{$country.link}" title="Phim {$country.name}">Phim {$country.name}</a></li>
                  </c:each>
               </ul>
            </li>


            <li style="width:82px">
               <a href="{$blocklinks.phim_moi}" title="Phim mới">Phim mới</a>
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
            <!--<li><a href="{$url_base}{$blocklinks.dien-vien}" title="Diễn viên">Diễn viên</a></li>-->
            <li><a href="{$url_base}the-loai/phim-thuyet-minh/" title="Phim Thuyết Minh">Loạn luân</a>
             <li><a href="{$url_base}the-loai/phim-thuyet-minh/" title="Phim Thuyết Minh">Hiếp dâm</a>
             <li><a href="{$url_base}the-loai/phim-thuyet-minh/" title="Phim Thuyết Minh">Không che</a>
             <li><a href="{$url_base}the-loai/phim-thuyet-minh/" title="Phim Thuyết Minh">Châu âu</a>
             <li><a href="{$url_base}the-loai/phim-thuyet-minh/" title="Phim Thuyết Minh">Idol</a>
            </li>
<!--            <li>-->
<!--               <div class="well-large">-->
<!---->
<!--                   <c:include template="lightbox" />-->
<!---->
<!--                   <a data-toggle="modal" href="#form-content" class="btn btn-primary btn-large">Yêu cầu phim</a>-->
<!---->
<!--               </div>-->
<!---->
<!--               </li>-->
         </ul>
         <div class="clear"></div>
      </div>
   </nav>
   <!--<div class="ad_location above_of_content container">{$ad_location.ad_above_of_content}</div>-->
   <c:if is="$route_name == 'home'">
      <div class="black-block">
         <c:include template="carousel" />
      </div>
      <!--end.black-block-->
      <c:include template="list-film-wrapper" />
   </c:if>
   <!-- END: body -->