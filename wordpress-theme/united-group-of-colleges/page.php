<?php
/**
 * Generic page fallback — used only if a page isn't assigned one of the
 * dedicated templates in /page-templates. Renders the page title + editor content.
 */

get_header();
?>

<section class="page_hero">
	<div class="page_hero_media">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'full' ); ?>
		<?php endif; ?>
	</div>
	<div class="page_hero_inner">
		<div class="container-fluid">
			<h1 class="page_hero_title"><?php the_title(); ?></h1>
		</div>
	</div>
</section>

<section class="why-section">
	<div class="container">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	</div>
</section>

<?php
get_footer();
