<?php
/**
 * ACF field group for the FAQ page template.
 *
 * Built for ACF Free — fixed numbered Group fields stand in for a repeater.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

/**
 * One FAQ item's sub-fields (question, answer, open-by-default toggle).
 */
function ugc_faq_item_fields( $key_prefix ) {
	return array(
		array( 'key' => $key_prefix . '_question', 'label' => 'Question', 'name' => 'question', 'type' => 'text' ),
		array( 'key' => $key_prefix . '_answer', 'label' => 'Answer', 'name' => 'answer', 'type' => 'textarea', 'rows' => 3 ),
		array( 'key' => $key_prefix . '_open', 'label' => 'Open by default', 'name' => 'open_by_default', 'type' => 'true_false', 'ui' => 1, 'instructions' => 'Usually only the first question.' ),
	);
}

$faq_fields = array(
	array( 'key' => 'field_faq_tab_hero', 'label' => 'Hero', 'type' => 'tab' ),
	array( 'key' => 'field_faq_hero_image', 'label' => 'Hero Image', 'name' => 'hero_image', 'type' => 'image', 'return_format' => 'array' ),
	array( 'key' => 'field_faq_hero_title', 'label' => 'Hero Title', 'name' => 'hero_title', 'type' => 'text', 'default_value' => 'Frequently Asked Questions' ),
	array( 'key' => 'field_faq_tab_items', 'label' => 'Questions', 'type' => 'tab' ),
);

for ( $n = 1; $n <= 10; $n++ ) {
	$faq_fields[] = array(
		'key'        => 'field_faq_item' . $n,
		'label'      => 'Question ' . $n,
		'name'       => 'faq_item_' . $n,
		'type'       => 'group',
		'sub_fields' => ugc_faq_item_fields( 'field_faq_item' . $n ),
	);
}

acf_add_local_field_group( array(
	'key'      => 'group_faq',
	'title'    => 'FAQ Page Content',
	'fields'   => $faq_fields,
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
