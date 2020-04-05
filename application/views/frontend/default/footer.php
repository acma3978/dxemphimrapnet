<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!-- BEGIN: footer -->
</main>
<footer id="footer" class="footer clearfix">
   <div id="linefilm">
      <div class="container info">
         <div id="ad_location topstat"></div>
         <div id="logo_footer"></div>
         <div id="CateLinkContent">
            <div id="CateLinkItem" style="width: 133px">
               <div class="txt"><a href="danh-sach/phim-moi/" title="Phim mới cập nhật" class="menuFoot">Phim mới</a></div>
               <div class="ListLink">
                  <div class="tbhd_arrow"></div>
                  <a href="danh-sach/phim-le/" title="Phim lẻ mới">Phim lẻ mới</a>
                  <div class="tbhd_arrow"></div>
                  <a href="danh-sach/phim-bo/" title="Phim bộ mới">Phim bộ mới</a>
                  <div class="tbhd_arrow"></div>
                  <a href="danh-sach/phim-chieu-rap/" title="Phim chiếu rạp">Phim chiếu rạp</a>
                  <div class="tbhd_arrow"></div>
                  <a href="the-loai/phim-thuyet-minh/" title="Phim thuyết minh">Phim thuyết minh</a>
               </div>
            </div>
            <div id="CateLinkItem" style="width: 188px">
               <div class="txt"><a href="danh-sach/phim-le/" title="Thể loại phim" class="menuFoot">Thể loại được xem nhiều</a></div>
               <div class="ListLink">
                  <div class="tbhd_arrow"></div>
                  <a href="the-loai/phim-hanh-dong/" title="Phim hành động">Phim hành động</a>
                  <div class="tbhd_arrow"></div>
                  <a href="the-loai/phim-co-trang/" title="Phim cổ trang">Phim cổ trang/Kiếm hiệp</a>
                  <div class="tbhd_arrow"></div>
                  <a href="the-loai/phim-kinh-di/" title="Phim kinh dị">Phim kinh dị</a>
                  <div class="tbhd_arrow"></div>
                  <a href="the-loai/phim-vien-tuong/" title="Phim viễn tưởng">Phim viễn tưởng</a>
                  <div class="tbhd_arrow"></div>
                  <a href="the-loai/phim-hoat-hinh/" title="Phim hoạt hình">Phim hoạt hình</a>
               </div>
            </div>
            <div id="CateLinkItem" style="width: 140px">
               <div class="txt"><a href="danh-sach/phim-le/" title="Thể loại phim" class="menuFoot">Thể loại phim</a></div>
               <div class="ListLink">
                  <div class="tbhd_arrow"></div>
                  <a href="the-loai/phim-than-thoai/" title="Phim thần thoại">Phim thần thoại</a>
                  <div class="tbhd_arrow"></div>
                  <a href="the-loai/phim-hinh-su/" title="Phim hình sự">Phim hình sự</a>
                  <div class="tbhd_arrow"></div>
                  <a href="the-loai/phim-vo-thuat/" title="Phim võ thuật">Phim võ thuật</a>
                  <div class="tbhd_arrow"></div>
                  <a href="the-loai/phim-tinh-cam/" title="Phim tình cảm">Phim tình cảm</a>
                  <div class="tbhd_arrow"></div>
                  <a href="the-loai/phim-tam-ly/" title="Phim tâm lý">Phim tâm lý</a>
               </div>
            </div>
            <div id="CateLinkItem" style="width: 250px">
               <div class="txt">
                  <div class="menuFoot">Về chúng tôi</div>
               </div>
               <div class="ListLink">
                   <div class="text">
                       <a title="Xem phim sex online" href="<?php echo Light_Application::DOMAIN?>">Xem phim sex Online</a> chất lượng cao, chúng tôi hổ trợ các dòng điện thoại để <a title="xem phim sex" href="<?php echo Light_Application::DOMAIN?>">xem phim sex</a> trực tuyến trên điện thoại. Chúc các bạn xem <a title="phim sex" href="<?php echo Light_Application::DOMAIN?>">phim sex</a> vui vẻ.
                       <br/><a title="Feed Xem Phim Nhanh" href="http://feeds.feedburner.com/<?php echo Light_Application::DOMAIN?>">Feed</a> | <a title="Sitemap Phim Online" href="<?php echo Light_Application::DOMAIN?>/sitemap.xml">Sitemap</a> | <a title="Phim Online" href="https://plus.google.com/u/0/100188763272100065945">Google+</a>
                   </div>
               </div>
            </div>
            <div class="clear"></div>
         </div>
         <div class="clear"></div>
      </div>
      <div class="infos">
         <div class="container">
            <div id="infopage">Copyright © 2014 <b><?php echo Light_Application::NAME?></b>. All Rights Reserved</div>

            <div class="clear"></div>
            <div class="container textlink">
               Weblinks: {$ad_location.ad_textlink}
            </div>
         </div>
      </div>
   </div>
   <c:if is="$debug">
      <div class="container">
         Queries: {$querycount}, Memory Usage: {$memory_usage}, Timing: {$execution_time}
      </div>
   </c:if>
</footer>
<!-- Custom and plugin javascript -->
<div class="ad_location ad_float">{$ad_location.ad_float}</div>

<!-- Custom and Main javascript -->
<?php
echo HTML::script('assets/js/jquery/jquery-3.3.1.min.js')
    . HTML::script('player/jwplayer.js?v='.date('dmYhis'))
    . HTML::script('assets/js/application.js?v='.date('dmYhis'));
?>

</body>
</html>
<!-- END: footer -->