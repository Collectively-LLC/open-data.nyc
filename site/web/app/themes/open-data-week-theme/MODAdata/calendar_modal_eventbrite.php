<?php

function moda_calendar_modal_eventbrite() {

// Get events
$events = moda_get_items('events',array( 'date' => 'ASC'));

//////// DETAILS MODALS ////////
	foreach ($events as $id => $event) {
		$allmeta = allmeta($id);
		if(strpos( $allmeta[cmb_pre().'register'], 'eventbrite' ) > 0 ) {

			$eb_event_id = eb_event_id($allmeta[cmb_pre().'register']);

			echo '<div class="modal fade" id="register'.$id.'" tabindex="-1" role="dialog" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				        <div id="eventbrite-widget-container-'.$eb_event_id.'"></div>
				    </div>
				  </div>
				</div>

				<script type="text/javascript">
				function load_register'.$id.'() { 
					if(jQuery(\'#eventbrite-widget-container-'.$eb_event_id.'\').html() == "") {
					    var exampleCallback = function() {
					        console.log(\'Order complete!\');
					    };
					    window.EBWidgets.createWidget({
					        // Required
					        widgetType: \'checkout\',
					        eventId: \''.$eb_event_id.'\',
					        iframeContainerId: \'eventbrite-widget-container-'.$eb_event_id.'\',
					        // Optional
					        iframeContainerHeight: 425,  // Widget height in pixels. Defaults to a minimum of 425px if not provided
					        onOrderComplete: exampleCallback  // Method called when an order has successfully completed
					    });
					}
				}
				</script>
				';
		}

	}

}

?>