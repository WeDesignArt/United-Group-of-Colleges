# Reusable Project Prompts

Do ready-to-use prompts is document mein hain, jo is UGC project ki poori structure, spacing, aur conventions se derive hue hain:

1. **Part 1** — Static HTML5/CSS website (naya project shuru karne ke liye)
2. **Part 2** — Usi static site ko WordPress + ACF theme mein convert karna

Har prompt mein `[LIKE THIS]` bracket wali jagah hain — wahan apne naye project ki detail bhar kar poora prompt copy-paste kar dena, agent ko context bhi mil jayega aur exact same design conventions (padding, radius, spacing, hero sizing waghera) bhi follow honge, bina baar baar explain kiye.

> **Note on "Bootstrap":** Part 1 asal mein Bootstrap **framework** use nahi karta — yeh plain HTML5 + custom CSS hai (koi Bootstrap grid/classes nahi). "Bootstrap" naam sirf isliye diya kyunke yeh ek naya static site "bootstrap" (shuru) karne ka prompt hai. Agar future project mein waqai Twitter Bootstrap chahiye ho to prompt mein alag se likhna.

---

## PART 1 — Static HTML/CSS Website Build Prompt

### Kaise use karna hai
Neeche diye gaye poore block ko copy karo, saare `[BRACKETS]` apne naye project ki info se bhar do, aur Claude/agent ko de do.

### The Prompt

```
Mujhe ek responsive marketing website banani hai — plain HTML5 + CSS (koi
framework nahi), mobile-first responsive.

PROJECT INFO
- Project/Brand name: [PROJECT NAME]
- Pages needed: [e.g. Home, About Us, Services, FAQ, Contact/Request Info]
- Primary brand color (hex): [#XXXXXX]
- Primary brand dark/hover shade (hex): [#XXXXXX]
- Background off-white/cream shade (hex): [#XXXXXX] (default agar na diya:
  #f7f6f1)
- Font: Google Fonts [FONT NAME, default: Poppins], weights 300–800
- Icon library: [Font Awesome / RemixIcon] via CDN — icon-only content
  (jahan main khud icon lagaunga) ke liye khaali <img src=""> tag chodo,
  mat guess karo koi icon.
- Images: main khud images/ folder mein daal dunga, descriptive filenames
  ke sath. Tum sirf un images ko reference karo apne <img> tags mein —
  khud koi image mat banao/generate karo. Agar koi image missing ho to
  mujhe batao, silently skip mat karo.
- Logo file(s): [logo.png / footer-logo.png — filenames]

FOLDER STRUCTURE
- Root mein ek .html file per page
- css/style.css — sab custom styling isi ek file mein (koi inline style
  nahi)
- images/ — sab assets

DESIGN SYSTEM (in exact conventions ko follow karo jab tak main override
na karoon)

Layout tokens:
- Container max-width: 1200px, side padding 24px
- Border radius scale: --radius-md: 10px (chhote elements), --radius-lg:
  16px (cards/images), pill shapes (buttons/badges): 50px
- Card shadow (default): 0 4px 16px rgba(20,20,60,0.06)
- Card shadow (hover): 0 12px 28px rgba(20,20,60,0.12), saath mein
  transform: translateY(-6px)
- Grid gaps: 3-card grids = 24px; two-column image+text rows = 48–60px

Spacing:
- Section vertical padding: 80–90px desktop, 56px tablet/mobile (<576px)
- Section heading block: text-align center, margin-bottom ~48px
- Section heading H2: font-size 3.5rem desktop → 2rem tablet (<900px) →
  1.7–1.85rem mobile (<576px)
- Body paragraph text: 0.9–1rem; small labels/eyebrow text: 0.7–0.85rem,
  letter-spacing 0.06em, uppercase

Buttons:
- Primary CTA: pill shape (border-radius 50px), padding 16px 32px,
  background = brand primary color, white text, hover =
  translateY(-2px) + bigger shadow
- Secondary/glass CTA (on top of hero images): semi-transparent white
  background/border, white text

Hero sections — do types:
1. Homepage hero: full-bleed background image/video, LEFT-aligned
   content overlay (large H1, supporting paragraph, 2 CTA buttons side
   by side — one solid, one glass/outline)
2. Inner-page hero banner (About/FAQ/etc.): full-bleed image, dark
   overlay rgba(0,0,0,0.55), CENTERED large white bold title only
   (title font-size ~5rem desktop → 1.5rem mobile <576px)

CTA section (mid/end of page, standalone):
- Navy/brand-dark background, optionally a subtle decorative background
  image (soft large circles), padding 110px 0 desktop → 70px mobile
- Centered: H2 (2.5rem → 1.9rem mobile), paragraph text (max-width
  ~680px), then one pill CTA button

Footer:
- Centered layout: logo → 1–2 line description (max-width ~560px) →
  divider <hr> → flat row of nav links (no bullets, flex-wrap,
  gap 32px) → contact row (email / phone / address, centered, flex-wrap)
  → row of plain (no background) social icons, size ~1.6rem, gap 18px →
  divider → copyright line, small text
- Nav links, footer links, and social icons must NOT have background
  pills/circles unless I explicitly ask — plain text/icon color only,
  with a color-shift + slight lift on :hover

Floating action button(s) (if requested):
- position: fixed, bottom-right (24px/24px desktop, 16px/16px mobile),
  z-index 999
- If multiple floating buttons exist (e.g. WhatsApp + a CTA), wrap them
  in one flex-column container (gap ~14px) so they stack vertically
  instead of overlapping
- Circular icon-only buttons: 60px (52px mobile); pill text+icon
  buttons: padding 14px 22px

Reusable section patterns (build these as named, reusable CSS
components — I will ask for specific sections using this vocabulary):
- "Alternating image/text rows" — 2-col grid, image one side/text other,
  alternating sides row by row via a --reverse modifier class
- "3-card grid" — 3 equal cards, image top + label/title/text body,
  optional one card visually "highlighted" (different background)
- "Timeline/steps" — vertical center line connecting circular icon
  nodes, content alternating left/right of the line, collapses to a
  single left-aligned column with icon-left on mobile
- "FAQ accordion" — native <details>/<summary> (no JS needed), circular
  outline icon that swaps between a plus and minus icon on [open]
- "Badge pill" — small rounded-pill label above a section heading
- "Info list" — bullet list where each item is a small dot + bold
  inline label + description text (no icons, no background box)
- "Feature/pillar cards" — icon circle + vertical divider + title/text,
  laid out horizontally inside a colored card

Responsive breakpoints to test at: 1440px desktop, 1024px, 900px
(2-col grids collapse to 1-col here), 768px, 576px (mobile type scale
kicks in). Always verify both a ~1440px and a ~390px screenshot before
calling a section done.

CONTENT
[Yahan apne actual page content/copy paste karo, ya reference
screenshots/design images attach karo section by section.]

DELIVERABLE
- Mobile-first, tested visually (screenshot at desktop + mobile width)
  before marking any section complete
- No unused/dead CSS, no inline styles
- Don't invent content/images — ask me or leave a clearly-marked
  placeholder if something's missing
```

---

## PART 2 — WordPress (ACF) Conversion Prompt

### Kaise use karna hai
Part 1 se static site poori tarah ban jaye, usko approve karne ke baad yeh prompt use karo — isse pehle nahi (WordPress conversion hamesha ek approved static build ke upar hoti hai, static aur WP dono ek sath mat banwao).

### The Prompt

```
Ab is approved static HTML/CSS site [PROJECT NAME] ko ek custom
WordPress theme mein convert karo. Static files [wordpress-theme/ folder
ka path ya "isi project ke root" — apna path do] mein hi maujood hain,
unhi ko base bana kar.

HARD CONSTRAINT
- Sirf ACF **Free** available hai, ACF PRO nahi. Iska matlab:
  - Repeater field type available NAHI hai — jahan bhi design mein
    repeating content hai (cards, list items, FAQs, timeline steps),
    unke liye fixed-count "Group" fields use karo (Group free-tier
    field hai) — e.g. "Card 1", "Card 2", "Card 3" har ek apna Group,
    Repeater ki tarah "Add Row" nahi hoga, count design ke hisab se
    fixed rahega. Kisi bhi slot ka Title/Label khaali chhod ke usay
    render hone se rokna possible ho (kam items dikhane ke liye), lekin
    max count se zyada add nahi ho sakta.
  - ACF Options Pages (acf_add_options_page) bhi PRO-only hain — site-
    wide settings (header logo, footer content, social links, forms
    settings jaisi cheezein) ACF options page mein mat rakho. Iske
    bajaye WordPress ka native **Customizer** (customize_register hook)
    use karo — yeh har ACF tier par kaam karta hai.

THEME FILE STRUCTURE
wordpress-theme/[theme-slug]/
  style.css              — sirf theme header comment (Theme Name,
                            Author, Version) — asal CSS assets/ mein
  functions.php          — theme setup, menu registration, asset
                            enqueue, saare inc/ files ka require,
                            shared helper functions (neeche dekho)
  header.php              — <!doctype> se <main> tag open karne tak,
                            site-wide header/nav yahan
  footer.php              — </main> se </html> tak, site-wide footer
                            + wp_footer() + scripts yahan
  page.php / index.php    — WordPress ke required fallback templates
  page-templates/
    template-[page-slug].php   — ek file per page, top mein
                                  "Template Name: [Human Name]" comment
  inc/
    acf-fields-[page-slug].php — ek field-group file per page template
    customizer.php              — site-wide header/footer/forms
                                   settings (Customizer panel/sections)
    [koi custom post type / form handler files agar zaroorat ho]
  assets/
    css/  — static build ka css/*.css jaisa ka taisa copy
    js/   — static build ka js/*.js jaisa ka taisa copy
    images/ — static build ki images/ jaisi ki taisi copy
    fonts/  — agar koi self-hosted font/icon-font files hain

SHARED HELPER FUNCTIONS (functions.php mein banao, har page template
inhi ko use kare — duplicate logic mat likho):
- `ugc_image_field( $field_name, $fallback_alt = '', $fallback_url = '' )`
  — ek ACF Image field (return format: array) ko [url, alt] pair mein
  resolve karta hai; field khaali ho to $fallback_url use hota hai
  (empty string default)
- `ugc_image_from_group( $group_array, $key, $fallback_alt = '' )` —
  wahi kaam, lekin ek already-fetched Group field ke andar se ek image
  sub-field nikalne ke liye
- `ugc_accent_heading( $field_name, $tag = 'h2', $extra_class = '' )` —
  ek Text field print karta hai jisme client ne khud
  `<span class="text-accent">...</span>` wrap kiya ho kisi highlighted
  lafz ke around; `wp_kses_post()` se sanitize karo (na ke
  `esc_html()`, warna span tag hi hat jayega)
- Ek site-wide fallback hero image constant (e.g.
  `UGC_DEFAULT_HERO_IMAGE`) define karo — jis page ka Hero Image field
  khaali ho, blank dikhane ke bajaye yeh fallback dikhe. Fallback URL:
  [FALLBACK HERO IMAGE URL]

MENUS
- `register_nav_menus()` se do locations: 'primary' (header) aur
  'footer'
- Footer agar flat row of links hai (<ul>/<li> ke bina, jaisa design
  mein hai) to ek custom `Walker_Nav_Menu` subclass banao jo sirf bare
  `<a>` tags output kare
- `nav_menu_link_attributes` filter se WordPress ke `current-menu-item`
  ko `<a class="current">` pe mirror karo (agar static CSS
  `.current` class expect karti ho)

ACF FIELD GROUPS
- Ek field group per page template, `location` rule
  `page_template == page-templates/template-[slug].php` se scope karo
- Har repeating design block ko upar wale Group-field convention se
  banao
- Nested repeating content (e.g. card ke andar list, list item ke andar
  sub-list) ke liye Group-within-Group nest karo utni depth tak jitni
  design mein hai

LEAD CAPTURE / FORMS (agar site mein koi inquiry/contact form hai)
- Form ke actual `<input>` fields ko static/fixed rakho template mein
  (yeh functional elements hain, ACF-editable content nahi) — sirf
  heading/button-text/success-message jaisi cheezein ACF-driven rakho
- Ek private Custom Post Type banao (e.g. "Leads") submissions store
  karne ke liye: admin list mein useful columns (Name/Phone/Email
  waghera), aur detail screen pe ek read-only meta-box table
- Submission ko `admin-post.php` (`admin_post_{action}` aur
  `admin_post_nopriv_{action}` dono hooks) se handle karo:
  1. Nonce verify karo
  2. Required fields server-side validate karo (sirf HTML5 `required`
     pe bharosa mat karo)
  3. Agar reCAPTCHA keys Customizer mein set hain to verify karo — keys
     na hon to bhi form kaam kare (bina bot-protection ke), taake local
     testing block na ho
  4. Lead post save karo + admin_email pe notification bhejo
     (`wp_mail`)
  5. Wapas usi page pe `?submitted=success` / `?submitted=error`
     query-flag ke sath redirect karo — template usi flag se decide
     kare form dikhana hai ya success/error message (JavaScript ki
     zaroorat nahi)

DOCUMENTATION (deliverable ka hissa)
- Ek plain-language `ACF-FIELD-REFERENCE.md` document banao — har page
  ki har field ka Label + Field Type list ho (code/field-keys nahi,
  sirf woh info jo content bharte waqt chahiye), taake client khud
  content bhar sake

PACKAGING
- Poori theme folder ko ek .zip mein pack karo, upload ke liye ready —
  zip ke andar ek hi top-level folder ho (theme slug), aur zip banane
  se pehle confirm karo ke koi purani/stray .zip file khud theme folder
  ke andar to nahi reh gayi (warna woh bhi zip ke andar chali jayegi
  aur size ghalat bada ho jayega)

LOCAL TESTING (XAMPP)
- WordPress ko C:\xampp\htdocs\[folder-name]\ mein install karo,
  phpMyAdmin se database banao, wp-config.php khud verify/generate
  karo (root user, empty password — XAMPP ka default)
- Agar theme/plugin upload karte waqt "Could not copy file" jaisi error
  aaye, XAMPP ke php.ini mein `extension=zip` line uncomment karo aur
  Apache restart karo (warna WordPress purane, kam-reliable PclZip
  unzipper use karta hai)
- ACF Options Page ki jagah hamesha Customizer expect karo (upar wajah
  bata di gayi hai)

CONTENT
[Placeholder text/images use karo jab tak client apna real content na
de — content structure/field-shape ACF mein already sahi honi chahiye.]
```

---

## Fill-in Cheatsheet

Naye project ke liye jaldi fill karne ke liye common placeholders ek jagah:

| Placeholder | Kya likhna hai | Is project (UGC) mein kya tha |
|---|---|---|
| `[PROJECT NAME]` | Client/brand ka naam | United Group of Colleges |
| `[#XXXXXX]` primary | Brand ka main color | `#120fa3` (navy) |
| `[#XXXXXX]` primary-dark | Hover/darker shade | `#0d0b83` |
| `[#XXXXXX]` cream/bg | Off-white section background | `#f7f6f1` |
| `[FONT NAME]` | Google Font | Poppins |
| Icon library | Font Awesome ya RemixIcon | RemixIcon (`ri-*`) + Bootstrap Icons (`bi-*`) |
| `[theme-slug]` | WordPress theme folder ka naam | `united-group-of-colleges` |
| `[FALLBACK HERO IMAGE URL]` | Default hero jab field khaali ho | Client-hosted banner URL |

Is cheatsheet row ko har naye project ke liye copy karke apni values daal dena — prompt ke bracket isi se bharenge.
