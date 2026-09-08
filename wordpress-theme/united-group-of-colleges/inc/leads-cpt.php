<?php
/**
 * "Leads" custom post type:
 * - Private CPT (admin only)
 * - Custom admin table columns with status badges
 * - Sortable columns
 * - Multi-criteria deep search (Name, Phone, Email, City, Message)
 * - Date range, City, Model, and Status filtering
 * - Lead status management (New, Contacted, Interested, Converted, Closed)
 * - Metrics / KPI dashboard bar
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register CPT.
 */
function ugc_register_lead_cpt() {
	register_post_type( 'ugc_lead', array(
		'labels' => array(
			'name'               => 'Leads',
			'singular_name'      => 'Lead',
			'menu_name'          => 'Leads',
			'all_items'          => 'All Leads',
			'view_item'          => 'View Lead',
			'search_items'       => 'Search Leads',
			'not_found'          => 'No leads found.',
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
			'create_posts' => 'do_not_allow',
		),
		'has_archive'        => false,
		'rewrite'            => false,
	) );
}
add_action( 'init', 'ugc_register_lead_cpt' );

/**
 * Status Definitions & Badges helper.
 */
function ugc_get_lead_statuses() {
	return array(
		'new'            => array( 'label' => 'New', 'bg' => '#fef3c7', 'color' => '#92400e', 'border' => '#fde68a' ),
		'contacted'      => array( 'label' => 'Contacted', 'bg' => '#e0e7ff', 'color' => '#3730a3', 'border' => '#c7d2fe' ),
		'interested'     => array( 'label' => 'Interested', 'bg' => '#d1fae5', 'color' => '#065f46', 'border' => '#a7f3d0' ),
		'converted'      => array( 'label' => 'Converted / Franchise Closed', 'bg' => '#dcfce7', 'color' => '#166534', 'border' => '#86efac' ),
		'not_interested' => array( 'label' => 'Not Interested', 'bg' => '#fee2e2', 'color' => '#991b1b', 'border' => '#fecaca' ),
	);
}

/**
 * Admin list table columns.
 */
function ugc_lead_columns( $columns ) {
	unset( $columns['date'] );
	$columns['lead_status'] = 'Status';
	$columns['lead_name']   = 'Name';
	$columns['lead_phone']  = 'Phone / WhatsApp';
	$columns['lead_email']  = 'Email';
	$columns['lead_city']   = 'City';
	$columns['lead_model']  = 'Campus Model';
	$columns['date']        = 'Submitted Date';
	return $columns;
}
add_filter( 'manage_ugc_lead_posts_columns', 'ugc_lead_columns' );

/**
 * Admin list table column content.
 */
function ugc_lead_column_content( $column, $post_id ) {
	$statuses = ugc_get_lead_statuses();

	switch ( $column ) {
		case 'lead_status':
			$status_key = get_post_meta( $post_id, 'lead_status', true );
			if ( ! $status_key || ! isset( $statuses[ $status_key ] ) ) {
				$status_key = 'new';
			}
			$st = $statuses[ $status_key ];
			echo '<span style="display:inline-block; padding:3px 9px; border-radius:12px; font-size:11px; font-weight:700; background-color:' . esc_attr( $st['bg'] ) . '; color:' . esc_attr( $st['color'] ) . '; border:1px solid ' . esc_attr( $st['border'] ) . ';">' . esc_html( $st['label'] ) . '</span>';
			break;

		case 'lead_name':
			$name = get_post_meta( $post_id, 'full_name', true );
			echo '<strong>' . esc_html( $name ? $name : get_the_title( $post_id ) ) . '</strong>';
			break;

		case 'lead_phone':
			$phone = get_post_meta( $post_id, 'phone', true );
			if ( $phone ) {
				$clean_phone = preg_replace( '/[^0-9+]/', '', $phone );
				echo '<a href="tel:' . esc_attr( $clean_phone ) . '">' . esc_html( $phone ) . '</a>';
				echo ' <a href="https://wa.me/' . esc_attr( ltrim( $clean_phone, '+' ) ) . '" target="_blank" title="Chat on WhatsApp" style="text-decoration:none; margin-left:3px;">💬</a>';
			}
			break;

		case 'lead_email':
			$email = get_post_meta( $post_id, 'email', true );
			if ( $email ) {
				echo '<a href="mailto:' . esc_attr( $email ) . '">' . esc_html( $email ) . '</a>';
			}
			break;

		case 'lead_city':
			echo esc_html( get_post_meta( $post_id, 'city', true ) );
			break;

		case 'lead_model':
			$model = get_post_meta( $post_id, 'campus_model', true );
			echo esc_html( $model ? ucfirst( $model ) : '—' );
			break;
	}
}
add_action( 'manage_ugc_lead_posts_custom_column', 'ugc_lead_column_content', 10, 2 );

/**
 * Make columns sortable.
 */
function ugc_lead_sortable_columns( $columns ) {
	$columns['lead_name']   = 'lead_name';
	$columns['lead_city']   = 'lead_city';
	$columns['lead_model']  = 'lead_model';
	$columns['lead_status'] = 'lead_status';
	$columns['date']        = 'date';
	return $columns;
}
add_filter( 'manage_edit-ugc_lead_sortable_columns', 'ugc_lead_sortable_columns' );

/**
 * Handle custom column ordering in WP_Query.
 */
function ugc_lead_orderby_custom_columns( $query ) {
	if ( ! is_admin() || ! $query->is_main_query() || 'ugc_lead' !== $query->get( 'post_type' ) ) {
		return;
	}

	$orderby = $query->get( 'orderby' );

	switch ( $orderby ) {
		case 'lead_name':
			$query->set( 'meta_key', 'full_name' );
			$query->set( 'orderby', 'meta_value' );
			break;
		case 'lead_city':
			$query->set( 'meta_key', 'city' );
			$query->set( 'orderby', 'meta_value' );
			break;
		case 'lead_model':
			$query->set( 'meta_key', 'campus_model' );
			$query->set( 'orderby', 'meta_value' );
			break;
		case 'lead_status':
			$query->set( 'meta_key', 'lead_status' );
			$query->set( 'orderby', 'meta_value' );
			break;
	}
}
add_action( 'pre_get_posts', 'ugc_lead_orderby_custom_columns' );

/**
 * Top Metrics Summary Banner on Leads List Page.
 */
function ugc_lead_admin_metrics_banner() {
	global $pagenow, $typenow;

	if ( 'edit.php' !== $pagenow || 'ugc_lead' !== $typenow ) {
		return;
	}

	// Calculate counts
	$total_leads = wp_count_posts( 'ugc_lead' )->publish;

	$today_query = new WP_Query( array(
		'post_type'      => 'ugc_lead',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'date_query'     => array(
			array(
				'year'  => gmdate( 'Y' ),
				'month' => gmdate( 'm' ),
				'day'   => gmdate( 'd' ),
			),
		),
		'fields'         => 'ids',
	) );
	$today_count = $today_query->found_posts;

	$month_query = new WP_Query( array(
		'post_type'      => 'ugc_lead',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'date_query'     => array(
			array(
				'year'  => gmdate( 'Y' ),
				'month' => gmdate( 'm' ),
			),
		),
		'fields'         => 'ids',
	) );
	$month_count = $month_query->found_posts;

	$new_query = new WP_Query( array(
		'post_type'      => 'ugc_lead',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'meta_query'     => array(
			'relation' => 'OR',
			array(
				'key'     => 'lead_status',
				'value'   => 'new',
				'compare' => '=',
			),
			array(
				'key'     => 'lead_status',
				'compare' => 'NOT EXISTS',
			),
		),
		'fields'         => 'ids',
	) );
	$new_count = $new_query->found_posts;

	?>
	<div style="display:flex; gap:15px; margin: 15px 0 10px 0; flex-wrap: wrap;">
		<div style="flex:1; min-width:160px; background:#fff; border:1px solid #e2e8f0; border-radius:8px; padding:12px 16px; box-shadow:0 1px 3px rgba(0,0,0,0.05); border-left:4px solid #3b82f6;">
			<div style="font-size:12px; color:#64748b; font-weight:600; text-transform:uppercase;">Total Leads</div>
			<div style="font-size:24px; font-weight:800; color:#1e293b; margin-top:4px;"><?php echo esc_html( number_format_i18n( $total_leads ) ); ?></div>
		</div>
		<div style="flex:1; min-width:160px; background:#fff; border:1px solid #e2e8f0; border-radius:8px; padding:12px 16px; box-shadow:0 1px 3px rgba(0,0,0,0.05); border-left:4px solid #f59e0b;">
			<div style="font-size:12px; color:#64748b; font-weight:600; text-transform:uppercase;">New / Pending</div>
			<div style="font-size:24px; font-weight:800; color:#d97706; margin-top:4px;"><?php echo esc_html( number_format_i18n( $new_count ) ); ?></div>
		</div>
		<div style="flex:1; min-width:160px; background:#fff; border:1px solid #e2e8f0; border-radius:8px; padding:12px 16px; box-shadow:0 1px 3px rgba(0,0,0,0.05); border-left:4px solid #10b981;">
			<div style="font-size:12px; color:#64748b; font-weight:600; text-transform:uppercase;">This Month</div>
			<div style="font-size:24px; font-weight:800; color:#059669; margin-top:4px;"><?php echo esc_html( number_format_i18n( $month_count ) ); ?></div>
		</div>
		<div style="flex:1; min-width:160px; background:#fff; border:1px solid #e2e8f0; border-radius:8px; padding:12px 16px; box-shadow:0 1px 3px rgba(0,0,0,0.05); border-left:4px solid #8b5cf6;">
			<div style="font-size:12px; color:#64748b; font-weight:600; text-transform:uppercase;">Today's Leads</div>
			<div style="font-size:24px; font-weight:800; color:#6d28d9; margin-top:4px;"><?php echo esc_html( number_format_i18n( $today_count ) ); ?></div>
		</div>
	</div>
	<?php
}
add_action( 'all_admin_notices', 'ugc_lead_admin_metrics_banner' );

/**
 * Filter dropdowns in Admin Table (Date Range, City, Model, Status).
 */
function ugc_lead_admin_filters() {
	global $typenow, $wpdb;

	if ( 'ugc_lead' !== $typenow ) {
		return;
	}

	$selected_city   = isset( $_GET['filter_city'] ) ? sanitize_text_field( wp_unslash( $_GET['filter_city'] ) ) : '';
	$selected_model  = isset( $_GET['filter_model'] ) ? sanitize_text_field( wp_unslash( $_GET['filter_model'] ) ) : '';
	$selected_status = isset( $_GET['filter_status'] ) ? sanitize_text_field( wp_unslash( $_GET['filter_status'] ) ) : '';
	$date_from       = isset( $_GET['date_from'] ) ? sanitize_text_field( wp_unslash( $_GET['date_from'] ) ) : '';
	$date_to         = isset( $_GET['date_to'] ) ? sanitize_text_field( wp_unslash( $_GET['date_to'] ) ) : '';

	// Get unique cities from database
	$cities = $wpdb->get_col( $wpdb->prepare(
		"SELECT DISTINCT meta_value FROM {$wpdb->postmeta} pm
		INNER JOIN {$wpdb->posts} p ON p.ID = pm.post_id
		WHERE p.post_type = %s AND pm.meta_key = 'city' AND pm.meta_value != ''
		ORDER BY pm.meta_value ASC",
		'ugc_lead'
	) );

	// Date Range Inputs
	?>
	<span style="display:inline-flex; align-items:center; gap:3px; margin: 0 4px;">
		<span style="font-size:12px; color:#64748b; font-weight:600;">From:</span>
		<input type="date" name="date_from" value="<?php echo esc_attr( $date_from ); ?>" style="padding: 2px 6px; font-size: 13px; height: 30px; border-radius: 4px; border: 1px solid #8c8f94;">
	</span>
	<span style="display:inline-flex; align-items:center; gap:3px; margin: 0 4px;">
		<span style="font-size:12px; color:#64748b; font-weight:600;">To:</span>
		<input type="date" name="date_to" value="<?php echo esc_attr( $date_to ); ?>" style="padding: 2px 6px; font-size: 13px; height: 30px; border-radius: 4px; border: 1px solid #8c8f94;">
	</span>

	<!-- City Filter -->
	<select name="filter_city">
		<option value=""><?php esc_html_e( 'All Cities', 'ugc' ); ?></option>
		<?php foreach ( $cities as $city ) : ?>
			<option value="<?php echo esc_attr( $city ); ?>" <?php selected( $selected_city, $city ); ?>>
				<?php echo esc_html( ucfirst( $city ) ); ?>
			</option>
		<?php endforeach; ?>
	</select>

	<!-- Model Filter -->
	<select name="filter_model">
		<option value=""><?php esc_html_e( 'All Campus Models', 'ugc' ); ?></option>
		<option value="model-a" <?php selected( $selected_model, 'model-a' ); ?>>Model A</option>
		<option value="model-b" <?php selected( $selected_model, 'model-b' ); ?>>Model B</option>
		<option value="model-c" <?php selected( $selected_model, 'model-c' ); ?>>Model C</option>
		<option value="undecided" <?php selected( $selected_model, 'undecided' ); ?>>Undecided</option>
	</select>

	<!-- Status Filter -->
	<select name="filter_status">
		<option value=""><?php esc_html_e( 'All Statuses', 'ugc' ); ?></option>
		<?php foreach ( ugc_get_lead_statuses() as $key => $st ) : ?>
			<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $selected_status, $key ); ?>>
				<?php echo esc_html( $st['label'] ); ?>
			</option>
		<?php endforeach; ?>
	</select>
	<?php
}
add_action( 'restrict_manage_posts', 'ugc_lead_admin_filters' );

/**
 * Filter the Leads list query according to selected filters.
 */
function ugc_lead_filter_query( $query ) {
	global $pagenow;

	if ( ! is_admin() || ! $query->is_main_query() || 'edit.php' !== $pagenow || 'ugc_lead' !== $query->get( 'post_type' ) ) {
		return;
	}

	$meta_query = array( 'relation' => 'AND' );

	// Filter by City
	if ( ! empty( $_GET['filter_city'] ) ) {
		$meta_query[] = array(
			'key'     => 'city',
			'value'   => sanitize_text_field( wp_unslash( $_GET['filter_city'] ) ),
			'compare' => '=',
		);
	}

	// Filter by Campus Model
	if ( ! empty( $_GET['filter_model'] ) ) {
		$meta_query[] = array(
			'key'     => 'campus_model',
			'value'   => sanitize_text_field( wp_unslash( $_GET['filter_model'] ) ),
			'compare' => '=',
		);
	}

	// Filter by Status
	if ( ! empty( $_GET['filter_status'] ) ) {
		$meta_query[] = array(
			'key'     => 'lead_status',
			'value'   => sanitize_text_field( wp_unslash( $_GET['filter_status'] ) ),
			'compare' => '=',
		);
	}

	if ( count( $meta_query ) > 1 ) {
		$query->set( 'meta_query', $meta_query );
	}

	// Filter by Date Range
	$date_from = ! empty( $_GET['date_from'] ) ? sanitize_text_field( wp_unslash( $_GET['date_from'] ) ) : '';
	$date_to   = ! empty( $_GET['date_to'] ) ? sanitize_text_field( wp_unslash( $_GET['date_to'] ) ) : '';

	if ( $date_from || $date_to ) {
		$date_query = array( 'inclusive' => true );
		if ( $date_from ) {
			$date_query['after'] = $date_from . ' 00:00:00';
		}
		if ( $date_to ) {
			$date_query['before'] = $date_to . ' 23:59:59';
		}
		$query->set( 'date_query', array( $date_query ) );
	}
}
add_action( 'pre_get_posts', 'ugc_lead_filter_query' );

/**
 * Deep Search across meta fields (Name, Phone, Email, City, Message).
 */
function ugc_lead_deep_search( $search, $query ) {
	global $wpdb;

	if ( ! is_admin() || ! $query->is_main_query() || 'ugc_lead' !== $query->get( 'post_type' ) || empty( $query->get( 's' ) ) ) {
		return $search;
	}

	$term = sanitize_text_field( $query->get( 's' ) );
	$like = '%' . $wpdb->esc_like( $term ) . '%';

	$meta_post_ids = $wpdb->get_col( $wpdb->prepare(
		"SELECT DISTINCT post_id FROM {$wpdb->postmeta}
		WHERE meta_key IN ('full_name', 'phone', 'email', 'city', 'message')
		AND meta_value LIKE %s",
		$like
	) );

	if ( ! empty( $meta_post_ids ) ) {
		// Include post title matches or meta matches
		$search = " AND ({$wpdb->posts}.post_title LIKE '{$like}' OR {$wpdb->posts}.ID IN (" . implode( ',', array_map( 'intval', $meta_post_ids ) ) . ")) ";
	}

	return $search;
}
add_filter( 'posts_search', 'ugc_lead_deep_search', 10, 2 );

/**
 * Detail Screen: Read-only table + Editable Status & Notes meta box.
 */
function ugc_lead_meta_boxes() {
	add_meta_box( 'ugc_lead_status_box', 'Lead Management & Status', 'ugc_render_lead_status_box', 'ugc_lead', 'side', 'high' );
	add_meta_box( 'ugc_lead_details', 'Submission Details', 'ugc_render_lead_meta_box', 'ugc_lead', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'ugc_lead_meta_boxes' );

/**
 * Status management side meta box.
 */
function ugc_render_lead_status_box( $post ) {
	wp_nonce_field( 'ugc_save_lead_status', 'ugc_lead_status_nonce' );

	$current_status = get_post_meta( $post->ID, 'lead_status', true );
	if ( ! $current_status ) {
		$current_status = 'new';
	}
	$admin_notes = get_post_meta( $post->ID, 'admin_notes', true );
	$statuses    = ugc_get_lead_statuses();

	?>
	<div style="margin-bottom: 15px;">
		<label for="lead_status" style="font-weight:600; display:block; margin-bottom:5px;">Update Lead Status:</label>
		<select name="lead_status" id="lead_status" style="width:100%;">
			<?php foreach ( $statuses as $key => $st ) : ?>
				<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $current_status, $key ); ?>>
					<?php echo esc_html( $st['label'] ); ?>
				</option>
			<?php endforeach; ?>
		</select>
	</div>

	<div>
		<label for="admin_notes" style="font-weight:600; display:block; margin-bottom:5px;">Admin Private Notes:</label>
		<textarea name="admin_notes" id="admin_notes" rows="4" style="width:100%; border-radius:4px;" placeholder="Add internal notes about this lead (e.g. called on Monday, interested in Model B)..."><?php echo esc_textarea( $admin_notes ); ?></textarea>
	</div>
	<?php
}

/**
 * Save lead status and notes.
 */
function ugc_save_lead_meta( $post_id ) {
	if ( ! isset( $_POST['ugc_lead_status_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['ugc_lead_status_nonce'] ) ), 'ugc_save_lead_status' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( isset( $_POST['lead_status'] ) ) {
		update_post_meta( $post_id, 'lead_status', sanitize_text_field( wp_unslash( $_POST['lead_status'] ) ) );
	}

	if ( isset( $_POST['admin_notes'] ) ) {
		update_post_meta( $post_id, 'admin_notes', sanitize_textarea_field( wp_unslash( $_POST['admin_notes'] ) ) );
	}
}
add_action( 'save_post_ugc_lead', 'ugc_save_lead_meta' );

/**
 * Submission Details Box.
 */
function ugc_render_lead_meta_box( $post ) {
	$fields = array(
		'full_name'      => 'Full Name',
		'phone'          => 'Phone / WhatsApp',
		'email'          => 'Email',
		'city'           => 'City or Division',
		'property'       => 'Land/Building Available',
		'campus_model'   => 'Campus Model Interested In',
		'owns_institute' => 'Owns a School/College/Academy',
		'message'        => 'Message from Visitor',
	);

	echo '<table class="widefat striped" style="border-radius:4px; overflow:hidden;"><tbody>';
	foreach ( $fields as $key => $label ) {
		$value = get_post_meta( $post->ID, $key, true );
		echo '<tr><th style="width:220px; font-weight:600; color:#334155;">' . esc_html( $label ) . '</th><td style="color:#0f172a;">' . nl2br( esc_html( $value ? $value : '—' ) ) . '</td></tr>';
	}
	echo '</tbody></table>';
}

/**
 * Remove slug box.
 */
function ugc_lead_remove_meta_boxes() {
	remove_meta_box( 'slugdiv', 'ugc_lead', 'normal' );
}
add_action( 'admin_menu', 'ugc_lead_remove_meta_boxes' );
