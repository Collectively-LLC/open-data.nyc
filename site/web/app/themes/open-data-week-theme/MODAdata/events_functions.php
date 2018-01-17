<?php


// Get Array of All Events by ID
function moda_get_events($user=null) {
	$args = array('post_type'=>'events','orderby' => array( 'menu_order' => 'ASC', 'date' => 'DESC'), 'posts_per_page'=>-1); 
    foreach(get_posts($args) as $event) { 
      $events[$event->ID] = $event;
    }
    return $events[$event->ID];   // Return array of event IDs 
}





?>