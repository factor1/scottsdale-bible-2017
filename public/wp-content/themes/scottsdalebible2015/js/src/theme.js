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

        /* Data Toggles */
        $("[data-toggle]").click(function(e) {
           e.preventDefault();
           $($(this).data("toggle")).toggle();
        });

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
                }
            });
        }

        /* Image Center Blocks */
        var centerImageBlocks = function() {
            $(".image-block-center > img").each(function() {
                $(this).css("margin-left",($(this).outerWidth()/-2)+"px");
            });
        }
        centerImageBlocks();
        $(window).resize(centerImageBlocks);

        /* Search Form */
        $("header form").submit(function(e) {
            e.preventDefault();
            search$ = $(this).find("input[name='search']");
            if(search$.length&&search$.val()) {
                location.href = $(this).data("action")+"/?s="+search$.val();
            }
        });

        /* Mobile Menu Toggles */
        /*
        $(window).resize(function() {
            $("header > section nav").add($("header > section .columns")).attr("style","");
        });
        */
        $("header > section > .row > .columns:first-child > a").click(function(e) {
            $(this).parent().nextAll(".columns").slideToggle();
        });
        $("header > section > .row > .columns + .columns > a").click(function(e) {
            var n$ = $(this).next("nav");
            if(n$.length<1||$(window).width()>640) { return true; }
            e.preventDefault();
            n$.slideToggle();
        });

        /* Social Icons - ShareThis Triggers */
        $("a[data-trigger-click]").click(function(e) {
            e.preventDefault();
            $("footer span."+$(this).data("trigger-click")+" > span").click();
        });

    });
})(jQuery);