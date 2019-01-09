/*
 * Name: Map Loader jQuery Plugin v1.0
 * Author: Factor1, James R. Latham
 * Website: http://www.factor1studios.com/
 * Description:
 *
 * (c) 2014 Factor1 MIT License.
 */

;

window.f1 = window.f1 || {};
f1.MapLoader = f1.MapLoader || {};

(function($,window,document,undefined) {

    var name = "mapLoader";

    var defaults = {
        api_key: 'AIzaSyD3juZh1Id66Q5rRRy68LlwBkr_FyDcQMY',
        center: {lat: 38.28333333, lng: -77.48333333},
        zoomControl: true,
        zoom: 8,
        minZoom: null,
        maxZoom: null,
        width: 'auto',
        height: 'auto',
        iconWidth: null,
        iconHeight: null,
        scrollwheel: false,
        markers: 'autoload',
        mapTypes: [],
        hideDefaultMapType: false
    };

    var endpoint = "//maps.googleapis.com/maps/api/js?key=AIzaSyD3juZh1Id66Q5rRRy68LlwBkr_FyDcQMY";

    var mapLoader = function(container,options) {

        var loader = this;

        loader.options = $.extend({},defaults,options);
        loader.container$ = $(container).uniqueId();
        loader.callback = "f1.MapLoader.init_"+loader.container$.attr("id").replace(/-/g,"_");
        loader.endpoint = endpoint+loader.options.api_key;
        loader.map = null;
        loader.markers = [];
        loader.mapTypes = [];

        loader.init = function() {

            if(api_key=loader.container$.data("key")) {
                loader.endpoint += api_key;
                loader.options.api_key = api_key;
            }

            if(!loader.options.api_key) {
                throw new loader.exception("No API key set.");
            }

            if(zoom=loader.container$.data("zoom")) {
                loader.options.zoom = zoom;
            }

            if(lat=loader.container$.data("lat")) {
                loader.options.center.lat = lat;
            }

            if(lng=loader.container$.data("lng")) {
                loader.options.center.lng = lng;
            }

            if(typeof google === "undefined"||typeof google.maps === "undefined") {

                eval(loader.callback+" = function() { loader.prepare(); };");

                script$ = $(document.createElement("script"));
                script$
                    .prop("type","text/javascript")
                    .prop("src",loader.endpoint+"&sensor=false&callback="+loader.callback)
                    .appendTo($("body"))
                    ;

                return;
            }

            loader.prepare();

        };

        loader.prepare = function() {

            loader.canvas$ = $(document.createElement("div"));

            loader.canvas$
                .css("width","100%")
                .css("min-width","50px")
                .css("height","100%")
                .css("min-height","50px")
                ;

            loader.container$
                .css("width",loader.options.width)
                .css("height",loader.options.height)
                .empty()
                .append(loader.canvas$)
                ;

            loader.generateMapTypes();

            loader.map = loader.generateMap();

            if(loader.options.markers==='autoload') {
                loader.autoloadMarkers();
            }

            for(n in loader.options.markers) {
                loader.addMarker(loader.options.markers[n]);
            }

        };

        loader.generateMapTypes = function() {
            if(loader.options.mapTypes) {
                for(n in loader.options.mapTypes) {

                    loader.mapTypes[loader.options.mapTypes[n].name] = new google.maps.StyledMapType(
                        loader.options.mapTypes[n].styles,
                        { name: loader.options.mapTypes[n].name }
                    );

                }
            }
        };

        loader.generateMap = function() {

            var mapTypes = (loader.options.hideDefaultMapType) ? [] : [google.maps.MapTypeId.ROADMAP];
            for(n in loader.mapTypes) {
                mapTypes.push(n);
            }

            var map = new google.maps.Map(loader.canvas$.get(0),{
                center: loader.options.center,
                zoomControl: loader.options.zoomControl,
                zoom: loader.options.zoom,
                minZoom: loader.options.minZoom,
                maxZoom: loader.options.maxZoom,
                scrollwheel: loader.options.scrollwheel,
                mapTypeControlOptions: {
                    mapTypeIds: mapTypes,
                }
            });

            for(n in loader.options.mapTypes) {
                map.mapTypes.set(loader.options.mapTypes[n].name,loader.mapTypes[loader.options.mapTypes[n].name]);
                if(loader.options.mapTypes[n].active) {
                    map.setMapTypeId(loader.options.mapTypes[n].name);
                }
            }

            return map;
        };

        loader.autoloadMarkers = function() {
            loader.options.markers = [];
            $(".map-location[data-lat][data-lng]").each(function() {

                var markerIcon = $(this).data("icon") || '';
                var markerWidth = $(this).data("icon-width") || loader.options.iconWidth || '';
                var markerHeight = $(this).data("icon-height") || loader.options.iconHeight || '';

                if(markerIcon && markerWidth && markerHeight) {
                    markerIcon = {
                        size: { width: markerWidth, height: markerHeight },
                        scaledSize: { width: markerWidth, height: markerHeight },
                        url: markerIcon
                    };
                }

                loader.options.markers.push({
                    position: {lat: $(this).data("lat"), lng: $(this).data("lng")},
                    title: $(this).data("title"),
                    info: {
                        content: this,
                        trigger: $(this).data("trigger")
                    },
                    icon: markerIcon
                });
            });
        };

        loader.addMarker = function(options) {

            options.position = options.position  || loader.options.center;
            options.title = options.title || '';
            options.icon = options.icon || '';

            var marker = new google.maps.Marker({
                map: loader.map,
                position: options.position,
                visible: true,
                title: options.title,
                icon: options.icon
            });

            if(marker && options.info) {
                loader.addInfoBox(marker,options.info);
            }

            loader.markers.push(marker);

        };

        loader.addInfoBox = function(marker,options) {

            options.content = options.content || '';
            options.trigger = options.trigger || 'click';

            var box = new google.maps.InfoWindow({
                content: options.content
            });

            google.maps.event.addListener(box,'domready',function() {

                loader.container$.find(".map-location").each(function() {
                    var c$ = $(this).parent().parent().toggleClass("map-location-container",true);
                });

            })

            if(options.trigger==='load') {
                box.open(loader.map,marker);
                options.trigger = 'click';
            }

            google.maps.event.addListener(marker,options.trigger,function() {
                box.open(loader.map,marker);
            });

        };

        loader.exception = function(msg) {
            this.message = "MapLoader: "+msg;
            this.name = "Exception";
        };

        try {
            loader.init();
        } catch(e) {
            console.log(e.message);
            return;
        }

        return {
            options: loader.options,
            markers: loader.markers
        };

    };

    $.fn[name] = function(options) {
        if(!this.length) {
            console.log('Map container not found');
            return;
        }
        return this.each(function() {
            if(!$.data(this,name)) {
                $.data(this,name,new mapLoader(this,options));
            }
        });
    };

})(jQuery,window,document);
