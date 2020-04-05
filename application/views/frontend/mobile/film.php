<?php defined('SYSPATH') or die('No direct script access.'); ?>

<!-- BEGIN: film -->

    <div class="left-content" id="page-info">
    <c:include template="breadcrumbs" />
                        <div class="blockbody">

                            <div class="info" itemscope="" itemtype="http://schema.org/Product">
                                <div class="poster">
                                    <a class="adspruce-streamlink" href="{$filminfo.link}">

<c:if is="{$filminfo.image_url} != NULL">
                                <c:if is="{$admin} == '1' || {$admin} == '2'">
                                    <img itemprop="image" src="{$filminfo.image_url}" title="{$filminfo.title}" alt="{$filminfo.title}">
                                    <c:else />
                                    <img itemprop="image" src="{$cache_link_img}{$filminfo.image_url}" title="{$filminfo.title}" alt="{$filminfo.title}">
                                </c:if>

                                <c:else />

                                <c:if is="{$admin} == '1' || {$admin} == '2'">
                                    <img itemprop="image" src="{$filminfo.image_url2}" title="{$filminfo.title}" alt="{$filminfo.title}">
                                    <c:else />
                                    <img itemprop="image" src="{$cache_link_img}{$filminfo.image_url2}" title="{$filminfo.title}" alt="{$filminfo.title}">
                                </c:if>
                            </c:if>

                                        
                                    </a>
                                    <ul class="buttons two-button">
                                        <li>
                                            <a class="btn-see btn btn-info adspruce-streamlink" href="{$filminfo.link_watch}">
                                                <i class="fa fa-play-circle-o"></i> Xem phim
                                            </a>
                                        </li>
                                        
                                        <div class="clear"></div>
                                        

                                        
                                    </ul>
                                </div>
                                <div class="text">
                                    <h1>
                                        <p class="title" itemprop="name">{$filminfo.title}</p>
                                    </h1>
                                    <h2>
                                        <p class="real-name">{$filminfo.title_o} ({$filminfo.year})</p>
                                    </h2>
                                    <div class="dinfo">
                                        <dl class="col">
                                            <span style="display:none" itemprop="brand">TronBoHD.com</span>
                                            <dt>Đạo diễn:</dt>
                                            <dd>{$filminfo.director}</dd>
                                            
                                            
                                            <dt>Thể loại:</dt>
                                            <dd><c:each from="{$filminfo.categories}" value="$category">
                                                <a href="{$category.link}" title="Phim {$category.title}"> Phim {$category.title}</a><c:if is="!{$category.is_last}">, </c:if>
                                            </c:each></dd>
                                            <!--<dt>Đăng bởi:</dt>
                                             <dd><a href="javascript:void(0)">khanhnguyen</a></dd> -->
                                        </dl>
                                        <dl class="col">
                                            <dt>Trạng thái:</dt>
                                            <dd><c:if is="{$filminfo.check_trailer} != '1'"> {$filminfo.status}<c:else /> Trailer</c:if></dd>
                                            <dt>Thời lượng:</dt>
                                            <dd>{$filminfo.timeline}</dd>
                                            <dt>Lượt xem:</dt>
                                            <dd>{$filminfo.views_format}</dd>
                                            <dt>Năm xuất bản:</dt>
                                            <dd>{$filminfo.year}</dd>
                                            <dt>Quốc gia:</dt>
                                            <dd><a href="{$filminfo.country.link}" title="Phim {$filminfo.country.name}"> {$filminfo.country.name}</a></dd>
                                            <meta content="2016-10-04T20:09:54+07:00">
                                            <meta itemprop="description" content="{$page_description}">
                                        </dl>
                                    </div>
                                    
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
                                        <input type="email" id="sub_email" value="" name="sub_email" class="input" placeholder="Email">
                                    </div>
                                    <div class="col">
                                        <input type="text" id="sub_name" value="" name="sub_name" class="input" placeholder="Tên bạn">
                                    </div>
                                    <div class="col">
                                        <input type="text" name="sub_captcha" class="input" id="captcha" placeholder="Mã bảo vệ">
                                    </div>
                                    <div class="col">
                                        <img class="captcha" id="img_captcha" src="./Phim Thợ Săn Tiền Thưởng VietSub + Thuyết minh _ Bounty Hunter 2016_files/CaptchaSubscribe">
                                        <i class="refresh-captcha fa fa-refresh" onclick="$(&#39;#img_captcha&#39;).attr(&#39;src&#39;,&#39;/site/CaptchaSubscribe?Math.random()&#39;);" title="Lấy mã khác"></i>
                                    </div>
                                    <div class="col">
                                        <span class="btn btn-primary" id="btn_send"><i class="fa fa-caret-right"></i> Gửi</span>
                                    </div>
                                </form>
                                <div class="message">Cám ơn bạn, TronBoHD.com sẽ gửi email thông báo cho bạn khi có tập mới của phim Thợ Săn Tiền Thưởng</div>
                                <div class="loading"></div>
                            </div>
                            <!-- <div class="show-time">
                                <h3 class="heading">
                                    <i class="fa fa-calendar"></i> Lịch chiếu
                                </h3>
                                <div>
                                    <p>Phim&nbsp;<strong>Thợ Săn Tiền Thưởng 2016</strong> dự kiến chiếu trong năm 2016 : ))</p>
                                </div>
                            </div> -->
                            <div class="detail">
                                <h3 class="heading">
                                    <i class="fa fa-info-circle"></i> Thông tin phim
                                </h3>
                                <div class="tabs-content" id="info-film">
                                    <div class="tab">
                                        <h3><strong>{$filminfo.title},&nbsp;{$filminfo.title_o} {$filminfo.year}</strong></h3>
                                        {$filminfo.pagetext}
                                    </div>
                                </div>
                                
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
                            <div class="note-browser">
                                Điện thoại, máy tính bảng xem tốt nhất với trình duyệt Google Chrome, Cốc Cốc.
                            </div>
                              <div id="box-comment" class="fix-row">
        <div class="tabs" data-target="#i-comment">
            <div class="tab tab-title active" data-name="item-facebook-comment">Facebook</div>
            <div class="tab tab-title" data-name="item-google-comment">Google+</div>
        </div>
        <div class="clear"></div>
        <div id="i-comment" class=" padding i-comment">

            <div class="tab item-facebook-comment">
                <div class="fb-comments" data-href="{$filminfo.link}" data-colorscheme="dark" data-width="810" data-order-by="reverse_time"></div>
            </div><!--end.item-facebook-comment-->

            <div class="tab item-google-comment hide">
                <div id="g-comments" class="g-comments" data-width="810"></div>
            </div><!--end.item-google-comment-->

        </div><!--end#i-comment-->
        
    </div><!--end#box-comment-->
                        </div>

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
                        
                    </div>
<!-- END: film -->