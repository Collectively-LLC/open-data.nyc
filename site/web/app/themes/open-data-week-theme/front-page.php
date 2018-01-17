<div id="content">
	<div class="container">

		<div class="row section-about">
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

		<div class="row section-calendar blue-border">
			<div class="col-xl-12">
				<h2 class="section_title">Calendar of Events</h2>
			</div>
			<div class="col-xl-12">
				<?=moda_events_calendar();?>
			</div>
		</div>

		<div class="row section-partners">
			<div class="container blue-bg">
				<div class="col-xl-12">
					<h2 class="section_title white">Partners</h2>
				</div>
				<div class="col-xl-12">
					<?=moda_display_partners();?>
				</div>
			</div>
		</div>

		<div class="row section-news">
			<div class="container blue-bg">
				<div class="col-xl-12">
					<h2 class="section_title white">Open Data News</h2>
				</div>
				<div class="col-xl-12">
					<?=moda_display_partners();?>
				</div>
			</div>
		</div>

		<div class="row section-socialize">
			<div class="col-sm-12 col-md-6 socialize">
				<h2>Socialize with data.</h2>
				<p>Log in to see who is attending, share your calendar, &amp; invite some friends to join you</p>
			</div>
			<div class="col-sm-12 col-md-6 contact">			
				<h3>Drop us a line.</h3>
				<?=do_shortcode('[wpcf7]');?>
			</div>
		</div>

		<div class="row section-sponsors blue-border">
			<div class="col-xl-12">
				<h2 class="section_title">Open Data Week is brought to you by</h2>
			</div>
			<div class="col-xl-12">
				<a href="#">NYC OpenData</a>
				<a href="#">NYC Analytics</a>
				<a href="#">NYC Information Technology &amp; Telecommunications</a>
			</div>
		</div>

		<div class="row section-coordinate circle-bg">
			<h3 class="rounded lightgrey-bg">
				Interested in putting on an event or adding your existing event to our list?
				Click here to email our coordinator.
			</h3>
			<div class="col-xl-12">
				<h3>Stay up to date on all things NYC Open Data</h3>
				<form id="newsletter">
					<input type="text" placeholder="enter your email address" />
					<input type="submit" value="Subscribe" />
				</form>
			</div>
		</div>

	</div>
</div>