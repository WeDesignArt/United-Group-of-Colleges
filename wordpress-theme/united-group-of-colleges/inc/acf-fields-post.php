<?php
/**
 * ACF field group for regular Blog Posts — an optional author-name override
 * (for posts credited to a source other than the logged-in WP user) and an
 * optional "Key Takeaway" callout box, rendered after the article body on
 * single.php if filled in.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

acf_add_local_field_group( array(
	'key'    => 'group_post_extras',
	'title'  => 'Post Extras',
	'fields' => array(
		array(
			'key'          => 'field_post_author_override',
			'label'        => 'Author Name (override)',
			'name'         => 'author_override',
			'type'         => 'text',
			'instructions' => 'Leave blank to show the logged-in WordPress user\'s name instead.',
		),
		array(
			'key'          => 'field_post_takeaway_title',
			'label'        => 'Title',
			'name'         => 'key_takeaway_title',
			'type'         => 'text',
			'default_value' => 'Key Takeaway',
		),
		array(
			'key'          => 'field_post_takeaway_text',
			'label'        => 'Text',
			'name'         => 'key_takeaway_text',
			'type'         => 'textarea',
			'rows'         => 3,
			'instructions' => 'Leave blank to skip the callout box on this post entirely.',
		),
	),
	'location' => array(
		array(
			array(
				'param'    => 'post_type',
				'operator' => '==',
				'value'    => 'post',
			),
		),
	),
) );
