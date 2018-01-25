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



  // SMOOTH SCROLL ERRRRVRYWHERE!!
  jQuery(function() {
    jQuery('article a[href*="#"]:not([href="#"])').click(function() {
      if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
        var target = jQuery(this.hash);
        target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          jQuery('html,body').animate({
            scrollTop: target.offset().top - 100
          }, 1000);
          return false;
        }
      }
    });
  });

  
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






(function( $ ){


/* FitText.js 1.2 */
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




// Show mutliple Carousel items at once
// https://www.codeply.com/go/s3I9ivCBYH
$('.carousel-showmany').on('slide.bs.carousel', function (e) {

    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 3;
    var totalItems = $('.carousel-item').length;
    
    if (idx >= totalItems-(itemsPerSlide-1)) {
        var it = itemsPerSlide - (totalItems - idx);
        for (var i=0; i<it; i++) {
            // append slides to end
            if (e.direction==="left") {
                $('.carousel-item').eq(i).appendTo('.carousel-inner');
            }
            else {
                $('.carousel-item').eq(0).appendTo('.carousel-inner');
            }
        }
    }
});


})( jQuery );







///////////////////////////////////////
//// CALENDAR JS                   ////
jQuery(document).ready(function(){ ////
///////////////////////////////////////

// Push Cards for Planner View (push overlapping event cards)
  function pushcards() {
    jQuery('#moda_calendar .event').each(function() {
      jQuery(this).attr('data-push',0);
      // Declare current event 
      var event = jQuery(this);
        // get thisevent coordinates
        var eventpos = jQuery(event).offset();
          var eventwidth = jQuery(event).width();
          var eventheight = jQuery(event).height();
          eventleft = eventpos.left;
            eventright = eventleft + eventwidth;
          eventtop = eventpos.top;
            eventbottom = eventtop + eventheight;
      // Declare previous timerow events
      var above = jQuery(this).parents('.timerow').prevAll().find('.event:visible');
      // if there are events above
      if(above.length > 0) {
        // foreach above, check for overlap with current .event
        above.each(function() {
          // get thisabove coordinates
          var abovepos = jQuery(this).offset();
            var abovewidth = jQuery(this).width();
            var aboveheight = jQuery(this).height();
            aboveleft = abovepos.left;
              aboveright = aboveleft + abovewidth;
            abovetop = abovepos.top;
              abovebottom = abovetop + aboveheight;
          // check for overlap between this above and this current
          var overlap = !(eventright < aboveleft ||  eventleft > aboveright || eventbottom < abovetop || eventtop > abovebottom);
          // while there is overlap, add to the push-count and try again
          while(overlap){
            var push = parseInt(jQuery(event).attr('data-push'),10) + 1;
            jQuery(event).attr('data-push',push);
            // new get thisevent coordinates
            var eventpos = jQuery(event).offset();
              var eventwidth = jQuery(event).width();
              var eventheight = jQuery(event).height();
              eventleft = eventpos.left;
                eventright = eventleft + eventwidth;
              eventtop = eventpos.top;
                eventbottom = eventtop + eventheight;
            overlap = !(eventright < aboveleft ||  eventleft > aboveright || eventbottom < abovetop || eventtop > abovebottom);
          } // end overlap check
        }); // end foreach above
      } // end if there are above
    }); // end foreach event

    // foreach row, scan for has event with data-push, and apply an attribute to that day 
      // if has [data-push="6"], [data-wide="6"]
      // else if has [data-push="6"], [data-wide="6"]


      jQuery('#moda_calendar .events .timerow').each(function() {
        jQuery(this).attr('data-count',jQuery(this).find('.event:visible').length);
      });
    
      jQuery('#moda_calendar .day').each(function(){

              if(jQuery(this).find('[data-push="5"]').length > 0) { jQuery(this).attr('data-width','6'); }
        else  if(jQuery(this).find('[data-count="6"]').length > 0) { jQuery(this).attr('data-width','6'); }
        else  if(jQuery(this).find('[data-push="4"]').length > 0) { jQuery(this).attr('data-width','5'); }
        else  if(jQuery(this).find('[data-count="5"]').length > 0) { jQuery(this).attr('data-width','5'); }
        else  if(jQuery(this).find('[data-push="3"]').length > 0) { jQuery(this).attr('data-width','4'); }
        else  if(jQuery(this).find('[data-count="4"]').length > 0) { jQuery(this).attr('data-width','5'); }
        else  if(jQuery(this).find('[data-push="2"]').length > 0) { jQuery(this).attr('data-width','3'); }
        else  if(jQuery(this).find('[data-count="3"]').length > 0) { jQuery(this).attr('data-width','3'); }
        else  if(jQuery(this).find('[data-push="1"]').length > 0) { jQuery(this).attr('data-width','2'); }
        else  if(jQuery(this).find('[data-count="2"]').length > 0) { jQuery(this).attr('data-width','2'); }

      });


  } // end function
  jQuery('#moda_calendar').ready(pushcards());


// Calendar Views Toggle (ie:planner,list,grid)
  jQuery('#moda_calendar .view_toggle a').on('click', function(e) {
    var newview = jQuery(this).attr('data-view');
    jQuery('#moda_calendar > .row').attr('data-view',newview);
    pushcards();
    e.preventDefault();
    return false; 
  });

// Filter List Toggle (show/hide dropdown)
  jQuery('#moda_calendar .filter .dropdown').on('click', function(e) {
    jQuery(this).next('ul').slideToggle();
    e.preventDefault();
    return false; 
  });



// Filter Function
    jQuery('#moda_calendar .filter.list li').on('click', function(e) {

      // Get Filter Info
      var filter_id = jQuery(this).attr('data-filter');
      var option_id = jQuery(this).attr('data-option');

      // Unfilter Events if Deselecting
      if(jQuery(this).hasClass('active')) {
        jQuery(this).removeClass('active').addClass('inactive');
        jQuery('#moda_calendar .events').find('.event.'+filter_id+'-hidden').removeClass(filter_id+'-hidden');
      }
      // Filter Events if Selecting
      else if(jQuery(this).hasClass('inactive')) {
        jQuery(this).removeClass('inactive').addClass('active').siblings().removeClass('active').addClass('inactive');
        jQuery('#moda_calendar .events').find('.event[data-'+filter_id+'="'+option_id+'"]').removeClass(filter_id+'-hidden');
        jQuery('#moda_calendar .events').find('.event:not([data-'+filter_id+'="'+option_id+'"])').addClass(filter_id+'-hidden');
      }

      // Count visible .event and assign class to .day to hide as needed
      jQuery('#moda_calendar .events .day').each(function() {
        jQuery(this).attr('data-count',jQuery(this).find('.event:visible').length);
      });

      pushcards();
      e.preventDefault();
      return false; 
    });








////////////////////////////////
}); //// end CALENDAR JS ///////
////////////////////////////////
