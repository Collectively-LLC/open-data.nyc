<?php
function moda_display_sponsors() {

	$sponsors = moda_get_items('sponsors');
	$return = '';
	foreach($sponsors as $id=>$sponsor) {
		$return .= '<a href="'._meta('url',$id).'"><img src="'.get_the_post_thumbnail_url( $id, 'medium' ).'" 
		alt="'.$sponsor->post_title.'" /></a>';
	} 
	return $return;

}

?>