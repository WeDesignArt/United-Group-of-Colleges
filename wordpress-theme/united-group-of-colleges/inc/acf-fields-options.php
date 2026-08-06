<?php
/**
 * Theme Settings options page: everything in the header and footer that
 * isn't a nav menu (logo, partner button, footer content, social links).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page( array(
		'page_title' => 'Theme Settings',
		'menu_title' => 'Theme Settings',
		'menu_slug'  => 'theme-settings',
		'capability' => 'edit_theme_options',
		'icon_url'   => 'dashicons-admin-generic',
		'position'   => 61,
	) );
}

if ( function_exists( 'acf_add_local_field_group' ) ) {
	acf_add_local_field_group( array(
		'key'      => 'group_theme_settings',
		'title'    => 'Theme Settings',
		'fields'   => array(
			array(
				'key'   => 'field_ts_tab_header',
				'label' => 'Header',
				'type'  => 'tab',
			),
			array(
				'key'   => 'field_ts_header_logo',
				'label' => 'Header Logo',
				'name'  => 'header_logo',
				'type'  => 'image',
				'return_format' => 'array',
				'preview_size'  => 'medium',
			),
			array(
				'key'   => 'field_ts_partner_text',
				'label' => 'Partner Button Text',
				'name'  => 'partner_button_text',
				'type'  => 'text',
				'default_value' => 'Partners with us',
			),
			array(
				'key'   => 'field_ts_partner_url',
				'label' => 'Partner Button Link',
				'name'  => 'partner_button_url',
				'type'  => 'url',
			),
			array(
				'key'   => 'field_ts_tab_footer',
				'label' => 'Footer',
				'type'  => 'tab',
			),
			array(
				'key'   => 'field_ts_footer_logo',
				'label' => 'Footer Logo',
				'name'  => 'footer_logo',
				'type'  => 'image',
				'return_format' => 'array',
				'preview_size'  => 'medium',
			),
			array(
				'key'   => 'field_ts_footer_desc',
				'label' => 'Footer Description',
				'name'  => 'footer_description',
				'type'  => 'textarea',
				'rows'  => 3,
			),
			array(
				'key'   => 'field_ts_footer_email',
				'label' => 'Footer Email',
				'name'  => 'footer_email',
				'type'  => 'email',
			),
			array(
				'key'   => 'field_ts_footer_facebook',
				'label' => 'Facebook URL',
				'name'  => 'footer_facebook_url',
				'type'  => 'url',
			),
			array(
				'key'   => 'field_ts_footer_instagram',
				'label' => 'Instagram URL',
				'name'  => 'footer_instagram_url',
				'type'  => 'url',
			),
			array(
				'key'   => 'field_ts_footer_youtube',
				'label' => 'YouTube URL',
				'name'  => 'footer_youtube_url',
				'type'  => 'url',
			),
			array(
				'key'   => 'field_ts_footer_linkedin',
				'label' => 'LinkedIn URL',
				'name'  => 'footer_linkedin_url',
				'type'  => 'url',
			),
			array(
				'key'   => 'field_ts_footer_copyright',
				'label' => 'Copyright Text',
				'name'  => 'footer_copyright_text',
				'type'  => 'text',
				'default_value' => 'Copyright © 2026 United Group of Colleges. Powered by United Group of Colleges.',
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'options_page',
					'operator' => '==',
					'value'    => 'theme-settings',
				),
			),
		),
	) );
}
