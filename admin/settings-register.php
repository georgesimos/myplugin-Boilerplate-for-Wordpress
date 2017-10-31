<?php // MyPlugin - Register Settings

// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

// register plugin settings
function myplugin_register_settings() {

	/*

	register_setting(
		string   $option_group,
		string   $option_name,
		callable $sanitize_callback
	);

	*/

	register_setting(
		'myplugin_options',
		'myplugin_options',
		'myplugin_callback_validate_options'
	);

	/*

add_settings_section(
	string   $id,
	string   $title,
	callable $callback,
	string   $page
);

*/

add_settings_section(
	'myplugin_section_login',
	esc_html__( 'Customize Login Page', 'myplugin' ),
	'myplugin_callback_section_login',
	'myplugin'
);

add_settings_section(
	'myplugin_section_admin',
	esc_html__( 'Customize Admin Area', 'myplugin' ),
	'myplugin_callback_section_admin',
	'myplugin'
);

/*

add_settings_field(
		string   $id,
	string   $title,
	callable $callback,
	string   $page,
	string   $section = 'default',
	array    $args = []
);

*/

add_settings_field(
	'custom_url',
	esc_html__( 'Custom URL', 'myplugin' ),
	'myplugin_callback_field_text',
	'myplugin',
	'myplugin_section_login',
	[ 'id' => 'custom_url', 'label' => 'Custom URL for the login logo link' ]
);

add_settings_field(
	'custom_title',
	esc_html__( 'Custom Title', 'myplugin' ),
	'myplugin_callback_field_text',
	'myplugin',
	'myplugin_section_login',
	[ 'id' => 'custom_title', 'label' => 'Custom title attribute for the logo link' ]
);

add_settings_field(
	'custom_style',
	esc_html__( 'Custom Style', 'myplugin' ),
	'myplugin_callback_field_radio',
	'myplugin',
	'myplugin_section_login',
	[ 'id' => 'custom_style', 'label' => 'Custom CSS for the Login screen' ]
);

add_settings_field(
	'custom_message',
	esc_html__( 'Custom Message', 'myplugin' ),
	'myplugin_callback_field_textarea',
	'myplugin',
	'myplugin_section_login',
	[ 'id' => 'custom_message', 'label' => 'Custom text and/or markup' ]
);

add_settings_field(
	'custom_footer',
	esc_html__( 'Custom Footer', 'myplugin' ),
	'myplugin_callback_field_text',
	'myplugin',
	'myplugin_section_admin',
	[ 'id' => 'custom_footer', 'label' => 'Custom footer text' ]
);

add_settings_field(
	'custom_toolbar',
	esc_html__( 'Custom Toolbar', 'myplugin' ),
	'myplugin_callback_field_checkbox',
	'myplugin',
	'myplugin_section_admin',
	[ 'id' => 'custom_toolbar', 'label' => 'Remove new post and comment links from the Toolbar' ]
);

add_settings_field(
	'custom_scheme',
	esc_html__( 'Custom Scheme', 'myplugin' ),
	'myplugin_callback_field_select',
	'myplugin',
	'myplugin_section_admin',
	[ 'id' => 'custom_scheme', 'label' => 'Default color scheme for new users' ]
);





}
add_action( 'admin_init', 'myplugin_register_settings' );
