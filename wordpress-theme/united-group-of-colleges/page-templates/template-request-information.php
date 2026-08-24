<?php
/**
 * Template Name: Request Information
 *
 * The application form's inputs are static HTML (see the note in
 * inc/acf-fields-request-information.php) — everything around it is ACF-driven.
 *
 * Submission is handled server-side by inc/leads-handler.php via
 * admin-post.php: it validates the fields, optionally checks reCAPTCHA
 * (only if a secret key is set in Theme Settings), saves a "Lead" post,
 * emails the admin, then redirects back here with ?submitted=success or
 * ?submitted=error — that flag is what decides whether this page shows
 * the form or the success message below.
 */

get_header();

list( $hero_img, $hero_alt ) = ugc_image_field( 'hero_image', 'Request Information', UGC_DEFAULT_HERO_IMAGE );

$submitted     = isset( $_GET['submitted'] ) ? sanitize_text_field( wp_unslash( $_GET['submitted'] ) ) : '';
$recaptcha_key = get_theme_mod( 'recaptcha_site_key' );
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

<!-- ===================== INTRO ===================== -->
<section class="section_content_left request_intro">
	<div class="container">
		<div class="section_content_row">

			<div class="section_content">
				<?php ugc_accent_heading( 'intro_heading', 'h1', 'section_title' ); ?>

				<?php if ( get_field( 'intro_text' ) ) : ?>
					<p class="section_text"><?php echo esc_html( get_field( 'intro_text' ) ); ?></p>
				<?php endif; ?>
			</div>

			<?php list( $intro_img, $intro_img_alt ) = ugc_image_field( 'intro_image' ); ?>
			<?php if ( $intro_img ) : ?>
				<figure class="section_media">
					<img src="<?php echo esc_url( $intro_img ); ?>" alt="<?php echo esc_attr( $intro_img_alt ); ?>" fetchpriority="high">
				</figure>
			<?php endif; ?>

		</div>
	</div>
</section>

<!-- ===================== APPLICATION FORM ===================== -->
<section class="app_form_section section_gray" id="application-form">
	<div class="container">

		<h2 class="app_form_title"><?php echo esc_html( get_field( 'form_title' ) ); ?></h2>

		<?php if ( 'error' === $submitted ) : ?>
			<div class="form_notice form_notice--error">
				Something's missing or didn't check out — please check the required fields (and the reCAPTCHA if shown) and try again.
			</div>
		<?php endif; ?>

		<?php if ( 'success' !== $submitted ) : ?>
			<form class="app_form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
				<input type="hidden" name="action" value="ugc_submit_lead">
				<?php wp_nonce_field( 'ugc_submit_lead', 'ugc_lead_nonce' ); ?>

				<div class="app_form_card">

					<!-- full name -->
					<div class="form_row">
						<span class="form_row_icon" aria-hidden="true">
							<i class="ri-user-3-line"></i>
						</span>
						<label class="form_row_label" for="full_name">Full Name</label>
						<div class="form_row_field">
							<input type="text" class="form_input" id="full_name" name="full_name"
								placeholder="Enter your full name" autocomplete="name" required>
						</div>
					</div>

					<!-- phone -->
					<div class="form_row">
						<span class="form_row_icon" aria-hidden="true">
							<i class="ri-phone-line"></i>
						</span>
						<label class="form_row_label" for="phone">Phone / WhatsApp</label>
						<div class="form_row_field">
							<input type="tel" class="form_input" id="phone" name="phone" placeholder="Enter your phone number"
								autocomplete="tel" required>
						</div>
					</div>

					<!-- email -->
					<div class="form_row">
						<span class="form_row_icon" aria-hidden="true">
							<i class="ri-mail-line"></i>
						</span>
						<label class="form_row_label" for="email">Email Address</label>
						<div class="form_row_field">
							<input type="email" class="form_input" id="email" name="email" placeholder="Enter your email address"
								autocomplete="email" required>
						</div>
					</div>

					<!-- city -->
					<div class="form_row">
						<span class="form_row_icon" aria-hidden="true">
							<i class="bi bi-geo-alt"></i>
						</span>
						<label class="form_row_label" for="city">City or Division</label>
						<div class="form_row_field">
							<div class="form_select_wrap">
								<select class="form_select" id="city" name="city" required>
									<option value="" selected disabled>Select your city or division</option>
									<option value="multan">Multan</option>
									<option value="bahawalpur">Bahawalpur</option>
									<option value="dera-ghazi-khan">Dera Ghazi Khan</option>
									<option value="sahiwal">Sahiwal</option>
									<option value="lahore">Lahore</option>
									<option value="faisalabad">Faisalabad</option>
									<option value="sargodha">Sargodha</option>
									<option value="gujranwala">Gujranwala</option>
									<option value="rawalpindi">Rawalpindi</option>
									<option value="islamabad">Islamabad</option>
									<option value="karachi">Karachi</option>
									<option value="other">Other</option>
								</select>
							</div>
						</div>
					</div>

					<!-- property -->
					<div class="form_row" role="radiogroup" aria-labelledby="property_label">
						<span class="form_row_icon" aria-hidden="true">
							<i class="ri-school-line"></i>
						</span>
						<span class="form_row_label" id="property_label">Do you have land or a building available?</span>
						<div class="form_row_field">
							<div class="form_options">

								<label class="form_option">
									<input type="radio" name="property" value="owned">
									<span class="form_option_mark" aria-hidden="true"></span>
									<span class="form_option_body">
										<span class="form_option_title">Yes, owned</span>
									</span>
								</label>

								<label class="form_option">
									<input type="radio" name="property" value="leased">
									<span class="form_option_mark" aria-hidden="true"></span>
									<span class="form_option_body">
										<span class="form_option_title">Yes, leased</span>
									</span>
								</label>

								<label class="form_option">
									<input type="radio" name="property" value="looking">
									<span class="form_option_mark" aria-hidden="true"></span>
									<span class="form_option_body">
										<span class="form_option_title">Currently looking</span>
									</span>
								</label>

							</div>
						</div>
					</div>

					<!-- campus model -->
					<div class="form_row" role="radiogroup" aria-labelledby="model_label">
						<span class="form_row_icon" aria-hidden="true">
							<i class="ri-graduation-cap-line"></i>
						</span>
						<span class="form_row_label" id="model_label">Which campus model interests you?</span>
						<div class="form_row_field">
							<div class="form_options form_options_grid">

								<label class="form_option form_option_card">
									<input type="radio" name="campus_model" value="model-a">
									<span class="form_option_mark" aria-hidden="true"></span>
									<span class="form_option_body">
										<span class="form_option_title">Model A</span>
										<span class="form_option_note">(Intermediate)</span>
									</span>
								</label>

								<label class="form_option form_option_card">
									<input type="radio" name="campus_model" value="model-b">
									<span class="form_option_mark" aria-hidden="true"></span>
									<span class="form_option_body">
										<span class="form_option_title">Model B</span>
										<span class="form_option_note">(Intermediate-Degree)</span>
									</span>
								</label>

								<label class="form_option form_option_card">
									<input type="radio" name="campus_model" value="model-c">
									<span class="form_option_mark" aria-hidden="true"></span>
									<span class="form_option_body">
										<span class="form_option_title">Model C</span>
										<span class="form_option_note">(Full Professional Campus)</span>
									</span>
								</label>

								<label class="form_option form_option_card">
									<input type="radio" name="campus_model" value="undecided">
									<span class="form_option_mark" aria-hidden="true"></span>
									<span class="form_option_body">
										<span class="form_option_title">Not sure yet</span>
									</span>
								</label>

							</div>
						</div>
					</div>

					<!-- existing institute -->
					<div class="form_row" role="radiogroup" aria-labelledby="institute_label">
						<span class="form_row_icon" aria-hidden="true">
							<i class="ri-school-line"></i>
						</span>
						<span class="form_row_label" id="institute_label">Do you currently own a school, college, or
							academy?</span>
						<div class="form_row_field">
							<div class="form_options">

								<label class="form_option">
									<input type="radio" name="owns_institute" value="yes">
									<span class="form_option_mark" aria-hidden="true"></span>
									<span class="form_option_body">
										<span class="form_option_title">Yes</span>
									</span>
								</label>

								<label class="form_option">
									<input type="radio" name="owns_institute" value="no">
									<span class="form_option_mark" aria-hidden="true"></span>
									<span class="form_option_body">
										<span class="form_option_title">No</span>
									</span>
								</label>

							</div>
						</div>
					</div>

					<!-- message -->
					<div class="form_row">
						<span class="form_row_icon" aria-hidden="true">
							<i class="bi bi-chat-text"></i>
						</span>
						<label class="form_row_label" for="message">Message (Optional)</label>
						<div class="form_row_field">
							<textarea class="form_textarea" id="message" name="message" rows="3"
								placeholder="Enter your message here..."></textarea>
						</div>
					</div>

					<?php if ( $recaptcha_key ) : ?>
						<div class="form_recaptcha_row">
							<div class="g-recaptcha" data-sitekey="<?php echo esc_attr( $recaptcha_key ); ?>"></div>
						</div>
					<?php endif; ?>

					<div class="form_actions">
						<button type="submit" class="form_submit">
							<i class="ri-send-plane-fill" aria-hidden="true"></i>
							<?php echo esc_html( get_field( 'form_submit_text' ) ); ?>
						</button>
					</div>

				</div>
			</form>
		<?php else : ?>
			<div class="form_success is_visible" id="requestFormSuccess">
				<span class="form_success_icon" aria-hidden="true"><i class="ri-checkbox-circle-fill"></i></span>
				<h3 class="form_success_title"><?php echo esc_html( get_field( 'success_title' ) ); ?></h3>
				<p class="form_success_text"><?php echo esc_html( get_field( 'success_text' ) ); ?></p>
			</div>
		<?php endif; ?>

	</div>
</section>

<!-- ===================== NEXT STEPS + CONTACT ===================== -->
<?php
$next_steps = array_filter( array(
	get_field( 'next_step_1' ), get_field( 'next_step_2' ), get_field( 'next_step_3' ), get_field( 'next_step_4' ),
), function ( $s ) { return ! empty( $s['label'] ); } );
?>
<section class="contact_section">
	<div class="container">

		<?php list( $contact_img, $contact_img_alt ) = ugc_image_field( 'contact_image', 'A UGC campus building' ); ?>
		<?php if ( $contact_img ) : ?>
			<figure class="contact_media">
				<img src="<?php echo esc_url( $contact_img ); ?>" alt="<?php echo esc_attr( $contact_img_alt ); ?>" loading="lazy">
			</figure>
		<?php endif; ?>

		<div class="contact_grid">

			<?php if ( $next_steps ) : ?>
				<div class="contact_col">
					<h2 class="contact_col_title"><?php echo esc_html( get_field( 'next_steps_title' ) ); ?></h2>

					<ul class="section_list contact_list">
						<?php foreach ( $next_steps as $step ) : ?>
							<li>
								<strong><?php echo esc_html( $step['label'] ); ?></strong> <?php echo esc_html( $step['text'] ); ?>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>

			<div class="contact_col">
				<h2 class="contact_col_title"><?php echo esc_html( get_field( 'contact_title' ) ); ?></h2>

				<ul class="section_list contact_list">
					<?php $phone = get_field( 'contact_phone' ); ?>
					<?php if ( $phone ) : ?>
						<li>
							<strong>Phone / WhatsApp :</strong> <a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a>
						</li>
					<?php endif; ?>

					<?php $email = get_field( 'contact_email' ); ?>
					<?php if ( $email ) : ?>
						<li>
							<strong>Email :</strong> <a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
						</li>
					<?php endif; ?>

					<?php $address = get_field( 'contact_address' ); ?>
					<?php if ( $address ) : ?>
						<li>
							<strong>Head Office :</strong> <?php echo esc_html( $address ); ?>
						</li>
					<?php endif; ?>

					<?php $fb = get_field( 'contact_facebook_url' ); $ig = get_field( 'contact_instagram_url' ); ?>
					<?php if ( $fb || $ig ) : ?>
						<li>
							<strong>Social Channels :</strong>
							<?php if ( $fb ) : ?>
								<a href="<?php echo esc_url( $fb ); ?>" target="_blank" rel="noopener">facebook.com</a>
							<?php endif; ?>
							<?php if ( $fb && $ig ) : ?>
								<span class="contact_sep" aria-hidden="true">|</span>
							<?php endif; ?>
							<?php if ( $ig ) : ?>
								<a href="<?php echo esc_url( $ig ); ?>" target="_blank" rel="noopener">instagram.com</a>
							<?php endif; ?>
						</li>
					<?php endif; ?>
				</ul>
			</div>

		</div>
	</div>
</section>

<?php if ( 'success' === $submitted || 'error' === $submitted ) : ?>
<script>
	document.addEventListener('DOMContentLoaded', function () {
		var target = document.getElementById('requestFormSuccess') || document.querySelector('.form_notice');
		if ( target ) {
			target.scrollIntoView({ behavior: 'smooth', block: 'start' });
		}
	});
</script>
<?php endif; ?>

<?php
get_footer();
