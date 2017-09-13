jQuery(document).ready(function($) {
$(document).ready(function(){
//Touchscreen Dropdowns
	$('body>header>section>.row>.columns').mouseenter( function(){
		//alert('hovered');
		$('body').append('<div class="mask"></div>');
		 $('.mask').click(function(){
		 console.log('You clicked it, bro.');
		 $('.mask').remove();
		});
	});
	$('body>header>section>.row>.columns').mouseleave( function(){
		$('.mask').remove();
	});

// Dive Deeper Menu
	$('.menu-icon').click(function(){
		$('.menu').toggleClass('hide');
	});
	$('.menu-icon').click(function(){
		console.log('Success!');
	});
});
});

jQuery(document).ready(function(o){o(document).ready(function(){o("body>header>section>.row>.columns").mouseenter(function(){o("body").append('<div class="mask"></div>'),o(".mask").click(function(){console.log("You clicked it, bro."),o(".mask").remove()})}),o("body>header>section>.row>.columns").mouseleave(function(){o(".mask").remove()})})});
var $=jQuery.noConflict();

$(document).ready(function(){
    // Flip Function
    $('#card1,#card2,#card3,#card4,#card5,#card6').flip();

    // Dive Deeper Menu
  	$('.menu-icon').click(function(){
      $('.menu').slideToggle('slow');
      $('.fa-bars').toggleClass('hide');
      $('.fa-times').toggleClass('hide');
  	});

    $(".main-header").click(function(e) {
        $(this).nextAll(".columns").slideToggle();
    });

});

window.f1=window.f1||{},f1.MapLoader=f1.MapLoader||{},function($,window,document,undefined){var name="mapLoader",defaults={api_key:"",center:{lat:38.28333333,lng:-77.48333333},zoomControl:!0,zoom:8,minZoom:null,maxZoom:null,width:"auto",height:"auto",iconWidth:null,iconHeight:null,scrollwheel:!1,markers:"autoload",mapTypes:[],hideDefaultMapType:!1},endpoint="//maps.googleapis.com/maps/api/js?key=",mapLoader=function(container,options){var loader=this;loader.options=$.extend({},defaults,options),loader.container$=$(container).uniqueId(),loader.callback="f1.MapLoader.init_"+loader.container$.attr("id").replace(/-/g,"_"),loader.endpoint=endpoint+loader.options.api_key,loader.map=null,loader.markers=[],loader.mapTypes=[],loader.init=function(){if((api_key=loader.container$.data("key"))&&(loader.endpoint+=api_key,loader.options.api_key=api_key),!loader.options.api_key)throw new loader.exception("No API key set.");return(zoom=loader.container$.data("zoom"))&&(loader.options.zoom=zoom),(lat=loader.container$.data("lat"))&&(loader.options.center.lat=lat),(lng=loader.container$.data("lng"))&&(loader.options.center.lng=lng),"undefined"==typeof google||"undefined"==typeof google.maps?(eval(loader.callback+" = function() { loader.prepare(); };"),script$=$(document.createElement("script")),void script$.prop("type","text/javascript").prop("src",loader.endpoint+"&sensor=false&callback="+loader.callback).appendTo($("body"))):void loader.prepare()},loader.prepare=function(){loader.canvas$=$(document.createElement("div")),loader.canvas$.css("width","100%").css("min-width","50px").css("height","100%").css("min-height","50px"),loader.container$.css("width",loader.options.width).css("height",loader.options.height).empty().append(loader.canvas$),loader.generateMapTypes(),loader.map=loader.generateMap(),"autoload"===loader.options.markers&&loader.autoloadMarkers();for(n in loader.options.markers)loader.addMarker(loader.options.markers[n])},loader.generateMapTypes=function(){if(loader.options.mapTypes)for(n in loader.options.mapTypes)loader.mapTypes[loader.options.mapTypes[n].name]=new google.maps.StyledMapType(loader.options.mapTypes[n].styles,{name:loader.options.mapTypes[n].name})},loader.generateMap=function(){var o=loader.options.hideDefaultMapType?[]:[google.maps.MapTypeId.ROADMAP];for(n in loader.mapTypes)o.push(n);var e=new google.maps.Map(loader.canvas$.get(0),{center:loader.options.center,zoomControl:loader.options.zoomControl,zoom:loader.options.zoom,minZoom:loader.options.minZoom,maxZoom:loader.options.maxZoom,scrollwheel:loader.options.scrollwheel,mapTypeControlOptions:{mapTypeIds:o}});for(n in loader.options.mapTypes)e.mapTypes.set(loader.options.mapTypes[n].name,loader.mapTypes[loader.options.mapTypes[n].name]),loader.options.mapTypes[n].active&&e.setMapTypeId(loader.options.mapTypes[n].name);return e},loader.autoloadMarkers=function(){loader.options.markers=[],$(".map-location[data-lat][data-lng]").each(function(){var o=$(this).data("icon")||"",e=$(this).data("icon-width")||loader.options.iconWidth||"",a=$(this).data("icon-height")||loader.options.iconHeight||"";o&&e&&a&&(o={size:{width:e,height:a},scaledSize:{width:e,height:a},url:o}),loader.options.markers.push({position:{lat:$(this).data("lat"),lng:$(this).data("lng")},title:$(this).data("title"),info:{content:this,trigger:$(this).data("trigger")},icon:o})})},loader.addMarker=function(o){o.position=o.position||loader.options.center,o.title=o.title||"",o.icon=o.icon||"";var e=new google.maps.Marker({map:loader.map,position:o.position,visible:!0,title:o.title,icon:o.icon});e&&o.info&&loader.addInfoBox(e,o.info),loader.markers.push(e)},loader.addInfoBox=function(o,e){e.content=e.content||"",e.trigger=e.trigger||"click";var a=new google.maps.InfoWindow({content:e.content});google.maps.event.addListener(a,"domready",function(){loader.container$.find(".map-location").each(function(){$(this).parent().parent().toggleClass("map-location-container",!0)})}),"load"===e.trigger&&(a.open(loader.map,o),e.trigger="click"),google.maps.event.addListener(o,e.trigger,function(){a.open(loader.map,o)})},loader.exception=function(o){this.message="MapLoader: "+o,this.name="Exception"};try{loader.init()}catch(e){return void console.log(e.message)}return{options:loader.options,markers:loader.markers}};$.fn[name]=function(o){return this.length?this.each(function(){$.data(this,name)||$.data(this,name,new mapLoader(this,o))}):void console.log("Map container not found")}}(jQuery,window,document);
!function(t,i){var o="UpDownSlider",n={direction:"up",easing:"swing",speed:1e3,interval:4e3,height:"auto",autostart:1,mousePause:!0,controls:{start:null,stop:null,up:null,down:null,circles:null},slide_css:{},onready:null,change:null},s=function(s,e){var l=this;l.options=t.extend({},n,e),l.container$=t(s),l.ul$=l.container$.children("ul:first-child"),l.li$=l.ul$.children("li"),l.timer=0,l.inFocus=!0,l.isManual=!1,l.ready=!1,l.init=function(){l.ul$.length<1||l.li$.length<1||l.ready||(t(i).focus(function(){l.inFocus=!0}).blur(function(){l.inFocus=!1}),l.options.mousePause&&l.container$.hover(function(){l.isManual||l.pause()},function(){l.isManual||l.start()}),l.prepare(),l.setControls(),l.ready=!0,l.options.autostart&&l.start(),setTimeout(function(){l.resetHeight(),l.options.onready&&l.options.onready()},500),t(i).resize(function(){l.prepare(),l.resetHeight()}))},l.isTransitionReady=function(){return l.ready&&l.inFocus&&l.container$.is(":visible")&&l.li$.length>1},l.prepare=function(){var t=l.li$.filter(":visible");l.li$.css("display","block").css("width","100%").css("height","auto").css("position","absolute").css("top","0px").css("left","0px").css("bottom","auto").css("right","auto").css("margin","0px").toggle(!0).not(t).toggle(!1),l.li$.css(l.options.slide_css),l.container$.css("display","block").css("position","relative").css("width","auto").css("height","auto");var i="auto"===l.options.height?t.outerHeight()+"px":l.options.height;l.ul$.css("position","relative").css("box-sizing","border-box").css("height",i).css("margin","0px").css("overflow","hidden")},l.setControls=function(){l.options.controls.start&&t(l.options.controls.start).click(function(t){t.preventDefault(),l.start()}),l.options.controls.stop&&t(l.options.controls.stop).click(function(t){t.preventDefault(),l.stop(!0)}),l.options.controls.up&&t(l.options.controls.up).click(function(t){t.preventDefault(),l.up()}),l.options.controls.down&&t(l.options.controls.down).click(function(t){t.preventDefault(),l.down()}),l.options.controls.circles&&t(l.options.controls.circles).each(function(i){var o=i+1;t(this).click(function(t){t.preventDefault(),l.select(o)})})},l.start=function(){l.isTransitionReady()&&(l.timer||(l.isManual=!1,l.timer=i.setInterval(function(){0!==l.timer&&l.move()},l.options.interval),l.options.controls.start&&t(l.options.controls.start).toggleClass("active",!0),l.options.controls.stop&&t(l.options.controls.stop).toggleClass("active",!1)))},l.pause=function(){l.ready&&l.stop(!1)},l.stop=function(o){l.ready&&(l.isManual=o,i.clearInterval(l.timer),l.timer=0,l.options.controls.start&&t(l.options.controls.start).toggleClass("active",!1),l.options.controls.stop&&t(l.options.controls.stop).toggleClass("active",!0))},l.move=function(){"up"===l.options.direction&&l.up(),"down"===l.options.direction&&l.down()},l.up=function(){if(l.isTransitionReady()){l.li$.stop(!0,!0);var t=l.li$.filter(":visible").eq(0);t.length||(t=l.li$.filter(":first-child").toggle(!0));var i=t.next();i.length||(i=l.li$.filter(":first-child")),l.li$.not(t).toggle(!1),i.css("top",l.container$.height()+"px").toggle(!0),l.options.change&&l.options.change(i),t.add(i).animate({top:"-="+l.ul$.height()+"px"},l.options.speed,l.options.easing,function(){t.toggle(!1).css("top","0px"),i.css("top","0px"),l.markCircle(l.li$.index(i)+1)})}},l.down=function(){if(l.isTransitionReady()){l.li$.stop(!0,!0);var t=l.li$.filter(":visible").eq(0);t.length||(t=l.li$.filter(":first-child").toggle(!0));var i=t.prev();i.length||(i=l.li$.filter(":last-child")),l.li$.not(t).toggle(!1),i.css("top",-1*i.outerHeight()+"px").toggle(!0),l.options.change&&l.options.change(i),t.add(i).animate({top:"+="+l.ul$.height()+"px"},l.options.speed,l.options.easing,function(){t.toggle(!1).css("top","0px"),i.css("top","0px"),l.markCircle(l.li$.index(i)+1)})}},l.select=function(t){if(l.isTransitionReady()){l.stop(),setTimeout(function(){l.start()},l.options.interval),t=t>=1&&t<=l.li$.length?t:1;var i=l.li$.filter(":visible").eq(0);i.length||(i=l.li$.filter(":first-child").toggle(!0));var o=l.li$.filter(":nth-child("+t+")");o.is(i)||(o.css("top","0px").fadeIn(l.options.speed),l.options.change&&l.options.change(o),i.fadeOut(l.options.speed),l.markCircle(l.li$.index(o)+1))}},l.markCircle=function(i){l.options.controls.circles&&t(l.options.controls.circles).toggleClass("active",!1).eq(i-1).toggleClass("active",!0)},l.resetHeight=function(){var t=l.li$.filter(":visible"),i="auto"===l.options.height?t.outerHeight()+"px":l.options.height;l.ul$.css("height",i)},l.getPixelWidth=function(t){t=(t+"").trim();var i=parseInt(t,10);if(t.match(/^[0-9\.]+(px)?$/gi))return i;if(t.match(/^[0-9\.]+%$/gi))return l.container$.outerWidth()*(i/100);throw new l.exception("invalid width set")},l.getPixelHeight=function(t){t=(t+"").trim();var i=parseInt(t,10);if(t.match(/^[0-9\.]+(px)?$/gi))return i;if(t.match(/^[0-9\.]+%$/gi))return l.container$.outerHeight()*(i/100);throw new l.exception("invalid height set")},l.exception=function(t){this.message=o+": "+t,this.name="Exception"};try{l.init()}catch(r){return console.log("Plugin Exception: "+r.message),void 0}return{start:l.start,pause:l.pause,stop:function(){l.stop(!0)},up:l.up,down:l.down,select:l.select,options:l.options}};t.fn[o]=function(i){return this.each(function(){t.data(this,o)||t.data(this,o,new s(this,i))})}}(jQuery,window,document);
/*! flip - v1.1.2 - 2016-10-20
* https://github.com/nnattawat/flip
* Copyright (c) 2016 Nattawat Nonsung; Licensed MIT */
(function( $ ) {
  /*
   * Private attributes and method
   */

  // Function from David Walsh: http://davidwalsh.name/css-animation-callback licensed with http://opensource.org/licenses/MIT
  var whichTransitionEvent = function() {
    var t, el = document.createElement("fakeelement"),
    transitions = {
      "transition"      : "transitionend",
      "OTransition"     : "oTransitionEnd",
      "MozTransition"   : "transitionend",
      "WebkitTransition": "webkitTransitionEnd"
    };

    for (t in transitions) {
      if (el.style[t] !== undefined) {
        return transitions[t];
      }
    }
  };

  /*
   * Model declaration
   */
  var Flip = function($el, options, callback) {
    // Define default setting
    this.setting = {
      axis: "y",
      reverse: false,
      trigger: "click",
      speed: 500,
      forceHeight: false,
      forceWidth: false,
      autoSize: true,
      front: '.front',
      back: '.back'
    };

    this.setting = $.extend(this.setting, options);

    if (typeof options.axis === 'string' && (options.axis.toLowerCase() === 'x' || options.axis.toLowerCase() === 'y')) {
      this.setting.axis = options.axis.toLowerCase();
    }

    if (typeof options.reverse === "boolean") {
      this.setting.reverse = options.reverse;
    }

    if (typeof options.trigger === 'string') {
      this.setting.trigger = options.trigger.toLowerCase();
    }

    var speed = parseInt(options.speed);
    if (!isNaN(speed)) {
      this.setting.speed = speed;
    }

    if (typeof options.forceHeight === "boolean") {
      this.setting.forceHeight = options.forceHeight;
    }

    if (typeof options.forceWidth === "boolean") {
      this.setting.forceWidth = options.forceWidth;
    }

    if (typeof options.autoSize === "boolean") {
      this.setting.autoSize = options.autoSize;
    }

    if (typeof options.front === 'string' || options.front instanceof $) {
      this.setting.front = options.front;
    }

    if (typeof options.back === 'string' || options.back instanceof $) {
      this.setting.back = options.back;
    }

    // Other attributes
    this.element = $el;
    this.frontElement = this.getFrontElement();
    this.backElement = this.getBackElement();
    this.isFlipped = false;

    this.init(callback);
  };

  /*
   * Public methods
   */
  $.extend(Flip.prototype, {

    flipDone: function(callback) {
      var self = this;
      // Providing a nicely wrapped up callback because transform is essentially async
      self.element.one(whichTransitionEvent(), function() {
        self.element.trigger('flip:done');
        if (typeof callback === 'function') {
          callback.call(self.element);
        }
      });
    },

    flip: function(callback) {
      if (this.isFlipped) {
        return;
      }

      this.isFlipped = true;

      var rotateAxis = "rotate" + this.setting.axis;
      this.frontElement.css({
        transform: rotateAxis + (this.setting.reverse ? "(-180deg)" : "(180deg)"),
        "z-index": "0"
      });

      this.backElement.css({
        transform: rotateAxis + "(0deg)",
        "z-index": "1"
      });
      this.flipDone(callback);
    },

    unflip: function(callback) {
      if (!this.isFlipped) {
        return;
      }

      this.isFlipped = false;

      var rotateAxis = "rotate" + this.setting.axis;
      this.frontElement.css({
        transform: rotateAxis + "(0deg)",
        "z-index": "1"
      });

      this.backElement.css({
        transform: rotateAxis + (this.setting.reverse ? "(180deg)" : "(-180deg)"),
        "z-index": "0"
      });
      this.flipDone(callback);
    },

    getFrontElement: function() {
      if (this.setting.front instanceof $) {
        return this.setting.front;
      } else {
        return this.element.find(this.setting.front);
      }
    },

    getBackElement: function() {
      if (this.setting.back instanceof $) {
        return this.setting.back;
      } else {
        return this.element.find(this.setting.back);
      }
    },

    init: function(callback) {
      var self = this;

      var faces = self.frontElement.add(self.backElement);
      var rotateAxis = "rotate" + self.setting.axis;
      var perspective = self.element["outer" + (rotateAxis === "rotatex" ? "Height" : "Width")]() * 2;
      var elementCss = {
        'perspective': perspective,
        'position': 'relative'
      };
      var backElementCss = {
        "transform": rotateAxis + "(" + (self.setting.reverse ? "180deg" : "-180deg") + ")",
        "z-index": "0",
        "position": "relative"
      };
      var faceElementCss = {
        "backface-visibility": "hidden",
        "transform-style": "preserve-3d",
        "position": "absolute",
        "z-index": "1"
      };

      if (self.setting.forceHeight) {
        faces.outerHeight(self.element.height());
      } else if (self.setting.autoSize) {
        faceElementCss.height = '100%';
      }

      if (self.setting.forceWidth) {
        faces.outerWidth(self.element.width());
      } else if (self.setting.autoSize) {
        faceElementCss.width = '100%';
      }

      // Back face always visible on Chrome #39
      if ((window.chrome || (window.Intl && Intl.v8BreakIterator)) && 'CSS' in window) {
        //Blink Engine, add preserve-3d to self.element
        elementCss["-webkit-transform-style"] = "preserve-3d";
      }


      faces.css(faceElementCss).find('*').css({
        "backface-visibility": "hidden"
      });

      self.element.css(elementCss);
      self.backElement.css(backElementCss);

      // #39
      // not forcing width/height may cause an initial flip to show up on
      // page load when we apply the style to reverse the backface...
      // To prevent self we first apply the basic styles and then give the
      // browser a moment to apply them. Only afterwards do we add the transition.
      setTimeout(function() {
        // By now the browser should have applied the styles, so the transition
        // will only affect subsequent flips.
        var speedInSec = self.setting.speed / 1000 || 0.5;
        faces.css({
          "transition": "all " + speedInSec + "s ease-out"
        });

        // This allows flip to be called for setup with only a callback (default settings)
        if (typeof callback === 'function') {
          callback.call(self.element);
        }

        // While this used to work with a setTimeout of zero, at some point that became
        // unstable and the initial flip returned. The reason for this is unknown but we
        // will temporarily use a short delay of 20 to mitigate this issue.
      }, 20);

      self.attachEvents();
    },

    clickHandler: function(event) {
      if (!event) { event = window.event; }
      if (this.element.find($(event.target).closest('button, a, input[type="submit"]')).length) {
        return;
      }

      if (this.isFlipped) {
        this.unflip();
      } else {
        this.flip();
      }
    },

    hoverHandler: function() {
      var self = this;
      self.element.off('mouseleave.flip');

      self.flip();

      setTimeout(function() {
        self.element.on('mouseleave.flip', $.proxy(self.unflip, self));
        if (!self.element.is(":hover")) {
          self.unflip();
        }
      }, (self.setting.speed + 150));
    },

    attachEvents: function() {
      var self = this;
      if (self.setting.trigger === "click") {
        self.element.on($.fn.tap ? "tap.flip" : "click.flip", $.proxy(self.clickHandler, self));
      } else if (self.setting.trigger === "hover") {
        self.element.on('mouseenter.flip', $.proxy(self.hoverHandler, self));
        self.element.on('mouseleave.flip', $.proxy(self.unflip, self));
      }
    },

    flipChanged: function(callback) {
      this.element.trigger('flip:change');
      if (typeof callback === 'function') {
        callback.call(this.element);
      }
    },

    changeSettings: function(options, callback) {
      var self = this;
      var changeNeeded = false;

      if (options.axis !== undefined && self.setting.axis !== options.axis.toLowerCase()) {
        self.setting.axis = options.axis.toLowerCase();
        changeNeeded = true;
      }

      if (options.reverse !== undefined && self.setting.reverse !== options.reverse) {
        self.setting.reverse = options.reverse;
        changeNeeded = true;
      }

      if (changeNeeded) {
        var faces = self.frontElement.add(self.backElement);
        var savedTrans = faces.css(["transition-property", "transition-timing-function", "transition-duration", "transition-delay"]);

        faces.css({
          transition: "none"
        });

        // This sets up the first flip in the new direction automatically
        var rotateAxis = "rotate" + self.setting.axis;

        if (self.isFlipped) {
          self.frontElement.css({
            transform: rotateAxis + (self.setting.reverse ? "(-180deg)" : "(180deg)"),
            "z-index": "0"
          });
        } else {
          self.backElement.css({
            transform: rotateAxis + (self.setting.reverse ? "(180deg)" : "(-180deg)"),
            "z-index": "0"
          });
        }
        // Providing a nicely wrapped up callback because transform is essentially async
        setTimeout(function() {
          faces.css(savedTrans);
          self.flipChanged(callback);
        }, 0);
      } else {
        // If we didnt have to set the axis we can just call back.
        self.flipChanged(callback);
      }
    }

  });

  /*
   * jQuery collection methods
   */
  $.fn.flip = function (options, callback) {
    if (typeof options === 'function') {
      callback = options;
    }

    if (typeof options === "string" || typeof options === "boolean") {
      this.each(function() {
        var flip = $(this).data('flip-model');

        if (options === "toggle") {
          options = !flip.isFlipped;
        }

        if (options) {
          flip.flip(callback);
        } else {
          flip.unflip(callback);
        }
      });
    } else {
      this.each(function() {
        if ($(this).data('flip-model')) { // The element has been initiated, all we have to do is change applicable settings
          var flip = $(this).data('flip-model');

          if (options && (options.axis !== undefined || options.reverse !== undefined)) {
            flip.changeSettings(options, callback);
          }
        } else { // Init
          $(this).data('flip-model', new Flip($(this), (options || {}), callback));
        }
      });
    }

    return this;
  };

}( jQuery ));

/*! flip - v1.1.2 - 2016-10-20
* https://github.com/nnattawat/flip
* Copyright (c) 2016 Nattawat Nonsung; Licensed MIT */

!function(a){var b=function(){var a,b=document.createElement("fakeelement"),c={transition:"transitionend",OTransition:"oTransitionEnd",MozTransition:"transitionend",WebkitTransition:"webkitTransitionEnd"};for(a in c)if(void 0!==b.style[a])return c[a]},c=function(b,c,d){this.setting={axis:"y",reverse:!1,trigger:"click",speed:500,forceHeight:!1,forceWidth:!1,autoSize:!0,front:".front",back:".back"},this.setting=a.extend(this.setting,c),"string"!=typeof c.axis||"x"!==c.axis.toLowerCase()&&"y"!==c.axis.toLowerCase()||(this.setting.axis=c.axis.toLowerCase()),"boolean"==typeof c.reverse&&(this.setting.reverse=c.reverse),"string"==typeof c.trigger&&(this.setting.trigger=c.trigger.toLowerCase());var e=parseInt(c.speed);isNaN(e)||(this.setting.speed=e),"boolean"==typeof c.forceHeight&&(this.setting.forceHeight=c.forceHeight),"boolean"==typeof c.forceWidth&&(this.setting.forceWidth=c.forceWidth),"boolean"==typeof c.autoSize&&(this.setting.autoSize=c.autoSize),("string"==typeof c.front||c.front instanceof a)&&(this.setting.front=c.front),("string"==typeof c.back||c.back instanceof a)&&(this.setting.back=c.back),this.element=b,this.frontElement=this.getFrontElement(),this.backElement=this.getBackElement(),this.isFlipped=!1,this.init(d)};a.extend(c.prototype,{flipDone:function(a){var c=this;c.element.one(b(),function(){c.element.trigger("flip:done"),"function"==typeof a&&a.call(c.element)})},flip:function(a){if(!this.isFlipped){this.isFlipped=!0;var b="rotate"+this.setting.axis;this.frontElement.css({transform:b+(this.setting.reverse?"(-180deg)":"(180deg)"),"z-index":"0"}),this.backElement.css({transform:b+"(0deg)","z-index":"1"}),this.flipDone(a)}},unflip:function(a){if(this.isFlipped){this.isFlipped=!1;var b="rotate"+this.setting.axis;this.frontElement.css({transform:b+"(0deg)","z-index":"1"}),this.backElement.css({transform:b+(this.setting.reverse?"(180deg)":"(-180deg)"),"z-index":"0"}),this.flipDone(a)}},getFrontElement:function(){return this.setting.front instanceof a?this.setting.front:this.element.find(this.setting.front)},getBackElement:function(){return this.setting.back instanceof a?this.setting.back:this.element.find(this.setting.back)},init:function(a){var b=this,c=b.frontElement.add(b.backElement),d="rotate"+b.setting.axis,e=2*b.element["outer"+("rotatex"===d?"Height":"Width")](),f={perspective:e,position:"relative"},g={transform:d+"("+(b.setting.reverse?"180deg":"-180deg")+")","z-index":"0",position:"relative"},h={"backface-visibility":"hidden","transform-style":"preserve-3d",position:"absolute","z-index":"1"};b.setting.forceHeight?c.outerHeight(b.element.height()):b.setting.autoSize&&(h.height="100%"),b.setting.forceWidth?c.outerWidth(b.element.width()):b.setting.autoSize&&(h.width="100%"),(window.chrome||window.Intl&&Intl.v8BreakIterator)&&"CSS"in window&&(f["-webkit-transform-style"]="preserve-3d"),c.css(h).find("*").css({"backface-visibility":"hidden"}),b.element.css(f),b.backElement.css(g),setTimeout(function(){var d=b.setting.speed/1e3||.5;c.css({transition:"all "+d+"s ease-out"}),"function"==typeof a&&a.call(b.element)},20),b.attachEvents()},clickHandler:function(b){b||(b=window.event),this.element.find(a(b.target).closest('button, a, input[type="submit"]')).length||(this.isFlipped?this.unflip():this.flip())},hoverHandler:function(){var b=this;b.element.off("mouseleave.flip"),b.flip(),setTimeout(function(){b.element.on("mouseleave.flip",a.proxy(b.unflip,b)),b.element.is(":hover")||b.unflip()},b.setting.speed+150)},attachEvents:function(){var b=this;"click"===b.setting.trigger?b.element.on(a.fn.tap?"tap.flip":"click.flip",a.proxy(b.clickHandler,b)):"hover"===b.setting.trigger&&(b.element.on("mouseenter.flip",a.proxy(b.hoverHandler,b)),b.element.on("mouseleave.flip",a.proxy(b.unflip,b)))},flipChanged:function(a){this.element.trigger("flip:change"),"function"==typeof a&&a.call(this.element)},changeSettings:function(a,b){var c=this,d=!1;if(void 0!==a.axis&&c.setting.axis!==a.axis.toLowerCase()&&(c.setting.axis=a.axis.toLowerCase(),d=!0),void 0!==a.reverse&&c.setting.reverse!==a.reverse&&(c.setting.reverse=a.reverse,d=!0),d){var e=c.frontElement.add(c.backElement),f=e.css(["transition-property","transition-timing-function","transition-duration","transition-delay"]);e.css({transition:"none"});var g="rotate"+c.setting.axis;c.isFlipped?c.frontElement.css({transform:g+(c.setting.reverse?"(-180deg)":"(180deg)"),"z-index":"0"}):c.backElement.css({transform:g+(c.setting.reverse?"(180deg)":"(-180deg)"),"z-index":"0"}),setTimeout(function(){e.css(f),c.flipChanged(b)},0)}else c.flipChanged(b)}}),a.fn.flip=function(b,d){return"function"==typeof b&&(d=b),"string"==typeof b||"boolean"==typeof b?this.each(function(){var c=a(this).data("flip-model");"toggle"===b&&(b=!c.isFlipped),b?c.flip(d):c.unflip(d)}):this.each(function(){if(a(this).data("flip-model")){var e=a(this).data("flip-model");!b||void 0===b.axis&&void 0===b.reverse||e.changeSettings(b,d)}else a(this).data("flip-model",new c(a(this),b||{},d))}),this}}(jQuery);
//# sourceMappingURL=jquery.flip.min.js.map
// jQuery Mask Plugin v1.7.4
// github.com/igorescobar/jQuery-Mask-Plugin
(function(g){"function"===typeof define&&define.amd?define(["jquery"],g):g(window.jQuery||window.Zepto)})(function(g){var z=function(a,e,b){var k=this,n,p;a=g(a);e="function"===typeof e?e(a.val(),void 0,a,b):e;var c={getCaret:function(){try{var d,f=0,c=a.get(0),h=document.selection,e=c.selectionStart;if(h&&!~navigator.appVersion.indexOf("MSIE 10"))d=h.createRange(),d.moveStart("character",a.is("input")?-a.val().length:-a.text().length),f=d.text.length;else if(e||"0"===e)f=e;return f}catch(b){}},setCaret:function(d){try{if(a.is(":focus")){var f,
c=a.get(0);c.setSelectionRange?c.setSelectionRange(d,d):c.createTextRange&&(f=c.createTextRange(),f.collapse(!0),f.moveEnd("character",d),f.moveStart("character",d),f.select())}}catch(h){}},events:function(){a.on("keydown.mask",function(){n=c.val()}).on("keyup.mask",c.behaviour).on("paste.mask drop.mask",function(){setTimeout(function(){a.keydown().keyup()},100)}).on("change.mask",function(){a.data("changed",!0)}).on("blur.mask",function(){n===a.val()||a.data("changed")||a.trigger("change");a.data("changed",
!1)}).on("focusout.mask",function(){b.clearIfNotMatch&&!p.test(c.val())&&c.val("")})},getRegexMask:function(){for(var d=[],f,a,c,b,l=0;l<e.length;l++)(f=k.translation[e[l]])?(a=f.pattern.toString().replace(/.{1}$|^.{1}/g,""),c=f.optional,(f=f.recursive)?(d.push(e[l]),b={digit:e[l],pattern:a}):d.push(c||f?a+"?":a)):d.push("\\"+e[l]);d=d.join("");b&&(d=d.replace(RegExp("("+b.digit+"(.*"+b.digit+")?)"),"($1)?").replace(RegExp(b.digit,"g"),b.pattern));return RegExp(d)},destroyEvents:function(){a.off("keydown keyup paste drop change blur focusout DOMNodeInserted ".split(" ").join(".mask ")).removeData("changeCalled")},
val:function(d){var c=a.is("input");return 0<arguments.length?c?a.val(d):a.text(d):c?a.val():a.text()},getMCharsBeforeCount:function(d,a){for(var c=0,b=0,g=e.length;b<g&&b<d;b++)k.translation[e.charAt(b)]||(d=a?d+1:d,c++);return c},caretPos:function(d,a,b,h){return k.translation[e.charAt(Math.min(d-1,e.length-1))]?Math.min(d+b-a-h,b):c.caretPos(d+1,a,b,h)},behaviour:function(d){d=d||window.event;var a=d.keyCode||d.which;if(-1===g.inArray(a,k.byPassKeys)){var b=c.getCaret(),e=c.val(),u=e.length,l=
b<u,q=c.getMasked(),m=q.length,n=c.getMCharsBeforeCount(m-1)-c.getMCharsBeforeCount(u-1);q!==e&&c.val(q);!l||65===a&&d.ctrlKey||(8!==a&&46!==a&&(b=c.caretPos(b,u,m,n)),c.setCaret(b));return c.callbacks(d)}},getMasked:function(a){var f=[],g=c.val(),h=0,n=e.length,l=0,q=g.length,m=1,p="push",s=-1,r,v;b.reverse?(p="unshift",m=-1,r=0,h=n-1,l=q-1,v=function(){return-1<h&&-1<l}):(r=n-1,v=function(){return h<n&&l<q});for(;v();){var w=e.charAt(h),x=g.charAt(l),t=k.translation[w];if(t)x.match(t.pattern)?(f[p](x),
t.recursive&&(-1===s?s=h:h===r&&(h=s-m),r===s&&(h-=m)),h+=m):t.optional&&(h+=m,l-=m),l+=m;else{if(!a)f[p](w);x===w&&(l+=m);h+=m}}a=e.charAt(r);n!==q+1||k.translation[a]||f.push(a);return f.join("")},callbacks:function(d){var f=c.val(),g=f!==n;if(!0===g&&"function"===typeof b.onChange)b.onChange(f,d,a,b);if(!0===g&&"function"===typeof b.onKeyPress)b.onKeyPress(f,d,a,b);if("function"===typeof b.onComplete&&f.length===e.length)b.onComplete(f,d,a,b)}};k.remove=function(){var a;c.destroyEvents();c.val(k.getCleanVal()).removeAttr("maxlength");
a=c.getCaret();c.setCaret(a-c.getMCharsBeforeCount(a))};k.getCleanVal=function(){return c.getMasked(!0)};k.init=function(){b=b||{};k.byPassKeys=[9,16,17,18,36,37,38,39,40,91];k.translation={0:{pattern:/\d/},9:{pattern:/\d/,optional:!0},"#":{pattern:/\d/,recursive:!0},A:{pattern:/[a-zA-Z0-9]/},S:{pattern:/[a-zA-Z]/}};k.translation=g.extend({},k.translation,b.translation);k=g.extend(!0,{},k,b);p=c.getRegexMask();!1!==b.maxlength&&a.attr("maxlength",e.length);b.placeholder&&a.attr("placeholder",b.placeholder);
a.attr("autocomplete","off");c.destroyEvents();c.events();var d=c.getCaret();c.val(c.getMasked());c.setCaret(d+c.getMCharsBeforeCount(d,!0))}()},p={},y=function(){var a=g(this),e={};a.attr("data-mask-reverse")&&(e.reverse=!0);"false"===a.attr("data-mask-maxlength")&&(e.maxlength=!1);a.attr("data-mask-clearifnotmatch")&&(e.clearIfNotMatch=!0);a.mask(a.attr("data-mask"),e)};g.fn.mask=function(a,e){var b=this.selector,k=function(b){if(!b.originalEvent||g(b.originalEvent.relatedNode)[0]!=g(this)[0])return g(this).data("mask",
new z(this,a,e))};this.each(k);b&&!p[b]&&(p[b]=!0,setTimeout(function(){g(document).on("DOMNodeInserted.mask",b,k)},500))};g.fn.unmask=function(){try{return this.each(function(){g(this).data("mask").remove()})}catch(a){}};g.fn.cleanVal=function(){return this.data("mask").getCleanVal()};g("*[data-mask]").each(y);g(document).on("DOMNodeInserted.mask","*[data-mask]",y)});
/*
 *  Remodal - v0.2.0
 *  Flat, responsive, lightweight, easy customizable modal window plugin with declarative state notation and hash tracking.
 *  http://vodkabears.github.io/remodal/
 *
 *  Made by Ilya Makarov
 *  Under MIT License
 */
!function(a){"use strict";function b(b,e){this.settings=a.extend({},d,e),this.modal=b,this.buildDOM(),this.addEventListeners(),this.index=a[c].lookup.push(this)-1,this.busy=!1}var c="remodal",d={hashTracking:!0,closeOnConfirm:!0,closeOnCancel:!0};a[c]={lookup:[]};var e,f,g=function(a){var b=a.css("transition-duration")||a.css("-webkit-transition-duration")||a.css("-moz-transition-duration")||a.css("-o-transition-duration")||a.css("-ms-transition-duration")||0,c=a.css("transition-delay")||a.css("-webkit-transition-delay")||a.css("-moz-transition-delay")||a.css("-o-transition-delay")||a.css("-ms-transition-delay")||0;return 1e3*(parseFloat(b)+parseFloat(c))},h=function(){if(a(document.body).height()<=a(window).height())return 0;var b=document.createElement("div");b.style.visibility="hidden",b.style.width="100px",document.body.appendChild(b);var c=b.offsetWidth;b.style.overflow="scroll";var d=document.createElement("div");d.style.width="100%",b.appendChild(d);var e=d.offsetWidth;return b.parentNode.removeChild(b),c-e},i=function(){a(document.body).css("padding-right","+="+h()),a("html, body").addClass(c+"_lock")},j=function(){a(document.body).css("padding-right","-="+h()),a("html, body").removeClass(c+"_lock")},k=function(a){var b,c,d={};b=a.replace(/\s*:\s*/g,":").replace(/\s*,\s*/g,","),c=b.split(",");var e,f,g;for(e=0,f=c.length;f>e;e++)c[e]=c[e].split(":"),g=c[e][1],("string"==typeof g||g instanceof String)&&(g="true"===g||("false"===g?!1:g)),("string"==typeof g||g instanceof String)&&(g=isNaN(g)?g:+g),d[c[e][0]]=g;return d};b.prototype.buildDOM=function(){this.body=a(document.body),this.bg=a("."+c+"-bg"),this.modalClose=a("<a href='#'>").addClass(c+"-close"),this.overlay=a("<div>").addClass(c+"-overlay"),this.modal.hasClass(c)||this.modal.addClass(c),this.modal.css("visibility","visible"),this.modal.append(this.modalClose),this.overlay.append(this.modal),this.body.append(this.overlay),this.confirm=this.modal.find("."+c+"-confirm"),this.cancel=this.modal.find("."+c+"-cancel");var b=g(this.overlay),d=g(this.modal),e=g(this.bg);this.td=d>b?d:b,this.td=e>this.td?e:this.td},b.prototype.addEventListeners=function(){var b=this;this.modalClose.bind("click."+c,function(a){a.preventDefault(),b.close()}),this.cancel.bind("click."+c,function(a){a.preventDefault(),b.modal.trigger("cancel"),b.settings.closeOnCancel&&b.close()}),this.confirm.bind("click."+c,function(a){a.preventDefault(),b.modal.trigger("confirm"),b.settings.closeOnConfirm&&b.close()}),a(document).bind("keyup."+c,function(a){27===a.keyCode&&b.close()}),this.overlay.bind("click."+c,function(d){var e=a(d.target);e.hasClass(c+"-overlay")&&b.close()})},b.prototype.open=function(){if(!this.busy){this.busy=!0,this.modal.trigger("open");var b=this.modal.attr("data-"+c+"-id");b&&this.settings.hashTracking&&(f=a(window).scrollTop(),location.hash=b),e&&e!==this&&(e.overlay.hide(),e.body.removeClass(c+"_active")),e=this,i(),this.overlay.show();var d=this;setTimeout(function(){d.body.addClass(c+"_active"),setTimeout(function(){d.busy=!1,d.modal.trigger("opened")},d.td+50)},25)}},b.prototype.close=function(){if(!this.busy){this.busy=!0,this.modal.trigger("close"),this.settings.hashTracking&&this.modal.attr("data-"+c+"-id")===location.hash.substr(1)&&(location.hash="",a(window).scrollTop(f)),this.body.removeClass(c+"_active");var b=this;setTimeout(function(){b.overlay.hide(),j(),b.busy=!1,b.modal.trigger("closed")},b.td+50)}},a&&(a.fn[c]=function(d){var e;return this.each(function(f,g){var h=a(g);null==h.data(c)&&(e=new b(h,d),h.data(c,e.index),e.settings.hashTracking&&h.attr("data-"+c+"-id")===location.hash.substr(1)&&e.open())}),e}),a(document).ready(function(){a(document).on("click","[data-"+c+"-target]",function(b){b.preventDefault();var d=b.currentTarget,e=d.getAttribute("data-"+c+"-target"),f=a("[data-"+c+"-id="+e+"]");a[c].lookup[f.data(c)].open()}),a(document).find("."+c).each(function(b,d){var e=a(d),f=e.data(c+"-options");f?("string"==typeof f||f instanceof String)&&(f=k(f)):f={},e[c](f)})});var l=function(b,d){var f=location.hash.replace("#","");if("undefined"==typeof d&&(d=!0),f){var g;try{g=a("[data-"+c+"-id="+f.replace(new RegExp("/","g"),"\\/")+"]")}catch(b){}if(g&&g.length){var h=a[c].lookup[g.data(c)];h&&h.settings.hashTracking&&h.open()}}else d&&e&&!e.busy&&e.settings.hashTracking&&e.close()};a(window).bind("hashchange."+c,l)}(window.jQuery||window.Zepto);
/*!
 * jQuery-ajaxTransport-XDomainRequest - v1.0.3 - 2014-06-06
 * https://github.com/MoonScript/jQuery-ajaxTransport-XDomainRequest
 * Copyright (c) 2014 Jason Moon (@JSONMOON)
 * Licensed MIT (/blob/master/LICENSE.txt)
 */
(function(a){if(typeof define==='function'&&define.amd){define(['jquery'],a)}else if(typeof exports==='object'){module.exports=a(require('jquery'))}else{a(jQuery)}}(function($){if($.support.cors||!$.ajaxTransport||!window.XDomainRequest){return}var n=/^https?:\/\//i;var o=/^get|post$/i;var p=new RegExp('^'+location.protocol,'i');$.ajaxTransport('* text html xml json',function(j,k,l){if(!j.crossDomain||!j.async||!o.test(j.type)||!n.test(j.url)||!p.test(j.url)){return}var m=null;return{send:function(f,g){var h='';var i=(k.dataType||'').toLowerCase();m=new XDomainRequest();if(/^\d+$/.test(k.timeout)){m.timeout=k.timeout}m.ontimeout=function(){g(500,'timeout')};m.onload=function(){var a='Content-Length: '+m.responseText.length+'\r\nContent-Type: '+m.contentType;var b={code:200,message:'success'};var c={text:m.responseText};try{if(i==='html'||/text\/html/i.test(m.contentType)){c.html=m.responseText}else if(i==='json'||(i!=='text'&&/\/json/i.test(m.contentType))){try{c.json=$.parseJSON(m.responseText)}catch(e){b.code=500;b.message='parseerror'}}else if(i==='xml'||(i!=='text'&&/\/xml/i.test(m.contentType))){var d=new ActiveXObject('Microsoft.XMLDOM');d.async=false;try{d.loadXML(m.responseText)}catch(e){d=undefined}if(!d||!d.documentElement||d.getElementsByTagName('parsererror').length){b.code=500;b.message='parseerror';throw'Invalid XML: '+m.responseText;}c.xml=d}}catch(parseMessage){throw parseMessage;}finally{g(b.code,b.message,c,a)}};m.onprogress=function(){};m.onerror=function(){g(500,'error',{text:m.responseText})};if(k.data){h=($.type(k.data)==='string')?k.data:$.param(k.data)}m.open(j.type,j.url);m.send(h)},abort:function(){if(m){m.abort()}}}})}));
/*
    json2.js
    2014-02-04

    Public Domain.

    NO WARRANTY EXPRESSED OR IMPLIED. USE AT YOUR OWN RISK.

    See http://www.JSON.org/js.html


    This code should be minified before deployment.
    See http://javascript.crockford.com/jsmin.html

    USE YOUR OWN COPY. IT IS EXTREMELY UNWISE TO LOAD CODE FROM SERVERS YOU DO
    NOT CONTROL.


    This file creates a global JSON object containing two methods: stringify
    and parse.

        JSON.stringify(value, replacer, space)
            value       any JavaScript value, usually an object or array.

            replacer    an optional parameter that determines how object
                        values are stringified for objects. It can be a
                        function or an array of strings.

            space       an optional parameter that specifies the indentation
                        of nested structures. If it is omitted, the text will
                        be packed without extra whitespace. If it is a number,
                        it will specify the number of spaces to indent at each
                        level. If it is a string (such as '\t' or '&nbsp;'),
                        it contains the characters used to indent at each level.

            This method produces a JSON text from a JavaScript value.

            When an object value is found, if the object contains a toJSON
            method, its toJSON method will be called and the result will be
            stringified. A toJSON method does not serialize: it returns the
            value represented by the name/value pair that should be serialized,
            or undefined if nothing should be serialized. The toJSON method
            will be passed the key associated with the value, and this will be
            bound to the value

            For example, this would serialize Dates as ISO strings.

                Date.prototype.toJSON = function (key) {
                    function f(n) {
                        // Format integers to have at least two digits.
                        return n < 10 ? '0' + n : n;
                    }

                    return this.getUTCFullYear()   + '-' +
                         f(this.getUTCMonth() + 1) + '-' +
                         f(this.getUTCDate())      + 'T' +
                         f(this.getUTCHours())     + ':' +
                         f(this.getUTCMinutes())   + ':' +
                         f(this.getUTCSeconds())   + 'Z';
                };

            You can provide an optional replacer method. It will be passed the
            key and value of each member, with this bound to the containing
            object. The value that is returned from your method will be
            serialized. If your method returns undefined, then the member will
            be excluded from the serialization.

            If the replacer parameter is an array of strings, then it will be
            used to select the members to be serialized. It filters the results
            such that only members with keys listed in the replacer array are
            stringified.

            Values that do not have JSON representations, such as undefined or
            functions, will not be serialized. Such values in objects will be
            dropped; in arrays they will be replaced with null. You can use
            a replacer function to replace those with JSON values.
            JSON.stringify(undefined) returns undefined.

            The optional space parameter produces a stringification of the
            value that is filled with line breaks and indentation to make it
            easier to read.

            If the space parameter is a non-empty string, then that string will
            be used for indentation. If the space parameter is a number, then
            the indentation will be that many spaces.

            Example:

            text = JSON.stringify(['e', {pluribus: 'unum'}]);
            // text is '["e",{"pluribus":"unum"}]'


            text = JSON.stringify(['e', {pluribus: 'unum'}], null, '\t');
            // text is '[\n\t"e",\n\t{\n\t\t"pluribus": "unum"\n\t}\n]'

            text = JSON.stringify([new Date()], function (key, value) {
                return this[key] instanceof Date ?
                    'Date(' + this[key] + ')' : value;
            });
            // text is '["Date(---current time---)"]'


        JSON.parse(text, reviver)
            This method parses a JSON text to produce an object or array.
            It can throw a SyntaxError exception.

            The optional reviver parameter is a function that can filter and
            transform the results. It receives each of the keys and values,
            and its return value is used instead of the original value.
            If it returns what it received, then the structure is not modified.
            If it returns undefined then the member is deleted.

            Example:

            // Parse the text. Values that look like ISO date strings will
            // be converted to Date objects.

            myData = JSON.parse(text, function (key, value) {
                var a;
                if (typeof value === 'string') {
                    a =
/^(\d{4})-(\d{2})-(\d{2})T(\d{2}):(\d{2}):(\d{2}(?:\.\d*)?)Z$/.exec(value);
                    if (a) {
                        return new Date(Date.UTC(+a[1], +a[2] - 1, +a[3], +a[4],
                            +a[5], +a[6]));
                    }
                }
                return value;
            });

            myData = JSON.parse('["Date(09/09/2001)"]', function (key, value) {
                var d;
                if (typeof value === 'string' &&
                        value.slice(0, 5) === 'Date(' &&
                        value.slice(-1) === ')') {
                    d = new Date(value.slice(5, -1));
                    if (d) {
                        return d;
                    }
                }
                return value;
            });


    This is a reference implementation. You are free to copy, modify, or
    redistribute.
*/

/*jslint evil: true, regexp: true */

/*members "", "\b", "\t", "\n", "\f", "\r", "\"", JSON, "\\", apply,
    call, charCodeAt, getUTCDate, getUTCFullYear, getUTCHours,
    getUTCMinutes, getUTCMonth, getUTCSeconds, hasOwnProperty, join,
    lastIndex, length, parse, prototype, push, replace, slice, stringify,
    test, toJSON, toString, valueOf
*/


// Create a JSON object only if one does not already exist. We create the
// methods in a closure to avoid creating global variables.

if (typeof JSON !== 'object') {
    JSON = {};
}

(function () {
    'use strict';

    function f(n) {
        // Format integers to have at least two digits.
        return n < 10 ? '0' + n : n;
    }

    if (typeof Date.prototype.toJSON !== 'function') {

        Date.prototype.toJSON = function () {

            return isFinite(this.valueOf())
                ? this.getUTCFullYear()     + '-' +
                    f(this.getUTCMonth() + 1) + '-' +
                    f(this.getUTCDate())      + 'T' +
                    f(this.getUTCHours())     + ':' +
                    f(this.getUTCMinutes())   + ':' +
                    f(this.getUTCSeconds())   + 'Z'
                : null;
        };

        String.prototype.toJSON      =
            Number.prototype.toJSON  =
            Boolean.prototype.toJSON = function () {
                return this.valueOf();
            };
    }

    var cx,
        escapable,
        gap,
        indent,
        meta,
        rep;


    function quote(string) {

// If the string contains no control characters, no quote characters, and no
// backslash characters, then we can safely slap some quotes around it.
// Otherwise we must also replace the offending characters with safe escape
// sequences.

        escapable.lastIndex = 0;
        return escapable.test(string) ? '"' + string.replace(escapable, function (a) {
            var c = meta[a];
            return typeof c === 'string'
                ? c
                : '\\u' + ('0000' + a.charCodeAt(0).toString(16)).slice(-4);
        }) + '"' : '"' + string + '"';
    }


    function str(key, holder) {

// Produce a string from holder[key].

        var i,          // The loop counter.
            k,          // The member key.
            v,          // The member value.
            length,
            mind = gap,
            partial,
            value = holder[key];

// If the value has a toJSON method, call it to obtain a replacement value.

        if (value && typeof value === 'object' &&
                typeof value.toJSON === 'function') {
            value = value.toJSON(key);
        }

// If we were called with a replacer function, then call the replacer to
// obtain a replacement value.

        if (typeof rep === 'function') {
            value = rep.call(holder, key, value);
        }

// What happens next depends on the value's type.

        switch (typeof value) {
        case 'string':
            return quote(value);

        case 'number':

// JSON numbers must be finite. Encode non-finite numbers as null.

            return isFinite(value) ? String(value) : 'null';

        case 'boolean':
        case 'null':

// If the value is a boolean or null, convert it to a string. Note:
// typeof null does not produce 'null'. The case is included here in
// the remote chance that this gets fixed someday.

            return String(value);

// If the type is 'object', we might be dealing with an object or an array or
// null.

        case 'object':

// Due to a specification blunder in ECMAScript, typeof null is 'object',
// so watch out for that case.

            if (!value) {
                return 'null';
            }

// Make an array to hold the partial results of stringifying this object value.

            gap += indent;
            partial = [];

// Is the value an array?

            if (Object.prototype.toString.apply(value) === '[object Array]') {

// The value is an array. Stringify every element. Use null as a placeholder
// for non-JSON values.

                length = value.length;
                for (i = 0; i < length; i += 1) {
                    partial[i] = str(i, value) || 'null';
                }

// Join all of the elements together, separated with commas, and wrap them in
// brackets.

                v = partial.length === 0
                    ? '[]'
                    : gap
                    ? '[\n' + gap + partial.join(',\n' + gap) + '\n' + mind + ']'
                    : '[' + partial.join(',') + ']';
                gap = mind;
                return v;
            }

// If the replacer is an array, use it to select the members to be stringified.

            if (rep && typeof rep === 'object') {
                length = rep.length;
                for (i = 0; i < length; i += 1) {
                    if (typeof rep[i] === 'string') {
                        k = rep[i];
                        v = str(k, value);
                        if (v) {
                            partial.push(quote(k) + (gap ? ': ' : ':') + v);
                        }
                    }
                }
            } else {

// Otherwise, iterate through all of the keys in the object.

                for (k in value) {
                    if (Object.prototype.hasOwnProperty.call(value, k)) {
                        v = str(k, value);
                        if (v) {
                            partial.push(quote(k) + (gap ? ': ' : ':') + v);
                        }
                    }
                }
            }

// Join all of the member texts together, separated with commas,
// and wrap them in braces.

            v = partial.length === 0
                ? '{}'
                : gap
                ? '{\n' + gap + partial.join(',\n' + gap) + '\n' + mind + '}'
                : '{' + partial.join(',') + '}';
            gap = mind;
            return v;
        }
    }

// If the JSON object does not yet have a stringify method, give it one.

    if (typeof JSON.stringify !== 'function') {
        escapable = /[\\\"\x00-\x1f\x7f-\x9f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g;
        meta = {    // table of character substitutions
            '\b': '\\b',
            '\t': '\\t',
            '\n': '\\n',
            '\f': '\\f',
            '\r': '\\r',
            '"' : '\\"',
            '\\': '\\\\'
        };
        JSON.stringify = function (value, replacer, space) {

// The stringify method takes a value and an optional replacer, and an optional
// space parameter, and returns a JSON text. The replacer can be a function
// that can replace values, or an array of strings that will select the keys.
// A default replacer method can be provided. Use of the space parameter can
// produce text that is more easily readable.

            var i;
            gap = '';
            indent = '';

// If the space parameter is a number, make an indent string containing that
// many spaces.

            if (typeof space === 'number') {
                for (i = 0; i < space; i += 1) {
                    indent += ' ';
                }

// If the space parameter is a string, it will be used as the indent string.

            } else if (typeof space === 'string') {
                indent = space;
            }

// If there is a replacer, it must be a function or an array.
// Otherwise, throw an error.

            rep = replacer;
            if (replacer && typeof replacer !== 'function' &&
                    (typeof replacer !== 'object' ||
                    typeof replacer.length !== 'number')) {
                throw new Error('JSON.stringify');
            }

// Make a fake root object containing our value under the key of ''.
// Return the result of stringifying the value.

            return str('', {'': value});
        };
    }


// If the JSON object does not yet have a parse method, give it one.

    if (typeof JSON.parse !== 'function') {
        cx = /[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g;
        JSON.parse = function (text, reviver) {

// The parse method takes a text and an optional reviver function, and returns
// a JavaScript value if the text is a valid JSON text.

            var j;

            function walk(holder, key) {

// The walk method is used to recursively walk the resulting structure so
// that modifications can be made.

                var k, v, value = holder[key];
                if (value && typeof value === 'object') {
                    for (k in value) {
                        if (Object.prototype.hasOwnProperty.call(value, k)) {
                            v = walk(value, k);
                            if (v !== undefined) {
                                value[k] = v;
                            } else {
                                delete value[k];
                            }
                        }
                    }
                }
                return reviver.call(holder, key, value);
            }


// Parsing happens in four stages. In the first stage, we replace certain
// Unicode characters with escape sequences. JavaScript handles many characters
// incorrectly, either silently deleting them, or treating them as line endings.

            text = String(text);
            cx.lastIndex = 0;
            if (cx.test(text)) {
                text = text.replace(cx, function (a) {
                    return '\\u' +
                        ('0000' + a.charCodeAt(0).toString(16)).slice(-4);
                });
            }

// In the second stage, we run the text against regular expressions that look
// for non-JSON patterns. We are especially concerned with '()' and 'new'
// because they can cause invocation, and '=' because it can cause mutation.
// But just to be safe, we want to reject all unexpected forms.

// We split the second stage into 4 regexp operations in order to work around
// crippling inefficiencies in IE's and Safari's regexp engines. First we
// replace the JSON backslash pairs with '@' (a non-JSON character). Second, we
// replace all simple value tokens with ']' characters. Third, we delete all
// open brackets that follow a colon or comma or that begin the text. Finally,
// we look to see that the remaining characters are only whitespace or ']' or
// ',' or ':' or '{' or '}'. If that is so, then the text is safe for eval.

            if (/^[\],:{}\s]*$/
                    .test(text.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g, '@')
                        .replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']')
                        .replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) {

// In the third stage we use the eval function to compile the text into a
// JavaScript structure. The '{' operator is subject to a syntactic ambiguity
// in JavaScript: it can begin a block or an object literal. We wrap the text
// in parens to eliminate the ambiguity.

                j = eval('(' + text + ')');

// In the optional fourth stage, we recursively walk the new structure, passing
// each name/value pair to a reviver function for possible transformation.

                return typeof reviver === 'function'
                    ? walk({'': j}, '')
                    : j;
            }

// If the text is not JSON parseable, then a SyntaxError is thrown.

            throw new SyntaxError('JSON.parse');
        };
    }
}());