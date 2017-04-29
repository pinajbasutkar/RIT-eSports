"use strict";



$(document).ready(function(){
    
    // Back to top button
    
        var offset = 250;

        var duration = 300;

        jQuery(window).scroll(function() {

        if (jQuery(this).scrollTop() > offset) {

        jQuery('.back-to-top').fadeIn(duration);

        } else {

        jQuery('.back-to-top').fadeOut(duration);

        }

        });



        jQuery('.back-to-top').click(function(event) {

        event.preventDefault();

        jQuery('html, body').animate({scrollTop: 0}, duration);

        return false;

        })
        
        
        
        // from other pages, navigate first to top of page, then smooth scroll to anchor
	// (http://stackoverflow.com/questions/30293784/smooth-scroll-to-anchor-after-loading-new-page)
	if ( window.location.hash ) scroll(0,0);
	setTimeout( function() { scroll(0,0); }, 1);

	$(function() {

		$('.scroll').on('click', function(e) {
			e.preventDefault();
			$('html, body').animate({
				scrollTop: $($(this).attr('href')).offset().top + 'px'
			}, 1000, 'swing');
		});

		if(window.location.hash) {
			// smooth scroll to the anchor id
			$('html, body').animate({
				scrollTop: $(window.location.hash).offset().top + 'px'
			}, 1000, 'swing');
		}

	});
	
    // for current page, just call smoothScroll method on links
    $('a').smoothScroll();
    
        
        
        

 });

   
	
    
  

