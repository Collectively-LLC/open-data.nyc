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


  if(array_key_exists('post', $_GET)) { $eventid = $_GET['post']; }
  elseif(array_key_exists('post_ID', $_POST)) { $eventid = $_POST['post_ID']; }
  if (isset($eventid)) { $allmeta = allmeta($eventid); } else { $allmeta = array(); }
  


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
    'type' => 'wysiwyg',
  ) );

// Street Address
    if(array_key_exists(cmb_pre().'address', $allmeta)) { $address = ''; } else { $address = ''; }
  $custom_meta->add_field( array(
    'name' => 'Street Address',
    'id'   => $cmb_pre.'address',
    'type' => 'text',
    'description' => 'Valid formats: <br />
        - <em>street address</em> (<em>1 World Trade Center, New York, NY)<br />
        - <em>name and city</em> (<em>Tower One Experience, New York, NY</em>)<br />
        A map will display below after save so you can confirm your venue\'s location.<br />
    <img src="http://maps.googleapis.com/maps/api/staticmap?center='.$address.'&zoom=16&size=380x240&maptype=roadmap&markers=color:blue%7Clabel:%7C'.$address.'&sensor=false" />'
  ) );


// Register URL
  $custom_meta->add_field( array(
    'name' => 'Register URL',
    'id'   => $cmb_pre.'register',
    'type' => 'text_url',
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

 
}



// WP Admin Style Fixes
add_filter('admin_head', 'adminCSS');
function adminCSS(){ ?><style type='text/css'>
  .post-type-events .category-tabs { display: none; }
  .post-type-events .cmb-type-custom-attached-posts .connected { height: 120px; }
</style><?php }


?>