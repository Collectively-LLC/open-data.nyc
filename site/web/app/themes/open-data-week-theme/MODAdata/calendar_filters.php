<?php
function moda_calendar_filters() {

$filters = array(
	'Date' => 	array(
					'Monday',
					'Tuesday',
					'Wednesday',
					'Thursday',
					'Friday',
				),
	'Borough' => array(
					'Bronx',
					'Brooklyn',
					'Manhattan',
					'Queens',
					'Staten Island',
				),
	'Cost' => array(
					'Free',
					'Paid',
					'Paid by Subsidy',
				),
);
$icon_filters = array(
	'Event Type' => array(
					'Speaker',
					'Panel',
					'Workshop',
					),
);

foreach ($filters as $filter=>$options) {
	$filter_id = str_replace(' ','-',strtolower($filter));

	echo '<div class="filter list" data-filter="'.$filter_id.'">';
	echo '	<a href="#">Filter by '.$filter.'</a>';
	echo '	<ul>';
	foreach($options as $option) {
		echo '	<li class="'.$filter_id.'">'.$option.'</li>';
	}
	echo '	</ul>';
	echo '</div>';
}

foreach ($icon_filters as $filter=>$options) {
	$filter_id = str_replace(' ','-',strtolower($filter));

	echo '<div class="filter icons" data-filter="'.$filter_id.'">';
	echo '	<a href="#">'.$filter.'</a>';
	echo '	<ul>';
	foreach($options as $option) {
		echo '	<li class="'.$filter_id.'">'.$option.'</li>';
	}
	echo '	</ul>';
	echo '</div>';
}





}
?>