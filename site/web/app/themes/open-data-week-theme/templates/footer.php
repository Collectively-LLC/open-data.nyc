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