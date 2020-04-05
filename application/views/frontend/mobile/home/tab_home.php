<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!-- BEGIN: tab_home -->


    <c:if is="{$top_phim_trailer}">
        <div class="block-items tab">
        <div class="tab-lists fix-row">
            <c:each from="{$top_phim_trailer.top}" key="$key" value="$film">
    
                <a class=" list-item-with-thumb row" href="{$film.link}" title="{$film.title}">
                    <div class=" outer" style="padding-bottom: 55%;">
                        <div class="inner">
                            <img class="img-responsive" title="{$film.title}" src="{$film.imagefan_thumb_url}" width="350px" alt="{$film.title}">
                            <span>{$film.status}</span>
                            <em class="number">1</em>
                            <div class="description">
                                <h3 class="font-13"> {$film.title}</h3>
                                <h4 class="font-11">{$film.title_o}</h4>
                            </div>
                            <span class="icon-play">&nbsp;</span>
                        </div>
                    </div>
                </a>
    
    
            </c:each>

            <c:each from="{$top_phim_trailer.middle}" key="$key" value="$film">
                <a class=" list-item-with-thumb row fix-row" href="{$film.link}" title="{$film.title}">
                    <div class="outer" style="padding-bottom: 55%;">
                        <div class="inner">
                            <img class="img-responsive" title="{$film.title}" src="{$film.imagefan_thumb_url}" width="350px" alt="{$film.title}">
                            <span>{$film.status}</span>
                            <em class="number">2</em>
                            <div class="description">
                                <h3 class="font-13"> {$film.title}</h3>
                                <h4 class="font-11">{$film.title_o}</h4>
                            </div>
                            <span class="icon-play">&nbsp;</span>
                        </div>
                    </div>
                </a>
            </c:each>
            <div class="clear"></div>

            <div class="tab-lists fix-row">
                <c:each from="{$top_phim_trailer.last}" key="$key" value="$film">

                <a class="list-item" data-frate="{$film.liked_times_float}" href="{$film.link}">

                    <div class="block-rating show-rating rating-small">
                        <div class="i-box_star" data-score="{$film.liked_times_float}" data-filmid="{$film.film_id}" itemtype="http://data-vocabulary.org/Review-aggregate" itemscope>

                            <div class="show-star-rate" data-vote="{$film.liked_format}" data-rate="{$film.liked_times}" data-frate="{$film.liked_times_float}"></div>
                            <div class="item-hint"></div>
                        </div>


                    </div>
                    <em class="number">{$key}</em>
                    <div class="desc-span">

                        <h3 class="title"> {$film.title}</h3>
                    </div>

                </a>

            </c:each>

            </div>
            </div>
            </div>
        </c:if>

    <c:if is="{$phim_danh_gia}">
        <div class="block-items tab">
        <div class="tab-lists fix-row">
            <c:each from="{$phim_danh_gia.top}" key="$key" value="$film">

                <a class=" list-item-with-thumb row" href="{$film.link}" title="{$film.title}">
                    <div class=" outer" style="padding-bottom: 55%;">
                        <div class="inner">
                            <img class="img-responsive" title="{$film.title}" src="{$film.imagefan_thumb_url}" width="350px" alt="{$film.title}">
                            <span>{$film.status}</span>
                            <em class="number">1</em>
                            <div class="description">
                                <h3 class="font-13"> {$film.title}</h3>
                                <h4 class="font-11">{$film.title_o}</h4>
                            </div>
                            <span class="icon-play">&nbsp;</span>
                        </div>
                    </div>
                </a>


            </c:each>

            <c:each from="{$phim_danh_gia.middle}" key="$key" value="$film">
                <a class=" list-item-with-thumb row fix-row" href="{$film.link}" title="{$film.title}">
                    <div class="outer" style="padding-bottom: 55%;">
                        <div class="inner">
                            <img class="img-responsive" title="{$film.title}" src="{$film.imagefan_thumb_url}" width="350px" alt="{$film.title}">
                            <span>{$film.status}</span>
                            <em class="number">2</em>
                            <div class="description">
                                <h3 class="font-13"> {$film.title}</h3>
                                <h4 class="font-11">{$film.title_o}</h4>
                            </div>
                            <span class="icon-play">&nbsp;</span>
                        </div>
                    </div>
                </a>
            </c:each>
            <div class="clear"></div>

            <div class="tab-lists fix-row">
                <c:each from="{$phim_danh_gia.last}" key="$key" value="$film">

                    <a class="list-item" data-frate="{$film.liked_times_float}" href="{$film.link}">

                        <div class="block-rating show-rating rating-small">
                            <div class="i-box_star" data-score="{$film.liked_times_float}" data-filmid="{$film.film_id}" itemtype="http://data-vocabulary.org/Review-aggregate" itemscope>

                                <div class="show-star-rate" data-vote="{$film.liked_format}" data-rate="{$film.liked_times}" data-frate="{$film.liked_times_float}"></div>
                                <div class="item-hint"></div>
                            </div>


                        </div>
                        <em class="number">{$key}</em>
                        <div class="desc-span">

                            <h3 class="title"> {$film.title}</h3>
                        </div>
                    </a>

                </c:each>
                <div class="clear"></div>
            </div><!--end.tab-lists-->
        </div>
            </div>
    </c:if>

<c:if is="{$phim_related_title}">
    <div class="block-items">
        <c:each from="$phim_related_title" value="$film">

            <div class="col-lg-3">
                <div class="item" style="padding-bottom: 150%">
                    <a class="inner" href="{$film.link}" title="{$film.title}">
                        <c:if is="{$film.thumb_url} != NULL">
                            <img class="thumbImg" src="{$cache_link_img}{$film.thumb_url}" alt="{$film.title}">
                            <c:else />
                            <img class="thumbImg" src="{$cache_link_img}{$film.thumb_url_o}" alt="{$film.title}">
                        </c:if>
                        <span class="icon-play"></span>

                        <div class="description"><h3 class="split name-vn">{$film.title}</h3><h4 class="split name-en">{$film.title_o}</h4></div>

                        <div class="figure_more"><span class="figure_more_title">{$film.status}</span></div>

                    </a>
                </div><!--end.item-->


            </div><!--end.items-category-->
        </c:each>
    </div>
</c:if>

<c:if is="{$phim_category}">
    <div class="block-items">
        <c:each from="$phim_category" value="$film">

            <div class="col-lg-3">
                <div class="item" style="padding-bottom: 150%">
                    <a class="inner" href="{$film.link}" title="{$film.title}">
                        <c:if is="{$film.thumb_url} != NULL">
                            <img class="thumbImg" src="{$cache_link_img}{$film.thumb_url}" alt="{$film.title}">
                            <c:else />
                            <img class="thumbImg" src="{$cache_link_img}{$film.thumb_url_o}" alt="{$film.title}">
                        </c:if>
                        <span class="icon-play"></span>

                        <div class="description"><h3 class="split name-vn">{$film.title}</h3><h4 class="split name-en">{$film.title_o}</h4></div>

                        <div class="figure_more"><span class="figure_more_title">{$film.status}</span></div>

                    </a>
                </div><!--end.item-->


            </div><!--end.items-category-->
        </c:each>
    </div>
</c:if>

<c:if is="{$phim_chieu_rap_hot}">
    <ul>
        <c:each from="$phim_chieu_rap_hot" value="$film">
            <li class="item no-margin-left">
                <span class="label">{$film.status}</span>
                <a class="inner" href="{$film.link}" title="{$film.title}">
                    <c:if is="{$film.thumb_url} != NULL">
                        <img class="img-film lazy" src="{$cache_link_img}{$film.thumb_url}" alt="{$film.title}" style="height: 261.28px;">
                        <c:else />
                        <img class="img-film lazy" src="{$cache_link_img}{$film.thumb_url_o}" alt="{$film.title}" style="height: 261.28px;">
                    </c:if>


                    <div class="name">
                        <span>{$film.title}</span>
                    </div>
                    <div class="name-real">
                        <span>{$film.title_o} ({$film.year})</span>
                    </div>
                </a>

            </li>
        </c:each>
    </ul>
</c:if>

<c:if is="{$phim_hai_huoc}">
    <div class="block-items tab row fix-row">
        <c:each from="$phim_hai_huoc" value="$film">
            <div class="col-lg-3">
                <div class="item" style="padding-bottom: 150%">
                    <a class="inner" href="{$film.link}" title="{$film.title}">
                        <c:if is="{$film.thumb_url} != NULL">
                            <img src="{$cache_link_img}{$film.thumb_url}" alt="{$film.title}">
                            <c:else />
                            <img src="{$cache_link_img}{$film.thumb_url_o}" alt="{$film.title}">
                        </c:if>

                        <span class="icon-play"></span>
                        <div class="description">

                            <h3 class="split name-vn">{$film.title}</h3>
                            <h4 class="split name-en">{$film.title_o}</h4>

                        </div>
                        <div class="figure_more"> <span class="figure_more_title">{$film.status}</span></div>
                    </a>
                </div><!--end.item-->
            </div>
        </c:each>
    </div>
</c:if>

<c:if is="{$phim_tam_ly}">
    <div class="block-items tab row fix-row">
        <c:each from="$phim_tam_ly" value="$film">
            <div class="col-lg-3">
                <div class="item" style="padding-bottom: 150%">
                    <a class="inner" href="{$film.link}" title="{$film.title}">
                        <c:if is="{$film.thumb_url} != NULL">
                            <img src="{$cache_link_img}{$film.thumb_url}" alt="{$film.title}">
                            <c:else />
                            <img src="{$cache_link_img}{$film.thumb_url_o}" alt="{$film.title}">
                        </c:if>

                        <span class="icon-play"></span>
                        <div class="description">

                            <h3 class="split name-vn">{$film.title}</h3>
                            <h4 class="split name-en">{$film.title_o}</h4>

                        </div>
                        <div class="figure_more"> <span class="figure_more_title">{$film.status}</span></div>
                    </a>
                </div><!--end.item-->
            </div>
        </c:each>
    </div>
</c:if>

<c:if is="{$phim_tinh_cam}">
    <div class="block-items tab row fix-row">
        <c:each from="$phim_tinh_cam" value="$film">
            <div class="col-lg-3">
                <div class="item" style="padding-bottom: 150%">
                    <a class="inner" href="{$film.link}" title="{$film.title}">
                        <c:if is="{$film.thumb_url} != NULL">
                            <img src="{$cache_link_img}{$film.thumb_url}" alt="{$film.title}">
                            <c:else />
                            <img src="{$cache_link_img}{$film.thumb_url_o}" alt="{$film.title}">
                        </c:if>

                        <span class="icon-play"></span>
                        <div class="description">

                            <h3 class="split name-vn">{$film.title}</h3>
                            <h4 class="split name-en">{$film.title_o}</h4>

                        </div>
                        <div class="figure_more"> <span class="figure_more_title">{$film.status}</span></div>
                    </a>
                </div><!--end.item-->
            </div>
        </c:each>
    </div>
</c:if>

<c:if is="{$phim_vo_thuat}">
    <div class="block-items tab row fix-row">
        <c:each from="$phim_vo_thuat" value="$film">
            <div class="col-lg-3">
                <div class="item" style="padding-bottom: 150%">
                    <a class="inner" href="{$film.link}" title="{$film.title}">
                        <c:if is="{$film.thumb_url} != NULL">
                            <img src="{$cache_link_img}{$film.thumb_url}" alt="{$film.title}">
                            <c:else />
                            <img src="{$cache_link_img}{$film.thumb_url_o}" alt="{$film.title}">
                        </c:if>

                        <span class="icon-play"></span>
                        <div class="description">

                            <h3 class="split name-vn">{$film.title}</h3>
                            <h4 class="split name-en">{$film.title_o}</h4>

                        </div>
                        <div class="figure_more"> <span class="figure_more_title">{$film.status}</span></div>
                    </a>
                </div><!--end.item-->
            </div>
        </c:each>
    </div>
</c:if>

<c:if is="{$phim_hanh_dong}">
    <div class="block-items tab row fix-row">
        <c:each from="$phim_hanh_dong" value="$film">
            <div class="col-lg-3">
                <div class="item" style="padding-bottom: 150%">
                    <a class="inner" href="{$film.link}" title="{$film.title}">
                        <c:if is="{$film.thumb_url} != NULL">
                            <img src="{$cache_link_img}{$film.thumb_url}" alt="{$film.title}">
                            <c:else />
                            <img src="{$cache_link_img}{$film.thumb_url_o}" alt="{$film.title}">
                        </c:if>

                        <span class="icon-play"></span>
                        <div class="description">

                            <h3 class="split name-vn">{$film.title}</h3>
                            <h4 class="split name-en">{$film.title_o}</h4>

                        </div>
                        <div class="figure_more"> <span class="figure_more_title">{$film.status}</span></div>
                    </a>
                </div><!--end.item-->
            </div>
        </c:each>
    </div>
</c:if>

<c:if is="{$phim_kinh_di}">
    <div class="block-items tab row fix-row">
        <c:each from="$phim_kinh_di" value="$film">
            <div class="col-lg-3">
                <div class="item" style="padding-bottom: 150%">
                    <a class="inner" href="{$film.link}" title="{$film.title}">
                        <c:if is="{$film.thumb_url} != NULL">
                            <img src="{$cache_link_img}{$film.thumb_url}" alt="{$film.title}">
                            <c:else />
                            <img src="{$cache_link_img}{$film.thumb_url_o}" alt="{$film.title}">
                        </c:if>

                        <span class="icon-play"></span>
                        <div class="description">

                            <h3 class="split name-vn">{$film.title}</h3>
                            <h4 class="split name-en">{$film.title_o}</h4>

                        </div>
                        <div class="figure_more"> <span class="figure_more_title">{$film.status}</span></div>
                    </a>
                </div><!--end.item-->
            </div>
        </c:each>
    </div>
</c:if>

<c:if is="{$phim_hong_kong}">
    <div class="block-items tab row fix-row">
        <c:each from="$phim_hong_kong" value="$film">
            <div class="col-lg-3">
                <div class="item" style="padding-bottom: 150%">
                    <a class="inner" href="{$film.link}" title="{$film.title}">
                        <c:if is="{$film.thumb_url} != NULL">
                            <img src="{$cache_link_img}{$film.thumb_url}" alt="{$film.title}">
                            <c:else />
                            <img src="{$cache_link_img}{$film.thumb_url_o}" alt="{$film.title}">
                        </c:if>

                        <span class="icon-play"></span>
                        <div class="description">

                            <h3 class="split name-vn">{$film.title}</h3>
                            <h4 class="split name-en">{$film.title_o}</h4>

                        </div>
                        <div class="figure_more"> <span class="figure_more_title">{$film.status}</span></div>
                    </a>
                </div><!--end.item-->
            </div>
        </c:each>
    </div>
</c:if>

<c:if is="{$phim_thai_lan}">
    <div class="block-items tab row fix-row">
        <c:each from="$phim_thai_lan" value="$film">
            <div class="col-lg-3">
                <div class="item" style="padding-bottom: 150%">
                    <a class="inner" href="{$film.link}" title="{$film.title}">
                        <c:if is="{$film.thumb_url} != NULL">
                            <img src="{$cache_link_img}{$film.thumb_url}" alt="{$film.title}">
                            <c:else />
                            <img src="{$cache_link_img}{$film.thumb_url_o}" alt="{$film.title}">
                        </c:if>

                        <span class="icon-play"></span>
                        <div class="description">

                            <h3 class="split name-vn">{$film.title}</h3>
                            <h4 class="split name-en">{$film.title_o}</h4>

                        </div>
                        <div class="figure_more"> <span class="figure_more_title">{$film.status}</span></div>
                    </a>
                </div><!--end.item-->
            </div>
        </c:each>
    </div>
</c:if>

<c:if is="{$phim_dai_loan}">
    <div class="block-items tab row fix-row">
        <c:each from="$phim_dai_loan" value="$film">
            <div class="col-lg-3">
                <div class="item" style="padding-bottom: 150%">
                    <a class="inner" href="{$film.link}" title="{$film.title}">
                        <c:if is="{$film.thumb_url} != NULL">
                            <img src="{$cache_link_img}{$film.thumb_url}" alt="{$film.title}">
                            <c:else />
                            <img src="{$cache_link_img}{$film.thumb_url_o}" alt="{$film.title}">
                        </c:if>

                        <span class="icon-play"></span>
                        <div class="description">

                            <h3 class="split name-vn">{$film.title}</h3>
                            <h4 class="split name-en">{$film.title_o}</h4>

                        </div>
                        <div class="figure_more"> <span class="figure_more_title">{$film.status}</span></div>
                    </a>
                </div><!--end.item-->
            </div>
        </c:each>
    </div>
</c:if>

<c:if is="{$le_moi_theo_nam}">
    <ul>
        <c:each from="$le_moi_theo_nam" value="$film">
            <li class="item no-margin-left">
                <span class="label">{$film.status}</span>
                    <a class="inner" href="{$film.link}" title="{$film.title}">
                        <c:if is="{$film.thumb_url} != NULL">
                            <img class="img-film lazy" src="{$cache_link_img}{$film.thumb_url}" alt="{$film.title}" style="height: 261.28px;">
                            <c:else />
                            <img class="img-film lazy" src="{$cache_link_img}{$film.thumb_url_o}" alt="{$film.title}" style="height: 261.28px;">
                        </c:if>


                        <div class="name">
                            <span>{$film.title}</span>
                        </div>
                        <div class="name-real">
                            <span>{$film.title_o} ({$film.year})</span>
                        </div>
                    </a>

            </li>
        </c:each>
    </ul>
</c:if>

<c:if is="{$bo_moi_theo_nam}">
    <ul>
        <c:each from="$bo_moi_theo_nam" value="$film">
            <li class="item no-margin-left">
                <span class="label">{$film.status}</span>
                <a class="inner" href="{$film.link}" title="{$film.title}">
                    <c:if is="{$film.thumb_url} != NULL">
                        <img class="img-film lazy" src="{$cache_link_img}{$film.thumb_url}" alt="{$film.title}" style="height: 261.28px;">
                        <c:else />
                        <img class="img-film lazy" src="{$cache_link_img}{$film.thumb_url_o}" alt="{$film.title}" style="height: 261.28px;">
                    </c:if>


                    <div class="name">
                        <span>{$film.title}</span>
                    </div>
                    <div class="name-real">
                        <span>{$film.title_o} ({$film.year})</span>
                    </div>
                </a>

            </li>
        </c:each>
    </ul>
</c:if>

<c:if is="{$phim_hoat_hinh}">
    <ul>
        <c:each from="$phim_hoat_hinh" value="$film">
            <li class="item no-margin-left">
                <span class="label">{$film.status}</span>
                <a class="inner" href="{$film.link}" title="{$film.title}">
                    <c:if is="{$film.thumb_url} != NULL">
                        <img class="img-film lazy" src="{$cache_link_img}{$film.thumb_url}" alt="{$film.title}" style="height: 261.28px;">
                        <c:else />
                        <img class="img-film lazy" src="{$cache_link_img}{$film.thumb_url_o}" alt="{$film.title}" style="height: 261.28px;">
                    </c:if>


                    <div class="name">
                        <span>{$film.title}</span>
                    </div>
                    <div class="name-real">
                        <span>{$film.title_o} ({$film.year})</span>
                    </div>
                </a>

            </li>
        </c:each>
    </ul>
</c:if>

<c:if is="{$phim_moi_sticker}">

    <c:each from="$phim_moi_sticker" value="$film">
        <a title="{$film.title} - {$film.title_o}" href="{$film.link}"><img src="{$cache_link_img}{$film.imagefan_thumb_url}" alt="{$film.title} - {$film.title_o} {$film.year}" border="0"><span><h3>{$film.title}</h3><h4>{$film.title_o} ({$film.year})</h4></span></a>
    </c:each>

</c:if>

<c:if is="{$phim_moi_nhat_xem_nhieu}">

    <div class="block-items">
        <div class="tab-lists fix-row">

            <c:each from="{$phim_moi_nhat_xem_nhieu.top}" key="$key" value="$film">

                <a class=" list-item-with-thumb row" href="{$film.link}" title="{$film.title}">
                    <div class=" outer" style="padding-bottom: 55%;">
                        <div class="inner">
                            <img class="img-responsive" title="{$film.title}" src="{$film.imagefan_thumb_url}" width="350px" alt="{$film.title}">
                            <span>{$film.status}</span>
                            <em class="number">1</em>
                            <div class="description">
                                <h3 class="font-13"> {$film.title}</h3>
                                <h4 class="font-11">{$film.title_o}</h4>
                            </div>
                            <span class="icon-play">&nbsp;</span>
                        </div>
                    </div>
                </a>
            </c:each>

            <c:each from="{$phim_moi_nhat_xem_nhieu.middle}" key="$key" value="$film">
                <a class=" list-item-with-thumb row fix-row" href="{$film.link}" title="{$film.title}">
                    <div class="outer" style="padding-bottom: 55%;">
                        <div class="inner">
                            <img class="img-responsive" title="{$film.title}" src="{$film.imagefan_thumb_url}" width="350px" alt="{$film.title}">
                            <span>{$film.status}</span>
                            <em class="number">2</em>
                            <div class="description">
                                <h3 class="font-13"> {$film.title}</h3>
                                <h4 class="font-11">{$film.title_o}</h4>
                            </div>
                            <span class="icon-play">&nbsp;</span>
                        </div>
                    </div>
                </a>
            </c:each>
            <div class="clear"></div>

            <div class="tab-lists fix-row">
                <c:each from="{$phim_moi_nhat_xem_nhieu.last}" key="$key" value="$film">

                    <a class="list-item" data-frate="{$film.liked_times_float}" href="{$film.link}">

                        <div class="block-rating show-rating rating-small">
                            <div class="i-box_star" data-score="{$film.liked_times_float}" data-filmid="{$film.film_id}" itemtype="http://data-vocabulary.org/Review-aggregate" itemscope>

                                <div class="show-star-rate" data-vote="{$film.liked_format}" data-rate="{$film.liked_times}" data-frate="{$film.liked_times_float}"></div>
                                <div class="item-hint"></div>
                            </div>
                        </div>
                        <em class="number">{$key}</em>
                        <div class="desc-span">
                            <h3 class="title"> {$film.title}</h3>
                        </div>
                    </a>

                </c:each>
                <div class="clear"></div>
            </div>
        </div>
    </div><!--end.block-items-->

</c:if>
<!-- END: tab_home -->