<?php
/**
 * Ultimate fallback template, required by WordPress. This theme is built
 * around dedicated page templates (see /page-templates); this file only
 * covers the case of a URL that doesn't resolve to one of those pages.
 */

get_header();
?>

<section class="why-section">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="why-content">
					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>
				</div>
			<?php endwhile; ?>
		<?php else : ?>
			<div class="why-content">
				<h2>Nothing found</h2>
				<p>Sorry, no content could be found here.</p>
			</div>
		<?php endif; ?>
	</div>
</section>

<?php
get_footer();
