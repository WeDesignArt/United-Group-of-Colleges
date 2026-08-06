<?php
/**
 * Template Name: FAQ
 */

get_header();

list( $hero_img, $hero_alt ) = ugc_image_field( 'hero_image', 'UGC campus' );
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

<!-- FAQ's -->
<?php if ( have_rows( 'faq_items' ) ) : ?>
<section class="faq-section">
	<div class="container">
		<div class="faq-list">
			<?php while ( have_rows( 'faq_items' ) ) : the_row(); ?>
				<details class="faq-item"<?php echo get_sub_field( 'open_by_default' ) ? ' open' : ''; ?>>
					<summary class="faq-question">
						<?php echo esc_html( get_sub_field( 'question' ) ); ?>
						<span class="faq-icon"><i class="ri-add-line"></i><i class="ri-subtract-line"></i></span>
					</summary>
					<div class="faq-answer">
						<p><?php echo esc_html( get_sub_field( 'answer' ) ); ?></p>
					</div>
				</details>
			<?php endwhile; ?>
		</div>
	</div>
</section>
<?php endif; ?>

<?php
get_footer();
