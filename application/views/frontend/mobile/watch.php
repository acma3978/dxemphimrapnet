<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!-- BEGIN: watch -->
<div class="main-content" id="player-video">
    <div class="top-content">

<div  itemscope="" itemtype="http://schema.org/Product">
                        <meta itemprop="image" content="{$cache_link_img}{$filminfo.imagefan}">
            <meta itemprop="description" content="{$page_description}">
<div class="left-content-player ">
                <div class="block context-menu-one box-player" id="media">
                   
                    
                    

    
    
                        <div id="mediaplayer">
                            <div id="player"></div>
                            <script id="jwsource" type="text/javascript">

                                jwplayer.setup = {$filminfo.setup_jwplayer}
                            </script>
                        </div>
                    
    
    

             
                </div>
                <div id="page-watch" class="div-control" data-film-id="{$filminfo.film_id}" data-title="{$filminfo.title}">
                    <div class="block-episode">
                        <div class="serverlist">
                        <c:each from="$server_cache" key="$server_id" value="$server">
                        <div class="server">
                        <div class="list_carousel clear">
                            <div class="label"><i class="icon media-icon-server"></i>{$server.title} <!--<i class="icon media-server server-{$server.flag}"></i>--></div>
                            <ul class="mega-carousel episodelist padding-z">
                                <c:each from="$episode_cache[$server_id]" value="$episode">
                                    <li><a data-type="{$server.type}" data-episode-id="{$episode.episode_id}" href="{$episode.link}" <c:if is="{$admin} == '1' || {$admin} == '2'">title="Server: {$server.title} - Tập {$episode.name} - Link: {$episode.video_url}"<c:else />title="Tập {$episode.name} - {$server.title}"</c:if> <c:if is="{$episode.is_current}"> class="active"</c:if>>{$episode.name}</a></li>
                                </c:each>
                            </ul>

                            <!--<a id="prevTop" class="prev-play-{$server_id}" rel="nofollow" style="display: block;">
                                <span class="arrow-icon left"></span>
                            </a>
                            <a id="nextTop" class="next-play-{$server_id" rel="nofollow" style="display: block;">
                                <span class="arrow-icon right"></span>
                            </a>-->
                        </div><!--end.list_carousel-->
                    </div><!--end.server-->
                </c:each>


            </div><!--end.serverlist-->

                    </div><!--end.block-episode-->
                </div>
       
             <div class="details">
                  <a href="{$filminfo.link}" class="name">
                      <h1 itemprop="name">{$filminfo.title}</h1> 
                                          <div class="clear"></div>
                      <h2 class="real-name">{$filminfo.title_o} ({$filminfo.year})</h2>
                      
                   </a>
                   <div class="clear"></div>
                
                <div class="control-box clear">
                    
                                                               <div class="note-browser clear">
                         - Sử dụng DNS 8.8.8.8, 8.8.4.4 hoặc  208.67.222.222, 208.67.220.220 để xem phim tốt hơn <br>
                                - Điện thoại, máy tính bảng xem tốt nhất với trình duyệt Google Chrome <br>
                                - Nếu thấy thích thì Like và share để cổ vũ Subteam và Website                        
                     </div>
                     
          
                    
                 </div>
                 <div class="clear"></div>
                 <div class="adspruce-bannerspot"></div>
                                    <div class="form-subscribe" id="div-subscribe" style="display:none;">
                      <div class="caption">
                                                  <span class="ques">Bạn có muốn nhận thông báo khi có bản đẹp ?</span>
                         <span class="show-form btn btn-danger" id="link-subscribe"><i class="fa fa-envelope-o"></i> Theo dõi</span>
                      </div>
                      <form id="form_subscribe">
                         <div class="col">
                            <input type="email" id="sub_email" name="sub_email" class="input" placeholder="Email">
                         </div>
                         <div class="col">
                            <input type="text" id="sub_name" name="sub_name" class="input" placeholder="Tên bạn">
                         </div>
                         <div class="col">
                            <input type="text" name="sub_captcha" class="input" id="captcha" placeholder="Mã bảo vệ">
                         </div>
                         <div class="col">
                            <img class="captcha" id="img_captcha" src="./Xem phim Cơ Trưởng Sully VietSub - Thuyết minh - HD _ Sully 2016_files/CaptchaSubscribe">
                            <i class="refresh-captcha fa fa-refresh" onclick="$(&#39;#img_captcha&#39;).attr(&#39;src&#39;,&#39;/site/CaptchaSubscribe&#39;);" title="Lấy mã khác"></i>
                         </div>
                         <div class="col">
                            <span class="btn btn-primary" id="btn_send"><i class="fa fa-caret-right"></i> Gửi</span>
                         </div>
                      </form>
                      <div class="message">Cám ơn bạn, PhimBatHu.com sẽ gửi email thông báo cho bạn khi có tập mới của phim Cơ Trưởng Sully</div>
                   </div> 
                                
             </div>
          </div> </div>

<div class="bottom-content">
      
      <div class="container">
         
         <div class="list-films film-related">
         <h3 class="title-box"><i class="fa fa-star-o"></i><a href="javascript:void(0)">Phim đề cử</a></h3>
<ul id="film_related" class="relative owl-carousel owl-theme">
         <c:each from="$phim_related_title" value="$film">
                                    <li class="item" title="{$film.title}">
                        <span class="label">{$film.status}</span>
                                                   
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
            
         </div> <!-- End film hot-->
         
           <div id="box-comment" class="fix-row">
        <div class="tabs" data-target="#i-comment">
            <div class="tab tab-title active" data-name="item-facebook-comment">Facebook</div>
            <div class="tab tab-title" data-name="item-google-comment">Google+</div>
        </div>
        <div class="clear"></div>
        <div id="i-comment" class="_4-u3 i-comment">

            <div class="tab item-facebook-comment">
                <div class="fb-comments" data-href="{$filminfo.link}" data-colorscheme="dark" data-width="810" data-order-by="reverse_time"></div>
            </div><!--end.item-facebook-comment-->

            <div class="tab item-google-comment hide">
                <div id="g-comments" class="g-comments" data-width="810"></div>
            </div><!--end.item-google-comment-->

        </div><!--end#i-comment-->
        
    </div><!--end#box-comment-->

          <div id="item-tags" class="tags">
                        
                        <div class="items">
                        <span class="label">Từ khóa: </span>
                            <h2 class="inline"><a href="{$filminfo.link_tag}" title="{$filminfo.title}">{$filminfo.title}</a></h2>,

                            <c:each from="{$filminfo.tags_link}" value="$tag">
                                <h3 class="inline"><a href="{$tag.link}" title="{$tag.title}" rel="tag">{$tag.title}</a>
                                    <c:if is="!{$tag.is_last}">, </c:if>
                                </h3>
                            </c:each>

                        </div>

                        <div class="more-block _4-u3 padding" style="padding-bottom:0">
                        <h4>
                            <c:if is="{$filminfo.type} == 1">
                                Xem phim {$filminfo.title} - {$filminfo.title_o}, <strong>{$filminfo.title}</strong>, {$filminfo.title} Full HD, <strong>{$filminfo.title} thuyết minh</strong>, {$filminfo.title} lồng tiếng, {$filminfo.title} Vietsub, {$filminfo.title} bản đẹp, {$filminfo.title} bản cam, {$filminfo.title} chiếu rạp, {$filminfo.title} phụ đề, {$filminfo.title} hậu trường, {$filminfo.title} tập mới, {$filminfo.title} phần mới, {$filminfo.title} {$filminfo.year}, {$filminfo.title_o} {$filminfo.year}, {$filminfo.title} {$filminfo.country.name}, {$filminfo.title_o} {$filminfo.country.name}, xem phim {$filminfo.title_o} {$filminfo.country.name}, phim {$filminfo.title_o} {$filminfo.country.name}, {$filminfo.title_o} {$filminfo.country.name} {$filminfo.year}, {$filminfo.country.name} {$filminfo.year}, phim {$filminfo.country.name} năm {$filminfo.year}, {$filminfo.title} {$filminfo.status}
                                <c:else /> {$filminfo.title} trọn bộ, {$filminfo.title} Vietsub, {$filminfo.title} tập cuối, {$filminfo.title} Vietsub thuyết minh, {$filminfo.title} lồng tiếng, {$filminfo.title} Full hd, {$filminfo.title} bản đẹp, Hậu trường {$filminfo.title}, trailer {$filminfo.title}, {$filminfo.title} phụ đề Xem phim {$filminfo.title_o}, {$filminfo.title} {$filminfo.year}, {$filminfo.title} tập mới, {$filminfo.title} phần mới, {$filminfo.title} phụ đề, {$filminfo.title_o} {$filminfo.year}, {$filminfo.title} {$filminfo.country.name}, {$filminfo.title_o} {$filminfo.country.name}, , phim {$filminfo.title_o} {$filminfo.country.name}, {$filminfo.title_o} {$filminfo.country.name} {$filminfo.year}, {$filminfo.country.name} {$filminfo.year}, phim {$filminfo.country.name} năm {$filminfo.year}, {$filminfo.title} {$filminfo.status}
                                <c:if is="{$split_timeLine.split}">,
                                    <c:each from="{$split_timeLine.split}" value="$timeline"> {$timeline}</c:each>
                                </c:if>
                            </c:if>
                        </h4>
                    </div>
                    </div>         
      </div>
   </div>
          </div></div>

<script type="text/javascript">

AppPack.Watch.init('{$filminfo.film_id}');
    <c:if is="!{$filminfo.is_newtab}">
    AppPack.Watch.checkAndPlayEpisodeViewing();
    </c:if>
</script>
<!-- END: watch -->