<?php

add_action( 'init', 'create_events' );
function create_events() {  global $cpt;
  $cpt['single'] = 'Event';
  $cpt['plural'] = 'Events';
  $cpt['slug']   = 'events';

  register_post_type( $cpt['slug'], array(
    'labels' => array(
      'name' => $cpt['plural'],
      'singular_name' => $cpt['single'],
      'add_new' => 'Add '.$cpt['single'],
      'add_new_item' => 'Add New '.$cpt['plural'],
      'edit' => 'Edit',
      'edit_item' => 'Edit '.$cpt['single'],
      'new_item' => 'New '.$cpt['single'],
      'view' => 'View',
      'view_item' => 'View '.$cpt['single'],
      'search_items' => 'Search '.$cpt['plural'],
      'not_found' => 'No '.$cpt['plural'].' found',
      'not_found_in_trash' => 'No '.$cpt['plural'].' found in Trash',
      'parent' => 'Parent '.$cpt['single']
    ),
    'public' => true,
    'supports' => array( 'title','revisions' ),
    'has_archive' => false,
    'menu_icon'   => 'dashicons-calendar',
  ));

}


// META BOXES /////////////////////////////////////////////////////////////////////////////////////////////

add_action( 'cmb2_admin_init', 'events_meta' );
function events_meta() { global $cpt, $cmb_pre;
  $cpt['single'] = 'Event';
  $cpt['plural'] = 'Events';
  $cpt['slug']   = 'events';

  $custom_meta = new_cmb2_box( array(
    'id'            => $cpt['slug'].'_meta',
    'title'         => __( $cpt['single'].' Details', 'cmb2' ),
    'object_types'  => array( $cpt['slug'] ), // Post type
    'context'       => 'normal',
    'priority'      => 'high',
    'show_names'    => true, // Show field names on the left
  ) );



// Timeslot
  $custom_meta->add_field( array(
    'name' => 'Start Time',
    'id'   => $cmb_pre.'time_start',
    'type' => 'text_time',
    'time_format' => 'g:i a',
  ) );
  $custom_meta->add_field( array(
    'name' => 'End Time',
    'id'   => $cmb_pre.'time_end',
    'type' => 'text_time',
    'time_format' => 'g:i a',
  ) );

// Summary
  $custom_meta->add_field( array(
    'name' => 'Event Summary',
    'id'   => $cmb_pre.'summary',
    'type' => 'textarea',
  ) );


  
// Partner Organization
  $custom_meta->add_field( array(
    'name'    => __( 'Hosting Partner', 'cmb2' ),
    'desc'    => __( 'Drag from the left column to the right column.<br />You may rearrange the order in the right column by dragging and dropping.', 'cmb2' ),
    'id'      => $cmb_pre.'attached_partners',
    'type'    => 'custom_attached_posts',
    'options' => array(
      'filter_boxes'    => true, // Show a text box for filtering the results
      'query_args'      => array(
        'posts_per_page' => 9999,
        'post_type'      => 'partners',
        'orderby' => 'title',
        'order'   => 'ASC',
      ), // override the get_posts args
    ),
  ) );

 
  // Display Eventbrite Data via API
  $eventbrite = new_cmb2_box( array(
    'id'            => 'eventbrite_meta',
    'title'         => __( 'Eventbrite Details', 'cmb2' ),
    'object_types'  => array( $cpt['slug'] ), // Post type
    'context'       => 'normal',
    'priority'      => 'high',
    'show_names'    => true, // Show field names on the left
  ) );
  
  // Eventbrite ID
  $eventbrite->add_field( array(
    'name'       => __( 'Eventbrite ID', 'cmb2' ),
    'id'         => $cmb_pre . 'eventbrite_id',
    'type'       => 'text',
  ) );
  // Eventbrite Info
  $eventbrite->add_field( array(
    'id'         => 'eventbrite_date',
    'type'       => 'title',
    'description'=> 'Eventbrite Info'
  ) );


}



// WP Admin Style Fixes
add_filter('admin_head', 'adminCSS');
function adminCSS(){ ?><style type='text/css'>
  .post-type-events .category-tabs { display: none; }
  .post-type-events .cmb-type-custom-attached-posts .connected { height: 120px; }
</style><?php }


?>