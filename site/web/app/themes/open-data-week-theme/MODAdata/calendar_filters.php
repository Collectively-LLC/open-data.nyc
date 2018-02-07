<?php
function moda_calendar_filters() {

$filters = array(
	'Date' => 	array(
			      'Saturday, March 3'
			      ,'Sunday, March 4'
			      ,'Monday, March 5'
			      ,'Tuesday, March 6'
			      ,'Wednesday, March 7'
			      ,'Thursday, March 8'
			      ,'Friday, March 9'
			      ,'Saturday, March 10'
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
					 'Fee for entry',
					 'Subsidy available',
				),
	'Invitation' => array(
					 'Public',
					 'Private',
				),
);

foreach ($filters as $filter=>$options) {
	$filter_id = str_replace(' ','',strtolower($filter));

	echo '<div class="filter list" data-filter="'.$filter_id.'">';
	echo '	<a class="dropdown" href="#">Filter by '.$filter.'</a>';
	echo '	<ul>';
	foreach($options as $option) {
		$option_id = str_replace(' ','-',str_replace(',','',strtolower($option)));
		echo '	<li class="'.$filter_id.' inactive" data-filter="'.$filter_id.'" data-option="'.$option_id.'">'.$option.'</li>';
	}
	echo '	</ul>';
	echo '</div>';
}

}




function moda_calendar_key() {

$key = array(
	'Event Type' => array(
					'Workshop'
					,'Tour'
					,'Portal Demo'
					,'Panel'
					,'Conference'
					,'Community Gathering'
					,'Showcase'
					,'Reception'      
					,'Virtual Engagement'					
				),
);


foreach ($key as $filter=>$options) {
	$filter_id = str_replace(' ','',strtolower($filter));

	echo '<div class="filter icons row" data-filter="'.$filter_id.'">';
	echo '	<div class="col-auto"><a href="#">'.$filter.'</a></div>';
	echo '	<ul class="col-sm-12 col-md row">';
	foreach($options as $option) {
		$option_id = str_replace(' ','-',strtolower($option));
		echo '	<li class="'.$filter_id.' inactive col" data-filter="'.$filter_id.'" data-option="'.$option_id.'">'.$option.'</li>';
	}
	echo '	</ul>';
	echo '</div>';
}


}
?>