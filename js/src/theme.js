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
