# ACF Field Reference

Every field group below is **already registered in code** (`inc/acf-fields-*.php`) — you don't need to manually create any of this in ACF for the site to work. This document exists purely as a reference: for each field, the **Label** and the **Field Type** you'd pick from ACF's "Field Type" dropdown if you were ever building it by hand (e.g. to understand the setup, rebuild it on another site, or move away from code-based fields later).

> **If you do create any of these manually in wp-admin:** the field *name* (the internal slug) doesn't matter here — ACF auto-generates it from the Label as you type, and that's fine to leave as-is. But creating a field with the **same Label** as a code-registered one adds a second, duplicate field on the same screen rather than replacing it — so only do this if you also remove the matching entry from the relevant `inc/acf-fields-*.php` file, otherwise you'll see it twice.
>
> **For every Image field**: set **Return Format → Image Array**. The template code reads `$field['url']` and `$field['alt']` from it, so any other return format (URL / ID) will break the image output.

Repeater fields are marked **(Repeater)** — their indented children are the sub-fields/columns inside each row.

---

## Theme Settings *(Appearance → Theme Settings — site-wide, not tied to a page)*

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
- Rows — **(Repeater, layout: Block)**
  - Image — Image
  - Icon — Image
  - Title — Text
  - Text — Text Area

**Regional Investors Section**
- Heading — Text
- Cards — **(Repeater, layout: Block)**
  - Photo — Image
  - Icon — Image
  - Title — Text
  - Label — Text
  - Text — Text Area

**How It Works (Timeline)**
- Heading — Text
- Steps — **(Repeater, layout: Block)**
  - Icon — Image
  - Title — Text
  - Text — Text Area

**Campus Models Section**
- Heading — Text
- Intro Text — Text
- Model Cards — **(Repeater, layout: Block)**
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
- List Items — **(Repeater, layout: Table)**
  - Text — Text

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
- List Items — **(Repeater, layout: Block)**
  - Label — Text
  - Text — Text Area

**Franchise Model Section**
- Image — Image
- Heading — Text
- Content — WYSIWYG Editor *(toolbar: Basic — lets you add/remove paragraphs freely)*

**Core Pillars Section**
- Heading — Text
- Pillars — **(Repeater, layout: Block)**
  - Icon — Image
  - Title — Text
  - Text — Text Area

**Quality Assurance Section**
- Image — Image
- Heading — Text
- Intro Text — Text Area
- List Items — **(Repeater, layout: Block)**
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
- List Items — **(Repeater, layout: Block)**
  - Label — Text
  - Text — Text Area

**Division of Responsibilities**
- Heading — Text
- Column 1 Title — Text
- Column 1 Items — **(Repeater, layout: Table)**
  - Text — Text
- Column 2 Title — Text
- Column 2 Items — **(Repeater, layout: Table)**
  - Text — Text

**Campus Models Overview**
- Heading — Text
- Model Cards — **(Repeater, layout: Block)**
  - Image — Image
  - Label — Text
  - Title — Text
  - Text — Text Area

**Overview Icons**
- Items — **(Repeater, layout: Table)**
  - Icon — Image
  - Text — Text

**Financial Overview**
- Image — Image
- Title — Text
- Line Items — **(Repeater, layout: Block)**
  - Title — Text
  - Text — Text Area
- Note Title — Text
- Note Text — Text Area

**Ongoing Support**
- Icon — Image
- Title — Text
- Intro Text — Text Area
- Items — **(Repeater, layout: Block)**
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
- Models — **(Repeater, layout: Block)**
  - Image — Image
  - Label (e.g. Model A) — Text
  - Title — Text
  - Points — **(Repeater, layout: Block — nested inside each Model row)**
    - Label (e.g. Ideal For) — Text
    - Text — Text Area
    - Sub-list — **(Repeater, layout: Table — nested inside each Point row; leave empty except for Model C's "Proposed Academic Programs" point)**
      - Text — Text

**Compliance Statement**
- Heading — Text
- Text — Text Area

---

## FAQ Page

**Hero**
- Hero Image — Image
- Hero Title — Text

**Questions**
- FAQ Items — **(Repeater, layout: Block)**
  - Question — Text
  - Answer — Text Area
  - Open by default — True / False *(tick only for the one question that should be pre-expanded)*

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
- *(the actual inputs — name, phone, email, city, campus model, etc. — are fixed in the template, not ACF fields)*

**What Happens Next**
- Column Title — Text
- Steps — **(Repeater, layout: Block)**
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
