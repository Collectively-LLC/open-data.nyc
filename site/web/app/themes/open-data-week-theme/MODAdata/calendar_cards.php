<?php

function moda_calendar_cards() {

// Get events
$events = moda_get_items('events',array( 'date' => 'ASC'));

// Set Values
	// first start time to last end time
	$timespan = array('9','21'); 

	// event days
	$days = array(
		'Monday'=>'March 4th',
		'Tuesday'=>'March 5th',
		'Wednesday'=>'March 6th',
		'Thursday'=>'March 7th',
//		'Friday'=>'March 8th',
	); 

?>




<div class="row">

	<div class="timeslots">
	<?php
		$n=$timespan[0];
			echo '<div class="header time"> <!----> </div>';
		while($n<=$timespan[1]) {
			echo '<div class="timeslot">'.$n.':00</div>';
			$n++;
		}
	?>
	</div>

	<div class="days">
		<?php
			foreach ($days as $day => $date) {
				echo '<div class="day '.$day.'">';
					echo '<div class="header">'.$day.' <span>'.$date.'</span></div>';
					foreach ($events as $id => $event) {
						echo '<div class="event">'.$id.' '.get_the_title( $id ).'</div>';
					}
				echo '</div>';
			}
		?>
	</div>


</div>








<?php 

}

?>