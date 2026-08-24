<?php
/**
 * UGC theme bootstrap: theme support, menus, asset loading, and ACF includes.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'UGC_THEME_VERSION', '1.0.0' );

/**
 * Site-wide fallback hero banner — shown on any page whose "Hero Image"
 * ACF field hasn't been filled in yet, instead of leaving that area blank.
 */
define( 'UGC_DEFAULT_HERO_IMAGE', 'https://unitedcolleges.com.pk/wp-content/uploads/2026/08/Full-Campus-with-Professional-Programs-Banner.png' );

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

	// reCAPTCHA widget script — only on the Request Information page, and
	// only once a site key is actually configured in Theme Settings.
	if ( is_page_template( 'page-templates/template-request-information.php' ) && get_theme_mod( 'recaptcha_site_key' ) ) {
		wp_enqueue_script( 'google-recaptcha', 'https://www.google.com/recaptcha/api.js', array(), null, true );
	}
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
 * Site-wide header/footer settings (Customizer — no ACF tier requirement).
 */
require_once get_template_directory() . '/inc/customizer.php';

/**
 * "Leads" custom post type + Request Information form handler.
 */
require_once get_template_directory() . '/inc/leads-cpt.php';
require_once get_template_directory() . '/inc/leads-handler.php';

/**
 * ACF field groups, one per page template.
 */
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
 * [url, alt] pair, whether a field is filled in or not. Pass $fallback_url
 * to get a specific image back instead of an empty string when the field
 * is blank (used for hero banners — see UGC_DEFAULT_HERO_IMAGE).
 */
function ugc_image_field( $field_name, $fallback_alt = '', $fallback_url = '' ) {
	$img = get_field( $field_name );
	if ( is_array( $img ) && ! empty( $img['url'] ) ) {
		return array( $img['url'], $img['alt'] ? $img['alt'] : $fallback_alt );
	}
	return array( $fallback_url, $fallback_alt );
}

/**
 * Same as ugc_image_field(), but pulls the image out of an already-fetched
 * Group field array (e.g. `$row = get_field( 'card_1' ); ugc_image_from_group( $row, 'image' )`).
 * Used everywhere a fixed-position Group field stands in for what would
 * otherwise be a repeater row (this theme targets ACF free, which doesn't
 * include the Repeater field type — Group is the free-tier equivalent for
 * a fixed number of items).
 */
function ugc_image_from_group( $group, $key, $fallback_alt = '' ) {
	$img = is_array( $group ) && isset( $group[ $key ] ) ? $group[ $key ] : null;
	if ( is_array( $img ) && ! empty( $img['url'] ) ) {
		return array( $img['url'], $img['alt'] ? $img['alt'] : $fallback_alt );
	}
	return array( '', $fallback_alt );
}

/**
 * Finds whichever page has a given page template assigned and returns its
 * permalink — used for the "Fill Form" floating button so it always points
 * at the real Request Information page regardless of what slug/URL it was
 * given, instead of a hardcoded path that breaks if the page gets renamed.
 */
function ugc_url_for_template( $template_file ) {
	static $cache = array();
	if ( isset( $cache[ $template_file ] ) ) {
		return $cache[ $template_file ];
	}

	$pages = get_posts( array(
		'post_type'      => 'page',
		'post_status'    => 'publish',
		'posts_per_page' => 1,
		'meta_key'       => '_wp_page_template',
		'meta_value'     => $template_file,
	) );

	$url = $pages ? get_permalink( $pages[0] ) : home_url( '/' );
	$cache[ $template_file ] = $url;
	return $url;
}
