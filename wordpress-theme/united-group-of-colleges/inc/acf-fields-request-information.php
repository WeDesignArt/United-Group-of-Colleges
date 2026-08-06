<?php
/**
 * ACF field group for the Request Information page template.
 *
 * The application form itself (name/phone/email/city/etc. inputs) is left
 * as static HTML in the template — those are functional form fields, not
 * editorial content, and are the natural place to wire in a form plugin
 * or custom handler later. Everything around the form is ACF-driven.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

acf_add_local_field_group( array(
	'key'    => 'group_request_info',
	'title'  => 'Request Information Page Content',
	'fields' => array(

		// ---- Hero ----
		array( 'key' => 'field_reqinfo_tab_hero', 'label' => 'Hero', 'type' => 'tab' ),
		array( 'key' => 'field_reqinfo_hero_image', 'label' => 'Hero Image', 'name' => 'hero_image', 'type' => 'image', 'return_format' => 'array' ),
		array( 'key' => 'field_reqinfo_hero_title', 'label' => 'Hero Title', 'name' => 'hero_title', 'type' => 'text', 'default_value' => 'Request Information' ),

		// ---- Intro ----
		array( 'key' => 'field_reqinfo_tab_intro', 'label' => 'Intro', 'type' => 'tab' ),
		array( 'key' => 'field_reqinfo_intro_image', 'label' => 'Image', 'name' => 'intro_image', 'type' => 'image', 'return_format' => 'array' ),
		array(
			'key' => 'field_reqinfo_intro_heading', 'label' => 'Heading', 'name' => 'intro_heading', 'type' => 'text',
			'instructions'  => 'Wrap the highlighted words in &lt;span class="text_accent"&gt;...&lt;/span&gt;.',
			'default_value' => 'Let&rsquo;s Talk About Your <span class="text_accent">UGC Campus</span>',
		),
		array( 'key' => 'field_reqinfo_intro_text', 'label' => 'Text', 'name' => 'intro_text', 'type' => 'textarea', 'rows' => 4 ),

		// ---- Application form heading ----
		array( 'key' => 'field_reqinfo_tab_form', 'label' => 'Application Form', 'type' => 'tab' ),
		array( 'key' => 'field_reqinfo_form_title', 'label' => 'Form Section Title', 'name' => 'form_title', 'type' => 'text', 'default_value' => 'Franchise Application Form' ),
		array( 'key' => 'field_reqinfo_form_submit_text', 'label' => 'Submit Button Text', 'name' => 'form_submit_text', 'type' => 'text', 'default_value' => 'Request Franchise Information' ),
		array(
			'key'          => 'field_reqinfo_form_note',
			'label'        => 'Note',
			'name'         => 'field_reqinfo_form_note_msg',
			'type'         => 'message',
			'message'      => 'The form fields themselves (name, phone, email, city, campus model, etc.) are fixed in the template — this page only controls the heading and submit button text around it.',
		),

		// ---- What happens next ----
		array( 'key' => 'field_reqinfo_tab_next', 'label' => 'What Happens Next', 'type' => 'tab' ),
		array( 'key' => 'field_reqinfo_next_title', 'label' => 'Column Title', 'name' => 'next_steps_title', 'type' => 'text', 'default_value' => 'What Happens Next' ),
		array(
			'key'          => 'field_reqinfo_next_steps',
			'label'        => 'Steps',
			'name'         => 'next_steps',
			'type'         => 'repeater',
			'layout'       => 'block',
			'button_label' => 'Add Step',
			'sub_fields'   => array(
				array( 'key' => 'field_reqinfo_next_step_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text' ),
				array( 'key' => 'field_reqinfo_next_step_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
			),
		),

		// ---- Direct contact channels ----
		array( 'key' => 'field_reqinfo_tab_contact', 'label' => 'Direct Contact Channels', 'type' => 'tab' ),
		array( 'key' => 'field_reqinfo_contact_image', 'label' => 'Section Image', 'name' => 'contact_image', 'type' => 'image', 'return_format' => 'array' ),
		array( 'key' => 'field_reqinfo_contact_title', 'label' => 'Column Title', 'name' => 'contact_title', 'type' => 'text', 'default_value' => 'Direct Contact Channels' ),
		array( 'key' => 'field_reqinfo_contact_phone', 'label' => 'Phone / WhatsApp', 'name' => 'contact_phone', 'type' => 'text' ),
		array( 'key' => 'field_reqinfo_contact_email', 'label' => 'Email', 'name' => 'contact_email', 'type' => 'email' ),
		array( 'key' => 'field_reqinfo_contact_address', 'label' => 'Head Office Address', 'name' => 'contact_address', 'type' => 'textarea', 'rows' => 2 ),
		array( 'key' => 'field_reqinfo_contact_facebook', 'label' => 'Facebook URL', 'name' => 'contact_facebook_url', 'type' => 'url' ),
		array( 'key' => 'field_reqinfo_contact_instagram', 'label' => 'Instagram URL', 'name' => 'contact_instagram_url', 'type' => 'url' ),
	),
	'location' => array(
		array(
			array(
				'param'    => 'page_template',
				'operator' => '==',
				'value'    => 'page-templates/template-request-information.php',
			),
		),
	),
) );
