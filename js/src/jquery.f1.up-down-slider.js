/*
 * Name: UpDownSlider jQuery Plugin v1.0
 * Author: Factor1, James R. Latham
 * Website: http://www.factor1studios.com/
 * Description: Custom Ticker Slider for Up/Down Transitions
 *
 * (c) 2014 Factor1 MIT License.
 */

;(function($,window,document,undefined) {

    var name = "UpDownSlider";

    var defaults = {
        direction: 'up',
        easing: 'swing',
        speed: 1000,
        interval: 4000,
        height: 'auto',
        autostart: 1,
        mousePause: true,
        controls: {
            start: null,
            stop: null,
            up: null,
            down: null,
            circles: null
        },
        slide_css: {},
        onready: null,
        change: null
    };

    var UpDownSlider = function(container,options) {

        var _this = this;
        _this.options = $.extend( {}, defaults, options );
        _this.container$ = $(container);
        _this.ul$ = _this.container$.children("ul:first-child");
        _this.li$ = _this.ul$.children("li");
        _this.timer = 0;
        _this.inFocus = true;
        _this.isManual = false;
        _this.ready = false;

        _this.init = function() {

            if(_this.ul$.length < 1 || _this.li$.length < 1) {
                return;
            }

            if(_this.ready) { return; }

            $(window).focus(function() {
                _this.inFocus = true;
            }).blur(function() {
                _this.inFocus = false;
            });

            if(_this.options.mousePause) {

                _this.container$.hover(function() {
                    if(!_this.isManual) {
                        _this.pause();
                    }
                },function() {
                    if(!_this.isManual) {
                        _this.start();
                    }
                });

            }

            _this.prepare();

            _this.setControls();

            _this.ready = true;

            if(_this.options.autostart) {
                _this.start();
            }

            setTimeout(function() {
                _this.resetHeight();

                if(_this.options.onready) {
                    (_this.options.onready)();
                }

            },500);

            $(window).resize(function() {
                _this.prepare();
                _this.resetHeight();
            });

        };

        _this.isTransitionReady = function() {
            return (_this.ready&&_this.inFocus&&_this.container$.is(":visible")&&_this.li$.length>1);
        };

        _this.prepare = function() {

            var current$ = _this.li$.filter(":visible");

            _this.li$
                .css("display","block")
                .css("width","100%")
                .css("height","auto")
                .css("position","absolute")
                .css("top","0px")
                .css("left","0px")
                .css("bottom","auto")
                .css("right","auto")
                .css("margin","0px")
                .toggle(true)
                .not(current$)
                .toggle(false)
                ;

            _this.li$.css(_this.options.slide_css);

            _this.container$
                .css("display","block")
                .css("position","relative")
                .css("width","auto")
                .css("height","auto")
                ;

            var ulHeight = (_this.options.height==="auto") ? current$.outerHeight()+"px" : _this.options.height;

            _this.ul$
                .css("position","relative")
                .css("box-sizing","border-box")
                .css("height",ulHeight)
                .css("margin","0px")
                .css("overflow","hidden")
                ;

        };

        _this.setControls = function() {
            if(_this.options.controls.start) {
                $(_this.options.controls.start).click(function(e) {
                    e.preventDefault();
                    _this.start();
                });
            }

            if(_this.options.controls.stop) {
                $(_this.options.controls.stop).click(function(e) {
                    e.preventDefault();
                    _this.stop(true);
                });
            }

            if(_this.options.controls.up) {
                $(_this.options.controls.up).click(function(e) {
                    e.preventDefault();
                    _this.up();
                });
            }

            if(_this.options.controls.down) {
                $(_this.options.controls.down).click(function(e) {
                    e.preventDefault();
                    _this.down();
                });
            }

            if(_this.options.controls.circles) {
                $(_this.options.controls.circles).each(function(index) {
                    var slide = index + 1;
                    $(this).click(function(e) {
                        e.preventDefault();
                        _this.select(slide);
                    });
                });
            }
        };

        _this.start = function() {
            if(!_this.isTransitionReady()) { return; }

            if(_this.timer) { return; }

            _this.isManual = false;

            _this.timer = window.setInterval(function() {
                if(_this.timer!==0) {
                    _this.move();
                }
            },_this.options.interval);

            if(_this.options.controls.start) {
                $(_this.options.controls.start).toggleClass('active',true);
            }
            if(_this.options.controls.stop) {
                $(_this.options.controls.stop).toggleClass('active',false);
            }

        };

        _this.pause = function() {
            if(!_this.ready) { return; }
            _this.stop(false);
        };

        _this.stop = function(manual) {
            if(!_this.ready) { return; }
            _this.isManual = manual;
            window.clearInterval(_this.timer);
            _this.timer = 0;

            if(_this.options.controls.start) {
                $(_this.options.controls.start).toggleClass('active',false);
            }
            if(_this.options.controls.stop) {
                $(_this.options.controls.stop).toggleClass('active',true);
            }

        };

        _this.move = function() {
            if(_this.options.direction==="up") {
                _this.up();
            }
            if(_this.options.direction==="down") {
                _this.down();
            }
        };

        _this.up = function() {
            if(!_this.isTransitionReady()) { return; }

            _this.li$.stop(true,true);

            var c$ = _this.li$.filter(":visible").eq(0);

            if(!c$.length) {
                c$ = _this.li$.filter(":first-child").toggle(true);
            }

            var n$ = c$.next();

            if(!n$.length) {
                n$ = _this.li$.filter(":first-child");
            }

            _this.li$.not(c$).toggle(false);

            n$
                .css("top",_this.container$.height()+"px")
                .toggle(true)
                ;

            if(_this.options.change) {
                (_this.options.change)(n$);
            }

            c$.add(n$).animate(
                { top: "-="+_this.ul$.height()+"px" },
                _this.options.speed,
                _this.options.easing,
                function() {
                    c$.toggle(false).css("top","0px");
                    n$.css("top","0px");
                    _this.markCircle(_this.li$.index(n$)+1);
                }
            );

        };

        _this.down = function() {
            if(!_this.isTransitionReady()) { return; }

            _this.li$.stop(true,true);

            var c$ = _this.li$.filter(":visible").eq(0);

            if(!c$.length) {
                c$ = _this.li$.filter(":first-child").toggle(true);
            }

            var p$ = c$.prev();

            if(!p$.length) {
                p$ = _this.li$.filter(":last-child");
            }

            _this.li$.not(c$).toggle(false);

            p$
                .css("top",(p$.outerHeight()*-1)+"px")
                .toggle(true)
                ;

            if(_this.options.change) {
                (_this.options.change)(p$);
            }

            c$.add(p$).animate(
                { top: "+="+_this.ul$.height()+"px" },
                _this.options.speed,
                _this.options.easing,
                function() {
                    c$.toggle(false).css("top","0px");
                    p$.css("top","0px");
                    _this.markCircle(_this.li$.index(p$)+1);
                }
            );

        };

        _this.select = function(n) {
            if(!_this.isTransitionReady()) { return; }

            _this.stop();
            setTimeout(function() {
                _this.start();
            },_this.options.interval);

            n = (n>=1 && n<=_this.li$.length) ? n : 1;

            var c$ = _this.li$.filter(":visible").eq(0);

            if(!c$.length) {
                c$ = _this.li$.filter(":first-child").toggle(true);
            }

            var n$ = _this.li$.filter(":nth-child("+n+")");

            if(n$.is(c$)) {
                return;
            }

            n$
                .css("top","0px")
                .fadeIn(_this.options.speed)
                ;

            if(_this.options.change) {
                (_this.options.change)(n$);
            }

            c$.fadeOut(_this.options.speed);

            _this.markCircle(_this.li$.index(n$)+1);

        };

        _this.markCircle = function(n) {
            if(_this.options.controls.circles) {
                $(_this.options.controls.circles)
                 .toggleClass('active',false)
                 .eq(n-1)
                 .toggleClass('active',true)
            }
        };

        _this.resetHeight = function() {
            var current$ = _this.li$.filter(":visible");
            var ulHeight = (_this.options.height==="auto") ? current$.outerHeight()+"px" : _this.options.height;
            _this.ul$.css("height",ulHeight);
        };

        _this.getPixelWidth = function(w) {
            w = (w+"").trim();
            var n = parseInt(w,10);
            if(w.match(/^[0-9\.]+(px)?$/gi)) {
                return n;
            }
            if(w.match(/^[0-9\.]+%$/gi)) {
                return _this.container$.outerWidth()*(n/100);
            }
            throw new _this.exception("invalid width set");
        };

        _this.getPixelHeight = function(h) {
            h = (h+"").trim();
            var n = parseInt(h,10);
            if(h.match(/^[0-9\.]+(px)?$/gi)) {
                return n;
            }
            if(h.match(/^[0-9\.]+%$/gi)) {
                return _this.container$.outerHeight()*(n/100);
            }
            throw new _this.exception("invalid height set");
        };

        _this.exception = function(msg) {
            this.message = name+": "+msg;
            this.name = "Exception";
        };

        try {
            _this.init();
        } catch(e) {
            console.log('Plugin Exception: '+e.message);
            return;
        }

        return {
            start: _this.start,
            pause: _this.pause,
            stop: function() { _this.stop(true); },
            up: _this.up,
            down: _this.down,
            select: _this.select,
            options: _this.options
        };

    };

    $.fn[name] = function(options) {
        return this.each(function() {
            if(!$.data(this,name)) {
                $.data(this,name,new UpDownSlider(this,options));
            }
        });
    };

})(jQuery,window,document);