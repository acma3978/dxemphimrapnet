/*
 * TTC+ Application
 * @author:     OliverCriss80 <duongtuanx436dev@gmail.com>
 * @version:    1.0
 * @release:    4.10.2016 - TronBoHD.com Development
 */
var Plugins = {};

Plugins.init = function() {
  Plugins.Analytics.init();
  Plugins.Core.init();

};

Plugins.Analytics = {
  init: function() {
    Plugins.Analytics.PlFacebook('465637560220672');
    Plugins.Analytics.PlGA('UA-55032799-1');
  },
  PlFacebook: function(ID) {
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s);
      js.id = id;
      js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1&amp;appId=" + ID;
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  },
  PlGA: function(ID) {

    var _gaq = _gaq || [];

    "_gaq.push(['_setAccount'," + ID + '])';
    _gaq.push(['_trackPageview']);
    (function() {
      var ga = document.createElement('script');
      ga.type = 'text/javascript';
      ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0];
      s.parentNode.insertBefore(ga, s);
    })();
  }
};

Plugins.Core = {
  init: function() {

    Plugins.Core.c2xpbXNjcm9sbA();
    Plugins.Core.dG9hc3Ry();

    Plugins.Core.UmVnaXN0ZXJUb3VjaEFuZGNhcm91ZnJlZHNlbA();
    Plugins.Core.bG9hZGNhcm91ZnJlZHNlbA();
    Plugins.Core.cmF0eQ();
    Plugins.Core.bmFub2Jhcg();

    Plugins.Core.FZD5zmLO();
    Plugins.Core.Y29va2ll();


  },
  c2xpbXNjcm9sbA: function() {
    (function(e) {
      e.fn.extend({
        slimScroll: function(f) {
          var a = e.extend({
            width: "auto",
            height: "250px",
            size: "7px",
            color: "#000",
            position: "right",
            distance: "1px",
            start: "top",
            opacity: .4,
            alwaysVisible: !1,
            disableFadeOut: !1,
            railVisible: !1,
            railColor: "#333",
            railOpacity: .2,
            railDraggable: !0,
            railClass: "slimScrollRail",
            barClass: "slimScrollBar",
            wrapperClass: "slimScrollDiv",
            allowPageScroll: !1,
            wheelStep: 20,
            touchScrollStep: 200,
            borderRadius: "7px",
            railBorderRadius: "7px"
          }, f);
          this.each(function() {
            function v(d) {
              if (r) {
                d = d || window.event;
                var c = 0;
                d.wheelDelta && (c = -d.wheelDelta / 120);
                d.detail && (c = d.detail / 3);
                e(d.target || d.srcTarget || d.srcElement).closest("." + a.wrapperClass).is(b.parent()) && n(c, !0);
                d.preventDefault && !k && d.preventDefault();
                k || (d.returnValue = !1)
              }
            }

            function n(d, g, e) {
              k = !1;
              var f = b.outerHeight() - c.outerHeight();
              g && (g = parseInt(c.css("top")) + d * parseInt(a.wheelStep) / 100 * c.outerHeight(), g = Math.min(Math.max(g, 0), f), g = 0 < d ? Math.ceil(g) : Math.floor(g), c.css({
                top: g + "px"
              }));
              l = parseInt(c.css("top")) / (b.outerHeight() - c.outerHeight());
              g = l * (b[0].scrollHeight - b.outerHeight());
              e && (g = d, d = g / b[0].scrollHeight * b.outerHeight(), d = Math.min(Math.max(d, 0), f), c.css({
                top: d + "px"
              }));
              b.scrollTop(g);
              b.trigger("slimscrolling", ~~g);
              w();
              p()
            }

            function x() {
              u = Math.max(b.outerHeight() / b[0].scrollHeight * b.outerHeight(), 30);
              c.css({
                height: u + "px"
              });
              var a = u == b.outerHeight() ? "none" : "block";
              c.css({
                display: a
              })
            }

            function w() {
              x();
              clearTimeout(B);
              l == ~~l ? (k = a.allowPageScroll, C != l && b.trigger("slimscroll", 0 == ~~l ? "top" : "bottom")) : k = !1;
              C = l;
              u >= b.outerHeight() ? k = !0 : (c.stop(!0, !0).fadeIn("fast"), a.railVisible && m.stop(!0, !0).fadeIn("fast"))
            }

            function p() {
              a.alwaysVisible || (B = setTimeout(function() {
                a.disableFadeOut && r || y || z || (c.fadeOut("slow"), m.fadeOut("slow"))
              }, 1E3))
            }
            var r, y, z, B, A, u, l, C, k = !1,
                b = e(this);
            if (b.parent().hasClass(a.wrapperClass)) {
              var q = b.scrollTop(),
                  c = b.siblings("." + a.barClass),
                  m = b.siblings("." + a.railClass);
              x();
              if (e.isPlainObject(f)) {
                if ("height" in f && "auto" == f.height) {
                  b.parent().css("height", "auto");
                  b.css("height", "auto");
                  var h = b.parent().parent().height();
                  b.parent().css("height", h);
                  b.css("height", h)
                } else "height" in f && (h = f.height, b.parent().css("height", h), b.css("height", h));
                if ("scrollTo" in f) q = parseInt(a.scrollTo);
                else if ("scrollBy" in f) q += parseInt(a.scrollBy);
                else if ("destroy" in f) {
                  c.remove();
                  m.remove();
                  b.unwrap();
                  return
                }
                n(q, !1, !0)
              }
            } else if (!(e.isPlainObject(f) && "destroy" in f)) {
              a.height = "auto" == a.height ? b.parent().height() : a.height;
              q = e("<div></div>").addClass(a.wrapperClass).css({
                position: "relative",
                overflow: "hidden",
                width: a.width,
                height: a.height
              });
              b.css({
                overflow: "hidden",
                width: a.width,
                height: a.height
              });
              var m = e("<div></div>").addClass(a.railClass).css({
                    width: a.size,
                    height: "100%",
                    position: "absolute",
                    top: 0,
                    display: a.alwaysVisible && a.railVisible ? "block" : "none",
                    "border-radius": a.railBorderRadius,
                    background: a.railColor,
                    opacity: a.railOpacity,
                    zIndex: 90
                  }),
                  c = e("<div></div>").addClass(a.barClass).css({
                    background: a.color,
                    width: a.size,
                    position: "absolute",
                    top: 0,
                    opacity: a.opacity,
                    display: a.alwaysVisible ? "block" : "none",
                    "border-radius": a.borderRadius,
                    BorderRadius: a.borderRadius,
                    MozBorderRadius: a.borderRadius,
                    WebkitBorderRadius: a.borderRadius,
                    zIndex: 99
                  }),
                  h = "right" == a.position ? {
                    right: a.distance
                  } : {
                    left: a.distance
                  };
              m.css(h);
              c.css(h);
              b.wrap(q);
              b.parent().append(c);
              b.parent().append(m);
              a.railDraggable && c.bind("mousedown", function(a) {
                var b = e(document);
                z = !0;
                t = parseFloat(c.css("top"));
                pageY = a.pageY;
                b.bind("mousemove.slimscroll", function(a) {
                  currTop = t + a.pageY - pageY;
                  c.css("top", currTop);
                  n(0, c.position().top, !1)
                });
                b.bind("mouseup.slimscroll", function(a) {
                  z = !1;
                  p();
                  b.unbind(".slimscroll")
                });
                return !1
              }).bind("selectstart.slimscroll", function(a) {
                a.stopPropagation();
                a.preventDefault();
                return !1
              });
              m.hover(function() {
                w()
              }, function() {
                p()
              });
              c.hover(function() {
                y = !0
              }, function() {
                y = !1
              });
              b.hover(function() {
                r = !0;
                w();
                p()
              }, function() {
                r = !1;
                p()
              });
              b.bind("touchstart", function(a, b) {
                a.originalEvent.touches.length && (A = a.originalEvent.touches[0].pageY)
              });
              b.bind("touchmove", function(b) {
                k || b.originalEvent.preventDefault();
                b.originalEvent.touches.length && (n((A - b.originalEvent.touches[0].pageY) / a.touchScrollStep, !0), A = b.originalEvent.touches[0].pageY)
              });
              x();
              "bottom" === a.start ? (c.css({
                top: b.outerHeight() - c.outerHeight()
              }), n(0, !0)) : "top" !== a.start && (n(e(a.start).position().top, null, !0), a.alwaysVisible || c.hide());
              window.addEventListener ? (this.addEventListener("DOMMouseScroll", v, !1), this.addEventListener("mousewheel", v, !1)) : document.attachEvent("onmousewheel", v)
            }
          });
          return this
        }
      });
      e.fn.extend({
        slimscroll: e.fn.slimScroll
      })
    })(jQuery);

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
  },
  bmFub2Jhcg: function () {

    var iDiv = document.createElement('div');
    iDiv.id = 'process';


    var innerDiv = document.createElement('div');
    innerDiv.className = 'bar';


    iDiv.appendChild(innerDiv);


    document.getElementsByTagName('body')[0].appendChild(iDiv);


    iDiv.style.position = "fixed";

    var count = 0;
    var counting = setInterval(function(){
      if(count < 101) {

        innerDiv.style.width = count + "%";

        count++
      } else {
        clearInterval(counting);
        innerDiv.remove();
      }
    },5);

  },
  dG9hc3Ry: function() {
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

  UmVnaXN0ZXJUb3VjaEFuZGNhcm91ZnJlZHNlbA: function() {
    "function" !== typeof Object.create && (Object.create = function(f) {
      function g() {}
      g.prototype = f;
      return new g
    });
    (function(f, g, k) {
      var l = {
        init: function(a, b) {
          this.$elem = f(b);
          this.options = f.extend({}, f.fn.owlCarousel.options, this.$elem.data(), a);
          this.userOptions = a;
          this.loadContent()
        },
        loadContent: function() {
          function a(a) {
            var d, e = "";
            if ("function" === typeof b.options.jsonSuccess) b.options.jsonSuccess.apply(this, [a]);
            else {
              for (d in a.owl) a.owl.hasOwnProperty(d) && (e += a.owl[d].item);
              b.$elem.html(e)
            }
            b.logIn()
          }
          var b = this,
              e;
          "function" === typeof b.options.beforeInit && b.options.beforeInit.apply(this, [b.$elem]);
          "string" === typeof b.options.jsonPath ? (e = b.options.jsonPath, f.getJSON(e, a)) : b.logIn()
        },
        logIn: function() {
          this.$elem.data("owl-originalStyles", this.$elem.attr("style"));
          this.$elem.data("owl-originalClasses", this.$elem.attr("class"));
          this.$elem.css({
            opacity: 0
          });
          this.orignalItems = this.options.items;
          this.checkBrowser();
          this.wrapperWidth = 0;
          this.checkVisible = null;
          this.setVars()
        },
        setVars: function() {
          if (0 === this.$elem.children().length) return !1;
          this.baseClass();
          this.eventTypes();
          this.$userItems = this.$elem.children();
          this.itemsAmount = this.$userItems.length;
          this.wrapItems();
          this.$owlItems = this.$elem.find(".owl-item");
          this.$owlWrapper = this.$elem.find(".owl-wrapper");
          this.playDirection = "next";
          this.prevItem = 0;
          this.prevArr = [0];
          this.currentItem = 0;
          this.customEvents();
          this.onStartup()
        },
        onStartup: function() {
          this.updateItems();
          this.calculateAll();
          this.buildControls();
          this.updateControls();
          this.response();
          this.moveEvents();
          this.stopOnHover();
          this.owlStatus();
          !1 !== this.options.transitionStyle && this.transitionTypes(this.options.transitionStyle);
          !0 === this.options.autoPlay && (this.options.autoPlay = 5E3);
          this.play();
          this.$elem.find(".owl-wrapper").css("display", "block");
          this.$elem.is(":visible") ? this.$elem.css("opacity", 1) : this.watchVisibility();
          this.onstartup = !1;
          this.eachMoveUpdate();
          "function" === typeof this.options.afterInit && this.options.afterInit.apply(this, [this.$elem])
        },
        eachMoveUpdate: function() {
          !0 === this.options.lazyLoad && this.lazyLoad();
          !0 === this.options.autoHeight && this.autoHeight();
          this.onVisibleItems();
          "function" === typeof this.options.afterAction && this.options.afterAction.apply(this, [this.$elem])
        },
        updateVars: function() {
          "function" === typeof this.options.beforeUpdate && this.options.beforeUpdate.apply(this, [this.$elem]);
          this.watchVisibility();
          this.updateItems();
          this.calculateAll();
          this.updatePosition();
          this.updateControls();
          this.eachMoveUpdate();
          "function" === typeof this.options.afterUpdate && this.options.afterUpdate.apply(this, [this.$elem])
        },
        reload: function() {
          var a = this;
          g.setTimeout(function() {
            a.updateVars()
          }, 0)
        },
        watchVisibility: function() {
          var a = this;
          if (!1 === a.$elem.is(":visible")) a.$elem.css({
            opacity: 0
          }), g.clearInterval(a.autoPlayInterval), g.clearInterval(a.checkVisible);
          else return !1;
          a.checkVisible = g.setInterval(function() {
            a.$elem.is(":visible") && (a.reload(), a.$elem.animate({
              opacity: 1
            }, 200), g.clearInterval(a.checkVisible))
          }, 500)
        },
        wrapItems: function() {
          this.$userItems.wrapAll('<div class="owl-wrapper">').wrap('<div class="owl-item"></div>');
          this.$elem.find(".owl-wrapper").wrap('<div class="owl-wrapper-outer">');
          this.wrapperOuter = this.$elem.find(".owl-wrapper-outer");
          this.$elem.css("display", "block")
        },
        baseClass: function() {
          var a = this.$elem.hasClass(this.options.baseClass),
              b = this.$elem.hasClass(this.options.theme);
          a || this.$elem.addClass(this.options.baseClass);
          b || this.$elem.addClass(this.options.theme)
        },
        updateItems: function() {
          var a, b;
          if (!1 === this.options.responsive) return !1;
          if (!0 === this.options.singleItem) return this.options.items = this.orignalItems = 1, this.options.itemsCustom = !1, this.options.itemsDesktop = !1, this.options.itemsDesktopSmall = !1, this.options.itemsTablet = !1, this.options.itemsTabletSmall = !1, this.options.itemsMobile = !1;
          a = f(this.options.responsiveBaseWidth).width();
          a > (this.options.itemsDesktop[0] || this.orignalItems) && (this.options.items = this.orignalItems);
          if (!1 !== this.options.itemsCustom)
            for (this.options.itemsCustom.sort(function(a, b) {
              return a[0] - b[0]
            }), b = 0; b < this.options.itemsCustom.length; b += 1) this.options.itemsCustom[b][0] <= a && (this.options.items = this.options.itemsCustom[b][1]);
          else a <= this.options.itemsDesktop[0] && !1 !== this.options.itemsDesktop && (this.options.items = this.options.itemsDesktop[1]), a <= this.options.itemsDesktopSmall[0] && !1 !== this.options.itemsDesktopSmall && (this.options.items = this.options.itemsDesktopSmall[1]), a <= this.options.itemsTablet[0] && !1 !== this.options.itemsTablet && (this.options.items = this.options.itemsTablet[1]), a <= this.options.itemsTabletSmall[0] && !1 !== this.options.itemsTabletSmall && (this.options.items = this.options.itemsTabletSmall[1]), a <= this.options.itemsMobile[0] && !1 !== this.options.itemsMobile && (this.options.items = this.options.itemsMobile[1]);
          this.options.items > this.itemsAmount && !0 === this.options.itemsScaleUp && (this.options.items = this.itemsAmount)
        },
        response: function() {
          var a = this,
              b, e;
          if (!0 !== a.options.responsive) return !1;
          e = f(g).width();
          a.resizer = function() {
            f(g).width() !== e && (!1 !== a.options.autoPlay && g.clearInterval(a.autoPlayInterval), g.clearTimeout(b), b = g.setTimeout(function() {
              e = f(g).width();
              a.updateVars()
            }, a.options.responsiveRefreshRate))
          };
          f(g).resize(a.resizer)
        },
        updatePosition: function() {
          this.jumpTo(this.currentItem);
          !1 !== this.options.autoPlay && this.checkAp()
        },
        appendItemsSizes: function() {
          var a = this,
              b = 0,
              e = a.itemsAmount - a.options.items;
          a.$owlItems.each(function(c) {
            var d = f(this);
            d.css({
              width: a.itemWidth
            }).data("owl-item", Number(c));
            if (0 === c % a.options.items || c === e) c > e || (b += 1);
            d.data("owl-roundPages", b)
          })
        },
        appendWrapperSizes: function() {
          this.$owlWrapper.css({
            width: this.$owlItems.length * this.itemWidth * 2,
            left: 0
          });
          this.appendItemsSizes()
        },
        calculateAll: function() {
          this.calculateWidth();
          this.appendWrapperSizes();
          this.loops();
          this.max()
        },
        calculateWidth: function() {
          this.itemWidth = Math.round(this.$elem.width() / this.options.items)
        },
        max: function() {
          var a = -1 * (this.itemsAmount * this.itemWidth - this.options.items * this.itemWidth);
          this.options.items > this.itemsAmount ? this.maximumPixels = a = this.maximumItem = 0 : (this.maximumItem = this.itemsAmount - this.options.items, this.maximumPixels = a);
          return a
        },
        min: function() {
          return 0
        },
        loops: function() {
          var a = 0,
              b = 0,
              e, c;
          this.positionsInArray = [0];
          this.pagesInArray = [];
          for (e = 0; e < this.itemsAmount; e += 1) b += this.itemWidth, this.positionsInArray.push(-b), !0 === this.options.scrollPerPage && (c = f(this.$owlItems[e]), c = c.data("owl-roundPages"), c !== a && (this.pagesInArray[a] = this.positionsInArray[e], a = c))
        },
        buildControls: function() {
          if (!0 === this.options.navigation || !0 === this.options.pagination) this.owlControls = f('<div class="owl-controls"/>').toggleClass("clickable", !this.browser.isTouch).appendTo(this.$elem);
          !0 === this.options.pagination && this.buildPagination();
          !0 === this.options.navigation && this.buildButtons()
        },
        buildButtons: function() {
          var a = this,
              b = f('<div class="owl-buttons"/>');
          a.owlControls.append(b);
          a.buttonPrev = f("<div/>", {
            "class": "owl-prev",
            html: a.options.navigationText[0] || ""
          });
          a.buttonNext = f("<div/>", {
            "class": "owl-next",
            html: a.options.navigationText[1] || ""
          });
          b.append(a.buttonPrev).append(a.buttonNext);
          b.on("touchstart.owlControls mousedown.owlControls", 'div[class^="owl"]', function(a) {
            a.preventDefault()
          });
          b.on("touchend.owlControls mouseup.owlControls", 'div[class^="owl"]', function(b) {
            b.preventDefault();
            f(this).hasClass("owl-next") ? a.next() : a.prev()
          })
        },
        buildPagination: function() {
          var a = this;
          a.paginationWrapper = f('<div class="owl-pagination"/>');
          a.owlControls.append(a.paginationWrapper);
          a.paginationWrapper.on("touchend.owlControls mouseup.owlControls", ".owl-page", function(b) {
            b.preventDefault();
            Number(f(this).data("owl-page")) !== a.currentItem && a.goTo(Number(f(this).data("owl-page")), !0)
          })
        },
        updatePagination: function() {
          var a, b, e, c, d, g;
          if (!1 === this.options.pagination) return !1;
          this.paginationWrapper.html("");
          a = 0;
          b = this.itemsAmount - this.itemsAmount % this.options.items;
          for (c = 0; c < this.itemsAmount; c += 1) 0 === c % this.options.items && (a += 1, b === c && (e = this.itemsAmount - this.options.items), d = f("<div/>", {
            "class": "owl-page"
          }), g = f("<span></span>", {
            text: !0 === this.options.paginationNumbers ? a : "",
            "class": !0 === this.options.paginationNumbers ? "owl-numbers" : ""
          }), d.append(g), d.data("owl-page", b === c ? e : c), d.data("owl-roundPages", a), this.paginationWrapper.append(d));
          this.checkPagination()
        },
        checkPagination: function() {
          var a = this;
          if (!1 === a.options.pagination) return !1;
          a.paginationWrapper.find(".owl-page").each(function() {
            f(this).data("owl-roundPages") === f(a.$owlItems[a.currentItem]).data("owl-roundPages") && (a.paginationWrapper.find(".owl-page").removeClass("active"), f(this).addClass("active"))
          })
        },
        checkNavigation: function() {
          if (!1 === this.options.navigation) return !1;
          !1 === this.options.rewindNav && (0 === this.currentItem && 0 === this.maximumItem ? (this.buttonPrev.addClass("disabled"), this.buttonNext.addClass("disabled")) : 0 === this.currentItem && 0 !== this.maximumItem ? (this.buttonPrev.addClass("disabled"), this.buttonNext.removeClass("disabled")) : this.currentItem === this.maximumItem ? (this.buttonPrev.removeClass("disabled"), this.buttonNext.addClass("disabled")) : 0 !== this.currentItem && this.currentItem !== this.maximumItem && (this.buttonPrev.removeClass("disabled"), this.buttonNext.removeClass("disabled")))
        },
        updateControls: function() {
          this.updatePagination();
          this.checkNavigation();
          this.owlControls && (this.options.items >= this.itemsAmount ? this.owlControls.hide() : this.owlControls.show())
        },
        destroyControls: function() {
          this.owlControls && this.owlControls.remove()
        },
        next: function(a) {
          if (this.isTransition) return !1;
          this.currentItem += !0 === this.options.scrollPerPage ? this.options.items : 1;
          if (this.currentItem > this.maximumItem + (!0 === this.options.scrollPerPage ? this.options.items - 1 : 0))
            if (!0 === this.options.rewindNav) this.currentItem = 0, a = "rewind";
            else return this.currentItem = this.maximumItem, !1;
          this.goTo(this.currentItem, a)
        },
        prev: function(a) {
          if (this.isTransition) return !1;
          this.currentItem = !0 === this.options.scrollPerPage && 0 < this.currentItem && this.currentItem < this.options.items ? 0 : this.currentItem - (!0 === this.options.scrollPerPage ? this.options.items : 1);
          if (0 > this.currentItem)
            if (!0 === this.options.rewindNav) this.currentItem = this.maximumItem, a = "rewind";
            else return this.currentItem = 0, !1;
          this.goTo(this.currentItem, a)
        },
        goTo: function(a, b, e) {
          var c = this;
          if (c.isTransition) return !1;
          "function" === typeof c.options.beforeMove && c.options.beforeMove.apply(this, [c.$elem]);
          a >= c.maximumItem ? a = c.maximumItem : 0 >= a && (a = 0);
          c.currentItem = c.owl.currentItem = a;
          if (!1 !== c.options.transitionStyle && "drag" !== e && 1 === c.options.items && !0 === c.browser.support3d) return c.swapSpeed(0), !0 === c.browser.support3d ? c.transition3d(c.positionsInArray[a]) : c.css2slide(c.positionsInArray[a], 1), c.afterGo(), c.singleItemTransition(), !1;
          a = c.positionsInArray[a];
          !0 === c.browser.support3d ? (c.isCss3Finish = !1, !0 === b ? (c.swapSpeed("paginationSpeed"), g.setTimeout(function() {
            c.isCss3Finish = !0
          }, c.options.paginationSpeed)) : "rewind" === b ? (c.swapSpeed(c.options.rewindSpeed), g.setTimeout(function() {
            c.isCss3Finish = !0
          }, c.options.rewindSpeed)) : (c.swapSpeed("slideSpeed"), g.setTimeout(function() {
            c.isCss3Finish = !0
          }, c.options.slideSpeed)), c.transition3d(a)) : !0 === b ? c.css2slide(a, c.options.paginationSpeed) : "rewind" === b ? c.css2slide(a, c.options.rewindSpeed) : c.css2slide(a, c.options.slideSpeed);
          c.afterGo()
        },
        jumpTo: function(a) {
          "function" === typeof this.options.beforeMove && this.options.beforeMove.apply(this, [this.$elem]);
          a >= this.maximumItem || -1 === a ? a = this.maximumItem : 0 >= a && (a = 0);
          this.swapSpeed(0);
          !0 === this.browser.support3d ? this.transition3d(this.positionsInArray[a]) : this.css2slide(this.positionsInArray[a], 1);
          this.currentItem = this.owl.currentItem = a;
          this.afterGo()
        },
        afterGo: function() {
          this.prevArr.push(this.currentItem);
          this.prevItem = this.owl.prevItem = this.prevArr[this.prevArr.length - 2];
          this.prevArr.shift(0);
          this.prevItem !== this.currentItem && (this.checkPagination(), this.checkNavigation(), this.eachMoveUpdate(), !1 !== this.options.autoPlay && this.checkAp());
          "function" === typeof this.options.afterMove && this.prevItem !== this.currentItem && this.options.afterMove.apply(this, [this.$elem])
        },
        stop: function() {
          this.apStatus = "stop";
          g.clearInterval(this.autoPlayInterval)
        },
        checkAp: function() {
          "stop" !== this.apStatus && this.play()
        },
        play: function() {
          var a = this;
          a.apStatus = "play";
          if (!1 === a.options.autoPlay) return !1;
          g.clearInterval(a.autoPlayInterval);
          a.autoPlayInterval = g.setInterval(function() {
            a.next(!0)
          }, a.options.autoPlay)
        },
        swapSpeed: function(a) {
          "slideSpeed" === a ? this.$owlWrapper.css(this.addCssSpeed(this.options.slideSpeed)) : "paginationSpeed" === a ? this.$owlWrapper.css(this.addCssSpeed(this.options.paginationSpeed)) : "string" !== typeof a && this.$owlWrapper.css(this.addCssSpeed(a))
        },
        addCssSpeed: function(a) {
          return {
            "-webkit-transition": "all " + a + "ms ease",
            "-moz-transition": "all " + a + "ms ease",
            "-o-transition": "all " + a + "ms ease",
            transition: "all " + a + "ms ease"
          }
        },
        removeTransition: function() {
          return {
            "-webkit-transition": "",
            "-moz-transition": "",
            "-o-transition": "",
            transition: ""
          }
        },
        doTranslate: function(a) {
          return {
            "-webkit-transform": "translate3d(" + a + "px, 0px, 0px)",
            "-moz-transform": "translate3d(" + a + "px, 0px, 0px)",
            "-o-transform": "translate3d(" + a + "px, 0px, 0px)",
            "-ms-transform": "translate3d(" + a + "px, 0px, 0px)",
            transform: "translate3d(" + a + "px, 0px,0px)"
          }
        },
        transition3d: function(a) {
          this.$owlWrapper.css(this.doTranslate(a))
        },
        css2move: function(a) {
          this.$owlWrapper.css({
            left: a
          })
        },
        css2slide: function(a, b) {
          var e = this;
          e.isCssFinish = !1;
          e.$owlWrapper.stop(!0, !0).animate({
            left: a
          }, {
            duration: b || e.options.slideSpeed,
            complete: function() {
              e.isCssFinish = !0
            }
          })
        },
        checkBrowser: function() {
          var a = k.createElement("div");
          a.style.cssText = "  -moz-transform:translate3d(0px, 0px, 0px); -ms-transform:translate3d(0px, 0px, 0px); -o-transform:translate3d(0px, 0px, 0px); -webkit-transform:translate3d(0px, 0px, 0px); transform:translate3d(0px, 0px, 0px)";
          a = a.style.cssText.match(/translate3d\(0px, 0px, 0px\)/g);
          this.browser = {
            support3d: null !== a && 1 === a.length,
            isTouch: "ontouchstart" in g || g.navigator.msMaxTouchPoints
          }
        },
        moveEvents: function() {
          if (!1 !== this.options.mouseDrag || !1 !== this.options.touchDrag) this.gestures(), this.disabledEvents()
        },
        eventTypes: function() {
          var a = ["s", "e", "x"];
          this.ev_types = {};
          !0 === this.options.mouseDrag && !0 === this.options.touchDrag ? a = ["touchstart.owl mousedown.owl", "touchmove.owl mousemove.owl", "touchend.owl touchcancel.owl mouseup.owl"] : !1 === this.options.mouseDrag && !0 === this.options.touchDrag ? a = ["touchstart.owl", "touchmove.owl", "touchend.owl touchcancel.owl"] : !0 === this.options.mouseDrag && !1 === this.options.touchDrag && (a = ["mousedown.owl", "mousemove.owl", "mouseup.owl"]);
          this.ev_types.start = a[0];
          this.ev_types.move = a[1];
          this.ev_types.end = a[2]
        },
        disabledEvents: function() {
          this.$elem.on("dragstart.owl", function(a) {
            a.preventDefault()
          });
          this.$elem.on("mousedown.disableTextSelect", function(a) {
            return f(a.target).is("input, textarea, select, option")
          })
        },
        gestures: function() {
          function a(a) {
            if (void 0 !== a.touches) return {
              x: a.touches[0].pageX,
              y: a.touches[0].pageY
            };
            if (void 0 === a.touches) {
              if (void 0 !== a.pageX) return {
                x: a.pageX,
                y: a.pageY
              };
              if (void 0 === a.pageX) return {
                x: a.clientX,
                y: a.clientY
              }
            }
          }

          function b(a) {
            "on" === a ? (f(k).on(d.ev_types.move, e), f(k).on(d.ev_types.end, c)) : "off" === a && (f(k).off(d.ev_types.move), f(k).off(d.ev_types.end))
          }

          function e(b) {
            b = b.originalEvent || b || g.event;
            d.newPosX = a(b).x - h.offsetX;
            d.newPosY = a(b).y - h.offsetY;
            d.newRelativeX = d.newPosX - h.relativePos;
            "function" === typeof d.options.startDragging && !0 !== h.dragging && 0 !== d.newRelativeX && (h.dragging = !0, d.options.startDragging.apply(d, [d.$elem]));
            (8 < d.newRelativeX || -8 > d.newRelativeX) && !0 === d.browser.isTouch && (void 0 !== b.preventDefault ? b.preventDefault() : b.returnValue = !1, h.sliding = !0);
            (10 < d.newPosY || -10 > d.newPosY) && !1 === h.sliding && f(k).off("touchmove.owl");
            d.newPosX = Math.max(Math.min(d.newPosX, d.newRelativeX / 5), d.maximumPixels + d.newRelativeX / 5);
            !0 === d.browser.support3d ? d.transition3d(d.newPosX) : d.css2move(d.newPosX)
          }

          function c(a) {
            a = a.originalEvent || a || g.event;
            var c;
            a.target = a.target || a.srcElement;
            h.dragging = !1;
            !0 !== d.browser.isTouch && d.$owlWrapper.removeClass("grabbing");
            d.dragDirection = 0 > d.newRelativeX ? d.owl.dragDirection = "left" : d.owl.dragDirection = "right";
            0 !== d.newRelativeX && (c = d.getNewPosition(), d.goTo(c, !1, "drag"), h.targetElement === a.target && !0 !== d.browser.isTouch && (f(a.target).on("click.disable", function(a) {
              a.stopImmediatePropagation();
              a.stopPropagation();
              a.preventDefault();
              f(a.target).off("click.disable")
            }), a = f._data(a.target, "events").click, c = a.pop(), a.splice(0, 0, c)));
            b("off")
          }
          var d = this,
              h = {
                offsetX: 0,
                offsetY: 0,
                baseElWidth: 0,
                relativePos: 0,
                position: null,
                minSwipe: null,
                maxSwipe: null,
                sliding: null,
                dargging: null,
                targetElement: null
              };
          d.isCssFinish = !0;
          d.$elem.on(d.ev_types.start, ".owl-wrapper", function(c) {
            c = c.originalEvent || c || g.event;
            var e;
            if (3 === c.which) return !1;
            if (!(d.itemsAmount <= d.options.items)) {
              if (!1 === d.isCssFinish && !d.options.dragBeforeAnimFinish || !1 === d.isCss3Finish && !d.options.dragBeforeAnimFinish) return !1;
              !1 !== d.options.autoPlay && g.clearInterval(d.autoPlayInterval);
              !0 === d.browser.isTouch || d.$owlWrapper.hasClass("grabbing") || d.$owlWrapper.addClass("grabbing");
              d.newPosX = 0;
              d.newRelativeX = 0;
              f(this).css(d.removeTransition());
              e = f(this).position();
              h.relativePos = e.left;
              h.offsetX = a(c).x - e.left;
              h.offsetY = a(c).y - e.top;
              b("on");
              h.sliding = !1;
              h.targetElement = c.target || c.srcElement
            }
          })
        },
        getNewPosition: function() {
          var a = this.closestItem();
          a > this.maximumItem ? a = this.currentItem = this.maximumItem : 0 <= this.newPosX && (this.currentItem = a = 0);
          return a
        },
        closestItem: function() {
          var a = this,
              b = !0 === a.options.scrollPerPage ? a.pagesInArray : a.positionsInArray,
              e = a.newPosX,
              c = null;
          f.each(b, function(d, g) {
            e - a.itemWidth / 20 > b[d + 1] && e - a.itemWidth / 20 < g && "left" === a.moveDirection() ? (c = g, a.currentItem = !0 === a.options.scrollPerPage ? f.inArray(c, a.positionsInArray) : d) : e + a.itemWidth / 20 < g && e + a.itemWidth / 20 > (b[d + 1] || b[d] - a.itemWidth) && "right" === a.moveDirection() && (!0 === a.options.scrollPerPage ? (c = b[d + 1] || b[b.length - 1], a.currentItem = f.inArray(c, a.positionsInArray)) : (c = b[d + 1], a.currentItem = d + 1))
          });
          return a.currentItem
        },
        moveDirection: function() {
          var a;
          0 > this.newRelativeX ? (a = "right", this.playDirection = "next") : (a = "left", this.playDirection = "prev");
          return a
        },
        customEvents: function() {
          var a = this;
          a.$elem.on("owl.next", function() {
            a.next()
          });
          a.$elem.on("owl.prev", function() {
            a.prev()
          });
          a.$elem.on("owl.play", function(b, e) {
            a.options.autoPlay = e;
            a.play();
            a.hoverStatus = "play"
          });
          a.$elem.on("owl.stop", function() {
            a.stop();
            a.hoverStatus = "stop"
          });
          a.$elem.on("owl.goTo", function(b, e) {
            a.goTo(e)
          });
          a.$elem.on("owl.jumpTo", function(b, e) {
            a.jumpTo(e)
          })
        },
        stopOnHover: function() {
          var a = this;
          !0 === a.options.stopOnHover && !0 !== a.browser.isTouch && !1 !== a.options.autoPlay && (a.$elem.on("mouseover", function() {
            a.stop()
          }), a.$elem.on("mouseout", function() {
            "stop" !== a.hoverStatus && a.play()
          }))
        },
        lazyLoad: function() {
          var a, b, e, c, d;
          if (!1 === this.options.lazyLoad) return !1;
          for (a = 0; a < this.itemsAmount; a += 1) b = f(this.$owlItems[a]), "loaded" !== b.data("owl-loaded") && (e = b.data("owl-item"), c = b.find(".lazyOwl"), "string" !== typeof c.data("src") ? b.data("owl-loaded", "loaded") : (void 0 === b.data("owl-loaded") && (c.hide(), b.addClass("loading").data("owl-loaded", "checked")), (d = !0 === this.options.lazyFollow ? e >= this.currentItem : !0) && e < this.currentItem + this.options.items && c.length && this.lazyPreload(b, c)))
        },
        lazyPreload: function(a, b) {
          function e() {
            a.data("owl-loaded", "loaded").removeClass("loading");
            b.removeAttr("data-src");
            "fade" === d.options.lazyEffect ? b.fadeIn(400) : b.show();
            "function" === typeof d.options.afterLazyLoad && d.options.afterLazyLoad.apply(this, [d.$elem])
          }

          function c() {
            f += 1;
            d.completeImg(b.get(0)) || !0 === k ? e() : 100 >= f ? g.setTimeout(c, 100) : e()
          }
          var d = this,
              f = 0,
              k;
          "DIV" === b.prop("tagName") ? (b.css("background-image", "url(" + b.data("src") + ")"), k = !0) : b[0].src = b.data("src");
          c()
        },
        autoHeight: function() {
          function a() {
            var a = f(e.$owlItems[e.currentItem]).height();
            e.wrapperOuter.css("height", a + "px");
            e.wrapperOuter.hasClass("autoHeight") || g.setTimeout(function() {
              e.wrapperOuter.addClass("autoHeight")
            }, 0)
          }

          function b() {
            d += 1;
            e.completeImg(c.get(0)) ? a() : 100 >= d ? g.setTimeout(b, 100) : e.wrapperOuter.css("height", "")
          }
          var e = this,
              c = f(e.$owlItems[e.currentItem]).find("img"),
              d;
          void 0 !== c.get(0) ? (d = 0, b()) : a()
        },
        completeImg: function(a) {
          return !a.complete || "undefined" !== typeof a.naturalWidth && 0 === a.naturalWidth ? !1 : !0
        },
        onVisibleItems: function() {
          var a;
          !0 === this.options.addClassActive && this.$owlItems.removeClass("active");
          this.visibleItems = [];
          for (a = this.currentItem; a < this.currentItem + this.options.items; a += 1) this.visibleItems.push(a), !0 === this.options.addClassActive && f(this.$owlItems[a]).addClass("active");
          this.owl.visibleItems = this.visibleItems
        },
        transitionTypes: function(a) {
          this.outClass = "owl-" + a + "-out";
          this.inClass = "owl-" + a + "-in"
        },
        singleItemTransition: function() {
          var a = this,
              b = a.outClass,
              e = a.inClass,
              c = a.$owlItems.eq(a.currentItem),
              d = a.$owlItems.eq(a.prevItem),
              f = Math.abs(a.positionsInArray[a.currentItem]) + a.positionsInArray[a.prevItem],
              g = Math.abs(a.positionsInArray[a.currentItem]) + a.itemWidth / 2;
          a.isTransition = !0;
          a.$owlWrapper.addClass("owl-origin").css({
            "-webkit-transform-origin": g + "px",
            "-moz-perspective-origin": g + "px",
            "perspective-origin": g + "px"
          });
          d.css({
            position: "relative",
            left: f + "px"
          }).addClass(b).on("webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend", function() {
            a.endPrev = !0;
            d.off("webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend");
            a.clearTransStyle(d, b)
          });
          c.addClass(e).on("webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend", function() {
            a.endCurrent = !0;
            c.off("webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend");
            a.clearTransStyle(c, e)
          })
        },
        clearTransStyle: function(a, b) {
          a.css({
            position: "",
            left: ""
          }).removeClass(b);
          this.endPrev && this.endCurrent && (this.$owlWrapper.removeClass("owl-origin"), this.isTransition = this.endCurrent = this.endPrev = !1)
        },
        owlStatus: function() {
          this.owl = {
            userOptions: this.userOptions,
            baseElement: this.$elem,
            userItems: this.$userItems,
            owlItems: this.$owlItems,
            currentItem: this.currentItem,
            prevItem: this.prevItem,
            visibleItems: this.visibleItems,
            isTouch: this.browser.isTouch,
            browser: this.browser,
            dragDirection: this.dragDirection
          }
        },
        clearEvents: function() {
          this.$elem.off(".owl owl mousedown.disableTextSelect");
          f(k).off(".owl owl");
          f(g).off("resize", this.resizer)
        },
        unWrap: function() {
          0 !== this.$elem.children().length && (this.$owlWrapper.unwrap(), this.$userItems.unwrap().unwrap(), this.owlControls && this.owlControls.remove());
          this.clearEvents();
          this.$elem.attr("style", this.$elem.data("owl-originalStyles") || "").attr("class", this.$elem.data("owl-originalClasses"))
        },
        destroy: function() {
          this.stop();
          g.clearInterval(this.checkVisible);
          this.unWrap();
          this.$elem.removeData()
        },
        reinit: function(a) {
          a = f.extend({}, this.userOptions, a);
          this.unWrap();
          this.init(a, this.$elem)
        },
        addItem: function(a, b) {
          var e;
          if (!a) return !1;
          if (0 === this.$elem.children().length) return this.$elem.append(a), this.setVars(), !1;
          this.unWrap();
          e = void 0 === b || -1 === b ? -1 : b;
          e >= this.$userItems.length || -1 === e ? this.$userItems.eq(-1).after(a) : this.$userItems.eq(e).before(a);
          this.setVars()
        },
        removeItem: function(a) {
          if (0 === this.$elem.children().length) return !1;
          a = void 0 === a || -1 === a ? -1 : a;
          this.unWrap();
          this.$userItems.eq(a).remove();
          this.setVars()
        }
      };
      f.fn.owlCarousel = function(a) {
        return this.each(function() {
          if (!0 === f(this).data("owl-init")) return !1;
          f(this).data("owl-init", !0);
          var b = Object.create(l);
          b.init(a, this);
          f.data(this, "owlCarousel", b)
        })
      };
      f.fn.owlCarousel.options = {
        items: 5,
        itemsCustom: !1,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [979, 3],
        itemsTablet: [768, 2],
        itemsTabletSmall: !1,
        itemsMobile: [479, 1],
        singleItem: !1,
        itemsScaleUp: !1,
        slideSpeed: 200,
        paginationSpeed: 800,
        rewindSpeed: 1E3,
        autoPlay: !1,
        stopOnHover: !1,
        navigation: !1,
        navigationText: ["prev", "next"],
        rewindNav: !0,
        scrollPerPage: !1,
        pagination: !0,
        paginationNumbers: !1,
        responsive: !0,
        responsiveRefreshRate: 200,
        responsiveBaseWidth: g,
        baseClass: "owl-carousel",
        theme: "owl-theme",
        lazyLoad: !1,
        lazyFollow: !0,
        lazyEffect: "fade",
        autoHeight: !1,
        jsonPath: !1,
        jsonSuccess: !1,
        dragBeforeAnimFinish: !0,
        mouseDrag: !0,
        touchDrag: !0,
        addClassActive: !1,
        transitionStyle: !1,
        beforeUpdate: !1,
        afterUpdate: !1,
        beforeInit: !1,
        afterInit: !1,
        beforeMove: !1,
        afterMove: !1,
        afterAction: !1,
        startDragging: !1,
        afterLazyLoad: !1
      }
    })(jQuery, window, document);
  },
  bG9hZGNhcm91ZnJlZHNlbA: function() {

    var $top_movie = $('#film_hot');

    var $top_movie = $('#film_related');

    var $actor_movie = $('#actor_slider');

    $(document).ready(function() {


      $top_movie.find('.item').first().addClass('active');



    });




  },
  cmF0eQ: function() {

    (function($) {
      'use strict';
      var f = {
        init: function(a) {
          return this.each(function() {
            this.self = $(this);
            f.destroy.call(this.self);
            this.opt = $.extend(true, {}, $.fn.raty.defaults, a);
            f._adjustCallback.call(this);
            f._adjustNumber.call(this);
            f._adjustHints.call(this);
            this.opt.score = f._adjustedScore.call(this, this.opt.score);
            if (this.opt.starType !== 'img') {
              f._adjustStarType.call(this)
            }
            f._adjustPath.call(this);
            f._createStars.call(this);
            if (this.opt.cancel) {
              f._createCancel.call(this)
            }
            if (this.opt.precision) {
              f._adjustPrecision.call(this)
            }
            f._createScore.call(this);
            f._apply.call(this, this.opt.score);
            f._setTitle.call(this, this.opt.score);
            f._target.call(this, this.opt.score);
            if (this.opt.readOnly) {
              f._lock.call(this)
            } else {
              this.style.cursor = 'pointer';
              f._binds.call(this)
            }
          })
        },
        _adjustCallback: function() {
          var a = ['number', 'readOnly', 'score', 'scoreName', 'target', 'path'];
          for (var i = 0; i < a.length; i++) {
            if (typeof this.opt[a[i]] === 'function') {
              this.opt[a[i]] = this.opt[a[i]].call(this)
            }
          }
        },
        _adjustedScore: function(a) {
          if (!a) {
            return a
          }
          return f._between(a, 0, this.opt.number)
        },
        _adjustHints: function() {
          if (!this.opt.hints) {
            this.opt.hints = []
          }
          if (!this.opt.halfShow && !this.opt.half) {
            return
          }
          var a = this.opt.precision ? 10 : 2;
          for (var i = 0; i < this.opt.number; i++) {
            var b = this.opt.hints[i];
            if (Object.prototype.toString.call(b) !== '[object Array]') {
              b = [b]
            }
            this.opt.hints[i] = [];
            for (var j = 0; j < a; j++) {
              var c = b[j],
                  last = b[b.length - 1];
              if (last === undefined) {
                last = null
              }
              this.opt.hints[i][j] = c === undefined ? last : c
            }
          }
        },
        _adjustNumber: function() {
          this.opt.number = f._between(this.opt.number, 1, this.opt.numberMax)
        },
        _adjustPath: function() {
          this.opt.path = this.opt.path || '';
          if (this.opt.path && this.opt.path.charAt(this.opt.path.length - 1) !== '/') {
            this.opt.path += '/'
          }
        },
        _adjustPrecision: function() {
          this.opt.half = true
        },
        _adjustStarType: function() {
          var a = ['cancelOff', 'cancelOn', 'starHalf', 'starOff', 'starOn'];
          this.opt.path = '';
          for (var i = 0; i < a.length; i++) {
            this.opt[a[i]] = this.opt[a[i]].replace('.', '-')
          }
        },
        _apply: function(a) {
          f._fill.call(this, a);
          if (a) {
            if (a > 0) {
              this.score.val(a)
            }
            f._roundStars.call(this, a)
          }
        },
        _between: function(a, b, c) {
          return Math.min(Math.max(parseFloat(a), b), c)
        },
        _binds: function() {
          if (this.cancel) {
            f._bindOverCancel.call(this);
            f._bindClickCancel.call(this);
            f._bindOutCancel.call(this)
          }
          f._bindOver.call(this);
          f._bindClick.call(this);
          f._bindOut.call(this)
        },
        _bindClick: function() {
          var c = this;
          c.stars.on('click.raty', function(a) {
            var b = true,
                score = (c.opt.half || c.opt.precision) ? c.self.data('score') : (this.alt || $(this).data('alt'));
            if (c.opt.click) {
              b = c.opt.click.call(c, +score, a)
            }
            if (b || b === undefined) {
              if (c.opt.half && !c.opt.precision) {
                score = f._roundHalfScore.call(c, score)
              }
              f._apply.call(c, score)
            }
          })
        },
        _bindClickCancel: function() {
          var b = this;
          b.cancel.on('click.raty', function(a) {
            b.score.removeAttr('value');
            if (b.opt.click) {
              b.opt.click.call(b, null, a)
            }
          })
        },
        _bindOut: function() {
          var c = this;
          c.self.on('mouseleave.raty', function(a) {
            var b = +c.score.val() || undefined;
            f._apply.call(c, b);
            f._target.call(c, b, a);
            f._resetTitle.call(c);
            if (c.opt.mouseout) {
              c.opt.mouseout.call(c, b, a)
            }
          })
        },
        _bindOutCancel: function() {
          var d = this;
          d.cancel.on('mouseleave.raty', function(a) {
            var b = d.opt.cancelOff;
            if (d.opt.starType !== 'img') {
              b = d.opt.cancelClass + ' ' + b
            }
            f._setIcon.call(d, this, b);
            if (d.opt.mouseout) {
              var c = +d.score.val() || undefined;
              d.opt.mouseout.call(d, c, a)
            }
          })
        },
        _bindOver: function() {
          var c = this,
              action = c.opt.half ? 'mousemove.raty' : 'mouseover.raty';
          c.stars.on(action, function(a) {
            var b = f._getScoreByPosition.call(c, a, this);
            f._fill.call(c, b);
            if (c.opt.half) {
              f._roundStars.call(c, b, a);
              f._setTitle.call(c, b, a);
              c.self.data('score', b)
            }
            f._target.call(c, b, a);
            if (c.opt.mouseover) {
              c.opt.mouseover.call(c, b, a)
            }
          })
        },
        _bindOverCancel: function() {
          var c = this;
          c.cancel.on('mouseover.raty', function(a) {
            var b = c.opt.path + c.opt.starOff,
                icon = c.opt.cancelOn;
            if (c.opt.starType === 'img') {
              c.stars.attr('src', b)
            } else {
              icon = c.opt.cancelClass + ' ' + icon;
              c.stars.attr('class', b)
            }
            f._setIcon.call(c, this, icon);
            f._target.call(c, null, a);
            if (c.opt.mouseover) {
              c.opt.mouseover.call(c, null)
            }
          })
        },
        _buildScoreField: function() {
          return $('<input />', {
            name: this.opt.scoreName,
            type: 'hidden'
          }).appendTo(this)
        },
        _createCancel: function() {
          var a = this.opt.path + this.opt.cancelOff,
              cancel = $('<' + this.opt.starType + ' />', {
                title: this.opt.cancelHint,
                'class': this.opt.cancelClass
              });
          if (this.opt.starType === 'img') {
            cancel.attr({
              src: a,
              alt: 'x'
            })
          } else {
            cancel.attr('data-alt', 'x').addClass(a)
          }
          if (this.opt.cancelPlace === 'left') {
            this.self.prepend('&#160;').prepend(cancel)
          } else {
            this.self.append('&#160;').append(cancel)
          }
          this.cancel = cancel
        },
        _createScore: function() {
          var a = $(this.opt.targetScore);
          this.score = a.length ? a : f._buildScoreField.call(this)
        },
        _createStars: function() {
          for (var i = 1; i <= this.opt.number; i++) {
            var a = f._nameForIndex.call(this, i),
                attrs = {
                  alt: i,
                  src: this.opt.path + this.opt[a]
                };
            if (this.opt.starType !== 'img') {
              attrs = {
                'data-alt': i,
                'class': attrs.src
              }
            }
            attrs.title = f._getHint.call(this, i);
            $('<' + this.opt.starType + ' />', attrs).appendTo(this);
            if (this.opt.space) {
              this.self.append(i < this.opt.number ? '&#160;' : '')
            }
          }
          this.stars = this.self.children(this.opt.starType)
        },
        _error: function(a) {
          $(this).text(a);
          $.error(a)
        },
        _fill: function(a) {
          var b = 0;
          for (var i = 1; i <= this.stars.length; i++) {
            var c, star = this.stars[i - 1],
                turnOn = f._turnOn.call(this, i, a);
            if (this.opt.iconRange && this.opt.iconRange.length > b) {
              var d = this.opt.iconRange[b];
              c = f._getRangeIcon.call(this, d, turnOn);
              if (i <= d.range) {
                f._setIcon.call(this, star, c)
              }
              if (i === d.range) {
                b++
              }
            } else {
              c = this.opt[turnOn ? 'starOn' : 'starOff'];
              f._setIcon.call(this, star, c)
            }
          }
        },
        _getFirstDecimal: function(a) {
          var b = a.toString().split('.')[1],
              result = 0;
          if (b) {
            result = parseInt(b.charAt(0), 10);
            if (b.slice(1, 5) === '9999') {
              result++
            }
          }
          return result
        },
        _getRangeIcon: function(a, b) {
          return b ? a.on || this.opt.starOn : a.off || this.opt.starOff
        },
        _getScoreByPosition: function(a, b) {
          var c = parseInt(b.alt || b.getAttribute('data-alt'), 10);
          if (this.opt.half) {
            var d = f._getWidth.call(this),
                percent = parseFloat((a.pageX - $(b).offset().left) / d);
            c = c - 1 + percent
          }
          return c
        },
        _getHint: function(a, b) {
          if (a !== 0 && !a) {
            return this.opt.noRatedMsg
          }
          var c = f._getFirstDecimal.call(this, a),
              integer = Math.ceil(a),
              group = this.opt.hints[(integer || 1) - 1],
              hint = group,
              set = !b || this.move;
          if (this.opt.precision) {
            if (set) {
              c = c === 0 ? 9 : c - 1
            }
            hint = group[c]
          } else if (this.opt.halfShow || this.opt.half) {
            c = set && c === 0 ? 1 : c > 5 ? 1 : 0;
            hint = group[c]
          }
          return hint === '' ? '' : hint || a
        },
        _getWidth: function() {
          var a = this.stars[0].width || parseFloat(this.stars.eq(0).css('font-size'));
          if (!a) {
            f._error.call(this, 'Could not get the icon width!')
          }
          return a
        },
        _lock: function() {
          var a = f._getHint.call(this, this.score.val());
          this.style.cursor = '';
          this.title = a;
          this.score.prop('readonly', true);
          this.stars.prop('title', a);
          if (this.cancel) {
            this.cancel.hide()
          }
          this.self.data('readonly', true)
        },
        _nameForIndex: function(i) {
          return this.opt.score && this.opt.score >= i ? 'starOn' : 'starOff'
        },
        _resetTitle: function(a) {
          for (var i = 0; i < this.opt.number; i++) {
            this.stars[i].title = f._getHint.call(this, i + 1)
          }
        },
        _roundHalfScore: function(a) {
          var b = parseInt(a, 10),
              decimal = f._getFirstDecimal.call(this, a);
          if (decimal !== 0) {
            decimal = decimal > 5 ? 1 : 0.5
          }
          return b + decimal
        },
        _roundStars: function(a, b) {
          var c = (a % 1).toFixed(2),
              name;
          if (b || this.move) {
            name = c > 0.5 ? 'starOn' : 'starHalf'
          } else if (c > this.opt.round.down) {
            name = 'starOn';
            if (this.opt.halfShow && c < this.opt.round.up) {
              name = 'starHalf'
            } else if (c < this.opt.round.full) {
              name = 'starOff'
            }
          }
          if (name) {
            var d = this.opt[name],
                star = this.stars[Math.ceil(a) - 1];
            f._setIcon.call(this, star, d)
          }
        },
        _setIcon: function(a, b) {
          a[this.opt.starType === 'img' ? 'src' : 'className'] = this.opt.path + b
        },
        _setTarget: function(a, b) {
          if (b) {
            b = this.opt.targetFormat.toString().replace('{score}', b)
          }
          if (a.is(':input')) {
            a.val(b)
          } else {
            a.html(b)
          }
        },
        _setTitle: function(a, b) {
          if (a) {
            var c = parseInt(Math.ceil(a), 10),
                star = this.stars[c - 1];
            star.title = f._getHint.call(this, a, b)
          }
        },
        _target: function(a, b) {
          if (this.opt.target) {
            var c = $(this.opt.target);
            if (!c.length) {
              f._error.call(this, 'Target selector invalid or missing!')
            }
            var d = b && b.type === 'mouseover';
            if (a === undefined) {
              a = this.opt.targetText
            } else if (a === null) {
              a = d ? this.opt.cancelHint : this.opt.targetText
            } else {
              if (this.opt.targetType === 'hint') {
                a = f._getHint.call(this, a, b)
              } else if (this.opt.precision) {
                a = parseFloat(a).toFixed(1)
              }
              var e = b && b.type === 'mousemove';
              if (!d && !e && !this.opt.targetKeep) {
                a = this.opt.targetText
              }
            }
            f._setTarget.call(this, c, a)
          }
        },
        _turnOn: function(i, a) {
          return this.opt.single ? (i === a) : (i <= a)
        },
        _unlock: function() {
          this.style.cursor = 'pointer';
          this.removeAttribute('title');
          this.score.removeAttr('readonly');
          this.self.data('readonly', false);
          for (var i = 0; i < this.opt.number; i++) {
            this.stars[i].title = f._getHint.call(this, i + 1)
          }
          if (this.cancel) {
            this.cancel.css('display', '')
          }
        },
        cancel: function(b) {
          return this.each(function() {
            var a = $(this);
            if (a.data('readonly') !== true) {
              f[b ? 'click' : 'score'].call(a, null);
              this.score.removeAttr('value')
            }
          })
        },
        click: function(a) {
          return this.each(function() {
            if ($(this).data('readonly') !== true) {
              a = f._adjustedScore.call(this, a);
              f._apply.call(this, a);
              if (this.opt.click) {
                this.opt.click.call(this, a, $.Event('click'))
              }
              f._target.call(this, a)
            }
          })
        },
        destroy: function() {
          return this.each(function() {
            var a = $(this),
                raw = a.data('raw');
            if (raw) {
              a.off('.raty').empty().css({
                cursor: raw.style.cursor
              }).removeData('readonly')
            } else {
              a.data('raw', a.clone()[0])
            }
          })
        },
        getScore: function() {
          var a = [],
              value;
          this.each(function() {
            value = this.score.val();
            a.push(value ? +value : undefined)
          });
          return (a.length > 1) ? a : a[0]
        },
        move: function(c) {
          return this.each(function() {
            var a = parseInt(c, 10),
                decimal = f._getFirstDecimal.call(this, c);
            if (a >= this.opt.number) {
              a = this.opt.number - 1;
              decimal = 10
            }
            var b = f._getWidth.call(this),
                steps = b / 10,
                star = $(this.stars[a]),
                percent = star.offset().left + steps * decimal,
                evt = $.Event('mousemove', {
                  pageX: percent
                });
            this.move = true;
            star.trigger(evt);
            this.move = false
          })
        },
        readOnly: function(b) {
          return this.each(function() {
            var a = $(this);
            if (a.data('readonly') !== b) {
              if (b) {
                a.off('.raty').children(this.opt.starType).off('.raty');
                f._lock.call(this)
              } else {
                f._binds.call(this);
                f._unlock.call(this)
              }
              a.data('readonly', b)
            }
          })
        },
        reload: function() {
          return f.set.call(this, {})
        },
        score: function() {
          var a = $(this);
          return arguments.length ? f.setScore.apply(a, arguments) : f.getScore.call(a)
        },
        set: function(a) {
          return this.each(function() {
            $(this).raty($.extend({}, this.opt, a))
          })
        },
        setScore: function(a) {
          return this.each(function() {
            if ($(this).data('readonly') !== true) {
              a = f._adjustedScore.call(this, a);
              f._apply.call(this, a);
              f._target.call(this, a)
            }
          })
        }
      };
      $.fn.raty = function(a) {
        if (f[a]) {
          return f[a].apply(this, Array.prototype.slice.call(arguments, 1))
        } else if (typeof a === 'object' || !a) {
          return f.init.apply(this, arguments)
        } else {
          $.error('Method ' + a + ' does not exist!')
        }
      };
      $.fn.raty.defaults = {
        cancel: false,
        cancelClass: 'raty-cancel',
        cancelHint: 'Cancel this rating!',
        cancelOff: document.location.origin + '/theme/frontend/default/images/plugins/rate/cancel-off.png',
        cancelOn: document.location.origin + '/theme/frontend/default/images/plugins/rate/cancel-on.png',
        cancelPlace: 'left',
        click: undefined,
        half: false,
        halfShow: true,
        hints: ['Dở tệ', 'Không hay', 'Tạm được', 'Hay', 'Quá hay'],
        iconRange: undefined,
        mouseout: undefined,
        mouseover: undefined,
        noRatedMsg: 'Not rated yet!',
        number: 5,
        numberMax: 20,
        path: undefined,
        precision: false,
        readOnly: false,
        round: {
          down: 0.25,
          full: 0.6,
          up: 0.76
        },
        score: undefined,
        scoreName: 'score',
        single: false,
        space: true,
        starHalf: document.location.origin + '/theme/frontend/default/images/plugins/rate/star-half.png',
        starOff: document.location.origin + '/theme/frontend/default/images/plugins/rate/star-off.png',
        starOn: document.location.origin + '/theme/frontend/default/images/plugins/rate/star-on.png',
        starType: 'img',
        target: undefined,
        targetFormat: '{score}',
        targetKeep: false,
        targetScore: undefined,
        targetText: '',
        targetType: 'hint'
      }
    })(jQuery);
  },



  SetupTimeout: 0,

  FZD5zmLO: function(data) {

    var $mediaObject = $('#mediaplayer');
    var sjwplayer = jwplayer("player");

    if ($mediaObject.length) {

      jwplayer.key = "ruFSYlSYxjskn0jYnCBjL4uDRGTX0wnKaih8OQ==";

      var SetupTimeout = 0;

      if (typeof data !== "undefined") {
        var data = data.html;
      } else {
        var data = jwplayer.setup;
      }

      var setup1 = false;
      var epid = data.film.episode_id;

      if (typeof jwplayer !== "undefined") {

        if (typeof data.playlist !== "undefined"){

          sjwplayer.setup(data).on("play", function(e) {

            Plugins.Core.sendEpiDie(epid, parseInt(1));

          }).on("setupError", function(e){

            var title = $("#page-watch").data('title');
            // loi xay ra khi setup player
            var msg = e.message;

            if (msg.indexOf("No playable sources found") > -1 || msg.indexOf("Error loading playlist") > -1 || msg.indexOf("File could not be played") > -1){

              scrollTo = $('body').scrollTop();
              if (!$.cookie('episode-' + epid) || $.cookie('episode-' + epid) <= 2){
                if (Plugins.Core.SetupTimeout <= 2){



                  Plugins.Core.SetupTimeout++;
                  Plugins.Core.cGxheWVy();
                  $.cookie('episode-' + epid, Plugins.Core.SetupTimeout, {
                    expires: 30,
                    path: '/'
                  });
                }
              }else{

                if ($.parseJSON($.cookie('episode-' + epid)) >= 2) {
                  $('.jw-title').css("display", "none");
                  $('.jw-display-icon-container').css("display", "none");
                  $('.jw-icon-container').html($('<div class="error-box"><div class="report-header"><div class="report-title">Lỗi tập phim: ' + title + '</div></div><div class="report-body"><label>Hiện tập phim này đang bị lỗi có thể do những nguyên nhân sau đây:</label><ol><li>1. Link đã không thể xem được do nhà cung cấp</li><li>2. Do kết nối Server tắt nghẽn hoặc sự có khác</li><li>3. Do bản quyền bên thứ 3</li></ol><div class="note">Lưu ý: <span>Khi xem không được tập vui lòng chọn Server khác để xem <b>phim ' + title + ' </b> nếu có</span></div><button type="button" id="next-episode" class="btn btn-w-m btn-white">Tập khác ></button></div></div>'));

                  toastr.error('Hiện tập phim ' + title + ' đã không xem được chúng tôi sẽ cập nhật lại sớm nhất có thể');
                  Plugins.Core.sendEpiDie(epid, parseInt(2));
                }
              }

              $('#next-episode').click(function() {
                autonext();
              });

            } else {
              alert(222);
              Plugins.Core.cGxheWVy();
              Plugins.Core.sendEpiDie(epid, parseInt(1));
            }
          }).onError(function(e) {

            var msg = e.message;

            if (msg.indexOf("No playable sources found") > -1 || msg.indexOf("Error loading playlist") > -1 || msg.indexOf("File could not be played") > -1){

              var data = {'fixid':epid}
              var success_fnc = function (data) {
                //$('#'+element.id).html(data);
              }
              AppPack.Core.aGFuZGxlQWpheA('ajax/episode/flink', 'POST', '', data, success_fnc);

              location.reload();
            }

          });

        } else {

          $('#mediaplayer #player').css({
            'width': '100%',
            'height': '100%'
          });

          var embed = data.embed;

          $('#mediaplayer #player').html(embed);
        }

      }

    }
  },



  sendEpiDie: function(episode, rperror) {
    Light.ajax({
      url: document.location.href,
      data: {
        episode: episode,
        reporterror: rperror
      },
      type: 'POST',
      cache: false,
      success: function(data) {

      },
      error: function(e) {

      }
    });
  },

  Y29va2ll: function() {
    (function(a) {
      if (typeof define === 'function' && define.amd) {
        define(['jquery'], a)
      } else if (typeof exports === 'object') {
        a(require('jquery'))
      } else {
        a(jQuery)
      }
    }(function($) {
      var k = /\+/g;

      function encode(s) {
        return m.raw ? s : encodeURIComponent(s)
      }

      function decode(s) {
        return m.raw ? s : decodeURIComponent(s)
      }

      function stringifyCookieValue(a) {
        return encode(m.json ? JSON.stringify(a) : String(a))
      }

      function parseCookieValue(s) {
        if (s.indexOf('"') === 0) {
          s = s.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, '\\')
        }
        try {
          s = decodeURIComponent(s.replace(k, ' '));
          return m.json ? JSON.parse(s) : s
        } catch (e) {}
      }

      function read(s, a) {
        var b = m.raw ? s : parseCookieValue(s);
        return $.isFunction(a) ? a(b) : b
      }
      var m = $.cookie = function(a, b, c) {
        if (b !== undefined && !$.isFunction(b)) {
          c = $.extend({}, m.defaults, c);
          if (typeof c.expires === 'number') {
            var d = c.expires,
                t = c.expires = new Date();
            t.setTime(+t + d * 864e+5)
          }
          return (document.cookie = [encode(a), '=', stringifyCookieValue(b), c.expires ? '; expires=' + c.expires.toUTCString() : '', c.path ? '; path=' + c.path : '', c.domain ? '; domain=' + c.domain : '', c.secure ? '; secure' : ''].join(''))
        }
        var e = a ? undefined : {};
        var f = document.cookie ? document.cookie.split('; ') : [];
        for (var i = 0, l = f.length; i < l; i++) {
          var g = f[i].split('=');
          var h = decode(g.shift());
          var j = g.join('=');
          if (a && a === h) {
            e = read(j, b);
            break
          }
          if (!a && (j = read(j)) !== undefined) {
            e[h] = j
          }
        }
        return e
      };
      m.defaults = {};
      $.removeCookie = function(a, b) {
        if ($.cookie(a) === undefined) {
          return false
        }
        $.cookie(a, '', $.extend({}, b, {
          expires: -1
        }));
        return !$.cookie(a)
      }
    }));
  }
}

AppPack.Core.vW5bvmHuFaTT(Plugins.init());

$(".ccscript").remove();