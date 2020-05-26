<?php
/**
 * Plugin Name:       PodiumIO ACF content gathering form
 * Description:       Front end form to gather content from user
 * Version:           1.0.0
 * Author:            Orphic
 * Author URI:        https://orphic.ca
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       podio
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die();
}

/**
 * Define global constants.
 *
 * @since 1.0.0
 */
// Plugin version.
if ( ! defined( 'PODIO_FORM_VERSION' ) ) {
	define( 'PODIO_FORM_VERSION', '1.0.0' );
}

if ( ! defined( 'PODIO_FORM_NAME' ) ) {
	define( 'PODIO_FORM_NAME', trim( dirname( plugin_basename( __FILE__ ) ), '/' ) );
}

if ( ! defined( 'PODIO_FORM_DIR' ) ) {
	define( 'PODIO_FORM_DIR', WP_PLUGIN_DIR . '/' . PODIO_FORM_NAME );
}

if ( ! defined( 'PODIO_FORM_URL' ) ) {
	define( 'PODIO_FORM_URL', WP_PLUGIN_URL . '/' . PODIO_FORM_NAME );
}

/**
 * Include obligatory files.
 */
 add_action( 'init', 'register_form_post_type' );
 function register_form_post_type() {
    $labels = array(
        'name' => _x( 'Frontend Form', 'Post type general name', 'podio' ),
    );

    $args = array(
        'show_ui' => true,
        'public' => true,
        'labels' => $labels,
				'show_in_rest' => true,
        'supports' => array('title','editor'),
        'has_archive' => false
    );

    register_post_type('frontend_form', $args);
}

/*
 * Set Page templates for CPT "help_lessions"
 */
add_filter( 'template_include', 'my_plugin_templates' );
function my_plugin_templates( $template ) {
    $post_types = array( 'frontend_form' );
    if ( is_post_type_archive( $post_types ) && file_exists( plugin_dir_path(__FILE__) . 'templates/archive_help_lessions.php' ) ){
        $template = plugin_dir_path(__FILE__) . 'templates/archive_help_lessions.php';
    }

    if ( is_singular( 'frontend_form' ) && file_exists( plugin_dir_path(__FILE__) . 'templates/single_frontend_form.php' ) ){
			  $template = plugin_dir_path(__FILE__) . 'templates/single_frontend_form.php';
    }

    return $template;
}

/**
 * Include obligatory files.
 */
require_once PODIO_FORM_DIR . '/src/class-utils.php';
require_once PODIO_FORM_DIR . '/src/class-shortcode.php';

/**
 * Fire the darn thing!
 */
new PODIO_user_frontend_form\Shortcode();
