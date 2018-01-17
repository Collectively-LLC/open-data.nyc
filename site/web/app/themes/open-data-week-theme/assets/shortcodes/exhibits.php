<?php // Exhibits

  function exhibits_shortcode( $atts, $content = "" ) {

// Get Exhibits
  	$post_set=array();
    $args = array('post_type'=>'exhibits-projects','orderby' => array( 'menu_order' => 'ASC', 'date' => 'DESC'), 'posts_per_page'=>-1); 
    foreach(get_posts($args) as $post) { 
      $post_set[$post->ID] = $post->post_title;
    }

// If there are Members, show the directory
	if($post_set != null) { 
		$return = ''; $indicators = '';

		// Open Shell
		$return.= '
			<div class="directory exhibits" id="exhibits">
			<div class="container">
				<h2><strong>Featured Exhibits and Projects</strong></h2>';

		// Open Carousel
		$return.= '
	     	<div id="exhibitsCarousel" class="carousel slide" data-ride="carousel">';


        // Slides
        $return .= '<div class="carousel-inner">';
		$n=0;
		foreach($post_set as $k=>$v) {
			$exhibit = array01(get_post_meta($k));
			$imgurl = wp_get_attachment_image_url( $exhibit['_thumbnail_id'], 'medium' );
				$args = array( 
				 'template' => __( '<span style="display:none;">%s: </span>%l' ), 
				 //'term_template' => '<a href="%1$s">%2$s</a>',
				 'term_template' => '%2$s',
				);
			$extype = print_r(get_the_taxonomies($k,$args)['exhibit_type'],true);
			if($n==0){ $active = 'active'; } else { $active = ''; }

			$return .= ' 
					  <div class="carousel-item '.$active.'"><div class="row">
						<div class="image"><div style="background-image: url('.$imgurl.')"></div></div>
						<div class="details">
							<h2 class="type">'.$extype.'</h2>
							<h2 class="title">'.$exhibit[cmb_pre().'title'].'</h2>
							'.wpautop( $exhibit[cmb_pre().'description'] ).'</span>
							<a class="button" target="_blank" href="'.$exhibit[cmb_pre().'url'].'">'.$exhibit[cmb_pre().'button'].'</a>
						</div>
					  </div></div>';

			$indicators .= '<li data-target="#exhibitsCarousel" style="background-image: url('.$imgurl.')" data-slide-to="'.$n.'" class="'.$active.'"></li>';

			$n++;
		}
		$return .= '</div>';


		// Indicators
		$return .= '<ol class="carousel-indicators">'.$indicators.'</ol>';

		// Arrows
		$return .= '
			<div class="carousel-arrows">
		        <a class="carousel-control-prev" href="#exhibitsCarousel" role="button" data-slide="prev">
		          <span class="carousel-control-prev-icon" aria-hidden="true">&lt;</span>
		          <span class="sr-only">Previous</span>
		        </a>
		        <a class="carousel-control-next" href="#exhibitsCarousel" role="button" data-slide="next">
		          <span class="carousel-control-next-icon" aria-hidden="true">&gt;</span>
		          <span class="sr-only">Next</span>
		        </a>
		    </div>';


	    // Close Carousel
	    $return .= '</div>';


	    // Close Shell
		$return .= '</div></div>';


		// Output
		return $return;
	}

}
add_shortcode( 'exhibits', 'exhibits_shortcode' );

?>