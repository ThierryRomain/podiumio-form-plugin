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

if ( ! defined('PODIO_RELATIVE_PLUGIN_DIR')){
	define( 'PODIO_RELATIVE_PLUGIN_DIR', str_replace( get_option( 'siteurl' ) , "" , WP_PLUGIN_URL ) );
}

add_action( 'wp_enqueue_scripts', 'enqueue_my_frontend_script' );
function enqueue_my_frontend_script() {
	wp_enqueue_script( 'frontend-form-js', PODIO_RELATIVE_PLUGIN_DIR  . '/' . PODIO_FORM_NAME . '/src/js/frontend-form.js', array('jquery'), '1.0' );
    $variables = array(
        'ajaxurl' => admin_url( 'admin-ajax.php' )
    );
    wp_localize_script('frontend-form-js', "jsObj", $variables);
}

add_action('wp_ajax_frontend_form_filled_submission', 'frontend_form_filled_submission_callback');
add_action('wp_ajax_nopriv_frontend_form_filled_submission', 'frontend_form_filled_submission_callback');
function frontend_form_filled_submission_callback(){
    $html = $_POST['comments'];
    $headers = array('Content-Type: text/html; charset=UTF-8');
    $mail_success = wp_mail("thierryr@orphic.ca", "Front end content form filled for " . get_site_url(), $html, $headers);

	if($mail_success){
		echo "Email was sent successfully. We will get back to you when your website is live.";
	}else{
		echo "An error occured while sending your email. Please contact us through other channels to let us know that your website is ready to go live. Sorry for the inconvenience.";
	}
	wp_die();
}

add_filter( 'private_title_format', 'myprefix_private_title_format' );
add_filter( 'protected_title_format', 'myprefix_private_title_format' );
function myprefix_private_title_format( $format ) {
    return '%s';
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
require_once PODIO_FORM_DIR . '/src/block-register.php';
require_once PODIO_FORM_DIR . '/src/class-utils.php';
require_once PODIO_FORM_DIR . '/src/class-shortcode.php';
require_once PODIO_FORM_DIR . '/src/send-email-shortcode.php';

/**
 * Fire the darn thing!
 */
new PODIO_user_frontend_form\Shortcode();
