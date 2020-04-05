var _titleSllipsis=null;
var _loadFbSDk=null;
jQuery(document).ready(function(){

    if ($(window).width() >= 768) {
        $.removeCookie('mobile', { path: '/' });
    }
    $(".timedx-grid").hide("fast");
    $(".viewdx-grid").hide("fast");
    $(".viewsT-grid").hide("fast");
    $(".timeT-grid").hide("fast");

    $('.filmIdT-grid').attr('style','margin-left:370px');

	//--Menu
	try{
		jQuery('.box-bookmark').bind("click", function(e){
            var film_id=jQuery(this).attr('data-filmid');

            $.post( "ajax/member/add_bookmark/", { film_id: film_id }).complete(function( data ) {
                console.log(data);
                alert(data.message);
            });
		});
	}catch(err){
		console.error(err.message);
	}

	//Thanh cuộn top phim tuần+tháng
	try{
        jQuery('.article-block .Bg-slimScrollDiv').slimScroll({
            height: '450px',
            railVisible: true,
            alwaysVisible: true
        });
        jQuery('.bg-profile-film .Bg-slimScrollDiv').slimScroll({
            height: '285px',
            railVisible: true,
            alwaysVisible: true
        });
        jQuery('.bg-content-film .Bg-slimScrollDiv').slimScroll({
            height: '1000px',
            railVisible: true,
            alwaysVisible: true
        });
	}catch(err){
		console.error(err.message);
	}

	// Cuộn qua lại các box phim mới của từng mục
	try{
		/*jQuery('.last-film-box').each(function(){
			var currentId=jQuery(this).attr('id');
			var categoryId=jQuery(this).attr('data-categoryid');

			if(typeof currentId=='string' && typeof categoryId=='string')
			{
				jQuery('#'+currentId).carouFredSel({
					auto: true,
                    scroll : {
                        duration		: 1000,
                        easing            : "elastic",
                        cookie: false,
                        mousewheel: true,
                        effect          : "easeOutBounce",
                    }
				});
			}
		});*/
		//--Cuộn lại top phim mới ở home

        if($('.movie-hot').length){
            $('#movie-carousel-top').carouFredSel({
                auto: false,
                item: 3,
                mousewheel: true,
                prev: '#prevTop',
                next: '#nextTop',
                swipe: {
                    onMouse: true,
                    onTouch: true
                }
            });
        }

        
        /*jQuery('.mega-carousel').carouFredSel({
            auto: false,
            mousewheel: true,
            items		: {
                visible		: 10,
                minimum		: 1
            },
            swipe: {
                onMouse: true,
                onTouch: true
            }
        });*/

        /*jQuery('#banner-carousel').carouFredSel({
            auto: true
        });*/
	}catch(err){
		console.error(err.message);
	}

	//--Tab phim mới cập nhật
	/*try{
		jQuery("#tabs-movie").tabs();
	}catch(err){
		console.error(err.message);
	}*/
    //--Phần xử lý GridView
    try{
        $("a.switcher").bind("click", function(e){

            e.preventDefault();

            var theid = $(this).attr("id");

            var theproducts = $("#listFilmSub");
            var classNames = $(this).attr('class').split(' ');

            var gridthumb = "images/products/grid-default-thumb.png";
            var listthumb = "images/products/list-default-thumb.png";

            if($(this).hasClass("active")) {
                // if currently clicked button has the active class
                // then we do nothing!
                return false;
            } else {
                // otherwise we are clicking on the inactive button
                // and in the process of switching views!

                if(theid == "gridview") {
                    $(this).addClass("active");
                    $("#listview").removeClass("active");

                    $('.filmIdT-grid').attr('style','margin-left:370px');

                    // remove the list class and change to grid
                    $("#listFilm").animate({"width" : "64.4933%"}, 500);
                    $(".colz-row-md-5").animate({"width" : "80.9667%"}, 500);
                    $(".colz-row-md-2").animate({"width" : "18.9452%"}, 500);

                    $('.colz-md-3').attr('style','padding:0');

                    $(".banner-ads-middle").show("fast");
                    $(".timedx-grid").hide("fast");
                    $(".viewdx-grid").hide("fast");

                    $(".viewsT-grid").hide("fast");
                    $(".timeT-grid").hide("fast");
                }

                else if(theid == "listview") {
                    $(this).addClass("active");
                    $("#gridview").removeClass("active");


                    $('.filmIdT-grid').attr('style','margin-left:76px');
                    $('.col-lg-9').attr('style','padding-left: 0;');

                    $('.colz-md-3').attr('style','padding:0');

                    $("#listFilm").animate({"width" : "100%"}, 500);
                    $(".colz-row-md-5").animate({"width" : "50.9667%"}, 500);
                    $(".colz-row-md-2").animate({"width" : "16.3452%"}, 500);
                    $(".banner-ads-middle").hide("fast");
                    $(".timedx-grid").show("fast");
                    $(".viewdx-grid").show("fast");

                    $(".viewsT-grid").show("fast");
                    $(".timeT-grid").show("fast");
                }
            }

        });
    }catch(err){
        console.error(err.message);
    }

	//hiện ... ở tên phim
	_titleSllipsis=function(){
		//--Nếu trình duyệt đời mới hỗ trợ HTML5 và CSS3 thì khỏi
		if(typeof window.localStorage!='undefined')
			return true;
		jQuery(".movie-title-1, .movie-title-2, .news-title-1 a, .name-en a").ellipsis();
	}
	jQuery(window).load(function(){
		setTimeout("_titleSllipsis()",1000);
	});
	
	//Facebook SDK
	jQuery('body').append('<div id="fb-root"></div>');
	_loadFbSDk=function(){
		(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "http://connect.facebook.net/en_US/all.js#xfbml=1&version=v2.3";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	}
	jQuery(window).load(function(){
		setTimeout("_loadFbSDk()",100);
	});

    //Google+ SDK
    try{
        var googlesdk=$('body').find("#g-comments");
        var widthsdk=googlesdk.attr('data-width');

        if (googlesdk.length > 0) {
            var result='<script src="https://apis.google.com/js/plusone.js"></script><div class="g-comments" data-href="'+window.location.href+'" data-width="'+widthsdk+'" data-first_party_property="BLOGGER" data-view_type="FILTERED_POSTMOD"></div>';

            $("#g-comments").append(result);
        }
    }catch(err){
        console.error(err.message);
    }
});

/*!
 * jQuery Cookie Plugin v1.4.1
 * https://github.com/carhartl/jquery-cookie
 *
 * Copyright 2013 Klaus Hartl
 * Released under the MIT license
 */
(function (factory) {
    if (typeof define === 'function' && define.amd) {
        // AMD
        define(['jquery'], factory);
    } else if (typeof exports === 'object') {
        // CommonJS
        factory(require('jquery'));
    } else {
        // Browser globals
        factory(jQuery);
    }
}(function ($) {

    var pluses = /\+/g;

    function encode(s) {
        return config.raw ? s : encodeURIComponent(s);
    }

    function decode(s) {
        return config.raw ? s : decodeURIComponent(s);
    }

    function stringifyCookieValue(value) {
        return encode(config.json ? JSON.stringify(value) : String(value));
    }

    function parseCookieValue(s) {
        if (s.indexOf('"') === 0) {
            // This is a quoted cookie as according to RFC2068, unescape...
            s = s.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, '\\');
        }

        try {
            // Replace server-side written pluses with spaces.
            // If we can't decode the cookie, ignore it, it's unusable.
            // If we can't parse the cookie, ignore it, it's unusable.
            s = decodeURIComponent(s.replace(pluses, ' '));
            return config.json ? JSON.parse(s) : s;
        } catch(e) {}
    }

    function read(s, converter) {
        var value = config.raw ? s : parseCookieValue(s);
        return $.isFunction(converter) ? converter(value) : value;
    }

    var config = $.cookie = function (key, value, options) {

        // Write

        if (value !== undefined && !$.isFunction(value)) {
            options = $.extend({}, config.defaults, options);

            if (typeof options.expires === 'number') {
                var days = options.expires, t = options.expires = new Date();
                t.setTime(+t + days * 864e+5);
            }

            return (document.cookie = [
                encode(key), '=', stringifyCookieValue(value),
                options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
                options.path    ? '; path=' + options.path : '',
                options.domain  ? '; domain=' + options.domain : '',
                options.secure  ? '; secure' : ''
            ].join(''));
        }

        // Read

        var result = key ? undefined : {};

        // To prevent the for loop in the first place assign an empty array
        // in case there are no cookies at all. Also prevents odd result when
        // calling $.cookie().
        var cookies = document.cookie ? document.cookie.split('; ') : [];

        for (var i = 0, l = cookies.length; i < l; i++) {
            var parts = cookies[i].split('=');
            var name = decode(parts.shift());
            var cookie = parts.join('=');

            if (key && key === name) {
                // If second argument (value) is a function it's a converter...
                result = read(cookie, value);
                break;
            }

            // Prevent storing a cookie that we couldn't decode.
            if (!key && (cookie = read(cookie)) !== undefined) {
                result[name] = cookie;
            }
        }

        return result;
    };

    config.defaults = {};

    $.removeCookie = function (key, options) {
        if ($.cookie(key) === undefined) {
            return false;
        }

        // Must not alter options, thus extending a fresh object...
        $.cookie(key, '', $.extend({}, options, { expires: -1 }));
        return !$.cookie(key);
    };

}));
