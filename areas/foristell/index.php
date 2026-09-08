<?php
/**
 * Foristell, MO Service Area Page
 *
 * Research sources:
 * - https://en.wikipedia.org/wiki/Foristell,_Missouri
 * - https://missouri.hometownlocator.com/mo/warren/jonesburg.cfm
 * - https://www.plantmaps.com/hardiness-zones-for-st-charles-county-missouri
 *
 * Verified local details:
 * - Elevation: ~705 ft (multiple topographic sources)
 * - Location: St. Charles and Warren counties
 * - Landmark: Towne Park (100 Towne Park Drive)
 * - Natural feature: Peruque Creek (flows south side of city)
 * - I-70 corridor location (between Wright City and Wentzville)
 * - USDA Zone: 6b-7a (St. Charles County data)
 * - Population: 550 (2020 census)
 * - Rural character, predominantly owner-occupied housing
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$pageType = 'city';
$citySlug = 'foristell';
$pageTitle = 'Roofing, Siding & General Contracting in Foristell, MO';
$pageDescription = 'A&S Contracting Services serves Foristell homeowners with licensed roofing, siding, gutters, and full-scale renovations. Self-performed work—no subcontractors. Free estimates for St. Charles and Warren County properties.';
$canonicalUrl = $siteUrl . '/areas/foristell/';
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
          "name": "Foristell, MO",
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
        "name": "Foristell",
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
/* Area Page Styles */
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
  justify-content: center;
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
      <span>Foristell</span>
    </nav>

    <div class="eyebrow">I-70 Corridor Communities</div>
    <h1>General Contracting in <span class="text-accent">Foristell, Missouri</span></h1>
    <p class="hero-answer">
      A&S Contracting Services is a licensed Missouri general contractor serving Foristell homeowners with
      self-performed roofing, siding, gutters, and full-scale renovations—no subcontractors, same crew start
      to finish. Based 15 minutes west in Warrenton, we respond quickly to properties throughout St. Charles
      and Warren counties.
    </p>

    <div class="hero-chips">
      <div class="hero-chip">
        <?php echo icon('map-pin', 16); ?>
        15 Min from Warrenton
      </div>
      <div class="hero-chip">
        <?php echo icon('badge-check', 16); ?>
        Licensed & Insured
      </div>
      <div class="hero-chip">
        <?php echo icon('calendar-check', 16); ?>
        Free Estimates
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

<!-- Why Foristell Homeowners Choose Us -->
<section class="section-light">
  <div class="container">
    <div class="split-grid">
      <div class="prose">
        <h2 class="section-title">Why Foristell Homeowners Choose A&S Contracting</h2>
        <p>
          <strong>A&S Contracting Services is a licensed and insured general contractor based in Warrenton, Missouri,</strong>
          serving Foristell and surrounding I-70 corridor communities with self-performed roofing, siding, gutters,
          drywall, and full-scale renovations.
        </p>
        <p>
          Foristell sits at approximately <strong>705 feet elevation</strong> where St. Charles and Warren counties meet,
          in <strong>USDA Zone 6b-7a</strong> with winter lows between -5°F and 5°F. Homes here face the full range of
          Missouri weather—freeze-thaw cycles stress rooflines, wind-driven rain tests siding seals, and seasonal
          temperature swings demand properly vented attics and functional gutters.
        </p>
        <p>
          We understand these conditions because we work in them. Every crew member is a direct A&S employee—no
          subcontractors ever touch your project. From tearoff to final cleanup, the same licensed team handles
          your roofing, siding, or renovation start to finish, accountable to one company and one set of standards.
        </p>
      </div>
      <div class="prose">
        <h3>Local Knowledge, Professional Results</h3>
        <p>
          Foristell's small-town character (population 550 as of 2020) means properties range from older farmhouses
          near <strong>Peruque Creek</strong> to newer subdivisions off I-70. We've worked on both—matching historical
          rooflines on century-old homes and executing builder-grade upgrades on modern construction around
          <strong>Towne Park</strong> and the surrounding neighborhoods.
        </p>
        <p>
          Our estimators show up when we say we will, walk every roofline, and provide written quotes with
          line-item breakdowns—no surprises, no pressure. If hail damage is involved, we document everything
          your insurance adjuster needs. If it's a planned upgrade, we explain material options, warranty coverage,
          and realistic timelines based on actual crew availability.
        </p>
        <p>
          Call <a href="tel:<?php echo $phoneTel; ?>"><?php echo $phone; ?></a> or
          <a href="/contact/">request a free estimate online</a>—we'll schedule a site visit within 48 hours.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Services in Foristell -->
<section class="section-dark">
  <div class="container">
    <h2 class="section-title">Services Available in Foristell</h2>
    <p class="section-subtitle">
      Complete exterior and interior contracting services for residential and commercial properties—all
      self-performed by A&S crews.
    </p>

    <div class="services-list">
      <div class="service-item">
        <?php echo icon('home', 24); ?>
        <span><strong>Roofing:</strong> Installation, repair, replacement—shingle, metal, flat systems</span>
      </div>
      <div class="service-item">
        <?php echo icon('layers', 24); ?>
        <span><strong>Siding:</strong> Vinyl, fiber cement, wood—full replacement or repair</span>
      </div>
      <div class="service-item">
        <?php echo icon('droplet', 24); ?>
        <span><strong>Gutters:</strong> Seamless aluminum, guards, downspout extensions</span>
      </div>
      <div class="service-item">
        <?php echo icon('square', 24); ?>
        <span><strong>Soffit & Fascia:</strong> Ventilation, rot repair, color-matched materials</span>
      </div>
      <div class="service-item">
        <?php echo icon('door-open', 24); ?>
        <span><strong>Windows & Doors:</strong> Energy-efficient replacements, trim work</span>
      </div>
      <div class="service-item">
        <?php echo icon('paintbrush', 24); ?>
        <span><strong>Drywall:</strong> Hanging, finishing, texture matching, repair</span>
      </div>
      <div class="service-item">
        <?php echo icon('hammer', 24); ?>
        <span><strong>Interior Work:</strong> Room additions, remodels, finish carpentry</span>
      </div>
      <div class="service-item">
        <?php echo icon('wrench', 24); ?>
        <span><strong>Exterior Work:</strong> Deck repair, trim replacement, storm damage</span>
      </div>
    </div>

    <div style="margin-top: 48px; text-align: center;">
      <p style="font-size: 1.125rem; margin-bottom: 24px;">
        Looking for a specific service? <a href="/services/" style="color: var(--color-accent); text-decoration: underline;">View our full services list</a>
        or call <a href="tel:<?php echo $phoneTel; ?>" style="color: var(--color-accent); text-decoration: underline;"><?php echo $phone; ?></a>
        to discuss your project.
      </p>
    </div>
  </div>
</section>

<!-- Final CTA -->
<section class="cta-band">
  <div class="container">
    <h2>Ready to Get Started in Foristell?</h2>
    <p>
      Free estimates for all roofing, siding, and renovation projects—no obligation, no pressure.
      We'll visit your property, assess the work, and provide a detailed written quote.
    </p>
    <div class="btn-group">
      <a href="/contact/" class="btn-primary">Request Free Estimate</a>
      <a href="tel:<?php echo $phoneTel; ?>" class="btn-secondary">
        <?php echo icon('phone', 20); ?>
        Call <?php echo $phone; ?>
      </a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
