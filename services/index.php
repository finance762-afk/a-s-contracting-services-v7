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

// Hero photo (image manifest — services index hero)
$heroImage    = '1779985120292-f16f8x-3-Mar_19__2026_12-17-52-Ujpj';
$heroImageAlt = 'Overhead view of shingle bundles laid out on a residential roof at sunset by A&S Contracting Services near Warrenton, MO';
$heroPreload  = [
    'srcset' => "/assets/images/{$heroImage}-480.avif 480w, /assets/images/{$heroImage}-960.avif 960w",
    'sizes'  => '100vw',
];

// Card photo per service (image manifest — each service's own hero photo)
$serviceCardPhoto = [
    'roofing'                  => '1779985211708-fd9gws-39-Dec_24__2025_22-36-50-nmCB',
    'siding'                   => '1779985053030-6d3zxh-65-Jun_03__2025_18-42-52-Tdqj',
    'gutters'                  => '1779985084434-7wvwuf-46-Feb_10__2026_22-02-29-uWM1',
    'soffit'                   => '1779985210676-rimzkx-29-Dec_24__2025_18-22-23-xd3W',
    'fascia'                   => '1779985248885-m9g42k-12-Nov_19__2025_22-17-31-YgPM',
    'windows-doors'            => '1779985247084-5a8nou-2-Aug_26__2025_18-27-26-neFH',
    'full-scale-interior-work' => '1779985458116-w0hrmz-55-Oct_14__2024_15-18-30-xZXr',
    'exterior-work'            => '1779985052217-p5psyo-62-Apr_25__2025_19-50-40-dTeE',
    'dry-wall'                 => '1779984936314-5pnhuy-43-Aug_06__2025_23-34-36-CJqa',
    'general-contracting'      => '1779985082241-xuoxbh-11-Feb_09__2026_15-26-29-L2wD',
];
$serviceCardAlt = [
    'roofing'                  => 'Finished asphalt shingle roof with vent pipes on a Warrenton, MO home',
    'siding'                   => 'Tan metal siding with brick accents and a covered entry porch',
    'gutters'                  => 'Roof and gutter installation in progress on a wooded Warren County property',
    'soffit'                   => 'Worker installing soffit trim on a two-story home near Warrenton',
    'fascia'                   => 'Metal roofline and white fascia trim on a modern home exterior',
    'windows-doors'            => 'New fiber-cement-clad home with large casement windows and dark roof',
    'full-scale-interior-work' => 'Roof framing and interior construction on a residential renovation',
    'exterior-work'            => 'Completed two-story exterior renovation with siding, windows and patio',
    'dry-wall'                 => 'Home renovation in progress with new siding and interior build-out',
    'general-contracting'      => 'A&S crew installing a new roof on a residential project near Warrenton',
];

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
/* Photo hero: let the <picture> fill the .hero-bg layer */
.hero--photo .hero-bg picture { display: block; width: 100%; height: 100%; }
.hero--photo .hero-bg img { width: 100%; height: 100%; object-fit: cover; object-position: 50% 45%; }
.hero--photo .breadcrumb, .hero--photo .breadcrumb a { color: rgba(255,255,255,.82); }
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ═══════════════════ HERO (interior) ═══════════════════ -->
<section class="hero hero--photo">
  <div class="hero-bg">
    <?php echo p1_picture($heroImage, $heroImageAlt, ['sizes' => '100vw', 'width' => 1600, 'height' => 1000, 'loading' => 'eager', 'fetchpriority' => 'high']); ?>
  </div>
  <div class="hero-overlay"></div>
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
        $slug  = $svc['slug'];
        $photo = $serviceCardPhoto[$slug] ?? null;
      ?>
      <article class="service-card-with-image card-tint-<?php echo $tintCycle[$i % 3]; ?> reveal-up reveal-delay-<?php echo ($i % 3) + 1; ?>">
        <?php if ($photo): ?>
        <div class="service-card__image">
          <?php echo p1_picture($photo, $serviceCardAlt[$slug] ?? ($svc['name'] . ' by A&S Contracting Services in Warrenton, MO'), [
              'sizes'  => '(max-width: 560px) 100vw, (max-width: 900px) 50vw, 33vw',
              'width'  => 600,
              'height' => 360,
              'decoding' => 'async',
          ]); ?>
        </div>
        <?php endif; ?>
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
