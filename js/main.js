"use strict";

$(document).ready(function(){

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
	
	document.getElementById("defaultOpen").click();
  
});

function change(evt, tab) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tab).style.display = "block";
    evt.currentTarget.className += " active";
}



