<?
// Get Array of All CPT Items by ID
function moda_get_items($type='post',$orderby=array( 'menu_order' => 'ASC', 'date' => 'DESC')) {
	$args = array('post_type'=>$type,'orderby' => $orderby, 'posts_per_page'=>-1); 
    foreach(get_posts($args) as $item) { 
      $items[$item->ID] = $item;
    }
    if(isset($items)) { return $items; }   // Return array of sponsor IDs 
}

// Get Eventbrite ID from URL
function eb_event_id($url) {
	$event_id = array_pop(explode('-',$url));
	$event_id = array_shift(explode('?',$event_id));
	return $event_id;
}