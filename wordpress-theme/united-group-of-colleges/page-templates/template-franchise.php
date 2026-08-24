<?php
/**
 * Template Name: Franchise Opportunity
 */

get_header();

list( $hero_img, $hero_alt ) = ugc_image_field( 'hero_image', 'Franchise Opportunity', UGC_DEFAULT_HERO_IMAGE );
?>

<!-- hero start -->
<section class="page_hero">
	<div class="page_hero_media">
		<?php if ( $hero_img ) : ?>
			<img src="<?php echo esc_url( $hero_img ); ?>" alt="<?php echo esc_attr( $hero_alt ); ?>" fetchpriority="high">
		<?php endif; ?>
	</div>

	<div class="page_hero_inner">
		<div class="container-fluid">
			<h1 class="page_hero_title"><?php echo esc_html( get_field( 'hero_title' ) ); ?></h1>
		</div>
	</div>
</section>
<!-- hero end -->

<!-- ===================== OPPORTUNITY ===================== -->
<?php
$intro_items = array_filter( array(
	get_field( 'intro_item_1' ), get_field( 'intro_item_2' ), get_field( 'intro_item_3' ), get_field( 'intro_item_4' ),
), function ( $i ) { return ! empty( $i['label'] ); } );
?>
<section class="section_content_left">
	<div class="container">
		<div class="section_content_row">

			<div class="section_content">
				<?php ugc_accent_heading( 'intro_heading', 'h2', 'section_title' ); ?>

				<?php if ( get_field( 'intro_text' ) ) : ?>
					<p class="section_text"><?php echo esc_html( get_field( 'intro_text' ) ); ?></p>
				<?php endif; ?>

				<?php if ( get_field( 'intro_subtitle' ) ) : ?>
					<h3 class="section_subtitle"><?php echo esc_html( get_field( 'intro_subtitle' ) ); ?></h3>
				<?php endif; ?>

				<?php if ( $intro_items ) : ?>
					<ul class="section_list">
						<?php foreach ( $intro_items as $item ) : ?>
							<li>
								<strong><?php echo esc_html( $item['label'] ); ?></strong> <?php echo esc_html( $item['text'] ); ?>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>

			<?php list( $intro_img, $intro_img_alt ) = ugc_image_field( 'intro_image', 'UGC campus building' ); ?>
			<?php if ( $intro_img ) : ?>
				<figure class="section_media">
					<img src="<?php echo esc_url( $intro_img ); ?>" alt="<?php echo esc_attr( $intro_img_alt ); ?>">
				</figure>
			<?php endif; ?>

		</div>
	</div>
</section>

<!-- ===================== DIVISION OF RESPONSIBILITIES ===================== -->
<?php
$col1_items = array_filter( array(
	get_field( 'division_col1_item_1' ), get_field( 'division_col1_item_2' ), get_field( 'division_col1_item_3' ),
	get_field( 'division_col1_item_4' ), get_field( 'division_col1_item_5' ),
) );
$col2_items = array_filter( array(
	get_field( 'division_col2_item_1' ), get_field( 'division_col2_item_2' ), get_field( 'division_col2_item_3' ),
	get_field( 'division_col2_item_4' ), get_field( 'division_col2_item_5' ), get_field( 'division_col2_item_6' ), get_field( 'division_col2_item_7' ),
) );
?>
<section class="division_section section_gray">
	<div class="container">
		<?php ugc_accent_heading( 'division_heading', 'h2', 'section_title text-center' ); ?>

		<div class="division_table">

			<div class="division_col">
				<h3 class="division_head"><?php echo esc_html( get_field( 'division_col1_title' ) ); ?></h3>
				<ul class="division_list">
					<?php foreach ( $col1_items as $text ) : ?>
						<li><?php echo esc_html( $text ); ?></li>
					<?php endforeach; ?>
					<?php for ( $i = 0; $i < max( 0, count( $col2_items ) - count( $col1_items ) ); $i++ ) : ?>
						<li class="is_empty" aria-hidden="true">&ndash;</li>
					<?php endfor; ?>
				</ul>
			</div>

			<div class="division_col">
				<h3 class="division_head"><?php echo esc_html( get_field( 'division_col2_title' ) ); ?></h3>
				<ul class="division_list">
					<?php foreach ( $col2_items as $text ) : ?>
						<li><?php echo esc_html( $text ); ?></li>
					<?php endforeach; ?>
					<?php for ( $i = 0; $i < max( 0, count( $col1_items ) - count( $col2_items ) ); $i++ ) : ?>
						<li class="is_empty" aria-hidden="true">&ndash;</li>
					<?php endfor; ?>
				</ul>
			</div>

		</div>
	</div>
</section>

<!-- ===================== CAMPUS MODELS SECTION ===================== -->
<?php
$models_cards = array_filter( array( get_field( 'models_card_1' ), get_field( 'models_card_2' ), get_field( 'models_card_3' ) ), function ( $c ) { return ! empty( $c['title'] ); } );
?>
<?php if ( $models_cards ) : ?>
<section class="models-section">
	<div class="container">
		<div class="section-heading">
			<?php ugc_accent_heading( 'models_heading', 'h2' ); ?>
		</div>

		<div class="models-grid">
			<?php foreach ( $models_cards as $card ) : ?>
				<?php list( $mc_img, $mc_img_alt ) = ugc_image_from_group( $card, 'image', $card['title'] ); ?>
				<div class="model-card">
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

	</div>
</section>
<?php endif; ?>

<!-- ===================== OVERVIEW ===================== -->
<?php
$overview_items = array_filter( array( get_field( 'overview_item_1' ), get_field( 'overview_item_2' ), get_field( 'overview_item_3' ), get_field( 'overview_item_4' ) ), function ( $i ) { return ! empty( $i['text'] ); } );
?>
<?php if ( $overview_items ) : ?>
<section class="overview_section">
	<div class="container">
		<div class="overview_grid">
			<?php foreach ( $overview_items as $item ) : ?>
				<?php list( $ov_icon, $ov_icon_alt ) = ugc_image_from_group( $item, 'icon', 'icon' ); ?>
				<div class="overview_item">
					<span class="overview_icon">
						<?php if ( $ov_icon ) : ?>
							<img src="<?php echo esc_url( $ov_icon ); ?>" alt="<?php echo esc_attr( $ov_icon_alt ); ?>">
						<?php endif; ?>
					</span>
					<p class="overview_text"><?php echo esc_html( $item['text'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php endif; ?>

<!-- ===================== FINANCIAL OVERVIEW + SUPPORT ===================== -->
<?php
$finance_items = array_filter( array( get_field( 'finance_item_1' ), get_field( 'finance_item_2' ), get_field( 'finance_item_3' ) ), function ( $i ) { return ! empty( $i['title'] ); } );
$support_items = array_filter( array( get_field( 'support_item_1' ), get_field( 'support_item_2' ) ), function ( $i ) { return ! empty( $i['text'] ); } );
?>
<section class="financial_section">
	<div class="container">

		<?php list( $fin_img, $fin_img_alt ) = ugc_image_field( 'finance_image' ); ?>
		<div class="finance_card">
			<div class="finance_card_media">
				<?php if ( $fin_img ) : ?>
					<img src="<?php echo esc_url( $fin_img ); ?>" alt="<?php echo esc_attr( $fin_img_alt ); ?>">
				<?php endif; ?>
			</div>

			<div class="finance_card_body">
				<h2 class="finance_card_title"><?php echo esc_html( get_field( 'finance_title' ) ); ?></h2>

				<?php if ( $finance_items ) : ?>
					<ul class="finance_list">
						<?php foreach ( $finance_items as $item ) : ?>
							<li class="finance_item">
								<i class="ri-checkbox-circle-line finance_item_icon" aria-hidden="true"></i>
								<div>
									<h4 class="finance_item_title"><?php echo esc_html( $item['title'] ); ?></h4>
									<p class="finance_item_text"><?php echo esc_html( $item['text'] ); ?></p>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>

				<?php if ( get_field( 'finance_note_title' ) ) : ?>
					<h3 class="finance_note_title"><?php echo esc_html( get_field( 'finance_note_title' ) ); ?></h3>
					<p class="finance_note"><?php echo esc_html( get_field( 'finance_note_text' ) ); ?></p>
				<?php endif; ?>
			</div>
		</div>

		<div class="support_panel">
			<div class="support_intro">
				<div class="support_intro_head">
					<?php list( $sup_icon, $sup_icon_alt ) = ugc_image_field( 'support_icon', 'icon' ); ?>
					<?php if ( $sup_icon ) : ?>
						<span class="support_intro_icon"><img src="<?php echo esc_url( $sup_icon ); ?>" alt="<?php echo esc_attr( $sup_icon_alt ); ?>"></span>
					<?php endif; ?>
					<h2 class="support_title"><?php echo esc_html( get_field( 'support_title' ) ); ?></h2>
				</div>

				<?php if ( get_field( 'support_text' ) ) : ?>
					<p class="support_text"><?php echo esc_html( get_field( 'support_text' ) ); ?></p>
				<?php endif; ?>
			</div>

			<?php if ( $support_items ) : ?>
				<ul class="support_list">
					<?php foreach ( $support_items as $item ) : ?>
						<?php list( $si_icon, $si_icon_alt ) = ugc_image_from_group( $item, 'icon', 'icon' ); ?>
						<li class="support_item">
							<span class="support_item_icon">
								<?php if ( $si_icon ) : ?>
									<img src="<?php echo esc_url( $si_icon ); ?>" alt="<?php echo esc_attr( $si_icon_alt ); ?>">
								<?php endif; ?>
							</span>
							<p><?php echo esc_html( $item['text'] ); ?></p>
						</li>
					<?php endforeach; ?>
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
