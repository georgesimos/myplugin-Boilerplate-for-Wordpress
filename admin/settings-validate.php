<?php // MyPlugin - Validate Settings

// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

// validate plugin settings
// callback: validate options
function myplugin_callback_validate_options( $input ) {

	// custom url
	if ( isset( $input['custom_url'] ) ) {

		$input['custom_url'] = esc_url( $input['custom_url'] );

	}

	// custom title
	if ( isset( $input['custom_title'] ) ) {

		$input['custom_title'] = sanitize_text_field( $input['custom_title'] );

	}

	// custom style
	$radio_options = array(

		'enable'  => esc_html__( 'Enable custom styles', 'myplugin' ),
		'disable' => esc_html__( 'Disable custom styles', 'myplugin' )

	);

	if ( ! isset( $input['custom_style'] ) ) {

		$input['custom_style'] = null;

	}
	if ( ! array_key_exists( $input['custom_style'], $radio_options ) ) {

		$input['custom_style'] = null;

	}

	// custom message
	if ( isset( $input['custom_message'] ) ) {

		$input['custom_message'] = wp_kses_post( $input['custom_message'] );

	}

	// custom footer
	if ( isset( $input['custom_footer'] ) ) {

		$input['custom_footer'] = sanitize_text_field( $input['custom_footer'] );

	}

	// custom toolbar
	if ( ! isset( $input['custom_toolbar'] ) ) {

		$input['custom_toolbar'] = null;

	}

	$input['custom_toolbar'] = ($input['custom_toolbar'] == 1 ? 1 : 0);

	// custom scheme
	$select_options = array(

		'default'   => esc_html__( 'Default', 'myplugin' ),
		'light'     => esc_html__( 'Light', 'myplugin' ),
		'blue'      => esc_html__( 'Blue', 'myplugin' ),
		'coffee'    => esc_html__( 'Coffee', 'myplugin' ),
		'ectoplasm' => esc_html__( 'Ectoplasm', 'myplugin' ),
		'midnight'  => esc_html__( 'Midnight', 'myplugin' ),
		'ocean'     => esc_html__( 'Ocean', 'myplugin' ),
		'sunrise'   => esc_html__( 'Sunrise', 'myplugin' ),

	);

	if ( ! isset( $input['custom_scheme'] ) ) {

		$input['custom_scheme'] = null;

	}

	if ( ! array_key_exists( $input['custom_scheme'], $select_options ) ) {

		$input['custom_scheme'] = null;

	}

	return $input;

}
