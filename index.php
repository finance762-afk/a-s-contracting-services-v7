<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ─── Page-level setup ───────────────────────────────────────────────────────
$pageType        = 'home';                       // attribution.php page identity
$currentPage     = 'home';
$pageTitle       = 'General Contractor in Warrenton, MO';
$pageDescription = 'A&S Contracting Services is a licensed, insured general contractor in Warrenton, MO. Self-performed roofing, siding, gutters, drywall & remodels within 50 miles. Free estimates.';
$canonicalUrl    = $siteUrl . '/';

// Allocated hero photo (image manifest — home hero). Only -480/-960 variants exist.
$heroImage    = '1779985052606-0c7fr0-64-Jun_03__2025_18-42-44-7JBx';
$heroImageAlt = 'A&S Contracting Services crew and a red brick and metal-siding home with a peaked gable roof in Warrenton, MO';
$heroPreload  = [
    'srcset' => "/assets/images/{$heroImage}-480.avif 480w, /assets/images/{$heroImage}-960.avif 960w",
    'sizes'  => '100vw',
];

// About-split photo (image manifest — home sections)
$aboutImage    = '1779985249292-cx1av8-15-Nov_19__2025_22-19-05-8UPP';
$aboutImageAlt = 'Modern residential build with geometric metal siding and an angled roofline by A&S Contracting Services near Warrenton, MO';

// Homepage services grid: show the first 8, link to the full list.
$homeServices  = array_slice($services, 0, 8);

// Icon per service (each differs from its neighbours; names from references/lucide-icons/)
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
];

// Three benefit bullets per service (3–6 words each)
$serviceBullets = [
    'roofing'                  => ['Hail & storm damage repair', 'Insurance claim documentation', 'Tear-off & full replacement'],
    'siding'                   => ['Vinyl, fiber cement & wood', 'Boosts curb appeal', 'Weather-tight installation'],
    'gutters'                  => ['Seamless aluminum systems', 'Protects your foundation', 'Repairs & full replacement'],
    'soffit'                   => ['Improves attic ventilation', 'Blocks pests & moisture', 'Matched to your roofline'],
    'fascia'                   => ['Protects your roof edges', 'Replaces rotted boards', 'Clean, matched finish'],
    'windows-doors'            => ['Energy-efficient replacements', 'Patio & entry doors', 'Professional weather sealing'],
    'full-scale-interior-work' => ['Drywall, trim & paint', 'Room additions & remodels', 'Clean job site daily'],
    'exterior-work'            => ['Siding, roofing & gutters', 'Full exterior renovations', 'One accountable crew'],
];

// One-line, plain-language card descriptions (max ~14 words)
$serviceCardDesc = [
    'roofing'                  => 'New roofs, storm repairs, and full tear-off replacements for Warrenton homes.',
    'siding'                   => 'Fresh siding that seals out Missouri weather and lifts your curb appeal.',
    'gutters'                  => 'Seamless gutter systems that route water away from your foundation.',
    'soffit'                   => 'Soffit work that ventilates your attic and keeps pests and moisture out.',
    'fascia'                   => 'Sturdy fascia boards that protect your roof edges and finish the line clean.',
    'windows-doors'            => 'Replacement windows and doors that cut drafts and tighten up your home.',
    'full-scale-interior-work' => 'Interior remodels from drywall and trim to full room additions.',
    'exterior-work'            => 'Complete exterior renovations handled by one self-performing crew.',
];

// ─── Recent-work gallery (image manifest — GALLERY photos) ───────────────────
$galleryItems = [
    ['1779985211133-e74mup-36-Dec_24__2025_21-56-30-RA7d', 'Roofing',        'Asphalt shingle roof going on over a wooded lot',            true],
    ['1779985049692-2gmyz6-31-Mar_13__2025_16-36-11-MGgp', 'Siding',         'New tan vinyl siding and garage on a Warren County home',    false],
    ['1779984949713-arsxr0-25-Aug_06__2025_14-36-12-a7GW', 'Interior Work',  'Interior framing and drywall mid-renovation',                false],
    ['1779985084912-c2c0m8-65-Feb_20__2026_19-30-33-C4y5', 'Exterior Work',  'Finished metal building with a standing-seam roof',          true],
    ['1779985050543-4vablu-34-Mar_13__2025_16-37-22-A7P5', 'Siding',         'Two-story home with beige vinyl siding and fresh trim',      false],
    ['1779985048829-yoqujz-14-Mar_11__2025_23-54-47-qHie', 'Windows & Doors','New windows installed during a home renovation',             false],
    ['1779985459096-1p3iml-57-Oct_14__2024_15-21-58-6qEf', 'General Work',   'OSB subfloor and color-coded wiring at framing stage',       true],
    ['1779985050122-4csoe0-32-Mar_13__2025_16-36-41-NptX', 'Exterior Work',  'Tan siding and a columned covered porch, completed',         false],
    ['1779985212271-1prbgz-42-Dec_24__2025_22-37-49-p62h', 'Masonry',        'Brick exterior with a herringbone paver driveway',           false],
    ['1779985469813-n64lom-67-Dec_05__2024_18-16-05-56rE', 'Siding',         'White vinyl siding installed over a concrete foundation',    true],
    ['1779985459992-36bztv-59-Oct_14__2024_23-04-45-zLmU', 'Exterior Work',  'White siding and a dark shingle roof during a remodel',      false],
];

// ─── FAQ (homepage) ─────────────────────────────────────────────────────────
$faqs = [
    [
        'question' => 'Is A&S Contracting Services licensed and insured in Missouri?',
        'answer'   => 'Yes. A&S Contracting Services is a licensed Missouri general contractor and carries full insurance. Every roofing, siding, and remodeling project in Warrenton and Warren County is covered from the first estimate through final walkthrough.',
    ],
    [
        'question' => 'Does A&S Contracting Services subcontract any of its work?',
        'answer'   => 'No. A&S Contracting Services self-performs every trade—roofing, siding, gutters, drywall, windows, and interior work—with the same crew from start to finish. There are no subcontracted surprises and one accountable team stands behind the job.',
    ],
    [
        'question' => 'What areas around Warrenton does A&S Contracting Services serve?',
        'answer'   => 'A&S Contracting Services works within roughly 50 miles of Warrenton, MO, including Wright City, Foristell, Wentzville, Troy, Jonesburg, and Washington across Warren County and central Missouri.',
    ],
    [
        'question' => 'Can A&S Contracting Services help with a storm or hail insurance claim?',
        'answer'   => 'Yes. A&S Contracting Services documents storm and hail damage, provides a detailed written estimate, and works alongside your insurer so the roofing or siding claim moves smoothly from inspection to installation.',
    ],
    [
        'question' => 'How much does a new roof or siding job cost in Warrenton?',
        'answer'   => 'Every project is priced from a free written estimate—there is no flat number, because cost depends on square footage, materials, and the condition of the existing structure. A&S Contracting Services quotes exactly what you pay, with no upselling.',
    ],
    [
        'question' => 'How soon can A&S Contracting Services start my project?',
        'answer'   => 'A&S Contracting Services usually schedules a free on-site estimate within days and gives you a clear start window in writing. Because the same crew handles every stage, timelines stay predictable from the first day to the final walkthrough.',
    ],
];

// ─── Schema ─────────────────────────────────────────────────────────────────
// LocalBusiness (#organization) is emitted by head.php on the homepage.
$schema = generateFAQSchema($faqs);

// Review location context (derived from the review text — not fabricated)
$reviewMeta = [
    'Marcus H.'   => ['loc' => 'Warrenton, MO',    'svc' => 'Roof Replacement'],
    'Jennifer K.' => ['loc' => 'Near Warrenton',    'svc' => 'Siding & Gutters'],
    'Robert T.'   => ['loc' => 'Wright City, MO',   'svc' => 'Interior Renovation'],
    'Diane L.'    => ['loc' => 'Warren County, MO', 'svc' => 'Soffit & Fascia'],
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>

<!-- Page-specific composition (token-only; no hardcoded colors/shadows/spacing) -->
<style>
/* Photo hero: let the <picture> fill the .hero-bg layer */
.hero--photo .hero-bg picture { display: block; width: 100%; height: 100%; }
.hero--photo .hero-bg img { width: 100%; height: 100%; object-fit: cover; object-position: 50% 45%; }

/* Recent-work gallery head */
.gallery-head { display: grid; gap: .6rem; max-width: 60ch; margin-bottom: clamp(1.5rem, 3vw, 2.5rem); }
.gallery-head p { margin: 0; color: var(--color-ink-2); }
.gallery-after { text-align: center; margin-top: 1.75rem; }

/* Signature "one roof" capabilities band — unique to the homepage */
.roof-band .container { display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1.05fr); gap: clamp(2rem, 5vw, 4rem); align-items: center; }
.roof-band__lead h2 { max-width: 16ch; }
.roof-band__lead p { color: rgba(255,255,255,.82); max-width: 40ch; }
.roof-band__note { margin-top: 1.25rem; display: inline-flex; align-items: center; gap: .55rem; font-family: var(--font-accent); font-size: 1rem; letter-spacing: .1em; text-transform: uppercase; color: var(--color-accent-bright); }
.roof-list { display: grid; grid-template-columns: 1fr 1fr; gap: .55rem 1.25rem; margin: 0; padding: 0; list-style: none; }
.roof-list li { display: flex; align-items: center; gap: .6rem; padding: .7rem .9rem; border: 1px solid rgba(255,255,255,.16); border-radius: var(--radius); background: rgba(255,255,255,.05); font-weight: 600; }
.roof-list li svg { color: var(--color-accent-bright); flex: 0 0 auto; }
@media (max-width: 900px) { .roof-band .container { grid-template-columns: 1fr; } }
@media (max-width: 480px) { .roof-list { grid-template-columns: 1fr; } }

/* About right column — real client photo in an offset accent frame (asymmetric) */
.about-photo { position: relative; }
.about-photo::before { content: ""; position: absolute; inset: -1.1rem -1.1rem 1.4rem 1.4rem; border: 2px solid var(--color-accent); border-radius: var(--radius-lg); z-index: -1; }
.about-photo picture { display: block; border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-lg); clip-path: polygon(0 0, 100% 0, 100% 100%, 8% 100%, 0 93%); }
.about-photo img { width: 100%; height: auto; display: block; aspect-ratio: 4 / 5; object-fit: cover; }
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ═══════════════════════ HERO (photo-led — bold-industrial) ═══════════════════════ -->
<section class="hero hero--photo">
  <div class="hero-bg">
    <?php echo p1_picture($heroImage, $heroImageAlt, [
        'sizes'         => '100vw',
        'width'         => 1600,
        'height'        => 1000,
        'loading'       => 'eager',
        'fetchpriority' => 'high',
    ]); ?>
  </div>
  <div class="hero-overlay"></div>
  <span class="grain" aria-hidden="true"></span>
  <div class="container">
    <div class="hero-grid hero-grid--form">

      <div class="hero-text">
        <span class="eyebrow">Warrenton, MO &middot; Serving Warren County since <?php echo $yearEstablished; ?></span>
        <h1 class="hero-title">Warrenton&rsquo;s <span class="text-accent">general contractor</span> for roofs, siding &amp; remodels</h1>
        <p class="hero-answer">A&amp;S Contracting Services is a licensed Missouri general contractor serving homes within 50 miles of Warrenton. The company self-performs all roofing, siding, gutter, window, and drywall work&mdash;no subcontractors, no trade gaps&mdash;with one accountable crew from your first estimate through final walkthrough.</p>
        <div class="hero-actions">
          <a href="#estimate" class="btn btn-primary btn-lg hero-form-open">Get a free estimate</a>
          <a class="link-call" href="tel:<?php echo $phoneTel; ?>"><?php echo icon('phone', 18); ?> or call <?php echo $phone; ?></a>
        </div>
        <ul class="hero-chips">
          <li><?php echo icon('shield-check', 16); ?> Licensed &amp; insured in Missouri</li>
          <li><?php echo icon('users', 16); ?> Self-performed &mdash; no subcontractors</li>
          <li><?php echo icon('map-pin', 16); ?> 50-mile radius from Warrenton</li>
        </ul>
      </div>

      <?php
      $heroFormId    = 'hero';
      $heroFormTitle = 'Get a free estimate';
      include $_SERVER['DOCUMENT_ROOT'] . '/includes/hero-form.php';
      ?>

    </div>
  </div>
</section>

<!-- ═══════════════════════ PROOF STRIP ═══════════════════════ -->
<section class="stats-band texture-grain slant-top" aria-label="A&amp;S Contracting Services at a glance">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container">
    <div class="stats-row">
      <div class="stat-item">
        <span class="stat-number">Est. <span><?php echo $yearEstablished; ?></span></span>
        <span class="stat-label">Warren County based</span>
      </div>
      <div class="stat-item">
        <span class="stat-number">In-<span>House</span></span>
        <span class="stat-label">No subcontracted work</span>
      </div>
      <div class="stat-item">
        <span class="stat-number"><span><?php echo $serviceRadius; ?></span>-Mile</span>
        <span class="stat-label">Radius from Warrenton</span>
      </div>
      <div class="stat-item">
        <span class="stat-number">Licensed <span>&amp; Insured</span></span>
        <span class="stat-label">Missouri general contractor</span>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════ RECENT WORK GALLERY ═══════════════════════ -->
<section class="section gallery-section" aria-label="Recent projects">
  <span class="floating-ring" style="top:-5rem; left:-4rem;" aria-hidden="true"></span>
  <span class="floating-ring" style="bottom:-6rem; right:-5rem;" aria-hidden="true"></span>
  <div class="container-wide">
    <div class="gallery-head reveal-up">
      <span class="eyebrow-label">Recent Work</span>
      <h2>Roofs, siding &amp; renovations <span class="text-accent">across Warren County</span></h2>
      <p>A look at recent A&amp;S Contracting Services projects around Warrenton, Wright City, and central Missouri&mdash;scroll to see more.</p>
    </div>

    <div class="gallery-track" data-p1-dynamic tabindex="0" aria-label="Project photos — scroll horizontally">
      <?php foreach ($galleryItems as $g):
        [$gBase, $gTag, $gCap, $gWide] = $g;
      ?>
      <figure class="gallery-item<?php echo $gWide ? ' gallery-item--wide' : ''; ?>">
        <?php echo p1_picture($gBase, $gCap, [
            'sizes'  => $gWide ? '(max-width: 768px) 80vw, 480px' : '(max-width: 768px) 70vw, 320px',
            'width'  => $gWide ? 480 : 320,
            'height' => $gWide ? 360 : 400,
        ]); ?>
        <figcaption>
          <span class="gallery-item__tag"><?php echo htmlspecialchars($gTag); ?></span>
          <span class="gallery-item__cap"><?php echo htmlspecialchars($gCap); ?></span>
        </figcaption>
      </figure>
      <?php endforeach; ?>
    </div>

    <div class="gallery-after">
      <a href="/services/" class="btn btn-secondary btn-lg">See all services</a>
    </div>
  </div>
</section>

<!-- ═══════════════════════ SIGNATURE: EVERYTHING UNDER ONE ROOF ═══════════════════════ -->
<section class="section on-dark roof-band edge-parallelogram-top" aria-label="Trades handled in-house">
  <span class="grain-layer" aria-hidden="true"></span>
  <span class="floating-ring" style="top:-6rem; right:-4rem;" aria-hidden="true"></span>
  <div class="container">
    <div class="roof-band__lead reveal-left">
      <span class="eyebrow">One licensed roof</span>
      <h2>Every trade handled by the same crew</h2>
      <p>Most contractors sub out half the job. A&amp;S Contracting Services keeps all ten trades in-house, so the people who quote your project are the people who finish it.</p>
      <span class="roof-band__note"><?php echo icon('handshake', 18); ?> One team &middot; one point of contact</span>
    </div>
    <ul class="roof-list reveal-right">
      <?php foreach ($services as $svc): ?>
      <li><?php echo icon('check', 18); ?> <?php echo htmlspecialchars($svc['name']); ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<!-- ═══════════════════════ SERVICES ═══════════════════════ -->
<section class="section" aria-label="General contracting services">
  <div class="container-wide">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">What We Do</span>
      <h2>What can A&amp;S Contracting Services <span class="text-accent">build or repair</span> on your home?</h2>
      <p class="hero-answer">A&amp;S Contracting Services covers your whole house under one licensed roof&mdash;roofing, siding, gutters, soffit, fascia, windows, drywall, and full exterior and interior renovations&mdash;all self-performed by a single crew across Warrenton and Warren County.</p>
    </div>

    <div class="services-grid">
      <?php
      $tintCycle = [1, 2, 3];
      foreach ($homeServices as $i => $svc):
        $slug   = $svc['slug'];
        $tint   = $tintCycle[$i % 3];
        $delay  = ($i % 3) + 1;
        $iconNm = $serviceIcons[$slug] ?? 'check-circle';
        $photo  = $serviceCardPhoto[$slug] ?? null;
      ?>
      <article class="service-card-with-image card-tint-<?php echo $tint; ?> reveal-up reveal-delay-<?php echo $delay; ?>">
        <?php if ($photo): ?>
        <div class="service-card__image">
          <?php echo p1_picture($photo, $serviceCardAlt[$slug] ?? ($svc['name'] . ' by A&S Contracting Services in Warrenton, MO'), [
              'sizes'  => '(max-width: 600px) 100vw, (max-width: 1199px) 50vw, 25vw',
              'width'  => 600,
              'height' => 360,
          ]); ?>
        </div>
        <?php endif; ?>
        <div class="service-card__body">
          <div class="service-card__icon"><?php echo icon($iconNm, 22); ?></div>
          <h3><?php echo htmlspecialchars($svc['name']); ?></h3>
          <p class="service-card__desc"><?php echo htmlspecialchars($serviceCardDesc[$slug] ?? $svc['description']); ?></p>
          <ul>
            <?php foreach (($serviceBullets[$slug] ?? []) as $bullet): ?>
            <li><?php echo htmlspecialchars($bullet); ?></li>
            <?php endforeach; ?>
          </ul>
          <a href="/services/<?php echo $slug; ?>/" class="service-card__cta">Learn more</a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>

    <div style="text-align:center; margin-top: 2rem;">
      <a href="/services/" class="btn btn-secondary btn-lg">View all <?php echo count($services); ?> services</a>
    </div>
  </div>
</section>

<!-- ═══════════════════════ MID-PAGE CTA BANNER ═══════════════════════ -->
<section class="cta-banner texture-grain edge-curve-top" aria-label="Request a free estimate">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container">
    <div class="reveal-up">
      <span class="eyebrow">Storm season doesn&rsquo;t wait</span>
      <h2>Hail or wind damage? Get it documented before the next storm.</h2>
      <p>A&amp;S Contracting Services inspects roofing, siding, and gutter damage, documents it for your insurer, and gives you a written estimate&mdash;fast, and at no cost.</p>
    </div>
    <div class="actions">
      <a href="#estimate" class="btn btn-accent btn-lg">Get my free estimate</a>
      <a href="tel:<?php echo $phoneTel; ?>" class="btn btn-outline-white btn-lg"><?php echo icon('phone', 18); ?> <?php echo $phone; ?></a>
    </div>
  </div>
</section>

<!-- ═══════════════════════ ABOUT / PROCESS (asymmetric) ═══════════════════════ -->
<section class="section" aria-label="About A&amp;S Contracting Services">
  <div class="container">
    <div class="about-split">
      <div class="about-left reveal-up">
        <span class="eyebrow-label">Who We Are</span>
        <h2>A Warren County contractor you can hold <span class="text-accent">accountable</span></h2>
        <p class="lead">A&amp;S Contracting Services started with roofing and exterior work and grew into a full-service general contractor for homes across Warrenton and central Missouri&mdash;without ever handing your project to a subcontractor.</p>
        <p>Owner Blake Alger runs a single crew that shows up when they say they will, keeps the job site clean, and quotes exactly what you pay. From a storm-damaged roof to a full interior renovation, one accountable team carries the work from first inspection to final walkthrough.</p>

        <ol class="process-steps">
          <li><b>Inspect</b><span>We walk the property, document the scope, and answer your questions on site.</span></li>
          <li><b>Estimate</b><span>You get a clear written quote&mdash;materials, timeline, and price, no upselling.</span></li>
          <li><b>Build</b><span>The same crew self-performs the work, keeping the site clean each day.</span></li>
          <li><b>Walkthrough</b><span>We review every detail with you and stand behind the finished job.</span></li>
        </ol>
      </div>

      <div class="about-right reveal-right">
        <div class="about-photo">
          <?php echo p1_picture($aboutImage, $aboutImageAlt, [
              'sizes'  => '(max-width: 900px) 100vw, 520px',
              'width'  => 600,
              'height' => 750,
          ]); ?>
        </div>
        <div class="about-stat-card">
          <span class="stat-number" style="font-size:1.9rem;"><?php echo $yearsInBusiness; ?> yrs</span>
          <span class="stat-label">building in Warren County</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════ REVIEWS ═══════════════════════ -->
<section class="section reviews-section edge-wave-top" aria-label="Customer reviews">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container-wide">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">In Their Words</span>
      <h2>What clients across Warren County say</h2>
      <p>Real reviews from A&amp;S Contracting Services roofing, siding, and renovation customers near Warrenton.</p>
    </div>

    <div class="reviews-track">
      <?php foreach ($reviews as $rev):
        $meta    = $reviewMeta[$rev['author']] ?? ['loc' => 'Warrenton, MO', 'svc' => 'General Contracting'];
        $initial = strtoupper(substr($rev['author'], 0, 1));
      ?>
      <article class="review-card">
        <div class="review-stars" aria-label="<?php echo (int)$rev['rating']; ?> out of 5 stars">
          <?php for ($s = 0; $s < (int)$rev['rating']; $s++) echo icon('star', 18); ?>
        </div>
        <p class="review-text">&ldquo;<?php echo htmlspecialchars($rev['text']); ?>&rdquo;</p>
        <div class="review-author">
          <span class="review-avatar" aria-hidden="true"><?php echo $initial; ?></span>
          <span>
            <span class="review-name"><?php echo htmlspecialchars($rev['author']); ?></span><br>
            <span class="review-date"><?php echo htmlspecialchars($meta['loc']); ?> &middot; <?php echo htmlspecialchars($meta['svc']); ?></span>
          </span>
        </div>
      </article>
      <?php endforeach; ?>
    </div>

    <div class="review-badge-strip">
      <span class="badge-strip"><?php echo icon('star', 16); ?> 5-Star Google Rated</span>
      <span class="badge-strip"><?php echo icon('shield-check', 16); ?> Licensed &amp; Insured</span>
      <span class="badge-strip"><?php echo icon('users', 16); ?> Self-Performed Work</span>
    </div>
  </div>
</section>

<!-- ═══════════════════════ FAQ ═══════════════════════ -->
<section class="section section--light" aria-label="Frequently asked questions">
  <div class="container-narrow">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Good Questions</span>
      <h2>What Warrenton homeowners ask <span class="text-accent">before hiring</span></h2>
    </div>
    <div class="faq-grid">
      <?php foreach ($faqs as $fi => $faq): ?>
      <details class="faq"<?php echo $fi < 2 ? ' open' : ''; ?>>
        <summary><?php echo htmlspecialchars($faq['question']); ?></summary>
        <p><?php echo htmlspecialchars($faq['answer']); ?></p>
      </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ═══════════════════════ TICKER STRIP ═══════════════════════ -->
<div class="ticker-strip" aria-hidden="true">
  <div class="ticker-track">
    <?php
    $tickerItems = [
      ['home', 'Roofing'], ['layers', 'Siding'], ['droplets', 'Seamless Gutters'],
      ['wind', 'Soffit &amp; Fascia'], ['building', 'Windows &amp; Doors'], ['paint-bucket', 'Drywall &amp; Interiors'],
      ['hammer', 'Exterior Work'], ['shield-check', 'Licensed &amp; Insured'], ['users', 'No Subcontractors'], ['badge-check', 'Free Estimates'],
    ];
    // Duplicate the set for a seamless loop
    for ($rep = 0; $rep < 2; $rep++):
      foreach ($tickerItems as $ti): ?>
      <span><?php echo icon($ti[0], 18); ?> <?php echo $ti[1]; ?></span>
    <?php endforeach; endfor; ?>
  </div>
</div>

<!-- ═══════════════════════ FROM THE BLOG ═══════════════════════ -->
<?php
// Blog registry for homepage preview
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/blog-data.php';
$featuredPost = $blogPosts[0] ?? null;
?>
<?php if ($featuredPost): ?>
<section class="section bg-surface" id="blog-preview" aria-label="From the blog">
  <div class="container container-narrow">
    <header class="section-header text-center reveal-up">
      <span class="eyebrow-label">Expert Advice &amp; Insights</span>
      <h2>From the Blog</h2>
      <p class="lead">Practical guidance on roofing, siding, and home improvements from licensed Missouri contractors.</p>
    </header>

    <article class="blog-featured-card reveal-up">
      <div class="blog-featured-card__image">
        <?php if (!empty($featuredPost['image']) && file_exists($_SERVER['DOCUMENT_ROOT'] . $featuredPost['image'])): ?>
        <img
          src="<?php echo $featuredPost['image']; ?>"
          alt="<?php echo htmlspecialchars($featuredPost['alt']); ?>"
          loading="lazy"
          decoding="async"
          width="800"
          height="450"
        >
        <?php endif; ?>
        <span class="blog-featured-card__category"><?php echo htmlspecialchars($featuredPost['category']); ?></span>
      </div>
      <div class="blog-featured-card__body">
        <div class="blog-meta">
          <span class="blog-meta__item">
            <?php echo icon('calendar', 16); ?>
            <?php echo htmlspecialchars($featuredPost['date']); ?>
          </span>
          <span class="blog-meta__item">
            <?php echo icon('clock', 16); ?>
            <?php echo htmlspecialchars($featuredPost['readtime']); ?>
          </span>
        </div>
        <h3 class="blog-featured-card__title">
          <a href="/blog/<?php echo $featuredPost['slug']; ?>/"><?php echo htmlspecialchars($featuredPost['title']); ?></a>
        </h3>
        <p class="blog-featured-card__excerpt"><?php echo htmlspecialchars($featuredPost['excerpt']); ?></p>
        <div style="display: flex; gap: 16px; flex-wrap: wrap;">
          <a href="/blog/<?php echo $featuredPost['slug']; ?>/" class="btn btn-primary">
            Read Article <?php echo icon('arrow-right', 18); ?>
          </a>
          <a href="/blog/" class="btn btn-secondary">View All Articles</a>
        </div>
      </div>
    </article>
  </div>
</section>

<style>
/* Blog Featured Card Styles */
.blog-featured-card {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 48px;
  align-items: center;
  margin-top: 48px;
}

.blog-featured-card__image {
  position: relative;
  border-radius: var(--radius-md);
  overflow: hidden;
  box-shadow: var(--shadow-lg);
}

.blog-featured-card__image img {
  width: 100%;
  height: auto;
  display: block;
}

.blog-featured-card__category {
  position: absolute;
  top: 20px;
  left: 20px;
  background: var(--color-accent);
  color: var(--color-primary);
  padding: 8px 16px;
  border-radius: var(--radius-sm);
  font-size: 0.75rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.05em;
}

.blog-featured-card__body {
  padding: 0;
}

.blog-meta {
  display: flex;
  align-items: center;
  gap: 20px;
  font-size: 0.875rem;
  color: var(--color-muted);
  margin-bottom: 16px;
}

.blog-meta__item {
  display: flex;
  align-items: center;
  gap: 6px;
}

.blog-featured-card__title {
  font-size: 1.75rem;
  font-weight: 700;
  margin-bottom: 16px;
  line-height: 1.3;
}

.blog-featured-card__title a {
  color: var(--color-ink);
  text-decoration: none;
  transition: color 0.2s;
}

.blog-featured-card__title a:hover {
  color: var(--color-accent-dark);
}

.blog-featured-card__excerpt {
  font-size: 1.0625rem;
  line-height: 1.6;
  color: var(--color-text);
  margin-bottom: 24px;
}

@media (max-width: 768px) {
  .blog-featured-card {
    grid-template-columns: 1fr;
    gap: 32px;
  }
}
</style>
<?php endif; ?>

<!-- ═══════════════════════ ESTIMATE SECTION ═══════════════════════ -->
<section class="section" id="estimate" aria-label="Request your free estimate">
  <div class="container">
    <div class="estimate">

      <div class="card reveal-up" style="padding: clamp(1.5rem, 4vw, 2.5rem); border:1px solid var(--color-line); border-radius: var(--radius-lg); background: var(--color-surface);">
        <span class="eyebrow-label">Free Estimate</span>
        <h2>Tell us about the job</h2>
        <p class="lead" style="margin-bottom: 1.25rem;">Send the details and A&amp;S Contracting Services will get back to you the same day with next steps.</p>

        <form action="<?php echo htmlspecialchars($formAction); ?>" method="POST" class="estimate-form">
          <input type="text" name="_honey" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true">
          <input type="hidden" name="_next" value="<?php echo htmlspecialchars($siteUrl); ?>/thank-you">
          <?php echo p1_attribution_fields('estimate-section'); ?>
          <input type="hidden" name="consent_version" value="v2.1">
          <input type="hidden" name="consent_page" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">

          <div class="form-grid">
            <div class="form-field">
              <label for="est-name">Your Name</label>
              <input id="est-name" type="text" name="name" autocomplete="name" required>
            </div>
            <div class="form-field">
              <label for="est-phone">Phone</label>
              <input id="est-phone" type="tel" name="phone" autocomplete="tel" required>
            </div>
            <div class="form-field">
              <label for="est-email">Email</label>
              <input id="est-email" type="email" name="email" autocomplete="email" required>
            </div>
            <div class="form-field">
              <label for="est-service">Service Needed</label>
              <select id="est-service" name="service">
                <option value="">Select a service</option>
                <?php foreach ($services as $estSvc): ?>
                <option value="<?php echo htmlspecialchars($estSvc['name']); ?>"><?php echo htmlspecialchars($estSvc['name']); ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-field full">
              <label for="est-message">Project Details</label>
              <textarea id="est-message" name="message" rows="4"></textarea>
            </div>
          </div>

          <fieldset class="form-consent-fieldset">
            <legend class="form-consent-legend">Communication Consent</legend>

            <label class="form-consent-item">
              <input type="checkbox" name="email_opt_in" value="yes" class="consent-checkbox">
              <span class="consent-label"><strong>Email updates (optional):</strong> I agree to receive emails from <?php echo htmlspecialchars($siteName); ?> about my inquiry, services, and news. I can unsubscribe anytime or by emailing <?php echo htmlspecialchars($email); ?>. Message frequency varies.</span>
            </label>

            <label class="form-consent-item">
              <input type="checkbox" name="sms_opt_in" value="yes" class="consent-checkbox">
              <span class="consent-label"><strong>SMS/Text messages (optional):</strong> I agree to receive text messages from <?php echo htmlspecialchars($siteName); ?> at the number I provided (reminders, updates, and offers). Message frequency varies. Message and data rates may apply. Reply STOP to unsubscribe, HELP for help. <strong>Consent is not a condition of purchase.</strong></span>
            </label>

            <label class="form-consent-item form-consent-required">
              <input type="checkbox" name="terms_accepted" value="yes" class="consent-checkbox" required>
              <span class="consent-label">I have read and agree to the <a href="/privacy-policy/">Privacy Policy</a> and <a href="/terms/">Terms of Service</a>. <span class="required-star">*</span></span>
            </label>
          </fieldset>

          <!-- spam shield: signed render timestamp + JS interaction signal -->
          <?php $__ft_ts = (string) time(); ?>
          <input type="hidden" name="_ft" value="<?php echo $__ft_ts . '.' . hash_hmac('sha256', $__ft_ts, $leadsFormSecret); ?>">
          <input type="hidden" name="_js" value="" class="js-shield-field">
          <?php if (empty($GLOBALS['__js_shield'])) { $GLOBALS['__js_shield'] = 1; ?>
          <script>(function(){var d=document,f=function(){var i,e=d.querySelectorAll('.js-shield-field');for(i=0;i<e.length;i++)e[i].value='1';d.removeEventListener('pointerdown',f);d.removeEventListener('keydown',f);};d.addEventListener('pointerdown',f);d.addEventListener('keydown',f);})();</script>
          <?php } ?>
          <button type="submit" class="btn btn-primary btn-lg btn-block">Send my request</button>
        </form>
      </div>

      <div class="reveal-right">
        <span class="eyebrow-label">What Happens Next</span>
        <h2>From your message to a <span class="text-accent">clean finish</span></h2>
        <ol class="next-steps">
          <li><strong>We reach out the same day.</strong> A&amp;S Contracting Services follows up to confirm the details and schedule your free on-site visit.</li>
          <li><strong>You get a written estimate.</strong> Clear scope, materials, timeline, and price&mdash;no upselling, no surprises.</li>
          <li><strong>One crew does the work.</strong> The same self-performing team completes the job and walks it with you at the end.</li>
        </ol>

        <div class="nap">
          <div><?php echo icon('phone', 18); ?> <a href="tel:<?php echo $phoneTel; ?>"><?php echo $phone; ?></a></div>
          <div><?php echo icon('mail', 18); ?> <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></div>
          <div><?php echo icon('map-pin', 18); ?> <span><?php echo $addressCity; ?>, <?php echo $addressState; ?> <?php echo $addressZip; ?></span></div>
          <div><?php echo icon('clock', 18); ?> <span><?php echo htmlspecialchars($businessHours); ?></span></div>
        </div>
        <p style="margin-top:1rem; color: var(--color-muted); font-size: .95rem;">Serving Warrenton, Wright City, Foristell, Wentzville, Troy, Jonesburg, Washington and everywhere within <?php echo $serviceRadius; ?> miles.</p>
      </div>

    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
