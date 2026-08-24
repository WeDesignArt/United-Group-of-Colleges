<?php
/**
 * Handles the Request Information form POST: nonce check, server-side
 * validation, optional reCAPTCHA verification, saves a Lead post, emails
 * the site admin, then redirects back to the page with a status flag
 * (?submitted=success / ?submitted=error) for the template to react to.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function ugc_handle_lead_submission() {
	$redirect = wp_get_referer() ? wp_get_referer() : home_url( '/' );
	$redirect = remove_query_arg( 'submitted', $redirect );

	if ( ! isset( $_POST['ugc_lead_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['ugc_lead_nonce'] ) ), 'ugc_submit_lead' ) ) {
		wp_safe_redirect( add_query_arg( 'submitted', 'error', $redirect ) );
		exit;
	}

	$full_name      = isset( $_POST['full_name'] ) ? sanitize_text_field( wp_unslash( $_POST['full_name'] ) ) : '';
	$phone          = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
	$email          = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$city           = isset( $_POST['city'] ) ? sanitize_text_field( wp_unslash( $_POST['city'] ) ) : '';
	$property       = isset( $_POST['property'] ) ? sanitize_text_field( wp_unslash( $_POST['property'] ) ) : '';
	$campus_model   = isset( $_POST['campus_model'] ) ? sanitize_text_field( wp_unslash( $_POST['campus_model'] ) ) : '';
	$owns_institute = isset( $_POST['owns_institute'] ) ? sanitize_text_field( wp_unslash( $_POST['owns_institute'] ) ) : '';
	$message        = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

	// Required-field validation (mirrors the `required` attributes in the
	// form, but this is the check that actually matters — HTML5 can be bypassed).
	if ( ! $full_name || ! $phone || ! is_email( $email ) || ! $city ) {
		wp_safe_redirect( add_query_arg( 'submitted', 'error', $redirect ) );
		exit;
	}

	// reCAPTCHA — only enforced once a secret key is configured in Theme Settings.
	$secret_key = get_theme_mod( 'recaptcha_secret_key' );
	if ( $secret_key ) {
		$token = isset( $_POST['g-recaptcha-response'] ) ? sanitize_text_field( wp_unslash( $_POST['g-recaptcha-response'] ) ) : '';

		if ( ! $token ) {
			wp_safe_redirect( add_query_arg( 'submitted', 'error', $redirect ) );
			exit;
		}

		$verify = wp_remote_post( 'https://www.google.com/recaptcha/api/siteverify', array(
			'body' => array(
				'secret'   => $secret_key,
				'response' => $token,
				'remoteip' => isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '',
			),
		) );

		$result = is_wp_error( $verify ) ? array( 'success' => false ) : json_decode( wp_remote_retrieve_body( $verify ), true );

		if ( empty( $result['success'] ) ) {
			wp_safe_redirect( add_query_arg( 'submitted', 'error', $redirect ) );
			exit;
		}
	}

	$lead_id = wp_insert_post( array(
		'post_type'   => 'ugc_lead',
		'post_title'  => $full_name . ' — ' . $city,
		'post_status' => 'publish',
	) );

	if ( $lead_id && ! is_wp_error( $lead_id ) ) {
		update_post_meta( $lead_id, 'full_name', $full_name );
		update_post_meta( $lead_id, 'phone', $phone );
		update_post_meta( $lead_id, 'email', $email );
		update_post_meta( $lead_id, 'city', $city );
		update_post_meta( $lead_id, 'property', $property );
		update_post_meta( $lead_id, 'campus_model', $campus_model );
		update_post_meta( $lead_id, 'owns_institute', $owns_institute );
		update_post_meta( $lead_id, 'message', $message );

		ugc_notify_admin_of_lead( $full_name, $phone, $email, $city, $property, $campus_model, $owns_institute, $message );

		wp_safe_redirect( add_query_arg( 'submitted', 'success', $redirect ) );
		exit;
	}

	wp_safe_redirect( add_query_arg( 'submitted', 'error', $redirect ) );
	exit;
}
add_action( 'admin_post_nopriv_ugc_submit_lead', 'ugc_handle_lead_submission' );
add_action( 'admin_post_ugc_submit_lead', 'ugc_handle_lead_submission' );

/**
 * Emails the site admin (Settings → General → Administration Email) so a
 * new lead doesn't sit unnoticed in wp-admin until someone happens to check.
 */
function ugc_notify_admin_of_lead( $full_name, $phone, $email, $city, $property, $campus_model, $owns_institute, $message ) {
	$to      = get_option( 'admin_email' );
	$subject = 'New Franchise Lead: ' . $full_name;
	$body    = "A new franchise inquiry was submitted on the website:\n\n"
		. "Name: {$full_name}\n"
		. "Phone: {$phone}\n"
		. "Email: {$email}\n"
		. "City: {$city}\n"
		. "Land/Building available: {$property}\n"
		. "Campus model: {$campus_model}\n"
		. "Owns a school/college/academy: {$owns_institute}\n\n"
		. "Message:\n{$message}\n\n"
		. "View it in wp-admin under Leads.";

	wp_mail( $to, $subject, $body );
}
