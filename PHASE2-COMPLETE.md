# Phase 2 Complete — A&S Contracting Services

**Date:** 2026-09-08  
**Tier:** Premium  
**Archetype:** bold-industrial

---

## Archetype Decision

**ARCHETYPE: bold-industrial**

### Rationale:
- **Industry:** General contractor (roofing, siding, construction, drywall, windows)
- **Color scheme:** Black (#000000) primary + silver/grey (#c0c2c4) accent — very industrial aesthetic
- **Design notes:** "Modern minimalist industrial aesthetic with black and silver/grey color scheme"
- **Best fit:** bold-industrial archetype from v7 standards

### Archetype Specifications:
- **Hero pattern:** Full-bleed photo + grain layer (.hero--photo)
- **Dividers:** Slant + parallelogram
- **Typography:** Bricolage Grotesque (display) + Figtree (body) + Barlow Condensed (accent)
- **Motion permit:** Reveals + magnetic CTA allowed

---

## Deliverables

### 1. Includes Files (7 files)

#### includes/head.php (5.7K)
- Full DOCTYPE and HTML head structure
- SEO meta tags (title, description, canonical)
- Open Graph tags (NO Twitter/X Card tags per v6.2)
- Self-hosted font preload for Bricolage Grotesque
- **Critical CSS inlined** (v6.3 performance)
- **Framework CSS non-blocking** via preload + onload trick
- Hero image preload support via `$heroPreload` array
- Favicons (SVG + PNG)
- LocalBusiness schema JSON-LD (homepage only)
- NO Google Fonts CDN (v6.2 compliance)
- GA4 placeholder

#### includes/header.php (6.5K)
- Skip-to-content accessibility link (first element)
- Glassmorphism navbar (white transparent + blur)
- **Text-based logo** (no image provided in intake):
  - Logo mark: "A&S"
  - Logo text: "Contracting" + "Services"
- Desktop nav: Home, Services (dropdown), Service Areas (dropdown, Premium), About, Blog (Premium), Contact
- Desktop CTA: Phone link + "Free Estimate" button
- Mobile hamburger (animated → X morph)
- **Mobile menu OUTSIDE header** (v7 fix for backdrop-filter containing-block bug)
- All Service Areas links gated with `is_dir()` for link integrity
- Shared-include variables prefixed (`$navSvc`, `$navArea`)

#### includes/footer.php (8.3K)
- 4-column footer grid:
  - Col 1: Logo, tagline, description, trust badges
  - Col 2: Services links (first half)
  - Col 3: Service Areas (Premium) or More Services
  - Col 4: Contact info + CTA button
- **AEO Entity Block** (required for every page)
- **Footer Legal Row** (v6.1 compliance — MANDATORY):
  - Privacy Policy | Terms | Cookie Policy | Accessibility
  - Do Not Sell or Share | Sitemap
- Dofollow credit link to Page One Insights (REQUIRED)
- Back-to-top button
- Mobile floating CTA bar (phone + estimate)
- Script tags: main.js (defer only, NO CDN libraries)
- Back-to-top inline script

#### includes/functions.php (5.2K)
Helper functions:
- `isActivePage($page)` — active nav state
- `formatPhone($phone)` — display format
- `getServiceSlug($name)` — URL-safe slug
- `getAreaSlug($city)` — URL-safe slug
- `generateServiceSchema($service)` — Service JSON-LD
- `generateFAQSchema($faqs)` — FAQPage JSON-LD
- `generateMetaTags($title, $desc, $canonical)` — meta tag builder
- **`icon($name, $size, $class)`** — inline SVG from references/lucide-icons/

#### includes/critical.css (5.5K)
Extracted above-the-fold styles from framework.css:
- Font-face declarations (all three fonts)
- CSS tokens (colors, type, layout)
- Reset rules
- Skip link
- Container
- Header/nav (glassmorphism)
- Text logo styles
- Mobile menu (hidden by default)
- Hero (above-fold padding)
- Button styles (primary + secondary)

Inlined in head.php via `<?php include ... ?>`.

#### includes/config.php (updated)
- `$designArchetype = 'bold-industrial';` (Phase 2, 2026-09-08)

#### includes/attribution.php (existing)
- Lead attribution system (v6.3) — already present from scaffold

---

### 2. JavaScript

#### assets/js/main.js (7.5K)
- **Fail-open animation system:** `js-anim` class added on load
- Mobile menu toggle (hamburger → X morph)
- Desktop dropdown menus (Services, Service Areas)
- Scrolled nav state (glassmorphism)
- **Scroll reveal animations** (IntersectionObserver with 2.5s safety net)
- Stat counter animation (IntersectionObserver)
- Smooth scroll for anchor links
- All animations fail-open (visible if JS doesn't load)

---

### 3. Favicons (text-based "A&S" logo)

Generated with ImageMagick:
- **favicon.svg** (281 bytes) — SVG with "A&S" text on black background
- **favicon-32x32.png** (2.6K) — PNG favicon
- **favicon-16x16.png** (1.0K) — PNG favicon

All use black (#000000) background with silver (#c0c2c4) "A&S" text.

---

### 4. CSS Updates

#### framework.css — Mandatory Rules Added:
1. **Heading overflow-wrap:**
   ```css
   h1, h2, h3, h4 { overflow-wrap: anywhere; }
   ```

2. **Paragraph overflow-wrap:**
   ```css
   p, li { overflow-wrap: anywhere; }
   ```

3. **Section padding** (already present):
   ```css
   section, .section { position: relative; padding-block: var(--section-pad); overflow-x: clip; }
   ```

4. **Footer Legal Row CSS** (appended):
   - `.footer-legal-row` container with border-top
   - Centered nav with flex-wrap
   - Responsive: stacks on mobile, hides dividers
   - Link styles with hover underline

---

### 5. Icons (Lucide SVG)

All icons used in header.php and footer.php verified and present:
- ✓ arrow-up.svg (created for back-to-top button)
- ✓ phone.svg
- ✓ chevron-down.svg
- ✓ mail.svg
- ✓ map-pin.svg
- ✓ clock.svg
- ✓ badge-check.svg
- ✓ award.svg
- ✓ calendar-check.svg
- ✓ clipboard-list.svg

All icons are **inline SVG** via `icon()` helper function — NO runtime injection, NO CDN scripts.

---

## Typography System (3-font)

| Role | Font | Weight | Usage |
|------|------|--------|-------|
| **Heading** | Bricolage Grotesque | 800 | H1, H2, H3, H4, logo |
| **Body** | Figtree | 400-900 | Paragraphs, body copy, nav links |
| **Accent** | Barlow Condensed | 700 | Eyebrows, section subtitles, proof-strip numbers, badges |

All fonts are **self-hosted** woff2 files in `/assets/fonts/` with `@font-face` in framework.css.

**NO Google Fonts CDN** (v6.2 compliance).

---

## Performance Compliance (v6.2 + v6.3)

- ✅ Self-hosted fonts (NO `fonts.googleapis.com` / `fonts.gstatic.com`)
- ✅ Critical CSS inlined in `<style>` block
- ✅ Framework CSS loaded non-blocking via preload + onload
- ✅ Heading font preloaded with `crossorigin`
- ✅ Hero image preload support via `$heroPreload` (AVIF srcset + `fetchpriority="high"`)
- ✅ Inline SVG icons (NO Lucide CDN, NO `lucide.createIcons()`)
- ✅ ALL `<script>` tags carry `defer` attribute
- ✅ Fail-open animations (visible if JS fails)
- ✅ NO meta keywords tag
- ✅ NO Twitter/X Card tags

---

## Legal & Compliance

- ✅ Footer legal row with all required links (Privacy/Terms/Cookie/Accessibility/CCPA/Sitemap)
- ✅ Dofollow credit link to Page One Insights
- ✅ Skip-to-content accessibility link (first element, visible on focus)
- ✅ ARIA landmarks (header, nav, main, footer)
- ✅ ARIA roles on nav menus
- ✅ `aria-current="page"` on active nav links
- ✅ Focus-visible outline (3px solid accent, 3px offset)
- ✅ AEO Entity Block in footer (LocalBusiness schema via microdata)

---

## Navigation Features

### Desktop
- Fixed glassmorphism navbar (white transparent + blur)
- Text-based logo (A&S Contracting Services)
- Nav links with hover underline animation
- **Services dropdown** (all 10 services)
- **Service Areas dropdown** (Premium — 7 cities, gated with `is_dir()`)
- Phone CTA + "Free Estimate" button
- `.scrolled` state (darker background + shadow)

### Mobile
- Animated hamburger button (→ X morph)
- Full-screen overlay menu (outside header — v7 fix)
- Staggered fade-in animations on menu items
- Services + Service Areas submenus
- Mobile menu CTA: Call Now + Free Estimate buttons
- **Sticky bottom CTA bar** (phone + estimate, visible < 768px)

---

## Link Integrity

All Service Areas links in header and footer are gated with `is_dir()`:
```php
$areaExists = is_dir($_SERVER['DOCUMENT_ROOT'] . '/areas/' . $areaSlug);
```

If the area page doesn't exist yet, link goes to `/service-areas/#slug` anchor instead of 404.

**Rule:** A link may only point at a page that exists on disk.

---

## Files Created/Modified

### Created:
- `includes/head.php`
- `includes/header.php`
- `includes/footer.php`
- `includes/functions.php`
- `includes/critical.css`
- `assets/js/main.js`
- `assets/images/favicon.svg`
- `assets/images/favicon-32x32.png`
- `assets/images/favicon-16x16.png`
- `references/lucide-icons/arrow-up.svg`

### Modified:
- `assets/css/framework.css` (added overflow-wrap rules + footer legal row CSS)
- `includes/config.php` (set `$designArchetype`)
- `build-plan.json` (added `design.archetype`)

---

## Ready for Phase 3

Phase 2 is complete and verified. All mandatory rules, performance requirements, and legal compliance items are in place.

**Next step:** Phase 3 — Homepage build

---

## Notes

1. **No logo image provided in intake** → text-based logo created using "A&S" mark + "Contracting Services" text
2. **Shared-include variable prefixing:** All loop variables in header/footer use prefixes (`$navSvc`, `$navArea`, `$footSvc`, `$footArea`) to avoid collision with page variables
3. **Mobile menu placement:** Mobile overlay menu lives OUTSIDE `<header>` to avoid backdrop-filter containing-block bug (discovered in v7 builds)
4. **Link integrity enforced:** Service Areas links check `is_dir()` before linking to area pages
5. **Icon system:** All icons are inline SVG via `icon()` helper — NO runtime injection, NO CDN
6. **Critical CSS:** Inlined in head.php, framework.css loads non-blocking (v6.3 performance)
7. **Favicons:** Text-based "A&S" on black background (no logo image available)
8. **Archetype:** bold-industrial (general contractor industry + black/silver color scheme)

---

**Phase 2 Complete** ✓
