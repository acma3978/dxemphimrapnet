<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!-- BEGIN: download -->
<div class="download black-block">
   <div class="box-film-player">
      <div class="movie-banner" style="background:url({$cache_link_img}{$filminfo.imagefan_url}) center center fixed;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;"></div>
      <!--end.movie-banner-->
   </div>
   <!--end.box-film-player-->
</div>


<div id="control_wrapper">
    <a id='auto_select' title='Automatically select the single row.'>Auto Select</a><b id=filter_help title='Click to see an example'>Filter<span class=help></span></b><input type="text"  id="filter"/><span id="info"></span><span id='error'></span>
</div>
<table id='req_header_row'>
    <tr></tr>
</table>
<div id="req_table_wrapper">
    <table id='req_table'></table>
</div>
<div id='details_wrapper'></div>

<main class="body-wrap download container clear">
<div class="position-rel block-con fontRoboto">
   <div class="col-lg-3-fix block-film-poster">
      <!-- <div class="picachu"></div>  -->
      <div class="poster-film position-aso">
         <c:if is="{$filminfo.image_url} != NULL">
            <c:if is="{$admin} == '1' || {$admin} == '2'">
               <div class="image-banner" style="background:#e1e1e1 url('{$filminfo.image_url}');background-size:cover"></div>
               <c:else />
               <div class="image-banner" style="background:#e1e1e1 url('{$cache_link_img}{$filminfo.image_url}');background-size:cover"></div>
            </c:if>
            <c:else />
            <c:if is="{$admin} == '1' || {$admin} == '2'">
               <div class="image-banner" style="background:#e1e1e1 url('{$filminfo.image_url2}');background-size:cover"></div>
               <c:else />
               <div class="image-banner" style="background:#e1e1e1 url('{$cache_link_img}{$filminfo.image_url2}');background-size:cover"></div>
            </c:if>
         </c:if>
         <div class="box-bookmark" data-filmid="{$filminfo.film_id}">
            <i class="icon i-bookmark"></i>
            <div class="add-bookmark">Đánh dấu</div>
         </div>
         <ul class="btn-block"><li class="item"><a data-target="#pop-trailer" class="btn-color btn btn-trailer" title="Trailer phim {$filminfo.title}"> Trailer</a></li></ul>
      </div>
      <div class="clear"></div>
   </div>
   <div class="block-info-b">
      <div class="col-lg-11 block-info-c">
         <h1 class="title vn">Tải Phim {$filminfo.title}</h1>
         <h2 class="title en">Download {$filminfo.title_o} <span>({$filminfo.year})</span></h2>
         <div class="box_star" data-score="{$filminfo.liked_times_float}" data-filmid="{$filminfo.film_id}" itemtype="http://data-vocabulary.org/Review-aggregate" itemscope>
            <div class="icon item-big-star" itemprop="votes">{$filminfo.liked_times_float}</div>
            <div class="item-star-rate" data-vote="{$filminfo.liked_vote}" data-rate="{$filminfo.liked_times}" data-frate="{$filminfo.liked_times_float}"></div>
            <div class="item-hint"></div>
         </div>
         <div class="mv-rating"><span class="imdb-logo">IMDb 5.7</span></div>
         <div class="fb-like like-at-rating" data-href="{$filminfo.link}" data-width="60" data-layout="box_count" data-action="like" data-show-faces="false" data-share="false"></div>
         <div class="clear bg-profile-film">
            <dl class="col">
            <dt><i class="icon icon-op i-directors"></i>Đạo diễn: </dt>
               <dd>
                  <c:if is="{$filminfo.director}!='NULL'">
                     {$filminfo.director}
                     <c:else />
                     (Đang cập nhật) 
                  </c:if>
               </dd>
               <dt><i class="icon icon-op i-status"></i> Trạng thái:</dt>
               <dd class="stepemw">
                  <c:if is="{$filminfo.check_trailer} != '1'">
                     {$filminfo.status}
                     <c:else />
                     Trailer
                  </c:if>
               </dd>
               <dt><i class="icon icon-op i-time"></i> Thời lượng:</dt>
               <dd>{$filminfo.timeline}</dd>
               
            </dl>
            <dl class="col2">

               <dt><i class="icon icon-op i-stepepisode"></i> Sắp chiếu:</dt>
               <dd class="stepe">
                  <c:if is="{$filminfo.comingsoon}">
                     {$filminfo.comingsoon}
                     <c:else />
                     N/A
                  </c:if>
               </dd>
               <dt><i class="icon icon-op i-quality"></i> Chất lượng:</dt>
               <dd class="stepemw">
                  1280p
               </dd>
               <dt><i class="icon icon-op i-country"></i> Quốc gia:</dt>
               <dd><a href="{$filminfo.country.link}" title="Phim {$filminfo.country.name}"> {$filminfo.country.name}</a></dd>
            </dl>
         </div>
      </div>
      <div class="clear"></div>
   </div>
</div>

   

   

<div class="block-wrap padding">
   <!-- <div class="col-sidelef block-sidelef">
      dsadsad
      </div> -->
   <div class="block-col-left main-product">
      
      <div class="fontRoboto block-bottom clear">

         <!--<div id="area-info">
          <c:include template="breadcrumbs" /> 
            <dl>
               
               
               <c:if is="{$admin} == '1' || {$admin} == '2'">
                  <dt>Người đăng: </dt>
                  <dd> {$filminfo.user_username} </dd>
               </c:if>
            </dl>

         </div>-->

         <div id="area-btn">

            <a class="btn-color btn btn-behind-the-scenes" title="Hậu trường phim {$filminfo.title}"> Hậu trường</a>
         </div>
         <div class="clear"></div>
         
      </div>

      
      <!--end.block-title-->

       <div class="border_ho bg_bgfilm bginfo_download info_filmdetail">

            <table border="0" class="table_download" style="display:none"><tr><td class="download_m">Server</td><td class="download_m">Tên Tập Phim</td><td class="download_m">Lượt Tải</td><td class="download_m">Link Tải</td><td class="download_m" align="center">Chất Lượng</td></tr></table>

            <article id="form_download">

                <h2 class="clear font_weight right-box-header star-icon">Tải Phim {$filminfo.title}</h2>

                <hr />

                <div class="note border_ho"><span>Chú ý:</span> Để tải phim <b><a href="{$filminfo.link}" title="Tải phim {$filminfo.title}">{$filminfo.title}</a></b> về máy, bạn phải nhập Mã Xác Nhận để có thể Download phim <p>Tải <b>phim <a href="{$filminfo.link}">{$filminfo.title_o}</a></b> hoàn toàn miễn phí nhé!</p></div>

                <div align="right" style="margin:10px -32px 15px">

                    <span class="fb-like" data-href="{$filminfo.link}" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></span>

                        <span id="gblus"><span class="g-plusone" data-size="medium"></span>

                </div><!--end.tbhd_button_like-->

                <div class="control-groups border_ho"><label class="tbhd_lablxn">Mã xác nhận: </label><div class="control" style="position:relative"><input type="text" class="captcha input tbhd_text" style="margin: 7px 10px;" name="captcha"><img src="captcha" class="captcha-image" alt="Catcha" /><button id="btndownload" class="btnoption">Lấy Link Download</button></div></div>

            </article>

            

        </div><!--end.info_filmdetail-->

      
      <article id="item-tags" class="tags">
         <div class="items">
            <span class="label">Từ khóa: </span>
            <h2 class="inline"><a href="{$filminfo.link_tag}" title="{$filminfo.title}">{$filminfo.title}</a></h2>
            ,
            <c:each from="{$filminfo.tags_link}" value="$tag">
               <h3 class="inline">
                  <a href="{$tag.link}" title="{$tag.title}" rel="tag">{$tag.title}</a>
                  <c:if is="!{$tag.is_last}">, </c:if>
               </h3>
            </c:each>
         </div>
         <div class="more-block _4-u3 padding" style="padding-bottom:0">
            <h4>
               <c:if is="{$filminfo.type} == 1">
                  Xem phim {$filminfo.title} - {$filminfo.title_o}, <strong>{$filminfo.title}</strong>, {$filminfo.title} Full HD, <strong>{$filminfo.title} thuyết minh</strong>, {$filminfo.title} lồng tiếng, {$filminfo.title} Vietsub, {$filminfo.title} bản đẹp, {$filminfo.title} bản cam, {$filminfo.title} chiếu rạp, {$filminfo.title} phụ đề, {$filminfo.title} hậu trường, {$filminfo.title} tập mới, {$filminfo.title} phần mới, {$filminfo.title} {$filminfo.year}, {$filminfo.title_o} {$filminfo.year}, {$filminfo.title} {$filminfo.country.name}, {$filminfo.title_o} {$filminfo.country.name}, xem phim {$filminfo.title_o} {$filminfo.country.name}, phim {$filminfo.title_o} {$filminfo.country.name}, {$filminfo.title_o} {$filminfo.country.name} {$filminfo.year}, {$filminfo.country.name} {$filminfo.year}, phim {$filminfo.country.name} năm {$filminfo.year}, {$filminfo.title} {$filminfo.status}
                  <c:else />
                  {$filminfo.title} trọn bộ, {$filminfo.title} Vietsub, {$filminfo.title} tập cuối, {$filminfo.title} Vietsub thuyết minh, {$filminfo.title} lồng tiếng, {$filminfo.title} Full hd, {$filminfo.title} bản đẹp, Hậu trường {$filminfo.title}, trailer {$filminfo.title}, {$filminfo.title} phụ đề Xem phim {$filminfo.title_o}, {$filminfo.title} {$filminfo.year}, {$filminfo.title} tập mới, {$filminfo.title} phần mới, {$filminfo.title} phụ đề, {$filminfo.title_o} {$filminfo.year}, {$filminfo.title} {$filminfo.country.name}, {$filminfo.title_o} {$filminfo.country.name}, , phim {$filminfo.title_o} {$filminfo.country.name}, {$filminfo.title_o} {$filminfo.country.name} {$filminfo.year}, {$filminfo.country.name} {$filminfo.year}, phim {$filminfo.country.name} năm {$filminfo.year}, {$filminfo.title} {$filminfo.status}
                  <c:if is="{$split_timeLine.split}">
                     ,
                     <c:each from="{$split_timeLine.split}" value="$timeline"> {$timeline}</c:each>
                  </c:if>
               </c:if>
            </h4>
         </div>
      </article>
      <div class="block-title title-ik clear">
         <div class="main-title title-ik-content">
            <h3>Bình luận</h3>
         </div>
      </div>
      <!--end.block-title-->
      <div id="box-comment">
         <div class="tabs" data-target="#i-comment">
            <div class="tab tab-title active" data-name="item-facebook-comment">Facebook</div>
            <div class="tab tab-title" data-name="item-google-comment">Google+</div>
         </div>
         <div class="clear"></div>
         <div id="i-comment" class="_4-u3 padding i-comment">
            <div class="tab item-facebook-comment">
               <div class="fb-comments" data-href="{$filminfo.link}" data-colorscheme="light" data-width="810" data-order-by="reverse_time"></div>
            </div>
            <!--end.item-facebook-comment-->
            <div class="tab item-google-comment hide">
               <div id="g-comments" class="g-comments" data-width="810"></div>
            </div>
            <!--end.item-google-comment-->
         </div>
         <!--end#i-comment-->
      </div>
      <!--end#box-comment-->
      <div class="ajax-load">
         <!-- <div class="blocktitle title-ik">
            <div class="main-title title-ik-category">
                <p>Phim liên quan</p>
                <span>Có thể bạn muốn xem</span>
            </div>
            </div> -->
         <div class="block-title title-ik clear">
            <div class="main-title title-ik-content">
               <h3>Phim liên quan</h3>
               <span>Có thể bạn muốn xem</span>
            </div>
         </div>
         <!--end.block-title-->
         <div id="ajaxi-category-title">
            <div class="block-items"></div>
         </div>
         <!--end#ajaxi-category-title-->
         <div class="block-title title-ik clear">
            <div class="main-title title-ik-content">
               <h3>Phim cùng chuyên mục</h3>
            </div>
         </div>
         <!--end.block-title-->
         <div id="ajaxi-category">
            <div class="block-items"></div>
         </div>
         <!--end#ajaxi-category-->
      </div>
   </div>
   <!-- <c:include template="sidebar" /> -->
   <!--/.block-->
   <c:if is="{$ad_location.ad_button_of_aftersocial}">
      <div class="ad_location ad_button_of_aftersocial">{$ad_location.ad_button_of_aftersocial}</div>
   </c:if>
   <div class="detail">
   </div>
   <!--end.detail-->
   <div class="clear"></div>
</div>
</div>
<script type="text/javascript">
   AppPack.vHpKTXii.init();
   AppPack.Member.Register.init();
</script>
<!-- END: download -->