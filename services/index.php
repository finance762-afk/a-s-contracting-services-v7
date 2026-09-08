<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ─── Page-level setup ───────────────────────────────────────────────────────
$pageType        = 'other';
$currentPage     = 'services';
$pageTitle       = 'Services in Warrenton, MO';
$pageDescription = 'A&S Contracting Services self-performs roofing, siding, gutters, soffit, fascia, windows, drywall, and full interior and exterior remodels across Warrenton, MO and Warren County. Free estimates.';
$canonicalUrl    = $siteUrl . '/services/';

// Icons + one-line descriptions per service card
$serviceIcons = [
    'roofing'                  => 'home',
    'siding'                   => 'layers',
    'gutters'                  => 'droplets',
    'soffit'                   => 'wind',
    'fascia'                   => 'ruler',
    'windows-doors'            => 'building',
    'full-scale-interior-work' => 'paint-bucket',
    'exterior-work'            => 'hammer',
    'dry-wall'                 => 'pencil-ruler',
    'general-contracting'      => 'hard-hat',
];
$serviceCardDesc = [
    'roofing'                  => 'New roofs, storm repairs, and full tear-off replacements for Warrenton homes.',
    'siding'                   => 'Fresh siding that seals out Missouri weather and lifts your curb appeal.',
    'gutters'                  => 'Seamless gutter systems that route water away from your foundation.',
    'soffit'                   => 'Soffit work that ventilates your attic and keeps pests and moisture out.',
    'fascia'                   => 'Sturdy fascia boards that protect your roof edges and finish the line clean.',
    'windows-doors'            => 'Replacement windows and doors that cut drafts and tighten up your home.',
    'full-scale-interior-work' => 'Interior remodels from drywall and trim to full room additions.',
    'exterior-work'            => 'Complete exterior renovations handled by one self-performing crew.',
    'dry-wall'                 => 'Drywall hang, finish, and repair for smooth, paint-ready interior walls.',
    'general-contracting'      => 'Full-service general contracting from planning through the final walkthrough.',
];

// ─── Schema (BreadcrumbList) ─────────────────────────────────────────────────
$breadcrumbSchema = [
    '@context'        => 'https://schema.org',
    '@type'           => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',     'item' => $siteUrl . '/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => $canonicalUrl],
    ],
];
$schema = '<script type="application/ld+json">' . json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>

<style>
.svc-index-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; margin-top: 2rem; }
@media (max-width: 900px) { .svc-index-grid { grid-template-columns: 1fr 1fr; } }
@media (max-width: 560px) { .svc-index-grid { grid-template-columns: 1fr; } }
.svc-cta-band { display: grid; grid-template-columns: minmax(0, 1fr) auto; gap: 2rem; align-items: center; }
@media (max-width: 800px) { .svc-cta-band { grid-template-columns: 1fr; } }
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ═══════════════════ HERO (interior) ═══════════════════ -->
<section class="hero hero--interior">
  <span class="grain" aria-hidden="true"></span>
  <div class="container">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <ol>
        <li><a href="/">Home</a></li>
        <li class="breadcrumb-sep" aria-hidden="true">/</li>
        <li aria-current="page">Services</li>
      </ol>
    </nav>
    <div class="hero-copy">
      <span class="eyebrow">Warrenton, MO &middot; Warren County</span>
      <h1>Everything A&amp;S Contracting Services <span class="text-accent">builds and repairs</span></h1>
      <p class="hero-answer">A&amp;S Contracting Services is a licensed, insured Warrenton general contractor that self-performs all ten trades below—roofing, siding, gutters, soffit, fascia, windows, drywall, and full interior and exterior remodels—within 50 miles of Warren County, with one accountable crew from estimate to walkthrough.</p>
      <div class="hero-actions">
        <a href="/contact/" class="btn btn-primary btn-lg">Get a free estimate</a>
        <a class="link-call" href="tel:<?php echo $phoneTel; ?>"><?php echo icon('phone', 18); ?> or call <?php echo $phone; ?></a>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════ INTRO + SERVICE GRID ═══════════════════ -->
<section class="section section--light">
  <div class="container-wide">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Under One Licensed Roof</span>
      <h2>Which home project can we take off your list?</h2>
      <p class="answer-block">A&amp;S Contracting Services keeps every trade in-house, so a storm-damaged roof, a siding refresh, and the interior finish work behind it are all handled by the same people you already trust. Choose a service below to see how we approach it across Warrenton and Warren County.</p>
    </div>

    <div class="svc-index-grid">
      <?php
      $tintCycle = [1, 2, 3];
      foreach ($services as $i => $svc):
        $slug = $svc['slug'];
      ?>
      <article class="service-card-with-image card-tint-<?php echo $tintCycle[$i % 3]; ?> reveal-up reveal-delay-<?php echo ($i % 3) + 1; ?>">
        <div class="service-card__body">
          <div class="service-card__icon"><?php echo icon($serviceIcons[$slug] ?? 'check-circle', 22); ?></div>
          <h3><?php echo htmlspecialchars($svc['name']); ?></h3>
          <p class="service-card__desc"><?php echo htmlspecialchars($serviceCardDesc[$slug] ?? $svc['description']); ?></p>
          <a href="/services/<?php echo $slug; ?>/" class="service-card__cta">Learn more</a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ═══════════════════ CTA BANNER ═══════════════════ -->
<section class="cta-banner texture-grain edge-curve-top" aria-label="Request a free estimate">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container">
    <div class="reveal-up">
      <span class="eyebrow">One team &middot; one point of contact</span>
      <h2>Not sure which service you need? Just ask.</h2>
      <p>Describe the project and A&amp;S Contracting Services will point you to the right fix—and give you a free written estimate for it—across Warrenton and Warren County.</p>
    </div>
    <div class="actions">
      <a href="/contact/" class="btn btn-accent btn-lg">Get my free estimate</a>
      <a href="tel:<?php echo $phoneTel; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
