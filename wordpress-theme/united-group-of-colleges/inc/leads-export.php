<?php
/**
 * Leads CSV Export Feature
 * 
 * Provides:
 * 1. "Download Selected Leads (CSV)" button (Blue) - downloads only checked leads.
 * 2. "Download Filtered / All Leads (CSV)" button (Green) - respects active date, city, model, status filters!
 * 3. Bulk Action dropdown: "Export Selected to CSV".
 * 4. Secure download handler with UTF-8 BOM support for Microsoft Excel.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add both "Download Selected" and "Download Filtered / All" buttons on the Leads list table.
 */
function ugc_add_export_buttons_to_leads_list( $which ) {
	global $typenow;

	if ( 'ugc_lead' !== $typenow || 'top' !== $which ) {
		return;
	}

	// Build URL preserving active query parameters (filters/date)
	$current_params = array(
		'action'        => 'ugc_export_leads',
		'export_type'   => 'all',
		'date_from'     => isset( $_GET['date_from'] ) ? sanitize_text_field( wp_unslash( $_GET['date_from'] ) ) : '',
		'date_to'       => isset( $_GET['date_to'] ) ? sanitize_text_field( wp_unslash( $_GET['date_to'] ) ) : '',
		'filter_city'   => isset( $_GET['filter_city'] ) ? sanitize_text_field( wp_unslash( $_GET['filter_city'] ) ) : '',
		'filter_model'  => isset( $_GET['filter_model'] ) ? sanitize_text_field( wp_unslash( $_GET['filter_model'] ) ) : '',
		'filter_status' => isset( $_GET['filter_status'] ) ? sanitize_text_field( wp_unslash( $_GET['filter_status'] ) ) : '',
		's'             => isset( $_GET['s'] ) ? sanitize_text_field( wp_unslash( $_GET['s'] ) ) : '',
	);

	$export_all_url = wp_nonce_url(
		add_query_arg( array_filter( $current_params ), admin_url( 'admin-post.php' ) ),
		'ugc_export_leads_nonce',
		'export_nonce'
	);

	$nonce = wp_create_nonce( 'ugc_export_leads_nonce' );

	$is_filtered = ( ! empty( $current_params['date_from'] ) || ! empty( $current_params['date_to'] ) || ! empty( $current_params['filter_city'] ) || ! empty( $current_params['filter_model'] ) || ! empty( $current_params['filter_status'] ) || ! empty( $current_params['s'] ) );
	$all_btn_label = $is_filtered ? __( 'Download Filtered Leads (CSV)', 'ugc' ) : __( 'Download All Leads (CSV)', 'ugc' );

	?>
	<div class="alignleft actions" style="display: inline-flex; align-items: center; gap: 6px; margin-left: 4px;">
		<!-- Nonce input for table form submission -->
		<input type="hidden" name="ugc_export_nonce" value="<?php echo esc_attr( $nonce ); ?>">

		<!-- Button 1: Download Selected Leads (Blue) -->
		<button type="submit" name="ugc_lead_export_action" value="selected" id="ugc-export-selected-btn" class="button button-primary" style="background-color: #2563eb; border-color: #1d4ed8; color: #fff; font-weight: 600; display: inline-flex; align-items: center; gap: 4px; box-shadow: 0 1px 2px rgba(0,0,0,0.1);">
			<span class="dashicons dashicons-yes-alt" style="line-height: inherit; font-size: 16px; margin-top: 1px;"></span>
			<span id="ugc-selected-btn-text"><?php esc_html_e( 'Download Selected Leads (CSV)', 'ugc' ); ?></span>
		</button>

		<!-- Button 2: Download All / Filtered Leads (Green) -->
		<a href="<?php echo esc_url( $export_all_url ); ?>" class="button" style="background-color: #10b981; border-color: #059669; color: #fff; font-weight: 600; display: inline-flex; align-items: center; gap: 4px; box-shadow: 0 1px 2px rgba(0,0,0,0.1);">
			<span class="dashicons dashicons-download" style="line-height: inherit; font-size: 16px; margin-top: 1px;"></span>
			<?php echo esc_html( $all_btn_label ); ?>
		</a>
	</div>

	<script type="text/javascript">
	(function($) {
		$(document).ready(function() {
			function updateCount() {
				var checked = $('input[name="post[]"]:checked').length;
				if (checked > 0) {
					$('#ugc-selected-btn-text').text("Download Selected Leads (" + checked + ")");
				} else {
					$('#ugc-selected-btn-text').text("Download Selected Leads (CSV)");
				}
			}

			$(document).on('change', 'input[name="post[]"], #cb-select-all-1, #cb-select-all-2', function() {
				updateCount();
			});

			$('#ugc-export-selected-btn').on('click', function(e) {
				var checked = $('input[name="post[]"]:checked').length;
				if (checked === 0) {
					e.preventDefault();
					alert("Pehle koi lead select karein (checkbox par tick lagayein).");
				}
			});
		});
	})(jQuery);
	</script>
	<?php
}
add_action( 'manage_posts_extra_tablenav', 'ugc_add_export_buttons_to_leads_list' );

/**
 * Handle export requests submitted from the Leads list table.
 */
function ugc_check_leads_table_export_submission() {
	global $typenow, $pagenow;

	if ( 'edit.php' !== $pagenow || 'ugc_lead' !== $typenow ) {
		return;
	}

	if ( isset( $_REQUEST['ugc_lead_export_action'] ) && 'selected' === $_REQUEST['ugc_lead_export_action'] ) {
		if ( ! current_user_can( 'edit_posts' ) ) {
			wp_die( esc_html__( 'You do not have permission to export leads.', 'ugc' ) );
		}

		$nonce = isset( $_REQUEST['ugc_export_nonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['ugc_export_nonce'] ) ) : '';
		if ( ! $nonce || ! wp_verify_nonce( $nonce, 'ugc_export_leads_nonce' ) ) {
			wp_die( esc_html__( 'Invalid security token. Please refresh and try again.', 'ugc' ) );
		}

		$post_ids = isset( $_REQUEST['post'] ) ? array_map( 'intval', (array) $_REQUEST['post'] ) : array();

		if ( empty( $post_ids ) ) {
			wp_die( esc_html__( 'No leads selected. Please check at least one lead checkbox.', 'ugc' ) );
		}

		ugc_generate_leads_csv( $post_ids );
		exit;
	}
}
add_action( 'load-edit.php', 'ugc_check_leads_table_export_submission' );

/**
 * Add "Export to CSV" to the standard WordPress Bulk Actions dropdown.
 */
function ugc_register_bulk_export_lead_action( $bulk_actions ) {
	$bulk_actions['ugc_bulk_export_leads'] = __( 'Export Selected to CSV', 'ugc' );
	return $bulk_actions;
}
add_filter( 'bulk_actions-edit-ugc_lead', 'ugc_register_bulk_export_lead_action' );

/**
 * Handle the standard WordPress Bulk Action dropdown submission.
 */
function ugc_handle_bulk_export_leads( $redirect_to, $doaction, $post_ids ) {
	if ( 'ugc_bulk_export_leads' !== $doaction || empty( $post_ids ) ) {
		return $redirect_to;
	}

	if ( ! current_user_can( 'edit_posts' ) ) {
		wp_die( esc_html__( 'You do not have permission to export leads.', 'ugc' ) );
	}

	ugc_generate_leads_csv( $post_ids );
	exit;
}
add_filter( 'handle_bulk_actions-edit-ugc_lead', 'ugc_handle_bulk_export_leads', 10, 3 );

/**
 * Handle the "Download All / Filtered Leads" direct link action.
 */
function ugc_handle_export_all_leads() {
	if ( ! current_user_can( 'edit_posts' ) ) {
		wp_die( esc_html__( 'You do not have permission to export leads.', 'ugc' ) );
	}

	$nonce = isset( $_GET['export_nonce'] ) ? sanitize_text_field( wp_unslash( $_GET['export_nonce'] ) ) : '';

	if ( ! $nonce || ! wp_verify_nonce( $nonce, 'ugc_export_leads_nonce' ) ) {
		wp_die( esc_html__( 'Invalid or expired export request.', 'ugc' ) );
	}

	$filters = array(
		'date_from'     => isset( $_GET['date_from'] ) ? sanitize_text_field( wp_unslash( $_GET['date_from'] ) ) : '',
		'date_to'       => isset( $_GET['date_to'] ) ? sanitize_text_field( wp_unslash( $_GET['date_to'] ) ) : '',
		'filter_city'   => isset( $_GET['filter_city'] ) ? sanitize_text_field( wp_unslash( $_GET['filter_city'] ) ) : '',
		'filter_model'  => isset( $_GET['filter_model'] ) ? sanitize_text_field( wp_unslash( $_GET['filter_model'] ) ) : '',
		'filter_status' => isset( $_GET['filter_status'] ) ? sanitize_text_field( wp_unslash( $_GET['filter_status'] ) ) : '',
		's'             => isset( $_GET['s'] ) ? sanitize_text_field( wp_unslash( $_GET['s'] ) ) : '',
	);

	ugc_generate_leads_csv( null, $filters );
	exit;
}
add_action( 'admin_post_ugc_export_leads', 'ugc_handle_export_all_leads' );

/**
 * Helper function to generate and stream the CSV file to the browser.
 *
 * @param array|null $post_ids Specific lead post IDs to export, or null for query export.
 * @param array|null $filters  Active filters if doing a filtered export.
 */
function ugc_generate_leads_csv( $post_ids = null, $filters = null ) {
	global $wpdb;

	if ( ob_get_level() ) {
		ob_end_clean();
	}

	$is_selected = ( ! empty( $post_ids ) && is_array( $post_ids ) );
	$suffix      = $is_selected ? '-selected-' . count( $post_ids ) : '-leads';
	$filename    = 'ugc' . $suffix . '-' . gmdate( 'Y-m-d_H-i-s' ) . '.csv';

	header( 'Content-Type: text/csv; charset=UTF-8' );
	header( 'Content-Disposition: attachment; filename="' . $filename . '"' );
	header( 'Pragma: no-cache' );
	header( 'Expires: 0' );

	$output = fopen( 'php://output', 'w' );

	// UTF-8 BOM for proper Urdu/Unicode rendering in Microsoft Excel
	fputs( $output, "\xEF\xBB\xBF" );

	// CSV Header row
	$headers = array(
		'Lead ID',
		'Status',
		'Date Submitted',
		'Full Name',
		'Phone / WhatsApp',
		'Email',
		'City / Division',
		'Land / Building Available',
		'Campus Model',
		'Owns School / College',
		'Message from Visitor',
		'Admin Notes',
	);
	fputcsv( $output, $headers );

	$query_args = array(
		'post_type'      => 'ugc_lead',
		'post_status'    => array( 'publish', 'private', 'draft' ),
		'posts_per_page' => -1,
		'orderby'        => 'date',
		'order'          => 'DESC',
	);

	if ( $is_selected ) {
		$query_args['post__in'] = array_map( 'intval', $post_ids );
	} elseif ( ! empty( $filters ) && is_array( $filters ) ) {
		// Apply Date filters
		$date_from = ! empty( $filters['date_from'] ) ? $filters['date_from'] : '';
		$date_to   = ! empty( $filters['date_to'] ) ? $filters['date_to'] : '';

		if ( $date_from || $date_to ) {
			$date_query = array( 'inclusive' => true );
			if ( $date_from ) {
				$date_query['after'] = $date_from . ' 00:00:00';
			}
			if ( $date_to ) {
				$date_query['before'] = $date_to . ' 23:59:59';
			}
			$query_args['date_query'] = array( $date_query );
		}

		// Meta filters
		$meta_query = array( 'relation' => 'AND' );
		if ( ! empty( $filters['filter_city'] ) ) {
			$meta_query[] = array( 'key' => 'city', 'value' => $filters['filter_city'], 'compare' => '=' );
		}
		if ( ! empty( $filters['filter_model'] ) ) {
			$meta_query[] = array( 'key' => 'campus_model', 'value' => $filters['filter_model'], 'compare' => '=' );
		}
		if ( ! empty( $filters['filter_status'] ) ) {
			$meta_query[] = array( 'key' => 'lead_status', 'value' => $filters['filter_status'], 'compare' => '=' );
		}
		if ( count( $meta_query ) > 1 ) {
			$query_args['meta_query'] = $meta_query;
		}

		// Search term filter
		if ( ! empty( $filters['s'] ) ) {
			$term = sanitize_text_field( $filters['s'] );
			$like = '%' . $wpdb->esc_like( $term ) . '%';
			$meta_post_ids = $wpdb->get_col( $wpdb->prepare(
				"SELECT DISTINCT post_id FROM {$wpdb->postmeta}
				WHERE meta_key IN ('full_name', 'phone', 'email', 'city', 'message')
				AND meta_value LIKE %s",
				$like
			) );
			if ( ! empty( $meta_post_ids ) ) {
				$query_args['post__in'] = array_map( 'intval', $meta_post_ids );
			} else {
				$query_args['s'] = $term;
			}
		}
	}

	$leads_query = new WP_Query( $query_args );
	$statuses    = function_exists( 'ugc_get_lead_statuses' ) ? ugc_get_lead_statuses() : array();

	if ( $leads_query->have_posts() ) {
		while ( $leads_query->have_posts() ) {
			$leads_query->the_post();
			$lead_id = get_the_ID();

			$status_key = get_post_meta( $lead_id, 'lead_status', true );
			$status_lbl = ( $status_key && isset( $statuses[ $status_key ] ) ) ? $statuses[ $status_key ]['label'] : 'New';

			$row = array(
				$lead_id,
				$status_lbl,
				get_the_date( 'Y-m-d H:i:s', $lead_id ),
				get_post_meta( $lead_id, 'full_name', true ),
				get_post_meta( $lead_id, 'phone', true ),
				get_post_meta( $lead_id, 'email', true ),
				get_post_meta( $lead_id, 'city', true ),
				get_post_meta( $lead_id, 'property', true ),
				get_post_meta( $lead_id, 'campus_model', true ),
				get_post_meta( $lead_id, 'owns_institute', true ),
				get_post_meta( $lead_id, 'message', true ),
				get_post_meta( $lead_id, 'admin_notes', true ),
			);

			fputcsv( $output, $row );
		}
		wp_reset_postdata();
	}

	fclose( $output );
	exit;
}
