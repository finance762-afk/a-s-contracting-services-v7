<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ─── Page-level setup ───────────────────────────────────────────────────────
$serviceSlug     = 'gutters';
$pageType        = 'service';
$currentPage     = 'services';
$svcName         = 'Gutters';
$pageTitle       = 'Gutters in Warrenton, MO';
$pageDescription = 'Gutter installation in Warrenton, MO. A&S Contracting Services forms seamless aluminum gutters on site across Warren County—downspouts, guards, and repairs handled. Free written estimates.';
$canonicalUrl    = $siteUrl . '/services/gutters/';

// ─── Hero + recent-work photos (image manifest) ─────────────────────────────
$heroImage    = '1779985084434-7wvwuf-46-Feb_10__2026_22-02-29-uWM1';
$heroImageAlt = 'Roof and gutter work in progress on a wooded Warren County property by A&S Contracting Services';
$heroPreload  = [
    'srcset' => "/assets/images/{$heroImage}-480.avif 480w, /assets/images/{$heroImage}-960.avif 960w",
    'sizes'  => '100vw',
];
$workPhotos = [
    ['1779985356802-y1uuhd-29-Aug_06__2025_14-39-50-VPdz', 'A&S worker on a ladder finishing exterior trim and gutter line on a gray-sided Warrenton home'],
    ['1779985460368-i1nur1-60-Oct_14__2024_23-05-06-h2RS', 'Completed home with white siding, a charcoal roof, and new gutters near Warren County'],
    ['1779985468766-asxmqk-65-Oct_14__2024_23-06-52-nSsb', 'Home with white siding, a covered porch, and clean gutter lines in central Missouri'],
];

// ─── FAQ (service-specific) ─────────────────────────────────────────────────
$faqs = [
    [
        'question' => 'How much do seamless gutters cost in Warrenton, MO?',
        'answer'   => 'Gutter cost in Warrenton depends on the linear footage around your roofline, whether you choose 5-inch or 6-inch K-style, the number of downspouts, and whether you add leaf guards. A&S Contracting Services measures your home and gives a free written estimate, so the run length and price are settled before we roll a single seamless section on site.',
    ],
    [
        'question' => 'Why are seamless gutters better than sectional ones?',
        'answer'   => 'A&S Contracting Services forms seamless gutters on site from a continuous coil, so a run has no joints along its length—only sealed corners and end caps. Sectional store-bought gutters snap together every few feet, and those seams are exactly where leaks start after a few Missouri freeze-thaw cycles. Fewer joints means fewer failure points over your foundation.',
    ],
    [
        'question' => 'What size gutters do I need for a Warren County home?',
        'answer'   => 'A&S Contracting Services sizes gutters to your roof, not a one-size default. Steep or large roofs that shed heavy runoff during Missouri downpours often need 6-inch K-style with oversized downspouts, while a smaller ranch does fine with 5-inch. We calculate the drainage the roof produces so the system keeps up in a real storm instead of overflowing.',
    ],
    [
        'question' => 'Do gutter guards actually keep leaves out?',
        'answer'   => 'Good ones do. A&S Contracting Services installs quality gutter guards that keep leaves, seed pods, and debris from the maples and oaks common around Warren County out of the trough while letting water through. Guards cut down on cleaning and clogs, though no guard is fully maintenance-free—we tell you honestly what they will and will not do for your home.',
    ],
    [
        'question' => 'Can bad gutters really cause foundation problems?',
        'answer'   => 'Yes, and it is one of the most common issues A&S Contracting Services sees. When gutters overflow or downspouts dump water at the base of the house, that water pools against the foundation, saturates the soil, and finds its way into the basement. Correct pitch and downspouts extended well away from the house are what keep runoff from undermining your foundation.',
    ],
    [
        'question' => 'Are you licensed and insured for gutter work in Missouri?',
        'answer'   => 'Yes. A&S Contracting Services is a licensed Missouri general contractor and carries full insurance on every gutter job. Because the same crew that handles your roof, soffit, and fascia also installs your gutters, the whole roofline goes on as one coordinated system—covered start to finish.',
    ],
];

// ─── Schema (Service + FAQPage + BreadcrumbList) ─────────────────────────────
$serviceSchema = [
    '@context'    => 'https://schema.org',
    '@type'       => 'Service',
    '@id'         => $canonicalUrl . '#service-' . $serviceSlug,
    'name'        => 'Gutters',
    'serviceType' => 'Gutter installation',
    'description' => 'Seamless aluminum K-style gutter installation, downspouts, gutter guards, and repair in Warrenton, MO and Warren County—formed on site to protect the foundation and landscaping from Missouri runoff.',
    'provider'    => ['@id' => $siteUrl . '/#organization'],
    'areaServed'  => [
        '@type' => 'GeoCircle',
        'geoMidpoint' => ['@type' => 'GeoCoordinates', 'latitude' => '38.8098', 'longitude' => '-91.1401'],
        'geoRadius'   => $serviceRadius . ' miles',
    ],
    'url'         => $canonicalUrl,
];
$breadcrumbSchema = [
    '@context'        => 'https://schema.org',
    '@type'           => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',     'item' => $siteUrl . '/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => $siteUrl . '/services/'],
        ['@type' => 'ListItem', 'position' => 3, 'name' => $svcName,   'item' => $canonicalUrl],
    ],
];
$schema  = '<script type="application/ld+json">' . json_encode($serviceSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
$schema .= generateFAQSchema($faqs) . "\n";
$schema .= '<script type="application/ld+json">' . json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>

<style>
/* ── Service page composition (token-only) ── */
.sp-signs { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1rem; margin-top: 1.75rem; }
.sp-sign { background: var(--color-surface); border: 1px solid var(--color-line); border-radius: var(--radius-lg); padding: 1.25rem; display: grid; gap: .5rem; box-shadow: var(--shadow-sm); }
.sp-sign__icon { width: 42px; height: 42px; border-radius: 10px; display: grid; place-items: center; color: var(--color-primary); background: color-mix(in srgb, var(--color-primary) 12%, white); }
.sp-sign h3 { font-size: 1.02rem; }
.sp-sign p { margin: 0; font-size: .9rem; color: var(--color-ink-2); }
.sp-problem { display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1fr); gap: clamp(2rem, 5vw, 4rem); align-items: center; }
@media (max-width: 900px) { .sp-problem { grid-template-columns: 1fr; } .sp-signs { grid-template-columns: 1fr 1fr; } }
@media (max-width: 480px) { .sp-signs { grid-template-columns: 1fr; } }

/* Expert positioning — big stat + evidence */
.sp-position { display: grid; grid-template-columns: .8fr 1.2fr; gap: clamp(2rem, 5vw, 4rem); align-items: center; }
.sp-position__stat { font-family: var(--font-accent); font-size: clamp(3.4rem, 9vw, 5.5rem); line-height: .9; color: var(--color-primary); letter-spacing: .01em; }
.sp-position__stat span { display: block; font-family: var(--font-heading); font-size: 1.05rem; font-weight: 700; letter-spacing: 0; color: var(--color-ink-2); margin-top: .6rem; max-width: 22ch; }
.sp-evidence { display: grid; gap: 1rem; margin: 1.25rem 0 0; padding: 0; list-style: none; }
.sp-evidence li { display: grid; grid-template-columns: 28px 1fr; gap: .8rem; align-items: start; }
.sp-evidence li svg { color: var(--color-accent-dark); margin-top: 3px; }
.sp-evidence b { display: block; }
@media (max-width: 800px) { .sp-position { grid-template-columns: 1fr; } }

/* What's included + timeline */
.sp-included { display: grid; grid-template-columns: 1fr 1fr; gap: clamp(2rem, 5vw, 3.5rem); align-items: start; }
.sp-checklist { display: grid; gap: .65rem; margin: 1rem 0 0; padding: 0; list-style: none; }
.sp-checklist li { display: grid; grid-template-columns: 24px 1fr; gap: .6rem; align-items: start; font-size: .96rem; }
.sp-checklist li svg { color: var(--color-primary); margin-top: 3px; }
@media (max-width: 800px) { .sp-included { grid-template-columns: 1fr; } }

/* Comparison */
.sp-compare { display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem; margin-top: 1.5rem; }
.sp-compare__col { border: 1px solid var(--color-line); border-radius: var(--radius-lg); padding: 1.5rem; background: var(--color-surface); }
.sp-compare__col--us { border-color: color-mix(in srgb, var(--color-primary) 40%, var(--color-line)); box-shadow: var(--shadow); background: color-mix(in srgb, var(--color-accent) 8%, white); }
.sp-compare h3 { font-size: 1.1rem; margin-bottom: .9rem; display: flex; align-items: center; gap: .5rem; }
.sp-compare ul { list-style: none; margin: 0; padding: 0; display: grid; gap: .7rem; }
.sp-compare li { display: grid; grid-template-columns: 22px 1fr; gap: .55rem; font-size: .93rem; color: var(--color-ink-2); }
.sp-compare--them li svg { color: var(--color-danger); margin-top: 2px; }
.sp-compare--us li svg { color: var(--color-success); margin-top: 2px; }
@media (max-width: 700px) { .sp-compare { grid-template-columns: 1fr; } }

/* Other services */
.sp-other { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; margin-top: 1.5rem; }
@media (max-width: 800px) { .sp-other { grid-template-columns: 1fr; } }
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
        <li><a href="/services/">Services</a></li>
        <li class="breadcrumb-sep" aria-hidden="true">/</li>
        <li aria-current="page"><?php echo $svcName; ?></li>
      </ol>
    </nav>
    <div class="hero-grid hero-grid--form">
      <div class="hero-copy">
        <span class="eyebrow">Gutters &middot; Warrenton &amp; Warren County</span>
        <h1>Gutters in <span class="text-accent">Warrenton, MO</span> — seamless install, guards &amp; repair</h1>
        <p class="hero-answer">A&amp;S Contracting Services is a licensed, insured Warrenton gutter contractor that forms seamless aluminum gutters on site within 50 miles of Warren County—downspouts routed away from your foundation, guards installed, sagging runs repaired, by one self-performing crew.</p>
        <div class="hero-actions">
          <a href="#estimate" class="btn btn-primary btn-lg hero-form-open">Get a free gutter estimate</a>
          <a class="link-call" href="tel:<?php echo $phoneTel; ?>"><?php echo icon('phone', 18); ?> or call <?php echo $phone; ?></a>
        </div>
        <ul class="hero-chips">
          <li><?php echo icon('shield-check', 16); ?> Licensed &amp; insured in Missouri</li>
          <li><?php echo icon('droplets', 16); ?> Seamless, formed on site</li>
          <li><?php echo icon('users', 16); ?> Self-performed &mdash; no subcontractors</li>
        </ul>
      </div>

      <aside class="hero-form-card" id="hero-form">
        <h2>Free gutter estimate</h2>
        <p class="hero-form-tagline">No obligation. Same-day reply.</p>
        <form action="<?php echo htmlspecialchars($formAction); ?>" method="POST" class="hero-form">
          <input type="hidden" name="_next" value="<?php echo htmlspecialchars($siteUrl); ?>/thank-you">
          <input type="text" name="_honey" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true">
          <?php echo p1_attribution_fields('hero'); ?>
          <input type="hidden" name="consent_version" value="v2.1">
          <input type="hidden" name="consent_page" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
          <div class="form-row"><label class="sr-only" for="hero-name">Name</label><input id="hero-name" type="text" name="name" placeholder="Name" autocomplete="name" required></div>
          <div class="form-row"><label class="sr-only" for="hero-phone">Phone</label><input id="hero-phone" type="tel" name="phone" placeholder="Phone" autocomplete="tel" required></div>
          <div class="form-row"><label class="sr-only" for="hero-email">Email</label><input id="hero-email" type="email" name="email" placeholder="Email" autocomplete="email" required></div>
          <div class="form-row"><label class="sr-only" for="hero-service">Service</label>
            <select id="hero-service" name="service">
              <?php foreach ($services as $heroSvc): ?>
              <option value="<?php echo htmlspecialchars($heroSvc['name']); ?>"<?php echo $heroSvc['slug'] === $serviceSlug ? ' selected' : ''; ?>><?php echo htmlspecialchars($heroSvc['name']); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <label class="consent"><input type="checkbox" name="terms_accepted" value="yes" required><span>I agree to the <a href="/terms/" target="_blank" rel="noopener">Terms</a> and <a href="/privacy-policy/" target="_blank" rel="noopener">Privacy Policy</a> and consent to be contacted. *</span></label>
          <!-- spam shield: signed render timestamp + JS interaction signal -->
          <?php $__ft_ts = (string) time(); ?>
          <input type="hidden" name="_ft" value="<?php echo $__ft_ts . '.' . hash_hmac('sha256', $__ft_ts, $leadsFormSecret); ?>">
          <input type="hidden" name="_js" value="" class="js-shield-field">
          <?php if (empty($GLOBALS['__js_shield'])) { $GLOBALS['__js_shield'] = 1; ?>
          <script>(function(){var d=document,f=function(){var i,e=d.querySelectorAll('.js-shield-field');for(i=0;i<e.length;i++)e[i].value='1';d.removeEventListener('pointerdown',f);d.removeEventListener('keydown',f);};d.addEventListener('pointerdown',f);d.addEventListener('keydown',f);})();</script>
          <?php } ?>
          <button type="submit" class="btn btn-primary btn-block">Get my free estimate</button>
        </form>
      </aside>
    </div>
  </div>
</section>

<!-- ═══════════════════ PROBLEM STATEMENT ═══════════════════ -->
<section class="section section--light">
  <div class="container">
    <div class="sp-problem">
      <div class="reveal-left">
        <span class="eyebrow-label">Know The Signs</span>
        <h2>How do you know your Warrenton gutters are failing?</h2>
        <p class="answer-block">If water sheets over the edge during a storm, the gutters sag or pull away from the fascia, or you see puddles and eroded mulch at the base of the house, your gutters are no longer moving water where it belongs. A&amp;S Contracting Services traces the problem back to pitch, hangers, or downspout placement and tells you whether a repair or a full seamless system is the fix.</p>
        <p class="pull-quote">Gutters have one job—move Missouri rain away from your foundation. When they stop, the basement is next.</p>
      </div>
      <div class="sp-signs reveal-right">
        <div class="sp-sign">
          <div class="sp-sign__icon"><?php echo icon('umbrella', 22); ?></div>
          <h3>Overflowing in the rain</h3>
          <p>Water pouring over the front edge means the trough is clogged, undersized, or pitched wrong.</p>
        </div>
        <div class="sp-sign">
          <div class="sp-sign__icon"><?php echo icon('waves', 22); ?></div>
          <h3>Sagging &amp; pulling loose</h3>
          <p>Gutters drooping away from the fascia have failed hangers and standing water inside.</p>
        </div>
        <div class="sp-sign">
          <div class="sp-sign__icon"><?php echo icon('droplets', 22); ?></div>
          <h3>Water at the foundation</h3>
          <p>Pooling and basement seepage point to downspouts dumping runoff right against the house.</p>
        </div>
        <div class="sp-sign">
          <div class="sp-sign__icon"><?php echo icon('leaf', 22); ?></div>
          <h3>Staining &amp; erosion</h3>
          <p>Streaks on the fascia and washed-out mulch show water is spilling in the wrong places.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════ EXPERT POSITIONING ═══════════════════ -->
<section class="section">
  <div class="container">
    <div class="sp-position">
      <div class="reveal-up">
        <div class="sp-position__stat">0<span>joints down the length of a seamless run—only sealed corners and end caps, formed on site for your Warrenton roofline</span></div>
      </div>
      <div class="reveal-right">
        <span class="eyebrow-label">Why It Matters</span>
        <h2>What makes A&amp;S a gutter contractor Warren County homeowners trust?</h2>
        <p class="answer-block">A&amp;S Contracting Services roll-forms seamless aluminum gutters right at your house from a continuous coil, so each run is cut to the exact length with no mid-span seams to leak. The same crew that measures the roofline sets the pitch, hangs the gutters, and routes the downspouts well away from the foundation.</p>
        <ul class="sp-evidence">
          <li><?php echo icon('ruler', 22); ?><span><b>Formed on site.</b> Continuous runs cut to length mean fewer joints and fewer leaks over the years.</span></li>
          <li><?php echo icon('droplets', 22); ?><span><b>Sized to your roof.</b> We calculate the runoff so 5-inch or 6-inch K-style keeps up in a real Missouri downpour.</span></li>
          <li><?php echo icon('shield-check', 22); ?><span><b>Foundation-first.</b> Correct pitch and extended downspouts move water away from the house, not into the basement.</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════ SERVICE BREAKDOWN ═══════════════════ -->
<section class="section section--light">
  <div class="container">
    <span class="eyebrow-label">The Work</span>
    <h2>What&rsquo;s included in an A&amp;S gutter installation?</h2>
    <p class="answer-block">A&amp;S Contracting Services delivers a complete drainage system, not just a trough: tear-off of the old gutters, on-site roll-forming of seamless runs, new hidden hangers, correct pitch to the downspouts, sealed corners and end caps, downspouts extended away from the house, optional leaf guards, and a clean job site. Every home on your Warrenton roofline drains the way it should.</p>
    <div class="sp-included">
      <div class="reveal-up">
        <h3>Included in the scope</h3>
        <ul class="sp-checklist">
          <li><?php echo icon('check', 20); ?> Tear-off and haul-away of the old gutters</li>
          <li><?php echo icon('check', 20); ?> On-site roll-forming of seamless 5-inch or 6-inch K-style</li>
          <li><?php echo icon('check', 20); ?> New hidden hangers set for strength</li>
          <li><?php echo icon('check', 20); ?> Correct pitch calculated to each downspout</li>
          <li><?php echo icon('check', 20); ?> Sealed corners, miters, and end caps</li>
          <li><?php echo icon('check', 20); ?> Downspouts routed and extended away from the foundation</li>
          <li><?php echo icon('check', 20); ?> Optional leaf guards to cut cleaning and clogs</li>
          <li><?php echo icon('check', 20); ?> Full cleanup of the work area</li>
        </ul>
      </div>
      <div class="reveal-right">
        <h3>How the project runs</h3>
        <ol class="process-steps">
          <li><b>Free measurement</b><span>We measure the roofline, check drainage, and go over sizing and guard options on site.</span></li>
          <li><b>Written estimate</b><span>You get an itemized quote—run length, downspouts, guards, timeline, and price.</span></li>
          <li><b>Form &amp; install</b><span>Our crew rolls the seamless runs on site, sets the pitch, and hangs the system in a day for most homes.</span></li>
          <li><b>Test &amp; walkthrough</b><span>We confirm the water flows to the downspouts, clean up, and review the finished system with you.</span></li>
        </ol>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════ PROOF / REVIEWS ═══════════════════ -->
<section class="section reviews-section edge-wave-top" aria-label="Gutter reviews">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container-wide">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">In Their Words</span>
      <h2>What do Warrenton homeowners say about our gutters?</h2>
      <p>Real reviews from A&amp;S Contracting Services gutter and exterior customers across Warren County.</p>
    </div>
    <div class="reviews-track">
      <?php
      $gutterReviews = array_filter($reviews, function ($r) { return in_array($r['author'], ['Jennifer K.', 'Diane L.', 'Marcus H.']); });
      foreach ($gutterReviews as $rev):
        $initial = strtoupper(substr($rev['author'], 0, 1));
      ?>
      <article class="review-card">
        <div class="review-stars" aria-label="<?php echo (int)$rev['rating']; ?> out of 5 stars">
          <?php for ($s = 0; $s < (int)$rev['rating']; $s++) echo icon('star', 18); ?>
        </div>
        <p class="review-text">&ldquo;<?php echo htmlspecialchars($rev['text']); ?>&rdquo;</p>
        <div class="review-author">
          <span class="review-avatar" aria-hidden="true"><?php echo $initial; ?></span>
          <span class="review-name"><?php echo htmlspecialchars($rev['author']); ?></span>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
    <div class="review-badge-strip">
      <span class="badge-strip"><?php echo icon('star', 16); ?> 5-Star Google Rated</span>
      <span class="badge-strip"><?php echo icon('shield-check', 16); ?> Licensed &amp; Insured</span>
      <span class="badge-strip"><?php echo icon('droplets', 16); ?> Seamless On-Site</span>
    </div>
  </div>
</section>

<!-- ═══════════════════ COMPARISON ═══════════════════ -->
<section class="section">
  <div class="container">
    <span class="eyebrow-label">The Difference</span>
    <h2>Why choose seamless gutters over sectional store-bought ones?</h2>
    <p class="answer-block">Sectional gutters from the hardware store snap together in pieces, and a handyman hangs them with joints every few feet—joints that leak once Missouri freeze-thaw works on the seals. A&amp;S Contracting Services forms seamless runs on site and installs them as a sized, pitched system, so water goes to the downspouts instead of down your wall.</p>
    <div class="sp-compare">
      <div class="sp-compare__col sp-compare--them">
        <h3><?php echo icon('x', 20); ?> Sectional / handyman gutters</h3>
        <ul>
          <li><?php echo icon('minus', 18); ?> Snap-together joints every few feet</li>
          <li><?php echo icon('minus', 18); ?> Seams that leak after a few freeze-thaw cycles</li>
          <li><?php echo icon('minus', 18); ?> One-size stock instead of roof-sized runs</li>
          <li><?php echo icon('minus', 18); ?> Downspouts often left dumping at the foundation</li>
        </ul>
      </div>
      <div class="sp-compare__col sp-compare--us">
        <h3><?php echo icon('check-circle', 20); ?> A&amp;S Contracting Services</h3>
        <ul>
          <li><?php echo icon('check', 18); ?> Seamless runs formed on site, no mid-span joints</li>
          <li><?php echo icon('check', 18); ?> Sized to the runoff your roof actually produces</li>
          <li><?php echo icon('check', 18); ?> Downspouts routed well away from the house</li>
          <li><?php echo icon('check', 18); ?> Installed and stood behind by one local crew</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════ FAQ ═══════════════════ -->
<section class="section section--light" aria-label="Gutter FAQ">
  <div class="container-narrow">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Good Questions</span>
      <h2>What do Warrenton homeowners ask before a gutter project?</h2>
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

<!-- ═══════════════════ RECENT WORK ═══════════════════ -->
<section class="section sp-gallery" aria-label="Recent gutter projects">
  <div class="container-wide">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Recent Work</span>
      <h2>What recent gutter projects has A&amp;S completed near Warrenton?</h2>
      <p class="answer-block">These are real gutter projects A&amp;S Contracting Services self-performed across Warrenton and Warren County&mdash;each one handled start to finish by the same in-house crew, never a subcontractor.</p>
    </div>
    <div class="sp-gallery-grid" data-p1-dynamic>
      <?php foreach ($workPhotos as $wp): ?>
      <figure class="sp-gallery-item">
        <?php echo p1_picture($wp[0], $wp[1], ['sizes' => '(max-width: 700px) 100vw, 40vw', 'width' => 640, 'height' => 480, 'decoding' => 'async']); ?>
        <figcaption><?php echo htmlspecialchars($wp[1]); ?></figcaption>
      </figure>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ═══════════════════ OTHER SERVICES ═══════════════════ -->
<section class="section">
  <div class="container-wide">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">What We Do</span>
      <h2>What else can A&amp;S handle on your home?</h2>
      <p class="hero-answer">Gutters are one trade under one licensed roof. A&amp;S Contracting Services installs the whole roofline as a system, so the soffit, fascia, and roof that tie into your gutters are handled by the same accountable crew across Warrenton and Warren County.</p>
    </div>
    <div class="sp-other">
      <?php
      $otherSlugs = ['soffit', 'fascia', 'roofing'];
      $tintCycle  = [1, 2, 3];
      $otherIcons = ['soffit' => 'wind', 'fascia' => 'ruler', 'roofing' => 'home'];
      foreach ($otherSlugs as $oi => $os):
        $osvc = null; foreach ($services as $s) { if ($s['slug'] === $os) { $osvc = $s; break; } }
        if (!$osvc) continue;
      ?>
      <article class="service-card-with-image card-tint-<?php echo $tintCycle[$oi % 3]; ?> reveal-up reveal-delay-<?php echo ($oi % 3) + 1; ?>">
        <div class="service-card__body">
          <div class="service-card__icon"><?php echo icon($otherIcons[$os] ?? 'check-circle', 22); ?></div>
          <h3><?php echo htmlspecialchars($osvc['name']); ?></h3>
          <p class="service-card__desc"><?php echo htmlspecialchars($osvc['description']); ?></p>
          <a href="/services/<?php echo $os; ?>/" class="service-card__cta">Learn more</a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ═══════════════════ FINAL CTA / ESTIMATE ═══════════════════ -->
<section class="section section--light" id="estimate" aria-label="Request your free gutter estimate">
  <div class="container">
    <div class="estimate">
      <div class="card reveal-up" style="padding: clamp(1.5rem, 4vw, 2.5rem); border:1px solid var(--color-line); border-radius: var(--radius-lg); background: var(--color-surface);">
        <span class="eyebrow-label">Free Estimate</span>
        <h2>Ready to keep water away from your foundation?</h2>
        <p class="lead" style="margin-bottom: 1.25rem;">Send the details and A&amp;S Contracting Services will reply the same day to schedule your free on-site gutter measurement.</p>

        <form action="<?php echo htmlspecialchars($formAction); ?>" method="POST" class="estimate-form">
          <input type="text" name="_honey" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true">
          <input type="hidden" name="_next" value="<?php echo htmlspecialchars($siteUrl); ?>/thank-you">
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
                <?php foreach ($services as $estSvc): ?>
                <option value="<?php echo htmlspecialchars($estSvc['name']); ?>"<?php echo $estSvc['slug'] === $serviceSlug ? ' selected' : ''; ?>><?php echo htmlspecialchars($estSvc['name']); ?></option>
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
        <h2>What happens after you <span class="text-accent">request your estimate</span>?</h2>
        <ol class="next-steps">
          <li><strong>We reach out the same day.</strong> A&amp;S Contracting Services confirms the details and schedules your free on-site gutter measurement.</li>
          <li><strong>You get a written estimate.</strong> Clear scope—run length, downspouts, guards, timeline, and price.</li>
          <li><strong>One crew does the work.</strong> The same self-performing team forms, hangs, and tests your seamless gutters.</li>
        </ol>
        <div class="nap">
          <div><?php echo icon('phone', 18); ?> <a href="tel:<?php echo $phoneTel; ?>"><?php echo $phone; ?></a></div>
          <div><?php echo icon('mail', 18); ?> <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></div>
          <div><?php echo icon('map-pin', 18); ?> <span><?php echo $addressCity; ?>, <?php echo $addressState; ?> <?php echo $addressZip; ?></span></div>
          <div><?php echo icon('clock', 18); ?> <span><?php echo htmlspecialchars($businessHours); ?></span></div>
        </div>
        <p style="margin-top:1rem; color: var(--color-muted); font-size: .95rem;">Gutters across Warrenton, Wright City, Foristell, Wentzville, Troy, Jonesburg, Washington and everywhere within <?php echo $serviceRadius; ?> miles.</p>
      </div>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
