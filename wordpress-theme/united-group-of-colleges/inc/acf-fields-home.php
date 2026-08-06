<?php
/**
 * ACF field group for the Home page template.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

acf_add_local_field_group( array(
	'key'    => 'group_home',
	'title'  => 'Home Page Content',
	'fields' => array(

		// ---- Hero ----
		array( 'key' => 'field_home_tab_hero', 'label' => 'Hero', 'type' => 'tab' ),
		array( 'key' => 'field_home_hero_image', 'label' => 'Hero Background Image', 'name' => 'hero_image', 'type' => 'image', 'return_format' => 'array' ),
		array( 'key' => 'field_home_hero_title', 'label' => 'Hero Title', 'name' => 'hero_title', 'type' => 'text', 'default_value' => 'Open a College. Partner With a Name People Already Trust.' ),
		array( 'key' => 'field_home_hero_text', 'label' => 'Hero Text', 'name' => 'hero_text', 'type' => 'textarea', 'rows' => 3 ),
		array( 'key' => 'field_home_hero_btn1_text', 'label' => 'Primary Button Text', 'name' => 'hero_button_1_text', 'type' => 'text', 'default_value' => 'Request Franchise Information' ),
		array( 'key' => 'field_home_hero_btn1_url', 'label' => 'Primary Button Link', 'name' => 'hero_button_1_url', 'type' => 'url' ),
		array( 'key' => 'field_home_hero_btn2_text', 'label' => 'Secondary Button Text', 'name' => 'hero_button_2_text', 'type' => 'text', 'default_value' => 'See How It Works' ),
		array( 'key' => 'field_home_hero_btn2_url', 'label' => 'Secondary Button Link', 'name' => 'hero_button_2_url', 'type' => 'url' ),

		// ---- A Simpler Way ----
		array( 'key' => 'field_home_tab_simpler', 'label' => 'A Simpler Way Section', 'type' => 'tab' ),
		array(
			'key'          => 'field_home_simpler_heading',
			'label'        => 'Heading',
			'name'         => 'simpler_way_heading',
			'type'         => 'text',
			'instructions' => 'Wrap the highlighted words in &lt;span class="text-accent"&gt;...&lt;/span&gt;.',
			'default_value' => 'A Simpler Way into the <span class="text-accent">Education System</span>',
		),
		array( 'key' => 'field_home_simpler_text', 'label' => 'Intro Text', 'name' => 'simpler_way_text', 'type' => 'textarea', 'rows' => 3 ),
		array(
			'key'          => 'field_home_simpler_rows',
			'label'        => 'Rows',
			'name'         => 'simpler_way_rows',
			'type'         => 'repeater',
			'instructions' => 'Rows alternate image-left / image-right automatically.',
			'layout'       => 'block',
			'button_label' => 'Add Row',
			'sub_fields'   => array(
				array( 'key' => 'field_home_simpler_row_image', 'label' => 'Image', 'name' => 'image', 'type' => 'image', 'return_format' => 'array' ),
				array( 'key' => 'field_home_simpler_row_icon', 'label' => 'Icon', 'name' => 'icon', 'type' => 'image', 'return_format' => 'array' ),
				array( 'key' => 'field_home_simpler_row_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
				array( 'key' => 'field_home_simpler_row_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
			),
		),

		// ---- Regional Investors ----
		array( 'key' => 'field_home_tab_regional', 'label' => 'Regional Investors Section', 'type' => 'tab' ),
		array(
			'key' => 'field_home_regional_heading', 'label' => 'Heading', 'name' => 'regional_heading', 'type' => 'text',
			'instructions' => 'Wrap the highlighted words in &lt;span class="text-accent"&gt;...&lt;/span&gt;.',
			'default_value' => 'Pathways for <span class="text-accent">Regional Investors</span>',
		),
		array(
			'key'          => 'field_home_regional_cards',
			'label'        => 'Cards',
			'name'         => 'regional_cards',
			'type'         => 'repeater',
			'layout'       => 'block',
			'button_label' => 'Add Card',
			'sub_fields'   => array(
				array( 'key' => 'field_home_regional_card_image', 'label' => 'Photo', 'name' => 'image', 'type' => 'image', 'return_format' => 'array' ),
				array( 'key' => 'field_home_regional_card_icon', 'label' => 'Icon', 'name' => 'icon', 'type' => 'image', 'return_format' => 'array' ),
				array( 'key' => 'field_home_regional_card_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
				array( 'key' => 'field_home_regional_card_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text' ),
				array( 'key' => 'field_home_regional_card_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
			),
		),

		// ---- How the Franchise Works (timeline) ----
		array( 'key' => 'field_home_tab_timeline', 'label' => 'How It Works (Timeline)', 'type' => 'tab' ),
		array( 'key' => 'field_home_timeline_heading', 'label' => 'Heading', 'name' => 'timeline_heading', 'type' => 'text', 'default_value' => 'How the UGC Franchise Works' ),
		array(
			'key'          => 'field_home_timeline_steps',
			'label'        => 'Steps',
			'name'         => 'timeline_steps',
			'type'         => 'repeater',
			'instructions' => 'Steps alternate left/right automatically.',
			'layout'       => 'block',
			'button_label' => 'Add Step',
			'sub_fields'   => array(
				array( 'key' => 'field_home_timeline_step_icon', 'label' => 'Icon', 'name' => 'icon', 'type' => 'image', 'return_format' => 'array' ),
				array( 'key' => 'field_home_timeline_step_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
				array( 'key' => 'field_home_timeline_step_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
			),
		),

		// ---- Campus Models ----
		array( 'key' => 'field_home_tab_models', 'label' => 'Campus Models Section', 'type' => 'tab' ),
		array(
			'key' => 'field_home_models_heading', 'label' => 'Heading', 'name' => 'models_heading', 'type' => 'text',
			'instructions' => 'Wrap the highlighted words in &lt;span class="text-accent"&gt;...&lt;/span&gt;.',
			'default_value' => 'Campus Models Tailored to <span class="text-accent">Your Market</span>',
		),
		array( 'key' => 'field_home_models_intro', 'label' => 'Intro Text', 'name' => 'models_intro', 'type' => 'text' ),
		array(
			'key'          => 'field_home_models_cards',
			'label'        => 'Model Cards',
			'name'         => 'models_cards',
			'type'         => 'repeater',
			'layout'       => 'block',
			'button_label' => 'Add Model',
			'sub_fields'   => array(
				array( 'key' => 'field_home_models_card_image', 'label' => 'Image', 'name' => 'image', 'type' => 'image', 'return_format' => 'array' ),
				array( 'key' => 'field_home_models_card_label', 'label' => 'Label (e.g. MODEL A)', 'name' => 'label', 'type' => 'text' ),
				array( 'key' => 'field_home_models_card_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
				array( 'key' => 'field_home_models_card_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
				array( 'key' => 'field_home_models_card_highlight', 'label' => 'Highlight this card', 'name' => 'is_highlighted', 'type' => 'true_false', 'ui' => 1 ),
			),
		),
		array( 'key' => 'field_home_models_footnote', 'label' => 'Footnote', 'name' => 'models_footnote', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'All program offerings across all models are proposed and subject to final regulatory and government approvals.' ),

		// ---- Why South Punjab ----
		array( 'key' => 'field_home_tab_why', 'label' => 'Why South Punjab Section', 'type' => 'tab' ),
		array( 'key' => 'field_home_why_image', 'label' => 'Image', 'name' => 'why_image', 'type' => 'image', 'return_format' => 'array' ),
		array( 'key' => 'field_home_why_badge_title', 'label' => 'Image Badge Title', 'name' => 'why_badge_title', 'type' => 'text', 'default_value' => 'Regional Focus' ),
		array( 'key' => 'field_home_why_badge_text', 'label' => 'Image Badge Text', 'name' => 'why_badge_text', 'type' => 'text', 'default_value' => 'Multan, Bahawalpur, and Dera Ghazi Khan divisions.' ),
		array(
			'key' => 'field_home_why_heading', 'label' => 'Heading', 'name' => 'why_heading', 'type' => 'text',
			'instructions' => 'Wrap the highlighted words in &lt;span class="text-accent"&gt;...&lt;/span&gt;.',
			'default_value' => 'Why South Punjab, <span class="text-accent">Why Now?</span>',
		),
		array( 'key' => 'field_home_why_text_1', 'label' => 'Paragraph 1', 'name' => 'why_text_1', 'type' => 'textarea', 'rows' => 3 ),
		array( 'key' => 'field_home_why_text_2', 'label' => 'Paragraph 2', 'name' => 'why_text_2', 'type' => 'textarea', 'rows' => 2 ),
		array( 'key' => 'field_home_why_highlight_title', 'label' => 'Highlight Box Title', 'name' => 'why_highlight_title', 'type' => 'text', 'default_value' => 'First-Mover Advantage' ),
		array( 'key' => 'field_home_why_highlight_text', 'label' => 'Highlight Box Text', 'name' => 'why_highlight_text', 'type' => 'textarea', 'rows' => 2 ),

		// ---- Who This Opportunity Is For ----
		array( 'key' => 'field_home_tab_opportunity', 'label' => 'Who This Is For Section', 'type' => 'tab' ),
		array( 'key' => 'field_home_opportunity_image', 'label' => 'Image', 'name' => 'opportunity_image', 'type' => 'image', 'return_format' => 'array' ),
		array(
			'key' => 'field_home_opportunity_heading', 'label' => 'Heading', 'name' => 'opportunity_heading', 'type' => 'text',
			'instructions' => 'Wrap the highlighted words in &lt;span class="text-accent"&gt;...&lt;/span&gt;.',
			'default_value' => 'Who This Opportunity Is <span class="text-accent">For</span>',
		),
		array( 'key' => 'field_home_opportunity_intro', 'label' => 'Intro Text', 'name' => 'opportunity_intro', 'type' => 'text', 'default_value' => 'UGC welcomes visionary partners ready to make an impact.' ),
		array(
			'key'          => 'field_home_opportunity_list',
			'label'        => 'List Items',
			'name'         => 'opportunity_list',
			'type'         => 'repeater',
			'layout'       => 'table',
			'button_label' => 'Add Item',
			'sub_fields'   => array(
				array( 'key' => 'field_home_opportunity_item_text', 'label' => 'Text', 'name' => 'text', 'type' => 'text' ),
			),
		),

		// ---- CTA ----
		array( 'key' => 'field_home_tab_cta', 'label' => 'CTA Section', 'type' => 'tab' ),
		array( 'key' => 'field_home_cta_heading', 'label' => 'Heading', 'name' => 'cta_heading', 'type' => 'text', 'default_value' => 'Take the First Step' ),
		array( 'key' => 'field_home_cta_text', 'label' => 'Text', 'name' => 'cta_text', 'type' => 'textarea', 'rows' => 3 ),
		array( 'key' => 'field_home_cta_btn_text', 'label' => 'Button Text', 'name' => 'cta_button_text', 'type' => 'text', 'default_value' => 'Request Franchise Information' ),
		array( 'key' => 'field_home_cta_btn_url', 'label' => 'Button Link', 'name' => 'cta_button_url', 'type' => 'url' ),
	),
	'location' => array(
		array(
			array(
				'param'    => 'page_template',
				'operator' => '==',
				'value'    => 'page-templates/template-home.php',
			),
		),
	),
) );
