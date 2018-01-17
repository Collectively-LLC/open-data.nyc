<?php

add_action( 'cmb2_admin_init', 'intro_metaboxes' );
function intro_metaboxes() { global $cmb_pre;

  $intro_content = new_cmb2_box( array(
    'id'            => 'intro_details',
    'title'         => __( 'Intro Section', 'cmb2' ),
    'menu_title'   => esc_html__( 'Intro Section', 'cmb2' ),
    'object_types' => array( 'options-page' ),
    'option_key'   => 'intro_details', // The option key and admin menu page slug.
    'context'       => 'normal',
    'priority'      => 'high',
    'show_names'    => true, // Show field names on the left
    // 'parent_slug'  => 'themes.php',
  ) );
  
  $lines = array(
    'One'=>'Welcome to'
    ,'Two'=>'NYC Open Data Week'
    ,'Three'=>'March 4-11 2018'
  );

  foreach ($lines as $line=>$default) {
    $intro_content->add_field( array(
        'name'       => __( 'Line '.$line, 'cmb2' ),
        'id'         => $cmb_pre . 'line_'.strtolower($line),
        'type'       => 'text',
        'default'    => $default
    ) );
  }



}


?>