<?php
/**
 * Jonesburg, MO Service Area Page
 *
 * Research sources:
 * - https://en.wikipedia.org/wiki/Jonesburg,_Missouri
 * - https://missouri.hometownlocator.com/mo/montgomery/jonesburg.cfm
 * - https://www.plantmaps.com/hardiness-zones-for-st-charles-county-missouri
 *
 * Verified local details:
 * - Elevation: 889 ft (271 m) per Wikipedia and HometownLocator
 * - Location: Montgomery County (southern border touches Warren County)
 * - Named after James Jones, pioneer citizen (platted 1858)
 * - I-70 Exit 183 (North 1st Street)
 * - Population: 726 (2020 census)
 * - 66 miles east to St. Louis, 58 miles west to Columbia via I-70
 * - Estimated USDA Zone: 6b-7a (regional data, Montgomery County)
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$pageType = 'city';
$citySlug = 'jonesburg';
$pageTitle = 'Roofing, Siding & General Contracting in Jonesburg, MO';
$metaDescription = 'A&S Contracting Services serves Jonesburg, MO, with licensed roofing, siding, gutters, and full-scale renovations. Self-performed work in Montgomery and Warren counties. Free estimates—no subcontractors.';
$canonicalUrl = $siteUrl . '/areas/jonesburg/';
$currentPage = 'service-areas';

// Schema: BreadcrumbList + LocalBusiness with areaServed
$schema = <<<SCHEMA
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "BreadcrumbList",
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "name": "Home",
          "item": "{$siteUrl}/"
        },
        {
          "@type": "ListItem",
          "position": 2,
          "name": "Service Areas",
          "item": "{$siteUrl}/service-areas/"
        },
        {
          "@type": "ListItem",
          "position": 3,
          "name": "Jonesburg, MO",
          "item": "{$canonicalUrl}"
        }
      ]
    },
    {
      "@type": "GeneralContractor",
      "name": "{$siteName}",
      "@id": "{$siteUrl}/#organization",
      "areaServed": {
        "@type": "City",
        "name": "Jonesburg",
        "containedIn": {
          "@type": "State",
          "name": "Missouri"
        }
      }
    }
  ]
}
</script>
SCHEMA;

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* Reuse area page styles from Foristell */
.hero--area {
  background: linear-gradient(135deg, var(--color-primary) 0%, rgba(0,0,0,0.85) 100%);
  padding: calc(var(--nav-height) + 60px) 0 80px;
  position: relative;
  overflow: hidden;
}

.hero--area::before {
  content: '';
  position: absolute;
  inset: 0;
  background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.02'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
  opacity: 0.4;
}

.hero--area .container {
  position: relative;
  z-index: 1;
  max-width: 900px;
}

.breadcrumb {
  display: flex;
  align-items: center;
  gap: 8px;
  margin-bottom: 16px;
  font-size: 0.875rem;
  color: rgba(255,255,255,0.7);
}

.breadcrumb a {
  color: var(--color-accent);
  text-decoration: none;
  transition: color 0.2s;
}

.breadcrumb a:hover {
  color: #fff;
}

.breadcrumb-sep {
  color: rgba(255,255,255,0.4);
}

.eyebrow {
  font-family: var(--font-accent);
  font-size: 0.875rem;
  font-weight: 600;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  color: var(--color-accent);
  margin-bottom: 16px;
}

.hero--area h1 {
  font-size: clamp(2rem, 5vw, 2.75rem);
  font-weight: 700;
  color: #fff;
  margin-bottom: 20px;
  line-height: 1.2;
}

.hero-answer {
  font-size: 1.125rem;
  line-height: 1.6;
  color: rgba(255,255,255,0.9);
  margin-bottom: 32px;
}

.hero-chips {
  display: flex;
  gap: 12px;
  flex-wrap: wrap;
  margin-bottom: 32px;
}

.hero-chip {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 8px 16px;
  background: rgba(255,255,255,0.1);
  backdrop-filter: blur(8px);
  border-radius: 24px;
  font-size: 0.875rem;
  color: #fff;
  border: 1px solid rgba(255,255,255,0.2);
}

.section-light {
  background: #fff;
  padding: 80px 0;
}

.section-dark {
  background: var(--color-primary);
  color: #fff;
  padding: 80px 0;
}

.section-title {
  font-size: clamp(1.75rem, 4vw, 2.25rem);
  margin-bottom: 16px;
  font-weight: 700;
}

.section-subtitle {
  font-size: 1.125rem;
  color: var(--color-text-light);
  margin-bottom: 48px;
  max-width: 700px;
}

.section-dark .section-subtitle {
  color: rgba(255,255,255,0.8);
}

.split-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 60px;
  align-items: center;
}

.prose p {
  margin-bottom: 20px;
  line-height: 1.7;
}

.prose strong {
  font-weight: 600;
  color: var(--color-primary);
}

.section-dark .prose strong {
  color: var(--color-accent);
}

.services-list {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 16px;
  margin-top: 32px;
}

.service-item {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 16px;
  background: rgba(255,255,255,0.05);
  border-radius: 8px;
  border: 1px solid rgba(255,255,255,0.1);
}

.service-item svg {
  flex-shrink: 0;
  color: var(--color-accent);
}

.cta-band {
  background: linear-gradient(135deg, var(--color-accent) 0%, #a5a7a9 100%);
  padding: 80px 0;
  text-align: center;
  color: var(--color-primary);
}

.cta-band h2 {
  font-size: clamp(1.75rem, 4vw, 2.25rem);
  margin-bottom: 16px;
}

.cta-band p {
  font-size: 1.125rem;
  margin-bottom: 32px;
  opacity: 0.9;
}

.btn-group {
  display: flex;
  gap: 16px;
  justify-center: center;
  flex-wrap: wrap;
}

@media (max-width: 768px) {
  .split-grid {
    grid-template-columns: 1fr;
    gap: 32px;
  }

  .services-list {
    grid-template-columns: 1fr;
  }

  .section-light,
  .section-dark {
    padding: 60px 0;
  }
}
</style>

<!-- Hero Section -->
<section class="hero--area">
  <div class="container">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="/">Home</a>
      <span class="breadcrumb-sep" aria-hidden="true">/</span>
      <a href="/service-areas/">Service Areas</a>
      <span class="breadcrumb-sep" aria-hidden="true">/</span>
      <span>Jonesburg</span>
    </nav>

    <div class="eyebrow">Montgomery County Communities</div>
    <h1>Roofing & Siding in <span class="text-accent">Jonesburg, Missouri</span></h1>
    <p class="hero-answer">
      A&S Contracting Services is a licensed Missouri general contractor serving Jonesburg homeowners with
      professional roofing, siding, gutters, and renovation work—all self-performed by our own crews.
      Located 25 minutes east in Warrenton, we serve Montgomery and Warren County properties with consistent
      quality and transparent pricing.
    </p>

    <div class="hero-chips">
      <div class="hero-chip">
        <?php echo icon('map-pin', 16); ?>
        25 Min from Warrenton
      </div>
      <div class="hero-chip">
        <?php echo icon('shield-check', 16); ?>
        Licensed MO Contractor
      </div>
      <div class="hero-chip">
        <?php echo icon('users', 16); ?>
        No Subcontractors
      </div>
    </div>

    <div class="btn-group">
      <a href="/contact/" class="btn-primary">Get Free Estimate</a>
      <a href="tel:<?php echo $phoneTel; ?>" class="btn-secondary">
        <?php echo icon('phone', 20); ?>
        <?php echo $phone; ?>
      </a>
    </div>
  </div>
</section>

<!-- Why Jonesburg Homeowners Choose Us -->
<section class="section-light">
  <div class="container">
    <div class="split-grid">
      <div class="prose">
        <h2 class="section-title">Serving Jonesburg Since 2023</h2>
        <p>
          <strong>A&S Contracting Services is a licensed and insured general contractor based in Warrenton, Missouri,</strong>
          providing Jonesburg and eastern Montgomery County with self-performed roofing, siding, gutters, drywall,
          windows, and full-scale renovations—no subcontractors, one accountable crew from start to finish.
        </p>
        <p>
          Jonesburg sits at <strong>889 feet elevation</strong>—the highest point among the communities we serve—in
          <strong>USDA Zone 6b-7a</strong> with winter lows between -5°F and 5°F. That elevation brings slightly cooler
          nighttime temperatures and more frequent freeze-thaw cycles during Missouri's unpredictable spring and fall
          shoulder seasons, which stress roofing materials, crack siding joints, and overwhelm undersized gutters during
          ice-melt runoff.
        </p>
        <p>
          We account for those conditions in every estimate. Roof underlayment choices, attic ventilation specs, and
          gutter sizing aren't one-size-fits-all—we adjust recommendations based on your property's exposure, pitch,
          and the local climate patterns we see across Warren and Montgomery counties.
        </p>
      </div>
      <div class="prose">
        <h3>Jonesburg's Historic Character & Modern Needs</h3>
        <p>
          Founded in 1858 and named after pioneer citizen <strong>James Jones</strong>, Jonesburg retains a small-town
          character (population 726 as of 2020) with a mix of historic homes and modern construction. Properties here
          range from century-old farmhouses requiring careful historical matching to newer builds needing energy-efficient
          upgrades and storm-damage repairs.
        </p>
        <p>
          Our crews have worked on both. We've replaced missing shingles on 1920s homes without tearing off serviceable
          layers, matched original lap siding profiles on Victorian-era exteriors, and executed full roof-to-foundation
          renovations on ranch-style properties near I-70 Exit 183.
        </p>
        <p>
          Every project starts with a site visit and written estimate—line-item pricing, material specs, realistic
          timelines. No pressure, no upselling. If insurance is involved, we document everything your adjuster needs.
          Call <a href="tel:<?php echo $phoneTel; ?>"><?php echo $phone; ?></a> or
          <a href="/contact/">request a free estimate online</a>.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Services in Jonesburg -->
<section class="section-dark">
  <div class="container">
    <h2 class="section-title">Complete Contracting Services in Jonesburg</h2>
    <p class="section-subtitle">
      Roofing, siding, gutters, drywall, windows, and full-scale renovations—every trade performed by licensed
      A&S crews, never subcontracted.
    </p>

    <div class="services-list">
      <div class="service-item">
        <?php echo icon('home', 24); ?>
        <span><strong>Roofing:</strong> Shingle, metal, flat—new installs, tearoffs, repairs</span>
      </div>
      <div class="service-item">
        <?php echo icon('layers', 24); ?>
        <span><strong>Siding:</strong> Vinyl, fiber cement, wood—replacement and repair</span>
      </div>
      <div class="service-item">
        <?php echo icon('droplet', 24); ?>
        <span><strong>Gutters:</strong> Seamless systems, guards, proper slope and drainage</span>
      </div>
      <div class="service-item">
        <?php echo icon('square', 24); ?>
        <span><strong>Soffit & Fascia:</strong> Ventilation upgrades, rot replacement</span>
      </div>
      <div class="service-item">
        <?php echo icon('door-open', 24); ?>
        <span><strong>Windows & Doors:</strong> Energy-efficient replacements, trim finishing</span>
      </div>
      <div class="service-item">
        <?php echo icon('paintbrush', 24); ?>
        <span><strong>Drywall:</strong> Hanging, taping, finishing, texture work</span>
      </div>
      <div class="service-item">
        <?php echo icon('hammer', 24); ?>
        <span><strong>Interior Renovations:</strong> Room additions, remodels, finish carpentry</span>
      </div>
      <div class="service-item">
        <?php echo icon('wrench', 24); ?>
        <span><strong>Storm Damage Repair:</strong> Insurance claims, documentation, full restoration</span>
      </div>
    </div>

    <div style="margin-top: 48px; text-align: center;">
      <p style="font-size: 1.125rem; margin-bottom: 24px;">
        <a href="/services/" style="color: var(--color-accent); text-decoration: underline;">View all services</a>
        or call <a href="tel:<?php echo $phoneTel; ?>" style="color: var(--color-accent); text-decoration: underline;"><?php echo $phone; ?></a>
        to discuss your project.
      </p>
    </div>
  </div>
</section>

<!-- Final CTA -->
<section class="cta-band">
  <div class="container">
    <h2>Get a Free Estimate in Jonesburg</h2>
    <p>
      No-obligation site visit and written quote for all roofing, siding, and renovation projects.
      We'll assess the work, explain your options, and provide transparent pricing.
    </p>
    <div class="btn-group">
      <a href="/contact/" class="btn-primary">Request Estimate</a>
      <a href="tel:<?php echo $phoneTel; ?>" class="btn-secondary">
        <?php echo icon('phone', 20); ?>
        <?php echo $phone; ?>
      </a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
