		</main>
		<!-- main content end -->

		<!-- ===================== FOOTER ===================== -->
		<footer class="footer">
			<div class="container">

				<?php
				$footer_logo     = get_theme_mod( 'footer_logo' );
				$footer_logo_url = $footer_logo ? $footer_logo : get_template_directory_uri() . '/assets/images/footer-logo.png';
				?>
				<div class="footer-logo">
					<img src="<?php echo esc_url( $footer_logo_url ); ?>" alt="<?php bloginfo( 'name' ); ?> logo">
				</div>

				<?php $footer_desc = get_theme_mod( 'footer_description' ); ?>
				<?php if ( $footer_desc ) : ?>
					<p class="footer-desc"><?php echo esc_html( $footer_desc ); ?></p>
				<?php endif; ?>

				<hr class="footer-divider">

				<nav class="footer-nav">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'footer',
						'container'      => false,
						'items_wrap'     => '%3$s',
						'walker'         => new UGC_Flat_Link_Walker(),
						'fallback_cb'    => false,
					) );
					?>
				</nav>

				<?php
				$footer_whatsapp = get_theme_mod( 'footer_whatsapp' );
				$footer_email    = get_theme_mod( 'footer_email' );
				$footer_office   = get_theme_mod( 'footer_office_address' );
				?>
				<?php if ( $footer_whatsapp || $footer_email || $footer_office ) : ?>
					<div class="footer-contact-row">
						<?php if ( $footer_whatsapp ) : ?>
							<p class="footer-whatsapp"><span>WhatsApp :</span> <a href="https://wa.me/<?php echo esc_attr( preg_replace( '/\D/', '', $footer_whatsapp ) ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $footer_whatsapp ); ?></a></p>
						<?php endif; ?>

						<?php if ( $footer_email ) : ?>
							<p class="footer-email"><span>Email :</span> <?php echo esc_html( $footer_email ); ?></p>
						<?php endif; ?>

						<?php if ( $footer_office ) : ?>
							<p class="footer-office"><span>Head Office :</span> <?php echo esc_html( $footer_office ); ?></p>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<div class="footer-social">
					<?php $fb = get_theme_mod( 'footer_facebook_url' ); ?>
					<?php if ( $fb ) : ?>
						<a href="<?php echo esc_url( $fb ); ?>" aria-label="Facebook" target="_blank" rel="noopener"><i class="ri-facebook-circle-fill"></i></a>
					<?php endif; ?>

					<?php $ig = get_theme_mod( 'footer_instagram_url' ); ?>
					<?php if ( $ig ) : ?>
						<a href="<?php echo esc_url( $ig ); ?>" aria-label="Instagram" target="_blank" rel="noopener"><i class="ri-instagram-line"></i></a>
					<?php endif; ?>

					<?php $yt = get_theme_mod( 'footer_youtube_url' ); ?>
					<?php if ( $yt ) : ?>
						<a href="<?php echo esc_url( $yt ); ?>" aria-label="YouTube" target="_blank" rel="noopener"><i class="ri-youtube-line"></i></a>
					<?php endif; ?>

					<?php $li = get_theme_mod( 'footer_linkedin_url' ); ?>
					<?php if ( $li ) : ?>
						<a href="<?php echo esc_url( $li ); ?>" aria-label="LinkedIn" target="_blank" rel="noopener"><i class="ri-linkedin-box-fill"></i></a>
					<?php endif; ?>
				</div>

				<hr class="footer-divider">

				<?php $copyright = get_theme_mod( 'footer_copyright_text', 'Copyright &copy; ' . date( 'Y' ) . ' ' . get_bloginfo( 'name' ) . '.' ); ?>
				<p class="footer-copy"><?php echo wp_kses_post( $copyright ); ?></p>

			</div>
		</footer>

	</div>
	<!-- main holder end -->

	<?php wp_footer(); ?>

</body>

</html>
