<? $footer = get_option('footer_details'); ?>

<footer class="grey">
<div class="container">
<div class="row align-items-center">


	<div class="shoutout col-lg-3 col-md-4 col-sm-12 black">	
		<?=wpautop( $footer[cmb_pre().'shoutout'] );?>
	</div>

	<div class="legal col-lg-9 col-md-8 col-sm-12">
		<?=wpautop( $footer[cmb_pre().'legal'] );?>
	</div>

</div>
</div>
</footer>


<script>
// BEGIN Custom Modal URL JS
// We need to figure out a proper place to put this
jQuery(document).ready(function(){
  // if there is a hash, it contains the string 'details', and there's actually a modal with that ID, show the modal
  if(window.location.hash.indexOf("details") >= 0 && jQuery(window.location.hash).length) {
    jQuery(window.location.hash).modal("show");
  }

  // copy modal URL when you click the button
  jQuery('.js-modal-link-btn').click(function(){
  	var linkID = jQuery(this).attr('data-event-id');
  	var linkElement = jQuery('#js-modal-link-' + linkID);
  	linkElement.select();
  	document.execCommand("copy");
  	var copy = jQuery(this).html('Copied!');
  	setTimeout(function() {jQuery(copy).html('Copy Event Link')}, 2000);
  });


});
// END Custom Modal URL JS
</script>

