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
		if(count($partners)>0 && is_array($partners)) {
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
					<div class="row justify-content-between">
				        <div class="col-auto event-info">
				        	<h5 class="title">'.get_the_title( $id ).'</h5>
				        	<h5 class="time">'.$cost->name.'</h5>
				        	<h5 class="time">'.$allmeta[cmb_pre().'time_start'].' to '.$allmeta[cmb_pre().'time_end'].'</h5>
				        	<h5 class="borough">'.$borough->name.'</h5>
				        	<h5 class="address"><small>
				        		<a href="https://www.google.com/maps?q='.str_replace(' ','+',$allmeta[cmb_pre().'address']).'" target="_blank" class="black">
				        		'.$allmeta[cmb_pre().'address'].'
				        		</a>
				        	</small></h5>
				        </div>
				        <div class="col-auto partners">
				        	'.$partner_list.'
				        </div>
				    </div>
			        <div class="col-md-12">
			        	<p class="summary">'.wpautop($allmeta[cmb_pre().'summary']).'</p>
			        </div>
		        		
					<div class="row justify-content-between align-items-end">
						<div class="col-12">
				            <span class="type" data-option="'.$type->slug.'">'.$type->name.'</span>
				        </div>

			        	<div class="col-auto col-sm-6 modal-link-box">
			        		<input type="text" class="modal-link" id="js-modal-link-'.$id.'" value="'.get_bloginfo('url').'/#details'.$id.'">
		        			<button class="button rounded blue modal-link-btn js-modal-link-btn" data-event-id="'.$id.'">Copy Event Link</button>
		        		</div>

						<div class="col-auto col-sm-6">';
				            if(strpos( $allmeta[cmb_pre().'register'], 'eventbrite' ) > 0 ) {
								echo '<a class="register button rounded" onmouseover="load_register'.$id.'()" onclick="load_register'.$id.'()" data-dismiss="modal" data-toggle="modal" data-target="#register'.$id.'">Register</a>'; 
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