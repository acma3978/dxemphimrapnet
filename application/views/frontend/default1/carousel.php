<?php defined('SYSPATH') or die('No direct script access.'); ?>

<!-- BEGIN: carousel -->
<c:if is="$route_name == 'home'">
<div class="block-title-top">
                <div class="stars"> <i></i> <i></i> <i></i> <span class="hidden-xs"><i></i> <i></i></span> </div>
                <div class="title-film-hot">Phim hay nhất</div>
                <div class="stars"> <i></i> <i></i> <i></i> <span class="hidden-xs"><i></i> <i></i></span> </div>
            </div>
            <div class="container item-carousel-block">
                <nav id="slider-nav" class="clear">
                    
                    
<div class="list-films film-hot">
         
            <ul id="film_hot" class="relative">
            <c:each from="$phim_hot" value="$film">
                                    <li class="item" title="{$film.title}">
                        <span class="label">{$film.status}</span>
                                                   <span class="label-quality">{$film.status}</span>
                                                                        <a title="{$film.title}" href="{$film.link}">
                

                           <c:if is="{$film.image_url} != NULL">
                                    <img class="img-film" src="{$cache_link_img}{$film.image_url}" title="{$film.title}" alt="{$film.title}">
                                    <c:else />
                                    <img class="img-film" src="{$cache_link_img}{$film.image_url_o}" title="{$film.title}" alt="{$film.title}">
                                </c:if>

                           <div class="text absolute">
                              <span class="title" >{$film.title}</span>
                           </div>
                           
                        </a>
                     </li>
                                       
                                       </c:each>
                              </ul>
            
         </div>
<div class="clear"></div>
                </nav>
                <div class="clear"></div>
            </div>
</c:if>
<!-- END: carousel -->