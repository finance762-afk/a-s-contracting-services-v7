<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$pageTitle = 'Service Areas';
$pageDescription = 'A&S Contracting Services serves Warrenton, MO, and surrounding communities including Foristell, Jonesburg, Troy, Washington, Wentzville, and Wright City. Licensed general contractor providing roofing, siding, gutters, and full-scale renovations within a 50-mile radius.';
$canonicalUrl = $siteUrl . '/service-areas/';
$currentPage = 'service-areas';

// Schema: BreadcrumbList
$schema = <<<SCHEMA
<script type="application/ld+json">
{
  "@context": "https://schema.org",
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
      "item": "{$canonicalUrl}"
    }
  ]
}
</script>
SCHEMA;

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* Service Areas Page Styles */
.hero--interior-compact {
  background: linear-gradient(135deg, var(--color-primary) 0%, rgba(0,0,0,0.85) 100%);
  padding: calc(var(--nav-height) + 60px) 0 80px;
  position: relative;
  overflow: hidden;
}

.hero--interior-compact::before {
  content: '';
  position: absolute;
  inset: 0;
  background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.02'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
  opacity: 0.4;
  z-index: 0;
}

.hero--interior-compact .container {
  position: relative;
  z-index: 1;
  max-width: 900px;
  text-align: center;
}

.hero--interior-compact .breadcrumb {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  margin-bottom: 16px;
  font-size: 0.875rem;
  color: rgba(255,255,255,0.7);
}

.hero--interior-compact .breadcrumb a {
  color: var(--color-accent);
  text-decoration: none;
  transition: color 0.2s;
}

.hero--interior-compact .breadcrumb a:hover {
  color: #fff;
}

.hero--interior-compact .breadcrumb-sep {
  color: rgba(255,255,255,0.4);
}

.hero--interior-compact .eyebrow {
  font-family: var(--font-accent);
  font-size: 0.875rem;
  font-weight: 600;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  color: var(--color-accent);
  margin-bottom: 16px;
}

.hero--interior-compact h1 {
  font-size: clamp(2rem, 5vw, 2.75rem);
  font-weight: 700;
  color: #fff;
  margin-bottom: 20px;
  line-height: 1.2;
}

.hero--interior-compact .hero-answer {
  font-size: 1.125rem;
  line-height: 1.6;
  color: rgba(255,255,255,0.9);
  max-width: 700px;
  margin: 0 auto 32px;
}

.service-areas-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 32px;
  padding: 80px 0;
}

.area-card {
  background: #fff;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
  transition: all 0.3s ease;
  border: 1px solid rgba(0,0,0,0.06);
  display: flex;
  flex-direction: column;
  position: relative;
}

.area-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 12px 24px rgba(0,0,0,0.12);
}

.area-card__header {
  background: linear-gradient(135deg, var(--color-primary) 0%, rgba(0,0,0,0.9) 100%);
  padding: 32px 24px;
  position: relative;
  overflow: hidden;
}

.area-card__header::before {
  content: '';
  position: absolute;
  top: 0;
  right: 0;
  width: 120px;
  height: 120px;
  background: var(--color-accent);
  opacity: 0.06;
  border-radius: 50%;
  transform: translate(40%, -40%);
}

.area-card__city {
  font-size: 1.5rem;
  font-weight: 700;
  color: #fff;
  margin-bottom: 4px;
}

.area-card__state {
  font-size: 0.875rem;
  color: var(--color-accent);
  font-weight: 600;
  letter-spacing: 0.05em;
  text-transform: uppercase;
}

.area-card__body {
  padding: 24px;
  flex-grow: 1;
  display: flex;
  flex-direction: column;
}

.area-card__desc {
  font-size: 0.9375rem;
  line-height: 1.6;
  color: var(--color-text);
  margin-bottom: 20px;
}

.area-card__cta {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 12px 24px;
  background: var(--color-primary);
  color: #fff;
  text-decoration: none;
  border-radius: 6px;
  font-weight: 600;
  font-size: 0.9375rem;
  transition: all 0.2s;
  margin-top: auto;
  align-self: flex-start;
}

.area-card__cta:hover {
  background: rgba(0,0,0,0.85);
  transform: translateX(4px);
}

.area-card--primary {
  grid-column: span 2;
}

.area-card--primary .area-card__header {
  padding: 48px 32px;
}

.area-card--primary .area-card__city {
  font-size: 2rem;
}

.coverage-map {
  background: linear-gradient(to bottom, #f8f9fa 0%, #fff 100%);
  padding: 80px 0;
  position: relative;
  overflow: hidden;
}

.coverage-map::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 1px;
  background: linear-gradient(to right, transparent, var(--color-border), transparent);
}

.coverage-stats {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 32px;
  margin-top: 48px;
}

.coverage-stat {
  text-align: center;
  padding: 32px;
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.04);
}

.coverage-stat__number {
  font-size: 2.5rem;
  font-weight: 700;
  color: var(--color-primary);
  line-height: 1;
  margin-bottom: 8px;
}

.coverage-stat__label {
  font-size: 0.9375rem;
  color: var(--color-text-light);
  font-weight: 500;
}

.cta-band {
  background: linear-gradient(135deg, var(--color-primary) 0%, rgba(0,0,0,0.9) 100%);
  padding: 80px 0;
  text-align: center;
  color: #fff;
  position: relative;
  overflow: hidden;
}

.cta-band::before {
  content: '';
  position: absolute;
  inset: 0;
  background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.02'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
  opacity: 0.3;
}

.cta-band .container {
  position: relative;
  z-index: 1;
  max-width: 800px;
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

.cta-band .btn-group {
  display: flex;
  gap: 16px;
  justify-content: center;
  flex-wrap: wrap;
}

.cta-band .btn-primary,
.cta-band .btn-secondary {
  padding: 16px 32px;
  font-size: 1rem;
}

@media (max-width: 900px) {
  .area-card--primary {
    grid-column: span 1;
  }
}

@media (max-width: 768px) {
  .service-areas-grid {
    grid-template-columns: 1fr;
    gap: 24px;
    padding: 60px 0;
  }

  .coverage-stats {
    grid-template-columns: repeat(2, 1fr);
    gap: 16px;
  }
}
</style>

<!-- Hero Section -->
<section class="hero--interior-compact">
  <div class="container">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="/">Home</a>
      <span class="breadcrumb-sep" aria-hidden="true">/</span>
      <span>Service Areas</span>
    </nav>

    <div class="eyebrow">Where We Work</div>
    <h1>General Contracting Services in <span class="text-accent">Warrenton &amp; Surrounding Communities</span></h1>
    <p class="hero-answer">
      A&S Contracting Services brings licensed, self-performed roofing, siding, gutters, and full-scale renovations
      to homeowners across Warren County and central Missouri — no subcontractors, no trade gaps, one accountable
      team from start to finish.
    </p>
  </div>
</section>

<!-- Service Areas Grid -->
<section class="service-areas-grid container">

  <?php
  // Primary area (Warrenton) gets special treatment
  $primaryArea = array_filter($serviceAreas, function($area) {
    return $area['primary'] === true;
  });
  $primaryArea = reset($primaryArea);

  $secondaryAreas = array_filter($serviceAreas, function($area) {
    return $area['primary'] === false;
  });
  ?>

  <!-- Primary Service Area Card (Warrenton) -->
  <div class="area-card area-card--primary" id="<?php echo getAreaSlug($primaryArea['city']); ?>">
    <div class="area-card__header">
      <div class="area-card__city"><?php echo htmlspecialchars($primaryArea['city']); ?></div>
      <div class="area-card__state">Our Home Base · <?php echo $primaryArea['state']; ?></div>
    </div>
    <div class="area-card__body">
      <p class="area-card__desc">
        Based right here in Warrenton, A&S Contracting Services is your local licensed general contractor.
        We self-perform roofing, siding, gutters, drywall, windows, and full-scale renovations across Warren
        County — no subcontractors, same crew start to finish. As Warrenton residents ourselves, we understand
        Missouri weather conditions, local building requirements, and the standards homeowners expect.
      </p>
      <?php
      $warrentonSlug = getAreaSlug($primaryArea['city']);
      $warrentonPath = '/areas/' . $warrentonSlug . '/';
      $warrentonExists = is_dir($_SERVER['DOCUMENT_ROOT'] . '/areas/' . $warrentonSlug);
      ?>
      <?php if ($warrentonExists): ?>
      <a href="<?php echo $warrentonPath; ?>" class="area-card__cta">
        Learn More <?php echo icon('arrow-right', 18); ?>
      </a>
      <?php endif; ?>
    </div>
  </div>

  <!-- Secondary Service Area Cards -->
  <?php foreach ($secondaryAreas as $area):
    $areaSlug = getAreaSlug($area['city']);
    $areaPath = '/areas/' . $areaSlug . '/';
    $areaExists = is_dir($_SERVER['DOCUMENT_ROOT'] . '/areas/' . $areaSlug);
  ?>
  <div class="area-card" id="<?php echo $areaSlug; ?>">
    <div class="area-card__header">
      <div class="area-card__city"><?php echo htmlspecialchars($area['city']); ?></div>
      <div class="area-card__state"><?php echo $area['state']; ?></div>
    </div>
    <div class="area-card__body">
      <p class="area-card__desc">
        Professional roofing, siding, gutters, and full-scale renovations serving <?php echo htmlspecialchars($area['city']); ?>
        homeowners. Licensed Missouri general contractor with self-performed work — no subcontractors.
      </p>
      <?php if ($areaExists): ?>
      <a href="<?php echo $areaPath; ?>" class="area-card__cta">
        Learn More <?php echo icon('arrow-right', 18); ?>
      </a>
      <?php endif; ?>
    </div>
  </div>
  <?php endforeach; ?>

</section>

<!-- Coverage Map Section -->
<section class="coverage-map">
  <div class="container">
    <div class="text-center">
      <div class="eyebrow">Coverage Area</div>
      <h2>50-Mile Service Radius from Warrenton</h2>
      <p class="hero-answer" style="max-width: 700px; margin: 16px auto 0;">
        A&S Contracting Services serves residential and commercial clients within a 50-mile radius of Warrenton, MO.
        We're close enough to respond quickly, large enough to handle projects of any size, and small enough to
        deliver personal attention to every job.
      </p>
    </div>

    <div class="coverage-stats">
      <div class="coverage-stat">
        <div class="coverage-stat__number">50</div>
        <div class="coverage-stat__label">Mile Service Radius</div>
      </div>
      <div class="coverage-stat">
        <div class="coverage-stat__number">7+</div>
        <div class="coverage-stat__label">Communities Served</div>
      </div>
      <div class="coverage-stat">
        <div class="coverage-stat__number">100%</div>
        <div class="coverage-stat__label">Self-Performed Work</div>
      </div>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="cta-band">
  <div class="container">
    <h2>Ready to Get Started?</h2>
    <p>Get a free estimate on your roofing, siding, or renovation project — no obligation, no pressure.</p>
    <div class="btn-group">
      <a href="/contact/" class="btn-primary">Get Free Estimate</a>
      <a href="tel:<?php echo $phoneTel; ?>" class="btn-secondary">
        <?php echo icon('phone', 20); ?>
        <?php echo $phone; ?>
      </a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
