<?php
/**
 * Template Name: FAQ
 */

get_header();

list( $hero_img, $hero_alt ) = ugc_image_field( 'hero_image', 'UGC campus' );

$faq_items = array();
for ( $n = 1; $n <= 10; $n++ ) {
	$item = get_field( 'faq_item_' . $n );
	if ( ! empty( $item['question'] ) ) {
		$faq_items[] = $item;
	}
}
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
<?php if ( $faq_items ) : ?>
<section class="faq-section">
	<div class="container">
		<div class="faq-list">
			<?php foreach ( $faq_items as $item ) : ?>
				<details class="faq-item"<?php echo ! empty( $item['open_by_default'] ) ? ' open' : ''; ?>>
					<summary class="faq-question">
						<?php echo esc_html( $item['question'] ); ?>
						<span class="faq-icon"><i class="ri-add-line"></i><i class="ri-subtract-line"></i></span>
					</summary>
					<div class="faq-answer">
						<p><?php echo esc_html( $item['answer'] ); ?></p>
					</div>
				</details>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php endif; ?>

<?php
get_footer();
