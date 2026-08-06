		</main>
		<!-- main content end -->

		<!-- ===================== FOOTER ===================== -->
		<footer class="footer">
			<div class="container">

				<?php
				$footer_logo = get_field( 'footer_logo', 'option' );
				$footer_logo_url = ( is_array( $footer_logo ) && ! empty( $footer_logo['url'] ) ) ? $footer_logo['url'] : get_template_directory_uri() . '/assets/images/footer-logo.png';
				?>
				<div class="footer-logo">
					<img src="<?php echo esc_url( $footer_logo_url ); ?>" alt="<?php bloginfo( 'name' ); ?> logo">
				</div>

				<?php $footer_desc = get_field( 'footer_description', 'option' ); ?>
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

				<?php $footer_email = get_field( 'footer_email', 'option' ); ?>
				<?php if ( $footer_email ) : ?>
					<p class="footer-email"><span>Email :</span> <?php echo esc_html( $footer_email ); ?></p>
				<?php endif; ?>

				<div class="footer-social">
					<?php $fb = get_field( 'footer_facebook_url', 'option' ); ?>
					<?php if ( $fb ) : ?>
						<a href="<?php echo esc_url( $fb ); ?>" aria-label="Facebook" target="_blank" rel="noopener"><i class="ri-facebook-circle-fill"></i></a>
					<?php endif; ?>

					<?php $ig = get_field( 'footer_instagram_url', 'option' ); ?>
					<?php if ( $ig ) : ?>
						<a href="<?php echo esc_url( $ig ); ?>" aria-label="Instagram" target="_blank" rel="noopener"><i class="ri-instagram-line"></i></a>
					<?php endif; ?>

					<?php $yt = get_field( 'footer_youtube_url', 'option' ); ?>
					<?php if ( $yt ) : ?>
						<a href="<?php echo esc_url( $yt ); ?>" aria-label="YouTube" target="_blank" rel="noopener"><i class="ri-youtube-line"></i></a>
					<?php endif; ?>

					<?php $li = get_field( 'footer_linkedin_url', 'option' ); ?>
					<?php if ( $li ) : ?>
						<a href="<?php echo esc_url( $li ); ?>" aria-label="LinkedIn" target="_blank" rel="noopener"><i class="ri-linkedin-box-fill"></i></a>
					<?php endif; ?>
				</div>

				<hr class="footer-divider">

				<?php $copyright = get_field( 'footer_copyright_text', 'option' ); ?>
				<p class="footer-copy"><?php echo wp_kses_post( $copyright ? $copyright : 'Copyright &copy; ' . date( 'Y' ) . ' ' . get_bloginfo( 'name' ) . '.' ); ?></p>

			</div>
		</footer>

	</div>
	<!-- main holder end -->

	<?php wp_footer(); ?>

</body>

</html>
