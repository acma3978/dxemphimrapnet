<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!-- BEGIN: footer -->
</main>
<footer id="f_footer" class="footer clearfix">
    <div id="f_line_footer"></div>
    <div class="f_info">
        <div class="container">

            <div id="f_block_href">
                <div class="f_href float-left col-md-2">
                    <div class="f_title_href">
                        <a href="danh-sach/phim-moi/" title="Phim mới cập nhật">Phim mới</a>
                    </div>
                    <ul class="f_list_href">
                        <li><a href="danh-sach/phim-le/" title="Phim lẻ mới">Phim lẻ mới</a></li>
                        <li><a href="danh-sach/phim-bo/" title="Phim bộ mới">Phim bộ mới</a></li>
                        <li><a href="danh-sach/phim-chieu-rap/" title="Phim chiếu rạp">Phim chiếu rạp</a></li>
                        <li><a href="the-loai/phim-thuyet-minh/" title="Phim thuyết minh">Phim thuyết minh</a></li>
                    </ul>
                </div>

                <div class="f_href float-left col-md-2">
                    <div class="f_title_href">
                        <a href="danh-sach/phim-moi/" title="Phim mới cập nhật">Phim mới</a>
                    </div>
                    <ul class="f_list_href">
                        <li><a href="danh-sach/phim-le/" title="Phim lẻ mới">Phim lẻ mới</a></li>
                        <li><a href="danh-sach/phim-bo/" title="Phim bộ mới">Phim bộ mới</a></li>
                        <li><a href="danh-sach/phim-chieu-rap/" title="Phim chiếu rạp">Phim chiếu rạp</a></li>
                        <li><a href="the-loai/phim-thuyet-minh/" title="Phim thuyết minh">Phim thuyết minh</a></li>
                    </ul>
                </div>

                <div class="f_href float-left col-md-2">
                    <div class="f_title_href">
                        <a href="danh-sach/phim-moi/" title="Phim mới cập nhật">Phim mới</a>
                    </div>
                    <ul class="f_list_href">
                        <li><a href="danh-sach/phim-le/" title="Phim lẻ mới">Phim lẻ mới</a></li>
                        <li><a href="danh-sach/phim-bo/" title="Phim bộ mới">Phim bộ mới</a></li>
                        <li><a href="danh-sach/phim-chieu-rap/" title="Phim chiếu rạp">Phim chiếu rạp</a></li>
                        <li><a href="the-loai/phim-thuyet-minh/" title="Phim thuyết minh">Phim thuyết minh</a></li>
                    </ul>
                </div>

                <div class="clearfix"></div>
            </div>

        </div>
    </div>
    <div class="f_infos">
        <div class="container">
            <p id="f_page">Copyright © 2019 <b>4KOnline.net</b>. All Rights Reserved<br>Tất cả các phim của chúng tôi sưu tầm từ các trang miễn phí như: Google, YouTube, DailyMotion ... Chúng tôi sẽ gỡ bỏ những phim vi phạm bản quyền theo yêu cầu của nhà sản xuất</p>
            <p class="text"><a title="Xem phim online" href="http://localhost/">Xem phim Online</a> chất lượng cao, chúng tôi hổ trợ các dòng điện thoại để <a title="Xem phim nhanh" href="http://localhost/">xem phim</a> trực tuyến trên điện thoại. Chúc các bạn xem <a title="Phim rạp full hd" href="http://localhost/">phim</a> vui vẻ.</p>
            <p class="container f_tlink">
                Weblinks: <a href="http://localhost" title="phim, xem phim" style="color:red">Phim</a>, <a href="http://localhost/the-loai/phim-hanh-dong/" title="phim hanh dong">Phim Hành Động</a>, <a href="http://localhost/quoc-gia/phim-thai-lan/" title="Phim Thai Lan">Phim Thái Lan</a>, <a href="http://localhost/the-loai/phim-hai-huoc/" title="Phim hai online">Phim Hài Online</a>, <a href="http://localhost/quoc-gia/phim-han-quoc/" title="phim han quoc">Phim Hàn Quốc</a>, <a href="http://localhost" title="Xem Phim" target="_blank">Xem Phim</a>, <a href="http://localhost/danh-sach/phim-bo/" title="Phim bo hay">Phim bộ hay</a>, <a href="http://localhost/the-loai/phim-hoat-hinh/" title="phim hoat hinh">Phim Hoạt Hình</a>, <a href="http://localhost" title="Phim mới">Phim mới nhất</a>, <a href="http://localhost/the-loai/phim-hanh-dong/" title="Phim hành động mới nhất">Phim hành động mới nhất</a>
            </p>
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
echo HTML::script('assets/js/jquery/jquery-3.4.1.min.js')
    . HTML::script('assets/js/popper.min.js?v='.date('dmYhis'))
    . HTML::script('assets/bootstrap/js/bootstrap.min.js?v='.date('dmYhis'))
    . HTML::script('assets/js/app.js?v='.date('dmYhis'));
?>

</body>
</html>
<!-- END: footer -->