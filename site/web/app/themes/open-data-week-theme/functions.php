<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php' // Theme customizer
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);



//////////////////////////////////////////////////////////////////////////////////////////////////////////
// CMB2 / META / CPTS ////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////

// CMB2 INIT
$cmb_pre = '_odw_'; function cmb_pre() { global $cmb_pre; return $cmb_pre; }

// DECLARE CPTS, META BOXES, SHORTCODES
$CMS = [

// Global
  /*Functions*/   'MODAdata/global_functions.php',   

// Intro
  /*Content*/   'MODAdata/intro_content.php',   

// About
  /*Content*/   'MODAdata/about_content.php',   

// Events
  /*CPT*/   'MODAdata/events_cpt.php',
  /*Taxonomies*/   'MODAdata/events_taxonomies.php',
  // Calendar 
    /*Shell*/   'MODAdata/calendar_template.php',
    /*Cards*/   'MODAdata/calendar_cards.php',
    /*Filters*/   'MODAdata/calendar_filters.php',
    // Modals
      /*Events*/  'MODAdata/calendar_modal_events.php',
      /*EBrite*/  'MODAdata/calendar_modal_eventbrite.php',

// Partners
  /*CPT*/   'MODAdata/partners_cpt.php',   
  /*Display*/   'MODAdata/partners_functions.php',

// News
  /*CPT*/   'MODAdata/news_cpt.php',
  /*Display*/   'MODAdata/news_functions.php',

// Sponsors
  /*CPT*/   'MODAdata/sponsors_cpt.php',

// Newsletter
  /*Form*/   'MODAdata/newsletter_form.php',

// Footer
  /*Content*/   'MODAdata/footer_content.php',

];

foreach ($CMS as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }
  require_once $filepath;
}
unset($file, $filepath);





// GET META /////////////////////////////////////////////////////////////////////////////////////////////
// Get Meta by Key
function _meta($key='',$prefix=true) {
  if($prefix) { $key = cmb_pre().$key; }
  return get_post_meta(get_the_ID(),$key,true); 
} 
// Rescope entire array to second level, as in get_post_meta
function array01($meta) { if(is_array($meta)) { foreach ($meta as &$v) { $v = array_shift($v); } return $meta; } else { return $meta; } }
// Get Post Meta as a rescoped array
function allmeta($postid) { if(!$postid){$postid=get_the_id();} return array01(get_post_meta($postid)); }





// Clean up wp-admin /////////////////////////////////////////////////////////////////////////////////////////////
function remove_menus_user(){ 
  remove_menu_page( 'edit.php' );                   //Posts
  remove_menu_page( 'edit.php?post_type=page' );    //Pages
  remove_menu_page( 'edit-comments.php' );          //Comments
}
add_action( 'admin_menu', 'remove_menus_user' ); 





// Get YouTube Video ID from YouTube URL /////////////////////////////////////////////////////////////////////////////////////////////
function getVideoId($url) {
  $parsedUrl = parse_url($url);
  if ($parsedUrl === false)
      return false;
  if (!empty($parsedUrl['query'])) {
    $query = array();
    parse_str($parsedUrl['query'], $query);
    if (!empty($query['v']))
        return $query['v'];
  }
  if (strtolower($parsedUrl['host']) == 'youtu.be')
    return trim($parsedUrl['path'], '/');
  if(strtolower($parsedUrl['host']) == 'vimeo.com')
    return trim($parsedUrl['path'], '/');
  return false;
  }

// Clean up YouTube oEmbeds
  function iweb_modest_youtube_player( $html, $url, $args ) {
   return str_replace( '?feature=oembed', '?feature=oembed&enablejsapi=1&showinfo=0&rel=0', $html );
  }
  add_filter( 'oembed_result', 'iweb_modest_youtube_player', 10, 3 );





// Predefine Taxonomies /////////////////////////////////////////////////////////////////////////////////////////////
function pretax($predefined_taxonomy,$predefined_terms) {
  $all_terms_inside_tax = get_terms( 
       $predefined_taxonomy
      ,array(
        'hide_empty'   => false
        ,'taxonomy'     => $predefined_taxonomy
      ) 
  );
  foreach ($predefined_terms as $term) {
    wp_insert_term($term, $predefined_taxonomy, array(
        'slug' => strtolower(str_replace(' ','-',str_replace(',','',$term))),
    ));
  }
  foreach ( $all_terms_inside_tax as $term ) {
    if ( ! in_array( $term->name, $predefined_terms ) )
      wp_delete_term( $term->term_id, $predefined_taxonomy );
  }
}