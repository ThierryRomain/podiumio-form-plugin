<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function podiumio_front_end_form_plugin_block_categories( $categories, $post ) {
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'admin-blocks',
                'title' => __( 'Admin blocks', '_os' ),
            ),
        )
    );
}
add_filter( 'block_categories', 'podiumio_front_end_form_plugin_block_categories', 10, 2 );


function register_front_end_form_plugin_acf_block_types() {

    // Form section
    acf_register_block_type(array(
      'name'              => 'os-form-section',
      'title'             => __('Front end form section'),
      'description'       => __('Displays an accordion style front end form section'),
      'render_template'   =>  PODIO_FORM_DIR . '/templates/blocks/form-section/form-section.php',
      'category'          => 'admin-blocks',
      'icon'              => 'list-view',
      'keywords'          => array( 'map', 'block' ),
      'mode' => 'edit',
      'enqueue_style' =>   PODIO_RELATIVE_PLUGIN_DIR  . '/' . PODIO_FORM_NAME . '/templates/blocks/form-section/form-section.css',
  ));

}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_front_end_form_plugin_acf_block_types');
}
