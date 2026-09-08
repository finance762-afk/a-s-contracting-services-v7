<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ─── Page-level setup ───────────────────────────────────────────────────────
$pageType        = 'about';
$currentPage     = 'about';
$pageTitle       = 'About Us';
$pageDescription = 'Learn about A&S Contracting Services, a licensed Missouri general contractor in Warrenton, MO. Self-performed roofing, siding, gutters & remodels across Warren County. Same crew start to finish.';
$canonicalUrl    = $siteUrl . '/about/';

// BreadcrumbList schema
$schemaGraph = [
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type' => 'WebPage',
            '@id' => $canonicalUrl . '#webpage',
            'url' => $canonicalUrl,
            'name' => $pageTitle,
            'description' => $pageDescription,
        ],
        [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Home',
                    'item' => $siteUrl . '/',
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => 'About',
                    'item' => $canonicalUrl,
                ],
            ],
        ],
    ],
];
$schema = '<script type="application/ld+json">' . json_encode($schemaGraph, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>

<!-- Page-specific composition -->
<style>
.about-hero { background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%); padding: calc(var(--nav-height) + var(--space-3xl)) var(--space-xl) var(--space-3xl); position: relative; overflow: hidden; }
.about-hero::before { content: ''; position: absolute; inset: 0; background: url('data:image/svg+xml,...') repeat; opacity: 0.03; }
.about-hero .container { max-width: var(--max-width); margin: 0 auto; position: relative; z-index: 1; }
.about-hero h1 { color: #fff; margin-bottom: var(--space-md); }
.about-hero .hero-answer { color: rgba(255,255,255,0.9); max-width: 65ch; margin-bottom: var(--space-xl); font-size: 1.15rem; line-height: 1.6; }
.about-hero .hero-chips { display: flex; flex-wrap: wrap; gap: var(--space-sm); }
.about-hero .chip { background: rgba(255,255,255,0.15); backdrop-filter: blur(8px); color: #fff; padding: var(--space-xs) var(--space-md); border-radius: 24px; font-size: 0.92rem; border: 1px solid rgba(255,255,255,0.2); }

.story-section { padding: var(--space-4xl) var(--space-xl); background: var(--color-bg); }
.story-grid { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-3xl); align-items: start; max-width: var(--max-width-wide); margin: 0 auto; }
@media (max-width: 900px) { .story-grid { grid-template-columns: 1fr; gap: var(--space-2xl); } }
.story-content h2 { margin-bottom: var(--space-md); }
.story-content p { margin-bottom: var(--space-md); line-height: 1.7; }

.values-section { padding: var(--space-4xl) var(--space-xl); background: var(--color-bg-alt); }
.values-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: var(--space-2xl); max-width: var(--max-width-wide); margin: 0 auto; }
.value-card { background: var(--color-bg); padding: var(--space-xl); border-radius: var(--radius-lg); box-shadow: var(--shadow); transition: transform var(--transition), box-shadow var(--transition); }
.value-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
.value-card-icon { width: 48px; height: 48px; background: var(--color-primary); color: #fff; border-radius: var(--radius); display: flex; align-items: center; justify-content: center; margin-bottom: var(--space-md); }
.value-card h3 { margin-bottom: var(--space-sm); color: var(--color-primary); }
.value-card p { font-size: 0.95rem; line-height: 1.6; color: var(--color-text-light); }

.credentials-section { padding: var(--space-4xl) var(--space-xl); background: var(--color-bg); }
.credentials-grid { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-2xl); max-width: var(--max-width); margin: 0 auto; }
@media (max-width: 768px) { .credentials-grid { grid-template-columns: 1fr; } }
.credentials-list li { padding: var(--space-sm) 0; border-bottom: 1px solid var(--color-border); display: flex; align-items: center; gap: var(--space-sm); }
.credentials-list li:last-child { border-bottom: none; }
.credentials-list svg { color: var(--color-accent); flex-shrink: 0; }

.cta-about { background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%); color: #fff; padding: var(--space-4xl) var(--space-xl); text-align: center; }
.cta-about h2 { color: #fff; margin-bottom: var(--space-md); }
.cta-about p { color: rgba(255,255,255,0.9); max-width: 60ch; margin: 0 auto var(--space-xl); font-size: 1.1rem; }
.cta-buttons { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; }
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- Hero -->
<section class="about-hero" aria-label="About A&S Contracting Services">
  <div class="container">
    <h1>About A&S Contracting Services</h1>
    <p class="hero-answer">
      A&S Contracting Services is a licensed and insured general contractor based in Warrenton, Missouri,
      serving residential and commercial clients across Warren County and central Missouri. We self-perform
      all our work—roofing, siding, gutters, drywall, windows, and full-scale renovations—with the same
      crew from start to finish. No subcontractors, no surprises, one accountable team.
    </p>
    <div class="hero-chips">
      <span class="chip">Est. <?php echo $yearEstablished; ?></span>
      <span class="chip">Licensed & Insured in Missouri</span>
      <span class="chip">50-Mile Service Radius</span>
      <span class="chip">Self-Performed Work Only</span>
    </div>
  </div>
</section>

<!-- Breadcrumb -->
<nav class="breadcrumb" aria-label="Breadcrumb">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li class="breadcrumb-sep" aria-hidden="true">›</li>
      <li aria-current="page">About</li>
    </ol>
  </div>
</nav>

<!-- Company Story -->
<section class="story-section">
  <div class="story-grid">
    <div class="story-content">
      <h2>Our Story</h2>
      <p>
        A&S Contracting Services started in <?php echo $yearEstablished; ?> with a focus on roofing and
        exterior work across Warren County. What began as a two-person roofing crew grew into a full-service
        general contractor handling everything from storm repairs to complete home renovations.
      </p>
      <p>
        Every project we take on is completed by the same team that shows up for the estimate. We don't
        hand work off to subcontractors. We don't skip trades. If we quote it, we do it—drywall, trim,
        paint, roofing, siding, gutters, windows, all under one licensed roof. That accountability is what
        keeps customers coming back and referring us to neighbors.
      </p>
      <p>
        From Wright City to Wentzville to Washington, we've built a reputation for showing up when we say,
        quoting exactly what we charge, and leaving job sites clean. The work speaks for itself.
      </p>
    </div>

    <div class="story-content">
      <h2>Why We're Different</h2>
      <p>
        Most general contractors subcontract every trade—one crew for framing, another for drywall, a third
        for paint. That creates scheduling gaps, communication breakdowns, and finger-pointing when something
        goes wrong. We eliminated that by self-performing every service we offer.
      </p>
      <p>
        When you hire A&S Contracting Services, the crew that starts your roof is the same crew that finishes
        it. The person who quotes your renovation is on-site throughout the project. You're not managing five
        different companies—you're working with one team that owns every stage of the job.
      </p>
      <p>
        That approach takes longer to build, but it's the only model that guarantees consistent quality and
        accountability from estimate to final walkthrough.
      </p>
    </div>
  </div>
</section>

<!-- Core Values -->
<section class="values-section">
  <div class="container">
    <h2 class="section-title">How We Work</h2>
    <p class="section-subtitle" style="text-align: center; max-width: 60ch; margin: 0 auto var(--space-3xl);">
      These are the principles that guide every project we take on—from the first call to the final invoice.
    </p>

    <div class="values-grid">
      <div class="value-card">
        <div class="value-card-icon">
          <?php echo icon('check-circle', 24); ?>
        </div>
        <h3>Quote Exactly What We Charge</h3>
        <p>
          Our written estimates detail every material, hour, and cost. The number you see on paper is the
          number you pay—no surprise fees, no upselling, no change orders unless the scope genuinely changes.
        </p>
      </div>

      <div class="value-card">
        <div class="value-card-icon">
          <?php echo icon('users', 24); ?>
        </div>
        <h3>Same Crew Start to Finish</h3>
        <p>
          No handoffs. The team that starts your project completes it. You're not managing a rotating cast of
          subcontractors—you're working with one crew that knows your job inside and out.
        </p>
      </div>

      <div class="value-card">
        <div class="value-card-icon">
          <?php echo icon('clock', 24); ?>
        </div>
        <h3>Show Up When We Say</h3>
        <p>
          We give you a written start window and stick to it. If weather or material delays shift the schedule,
          we call ahead—no ghosting, no vague "sometime next week" updates.
        </p>
      </div>

      <div class="value-card">
        <div class="value-card-icon">
          <?php echo icon('broom', 24); ?>
        </div>
        <h3>Clean Job Site Daily</h3>
        <p>
          We sweep, bag debris, and clear walkways at the end of every workday. Your property stays accessible
          and safe while the project is underway.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Credentials & Certifications -->
<section class="credentials-section">
  <div class="container">
    <h2 class="section-title">Licensed, Insured, and Accountable</h2>
    <p class="section-subtitle" style="text-align: center; max-width: 60ch; margin: 0 auto var(--space-3xl);">
      A&S Contracting Services carries the licenses, insurance, and documentation required to operate as a
      general contractor in Missouri. Every project is backed by liability coverage and workers' comp for every
      crew member on-site.
    </p>

    <div class="credentials-grid">
      <div>
        <h3 style="margin-bottom: var(--space-md);">Licenses & Insurance</h3>
        <ul class="credentials-list" style="list-style: none; margin: 0; padding: 0;">
          <?php foreach ($certifications as $cert): ?>
          <li>
            <?php echo icon('badge-check', 20); ?>
            <span><?php echo htmlspecialchars($cert); ?></span>
          </li>
          <?php endforeach; ?>
          <li>
            <?php echo icon('shield', 20); ?>
            <span>Workers' compensation coverage</span>
          </li>
          <li>
            <?php echo icon('file-text', 20); ?>
            <span>Bonding available for commercial projects</span>
          </li>
        </ul>
      </div>

      <div>
        <h3 style="margin-bottom: var(--space-md);">Service Area</h3>
        <p style="margin-bottom: var(--space-md); line-height: 1.7;">
          We serve residential and commercial clients within approximately <?php echo $serviceRadius; ?> miles of
          Warrenton, covering Warren County and the surrounding region.
        </p>
        <ul class="credentials-list" style="list-style: none; margin: 0; padding: 0;">
          <?php
          $areaList = array_slice($serviceAreas, 0, 6);
          foreach ($areaList as $area):
          ?>
          <li>
            <?php echo icon('map-pin', 18); ?>
            <span><?php echo htmlspecialchars($area['city']); ?>, <?php echo $area['state']; ?></span>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-about">
  <div class="container">
    <h2>Ready to Start Your Project?</h2>
    <p>
      Get a free, written estimate from a licensed Missouri contractor. No pressure, no upselling—just a
      straightforward quote based on your actual project needs.
    </p>
    <div class="cta-buttons">
      <a href="/contact/" class="btn-primary">Get Free Estimate</a>
      <a href="tel:<?php echo $phoneTel; ?>" class="btn-secondary">
        <?php echo icon('phone', 20); ?>
        Call <?php echo $phone; ?>
      </a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
