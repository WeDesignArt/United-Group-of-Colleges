<?php
/**
 * ACF field group for the About Us page template.
 *
 * Built for ACF Free — fixed numbered Group fields stand in for repeaters.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

acf_add_local_field_group( array(
	'key'    => 'group_about',
	'title'  => 'About Us Page Content',
	'fields' => array(

		// ---- Hero ----
		array( 'key' => 'field_about_tab_hero', 'label' => 'Hero', 'type' => 'tab' ),
		array( 'key' => 'field_about_hero_image', 'label' => 'Hero Image', 'name' => 'hero_image', 'type' => 'image', 'return_format' => 'array' ),
		array( 'key' => 'field_about_hero_title', 'label' => 'Hero Title', 'name' => 'hero_title', 'type' => 'text', 'default_value' => 'About UGC' ),

		// ---- Trust section ----
		array( 'key' => 'field_about_tab_trust', 'label' => 'Trust Section', 'type' => 'tab' ),
		array( 'key' => 'field_about_trust_image', 'label' => 'Image', 'name' => 'trust_image', 'type' => 'image', 'return_format' => 'array' ),
		array(
			'key' => 'field_about_trust_heading', 'label' => 'Heading', 'name' => 'trust_heading', 'type' => 'text',
			'instructions'   => 'Wrap the highlighted words in &lt;span class="text-accent"&gt;...&lt;/span&gt;.',
			'default_value'  => 'A New Way to Build a <span class="text-accent">College</span>, <span class="text-accent">Backed by a Name</span> That Has <span class="text-accent">Earned Trust</span>',
		),
		array( 'key' => 'field_about_trust_text', 'label' => 'Text', 'name' => 'trust_text', 'type' => 'textarea', 'rows' => 4 ),
		array( 'key' => 'field_about_trust_list_title', 'label' => 'List Title', 'name' => 'trust_list_title', 'type' => 'text', 'default_value' => 'What "Backed by UGF" Means' ),

		array( 'key' => 'field_about_trust_item1', 'label' => 'List Item 1', 'name' => 'trust_item_1', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_about_trust_item1_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text' ),
			array( 'key' => 'field_about_trust_item1_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
		) ),
		array( 'key' => 'field_about_trust_item2', 'label' => 'List Item 2', 'name' => 'trust_item_2', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_about_trust_item2_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text' ),
			array( 'key' => 'field_about_trust_item2_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
		) ),
		array( 'key' => 'field_about_trust_item3', 'label' => 'List Item 3', 'name' => 'trust_item_3', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_about_trust_item3_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text' ),
			array( 'key' => 'field_about_trust_item3_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
		) ),

		// ---- Franchise model section ----
		array( 'key' => 'field_about_tab_model', 'label' => 'Franchise Model Section', 'type' => 'tab' ),
		array( 'key' => 'field_about_model_image', 'label' => 'Image', 'name' => 'model_image', 'type' => 'image', 'return_format' => 'array' ),
		array(
			'key' => 'field_about_model_heading', 'label' => 'Heading', 'name' => 'model_heading', 'type' => 'text',
			'instructions'   => 'Wrap the highlighted words in &lt;span class="text-accent"&gt;...&lt;/span&gt;.',
			'default_value'  => 'Why We Built the <span class="text-accent">UGC Franchise Model</span>',
		),
		array( 'key' => 'field_about_model_content', 'label' => 'Content', 'name' => 'model_content', 'type' => 'wysiwyg', 'media_upload' => 0, 'toolbar' => 'basic' ),

		// ---- Core Pillars ----
		array( 'key' => 'field_about_tab_pillars', 'label' => 'Core Pillars Section', 'type' => 'tab' ),
		array(
			'key' => 'field_about_pillars_heading', 'label' => 'Heading', 'name' => 'pillars_heading', 'type' => 'text',
			'instructions'   => 'Wrap the highlighted words in &lt;span class="text-accent"&gt;...&lt;/span&gt;.',
			'default_value'  => 'Core Pillars of the <span class="text-accent">UGC Model</span>',
		),

		array( 'key' => 'field_about_pillar1', 'label' => 'Pillar 1', 'name' => 'pillar_1', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_about_pillar1_icon', 'label' => 'Icon', 'name' => 'icon', 'type' => 'image', 'return_format' => 'array' ),
			array( 'key' => 'field_about_pillar1_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
			array( 'key' => 'field_about_pillar1_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
		) ),
		array( 'key' => 'field_about_pillar2', 'label' => 'Pillar 2', 'name' => 'pillar_2', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_about_pillar2_icon', 'label' => 'Icon', 'name' => 'icon', 'type' => 'image', 'return_format' => 'array' ),
			array( 'key' => 'field_about_pillar2_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
			array( 'key' => 'field_about_pillar2_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
		) ),
		array( 'key' => 'field_about_pillar3', 'label' => 'Pillar 3', 'name' => 'pillar_3', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_about_pillar3_icon', 'label' => 'Icon', 'name' => 'icon', 'type' => 'image', 'return_format' => 'array' ),
			array( 'key' => 'field_about_pillar3_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
			array( 'key' => 'field_about_pillar3_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
		) ),

		// ---- Quality Assurance ----
		array( 'key' => 'field_about_tab_quality', 'label' => 'Quality Assurance Section', 'type' => 'tab' ),
		array( 'key' => 'field_about_quality_image', 'label' => 'Image', 'name' => 'quality_image', 'type' => 'image', 'return_format' => 'array' ),
		array(
			'key' => 'field_about_quality_heading', 'label' => 'Heading', 'name' => 'quality_heading', 'type' => 'text',
			'instructions'   => 'Wrap the highlighted words in &lt;span class="text-accent"&gt;...&lt;/span&gt;.',
			'default_value'  => 'High Standards of <span class="text-accent">Quality Assurance</span>',
		),
		array( 'key' => 'field_about_quality_text', 'label' => 'Intro Text', 'name' => 'quality_text', 'type' => 'textarea', 'rows' => 2 ),

		array( 'key' => 'field_about_quality_item1', 'label' => 'List Item 1', 'name' => 'quality_item_1', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_about_quality_item1_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text' ),
			array( 'key' => 'field_about_quality_item1_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
		) ),
		array( 'key' => 'field_about_quality_item2', 'label' => 'List Item 2', 'name' => 'quality_item_2', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_about_quality_item2_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text' ),
			array( 'key' => 'field_about_quality_item2_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
		) ),
		array( 'key' => 'field_about_quality_item3', 'label' => 'List Item 3', 'name' => 'quality_item_3', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_about_quality_item3_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text' ),
			array( 'key' => 'field_about_quality_item3_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
		) ),
		array( 'key' => 'field_about_quality_item4', 'label' => 'List Item 4', 'name' => 'quality_item_4', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_about_quality_item4_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text' ),
			array( 'key' => 'field_about_quality_item4_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
		) ),
		array( 'key' => 'field_about_quality_item5', 'label' => 'List Item 5', 'name' => 'quality_item_5', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_about_quality_item5_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text' ),
			array( 'key' => 'field_about_quality_item5_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
		) ),

		// ---- CTA ----
		array( 'key' => 'field_about_tab_cta', 'label' => 'CTA Section', 'type' => 'tab' ),
		array( 'key' => 'field_about_cta_heading', 'label' => 'Heading', 'name' => 'cta_heading', 'type' => 'text', 'default_value' => 'Our Focus South Punjab and Beyond' ),
		array( 'key' => 'field_about_cta_text', 'label' => 'Text', 'name' => 'cta_text', 'type' => 'textarea', 'rows' => 3 ),
	),
	'location' => array(
		array(
			array(
				'param'    => 'page_template',
				'operator' => '==',
				'value'    => 'page-templates/template-about.php',
			),
		),
	),
) );
