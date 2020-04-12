<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!-- BEGIN: body -->
<body>
   <div id="header" class="f_main_top_header">

       <div id="f_header">
           <div class="container">

               <div class="pt-3">

                   <c:if is="$route_name == 'home' || $route_name == 'watch'">
                       <div id="logo" class="float-left col-md-3 position-relative"><a href="{$url_base}" title="{$page_title}" id="f_alogo"><i id="f_logo" class="f_icon"></i></a></div>
                       <c:else />
                       <div id="logo"></div>
                   </c:if>

                   <div id="f_search" class="float-left col-md-4">

                       <span class="fa fa-search"></span>
                       <form class="f_block_search" method="get" action="#">
                           <input type="text" placeholder="Tìm phim | Diễn viên mà bạn thích..." class="keyword" <c:if is="{$search_info.keyword}"> value="{$search_info.keyword}"</c:if>>
                           <button type="submit" class="submit"></button>
                       </form>
                       <!--<div id="f_search_keyword"><label>Từ khóa: </label><span>Chuyện mai tính, spiderman</span></div>-->
                   </div>

                   <!--/.search-->
                   <!--         <div id="sign">-->
                   <!--            <c:include template="sign_panel" />-->
                   <!--         </div>-->

                   <div id="f_block_panel" class="float-left col-md-4 pt-1">
                       <!--<ol class="float-left">-->
                       <!--<li><a href="#">Video</a></li>-->
                       <!--<li><a href="#">Tin tức</a></li>-->
                       <!--</ol>-->
                       <div class="btn-group ml-3">

                           <button type="button" class="btn btn-secondary"><i class="fas fa-user-circle"></i>Login</button>
                           <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <span class="sr-only">Toggle Dropdown</span>
                           </button>
                           <ul class="dropdown-menu login-box" aria-labelledby="userInfo">
                               <li class="facebook box-shadow">
                                   <a rel="nofollow" onclick="javascript:window.location.href='https://xemphimso.tv/api/v1/users/0/FBLogin?state=Lw==&amp;ip=2402:800:63ba:fe45:1963:8083:daa4:62e'" title="Login with facebook" style="color: #fff;cursor: pointer;"><i class="hl-facebook"></i> Login with <span>facebook</span></a>
                               </li>
                               <li class="google box-shadow">
                                   <a rel="nofollow" onclick="javascript:window.location.href='https://xemphimso.tv/api/v1/users/0/GoLogin?state=Lw==&amp;ip=2402:800:63ba:fe45:1963:8083:daa4:62e'" title="Login with google" style="color: #fff;cursor: pointer;"><i class="hl-gplus"></i> Login with <span>google</span></a>
                               </li>
                           </ul>
                       </div>
                   </div>

                   <div class="clearfix"></div>
               </div>
           </div>

       </div>

       <nav id="f_navbar">
           <div class="container">
               <ul id="f_navmenu" class="topmenu">

                   <li class="topmenu"><a title="<?php echo Light_Application::APP?>" href="{$url_base}"><img src="./CSS menu creator_files/home1.png" alt="">Trang Chủ</a></li>

                   <li class="topmenu"><a href="https://css3menu.com/neoteric-dark-red.html#"><span><img src="./CSS menu creator_files/info.png" alt="">Thể loại</span></a>
                       <ul>
                           <c:each from="$category_cache" value="$category">
                               <li><a href="{$category.link}" title="Phim {$category.title}"><span><img src="./CSS menu creator_files/hammer(1).png" alt="">Phim lẻ</span>Phim {$category.title}</a></li>
                           </c:each>
                       </ul>
                   </li>

                   <li class="topmenu"><a href="https://css3menu.com/neoteric-dark-red.html#"><span><img src="./CSS menu creator_files/heart.png" alt="">Quốc gia</span></a>
                       <ul>
                           <c:each from="$country_cache" value="$country">
                               <li><a href="{$country.link}" title="Phim {$country.name}"><img src="./CSS menu creator_files/add.png" alt="">Phim {$country.name}</a></li>
                           </c:each>
                       </ul>
                   </li>

                   <li class="topmenu"><a href="https://css3menu.com/neoteric-dark-red.html#"><span><img src="./CSS menu creator_files/heart.png" alt="">Phim lẻ</span></a>
                       <ul>
                           <li><a href="https://css3menu.com/neoteric-dark-red.html#"><img src="./CSS menu creator_files/add.png" alt="">Android template</a></li>
                           <li><a href="https://css3menu.com/neoteric-dark-red.html#"><img src="./CSS menu creator_files/add1.png" alt="">Mac template</a></li>
                           <li><a href="https://css3menu.com/neoteric-dark-red.html#"><span><img src="./CSS menu creator_files/add2.png" alt="">Mercury template</span></a></li>
                           <li><a href="https://css3menu.com/neoteric-dark-red.html#"><img src="./CSS menu creator_files/add3.png" alt="">Elegant template</a></li>
                           <li><a href="https://css3menu.com/neoteric-dark-red.html#"><span><img src="./CSS menu creator_files/add4.png" alt="">Point template</span></a></li>
                           <li><a href="https://css3menu.com/neoteric-dark-red.html#"><img src="./CSS menu creator_files/add5.png" alt="">Toolbars template</a></li>
                       </ul>
                   </li>
                   <li class="topmenu"><a href="https://css3menu.com/neoteric-dark-red.html#"><img src="./CSS menu creator_files/shopping_basket.png" alt="">Phim bộ</a></li>
                   <li class="topmenu"><a href="https://css3menu.com/neoteric-dark-red.html#"><span><img src="./CSS menu creator_files/heart.png" alt="">Phim chiếu rạp</span></a>
                       <ul>
                           <li><a href="https://css3menu.com/neoteric-dark-red.html#"><img src="./CSS menu creator_files/add.png" alt="">Android template</a></li>
                           <li><a href="https://css3menu.com/neoteric-dark-red.html#"><img src="./CSS menu creator_files/add1.png" alt="">Mac template</a></li>
                           <li><a href="https://css3menu.com/neoteric-dark-red.html#"><span><img src="./CSS menu creator_files/add2.png" alt="">Mercury template</span></a></li>
                           <li><a href="https://css3menu.com/neoteric-dark-red.html#"><img src="./CSS menu creator_files/add3.png" alt="">Elegant template</a></li>
                           <li><a href="https://css3menu.com/neoteric-dark-red.html#"><span><img src="./CSS menu creator_files/add4.png" alt="">Point template</span></a></li>
                           <li><a href="https://css3menu.com/neoteric-dark-red.html#"><img src="./CSS menu creator_files/add5.png" alt="">Toolbars template</a></li>
                       </ul>
                   </li>
                   <li class="topmenu"><a href="https://css3menu.com/neoteric-dark-red.html#"><img src="./CSS menu creator_files/shopping_basket.png" alt="">Phim mới</a></li>
                   <li class="topmenu"><a href="https://css3menu.com/neoteric-dark-red.html#"><img src="./CSS menu creator_files/shopping_basket.png" alt="">Phim thuyết minh</a></li>
               </ul>
           </div>
       </nav>

       <c:if is="$route_name == 'home'">
           <c:include template="carousel" />
       </c:if>

<!--      <div class="container sub-main-header">-->
<!--         <dl class="col">-->
<!--            <dt></dt>-->
<!--               <dd><span class="btn-sm btn btn-primary" title="Yêu cầu phim dành cho bạn">Yêu cầu phim</span></dd> -->
<!--            <c:if is="$route_name == 'film' || $route_name == 'watch'">-->
<!--               <dt>Tên: </dt>-->
<!--               <dd>Phim {$filminfo.title} |</dd>-->
<!--               <dt><i class="icon icon-op i-status"></i>Trạng thái:</dt>-->
<!--               <dd class="stepem">-->
<!--                  <c:if is="{$filminfo.check_trailer} != '1'">-->
<!--                     <c:else />-->
<!--                     Trailer-->
<!--                  </c:if>-->
<!--                  <c:if is="{$filminfo.check_trailer} != '1'">-->
<!--                     {$filminfo.status}-->
<!--                     <c:else />-->
<!--                     Trailer-->
<!--                  </c:if>-->
<!--               </dd>-->
<!--            </c:if>-->
<!--         </dl>-->
<!--         <dl class="col2">-->
<!--            <dt>IP: </dt>-->
<!--            <dd> {$ip_client}</dd>-->
<!--         </dl>-->
<!--      </div>-->
   </div>

   <main class="body-wrap clearfix">

   <!--<div class="ad_location above_of_content container">{$ad_location.ad_above_of_content}</div>-->
   <c:if is="$route_name == 'home'">
      <!--end.black-block-->
      <c:include template="list-movies" />
   </c:if>
   <!-- END: body -->