/*!
 * Script for initializing sticky-nav.
 *
 * @since 1.0.0
 */
/* global jQuery */
(function($) {

  $('#site-header').ready(function() {
    
    var headerHeight = parseInt($('#site-header').outerHeight());
    var headerMargin = parseInt($('#site-header').css('marginBottom'));
    var contentPaddingTop = parseInt($('#site-content').css('paddingTop'));

    if ($(window).width() > 800){
      $('#site-content').css('paddingTop',headerHeight + headerMargin + contentPaddingTop);
    }
  });

  var shrinkHeader = 60;
  $(window).scroll(function() {
    var scroll = getCurrentScroll();
      if ( scroll >= shrinkHeader ) {
           $('.site-header').addClass('shrink');
           console.log('shrink');
        }
        else {
            $('.site-header').removeClass('shrink');
            console.log('unshrink');
        }
  });
  function getCurrentScroll() {
    return window.pageYOffset || document.documentElement.scrollTop;
  }

})(jQuery);