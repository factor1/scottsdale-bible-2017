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
