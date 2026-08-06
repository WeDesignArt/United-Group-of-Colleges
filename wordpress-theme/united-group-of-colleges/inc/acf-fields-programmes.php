<?php
/**
 * ACF field group for the Programmes and Models page template.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

acf_add_local_field_group( array(
	'key'    => 'group_programmes',
	'title'  => 'Programmes and Models Page Content',
	'fields' => array(

		// ---- Hero ----
		array( 'key' => 'field_prog_tab_hero', 'label' => 'Hero', 'type' => 'tab' ),
		array( 'key' => 'field_prog_hero_image', 'label' => 'Hero Image', 'name' => 'hero_image', 'type' => 'image', 'return_format' => 'array' ),
		array( 'key' => 'field_prog_hero_title', 'label' => 'Hero Title', 'name' => 'hero_title', 'type' => 'text', 'default_value' => 'Programs and Models' ),

		// ---- Trusted system intro ----
		array( 'key' => 'field_prog_tab_trusted', 'label' => 'Trusted System Section', 'type' => 'tab' ),
		array( 'key' => 'field_prog_trusted_image', 'label' => 'Image', 'name' => 'trusted_image', 'type' => 'image', 'return_format' => 'array' ),
		array(
			'key' => 'field_prog_trusted_heading', 'label' => 'Heading', 'name' => 'trusted_heading', 'type' => 'text',
			'instructions'  => 'Wrap the highlighted words in &lt;span class="text-accent"&gt;...&lt;/span&gt;.',
			'default_value' => 'Three Models. One <span class="text-accent">Trusted System.</span> Start Where It Suits You.',
		),
		array( 'key' => 'field_prog_trusted_text', 'label' => 'Text', 'name' => 'trusted_text', 'type' => 'textarea', 'rows' => 3 ),

		// ---- Detailed model breakdown ----
		array( 'key' => 'field_prog_tab_breakdown', 'label' => 'Detailed Model Breakdown', 'type' => 'tab' ),
		array(
			'key' => 'field_prog_breakdown_heading', 'label' => 'Heading', 'name' => 'breakdown_heading', 'type' => 'text',
			'instructions'  => 'Wrap the highlighted words in &lt;span class="text-accent"&gt;...&lt;/span&gt;.',
			'default_value' => 'Detailed Model <span class="text-accent">Breakdown</span>',
		),
		array(
			'key'          => 'field_prog_breakdown_models',
			'label'        => 'Models',
			'name'         => 'breakdown_models',
			'type'         => 'repeater',
			'instructions' => 'Rows alternate image-left / image-right automatically.',
			'layout'       => 'block',
			'button_label' => 'Add Model',
			'sub_fields'   => array(
				array( 'key' => 'field_prog_breakdown_model_image', 'label' => 'Image', 'name' => 'image', 'type' => 'image', 'return_format' => 'array' ),
				array( 'key' => 'field_prog_breakdown_model_label', 'label' => 'Label (e.g. Model A)', 'name' => 'label', 'type' => 'text' ),
				array( 'key' => 'field_prog_breakdown_model_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
				array(
					'key'          => 'field_prog_breakdown_model_points',
					'label'        => 'Points',
					'name'         => 'points',
					'type'         => 'repeater',
					'layout'       => 'block',
					'button_label' => 'Add Point',
					'sub_fields'   => array(
						array( 'key' => 'field_prog_breakdown_point_label', 'label' => 'Label (e.g. Ideal For)', 'name' => 'label', 'type' => 'text' ),
						array( 'key' => 'field_prog_breakdown_point_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
						array(
							'key'          => 'field_prog_breakdown_point_sublist',
							'label'        => 'Sub-list (optional)',
							'name'         => 'sub_list',
							'type'         => 'repeater',
							'instructions' => 'Only needed if this point has its own bullet list underneath it (e.g. Model C\'s professional fields).',
							'layout'       => 'table',
							'button_label' => 'Add Sub-item',
							'sub_fields'   => array(
								array( 'key' => 'field_prog_breakdown_point_subitem_text', 'label' => 'Text', 'name' => 'text', 'type' => 'text' ),
							),
						),
					),
				),
			),
		),

		// ---- Compliance CTA ----
		array( 'key' => 'field_prog_tab_cta', 'label' => 'Compliance Statement', 'type' => 'tab' ),
		array( 'key' => 'field_prog_cta_heading', 'label' => 'Heading', 'name' => 'compliance_heading', 'type' => 'text', 'default_value' => 'Regulatory Compliance Statement' ),
		array( 'key' => 'field_prog_cta_text', 'label' => 'Text', 'name' => 'compliance_text', 'type' => 'textarea', 'rows' => 3 ),
	),
	'location' => array(
		array(
			array(
				'param'    => 'page_template',
				'operator' => '==',
				'value'    => 'page-templates/template-programmes.php',
			),
		),
	),
) );
