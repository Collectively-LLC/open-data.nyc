<?php

function moda_calendar_cards() {

// Get events
$events = moda_get_items('events',array( 'date' => 'ASC'));

// Set Values
	// first start time to last end time
	$timespan = array('9','21'); 

	// event days
	$days = array(
		'Saturday, March 3',
		'Sunday, March 4',
		'Monday, March 5',
		'Tuesday, March 6',
		'Wednesday, March 7',
		'Thursday, March 8',
		'Friday, March 9',
		'Saturday, March 10',
	); 

// Queue EB 
	echo '<script src="https://www.eventbrite.com/static/widgets/eb_widgets.js"></script>';

?>

<div class="row">

	<div class="timeslots">
	<?php
		$n=$timespan[0];
			echo '<div class="header time"> <!----> </div>';
		while($n<=$timespan[1]) {
			if($n>12) { $th = $n-12; $td = 'pm'; } else { $th = $n; $td = 'am'; }
			echo '<div class="timeslot">'.$th.':00 '.$td.'</div>';
			$n++;
		}
	?>
	</div>

	<div class="days"><div class="planwide">
		<?php
			foreach ($days as $date) {
				$date_parts = explode(',', $date);
				echo '<div class="day '.$date_parts[0].'">';
					echo '<div class="header">'.$date_parts[0].' <span>'.$date_parts[1].'</span></div>';

					$n=$timespan[0];
					while($n<=$timespan[1]) {
						$timerow = $n;
						if($timerow > 12) { $timerow = $n-12; }

						echo '<div class="timerow" data-timerow="'.$n.'">';

							foreach ($events as $id => $event) {
								$allmeta = allmeta($id);
								$post_date = wp_get_post_terms( $id, 'date')[0];
								if($post_date->slug==strtolower(str_replace(' ','-',str_replace(',','',$date))) && $allmeta[cmb_pre().'time_start'] == $timerow) {
									// CARD VARIABLES
									if(strpos( $allmeta[cmb_pre().'time_start'] , ':30' )) { $thirty = 'thirty'; } else { $thirty = ''; }
									$time_diff = time_diff($allmeta[cmb_pre().'time_start'],$allmeta[cmb_pre().'time_end']);
										$duration = 'duration-'.str_replace('.','-',$time_diff);
									$type = wp_get_post_terms( $id, 'event_type')[0];
									$borough = wp_get_post_terms( $id, 'borough')[0];
									$cost = wp_get_post_terms( $id, 'cost')[0];
									$clean_date = strtolower(str_replace(' ','-',str_replace(',','',$date)));
									// CARD OUTPUT
									echo '<div class="event '.$duration.' '.$thirty.'" data-type="'.$type->slug.'" data-borough="'.$borough->slug.'" data-date="'.$clean_date.'" data-cost="'.$cost->slug.'" data-event="'.$id.'" data-push="0">'
											.'<span class="title" data-toggle="modal" data-target="#details'.$id.'">'.get_the_title( $id ).' </span>'
											.'<span class="time" data-toggle="modal" data-target="#details'.$id.'">'.$allmeta[cmb_pre().'time_start'].' to '.$allmeta[cmb_pre().'time_end'].' </span>'
											.'<span class="borough" data-toggle="modal" data-target="#details'.$id.'">'.$borough->name.' </span>'
											.'<a class="more" data-toggle="modal" data-target="#details'.$id.'">-Click for more details-</a>';
									if(strpos( $allmeta[cmb_pre().'register'], 'eventbrite' ) > 0 ) {
										echo '<a class="button rounded" data-toggle="modal" data-target="#register'.$id.'">Register</a>'; 
									} else { 
										echo '<a class="button rounded" href="'.$allmeta[cmb_pre().'register'].'" target="_blank">Register</a>'; 
									}
									echo '</div>';
								}
							}
						
						echo '</div>'; // end timerow	
					$n++; }

				echo '</div>'; // end Day
			}
		?>
	</div></div>




	<? 
	////// INFO MODALS ////////// 
	moda_calendar_modal_events();
	//////// EVENTBRITE MODALS ////////
	moda_calendar_modal_eventbrite();
	?>

</div>








<?php 

}

?>