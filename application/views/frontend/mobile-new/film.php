<?php defined('SYSPATH') or die('No direct script access.'); ?>

<!-- BEGIN: film -->
<div class="breadcrumbs">
                        <a href="http://phimbathu.com/">Trang chủ</a><a href="http://phimbathu.com/the-loai/phim-hanh-dong-3.html">Phim hành động</a><span>{$filminfo.title}</span></div>
                    
    <div class="left-content" id="page-info">
                        <div class="blockbody">
                            <script type="application/ld+json">
                                {
                                    "@context": "http://schema.org",
                                    "@type": "WebSite",
                                    "url": "http://phimbathu.com/tho-san-tien-thuong-2767.html",
                                    "potentialAction": {
                                        "@type": "SearchAction",
                                        "target": "http://phimbathu.com/tim-kiem.html?q={key}",
                                        "query-input": "required name=key"
                                    }
                                }
                            </script>
                            <div class="info" itemscope="" itemtype="http://schema.org/Product">
                                <div class="poster">
                                    <a class="adspruce-streamlink" href="http://phimbathu.com/xem-phim/phim-tho-san-tien-thuong-bounty-hunter-2016-2767">

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
                                            <a class="btn-see btn btn-info adspruce-streamlink" href="http://phimbathu.com/xem-phim/phim-tho-san-tien-thuong-bounty-hunter-2016-2767">
                                                <i class="fa fa-play-circle-o"></i> Xem phim
                                            </a>
                                        </li>
                                        <li>
                                            <a href="http://phimbathu.com/tai-phim/phim-tho-san-tien-thuong-bounty-hunter-2016-2767" class="btn btn-download btn-success">
                                                <i class="fa fa-cloud-download"></i> Tải phim
                                            </a>
                                        </li>
                                        <div class="clear"></div>
                                        <script type="text/javascript" src="./Phim Thợ Săn Tiền Thưởng VietSub + Thuyết minh _ Bounty Hunter 2016_files/mb_box_28349.ads"></script>
                                        <script type="text/javascript" src="./Phim Thợ Săn Tiền Thưởng VietSub + Thuyết minh _ Bounty Hunter 2016_files/mb_core.js.tải xuống"></script>
                                        <script language="javascript" src="./Phim Thợ Săn Tiền Thưởng VietSub + Thuyết minh _ Bounty Hunter 2016_files/mob_default.js.tải xuống"></script>
                                        <div id="admPrTracking" style="height:0px; width:0px; visibility:hidden; overflow:hidden;"></div>
                                        <div id="admSponPopup"></div>
                                        <div id="iframebuff" style="height:0px; width:1px;"></div>
                                        <script type="text/javascript" src="./Phim Thợ Săn Tiền Thưởng VietSub + Thuyết minh _ Bounty Hunter 2016_files/mb_code_28349.ads"></script>
                                        <div style="clear:both;" id="adm_zone28349">
                                            <script type="text/javascript" src="./Phim Thợ Săn Tiền Thưởng VietSub + Thuyết minh _ Bounty Hunter 2016_files/mbdata_28346_1.js.tải xuống" id="Script_zone_28346"></script>
                                        </div>
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
                                            <span style="display:none" itemprop="brand">phimbathu.com</span>
                                            <dt>Đạo diễn:</dt>
                                            <dd><a href="javascript:void(0)">{$filminfo.year}</a></dd>
                                            <dt>Diễn viên:</dt>
                                            <dd><a href="http://phimbathu.com/dien-vien/duong-yen-108.html">Đường Yên</a>, <a href="http://phimbathu.com/dien-vien/chung-han-luong-109.html">Chung Hán Lương</a>, <a href="http://phimbathu.com/dien-vien/lee-min-ho-159.html">Lee Min Ho</a>, <a href="http://phimbathu.com/dien-vien/tu-chinh-hy-5745.html">Từ Chính Hy</a>, <a href="http://phimbathu.com/dien-vien/ngo-thien-ngu-5746.html">Ngô Thiên Ngữ</a></dd>
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
                                            <meta itemprop="description" content="Phim Thợ Săn Tiền Thưởng Lee Min Ho là câu chuyện đầy tình cờ giữa 5 nhân vật chính diễn ra tại nước Mỹ. Họ bất ngờ quen biết và ...">
                                        </dl>
                                    </div>
                                    <div class="box-btn clear">
                                        <div class="fb-like fb_iframe_widget fb_iframe_widget_fluid" data-href="http://phimbathu.com/tho-san-tien-thuong-2767.html" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=997409100283248&amp;container_width=0&amp;href=http%3A%2F%2Fphimbathu.com%2Ftho-san-tien-thuong-2767.html&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;share=true&amp;show_faces=false"><span style="vertical-align: bottom; width: 120px; height: 20px;"><iframe name="ffcc27c09a17bc" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like Facebook Social Plugin" src="./Phim Thợ Săn Tiền Thưởng VietSub + Thuyết minh _ Bounty Hunter 2016_files/like.html" style="border: none; visibility: visible; width: 120px; height: 20px;" class=""></iframe></span></div>
                                        <div class="gg-like">
                                            <div id="___plusone_0" style="position: absolute; width: 450px; left: -10000px;">
                                                <iframe frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position:absolute;top:-10000px;width:450px;margin:0px;border-style:none" tabindex="0" vspace="0" width="100%" id="I0_1475889596184" name="I0_1475889596184" src="./Phim Thợ Săn Tiền Thưởng VietSub + Thuyết minh _ Bounty Hunter 2016_files/fastbutton.html"></iframe>
                                            </div>
                                            <div class="g-plusone" data-annotation="none" data-size="medium" data-width="160" data-href="http://phimbathu.com/tho-san-tien-thuong-2767.html" data-gapiscan="true" data-onload="true" data-gapistub="true"></div>
                                            <div id="___plus_0" style="position: absolute; width: 450px; left: -10000px;">
                                                <iframe frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position:absolute;top:-10000px;width:450px;margin:0px;border-style:none" tabindex="0" vspace="0" width="100%" id="I1_1475889596193" name="I1_1475889596193" src="./Phim Thợ Săn Tiền Thưởng VietSub + Thuyết minh _ Bounty Hunter 2016_files/sharebutton.html"></iframe>
                                            </div>
                                            <div class="g-plus" data-action="share" data-annotation="bubble" data-gapiscan="true" data-onload="true" data-gapistub="true"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-groups">
                                    <div class="col">
                                        <div class="box-rating" itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
                                            <div class="rate-title"><span class="rate-lable">Đánh giá phim </span>(<span id="rate_count" itemprop="ratingCount">755</span> lượt)</div>
                                            <div id="star" data-score="6.88742" style="cursor: pointer; width: 200px;"><img src="./Phim Thợ Săn Tiền Thưởng VietSub + Thuyết minh _ Bounty Hunter 2016_files/star-on.png" alt="1" title="Dở tệ">&nbsp;<img src="./Phim Thợ Săn Tiền Thưởng VietSub + Thuyết minh _ Bounty Hunter 2016_files/star-on.png" alt="2" title="Dở">&nbsp;<img src="./Phim Thợ Săn Tiền Thưởng VietSub + Thuyết minh _ Bounty Hunter 2016_files/star-on.png" alt="3" title="Không hay">&nbsp;<img src="./Phim Thợ Săn Tiền Thưởng VietSub + Thuyết minh _ Bounty Hunter 2016_files/star-on.png" alt="4" title="Không hay lắm">&nbsp;<img src="./Phim Thợ Săn Tiền Thưởng VietSub + Thuyết minh _ Bounty Hunter 2016_files/star-on.png" alt="5" title="Bình thường">&nbsp;<img src="./Phim Thợ Săn Tiền Thưởng VietSub + Thuyết minh _ Bounty Hunter 2016_files/star-on.png" alt="6" title="Xem được">&nbsp;<img src="./Phim Thợ Săn Tiền Thưởng VietSub + Thuyết minh _ Bounty Hunter 2016_files/star-on.png" alt="7" title="Có vẻ hay">&nbsp;<img src="./Phim Thợ Săn Tiền Thưởng VietSub + Thuyết minh _ Bounty Hunter 2016_files/star-off.png" alt="8" title="Hay">&nbsp;<img src="./Phim Thợ Săn Tiền Thưởng VietSub + Thuyết minh _ Bounty Hunter 2016_files/star-off.png" alt="9" title="Rất hay">&nbsp;<img src="./Phim Thợ Săn Tiền Thưởng VietSub + Thuyết minh _ Bounty Hunter 2016_files/star-off.png" alt="10" title="Tuyệt vời">
                                                <input type="hidden" name="score" value="6.88742">
                                            </div>
                                            <div>
                                                <div id="div_average" style="float: left; line-height: 16px; margin: 0 5px; ">(<span class="average" id="average" itemprop="ratingValue">6.88742</span> đ)</div>
                                                <span id="hint"></span>
                                                <meta itemprop="bestRating" content="10">
                                                <meta itemprop="worstRating" content="0">
                                                <input id="film_id" type="hidden" value="2767">
                                            </div>
                                        </div>
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
                                <div class="message">Cám ơn bạn, PhimBatHu.com sẽ gửi email thông báo cho bạn khi có tập mới của phim Thợ Săn Tiền Thưởng</div>
                                <div class="loading"></div>
                            </div>
                            <div class="show-time">
                                <h3 class="heading">
                                    <i class="fa fa-calendar"></i> Lịch chiếu
                                </h3>
                                <div>
                                    <p>Phim&nbsp;<strong>Thợ Săn Tiền Thưởng 2016</strong> dự kiến chiếu trong năm 2016 : ))</p>
                                </div>
                            </div>
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
                                <div class="tabs-content" id="film-trailer">
                                    <span class="heading"><i class="fa fa-youtube-play"></i>Trailer - Preview</span>
                                    <div id="trailer_player" class="jwplayer jw-reset jw-skin-seven jw-flag-touch jw-flag-aspect-mode jw-state-idle jw-flag-user-inactive" tabindex="0" style="width: 100%; height: 270px;">
                                        <div class="jw-aspect jw-reset" style="padding-top: 56.25%;"></div>
                                        <div class="jw-media jw-reset">
                                            <video class="jw-video jw-reset" x-webkit-airplay="allow" webkit-playsinline="" src="https://redirector.googlevideo.com/videoplayback?ip=2001:19f0:7001:778:5400:ff:fe33:41cb&amp;app=texmex&amp;mt=1475887151&amp;pl=38&amp;itag=18&amp;mm=30&amp;requiressl=yes&amp;id=c4c2605fa4d83f6a&amp;sc=yes&amp;expire=1475901636&amp;source=webdrive&amp;cp=QVJMV0pfUFZRR1hNOlk0SmRGdEMwN3NG&amp;ipbits=32&amp;signature=AE8F85F25FFB6CB4E539868D4868F3A4ED69C7.90668515B353E59D716E187588A88AB569E8E6C5&amp;ttl=transient&amp;nh=IgpwcjAzLmxheDE2KgkxMjcuMC4wLjE&amp;mv=u&amp;ms=nxu&amp;mn=sn-a5m7ln7r&amp;sparams=requiressl,id,itag,source,ttl,ip,ipbits,expire,cp&amp;key=ck2&amp;filename=video.mp4"></video>
                                        </div>
                                        <div class="jw-preview jw-reset"></div>
                                        <div class="jw-captions jw-reset">
                                            <div class="jw-captions-window jw-reset"><span class="jw-captions-text jw-reset"></span></div>
                                        </div>
                                        <div class="jw-title jw-reset">
                                            <div class="jw-title-primary jw-reset">Thợ Săn Tiền Thưởng</div>
                                            <div class="jw-title-secondary jw-reset"></div>
                                        </div>
                                        <div class="jw-overlays jw-reset">
                                            <div id="trailer_player_vast" class="jw-plugin jw-reset"></div>
                                            <div id="trailer_player_jwpsrv" class="jw-plugin jw-reset"></div>
                                        </div>
                                        <div class="jw-controls jw-reset">
                                            <div class="jw-display-icon-container jw-background-color jw-reset">
                                                <div class="jw-icon jw-icon-display jw-button-color jw-reset"></div>
                                            </div>
                                            <div class="jw-controls-right jw-reset">
                                                <div class="jw-dock jw-reset">
                                                </div>
                                            </div>
                                            <div class="jw-controlbar jw-background-color jw-reset">
                                                <div class="jw-group jw-controlbar-left-group jw-reset">
                                                    <div class="jw-icon jw-icon-inline jw-button-color jw-reset jw-icon-playback"></div>
                                                    <div class="jw-icon jw-icon-inline jw-button-color jw-reset jw-icon-prev" style="display: none;"></div>
                                                    <div class="jw-icon jw-icon-tooltip jw-icon-playlist jw-button-color jw-reset jw-hidden">
                                                        <div class="jw-overlay jw-reset"></div>
                                                    </div>
                                                    <div class="jw-icon jw-icon-inline jw-button-color jw-reset jw-icon-next" style="display: none;"></div><span class="jw-text jw-reset jw-text-elapsed">00:00</span></div>
                                                <div class="jw-group jw-controlbar-center-group jw-reset">
                                                    <div class="jw-slider-time jw-background-color jw-reset jw-slider-horizontal jw-reset">
                                                        <div class="jw-slider-container jw-reset">
                                                            <div class="jw-rail jw-reset"></div>
                                                            <div class="jw-buffer jw-reset" style="width: 27.6497%;"></div>
                                                            <div class="jw-progress jw-reset" style="width: 0%;"></div>
                                                            <div class="jw-knob jw-reset" style="left: 0%;"></div>
                                                            <div class="jw-icon jw-icon-tooltip jw-tooltip-time jw-button-color jw-reset">
                                                                <div class="jw-overlay jw-reset">
                                                                    <div class="jw-time-tip jw-background-color jw-reset">
                                                                        <div class="jw-reset" style="width: 0px; height: 0px;"></div><span class="jw-text jw-reset"></span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><span class="jw-text jw-reset jw-text-alt"></span></div>
                                                <div class="jw-group jw-controlbar-right-group jw-reset"><span class="jw-text jw-reset jw-text-duration">02:39</span>
                                                    <div class="jw-icon jw-icon-tooltip jw-icon-hd jw-button-color jw-reset jw-hidden">
                                                        <div class="jw-overlay jw-reset"></div>
                                                    </div>
                                                    <div class="jw-icon jw-icon-tooltip jw-icon-cc jw-button-color jw-reset jw-hidden jw-off">
                                                        <div class="jw-overlay jw-reset"></div>
                                                    </div>
                                                    <div class="jw-icon jw-icon-tooltip jw-icon-audio-tracks jw-button-color jw-reset jw-hidden">
                                                        <div class="jw-overlay jw-reset"></div>
                                                    </div>
                                                    <div class="jw-icon jw-icon-tooltip jw-icon-more jw-button-color jw-reset jw-hidden">
                                                        <div class="jw-overlay-horizontal jw-reset"></div>
                                                    </div>
                                                    <div class="jw-icon jw-icon-inline jw-button-color jw-reset jw-icon-cast jw-off" style="display: none;"></div>
                                                    <div class="jw-icon jw-icon-inline jw-button-color jw-reset jw-icon-fullscreen"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="tags">
                                    <li class="caption">
                                        <span>Tags</span>
                                        <i class="fa fa-caret-right"></i>
                                    </li>

                                    <c:each from="{$filminfo.tags_link}" value="$tag">
                    <li class="tag-item"><h2><a href="{$tag.link}" title="{$tag.title}" rel="tag">{$tag.title}</a><c:if is="!{$tag.is_last}">, </c:if></h2></li>
                </c:each>
                                </ul>
                                <div class="clear"></div>
                                <div class="keywords">
                                    <h4><c:if is="{$filminfo.type} == 1">
                Xem phim {$filminfo.title} - {$filminfo.title_o}, <strong>{$filminfo.title}</strong>, {$filminfo.title} Full HD, <strong>{$filminfo.title} thuyết minh</strong>, {$filminfo.title} lồng tiếng, {$filminfo.title} Vietsub, {$filminfo.title} bản đẹp, {$filminfo.title} bản cam, {$filminfo.title} chiếu rạp, {$filminfo.title} phụ đề, {$filminfo.title} hậu trường, {$filminfo.title} tập mới, {$filminfo.title} phần mới, {$filminfo.title} {$filminfo.year}, {$filminfo.title_o} {$filminfo.year}, {$filminfo.title} {$filminfo.country.name}, {$filminfo.title_o} {$filminfo.country.name}, xem phim {$filminfo.title_o} {$filminfo.country.name}, phim {$filminfo.title_o} {$filminfo.country.name}, {$filminfo.title_o} {$filminfo.country.name} {$filminfo.year}, {$filminfo.country.name} {$filminfo.year}, phim {$filminfo.country.name} năm {$filminfo.year}, {$filminfo.title} {$filminfo.status}
                <c:else />
                {$filminfo.title} trọn bộ, {$filminfo.title} Vietsub, {$filminfo.title} tập cuối, {$filminfo.title} Vietsub thuyết minh, {$filminfo.title} lồng tiếng, {$filminfo.title} Full hd, {$filminfo.title} bản đẹp, Hậu trường {$filminfo.title}, trailer {$filminfo.title}, {$filminfo.title} phụ đề Xem phim {$filminfo.title_o}, {$filminfo.title} {$filminfo.year}, {$filminfo.title} tập mới, {$filminfo.title} phần mới, {$filminfo.title} phụ đề, {$filminfo.title_o} {$filminfo.year}, {$filminfo.title} {$filminfo.country.name}, {$filminfo.title_o} {$filminfo.country.name}, , phim {$filminfo.title_o} {$filminfo.country.name}, {$filminfo.title_o} {$filminfo.country.name} {$filminfo.year}, {$filminfo.country.name} {$filminfo.year}, phim {$filminfo.country.name} năm {$filminfo.year}, {$filminfo.title} {$filminfo.status} <c:if is="{$split_timeLine.split}">, <c:each from="{$split_timeLine.split}" value="$timeline"> {$timeline}</c:each></c:if>
            </c:if></h4>
                                </div>
                            </div>
                            <div class="note-browser">
                                Điện thoại, máy tính bảng xem tốt nhất với trình duyệt Google Chrome, Cốc Cốc.
                            </div>
                            <div id="comment-tab">
                                <ul class="tab-comment">
                                    <li class="active"><a href="http://phimbathu.com/tho-san-tien-thuong-2767.html#tabs-facebook">Facebook</a></li>
                                    <li><a href="http://phimbathu.com/tho-san-tien-thuong-2767.html#tabs-system">Phimbathu.com</a></li>
                                </ul>
                                <div class="fb-comments fb_iframe_widget fb_iframe_widget_fluid" data-href="http://phimbathu.com/tho-san-tien-thuong-2767.html" data-width="670" data-numposts="5" data-order-by="reverse_time" data-colorscheme="dark" fb-xfbml-state="rendered"><span style="height: 762px;"><iframe id="f248fdd45e9716" name="f161c568735f408" scrolling="no" title="Facebook Social Plugin" class="fb_ltr fb_iframe_widget_lift" src="./Phim Thợ Săn Tiền Thưởng VietSub + Thuyết minh _ Bounty Hunter 2016_files/comments.html" style="border: none; overflow: hidden; height: 762px; width: 100%;"></iframe></span></div>
                                <div class="box-comment" id="tabs-facebook">
                                </div>
                                <div class="box-comment" id="tabs-system">
                                    <div class="system-comment">
                                        <div class="head">
                                            <i class="fa fa-comment"></i><span>Bình luận</span>
                                        </div>
                                        <form id="form_comment" action="http://phimbathu.com/comment/comment/2767" method="POST">
                                            <i class="fa fa-user"></i>
                                            <div class="input">
                                                <textarea name="comment" id="comment_comment"></textarea>
                                            </div>
                                            <input type="hidden" id="comment_uid" value="31305">
                                            <input type="hidden" id="comment_username" value="thanhvutruong">
                                            <input type="hidden" id="comment_token" value="ff92a44dd7fe8cdfd519c9c57af3ec77f1e360d3">
                                            <span class="message"></span>
                                            <button type="submit" class="comment-submit">Đăng</button>
                                        </form>
                                        <div style="clear: both;"></div>
                                    </div>
                                    <div id="box-list-comment" class="system-comment">
                                        <ul class="list-comment">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-films film-hot">
                            <h4 class="title-box"><i class="fa fa-star-o"></i><a href="javascript:void(0)">Phim đề cử</a></h4>
                            <ul id="film_related" class="relative owl-carousel owl-theme" style="opacity: 1; display: block;">
                                <div class="owl-wrapper-outer">
                                    <div class="owl-wrapper" style="width: 4378px; left: 0px; display: block;">
                                        <div class="owl-item" style="width: 199px;">
                                            <li class="item" title="Hội Thợ Săn">
                                                <span class="label">Tập 5 Vietsub</span>
                                                <a href="http://phimbathu.com/hoi-tho-san-2911.html">
                                                    <img class="img-film lazy" data-original="http://media.phimbathu.com/uploads/2016/04/250/hunters--2016-hoi-tho-san-2016-1-201604745.jpg" alt="Hội Thợ Săn" src="./Phim Thợ Săn Tiền Thưởng VietSub + Thuyết minh _ Bounty Hunter 2016_files/hunters--2016-hoi-tho-san-2016-1-201604745.jpg" style="height: 238.75px;">
                                                    <div class="text absolute">
                                                        <span class="title">Hội Thợ Săn</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </div>
                                        <div class="owl-item" style="width: 199px;">
                                            <li class="item" title="Phù Thủy Rừng Blair">
                                                <span class="label">Bản đẹp + Vietsub</span>
                                                <a href="http://phimbathu.com/phu-thuy-rung-blair-4851.html">
                                                    <img class="img-film lazy" data-original="http://media.phimbathu.com/uploads/2016/10/250/phu-thuy-201610878.jpg" alt="Phù Thủy Rừng Blair" src="./Phim Thợ Săn Tiền Thưởng VietSub + Thuyết minh _ Bounty Hunter 2016_files/phu-thuy-201610878.jpg" style="height: 238.75px;">
                                                    <div class="text absolute">
                                                        <span class="title">Phù Thủy Rừng Blair</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </div>
                                        <div class="owl-item" style="width: 199px;">
                                            <li class="item" title="Danh Sách Đen Phần 4">
                                                <span class="label">Tập 3 Engsub</span>
                                                <a href="http://phimbathu.com/danh-sach-den-phan-4-4707.html">
                                                    <img class="img-film lazy" data-original="http://media.phimbathu.com/uploads/2016/09/250/the-black-list-201609122.jpg" alt="Danh Sách Đen Phần 4" src="./Phim Thợ Săn Tiền Thưởng VietSub + Thuyết minh _ Bounty Hunter 2016_files/the-black-list-201609122.jpg" style="height: 238.75px;">
                                                    <div class="text absolute">
                                                        <span class="title">Danh Sách Đen Phần 4</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </div>
                                        <div class="owl-item" style="width: 199px;">
                                            <li class="item" title="Chim Sẻ - Ma Tước">
                                                <span class="label">Tập 51 Vietsub + Thuyết minh</span>
                                                <a href="http://phimbathu.com/chim-se---ma-tuoc-4115.html">
                                                    <img class="img-film lazy" data-original="http://media.phimbathu.com/uploads/2016/08/250/chim-se-di-nang-201608553.jpg" alt="Chim Sẻ - Ma Tước" src="./Phim Thợ Săn Tiền Thưởng VietSub + Thuyết minh _ Bounty Hunter 2016_files/chim-se-di-nang-201608553.jpg" style="height: 238.75px;">
                                                    <div class="text absolute">
                                                        <span class="title">Chim Sẻ - Ma Tước</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </div>
                                        <div class="owl-item" style="width: 199px;">
                                            <li class="item" title="Ác Mộng Bóng Đêm">
                                                <span class="label">Bản đẹp + Vietsub</span>
                                                <a href="http://phimbathu.com/ac-mong-bong-dem-4825.html">
                                                    <img class="img-film lazy" data-original="http://media.phimbathu.com/uploads/2016/10/250/acm-201610632.jpg" alt="Ác Mộng Bóng Đêm" src="./Phim Thợ Săn Tiền Thưởng VietSub + Thuyết minh _ Bounty Hunter 2016_files/acm-201610632.jpg" style="height: 238.75px;">
                                                    <div class="text absolute">
                                                        <span class="title">Ác Mộng Bóng Đêm</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </div>
                                        <div class="owl-item" style="width: 199px;">
                                            <li class="item" title="Điệp Viên Trở Lại">
                                                <span class="label">Bản đẹp + Thuyết minh</span>
                                                <a href="http://phimbathu.com/diep-vien-tro-lai-4844.html">
                                                    <img class="img-film lazy" data-original="http://media.phimbathu.com/uploads/2016/10/250/end-of-a-gun-diep-vien-tro-lai-201610251.jpg" alt="Điệp Viên Trở Lại" src="./Phim Thợ Săn Tiền Thưởng VietSub + Thuyết minh _ Bounty Hunter 2016_files/end-of-a-gun-diep-vien-tro-lai-201610251.jpg" style="height: 238.75px;">
                                                    <div class="text absolute">
                                                        <span class="title">Điệp Viên Trở Lại</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </div>
                                        <div class="owl-item" style="width: 199px;">
                                            <li class="item" title="Biệt Đội Săn Ma">
                                                <span class="label">Vietsub + Thuyết minh</span>
                                                <a href="http://phimbathu.com/biet-doi-san-ma-2728.html">
                                                    <img class="img-film lazy" data-original="http://media.phimbathu.com/uploads/2016/03/250/ghostbusters-poster1-201603272.jpg" alt="Biệt Đội Săn Ma" src="./Phim Thợ Săn Tiền Thưởng VietSub + Thuyết minh _ Bounty Hunter 2016_files/ghostbusters-poster1-201603272.jpg" style="height: 238.75px;">
                                                    <div class="text absolute">
                                                        <span class="title">Biệt Đội Săn Ma</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </div>
                                        <div class="owl-item" style="width: 199px;">
                                            <li class="item" title="Đế Chế Tàn Bạo">
                                                <span class="label">Bản đẹp + Thuyết minh</span>
                                                <a href="http://phimbathu.com/de-che-tan-bao-4843.html">
                                                    <img class="img-film lazy" data-original="http://media.phimbathu.com/uploads/2016/10/250/viking-legacy-2016-201610578.jpg" alt="Đế Chế Tàn Bạo" src="./Phim Thợ Săn Tiền Thưởng VietSub + Thuyết minh _ Bounty Hunter 2016_files/viking-legacy-2016-201610578.jpg" style="height: 238.75px;">
                                                    <div class="text absolute">
                                                        <span class="title">Đế Chế Tàn Bạo</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </div>
                                        <div class="owl-item" style="width: 199px;">
                                            <li class="item" title="Vụ Nổ Lớn Phần 10">
                                                <span class="label">Tập 3 Engsub</span>
                                                <a href="http://phimbathu.com/vu-no-lon-phan-10-4842.html">
                                                    <img class="img-film lazy" data-original="http://media.phimbathu.com/uploads/2016/10/250/vu-no-201610329.jpg" alt="Vụ Nổ Lớn Phần 10" src="./Phim Thợ Săn Tiền Thưởng VietSub + Thuyết minh _ Bounty Hunter 2016_files/vu-no-201610329.jpg" style="height: 238.75px;">
                                                    <div class="text absolute">
                                                        <span class="title">Vụ Nổ Lớn Phần 10</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </div>
                                        <div class="owl-item" style="width: 199px;">
                                            <li class="item" title="Khắc Tinh Ma Cà Rồng">
                                                <span class="label">Tập 3 Vietsub</span>
                                                <a href="http://phimbathu.com/khac-tinh-ma-ca-rong-4848.html">
                                                    <img class="img-film lazy" data-original="http://media.phimbathu.com/uploads/2016/10/250/van-helsing-201610150.jpg" alt="Khắc Tinh Ma Cà Rồng" src="./Phim Thợ Săn Tiền Thưởng VietSub + Thuyết minh _ Bounty Hunter 2016_files/van-helsing-201610150.jpg" style="height: 238.75px;">
                                                    <div class="text absolute">
                                                        <span class="title">Khắc Tinh Ma Cà Rồng</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </div>
                                        <div class="owl-item" style="width: 199px;">
                                            <li class="item" title="Nhà Thám Hiểm Marco 2">
                                                <span class="label">Tập 6 Vietsub</span>
                                                <a href="http://phimbathu.com/nha-tham-hiem-marco-2-4835.html">
                                                    <img class="img-film lazy" data-original="http://media.phimbathu.com/uploads/2016/10/250/mace-201610363.jpg" alt="Nhà Thám Hiểm Marco 2" src="./Phim Thợ Săn Tiền Thưởng VietSub + Thuyết minh _ Bounty Hunter 2016_files/mace-201610363.jpg" style="height: 238.75px;">
                                                    <div class="text absolute">
                                                        <span class="title">Nhà Thám Hiểm Marco 2</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-controls">
                                    <div class="owl-buttons">
                                        <div class="owl-prev"><i class="fa fa-angle-left"></i></div>
                                        <div class="owl-next"><i class="fa fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </ul>
                        </div>
                        
                    </div>
<!-- END: film -->