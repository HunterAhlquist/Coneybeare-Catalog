/*
  This is the script file for the index.html page
  Authors: Hunter Ahlquist, Cesar Escalona, Aubrey Davies, Zahrah Alsamach
  File: visuals.js
  Date: 1/22/2021
*/

// add padding top to show content behind navbar
$('body').css('padding-top', $('.navbar').outerHeight() + 'px')

// detect scroll top or down
if ($('.smart-scroll').length > 0) { // check if element exists
    var last_scroll_top = 0;
    $(window).on('scroll', function() {
        scroll_top = $(this).scrollTop();
        if(scroll_top > last_scroll_top && last_scroll_top >= 0 && scroll_top > 0) {
            $('.smart-scroll').removeClass('scrolled-up').addClass('scrolled-down');
        }
        else {
            $('.smart-scroll').removeClass('scrolled-down').addClass('scrolled-up');
        }
        last_scroll_top = scroll_top;
    });
}