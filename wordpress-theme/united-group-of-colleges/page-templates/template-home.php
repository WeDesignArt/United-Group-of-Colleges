<?php
/**
 * Template Name: Home
 */

get_header();

list( $hero_img, $hero_alt ) = ugc_image_field( 'hero_image' );
?>

<!-- hero start -->
<section class="home_hero">
	<div class="home_hero_media">
		<?php if ( $hero_img ) : ?>
			<img src="<?php echo esc_url( $hero_img ); ?>" alt="<?php echo esc_attr( $hero_alt ); ?>" fetchpriority="high">
		<?php endif; ?>
	</div>

	<div class="home_hero_inner">
		<div class="container-fluid">
			<div class="home_hero_content">
				<h1 class="home_hero_title"><?php echo esc_html( get_field( 'hero_title' ) ); ?></h1>

				<p class="home_hero_text"><?php echo esc_html( get_field( 'hero_text' ) ); ?></p>

				<div class="home_hero_actions">
					<?php $btn1_text = get_field( 'hero_button_1_text' ); ?>
					<?php if ( $btn1_text ) : ?>
						<a href="<?php echo get_field( 'hero_button_1_url' ) ? esc_url( get_field( 'hero_button_1_url' ) ) : 'javascript:void(0);'; ?>" class="btn_hero btn_hero_light">
							<?php echo esc_html( $btn1_text ); ?>
							<i class="ri-arrow-right-s-line" aria-hidden="true"></i>
						</a>
					<?php endif; ?>

					<?php $btn2_text = get_field( 'hero_button_2_text' ); ?>
					<?php if ( $btn2_text ) : ?>
						<a href="<?php echo get_field( 'hero_button_2_url' ) ? esc_url( get_field( 'hero_button_2_url' ) ) : 'javascript:void(0);'; ?>" class="btn_hero btn_hero_glass">
							<?php echo esc_html( $btn2_text ); ?>
						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- hero end -->

<!-- ===================== SIMPLER WAY SECTION ===================== -->
<section class="simpler-way-section">
	<div class="container">
		<div class="section-heading">
			<?php ugc_accent_heading( 'simpler_way_heading', 'h2' ); ?>
			<?php if ( get_field( 'simpler_way_text' ) ) : ?>
				<p><?php echo esc_html( get_field( 'simpler_way_text' ) ); ?></p>
			<?php endif; ?>
		</div>
	</div>
</section>

<?php
$simpler_rows = array( get_field( 'simpler_way_row_1' ), get_field( 'simpler_way_row_2' ), get_field( 'simpler_way_row_3' ) );
$simpler_rows = array_filter( $simpler_rows, function ( $row ) { return ! empty( $row['title'] ); } );
?>
<?php if ( $simpler_rows ) : ?>
<section class="simpler-way-rows-section overflow-hidden section_gray">
	<div class="container">
		<div class="simpler-way-rows">
			<?php $i = 0; foreach ( $simpler_rows as $row ) : $i++; ?>
				<?php
				list( $row_img, $row_img_alt ) = ugc_image_from_group( $row, 'image', $row['title'] );
				list( $row_icon, $row_icon_alt ) = ugc_image_from_group( $row, 'icon', $row['title'] . ' icon' );
				?>
				<div class="simpler-way-row<?php echo ( 0 === $i % 2 ) ? ' simpler-way-row--reverse' : ''; ?>">
					<div class="simpler-way-image">
						<?php if ( $row_img ) : ?>
							<img src="<?php echo esc_url( $row_img ); ?>" alt="<?php echo esc_attr( $row_img_alt ); ?>">
						<?php endif; ?>
					</div>
					<div class="simpler-way-content">
						<?php if ( $row_icon ) : ?>
							<span class="simpler-way-icon"><img src="<?php echo esc_url( $row_icon ); ?>" alt="<?php echo esc_attr( $row_icon_alt ); ?>"></span>
						<?php endif; ?>
						<h3><?php echo esc_html( $row['title'] ); ?></h3>
						<p><?php echo esc_html( $row['text'] ); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php endif; ?>

<!-- ===================== REGIONAL INVESTORS SECTION ===================== -->
<?php
$regional_cards = array( get_field( 'regional_card_1' ), get_field( 'regional_card_2' ), get_field( 'regional_card_3' ) );
$regional_cards = array_filter( $regional_cards, function ( $c ) { return ! empty( $c['title'] ); } );
?>
<?php if ( $regional_cards ) : ?>
<section class="models-section">
	<div class="container">
		<div class="section-heading">
			<?php ugc_accent_heading( 'regional_heading', 'h2' ); ?>
		</div>

		<div class="models-grid">
			<?php foreach ( $regional_cards as $card ) : ?>
				<?php
				list( $card_img, $card_img_alt ) = ugc_image_from_group( $card, 'image', $card['title'] );
				list( $card_icon, $card_icon_alt ) = ugc_image_from_group( $card, 'icon', $card['title'] . ' icon' );
				?>
				<div class="model-card">
					<div class="regional-model-card">
						<?php if ( $card_icon ) : ?>
							<span class="regional-icon-box"><img src="<?php echo esc_url( $card_icon ); ?>" alt="<?php echo esc_attr( $card_icon_alt ); ?>"></span>
						<?php endif; ?>
						<?php if ( $card_img ) : ?>
							<img src="<?php echo esc_url( $card_img ); ?>" alt="<?php echo esc_attr( $card_img_alt ); ?>">
						<?php endif; ?>
					</div>
					<div class="model-card__body">
						<h3><?php echo esc_html( $card['title'] ); ?></h3>
						<span class="regional-model-label"><?php echo esc_html( $card['label'] ); ?></span>
						<p><?php echo esc_html( $card['text'] ); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php endif; ?>

<!-- ===================== FRANCHISE WORKS (TIMELINE) SECTION ===================== -->
<?php
$timeline_steps = array( get_field( 'timeline_step_1' ), get_field( 'timeline_step_2' ), get_field( 'timeline_step_3' ), get_field( 'timeline_step_4' ) );
$timeline_steps = array_filter( $timeline_steps, function ( $s ) { return ! empty( $s['title'] ); } );
?>
<?php if ( $timeline_steps ) : ?>
<section class="franchise-section">
	<div class="container">
		<h2 class="franchise-title"><?php echo esc_html( get_field( 'timeline_heading' ) ); ?></h2>

		<div class="timeline">
			<?php $i = 0; foreach ( $timeline_steps as $step ) : $i++; ?>
				<?php
				$on_left = ( 1 === $i % 2 );
				list( $step_icon, $step_icon_alt ) = ugc_image_from_group( $step, 'icon', $step['title'] . ' icon' );
				?>
				<div class="timeline-row">
					<div class="timeline-text timeline-text--left">
						<?php if ( $on_left ) : ?>
							<h3><?php echo esc_html( $step['title'] ); ?></h3>
							<p><?php echo esc_html( $step['text'] ); ?></p>
						<?php endif; ?>
					</div>
					<div class="timeline-icon">
						<?php if ( $step_icon ) : ?>
							<img src="<?php echo esc_url( $step_icon ); ?>" alt="<?php echo esc_attr( $step_icon_alt ); ?>">
						<?php endif; ?>
					</div>
					<div class="timeline-text timeline-text--right">
						<?php if ( ! $on_left ) : ?>
							<h3><?php echo esc_html( $step['title'] ); ?></h3>
							<p><?php echo esc_html( $step['text'] ); ?></p>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php endif; ?>

<!-- ===================== CAMPUS MODELS SECTION ===================== -->
<?php
$models_cards = array( get_field( 'models_card_1' ), get_field( 'models_card_2' ), get_field( 'models_card_3' ) );
$models_cards = array_filter( $models_cards, function ( $c ) { return ! empty( $c['title'] ); } );
?>
<?php if ( $models_cards ) : ?>
<section class="models-section section_gray">
	<div class="container">
		<div class="section-heading">
			<?php ugc_accent_heading( 'models_heading', 'h2' ); ?>
			<?php if ( get_field( 'models_intro' ) ) : ?>
				<p><?php echo esc_html( get_field( 'models_intro' ) ); ?></p>
			<?php endif; ?>
		</div>

		<div class="models-grid">
			<?php foreach ( $models_cards as $card ) : ?>
				<?php list( $mc_img, $mc_img_alt ) = ugc_image_from_group( $card, 'image', $card['title'] ); ?>
				<div class="model-card<?php echo ! empty( $card['is_highlighted'] ) ? ' model-card--active' : ''; ?>">
					<div class="model-card__image">
						<?php if ( $mc_img ) : ?>
							<img src="<?php echo esc_url( $mc_img ); ?>" alt="<?php echo esc_attr( $mc_img_alt ); ?>">
						<?php endif; ?>
					</div>
					<div class="model-card__body">
						<span class="model-card__label"><?php echo esc_html( $card['label'] ); ?></span>
						<h3><?php echo esc_html( $card['title'] ); ?></h3>
						<p><?php echo esc_html( $card['text'] ); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<?php if ( get_field( 'models_footnote' ) ) : ?>
			<p class="models-footnote"><?php echo esc_html( get_field( 'models_footnote' ) ); ?></p>
		<?php endif; ?>
	</div>
</section>
<?php endif; ?>

<!-- ===================== WHY SOUTH PUNJAB SECTION ===================== -->
<section class="why-section">
	<div class="container why-grid">

		<?php list( $why_img, $why_img_alt ) = ugc_image_field( 'why_image', 'UGC campus building entrance' ); ?>
		<div class="why-image">
			<?php if ( $why_img ) : ?>
				<img src="<?php echo esc_url( $why_img ); ?>" alt="<?php echo esc_attr( $why_img_alt ); ?>">
			<?php endif; ?>
			<?php if ( get_field( 'why_badge_title' ) ) : ?>
				<div class="why-image__badge">
					<span class="why-image__badge-icon"><i class="bi bi-geo-alt"></i></span>
					<div>
						<strong><?php echo esc_html( get_field( 'why_badge_title' ) ); ?></strong>
						<p><?php echo esc_html( get_field( 'why_badge_text' ) ); ?></p>
					</div>
				</div>
			<?php endif; ?>
		</div>

		<div class="why-content">
			<?php ugc_accent_heading( 'why_heading', 'h2' ); ?>
			<?php if ( get_field( 'why_text_1' ) ) : ?>
				<p><?php echo esc_html( get_field( 'why_text_1' ) ); ?></p>
			<?php endif; ?>
			<?php if ( get_field( 'why_text_2' ) ) : ?>
				<p><?php echo esc_html( get_field( 'why_text_2' ) ); ?></p>
			<?php endif; ?>

			<?php if ( get_field( 'why_highlight_title' ) ) : ?>
				<div class="highlight-box">
					<span class="highlight-box__icon"><i class="bi bi-clock"></i></span>
					<div>
						<strong><?php echo esc_html( get_field( 'why_highlight_title' ) ); ?></strong>
						<p><?php echo esc_html( get_field( 'why_highlight_text' ) ); ?></p>
					</div>
				</div>
			<?php endif; ?>
		</div>

	</div>
</section>

<!-- ===================== WHO IS THIS FOR SECTION ===================== -->
<?php
$opportunity_items = array_filter( array(
	get_field( 'opportunity_item_1_text' ),
	get_field( 'opportunity_item_2_text' ),
	get_field( 'opportunity_item_3_text' ),
	get_field( 'opportunity_item_4_text' ),
) );
?>
<section class="opportunity-section section_gray">
	<div class="container">
		<div class="opportunity-card">

			<?php list( $opp_img, $opp_img_alt ) = ugc_image_field( 'opportunity_image', 'UGC opportunity' ); ?>
			<div class="opportunity-image">
				<?php if ( $opp_img ) : ?>
					<img src="<?php echo esc_url( $opp_img ); ?>" alt="<?php echo esc_attr( $opp_img_alt ); ?>">
				<?php endif; ?>
			</div>

			<div class="opportunity-content">
				<?php ugc_accent_heading( 'opportunity_heading', 'h2' ); ?>
				<?php if ( get_field( 'opportunity_intro' ) ) : ?>
					<p class="opportunity-intro"><?php echo esc_html( get_field( 'opportunity_intro' ) ); ?></p>
				<?php endif; ?>

				<?php if ( $opportunity_items ) : ?>
					<ul class="opportunity-list">
						<?php foreach ( $opportunity_items as $text ) : ?>
							<li>
								<span class="check-icon"><i class="bi bi-check"></i></span>
								<span><?php echo esc_html( $text ); ?></span>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>

		</div>
	</div>
</section>

<!-- ===================== CTA SECTION ===================== -->
<section class="cta-section">
	<div class="container cta-content">
		<h2><?php echo esc_html( get_field( 'cta_heading' ) ); ?></h2>
		<p><?php echo esc_html( get_field( 'cta_text' ) ); ?></p>
		<?php if ( get_field( 'cta_button_text' ) ) : ?>
			<a href="<?php echo get_field( 'cta_button_url' ) ? esc_url( get_field( 'cta_button_url' ) ) : '#contact'; ?>" class="btn-primary text-decoration-none">
				<?php echo esc_html( get_field( 'cta_button_text' ) ); ?> <i class="fa-solid fa-arrow-right"></i>
			</a>
		<?php endif; ?>
	</div>
</section>

<?php
get_footer();
