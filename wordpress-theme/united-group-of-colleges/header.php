<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#01048F">

	<link rel="apple-touch-icon" href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/fav_icons/icon.png' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<?php
	$footer_whatsapp = get_theme_mod( 'footer_whatsapp' );
	$is_request_info_page = is_page_template( 'page-templates/template-request-information.php' );
	$fillform_url = $is_request_info_page ? '#application-form' : ugc_url_for_template( 'page-templates/template-request-information.php' ) . '#application-form';
	?>
	<!-- Floating action buttons (every page) -->
	<div class="floating-actions">
		<a href="<?php echo esc_url( $fillform_url ); ?>" class="fillform-float" aria-label="<?php echo $is_request_info_page ? 'Jump to the application form' : 'Fill the franchise information form'; ?>">
			<i class="ri-file-edit-line"></i>
			<span>Fill Form</span>
		</a>
		<?php if ( $footer_whatsapp ) : ?>
			<a href="https://wa.me/<?php echo esc_attr( preg_replace( '/\D/', '', $footer_whatsapp ) ); ?>" class="whatsapp-float" target="_blank" rel="noopener" aria-label="Chat on WhatsApp">
				<i class="ri-whatsapp-line"></i>
			</a>
		<?php endif; ?>
	</div>

	<!-- main holder start -->
	<div class="main_holder top_content_space">
		<!-- header start -->
		<header class="site_header header_fixed">
			<div class="nav_holder">
				<div class="container-fluid">
					<div class="header_row">

						<?php
						$header_logo = get_theme_mod( 'header_logo' );
						$logo_url    = $header_logo ? $header_logo : get_template_directory_uri() . '/assets/images/logo-ugc.png';
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
							<img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php bloginfo( 'name' ); ?>">
						</a>

						<nav class="main_nav" id="main_nav" aria-label="Main">
							<?php
							wp_nav_menu( array(
								'theme_location' => 'primary',
								'container'      => false,
								'menu_class'     => 'main_nav_list',
								'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								'fallback_cb'    => false,
							) );

							$partner_text = get_theme_mod( 'partner_button_text', 'Partners with us' );
							$partner_url  = get_theme_mod( 'partner_button_url' );
							?>
							<!-- duplicated inside the panel so the CTA stays reachable on mobile -->
							<a href="<?php echo $partner_url ? esc_url( $partner_url ) : 'javascript:void(0);'; ?>" class="btn_partner btn_partner_stacked">
								<?php echo esc_html( $partner_text ? $partner_text : 'Partners with us' ); ?>
								<i class="ri-arrow-right-s-line" aria-hidden="true"></i>
							</a>
						</nav>

						<div class="header_actions">
							<a href="<?php echo $partner_url ? esc_url( $partner_url ) : 'javascript:void(0);'; ?>" class="btn_partner">
								<?php echo esc_html( $partner_text ? $partner_text : 'Partners with us' ); ?>
								<i class="ri-arrow-right-s-line" aria-hidden="true"></i>
							</a>

							<button type="button" class="nav_toggle" id="nav_toggle" aria-controls="main_nav" aria-expanded="false"
								aria-label="Open menu">
								<span class="nav_toggle_bars" aria-hidden="true"></span>
							</button>
						</div>

					</div>
				</div>
			</div>

			<div class="nav_backdrop" id="nav_backdrop"></div>
		</header>
		<!-- header end -->

		<!-- main content start -->
		<main role="main" class="home_content clearfix">
