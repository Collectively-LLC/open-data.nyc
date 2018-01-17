<?php

  // Type Taxonomy /////////////////////////////////////////////////////////////////////////////////////////////
  register_taxonomy(
    'event_type',
    'events',
    array(
      'label' => __( 'Event Type' ),
      'rewrite' => array( 'slug' => 'event_type' ),
      'hierarchical' => true,
      'capabilities'      => array(
        'assign_terms' => 'manage_options',
        'edit_terms'   => 'god',
        'manage_terms' => 'god',
      ),      
    )
  );
    // Predefine Categories
    $predefined_terms = array(
       'Speaker'
      ,'Panel'
      ,'Workshop'
    );
    $predefined_taxonomy = 'event_type';
    pretax($predefined_taxonomy,$predefined_terms);


  // Borough Taxonomy /////////////////////////////////////////////////////////////////////////////////////////////
  register_taxonomy(
    'borough',
    'events',
    array(
      'label' => __( 'Borough' ),
      'rewrite' => array( 'slug' => 'borough' ),
      'hierarchical' => true,
      'capabilities'      => array(
        'assign_terms' => 'manage_options',
        'edit_terms'   => 'god',
        'manage_terms' => 'god',
      ),      
    )
  );
    // Predefine Categories
    $predefined_terms = array(
      'Brooklyn'
      ,'Bronx'
      ,'Manhattan'
      ,'Queens'
      ,'Staten Island'
    );
    $predefined_taxonomy = 'borough';
    pretax($predefined_taxonomy,$predefined_terms);


  // Cost Category Taxonomy /////////////////////////////////////////////////////////////////////////////////////////////
  register_taxonomy(
    'cost',
    'events',
    array(
      'label' => __( 'Cost Category' ),
      'rewrite' => array( 'slug' => 'cost' ),
      'hierarchical' => true,
      'capabilities'      => array(
        'assign_terms' => 'manage_options',
        'edit_terms'   => 'god',
        'manage_terms' => 'god',
      ),      
    )
  );
    // Predefine Categories
    $predefined_terms = array(
       'Free'
      ,'Paid'
      ,'Paid by Subsidy'
    );
    $predefined_taxonomy = 'cost';
    pretax($predefined_taxonomy,$predefined_terms);
