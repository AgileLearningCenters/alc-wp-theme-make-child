/*!
 * Script for initializing globally-used functions and libs.
 *
 * @since 1.0.0
 */
/* global jQuery, ttfmakeFitVids */
(function($) {

	var headerHeight = parseInt($('#site-header').outerHeight());
	var headerMargin = parseInt($('#site-header').css('marginBottom'));
	if ($(window).width() > 800){
		$('#site-content').css('paddingTop',headerHeight + headerMargin);
	}

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

  // After arrow color functionality, see .after-arrow in style.css

  $('.after-arrow').each(function(){
    var backgroundColor = $(this).css('backgroundColor');
    $(this).css('borderColor',backgroundColor);
  });

})(jQuery);

