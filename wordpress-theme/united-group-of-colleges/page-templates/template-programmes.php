<?php
/**
 * Template Name: Programmes and Models
 */

get_header();

list( $hero_img, $hero_alt ) = ugc_image_field( 'hero_image', 'UGC campus architecture sketch', UGC_DEFAULT_HERO_IMAGE );
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
<?php
$breakdown_models = array_filter( array(
	get_field( 'breakdown_model_1' ),
	get_field( 'breakdown_model_2' ),
	get_field( 'breakdown_model_3' ),
), function ( $m ) { return ! empty( $m['title'] ); } );
?>
<?php if ( $breakdown_models ) : ?>
<section class="breakdown-section section_gray">
	<div class="container">
		<div class="section-heading">
			<?php ugc_accent_heading( 'breakdown_heading', 'h2' ); ?>
		</div>

		<div class="breakdown-rows">
			<?php $i = 0; foreach ( $breakdown_models as $model ) : $i++; ?>
				<?php
				list( $bm_img, $bm_img_alt ) = ugc_image_from_group( $model, 'image', $model['title'] );
				$points = array_filter( array( $model['point_1'], $model['point_2'], $model['point_3'], $model['point_4'] ), function ( $p ) { return ! empty( $p['label'] ); } );
				?>
				<div class="breakdown-row<?php echo ( 0 === $i % 2 ) ? ' breakdown-row--reverse' : ''; ?>">
					<div class="breakdown-image">
						<?php if ( $bm_img ) : ?>
							<img src="<?php echo esc_url( $bm_img ); ?>" alt="<?php echo esc_attr( $bm_img_alt ); ?>">
						<?php endif; ?>
					</div>
					<div class="breakdown-content">
						<span class="breakdown-label"><?php echo esc_html( $model['label'] ); ?></span>
						<h3><?php echo esc_html( $model['title'] ); ?></h3>

						<?php if ( $points ) : ?>
							<ul class="info-list">
								<?php foreach ( $points as $point ) : ?>
									<?php
									$sub_items = array();
									if ( ! empty( $point['sub_list'] ) && is_array( $point['sub_list'] ) ) {
										for ( $s = 1; $s <= 6; $s++ ) {
											if ( ! empty( $point['sub_list'][ 'sub_' . $s ] ) ) {
												$sub_items[] = $point['sub_list'][ 'sub_' . $s ];
											}
										}
									}
									?>
									<li>
										<strong><?php echo esc_html( $point['label'] ); ?></strong> <?php echo esc_html( $point['text'] ); ?>

										<?php if ( $sub_items ) : ?>
											<ul class="info-sublist">
												<?php foreach ( $sub_items as $sub_text ) : ?>
													<li><?php echo esc_html( $sub_text ); ?></li>
												<?php endforeach; ?>
											</ul>
										<?php endif; ?>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
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
