(function($) {
  // Site title
  wp.customize('blogname', function(value) {
    value.bind(function(to) {
      $('.brand').text(to);
    });
  });
})(jQuery);

// BEGIN Custom Modal URL JS
// jQuery(document).ready(function(){
//   // if there is a hash, it contains the string 'details', and there's actually a modal with that ID, show the modal
//   if(window.location.hash.indexOf("details") >= 0 && jQuery(window.location.hash).length) {
//     jQuery(window.location.hash).modal("show");
//   }
// });
// END Custom Modal URL JS
