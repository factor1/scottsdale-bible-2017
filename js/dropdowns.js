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

	// Flip Function
	$('#card1,#card2,#card3,#card4,#card5,#card6').flip();

	// Dive Deeper Menu
	$('.menu-icon').click(function(){
		$('.menu').slideToggle('slow');
		$('.bars').toggleClass('hide');
		$('.times').toggleClass('hide');
		console.log("success!");
	});

	// Mobile Menu Toggles
	$(".main-header").click(function(e) {
			$(this).nextAll(".columns").slideToggle();
			console.log("Success!!!");
	});
	$("header > section > .row > .columns + .columns > a").click(function(e) {
			var n$ = $(this).next("nav");
			if(n$.length<1||$(window).width()>1025) { return true; }
			e.preventDefault();
			n$.slideToggle();
			console.log("Success!");
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
					},
					change: function(li$) {
						 li$.find('img').each(function() {
								 $(this).css("margin-left",($(this).outerWidth()/-2)+"px");
						 });
					}
			});
	}

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
