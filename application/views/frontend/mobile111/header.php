<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!-- BEGIN: header -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>{$page_title}</title>
    <meta charset="utf-8">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,minimum-scale=1,initial-scale=1" name="viewport">

    <base href="{$url_base}">
    <meta name="description" content="{$page_description}">

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

    <link rel="amphtml" href="{$url_canonical}">

    <c:if is="{$url_canonical}">
        <link href="{$url_canonical}" rel="canonical">
    </c:if>

    <meta name="geo.region" content="Vietnamese" />
    <meta name="author" content="TronBoHD.com" />
    <meta http-equiv="content-language" content="vi" />

    <meta name="title" content="{$page_title}">
    <meta property="og:title" content="{$page_title}"/>
    <meta property="og:type" content="Video.Movie"/>
    <meta property="og:description" content="{$page_description}"/>
    <c:if is="{$filminfo.film_id}">
        <meta property="og:url" content="{$url_canonical}"/>
        <meta property="og:image" content="{$cache_img}{$filminfo.imagefan}"/>
        <meta property="og:image" content="{$cache_img}{$filminfo.image_url_o}"/>
        <c:else/>
        <meta property="og:url" content="{$url_base}"/>
        <meta property="og:image" content="{$cache_img}{$url_base}data/images/logo.png"/>
    </c:if>
    <meta property="og:site_name" content="TronBoHD.com"/>
    <meta property="fb:app_id" content="465637560220672"/>
    <meta property="fb:admins" content="100000468176912"/>
    <meta property="og:updated_time" content="{$filminfo.last_update}"/>
    <meta property="og:locale" content="vi_VN" />

    <meta name="dc.language" CONTENT="vi,en">
    <meta name="dc.source" CONTENT="{$url_base}">
    <meta name="dc.title" CONTENT="{$page_title}">
    <meta name="dc.keywords" CONTENT="{$page_keywords}">
    <meta name="dc.subject" CONTENT="Xem Phim Trọn Bộ">
    <meta name="dc.description" CONTENT="{$page_description}">
    <meta name="google-site-verification" content="mT5uvEIhAxfwRrJlB1jCY26ZAQrmc3XaOpCvFr3G4z4"/>
    <link rel="alternate" type="application/rss+xml" title="{$page_title}" href="{$url_base}rss/"/>

    <!-- Theme style -->

    <link rel="stylesheet" href="{$url_base}theme/frontend/mobile/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="{$url_base}theme/frontend/mobile/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="{$url_base}theme/frontend/mobile/dist/css/style.css">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{$url_base}theme/frontend/mobile/bootstrap/css/bootstrap.min.css">

    <link href="{$url_base}theme/frontend/default/images/icon_film.ico" type="image/x-icon" rel="shortcut icon">

    <!-- Custom and Main javascript -->
    <script src="{$url_base}js/jquery/jquery-2.2.3.min.js" type="text/javascript"></script>
    <script src="{$url_base}js/bootstrap/bootstrap.min.js"></script>

    <script src="{$url_base}js/jquery/common.js?v=<?php echo date('dmYhis');?>"></script>
    <script src="{$url_base}js/light/light.js?v=<?php echo date('dmYhis');?>" type="text/javascript"></script>
    <script src="{$url_base}js/apppack-1.0.0.js?v=<?php echo date('dmYhis');?>" type="text/javascript"></script>
    <script src="{$url_base}player/jwplayer.js?v=<?php echo date('dmYhis');?>" type="text/javascript" ></script>
    <style amp-custom>
        /* any custom style goes here */
        body {
            background-color: white;
        }
    </style>

    
    <c:if is="{$filminfo.film_id}">

        <script type="text/javascript">
            var filmUrl = '{$filminfo.link}';
        </script>
    </c:if>
</head>
<!-- END: header -->