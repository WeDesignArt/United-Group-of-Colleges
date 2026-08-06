<?php
/**
 * Template Name: Programmes and Models
 */

get_header();

list( $hero_img, $hero_alt ) = ugc_image_field( 'hero_image', 'UGC campus architecture sketch' );
?>

<!-- ===================== PAGE HERO SECTION ===================== -->
<section class="page_hero">
	<div class="page_hero_media">
		<?php if ( $hero_img ) : ?>
			<img src="<?php echo esc_url( $hero_img ); ?>" alt="<?php echo esc_attr( $hero_alt ); ?>">
		<?php endif; ?>
	</div>
	<div class="page_hero_inner">
		<div class="container-fluid">
			<h1 class="page_hero_title"><?php echo esc_html( get_field( 'hero_title' ) ); ?></h1>
		</div>
	</div>
</section>

<!-- ===================== TRUSTED SYSTEM SECTION ===================== -->
<section class="why-section">
	<div class="container why-grid">

		<?php list( $trusted_img, $trusted_img_alt ) = ugc_image_field( 'trusted_image', 'Stack of books and a notebook' ); ?>
		<div class="why-image">
			<?php if ( $trusted_img ) : ?>
				<img src="<?php echo esc_url( $trusted_img ); ?>" alt="<?php echo esc_attr( $trusted_img_alt ); ?>">
			<?php endif; ?>
		</div>

		<div class="why-content">
			<?php ugc_accent_heading( 'trusted_heading', 'h2' ); ?>
			<?php if ( get_field( 'trusted_text' ) ) : ?>
				<p><?php echo esc_html( get_field( 'trusted_text' ) ); ?></p>
			<?php endif; ?>
		</div>

	</div>
</section>

<!-- ===================== DETAILED MODEL BREAKDOWN SECTION ===================== -->
<?php if ( have_rows( 'breakdown_models' ) ) : ?>
<section class="breakdown-section section_gray">
	<div class="container">
		<div class="section-heading">
			<?php ugc_accent_heading( 'breakdown_heading', 'h2' ); ?>
		</div>

		<div class="breakdown-rows">
			<?php $i = 0; while ( have_rows( 'breakdown_models' ) ) : the_row(); $i++; ?>
				<?php list( $bm_img, $bm_img_alt ) = ugc_image_field_sub( 'image', get_sub_field( 'title' ) ); ?>
				<div class="breakdown-row<?php echo ( 0 === $i % 2 ) ? ' breakdown-row--reverse' : ''; ?>">
					<div class="breakdown-image">
						<?php if ( $bm_img ) : ?>
							<img src="<?php echo esc_url( $bm_img ); ?>" alt="<?php echo esc_attr( $bm_img_alt ); ?>">
						<?php endif; ?>
					</div>
					<div class="breakdown-content">
						<span class="breakdown-label"><?php echo esc_html( get_sub_field( 'label' ) ); ?></span>
						<h3><?php echo esc_html( get_sub_field( 'title' ) ); ?></h3>

						<?php if ( have_rows( 'points' ) ) : ?>
							<ul class="info-list">
								<?php while ( have_rows( 'points' ) ) : the_row(); ?>
									<li>
										<strong><?php echo esc_html( get_sub_field( 'label' ) ); ?></strong> <?php echo esc_html( get_sub_field( 'text' ) ); ?>

										<?php if ( have_rows( 'sub_list' ) ) : ?>
											<ul class="info-sublist">
												<?php while ( have_rows( 'sub_list' ) ) : the_row(); ?>
													<li><?php echo esc_html( get_sub_field( 'text' ) ); ?></li>
												<?php endwhile; ?>
											</ul>
										<?php endif; ?>
									</li>
								<?php endwhile; ?>
							</ul>
						<?php endif; ?>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
</section>
<?php endif; ?>

<!-- ===================== REGULATORY COMPLIANCE SECTION ===================== -->
<section class="cta-section">
	<div class="container cta-content">
		<h2><?php echo esc_html( get_field( 'compliance_heading' ) ); ?></h2>
		<p><?php echo esc_html( get_field( 'compliance_text' ) ); ?></p>
	</div>
</section>

<?php
get_footer();
