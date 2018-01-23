<?php

function moda_events_calendar( $atts=null ) {

?>

	
<div id="calendar" class="container">
<div class="row justify-content-center align-items-center" data-view="planner">

	<div class="calendar_header">
		<h3 class="font-weight-bold text-transform-uppercase">Discover Open Data in NYC</h3>
		<h6 class="black">Schedule Your 2018 NYC Open Data Week activities here</h6>
	</div>

	<!-- View Toggle -->
	<div class="view_toggle">
		Select View
		<div class="views">
			<a href="#" class="icon grid" data-view="grid">Grid</a>
			<a href="#" class="icon list" data-view="list">List</a>
			<a href="#" class="icon planner" data-view="planner">Planner</a>
		</div>
	</div>


	<!-- Share Buttons -->
	<div class="share_buttons">
		<div class="share">
			<a href="#" class="icon social">Share via...</a>
			<a href="mailto:?Subject=Check%20out%20NYC%20Open%20Data%20Week%21&Body=NYC%20Open%20Data%20Week%20is%20coming%20soon%21%20Get%20more%20info%20from%20their%20website%20-%20http%3A//Open-Data.NYC" class="icon email">Email</a>
			<a href="#" onclick="window.print();return false;" class="icon print">Print</a>
		</div>
	</div>


	<!-- Filters -->
	<div class="filters">
		<?=moda_calendar_filters();?>
	</div>

	<!-- The Calendar -->
	<div class="events">
		<?=moda_calendar_cards();?>
	</div>

	<!-- Gapper -->
	<div class="gapper"></div>
	


</div>
</div>




<?php 

} 

?>
