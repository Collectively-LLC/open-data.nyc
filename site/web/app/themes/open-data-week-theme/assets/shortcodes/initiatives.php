<?php // Initiatives

  function initiatives_shortcode( $atts, $content = "" ) {

// Get Board members
    $args = array('post_type'=>'initiatives','orderby' => array( 'menu_order' => 'ASC', 'date' => 'DESC'), 'posts_per_page'=>-1); 
    foreach(get_posts($args) as $post) { 
      $post_set[$post->ID] = $post->post_title;
    }

// If there are Members, show the directory
	if(!null == $post_set) { 
		$return = '';
		$return.= '<div class="directory initiatives" id="initiatives"><div class="container">
					<h2><strong>Our Initiatives</strong></h2>
					<div class="row justify-content-center">';
		foreach($post_set as $k=>$v) {
			$director = array01(get_post_meta($k));
			$imgurl = wp_get_attachment_image_url( $director['_thumbnail_id'], 'medium' );
			$return.= '<div class="col-12 col-sm-6 col-md-6 col-lg-4"><div class="entry">';
			$return.= '<div class="image" style="background-image: url('.$imgurl.')"></div>';
			$return.= '<p>';
			$return.= '<span>'.$director[cmb_pre().'title'].'</span>';
			$return.= '<span>'.$director[cmb_pre().'description'].'</span>';
			$return.= '</p>';
			$return.= '</div></div>';
		}

		$return .= '</div></div></div>';
		return $return;
	}

}
add_shortcode( 'initiatives', 'initiatives_shortcode' );

?>