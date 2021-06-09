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
		$('.menu').slideToggle('slow');
		$('.bars').toggleClass('hide');
		$('.times').toggleClass('hide');
	});

	// Mobile Menu Toggles
	$(".main-header").click(function(e) {
			$(this).nextAll(".columns").slideToggle();
	});
	$("header > section > .row > .columns + .columns > a").click(function(e) {
			var n$ = $(this).next("nav");
			if(n$.length<1||$(window).width()>1025) { return true; }
			e.preventDefault();
			n$.slideToggle();
	});

	// MegaMenu Images
	$('#visit').hover(function(){
		$('.visit-image').toggle();
	});
	$('#connect').hover(function(){
		$('.connect-image').toggle();
	});
	$('#serve').hover(function(){
		$('.serve-image').toggle();
	});
	$('#watch').hover(function(){
		$('.watch-image').toggle();
	});
	$('#care').hover(function(){
		$('.care-image').toggle();
	});
	$('#give').hover(function(){
		$('.give-image').toggle();
	});


});
});



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
;

/**
*   Image Preloader
*   Author: James R.Latham, Factor 1 Studios
*
**/
var preloadImages = function() {
    if(document.images) {
        var image_list = new Array();
        var args = arguments || this.arguments;
        for(var i=0;i<args.length;i++) {
            img = image_list[image_list.length] = new Image();
            img.src = (args[i].substr(0,1)=="/") ?
            location.protocol+"//"+document.domain+args[i] : args[i];
        }
    }
};

(function($){

    $(document).ready(function() {

        $(document).foundation();

        // Touch Device Detection
      	var isTouchDevice = 'ontouchstart' in document.documentElement;
      	if( isTouchDevice ) {
      		$('body').addClass('touch');
      	}

        /* Open New Window/Tab in place of deprecated target="_blank" */
        $("a[href][data-target='new-window']:not(.groups-list__item)").click(function(e) {
            e.preventDefault();
            window.open($(this).attr("href"));
        });

        /* Data Toggles */
        $("[data-toggle]").click(function(e) {
           e.preventDefault();
           $($(this).data("toggle")).toggle();
        });

        /* Image Center Blocks */
        var centerImageBlocks = function() {
            $(".image-block-center > img").each(function() {
                $(this).css("margin-left",($(this).outerWidth()/-2)+"px");
            });
        }
        centerImageBlocks();
        $(window).resize(centerImageBlocks);

        /* Image Sliders */
        sliders$ = $("section.image-slider");
        if(sliders$.length) {
            sliders$.UpDownSlider({
                direction: 'down',
                speed: 1000,
                interval: 6000,
                mousePause: false,
                controls: {
                    circles: sliders$.find(".controls-move .fa")
                },
                change: function(li$) {
                   li$.find('img').each(function() {
                       $(this).css("margin-left",($(this).outerWidth()/-2)+"px");
                   });
                }
            });
        }

        /* Search Form */
        $("header form").submit(function(e) {
            e.preventDefault();
            search$ = $(this).find("input[name='search']");
            if(search$.length&&search$.val()) {
                location.href = $(this).data("action")+"/?s="+search$.val();
            }
        });

        // Flip Function
        $('#card1,#card2,#card3,#card4,#card5,#card6').flip();


        /* Social Icons - ShareThis Triggers */
        $("a[data-trigger-click]").click(function(e) {
            e.preventDefault();
            $("footer span."+$(this).data("trigger-click")+" > span").click();
        });

        /* Location Maps */
        var map$ = $("div.map-container[data-key]");
        if(map$.length) {
            map$.mapLoader({
                height: ((h=map$.data("height"))?h:$(window).height()+"px"),
                iconWidth: 40,
                iconHeight: 40
            });
        }

        // Add expand open to 3rd tier sidebar menu items when on page
        $('div.sidebar >ul a[href]').each(function() {
            var href = $(this).attr('href');

            if(href !== window.location.href) {
                return;
            }

            $(this).next('ul').toggle(true);
        });

    });

    // Event filtering dropdown
    function closeDropdown() {
  		$(document).on('click', function(event) {
  			if(!$(event.target).closest('.dropdown').length) {
  				if($('.dropdown__menu').css('display') === 'block') {
  					$('.dropdown__menu').slideUp();
  				}
  			}
  		});
  	}

    $('.dropdown__parent').on('click', function() {
      $(this).siblings('.dropdown__menu').slideToggle();

  		// Close dropdown on selection
  		$('.dropdown__menu p').on('click', function() {
  			$(this).parents('.dropdown__menu').slideUp();
  		});

      // Close dropdown if outside click
  		closeDropdown();
    });

    // Banner close
    $('.banner-section button').on('click', function() {
      $(this).parents('.banner-section').addClass('hidden');
    });

    // Support groups modals 
    $('.groups-list__item').on('click', function(e) {
      e.preventDefault();
    });

})(jQuery);
