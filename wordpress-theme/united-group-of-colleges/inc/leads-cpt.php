<?php
/**
 * "Leads" custom post type — one entry per Request Information form
 * submission. Private (not publicly queryable/visible on the front end),
 * with a custom admin list view and a read-only detail screen.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function ugc_register_lead_cpt() {
	register_post_type( 'ugc_lead', array(
		'labels' => array(
			'name'               => 'Leads',
			'singular_name'      => 'Lead',
			'menu_name'          => 'Leads',
			'all_items'          => 'All Leads',
			'view_item'          => 'View Lead',
			'search_items'       => 'Search Leads',
			'not_found'          => 'No leads yet.',
			'not_found_in_trash' => 'No leads in Trash.',
		),
		'public'             => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_admin_bar'  => false,
		'show_in_rest'       => false,
		'menu_icon'          => 'dashicons-email-alt2',
		'menu_position'      => 25,
		'supports'           => array( 'title' ),
		'capability_type'    => 'post',
		'map_meta_cap'       => true,
		'capabilities'       => array(
			'create_posts' => 'do_not_allow', // leads are only ever created by the form handler, never manually
		),
		'has_archive'        => false,
		'rewrite'            => false,
	) );
}
add_action( 'init', 'ugc_register_lead_cpt' );

/**
 * Admin list table: swap the default columns for the fields that actually
 * help someone triage leads at a glance.
 */
function ugc_lead_columns( $columns ) {
	unset( $columns['date'] );
	$columns['lead_name']  = 'Name';
	$columns['lead_phone'] = 'Phone';
	$columns['lead_email'] = 'Email';
	$columns['lead_city']  = 'City';
	$columns['lead_model'] = 'Campus Model';
	$columns['date']       = 'Submitted';
	return $columns;
}
add_filter( 'manage_ugc_lead_posts_columns', 'ugc_lead_columns' );

function ugc_lead_column_content( $column, $post_id ) {
	switch ( $column ) {
		case 'lead_name':
			echo esc_html( get_post_meta( $post_id, 'full_name', true ) );
			break;
		case 'lead_phone':
			echo esc_html( get_post_meta( $post_id, 'phone', true ) );
			break;
		case 'lead_email':
			echo esc_html( get_post_meta( $post_id, 'email', true ) );
			break;
		case 'lead_city':
			echo esc_html( get_post_meta( $post_id, 'city', true ) );
			break;
		case 'lead_model':
			echo esc_html( get_post_meta( $post_id, 'campus_model', true ) );
			break;
	}
}
add_action( 'manage_ugc_lead_posts_custom_column', 'ugc_lead_column_content', 10, 2 );

/**
 * Detail screen: a plain read-only table of everything the visitor
 * submitted. Leads are records, not editable content, so this replaces
 * the normal post editor rather than adding editable fields to it.
 */
function ugc_lead_meta_box() {
	add_meta_box( 'ugc_lead_details', 'Submission Details', 'ugc_render_lead_meta_box', 'ugc_lead', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'ugc_lead_meta_box' );

function ugc_render_lead_meta_box( $post ) {
	$fields = array(
		'full_name'      => 'Full Name',
		'phone'          => 'Phone / WhatsApp',
		'email'          => 'Email',
		'city'           => 'City or Division',
		'property'       => 'Land/Building Available',
		'campus_model'   => 'Campus Model Interested In',
		'owns_institute' => 'Owns a School/College/Academy',
		'message'        => 'Message',
	);
	echo '<table class="widefat striped"><tbody>';
	foreach ( $fields as $key => $label ) {
		$value = get_post_meta( $post->ID, $key, true );
		echo '<tr><th style="width:220px;">' . esc_html( $label ) . '</th><td>' . nl2br( esc_html( $value ) ) . '</td></tr>';
	}
	echo '</tbody></table>';
}

/**
 * Hide the permalink UI — leads aren't publicly viewable (public => false,
 * rewrite => false), so a slug/permalink is meaningless here. The Publish
 * box stays: it's still how you Trash/delete a lead from the edit screen.
 */
function ugc_lead_remove_meta_boxes() {
	remove_meta_box( 'slugdiv', 'ugc_lead', 'normal' );
}
add_action( 'admin_menu', 'ugc_lead_remove_meta_boxes' );
