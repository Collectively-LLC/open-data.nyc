<?php

add_action( 'init', 'create_news' );
function create_news() {  global $cpt;
  $cpt['single'] = 'Article';
  $cpt['plural'] = 'Open Data News';
  $cpt['slug']   = 'news';

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
    'menu_icon'   => 'dashicons-megaphone',
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

add_action( 'cmb2_admin_init', 'news_meta' );
function news_meta() { global $cpt, $cmb_pre;
  $cpt['single'] = 'Article';
  $cpt['plural'] = 'Open Data News';
  $cpt['slug']   = 'news';

  $custom_meta = new_cmb2_box( array(
    'id'            => $cpt['slug'].'_meta',
    'title'         => __( $cpt['single'].' Details', 'cmb2' ),
    'object_types'  => array( $cpt['slug'] ), // Post type
    'context'       => 'normal',
    'priority'      => 'high',
    'show_names'    => true, // Show field names on the left
  ) );
  
// Article URL
  $custom_meta->add_field( array(
    'name'       => __( 'URL', 'cmb2' ),
    'id'         => $cmb_pre . 'url',
    'type'       => 'text_url',
  ) );
// Button Text
  $custom_meta->add_field( array(
    'name'       => __( 'Button Text', 'cmb2' ),
    'id'         => $cmb_pre . 'button',
    'type'       => 'text',
    'default'       => 'Read On',
  ) );
// Summary
  $custom_meta->add_field( array(
    'name'       => __( 'Summary', 'cmb2' ),
    'id'         => $cmb_pre . 'summary',
    'type'       => 'textarea_small',
  ) );

}

?>