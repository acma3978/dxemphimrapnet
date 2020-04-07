<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!-- BEGIN: content -->
<div id="content" class="col-lg-9 clear" style="padding-left:0">
   <div id="page-watch" data-film-id="{$filminfo.film_id}">
      <c:if is="$route_name">
         <div class="blocktitle breadcrumbs">
            <div class="item" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
               <a href="{$url_base}" title="{$web_title}" itemprop="url"><span itemprop="title">Xem Phim</span></a>
            </div>
            <c:if is="{$filminfo.type} == 1">
               <div class="item" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                  <a href="{$blocklinks.phim_le}" title="Phim lẻ" itemprop="url"><span itemprop="title">Phim lẻ</span></a>
               </div>
               <c:else />
               <div class="item" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                  <a href="{$blocklinks.phim_bo}" title="Phim bộ" itemprop="url"><span itemprop="title">Phim bộ</span></a>
               </div>
            </c:if>
            <h2 class="item" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
               <a href="{$url_canonical}" title="{$filminfo.title}" itemprop="url">
                  <span title="{$filminfo.title}" itemprop="title">
                     <c:if is="$route_name == 'content'">Nội dung </c:if>
                     {$filminfo.title}
                  </span>
               </a>
            </h2>
         </div>
         <!--/.breadcrumbs-->
      </c:if>
      <div id="profile-media">
         <div class="profile-media-img colz-md-4" style="padding:0">
            <c:if is="{$filminfo.thumb_url} != NULL">
               <img src="{$cache_link_img}{$filminfo.thumb_url}" alt="{$film.title}">
               <c:else />
               <img src="{$cache_link_img}{$filminfo.thumb_url_o}" alt="{$film.title}">
            </c:if>
         </div>
         <div class="media-watch-player colz-md-6" style="padding-right:0">
            <div class="profile-media-content">
               <div class="media_content_page">
                  <c:if is="{$filminfo.pagetext2}!=''">
                     {$filminfo.short_pagetext2}
                     <c:else />
                     {$filminfo.short_pagetext}
                  </c:if>
               </div>
               <!--end.tbhd_page-->
               <div class="media-button-more"><a href="{$filminfo.link}">[Xem thêm]</a></div>
            </div>
            <div class="profile-media-status bg-profile-film clear">
               <ol>
                  <li><i class="icon icon-op i-status"></i><label>Trạng thái:</label><label class="red"> {$filminfo.status}</label></li>
                  <li><i class="icon icon-op i-views"></i>{$filminfo.views_format}</li>
                  <li><i class="icon icon-op i-year"></i><label>Năm:</label> {$filminfo.year}</li>
                  <li><i class="icon icon-op i-country"></i><label>Quốc gia:</label> <a href="{$filminfo.country.link}" title="Phim {$filminfo.country.name}"> {$filminfo.country.name}</a></li>
               </ol>
            </div>
         </div>
      </div>
      <!--end#profile-media-->
      <div class="box-rating clear">
         <!--<div class="rating-star"></div>-->
         <div class="rating-stats">
            <div class="like-stats">
               <i class="icon i-like-stats" title="Lượt thích {$filminfo.liked_format}"></i>
               <span class="votes">{$filminfo.liked_format}</span>
            </div>
         </div>
         <div class="rating-button">
            <!--<span class="fb-like like-at-rating" data-href="{$filminfo.link}" data-width="60" data-layout="box_count" data-action="like" data-show-faces="false" data-share="true"></span>-->
            <span class="fb-like" data-href="{$url_canonical}" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></span>
            <span class="g-plusone" data-size="medium">
         </div>
         <div>
            <a href="http://www.facebook.com/share.php?u={$url_canonical}" class="azm-social azm-size-48 azm-r-square azm-facebook"><i class="fa fa-facebook"></i></a>
            <a href="https://twitter.com/intent/tweet?original_referer={$url_canonical}&amp;text=Xem phim {$filminfo.title} - TronBoHD.com cực hay nhé các bạn! {$url_canonical}&amp;tw_p=tweetbutton&amp;url=" class="azm-social azm-size-48 azm-r-square azm-twitter"><i class="fa fa-twitter"></i></a>
            <a href="https://plus.google.com/share?url={$url_canonical}" class="azm-social azm-size-48 azm-r-square azm-google-plus"><i class="fa fa-google-plus"></i></a>
            <a href="#" class="azm-social azm-size-48 azm-r-square azm-linkedin"><i class="fa fa-linkedin"></i></a>
            <a href="#" class="azm-social azm-size-48 azm-r-square azm-pinterest"><i class="fa fa-pinterest"></i></a>
         </div>
      </div>
   </div>
   <div class="detail">
      <div class="blocktitle title-ik">
         <div class="main-title title-ik-actor">
            <p>Diễn viên</p>
            <span>Diễn viên trong bộ phim phim {$filminfo.title}</span>
         </div>
      </div>
      <div class="tabs-actor" id="item-actors">
         <div class="tab actor">(Hiện đang cập nhập tính năng này)</div>
      </div>
      <div class="blocktitle title-ik">
         <div class="main-title title-ik-content">
            <p>Nội dung phim</p>
            <span>Cảm nhận nội dung phim <strong>{$filminfo.title}</strong></span>
         </div>
      </div>
      <div class="tabs-content" id="info-film">
         <div class="tab text">
            <h1>Nội dung phim {$filminfo.title}</h1>
            <c:if is="{$filminfo.pagetext2}!=''">
               {$filminfo.pagetext2}
               <c:each from="{$hinhanh}" key="{$key}" value="{$anh}">
                  <img src="{$anh}" alt="Nội dung {$filminfo.title}, {$filminfo.title}">
               </c:each>
               <c:else />
               <div class="no-results">Chưa có dữ liệu</div>
            </c:if>
         </div>
         <div id="item-tags" class="tags">
            <span class="label">Từ khóa: </span>
            <h3 class="items">
               <c:each from="{$filminfo.tags_link}" value="$tag">
                  <a href="{$tag.link}" title="{$tag.title}" rel="tag">{$tag.title}</a>
                  <c:if is="!{$tag.is_last}">, </c:if>
               </c:each>
            </h3>
         </div>
      </div>
      <div class="blocktitle title-ik">
         <div class="main-title title-ik-comment">
            <p>Bình luận</p>
            <span>Bạn có thể bình luận thoải mái</span>
         </div>
      </div>
      <div id="box-comment">
         <div class="tabs" data-target="#i-comment">
            <div class="tab tab-title active" data-name="item-facebook-comment">Facebook</div>
            <div class="tab tab-title" data-name="item-google-comment">Google+</div>
         </div>
         <div id="i-comment" class="i-comment clear">
            <div class="tab item-facebook-comment">
               <div id="fb-root"></div>
               <div class="fb-comments" data-href="{$url_base}{$filminfo.link}" data-width="685" data-colorscheme="light"></div>
            </div>
            <!--end.item-facebook-comment-->
            <div class="tab item-google-comment hide">
               <div id="g-comments" class="g-comments" data-width="685"></div>
            </div>
            <!--end.item-google-comment-->
         </div>
         <!--end#i-comment-->
         <div class="clear"></div>
      </div>
      <!--end#box-comment-->
      <div class="blocktitle title-ik">
         <div class="main-title title-ik-category">
            <p>Phim cùng chuyên mục</p>
            <span>Có thể bạn muốn xem</span>
         </div>
      </div>
   </div>
   <!--end.detail-->
   <div id="item-category" class="rows">
      <ol>
         <c:each from="$phim_category" value="$film">
            <li class="col-md-4 items-category thumbnail" style="padding-right:0;">
               <a href="{$film.link}" title="{$film.title}">
                  <c:if is="{$film.thumb_url} != NULL">
                     <img class="thumbImg" src="{$cache_link_img}{$film.thumb_url}" alt="{$film.title}">
                     <c:else />
                     <img class="thumbImg" src="{$cache_link_img}{$film.thumb_url_o}" alt="{$film.title}">
                  </c:if>
               </a>
               <span class="status">{$film.status}</span>
               <span class="i-episode">{$film.timeline}</span>
               <div class="info">
                  <a href="{$film.link}" title="{$film.title}">
                  <span class="name-vn">{$film.short_title}</span>
                  <span class="name-en">{$film.short_title_o}</span>
                  </a>
               </div>
            </li>
         </c:each>
      </ol>
   </div>
</div>
<!--end#content-->
<div class="col-lg-3" style="padding:0">
   <div class="widget">
      <span class="title">Nội dung liên quan</span>
      <div class="wrapper_content">
         <div class="item slimScroll">
            <c:each from="$phim_category" value="$film">
               <c:if is="{$film.pagetext2} != NULL">
                  <a href="{$film.link_nd}" title="Phim {$film.title}">
                     <c:else />
                  <a href="{$film.link}" title="Phim {$film.title}">
               </c:if>
               <div class="info_film_content">
               <span class="film_in_vn">{$film.title}</span>
               <span class="film_in_en">{$film.title_o}</span>
               </div>
               <c:if is="{$film.imagefan} != NULL">
               <img src="{$cache_link_img}{$film.imagefan}" alt="{$film.title}">
               <c:else />
               <img src="{$url_base}theme/frontend/default/images/content_update.jpg" alt="{$film.title}">
               </c:if>
               </a>
               <div class="views">
                  <i class="icon icon-op i-views"></i> {$film.views} lượt xem
               </div>
               <div class="content">
                  <c:if is="{$film.pagetext2} != NULL">
                     {$film.mini_pagetext2}
                     <c:else />
                     {$film.mini_pagetext}
                  </c:if>
               </div>
            </c:each>
            <div class="clear"></div>
         </div>
      </div>
   </div>
</div>
<!-- END: content -->