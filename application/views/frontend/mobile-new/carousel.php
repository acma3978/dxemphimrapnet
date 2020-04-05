<?php defined('SYSPATH') or die('No direct script access.'); ?>

<!-- BEGIN: carousel -->


<div class="list-films film-hot">
         <h2 class="title-box"><i class="fa fa-star-o"></i><a title="Phim hot" href="/danh-sach/phim-hot.html">Phim hot</a></h2>
            <ul id="film_hot" class="relative">
            <c:each from="$phim_moi_cap_nhat" value="$film">
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
         

    

    <!-- END: carousel -->