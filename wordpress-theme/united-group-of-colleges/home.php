<?php
/**
 * Blog listing (WordPress's "Posts page" template).
 *
 * This is NOT selected via Page Attributes like the other templates — it's
 * WordPress's built-in convention: whatever Page is set as the "Posts page"
 * under Settings → Reading automatically renders through this file. See the
 * "Setting Up the Blog" section in ACF-FIELD-REFERENCE.md for the one-time
 * setup step.
 */

get_header();

$blog_page_id = (int) get_option( 'page_for_posts' );

$hero_title = $blog_page_id ? get_the_title( $blog_page_id ) : 'Blog';
$hero_img   = ( $blog_page_id && has_post_thumbnail( $blog_page_id ) )
	? get_the_post_thumbnail_url( $blog_page_id, 'full' )
	: UGC_DEFAULT_HERO_IMAGE;
?>

<!-- hero start -->
<section class="page_hero">
	<div class="page_hero_media">
		<img src="<?php echo esc_url( $hero_img ); ?>" alt="<?php echo esc_attr( $hero_title ); ?>" fetchpriority="high">
	</div>

	<div class="page_hero_inner">
		<div class="container-fluid">
			<h1 class="page_hero_title"><?php echo esc_html( $hero_title ); ?></h1>
		</div>
	</div>
</section>
<!-- hero end -->

<!-- ===================== BLOG LISTING SECTION ===================== -->
<section class="models-section">
	<div class="container">
		<div class="section-heading">
			<h2>Latest <span class="text-accent">Articles &amp; Insights</span></h2>
			<p>Franchise guidance, campus updates, and education trends from the UGC team.</p>
		</div>

		<?php if ( have_posts() ) : ?>

			<div class="models-grid blog-grid">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php
					$categories   = get_the_category();
					$category     = $categories ? $categories[0]->name : '';
					$reading_time = ugc_reading_time( get_the_content() );
					?>
					<article class="blog-card">
						<a href="<?php the_permalink(); ?>" class="blog-card__image">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'large', array( 'alt' => get_the_title() ) ); ?>
							<?php else : ?>
								<img src="<?php echo esc_url( UGC_DEFAULT_HERO_IMAGE ); ?>" alt="<?php the_title_attribute(); ?>">
							<?php endif; ?>
						</a>
						<div class="blog-card__body">
							<?php if ( $category ) : ?>
								<span class="blog-card__category"><?php echo esc_html( $category ); ?></span>
							<?php endif; ?>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p class="blog-card__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?></p>
							<div class="blog-card__meta">
								<span><i class="ri-calendar-line"></i> <?php echo esc_html( get_the_date( 'M j, Y' ) ); ?></span>
								<span><i class="ri-time-line"></i> <?php echo esc_html( $reading_time ); ?> min read</span>
							</div>
							<a href="<?php the_permalink(); ?>" class="blog-card__link">Read More <i class="ri-arrow-right-line"></i></a>
						</div>
					</article>
				<?php endwhile; ?>
			</div>

			<nav class="blog-pagination-wrap">
				<?php
				the_posts_pagination( array(
					'mid_size'           => 1,
					'prev_text'          => '<i class="ri-arrow-left-line"></i> Prev',
					'next_text'          => 'Next <i class="ri-arrow-right-line"></i>',
					'screen_reader_text' => 'Blog pagination',
				) );
				?>
			</nav>

		<?php else : ?>

			<p class="blog-empty">No articles published yet — check back soon.</p>

		<?php endif; ?>
	</div>
</section>

<?php
get_footer();
