<div id="content">
	<div class="container">

		<div class="row">
			<div class="col-xl-12">
				<h2 class="section_title">About Us</h2>
			</div>
			<div class="col-sm-12 col-md-6">
				<h3>Home to New York’s largest shared open database</h3>
				<p>NYC Open Data Week is a collaboration between NYC Open Data, BetaNYC, BureauBlank and the dynamic NYC civic tech community. We’re kicking off the week on International Open Data Day with School of Data (March 4th) and wrapping up with an Open Data for All Workshop at the NYC Parks Hamilton Fish Computer Resource Center (March 11th). Peruse the descriptions of these events and many others below and sign up!</p>
			</div>
			<div class="col-sm-12 col-md-6">
				<?= wp_oembed_get( 'https://www.youtube.com/watch?v=pXU_GY7hjPc', array('width'=>800) ); ?>
			</div>
		</div>

		<div class="row">
			<div class="col-xl-12">
				<h2 class="section_title">Calendar of Events</h2>
			</div>
			<div class="col-xl-12">
				<?=moda_events_calendar();?>
			</div>
		</div>


		<div class="row">
			<div class="container blue-bg">
				<div class="col-xl-12">
					<h2 class="section_title">Partners</h2>
				</div>
				<div class="col-xl-12">
					<?=moda_display_partners();?>
				</div>
			</div>
		</div>




		</div>
	</div>
</div>