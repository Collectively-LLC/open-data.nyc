<?php

function moda_events_calendar( $atts=null ) {

?>

	
<div id="calendar" class="container">
<div class="row justify-content-center align-items-center" data-view="planner">

	<div class="title">
		<h3 class="font-weight-bold text-transform-uppercase">Mine Your Own Data</h3>
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
			<a href="#" class="icon email">Email</a>
			<a href="#" class="icon print">Print</a>
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
