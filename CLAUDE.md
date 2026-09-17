# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## What this repo is

A marketing website for United Group of Colleges (UGC), built twice over:

1. **Root static site** — plain HTML5 + hand-written CSS (no framework, no build step). This is the design source of truth.
2. **`wordpress-theme/united-group-of-colleges/`** — a custom WordPress theme that is a line-by-line conversion of the static site into PHP templates + ACF fields, so the client can edit content in wp-admin.

There is no package.json, no bundler, no test suite, and no linter configured. Everything is authored and reviewed by hand.

## Commands

There is no build/compile step for either half of the project.

- **View the static site**: open any root `.html` file directly in a browser (file://), or serve the folder with any static file server.
- **Run the WordPress theme locally (XAMPP)**: copy/clone `wordpress-theme/united-group-of-colleges/` into `C:\xampp\htdocs\<folder>\wp-content\themes\`, create a DB via phpMyAdmin, install WordPress, activate **ACF Free** (not PRO) and the theme.
  - If theme/plugin upload gives a "Could not copy file" error, uncomment `extension=zip` in XAMPP's `php.ini` and restart Apache.
- **Package the theme for upload**: zip the `united-group-of-colleges/` folder so the zip contains exactly one top-level folder (the theme slug). Check first that no stray `.zip` is sitting inside the theme folder itself, or it gets bundled in and bloats the package.
- **Visual verification**: this project has no automated tests. "Done" means screenshotting the page at ~1440px and ~390px (and the intermediate breakpoints below) and comparing against the design conventions — do this before calling any section/page complete.

## Keeping the two trees in sync

`css/style.css` (root) and `wordpress-theme/united-group-of-colleges/assets/css/style.css` (theme) are the **same file maintained in two places** — the theme copy is a direct copy of the static one, not a fork. Whenever you edit one, copy the change into the other; they should stay byte-identical. The same applies to `js/`, `images/`, and `fonts/` vs. the theme's `assets/js/`, `assets/images/`, `assets/fonts/`.

`css/main.css` / `assets/css/main.css` is a large (~558KB) minified third-party base framework stylesheet — not hand-edited; only `style.css` carries this project's actual styling.

Each root page maps 1:1 to a theme page template:

| Root static page | Theme page template | ACF field file |
|---|---|---|
| `index.html` | `page-templates/template-home.php` | `inc/acf-fields-home.php` |
| `about-us.html` | `page-templates/template-about.php` | `inc/acf-fields-about.php` |
| `franchise.html` | `page-templates/template-franchise.php` | `inc/acf-fields-franchise.php` |
| `programmes-and-models.html` | `page-templates/template-programmes.php` | `inc/acf-fields-programmes.php` |
| `faq.html` | `page-templates/template-faq.php` | `inc/acf-fields-faq.php` |
| `request-information.html` | `page-templates/template-request-information.php` | `inc/acf-fields-request-information.php` |
| `blog.html` | `home.php` (WP's "Posts page", not a selectable template) | n/a — real WP Posts |
| `blog-single.html` | `single.php` | `inc/acf-fields-post.php` (adds the optional "Key Takeaway" box) |

A change to a page's markup/content structure should be made in the static `.html` file first, approved, and only then ported into the matching template — don't build the two in parallel (this mirrors the standard workflow captured in `PROJECT-PROMPT-TEMPLATES.md`).

## WordPress theme architecture

- **`functions.php`** — theme bootstrap: theme supports, `register_nav_menus()` (`primary`, `footer`), asset enqueue (Google Fonts Poppins, `assets/css/main.css` → `assets/css/style.css`, `assets/js/vendor.js` → `assets/js/app.js`, both depending on WP's bundled jQuery), a `UGC_Flat_Link_Walker` (renders the footer nav as bare `<a>` tags, no `<ul>/<li>`), and `require_once` for every `inc/` file. Also defines shared helpers used across all templates — **use these instead of re-deriving the logic**:
  - `ugc_image_field( $field_name, $fallback_alt, $fallback_url )` — resolves an ACF Image field (Image Array return format) to `[url, alt]`.
  - `ugc_image_from_group( $group, $key, $fallback_alt )` — same, for an image sub-field already pulled out of a Group field.
  - `ugc_accent_heading( $field_name, $tag, $extra_class )` — prints a Text field through `wp_kses_post()` so an author-authored `<span class="text-accent">…</span>` survives (used for partially-highlighted headings).
  - `ugc_url_for_template( $template_file )` — looks up whichever page currently has a given template assigned, for CTAs that must always point at "the Request Information page" regardless of its slug.
  - `ugc_blog_url()`, `ugc_reading_time( $content )` — blog listing URL and a ~200wpm read-time estimate.
  - `UGC_DEFAULT_HERO_IMAGE` — sitewide fallback hero image, used whenever a page's Hero Image ACF field is empty.

- **ACF Free only — no PRO.** This shapes the whole field architecture: there is no Repeater field type, so every repeating block (cards, FAQs, timeline steps, list items) is modeled as a **fixed number of Group fields** (`card_1`/`card_2`/`card_3`, `question_1`…`question_10`, etc.) registered in code in `inc/acf-fields-*.php` — one file per page template. Leaving a slot's title/label blank skips rendering it, but the max count is fixed by the template code. Similarly, there are no ACF Options Pages — sitewide settings (header logo, footer content/social links, reCAPTCHA keys) live in `inc/customizer.php` via the native WP Customizer instead. See `wordpress-theme/ACF-FIELD-REFERENCE.md` for the full Label/Field-Type schema of every field group (this doc must stay in sync with the `inc/acf-fields-*.php` code, and there's also a Roman-Urdu translation of it alongside).

- **Leads pipeline** (Request Information form): `inc/leads-cpt.php` registers a private `ugc_lead` CPT; `inc/leads-handler.php` handles the POST via `admin_post_ugc_submit_lead` / `admin_post_nopriv_ugc_submit_lead` — verifies a nonce, validates required fields server-side (`ugc_handle_lead_submission()`), optionally verifies reCAPTCHA against Google if a secret key is set in Customizer, saves the lead as post meta, emails `admin_email` via `wp_mail`, then redirects back with `?submitted=success`/`?submitted=error` for the template to render a message (no JS required). `inc/leads-export.php` adds CSV export for leads from wp-admin.

- **Blog** runs on native WP Posts/Categories, not a custom page template — `home.php` is picked up automatically as WordPress's "Posts page" (set under Settings → Reading), and `single.php` renders individual posts, including the related-posts-by-category logic and the optional per-post "Key Takeaway" callout box (`inc/acf-fields-post.php`).

- `header.php` / `footer.php` hold shared site chrome; `page.php` / `index.php` are just the required WP fallback templates and aren't meant to carry real markup beyond that.

## Design system conventions

New pages/sections should match the existing visual language rather than inventing new spacing/radius/color values. The full spec (colors, type scale, button/hero/footer/CTA patterns, named reusable section patterns like "3-card grid", "timeline/steps", "FAQ accordion") is written out in `PROJECT-PROMPT-TEMPLATES.md` — read it before styling anything new. Highlights:

- Brand primary `#120fa3` (navy), hover `#0d0b83`, cream background `#f7f6f1`, font Poppins (weights 300–800).
- Icons via RemixIcon (`ri-*`) and Bootstrap Icons (`bi-*`) — no icon libraries beyond these two.
- Container max-width 1200px; radius `--radius-md: 10px`, `--radius-lg: 16px`, pills `50px`.
- Responsive breakpoints to check: 1440px, 1024px, 900px (2-col grids collapse to 1-col), 768px, 576px (mobile type scale).
- `PROJECT-PROMPT-TEMPLATES.md` also contains the two ready-to-use prompts (Roman Urdu) used to bootstrap a *new* similar project from scratch and to convert it to WordPress — useful as a reference for "why" a given convention exists, not something to run against this repo again.
