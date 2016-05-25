// JavaScript Document
$(document).ready(function() {
		var stickyNavTop = $('.menu-bar').offset().top;
		var stickyNav = function(){
		var scrollTop = $(window).scrollTop();
      
		if (scrollTop > stickyNavTop) { 
			$('.menu-bar').addClass('sticky');
			$('body').css('padding-top', '66px')
		} else {
			$('.menu-bar').removeClass('sticky'); 
			$('body').css('padding-top', '0px')
			}
		};
 
	stickyNav();
 
	$(window).scroll(function() {
		stickyNav();
	});

	//MOBILE NAV
	$('.mobile-button').click(function(){
		$('.mobile-ul').removeClass('hide');
		$('.mobile-nav').animate({top:'0%'},350);
	});
        
	$('.close').click(function(){
		$('.mobile-nav').animate({top:'-140%'},350);
		$('.mobile-ul').addClass('hide');
	});
	
	
	//YELLOW BOX SIZE
	var YellowBoxHeight = $('.block.yellow-band').height()
	$('.yellowBlockImage').css('height', YellowBoxHeight);
	
	//GREY BOX SIZE
	var GreyBoxHeight = $('.block.grey-band').parent().height()
	$('.GreyBlockImage').css('height', GreyBoxHeight);
	  
    
});