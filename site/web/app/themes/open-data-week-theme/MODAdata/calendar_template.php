<?php

function moda_events_calendar( $atts=null ) {

?>

	
<div id="calendar" class="container">
<div class="row">


	<h2>Mine Your Own Data</h2>
	<h4>Schedule Your 2018 NYC Open Data Week activities here</h4>

	<!-- View Toggle -->
	<div class="view_toggle">
		Select View
		<div class="views">
			<a href="#" class="grid">Grid View</a>
			<a href="#" class="list">List View</a>
			<a href="#" class="planner">Planner View</a>
		</div>
	</div>


	<!-- Share Buttons -->
	<div class="share_buttons">
		<div class="share">
			<a href="#" class="social">Share via...</a>
			<a href="#" class="email">Email</a>
			<a href="#" class="print">Print</a>
		</div>
	</div>


	<!-- Filters -->
	<div class="view_toggle">
		Filters
		<div class="filter">
			<a href="#" class="grid">Grid View</a>
			<a href="#" class="list">List View</a>
			<a href="#" class="planner">Planner View</a>
		</div>
	</div>

	<!-- The Calendar -->
	<div class="calendar">

		<div class="events">
			
			
			
			<?=print_r(moda_get_events(),true);?>



		</div>
	</div>




</div>
</div>




<?php 

} 

?>
