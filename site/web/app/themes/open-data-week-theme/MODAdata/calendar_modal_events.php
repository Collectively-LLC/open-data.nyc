<?php

function moda_calendar_modal_events() {

// Get events
$events = moda_get_items('events',array( 'date' => 'ASC'));

//////// EVENTBRITE MODALS ////////
	foreach ($events as $id => $event) {
		$allmeta = allmeta($id);
		$type = wp_get_post_terms( $id, 'event_type')[0];
		$borough = wp_get_post_terms( $id, 'borough')[0];
		$cost = wp_get_post_terms( $id, 'cost')[0];
		$post_date = wp_get_post_terms( $id, 'date')[0];
		$clean_date = strtolower(str_replace(' ','-',str_replace(',','',$date)));
		$partners = unserialize($allmeta[cmb_pre().'attached_partners']);
			$partner_list = '';
		if(count($partners)>0) {
			foreach ($partners as $partner) { 
				$partner_list .= '<a href="'.get_post_meta($partner,cmb_pre().'url',true).'" target="_blank" class="circle" style="background-image: url(\''.get_the_post_thumbnail_url( $partner, 'small' ).'\')" title="'.get_the_title($partner).'"></a>';
			}
		}

		echo '<div class="modal fade" id="details'.$id.'" tabindex="-1" role="dialog" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
					<div class="row">
				        <div class="col-md-7">
				        	<h5 class="title">'.get_the_title( $id ).'</h5>
				        	<h5 class="time">'.$cost->name.'</h5>
				        	<h5 class="time">'.$allmeta[cmb_pre().'time_start'].' to '.$allmeta[cmb_pre().'time_end'].'</h5>
				        	<h5 class="borough">'.$borough->name.'</h5>
				        </div>
				        <div class="col-md-5 partners">
				        	'.$partner_list.'
				        </div>
				    </div>
			        <div class="col-md-12">
			        	<p class="summary">'.$allmeta[cmb_pre().'summary'].'</p>
			        </div>
					<div class="row justify-content-between">
						<div class="col">
				            <span class="type" data-option="'.$type->slug.'">'.$type->name.'</span>
				        </div>
						<div class="col">';
				            if(strpos( $allmeta[cmb_pre().'register'], 'eventbrite' ) > 0 ) {
								echo '<a class="register button rounded" data-dismiss="modal" data-toggle="modal" data-target="#register'.$id.'">Register</a>'; 
							} else { 
								echo '<a class="register button rounded" href="'.$allmeta[cmb_pre().'register'].'" target="_blank">Register</a>'; 
							}
				        echo '</div>
				    </div>
			    </div>
			  </div>
			</div>';
	}

}

?>