<?php
/**
 * UGC theme bootstrap: theme support, menus, asset loading, and ACF includes.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'UGC_THEME_VERSION', '1.0.0' );

/**
 * Theme setup.
 */
function ugc_theme_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'custom-logo' );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu (Header)', 'ugc' ),
		'footer'  => __( 'Footer Menu', 'ugc' ),
	) );
}
add_action( 'after_setup_theme', 'ugc_theme_setup' );

/**
 * Enqueue styles and scripts.
 *
 * The theme's actual visual CSS lives in assets/css/main.css (base theme
 * framework) and assets/css/style.css (site-specific styling) — both are
 * carried over unchanged from the original static build.
 */
function ugc_theme_assets() {
	wp_enqueue_style( 'ugc-google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap', array(), null );
	wp_enqueue_style( 'ugc-main', get_template_directory_uri() . '/assets/css/main.css', array(), UGC_THEME_VERSION );
	wp_enqueue_style( 'ugc-style', get_template_directory_uri() . '/assets/css/style.css', array( 'ugc-main' ), UGC_THEME_VERSION );

	// vendor.js / app.js expect a global jQuery — WordPress's bundled copy covers that,
	// so there's no need to ship a separate jquery.js file.
	wp_enqueue_script( 'ugc-vendor', get_template_directory_uri() . '/assets/js/vendor.js', array( 'jquery' ), UGC_THEME_VERSION, true );
	wp_enqueue_script( 'ugc-app', get_template_directory_uri() . '/assets/js/app.js', array( 'jquery', 'ugc-vendor' ), UGC_THEME_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'ugc_theme_assets' );

/**
 * Match the static build's `.current` styling on the active nav link.
 * WordPress marks the <li> with `current-menu-item`; this mirrors that onto
 * the <a> itself so the existing CSS (`.main_nav_list a.current`) keeps working.
 */
function ugc_nav_current_class( $atts, $item ) {
	if ( in_array( 'current-menu-item', $item->classes, true ) || in_array( 'current-menu-ancestor', $item->classes, true ) ) {
		$atts['class'] = isset( $atts['class'] ) ? $atts['class'] . ' current' : 'current';
	}
	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'ugc_nav_current_class', 10, 2 );

/**
 * Outputs a menu as bare <a> tags with no <ul>/<li> wrapper — the footer
 * nav in the original design is a flat flex row of links, not a list.
 */
class UGC_Flat_Link_Walker extends Walker_Nav_Menu {
	public function start_lvl( &$output, $depth = 0, $args = null ) {}
	public function end_lvl( &$output, $depth = 0, $args = null ) {}

	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		if ( in_array( 'current-menu-item', $classes, true ) ) {
			$classes[] = 'current';
		}
		$class_attr = $classes ? ' class="' . esc_attr( implode( ' ', array_filter( $classes ) ) ) . '"' : '';
		$output    .= '<a href="' . esc_url( $item->url ) . '"' . $class_attr . '>' . esc_html( $item->title ) . '</a>';
	}

	public function end_el( &$output, $item, $depth = 0, $args = null ) {}
}

/**
 * ACF field groups and options page.
 */
require_once get_template_directory() . '/inc/acf-fields-options.php';
require_once get_template_directory() . '/inc/acf-fields-home.php';
require_once get_template_directory() . '/inc/acf-fields-about.php';
require_once get_template_directory() . '/inc/acf-fields-franchise.php';
require_once get_template_directory() . '/inc/acf-fields-programmes.php';
require_once get_template_directory() . '/inc/acf-fields-faq.php';
require_once get_template_directory() . '/inc/acf-fields-request-information.php';

/**
 * Small helper: print an ACF text field that may contain a hand-authored
 * <span class="text-accent">...</span> for the highlighted word(s) in a
 * heading. wp_kses_post keeps it safe while still allowing that span.
 */
function ugc_accent_heading( $field_name, $tag = 'h2', $extra_class = '' ) {
	$value = get_field( $field_name );
	if ( ! $value ) {
		return;
	}
	$class = $extra_class ? ' class="' . esc_attr( $extra_class ) . '"' : '';
	echo '<' . $tag . $class . '>' . wp_kses_post( $value ) . '</' . $tag . '>';
}

/**
 * Small helper: resolve an ACF image field (array return format) down to a
 * [url, alt] pair, whether a field is filled in or not.
 */
function ugc_image_field( $field_name, $fallback_alt = '' ) {
	$img = get_field( $field_name );
	if ( is_array( $img ) && ! empty( $img['url'] ) ) {
		return array( $img['url'], $img['alt'] ? $img['alt'] : $fallback_alt );
	}
	return array( '', $fallback_alt );
}

/**
 * Same as ugc_image_field(), but reads an image sub-field from inside the
 * current have_rows()/the_row() repeater iteration via get_sub_field().
 */
function ugc_image_field_sub( $field_name, $fallback_alt = '' ) {
	$img = get_sub_field( $field_name );
	if ( is_array( $img ) && ! empty( $img['url'] ) ) {
		return array( $img['url'], $img['alt'] ? $img['alt'] : $fallback_alt );
	}
	return array( '', $fallback_alt );
}
