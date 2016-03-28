/*!
 * Script for initializing globally-used functions and libs.
 *
 * @since 1.0.0
 */
/* global jQuery */
(function($) {

  // After arrow color functionality, see .after-arrow in style.css

  $('.after-arrow').each(function(){
    var backgroundColor = $(this).css('backgroundColor');
    $(this).css('borderColor',backgroundColor);
  });

})(jQuery);

