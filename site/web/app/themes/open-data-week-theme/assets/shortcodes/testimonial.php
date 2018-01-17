<?php // Testimonial

  function testimonial_shortcode( $atts, $content = "" ) {
	//	$atts = shortcode_atts( array( 'id' => null ), $atts );
	if(mt_meta('testimonial')>0) {
		if (get_post_status(mt_meta('testimonial'))=='publish') { 
			$testimonial = array01(get_post_meta(mt_meta('testimonial')));
			$return = '<div class="testimonial"><div class="container"><div class="row"><div class="col-12">';
			$return.= wp_get_attachment_image( $testimonial['_thumbnail_id'], 'thumbnail' );
			$return.= wpautop( $testimonial[cmb_pre().'quote'] );
			$return.= '<p><strong><em>'.$testimonial[cmb_pre().'name'].'</em></strong></p>';
			$return.= '</div></div></div></div>';
			return $return;
		}
	}

}
add_shortcode( 'testimonial', 'testimonial_shortcode' );

?>