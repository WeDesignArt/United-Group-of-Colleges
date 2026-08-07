<?php
/**
 * ACF field group for the Franchise Opportunity page template.
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

		array( 'key' => 'field_franchise_intro_item1', 'label' => 'List Item 1', 'name' => 'intro_item_1', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_franchise_intro_item1_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text' ),
			array( 'key' => 'field_franchise_intro_item1_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
		) ),
		array( 'key' => 'field_franchise_intro_item2', 'label' => 'List Item 2', 'name' => 'intro_item_2', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_franchise_intro_item2_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text' ),
			array( 'key' => 'field_franchise_intro_item2_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
		) ),
		array( 'key' => 'field_franchise_intro_item3', 'label' => 'List Item 3', 'name' => 'intro_item_3', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_franchise_intro_item3_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text' ),
			array( 'key' => 'field_franchise_intro_item3_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
		) ),
		array( 'key' => 'field_franchise_intro_item4', 'label' => 'List Item 4', 'name' => 'intro_item_4', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_franchise_intro_item4_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text' ),
			array( 'key' => 'field_franchise_intro_item4_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
		) ),

		// ---- Division of responsibilities ----
		array( 'key' => 'field_franchise_tab_division', 'label' => 'Division of Responsibilities', 'type' => 'tab' ),
		array(
			'key' => 'field_franchise_division_heading', 'label' => 'Heading', 'name' => 'division_heading', 'type' => 'text',
			'instructions'  => 'Wrap the highlighted words in &lt;span class="text_accent"&gt;...&lt;/span&gt;.',
			'default_value' => 'Division of <span class="text_accent">Responsibilities</span>',
		),
		array( 'key' => 'field_franchise_division_col1_title', 'label' => 'Column 1 Title', 'name' => 'division_col1_title', 'type' => 'text', 'default_value' => 'What You Provide' ),
		array( 'key' => 'field_franchise_division_col1_item1', 'label' => 'Column 1 — Item 1', 'name' => 'division_col1_item_1', 'type' => 'text' ),
		array( 'key' => 'field_franchise_division_col1_item2', 'label' => 'Column 1 — Item 2', 'name' => 'division_col1_item_2', 'type' => 'text' ),
		array( 'key' => 'field_franchise_division_col1_item3', 'label' => 'Column 1 — Item 3', 'name' => 'division_col1_item_3', 'type' => 'text' ),
		array( 'key' => 'field_franchise_division_col1_item4', 'label' => 'Column 1 — Item 4', 'name' => 'division_col1_item_4', 'type' => 'text' ),
		array( 'key' => 'field_franchise_division_col1_item5', 'label' => 'Column 1 — Item 5', 'name' => 'division_col1_item_5', 'type' => 'text' ),

		array( 'key' => 'field_franchise_division_col2_title', 'label' => 'Column 2 Title', 'name' => 'division_col2_title', 'type' => 'text', 'default_value' => 'What UGC Provides' ),
		array( 'key' => 'field_franchise_division_col2_item1', 'label' => 'Column 2 — Item 1', 'name' => 'division_col2_item_1', 'type' => 'text' ),
		array( 'key' => 'field_franchise_division_col2_item2', 'label' => 'Column 2 — Item 2', 'name' => 'division_col2_item_2', 'type' => 'text' ),
		array( 'key' => 'field_franchise_division_col2_item3', 'label' => 'Column 2 — Item 3', 'name' => 'division_col2_item_3', 'type' => 'text' ),
		array( 'key' => 'field_franchise_division_col2_item4', 'label' => 'Column 2 — Item 4', 'name' => 'division_col2_item_4', 'type' => 'text' ),
		array( 'key' => 'field_franchise_division_col2_item5', 'label' => 'Column 2 — Item 5', 'name' => 'division_col2_item_5', 'type' => 'text' ),
		array( 'key' => 'field_franchise_division_col2_item6', 'label' => 'Column 2 — Item 6', 'name' => 'division_col2_item_6', 'type' => 'text' ),
		array( 'key' => 'field_franchise_division_col2_item7', 'label' => 'Column 2 — Item 7', 'name' => 'division_col2_item_7', 'type' => 'text' ),

		// ---- Campus models overview ----
		array( 'key' => 'field_franchise_tab_models', 'label' => 'Campus Models Overview', 'type' => 'tab' ),
		array(
			'key' => 'field_franchise_models_heading', 'label' => 'Heading', 'name' => 'models_heading', 'type' => 'text',
			'instructions'  => 'Wrap the highlighted words in &lt;span class="text-accent"&gt;...&lt;/span&gt;.',
			'default_value' => 'Campus <span class="text-accent">Models</span> Overview',
		),

		array( 'key' => 'field_franchise_models_card1', 'label' => 'Model Card 1', 'name' => 'models_card_1', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_franchise_models_card1_image', 'label' => 'Image', 'name' => 'image', 'type' => 'image', 'return_format' => 'array' ),
			array( 'key' => 'field_franchise_models_card1_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text' ),
			array( 'key' => 'field_franchise_models_card1_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
			array( 'key' => 'field_franchise_models_card1_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
		) ),
		array( 'key' => 'field_franchise_models_card2', 'label' => 'Model Card 2', 'name' => 'models_card_2', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_franchise_models_card2_image', 'label' => 'Image', 'name' => 'image', 'type' => 'image', 'return_format' => 'array' ),
			array( 'key' => 'field_franchise_models_card2_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text' ),
			array( 'key' => 'field_franchise_models_card2_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
			array( 'key' => 'field_franchise_models_card2_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
		) ),
		array( 'key' => 'field_franchise_models_card3', 'label' => 'Model Card 3', 'name' => 'models_card_3', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_franchise_models_card3_image', 'label' => 'Image', 'name' => 'image', 'type' => 'image', 'return_format' => 'array' ),
			array( 'key' => 'field_franchise_models_card3_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text' ),
			array( 'key' => 'field_franchise_models_card3_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
			array( 'key' => 'field_franchise_models_card3_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
		) ),

		// ---- Overview icons ----
		array( 'key' => 'field_franchise_tab_overview', 'label' => 'Overview Icons', 'type' => 'tab' ),

		array( 'key' => 'field_franchise_overview_item1', 'label' => 'Item 1', 'name' => 'overview_item_1', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_franchise_overview_item1_icon', 'label' => 'Icon', 'name' => 'icon', 'type' => 'image', 'return_format' => 'array' ),
			array( 'key' => 'field_franchise_overview_item1_text', 'label' => 'Text', 'name' => 'text', 'type' => 'text' ),
		) ),
		array( 'key' => 'field_franchise_overview_item2', 'label' => 'Item 2', 'name' => 'overview_item_2', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_franchise_overview_item2_icon', 'label' => 'Icon', 'name' => 'icon', 'type' => 'image', 'return_format' => 'array' ),
			array( 'key' => 'field_franchise_overview_item2_text', 'label' => 'Text', 'name' => 'text', 'type' => 'text' ),
		) ),
		array( 'key' => 'field_franchise_overview_item3', 'label' => 'Item 3', 'name' => 'overview_item_3', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_franchise_overview_item3_icon', 'label' => 'Icon', 'name' => 'icon', 'type' => 'image', 'return_format' => 'array' ),
			array( 'key' => 'field_franchise_overview_item3_text', 'label' => 'Text', 'name' => 'text', 'type' => 'text' ),
		) ),
		array( 'key' => 'field_franchise_overview_item4', 'label' => 'Item 4', 'name' => 'overview_item_4', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_franchise_overview_item4_icon', 'label' => 'Icon', 'name' => 'icon', 'type' => 'image', 'return_format' => 'array' ),
			array( 'key' => 'field_franchise_overview_item4_text', 'label' => 'Text', 'name' => 'text', 'type' => 'text' ),
		) ),

		// ---- Financial overview ----
		array( 'key' => 'field_franchise_tab_finance', 'label' => 'Financial Overview', 'type' => 'tab' ),
		array( 'key' => 'field_franchise_finance_image', 'label' => 'Image', 'name' => 'finance_image', 'type' => 'image', 'return_format' => 'array' ),
		array( 'key' => 'field_franchise_finance_title', 'label' => 'Title', 'name' => 'finance_title', 'type' => 'text', 'default_value' => 'Financial Overview' ),

		array( 'key' => 'field_franchise_finance_item1', 'label' => 'Line Item 1', 'name' => 'finance_item_1', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_franchise_finance_item1_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
			array( 'key' => 'field_franchise_finance_item1_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
		) ),
		array( 'key' => 'field_franchise_finance_item2', 'label' => 'Line Item 2', 'name' => 'finance_item_2', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_franchise_finance_item2_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
			array( 'key' => 'field_franchise_finance_item2_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
		) ),
		array( 'key' => 'field_franchise_finance_item3', 'label' => 'Line Item 3', 'name' => 'finance_item_3', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_franchise_finance_item3_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
			array( 'key' => 'field_franchise_finance_item3_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
		) ),

		array( 'key' => 'field_franchise_finance_note_title', 'label' => 'Note Title', 'name' => 'finance_note_title', 'type' => 'text', 'default_value' => 'Note' ),
		array( 'key' => 'field_franchise_finance_note_text', 'label' => 'Note Text', 'name' => 'finance_note_text', 'type' => 'textarea', 'rows' => 3 ),

		// ---- Ongoing support ----
		array( 'key' => 'field_franchise_tab_support', 'label' => 'Ongoing Support', 'type' => 'tab' ),
		array( 'key' => 'field_franchise_support_icon', 'label' => 'Icon', 'name' => 'support_icon', 'type' => 'image', 'return_format' => 'array' ),
		array( 'key' => 'field_franchise_support_title', 'label' => 'Title', 'name' => 'support_title', 'type' => 'text', 'default_value' => 'Continuous Operational Support' ),
		array( 'key' => 'field_franchise_support_text', 'label' => 'Intro Text', 'name' => 'support_text', 'type' => 'textarea', 'rows' => 2 ),

		array( 'key' => 'field_franchise_support_item1', 'label' => 'Item 1', 'name' => 'support_item_1', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_franchise_support_item1_icon', 'label' => 'Icon', 'name' => 'icon', 'type' => 'image', 'return_format' => 'array' ),
			array( 'key' => 'field_franchise_support_item1_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
		) ),
		array( 'key' => 'field_franchise_support_item2', 'label' => 'Item 2', 'name' => 'support_item_2', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_franchise_support_item2_icon', 'label' => 'Icon', 'name' => 'icon', 'type' => 'image', 'return_format' => 'array' ),
			array( 'key' => 'field_franchise_support_item2_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
		) ),

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
