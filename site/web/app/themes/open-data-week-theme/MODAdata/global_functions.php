<?

// Get Array of All CPT Items by ID
function moda_get_items($type='post') {
	$args = array('post_type'=>$type,'orderby' => array( 'menu_order' => 'ASC', 'date' => 'DESC'), 'posts_per_page'=>-1); 
    foreach(get_posts($args) as $item) { 
      $items[$item->ID] = $item;
    }
    return $items;   // Return array of sponsor IDs 
}
