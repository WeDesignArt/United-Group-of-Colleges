<?php
/**
 * ACF field group for the FAQ page template.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

acf_add_local_field_group( array(
	'key'    => 'group_faq',
	'title'  => 'FAQ Page Content',
	'fields' => array(

		array( 'key' => 'field_faq_tab_hero', 'label' => 'Hero', 'type' => 'tab' ),
		array( 'key' => 'field_faq_hero_image', 'label' => 'Hero Image', 'name' => 'hero_image', 'type' => 'image', 'return_format' => 'array' ),
		array( 'key' => 'field_faq_hero_title', 'label' => 'Hero Title', 'name' => 'hero_title', 'type' => 'text', 'default_value' => 'Frequently Asked Questions' ),

		array( 'key' => 'field_faq_tab_items', 'label' => 'Questions', 'type' => 'tab' ),
		array(
			'key'          => 'field_faq_items',
			'label'        => 'FAQ Items',
			'name'         => 'faq_items',
			'type'         => 'repeater',
			'layout'       => 'block',
			'button_label' => 'Add Question',
			'sub_fields'   => array(
				array( 'key' => 'field_faq_item_question', 'label' => 'Question', 'name' => 'question', 'type' => 'text' ),
				array( 'key' => 'field_faq_item_answer', 'label' => 'Answer', 'name' => 'answer', 'type' => 'textarea', 'rows' => 3 ),
				array( 'key' => 'field_faq_item_open', 'label' => 'Open by default', 'name' => 'open_by_default', 'type' => 'true_false', 'ui' => 1, 'instructions' => 'Usually only the first question.' ),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param'    => 'page_template',
				'operator' => '==',
				'value'    => 'page-templates/template-faq.php',
			),
		),
	),
) );
