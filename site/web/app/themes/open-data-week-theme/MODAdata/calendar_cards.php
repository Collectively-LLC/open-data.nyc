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
					foreach ($events as $id => $event) {
						$allmeta = allmeta($id);
						$type = wp_get_post_terms( $id, 'event_type')[0];
						$borough = wp_get_post_terms( $id, 'borough')[0];
						$cost = wp_get_post_terms( $id, 'cost')[0];
						$post_date = wp_get_post_terms( $id, 'date')[0];
						$clean_date = strtolower(str_replace(' ','-',str_replace(',','',$date)));
						if($post_date->slug==strtolower(str_replace(' ','-',str_replace(',','',$date)))) {
							echo '<div class="event" data-type="'.$type->slug.'" data-borough="'.$borough->slug.'" data-date="'.$clean_date.'" data-cost="'.$cost->slug.'" data-event="'.$id.'"  data-toggle="modal" data-target="#exampleModal">'
									.'<span class="title">'.get_the_title( $id ).' </span>'
									.'<span class="time">'.$allmeta[cmb_pre().'time_start'].' to '.$allmeta[cmb_pre().'time_end'].' </span>'
									.'<span class="borough">'.$borough->name.' </span>'
									.'<a class="more">-Click for more details-</a>'
									.'<a class="button rounded" href="#">Register</a>'
								.'</div>';
						}
					}
				echo '</div>';
			}
		?>
	</div></div>


<div class="modal fade row align-items-center" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog col" role="document">
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
  </div>
</div>




</div>








<?php 

}

?>