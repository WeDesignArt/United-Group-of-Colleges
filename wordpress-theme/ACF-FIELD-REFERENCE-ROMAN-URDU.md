# ACF Field Reference (Roman Urdu)

*(Yeh isi `ACF-FIELD-REFERENCE.md` ka Roman Urdu tarjuma hai. Field Labels aur Field Types (Text, Image, Group, URL, wagera) jaan boojh kar English mein rakhe hain kyunke wahi exact naam wp-admin screen par nazar aayenge — inko translate karne se confusion hogi.)*

Neeche di gayi har field group **already code mein register ho chuki hai** (`inc/acf-fields-*.php`) — site chalane ke liye aapko ACF mein manually kuch banane ki zaroorat nahi. Yeh document sirf reference ke liye hai: har field ka **Label** aur **Field Type** kya hai.

> **ACF Free ke liye banaya gaya hai — PRO ki zaroorat nahi.** Original design mein kai repeating blocks hain (cards, list items, FAQs, timeline steps). Chunke Repeater ek PRO-only field type hai, in sab ki jagah **fixed number ke Group fields** use kiye gaye hain — Group free-tier mein available hota hai aur har "row" ko edit screen par apna alag boxed section dikhata hai, jese "Card 1", "Card 2", "Card 3". Trade-off yeh hai: har section mein items ki ginti fixed hai (jitni design mein actually use hui hai) — "Add Row" wala option nahi hoga. Kisi bhi slot ka Title/Label khali chhod kar usay render hone se rok sakte ho, lekin gyarahwan FAQ add nahi kar sakte bina theme edit kiye.
>
> **Agar aap in mein se koi field manually wp-admin mein banate hain:** field ka *name* (internal slug) koi masla nahi — jese hi aap Label type karte ho, ACF khud hi uska name bana leta hai. Lekin agar aap koi field wahi **Label** se banayenge jo already code mein registered hai, tou woh purane ko replace nahi karega balke ek DUPLICATE field bana dega — aisa sirf tab karo jab aap `inc/acf-fields-*.php` file se us matching field ko hata bhi den.
>
> **Har Image field ke liye**: **Return Format → Image Array** set karo. Template code `['url']`/`['alt']` isi format se parhta hai, koi aur Return Format (URL / ID) select karne se image dikhna band ho jayegi.

---

## Theme Settings *(Appearance → Customize → "Theme Settings" panel — poori site ke liye, kisi ek page se juda nahi)*

> Yeh ACF fields nahi hain — ACF Options Pages ke liye ACF PRO chahiye hota hai, isliye yeh sab native WordPress **Customizer** mein rakha gaya hai (yeh kisi bhi ACF tier par kaam karta hai). Baaki poori site (neeche wale 6 page templates) par koi asar nahi, woh sab abhi bhi ACF hi hain, kyunke Group field free-tier mein hota hai.

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
- *(dono optional hain — is document ke aakhir mein "Leads aur Request Information form" wala section dekho)*

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
- **Row 1 / Row 2 / Row 3** — Group, har ek mein:
  - Image — Image
  - Icon — Image
  - Title — Text
  - Text — Text Area

**Regional Investors Section**
- Heading — Text
- **Card 1 / Card 2 / Card 3** — Group, har ek mein:
  - Photo — Image
  - Icon — Image
  - Title — Text
  - Label — Text
  - Text — Text Area

**How It Works (Timeline)**
- Heading — Text
- **Step 1 / Step 2 / Step 3 / Step 4** — Group, har ek mein:
  - Icon — Image
  - Title — Text
  - Text — Text Area

**Campus Models Section**
- Heading — Text
- Intro Text — Text
- **Model Card 1 / Model Card 2 / Model Card 3** — Group, har ek mein:
  - Image — Image
  - Label (jese MODEL A) — Text
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
- Item 1 / Item 2 / Item 3 / Item 4 — Text *(har ek sirf ek line hai — 4 se kam dikhane ke liye kisi ko bhi khali chhod do)*

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
- **List Item 1 / List Item 2 / List Item 3** — Group, har ek mein:
  - Label — Text
  - Text — Text Area

**Franchise Model Section**
- Image — Image
- Heading — Text
- Content — WYSIWYG Editor *(toolbar: Basic — isse aap paragraphs khud add/remove kar sakte ho)*

**Core Pillars Section**
- Heading — Text
- **Pillar 1 / Pillar 2 / Pillar 3** — Group, har ek mein:
  - Icon — Image
  - Title — Text
  - Text — Text Area

**Quality Assurance Section**
- Image — Image
- Heading — Text
- Intro Text — Text Area
- **List Item 1 – List Item 5** — Group, har ek mein:
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
- **List Item 1 – List Item 4** — Group, har ek mein:
  - Label — Text
  - Text — Text Area

**Division of Responsibilities**
- Heading — Text
- Column 1 Title — Text
- Column 1 — Item 1 se Item 5 tak — Text *(har ek sirf ek line)*
- Column 2 Title — Text
- Column 2 — Item 1 se Item 7 tak — Text *(har ek sirf ek line)*

**Campus Models Overview**
- Heading — Text
- **Model Card 1 / Model Card 2 / Model Card 3** — Group, har ek mein:
  - Image — Image
  - Label — Text
  - Title — Text
  - Text — Text Area

**Overview Icons**
- **Item 1 – Item 4** — Group, har ek mein:
  - Icon — Image
  - Text — Text

**Financial Overview**
- Image — Image
- Title — Text
- **Line Item 1 / Line Item 2 / Line Item 3** — Group, har ek mein:
  - Title — Text
  - Text — Text Area
- Note Title — Text
- Note Text — Text Area

**Ongoing Support**
- Icon — Image
- Title — Text
- Intro Text — Text Area
- **Item 1 / Item 2** — Group, har ek mein:
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
- **Model 1 / Model 2 / Model 3** — Group, har ek mein:
  - Image — Image
  - Label (jese Model A) — Text
  - Title — Text
  - **Point 1 – Point 4** — Group *(Model ke andar nested)*, har ek mein:
    - Label (jese Ideal For) — Text
    - Text — Text Area
    - **Sub-list** — Group *(Point ke andar nested; sirf Model 3 ke Point 2 "Proposed Academic Programs" ke ilawa baaki sab khali chhod do)*, jismein:
      - Sub-item 1 se Sub-item 6 tak — Text

**Compliance Statement**
- Heading — Text
- Text — Text Area

---

## FAQ Page

**Hero**
- Hero Image — Image
- Hero Title — Text

**Questions**
- **Question 1 – Question 10** — Group, har ek mein:
  - Question — Text
  - Answer — Text Area
  - Open by default — True / False *(sirf usi ek question ke liye tick karo jo pehle se khula dikhna chahiye — aam tor par Question 1)*

*(10 se kam FAQs dikhane ke liye kisi bhi slot ka Question field khali chhod do.)*

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
- *(form ke asal inputs — name, phone, email, city, campus model, waghera — template mein fixed hain, ACF fields nahi)*

**What Happens Next**
- Column Title — Text
- **Step 1 – Step 4** — Group, har ek mein:
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

## Woh Headings jinmein ek highlighted lafz/phrase hai

Upar diye gaye kuch "Heading" fields simple **Text** fields hain, lekin original design mein heading ka ek hissa color kiya gaya hai (jese "Campus Models Tailored to **Your Market**"). In fields mein pehle se `<span class="text-accent">…</span>` (ya Franchise Opportunity aur Request Information pages par `text_accent` — yeh dono purana class name use karte hain) highlighted lafzon ke gird pehle se wrap kiya hua aata hai. Wording ko usi jagah edit karo aur `<span>` tags ko waisa hi rehne do; tags hatane se sirf color hat jayega, aur usi field mein baaki jagah plain text likhna bilkul safe hai.

---

## Footer Menu vs. Theme Settings — do alag screens

Footer mein do tarah ka content hota hai, aur woh wp-admin ki do alag jagah par milta hai. Yeh confusion isliye hoti hai kyunke dono "Menus" mein hi lagte hain:

**Appearance → Menus** — sirf clickable **links** (Home / About / Franchise Programmed / waghera). Ek menu banao, usmein pages/custom links add karo, phir neeche **Menu Settings** mein **"Footer Menu"** tick karke Save karo. Yeh sirf links ki flat row hai, aur kuch nahi.

**Appearance → Customize → Theme Settings → Footer** — footer ka baaki sara content jo link *nahi* hai: logo, description paragraph, email address, chaar social icons, aur copyright line. *(Yeh admin-menu ka alag item nahi hai — yeh Customizer ke andar ek panel hai, kyunke ACF Options Pages ke liye PRO chahiye. Upar "Theme Settings" section ka note dekho.)* Yeh bharo:
- Footer Logo
- Footer Description
- Footer Email
- Facebook URL / Instagram URL / YouTube URL / LinkedIn URL
- Copyright Text

Dono ko alag alag bharna zaroori hai — Footer Menu mein links add karne se email/description/social icons kabhi nahi aayenge, aur ulta bhi sahi hai. (Header ke liye bhi yehi split hai: **Menus** → "Primary Menu (Header)" location nav links ke liye, aur **Customize → Theme Settings → Header** logo aur "Partners with us" button ke liye.)

---

## `assets/css/main.css` ko update karna

`main.css` (base theme framework stylesheet, ~558KB) already **theme zip ke andar** `assets/css/main.css` mein maujood hai, aur `functions.php` isko khud-b-khud load kar leta hai — wp-admin mein iske liye alag se kuch upload karne ki zaroorat nahi. Theme activate hote hi yeh active ho jati hai.

Agar kabhi is file ko **updated version se replace** karna ho, WordPress mein single file ke liye koi plugin/theme-upload wala tareeqa nahi hai — file ko seedha wahin edit karna padta hai jahan theme hai:

- **Local (XAMPP, yeh wala setup):** seedha `C:\xampp\htdocs\ugc\wp-content\themes\united-group-of-colleges\assets\css\main.css` ko disk par overwrite karo.
- **Live hosting:** FTP ya apne host ke File Manager se connect karke wahi path (`wp-content/themes/united-group-of-colleges/assets/css/main.css`) overwrite karo.

Dono soorat mein, bas usi ek file ko replace karo — poori theme dobara zip/upload karne ki zaroorat nahi, aur koi WordPress admin screen bhi involve nahi. Baad mein browser hard-refresh (Ctrl+F5) zaroor karo kyunke browsers CSS ko kaafi aggressively cache karte hain.

---

## Leads aur Request Information form

Request Information form ab sach mei submit hota hai aur kahin save bhi hota hai — neeche poora process hai ke ek submission kya kya steps se guzarti hai, aur aapko kya setup karna hai.

**Jab koi form submit karta hai tou kya hota hai:**
1. Form `admin-post.php` par POST hota hai (yeh WordPress ka standard tareeqa hai kisi aisi form submission ko handle karne ka jo REST/AJAX call nahi hai).
2. `inc/leads-handler.php` pehle ek security nonce check karta hai, phir required fields (name, phone, valid email, city) ko **server-side** validate karta hai — yehi check asal mein matter karta hai; inputs par lage `required` attributes to sirf UI behtar dikhane ke liye hain.
3. Agar reCAPTCHA secret key set hai (neeche dekho), tou submit hui token ko aage badhne se pehle Google se verify kiya jata hai.
4. Ek naya **Lead** save hota hai (neeche dekho), aur aapki site ke admin email par ek email chala jata hai.
5. Visitor ko wapas usi page par bhej diya jata hai URL mein `?submitted=success` ya `?submitted=error` ke sath — template yeh flag parh kar ya to success message dikhata hai ya form ke upar ek error notice. Iske liye koi JavaScript zaroori nahi.

**Submissions kahan dikhengi:** wp-admin ki sidebar mein (Comments ke neeche) ek naya **Leads** item aa jata hai. Har submission ek entry hai; list view mein Name / Phone / Email / City / Campus Model ek nazar mein dikhte hain, aur kisi ek ko khol kar submit hui har field dekhi ja sakti hai. Leads koi public pages nahi hain — yeh sirf private records hain, sirf wp-admin mein hi nazar aate hain.

**Email notifications:** jo bhi address **Settings → General → Administration Email Address** par set hai, wahan bhejay jate hain. Iske liye alag se kuch setup nahi karna — yeh wahi address hai jo WordPress apne account/password-reset emails ke liye pehle se use karta hai.

**reCAPTCHA (optional hai, lekin live jaane se pehle recommended hai):**
- `google.com/recaptcha/admin` se apni **free** Site Key + Secret Key le lo — jis domain par site chalegi usay register karo (local testing ke liye, `localhost` bhi reCAPTCHA ke admin mein ek registered domain ki tarah kaam kar jata hai).
- Inhein **Appearance → Customize → Theme Settings → Forms** mein paste kar do.
- Dono khali chhod doge tou bhi form poori tarah kaam karega (bas bot protection nahi hoga) — local testing ke waqt yeh kaafi useful hai. Jaise hi dono keys bhar doge, checkbox widget khud form par aa jayega aur submissions uske against check hone lagengi — koi aur change nahi karna padega.

**Agar kabhi yeh badalna ho ke "required" kya count hota hai:** yeh logic `inc/leads-handler.php` mein hai, `ugc_handle_lead_submission()` ke shuru mein `if ( ! $full_name || ! $phone || ! is_email( $email ) || ! $city )` wale check mein.
