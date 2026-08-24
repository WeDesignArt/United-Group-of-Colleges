# ACF Field Reference

Every field group below is **already registered in code** (`inc/acf-fields-*.php`) — you don't need to manually create any of this in ACF for the site to work. This document exists purely as a reference: for each field, the **Label** and the **Field Type**.

> **Built for ACF Free — no PRO required.** The original design has several repeating blocks (cards, list items, FAQs, timeline steps). Since Repeater is a PRO-only field type, every one of those is implemented instead as a **fixed number of Group fields** — Group is free-tier and lets each "row" show up as its own boxed section on the edit screen, e.g. "Card 1", "Card 2", "Card 3". The trade-off: the count per section is fixed (matching what the design actually uses) rather than "Add Row" — you can leave any slot's Title/Label blank to skip rendering it, but you can't add an eleventh FAQ without editing the theme.
>
> **If you do create any of these manually in wp-admin:** the field *name* (the internal slug) doesn't matter — ACF auto-generates it from the Label as you type. But creating a field with the **same Label** as a code-registered one adds a second, duplicate field rather than replacing it — only do this if you also remove the matching entry from the relevant `inc/acf-fields-*.php` file.
>
> **For every Image field**: set **Return Format → Image Array**. The template code reads `['url']`/`['alt']` off it, so any other return format (URL / ID) will break the image output.

---

## Theme Settings *(Appearance → Customize → "Theme Settings" panel — site-wide, not tied to a page)*

> These aren't ACF fields — ACF Options Pages need ACF PRO, so this set lives in the native WordPress **Customizer** instead (works on any ACF tier). Everything else on this page (all 6 page templates below) is unaffected and still ACF, since Group fields are free-tier.

**Header**
- Header Logo — Image
- Partner Button Text — Text
- Partner Button Link — Link *(URL)*

**Footer**
- Footer Logo — Image
- Footer Description — Text Area
- Footer Email — Email
- Facebook URL — Link *(URL)*
- Instagram URL — Link *(URL)*
- YouTube URL — Link *(URL)*
- LinkedIn URL — Link *(URL)*
- Copyright Text — Text

**Forms**
- reCAPTCHA Site Key — Text
- reCAPTCHA Secret Key — Text
- *(both optional — see "Leads & the Request Information form" near the end of this document)*

---

## Home Page

**Hero**
- Hero Background Image — Image
- Hero Title — Text
- Hero Text — Text Area
- Primary Button Text — Text
- Primary Button Link — Link *(URL)*
- Secondary Button Text — Text
- Secondary Button Link — Link *(URL)*

**A Simpler Way Section**
- Heading — Text
- Intro Text — Text Area
- **Row 1 / Row 2 / Row 3** — Group, each with:
  - Image — Image
  - Icon — Image
  - Title — Text
  - Text — Text Area

**Regional Investors Section**
- Heading — Text
- **Card 1 / Card 2 / Card 3** — Group, each with:
  - Photo — Image
  - Icon — Image
  - Title — Text
  - Label — Text
  - Text — Text Area

**How It Works (Timeline)**
- Heading — Text
- **Step 1 / Step 2 / Step 3 / Step 4** — Group, each with:
  - Icon — Image
  - Title — Text
  - Text — Text Area

**Campus Models Section**
- Heading — Text
- Intro Text — Text
- **Model Card 1 / Model Card 2 / Model Card 3** — Group, each with:
  - Image — Image
  - Label (e.g. MODEL A) — Text
  - Title — Text
  - Text — Text Area
  - Highlight this card — True / False
- Footnote — Text Area

**Why South Punjab Section**
- Image — Image
- Image Badge Title — Text
- Image Badge Text — Text
- Heading — Text
- Paragraph 1 — Text Area
- Paragraph 2 — Text Area
- Highlight Box Title — Text
- Highlight Box Text — Text Area

**Who This Is For Section**
- Image — Image
- Heading — Text
- Intro Text — Text
- Item 1 / Item 2 / Item 3 / Item 4 — Text *(each is one plain line — leave any blank to show fewer than 4)*

**CTA Section**
- Heading — Text
- Text — Text Area
- Button Text — Text
- Button Link — Link *(URL)*

---

## About Us Page

**Hero**
- Hero Image — Image
- Hero Title — Text

**Trust Section**
- Image — Image
- Heading — Text
- Text — Text Area
- List Title — Text
- **List Item 1 / List Item 2 / List Item 3** — Group, each with:
  - Label — Text
  - Text — Text Area

**Franchise Model Section**
- Image — Image
- Heading — Text
- Content — WYSIWYG Editor *(toolbar: Basic — lets you add/remove paragraphs freely)*

**Core Pillars Section**
- Heading — Text
- **Pillar 1 / Pillar 2 / Pillar 3** — Group, each with:
  - Icon — Image
  - Title — Text
  - Text — Text Area

**Quality Assurance Section**
- Image — Image
- Heading — Text
- Intro Text — Text Area
- **List Item 1 – List Item 5** — Group, each with:
  - Label — Text
  - Text — Text Area

**CTA Section**
- Heading — Text
- Text — Text Area

---

## Franchise Opportunity Page

**Hero**
- Hero Image — Image
- Hero Title — Text

**Business Case**
- Image — Image
- Heading — Text
- Text — Text Area
- List Subtitle — Text
- **List Item 1 – List Item 4** — Group, each with:
  - Label — Text
  - Text — Text Area

**Division of Responsibilities**
- Heading — Text
- Column 1 Title — Text
- Column 1 — Item 1 through Item 5 — Text *(each one plain line)*
- Column 2 Title — Text
- Column 2 — Item 1 through Item 7 — Text *(each one plain line)*

**Campus Models Overview**
- Heading — Text
- **Model Card 1 / Model Card 2 / Model Card 3** — Group, each with:
  - Image — Image
  - Label — Text
  - Title — Text
  - Text — Text Area

**Overview Icons**
- **Item 1 – Item 4** — Group, each with:
  - Icon — Image
  - Text — Text

**Financial Overview**
- Image — Image
- Title — Text
- **Line Item 1 / Line Item 2 / Line Item 3** — Group, each with:
  - Title — Text
  - Text — Text Area
- Note Title — Text
- Note Text — Text Area

**Ongoing Support**
- Icon — Image
- Title — Text
- Intro Text — Text Area
- **Item 1 / Item 2** — Group, each with:
  - Icon — Image
  - Text — Text Area

**CTA Section**
- Heading — Text
- Text — Text Area

---

## Programmes and Models Page

**Hero**
- Hero Image — Image
- Hero Title — Text

**Trusted System Section**
- Image — Image
- Heading — Text
- Text — Text Area

**Detailed Model Breakdown**
- Heading — Text
- **Model 1 / Model 2 / Model 3** — Group, each with:
  - Image — Image
  - Label (e.g. Model A) — Text
  - Title — Text
  - **Point 1 – Point 4** — Group *(nested inside the Model)*, each with:
    - Label (e.g. Ideal For) — Text
    - Text — Text Area
    - **Sub-list** — Group *(nested inside the Point; leave blank except for Model 3's Point 2, "Proposed Academic Programs")*, containing:
      - Sub-item 1 through Sub-item 6 — Text

**Compliance Statement**
- Heading — Text
- Text — Text Area

---

## FAQ Page

**Hero**
- Hero Image — Image
- Hero Title — Text

**Questions**
- **Question 1 – Question 10** — Group, each with:
  - Question — Text
  - Answer — Text Area
  - Open by default — True / False *(tick only for the one question that should be pre-expanded — usually Question 1)*

*(Leave any slot's Question field blank to show fewer than 10 FAQs.)*

---

## Request Information Page

**Hero**
- Hero Image — Image
- Hero Title — Text

**Intro**
- Image — Image
- Heading — Text
- Text — Text Area

**Application Form**
- Form Section Title — Text
- Submit Button Text — Text
- Success Message Title — Text
- Success Message Text — Text Area
- *(the actual inputs — name, phone, email, city, campus model, etc. — are fixed in the template, not ACF fields)*

**What Happens Next**
- Column Title — Text
- **Step 1 – Step 4** — Group, each with:
  - Label — Text
  - Text — Text Area

**Direct Contact Channels**
- Section Image — Image
- Column Title — Text
- Phone / WhatsApp — Text
- Email — Email
- Head Office Address — Text Area
- Facebook URL — Link *(URL)*
- Instagram URL — Link *(URL)*

---

## Headings with a highlighted word/phrase

A handful of the "Heading" fields above are plain **Text** fields, but the original design colors part of the heading (e.g. "Campus Models Tailored to **Your Market**"). Those fields come pre-filled with `<span class="text-accent">…</span>` (or `text_accent` on the Franchise Opportunity and Request Information pages — those two use the older class name) already wrapped around the highlighted words. Edit the wording in place and leave the `<span>` tags where they are; removing the tags just removes the color, and plain text elsewhere in the same field is safe.

---

## Footer Menu vs. Theme Settings — two different screens

The footer has two kinds of content, and they live in two different places in wp-admin. This trips people up because both *look* like they belong in "Menus":

**Appearance → Menus** — only the clickable **links** (Home / About / Franchise Programmed / etc.). Create a menu, add pages/custom links to it, then under **Menu Settings** at the bottom tick **"Footer Menu"** and Save. This is the flat row of links, nothing else.

**Appearance → Customize → Theme Settings → Footer** — everything else in the footer that *isn't* a link: the logo, description paragraph, email address, the four social icons, and the copyright line. *(Not a separate admin-menu item — it's a panel inside the Customizer, because ACF Options Pages need PRO. See the note at the top of the "Theme Settings" section above.)* Fill in:
- Footer Logo
- Footer Description
- Footer Email
- Facebook URL / Instagram URL / YouTube URL / LinkedIn URL
- Copyright Text

Both need to be filled in separately — adding items to the Footer Menu will never make the email/description/social icons appear, and vice versa. (Same split exists for the header: **Menus** → "Primary Menu (Header)" location for the nav links, **Customize → Theme Settings → Header** for the logo and "Partners with us" button.)

---

## Updating `assets/css/main.css`

`main.css` (the base theme framework stylesheet, ~558KB) is already **inside the theme zip** at `assets/css/main.css`, and `functions.php` enqueues it automatically — there's nothing to upload separately in wp-admin for it to work. It's active as soon as the theme is activated.

If you ever need to **replace it with an updated version** later, WordPress doesn't have a plugin/theme-upload flow for a single file — you edit the file directly where the theme lives:

- **Local (XAMPP, this setup):** overwrite `C:\xampp\htdocs\ugc\wp-content\themes\united-group-of-colleges\assets\css\main.css` directly on disk.
- **Live hosting:** connect via FTP or your host's File Manager and overwrite the same path (`wp-content/themes/united-group-of-colleges/assets/css/main.css`).

Either way, just replace that one file — no re-zip or re-upload of the whole theme needed, and no WordPress admin screen involved. Hard-refresh the browser afterward (Ctrl+F5) since browsers cache CSS aggressively.

---

## Leads & the Request Information form

The Request Information form actually submits and saves somewhere now — here's the full path a submission takes, and what you need to set up.

**What happens when someone submits:**
1. The form POSTs to `admin-post.php` (WordPress's standard way of handling a form submission that isn't a REST/AJAX call).
2. `inc/leads-handler.php` checks a security nonce, then validates the required fields (name, phone, valid email, city) **server-side** — this is the check that actually matters; the `required` attributes on the inputs are just a nicer UX on top of it.
3. If a reCAPTCHA secret key is configured (see below), the submitted token is verified against Google before continuing.
4. A new **Lead** is saved (see below), and an email goes to your site's admin email.
5. The visitor is redirected back to the same page with `?submitted=success` or `?submitted=error` in the URL — the template reads that flag and shows either the success message or an error notice above the form. No JavaScript is required for this to work.

**Where submissions show up:** a new **Leads** item appears in the wp-admin sidebar (below Comments). Each submission is one entry; the list view shows Name / Phone / Email / City / Campus Model at a glance, and opening one shows every field that was submitted. Leads aren't public pages — they're private records, only visible in wp-admin.

**Email notifications:** sent to whatever address is set at **Settings → General → Administration Email Address**. No extra setup needed — this is the same address WordPress already uses for its own account/password-reset emails.

**reCAPTCHA (optional, but recommended before going live):**
- Get a **free** Site Key + Secret Key at `google.com/recaptcha/admin` — register the domain the site will run on (for local testing, `localhost` works as a registered domain in reCAPTCHA's admin).
- Paste them into **Appearance → Customize → Theme Settings → Forms**.
- Leave both blank and the form still works fully (just without bot protection) — useful while testing locally. As soon as both keys are filled in, the checkbox widget appears on the form automatically and submissions are checked against it — no other change needed.

**If you ever need to change what counts as "required":** that logic lives in `inc/leads-handler.php`, in the `if ( ! $full_name || ! $phone || ! is_email( $email ) || ! $city )` check near the top of `ugc_handle_lead_submission()`.
