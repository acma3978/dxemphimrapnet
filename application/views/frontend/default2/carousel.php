<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!-- BEGIN: carousel -->
<c:if is="$route_name == 'home'">
<!--   <div class="block-title-top">-->
<!--      <div class="stars"> <i></i> <i></i> <i></i> <span class="hidden-xs"><i></i> <i></i></span> </div>-->
<!--      <div class="title-film-hot">Phim hay nhất</div>-->
<!--      <div class="stars"> <i></i> <i></i> <i></i> <span class="hidden-xs"><i></i> <i></i></span> </div>-->
<!--   </div>-->


        <div class="container list-film top-movie-list">

      <nav class="owl-carousel owl-theme">

             <c:each from="$phim_hot" value="$film">

                 <div class="item" title="{$film.title}">
                     <span class="label">{$film.status}</span>
                     <a title="{$film.title}" href="{$film.link}">
                         <c:if is="{$film.image_url} != NULL">
                             <img class="img-film" src="{$cache_link_img}{$film.image_url}" title="{$film.title}" alt="{$film.title}">
                             <c:else />
                             <img class="img-film" src="{$cache_link_img}{$film.image_url_o}" title="{$film.title}" alt="{$film.title}">
                         </c:if>
                         <span class="play-icon"><i class="themeum-moviewplay"></i></span>
                         <div class="text absolute">
                             <span class="title" >{$film.title}</span>
                         </div>
                     </a>
                 </div>

             </c:each>

      </nav>

   </div>
</c:if>
<!-- END: carousel -->