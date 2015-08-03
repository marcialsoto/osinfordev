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
        $('#slider__footer').owlCarousel({
          items: 5,
          dots: false,
          margin: 55,
          loop: true,
          center: true,
          autoWidth: true,
          lazyLoad: true,
          responsive:{
              0:{
                  items:1
              },
              600:{
                  items:5
              },
              1000:{
                  items:5
              }
          }
        });

        $( 'ul.menu>li.menu-item-has-children>a' ).click(function() {
          event.preventDefault();
          $(this).parent().toggleClass('open');
        });

        $( "ul.dropdown-menu>li.menu-item-has-children>a" ).append( "<span class='caret'></span>" );
        $( "ul.menu>li.menu-item-has-children>a" ).append( "<span class='caret'></span>" );

        $( '.gallery>dl>dt>a' ).attr('data-lightbox', 'gallery');

        $('[data-toggle="tooltip"]').tooltip();

        $('ul.page-numbers').addClass('pagination');

      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
        $('#slider__main').owlCarousel({
          items:3,
          nav: true,
          navText: ["<span class='glyphicon glyphicon-menu-left' aria-hidden='true'></span>", "<span class='glyphicon glyphicon-menu-right' aria-hidden='true'></span>"],
          merge: true,
          center: true,
          autoplay: true,
          autoplayTimeout: 7000,
          autoplayHoverPause: true,
          lazyLoad:true,
          loop:true,
              responsive:{
                0:{
                  items:1,
                  dots: false,
                },
                678:{
                    mergeFit:true
                },
                1000:{
                    mergeFit:false
                }
          }
        });

        $('.slider__publicaciones').owlCarousel({
          items: 3,
          loop: false,
          margin: 30, 
          responsive : {
            // breakpoint from 0 up
            0 : {
                items: 1
            },
            // breakpoint from 480 up
            480 : {
                items: 2
            },
            // breakpoint from 768 up
            768 : {
                items: 2
            },
            1000 : {
              items: 3
            }
        }
      });
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