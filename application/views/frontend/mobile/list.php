<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!-- BEGIN: list -->

<div id="page-list" class="left-content block-list">

<div class="filter">

    <form method="get" action="{$request_uri}">

        <c:if is="{$show.order_filter}">

            <div class="item">

                <label>Sắp xếp</label>
                <select class="input" name="order_by">

                    <option value="">-Mặc định-</option>

                    <option value="last_update"<c:if is="{$filters.order_by} == 'last_update'"> selected="selected"</c:if>>Mới nhất</option>

                    <option value="year"<c:if is="{$filters.order_by} == 'year'"> selected="selected"</c:if>>Năm phát hành</option>

                    <option value="title"<c:if is="{$filters.order_by} == 'title'"> selected="selected"</c:if>>Tiêu đề phim</option>

                    <option value="views"<c:if is="{$filters.order_by} == 'views'"> selected="selected"</c:if>>Lượt xem</option>

                    <option value="liked_times"<c:if is="{$filters.order_by} == 'liked_times'"> selected="selected"</c:if>>Số lượt thích</option>

                </select>

            </div>

        </c:if>

        <c:if is="{$show.category_filter}">

            <div class="item">

                <label>Thể loại</label> <select class="input" name="category_id">

                    <option value="">-Tất cả-</option>

                    <c:each from="$category_cache" value="$category">

                        <option value="{$category.category_id}"<c:if is="{$filters.category_id} == {$category.category_id}"> selected="selected"</c:if>>{$category.title}</option>

                    </c:each>

                </select>

            </div>

        </c:if>

        <c:if is="{$show.country_filter}">

            <div class="item">

                <label>Quốc gia</label> <select class="input" name="country_id">

                    <option value="">-Tất cả-</option>

                    <c:each from="$country_cache" value="$country">

                        <option value="{$country.country_id}"<c:if is="{$filters.country_id} == {$country.country_id}"> selected="selected"</c:if>>{$country.name}</option>

                    </c:each>

                </select>

            </div>

        </c:if>

        <c:if is="{$show.year_filter}">

            <div class="item">

                <label>Năm</label> <select class="input" name="year">

                    <option value="">-Tất cả-</option>
                    <option value="2016"<c:if is="{$filters.year} == 2016"> selected="selected"</c:if>>2016</option>
                    <option value="2015"<c:if is="{$filters.year} == 2015"> selected="selected"</c:if>>2015</option>
                    <option value="2014"<c:if is="{$filters.year} == 2014"> selected="selected"</c:if>>2014</option>
                    <option value="2013"<c:if is="{$filters.year} == 2013"> selected="selected"</c:if>>2013</option>

                    <option value="2012"<c:if is="{$filters.year} == 2012"> selected="selected"</c:if>>2012</option>

                    <option value="2011"<c:if is="{$filters.year} == 2011"> selected="selected"</c:if>>2011</option>

                    <option value="2010"<c:if is="{$filters.year} == 2010"> selected="selected"</c:if>>2010</option>

                    <option value="2009"<c:if is="{$filters.year} == 2009"> selected="selected"</c:if>>2009</option>

                </select>

            </div>

        </c:if>

        <div class="item">

            <input type="submit" class="btn btn-primary btn-cons" value="Duyệt phim">

        </div>

    </form>

<div class="clearfix"></div>

</div><!--/.filters-->

<!-- <div class="blockbody" style="padding:5px 10px;">

    <c:if is="{$request_uri} == 'danh-sach/phim-le/'">
        <h4><a href="{$url_base}" title="Xem phim" style="color:red"><strong>Xem phim</strong></a>, <a href="{$url_base}danh-sach/phim-bo/" title="Phim bộ hay">Phim bộ hay</a>,  <a href="{$url_base}the-loai/phim-hoat-hinh/" title="Phim hoat hinh"><strong>Phim hoạt hình</strong></a>, <a href="{$url_base}quoc-gia/phim-han-quoc/" title="Phim han quoc"><strong>Phim Hàn Quốc</strong></a>, <a href="{$url_base}quoc-gia/phim-thai-lan/" title="Phim Thai Lan"><strong>Phim Thái Lan</strong></a></h4>
        <c:else />
        <h4><a href="{$url_base}" title="Xem phim" style="color:red"><strong>Xem phim</strong></a>, <a href="{$url_base}the-loai/phim-hanh-dong/" title="Phim hanh dong"><strong>Phim hành động</strong></a>, <a href="{$url_base}the-loai/phim-hoat-hinh/" title="Phim hoat hinh"><strong>Phim hoạt hình</strong></a>, <a href="{$url_base}quoc-gia/phim-my/" title="Phim Mỹ"><strong>Phim Mỹ</strong></a>, <a href="{$url_base}quoc-gia/phim-han-quoc/" title="Phim han quoc"><strong>Phim Hàn Quốc</strong></a>, <a href="{$url_base}danh-sach/phim-chieu-rap/" title="Phim chiếu rạp"><strong>Phim chiếu rạp</strong></a></h4>
    </c:if>

</div> -->

<div id="item-category" class="list-films film-new">


<c:if is="$films">
<ul>  <c:each from="$films" value="$film">
                           <li class="item no-margin-left">

                           

                  <span class="label">{$film.status}</span>
                                                      <a title="{$film.title}" href="{$film.link}">

<c:if is="{$film.thumb_url} != NULL">
                                <img class="img-film" src="{$cache_link_img}{$film.thumb_url}" alt="{$film.title}" style="height: 269.8px;">
                                <c:else />
                                <img class="img-film" src="{$cache_link_img}{$film.thumb_url_o}" alt="{$film.title}" style="height: 269.8px;">
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

            </div>
<div class="clear">{$page_nav}</div>
            <c:else />

                        <div class="no-results">

                            Chưa có dữ liệu

                        </div>

                    </c:if>

    



</div>
<!-- END: list -->