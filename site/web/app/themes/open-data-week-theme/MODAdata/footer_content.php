<?php

add_action( 'cmb2_admin_init', 'footer_metaboxes' );
function footer_metaboxes() { global $cmb_pre;

  $footer_content = new_cmb2_box( array(
    'id'            => 'footer_details',
    'title'         => __( 'Footer Content', 'cmb2' ),
    'menu_title'   => esc_html__( 'Footer Content', 'cmb2' ),
    'object_types' => array( 'options-page' ),
    'option_key'   => 'footer_details', // The option key and admin menu page slug.
    'context'       => 'normal',
    'priority'      => 'high',
    'show_names'    => true, // Show field names on the left
    // 'parent_slug'  => 'themes.php',
  ) );
  
  $footer_content->add_field( array(
      'name'       => __( 'Legal', 'cmb2' ),
      'id'         => $cmb_pre . 'legal',
      'type'       => 'wysiwyg',
      'default'    => '<p>City of New York. 2017 All Rights Reserved. NYC is a trademark and servicemark of the City of New York.</p>
<p><a href="#">Privacy Policy</a> |  <a href="#">Terms of Use</a> | <a href="#">Contact Us</a> | <a href="#">Designed by Collectively</a></p>
',
      'desc'       => '<style>.cmb2-id--odw-legal iframe { height: 160px !important; }</style>'
  ) );

  $footer_content->add_field( array(
      'name'       => __( 'Shoutout', 'cmb2' ),
      'id'         => $cmb_pre . 'shoutout',
      'type'       => 'wysiwyg',
      'default'    => '<p>Thank you to BetaNYC for their support in providing resources for the Open Data Week Website</p>',
      'desc'       => '<style>.cmb2-id--odw-shoutout iframe { height: 160px !important; }</style>'
  ) );

}


?>