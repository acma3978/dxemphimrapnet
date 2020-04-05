<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!-- BEGIN: header -->
<head>
    <title>{$page_title}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="{$url_base}">
    <meta name="description" content="{$page_description}">
    <meta name="language" content="vietnamese">
    <c:if is="$route_name == 'film' || $route_name == 'watch'">
        <meta property="article:tag" content="{$page_keywords}" />
    </c:if>

    <meta name="keywords" content="{$page_keywords}">
    <meta name="ROBOTS" content="index,follow,noodp" />
    <meta name="googlebot" content="index,follow" />
    <meta name="BingBOT" content="index,follow" />
    <meta name="yahooBOT" content="index,follow" />
    <meta name="slurp" content="index,follow" />
    <meta name="msnbot" content="index,follow" />

    <meta name="revisit-after" content="1 days">
    <c:if is="{$url_canonical}">
        <link href="{$url_canonical}" rel="canonical">
    </c:if>
    <meta name="geo.region" content="Vietnamese" />
    <meta name="author" content="TronBoHD.com" />
    
    <meta name="title" content="{$page_title}">
    <meta property="og:title" content="{$page_title}"/>
    <meta property="og:type" content="Video.Movie"/>
    <meta property="og:description" content="{$page_description}"/>
    <c:if is="{$filminfo.film_id}">
        <meta property="og:url" content="{$url_canonical}"/>
        <meta property="og:image" content="{$cache_link_img}{$filminfo.imagefan_url}"/>
        <meta property="og:image" content="{$cache_link_img}{$filminfo.image_url}"/>
        <c:else/>
        <meta property="og:url" content="{$url_base}"/>
        <meta property="og:image" content="{$cache_link_img}{$url_base}data/images/logo.png"/>
    </c:if>
    <meta property="og:site_name" content="TronBoHD.com"/>
    <meta property="fb:app_id" content="465637560220672"/>
    <meta property="fb:admins" content="100000468176912"/>
    <meta property="og:updated_time" content="{$filminfo.last_update}"/>
    <meta property="og:locale" content="vi_VN" />

    <meta name="dc.language" content="vi,en">
    <meta name="dc.source" content="{$url_base}">
    <meta name="dc.title" content="{$page_title}">
    <meta name="dc.keywords" content="{$page_keywords}">
    <meta name="dc.subject" content="Xem Phim Trọn Bộ">
    <meta name="dc.description" content="{$page_description}">
    <meta name="google-site-verification" content="mT5uvEIhAxfwRrJlB1jCY26ZAQrmc3XaOpCvFr3G4z4"/>
    
    <link rel="alternate" type="application/rss+xml" title="{$page_title}" href="{$url_base}rss/"/>
    <link href="{$url_base}theme/frontend/default/images/icon_film.ico" type="image/x-icon" rel="shortcut icon">
    
    

<link rel="stylesheet" type="text/css" href="{$url_base}theme/frontend/mobile/css/owl.carousel.css">
<link href="{$url_base}theme/frontend/default/css/bootstrap/dist/css/bootstrap.min.css?v=<?php echo date('dmYhis');?>"  media="screen" type="text/css" rel="stylesheet">
    
<link href="{$url_base}theme/frontend/default/css/style.css?v=<?php echo date('dmYhis');?>" type="text/css" rel="stylesheet">

    <!-- Custom and Main javascript -->
    <script class="ccscript" src="{$url_base}js/jquery/jquery-2.2.3.min.js?v=<?php echo date('dmYhis');?>" type="text/javascript"></script>
    <script class="ccscript" src="{$url_base}js/jquery/jquery-ui.min.js?v=<?php echo date('dmYhis');?>" type="text/javascript"></script>
    <script class="ccscript" src="{$url_base}js/tether.min.js?v=<?php echo date('dmYhis');?>" type="text/javascript"></script>
<script class="ccscript" src="{$url_base}player/jwplayer.js?v=<?php echo date('dmYhis');?>" type="text/javascript"></script>
    <!--<script class="ccscript" src="{$url_base}js/load.js?v=<?php /*echo date('dmYhis');*/?>" type="text/javascript"></script>-->
    <script class="ccscript" src="{$url_base}js/light/light.js?v=<?php echo date('dmYhis');?>" type="text/javascript"></script>
    <script class="ccscript" src="{$url_base}js/application.js?v=<?php echo date('dmYhis');?>" type="text/javascript"></script>
    
    <c:if is="{$filminfo.film_id}">
        <script type="text/javascript">
            var filmUrl = '{$filminfo.link}';
        </script>
    </c:if>
</head>

<!-- END: header -->