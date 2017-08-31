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
});
});