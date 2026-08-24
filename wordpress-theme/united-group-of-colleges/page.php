<?php
/**
 * Generic page fallback — used only if a page isn't assigned one of the
 * dedicated templates in /page-templates. Renders the page title + editor content.
 */

get_header();

$hero_img = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'full' ) : UGC_DEFAULT_HERO_IMAGE;
$hero_alt = get_the_title();
?>


<section class="page_hero">
	<div class="page_hero_media">
		<?php if ( $hero_img ) : ?>
			<img src="<?php echo esc_url( $hero_img ); ?>" alt="<?php echo esc_attr( $hero_alt ); ?>">
		<?php endif; ?>
	</div>
	<div class="page_hero_inner">
		<div class="container-fluid">
			<h1 class="page_hero_title"><?php the_title(); ?></h1>
		</div>
	</div>
</section>

<!-- FAQ's -->
<section class="faq-section">
	<div class="container">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'full' ); ?>
		<?php endif; ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	</div>
</section>

<?php
get_footer();
