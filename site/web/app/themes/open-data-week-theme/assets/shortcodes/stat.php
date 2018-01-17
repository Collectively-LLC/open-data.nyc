<?php // Statistic

  function stat_shortcode( $atts, $content = "" ) {
	extract(shortcode_atts( array( 'name' => null, 'number' => null, 'color' => null ), $atts ));
	$return = '';

	$title = $name; 
	$name = str_replace(' ','<br />',$name);
	$num = $number;
	if($color !== null) { $color = 'color: '.$color; }

	$return .= '<div class="stat">';
	$return .= '<span class="name">'.$name.'</span>';
	$return .= '<span class="number" style="'.$color.'">'.$number.'</span>';
	$return .= '</div>';

	return $return;

}
add_shortcode( 'stat', 'stat_shortcode' );

  function stats_shortcode( $atts, $content = "" ) {
	extract(shortcode_atts( array( 'name' => null, 'number' => null ), $atts ));
	$return = '<div class="row stats">';
	$return .= do_shortcode( $content );
	$return .= '</div>';

	return $return;

}
add_shortcode( 'stats', 'stats_shortcode' );

?>