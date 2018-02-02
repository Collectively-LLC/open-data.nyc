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
  
  // Headline
  $intro_content->add_field( array(
      'name'       => __( 'Headline', 'cmb2' ),
      'id'         => $cmb_pre . 'headline',
      'type'       => 'text',
      'default'    => 'Home to New York’s largest shared open database',
  ) );

  // Content
  $intro_content->add_field( array(
      'name'       => __( 'Content', 'cmb2' ),
      'id'         => $cmb_pre . 'content',
      'type'       => 'wysiwyg',
      'default'    => 'NYC Open Data Week is a collaboration between NYC Open Data, BetaNYC, BureauBlank and the dynamic NYC civic tech community. We’re kicking off the week on International Open Data Day with School of Data (March 4th) and wrapping up with an Open Data for All Workshop at the NYC Parks Hamilton Fish Computer Resource Center (March 11th). Peruse the descriptions of these events and many others below and sign up!',
  ) );

// Graphic
  $intro_content->add_field( array(
      'name'       => __( 'Graphic', 'cmb2' ),
      'id'         => $cmb_pre . 'graphic',
      'type'    => 'file',
      'options' => array( 'url' => false ),
      'text'    => array(
        'add_upload_file_text' => 'Add Graphic' // Change upload button text. Default: "Add or Upload File"
      ),
      // query_args are passed to wp.media's library query.
      'query_args' => array(
        'type' => array(
         'image/gif',
         'image/jpeg',
         'image/png',
        ),
      ),
      'preview_size' => 'medium',
  ) );


/*  // Video
  $intro_content->add_field( array(
      'name'       => __( 'Video', 'cmb2' ),
      'id'         => $cmb_pre . 'video',
      'type'       => 'oembed',
      'default'    => 'https://www.youtube.com/watch?v=pXU_GY7hjPc',
  ) );
*/

}


?>