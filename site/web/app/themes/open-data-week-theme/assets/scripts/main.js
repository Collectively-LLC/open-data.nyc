/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.




////
//// CUSTOM JS
////
jQuery(document).ready(function(){

  
  // Header animation
  jQuery('.custom-logo').hover(
      function() { jQuery('header.banner').addClass('active'); 
        }, function() { jQuery('header.banner').removeClass('active'); }
  );


  // Equate Carousel Heights
  function carouselNormalization() {
    
    jQuery('.carousel').each(function() { 
    var items = jQuery(this).find('.carousel-item'), //grab all slides
        heights = [], //create empty array to store height values
        tallest; //create variable to make note of the tallest slide
        function normalizeHeights() {
            items.each(function() { //add heights to array
                heights.push(jQuery(this).height()); 
            });
            tallest = Math.max.apply(null, heights); //cache largest value
            items.each(function() {
                jQuery(this).css('min-height',tallest + 'px');
            });
        }
        if (items.length) { normalizeHeights(); }
        jQuery(window).on('resize orientationchange', function () {
            tallest = 0; heights = []; //reset vars
            items.each(function() {
                jQuery(this).css('min-height','0'); //reset min-height
            }); 
            if (items.length) { normalizeHeights(); } //run it again 
        });

    });
  }
  jQuery(document).ready(carouselNormalization());


  // Wrap WPCF7 Output in a Container 
  jQuery( document ).ajaxComplete(function() {
    jQuery(".wpcf7-response-output").wrapInner("<div></div>");
    });







}); // End CUSTOM



/* FitText.js 1.2 */
(function( $ ){
  $.fn.fitText = function( kompressor, options ) {
    // Setup options
    var compressor = kompressor || 1,
        settings = $.extend({
          'minFontSize' : Number.NEGATIVE_INFINITY,
          'maxFontSize' : Number.POSITIVE_INFINITY
        }, options);
    return this.each(function(){
      // Store the object
      var $this = $(this);
      // Resizer() resizes items based on the object width divided by the compressor * 10
      var resizer = function () {
        $this.css('font-size', Math.max(Math.min($this.width() / (compressor*10), parseFloat(settings.maxFontSize)), parseFloat(settings.minFontSize)));
      };
      // Call once to set.
      resizer();
      // Call on resize. Opera debounces their resize by default.
      $(window).on('resize.fittext orientationchange.fittext', resizer);
    });
  };
  $('.fittext').fitText();
})( jQuery );

