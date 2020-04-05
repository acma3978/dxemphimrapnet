/**
 * @author: TronBoHD.com Development
 */
var Plugins = {};

$(document).ready(function (e) {
    Plugins.init();
});

Plugins.init = function () {
    Plugins.Core.init();
};

Plugins.Core = {
    init: function() {
        Plugins.Core.slimscroll();
        Plugins.Core.toastr();
        Plugins.Core.touchAndcaroufredsel();
        Plugins.Core.raty();
        Plugins.Core.cookie();
    },

    slimscroll: function () {
        jQuery.fn.extend({
            slimScroll: function(options) {

                var defaults = {

                    // width in pixels of the visible scroll area
                    width : 'auto',

                    // height in pixels of the visible scroll area
                    height : '250px',

                    // width in pixels of the scrollbar and rail
                    size : '7px',

                    // scrollbar color, accepts any hex/color value
                    color: '#000',

                    // scrollbar position - left/right
                    position : 'right',

                    // distance in pixels between the side edge and the scrollbar
                    distance : '1px',

                    // default scroll position on load - top / bottom / $('selector')
                    start : 'top',

                    // sets scrollbar opacity
                    opacity : .4,

                    // enables always-on mode for the scrollbar
                    alwaysVisible : false,

                    // check if we should hide the scrollbar when user is hovering over
                    disableFadeOut : false,

                    // sets visibility of the rail
                    railVisible : false,

                    // sets rail color
                    railColor : '#333',

                    // sets rail opacity
                    railOpacity : .2,

                    // whether  we should use jQuery UI Draggable to enable bar dragging
                    railDraggable : true,

                    // defautlt CSS class of the slimscroll rail
                    railClass : 'slimScrollRail',

                    // defautlt CSS class of the slimscroll bar
                    barClass : 'slimScrollBar',

                    // defautlt CSS class of the slimscroll wrapper
                    wrapperClass : 'slimScrollDiv',

                    // check if mousewheel should scroll the window if we reach top/bottom
                    allowPageScroll : false,

                    // scroll amount applied to each mouse wheel step
                    wheelStep : 20,

                    // scroll amount applied when user is using gestures
                    touchScrollStep : 200,

                    // sets border radius
                    borderRadius: '7px',

                    // sets border radius of the rail
                    railBorderRadius : '7px'
                };

                var o = $.extend(defaults, options);

                // do it for every element that matches selector
                this.each(function(){

                    var isOverPanel, isOverBar, isDragg, queueHide, touchDif,
                        barHeight, percentScroll, lastScroll,
                        divS = '<div></div>',
                        minBarHeight = 30,
                        releaseScroll = false;

                    // used in event handlers and for better minification
                    var me = $(this);

                    // ensure we are not binding it again
                    if (me.parent().hasClass(o.wrapperClass))
                    {
                        // start from last bar position
                        var offset = me.scrollTop();

                        // find bar and rail
                        bar = me.parent().find('.' + o.barClass);
                        rail = me.parent().find('.' + o.railClass);

                        getBarHeight();

                        // check if we should scroll existing instance
                        if ($.isPlainObject(options))
                        {
                            // Pass height: auto to an existing slimscroll object to force a resize after contents have changed
                            if ( 'height' in options && options.height == 'auto' ) {
                                me.parent().css('height', 'auto');
                                me.css('height', 'auto');
                                var height = me.parent().parent().height();
                                me.parent().css('height', height);
                                me.css('height', height);
                            }

                            if ('scrollTo' in options)
                            {
                                // jump to a static point
                                offset = parseInt(o.scrollTo);
                            }
                            else if ('scrollBy' in options)
                            {
                                // jump by value pixels
                                offset += parseInt(o.scrollBy);
                            }
                            else if ('destroy' in options)
                            {
                                // remove slimscroll elements
                                bar.remove();
                                rail.remove();
                                me.unwrap();
                                return;
                            }

                            // scroll content by the given offset
                            scrollContent(offset, false, true);
                        }

                        return;
                    }

                    // optionally set height to the parent's height
                    o.height = (o.height == 'auto') ? me.parent().height() : o.height;

                    // wrap content
                    var wrapper = $(divS)
                        .addClass(o.wrapperClass)
                        .css({
                            position: 'relative',
                            overflow: 'hidden',

                            height: o.height
                        });

                    // update style for the div
                    me.css({
                        overflow: 'hidden',
                        height: o.height
                    });

                    // create scrollbar rail
                    var rail = $(divS)
                        .addClass(o.railClass)
                        .css({
                            width: o.size,
                            height: '100%',
                            position: 'absolute',
                            top: 0,
                            display: (o.alwaysVisible && o.railVisible) ? 'block' : 'none',
                            'border-radius': o.railBorderRadius,
                            background: o.railColor,
                            opacity: o.railOpacity,
                            zIndex: 90
                        });

                    // create scrollbar
                    var bar = $(divS)
                        .addClass(o.barClass)
                        .css({
                            background: o.color,
                            width: o.size,
                            position: 'absolute',
                            top: 0,
                            opacity: o.opacity,
                            display: o.alwaysVisible ? 'block' : 'none',
                            'border-radius' : o.borderRadius,
                            BorderRadius: o.borderRadius,
                            MozBorderRadius: o.borderRadius,
                            WebkitBorderRadius: o.borderRadius,
                            zIndex: 99
                        });

                    // set position
                    var posCss = (o.position == 'right') ? { right: o.distance } : { left: o.distance };
                    rail.css(posCss);
                    bar.css(posCss);

                    // wrap it
                    me.wrap(wrapper);

                    // append to parent div
                    me.parent().append(bar);
                    me.parent().append(rail);

                    // make it draggable and no longer dependent on the jqueryUI
                    if (o.railDraggable){
                        bar.bind("mousedown", function(e) {
                            var $doc = $(document);
                            isDragg = true;
                            t = parseFloat(bar.css('top'));
                            pageY = e.pageY;

                            $doc.bind("mousemove.slimscroll", function(e){
                                currTop = t + e.pageY - pageY;
                                bar.css('top', currTop);
                                scrollContent(0, bar.position().top, false);// scroll content
                            });

                            $doc.bind("mouseup.slimscroll", function(e) {
                                isDragg = false;hideBar();
                                $doc.unbind('.slimscroll');
                            });
                            return false;
                        }).bind("selectstart.slimscroll", function(e){
                            e.stopPropagation();
                            e.preventDefault();
                            return false;
                        });
                    }

                    // on rail over
                    rail.hover(function(){
                        showBar();
                    }, function(){
                        hideBar();
                    });

                    // on bar over
                    bar.hover(function(){
                        isOverBar = true;
                    }, function(){
                        isOverBar = false;
                    });

                    // show on parent mouseover
                    me.hover(function(){
                        isOverPanel = true;
                        showBar();
                        hideBar();
                    }, function(){
                        isOverPanel = false;
                        hideBar();
                    });

                    // support for mobile
                    me.bind('touchstart', function(e,b){
                        if (e.originalEvent.touches.length)
                        {
                            // record where touch started
                            touchDif = e.originalEvent.touches[0].pageY;
                        }
                    });

                    me.bind('touchmove', function(e){
                        // prevent scrolling the page if necessary
                        if(!releaseScroll)
                        {
                            e.originalEvent.preventDefault();
                        }
                        if (e.originalEvent.touches.length)
                        {
                            // see how far user swiped
                            var diff = (touchDif - e.originalEvent.touches[0].pageY) / o.touchScrollStep;
                            // scroll content
                            scrollContent(diff, true);
                            touchDif = e.originalEvent.touches[0].pageY;
                        }
                    });

                    // set up initial height
                    getBarHeight();

                    // check start position
                    if (o.start === 'bottom')
                    {
                        // scroll content to bottom
                        bar.css({ top: me.outerHeight() - bar.outerHeight() });
                        scrollContent(0, true);
                    }
                    else if (o.start !== 'top')
                    {
                        // assume jQuery selector
                        scrollContent($(o.start).position().top, null, true);

                        // make sure bar stays hidden
                        if (!o.alwaysVisible) { bar.hide(); }
                    }

                    // attach scroll events
                    attachWheel();

                    function _onWheel(e)
                    {
                        // use mouse wheel only when mouse is over
                        if (!isOverPanel) { return; }

                        var e = e || window.event;

                        var delta = 0;
                        if (e.wheelDelta) { delta = -e.wheelDelta/120; }
                        if (e.detail) { delta = e.detail / 3; }

                        var target = e.target || e.srcTarget || e.srcElement;
                        if ($(target).closest('.' + o.wrapperClass).is(me.parent())) {
                            // scroll content
                            scrollContent(delta, true);
                        }

                        // stop window scroll
                        if (e.preventDefault && !releaseScroll) { e.preventDefault(); }
                        if (!releaseScroll) { e.returnValue = false; }
                    }

                    function scrollContent(y, isWheel, isJump)
                    {
                        releaseScroll = false;
                        var delta = y;
                        var maxTop = me.outerHeight() - bar.outerHeight();

                        if (isWheel)
                        {
                            // move bar with mouse wheel
                            delta = parseInt(bar.css('top')) + y * parseInt(o.wheelStep) / 100 * bar.outerHeight();

                            // move bar, make sure it doesn't go out
                            delta = Math.min(Math.max(delta, 0), maxTop);

                            // if scrolling down, make sure a fractional change to the
                            // scroll position isn't rounded away when the scrollbar's CSS is set
                            // this flooring of delta would happened automatically when
                            // bar.css is set below, but we floor here for clarity
                            delta = (y > 0) ? Math.ceil(delta) : Math.floor(delta);

                            // scroll the scrollbar
                            bar.css({ top: delta + 'px' });
                        }

                        // calculate actual scroll amount
                        percentScroll = parseInt(bar.css('top')) / (me.outerHeight() - bar.outerHeight());
                        delta = percentScroll * (me[0].scrollHeight - me.outerHeight());

                        if (isJump)
                        {
                            delta = y;
                            var offsetTop = delta / me[0].scrollHeight * me.outerHeight();
                            offsetTop = Math.min(Math.max(offsetTop, 0), maxTop);
                            bar.css({ top: offsetTop + 'px' });
                        }

                        // scroll content
                        me.scrollTop(delta);

                        // fire scrolling event
                        me.trigger('slimscrolling', ~~delta);

                        // ensure bar is visible
                        showBar();

                        // trigger hide when scroll is stopped
                        hideBar();
                    }

                    function attachWheel()
                    {
                        if (window.addEventListener)
                        {
                            this.addEventListener('DOMMouseScroll', _onWheel, false );
                            this.addEventListener('mousewheel', _onWheel, false );
                            this.addEventListener('MozMousePixelScroll', _onWheel, false );
                        }
                        else
                        {
                            document.attachEvent("onmousewheel", _onWheel)
                        }
                    }

                    function getBarHeight()
                    {
                        // calculate scrollbar height and make sure it is not too small
                        barHeight = Math.max((me.outerHeight() / me[0].scrollHeight) * me.outerHeight(), minBarHeight);
                        bar.css({ height: barHeight + 'px' });

                        // hide scrollbar if content is not long enough
                        var display = barHeight == me.outerHeight() ? 'none' : 'block';
                        bar.css({ display: display });
                    }

                    function showBar()
                    {
                        // recalculate bar height
                        getBarHeight();
                        clearTimeout(queueHide);

                        // when bar reached top or bottom
                        if (percentScroll == ~~percentScroll)
                        {
                            //release wheel
                            releaseScroll = o.allowPageScroll;

                            // publish approporiate event
                            if (lastScroll != percentScroll)
                            {
                                var msg = (~~percentScroll == 0) ? 'top' : 'bottom';
                                me.trigger('slimscroll', msg);
                            }
                        }
                        else
                        {
                            releaseScroll = false;
                        }
                        lastScroll = percentScroll;

                        // show only when required
                        if(barHeight >= me.outerHeight()) {
                            //allow window scroll
                            releaseScroll = true;
                            return;
                        }
                        bar.stop(true,true).fadeIn('fast');
                        if (o.railVisible) { rail.stop(true,true).fadeIn('fast'); }
                    }

                    function hideBar()
                    {
                        // only hide when options allow it
                        if (!o.alwaysVisible)
                        {
                            queueHide = setTimeout(function(){
                                if (!(o.disableFadeOut && isOverPanel) && !isOverBar && !isDragg)
                                {
                                    bar.fadeOut('slow');
                                    rail.fadeOut('slow');
                                }
                            }, 1000);
                        }
                    }

                });

                // maintain chainability
                return this;
            }
        });

        jQuery.fn.extend({
            slimscroll: jQuery.fn.slimScroll
        });
    },

    toastr: function() {
        ! function(e) {
            e(["jquery"], function(e) {
                return function() {
                    function t(e, t, n) {
                        return f({
                            type: O.error,
                            iconClass: g().iconClasses.error,
                            message: e,
                            optionsOverride: n,
                            title: t
                        })
                    }

                    function n(t, n) {
                        return t || (t = g()), v = e("#" + t.containerId), v.length ? v : (n && (v = c(t)), v)
                    }

                    function i(e, t, n) {
                        return f({
                            type: O.info,
                            iconClass: g().iconClasses.info,
                            message: e,
                            optionsOverride: n,
                            title: t
                        })
                    }

                    function o(e) {
                        w = e
                    }

                    function s(e, t, n) {
                        return f({
                            type: O.success,
                            iconClass: g().iconClasses.success,
                            message: e,
                            optionsOverride: n,
                            title: t
                        })
                    }

                    function a(e, t, n) {
                        return f({
                            type: O.warning,
                            iconClass: g().iconClasses.warning,
                            message: e,
                            optionsOverride: n,
                            title: t
                        })
                    }

                    function r(e) {
                        var t = g();
                        v || n(t), l(e, t) || u(t)
                    }

                    function d(t) {
                        var i = g();
                        return v || n(i), t && 0 === e(":focus", t).length ? void h(t) : void(v.children().length && v.remove())
                    }

                    function u(t) {
                        for (var n = v.children(), i = n.length - 1; i >= 0; i--) l(e(n[i]), t)
                    }

                    function l(t, n) {
                        return t && 0 === e(":focus", t).length ? (t[n.hideMethod]({
                            duration: n.hideDuration,
                            easing: n.hideEasing,
                            complete: function() {
                                h(t)
                            }
                        }), !0) : !1
                    }

                    function c(t) {
                        return v = e("<div/>").attr("id", t.containerId).addClass(t.positionClass).attr("aria-live", "polite").attr("role", "alert"), v.appendTo(e(t.target)), v
                    }

                    function p() {
                        return {
                            tapToDismiss: !0,
                            toastClass: "toast",
                            containerId: "toast-container",
                            debug: !1,
                            showMethod: "fadeIn",
                            showDuration: 300,
                            showEasing: "swing",
                            onShown: void 0,
                            hideMethod: "fadeOut",
                            hideDuration: 1e3,
                            hideEasing: "swing",
                            onHidden: void 0,
                            extendedTimeOut: 1e3,
                            iconClasses: {
                                error: "toast-error",
                                info: "toast-info",
                                success: "toast-success",
                                warning: "toast-warning"
                            },
                            iconClass: "toast-info",
                            positionClass: "toast-top-right",
                            timeOut: 5e3,
                            titleClass: "toast-title",
                            messageClass: "toast-message",
                            target: "body",
                            closeHtml: '<button type="button">&times;</button>',
                            newestOnTop: !0,
                            preventDuplicates: !1,
                            progressBar: !1
                        }
                    }

                    function m(e) {
                        w && w(e)
                    }

                    function f(t) {
                        function i(t) {
                            return !e(":focus", l).length || t ? (clearTimeout(O.intervalId), l[r.hideMethod]({
                                duration: r.hideDuration,
                                easing: r.hideEasing,
                                complete: function() {
                                    h(l), r.onHidden && "hidden" !== b.state && r.onHidden(), b.state = "hidden", b.endTime = new Date, m(b)
                                }
                            })) : void 0
                        }

                        function o() {
                            (r.timeOut > 0 || r.extendedTimeOut > 0) && (u = setTimeout(i, r.extendedTimeOut), O.maxHideTime = parseFloat(r.extendedTimeOut), O.hideEta = (new Date).getTime() + O.maxHideTime)
                        }

                        function s() {
                            clearTimeout(u), O.hideEta = 0, l.stop(!0, !0)[r.showMethod]({
                                duration: r.showDuration,
                                easing: r.showEasing
                            })
                        }

                        function a() {
                            var e = (O.hideEta - (new Date).getTime()) / O.maxHideTime * 100;
                            f.width(e + "%")
                        }
                        var r = g(),
                            d = t.iconClass || r.iconClass;
                        if ("undefined" != typeof t.optionsOverride && (r = e.extend(r, t.optionsOverride), d = t.optionsOverride.iconClass || d), r.preventDuplicates) {
                            if (t.message === C) return;
                            C = t.message
                        }
                        T++, v = n(r, !0);
                        var u = null,
                            l = e("<div/>"),
                            c = e("<div/>"),
                            p = e("<div/>"),
                            f = e("<div/>"),
                            w = e(r.closeHtml),
                            O = {
                                intervalId: null,
                                hideEta: null,
                                maxHideTime: null
                            },
                            b = {
                                toastId: T,
                                state: "visible",
                                startTime: new Date,
                                options: r,
                                map: t
                            };
                        return t.iconClass && l.addClass(r.toastClass).addClass(d), t.title && (c.append(t.title).addClass(r.titleClass), l.append(c)), t.message && (p.append(t.message).addClass(r.messageClass), l.append(p)), r.closeButton && (w.addClass("toast-close-button").attr("role", "button"), l.prepend(w)), r.progressBar && (f.addClass("toast-progress"), l.prepend(f)), l.hide(), r.newestOnTop ? v.prepend(l) : v.append(l), l[r.showMethod]({
                            duration: r.showDuration,
                            easing: r.showEasing,
                            complete: r.onShown
                        }), r.timeOut > 0 && (u = setTimeout(i, r.timeOut), O.maxHideTime = parseFloat(r.timeOut), O.hideEta = (new Date).getTime() + O.maxHideTime, r.progressBar && (O.intervalId = setInterval(a, 10))), l.hover(s, o), !r.onclick && r.tapToDismiss && l.click(i), r.closeButton && w && w.click(function(e) {
                            e.stopPropagation ? e.stopPropagation() : void 0 !== e.cancelBubble && e.cancelBubble !== !0 && (e.cancelBubble = !0), i(!0)
                        }), r.onclick && l.click(function() {
                            r.onclick(), i()
                        }), m(b), r.debug && console && console.log(b), l
                    }

                    function g() {
                        return e.extend({}, p(), b.options)
                    }

                    function h(e) {
                        v || (v = n()), e.is(":visible") || (e.remove(), e = null, 0 === v.children().length && (v.remove(), C = void 0))
                    }
                    var v, w, C, T = 0,
                        O = {
                            error: "error",
                            info: "info",
                            success: "success",
                            warning: "warning"
                        },
                        b = {
                            clear: r,
                            remove: d,
                            error: t,
                            getContainer: n,
                            info: i,
                            options: {},
                            subscribe: o,
                            success: s,
                            version: "2.1.0",
                            warning: a
                        };
                    return b
                }()
            })
        }("function" == typeof define && define.amd ? define : function(e, t) {
            "undefined" != typeof module && module.exports ? module.exports = t(require("jquery")) : window.toastr = t(window.jQuery)
        });
    },

    touchAndcaroufredsel: function() {
        (function(g){function P(c){if(c&&void 0===c.allowPageScroll&&(void 0!==c.swipe||void 0!==c.swipeStatus))c.allowPageScroll=G;c||(c={});c=g.extend({},g.fn.swipe.defaults,c);return this.each(function(){var b=g(this),f=b.data(w);f||(f=new W(this,c),b.data(w,f))})}function W(c,b){var f,p,r,s;function H(a){var a=a.originalEvent,c,Q=n?a.touches[0]:a;d=R;n?h=a.touches.length:a.preventDefault();i=0;j=null;k=0;!n||h===b.fingers||b.fingers===x?(r=f=Q.pageX,s=p=Q.pageY,y=(new Date).getTime(),b.swipeStatus&&(c= l(a,d))):t(a);if(!1===c)return d=m,l(a,d),c;e.bind(I,J);e.bind(K,L)}function J(a){a=a.originalEvent;if(!(d===q||d===m)){var c,e=n?a.touches[0]:a;f=e.pageX;p=e.pageY;u=(new Date).getTime();j=S();n&&(h=a.touches.length);d=z;var e=a,g=j;if(b.allowPageScroll===G)e.preventDefault();else{var o=b.allowPageScroll===T;switch(g){case v:(b.swipeLeft&&o||!o&&b.allowPageScroll!=M)&&e.preventDefault();break;case A:(b.swipeRight&&o||!o&&b.allowPageScroll!=M)&&e.preventDefault();break;case B:(b.swipeUp&&o||!o&&b.allowPageScroll!= N)&&e.preventDefault();break;case C:(b.swipeDown&&o||!o&&b.allowPageScroll!=N)&&e.preventDefault()}}h===b.fingers||b.fingers===x||!n?(i=U(),k=u-y,b.swipeStatus&&(c=l(a,d,j,i,k)),b.triggerOnTouchEnd||(e=!(b.maxTimeThreshold?!(k>=b.maxTimeThreshold):1),!0===D()?(d=q,c=l(a,d)):e&&(d=m,l(a,d)))):(d=m,l(a,d));!1===c&&(d=m,l(a,d))}}function L(a){a=a.originalEvent;a.preventDefault();u=(new Date).getTime();i=U();j=S();k=u-y;if(b.triggerOnTouchEnd||!1===b.triggerOnTouchEnd&&d===z)if(d=q,(h===b.fingers||b.fingers=== x||!n)&&0!==f){var c=!(b.maxTimeThreshold?!(k>=b.maxTimeThreshold):1);if((!0===D()||null===D())&&!c)l(a,d);else if(c||!1===D())d=m,l(a,d)}else d=m,l(a,d);else d===z&&(d=m,l(a,d));e.unbind(I,J,!1);e.unbind(K,L,!1)}function t(){y=u=p=f=s=r=h=0}function l(a,c){var d=void 0;b.swipeStatus&&(d=b.swipeStatus.call(e,a,c,j||null,i||0,k||0,h));if(c===m&&b.click&&(1===h||!n)&&(isNaN(i)||0===i))d=b.click.call(e,a,a.target);if(c==q)switch(b.swipe&&(d=b.swipe.call(e,a,j,i,k,h)),j){case v:b.swipeLeft&&(d=b.swipeLeft.call(e, a,j,i,k,h));break;case A:b.swipeRight&&(d=b.swipeRight.call(e,a,j,i,k,h));break;case B:b.swipeUp&&(d=b.swipeUp.call(e,a,j,i,k,h));break;case C:b.swipeDown&&(d=b.swipeDown.call(e,a,j,i,k,h))}(c===m||c===q)&&t(a);return d}function D(){return null!==b.threshold?i>=b.threshold:null}function U(){return Math.round(Math.sqrt(Math.pow(f-r,2)+Math.pow(p-s,2)))}function S(){var a;a=Math.atan2(p-s,r-f);a=Math.round(180*a/Math.PI);0>a&&(a=360-Math.abs(a));return 45>=a&&0<=a?v:360>=a&&315<=a?v:135<=a&&225>=a? A:45<a&&135>a?C:B}function V(){e.unbind(E,H);e.unbind(F,t);e.unbind(I,J);e.unbind(K,L)}var O=n||!b.fallbackToMouseEvents,E=O?"touchstart":"mousedown",I=O?"touchmove":"mousemove",K=O?"touchend":"mouseup",F="touchcancel",i=0,j=null,k=0,e=g(c),d="start",h=0,y=p=f=s=r=0,u=0;try{e.bind(E,H),e.bind(F,t)}catch(P){g.error("events not supported "+E+","+F+" on jQuery.swipe")}this.enable=function(){e.bind(E,H);e.bind(F,t);return e};this.disable=function(){V();return e};this.destroy=function(){V();e.data(w,null); return e}}var v="left",A="right",B="up",C="down",G="none",T="auto",M="horizontal",N="vertical",x="all",R="start",z="move",q="end",m="cancel",n="ontouchstart"in window,w="TouchSwipe";g.fn.swipe=function(c){var b=g(this),f=b.data(w);if(f&&"string"===typeof c){if(f[c])return f[c].apply(this,Array.prototype.slice.call(arguments,1));g.error("Method "+c+" does not exist on jQuery.swipe")}else if(!f&&("object"===typeof c||!c))return P.apply(this,arguments);return b};g.fn.swipe.defaults={fingers:1,threshold:75, maxTimeThreshold:null,swipe:null,swipeLeft:null,swipeRight:null,swipeUp:null,swipeDown:null,swipeStatus:null,click:null,triggerOnTouchEnd:!0,allowPageScroll:"auto",fallbackToMouseEvents:!0};g.fn.swipe.phases={PHASE_START:R,PHASE_MOVE:z,PHASE_END:q,PHASE_CANCEL:m};g.fn.swipe.directions={LEFT:v,RIGHT:A,UP:B,DOWN:C};g.fn.swipe.pageScroll={NONE:G,HORIZONTAL:M,VERTICAL:N,AUTO:T};g.fn.swipe.fingers={ONE:1,TWO:2,THREE:3,ALL:x}})(jQuery);
        eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('(C($){8($.1r.1v){G}$.1r.6p=$.1r.1v=C(u,w){8(1k.S==0){18(I,\'6q 54 7P 1j "\'+1k.4l+\'".\');G 1k}8(1k.S>1){G 1k.1W(C(){$(1k).1v(u,w)})}E y=1k,$13=1k[0],55=K;8(y.1m(\'56\')){55=y.1Q(\'3o\',\'4m\');y.R(\'3o\',[\'4n\',I])}y.57=C(o,a,b){o=3R($13,o);o.D=6r($13,o.D);o.1M=6s($13,o.1M);o.M=6t($13,o.M);o.V=59($13,o.V);o.Y=59($13,o.Y);o.1a=6u($13,o.1a);o.1q=6v($13,o.1q);o.1h=6w($13,o.1h);8(a){31=$.1N(I,{},$.1r.1v.5a,o)}7=$.1N(I,{},$.1r.1v.5a,o);7.d=6x(7);z.2b=(7.2b==\'4o\'||7.2b==\'1n\')?\'Y\':\'V\';E c=y.14(),2w=5b($1s,7,\'N\');8(3p(7.25)){7.25=\'7Q\'+F.3S}7.4p=5c(7,2w);7.D=6y(7.D,7,c,b);7[7.d[\'N\']]=6z(7[7.d[\'N\']],7,c);7[7.d[\'1d\']]=6A(7[7.d[\'1d\']],7,c);8(7.2m){8(!3T(7[7.d[\'N\']])){7[7.d[\'N\']]=\'2J%\'}}8(3T(7[7.d[\'N\']])){z.6B=I;z.4q=7[7.d[\'N\']];7[7.d[\'N\']]=4r(2w,z.4q);8(!7.D.L){7.D.T.1c=I}}8(7.2m){7.1R=K;7.1i=[0,0,0,0];7.1A=K;7.D.T.1c=K}O{8(!7.D.L){7=6C(7,2w)}8(!7[7.d[\'N\']]){8(!7.D.T.1c&&Z(7.D[7.d[\'N\']])&&7.D.1t==\'*\'){7[7.d[\'N\']]=7.D.L*7.D[7.d[\'N\']];7.1A=K}O{7[7.d[\'N\']]=\'1c\'}}8(1G(7.1A)){7.1A=(Z(7[7.d[\'N\']]))?\'5d\':K}8(7.D.T.1c){7.D.L=32(c,7,0)}}8(7.D.1t!=\'*\'&&!7.D.T.1c){7.D.T.4s=7.D.L;7.D.L=3U(c,7,0)}7.D.L=2x(7.D.L,7,7.D.T.2c,$13);7.D.T.1Z=7.D.L;8(7.2m){8(!7.D.T.34){7.D.T.34=7.D.L}8(!7.D.T.1X){7.D.T.1X=7.D.L}7=5e(7,c,2w)}O{7.1i=6D(7.1i);8(7.1A==\'3q\'){7.1A=\'1n\'}O 8(7.1A==\'5f\'){7.1A=\'35\'}1B(7.1A){Q\'5d\':Q\'1n\':Q\'35\':8(7[7.d[\'N\']]!=\'1c\'){7=5g(7,c);7.1R=I}16;2y:7.1A=K;7.1R=(7.1i[0]==0&&7.1i[1]==0&&7.1i[2]==0&&7.1i[3]==0)?K:I;16}}8(!Z(7.1M.1C)){7.1M.1C=6E}8(1G(7.1M.D)){7.1M.D=(7.2m||7.D.T.1c||7.D.1t!=\'*\')?\'L\':7.D.L}7.M=$.1N(I,{},7.1M,7.M);7.V=$.1N(I,{},7.1M,7.V);7.Y=$.1N(I,{},7.1M,7.Y);7.1a=$.1N(I,{},7.1M,7.1a);7.M=6F($13,7.M);7.V=5h($13,7.V);7.Y=5h($13,7.Y);7.1a=6G($13,7.1a);7.1q=6H($13,7.1q);7.1h=6I($13,7.1h);8(7.2n){7.2n=5i(7.2n)}8(7.M.5j){7.M.4t=7.M.5j;2K(\'M.5j\',\'M.4t\')}8(7.M.5k){7.M.4u=7.M.5k;2K(\'M.5k\',\'M.4u\')}8(7.M.5l){7.M.4v=7.M.5l;2K(\'M.5l\',\'M.4v\')}8(7.M.5m){7.M.2L=7.M.5m;2K(\'M.5m\',\'M.2L\')}};y.6J=C(){y.1m(\'56\',I);E a=y.14(),3V=5n(y,[\'6K\',\'6L\',\'3W\',\'3q\',\'35\',\'5f\',\'1n\',\'3X\',\'N\',\'1d\',\'6M\',\'1S\',\'5o\',\'6N\']),5p=\'7R\';1B(3V.3W){Q\'6O\':Q\'7S\':5p=3V.3W;16}$1s.X(3V).X({\'7T\':\'3r\',\'3W\':5p});y.1m(\'5q\',3V).X({\'6K\':\'1n\',\'6L\':\'3Y\',\'3W\':\'6O\',\'3q\':0,\'35\':\'M\',\'5f\':\'M\',\'1n\':0,\'6M\':0,\'1S\':0,\'5o\':0,\'6N\':0});4w(a,7);5r(a,7);8(7.2m){5s(7,a)}};y.6P=C(){y.5t();y.12(H(\'5u\',F),C(e,a){e.1f();8(!z.2d){8(7.M.W){7.M.W.36(2z(\'4x\',F))}}z.2d=I;8(7.M.1H){7.M.1H=K;y.R(H(\'3a\',F),a)}G I});y.12(H(\'5v\',F),C(e){e.1f();8(z.20){3Z(U)}G I});y.12(H(\'3a\',F),C(e,a,b){e.1f();1u=3s(1u);8(a&&z.20){U.2d=I;E c=2o()-U.2M;U.1C-=c;8(U.3t){U.3t.1C-=c}8(U.3u){U.3u.1C-=c}3Z(U,K)}8(!z.26&&!z.20){8(b){1u.3v+=2o()-1u.2M}}8(!z.26){8(7.M.W){7.M.W.36(2z(\'6Q\',F))}}z.26=I;8(7.M.4u){E d=7.M.2L-1u.3v,3b=2J-1I.2A(d*2J/7.M.2L);7.M.4u.1g($13,3b,d)}G I});y.12(H(\'1H\',F),C(e,b,c,d){e.1f();1u=3s(1u);E v=[b,c,d],t=[\'2N\',\'27\',\'3c\'],a=3d(v,t);b=a[0];c=a[1];d=a[2];8(b!=\'V\'&&b!=\'Y\'){b=z.2b}8(!Z(c)){c=0}8(!1l(d)){d=K}8(d){z.2d=K;7.M.1H=I}8(!7.M.1H){e.2e();G 18(F,\'3w 4x: 2p 3e.\')}8(z.26){8(7.M.W){7.M.W.2O(2z(\'4x\',F));7.M.W.2O(2z(\'6Q\',F))}}z.26=K;1u.2M=2o();E f=7.M.2L+c;41=f-1u.3v;3b=2J-1I.2A(41*2J/f);8(7.M.1e){1u.1e=7U(C(){E a=2o()-1u.2M+1u.3v,3b=1I.2A(a*2J/f);7.M.1e.4y.1g(7.M.1e.2q[0],3b)},7.M.1e.5w)}1u.M=7V(C(){8(7.M.1e){7.M.1e.4y.1g(7.M.1e.2q[0],2J)}8(7.M.4v){7.M.4v.1g($13,3b,41)}8(z.20){y.R(H(\'1H\',F),b)}O{y.R(H(b,F),7.M)}},41);8(7.M.4t){7.M.4t.1g($13,3b,41)}G I});y.12(H(\'3f\',F),C(e){e.1f();8(U.2d){U.2d=K;z.26=K;z.20=I;U.2M=2o();2P(U)}O{y.R(H(\'1H\',F))}G I});y.12(H(\'V\',F)+\' \'+H(\'Y\',F),C(e,b,f,g,h){e.1f();8(z.2d||y.2f(\':3r\')){e.2e();G 18(F,\'3w 4x 7W 3r: 2p 3e.\')}E i=(Z(7.D.4z))?7.D.4z:7.D.L+1;8(i>J.P){e.2e();G 18(F,\'2p 6R D (\'+J.P+\' P, \'+i+\' 6S): 2p 3e.\')}E v=[b,f,g,h],t=[\'2g\',\'27/2N\',\'C\',\'3c\'],a=3d(v,t);b=a[0];f=a[1];g=a[2];h=a[3];E k=e.5x.17(F.3x.42.S);8(!1D(b)){b={}}8(1o(g)){b.3g=g}8(1l(h)){b.3y=h}b=$.1N(I,{},7[k],b);8(b.5y&&!b.5y.1g($13,k)){e.2e();G 18(F,\'7X "5y" 7Y K.\')}8(!Z(f)){8(7.D.1t!=\'*\'){f=\'L\'}O{E m=[f,b.D,7[k].D];1j(E a=0,l=m.S;a<l;a++){8(Z(m[a])||m[a]==\'6T\'||m[a]==\'L\'){f=m[a];16}}}1B(f){Q\'6T\':e.2e();G y.1Q(H(k+\'7Z\',F),[b,g]);16;Q\'L\':8(!7.D.T.1c&&7.D.1t==\'*\'){f=7.D.L}16}}8(U.2d){y.R(H(\'3f\',F));y.R(H(\'3y\',F),[k,[b,f,g]]);e.2e();G 18(F,\'3w 80 3e.\')}8(b.1C>0){8(z.20){8(b.3y){y.R(H(\'3y\',F),[k,[b,f,g]])}e.2e();G 18(F,\'3w 81 3e.\')}}1u.3v=0;y.R(H(\'6U\'+k,F),[b,f]);8(7.2n){E s=7.2n,c=[b,f];1j(E j=0,l=s.S;j<l;j++){E d=k;8(!s[j][2]){d=(d==\'V\')?\'Y\':\'V\'}8(!s[j][1]){c[0]=s[j][0].1Q(\'3o\',[\'4A\',d])}c[1]=f+s[j][3];s[j][0].R(\'3o\',[\'6U\'+d,c])}}G I});y.12(H(\'82\',F),C(e,b,c){e.1f();E d=y.14();8(!7.1T){8(J.11==0){8(7.3z){y.R(H(\'Y\',F),J.P-1)}G e.2e()}}1U(d,7);8(!Z(c)){8(7.D.T.1c){c=4B(d,7,J.P-1)}O 8(7.D.1t!=\'*\'){E f=(Z(b.D))?b.D:5z(y,7);c=6V(d,7,J.P-1,f)}O{c=7.D.L}c=4C(c,7,b.D,$13)}8(!7.1T){8(J.P-c<J.11){c=J.P-J.11}}7.D.T.1Z=7.D.L;8(7.D.T.1c){E g=2x(32(d,7,J.P-c),7,7.D.T.2c,$13);8(7.D.L+c<=g&&c<J.P){c++;g=2x(32(d,7,J.P-c),7,7.D.T.2c,$13)}7.D.L=g}O 8(7.D.1t!=\'*\'){E g=3U(d,7,J.P-c);7.D.L=2x(g,7,7.D.T.2c,$13)}1U(d,7,I);8(c==0){e.2e();G 18(F,\'0 D 4D 1M: 2p 3e.\')}18(F,\'6W \'+c+\' D 5A.\');J.11+=c;2h(J.11>=J.P){J.11-=J.P}8(!7.1T){8(J.11==0&&b.4E){b.4E.1g($13,\'V\')}8(!7.3z){3A(7,J.11,F)}}y.14().17(J.P-c,J.P).83(y);8(J.P<7.D.L+c){y.14().17(0,(7.D.L+c)-J.P).4F(I).43(y)}E d=y.14(),3h=6X(d,7,c),2i=6Y(d,7),1Y=d.1O(c-1),21=3h.3i(),2r=2i.3i();1U(d,7);E h=0,2B=0;8(7.1A){E p=4G(2i,7);h=p[0];2B=p[1]}E i=(h<0)?7.1i[7.d[3]]:0;E j=K,2Q=$();8(7.D.L<c){2Q=d.17(7.D.T.1Z,c);8(b.1V==\'6Z\'){E k=7.D[7.d[\'N\']];j=2Q;1Y=2r;5B(j);7.D[7.d[\'N\']]=\'1c\'}}E l=K,3B=2R(d.17(0,c),7,\'N\'),2j=4H(4I(2i,7,I),7,!7.1R),3C=0,28={},4J={},2s={},2S={},4K={},2T={},5C={},2U=5D(b,7,c,3B);1B(b.1V){Q\'1J\':Q\'1J-1w\':3C=2R(d.17(0,7.D.L),7,\'N\');16}8(j){7.D[7.d[\'N\']]=k}1U(d,7,I);8(2B>=0){1U(21,7,7.1i[7.d[1]])}8(h>=0){1U(1Y,7,7.1i[7.d[3]])}8(7.1A){7.1i[7.d[1]]=2B;7.1i[7.d[3]]=h}2T[7.d[\'1n\']]=-(3B-i);5C[7.d[\'1n\']]=-(3C-i);4J[7.d[\'1n\']]=2j[7.d[\'N\']];E m=C(){},1P=C(){},1E=C(){},3D=C(){},2C=C(){},5E=C(){},1F=C(){},3E=C(){},1x=C(){},1y=C(){},1K=C(){};1B(b.1V){Q\'3j\':Q\'1J\':Q\'1J-1w\':Q\'22\':Q\'22-1w\':l=y.4F(I).43($1s);16}1B(b.1V){Q\'3j\':Q\'22\':Q\'22-1w\':l.14().17(0,c).2t();l.14().17(7.D.T.1Z).2t();16;Q\'1J\':Q\'1J-1w\':l.14().17(7.D.L).2t();l.X(5C);16}y.X(2T);U=44(2U,b.2k);28[7.d[\'1n\']]=(7.1R)?7.1i[7.d[3]]:0;8(7[7.d[\'N\']]==\'1c\'||7[7.d[\'1d\']]==\'1c\'){m=C(){$1s.X(2j)};1P=C(){U.19.1b([$1s,2j])}}8(7.1R){8(2r.5F(1Y).S){2s[7.d[\'1S\']]=1Y.1m(\'29\');8(h<0){1Y.X(2s)}O{1F=C(){1Y.X(2s)};3E=C(){U.19.1b([1Y,2s])}}}1B(b.1V){Q\'1J\':Q\'1J-1w\':l.14().1O(c-1).X(2s);16}8(2r.5F(21).S){2S[7.d[\'1S\']]=21.1m(\'29\');1E=C(){21.X(2S)};3D=C(){U.19.1b([21,2S])}}8(2B>=0){4K[7.d[\'1S\']]=2r.1m(\'29\')+7.1i[7.d[1]];2C=C(){2r.X(4K)};5E=C(){U.19.1b([2r,4K])}}}1K=C(){y.X(28)};E n=7.D.L+c-J.P;1y=C(){8(n>0){y.14().17(J.P).2t();3h=$(y.14().17(J.P-(7.D.L-n)).3F().70(y.14().17(0,n).3F()))}5G(j);8(7.1R){E a=y.14().1O(7.D.L+c-1);a.X(7.d[\'1S\'],a.1m(\'29\'))}};E o=5H(3h,2Q,2i,c,\'V\',2U,2j);1x=C(){5I(y,l,b);z.20=K;2a.3g=45($13,b,\'3g\',o,2a);2D=5J(y,2D,F);8(!z.26){y.R(H(\'1H\',F))}};z.20=I;1u=3s(1u);2a.3G=45($13,b,\'3G\',o,2a);1B(b.1V){Q\'3Y\':y.X(28);m();1E();2C();1F();1K();1y();1x();16;Q\'1w\':U.19.1b([y,{\'1L\':0},C(){m();1E();2C();1F();1K();1y();U=44(2U,b.2k);U.19.1b([y,{\'1L\':1},1x]);2P(U)}]);16;Q\'3j\':y.X({\'1L\':0});U.19.1b([l,{\'1L\':0}]);U.19.1b([y,{\'1L\':1},1x]);1P();1E();2C();1F();1K();1y();16;Q\'1J\':U.19.1b([l,28,C(){1E();2C();1F();1K();1y();1x()}]);1P();16;Q\'1J-1w\':U.19.1b([y,{\'1L\':0}]);U.19.1b([l,28,C(){y.X({\'1L\':1});1E();2C();1F();1K();1y();1x()}]);1P();16;Q\'22\':U.19.1b([l,4J,1x]);1P();1E();2C();1F();1K();1y();16;Q\'22-1w\':y.X({\'1L\':0});U.19.1b([y,{\'1L\':1}]);U.19.1b([l,4J,1x]);1P();1E();2C();1F();1K();1y();16;2y:U.19.1b([y,28,C(){1y();1x()}]);1P();3D();5E();3E();16}2P(U);5K(7.25,y,F);y.R(H(\'3H\',F),[K,2j]);G I});y.12(H(\'84\',F),C(e,c,d){e.1f();E f=y.14();8(!7.1T){8(J.11==7.D.L){8(7.3z){y.R(H(\'V\',F),J.P-1)}G e.2e()}}1U(f,7);8(!Z(d)){8(7.D.1t!=\'*\'){E g=(Z(c.D))?c.D:5z(y,7);d=71(f,7,0,g)}O{d=7.D.L}d=4C(d,7,c.D,$13)}E h=(J.11==0)?J.P:J.11;8(!7.1T){8(7.D.T.1c){E i=32(f,7,d),g=4B(f,7,h-1)}O{E i=7.D.L,g=7.D.L}8(d+i>h){d=h-g}}7.D.T.1Z=7.D.L;8(7.D.T.1c){E i=2x(5L(f,7,d,h),7,7.D.T.2c,$13);2h(7.D.L-d>=i&&d<J.P){d++;i=2x(5L(f,7,d,h),7,7.D.T.2c,$13)}7.D.L=i}O 8(7.D.1t!=\'*\'){E i=3U(f,7,d);7.D.L=2x(i,7,7.D.T.2c,$13)}1U(f,7,I);8(d==0){e.2e();G 18(F,\'0 D 4D 1M: 2p 3e.\')}18(F,\'6W \'+d+\' D 72.\');J.11-=d;2h(J.11<0){J.11+=J.P}8(!7.1T){8(J.11==7.D.L&&c.4E){c.4E.1g($13,\'Y\')}8(!7.3z){3A(7,J.11,F)}}8(J.P<7.D.L+d){y.14().17(0,(7.D.L+d)-J.P).4F(I).43(y)}E f=y.14(),3h=73(f,7),2i=74(f,7,d),1Y=f.1O(d-1),21=3h.3i(),2r=2i.3i();1U(f,7);E j=0,2B=0;8(7.1A){E p=4G(2i,7);j=p[0];2B=p[1]}E k=K,2Q=$();8(7.D.T.1Z<d){2Q=f.17(7.D.T.1Z,d);8(c.1V==\'6Z\'){E l=7.D[7.d[\'N\']];k=2Q;1Y=21;5B(k);7.D[7.d[\'N\']]=\'1c\'}}E m=K,3B=2R(f.17(0,d),7,\'N\'),2j=4H(4I(2i,7,I),7,!7.1R),3C=0,28={},4L={},2s={},2S={},2T={},2U=5D(c,7,d,3B);1B(c.1V){Q\'22\':Q\'22-1w\':3C=2R(f.17(0,7.D.T.1Z),7,\'N\');16}8(k){7.D[7.d[\'N\']]=l}8(7.1A){8(7.1i[7.d[1]]<0){7.1i[7.d[1]]=0}}1U(f,7,I);1U(21,7,7.1i[7.d[1]]);8(7.1A){7.1i[7.d[1]]=2B;7.1i[7.d[3]]=j}2T[7.d[\'1n\']]=(7.1R)?7.1i[7.d[3]]:0;E n=C(){},1P=C(){},1E=C(){},3D=C(){},1F=C(){},3E=C(){},1x=C(){},1y=C(){},1K=C(){};1B(c.1V){Q\'3j\':Q\'1J\':Q\'1J-1w\':Q\'22\':Q\'22-1w\':m=y.4F(I).43($1s);m.14().17(7.D.T.1Z).2t();16}1B(c.1V){Q\'3j\':Q\'1J\':Q\'1J-1w\':y.X(\'3X\',1);m.X(\'3X\',0);16}U=44(2U,c.2k);28[7.d[\'1n\']]=-3B;4L[7.d[\'1n\']]=-3C;8(j<0){28[7.d[\'1n\']]+=j}8(7[7.d[\'N\']]==\'1c\'||7[7.d[\'1d\']]==\'1c\'){n=C(){$1s.X(2j)};1P=C(){U.19.1b([$1s,2j])}}8(7.1R){E o=2r.1m(\'29\');8(2B>=0){o+=7.1i[7.d[1]]}2r.X(7.d[\'1S\'],o);8(1Y.5F(21).S){2S[7.d[\'1S\']]=21.1m(\'29\')}1E=C(){21.X(2S)};3D=C(){U.19.1b([21,2S])};E q=1Y.1m(\'29\');8(j>0){q+=7.1i[7.d[3]]}2s[7.d[\'1S\']]=q;1F=C(){1Y.X(2s)};3E=C(){U.19.1b([1Y,2s])}}1K=C(){y.X(2T)};E r=7.D.L+d-J.P;1y=C(){8(r>0){y.14().17(J.P).2t()}E a=y.14().17(0,d).43(y).3i();8(r>0){2i=3I(f,7)}5G(k);8(7.1R){8(J.P<7.D.L+d){E b=y.14().1O(7.D.L-1);b.X(7.d[\'1S\'],b.1m(\'29\')+7.1i[7.d[3]])}a.X(7.d[\'1S\'],a.1m(\'29\'))}};E s=5H(3h,2Q,2i,d,\'Y\',2U,2j);1x=C(){y.X(\'3X\',y.1m(\'5q\').3X);5I(y,m,c);z.20=K;2a.3g=45($13,c,\'3g\',s,2a);2D=5J(y,2D,F);8(!z.26){y.R(H(\'1H\',F))}};z.20=I;1u=3s(1u);2a.3G=45($13,c,\'3G\',s,2a);1B(c.1V){Q\'3Y\':y.X(28);n();1E();1F();1K();1y();1x();16;Q\'1w\':U.19.1b([y,{\'1L\':0},C(){n();1E();1F();1K();1y();U=44(2U,c.2k);U.19.1b([y,{\'1L\':1},1x]);2P(U)}]);16;Q\'3j\':y.X({\'1L\':0});U.19.1b([m,{\'1L\':0}]);U.19.1b([y,{\'1L\':1},1x]);1P();1E();1F();1K();1y();16;Q\'1J\':y.X(7.d[\'1n\'],$1s[7.d[\'N\']]());U.19.1b([y,2T,1x]);1P();1E();1F();1y();16;Q\'1J-1w\':y.X(7.d[\'1n\'],$1s[7.d[\'N\']]());U.19.1b([m,{\'1L\':0}]);U.19.1b([y,2T,1x]);1P();1E();1F();1y();16;Q\'22\':U.19.1b([m,4L,1x]);1P();1E();1F();1K();1y();16;Q\'22-1w\':y.X({\'1L\':0});U.19.1b([y,{\'1L\':1}]);U.19.1b([m,4L,1x]);1P();1E();1F();1K();1y();16;2y:U.19.1b([y,28,C(){1K();1y();1x()}]);1P();3D();3E();16}2P(U);5K(7.25,y,F);y.R(H(\'3H\',F),[K,2j]);G I});y.12(H(\'3k\',F),C(e,b,c,d,f,g,h){e.1f();E v=[b,c,d,f,g,h],t=[\'2N/27/2g\',\'27\',\'3c\',\'2g\',\'2N\',\'C\'],a=3d(v,t);f=a[3];g=a[4];h=a[5];b=3J(a[0],a[1],a[2],J,y);8(b==0){G K}8(!1D(f)){f=K}8(z.20){8(!1D(f)||f.1C>0){G K}}8(g!=\'V\'&&g!=\'Y\'){8(7.1T){g=(b<=J.P/2)?\'Y\':\'V\'}O{g=(J.11==0||J.11>b)?\'Y\':\'V\'}}8(g==\'V\'){b=J.P-b}y.R(H(g,F),[f,b,h]);G I});y.12(H(\'85\',F),C(e,a,b){e.1f();E c=y.1Q(H(\'46\',F));G y.1Q(H(\'5M\',F),[c-1,a,\'V\',b])});y.12(H(\'86\',F),C(e,a,b){e.1f();E c=y.1Q(H(\'46\',F));G y.1Q(H(\'5M\',F),[c+1,a,\'Y\',b])});y.12(H(\'5M\',F),C(e,a,b,c,d){e.1f();8(!Z(a)){a=y.1Q(H(\'46\',F))}E f=7.1a.D||7.D.L,1X=1I.2A(J.P/f)-1;8(a<0){a=1X}8(a>1X){a=0}G y.1Q(H(\'3k\',F),[a*f,0,I,b,c,d])});y.12(H(\'75\',F),C(e,s){e.1f();8(s){s=3J(s,0,I,J,y)}O{s=0}s+=J.11;8(s!=0){8(D.P>0){2h(s>J.P){s-=J.P}}y.87(y.14().17(s,J.P))}G I});y.12(H(\'2n\',F),C(e,s){e.1f();8(s){s=5i(s)}O 8(7.2n){s=7.2n}O{G 18(F,\'6q 88 4D 2n.\')}E n=y.1Q(H(\'4m\',F)),x=I;1j(E j=0,l=s.S;j<l;j++){8(!s[j][0].1Q(H(\'3k\',F),[n,s[j][3],I])){x=K}}G x});y.12(H(\'3y\',F),C(e,a,b){e.1f();8(1o(a)){a.1g($13,2D)}O 8(2V(a)){2D=a}O 8(!1G(a)){2D.1b([a,b])}G 2D});y.12(H(\'89\',F),C(e,b,c,d,f){e.1f();E v=[b,c,d,f],t=[\'2N/2g\',\'2N/27/2g\',\'3c\',\'27\'],a=3d(v,t);b=a[0];c=a[1];d=a[2];f=a[3];8(1D(b)&&!2u(b)){b=$(b)}O 8(1p(b)){b=$(b)}8(!2u(b)||b.S==0){G 18(F,\'2p a 5N 2g.\')}8(1G(c)){c=\'4M\'}4w(b,7);5r(b,7);E g=c,47=\'47\';8(c==\'4M\'){8(d){8(J.11==0){c=J.P-1;47=\'76\'}O{c=J.11;J.11+=b.S}8(c<0){c=0}}O{c=J.P-1;47=\'76\'}}O{c=3J(c,f,d,J,y)}8(g!=\'4M\'&&!d){8(c<J.11){J.11+=b.S}}8(J.11>=J.P){J.11-=J.P}E h=y.14().1O(c);8(h.S){h[47](b)}O{y.77(b)}J.P=y.14().S;y.R(H(\'4N\',F));y.R(H(\'5O\',F));G I});y.12(H(\'78\',F),C(e,c,d,f){e.1f();E v=[c,d,f],t=[\'2N/27/2g\',\'3c\',\'27\'],a=3d(v,t);c=a[0];d=a[1];f=a[2];E g=K;8(c 2W $&&c.S>1){h=$();c.1W(C(i,a){E b=y.R(H(\'78\',F),[$(1k),d,f]);8(b)h=h.8a(b)});G h}8(1G(c)||c==\'4M\'){h=y.14().3i()}O{c=3J(c,f,d,J,y);E h=y.14().1O(c);8(h.S){8(c<J.11)J.11-=h.S}}8(h&&h.S){h.8b();J.P=y.14().S;y.R(H(\'4N\',F))}G h});y.12(H(\'3G\',F)+\' \'+H(\'3g\',F),C(e,a){e.1f();E b=e.5x.17(F.3x.42.S);8(2V(a)){2a[b]=a}8(1o(a)){2a[b].1b(a)}G 2a[b]});y.12(H(\'4m\',F),C(e,a){e.1f();8(J.11==0){E b=0}O{E b=J.P-J.11}8(1o(a)){a.1g($13,b)}G b});y.12(H(\'46\',F),C(e,a){e.1f();E b=7.1a.D||7.D.L,1X=1I.2A(J.P/b-1),2l;8(J.11==0){2l=0}O 8(J.11<J.P%b){2l=0}O 8(J.11==b&&!7.1T){2l=1X}O{2l=1I.79((J.P-J.11)/b)}8(2l<0){2l=0}8(2l>1X){2l=1X}8(1o(a)){a.1g($13,2l)}G 2l});y.12(H(\'8c\',F),C(e,a){e.1f();E b=3I(y.14(),7);8(1o(a)){a.1g($13,b)}G b});y.12(H(\'17\',F),C(e,f,l,b){e.1f();8(J.P==0){G K}E v=[f,l,b],t=[\'27\',\'27\',\'C\'],a=3d(v,t);f=(Z(a[0]))?a[0]:0;l=(Z(a[1]))?a[1]:J.P;b=a[2];f+=J.11;l+=J.11;8(D.P>0){2h(f>J.P){f-=J.P}2h(l>J.P){l-=J.P}2h(f<0){f+=J.P}2h(l<0){l+=J.P}}E c=y.14(),$i;8(l>f){$i=c.17(f,l)}O{$i=$(c.17(f,J.P).3F().70(c.17(0,l).3F()))}8(1o(b)){b.1g($13,$i)}G $i});y.12(H(\'26\',F)+\' \'+H(\'2d\',F)+\' \'+H(\'20\',F),C(e,a){e.1f();E b=e.5x.17(F.3x.42.S),5P=z[b];8(1o(a)){a.1g($13,5P)}G 5P});y.12(H(\'4A\',F),C(e,a,b,c){e.1f();E d=K;8(1o(a)){a.1g($13,7)}O 8(1D(a)){31=$.1N(I,{},31,a);8(b!==K)d=I;O 7=$.1N(I,{},7,a)}O 8(!1G(a)){8(1o(b)){E f=4O(\'7.\'+a);8(1G(f)){f=\'\'}b.1g($13,f)}O 8(!1G(b)){8(2X c!==\'3c\')c=I;4O(\'31.\'+a+\' = b\');8(c!==K)d=I;O 4O(\'7.\'+a+\' = b\')}O{G 4O(\'7.\'+a)}}8(d){1U(y.14(),7);y.57(31);y.5Q();E g=4P(y,7);y.R(H(\'3H\',F),[I,g])}G 7});y.12(H(\'5O\',F),C(e,a,b){e.1f();8(1G(a)){a=$(\'8d\')}O 8(1p(a)){a=$(a)}8(!2u(a)||a.S==0){G 18(F,\'2p a 5N 2g.\')}8(!1p(b)){b=\'a.6p\'}a.8e(b).1W(C(){E h=1k.7a||\'\';8(h.S>0&&y.14().7b($(h))!=-1){$(1k).23(\'5R\').5R(C(e){e.2E();y.R(H(\'3k\',F),h)})}});G I});y.12(H(\'3H\',F),C(e,b,c){e.1f();8(!7.1a.1z){G}E d=7.1a.D||7.D.L,4Q=1I.2A(J.P/d);8(b){8(7.1a.3K){7.1a.1z.14().2t();7.1a.1z.1W(C(){1j(E a=0;a<4Q;a++){E i=y.14().1O(3J(a*d,0,I,J,y));$(1k).77(7.1a.3K.1g(i[0],a+1))}})}7.1a.1z.1W(C(){$(1k).14().23(7.1a.3L).1W(C(a){$(1k).12(7.1a.3L,C(e){e.2E();y.R(H(\'3k\',F),[a*d,-7.1a.4R,I,7.1a])})})})}E f=y.1Q(H(\'46\',F))+7.1a.4R;8(f>=4Q){f=0}8(f<0){f=4Q-1}7.1a.1z.1W(C(){$(1k).14().2O(2z(\'7c\',F)).1O(f).36(2z(\'7c\',F))});G I});y.12(H(\'4N\',F),C(e){E a=7.D.L,2F=y.14(),2w=5b($1s,7,\'N\');J.P=2F.S;7.4p=5c(7,2w);8(z.4q){7[7.d[\'N\']]=4r(2w,z.4q)}8(7.2m){7.D.N=7.D.3M.N;7.D.1d=7.D.3M.1d;7=5e(7,2F,2w);a=7.D.L;5s(7,2F)}O 8(7.D.T.1c){a=32(2F,7,0)}O 8(7.D.1t!=\'*\'){a=3U(2F,7,0)}8(!7.1T&&J.11!=0&&a>J.11){8(7.D.T.1c){E b=4B(2F,7,J.11)-J.11}O 8(7.D.1t!=\'*\'){E b=7d(2F,7,J.11)-J.11}O{E b=7.D.L-J.11}18(F,\'8f 8g-1T: 8h \'+b+\' D 5A.\');y.R(H(\'V\',F),b)}7.D.L=2x(a,7,7.D.T.2c,$13);7.D.T.1Z=7.D.L;7=5g(7,2F);E c=4P(y,7);y.R(H(\'3H\',F),[I,c]);4S(7,J.P,F);3A(7,J.11,F);G c});y.12(H(\'4n\',F),C(e,a){e.1f();1u=3s(1u);y.1m(\'56\',K);y.R(H(\'5v\',F));8(a){y.R(H(\'75\',F))}1U(y.14(),7);8(7.2m){y.14().1W(C(){$(1k).X($(1k).1m(\'7e\'))})}y.X(y.1m(\'5q\'));y.5t();y.5S();$1s.8i(y);G I});y.12(H(\'18\',F),C(e){18(F,\'3w N: \'+7.N);18(F,\'3w 1d: \'+7.1d);18(F,\'7f 8j: \'+7.D.N);18(F,\'7f 8k: \'+7.D.1d);18(F,\'48 4a D L: \'+7.D.L);8(7.M.1H){18(F,\'48 4a D 5T 8l: \'+7.M.D)}8(7.V.W){18(F,\'48 4a D 5T 5A: \'+7.V.D)}8(7.Y.W){18(F,\'48 4a D 5T 72: \'+7.Y.D)}G F.18});y.12(\'3o\',C(e,n,o){e.1f();G y.1Q(H(n,F),o)})};y.5t=C(){y.23(H(\'\',F));y.23(H(\'\',F,K));y.23(\'3o\')};y.5Q=C(){y.5S();4S(7,J.P,F);3A(7,J.11,F);8(7.M.2G){E b=3N(7.M.2G);$1s.12(H(\'4T\',F,K),C(){y.R(H(\'3a\',F),b)}).12(H(\'4U\',F,K),C(){y.R(H(\'3f\',F))})}8(7.M.W){7.M.W.12(H(7.M.3L,F,K),C(e){e.2E();E a=K,b=2H;8(z.26){a=\'1H\'}O 8(7.M.4V){a=\'3a\';b=3N(7.M.4V)}8(a){y.R(H(a,F),b)}})}8(7.V.W){7.V.W.12(H(7.V.3L,F,K),C(e){e.2E();y.R(H(\'V\',F))});8(7.V.2G){E b=3N(7.V.2G);7.V.W.12(H(\'4T\',F,K),C(){y.R(H(\'3a\',F),b)}).12(H(\'4U\',F,K),C(){y.R(H(\'3f\',F))})}}8(7.Y.W){7.Y.W.12(H(7.Y.3L,F,K),C(e){e.2E();y.R(H(\'Y\',F))});8(7.Y.2G){E b=3N(7.Y.2G);7.Y.W.12(H(\'4T\',F,K),C(){y.R(H(\'3a\',F),b)}).12(H(\'4U\',F,K),C(){y.R(H(\'3f\',F))})}}8(7.1a.1z){8(7.1a.2G){E b=3N(7.1a.2G);7.1a.1z.12(H(\'4T\',F,K),C(){y.R(H(\'3a\',F),b)}).12(H(\'4U\',F,K),C(){y.R(H(\'3f\',F))})}}8(7.V.2Y||7.Y.2Y){$(4b).12(H(\'7g\',F,K,I,I),C(e){E k=e.7h;8(k==7.Y.2Y){e.2E();y.R(H(\'Y\',F))}8(k==7.V.2Y){e.2E();y.R(H(\'V\',F))}})}8(7.1a.4W){$(4b).12(H(\'7g\',F,K,I,I),C(e){E k=e.7h;8(k>=49&&k<58){k=(k-49)*7.D.L;8(k<=J.P){e.2E();y.R(H(\'3k\',F),[k,0,I,7.1a])}}})}8(7.V.4X||7.Y.4X){2K(\'4c 4d-7i\',\'4c 8m-7i\');8($.1r.4d){E c=(7.V.4X)?C(){y.R(H(\'V\',F))}:2H,4e=(7.Y.4X)?C(){y.R(H(\'Y\',F))}:2H;8(4e||4e){8(!z.4d){z.4d=I;E d={\'8n\':30,\'8o\':30,\'8p\':I};1B(7.2b){Q\'4o\':Q\'5U\':d.8q=c;d.8r=4e;16;2y:d.8s=4e;d.8t=c}$1s.4d(d)}}}}8($.1r.1q){E f=\'8u\'8v 3l;8((f&&7.1q.4f)||(!f&&7.1q.5V)){E g=$.1N(I,{},7.V,7.1q),7j=$.1N(I,{},7.Y,7.1q),5W=C(){y.R(H(\'V\',F),[g])},5X=C(){y.R(H(\'Y\',F),[7j])};1B(7.2b){Q\'4o\':Q\'5U\':7.1q.2I.8w=5X;7.1q.2I.8x=5W;16;2y:7.1q.2I.8y=5X;7.1q.2I.8z=5W}8(z.1q){y.1q(\'4n\')}$1s.1q(7.1q.2I);$1s.X(\'7k\',\'8A\');z.1q=I}}8($.1r.1h){8(7.V.1h){2K(\'7l V.1h 7m\',\'4c 1h 4A 2g\');7.V.1h=2H;7.1h={D:5Y(7.V.1h)}}8(7.Y.1h){2K(\'7l Y.1h 7m\',\'4c 1h 4A 2g\');7.Y.1h=2H;7.1h={D:5Y(7.Y.1h)}}8(7.1h){E h=$.1N(I,{},7.V,7.1h),7n=$.1N(I,{},7.Y,7.1h);8(z.1h){$1s.23(H(\'1h\',F,K))}$1s.12(H(\'1h\',F,K),C(e,a){e.2E();8(a>0){y.R(H(\'V\',F),[h])}O{y.R(H(\'Y\',F),[7n])}});z.1h=I}}8(7.M.1H){y.R(H(\'1H\',F),7.M.5Z)}8(z.6B){E i=$(3l),61=0,62=0;i.12(H(\'8B\',F,K,I,I),C(e){E a=i.N(),63=i.1d();8(a!=61||63!=62){y.R(H(\'5v\',F));8(7.M.64&&!z.26){y.R(H(\'1H\',F))}1U(y.14(),7);y.R(H(\'4N\',F));61=a;62=63}})}};y.5S=C(){E a=H(\'\',F),3O=H(\'\',F,K);65=H(\'\',F,K,I,I);$(4b).23(65);$(3l).23(65);$1s.23(3O);8(7.M.W){7.M.W.23(3O)}8(7.V.W){7.V.W.23(3O)}8(7.Y.W){7.Y.W.23(3O)}8(7.1a.1z){7.1a.1z.23(3O);8(7.1a.3K){7.1a.1z.14().2t()}}8(z.1q){y.1q(\'4n\');$1s.X(\'7k\',\'2y\');z.1q=K}8(z.1h){z.1h=K}4S(7,\'4g\',F);3A(7,\'2O\',F)};8(1l(w)){w={\'18\':w}}E z={\'2b\':\'Y\',\'26\':I,\'20\':K,\'2d\':K,\'1h\':K,\'1q\':K},J={\'P\':y.14().S,\'11\':0},1u={\'M\':2H,\'1e\':2H,\'2M\':2o(),\'3v\':0},U={\'2d\':K,\'1C\':0,\'2M\':0,\'2k\':\'\',\'19\':[]},2a={\'3G\':[],\'3g\':[]},2D=[],F=$.1N(I,{},$.1r.1v.7o,w),7={},31=$.1N(I,{},u),$1s=y.8C(\'<\'+F.66.54+\' 8D="\'+F.66.7p+\'" />\').68();F.4l=y.4l;F.3S=$.1r.1v.3S++;y.57(31,I,55);y.6J();y.6P();y.5Q();8(2V(7.D.3m)){E A=7.D.3m}O{E A=[];8(7.D.3m!=0){A.1b(7.D.3m)}}8(7.25){A.8E(4h(7q(7.25),10))}8(A.S>0){1j(E a=0,l=A.S;a<l;a++){E s=A[a];8(s==0){69}8(s===I){s=3l.8F.7a;8(s.S<1){69}}O 8(s===\'7r\'){s=1I.4i(1I.7r()*J.P)}8(y.1Q(H(\'3k\',F),[s,0,I,{1V:\'3Y\'}])){16}}}E B=4P(y,7),7s=3I(y.14(),7);8(7.7t){7.7t.1g($13,{\'N\':B.N,\'1d\':B.1d,\'D\':7s})}y.R(H(\'3H\',F),[I,B]);y.R(H(\'5O\',F));8(F.18){y.R(H(\'18\',F))}G y};$.1r.1v.3S=1;$.1r.1v.5a={\'2n\':K,\'3z\':I,\'1T\':I,\'2m\':K,\'2b\':\'1n\',\'D\':{\'3m\':0},\'1M\':{\'2k\':\'8G\',\'1C\':6E,\'2G\':K,\'3L\':\'5R\',\'3y\':K}};$.1r.1v.7o={\'18\':K,\'3x\':{\'42\':\'\',\'7u\':\'8H\'},\'66\':{\'54\':\'8I\',\'7p\':\'8J\'},\'6a\':{}};$.1r.1v.7v=C(a){G\'<a 8K="#"><7w>\'+a+\'</7w></a>\'};$.1r.1v.7x=C(a){$(1k).X(\'N\',a+\'%\')};$.1r.1v.25={3F:C(n){n+=\'=\';E b=4b.25.3P(\';\');1j(E a=0,l=b.S;a<l;a++){E c=b[a];2h(c.8L(0)==\' \'){c=c.17(1)}8(c.3Q(n)==0){G c.17(n.S)}}G 0},6b:C(n,v,d){E e="";8(d){E a=6c 7y();a.8M(a.2o()+(d*24*60*60*8N));e="; 8O="+a.8P()}4b.25=n+\'=\'+v+e+\'; 8Q=/\'},2t:C(n){$.1r.1v.25.6b(n,"",-1)}};C 44(d,e){G{19:[],1C:d,8R:d,2k:e,2M:2o()}}C 2P(s){8(1D(s.3t)){2P(s.3t)}1j(E a=0,l=s.19.S;a<l;a++){E b=s.19[a];8(!b){69}8(b[3]){b[0].5u()}b[0].8S(b[1],{8T:b[2],1C:s.1C,2k:s.2k})}8(1D(s.3u)){2P(s.3u)}}C 3Z(s,c){8(!1l(c)){c=I}8(1D(s.3t)){3Z(s.3t,c)}1j(E a=0,l=s.19.S;a<l;a++){E b=s.19[a];b[0].5u(I);8(c){b[0].X(b[1]);8(1o(b[2])){b[2]()}}}8(1D(s.3u)){3Z(s.3u,c)}}C 5I(a,b,o){8(b){b.2t()}1B(o.1V){Q\'1w\':Q\'3j\':Q\'1J-1w\':Q\'22-1w\':a.X(\'1t\',\'\');16}}C 45(d,o,b,a,c){8(o[b]){o[b].1g(d,a)}8(c[b].S){1j(E i=0,l=c[b].S;i<l;i++){c[b][i].1g(d,a)}}G[]}C 5J(a,q,c){8(q.S){a.R(H(q[0][0],c),q[0][1]);q.8U()}G q}C 5B(b){b.1W(C(){E a=$(1k);a.1m(\'7z\',a.2f(\':3r\')).4g()})}C 5G(b){8(b){b.1W(C(){E a=$(1k);8(!a.1m(\'7z\')){a.4j()}})}}C 3s(t){8(t.M){8V(t.M)}8(t.1e){8W(t.1e)}G t}C 5H(a,b,c,d,e,f,g){G{\'N\':g.N,\'1d\':g.1d,\'D\':{\'1Z\':a,\'8X\':b,\'6c\':c,\'L\':c},\'1M\':{\'D\':d,\'2b\':e,\'1C\':f}}}C 5D(a,o,b,c){E d=a.1C;8(a.1V==\'3Y\'){G 0}8(d==\'M\'){d=o.1M.1C/o.1M.D*b}O 8(d<10){d=c/d}8(d<1){G 0}8(a.1V==\'1w\'){d=d/2}G 1I.79(d)}C 4S(o,t,c){E a=(Z(o.D.4z))?o.D.4z:o.D.L+1;8(t==\'4j\'||t==\'4g\'){E f=t}O 8(a>t){18(c,\'2p 6R D (\'+t+\' P, \'+a+\' 6S): 8Y 8Z.\');E f=\'4g\'}O{E f=\'4j\'}E s=(f==\'4j\')?\'2O\':\'36\',h=2z(\'3r\',c);8(o.M.W){o.M.W[f]()[s](h)}8(o.V.W){o.V.W[f]()[s](h)}8(o.Y.W){o.Y.W[f]()[s](h)}8(o.1a.1z){o.1a.1z[f]()[s](h)}}C 3A(o,f,c){8(o.1T||o.3z)G;E a=(f==\'2O\'||f==\'36\')?f:K,4Y=2z(\'90\',c);8(o.M.W&&a){o.M.W[a](4Y)}8(o.V.W){E b=a||(f==0)?\'36\':\'2O\';o.V.W[b](4Y)}8(o.Y.W){E b=a||(f==o.D.L)?\'36\':\'2O\';o.Y.W[b](4Y)}}C 3R(a,b){8(1o(b)){b=b.1g(a)}O 8(1G(b)){b={}}G b}C 6r(a,b){b=3R(a,b);8(Z(b)){b={\'L\':b}}O 8(b==\'1c\'){b={\'L\':b,\'N\':b,\'1d\':b}}O 8(!1D(b)){b={}}G b}C 6s(a,b){b=3R(a,b);8(Z(b)){8(b<=50){b={\'D\':b}}O{b={\'1C\':b}}}O 8(1p(b)){b={\'2k\':b}}O 8(!1D(b)){b={}}G b}C 4Z(a,b){b=3R(a,b);8(1p(b)){E c=6d(b);8(c==-1){b=$(b)}O{b=c}}G b}C 6t(a,b){b=4Z(a,b);8(2u(b)){b={\'W\':b}}O 8(1l(b)){b={\'1H\':b}}O 8(Z(b)){b={\'2L\':b}}8(b.1e){8(1p(b.1e)||2u(b.1e)){b.1e={\'2q\':b.1e}}}G b}C 6F(a,b){8(1o(b.W)){b.W=b.W.1g(a)}8(1p(b.W)){b.W=$(b.W)}8(!1l(b.1H)){b.1H=I}8(!Z(b.5Z)){b.5Z=0}8(1G(b.4V)){b.4V=I}8(!1l(b.64)){b.64=I}8(!Z(b.2L)){b.2L=(b.1C<10)?91:b.1C*5}8(b.1e){8(1o(b.1e.2q)){b.1e.2q=b.1e.2q.1g(a)}8(1p(b.1e.2q)){b.1e.2q=$(b.1e.2q)}8(b.1e.2q){8(!1o(b.1e.4y)){b.1e.4y=$.1r.1v.7x}8(!Z(b.1e.5w)){b.1e.5w=50}}O{b.1e=K}}G b}C 59(a,b){b=4Z(a,b);8(2u(b)){b={\'W\':b}}O 8(Z(b)){b={\'2Y\':b}}G b}C 5h(a,b){8(1o(b.W)){b.W=b.W.1g(a)}8(1p(b.W)){b.W=$(b.W)}8(1p(b.2Y)){b.2Y=6d(b.2Y)}G b}C 6u(a,b){b=4Z(a,b);8(2u(b)){b={\'1z\':b}}O 8(1l(b)){b={\'4W\':b}}G b}C 6G(a,b){8(1o(b.1z)){b.1z=b.1z.1g(a)}8(1p(b.1z)){b.1z=$(b.1z)}8(!Z(b.D)){b.D=K}8(!1l(b.4W)){b.4W=K}8(!1o(b.3K)&&!51(b.3K)){b.3K=$.1r.1v.7v}8(!Z(b.4R)){b.4R=0}G b}C 6v(a,b){8(1o(b)){b=b.1g(a)}8(1G(b)){b={\'4f\':K}}8(3p(b)){b={\'4f\':b}}O 8(Z(b)){b={\'D\':b}}G b}C 6H(a,b){8(!1l(b.4f)){b.4f=I}8(!1l(b.5V)){b.5V=K}8(!1D(b.2I)){b.2I={}}8(!1l(b.2I.7A)){b.2I.7A=K}G b}C 6w(a,b){8(1o(b)){b=b.1g(a)}8(3p(b)){b={}}O 8(Z(b)){b={\'D\':b}}O 8(1G(b)){b=K}G b}C 6I(a,b){G b}C 3J(a,b,c,d,e){8(1p(a)){a=$(a,e)}8(1D(a)){a=$(a,e)}8(2u(a)){a=e.14().7b(a);8(!1l(c)){c=K}}O{8(!1l(c)){c=I}}8(!Z(a)){a=0}8(!Z(b)){b=0}8(c){a+=d.11}a+=b;8(d.P>0){2h(a>=d.P){a-=d.P}2h(a<0){a+=d.P}}G a}C 4B(i,o,s){E t=0,x=0;1j(E a=s;a>=0;a--){E j=i.1O(a);t+=(j.2f(\':L\'))?j[o.d[\'2v\']](I):0;8(t>o.4p){G x}8(a==0){a=i.S}x++}}C 7d(i,o,s){G 6e(i,o.D.1t,o.D.T.4s,s)}C 6V(i,o,s,m){G 6e(i,o.D.1t,m,s)}C 6e(i,f,m,s){E t=0,x=0;1j(E a=s,l=i.S;a>=0;a--){x++;8(x==l){G x}E j=i.1O(a);8(j.2f(f)){t++;8(t==m){G x}}8(a==0){a=l}}}C 5z(a,o){G o.D.T.4s||a.14().17(0,o.D.L).1t(o.D.1t).S}C 32(i,o,s){E t=0,x=0;1j(E a=s,l=i.S-1;a<=l;a++){E j=i.1O(a);t+=(j.2f(\':L\'))?j[o.d[\'2v\']](I):0;8(t>o.4p){G x}x++;8(x==l+1){G x}8(a==l){a=-1}}}C 5L(i,o,s,l){E v=32(i,o,s);8(!o.1T){8(s+v>l){v=l-s}}G v}C 3U(i,o,s){G 6f(i,o.D.1t,o.D.T.4s,s,o.1T)}C 71(i,o,s,m){G 6f(i,o.D.1t,m+1,s,o.1T)-1}C 6f(i,f,m,s,c){E t=0,x=0;1j(E a=s,l=i.S-1;a<=l;a++){x++;8(x>=l){G x}E j=i.1O(a);8(j.2f(f)){t++;8(t==m){G x}}8(a==l){a=-1}}}C 3I(i,o){G i.17(0,o.D.L)}C 6X(i,o,n){G i.17(n,o.D.T.1Z+n)}C 6Y(i,o){G i.17(0,o.D.L)}C 73(i,o){G i.17(0,o.D.T.1Z)}C 74(i,o,n){G i.17(n,o.D.L+n)}C 4w(i,o,d){8(o.1R){8(!1p(d)){d=\'29\'}i.1W(C(){E j=$(1k),m=4h(j.X(o.d[\'1S\']),10);8(!Z(m)){m=0}j.1m(d,m)})}}C 1U(i,o,m){8(o.1R){E x=(1l(m))?m:K;8(!Z(m)){m=0}4w(i,o,\'7B\');i.1W(C(){E j=$(1k);j.X(o.d[\'1S\'],((x)?j.1m(\'7B\'):m+j.1m(\'29\')))})}}C 5r(i,o){8(o.2m){i.1W(C(){E j=$(1k),s=5n(j,[\'N\',\'1d\']);j.1m(\'7e\',s)})}}C 5s(o,b){E c=o.D.L,7C=o.D[o.d[\'N\']],6g=o[o.d[\'1d\']],7D=3T(6g);b.1W(C(){E a=$(1k),6h=7C-7E(a,o,\'92\');a[o.d[\'N\']](6h);8(7D){a[o.d[\'1d\']](4r(6h,6g))}})}C 4P(a,o){E b=a.68(),$i=a.14(),$v=3I($i,o),52=4H(4I($v,o,I),o,K);b.X(52);8(o.1R){E p=o.1i,r=p[o.d[1]];8(o.1A&&r<0){r=0}E c=$v.3i();c.X(o.d[\'1S\'],c.1m(\'29\')+r);a.X(o.d[\'3q\'],p[o.d[0]]);a.X(o.d[\'1n\'],p[o.d[3]])}a.X(o.d[\'N\'],52[o.d[\'N\']]+(2R($i,o,\'N\')*2));a.X(o.d[\'1d\'],6i($i,o,\'1d\'));G 52}C 4I(i,o,a){G[2R(i,o,\'N\',a),6i(i,o,\'1d\',a)]}C 6i(i,o,a,b){8(!1l(b)){b=K}8(Z(o[o.d[a]])&&b){G o[o.d[a]]}8(Z(o.D[o.d[a]])){G o.D[o.d[a]]}a=(a.6j().3Q(\'N\')>-1)?\'2v\':\'3n\';G 4k(i,o,a)}C 4k(i,o,b){E s=0;1j(E a=0,l=i.S;a<l;a++){E j=i.1O(a);E m=(j.2f(\':L\'))?j[o.d[b]](I):0;8(s<m){s=m}}G s}C 2R(i,o,b,c){8(!1l(c)){c=K}8(Z(o[o.d[b]])&&c){G o[o.d[b]]}8(Z(o.D[o.d[b]])){G o.D[o.d[b]]*i.S}E d=(b.6j().3Q(\'N\')>-1)?\'2v\':\'3n\',s=0;1j(E a=0,l=i.S;a<l;a++){E j=i.1O(a);s+=(j.2f(\':L\'))?j[o.d[d]](I):0}G s}C 5b(a,o,d){E b=a.2f(\':L\');8(b){a.4g()}E s=a.68()[o.d[d]]();8(b){a.4j()}G s}C 5c(o,a){G(Z(o[o.d[\'N\']]))?o[o.d[\'N\']]:a}C 6k(i,o,b){E s=K,v=K;1j(E a=0,l=i.S;a<l;a++){E j=i.1O(a);E c=(j.2f(\':L\'))?j[o.d[b]](I):0;8(s===K){s=c}O 8(s!=c){v=I}8(s==0){v=I}}G v}C 7E(i,o,d){G i[o.d[\'93\'+d]](I)-i[o.d[d.6j()]]()}C 4r(s,o){8(3T(o)){o=4h(o.17(0,-1),10);8(!Z(o)){G s}s*=o/2J}G s}C H(n,c,a,b,d){8(!1l(a)){a=I}8(!1l(b)){b=I}8(!1l(d)){d=K}8(a){n=c.3x.42+n}8(b){n=n+\'.\'+c.3x.7u}8(b&&d){n+=c.3S}G n}C 2z(n,c){G(1p(c.6a[n]))?c.6a[n]:n}C 4H(a,o,p){8(!1l(p)){p=I}E b=(o.1R&&p)?o.1i:[0,0,0,0];E c={};c[o.d[\'N\']]=a[0]+b[1]+b[3];c[o.d[\'1d\']]=a[1]+b[0]+b[2];G c}C 3d(c,d){E e=[];1j(E a=0,7F=c.S;a<7F;a++){1j(E b=0,7G=d.S;b<7G;b++){8(d[b].3Q(2X c[a])>-1&&1G(e[b])){e[b]=c[a];16}}}G e}C 6D(p){8(1G(p)){G[0,0,0,0]}8(Z(p)){G[p,p,p,p]}8(1p(p)){p=p.3P(\'94\').7H(\'\').3P(\'95\').7H(\'\').3P(\' \')}8(!2V(p)){G[0,0,0,0]}1j(E i=0;i<4;i++){p[i]=4h(p[i],10)}1B(p.S){Q 0:G[0,0,0,0];Q 1:G[p[0],p[0],p[0],p[0]];Q 2:G[p[0],p[1],p[0],p[1]];Q 3:G[p[0],p[1],p[2],p[1]];2y:G[p[0],p[1],p[2],p[3]]}}C 4G(a,o){E x=(Z(o[o.d[\'N\']]))?1I.2A(o[o.d[\'N\']]-2R(a,o,\'N\')):0;1B(o.1A){Q\'1n\':G[0,x];Q\'35\':G[x,0];Q\'5d\':2y:G[1I.2A(x/2),1I.4i(x/2)]}}C 6x(o){E a=[[\'N\',\'7I\',\'2v\',\'1d\',\'7J\',\'3n\',\'1n\',\'3q\',\'1S\',0,1,2,3],[\'1d\',\'7J\',\'3n\',\'N\',\'7I\',\'2v\',\'3q\',\'1n\',\'5o\',3,2,1,0]];E b=a[0].S,7K=(o.2b==\'35\'||o.2b==\'1n\')?0:1;E c={};1j(E d=0;d<b;d++){c[a[0][d]]=a[7K][d]}G c}C 4C(x,o,a,b){E v=x;8(1o(a)){v=a.1g(b,v)}O 8(1p(a)){E p=a.3P(\'+\'),m=a.3P(\'-\');8(m.S>p.S){E c=I,6l=m[0],2Z=m[1]}O{E c=K,6l=p[0],2Z=p[1]}1B(6l){Q\'96\':v=(x%2==1)?x-1:x;16;Q\'97\':v=(x%2==0)?x-1:x;16;2y:v=x;16}2Z=4h(2Z,10);8(Z(2Z)){8(c){2Z=-2Z}v+=2Z}}8(!Z(v)||v<1){v=1}G v}C 2x(x,o,a,b){G 6m(4C(x,o,a,b),o.D.T)}C 6m(v,i){8(Z(i.34)&&v<i.34){v=i.34}8(Z(i.1X)&&v>i.1X){v=i.1X}8(v<1){v=1}G v}C 5i(s){8(!2V(s)){s=[[s]]}8(!2V(s[0])){s=[s]}1j(E j=0,l=s.S;j<l;j++){8(1p(s[j][0])){s[j][0]=$(s[j][0])}8(!1l(s[j][1])){s[j][1]=I}8(!1l(s[j][2])){s[j][2]=I}8(!Z(s[j][3])){s[j][3]=0}}G s}C 6d(k){8(k==\'35\'){G 39}8(k==\'1n\'){G 37}8(k==\'4o\'){G 38}8(k==\'5U\'){G 40}G-1}C 5K(n,a,c){8(n){E v=a.1Q(H(\'4m\',c));$.1r.1v.25.6b(n,v)}}C 7q(n){E c=$.1r.1v.25.3F(n);G(c==\'\')?0:c}C 5n(a,b){E c={},53;1j(E p=0,l=b.S;p<l;p++){53=b[p];c[53]=a.X(53)}G c}C 6y(a,b,c,d){8(!1D(a.T)){a.T={}}8(!1D(a.3M)){a.3M={}}8(a.3m==0&&Z(d)){a.3m=d}8(1D(a.L)){a.T.34=a.L.34;a.T.1X=a.L.1X;a.L=K}O 8(1p(a.L)){8(a.L==\'1c\'){a.T.1c=I}O{a.T.2c=a.L}a.L=K}O 8(1o(a.L)){a.T.2c=a.L;a.L=K}8(!1p(a.1t)){a.1t=(c.1t(\':3r\').S>0)?\':L\':\'*\'}8(!a[b.d[\'N\']]){8(b.2m){18(I,\'7L a \'+b.d[\'N\']+\' 1j 4c D!\');a[b.d[\'N\']]=4k(c,b,\'2v\')}O{a[b.d[\'N\']]=(6k(c,b,\'2v\'))?\'1c\':c[b.d[\'2v\']](I)}}8(!a[b.d[\'1d\']]){a[b.d[\'1d\']]=(6k(c,b,\'3n\'))?\'1c\':c[b.d[\'3n\']](I)}a.3M.N=a.N;a.3M.1d=a.1d;G a}C 6C(a,b){8(a.D[a.d[\'N\']]==\'1c\'){a.D.T.1c=I}8(!a.D.T.1c){8(Z(a[a.d[\'N\']])){a.D.L=1I.4i(a[a.d[\'N\']]/a.D[a.d[\'N\']])}O{a.D.L=1I.4i(b/a.D[a.d[\'N\']]);a[a.d[\'N\']]=a.D.L*a.D[a.d[\'N\']];8(!a.D.T.2c){a.1A=K}}8(a.D.L==\'98\'||a.D.L<1){18(I,\'2p a 5N 27 4a L D: 7L 4D "1c".\');a.D.T.1c=I}}G a}C 6z(a,b,c){8(a==\'M\'){a=4k(c,b,\'2v\')}G a}C 6A(a,b,c){8(a==\'M\'){a=4k(c,b,\'3n\')}8(!a){a=b.D[b.d[\'1d\']]}G a}C 5g(o,a){E p=4G(3I(a,o),o);o.1i[o.d[1]]=p[1];o.1i[o.d[3]]=p[0];G o}C 5e(o,a,b){E c=6m(1I.2A(o[o.d[\'N\']]/o.D[o.d[\'N\']]),o.D.T);8(c>a.S){c=a.S}E d=1I.4i(o[o.d[\'N\']]/c);o.D.L=c;o.D[o.d[\'N\']]=d;o[o.d[\'N\']]=c*d;G o}C 3N(p){8(1p(p)){E i=(p.3Q(\'99\')>-1)?I:K,r=(p.3Q(\'3f\')>-1)?I:K}O{E i=r=K}G[i,r]}C 5Y(a){G(Z(a))?a:2H}C 6n(a){G(a===2H)}C 1G(a){G(6n(a)||2X a==\'7M\'||a===\'\'||a===\'7M\')}C 2V(a){G(a 2W 9a)}C 2u(a){G(a 2W 7N)}C 1D(a){G((a 2W 9b||2X a==\'2g\')&&!6n(a)&&!2u(a)&&!2V(a))}C Z(a){G((a 2W 48||2X a==\'27\')&&!9c(a))}C 1p(a){G((a 2W 9d||2X a==\'2N\')&&!1G(a)&&!3p(a)&&!51(a))}C 1o(a){G(a 2W 9e||2X a==\'C\')}C 1l(a){G(a 2W 9f||2X a==\'3c\'||3p(a)||51(a))}C 3p(a){G(a===I||a===\'I\')}C 51(a){G(a===K||a===\'K\')}C 3T(x){G(1p(x)&&x.17(-1)==\'%\')}C 2o(){G 6c 7y().2o()}C 2K(o,n){18(I,o+\' 2f 9g, 9h 1j 9i 9j 9k 9l. 9m \'+n+\' 9n.\')}C 18(d,m){8(1D(d)){E s=\' (\'+d.4l+\')\';d=d.18}O{E s=\'\'}8(!d){G K}8(1p(m)){m=\'1v\'+s+\': \'+m}O{m=[\'1v\'+s+\':\',m]}8(3l.6o&&3l.6o.7O){3l.6o.7O(m)}G K}$.1N($.2k,{\'9o\':C(t){E a=t*t;G t*(-a*t+4*a-6*t+4)},\'9p\':C(t){G t*(4*t*t-9*t+6)},\'9q\':C(t){E a=t*t;G t*(33*a*a-9r*a*t+9s*a-67*t+15)}})})(7N);',62,587,'|||||||opts|if||||||||||||||||||||||||||||||function|items|var|conf|return|cf_e|true|itms|false|visible|auto|width|else|total|case|trigger|length|visibleConf|scrl|prev|button|css|next|is_number||first|bind|tt0|children||break|slice|debug|anims|pagination|push|variable|height|progress|stopPropagation|call|mousewheel|padding|for|this|is_boolean|data|left|is_function|is_string|swipe|fn|wrp|filter|tmrs|carouFredSel|fade|_onafter|_moveitems|container|align|switch|duration|is_object|_s_paddingold|_s_paddingcur|is_undefined|play|Math|cover|_position|opacity|scroll|extend|eq|_a_wrapper|triggerHandler|usePadding|marginRight|circular|sz_resetMargin|fx|each|max|i_cur_l|old|isScrolling|i_old_l|uncover|unbind||cookie|isPaused|number|a_cfs|_cfs_origCssMargin|clbk|direction|adjust|isStopped|stopImmediatePropagation|is|object|while|i_new|w_siz|easing|nr|responsive|synchronise|getTime|Not|bar|i_new_l|a_cur|remove|is_jquery|outerWidth|avail_primary|cf_getItemsAdjust|default|cf_c|ceil|pR|_s_paddingnew|queu|preventDefault|a_itm|pauseOnHover|null|options|100|deprecated|timeoutDuration|startTime|string|removeClass|sc_startScroll|i_skp|ms_getTotalSize|a_old|a_lef|a_dur|is_array|instanceof|typeof|key|adj||opts_orig|gn_getVisibleItemsNext||min|right|addClass||||pause|perc|boolean|cf_sortParams|scrolling|resume|onAfter|i_old|last|crossfade|slideTo|window|start|outerHeight|_cfs_triggerEvent|is_true|top|hidden|sc_clearTimers|pre|post|timePassed|Carousel|events|queue|infinite|nv_enableNavi|i_siz|i_siz_vis|_a_paddingold|_a_paddingcur|get|onBefore|updatePageStatus|gi_getCurrentItems|gn_getItemIndex|anchorBuilder|event|sizesConf|bt_pauseOnHoverConfig|ns2|split|indexOf|go_getObject|serialNumber|is_percentage|gn_getVisibleItemsNextFilter|orgCSS|position|zIndex|none|sc_stopScroll||dur2|prefix|appendTo|sc_setScroll|sc_fireCallbacks|currentPage|before|Number||of|document|the|touchwipe|wN|onTouch|hide|parseInt|floor|show|ms_getTrueLargestSize|selector|currentPosition|destroy|up|maxDimension|primarySizePercentage|ms_getPercentage|org|onTimeoutStart|onTimeoutPause|onTimeoutEnd|sz_storeMargin|stopped|updater|minimum|configuration|gn_getVisibleItemsPrev|cf_getAdjust|to|onEnd|clone|cf_getAlignPadding|cf_mapWrapperSizes|ms_getSizes|a_wsz|a_new|a_cfs_vis|end|updateSizes|eval|sz_setSizes|pgs|deviation|nv_showNavi|mouseenter|mouseleave|pauseOnEvent|keys|wipe|di|go_getNaviObject||is_false|sz|prop|element|starting_position|_cfs_isCarousel|_cfs_init||go_getPrevNextObject|defaults|ms_getParentSize|ms_getMaxDimension|center|in_getResponsiveValues|bottom|in_getAlignPadding|go_complementPrevNextObject|cf_getSynchArr|onPauseStart|onPausePause|onPauseEnd|pauseDuration|in_mapCss|marginBottom|newPosition|_cfs_origCss|sz_storeSizes|sz_setResponsiveSizes|_cfs_unbind_events|stop|finish|interval|type|conditions|gn_getVisibleOrg|backward|sc_hideHiddenItems|a_lef_vis|sc_getDuration|_a_paddingnew|not|sc_showHiddenItems|sc_mapCallbackArguments|sc_afterScroll|sc_fireQueue|cf_setCookie|gn_getVisibleItemsNextTestCircular|slideToPage|valid|linkAnchors|value|_cfs_bind_buttons|click|_cfs_unbind_buttons|scrolled|down|onMouse|swP|swN|bt_mousesheelNumber|delay||_windowWidth|_windowHeight|nh|pauseOnResize|ns3|wrapper||parent|continue|classnames|set|new|cf_getKeyCode|gn_getItemsPrevFilter|gn_getItemsNextFilter|seco|nw|ms_getLargestSize|toLowerCase|ms_hasVariableSizes|sta|cf_getItemAdjustMinMax|is_null|console|caroufredsel|No|go_getItemsObject|go_getScrollObject|go_getAutoObject|go_getPaginationObject|go_getSwipeObject|go_getMousewheelObject|cf_getDimensions|in_complementItems|in_complementPrimarySize|in_complementSecondarySize|upDateOnWindowResize|in_complementVisibleItems|cf_getPadding|500|go_complementAutoObject|go_complementPaginationObject|go_complementSwipeObject|go_complementMousewheelObject|_cfs_build|textAlign|float|marginTop|marginLeft|absolute|_cfs_bind_events|paused|enough|needed|page|slide_|gn_getScrollItemsPrevFilter|Scrolling|gi_getOldItemsPrev|gi_getNewItemsPrev|directscroll|concat|gn_getScrollItemsNextFilter|forward|gi_getOldItemsNext|gi_getNewItemsNext|jumpToStart|after|append|removeItem|round|hash|index|selected|gn_getVisibleItemsPrevFilter|_cfs_origCssSizes|Item|keyup|keyCode|plugin|scN|cursor|The|option|mcN|configs|classname|cf_getCookie|random|itm|onCreate|namespace|pageAnchorBuilder|span|progressbarUpdater|Date|_cfs_isHidden|triggerOnTouchEnd|_cfs_tempCssMargin|newS|secp|ms_getPaddingBorderMargin|l1|l2|join|innerWidth|innerHeight|dx|Set|undefined|jQuery|log|found|caroufredsel_cookie_|relative|fixed|overflow|setInterval|setTimeout|or|Callback|returned|Page|resumed|currently|slide_prev|prependTo|slide_next|prevPage|nextPage|prepend|carousel|insertItem|add|detach|currentVisible|body|find|Preventing|non|sliding|replaceWith|widths|heights|automatically|touchSwipe|min_move_x|min_move_y|preventDefaultEvents|wipeUp|wipeDown|wipeLeft|wipeRight|ontouchstart|in|swipeUp|swipeDown|swipeLeft|swipeRight|move|resize|wrap|class|unshift|location|swing|cfs|div|caroufredsel_wrapper|href|charAt|setTime|1000|expires|toGMTString|path|orgDuration|animate|complete|shift|clearTimeout|clearInterval|skipped|Hiding|navigation|disabled|2500|Width|outer|px|em|even|odd|Infinity|immediate|Array|Object|isNaN|String|Function|Boolean|DEPRECATED|support|it|will|be|removed|Use|instead|quadratic|cubic|elastic|106|126'.split('|'),0,{}))
    },

    raty: function () {
        (function($) {
            'use strict';

            var methods = {
                init: function(options) {
                    return this.each(function() {
                        this.self = $(this);

                        methods.destroy.call(this.self);

                        this.opt = $.extend(true, {}, $.fn.raty.defaults, options);

                        methods._adjustCallback.call(this);
                        methods._adjustNumber.call(this);
                        methods._adjustHints.call(this);

                        this.opt.score = methods._adjustedScore.call(this, this.opt.score);

                        if (this.opt.starType !== 'img') {
                            methods._adjustStarType.call(this);
                        }

                        methods._adjustPath.call(this);
                        methods._createStars.call(this);

                        if (this.opt.cancel) {
                            methods._createCancel.call(this);
                        }

                        if (this.opt.precision) {
                            methods._adjustPrecision.call(this);
                        }

                        methods._createScore.call(this);
                        methods._apply.call(this, this.opt.score);
                        methods._setTitle.call(this, this.opt.score);
                        methods._target.call(this, this.opt.score);

                        if (this.opt.readOnly) {
                            methods._lock.call(this);
                        } else {
                            this.style.cursor = 'pointer';

                            methods._binds.call(this);
                        }
                    });
                },

                _adjustCallback: function() {
                    var options = ['number', 'readOnly', 'score', 'scoreName', 'target', 'path'];

                    for (var i = 0; i < options.length; i++) {
                        if (typeof this.opt[options[i]] === 'function') {
                            this.opt[options[i]] = this.opt[options[i]].call(this);
                        }
                    }
                },

                _adjustedScore: function(score) {
                    if (!score) {
                        return score;
                    }

                    return methods._between(score, 0, this.opt.number);
                },

                _adjustHints: function() {
                    if (!this.opt.hints) {
                        this.opt.hints = [];
                    }

                    if (!this.opt.halfShow && !this.opt.half) {
                        return;
                    }

                    var steps = this.opt.precision ? 10 : 2;

                    for (var i = 0; i < this.opt.number; i++) {
                        var group = this.opt.hints[i];

                        if (Object.prototype.toString.call(group) !== '[object Array]') {
                            group = [group];
                        }

                        this.opt.hints[i] = [];

                        for (var j = 0; j < steps; j++) {
                            var
                                hint = group[j],
                                last = group[group.length - 1];

                            if (last === undefined) {
                                last = null;
                            }

                            this.opt.hints[i][j] = hint === undefined ? last : hint;
                        }
                    }
                },

                _adjustNumber: function() {
                    this.opt.number = methods._between(this.opt.number, 1, this.opt.numberMax);
                },

                _adjustPath: function() {
                    this.opt.path = this.opt.path || '';

                    if (this.opt.path && this.opt.path.charAt(this.opt.path.length - 1) !== '/') {
                        this.opt.path += '/';
                    }
                },

                _adjustPrecision: function() {
                    this.opt.half = true;
                },

                _adjustStarType: function() {
                    var replaces = ['cancelOff', 'cancelOn', 'starHalf', 'starOff', 'starOn'];

                    this.opt.path = '';

                    for (var i = 0; i < replaces.length; i++) {
                        this.opt[replaces[i]] = this.opt[replaces[i]].replace('.', '-');
                    }
                },

                _apply: function(score) {
                    methods._fill.call(this, score);

                    if (score) {
                        if (score > 0) {
                            this.score.val(score);
                        }

                        methods._roundStars.call(this, score);
                    }
                },

                _between: function(value, min, max) {
                    return Math.min(Math.max(parseFloat(value), min), max);
                },

                _binds: function() {
                    if (this.cancel) {
                        methods._bindOverCancel.call(this);
                        methods._bindClickCancel.call(this);
                        methods._bindOutCancel.call(this);
                    }

                    methods._bindOver.call(this);
                    methods._bindClick.call(this);
                    methods._bindOut.call(this);
                },

                _bindClick: function() {
                    var that = this;

                    that.stars.on('click.raty', function(evt) {
                        var
                            execute = true,
                            score   = (that.opt.half || that.opt.precision) ? that.self.data('score') : (this.alt || $(this).data('alt'));

                        if (that.opt.click) {
                            execute = that.opt.click.call(that, +score, evt);
                        }

                        if (execute || execute === undefined) {
                            if (that.opt.half && !that.opt.precision) {
                                score = methods._roundHalfScore.call(that, score);
                            }

                            methods._apply.call(that, score);
                        }
                    });
                },

                _bindClickCancel: function() {
                    var that = this;

                    that.cancel.on('click.raty', function(evt) {
                        that.score.removeAttr('value');

                        if (that.opt.click) {
                            that.opt.click.call(that, null, evt);
                        }
                    });
                },

                _bindOut: function() {
                    var that = this;

                    that.self.on('mouseleave.raty', function(evt) {
                        var score = +that.score.val() || undefined;

                        methods._apply.call(that, score);
                        methods._target.call(that, score, evt);
                        methods._resetTitle.call(that);

                        if (that.opt.mouseout) {
                            that.opt.mouseout.call(that, score, evt);
                        }
                    });
                },

                _bindOutCancel: function() {
                    var that = this;

                    that.cancel.on('mouseleave.raty', function(evt) {
                        var icon = that.opt.cancelOff;

                        if (that.opt.starType !== 'img') {
                            icon = that.opt.cancelClass + ' ' + icon;
                        }

                        methods._setIcon.call(that, this, icon);

                        if (that.opt.mouseout) {
                            var score = +that.score.val() || undefined;

                            that.opt.mouseout.call(that, score, evt);
                        }
                    });
                },

                _bindOver: function() {
                    var that   = this,
                        action = that.opt.half ? 'mousemove.raty' : 'mouseover.raty';

                    that.stars.on(action, function(evt) {
                        var score = methods._getScoreByPosition.call(that, evt, this);

                        methods._fill.call(that, score);

                        if (that.opt.half) {
                            methods._roundStars.call(that, score, evt);
                            methods._setTitle.call(that, score, evt);

                            that.self.data('score', score);
                        }

                        methods._target.call(that, score, evt);

                        if (that.opt.mouseover) {
                            that.opt.mouseover.call(that, score, evt);
                        }
                    });
                },

                _bindOverCancel: function() {
                    var that = this;

                    that.cancel.on('mouseover.raty', function(evt) {
                        var
                            starOff = that.opt.path + that.opt.starOff,
                            icon    = that.opt.cancelOn;

                        if (that.opt.starType === 'img') {
                            that.stars.attr('src', starOff);
                        } else {
                            icon = that.opt.cancelClass + ' ' + icon;

                            that.stars.attr('class', starOff);
                        }

                        methods._setIcon.call(that, this, icon);
                        methods._target.call(that, null, evt);

                        if (that.opt.mouseover) {
                            that.opt.mouseover.call(that, null);
                        }
                    });
                },

                _buildScoreField: function() {
                    return $('<input />', { name: this.opt.scoreName, type: 'hidden' }).appendTo(this);
                },

                _createCancel: function() {
                    var icon   = this.opt.path + this.opt.cancelOff,
                        cancel = $('<' + this.opt.starType + ' />', { title: this.opt.cancelHint, 'class': this.opt.cancelClass });

                    if (this.opt.starType === 'img') {
                        cancel.attr({ src: icon, alt: 'x' });
                    } else {
                        // TODO: use $.data
                        cancel.attr('data-alt', 'x').addClass(icon);
                    }

                    if (this.opt.cancelPlace === 'left') {
                        this.self.prepend('&#160;').prepend(cancel);
                    } else {
                        this.self.append('&#160;').append(cancel);
                    }

                    this.cancel = cancel;
                },

                _createScore: function() {
                    var score = $(this.opt.targetScore);

                    this.score = score.length ? score : methods._buildScoreField.call(this);
                },

                _createStars: function() {
                    for (var i = 1; i <= this.opt.number; i++) {
                        var
                            name  = methods._nameForIndex.call(this, i),
                            attrs = { alt: i, src: this.opt.path + this.opt[name] };

                        if (this.opt.starType !== 'img') {
                            attrs = { 'data-alt': i, 'class': attrs.src }; // TODO: use $.data.
                        }

                        attrs.title = methods._getHint.call(this, i);

                        $('<' + this.opt.starType + ' />', attrs).appendTo(this);

                        if (this.opt.space) {
                            this.self.append(i < this.opt.number ? '&#160;' : '');
                        }
                    }

                    this.stars = this.self.children(this.opt.starType);
                },

                _error: function(message) {
                    $(this).text(message);

                    $.error(message);
                },

                _fill: function(score) {
                    var hash = 0;

                    for (var i = 1; i <= this.stars.length; i++) {
                        var
                            icon,
                            star   = this.stars[i - 1],
                            turnOn = methods._turnOn.call(this, i, score);

                        if (this.opt.iconRange && this.opt.iconRange.length > hash) {
                            var irange = this.opt.iconRange[hash];

                            icon = methods._getRangeIcon.call(this, irange, turnOn);

                            if (i <= irange.range) {
                                methods._setIcon.call(this, star, icon);
                            }

                            if (i === irange.range) {
                                hash++;
                            }
                        } else {
                            icon = this.opt[turnOn ? 'starOn' : 'starOff'];

                            methods._setIcon.call(this, star, icon);
                        }
                    }
                },

                _getFirstDecimal: function(number) {
                    var
                        decimal = number.toString().split('.')[1],
                        result  = 0;

                    if (decimal) {
                        result = parseInt(decimal.charAt(0), 10);

                        if (decimal.slice(1, 5) === '9999') {
                            result++;
                        }
                    }

                    return result;
                },

                _getRangeIcon: function(irange, turnOn) {
                    return turnOn ? irange.on || this.opt.starOn : irange.off || this.opt.starOff;
                },

                _getScoreByPosition: function(evt, icon) {
                    var score = parseInt(icon.alt || icon.getAttribute('data-alt'), 10);

                    if (this.opt.half) {
                        var
                            size    = methods._getWidth.call(this),
                            percent = parseFloat((evt.pageX - $(icon).offset().left) / size);

                        score = score - 1 + percent;
                    }

                    return score;
                },

                _getHint: function(score, evt) {
                    if (score !== 0 && !score) {
                        return this.opt.noRatedMsg;
                    }

                    var
                        decimal = methods._getFirstDecimal.call(this, score),
                        integer = Math.ceil(score),
                        group   = this.opt.hints[(integer || 1) - 1],
                        hint    = group,
                        set     = !evt || this.move;

                    if (this.opt.precision) {
                        if (set) {
                            decimal = decimal === 0 ? 9 : decimal - 1;
                        }

                        hint = group[decimal];
                    } else if (this.opt.halfShow || this.opt.half) {
                        decimal = set && decimal === 0 ? 1 : decimal > 5 ? 1 : 0;

                        hint = group[decimal];
                    }

                    return hint === '' ? '' : hint || score;
                },

                _getWidth: function() {
                    var width = this.stars[0].width || parseFloat(this.stars.eq(0).css('font-size'));

                    if (!width) {
                        methods._error.call(this, 'Could not get the icon width!');
                    }

                    return width;
                },

                _lock: function() {
                    var hint = methods._getHint.call(this, this.score.val());

                    this.style.cursor = '';
                    this.title        = hint;

                    this.score.prop('readonly', true);
                    this.stars.prop('title', hint);

                    if (this.cancel) {
                        this.cancel.hide();
                    }

                    this.self.data('readonly', true);
                },

                _nameForIndex: function(i) {
                    return this.opt.score && this.opt.score >= i ? 'starOn' : 'starOff';
                },

                _resetTitle: function(star) {
                    for (var i = 0; i < this.opt.number; i++) {
                        this.stars[i].title = methods._getHint.call(this, i + 1);
                    }
                },

                _roundHalfScore: function(score) {
                    var integer = parseInt(score, 10),
                        decimal = methods._getFirstDecimal.call(this, score);

                    if (decimal !== 0) {
                        decimal = decimal > 5 ? 1 : 0.5;
                    }

                    return integer + decimal;
                },

                _roundStars: function(score, evt) {
                    var
                        decimal = (score % 1).toFixed(2),
                        name    ;

                    if (evt || this.move) {
                        name = decimal > 0.5 ? 'starOn' : 'starHalf';
                    } else if (decimal > this.opt.round.down) {               // Up:   [x.76 .. x.99]
                        name = 'starOn';

                        if (this.opt.halfShow && decimal < this.opt.round.up) { // Half: [x.26 .. x.75]
                            name = 'starHalf';
                        } else if (decimal < this.opt.round.full) {             // Down: [x.00 .. x.5]
                            name = 'starOff';
                        }
                    }

                    if (name) {
                        var
                            icon = this.opt[name],
                            star = this.stars[Math.ceil(score) - 1];

                        methods._setIcon.call(this, star, icon);
                    }                                                         // Full down: [x.00 .. x.25]
                },

                _setIcon: function(star, icon) {
                    star[this.opt.starType === 'img' ? 'src' : 'className'] = this.opt.path + icon;
                },

                _setTarget: function(target, score) {
                    if (score) {
                        score = this.opt.targetFormat.toString().replace('{score}', score);
                    }

                    if (target.is(':input')) {
                        target.val(score);
                    } else {
                        target.html(score);
                    }
                },

                _setTitle: function(score, evt) {
                    if (score) {
                        var
                            integer = parseInt(Math.ceil(score), 10),
                            star    = this.stars[integer - 1];

                        star.title = methods._getHint.call(this, score, evt);
                    }
                },

                _target: function(score, evt) {
                    if (this.opt.target) {
                        var target = $(this.opt.target);

                        if (!target.length) {
                            methods._error.call(this, 'Target selector invalid or missing!');
                        }

                        var mouseover = evt && evt.type === 'mouseover';

                        if (score === undefined) {
                            score = this.opt.targetText;
                        } else if (score === null) {
                            score = mouseover ? this.opt.cancelHint : this.opt.targetText;
                        } else {
                            if (this.opt.targetType === 'hint') {
                                score = methods._getHint.call(this, score, evt);
                            } else if (this.opt.precision) {
                                score = parseFloat(score).toFixed(1);
                            }

                            var mousemove = evt && evt.type === 'mousemove';

                            if (!mouseover && !mousemove && !this.opt.targetKeep) {
                                score = this.opt.targetText;
                            }
                        }

                        methods._setTarget.call(this, target, score);
                    }
                },

                _turnOn: function(i, score) {
                    return this.opt.single ? (i === score) : (i <= score);
                },

                _unlock: function() {
                    this.style.cursor = 'pointer';
                    this.removeAttribute('title');

                    this.score.removeAttr('readonly');

                    this.self.data('readonly', false);

                    for (var i = 0; i < this.opt.number; i++) {
                        this.stars[i].title = methods._getHint.call(this, i + 1);
                    }

                    if (this.cancel) {
                        this.cancel.css('display', '');
                    }
                },

                cancel: function(click) {
                    return this.each(function() {
                        var self = $(this);

                        if (self.data('readonly') !== true) {
                            methods[click ? 'click' : 'score'].call(self, null);

                            this.score.removeAttr('value');
                        }
                    });
                },

                click: function(score) {
                    return this.each(function() {
                        if ($(this).data('readonly') !== true) {
                            score = methods._adjustedScore.call(this, score);

                            methods._apply.call(this, score);

                            if (this.opt.click) {
                                this.opt.click.call(this, score, $.Event('click'));
                            }

                            methods._target.call(this, score);
                        }
                    });
                },

                destroy: function() {
                    return this.each(function() {
                        var self = $(this),
                            raw  = self.data('raw');

                        if (raw) {
                            self.off('.raty').empty().css({ cursor: raw.style.cursor }).removeData('readonly');
                        } else {
                            self.data('raw', self.clone()[0]);
                        }
                    });
                },

                getScore: function() {
                    var score = [],
                        value ;

                    this.each(function() {
                        value = this.score.val();

                        score.push(value ? +value : undefined);
                    });

                    return (score.length > 1) ? score : score[0];
                },

                move: function(score) {
                    return this.each(function() {
                        var
                            integer  = parseInt(score, 10),
                            decimal  = methods._getFirstDecimal.call(this, score);

                        if (integer >= this.opt.number) {
                            integer = this.opt.number - 1;
                            decimal = 10;
                        }

                        var
                            width   = methods._getWidth.call(this),
                            steps   = width / 10,
                            star    = $(this.stars[integer]),
                            percent = star.offset().left + steps * decimal,
                            evt     = $.Event('mousemove', { pageX: percent });

                        this.move = true;

                        star.trigger(evt);

                        this.move = false;
                    });
                },

                readOnly: function(readonly) {
                    return this.each(function() {
                        var self = $(this);

                        if (self.data('readonly') !== readonly) {
                            if (readonly) {
                                self.off('.raty').children(this.opt.starType).off('.raty');

                                methods._lock.call(this);
                            } else {
                                methods._binds.call(this);
                                methods._unlock.call(this);
                            }

                            self.data('readonly', readonly);
                        }
                    });
                },

                reload: function() {
                    return methods.set.call(this, {});
                },

                score: function() {
                    var self = $(this);

                    return arguments.length ? methods.setScore.apply(self, arguments) : methods.getScore.call(self);
                },

                set: function(options) {
                    return this.each(function() {
                        $(this).raty($.extend({}, this.opt, options));
                    });
                },

                setScore: function(score) {
                    return this.each(function() {
                        if ($(this).data('readonly') !== true) {
                            score = methods._adjustedScore.call(this, score);

                            methods._apply.call(this, score);
                            methods._target.call(this, score);
                        }
                    });
                }
            };

            $.fn.raty = function(method) {
                if (methods[method]) {
                    return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
                } else if (typeof method === 'object' || !method) {
                    return methods.init.apply(this, arguments);
                } else {
                    $.error('Method ' + method + ' does not exist!');
                }
            };

            $.fn.raty.defaults = {
                cancel       : false,
                cancelClass  : 'raty-cancel',
                cancelHint   : 'Cancel this rating!',
                cancelOff    : document.location.origin+'/theme/frontend/default/images/plugins/rate/cancel-off.png',
                cancelOn     : document.location.origin+'/theme/frontend/default/images/plugins/rate/cancel-on.png',
                cancelPlace  : 'left',
                click        : undefined,
                half         : false,
                halfShow     : true,
                hints        : ['Dở tệ', 'Không hay', 'Tạm được', 'Hay', 'Quá hay'],
                iconRange    : undefined,
                mouseout     : undefined,
                mouseover    : undefined,
                noRatedMsg   : 'Not rated yet!',
                number       : 5,
                numberMax    : 20,
                path         : undefined,
                precision    : false,
                readOnly     : false,
                round        : { down: 0.25, full: 0.6, up: 0.76 },
                score        : undefined,
                scoreName    : 'score',
                single       : false,
                space        : true,
                starHalf     : document.location.origin+'/theme/frontend/default/images/plugins/rate/star-half.png',
                starOff      : document.location.origin+'/theme/frontend/default/images/plugins/rate/star-off.png',
                starOn       : document.location.origin+'/theme/frontend/default/images/plugins/rate/star-on.png',
                starType     : 'img',
                target       : undefined,
                targetFormat : '{score}',
                targetKeep   : false,
                targetScore  : undefined,
                targetText   : '',
                targetType   : 'hint'
            };

        })(jQuery);
    },

    cookie: function () {
        (function (factory) {
            if (typeof define === 'function' && define.amd) {
                // AMD. Register as anonymous module.
                define(['jquery'], factory);
            } else {
                // Browser globals.
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
    }
};