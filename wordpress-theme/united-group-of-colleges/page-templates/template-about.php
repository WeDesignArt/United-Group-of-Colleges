<?php
/**
 * Template Name: About Us
 */

get_header();

list( $hero_img, $hero_alt ) = ugc_image_field( 'hero_image', 'Students walking towards UGC campus building' );
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

<!-- ===================== TRUST SECTION ===================== -->
<section class="why-section trust-section">
	<div class="container why-grid">

		<?php list( $trust_img, $trust_img_alt ) = ugc_image_field( 'trust_image', 'UGC classroom interior' ); ?>
		<div class="why-image">
			<?php if ( $trust_img ) : ?>
				<img src="<?php echo esc_url( $trust_img ); ?>" alt="<?php echo esc_attr( $trust_img_alt ); ?>">
			<?php endif; ?>
		</div>

		<div class="why-content">
			<?php ugc_accent_heading( 'trust_heading', 'h2' ); ?>
			<?php if ( get_field( 'trust_text' ) ) : ?>
				<p><?php echo esc_html( get_field( 'trust_text' ) ); ?></p>
			<?php endif; ?>

			<?php if ( get_field( 'trust_list_title' ) ) : ?>
				<h3 class="info-list-title"><?php echo esc_html( get_field( 'trust_list_title' ) ); ?></h3>
			<?php endif; ?>

			<?php if ( have_rows( 'trust_list' ) ) : ?>
				<ul class="info-list">
					<?php while ( have_rows( 'trust_list' ) ) : the_row(); ?>
						<li><strong><?php echo esc_html( get_sub_field( 'label' ) ); ?></strong> <?php echo esc_html( get_sub_field( 'text' ) ); ?></li>
					<?php endwhile; ?>
				</ul>
			<?php endif; ?>
		</div>

	</div>
</section>

<!-- ===================== FRANCHISE MODEL SECTION ===================== -->
<section class="why-section franchise-model-section">
	<div class="container why-grid why-grid--reverse">

		<?php list( $model_img, $model_img_alt ) = ugc_image_field( 'model_image', 'UGC building exterior' ); ?>
		<div class="why-image">
			<?php if ( $model_img ) : ?>
				<img src="<?php echo esc_url( $model_img ); ?>" alt="<?php echo esc_attr( $model_img_alt ); ?>">
			<?php endif; ?>
		</div>

		<div class="why-content">
			<?php ugc_accent_heading( 'model_heading', 'h2' ); ?>
			<?php the_field( 'model_content' ); ?>
		</div>

	</div>
</section>

<!-- ===================== CORE PILLARS SECTION ===================== -->
<?php if ( have_rows( 'pillars' ) ) : ?>
<section class="pillars-section">
	<div class="container">
		<div class="section-heading">
			<?php ugc_accent_heading( 'pillars_heading', 'h2' ); ?>
		</div>

		<div class="pillars-grid">
			<?php while ( have_rows( 'pillars' ) ) : the_row(); ?>
				<?php list( $p_icon, $p_icon_alt ) = ugc_image_field_sub( 'icon', get_sub_field( 'title' ) . ' icon' ); ?>
				<div class="pillar-card">
					<?php if ( $p_icon ) : ?>
						<span class="pillar-icon"><img src="<?php echo esc_url( $p_icon ); ?>" alt="<?php echo esc_attr( $p_icon_alt ); ?>"></span>
					<?php endif; ?>
					<span class="pillar-divider"></span>
					<div class="pillar-content">
						<h3><?php echo esc_html( get_sub_field( 'title' ) ); ?></h3>
						<p><?php echo esc_html( get_sub_field( 'text' ) ); ?></p>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
</section>
<?php endif; ?>

<!-- ===================== QUALITY ASSURANCE SECTION ===================== -->
<section class="why-section quality-section">
	<div class="container why-grid">

		<?php list( $quality_img, $quality_img_alt ) = ugc_image_field( 'quality_image', 'Archway view of UGC campus building' ); ?>
		<div class="why-image">
			<?php if ( $quality_img ) : ?>
				<img src="<?php echo esc_url( $quality_img ); ?>" alt="<?php echo esc_attr( $quality_img_alt ); ?>">
			<?php endif; ?>
		</div>

		<div class="why-content">
			<?php ugc_accent_heading( 'quality_heading', 'h2' ); ?>
			<?php if ( get_field( 'quality_text' ) ) : ?>
				<p><?php echo esc_html( get_field( 'quality_text' ) ); ?></p>
			<?php endif; ?>

			<?php if ( have_rows( 'quality_list' ) ) : ?>
				<ul class="info-list">
					<?php while ( have_rows( 'quality_list' ) ) : the_row(); ?>
						<li><strong><?php echo esc_html( get_sub_field( 'label' ) ); ?></strong> <?php echo esc_html( get_sub_field( 'text' ) ); ?></li>
					<?php endwhile; ?>
				</ul>
			<?php endif; ?>
		</div>

	</div>
</section>

<!-- ===================== CTA SECTION ===================== -->
<section class="cta-section">
	<div class="container cta-content">
		<h2><?php echo esc_html( get_field( 'cta_heading' ) ); ?></h2>
		<p><?php echo esc_html( get_field( 'cta_text' ) ); ?></p>
	</div>
</section>

<?php
get_footer();
