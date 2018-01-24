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

// Time Difference
function time_diff($time1, $time2) {
    $time1 = strtotime("1/1/1980 $time1");
    $time2 = strtotime("1/1/1980 $time2");
    if ($time2 < $time1) {
        $time2 = $time2 + 86400;
    }
    return ($time2 - $time1) / 3600;    
}  