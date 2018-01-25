<div id="content">

	<?
	$about = get_option('about_details');
	?>
	<div id="about" class="row section-about justify-content-around align-items-center">
		<div class="col-xl-12">
			<h2 class="section_title red text-center text-uppercase circles-above">About Us</h2>
		</div>
		<div class="info col-sm-12 col-md-6">
			<h2 class="text-center font-weight-light"><?= $about[cmb_pre().'headline']; ?></h2>
			<h5 class="font-weight-light"><?= wpautop( $about[cmb_pre().'content'] ); ?></h5>
		</div>
		<div class="col-sm-12 col-md-4">
			<img src="<?= $about[cmb_pre().'graphic']; ?>" alt="" />
		</div>
	</div>

	<div id="calendar" class="row section-calendar">
		<div class="col-xl-12">
			<h2 class="section_title red text-center text-uppercase circles-above">Calendar of Events</h2>
		</div>
		<div class="col-xl-12 blue-border white-bg">
			<?=moda_events_calendar();?>
		</div>
	</div>

	<div id="partners" class="row section-partners">
		<div class="container blue-bg circles-above">
			<div class="col-xl-12">
				<h2 class="section_title white text-center text-uppercase">Partners</h2>
			</div>
			<?=moda_display_partners();?>
		</div>
	</div>

	<div id="news" class="row section-news">
		<div class="container blue-bg">
			<div class="col-xl-12">
				<h2 class="section_title white text-center text-uppercase circles-above">Announcements</h2>
			</div>
			<?=moda_display_news();?>
		</div>
	</div>

	<div id="contact" class="row section-socialize lightestgrey-bg circles-above circles-high justify-content-center">
		<div class="contact col-sm-12 col-md-12 yellow-bg rounded">			
			<h3 class="white text-center">Drop us a line.</h3>
			<?=moda_contact_form();?>
		</div>
	</div>

	<div id="sponsors" class="row section-sponsors blue-border text-center justify-content-center">
		<h4 class="section_title font-italic">Open Data Week is brought to you by</h4>
		<div class="sponsors row col-xl-12 text-center justify-content-around align-items-center">
			<?php 	
				$sponsors = moda_get_items('sponsors');
				foreach($sponsors as $id=>$sponsor) {
					echo '<a href="'._meta('url',$id).'"><img src="'.get_the_post_thumbnail_url( $id, 'medium' ).'" 
					alt="'.$sponsor->post_title.'" /></a>';
				} 
			?>
		</div>
	</div>

	<div id="connect" class="row section-coordinate circle-bg justify-content-center">
		<h5 class="rounded blurb text-center white-bg circles-above circles-high">
			Interested in putting on an event or adding your existing event to our list?<br />
			<a href="mailto:aschmoeker@analytics.nyc.gov"><strong>Email: aschmoeker@analytics.nyc.gov</strong></a>.
		</h5>
		<div class="newsletter col-xl-12 text-center">
			<h4 class="text-uppercase"><strong>Stay up to date on all things NYC Open Data</strong></h4>
			<?=moda_newsletter_form();?>
		</div>
	</div>

</div>