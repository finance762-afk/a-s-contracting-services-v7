<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ─── Page-level setup ───────────────────────────────────────────────────────
$pageType        = 'home';                       // attribution.php page identity
$currentPage     = 'home';
$pageTitle       = 'General Contractor in Warrenton, MO';
$metaDescription = 'A&S Contracting Services is a licensed, insured general contractor in Warrenton, MO. Self-performed roofing, siding, gutters, drywall & remodels within 50 miles. Free estimates.';
$canonicalUrl    = $siteUrl . '/';

// Homepage services grid: show the first 8, link to the full list.
$homeServices    = array_slice($services, 0, 8);

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
    'Marcus H.'   => ['loc' => 'Warrenton, MO',   'svc' => 'Roof Replacement'],
    'Jennifer K.' => ['loc' => 'Near Warrenton',  'svc' => 'Siding & Gutters'],
    'Robert T.'   => ['loc' => 'Wright City, MO',  'svc' => 'Interior Renovation'],
    'Diane L.'    => ['loc' => 'Warren County, MO', 'svc' => 'Soffit & Fascia'],
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>

<!-- Page-specific composition (token-only; no hardcoded colors/shadows/spacing) -->
<style>
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

/* About right column — branded credentials panel (no client photo available) */
.creds-panel { position: relative; border: 1px solid var(--color-line); border-radius: var(--radius-lg); background: linear-gradient(150deg, var(--color-dark), var(--color-dark-alt)); color: #fff; padding: clamp(1.75rem, 4vw, 2.5rem); box-shadow: var(--shadow-lg); overflow: hidden; }
.creds-panel h3 { color: #fff; font-size: 1.4rem; max-width: 18ch; }
.creds-panel p { color: rgba(255,255,255,.82); margin-top: .75rem; }
.creds-panel ul { list-style: none; margin: 1.4rem 0 0; padding: 0; display: grid; gap: .7rem; }
.creds-panel li { display: flex; align-items: flex-start; gap: .6rem; color: rgba(255,255,255,.9); font-weight: 500; }
.creds-panel li svg { color: var(--color-accent-bright); flex: 0 0 auto; margin-top: 2px; }
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ═══════════════════════ HERO (type-led — no client photo) ═══════════════════════ -->
<section class="hero hero--type">
  <span class="grain" aria-hidden="true"></span>
  <div class="container">
    <div class="hero-grid hero-grid--form">

      <div class="hero-text">
        <span class="eyebrow">Warrenton, MO &middot; Serving Warren County since <?php echo $yearEstablished; ?></span>
        <h1 class="hero-title">Warrenton&rsquo;s <span class="text-accent">general contractor</span> for roofs, siding &amp; full remodels</h1>
        <p class="hero-answer">A&amp;S Contracting Services self-performs roofing, siding, gutters, drywall, and full renovations within 50 miles of Warrenton&mdash;one licensed, insured crew from estimate to walkthrough.</p>
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

      <aside class="hero-form-card" id="estimate-form">
        <h2>Get a free estimate</h2>
        <p class="hero-form-tagline">No obligation. Same-day reply.</p>
        <form action="<?php echo htmlspecialchars($formAction); ?>" method="POST" class="hero-form">
          <input type="hidden" name="_next" value="<?php echo htmlspecialchars($siteUrl); ?>/thank-you">
          <input type="hidden" name="_captcha" value="false">
          <input type="hidden" name="_template" value="table">
          <input type="hidden" name="_subject" value="New estimate request from <?php echo htmlspecialchars($siteName); ?>">
          <input type="hidden" name="_cc" value="CustomerService@pageoneinsights.com">
          <input type="text" name="_honey" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true">
          <?php echo p1_attribution_fields('hero'); ?>
          <input type="hidden" name="consent_version" value="v2.1">
          <input type="hidden" name="consent_page" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
          <div class="form-row"><label class="sr-only" for="hero-name">Name</label><input id="hero-name" type="text" name="name" placeholder="Name" autocomplete="name" required></div>
          <div class="form-row"><label class="sr-only" for="hero-phone">Phone</label><input id="hero-phone" type="tel" name="phone" placeholder="Phone" autocomplete="tel" required></div>
          <div class="form-row"><label class="sr-only" for="hero-service">Service</label>
            <select id="hero-service" name="service">
              <option value="">What do you need?</option>
              <?php foreach ($services as $heroSvc): ?>
              <option value="<?php echo htmlspecialchars($heroSvc['name']); ?>"><?php echo htmlspecialchars($heroSvc['name']); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <label class="consent"><input type="checkbox" name="terms_accepted" value="yes" required><span>I agree to the <a href="/terms/" target="_blank" rel="noopener">Terms</a> and <a href="/privacy-policy/" target="_blank" rel="noopener">Privacy Policy</a> and consent to be contacted. *</span></label>
          <button type="submit" class="btn btn-primary btn-block">Get my free estimate</button>
        </form>
      </aside>

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
      ?>
      <article class="service-card-with-image card-tint-<?php echo $tint; ?> reveal-up reveal-delay-<?php echo $delay; ?>">
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
        <div class="creds-panel">
          <h3>Under one licensed, insured roof</h3>
          <p>A single accountable team across Warren County and central Missouri&mdash;no trade gaps, no subcontracted surprises.</p>
          <ul>
            <li><?php echo icon('badge-check', 20); ?> Licensed Missouri general contractor</li>
            <li><?php echo icon('shield-check', 20); ?> Fully insured on every project</li>
            <li><?php echo icon('users', 20); ?> Same crew from start to finish</li>
            <li><?php echo icon('clipboard-list', 20); ?> Detailed written estimates</li>
          </ul>
        </div>
        <div class="about-stat-card">
          <span class="stat-number" style="font-size:1.9rem;"><?php echo $yearsInBusiness; ?> yrs</span>
          <span class="stat-label">building in Warren County</span>
        </div>
      </div>
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
        $meta = $reviewMeta[$rev['author']] ?? ['loc' => 'Warrenton, MO', 'svc' => 'General Contracting'];
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
          <input type="hidden" name="_captcha" value="false">
          <input type="hidden" name="_template" value="table">
          <input type="hidden" name="_subject" value="New estimate request from <?php echo htmlspecialchars($siteName); ?>">
          <input type="hidden" name="_cc" value="CustomerService@pageoneinsights.com">
          <?php echo p1_attribution_fields('cta-band'); ?>
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
