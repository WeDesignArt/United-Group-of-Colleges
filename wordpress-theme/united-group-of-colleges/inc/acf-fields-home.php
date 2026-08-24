<?php
/**
 * ACF field group for the Home page template.
 *
 * Built for ACF Free (no Repeater field): every repeating block from the
 * design is a fixed set of numbered Group fields instead (Group is a
 * free-tier field type). That means a fixed max count per section rather
 * than "Add Row" — counts below match what the design actually uses.
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
		array( 'key' => 'field_home_simpler_badge', 'label' => 'Badge Text', 'name' => 'simpler_way_badge', 'type' => 'text', 'default_value' => 'A project of the governing group of the university of southern Punjab, Multan' ),
		array( 'key' => 'field_home_simpler_badge_url_label', 'label' => 'Badge Link Text', 'name' => 'simpler_way_badge_url_label', 'type' => 'text', 'default_value' => 'www.usp.edu.pk' ),
		array( 'key' => 'field_home_simpler_badge_url', 'label' => 'Badge Link', 'name' => 'simpler_way_badge_url', 'type' => 'url', 'default_value' => 'https://www.usp.edu.pk' ),
		array( 'key' => 'field_home_simpler_badge_image', 'label' => 'Badge Image', 'name' => 'simpler_way_badge_image', 'type' => 'image', 'return_format' => 'array' ),
		array(
			'key'          => 'field_home_simpler_heading',
			'label'        => 'Heading',
			'name'         => 'simpler_way_heading',
			'type'         => 'text',
			'instructions' => 'Wrap the highlighted words in &lt;span class="text-accent"&gt;...&lt;/span&gt;.',
			'default_value' => 'A Simpler Way into the <span class="text-accent">Education System</span>',
		),
		array( 'key' => 'field_home_simpler_text', 'label' => 'Intro Text', 'name' => 'simpler_way_text', 'type' => 'textarea', 'rows' => 3 ),

		array( 'key' => 'field_home_simpler_row1', 'label' => 'Row 1', 'name' => 'simpler_way_row_1', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_home_simpler_row1_image', 'label' => 'Image', 'name' => 'image', 'type' => 'image', 'return_format' => 'array' ),
			array( 'key' => 'field_home_simpler_row1_icon', 'label' => 'Icon', 'name' => 'icon', 'type' => 'image', 'return_format' => 'array' ),
			array( 'key' => 'field_home_simpler_row1_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
			array( 'key' => 'field_home_simpler_row1_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
		) ),
		array( 'key' => 'field_home_simpler_row2', 'label' => 'Row 2', 'name' => 'simpler_way_row_2', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_home_simpler_row2_image', 'label' => 'Image', 'name' => 'image', 'type' => 'image', 'return_format' => 'array' ),
			array( 'key' => 'field_home_simpler_row2_icon', 'label' => 'Icon', 'name' => 'icon', 'type' => 'image', 'return_format' => 'array' ),
			array( 'key' => 'field_home_simpler_row2_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
			array( 'key' => 'field_home_simpler_row2_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
		) ),
		array( 'key' => 'field_home_simpler_row3', 'label' => 'Row 3', 'name' => 'simpler_way_row_3', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_home_simpler_row3_image', 'label' => 'Image', 'name' => 'image', 'type' => 'image', 'return_format' => 'array' ),
			array( 'key' => 'field_home_simpler_row3_icon', 'label' => 'Icon', 'name' => 'icon', 'type' => 'image', 'return_format' => 'array' ),
			array( 'key' => 'field_home_simpler_row3_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
			array( 'key' => 'field_home_simpler_row3_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
		) ),

		// ---- Regional Investors ----
		array( 'key' => 'field_home_tab_regional', 'label' => 'Regional Investors Section', 'type' => 'tab' ),
		array(
			'key' => 'field_home_regional_heading', 'label' => 'Heading', 'name' => 'regional_heading', 'type' => 'text',
			'instructions' => 'Wrap the highlighted words in &lt;span class="text-accent"&gt;...&lt;/span&gt;.',
			'default_value' => 'Pathways for <span class="text-accent">Regional Investors</span>',
		),

		array( 'key' => 'field_home_regional_card1', 'label' => 'Card 1', 'name' => 'regional_card_1', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_home_regional_card1_image', 'label' => 'Photo', 'name' => 'image', 'type' => 'image', 'return_format' => 'array' ),
			array( 'key' => 'field_home_regional_card1_icon', 'label' => 'Icon', 'name' => 'icon', 'type' => 'image', 'return_format' => 'array' ),
			array( 'key' => 'field_home_regional_card1_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
			array( 'key' => 'field_home_regional_card1_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text' ),
			array( 'key' => 'field_home_regional_card1_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
		) ),
		array( 'key' => 'field_home_regional_card2', 'label' => 'Card 2', 'name' => 'regional_card_2', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_home_regional_card2_image', 'label' => 'Photo', 'name' => 'image', 'type' => 'image', 'return_format' => 'array' ),
			array( 'key' => 'field_home_regional_card2_icon', 'label' => 'Icon', 'name' => 'icon', 'type' => 'image', 'return_format' => 'array' ),
			array( 'key' => 'field_home_regional_card2_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
			array( 'key' => 'field_home_regional_card2_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text' ),
			array( 'key' => 'field_home_regional_card2_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
		) ),
		array( 'key' => 'field_home_regional_card3', 'label' => 'Card 3', 'name' => 'regional_card_3', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_home_regional_card3_image', 'label' => 'Photo', 'name' => 'image', 'type' => 'image', 'return_format' => 'array' ),
			array( 'key' => 'field_home_regional_card3_icon', 'label' => 'Icon', 'name' => 'icon', 'type' => 'image', 'return_format' => 'array' ),
			array( 'key' => 'field_home_regional_card3_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
			array( 'key' => 'field_home_regional_card3_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text' ),
			array( 'key' => 'field_home_regional_card3_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
		) ),

		// ---- How the Franchise Works (timeline) ----
		array( 'key' => 'field_home_tab_timeline', 'label' => 'How It Works (Timeline)', 'type' => 'tab' ),
		array( 'key' => 'field_home_timeline_heading', 'label' => 'Heading', 'name' => 'timeline_heading', 'type' => 'text', 'default_value' => 'How the UGC Franchise Works' ),

		array( 'key' => 'field_home_timeline_step1', 'label' => 'Step 1', 'name' => 'timeline_step_1', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_home_timeline_step1_icon', 'label' => 'Icon', 'name' => 'icon', 'type' => 'image', 'return_format' => 'array' ),
			array( 'key' => 'field_home_timeline_step1_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
			array( 'key' => 'field_home_timeline_step1_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
		) ),
		array( 'key' => 'field_home_timeline_step2', 'label' => 'Step 2', 'name' => 'timeline_step_2', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_home_timeline_step2_icon', 'label' => 'Icon', 'name' => 'icon', 'type' => 'image', 'return_format' => 'array' ),
			array( 'key' => 'field_home_timeline_step2_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
			array( 'key' => 'field_home_timeline_step2_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
		) ),
		array( 'key' => 'field_home_timeline_step3', 'label' => 'Step 3', 'name' => 'timeline_step_3', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_home_timeline_step3_icon', 'label' => 'Icon', 'name' => 'icon', 'type' => 'image', 'return_format' => 'array' ),
			array( 'key' => 'field_home_timeline_step3_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
			array( 'key' => 'field_home_timeline_step3_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
		) ),
		array( 'key' => 'field_home_timeline_step4', 'label' => 'Step 4', 'name' => 'timeline_step_4', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_home_timeline_step4_icon', 'label' => 'Icon', 'name' => 'icon', 'type' => 'image', 'return_format' => 'array' ),
			array( 'key' => 'field_home_timeline_step4_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
			array( 'key' => 'field_home_timeline_step4_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
		) ),

		// ---- Campus Models ----
		array( 'key' => 'field_home_tab_models', 'label' => 'Campus Models Section', 'type' => 'tab' ),
		array(
			'key' => 'field_home_models_heading', 'label' => 'Heading', 'name' => 'models_heading', 'type' => 'text',
			'instructions' => 'Wrap the highlighted words in &lt;span class="text-accent"&gt;...&lt;/span&gt;.',
			'default_value' => 'Campus Models Tailored to <span class="text-accent">Your Market</span>',
		),
		array( 'key' => 'field_home_models_intro', 'label' => 'Intro Text', 'name' => 'models_intro', 'type' => 'text' ),

		array( 'key' => 'field_home_models_card1', 'label' => 'Model Card 1', 'name' => 'models_card_1', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_home_models_card1_image', 'label' => 'Image', 'name' => 'image', 'type' => 'image', 'return_format' => 'array' ),
			array( 'key' => 'field_home_models_card1_label', 'label' => 'Label (e.g. MODEL A)', 'name' => 'label', 'type' => 'text' ),
			array( 'key' => 'field_home_models_card1_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
			array( 'key' => 'field_home_models_card1_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
			array( 'key' => 'field_home_models_card1_highlight', 'label' => 'Highlight this card', 'name' => 'is_highlighted', 'type' => 'true_false', 'ui' => 1 ),
		) ),
		array( 'key' => 'field_home_models_card2', 'label' => 'Model Card 2', 'name' => 'models_card_2', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_home_models_card2_image', 'label' => 'Image', 'name' => 'image', 'type' => 'image', 'return_format' => 'array' ),
			array( 'key' => 'field_home_models_card2_label', 'label' => 'Label (e.g. MODEL B)', 'name' => 'label', 'type' => 'text' ),
			array( 'key' => 'field_home_models_card2_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
			array( 'key' => 'field_home_models_card2_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
			array( 'key' => 'field_home_models_card2_highlight', 'label' => 'Highlight this card', 'name' => 'is_highlighted', 'type' => 'true_false', 'ui' => 1, 'default_value' => 1 ),
		) ),
		array( 'key' => 'field_home_models_card3', 'label' => 'Model Card 3', 'name' => 'models_card_3', 'type' => 'group', 'sub_fields' => array(
			array( 'key' => 'field_home_models_card3_image', 'label' => 'Image', 'name' => 'image', 'type' => 'image', 'return_format' => 'array' ),
			array( 'key' => 'field_home_models_card3_label', 'label' => 'Label (e.g. MODEL C)', 'name' => 'label', 'type' => 'text' ),
			array( 'key' => 'field_home_models_card3_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
			array( 'key' => 'field_home_models_card3_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 2 ),
			array( 'key' => 'field_home_models_card3_highlight', 'label' => 'Highlight this card', 'name' => 'is_highlighted', 'type' => 'true_false', 'ui' => 1 ),
		) ),

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
		array( 'key' => 'field_home_opportunity_item1', 'label' => 'Item 1', 'name' => 'opportunity_item_1_text', 'type' => 'text' ),
		array( 'key' => 'field_home_opportunity_item2', 'label' => 'Item 2', 'name' => 'opportunity_item_2_text', 'type' => 'text' ),
		array( 'key' => 'field_home_opportunity_item3', 'label' => 'Item 3', 'name' => 'opportunity_item_3_text', 'type' => 'text' ),
		array( 'key' => 'field_home_opportunity_item4', 'label' => 'Item 4', 'name' => 'opportunity_item_4_text', 'type' => 'text' ),

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
