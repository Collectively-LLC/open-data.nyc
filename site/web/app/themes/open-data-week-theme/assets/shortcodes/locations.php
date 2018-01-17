<?php // Locations

  function locations_shortcode( $atts, $content = "" ) {

// Get Board members
    $args = array('post_type'=>'locations','orderby' => array( 'menu_order' => 'DESC'), 'posts_per_page'=>-1); 
    foreach(get_posts($args) as $post) { 
      $post_set[$post->ID] = $post->post_title;
    }

// If there are Locations, show them
	if(!null == $post_set) { 
		$return = '';
		foreach($post_set as $k=>$v) {

			$location = array01(get_post_meta($k));

			$return.= '<div class="location row">';
				$return.= '<div class="details">';
					$return.= '<h2 class="anglecut short bottom right">'.get_the_title($k).'</h2>';
					$return.= '<h3>'.$location[cmb_pre().'title'].'</h3>';
					$return.= wpautop($location[cmb_pre().'address']);
					$return.= '<p>';
						if($location[cmb_pre().'website'] != null) { 
							$return.= '<a href="'.$location[cmb_pre().'website'].'" target="_blank"><strong>View Website</strong></a>'; 
						}
						if($location[cmb_pre().'phone'] && $location[cmb_pre().'website']) { $return.= '<br />'; }
						if($location[cmb_pre().'phone'] != null) { 
							$return.= 'Telephone: '.$location[cmb_pre().'phone'];
						}
						$return.= '</p>';
					$return.= '</div>';
				$return.= '<div class="map">'.$location[cmb_pre().'map_embed'].'</div>';
			$return.= '</div>';

		}
		return $return;
	}

}
add_shortcode( 'locations', 'locations_shortcode' );

?>