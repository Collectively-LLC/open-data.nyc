<?php // Board of Directors

  function board_shortcode( $atts, $content = "" ) {

// Get Board members
    $args = array('post_type'=>'board-of-directors','orderby' => array( 'menu_order' => 'ASC', 'date' => 'DESC'), 'posts_per_page'=>-1); 
    foreach(get_posts($args) as $post) { 
      $post_set[$post->ID] = $post->post_title;
    }

// If there are Members, show the directory
	if(!null == $post_set) { 
		$return = '';
		$return.= '<div class="directory directors" id="board-of-directors"><div class="container">
					<h2 id="initiatives"><strong>Board of Directors</strong></h2>
					<div class="row justify-content-center">';
		foreach($post_set as $k=>$v) {
			$director = array01(get_post_meta($k));
			$imgurl = wp_get_attachment_image_url( $director['_thumbnail_id'], 'medium' );
			$return.= '<div class="col-12 col-sm-6 col-md-4 col-lg-3"><div class="director entry">';
			// with headshot // $return.= '<div class="image" style="background-image: url('.$imgurl.')"></div>';
			$return.= '<p>';
			$return.= '<span>'.$director[cmb_pre().'firstname'].' '.$director[cmb_pre().'lastname'].'</span>';
			$return.= '<span>'.$director[cmb_pre().'bio'].'</span>';
			$return.= '</p>';
			$return.= '</div></div>';
		}

		$return .= '</div></div></div>';
		return $return;
	}

}
add_shortcode( 'board', 'board_shortcode' );

?>