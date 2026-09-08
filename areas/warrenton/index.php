<?php
/**
 * Warrenton, MO Service Area Page (Primary Area — Company Headquarters)
 *
 * Research sources:
 * - https://en.wikipedia.org/wiki/Warrenton,_Missouri
 * - https://topoquest.com/place/missouri/populated-place/warrenton/728363
 * - https://www.city-data.com/city/Warrenton-Missouri.html
 * - https://plantguideonline.com/zones/MO/warrenton
 * - https://usclimatedata.com/climate/warrenton/missouri/united-states/usmo0914
 *
 * Verified local details:
 * - Elevation: 827 ft (252 m) per TopoQuest
 * - County seat of Warren County, Missouri
 * - Population: 8,429 (2020 census), 9,884 (2026 estimate)
 * - USDA Zone: 6b (winter lows -5°F to 0°F)
 * - Historic landmark: Warren County Courthouse (1869, Main Street, NRHP)
 * - Founded 1830s as planned community to hold county seat
 * - Climate: Humid continental (Cfa), avg 56.1°F, 42" annual precipitation
 * - Neighborhoods: City Center, Warrenton North, surrounding unincorporated areas
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$pageType = 'city';
$citySlug = 'warrenton';
$pageTitle = 'Roofing, Siding & General Contracting in Warrenton, MO';
$pageDescription = 'A&S Contracting Services is a licensed Missouri general contractor based in Warrenton, serving Warren County homeowners with roofing, siding, gutters, and full-scale renovations. Self-performed work—no subcontractors. Free estimates.';
$canonicalUrl = $siteUrl . '/areas/warrenton/';
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
          "name": "Warrenton, MO",
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
        "name": "Warrenton",
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
.hero--area .container { max-width: 1200px; }
.hero--area .hero-grid--form { align-items: start; }
.hero--area .hero-copy .btn-group { margin-bottom: 0; }
@media (max-width: 900px) { .hero--area .hero-grid--form { grid-template-columns: 1fr; } .hero--area .hero-form-card { display: none; } }
</style>

<!-- Hero Section -->
<section class="hero--area">
  <div class="container">
    <div class="hero-grid hero-grid--form">
      <div class="hero-copy">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="/">Home</a>
      <span class="breadcrumb-sep" aria-hidden="true">/</span>
      <a href="/service-areas/">Service Areas</a>
      <span class="breadcrumb-sep" aria-hidden="true">/</span>
      <span>Warrenton</span>
    </nav>

    <div class="eyebrow">Warren County Seat — Our Home Base</div>
    <h1>Licensed General Contractor in <span class="text-accent">Warrenton, Missouri</span></h1>
    <p class="hero-answer">
      A&S Contracting Services is headquartered right here in Warrenton—the Warren County seat—providing
      self-performed roofing, siding, gutters, drywall, and full-scale renovations to homeowners and
      businesses throughout the county. We're local, licensed, insured, and accountable—same crew start to finish.
    </p>

    <div class="hero-chips">
      <div class="hero-chip">
        <?php echo icon('map-pin', 16); ?>
        Based in Warrenton
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
      <?php $heroFormTitle = 'Free estimate in Warrenton'; $heroFormId = 'hero'; include $_SERVER['DOCUMENT_ROOT'] . '/includes/hero-form.php'; ?>
    </div>
  </div>
</section>

<!-- Why Warrenton Homeowners Choose Us -->
<section class="section-light">
  <div class="container">
    <div class="split-grid">
      <div class="prose">
        <h2 class="section-title">Warrenton's Hometown Contractor</h2>
        <p>
          <strong>A&S Contracting Services is a licensed and insured Missouri general contractor based in Warrenton,</strong>
          the Warren County seat, serving local homeowners and businesses with roofing, siding, gutters, drywall,
          windows, and full-scale renovations—all self-performed by our crew.
        </p>
        <p>
          Warrenton sits at approximately <strong>827 feet elevation</strong> in central Missouri's
          <strong>USDA Zone 6b</strong>, where winter lows reach -5°F to 0°F and summers push past 90°F. This humid
          continental climate—averaging 42 inches of annual precipitation—means roofs face freeze-thaw stress,
          siding seals are tested by wind-driven rain, and gutters handle heavy spring runoff.
        </p>
        <p>
          Because we're based here, we understand these conditions firsthand. Our trucks run Main Street. Our crew
          knows the mix of historic homes near the <strong>1869 Warren County Courthouse</strong> and newer
          construction in Warrenton North. We're not passing through on a circuit—we live and work in this county.
        </p>
      </div>
      <div class="prose">
        <h3>Local Accountability, Professional Results</h3>
        <p>
          Warrenton's role as the county seat since the 1830s means this is a community built on institutions,
          permanence, and reputation. A&S Contracting Services operates the same way: every project is handled by
          direct employees—no subcontractors ever touch your roof, siding, or interior work.
        </p>
        <p>
          Our estimators provide written line-item quotes after walking your property. If you're filing an insurance
          claim for storm or hail damage, we document everything with photos, meet the adjuster on-site, and supply
          the itemized estimate your carrier needs to process the claim efficiently.
        </p>
        <p>
          From the historic downtown blocks to properties along Highway 47 and newer subdivisions, A&S Contracting
          Services delivers licensed, insured craftsmanship backed by local accountability—because we're not leaving
          town when the job is done. We're already here.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Services in Warrenton -->
<section class="section-dark">
  <div class="container">
    <h2 class="section-title">Services We Provide in Warrenton</h2>
    <p class="section-subtitle">
      Self-performed work across all trades—roofing, siding, gutters, windows, drywall, and complete renovations.
      One crew, one company, one accountable point of contact from estimate to final walkthrough.
    </p>

    <div class="services-list">
      <?php foreach ($services as $svc): ?>
      <div class="service-item">
        <?php echo icon('check-circle', 24); ?>
        <div>
          <strong><?php echo htmlspecialchars($svc['name']); ?></strong>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Understanding Warrenton's Construction Needs -->
<section class="section-light">
  <div class="container">
    <div class="split-grid">
      <div class="prose">
        <h2 class="section-title">Construction Challenges in Warren County's Hub</h2>
        <p>
          Warrenton's building stock spans nearly two centuries—from pre-Civil War structures in the historic
          downtown to modern residential developments built in the 2000s and 2010s. Each era brings different
          construction methods, material compatibility issues, and renovation constraints.
        </p>
        <p>
          <strong>Older homes near Main Street</strong> often feature steeper roof pitches, complex valleys, and
          original wood siding that requires careful matching when sections need replacement. Modern homes in newer
          subdivisions use engineered materials, standardized roof systems, and builder-grade components that allow
          faster installation but demand precision to maintain warranty coverage.
        </p>
        <p>
          A&S Contracting Services has worked on both. We match historical rooflines, source compatible siding profiles,
          and execute technical upgrades—proper flashing, ventilation ratios, structural tie-ins—on projects across
          Warrenton's full range of residential and commercial properties.
        </p>
      </div>
      <div class="prose">
        <h3>Climate-Appropriate Systems</h3>
        <p>
          Warren County's <strong>56°F average annual temperature</strong> masks the extremes: record highs of 114°F
          and record lows of -22°F. Roofing systems must handle thermal expansion and contraction. Siding must breathe
          to prevent moisture trapping. Gutters must clear heavy spring storms without overwhelming downspouts.
        </p>
        <p>
          Because we operate year-round in this climate, A&S Contracting Services specifies systems designed for
          Missouri's humidity, freeze-thaw cycles, and storm patterns. Our installations aren't generic—they're
          matched to local conditions and built to perform across Warrenton's weather extremes.
        </p>
        <p>
          From the county courthouse to residential blocks off Highway 47, we deliver the same standard: self-performed
          work by a licensed crew, written estimates with no surprise add-ons, and local accountability that lasts
          beyond the final invoice.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Final CTA -->
<section class="cta-band">
  <div class="container">
    <h2>Ready to Start Your Warrenton Project?</h2>
    <p>Free estimates. Licensed and insured. Self-performed work—no subcontractors.</p>
    <div class="btn-group">
      <a href="/contact/" class="btn-primary btn-large">Get Your Free Estimate</a>
      <a href="tel:<?php echo $phoneTel; ?>" class="btn-secondary btn-large">
        <?php echo icon('phone', 20); ?>
        Call <?php echo $phone; ?>
      </a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
