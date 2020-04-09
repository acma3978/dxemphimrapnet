var AppPack = {};

$(document).ready(function(e){
    jwplayer.key = "ruFSYlSYxjskn0jYnCBjL4uDRGTX0wnKaih8OQ==";
    AppPack.TowrTE();
});

AppPack.TowrTE = function(){

    AppPack.yagZGaDUyagi.init();
};

AppPack.yagZGaDUyagi = {

    init: function(){
        $(document).ready(function(e){

            AppPack.X2gUGHme.init();

            AppPack.B29PvB.v29Qv2DpkowAfoD5yapzGx();
            AppPack.B29PvB.Vpw1vWl5W0mQT2ZrvB();
            AppPack.B29PvB.GFlQf2gOG19UVHw4();
            AppPack.B29PvB.XHgZT3vpBodnTapzV0i();

            AppPack.yagZGaDUyagi.THw2TogAyg9Of3lQTax();
            AppPack.yagZGaDUyagi.T3yKB2wPT3gOvox();
            AppPack.yagZGaDUyagi.ya9UG3dP();
            AppPack.yagZGaDUyagi.XHgUva1QGHXAVbM();
            AppPack.yagZGaDUyagi.G2DrTgmzGH9KTi();
            AppPack.yagZGaDUyagi.YogAyX5UyHpbfWdrT25i();
            AppPack.yagZGaDUyagi.registerRate();
            AppPack.yagZGaDUyagi.sRate();

            AppPack.yagZGaDUyagi.FCwbzBTT();
        })
    },

    YogAyX5UyHpbfWdrT25i: function() {
        eval(function(p,a,c,k,e,r){e=function(c){return c.toString(a)};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('$(\'3.f\').o(\'n\').j(4(){$(2).g(4(e){$(2).9(\'b\');c a=$(2).6(\'3:8(0)\');h(i a.5()!=\'k\'&&a.5()<=1){a.l(m).9(\'d\')}},4(){$(2).7(\'b\');c a=$(2).6(\'3:8(0)\');a.p(q).7(\'d\')})});',27,27,'||this|ul|function|queue|children|removeClass|eq|addClass||active|var|show||menu|hover|if|typeof|each|undefined|slideDown|150|li|find|slideUp|100'.split('|'),0,{}))
    },

    sRate: function() {

        var filmId = $('.i-box_star').data('filmid');

        var delimited_data = "";
        $('.i-box_star').each(function() {
            var Vote = $(this).data('vote');
            var Rate = $(this).data('rate');
            var Frate = $(this).data('filmid');
        });

        var Vote = $('.star-rate-' + filmId).data('vote');
        var Rate = $('.star-rate-' + filmId).data('rate');
        var Frate = $('.star-rate-' + filmId).data('frate');

        if ($('.star-rate-' + filmId).length) {

            $('.star-rate-' + filmId).raty({
                readOnly: true,
                round: {
                    down: .25,
                    full: .6,
                    up: .76
                },
                half: true,
                score: Frate,
            });
        }
    },

    registerRate: function() {

        var $showRating = $('.show-star-rate');

        var filmId = $('.box_star').data('filmid');

        var Vote = $('.item-star-rate').data('vote');
        var Rate = $('.item-star-rate').data('rate');
        var Frate = $('.item-star-rate').data('frate');

        if ($('.item-star-rate').length) {
            if (!$.cookie('rate-' + filmId)) {
                $('.item-star-rate').raty({
                    click: function(score, evt) {
                        AppPack.yagZGaDUyagi.rate_star(filmId, score);
                    },
                    target: '.item-hint',
                    round: {
                        down: .25,
                        full: .6,
                        up: .76
                    },
                    half: true,
                    score: Frate,
                });
                $('.box_star .item-hint').html('<span class="starv">' + Vote + '</span> sao | <span class="rate">' + Rate + '</span> bình chọn <span class="icon usero"></span>');
            } else {
                $('.item-star-rate').raty({
                    readOnly: true,
                    score: function() {
                        return $(this).attr('data-frate');
                    },
                });
                $('.box_star .item-hint').html('<span class="starv">' + Vote + '</span> sao | <span class="rate">' + Rate + '</span> bình chọn <span class="icon usero"></span>');
                $('.item-star-rate').find('img').prop('title', 'Bạn đã bình chọn rồi!');
                $('.item-star-rate').prop('title', 'Bạn đã bình chọn rồi!');
            }


        }
        if ($showRating.length) {
            var Frate = $('.list-item').data('frate');

            $(".list-item").each(function(n) {
                var Frate = $(this).data('frate');
                $('.show-star-rate').raty({
                    readOnly: true,
                    score: function() {
                        return Frate;
                    },
                });

            });


        }
    },

    rate_star: function(filmId, Score) {

        $.ajax({
            url: 'ajax/film/rate/',
            type: 'POST',
            data: {
                film_id: filmId,
                pin: btoa(Score)
            },
            success: function(data) {
                if (!data.error) {

                    var fscore = data.frate_format;
                    var star = data.liked_vote;
                    var rate_time = data.liked_times;

                    $('.item-star-rate').raty({
                        readOnly: true,
                        score: Score
                    });

                    $('.box_star .item-hint').html('<span class="starv">' + star + '</span> sao | <span class="rate">' + rate_time + '</span> bình chọn <span class="icon usero"></span>');
                    $('.box_star .item-big-star').html(fscore);
                    $('.item-star-rate').find('img').prop('title', 'Bạn đã bình chọn rồi!');
                    toastr.success('Đánh giá của bạn đã được ghi nhận.');
                }
            }
        });
    },

    FCwbzBTT: function() {
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
                cancelOff: document.location.origin + '/assets/frontend/default/images/plugins/rate/cancel-off.png',
                cancelOn: document.location.origin + '/assets/frontend/default/images/plugins/rate/cancel-on.png',
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
                starHalf: document.location.origin + '/assets/frontend/default/images/plugins/rate/star-half.png',
                starOff: document.location.origin + '/assets/frontend/default/images/plugins/rate/star-off.png',
                starOn: document.location.origin + '/assets/frontend/default/images/plugins/rate/star-on.png',
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

    G2DrTgmzGH9KTi: function() {
        (function(e) {
            eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('e.25.1Q({2x:7(f){j a=e.1Q({E:"L",5:"2w",Z:"10",1O:"#2n",s:"1b",X:"2i",U:"8",R:.4,N:!1,1D:!1,Y:!1,1C:"#1V",1y:.2,1v:!0,1a:"2y",1c:"2k",S:"2h",1s:!1,1n:20,1m:1Y,P:"10",1l:"10"},f);O.1U(7(){7 v(d){o(r){d=d||1k.1R;j c=0;d.1j&&(c=-d.1j/2l);d.1g&&(c=d.1g/3);e(d.1S||d.27||d.24).2p("."+a.S).1X(b.i())&&n(c,!0);d.W&&!k&&d.W();k||(d.26=!1)}}7 n(d,g,e){k=!1;j f=b.9()-c.9();g&&(g=M(c.6("8"))+d*M(a.1n)/1x*c.9(),g=F.1f(F.13(g,0),f),g=0<d?F.1W(g):F.22(g),c.6({8:g+"12"}));l=M(c.6("8"))/(b.9()-c.9());g=l*(b[0].19-b.9());e&&(g=d,d=g/b[0].19*b.9(),d=F.1f(F.13(d,0),f),c.6({8:d+"12"}));b.1h(g);b.1i("28",~~g);w();p()}7 x(){u=F.13(b.9()/b[0].19*b.9(),1T);c.6({5:u+"12"});j a=u==b.9()?"18":"16";c.6({14:a})}7 w(){x();1Z(B);l==~~l?(k=a.1s,C!=l&&b.1i("Q",0==~~l?"8":"1o")):k=!1;C=l;u>=b.9()?k=!0:(c.1p(!0,!0).1q("1r"),a.Y&&m.1p(!0,!0).1q("1r"))}7 p(){a.N||(B=29(7(){a.1D&&r||y||z||(c.1t("1u"),m.1t("1u"))},2u))}j r,y,z,B,A,u,l,C,k=!1,b=e(O);o(b.i().2C(a.S)){j q=b.1h(),c=b.1w("."+a.1c),m=b.1w("."+a.1a);x();o(e.1d(f)){o("5"J f&&"L"==f.5){b.i().6("5","L");b.6("5","L");j h=b.i().i().5();b.i().6("5",h);b.6("5",h)}T"5"J f&&(h=f.5,b.i().6("5",h),b.6("5",h));o("1z"J f)q=M(a.1z);T o("1e"J f)q+=M(a.1e);T o("1A"J f){c.1B();m.1B();b.21();V}n(q,!1,!0)}}T o(!(e.1d(f)&&"1A"J f)){a.5="L"==a.5?b.i().5():a.5;q=e("<G></G>").17(a.S).6({s:"23",1E:"1F",E:a.E,5:a.5});b.6({1E:"1F",E:a.E,5:a.5});j m=e("<G></G>").17(a.1a).6({E:a.Z,5:"1x%",s:"1G",8:0,14:a.N&&a.Y?"16":"18","1H-1I":a.1l,1J:a.1C,R:a.1y,1K:2a}),c=e("<G></G>").17(a.1c).6({1J:a.1O,E:a.Z,s:"1G",8:0,R:a.R,14:a.N?"16":"18","1H-1I":a.P,2b:a.P,2c:a.P,2d:a.P,1K:2e}),h="1b"==a.s?{1b:a.X}:{2f:a.X};m.6(h);c.6(h);b.2g(q);b.i().1L(c);b.i().1L(m);a.1v&&c.I("2j",7(a){j b=e(1M);z=!0;t=2m(c.6("8"));D=a.D;b.I("2o.Q",7(a){1N=t+a.D-D;c.6("8",1N);n(0,c.s().8,!1)});b.I("2q.Q",7(a){z=!1;p();b.2r(".Q")});V!1}).I("2s.Q",7(a){a.2t();a.W();V!1});m.11(7(){w()},7(){p()});c.11(7(){y=!0},7(){y=!1});b.11(7(){r=!0;w();p()},7(){r=!1;p()});b.I("2v",7(a,b){a.H.K.1P&&(A=a.H.K[0].D)});b.I("2z",7(b){k||b.H.W();b.H.K.1P&&(n((A-b.H.K[0].D)/a.1m,!0),A=b.H.K[0].D)});x();"1o"===a.U?(c.6({8:b.9()-c.9()}),n(0,!0)):"8"!==a.U&&(n(e(a.U).s().8,2A,!0),a.N||c.2B());1k.15?(O.15("2D",v,!1),O.15("2E",v,!1)):1M.2F("2G",v)}});V O}});',62,167,'|||||height|css|function|top|outerHeight|||||||||parent|var|||||if||||position|||||||||||pageY|width|Math|div|originalEvent|bind|in|touches|auto|parseInt|alwaysVisible|this|borderRadius|slimscroll|opacity|wrapperClass|else|start|return|preventDefault|distance|railVisible|size|7px|hover|px|max|display|addEventListener|block|addClass|none|scrollHeight|railClass|right|barClass|isPlainObject|scrollBy|min|detail|scrollTop|trigger|wheelDelta|window|railBorderRadius|touchScrollStep|wheelStep|bottom|stop|fadeIn|fast|allowPageScroll|fadeOut|slow|railDraggable|siblings|100|railOpacity|scrollTo|destroy|remove|railColor|disableFadeOut|overflow|hidden|absolute|border|radius|background|zIndex|append|document|currTop|color|length|extend|event|target|30|each|333|ceil|is|200|clearTimeout||unwrap|floor|relative|srcElement|fn|returnValue|srcTarget|slimscrolling|setTimeout|90|BorderRadius|MozBorderRadius|WebkitBorderRadius|99|left|wrap|slimScrollDiv|1px|mousedown|slimScrollBar|120|parseFloat|000|mousemove|closest|mouseup|unbind|selectstart|stopPropagation|1E3|touchstart|250px|slimScroll|slimScrollRail|touchmove|null|hide|hasClass|DOMMouseScroll|mousewheel|attachEvent|onmousewheel'.split('|'),0,{}))
            e.fn.extend({
                slimscroll: e.fn.slimScroll
            })
            eval(function(p,a,c,k,e,r){e=function(c){return c.toString(a)};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('7(\'.a-c .3-4\').5({6:\'b\',1:0,2:0});7(\'.8-d-9 .3-4\').5({6:\'e\',1:0,2:0});7(\'.8-f-9 .3-4\').5({6:\'g\',1:0,2:0});',17,17,'true|railVisible|alwaysVisible|Bg|slimScrollDiv|slimScroll|height|jQuery|bg|film|article|450px|block|profile|285px|content|1000px'.split('|'),0,{}))
        })(jQuery);
    },

    XHgUva1QGHXAVbM: function(){
        eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('!3(t){"3"==u P&&P.20?P(["T"],t):"U"==u V?1W.V=t(1T("T")):t(1R)}(3(t){"1P 1O";3 e(t,e,i){5 a;p 3(){5 n=2,o=S,r=3(){a=D,i||t.C(n,o)},s=i&&!a;1N(a),a=1L(r,e),s&&t.C(n,o)}}3 i(t){5 e=++h;p 1K(D==t?"1J-":t)+e}3 a(t){5 e=t.1I().8({b:"1j",M:t.M(),w:"Y",Z:"14"}).1F(t),i=e.17(),a=1E(e.8({w:""}).8("1D-b").1C(/[^-\\d\\.]/g,""),10),n=t.4("1i");e.R();5 o=a||t.4("k")||n;t.4({H:i,w:a,k:o}).8({w:"Y"})}3 n(t){K(!d[t.j]){5 e=" ";t.W&&""!==t.O&&(e+=t.j+" + [4-7-c], "+t.j+"[4-7]{"+t.O+"}"),e+=t.j+"[4-7]{1y: b "+t.12+"1w;Z: 14;}",3(t,e){5 i=t.1v("1u");i.1s="1r/8",i.1g?i.1g.1q=e:i.1b(t.1p(e)),t.1o("1n")[0].1b(i)}(1m,e),d[t.j]=!0}}3 o(e,i){2.q=e,2.6=t.1l({},s,i),n(2.6),2.1k=s,2.1H=r,2.F(),v.L?(v.L("1d",l),v.L("1a",l)):(v.18("1d",l),v.18("1a",l))}5 r="7",s={12:I,k:1t,B:16,Q:\'<a 13="#">1xển 11ị 11êm</a>\',G:\'<a 13="#">Đó1z</a>\',W:!0,O:"1A: 1B; M: I%;",x:!1,1c:3(){},19:3(){}},d={},h=0,l=e(3(){t("[4-7]").y(3(){5 e=t(2),i="1G"===e.9("f-z");a(e),e.8({b:e.4(i?"H":"k")})})},I);o.1f={F:3(){5 e=t(2.q);e.4({1i:2.6.k,B:2.6.B}),a(e);5 n=e.4("k"),o=e.4("B");K(e.17(!0)<=n+o)p!0;5 r=e.9("A")||i(),s=2.6.x?2.6.G:2.6.Q;e.9({"4-7":"","f-z":2.6.x,A:r}),e.1M(t(s).J("1h",3(t){p 3(i){t.c(2,e[0],i)}}(2)).9({"4-7-c":"","f-N":r})),2.6.x||e.8({b:n})},c:3(e,i,a){a&&a.1Q(),e||(e=t(\'[f-N="\'+1e.q.A+\'"]\')[0]),i||(i=1e.q);5 n=t(i),o="",r="",s=!1,d=n.4("k");n.b()<=d?(o=n.4("H")+"1S",r="G",s=!0):(o=d,r="Q"),2.6.1c(e,n,!s),n.8({b:o}),n.J("15",3(i){p 3(){i.6.19(e,n,s),t(2).9({"f-z":s}).1U("15")}}(2)),t(e).1V(t(2.6[r]).J("1h",3(t){p 3(e){t.c(2,i,e)}}(2)).9({"4-7-c":"","f-N":n.9("A")}))},X:3(){t(2.q).y(3(){5 e=t(2);e.9({"4-7":D,"f-z":D}).8({w:"",b:""}).1X("[4-7-c]").R(),e.1Y()})}},t.1Z.7=3(e){5 i=S,a=2.j;p e=e||{},"U"==u e?2.y(3(){K(t.4(2,"E"+r)){5 i=t.4(2,"E"+r);i.X.C(i)}e.j=a,t.4(2,"E"+r,21 o(2,e))}):"22"==u e&&"23"!==e[0]&&"F"!==e?2.y(3(){5 a=t.4(2,"E"+r);a 24 o&&"3"==u a[e]&&a[e].C(a,25.1f.26.27(i,1))}):28 0}});',62,133,'||this|function|data|var|options|readmore|css|attr||height|toggle|||aria||||selector|collapsedHeight|||||return|element||||typeof|window|maxHeight|startOpen|each|expanded|id|heightMargin|apply|null|plugin_|init|lessLink|expandedHeight|100|on|if|addEventListener|width|controls|blockCSS|define|moreLink|remove|arguments|jquery|object|exports|embedCSS|destroy|none|overflow||th|speed|href|hidden|transitionend||outerHeight|attachEvent|afterToggle|resize|appendChild|beforeToggle|load|_this|prototype|styleSheet|click|defaultHeight|auto|_defaults|extend|document|head|getElementsByTagName|createTextNode|cssText|text|type|245|style|createElement|ms|Hi|transition|ng|display|block|replace|max|parseInt|insertAfter|true|_name|clone|rmjs|String|setTimeout|after|clearTimeout|strict|use|preventDefault|jQuery|px|require|off|replaceWith|module|next|removeData|fn|amd|new|string|_|instanceof|Array|slice|call|void'.split('|'),0,{}));
        $('article').readmore({
            speed: 75,
            lessLink: '<a href="#">Ẩn bớt</a>'
        });
    },

    THw2TogAyg9Of3lQTax: function() {
        eval(function(p,a,c,k,e,r){e=function(c){return c.toString(a)};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('9 c=0;$(l).u(t(){9 a=$(\'#r\');9 b=$(l).q();2(b>p){$(".1-4").8("3-1");2(b>i){$(".5-6-7").8("o n 3-1-m")}e{$(".5-6-7").d("3-1-m")}2(b>c){2(b>i){$(".1-4").8("k");$(".5-6-7").j({"h":"0"})}}e{$(".1-4").d("k");$(".5-6-7").j({"h":"s"})}c=b;g f}e{$(".1-4").d("3-1");g f}2(a.v){}});',32,32,'|nav|if|fix|menu|sub|main|header|addClass|var|||previousScroll|removeClass|else|false|return|top|357|css|hide|window|prof|animated|fadeInDown|90|scrollTop|btnScroll|47px|function|scroll|length'.split('|'),0,{}))
    },

    ya9UG3dP: function() {
        eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('!3(e){e(["1I"],3(e){4 3(){3 t(e,t,n){4 f({M:O.x,7:g().G.x,6:e,z:n,B:t})}3 n(t,n){4 t||(t=g()),v=e("#"+t.1g),v.q?v:(n&&(v=c(t)),v)}3 i(e,t,n){4 f({M:O.8,7:g().G.8,6:e,z:n,B:t})}3 o(e){w=e}3 s(e,t,n){4 f({M:O.j,7:g().G.j,6:e,z:n,B:t})}3 a(e,t,n){4 f({M:O.k,7:g().G.k,6:e,z:n,B:t})}3 r(e){9 t=g();v||n(t),l(e,t)||u(t)}3 d(t){9 i=g();4 v||n(i),t&&0===e(":1f",t).q?A h(t):A(v.1e().q&&v.P())}3 u(t){2k(9 n=v.1e(),i=n.q-1;i>=0;i--)l(e(n[i]),t)}3 l(t,n){4 t&&0===e(":1f",t).q?(t[n.1d]({R:n.1c,S:n.1a,16:3(){h(t)}}),!0):!1}3 c(t){4 v=e("<N/>").Q("2i",t.1g).y(t.1G).Q("2h-2f","28").Q("1s","27"),v.26(e(t.1A)),v}3 p(){4{1D:!0,1F:"5",1g:"5-25",1m:!1,Y:"1L",17:1Z,X:"1x",1y:A 0,1d:"1X",1c:1B,1a:"1x",Z:A 0,U:1B,G:{x:"5-x",8:"5-8",j:"5-j",k:"5-k"},7:"5-8",1G:"5-1W-1U",K:1S,1k:"5-B",1l:"5-6",1A:"1Q",1n:\'<H M="H">&1P;</H>\',1q:!0,1r:!1,18:!1}}3 m(e){w&&w(e)}3 f(t){3 i(t){4!e(":1f",l).q||t?(1u(O.19),l[r.1d]({R:r.1c,S:r.1a,16:3(){h(l),r.Z&&"1w"!==b.1b&&r.Z(),b.1b="1w",b.1O=F I,m(b)}})):A 0}3 o(){(r.K>0||r.U>0)&&(u=1C(i,r.U),O.D=1E(r.U),O.J=(F I).1h()+O.D)}3 s(){1u(u),O.J=0,l.1N(!0,!0)[r.Y]({R:r.17,S:r.X})}3 a(){9 e=(O.J-(F I).1h())/O.D*24;f.1M(e+"%")}9 r=g(),d=t.7||r.7;1K("1J"!=1i t.z&&(r=e.1H(r,t.z),d=t.z.7||d),r.1r){1K(t.6===C)4;C=t.6}T++,v=n(r,!0);9 u=E,l=e("<N/>"),c=e("<N/>"),p=e("<N/>"),f=e("<N/>"),w=e(r.1n),O={19:E,J:E,D:E},b={1R:T,1b:"1j",1T:F I,13:r,1V:t};4 t.7&&l.y(r.1F).y(d),t.B&&(c.L(t.B).y(r.1k),l.L(c)),t.6&&(p.L(t.6).y(r.1l),l.L(p)),r.1z&&(w.y("5-1Y-H").Q("1s","H"),l.W(w)),r.18&&(f.y("5-20"),l.W(f)),l.21(),r.1q?v.W(l):v.L(l),l[r.Y]({R:r.17,S:r.X,16:r.1y}),r.K>0&&(u=1C(i,r.K),O.D=1E(r.K),O.J=(F I).1h()+O.D,r.18&&(O.19=22(a,10))),l.23(s,o),!r.V&&r.1D&&l.11(i),r.1z&&w&&w.11(3(e){e.1v?e.1v():A 0!==e.12&&e.12!==!0&&(e.12=!0),i(!0)}),r.V&&l.11(3(){r.V(),i()}),m(b),r.1m&&1p&&1p.29(b),l}3 g(){4 e.1H({},p(),b.13)}3 h(e){v||(v=n()),e.2a(":1j")||(e.P(),e=E,0===v.1e().q&&(v.P(),C=A 0))}9 v,w,C,T=0,O={x:"x",8:"8",j:"j",k:"k"},b={2b:r,P:d,x:t,2c:n,8:i,13:{},2d:o,j:s,2e:"2.1.0",k:a};4 b}()})}("3"==1i 14&&14.2g?14:3(e,t){"1J"!=1i 15&&15.1t?15.1t=t(2j("1I")):1o.2l=t(1o.2m)});',62,147,'|||function|return|toast|message|iconClass|info|var||||||||||success|warning||||||length|||||||error|addClass|optionsOverride|void|title||maxHideTime|null|new|iconClasses|button|Date|hideEta|timeOut|append|type|div||remove|attr|duration|easing||extendedTimeOut|onclick|prepend|showEasing|showMethod|onHidden||click|cancelBubble|options|define|module|complete|showDuration|progressBar|intervalId|hideEasing|state|hideDuration|hideMethod|children|focus|containerId|getTime|typeof|visible|titleClass|messageClass|debug|closeHtml|window|console|newestOnTop|preventDuplicates|role|exports|clearTimeout|stopPropagation|hidden|swing|onShown|closeButton|target|1e3|setTimeout|tapToDismiss|parseFloat|toastClass|positionClass|extend|jquery|undefined|if|fadeIn|width|stop|endTime|times|body|toastId|5e3|startTime|right|map|top|fadeOut|close|300|progress|hide|setInterval|hover|100|container|appendTo|alert|polite|log|is|clear|getContainer|subscribe|version|live|amd|aria|id|require|for|toastr|jQuery'.split('|'),0,{}))
    },

    T3yKB2wPT3gOvox: function() {
        eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('!8(a,b,c,d){8 e(b,c){7.n=B,7.D=a.1B({},e.19,c),7.$w=a(b),7.N={},7.3j={},7.3S={},7.1I=B,7.4a=B,7.1q=[],7.5u=B,7.3r=B,7.G=[],7.1K=[],7.29=[],7.3L=[],7.3b={},7.3t=[],7.1i={4F:B,1P:B,1V:B,z:{2K:B,F:B},4X:B},7.1h={F:{},1r:{4s:["6I"],3B:["6I"],36:["4V"]}},a.1b(["4O","3O"],a.q(8(b,c){7.N[c]=a.q(7[c],7)},7)),a.1b(e.26,a.q(8(a,b){7.3j[a.4A(0).5f()+a.2c(1)]=1l b(7)},7)),a.1b(e.6o,a.q(8(b,c){7.3t.1s({1d:c.1d,1e:a.q(c.1e,7)})},7)),7.4L(),7.2X()}e.19={H:3,2x:!1,1S:!1,3k:!1,6k:!0,6j:!0,6e:!0,6d:!0,6b:!1,28:0,2r:0,1k:!1,5q:!0,2g:!1,4o:0,1A:!1,4u:5E,8M:!1,5H:!1,2V:{},5I:8H,4C:b,5J:"8C",5h:"",8A:!1,3v:!1,5K:"1u",5L:"1u",49:"o-1C",5k:"o-3g",47:"o-3n",4B:"o-1A",42:"o-2V",4D:"o-4N",41:"o-50",56:"o-z",5N:"o-z-5P",3V:"o-8t"},e.3T={5S:"5W",5Z:"8m",61:"5P"},e.3A={3y:"2q",66:"69"},e.26={},e.6o=[{1d:["C","n"],1e:8(){7.3r=7.$w.C()}},{1d:["C","H","n"],1e:8(a){a.F=7.G&&7.G[7.Z(7.1I)]}},{1d:["H","n"],1e:8(){7.$z.14(".3q").1w()}},{1d:["C","H","n"],1e:8(a){r b=7.n.28||"",c=!7.n.2g,d=7.n.1A,e={C:"87","28-1O":d?b:"","28-44":d?"":b};!c&&7.$z.14().1a(e),a.1a=e}},{1d:["C","H","n"],1e:8(a){r b=(7.C()/7.n.H).86(3)-7.n.28,c=B,d=7.G.u,e=!7.n.2g,f=[];R(a.H={1k:!1,C:b};d--;)c=7.29[d],c=7.n.5q&&Q.2d(c,7.n.H)||c,a.H.1k=c>1||a.H.1k,f[d]=e?b*c:7.G[d].C();7.3L=f}},{1d:["H","n"],1e:8(){r b=[],c=7.G,d=7.n,e=Q.2n(2*d.H,4),f=2*Q.4h(c.u/2),g=d.2x&&c.u?d.3k?e:Q.2n(e,f):0,h="",i="";R(g/=2;g>0;)b.1s(7.1Q(b.u/2,!0)),h+=c[b[b.u-1]][0].52,b.1s(7.1Q(c.u-1-(b.u-1)/2,!0)),i=c[b[b.u-1]][0].52+i,g-=1;7.1K=b,a(h).Y("3q").4n(7.$z),a(i).Y("3q").6p(7.$z)}},{1d:["C","H","n"],1e:8(){R(r a=7.n.1A?1:-1,b=7.1K.u+7.G.u,c=-1,d=0,e=0,f=[];++c<b;)d=f[c-1]||0,e=7.3L[7.Z(c)]+7.n.28,f.1s(d+e*a);7.1q=f}},{1d:["C","H","n"],1e:8(){r a=7.n.2r,b=7.1q,c={C:Q.4h(Q.2i(b[b.u-1]))+2*a,"6t-1O":a||"","6t-44":a||""};7.$z.1a(c)}},{1d:["C","H","n"],1e:8(a){r b=7.1q.u,c=!7.n.2g,d=7.$z.14();U(c&&a.H.1k)R(;b--;)a.1a.C=7.3L[7.Z(b)],d.2k(b).1a(a.1a);2S c&&(a.1a.C=a.H.C,d.1a(a.1a))}},{1d:["H"],1e:8(){7.1q.u<1&&7.$z.7Z("3P")}},{1d:["C","H","n"],1e:8(a){a.F=a.F?7.$z.14().22(a.F):0,a.F=Q.2n(7.2b(),Q.2d(7.23(),a.F)),7.2Q(a.F)}},{1d:["15"],1e:8(){7.33(7.1p(7.1I))}},{1d:["C","15","H","n"],1e:8(){r a,b,c,d,e=7.n.1A?1:-1,f=2*7.n.2r,g=7.1p(7.F())+f,h=g+7.C()*e,i=[];R(c=0,d=7.1q.u;c<d;c++)a=7.1q[c-1]||0,b=Q.2i(7.1q[c])+f*e,(7.2f(a,"<=",g)&&7.2f(a,">",h)||7.2f(b,"<",g)&&7.2f(b,">",h))&&i.1s(c);7.$z.14(".35").1f("35"),7.$z.14(":2k("+i.2z("), :2k(")+")").Y("35"),7.$z.14(".1S").1f("1S"),7.n.1S&&7.$z.14().2k(7.F()).Y("1S")}}],e.p.6x=8(){7.$z=7.$w.1g("."+7.n.56),7.$z.u||(7.$w.Y(7.D.47),7.$z=a("<"+7.n.5L+">",{1F:7.n.56}).4Y(a("<1u/>",{1F:7.n.5N})),7.$w.39(7.$z.34()))},e.p.6E=8(){r b=7.$w.1g(".o-50");U(b.u)t 7.G=b.3G().2D(8(b){t a(b)}),7.29=7.G.2D(8(){t 1}),6F 7.1C();7.38(7.$w.14().5e(7.$z.34())),7.37()?7.1C():7.1U("C"),7.$w.1f(7.D.47).Y(7.D.5k)},e.p.2X=8(){U(7.25("4s"),7.K("2X"),7.$w.2J(7.n.4B,7.n.1A),7.n.2g&&!7.X("4k-3n")){r a,b,c;a=7.$w.1g("4l"),b=7.n.3v?"."+7.n.3v:d,c=7.$w.14(b).C(),a.u&&c<=0&&7.6K(a)}7.6x(),7.6E(),7.6L(),7.1J("4s"),7.K("27")},e.p.37=8(){t!7.n.6k||7.$w.X(":7O")},e.p.4L=8(){r b=7.4E(),c=7.D.2V,d=-1,e=B;c?(a.1b(c,8(a){a<=b&&a>d&&(d=7N(a))}),e=a.1B({},7.D,c[d]),"8"==1D e.2r&&(e.2r=e.2r()),6N e.2V,e.42&&7.$w.J("1F",7.$w.J("1F").38(1l 6S("("+7.D.42+"-)\\\\S+\\\\s","g"),"$1"+d))):e=a.1B({},7.D),7.K("4p",{1c:{T:"n",2M:e}}),7.5u=d,7.n=e,7.1U("n"),7.K("2L",{1c:{T:"n",2M:7.n}})},e.p.6U=8(){7.n.2g&&(7.n.2r=!1,7.n.1k=!1)},e.p.4i=8(b){r c=7.K("4i",{1G:b});t c.I||(c.I=a("<"+7.n.5K+"/>").Y(7.D.41).39(b)),7.K("4g",{1G:c.I}),c.I},e.p.1t=8(){R(r b=0,c=7.3t.u,d=a.q(8(a){t 7[a]},7.3b),e={};b<c;)(7.3b.7F||a.4c(7.3t[b].1d,d).u>0)&&7.3t[b].1e(e),b++;7.3b={},!7.X("2Y")&&7.25("2Y")},e.p.C=8(a){6X(a=a||e.3T.5S){2Z e.3T.5Z:2Z e.3T.61:t 7.3r;5W:t 7.3r-2*7.n.2r+7.n.28}},e.p.1C=8(){7.25("6Y"),7.K("1C"),7.4L(),7.6U(),7.$w.Y(7.D.49),7.1t(),7.$w.1f(7.D.49),7.1J("6Y"),7.K("3E")},e.p.3O=8(){b.31(7.4v),7.4v=b.4b(7.N.4O,7.n.5I)},e.p.4O=8(){t!!7.G.u&&(7.3r!==7.$w.C()&&(!!7.37()&&(7.25("48"),7.K("3h").7u()?(7.1J("48"),!1):(7.1U("C"),7.1C(),7.1J("48"),6F 7.K("73")))))},e.p.6L=8(){a.18.1v&&7.$z.V(a.18.1v.1H+".o.E",a.q(7.3o,7)),!1!==7.n.2V&&7.V(b,"3h",7.N.3O),7.n.6j&&(7.$w.Y(7.D.4D),7.$z.V("77.o.E",a.q(7.4M,7)),7.$z.V("7p.o.E 7I.o.E",8(){t!1})),7.n.6e&&(7.$z.V("6Q.o.E",a.q(7.4M,7)),7.$z.V("7K.o.E",a.q(7.4R,7)))},e.p.4M=8(b){r d=B;3!==b.7U&&(a.18.2F?(d=7.$z.1a("2F").38(/.*\\(|\\)| /g,"").4U(","),d={x:d[16===d.u?12:4],y:d[16===d.u?13:5]}):(d=7.$z.15(),d={x:7.n.1A?d.1O+7.$z.C()-7.C()+7.n.28:d.1O,y:d.81}),7.X("3B")&&(a.18.2F?7.33(d.x):7.$z.2a(),7.1U("15")),7.$w.2J(7.D.3V,"77"===b.17),7.2j(0),7.1i.4F=(1l 59).5a(),7.1i.1P=a(b.1P),7.1i.z.2K=d,7.1i.z.F=d,7.1i.1V=7.1V(b),a(c).V("82.o.E 6s.o.E",a.q(7.4R,7)),a(c).2E("6r.o.E 6q.o.E",a.q(8(b){r d=7.3H(7.1i.1V,7.1V(b));a(c).V("6r.o.E 6q.o.E",a.q(7.6n,7)),Q.2i(d.x)<Q.2i(d.y)&&7.X("2Y")||(b.3K(),7.25("36"),7.K("4N"))},7)))},e.p.6n=8(a){r b=B,c=B,d=B,e=7.3H(7.1i.1V,7.1V(a)),f=7.3H(7.1i.z.2K,e);7.X("36")&&(a.3K(),7.n.2x?(b=7.1p(7.2b()),c=7.1p(7.23()+1)-b,f.x=((f.x-b)%c+c)%c+b):(b=7.n.1A?7.1p(7.23()):7.1p(7.2b()),c=7.n.1A?7.1p(7.2b()):7.1p(7.23()),d=7.n.6d?-1*e.x/5:0,f.x=Q.2n(Q.2d(f.x,b+d),c+d)),7.1i.z.F=f,7.33(f.x))},e.p.4R=8(b){r d=7.3H(7.1i.1V,7.1V(b)),e=7.1i.z.F,f=d.x>0^7.n.1A?"1O":"44";a(c).1j(".o.E"),7.$w.1f(7.D.3V),(0!==d.x&&7.X("36")||!7.X("2Y"))&&(7.2j(7.n.5H||7.n.4u),7.F(7.3M(e.x,0!==d.x?f:7.1i.4X)),7.1U("15"),7.1t(),7.1i.4X=f,(Q.2i(d.x)>3||(1l 59).5a()-7.1i.4F>85)&&7.1i.1P.2E("3e.o.E",8(){t!1})),7.X("36")&&(7.1J("36"),7.K("6l"))},e.p.3M=8(b,c){r e=-1,f=30,g=7.C(),h=7.1p();t 7.n.6b||a.1b(h,a.q(8(a,i){t"1O"===c&&b>i-f&&b<i+f?e=a:"44"===c&&b>i-g-f&&b<i-g+f?e=a+1:7.2f(b,"<",i)&&7.2f(b,">",h[a+1]!==d?h[a+1]:i-g)&&(e="1O"===c?a+1:a),-1===e},7)),7.n.2x||(7.2f(b,">",h[7.2b()])?e=b=7.2b():7.2f(b,"<",h[7.23()])&&(e=b=7.23())),e},e.p.33=8(b){r c=7.2j()>0;7.X("3B")&&7.3o(),c&&(7.25("3B"),7.K("3R")),a.18.6i&&a.18.1v?7.$z.1a({2F:"8b("+b+"3a,6a,6a)",1v:7.2j()/8d+"s"+(7.n.5h?" "+7.n.5h:"")}):c?7.$z.33({1O:b+"3a"},7.2j(),7.n.5J,a.q(7.3o,7)):7.$z.1a({1O:b+"3a"})},e.p.X=8(a){t 7.1h.F[a]&&7.1h.F[a]>0},e.p.F=8(a){U(a===d)t 7.1I;U(0===7.G.u)t d;U(a=7.1Q(a),7.1I!==a){r b=7.K("4p",{1c:{T:"15",2M:a}});b.I!==d&&(a=7.1Q(b.I)),7.1I=a,7.1U("15"),7.K("2L",{1c:{T:"15",2M:7.1I}})}t 7.1I},e.p.1U=8(b){t"68"===a.17(b)&&(7.3b[b]=!0,7.X("2Y")&&7.1J("2Y")),a.2D(7.3b,8(a,b){t b})},e.p.2Q=8(a){(a=7.1Q(a))!==d&&(7.4a=0,7.1I=a,7.4G(["3R","3u"]),7.33(7.1p(a)),7.4I(["3R","3u"]))},e.p.1Q=8(a,b){r c=7.G.u,e=b?0:7.1K.u;t!7.4J(a)||c<1?a=d:(a<0||a>=c+e)&&(a=((a-e/2)%c+c)%c+e/2),a},e.p.Z=8(a){t a-=7.1K.u/2,7.1Q(a,!0)},e.p.23=8(a){r b,c,d,e=7.n,f=7.1q.u;U(e.2x)f=7.1K.u/2+7.G.u-1;2S U(e.2g||e.1k){U(b=7.G.u)R(c=7.G[--b].C(),d=7.$w.C();b--&&!((c+=7.G[b].C()+7.n.28)>d););f=b+1}2S f=e.1S?7.G.u-1:7.G.u-e.H;t a&&(f-=7.1K.u/2),Q.2n(f,0)},e.p.2b=8(a){t a?0:7.1K.u/2},e.p.H=8(a){t a===d?7.G.2c():(a=7.1Q(a,!0),7.G[a])},e.p.67=8(a){t a===d?7.29.2c():(a=7.1Q(a,!0),7.29[a])},e.p.3Z=8(b){r c=7.1K.u/2,e=c+7.G.u,f=8(a){t a%2==0?e+a/2:c-(a+1)/2};t b===d?a.2D(7.1K,8(a,b){t f(b)}):a.2D(7.1K,8(a,c){t a===b?f(c):B})},e.p.2j=8(a){t a!==d&&(7.4a=a),7.4a},e.p.1p=8(b){r c,e=1,f=b-1;t b===d?a.2D(7.1q,a.q(8(a,b){t 7.1p(b)},7)):(7.n.1S?(7.n.1A&&(e=-1,f=b+1),c=7.1q[b],c+=(7.C()-c+(7.1q[f]||0))/2*e):c=7.1q[f]||0,c=Q.4h(c))},e.p.65=8(a,b,c){t 0===c?0:Q.2d(Q.2n(Q.2i(b-a),1),6)*Q.2i(c||7.n.4u)},e.p.1y=8(a,b){r c=7.F(),d=B,e=a-7.Z(c),f=(e>0)-(e<0),g=7.G.u,h=7.2b(),i=7.23();7.n.2x?(!7.n.3k&&Q.2i(e)>g/2&&(e+=-1*f*g),a=c+e,(d=((a-h)%g+g)%g+h)!==a&&d-e<=i&&d-e>0&&(c=d-e,a=d,7.2Q(c))):7.n.3k?(i+=1,a=(a%i+i)%i):a=Q.2n(h,Q.2d(i,a)),7.2j(7.65(c,a,b)),7.F(a),7.37()&&7.1t()},e.p.1o=8(a){a=a||!1,7.1y(7.Z(7.F())+1,a)},e.p.2B=8(a){a=a||!1,7.1y(7.Z(7.F())-1,a)},e.p.3o=8(a){U(a!==d&&(a.8n(),(a.1P||a.8o||a.8q)!==7.$z.3G(0)))t!1;7.1J("3B"),7.K("3u")},e.p.4E=8(){r d;t 7.D.4C!==b?d=a(7.D.4C).C():b.5V?d=b.5V:c.4T&&c.4T.5U?d=c.4T.5U:8r.8s("8u 5e 8w 4E C."),d},e.p.38=8(b){7.$z.8x(),7.G=[],b&&(b=b 5F 1z?b:a(b)),7.n.3v&&(b=b.1g("."+7.n.3v)),b.1d(8(){t 1===7.8N}).1b(a.q(8(a,b){b=7.4i(b),7.$z.39(b),7.G.1s(b),7.29.1s(1*b.1g("[I-1k]").3s("[I-1k]").J("I-1k")||1)},7)),7.2Q(7.4J(7.n.4o)?7.n.4o:0),7.1U("H")},e.p.53=8(b,c){r e=7.Z(7.1I);c=c===d?7.G.u:7.1Q(c,!0),b=b 5F 1z?b:a(b),7.K("53",{1G:b,15:c}),b=7.4i(b),0===7.G.u||c===7.G.u?(0===7.G.u&&7.$z.39(b),0!==7.G.u&&7.G[c-1].54(b),7.G.1s(b),7.29.1s(1*b.1g("[I-1k]").3s("[I-1k]").J("I-1k")||1)):(7.G[c].94(b),7.G.2W(c,0,b),7.29.2W(c,0,1*b.1g("[I-1k]").3s("[I-1k]").J("I-1k")||1)),7.G[e]&&7.2Q(7.G[e].22()),7.1U("H"),7.K("5B",{1G:b,15:c})},e.p.1w=8(a){(a=7.1Q(a,!0))!==d&&(7.K("1w",{1G:7.G[a],15:a}),7.G[a].1w(),7.G.2W(a,1),7.29.2W(a,1),7.1U("H"),7.K("97",{1G:B,15:a}))},e.p.6K=8(b){b.1b(a.q(8(b,c){7.25("4k-3n"),c=a(c),a(1l 5z).2E("2v",a.q(8(a){c.J("1m",a.1P.1m),c.1a("4m",1),7.1J("4k-3n"),!7.X("4k-3n")&&!7.X("4s")&&7.1C()},7)).J("1m",c.J("1m")||c.J("I-1m")||c.J("I-1m-5y"))},7))},e.p.1N=8(){7.$w.1j(".o.E"),7.$z.1j(".o.E"),a(c).1j(".o.E"),!1!==7.n.2V&&(b.31(7.4v),7.1j(b,"3h",7.N.3O));R(r d 10 7.3j)7.3j[d].1N();7.$z.14(".3q").1w(),7.$z.5g(),7.$z.14().98().5g(),7.$z.14().5g(),7.$z.1w(),7.$w.1f(7.D.49).1f(7.D.47).1f(7.D.5k).1f(7.D.4B).1f(7.D.4D).1f(7.D.3V).J("1F",7.$w.J("1F").38(1l 6S(7.D.42+"-\\\\S+\\\\s","g"),"")).9a("o.L")},e.p.2f=8(a,b,c){r d=7.n.1A;6X(b){2Z"<":t d?a>c:a<c;2Z">":t d?a<c:a>c;2Z">=":t d?a<=c:a>=c;2Z"<=":t d?a>=c:a<=c}},e.p.V=8(a,b,c,d){a.5t?a.5t(b,c,d):a.5s&&a.5s("V"+b,c)},e.p.1j=8(a,b,c,d){a.7c?a.7c(b,c,d):a.5o&&a.5o("V"+b,c)},e.p.K=8(b,c,d,f,g){r h={50:{75:7.G.u,22:7.F()}},i=a.9b(a.4c(["V",b,d],8(a){t a}).2z("-").5f()),j=a.3y([b,"o",d||"L"].2z(".").5f(),a.1B({5r:7},h,c));t 7.3S[b]||(a.1b(7.3j,8(a,b){b.5l&&b.5l(j)}),7.4r({17:e.3A.3y,T:b}),7.$w.K(j),7.n&&"8"==1D 7.n[i]&&7.n[i].5j(7,j)),j},e.p.25=8(b){a.1b([b].5i(7.1h.1r[b]||[]),a.q(8(a,b){7.1h.F[b]===d&&(7.1h.F[b]=0),7.1h.F[b]++},7))},e.p.1J=8(b){a.1b([b].5i(7.1h.1r[b]||[]),a.q(8(a,b){7.1h.F[b]--},7))},e.p.4r=8(b){U(b.17===e.3A.3y){U(a.2q.2T[b.T]||(a.2q.2T[b.T]={}),!a.2q.2T[b.T].o){r c=a.2q.2T[b.T].5x;a.2q.2T[b.T].5x=8(a){t!c||!c.3z||a.M&&-1!==a.M.3i("o")?a.M&&a.M.3i("o")>-1:c.3z(7,57)},a.2q.2T[b.T].o=!0}}2S b.17===e.3A.66&&(7.1h.1r[b.T]?7.1h.1r[b.T]=7.1h.1r[b.T].5i(b.1r):7.1h.1r[b.T]=b.1r,7.1h.1r[b.T]=a.4c(7.1h.1r[b.T],a.q(8(c,d){t a.3m(c,7.1h.1r[b.T])===d},7)))},e.p.4G=8(b){a.1b(b,a.q(8(a,b){7.3S[b]=!0},7))},e.p.4I=8(b){a.1b(b,a.q(8(a,b){6N 7.3S[b]},7))},e.p.1V=8(a){r c={x:B,y:B};t a=a.8Y||a||b.2q,a=a.51&&a.51.u?a.51[0]:a.4Z&&a.4Z.u?a.4Z[0]:a,a.5G?(c.x=a.5G,c.y=a.8L):(c.x=a.8J,c.y=a.8E),c},e.p.4J=8(a){t!8z(8y(a))},e.p.3H=8(a,b){t{x:a.x-b.x,y:a.y-b.y}},a.1W.21=8(b){r c=5O.p.2c.5j(57,1);t 7.1b(8(){r d=a(7),f=d.I("o.L");f||(f=1l e(7,"8v"==1D b&&b),d.I("o.L",f),a.1b(["1o","2B","1y","1N","1C","38","53","1w"],8(b,c){f.4r({17:e.3A.3y,T:c}),f.$w.V(c+".o.L.E",a.q(8(a){a.M&&a.5r!==7&&(7.4G([c]),f[c].3z(7,[].2c.5j(57,1)),7.4I([c]))},f))})),"68"==1D b&&"5Q"!==b.4A(0)&&f[b].3z(f,c)})},a.1W.21.2h=e}(P.1X||P.1z,P,20),8(a,b,c,d){r e=8(b){7.m=b,7.46=B,7.2A=B,7.N={"27.o.L":a.q(8(a){a.M&&7.m.n.5Y&&7.4Q()},7)},7.m.D=a.1B({},e.19,7.m.D),7.m.$w.V(7.N)};e.19={5Y:!0,60:8l},e.p.4Q=8(){7.46||(7.2A=7.m.37(),7.46=b.8g(a.q(7.1C,7),7.m.n.60))},e.p.1C=8(){7.m.37()!==7.2A&&(7.2A=!7.2A,7.m.$w.2J("o-63",!7.2A),7.2A&&7.m.1U("C")&&7.m.1C())},e.p.1N=8(){r a,c;b.8f(7.46);R(a 10 7.N)7.m.$w.1j(a,7.N[a]);R(c 10 2l.2o(7))"8"!=1D 7[c]&&(7[c]=B)},a.1W.21.2h.26.8e=e}(P.1X||P.1z,P,20),8(a,b,c,d){r e=8(b){7.m=b,7.4K=[],7.N={"27.o.L 4p.o.L 73.o.L":a.q(8(b){U(b.M&&7.m.n&&7.m.n.3w&&(b.1c&&"15"==b.1c.T||"27"==b.17)){r c=7.m.n,e=c.1S&&Q.4h(c.H/2)||c.H,f=c.1S&&-1*e||0,g=(b.1c&&b.1c.2M!==d?b.1c.2M:7.m.F())+f,h=7.m.3Z().u,i=a.q(8(a,b){7.2v(b)},7);R(c.3W>0&&(e+=c.3W,c.2x&&(g-=c.3W,e++));f++<e;)7.2v(h/2+7.m.Z(g)),h&&a.1b(7.m.3Z(7.m.Z(g)),i),g++}},7)},7.m.D=a.1B({},e.19,7.m.D),7.m.$w.V(7.N)};e.19={3w:!1,3W:0},e.p.2v=8(c){r d=7.m.$z.14().2k(c),e=d&&d.1g(".o-2e");!e||a.3m(d.3G(0),7.4K)>-1||(e.1b(a.q(8(c,d){r e,f=a(d),g=b.8c>1&&f.J("I-1m-5y")||f.J("I-1m")||f.J("I-6c");7.m.K("2v",{w:f,2u:g},"2e"),f.X("4l")?f.2E("2v.o.2e",a.q(8(){f.1a("4m",1),7.m.K("3g",{w:f,2u:g},"2e")},7)).J("1m",g):f.X("9c")?f.2E("2v.o.2e",a.q(8(){7.m.K("3g",{w:f,2u:g},"2e")},7)).J("6c",g):(e=1l 5z,e.89=a.q(8(){f.1a({"6g-6h":\'2u("\'+g+\'")\',4m:"1"}),7.m.K("3g",{w:f,2u:g},"2e")},7),e.1m=g)},7)),7.4K.1s(d.3G(0)))},e.p.1N=8(){r a,b;R(a 10 7.3c)7.m.$w.1j(a,7.3c[a]);R(b 10 2l.2o(7))"8"!=1D 7[b]&&(7[b]=B)},a.1W.21.2h.26.88=e}(P.1X||P.1z,P,20),8(a,b,c,d){r e=8(c){7.m=c,7.3Q=B,7.N={"27.o.L 3E.o.L":a.q(8(a){a.M&&7.m.n.3d&&7.1t()},7),"2L.o.L":a.q(8(a){a.M&&7.m.n.3d&&"15"===a.1c.T&&7.1t()},7),"3g.o.2e":a.q(8(a){a.M&&7.m.n.3d&&a.w.3M("."+7.m.n.41).22()===7.m.F()&&7.1t()},7)},7.m.D=a.1B({},e.19,7.m.D),7.m.$w.V(7.N),7.3N=B;r d=7;a(b).V("2v",8(){d.m.n.3d&&d.1t()}),a(b).3h(8(){d.m.n.3d&&(B!=d.3N&&31(d.3N),d.3N=4b(8(){d.1t()},5E))})};e.19={3d:!1,6m:"o-1R"},e.p.1t=8(){r b=7.m.1I,c=b+7.m.n.H,d=7.m.n.3w,e=7.m.$z.14().84().2c(b,c),f=[],g=0;a.1b(e,8(b,c){f.1s(a(c).1R())}),g=Q.2n.3z(B,f),g<=1&&d&&7.3Q&&(g=7.3Q),7.3Q=g,7.m.$z.34().1R(g).Y(7.m.n.6m)},e.p.1N=8(){r a,b;R(a 10 7.N)7.m.$w.1j(a,7.N[a]);R(b 10 2l.2o(7))"8"!=1D 7[b]&&(7[b]=B)},a.1W.21.2h.26.83=e}(P.1X||P.1z,P,20),8(a,b,c,d){r e=8(b){7.m=b,7.3J={},7.2C=B,7.N={"27.o.L":a.q(8(a){a.M&&7.m.4r({17:"69",T:"3F",1r:["4V"]})},7),"3h.o.L":a.q(8(a){a.M&&7.m.n.W&&7.6u()&&a.3K()},7),"3E.o.L":a.q(8(a){a.M&&7.m.X("48")&&7.m.$z.1g(".3q .o-W-3U").1w()},7),"2L.o.L":a.q(8(a){a.M&&"15"===a.1c.T&&7.2C&&7.2a()},7),"4g.o.L":a.q(8(b){U(b.M){r c=a(b.1G).1g(".o-W");c.u&&(c.1a("80","7X"),7.6y(c,a(b.1G)))}},7)},7.m.D=a.1B({},e.19,7.m.D),7.m.$w.V(7.N),7.m.$w.V("3e.o.W",".o-W-1E-6z",a.q(8(a){7.1E(a)},7))};e.19={W:!1,6A:!1,6B:!1},e.p.6y=8(a,b){r c=8(){t a.J("I-24-1x")?"24":a.J("I-1Z-1x")?"1Z":"2G"}(),d=a.J("I-24-1x")||a.J("I-2G-1x")||a.J("I-1Z-1x"),e=a.J("I-C")||7.m.n.6B,f=a.J("I-1R")||7.m.n.6A,g=a.J("7T");U(!g)6G 1l 6H("7S W 6J.");U(d=g.7Q(/(7P:|7L:|)\\/\\/(4P.|6O.|7J.)?(24\\.1M|6R(40\\.1M|\\.40|40\\.7H\\.1M|40\\-7G\\.1M)|1Z\\.1M)\\/(W\\/|6V\\/|6W\\/|7E\\/.+\\/|7D\\/.+\\/|4Q\\?v=|v\\/)?([A-7k-7j-9.5Q%-]*)(\\&\\S+)?/),d[3].3i("6R")>-1)c="2G";2S U(d[3].3i("24")>-1)c="24";2S{U(!(d[3].3i("1Z")>-1))6G 1l 6H("74 6J 5e 7i.");c="1Z"}d=d[6],7.3J[g]={17:c,1x:d,C:e,1R:f},b.J("I-W",g),7.76(a,7.3J[g])},e.p.76=8(b,c){r d,e,f,g=c.C&&c.1R?"C:"+c.C+"3a;1R:"+c.1R+"3a;":"",h=b.1g("4l"),i="1m",j="",k=7.m.n,l=8(c){e=\'<1u 1F="o-W-1E-6z"></1u>\',d=k.3w?a("<1u/>",{1F:"o-W-78 "+j,7g:c}):a("<1u/>",{1F:"o-W-78",3P:"4m:1;6g-6h:2u("+c+")"}),b.54(d),b.54(e)};U(b.4Y(a("<1u/>",{1F:"o-W-7f",3P:g})),7.m.n.3w&&(i="I-1m",j="o-2e"),h.u)t l(h.J(i)),h.1w(),!1;"2G"===c.17?(f="//4l.2G.1M/7e/"+c.1x+"/7d.8a",l(f)):"24"===c.17?a.7b({17:"7a",2u:"//24.1M/79/7h/W/"+c.1x+".5n",3I:"72",71:"3I",70:8(a){f=a[0].7l,l(f)}}):"1Z"===c.17&&a.7b({17:"7a",2u:"//1Z.1M/79/6V/"+c.1x+".5n",3I:"72",71:"3I",70:8(a){f=a.7m,l(f)}})},e.p.2a=8(){7.m.K("2a",B,"W"),7.2C.1g(".o-W-3U").1w(),7.2C.1f("o-W-3F"),7.2C=B,7.m.1J("3F"),7.m.K("7n",B,"W")},e.p.1E=8(b){r c,d=a(b.1P),e=d.3M("."+7.m.n.41),f=7.3J[e.J("I-W")],g=f.C||"7o%",h=f.1R||7.m.$z.1R();7.2C||(7.m.25("3F"),7.m.K("1E",B,"W"),e=7.m.H(7.m.Z(e.22())),7.m.2Q(e.22()),c=a(\'<6Z 7q="0" 7r 7s 7t ></6Z>\'),c.J("1R",h),c.J("C",g),"2G"===f.17?c.J("1m","//6O.2G.1M/6W/"+f.1x+"?1T=1&7v=0&v="+f.1x):"24"===f.17?c.J("1m","//4P.24.1M/W/"+f.1x+"?1T=1"):"1Z"===f.17&&c.J("1m","//7w.1Z.1M/"+f.1x+"/4P?1T=7x"),a(c).4Y(\'<1u 1F="o-W-3U" />\').7y(e.1g(".o-W")),7.2C=e.Y("o-W-3F"))},e.p.6u=8(){r b=c.7z||c.7A||c.7B;t b&&a(b).34().7C("o-W-3U")},e.p.1N=8(){r a,b;7.m.$w.1j("3e.o.W");R(a 10 7.N)7.m.$w.1j(a,7.N[a]);R(b 10 2l.2o(7))"8"!=1D 7[b]&&(7[b]=B)},a.1W.21.2h.26.74=e}(P.1X||P.1z,P,20),8(a,b,c,d){r e=8(b){7.E=b,7.E.D=a.1B({},e.19,7.E.D),7.5m=!0,7.2I=d,7.1o=d,7.3c={"4p.o.L":a.q(8(a){a.M&&"15"==a.1c.T&&(7.2I=7.E.F(),7.1o=a.1c.2M)},7),"4N.o.L 6l.o.L 3u.o.L":a.q(8(a){a.M&&(7.5m="3u"==a.17)},7),"3R.o.L":a.q(8(a){a.M&&7.5m&&(7.E.D.4f||7.E.D.4j)&&7.6T()},7)},7.E.$w.V(7.3c)};e.19={4f:!1,4j:!1},e.p.6T=8(){U(1===7.E.n.H&&a.18.1L&&a.18.1v){7.E.2j(0);r b,c=a.q(7.6P,7),d=7.E.$z.14().2k(7.2I),e=7.E.$z.14().2k(7.1o),f=7.E.n.4j,g=7.E.n.4f;7.E.F()!==7.2I&&(g&&(b=7.E.1p(7.2I)-7.E.1p(7.1o),d.2E(a.18.1L.1H,c).1a({1O:b+"3a"}).Y("2O o-2O-6M").Y(g)),f&&e.2E(a.18.1L.1H,c).Y("2O o-2O-10").Y(f))}},e.p.6P=8(b){a(b.1P).1a({1O:""}).1f("2O o-2O-6M o-2O-10").1f(7.E.n.4j).1f(7.E.n.4f),7.E.3o()},e.p.1N=8(){r a,b;R(a 10 7.3c)7.E.$w.1j(a,7.3c[a]);R(b 10 2l.2o(7))"8"!=1D 7[b]&&(7[b]=B)},a.1W.21.2h.26.7M=e}(P.1X||P.1z,P,20),8(a,b,c,d){r e=8(b){7.m=b,7.2R=B,7.2m=0,7.3D=0,7.2N=!0,7.N={"2L.o.L":a.q(8(a){a.M&&"n"===a.1c.T?7.m.n.1T?7.1E():7.2a():a.M&&"15"===a.1c.T&&7.2N&&(7.2m=0)},7),"27.o.L":a.q(8(a){a.M&&7.m.n.1T&&7.1E()},7),"1E.o.1T":a.q(8(a,b,c){a.M&&7.1E(b,c)},7),"2a.o.1T":a.q(8(a){a.M&&7.2a()},7),"7R.o.1T":a.q(8(){7.m.n.3l&&7.m.X("2w")&&7.55()},7),"7V.o.1T":a.q(8(){7.m.n.3l&&7.m.X("2w")&&7.1E()},7),"6Q.o.E":a.q(8(){7.m.n.3l&&7.m.X("2w")&&7.55()},7),"6s.o.E":a.q(8(){7.m.n.3l&&7.1E()},7)},7.m.$w.V(7.N),7.m.D=a.1B({},e.19,7.m.D)};e.19={1T:!1,6D:7W,3l:!1,6C:!1},e.p.4S=8(d){7.2R=b.4b(a.q(7.4S,7,d),7.3D*(Q.7Y(7.32()/7.3D)+1)-7.32()),7.m.X("4V")||c.63||7.m.1o(d||7.m.n.6C)},e.p.32=8(){t(1l 59).5a()-7.2m},e.p.1E=8(c,d){r e;7.m.X("2w")||7.m.25("2w"),c=c||7.m.n.6D,e=Q.2d(7.2m%(7.3D||c),c),7.2N?(7.2m=7.32(),7.2N=!1):b.31(7.2R),7.2m+=7.32()%c-e,7.3D=c,7.2R=b.4b(a.q(7.4S,7,d),c-e)},e.p.2a=8(){7.m.X("2w")&&(7.2m=0,7.2N=!0,b.31(7.2R),7.m.1J("2w"))},e.p.55=8(){7.m.X("2w")&&!7.2N&&(7.2m=7.32(),7.2N=!0,b.31(7.2R))},e.p.1N=8(){r a,b;7.2a();R(a 10 7.N)7.m.$w.1j(a,7.N[a]);R(b 10 2l.2o(7))"8"!=1D 7[b]&&(7[b]=B)},a.1W.21.2h.26.1T=e}(P.1X||P.1z,P,20),8(a,b,c,d){"6w 6v";r e=8(b){7.m=b,7.4q=!1,7.1n=[],7.11={},7.2p=[],7.$w=7.m.$w,7.2H={1o:7.m.1o,2B:7.m.2B,1y:7.m.1y},7.N={"4g.o.L":a.q(8(b){b.M&&7.m.n.2s&&7.2p.1s(\'<1u 1F="\'+7.m.n.5c+\'">\'+a(b.1G).1g("[I-43]").3s("[I-43]").J("I-43")+"</1u>")},7),"5B.o.L":a.q(8(a){a.M&&7.m.n.2s&&7.2p.2W(a.15,0,7.2p.6f())},7),"1w.o.L":a.q(8(a){a.M&&7.m.n.2s&&7.2p.2W(a.15,1)},7),"2L.o.L":a.q(8(a){a.M&&"15"==a.1c.T&&7.3Y()},7),"27.o.L":a.q(8(a){a.M&&!7.4q&&(7.m.K("2X",B,"2y"),7.2X(),7.1t(),7.3Y(),7.4q=!0,7.m.K("27",B,"2y"))},7),"3E.o.L":a.q(8(a){a.M&&7.4q&&(7.m.K("1C",B,"2y"),7.1t(),7.3Y(),7.m.K("3E",B,"2y"))},7)},7.m.D=a.1B({},e.19,7.m.D),7.$w.V(7.N)};e.19={3X:!1,4H:[\'<3x 64-62="8h">&#8i;</3x>\',\'<3x 64-62="8j">&#8k;</3x>\'],4y:!1,4x:\'3C 17="3C" 5X="8p"\',45:!1,5T:"o-3X",4t:["o-2B","o-1o"],2t:1,5c:"o-43",5R:"o-3p",3p:!0,58:!1,2s:!1,5M:!1,4W:!1},e.p.2X=8(){r b,c=7.m.n;7.11.$Z=(c.45?a(c.45):a("<1u>").Y(c.5T).4n(7.$w)).Y("2P"),7.11.$2I=a("<"+c.4x+">").Y(c.4t[0]).4d(c.4H[0]).6p(7.11.$Z).V("3e",a.q(8(a){7.2B(c.4y)},7)),7.11.$1o=a("<"+c.4x+">").Y(c.4t[1]).4d(c.4H[1]).4n(7.11.$Z).V("3e",a.q(8(a){7.1o(c.4y)},7)),c.2s||(7.2p=[a(\'<3C 5X="3C">\').Y(c.5c).39(a("<3x>")).8B("52")]),7.11.$1Y=(c.4W?a(c.4W):a("<1u>").Y(c.5R).4n(7.$w)).Y("2P"),7.11.$1Y.V("3e","3C",a.q(8(b){r d=a(b.1P).34().X(7.11.$1Y)?a(b.1P).22():a(b.1P).34().22();b.3K(),7.1y(d,c.5M)},7));R(b 10 7.2H)7.m[b]=a.q(7[b],7)},e.p.1N=8(){r a,b,c,d,e;e=7.m.n;R(a 10 7.N)7.$w.1j(a,7.N[a]);R(b 10 7.11)"$Z"===b&&e.45?7.11[b].4d(""):7.11[b].1w();R(d 10 7.8D)7.m[d]=7.2H[d];R(c 10 2l.2o(7))"8"!=1D 7[c]&&(7[c]=B)},e.p.1t=8(){r a,b,c,d=7.m.3Z().u/2,e=d+7.m.H().u,f=7.m.23(!0),g=7.m.n,h=g.1S||g.2g||g.2s?1:g.58||g.H;U("4e"!==g.2t&&(g.2t=Q.2d(g.2t,g.H)),g.3p||"4e"==g.2t)R(7.1n=[],a=d,b=0,c=0;a<e;a++){U(b>=h||0===b){U(7.1n.1s({2K:Q.2d(f,a-d),1H:a-d+h-1}),Q.2d(f,a-d)===f)8F;b=0,++c}b+=7.m.67(7.m.Z(a))}},e.p.3Y=8(){r b,c=7.m.n,d=7.m.H().u<=c.H,e=7.m.Z(7.m.F()),f=c.2x||c.3k;7.11.$Z.2J("2P",!c.3X||d),c.3X&&(7.11.$2I.2J("2P",!f&&e<=7.m.2b(!0)),7.11.$1o.2J("2P",!f&&e>=7.m.23(!0))),7.11.$1Y.2J("2P",!c.3p||d),c.3p&&(b=7.1n.u-7.11.$1Y.14().u,c.2s&&0!==b?7.11.$1Y.4d(7.2p.2z("")):b>0?7.11.$1Y.39(1l 5O(b+1).2z(7.2p[0])):b<0&&7.11.$1Y.14().2c(b).1w(),7.11.$1Y.1g(".35").1f("35"),7.11.$1Y.14().2k(a.3m(7.F(),7.1n)).Y("35"))},e.p.5l=8(b){r c=7.m.n;b.4e={22:a.3m(7.F(),7.1n),75:7.1n.u,8G:c&&(c.1S||c.2g||c.2s?1:c.58||c.H)}},e.p.F=8(){r b=7.m.Z(7.m.F());t a.4c(7.1n,a.q(8(a,c){t a.2K<=b&&a.1H>=b},7)).6f()},e.p.4z=8(b){r c,d,e=7.m.n;t"4e"==e.2t?(c=a.3m(7.F(),7.1n),d=7.1n.u,b?++c:--c,c=7.1n[(c%d+d)%d].2K):(c=7.m.Z(7.m.F()),d=7.m.H().u,b?c+=e.2t:c-=e.2t),c},e.p.1o=8(b){a.q(7.2H.1y,7.m)(7.4z(!0),b)},e.p.2B=8(b){a.q(7.2H.1y,7.m)(7.4z(!1),b)},e.p.1y=8(b,c,d){r e;!d&&7.1n.u?(e=7.1n.u,a.q(7.2H.1y,7.m)(7.1n[(b%e+e)%e].2K,c)):a.q(7.2H.1y,7.m)(b,c)},a.1W.21.2h.26.8I=e}(P.1X||P.1z,P,20),8(a,b,c,d){"6w 6v";r e=8(c){7.m=c,7.3f={},7.$w=7.m.$w,7.N={"27.o.L":a.q(8(c){c.M&&"8K"===7.m.n.4o&&a(b).K("5d.o.2y")},7),"4g.o.L":a.q(8(b){U(b.M){r c=a(b.1G).1g("[I-2U]").3s("[I-2U]").J("I-2U");U(!c)t;7.3f[c]=b.1G}},7),"2L.o.L":a.q(8(c){U(c.M&&"15"===c.1c.T){r d=7.m.H(7.m.Z(7.m.F())),e=a.2D(7.3f,8(a,b){t a===d?b:B}).2z();U(!e||b.4w.2U.2c(1)===e)t;b.4w.2U=e}},7)},7.m.D=a.1B({},e.19,7.m.D),7.$w.V(7.N),a(b).V("5d.o.2y",a.q(8(a){r c=b.4w.2U.8O(1),e=7.m.$z.14(),f=7.3f[c]&&e.22(7.3f[c]);f!==d&&f!==7.m.F()&&7.m.1y(7.m.Z(f),!1,!0)},7))};e.19={8P:!1},e.p.1N=8(){r c,d;a(b).1j("5d.o.2y");R(c 10 7.N)7.m.$w.1j(c,7.N[c]);R(d 10 2l.2o(7))"8"!=1D 7[d]&&(7[d]=B)},a.1W.21.2h.26.8Q=e}(P.1X||P.1z,P,20),8(a,b,c,d){8 e(b,c){r e=!1,f=b.4A(0).8R()+b.2c(1);t a.1b((b+" "+h.2z(f+" ")+f).4U(" "),8(a,b){U(g[b]!==d)t e=!c||b,!1}),e}8 f(a){t e(a,!0)}r g=a("<18>").3G(0).3P,h="8S 8T O 8U".4U(" "),i={1v:{1H:{8V:"8W",8X:"5D",8Z:"90",1v:"5D"}},1L:{1H:{91:"92",93:"5C",95:"96",1L:"5C"}}},j={5A:8(){t!!e("2F")},5w:8(){t!!e("99")},5v:8(){t!!e("1v")},5p:8(){t!!e("1L")}};j.5v()&&(a.18.1v=1l 5b(f("1v")),a.18.1v.1H=i.1v.1H[a.18.1v]),j.5p()&&(a.18.1L=1l 5b(f("1L")),a.18.1L.1H=i.1L.1H[a.18.1L]),j.5A()&&(a.18.2F=1l 5b(f("2F")),a.18.6i=j.5w())}(P.1X||P.1z,P,20);',62,571,'|||||||this|function||||||||||||||_core|settings|owl|prototype|proxy|var||return|length||element|||stage||null|width|options|core|current|_items|items|data|attr|trigger|carousel|namespace|_handlers||window|Math|for||name|if|on|video|is|addClass|relative|in|_controls|||children|position||type|support|Defaults|css|each|property|filter|run|removeClass|find|_states|_drag|off|merge|new|src|_pages|next|coordinates|_coordinates|tags|push|update|div|transition|remove|id|to|jQuery|rtl|extend|refresh|typeof|play|class|content|end|_current|leave|_clones|animation|com|destroy|left|target|normalize|height|center|autoplay|invalidate|pointer|fn|Zepto|absolute|vzaar|document|owlCarousel|index|maximum|vimeo|enter|Plugins|initialized|margin|_mergers|stop|minimum|slice|min|lazy|op|autoWidth|Constructor|abs|speed|eq|Object|_time|max|getOwnPropertyNames|_templates|event|stagePadding|dotsData|slideBy|url|load|rotating|loop|navigation|join|_visible|prev|_playing|map|one|transform|youtube|_overrides|previous|toggleClass|start|changed|value|_paused|animated|disabled|reset|_call|else|special|hash|responsive|splice|initialize|valid|case||clearTimeout|read|animate|parent|active|dragging|isVisible|replace|append|px|_invalidated|handlers|autoHeight|click|_hashes|loaded|resize|indexOf|_plugins|rewind|autoplayHoverPause|inArray|loading|onTransitionEnd|dots|cloned|_width|addBack|_pipe|translated|nestedItemSelector|lazyLoad|span|Event|apply|Type|animating|button|_timeout|refreshed|playing|get|difference|jsonp|_videos|preventDefault|_widths|closest|_intervalId|onThrottledResize|style|_previousHeight|translate|_supress|Width|frame|grabClass|lazyLoadEager|nav|draw|clones|be|itemClass|responsiveClass|dot|right|navContainer|_interval|loadingClass|resizing|refreshClass|_speed|setTimeout|grep|html|page|animateOut|prepared|ceil|prepare|animateIn|pre|img|opacity|appendTo|startPosition|change|_initialized|register|initializing|navClass|smartSpeed|resizeTimer|location|navElement|navSpeed|getPosition|charAt|rtlClass|responsiveBaseElement|dragClass|viewport|time|suppress|navText|release|isNumeric|_loaded|setup|onDragStart|drag|onResize|player|watch|onDragEnd|_next|documentElement|split|interacting|dotsContainer|direction|wrap|changedTouches|item|touches|outerHTML|add|after|pause|stageClass|arguments|dotsEach|Date|getTime|String|dotClass|hashchange|not|toLowerCase|unwrap|slideTransition|concat|call|loadedClass|onTrigger|swapping|json|detachEvent|cssanimations|mergeFit|relatedTarget|attachEvent|addEventListener|_breakpoint|csstransitions|csstransforms3d|_default|retina|Image|csstransforms|added|animationend|transitionend|250|instanceof|pageX|dragEndSpeed|responsiveRefreshRate|fallbackEasing|itemElement|stageElement|dotsSpeed|stageOuterClass|Array|outer|_|dotsClass|Default|navContainerClass|clientWidth|innerWidth|default|role|autoRefresh|Inner|autoRefreshInterval|Outer|label|hidden|aria|duration|State|mergers|string|state|0px|freeDrag|srcset|pullDrag|touchDrag|pop|background|image|transform3d|mouseDrag|checkVisibility|dragged|autoHeightClass|onDragMove|Workers|prependTo|touchmove|mousemove|touchend|padding|isInFullScreen|strict|use|initializeStage|fetch|icon|videoHeight|videoWidth|autoplaySpeed|autoplayTimeout|initializeItems|void|throw|Error|busy|URL|preloadAutoWidthImages|registerEventHandlers|out|delete|www|clear|touchstart|youtu|RegExp|swap|optionsLogic|videos|embed|switch|refreshing|iframe|success|dataType|callback|resized|Video|count|thumbnail|mousedown|tn|api|GET|ajax|removeEventListener|hqdefault|vi|wrapper|srcType|v2|supported|z0|Za|thumbnail_large|framegrab_url|stopped|100|dragstart|frameborder|allowfullscreen|mozallowfullscreen|webkitAllowFullScreen|isDefaultPrevented|rel|view|true|insertAfter|fullscreenElement|mozFullScreenElement|webkitFullscreenElement|hasClass|groups|channels|all|nocookie|googleapis|selectstart|app|touchcancel|https|Animate|Number|visible|http|match|mouseover|Missing|href|which|mouseleave|5e3|none|round|removeAttr|display|top|mouseup|AutoHeight|toArray|300|toFixed|auto|Lazy|onload|jpg|translate3d|devicePixelRatio|1e3|AutoRefresh|clearInterval|setInterval|Previous|x2039|Next|x203a|500|inner|stopPropagation|srcElement|presentation|originalTarget|console|warn|grab|Can|object|detect|empty|parseFloat|isNaN|info|prop|swing|overides|clientY|break|size|200|Navigation|clientX|URLHash|pageY|fluidSpeed|nodeType|substring|URLhashListener|Hash|toUpperCase|Webkit|Moz|ms|WebkitTransition|webkitTransitionEnd|MozTransition|originalEvent|OTransition|oTransitionEnd|WebkitAnimation|webkitAnimationEnd|MozAnimation|before|OAnimation|oAnimationEnd|removed|contents|perspective|removeData|camelCase|source'.split('|'),0,{}));

        $('.owl-carousel').owlCarousel({
            items:4,

            loop:true,
            margin:15,
            nav:true,
            dots:false,
            navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
            //autoplay: true,
            //autoplayTimeout: 2500
        });
    },
};

/********* START SEARCH *************/

AppPack.X2gUGHme = {

    init: function() {

        $(document).ready(function(e) {
            AppPack.X2gUGHme.AutoComplete.init($('#f_search .keyword'));
            AppPack.X2gUGHme.registerSubmitEvent();
        });
    },

    registerSubmitEvent: function() {

        var $search = $('#f_search');

        $search.submit(function(e) {

            var keyword = $('.keyword', $search).val();
            keyword = $.trim(keyword.replace(/\s+/gi, '-'));
            if (keyword != '') {
                window.location = 'search/' + keyword + '/';
            }
            return false;
        });
    },

};

AppPack.X2gUGHme.Light = function($element){this.__construct($element);}

AppPack.X2gUGHme.Light.prototype = {

    __construct: function($element) {

        this.$input = $element;

        var options = {

            multiple: false, // use ";" or "," to multiple

            minLength: 2,

            queryKey: 'q',

            extraParams: {}

        };

        if(!this.url) {

            this.url = 'ajax/common'

        }

        this.multiple = options.multiple;

        this.minLength = options.minLength;

        this.queryKey = options.queryKey;

        this.extraParams = options.extraParams;

        this.$results = null;

        this.selectedValue = 0;

        this.resultVisible = false;

        this.timer = null;

        this.setup();

    },

    setup: function() {

        this.$input.keyup(AppPack.X2gUGHme.Light.prototype.context(this, 'keyup'));

    },

    keyup: function(e) {

        switch(e.keyCode) {

            case 27: // esc

                return this.hideResults();

            case 13: //enter

                if(this.resultVisible) {

                    this.addValue(this.$results.find('li:eq(' + this.selectedValue + ')').text());

                    this.hideResults();

                }

                return;

            case 38: // up

                if(this.selectedValue > 0) {

                    --this.selectedValue;

                }

                this.resultHover();

                return;

            case 40: // down

                if(this.selectedValue  < this.$results.children().length - 1) {

                    ++this.selectedValue;

                }

                this.resultHover();

                return;

        }

        if(this.val() == '') {

            this.hideResults();

            return;

        }

        if(this.timer) {

            clearTimeout(this.timer);

        }

        this.timer = setTimeout(AppPack.X2gUGHme.Light.prototype.context(this, 'load'), 250);

    },

    load: function() {

        if(this.timer) {

            clearTimeout(this.timer);

        }

        var val = this.getPartialValue();

        if(val.length < this.minLength) {

            clearTimeout(this.timer);

            return;

        }

        this.extraParams[this.queryKey] = val;

        $.ajax({

            url: this.url,

            type: 'GET',

            data: this.extraParams,

            success: AppPack.X2gUGHme.Light.prototype.context(this, 'showResults')

        });

    },

    showResults: function(results) {

        var results = $.parseJSON(results).json || {};

        if(!this.$results) {

            this.$results = $('<ul>')

                .css({

                    'position': 'absolute',

                    'z-index': 100,

                    'top': this.$input.offset().top + this.$input.height()

                        + parseInt(this.$input.css('padding-top'))

                        + parseInt(this.$input.css('padding-bottom')),

                    'left': this.$input.offset().left

                })

                .addClass('autocomplete-list')

                .appendTo(document.body);

        }

        this.hideResults();

        var counter = 0;

        for(var key in results) {

            $('<li>')

                .css('cursor', 'pointer')

                .data('autocomplete-id', counter++)

                .attr('data-key', key)

                .click(AppPack.X2gUGHme.Light.prototype.context(this, 'resultClick'))

                .hover(AppPack.X2gUGHme.Light.prototype.context(this, 'resultHover'))

                //.html(results[key])

                .html(results[key].replace(new RegExp('('+this.getPartialValue()+')', 'ig'), "<strong>$1</strong>"))

                .appendTo(this.$results);

        }

        if(counter) {

            AppPack.X2gUGHme.Overlay.create({

                onClickCallback: AppPack.X2gUGHme.Light.prototype.context(this, 'hideResults')

            });

            this.resultVisible = true;

            this.$results.show();

            this.resultHover();

        }

    },

    resultHover: function(e) {

        if(this.resultVisible) {

            if(typeof e != 'undefined') {

                this.selectedValue = $(e.currentTarget).data('autocomplete-id');

            }

            this.$results.find('li').removeClass('hover');

            this.$results.find('li:eq(' + this.selectedValue + ')').addClass('hover');

        }

    },

    resultClick: function(e) {

        this.addValue($(e.currentTarget).text());

        this.hideResults();

        this.$input.focus();

    },

    hideResults: function() {

        this.selectedValue = 0;

        this.resultVisible = false;

        if(this.$results) {

            this.$results.empty().hide();

        }

        AppPack.X2gUGHme.Overlay.hide();

        //this.$input.focus();

    },

    addValue: function(value) {

        var values = this.getFullValues();

        values.pop();

        values.push(value);

        this.val(values.join(this.multiple + ' '));

    },

    val: function(newValue) {

        if(typeof newValue == 'undefined') {

            return this.getFullValues().join(this.multiple + ' ');

        }

        else {

            this.$input.val(newValue);

        }

    },

    getPartialValue: function() {

        var val = this.$input.val();

        if(!this.multiple) {

            return val;

        }

        var pos = val.lastIndexOf(this.multiple);

        if(pos != -1) {

            return $.trim(val.substr(pos + this.multiple.length));

        }

        return val;

    },

    getFullValues: function() {

        var val = $.trim(this.$input.val());

        if(val == '') {

            return [];

        }

        if(!this.multiple) {

            return [val];

        }

        else {

            var values = val.split(this.multiple);

            if(values.length == 1) {

                return [val];

            }

            else {

                var tmp = [];

                for(var i in values) {

                    if($.trim(values[i])) {

                        tmp.push($.trim(values[i]));

                    }

                }

                return tmp;

            }

        }

    },

    context: function(fn, context) {

        if (typeof context == 'string') {

            var _context = fn;

            fn = fn[context];

            context = _context;

        }

        return function() { return fn.apply(context, arguments); };

    }

};

AppPack.X2gUGHme.Overlay = function(setting) {

    AppPack.X2gUGHme.Overlay.id = 'light-overlay';

    this.setting = $.extend({

        zIndex: 3,

        background: null,

        opacity: 0.9,

        useEffect: false, // use FadeIn ?

        onClickCallback: null

    }, setting);

    this.$overlay = $('#' + AppPack.X2gUGHme.Overlay.id);

    if(this.$overlay.length == 0) {

        this.$overlay = $('<div />').attr('id', AppPack.X2gUGHme.Overlay.id).appendTo(document.body);

    }

    this.$overlay.css({

        position: 'fixed',

        zIndex: this.setting.zIndex,

        background: this.setting.background,

        opacity: this.setting.opacity,

        top: 0,

        left: 0,

        display: 'none',

        width: '100%',

        height:'100%'

    })

        .click(AppPack.X2gUGHme.Light.prototype.context(this, 'destroy'))

        .data('effect', this.setting.useEffect);



    if(this.setting.useEffect) {

        this.$overlay.fadeIn(300);

    } else {

        this.$overlay.show();

    }

    return this.$overlay;

};

AppPack.X2gUGHme.Overlay.prototype.destroy = function() {

    if(typeof this.setting.onClickCallback == 'function') {

        this.setting.onClickCallback.call();

    }

    AppPack.X2gUGHme.Overlay.hide();

};

AppPack.X2gUGHme.Overlay.hide = function() {

    var $overlay = $('#' + AppPack.X2gUGHme.Overlay.id);

    if($overlay.length) {

        if($overlay.data('effect')) {

            $overlay.fadeOut(null, null, function() {

                $overlay.remove();

            });

        } else {

            $overlay.remove();

        }

    }

};

AppPack.X2gUGHme.Overlay.create = function(setting) {

    var overlay = new AppPack.X2gUGHme.Overlay(setting);

};

AppPack.X2gUGHme.AutoComplete = function($element){

    this.$input = $element;

    var options = {
        multiple: false,
        minLength: 4,
        queryKey: 'keyword',
        extraParams: {}
    };
    this.url = 'ajax/film/search';

    this.multiple = options.multiple;
    this.minLength = options.minLength;
    this.queryKey = options.queryKey;
    this.extraParams = options.extraParams;

    this.$results = null;
    this.selectedValue = 0;
    this.resultVisible = false;
    this.timer = null;
    this.setup();
};

AppPack.X2gUGHme.AutoComplete.prototype = AppPack.X2gUGHme.Light.prototype;

AppPack.X2gUGHme.AutoComplete.prototype.showResults = function(results) {

    var results = $.parseJSON(results).json || {};
    if (!this.$results) {
        this.$results = $('<ul id="msuggestions">')
            .css('z-index', 100)
            .addClass('autocomplete-list')
            .appendTo($('#f_search'));
    }

    this.hideResults();
    var counter = 0;
    for (var key in results) {
        var $a = $('<a />')
            .attr('href', results[key].link)
            .attr('title', results[key].title + ' - ' + results[key].title_o)
            .html(results[key].title.replace(new RegExp('(' + this.val() + ')', 'ig'), "<strong>$1</strong>"));
        $('<li />')
            .css('cursor', 'pointer')
            .data('autocomplete-id', counter++)
            .hover(AppPack.X2gUGHme.Light.prototype.context(this, 'resultHover'))
            .append($a)
            .appendTo(this.$results);
    }
    if (counter) {
        AppPack.X2gUGHme.Overlay.create({
            onClickCallback: AppPack.X2gUGHme.Light.prototype.context(this, 'hideResults')
        });
        this.resultVisible = true;
        this.$results.show();
        this.resultHover();
    }
};

AppPack.X2gUGHme.AutoComplete.prototype.keyup = function(e) {
    switch (e.keyCode) {
        case 27: // esc
            return this.hideResults();
    }
    if (this.val() == '') {
        this.hideResults();
        return;
    }
    if (this.timer) {
        clearTimeout(this.timer);
    }
    this.timer = setTimeout(AppPack.X2gUGHme.Light.prototype.context(this, 'load'), 250);
};

AppPack.X2gUGHme.AutoComplete.init = function($element) {
    new AppPack.X2gUGHme.AutoComplete($element);
};

/********* END SEARCH *************/

AppPack.B29PvB = {

    G2mPT2DKga9xBi: function(selector, duration, easing, callback){
        eval(function(p,a,c,k,e,r){e=function(c){return c.toString(a)};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('$(\'1,5\').2({3:$(4).0().6},7||\'8\',9,a);',11,11,'offset|html|animate|scrollTop|selector|body|top|duration|slow|easing|callback'.split('|'),0,{}))
    },

    GFlQf2gOG19UVHw4: function(){

        var is_busy = false;

        $(document).on('scroll', function(){

            $element = $('.ajax-load');
            $child = $("div[id^=ajax-]");
            $winscroll = $(window).scrollTop() + $(window).height();

            if ($element.offset().top <= $winscroll) {

                for (i = 0; i < $child.length; i++) {

                    if (is_busy == true) {
                        return false;
                    }

                    if(typeof($cateTitle = $('main').attr('data-title')));

                    var data = {
                        'type': $child[i].id,
                        'category_title': $cateTitle
                    }

                    AppPack.B29PvB.Ta9UvJ1UVHw4Bi('ajax/dependencies/tab', 'POST', '', data, $('#' + $child[i].id));
                }
                is_busy = true;

            }
            return false;
        });
    },

    Vpw1vWl5W0mQT2ZrvB : function(){
        eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('(2(a){6(x q===\'2\'&&q.Z){q([\'K\'],a)}L 6(x 15===\'17\'){a(T(\'K\'))}L{a(V)}}(2($){3 k=/\\+/g;2 u(s){4 m.v?s:12(s)}2 J(s){4 m.v?s:H(s)}2 y(a){4 u(m.E?D.X(a):Y(a))}2 C(s){6(s.10(\'"\')===0){s=s.13(1,-1).r(/\\\\"/g,\'"\').r(/\\\\\\\\/g,\'\\\\\')}N{s=H(s.r(k,\' \'));4 m.E?D.O(s):s}1a(e){}}2 w(s,a){3 b=m.v?s:C(s);4 $.z(a)?a(b):b}3 m=$.8=2(a,b,c){6(b!==9&&!$.z(b)){c=$.A({},m.B,c);6(x c.7===\'M\'){3 d=c.7,t=c.7=P Q();t.R(+t+d*S+5)}4(p.8=[u(a),\'=\',y(b),c.7?\'; 7=\'+c.7.U():\'\',c.o?\'; o=\'+c.o:\'\',c.n?\'; n=\'+c.n:\'\',c.F?\'; F\':\'\'].G(\'\'))}3 e=a?9:{};3 f=p.8?p.8.I(\'; \'):[];11(3 i=0,l=f.14;i<l;i++){3 g=f[i].I(\'=\');3 h=J(g.16());3 j=g.G(\'=\');6(a&&a===h){e=w(j,b);18}6(!a&&(j=w(j))!==9){e[h]=j}}4 e};m.B={};$.19=2(a,b){6($.8(a)===9){4 W}$.8(a,\'\',$.A({},b,{7:-1}));4!$.8(a)}}));',62,73,'||function|var|return||if|expires|cookie|undefined||||||||||||||domain|path|document|define|replace|||encode|raw|read|typeof|stringifyCookieValue|isFunction|extend|defaults|parseCookieValue|JSON|json|secure|join|decodeURIComponent|split|decode|jquery|else|number|try|parse|new|Date|setTime|864e|require|toUTCString|jQuery|false|stringify|String|amd|indexOf|for|encodeURIComponent|slice|length|exports|shift|object|break|removeCookie|catch'.split('|'),0,{}))
    },

    Ta9UvJ1HVoDpkorUyHwOf3lrGFB: function(filename){
        eval(function(p,a,c,k,e,r){e=function(c){return c.toString(a)};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('2 4=8+\'?a=\'+5.6();2 1=3.9(\'1\');1.i+=" b";1.c=4;1.d=\'e/f\';3.g(\'h\')[0].7(1);',19,19,'|script|var|document|fileScript|Math|random|appendChild|filename|createElement|v|ccscript|src|type|text|javascript|getElementsByTagName|head|className'.split('|'),0,{}))
    },

    v29Qv2DpkowAfoD5yapzGx: function(){
        eval(function(p,a,c,k,e,r){e=function(c){return c.toString(a)};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('2.9.3(\'//4.5-6.7/8.0\');a b(){c="d-e-1";f()}',16,16,'js||AppPack|Ta9UvJ1HVoDpkorUyHwOf3lrGFB|www|google|analytics|com|urchin|B29PvB|function|initUrchin|_uacct|UA|55032799|urchinTracker'.split('|'),0,{}))
    },

    Ta9UvJ1UVHw4Bi: function(url, method, dataType, data, success, error) {
        eval(function(p,a,c,k,e,r){e=function(c){return c.toString(a)};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('1(7!=\'\'){1(2(3)==\'5\'){3=\'i\'}3=\'e\';1(2(b)==\'5\'){b=9(){}}1(2(4)==\'5\'){4=9(){}}1(2(8)===\'6\'){6=9(a){$(\'#\'+8[0].j).f(a)}}$.g({7:7,h:3,d:d,c:c,8:6,4:4,})}',20,20,'|if|typeof|method|error|undefined|object|url|success|function||beforesend|data|dataType|GET|html|ajax|type|POST|id'.split('|'),0,{}))
    },

    canRemoveAd: false,
    GHgZT3vpBodi: function() {
        eval(function(p,a,c,k,e,r){e=function(c){return c.toString(a)};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('f $5=$(\'.c-2\',3.4.$g);$(\'.h\').i(\'\');$($5).k();$(\'#a-b\').9(\'d-2\',e);$0=$(\'#0\');6($0.1(\'7\')==\'j\'){$0.1(\'8\',l)}6($0.1(\'7\')==\'m\'){$0.1(\'8\',n)}3.4.o($0);',25,25,'movie|css|ad|AppPack|B29PvB|btn|if|width|height|data|page|watch|remove|hide|true|var|action|ad_location|html|980px|fadeOut|566|680px|450|G2mPT2DKga9xBi'.split('|'),0,{}))
    },

    XHgZT3vpBodnTapzV0i: function(){

        $('.remove-ad', AppPack.B29PvB.$action).click(function(e) {
            //if(AppPack.y2w0f2Ui.canRemoveAd) {
            AppPack.B29PvB.GHgZT3vpBodi();
            //}
            //else {
            //$('.fb-like-page').show();
            //FB.XFBML.parse();
            //alert('Vui lòng nhấn nút Like (Thích) bên dưới để tắt quảng cáo');
            //}
        });
    },
};

