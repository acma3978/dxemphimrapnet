<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!-- BEGIN: header -->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="content-language" content="vi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <meta name="title" content="{$page_title}">
    <meta name="revisit-after" content="1 days">
    <meta name="ROBOTS" content="index,follow,noodp">
    <meta name="googlebot" content="index,follow">
    <meta name="BingBOT" content="index,follow">
    <meta name="yahooBOT" content="index,follow">
    <meta name="slurp" content="index,follow">
    <meta name="msnbot" content="index,follow">
    <meta name="google-site-verification" content="mT5uvEIhAxfwRrJlB1jCY26ZAQrmc3XaOpCvFr3G4z4"/>

    <meta property="og:site_name" content="tronbohd.com">
    <meta property="og:locale" content="vi_VN">
    <meta property="fb:app_id" content="997409100283248">
    <meta property="og:type" content="website">
    <c:if is="{$filminfo.film_id}">
        <meta property="og:url" content="{$url_canonical}"/>
        <meta property="og:image" content="{$cache_img}{$filminfo.imagefan}"/>
        <meta property="og:image" content="{$cache_img}{$filminfo.image_url_o}"/>
        <c:else/>
        <meta property="og:url" content="{$url_base}"/>
        <meta property="og:image" content="{$cache_img}{$url_base}data/images/logo.png"/>
    </c:if>
    <meta property="og:title" content="{$page_title}">
    <meta property="og:description" content="{$page_description}">
    <meta name="description" content="{$page_description}">
    <meta name="keywords" content="{$page_keywords}">

    <title>{$page_title}</title>

    <c:if is="{$url_canonical}">
        <link href="{$url_canonical}" rel="canonical">
    </c:if>
    <link rel="stylesheet" href="{$url_base}theme/frontend/mobile/css/font-face.css">
    <link rel="stylesheet" href="{$url_base}theme/frontend/mobile/css/font-awesome.css">
    <link rel="stylesheet" href="{$url_base}theme/frontend/mobile/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="{$url_base}theme/frontend/mobile/css/jquery-ui.min.css">
    <link rel="stylesheet" href="{$url_base}theme/frontend/mobile/css/default.css">
    <link rel="stylesheet" href="{$url_base}theme/frontend/mobile/css/styles.css">
    <link rel="stylesheet" href="{$url_base}theme/frontend/mobile/css/responsive.css">

    <link rel="shortcut icon" href="{$url_base}theme/frontend/default/images/icon_film.ico" type="image/x-icon">

    <link href="{$url_base}theme/frontend/default/images/icon_film.ico" type="image/x-icon" rel="shortcut icon">

    <!-- Custom and Main javascript -->
    <script src="{$url_base}js/jquery/jquery-2.2.3.min.js" type="text/javascript"></script>
    <script src="{$url_base}js/bootstrap/bootstrap.min.js"></script>


    <script src="{$url_base}js/light/light.js?v=<?php echo date('dmYhis');?>" type="text/javascript"></script>
    <script src="{$url_base}js/apppack-1.0.0.js?v=<?php echo date('dmYhis');?>" type="text/javascript"></script>
    <script src="{$url_base}player/jwplayer.js?v=<?php echo date('dmYhis');?>" type="text/javascript" ></script>
    <script src="{$url_base}js/mobile/plugins.js?v=<?php echo date('dmYhis');?>"></script>
    <script src="{$url_base}js/jquery/common.js?v=<?php echo date('dmYhis');?>"></script>

    <script src="{$url_base}js/mobile/jquery-ui.min.js?v=<?php echo date('dmYhis');?>"></script>
    <script src="{$url_base}js/mobile/jquery.lazyload.min.js?v=<?php echo date('dmYhis');?>"></script>
    <script src="{$url_base}js/mobile/actions.js?v=<?php echo date('dmYhis');?>"></script>
    <script src="{$url_base}js/mobile/functions.js?v=<?php echo date('dmYhis');?>"></script>
    <script src="{$url_base}js/mobile/sosmart.js?v=<?php echo date('dmYhis');?>"></script>

    <c:if is="{$filminfo.film_id}">
        <script type="text/javascript">
            var filmUrl = '{$filminfo.link}';
        </script>
    </c:if>
</head>
<!-- END: header -->