<?php

namespace PODIO_user_frontend_form;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use PODIO_user_frontend_form\Utils;

/**
 * Output our [podio_user_frontend_form_test] shortcode and process the ACF front-end form.
 */
class Shortcode {
	/**
	 * Our form ID, used internally to identify this specific ACF front-end form.
	 *
	 * @var string
	 */
	private $id;

	/**
	 * The post type this form should create.
	 *
	 * @var string
	 */
	private $post_type;

	/**
	 * List of ACF fields groups we want to display as steps.
	 * Each array item is an array of metaboxes IDs to display in a separate step.
	 *
	 * @var array
	 */
	private $metabox_ids;

	/**
	 * The constructor saves the necessary properties that we just described above.
	 */
	public function __construct() {
		$this->id          = 'podio-frontend-form';
		$this->post_type   = 'frontend_form';
		// $this->metabox_ids = ['group_5beab4a31f3ff', 'group_5beab4d56e9f5', 'group_5beab6515ba78', 'group_5beae8ce395d6' ];
		$this->hooks();
	}

	/**
	 * Register our hooks
	 *
	 * @return void
	 */
	public function hooks() {
		/**
		 * Register our [podio_user_frontend_form_test] shortcode.
		 */
		add_shortcode( 'podio_user_frontend_form_test', [ $this, 'output_shortcode' ] );
	}

	/**
	 * Output the shortcode content: if form is not finished, output the form.
	 * If user just filled the last form step, output a thanks message.
	 *
	 * @return string The content of our shortcode.
	 */
	public function output_shortcode($atts) {
		ob_start();

		$a = shortcode_atts( array(
			'render' => "",
		), $atts );
		
		$blockToRender = explode(',',$a['render']);
		$render = [];
		foreach($blockToRender as $block){
			array_push($render,$block);
		}


		print_r($render);

		if ( ! function_exists( 'acf_form' ) ) {
			return;
		}

		$this->output_acf_form( [
			'post_type' => $this->post_type,
		] , $render);

		return ob_get_clean();
	}

	/**
	 * Output the ACF front end form.
	 * Don't forget to add `acf_form_head()` in the header of your theme.
	 *
	 * @link https://www.advancedcustomfields.com/resources/acf_form/
	 * @param array $args
	 * @return void
	 */
	private function output_acf_form( $args = [], $render ) {
		// // Get the current step we are at in the form.
		// $requested_step    = $this->get_request_step();

		$args = wp_parse_args(
			$args,
			[
				'post_type'   => 'frontend_form',
				'post_status' => 'publish',
			]
		);

		/**
		 * Display the form with acf_form().
		 *
		 * The key here is to tell ACF which fields groups (metaboxes) we want to display,
		 * depending on the current form step we are at.
		 * This is done via the "field_groups" parameter below.
		 */
		acf_form(
			[
				'id' 				=> $this->id,
				'new_post'			=> [
					'post_type'		=> $args['post_type'],
					'post_status'	=> $args['post_status'],
				],
				'field_groups'      => $render,
			]
		);
	}
}
