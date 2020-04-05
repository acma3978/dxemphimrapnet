<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!-- BEGIN: actor -->
<div id="main-box-actor">
   <header id="header-actor">
   </header>
   <!--end#header-actor-->
   <main id="wrapper-actor" class="container">
      <div class="col-lg-3 wg-idol-info">
         <div class="addon-idol-info">
            <a href="https://www.vietstar.net/dien-vien-angela-phuong-trinh"
               title="Angela Phương Trinh">
               <div class="idol-avatar">
                  <div class="avatar-circle">
                     <div>
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                           xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 175 175" style="enable-background:new 0 0 175 175;" xml:space="preserve">
                           <style
                              type="text/css">.st0 {
                              opacity: 0.2;
                              fill: #27b2f3;
                              enable-background: new;
                              }
                              .st1 {
                              fill: url(#SVGID_1_);
                              }
                           </style>
                           <g>
                              <g>
                                 <circle class="st0" cx="25.7" cy="30.3" r="5.1"></circle>
                              </g>
                              <circle class="st0" cx="25.7" cy="30.3" r="3.1"></circle>
                           </g>
                           <linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="107.6063"
                              y1="-2.4663" x2="87.6063" y2="86.8671">
                              <stop offset="0" style="stop-color:#FFFFFF;stop-opacity:0"></stop>
                              <stop offset="1" style="stop-color:#27b2f3"></stop>
                           </linearGradient>
                           <path class="st1"
                              d="M165,49.7c-11.8-24.2-33.4-40.3-57.6-46c-1.1-0.2-2.1,0.5-2.4,1.5c-0.2,1.1,0.5,2.1,1.5,2.4c23,5.5,43.5,20.7,54.9,43.8c18.6,38,5,84.5-31.2,106.4c-40.5,24.6-93.1,9.9-115.3-31.5C-2,94.8,3.9,57,26.9,31.9c0.8-0.8,0.7-2.1-0.1-2.9l0,0c-0.8-0.7-2-0.7-2.8,0.1C-0.1,55.4-6.3,95,11.4,128.1c23.2,43.3,78.4,58.8,120.9,33C170.2,138.2,184.5,89.5,165,49.7z"></path>
                        </svg>
                     </div>
                  </div>
                  <img class="img-circle"
                     src="https://cdn01.vietstar.net/150x150/avatar/dien-vien-angela-phuong-trinh.jpg">
               </div>
               <h1 class="idol-name">{$actorinfo.title}</h1>
            </a>
            <p class="follower">{$actorinfo.views_format} quan tâm</p>
            <div class="idol-btn">
               <button class="btn btn-halo btn-follow">Theo Dõi</button>
               <button class="btn btn-halo btn-community">Cộng Đồng</button>
            </div>
         </div>
         <div id="profile-item-rate"></div>
         <!--end#profile-item-rate-->
         <div class="addon-idol-related">
            <ul>
               <c:each from="$actor_related_title" value="$actor">
                  <li>
                     <a href="https://www.vietstar.net/hot-girl-ngoc-trinh">
                        <div class="media">
                           <div class="media-left media-middle"><img class="media-object img-circle" src="https://cdn01.vietstar.net/50x50/avatar/hot-girl-ngoc-trinh.jpg" alt=""></div>
                           <div class="media-body">
                              <h4 class="media-heading">{$actor.title}</h4>
                              <p>
                                 {$actor.views} quan tâm
                              </p>
                           </div>
                        </div>
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                     </a>
                  </li>
               </c:each>
            </ul>
         </div>
      </div>
      <!--end.col-lg-3-->
      <div class="col-lg-9">
         <div id="item-category" class="rows">
            <ol>
               <c:each from="$filminfo" value="$film">
                  <li class="col-md-4 items-category thumbnail" style="padding-right:0;">
                     <div class="item-film-inner">
                        <a href="{$film.link}" title="{$film.title}">
                           <c:if is="{$film.thumb_url} != NULL">
                              <img class="thumbImg" src="{$cache_link_img}{$film.thumb_url}" alt="{$film.title}">
                              <c:else />
                              <img class="thumbImg" src="{$cache_link_img}{$film.thumb_url_o}" alt="{$film.title}">
                           </c:if>
                           <div class="info">
                              <span class="split name-vn">{$film.title}</span>
                              <span class="split name-en">{$film.title_o}</span>
                           </div>
                           <span class="icon item-over_play"></span>
                        </a>
                     </div>
                     <span class="status">{$film.status}</span>
                     <span class="i-episode">{$film.timeline}</span>
                  </li>
               </c:each>
            </ol>
         </div>
      </div>
      <!--end.col-lg-9-->
   </main>
   <!--end#wrapper-actor-->
   <nav id="box-film-cate"></nav>
   <!--end#box-film-cate-->
   <footer id="footer-actor"></footer>
   <!--end#footer-actor-->
</div>
<!--end.main-box-actor-->
<!-- END: actor -->