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
});
