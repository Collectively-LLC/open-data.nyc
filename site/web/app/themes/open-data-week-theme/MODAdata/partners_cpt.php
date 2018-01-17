<?php

add_action( 'init', 'create_partners' );
function create_partners() {  global $cpt;
  $cpt['single'] = 'Partner';
  $cpt['plural'] = 'Partners';
  $cpt['slug']   = 'partners';

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
    'supports' => array( 'title','revisions','thumbnail' ),
    'has_archive' => false,
    'menu_icon'   => 'dashicons-star-filled',
  ));

  /*
  register_taxonomy(
    'exhibit_type',
    'exhibits-projects',
    array(
      'label' => __( 'Exhibit Type' ),
      'rewrite' => array( 'slug' => 'type' ),
      'hierarchical' => true,
    )
  );
  */

}


// META BOXES /////////////////////////////////////////////////////////////////////////////////////////////

add_action( 'cmb2_admin_init', 'partners_meta' );
function partners_meta() { global $cpt, $cmb_pre;
  $cpt['single'] = 'Partner';
  $cpt['plural'] = 'Partners';
  $cpt['slug']   = 'partners';

  $custom_meta = new_cmb2_box( array(
    'id'            => $cpt['slug'].'_meta',
    'title'         => __( $cpt['single'].' Details', 'cmb2' ),
    'object_types'  => array( $cpt['slug'] ), // Post type
    'context'       => 'normal',
    'priority'      => 'high',
    'show_names'    => true, // Show field names on the left
  ) );
  
// Website URL
  $custom_meta->add_field( array(
    'name'       => __( 'URL', 'cmb2' ),
    'id'         => $cmb_pre . 'url',
    'type'       => 'text',
  ) );
// Description
  $custom_meta->add_field( array(
    'name'       => __( 'Description', 'cmb2' ),
    'id'         => $cmb_pre . 'description',
    'type'       => 'textarea_small',
  ) );

}

?>