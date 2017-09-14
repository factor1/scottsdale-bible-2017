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

});
});
