<?php
/**
 * ACF field group for the Programmes and Models page template.
 *
 * Built for ACF Free — fixed numbered Group fields stand in for repeaters,
 * nested two levels deep (Model → Point → optional Sub-list) to match the
 * original repeater-within-repeater-within-repeater structure.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

/**
 * One "Point" inside a model (e.g. "Ideal For: ..."), with an optional
 * plain bullet sub-list underneath it — only Model C's "Proposed Academic
 * Programs" point actually uses the sub-list, but every point gets the
 * same shape so the field group stays predictable.
 */
function ugc_prog_point_fields( $key_prefix ) {
	$sub_list = array();
	for ( $s = 1; $s <= 6; $s++ ) {
		$sub_list[] = array(
			'key'   => $key_prefix . '_sub' . $s,
			'label' => 'Sub-item ' . $s,
			'name'  => 'sub_' . $s,
			'type'  => 'text',
		);
	}

	return array(
		array( 'key' => $key_prefix . '_label', 'label' => 'Label (e.g. Ideal For)', 'name' => 'label', 'type' => 'text' ),
		array( 'key' => $key_prefix . '_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
		array(
			'key'          => $key_prefix . '_sublist',
			'label'        => 'Sub-list (optional)',
			'name'         => 'sub_list',
			'type'         => 'group',
			'instructions' => 'Only fill these in for a point that has its own bullet list underneath it (e.g. Model C\'s professional fields). Leave blank otherwise.',
			'sub_fields'   => $sub_list,
		),
	);
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

		array( 'key' => 'field_prog_model1', 'label' => 'Model 1', 'name' => 'breakdown_model_1', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_prog_model1_image', 'label' => 'Image', 'name' => 'image', 'type' => 'image', 'return_format' => 'array' ),
			array( 'key' => 'field_prog_model1_label', 'label' => 'Label (e.g. Model A)', 'name' => 'label', 'type' => 'text' ),
			array( 'key' => 'field_prog_model1_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
			array( 'key' => 'field_prog_model1_point1', 'label' => 'Point 1', 'name' => 'point_1', 'type' => 'group', 'sub_fields' => ugc_prog_point_fields( 'field_prog_model1_point1' ) ),
			array( 'key' => 'field_prog_model1_point2', 'label' => 'Point 2', 'name' => 'point_2', 'type' => 'group', 'sub_fields' => ugc_prog_point_fields( 'field_prog_model1_point2' ) ),
			array( 'key' => 'field_prog_model1_point3', 'label' => 'Point 3', 'name' => 'point_3', 'type' => 'group', 'sub_fields' => ugc_prog_point_fields( 'field_prog_model1_point3' ) ),
			array( 'key' => 'field_prog_model1_point4', 'label' => 'Point 4', 'name' => 'point_4', 'type' => 'group', 'sub_fields' => ugc_prog_point_fields( 'field_prog_model1_point4' ) ),
		) ),

		array( 'key' => 'field_prog_model2', 'label' => 'Model 2', 'name' => 'breakdown_model_2', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_prog_model2_image', 'label' => 'Image', 'name' => 'image', 'type' => 'image', 'return_format' => 'array' ),
			array( 'key' => 'field_prog_model2_label', 'label' => 'Label (e.g. Model B)', 'name' => 'label', 'type' => 'text' ),
			array( 'key' => 'field_prog_model2_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
			array( 'key' => 'field_prog_model2_point1', 'label' => 'Point 1', 'name' => 'point_1', 'type' => 'group', 'sub_fields' => ugc_prog_point_fields( 'field_prog_model2_point1' ) ),
			array( 'key' => 'field_prog_model2_point2', 'label' => 'Point 2', 'name' => 'point_2', 'type' => 'group', 'sub_fields' => ugc_prog_point_fields( 'field_prog_model2_point2' ) ),
			array( 'key' => 'field_prog_model2_point3', 'label' => 'Point 3', 'name' => 'point_3', 'type' => 'group', 'sub_fields' => ugc_prog_point_fields( 'field_prog_model2_point3' ) ),
			array( 'key' => 'field_prog_model2_point4', 'label' => 'Point 4', 'name' => 'point_4', 'type' => 'group', 'sub_fields' => ugc_prog_point_fields( 'field_prog_model2_point4' ) ),
		) ),

		array( 'key' => 'field_prog_model3', 'label' => 'Model 3', 'name' => 'breakdown_model_3', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_prog_model3_image', 'label' => 'Image', 'name' => 'image', 'type' => 'image', 'return_format' => 'array' ),
			array( 'key' => 'field_prog_model3_label', 'label' => 'Label (e.g. Model C)', 'name' => 'label', 'type' => 'text' ),
			array( 'key' => 'field_prog_model3_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
			array( 'key' => 'field_prog_model3_point1', 'label' => 'Point 1', 'name' => 'point_1', 'type' => 'group', 'sub_fields' => ugc_prog_point_fields( 'field_prog_model3_point1' ) ),
			array(
				'key' => 'field_prog_model3_point2', 'label' => 'Point 2 (this is the one with the CS/IT-etc. sub-list)', 'name' => 'point_2', 'type' => 'group',
				'sub_fields' => ugc_prog_point_fields( 'field_prog_model3_point2' ),
			),
			array( 'key' => 'field_prog_model3_point3', 'label' => 'Point 3', 'name' => 'point_3', 'type' => 'group', 'sub_fields' => ugc_prog_point_fields( 'field_prog_model3_point3' ) ),
			array( 'key' => 'field_prog_model3_point4', 'label' => 'Point 4', 'name' => 'point_4', 'type' => 'group', 'sub_fields' => ugc_prog_point_fields( 'field_prog_model3_point4' ) ),
		) ),

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
