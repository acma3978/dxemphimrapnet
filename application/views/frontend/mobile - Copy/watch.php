<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!-- BEGIN: watch -->

<div id="page-watch" data-film-id="{$filminfo.film_id}" data-title="{$filminfo.title}">

    <div id="profile-media">
        <div class="profile-media-img col-lg-3 col-xs-4-fix" style="padding:0">
            <c:if is="{$filminfo.thumb_url} != NULL">
                <img src="{$cache_link_img}{$filminfo.thumb_url}" alt="{$film.title}">
                <c:else />
                <img src="{$cache_link_img}{$filminfo.thumb_url_o}" alt="{$film.title}">
            </c:if>
            <c:if is="{$filminfo.check_trailer} != '1'"> <span class="i-episode">{$filminfo.status}</span><c:else /> <span class="i-episode red">Trailer</span></c:if>
        </div>
        <div class="media-watch-player col-lg-3 col-xs-8" style="margin-left: 5px;padding: 0;">
            <div class="profile-media-content">
                <div class="media_content_page">
                    <c:if is="{$filminfo.pagetext2}!=''">
                        {$filminfo.mini_pagetext2}
                        <c:else />
                        {$filminfo.mini_pagetext}
                    </c:if>
                </div><!--end.tbhd_page-->
                <div class="media-button-more">
                    <c:if is="{$filminfo.pagetext2}!=''">
                        <a href="{$filminfo.link_nd}" title="Nội dung {$film.title}">[Xem thêm]</a>
                        <c:else />
                        <a href="{$filminfo.link}" title="Nội dung {$film.title}">[Xem thêm]</a>
                    </c:if>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="profile-media-status">
            <ol>
                <li><i class="icon icon-op i-views"></i>{$filminfo.views_format}</li>
                <li><i class="icon icon-op i-year"></i><label>Năm:</label> {$filminfo.year}</li>
                <li><i class="icon icon-op i-country"></i><label>Quốc gia:</label> <a href="{$filminfo.country.link}" title="Phim {$filminfo.country.name}"> {$filminfo.country.name}</a></li>
            </ol>
        </div>
    </div><!--end#profile-media-->



    <div class="detail blocktitle">
<div class="block" id="movie">
    <div class="ad_location above_of_player">{$ad_location.ad_above_of_player}</div>
    <div class="blockbody">
        <c:if is="{$filminfo.note} != ''">
            <div class="note report">
                {$filminfo.note}
            </div>
        </c:if>
        <c:if is="{$filminfo.episode.server_type} == 'download'">
            <div class="download">
                <a href="{$filminfo.episode.video_url}" target="_blank">[{$filminfo.episode.server_title}] Download</a>
            </div>
            <c:else />
            <div id="media" class="block context-menu-one menu-1">
                <div id="mediaplayer">
                    <div id="player"></div>
                    <script id="jwsource" type="text/javascript">
                        jwplayer.setup = {$filminfo.setup_jwplayer}
                    </script>
                </div>
            </div>
        </c:if>

        <!-- Start Report Episode -->
        <div class="navbar navbar-fixed-top">
            <div class="modal inmodal fade" id="myModal5" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="false" style="display:none">
                <div class="modal-header">
                    <a class="close" data-dismiss="modal" style="color:#000;font-size:30px">×</a>
                    <div class="report-title">Lỗi tập phim: {$filminfo.title}</div>
                </div>
                <div class="modal-body">
                    <label>Hiện phim này đang bị lỗi có thể do những nguyên nhân sau đây:</label>
                    <ol>
                        <li>1. Có thể phim không thể kết nối được với Server</li>
                        <li>2. Có thể lỗi link từ Server chứa</li>
                        <li>3. Có thể do đường truyền của bạn gặp sự cố</li>
                    </ol>

                    <!--<canvas id="canvas" class="col-md-14" tabindex="0" style="padding:0;margin-bottom:10px; border: 1px solid"> </canvas>-->
                    <!--<div class="col-md-13 controll-item">
                        <span class="up"><span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span></span>
                        <span class="down"><span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span></span>
                        <span class="left"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></span>
                        <span class="right"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></span>
                    </div>-->
                    <button type="button" id="refesh-page-tb" class="btn btn-w-m btn-info">Tải lại phim</button>
                    <button type="button" id="next-episode" class="btn btn-w-m btn-white">Tập khác ></button>
                </div>
            </div>
        </div>
        <!-- End Report Episodde -->

        <!--<div class="clearfix"></div>-->
    </div>

</div>
<div class="block" id="movie-info">
    <div class="blockbody">
        <div class="ad_location below_of_player">{$ad_location.ad_below_of_player}</div>

        <div class="serverlist">

            <c:each from="$server_cache" key="$server_id" value="$server">
                <div class="server">
                    <div class="label"><i class="icon media-icon-server"></i>{$server.title} <!--<i class="icon media-server server-{$server.flag}"></i>--></div>
                    <div class="list-server list_carousel">
                        <div class="mega-carousel episodelist clearfix row">
                            <c:each from="$episode_cache[$server_id]" value="$episode">
                            <div class="col-lg-3 col-xs-3">
                                <div class="small-box">

                                    <a data-type="{$server.type}"  data-episode-id="{$episode.episode_id}" href="{$episode.link}" title="Tập {$episode.name} - {$server.title}" <c:if is="{$episode.is_current}"> class="bg-white inner active"<c:else /> class="bg-white inner"</c:if>>

                                        {$episode.name}

                                    </a>
                                </div>
                            </div>
                            </c:each>
                        </div>

                        <!--<a id="prevTop" class="prev-play-{$server_id}" rel="nofollow" style="display: block;">
                            <span class="arrow-icon left"></span>
                        </a>
                        <a id="nextTop" class="next-play-{$server_id" rel="nofollow" style="display: block;">
                            <span class="arrow-icon right"></span>
                        </a>-->
                        <div class="clearfix"></div>
                    </div>

                </div><!--/.server-->
            </c:each>
        </div><!--end.serverlist-->
    </div>
</div><!--end#movie-info-->
<div class="clearfix"></div>
        <div class="main-title title-ik-comment"><p>Bình luận</p><span>Bạn có thể bình luận thoải mái</span></div>
        <div id="box-comment">
            <div class="tabs" data-target="#i-comment">
                <div class="tab tab-title active" data-name="item-facebook-comment">Facebook</div>
                <div class="tab tab-title" data-name="item-google-comment">Google+</div>
            </div>
            <div id="i-comment" class="i-comment clearfix">

                <div class="tab item-facebook-comment">
                    <div id="fb-root"></div>
                    <div class="fb-comments" data-href="{$url_base}{$filminfo.link}" data-width="685" data-colorscheme="dark"></div>
                </div><!--end.item-facebook-comment-->

                <div class="tab item-google-comment hide">
                    <div id="g-comments" class="g-comments" data-width="685"></div>
                </div><!--end.item-google-comment-->

            </div><!--end#i-comment-->
            <div class="clearfix"></div>
        </div><!--end#box-comment-->
    <div class="tabs-content">
        <div id="item-tags" class="tags" style="margin-top:0">
            <span class="label">Từ khóa: </span>
            <h3 class="items">
                <c:each from="{$filminfo.tags_link}" value="$tag">
                    <a href="{$tag.link}" title="{$tag.title}" rel="tag">{$tag.title}</a><c:if is="!{$tag.is_last}">, </c:if>
                </c:each>
            </h3>
        </div>
    </div>
    <div class="main-title title-ik-comment" style="margin-top:10px"><p>Phim cùng chuyên mục</p><span>Có thể bạn muốn xem</span></div>
        <div class="item-category content">
            <div class="list-item row">
                <c:each from="$phim_category" value="$film">
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box">
                            <div class="m-item-box inner">

                                <a href="{$film.link}" title="{$film.title}">
                                    <c:if is="{$film.thumb_url} != NULL">
                                        <img class="image-decoration" src="{$cache_link_img}{$film.thumb_url}" alt="{$film.title}">
                                        <c:else />
                                        <img class="image-decoration" src="{$cache_link_img}{$film.thumb_url_o}" alt="{$film.title}">
                                    </c:if>
                                </a>

                                <span class="shadow status">{$film.status}</span>
                                <span class="i-episode">{$film.timeline}</span>
                            </div>

                            <div class="item-info">
                                <a href="{$film.link}" title="{$film.title}">
                                    <span class="split name-vn">{$film.title} {$film.year}</span>
                                    <!--<span class="split name-en">{$film.title_o}</span>-->
                                    <span class="views">Lượt xem: {$film.views}</span>
                                </a>
                            </div>
                        </div>

                    </div>
                </c:each>
            </div><!--end.row-->
        </div>
</div>
</div>
<script type="text/javascript">
    AppPack.Public.init();
    AppPack.Watch.init('{$filminfo.film_id}');
    <c:if is="!{$filminfo.is_newtab}">
    AppPack.Watch.checkAndPlayEpisodeViewing();
    </c:if>
</script>
<!-- END: watch -->