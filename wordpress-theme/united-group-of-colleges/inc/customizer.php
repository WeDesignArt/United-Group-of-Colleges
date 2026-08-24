<?php
/**
 * Site-wide header/footer settings, via the native WordPress Customizer.
 *
 * ACF Options Pages (acf_add_options_page) require ACF PRO, same as
 * Repeater — so on free ACF there's no "Theme Settings" admin menu item.
 * The Customizer is built into WordPress core regardless of which ACF
 * tier is active, so everything that would have lived on an options page
 * lives here instead: Appearance → Customize → "Theme Settings".
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function ugc_customize_register( $wp_customize ) {

	$wp_customize->add_panel( 'ugc_theme_settings', array(
		'title'    => 'Theme Settings',
		'priority' => 30,
	) );

	// ---- Header ----
	$wp_customize->add_section( 'ugc_header_settings', array(
		'title' => 'Header',
		'panel' => 'ugc_theme_settings',
	) );

	$wp_customize->add_setting( 'header_logo', array( 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_logo', array(
		'label'   => 'Header Logo',
		'section' => 'ugc_header_settings',
	) ) );

	$wp_customize->add_setting( 'partner_button_text', array( 'default' => 'Partners with us', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'partner_button_text', array(
		'label'   => 'Partner Button Text',
		'section' => 'ugc_header_settings',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'partner_button_url', array( 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'partner_button_url', array(
		'label'   => 'Partner Button Link',
		'section' => 'ugc_header_settings',
		'type'    => 'url',
	) );

	// ---- Footer ----
	$wp_customize->add_section( 'ugc_footer_settings', array(
		'title' => 'Footer',
		'panel' => 'ugc_theme_settings',
	) );

	$wp_customize->add_setting( 'footer_logo', array( 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_logo', array(
		'label'   => 'Footer Logo',
		'section' => 'ugc_footer_settings',
	) ) );

	$wp_customize->add_setting( 'footer_description', array( 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'footer_description', array(
		'label'   => 'Footer Description',
		'section' => 'ugc_footer_settings',
		'type'    => 'textarea',
	) );

	$wp_customize->add_setting( 'footer_whatsapp', array( 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'footer_whatsapp', array(
		'label'       => 'Footer WhatsApp Number',
		'description' => 'Digits only with country code, e.g. 923009759999 (used to build the wa.me link).',
		'section'     => 'ugc_footer_settings',
		'type'        => 'text',
	) );

	$wp_customize->add_setting( 'footer_email', array( 'sanitize_callback' => 'sanitize_email' ) );
	$wp_customize->add_control( 'footer_email', array(
		'label'   => 'Footer Email',
		'section' => 'ugc_footer_settings',
		'type'    => 'email',
	) );

	$wp_customize->add_setting( 'footer_office_address', array( 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'footer_office_address', array(
		'label'   => 'Head Office Address',
		'section' => 'ugc_footer_settings',
		'type'    => 'text',
	) );

	$social = array(
		'footer_facebook_url'  => 'Facebook URL',
		'footer_instagram_url' => 'Instagram URL',
		'footer_youtube_url'   => 'YouTube URL',
		'footer_linkedin_url'  => 'LinkedIn URL',
	);
	foreach ( $social as $setting_id => $label ) {
		$wp_customize->add_setting( $setting_id, array( 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control( $setting_id, array(
			'label'   => $label,
			'section' => 'ugc_footer_settings',
			'type'    => 'url',
		) );
	}

	$wp_customize->add_setting( 'footer_copyright_text', array(
		'default'           => 'Copyright &copy; ' . date( 'Y' ) . ' United Group of Colleges. Powered by United Group of Colleges.',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'footer_copyright_text', array(
		'label'   => 'Copyright Text',
		'section' => 'ugc_footer_settings',
		'type'    => 'text',
	) );

	// ---- Forms (Request Information page) ----
	$wp_customize->add_section( 'ugc_forms_settings', array(
		'title'       => 'Forms',
		'panel'       => 'ugc_theme_settings',
		'description' => 'Get your own keys at google.com/recaptcha/admin. Leave both blank to accept submissions without reCAPTCHA (fine for local testing — add real keys before going live).',
	) );

	$wp_customize->add_setting( 'recaptcha_site_key', array( 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'recaptcha_site_key', array(
		'label'   => 'reCAPTCHA Site Key',
		'section' => 'ugc_forms_settings',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'recaptcha_secret_key', array( 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'recaptcha_secret_key', array(
		'label'   => 'reCAPTCHA Secret Key',
		'section' => 'ugc_forms_settings',
		'type'    => 'text',
	) );
}
add_action( 'customize_register', 'ugc_customize_register' );
