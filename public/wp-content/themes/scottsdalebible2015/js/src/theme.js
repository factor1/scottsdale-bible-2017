;

(function($){
    $(document).ready(function() {

        $(document).foundation();

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

    });
})(jQuery);