<?php

add_action( 'cmb2_admin_init', 'about_metaboxes' );
function about_metaboxes() { global $cmb_pre;

  $intro_content = new_cmb2_box( array(
    'id'            => 'about_details',
    'title'         => __( 'About Section', 'cmb2' ),
    'menu_title'   => esc_html__( 'About Section', 'cmb2' ),
    'object_types' => array( 'options-page' ),
    'option_key'   => 'about_details', // The option key and admin menu page slug.
    'context'       => 'normal',
    'priority'      => 'high',
    'show_names'    => true, // Show field names on the left
    // 'parent_slug'  => 'themes.php',
  ) );
  
  // Title
  $intro_content->add_field( array(
      'name'       => __( 'Page Title', 'cmb2' ),
      'id'         => $cmb_pre . '404_title',
      'type'       => 'text',
  ) );

  // Subtitle
  $intro_content->add_field( array(
      'name'       => __( 'Subheader Text', 'cmb2' ),
      'id'         => $cmb_pre . '404_subtitle',
      'type'       => 'textarea_small',
  ) );

  // Content
  $intro_content->add_field( array(
      'name'       => __( 'Body Content', 'cmb2' ),
      'desc'       => 'Displays above Search box',
      'id'         => $cmb_pre . '404_content',
      'type'       => 'wysiwyg',
  ) );

}


?>