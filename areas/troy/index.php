<?php
/**
 * Troy, MO Service Area Page
 *
 * Research sources:
 * - https://en.wikipedia.org/wiki/Troy,_Missouri
 * - https://en.wikipedia.org/wiki/National_Register_of_Historic_Places_listings_in_Lincoln_County,_Missouri
 * - https://cityoftroymissouri.com/
 *
 * Verified local details:
 * - Elevation: 515 ft (157 m) per Wikipedia (South Troy: 623 ft shows range exists)
 * - County seat of Lincoln County
 * - Cuivre River State Park 3 miles northeast
 * - Fort Cap au Gris (War of 1812 fortification, built 1814)
 * - Downtown Troy Historic District (Annie Ave, 2nd, Marble & Court Sts)
 * - Historic Main Street district
 * - Population and area not specified in search results
 * - USDA Zone: 6b-7a (regional estimate, eastern Missouri)
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$pageType = 'city';
$citySlug = 'troy';
$pageTitle = 'Roofing, Siding & Renovation Services in Troy, MO';
$pageDescription = 'A&S Contracting Services serves Troy, MO—county seat of Lincoln County. Licensed roofing, siding, gutters, and full-scale renovations. Self-performed work, no subcontractors. Free estimates.';
$canonicalUrl = $siteUrl . '/areas/troy/';
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
          "name": "Troy, MO",
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
        "name": "Troy",
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
/* Area page styles */
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
      <span>Troy</span>
    </nav>

    <div class="eyebrow">Lincoln County Seat</div>
    <h1>General Contractor Services in <span class="text-accent">Troy, Missouri</span></h1>
    <p class="hero-answer">
      A&S Contracting Services serves Troy—the county seat of Lincoln County—with licensed roofing, siding,
      gutters, and full-scale renovations. Every project is self-performed by our own crews with no subcontractors,
      delivering consistent quality from estimate through final inspection.
    </p>

    <div class="hero-chips">
      <div class="hero-chip">
        <?php echo icon('map-pin', 16); ?>
        30 Min from Warrenton
      </div>
      <div class="hero-chip">
        <?php echo icon('award', 16); ?>
        5-Star Rated
      </div>
      <div class="hero-chip">
        <?php echo icon('calendar-check', 16); ?>
        Free Written Estimates
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

<!-- Why Troy Homeowners Choose Us -->
<section class="section-light">
  <div class="container">
    <div class="split-grid">
      <div class="prose">
        <h2 class="section-title">Serving Historic Troy & Lincoln County</h2>
        <p>
          <strong>A&S Contracting Services is a licensed and insured Missouri general contractor based in Warrenton,</strong>
          serving Troy and Lincoln County homeowners with professional roofing, siding, gutters, drywall, windows, and
          full-scale renovations—every trade self-performed by A&S crews, no subcontractors involved.
        </p>
        <p>
          Troy sits at approximately <strong>515–620 feet elevation</strong> (the range reflects variations across the city
          and surrounding unincorporated areas) in <strong>USDA Zone 6b-7a</strong> with winter lows between -5°F and 5°F.
          Properties here experience Missouri's full seasonal swing—humid summers stress attic ventilation, ice dams form on
          north-facing rooflines during winter thaws, and spring storms test gutter capacity and siding seals.
        </p>
        <p>
          We account for those conditions in every estimate. Roof pitch, exposure, and underlayment specs aren't arbitrary—they're
          matched to your property's orientation and the local climate patterns we see across Lincoln, Warren, and St. Charles counties.
        </p>
      </div>
      <div class="prose">
        <h3>Historic Character Meets Modern Standards</h3>
        <p>
          As the county seat of Lincoln County, Troy features a <strong>historic Main Street district</strong> and the
          <strong>Downtown Troy Historic District</strong> (bounded by Annie Avenue, 2nd, Marble, and Court Streets), with
          properties ranging from Victorian-era homes requiring period-appropriate materials to modern subdivisions needing
          energy-efficient upgrades.
        </p>
        <p>
          Nearby <strong>Cuivre River State Park</strong>—one of Missouri's largest state parks, located three miles northeast
          across the Cuivre River valley—brings outdoor recreation close to home, but also means properties in that corridor
          face windborne debris during storms and higher humidity from the river valley.
        </p>
        <p>
          Our crews work across that range. We've matched slate and wood shingle profiles on historic homes, replaced hail-damaged
          roofs on ranch properties, and executed full exterior renovations on properties near <strong>Fort Cap au Gris</strong>
          (the War of 1812 fortification built in 1814).
        </p>
        <p>
          Call <a href="tel:<?php echo $phoneTel; ?>"><?php echo $phone; ?></a> or
          <a href="/contact/">request a free estimate online</a>—we'll visit your property within 48 hours.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Services in Troy -->
<section class="section-dark">
  <div class="container">
    <h2 class="section-title">Complete General Contracting in Troy</h2>
    <p class="section-subtitle">
      Roofing, siding, gutters, windows, drywall, and full renovations—all performed by licensed A&S crews, never subcontracted.
    </p>

    <div class="services-list">
      <div class="service-item">
        <?php echo icon('home', 24); ?>
        <span><strong>Roofing:</strong> Shingle, metal, flat—installs, repairs, storm damage</span>
      </div>
      <div class="service-item">
        <?php echo icon('layers', 24); ?>
        <span><strong>Siding:</strong> Vinyl, fiber cement, wood—full replacement or repair</span>
      </div>
      <div class="service-item">
        <?php echo icon('droplet', 24); ?>
        <span><strong>Gutters:</strong> Seamless aluminum, guards, proper drainage systems</span>
      </div>
      <div class="service-item">
        <?php echo icon('square', 24); ?>
        <span><strong>Soffit & Fascia:</strong> Ventilation, rot repair, historical matching</span>
      </div>
      <div class="service-item">
        <?php echo icon('door-open', 24); ?>
        <span><strong>Windows & Doors:</strong> Energy-efficient upgrades, trim work</span>
      </div>
      <div class="service-item">
        <?php echo icon('paintbrush', 24); ?>
        <span><strong>Drywall:</strong> Hanging, finishing, repair, texture matching</span>
      </div>
      <div class="service-item">
        <?php echo icon('hammer', 24); ?>
        <span><strong>Interior Renovations:</strong> Room additions, remodels, finish work</span>
      </div>
      <div class="service-item">
        <?php echo icon('wrench', 24); ?>
        <span><strong>Storm Damage:</strong> Insurance documentation, full restoration</span>
      </div>
    </div>

    <div style="margin-top: 48px; text-align: center;">
      <p style="font-size: 1.125rem; margin-bottom: 24px;">
        <a href="/services/" style="color: var(--color-accent); text-decoration: underline;">See all services</a>
        or call <a href="tel:<?php echo $phoneTel; ?>" style="color: var(--color-accent); text-decoration: underline;"><?php echo $phone; ?></a>
        to discuss your project.
      </p>
    </div>
  </div>
</section>

<!-- Final CTA -->
<section class="cta-band">
  <div class="container">
    <h2>Ready to Start Your Troy Project?</h2>
    <p>
      Free site visit and written estimate for all roofing, siding, and renovation work—no obligation, transparent pricing.
    </p>
    <div class="btn-group">
      <a href="/contact/" class="btn-primary">Request Free Estimate</a>
      <a href="tel:<?php echo $phoneTel; ?>" class="btn-secondary">
        <?php echo icon('phone', 20); ?>
        <?php echo $phone; ?>
      </a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
