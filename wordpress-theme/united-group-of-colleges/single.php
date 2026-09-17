<?php
/**
 * Single blog post.
 */

get_header();

while ( have_posts() ) : the_post();

	$categories      = get_the_category();
	$category        = $categories ? $categories[0]->name : '';
	$reading_time    = ugc_reading_time( get_the_content() );
	$hero_img        = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'full' ) : UGC_DEFAULT_HERO_IMAGE;
	$author_override = get_field( 'author_override' );
	$author_name     = $author_override ? $author_override : get_the_author();
	?>

	<!-- hero start -->
	<section class="page_hero">
		<div class="page_hero_media">
			<img src="<?php echo esc_url( $hero_img ); ?>" alt="<?php the_title_attribute(); ?>" fetchpriority="high">
		</div>

		<div class="page_hero_inner">
			<div class="container-fluid">
				<h1 class="page_hero_title"><?php the_title(); ?></h1>
			</div>
		</div>
	</section>
	<!-- hero end -->

	<!-- ===================== BLOG POST SECTION ===================== -->
	<section class="blog-post-section">
		<div class="container">
			<div class="blog-post">

				<a href="<?php echo esc_url( ugc_blog_url() ); ?>" class="blog-post__back"><i class="ri-arrow-left-line"></i> Back to Blog</a>

				<div class="blog-post__meta">
					<?php if ( $category ) : ?>
						<span class="blog-card__category"><?php echo esc_html( $category ); ?></span>
					<?php endif; ?>
					<span><i class="ri-calendar-line"></i> <?php echo esc_html( get_the_date( 'M j, Y' ) ); ?></span>
					<span><i class="ri-time-line"></i> <?php echo esc_html( $reading_time ); ?> min read</span>
					<span><i class="ri-user-line"></i> <?php echo esc_html( $author_name ); ?></span>
				</div>

				<div class="blog-post__content">
					<?php the_content(); ?>

					<?php if ( get_field( 'key_takeaway_text' ) ) : ?>
						<div class="highlight-box">
							<span class="highlight-box__icon"><i class="bi bi-lightbulb"></i></span>
							<div>
								<strong><?php echo esc_html( get_field( 'key_takeaway_title' ) ? get_field( 'key_takeaway_title' ) : 'Key Takeaway' ); ?></strong>
								<p><?php echo esc_html( get_field( 'key_takeaway_text' ) ); ?></p>
							</div>
						</div>
					<?php endif; ?>
				</div>

			</div>
		</div>
	</section>

	<?php
	$related_ids = wp_list_pluck( $categories, 'term_id' );
	$related     = $related_ids ? new WP_Query( array(
		'post_type'      => 'post',
		'posts_per_page' => 3,
		'post__not_in'   => array( get_the_ID() ),
		'category__in'   => $related_ids,
		'orderby'        => 'date',
		'order'          => 'DESC',
	) ) : null;

	// No related posts in the same category yet? Fall back to the most
	// recent other posts so the section still has something in it.
	if ( ! $related || ! $related->have_posts() ) {
		$related = new WP_Query( array(
			'post_type'      => 'post',
			'posts_per_page' => 3,
			'post__not_in'   => array( get_the_ID() ),
			'orderby'        => 'date',
			'order'          => 'DESC',
		) );
	}
	?>

	<?php if ( $related->have_posts() ) : ?>
		<!-- ===================== RELATED ARTICLES ===================== -->
		<section class="models-section section_gray">
			<div class="container">
				<div class="section-heading">
					<h2>Related <span class="text-accent">Articles</span></h2>
				</div>

				<div class="models-grid blog-grid">
					<?php while ( $related->have_posts() ) : $related->the_post(); ?>
						<?php
						$r_categories   = get_the_category();
						$r_category     = $r_categories ? $r_categories[0]->name : '';
						$r_reading_time = ugc_reading_time( get_the_content() );
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
								<?php if ( $r_category ) : ?>
									<span class="blog-card__category"><?php echo esc_html( $r_category ); ?></span>
								<?php endif; ?>
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<p class="blog-card__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?></p>
								<div class="blog-card__meta">
									<span><i class="ri-calendar-line"></i> <?php echo esc_html( get_the_date( 'M j, Y' ) ); ?></span>
									<span><i class="ri-time-line"></i> <?php echo esc_html( $r_reading_time ); ?> min read</span>
								</div>
								<a href="<?php the_permalink(); ?>" class="blog-card__link">Read More <i class="ri-arrow-right-line"></i></a>
							</div>
						</article>
					<?php endwhile; ?>
				</div>
			</div>
		</section>
	<?php endif; wp_reset_postdata(); ?>

<?php endwhile; ?>

<?php
get_footer();
