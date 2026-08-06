<?php
/**
 * ACF field group for the Franchise Opportunity page template.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

acf_add_local_field_group( array(
	'key'    => 'group_franchise',
	'title'  => 'Franchise Opportunity Page Content',
	'fields' => array(

		// ---- Hero ----
		array( 'key' => 'field_franchise_tab_hero', 'label' => 'Hero', 'type' => 'tab' ),
		array( 'key' => 'field_franchise_hero_image', 'label' => 'Hero Image', 'name' => 'hero_image', 'type' => 'image', 'return_format' => 'array' ),
		array( 'key' => 'field_franchise_hero_title', 'label' => 'Hero Title', 'name' => 'hero_title', 'type' => 'text', 'default_value' => 'Franchise Opportunity' ),

		// ---- Business case intro ----
		array( 'key' => 'field_franchise_tab_intro', 'label' => 'Business Case', 'type' => 'tab' ),
		array( 'key' => 'field_franchise_intro_image', 'label' => 'Image', 'name' => 'intro_image', 'type' => 'image', 'return_format' => 'array' ),
		array(
			'key' => 'field_franchise_intro_heading', 'label' => 'Heading', 'name' => 'intro_heading', 'type' => 'text',
			'instructions'  => 'Wrap the highlighted words in &lt;span class="text_accent"&gt;...&lt;/span&gt;.',
			'default_value' => 'A College Franchise <span class="text_accent">Opportunity Built</span> for Serious Investors',
		),
		array( 'key' => 'field_franchise_intro_text', 'label' => 'Text', 'name' => 'intro_text', 'type' => 'textarea', 'rows' => 3 ),
		array( 'key' => 'field_franchise_intro_subtitle', 'label' => 'List Subtitle', 'name' => 'intro_subtitle', 'type' => 'text', 'default_value' => 'The Business Case' ),
		array(
			'key'          => 'field_franchise_intro_list',
			'label'        => 'List Items',
			'name'         => 'intro_list',
			'type'         => 'repeater',
			'layout'       => 'block',
			'button_label' => 'Add Item',
			'sub_fields'   => array(
				array( 'key' => 'field_franchise_intro_item_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text' ),
				array( 'key' => 'field_franchise_intro_item_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
			),
		),

		// ---- Division of responsibilities ----
		array( 'key' => 'field_franchise_tab_division', 'label' => 'Division of Responsibilities', 'type' => 'tab' ),
		array(
			'key' => 'field_franchise_division_heading', 'label' => 'Heading', 'name' => 'division_heading', 'type' => 'text',
			'instructions'  => 'Wrap the highlighted words in &lt;span class="text_accent"&gt;...&lt;/span&gt;.',
			'default_value' => 'Division of <span class="text_accent">Responsibilities</span>',
		),
		array( 'key' => 'field_franchise_division_col1_title', 'label' => 'Column 1 Title', 'name' => 'division_col1_title', 'type' => 'text', 'default_value' => 'What You Provide' ),
		array(
			'key'          => 'field_franchise_division_col1_items',
			'label'        => 'Column 1 Items',
			'name'         => 'division_col1_items',
			'type'         => 'repeater',
			'layout'       => 'table',
			'button_label' => 'Add Item',
			'sub_fields'   => array(
				array( 'key' => 'field_franchise_division_col1_item_text', 'label' => 'Text', 'name' => 'text', 'type' => 'text' ),
			),
		),
		array( 'key' => 'field_franchise_division_col2_title', 'label' => 'Column 2 Title', 'name' => 'division_col2_title', 'type' => 'text', 'default_value' => 'What UGC Provides' ),
		array(
			'key'          => 'field_franchise_division_col2_items',
			'label'        => 'Column 2 Items',
			'name'         => 'division_col2_items',
			'type'         => 'repeater',
			'layout'       => 'table',
			'button_label' => 'Add Item',
			'sub_fields'   => array(
				array( 'key' => 'field_franchise_division_col2_item_text', 'label' => 'Text', 'name' => 'text', 'type' => 'text' ),
			),
		),

		// ---- Campus models overview ----
		array( 'key' => 'field_franchise_tab_models', 'label' => 'Campus Models Overview', 'type' => 'tab' ),
		array(
			'key' => 'field_franchise_models_heading', 'label' => 'Heading', 'name' => 'models_heading', 'type' => 'text',
			'instructions'  => 'Wrap the highlighted words in &lt;span class="text-accent"&gt;...&lt;/span&gt;.',
			'default_value' => 'Campus <span class="text-accent">Models</span> Overview',
		),
		array(
			'key'          => 'field_franchise_models_cards',
			'label'        => 'Model Cards',
			'name'         => 'models_cards',
			'type'         => 'repeater',
			'layout'       => 'block',
			'button_label' => 'Add Model',
			'sub_fields'   => array(
				array( 'key' => 'field_franchise_models_card_image', 'label' => 'Image', 'name' => 'image', 'type' => 'image', 'return_format' => 'array' ),
				array( 'key' => 'field_franchise_models_card_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text' ),
				array( 'key' => 'field_franchise_models_card_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
				array( 'key' => 'field_franchise_models_card_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
			),
		),

		// ---- Overview icons ----
		array( 'key' => 'field_franchise_tab_overview', 'label' => 'Overview Icons', 'type' => 'tab' ),
		array(
			'key'          => 'field_franchise_overview_items',
			'label'        => 'Items',
			'name'         => 'overview_items',
			'type'         => 'repeater',
			'layout'       => 'table',
			'button_label' => 'Add Item',
			'sub_fields'   => array(
				array( 'key' => 'field_franchise_overview_item_icon', 'label' => 'Icon', 'name' => 'icon', 'type' => 'image', 'return_format' => 'array' ),
				array( 'key' => 'field_franchise_overview_item_text', 'label' => 'Text', 'name' => 'text', 'type' => 'text' ),
			),
		),

		// ---- Financial overview ----
		array( 'key' => 'field_franchise_tab_finance', 'label' => 'Financial Overview', 'type' => 'tab' ),
		array( 'key' => 'field_franchise_finance_image', 'label' => 'Image', 'name' => 'finance_image', 'type' => 'image', 'return_format' => 'array' ),
		array( 'key' => 'field_franchise_finance_title', 'label' => 'Title', 'name' => 'finance_title', 'type' => 'text', 'default_value' => 'Financial Overview' ),
		array(
			'key'          => 'field_franchise_finance_items',
			'label'        => 'Line Items',
			'name'         => 'finance_items',
			'type'         => 'repeater',
			'layout'       => 'block',
			'button_label' => 'Add Line Item',
			'sub_fields'   => array(
				array( 'key' => 'field_franchise_finance_item_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
				array( 'key' => 'field_franchise_finance_item_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
			),
		),
		array( 'key' => 'field_franchise_finance_note_title', 'label' => 'Note Title', 'name' => 'finance_note_title', 'type' => 'text', 'default_value' => 'Note' ),
		array( 'key' => 'field_franchise_finance_note_text', 'label' => 'Note Text', 'name' => 'finance_note_text', 'type' => 'textarea', 'rows' => 3 ),

		// ---- Ongoing support ----
		array( 'key' => 'field_franchise_tab_support', 'label' => 'Ongoing Support', 'type' => 'tab' ),
		array( 'key' => 'field_franchise_support_icon', 'label' => 'Icon', 'name' => 'support_icon', 'type' => 'image', 'return_format' => 'array' ),
		array( 'key' => 'field_franchise_support_title', 'label' => 'Title', 'name' => 'support_title', 'type' => 'text', 'default_value' => 'Continuous Operational Support' ),
		array( 'key' => 'field_franchise_support_text', 'label' => 'Intro Text', 'name' => 'support_text', 'type' => 'textarea', 'rows' => 2 ),
		array(
			'key'          => 'field_franchise_support_items',
			'label'        => 'Items',
			'name'         => 'support_items',
			'type'         => 'repeater',
			'layout'       => 'block',
			'button_label' => 'Add Item',
			'sub_fields'   => array(
				array( 'key' => 'field_franchise_support_item_icon', 'label' => 'Icon', 'name' => 'icon', 'type' => 'image', 'return_format' => 'array' ),
				array( 'key' => 'field_franchise_support_item_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
			),
		),

		// ---- CTA ----
		array( 'key' => 'field_franchise_tab_cta', 'label' => 'CTA Section', 'type' => 'tab' ),
		array( 'key' => 'field_franchise_cta_heading', 'label' => 'Heading', 'name' => 'cta_heading', 'type' => 'text', 'default_value' => 'Target Applicant Profile' ),
		array( 'key' => 'field_franchise_cta_text', 'label' => 'Text', 'name' => 'cta_text', 'type' => 'textarea', 'rows' => 3 ),
	),
	'location' => array(
		array(
			array(
				'param'    => 'page_template',
				'operator' => '==',
				'value'    => 'page-templates/template-franchise.php',
			),
		),
	),
) );
