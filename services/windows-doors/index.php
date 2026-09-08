<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ─── Page-level setup ───────────────────────────────────────────────────────
$serviceSlug     = 'windows-doors';
$pageType        = 'service';
$currentPage     = 'services';
$svcName         = 'Windows & Doors';
$pageTitle       = 'Windows & Doors in Warrenton, MO';
$pageDescription = 'Window and door replacement in Warrenton, MO. A&S Contracting Services installs energy-efficient windows and doors—flashed, sealed, and self-performed across Warren County. Free written estimates.';
$canonicalUrl    = $siteUrl . '/services/windows-doors/';

// ─── FAQ (service-specific) ─────────────────────────────────────────────────
$faqs = [
    [
        'question' => 'Are replacement windows really worth the cost?',
        'answer'   => 'For most Warrenton homes with drafty or fogged windows, yes. A&S Contracting Services installs Low-E double-pane units that cut the drafts driving your heating and cooling bills up through Missouri winters and summers. Beyond the energy savings, sealed windows that open and lock easily add real comfort and resale value—and a proper install is what makes those savings actually show up.',
    ],
    [
        'question' => 'What does it cost to replace windows in Warrenton?',
        'answer'   => 'Window cost depends on the number of openings, the style and glass package, and whether any rotted framing or sills need repair. A&S Contracting Services measures every opening on site and gives you a written, itemized estimate, so you know the count and the price before any old window comes out—no round-number phone quotes.',
    ],
    [
        'question' => 'Can you replace an entry or patio door too?',
        'answer'   => 'Yes. A&S Contracting Services installs exterior entry doors, sliding and patio doors, and storm doors along with windows. Doors take the same care as a window—square framing, proper flashing, shimming, and a weather-tight seal—so they swing true, latch cleanly, and keep drafts and rain out of your Warren County home.',
    ],
    [
        'question' => 'What kind of glass do you install?',
        'answer'   => 'A&S Contracting Services installs energy-efficient Low-E double-pane glass on most window replacements, in double-hung, casement, slider, and picture styles. The Low-E coating reflects heat back where you want it—out in summer, in during winter—which is exactly what a Missouri climate with hot Julys and cold Januarys demands.',
    ],
    [
        'question' => 'How long does a window replacement take?',
        'answer'   => 'Most whole-house window replacements around Warrenton take one to two days once the units arrive, depending on the number of openings and any framing repairs. A&S Contracting Services runs its own crew, so the same installers pull the old windows, prep the openings, and finish the trim—your home is not left open to the weather overnight.',
    ],
    [
        'question' => 'Do you handle the trim and cleanup after install?',
        'answer'   => 'Yes. A&S Contracting Services finishes the interior and exterior trim, seals and caulks every opening, hauls away the old windows and doors, and cleans up the work area before leaving. A window job is not done when the glass is in—it is done when the opening is trimmed, sealed, and the site is left clean.',
    ],
];

// ─── Schema (Service + FAQPage + BreadcrumbList) ─────────────────────────────
$serviceSchema = [
    '@context'    => 'https://schema.org',
    '@type'       => 'Service',
    '@id'         => $canonicalUrl . '#service-' . $serviceSlug,
    'name'        => 'Windows & Doors',
    'serviceType' => 'Window installation',
    'description' => 'Energy-efficient replacement window and exterior door installation in Warrenton, MO and Warren County, including precise measurement, flashing, insulating, sealing, and interior and exterior trim.',
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
        <li><a href="/services/">Services</a></li>
        <li class="breadcrumb-sep" aria-hidden="true">/</li>
        <li aria-current="page"><?php echo $svcName; ?></li>
      </ol>
    </nav>
    <div class="hero-grid hero-grid--form">
      <div class="hero-copy">
        <span class="eyebrow">Windows &amp; Doors &middot; Warrenton &amp; Warren County</span>
        <h1>Windows &amp; Doors in <span class="text-accent">Warrenton, MO</span> — energy-efficient replacements</h1>
        <p class="hero-answer">A&amp;S Contracting Services is a licensed, insured Warrenton contractor that replaces drafty windows and worn doors with energy-efficient Low-E units—measured, flashed, foamed, and sealed weather-tight by our own crew across Warren County. Every opening is done right, not just dropped in.</p>
        <div class="hero-actions">
          <a href="#estimate" class="btn btn-primary btn-lg hero-form-open">Get a free windows &amp; doors estimate</a>
          <a class="link-call" href="tel:<?php echo $phoneTel; ?>"><?php echo icon('phone', 18); ?> or call <?php echo $phone; ?></a>
        </div>
        <ul class="hero-chips">
          <li><?php echo icon('shield-check', 16); ?> Licensed &amp; insured in Missouri</li>
          <li><?php echo icon('sun', 16); ?> Low-E double-pane efficiency</li>
          <li><?php echo icon('users', 16); ?> Self-performed &mdash; no subcontractors</li>
        </ul>
      </div>

      <aside class="hero-form-card" id="hero-form">
        <h2>Want a free windows &amp; doors estimate?</h2>
        <p class="hero-form-tagline">No obligation. Same-day reply.</p>
        <form action="<?php echo htmlspecialchars($formAction); ?>" method="POST" class="hero-form">
          <input type="hidden" name="_next" value="<?php echo htmlspecialchars($siteUrl); ?>/thank-you">
          <input type="hidden" name="_captcha" value="false">
          <input type="hidden" name="_template" value="table">
          <input type="hidden" name="_subject" value="New windows &amp; doors estimate request from <?php echo htmlspecialchars($siteName); ?>">
          <input type="hidden" name="_cc" value="CustomerService@pageoneinsights.com">
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
        <h2>How do you know it&rsquo;s time to replace your windows?</h2>
        <p class="answer-block">A&amp;S Contracting Services watches for drafts and cold spots near the glass, fog trapped between the panes, windows painted or swelled shut, and heating and cooling bills that keep climbing. Rot around the frames and sills or rattling in the wind are the final tells that a window has lost its seal and its grip on the opening.</p>
        <p class="pull-quote">A window that fogs from the inside is not dirty—its sealed glass unit has already failed.</p>
      </div>
      <div class="sp-signs reveal-right">
        <div class="sp-sign">
          <div class="sp-sign__icon"><?php echo icon('wind', 22); ?></div>
          <h3>Drafts &amp; cold spots</h3>
          <p>Air leaking around the sash means the seal and weatherstripping are worn out.</p>
        </div>
        <div class="sp-sign">
          <div class="sp-sign__icon"><?php echo icon('droplets', 22); ?></div>
          <h3>Fog between the panes</h3>
          <p>Moisture trapped between the glass means the insulated seal has failed.</p>
        </div>
        <div class="sp-sign">
          <div class="sp-sign__icon"><?php echo icon('wrench', 22); ?></div>
          <h3>Painted or swelled shut</h3>
          <p>Windows that will not open have swelled, warped, or been painted into the frame.</p>
        </div>
        <div class="sp-sign">
          <div class="sp-sign__icon"><?php echo icon('flame', 22); ?></div>
          <h3>Climbing energy bills</h3>
          <p>Single-pane and leaky windows push your furnace and AC to run overtime.</p>
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
        <div class="sp-position__stat">100%<span>of the rough opening flashed, insulated, and sealed—no gaps left for drafts or water</span></div>
      </div>
      <div class="reveal-right">
        <span class="eyebrow-label">Why It Matters</span>
        <h2>What makes A&amp;S window installs actually last?</h2>
        <p class="answer-block">A&amp;S Contracting Services measures each opening, removes the old unit, and inspects the rough frame before a new window ever goes in. We shim it dead level, flash it, foam the gaps, and seal it inside and out. A window is only as good as its install—and we self-perform every one instead of subcontracting it out.</p>
        <ul class="sp-evidence">
          <li><?php echo icon('pencil-ruler', 22); ?><span><b>Measured to the opening.</b> Every window and door is sized to its actual frame, so it sets square and operates smoothly.</span></li>
          <li><?php echo icon('users', 22); ?><span><b>One crew, no subs.</b> The same installers pull the old units and finish the new ones, so nothing gets lost in a handoff.</span></li>
          <li><?php echo icon('shield-check', 22); ?><span><b>Licensed &amp; fully insured.</b> Your home is open to the weather during install—our coverage protects it the whole way.</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════ SERVICE BREAKDOWN ═══════════════════ -->
<section class="section section--light">
  <div class="container">
    <span class="eyebrow-label">The Work</span>
    <h2>What&rsquo;s included in an A&amp;S window &amp; door installation?</h2>
    <p class="answer-block">A&amp;S Contracting Services handles the full replacement: precise measurement, removal of the old units, inspection and repair of the rough opening, level setting and shimming, flashing, foam insulation of the gaps, interior and exterior trim, and haul-away. Your new windows and doors go in weather-tight and finished across your Warrenton home, not just dropped in the hole.</p>
    <div class="sp-included">
      <div class="reveal-up">
        <h3>Included in the scope</h3>
        <ul class="sp-checklist">
          <li><?php echo icon('check', 20); ?> Precise measure of every window and door opening</li>
          <li><?php echo icon('check', 20); ?> Remove old units and haul them away</li>
          <li><?php echo icon('check', 20); ?> Inspect and repair the rough opening and sill</li>
          <li><?php echo icon('check', 20); ?> Set level and shim for smooth, square operation</li>
          <li><?php echo icon('check', 20); ?> Flash and seal against wind-driven Missouri rain</li>
          <li><?php echo icon('check', 20); ?> Foam-insulate the gaps around the frame</li>
          <li><?php echo icon('check', 20); ?> Interior and exterior trim to finish the opening</li>
        </ul>
      </div>
      <div class="reveal-right">
        <h3>How the project runs</h3>
        <ol class="process-steps">
          <li><b>Measure &amp; quote</b><span>We measure every opening on site and review styles, glass, and door options with you.</span></li>
          <li><b>Written estimate</b><span>You get an itemized quote—units, count, timeline, and price, in writing.</span></li>
          <li><b>Remove &amp; prep</b><span>Old windows and doors come out and the rough openings are checked and repaired.</span></li>
          <li><b>Set, seal &amp; trim</b><span>New units are shimmed level, flashed, foamed, trimmed, and the site is cleaned.</span></li>
        </ol>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════ PROOF / REVIEWS ═══════════════════ -->
<section class="section reviews-section edge-wave-top" aria-label="Windows and doors reviews">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container-wide">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">In Their Words</span>
      <h2>What do Warrenton homeowners say about working with A&amp;S?</h2>
      <p>Real reviews from A&amp;S Contracting Services customers across Warrenton and Warren County.</p>
    </div>
    <div class="reviews-track">
      <?php
      $windowReviews = array_filter($reviews, function ($r) { return in_array($r['author'], ['Jennifer K.', 'Robert T.', 'Diane L.']); });
      foreach ($windowReviews as $rev):
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
      <span class="badge-strip"><?php echo icon('sun', 16); ?> Energy-Efficient Glass</span>
    </div>
  </div>
</section>

<!-- ═══════════════════ COMPARISON ═══════════════════ -->
<section class="section">
  <div class="container">
    <span class="eyebrow-label">The Difference</span>
    <h2>Why not just buy windows from a big-box store?</h2>
    <p class="answer-block">A&amp;S Contracting Services often gets called to fix big-box window jobs where the install was farmed out to a rotating subcontractor. The glass may be fine; the leak comes from an opening that was never flashed or sealed right. We measure, install, and seal every unit ourselves, so the warranty and the weather-seal both hold up.</p>
    <div class="sp-compare">
      <div class="sp-compare__col sp-compare--them">
        <h3><?php echo icon('x', 20); ?> Big-box subcontracted installs</h3>
        <ul>
          <li><?php echo icon('minus', 18); ?> Builder-grade units and a rotating install crew</li>
          <li><?php echo icon('minus', 18); ?> Install subcontracted to the lowest bidder</li>
          <li><?php echo icon('minus', 18); ?> Gaps foamed over without proper flashing</li>
          <li><?php echo icon('minus', 18); ?> No one accountable when a draft or leak shows up</li>
        </ul>
      </div>
      <div class="sp-compare__col sp-compare--us">
        <h3><?php echo icon('check-circle', 20); ?> A&amp;S Contracting Services</h3>
        <ul>
          <li><?php echo icon('check', 18); ?> Quality units matched to your home and budget</li>
          <li><?php echo icon('check', 18); ?> Measured and installed by our own crew</li>
          <li><?php echo icon('check', 18); ?> Flashed, foamed, and sealed weather-tight</li>
          <li><?php echo icon('check', 18); ?> One local contractor standing behind the work</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════ FAQ ═══════════════════ -->
<section class="section section--light" aria-label="Windows and doors FAQ">
  <div class="container-narrow">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Good Questions</span>
      <h2>Still have questions about windows &amp; doors?</h2>
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

<!-- ═══════════════════ OTHER SERVICES ═══════════════════ -->
<section class="section">
  <div class="container-wide">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">What We Do</span>
      <h2>What else can A&amp;S handle on your home?</h2>
      <p class="hero-answer">New windows and doors often go in alongside other exterior upgrades. A&amp;S Contracting Services also self-performs the siding, exterior work, and roofing that finish the look and seal of your Warrenton home under one licensed roof.</p>
    </div>
    <div class="sp-other">
      <?php
      $otherSlugs = ['siding', 'exterior-work', 'roofing'];
      $tintCycle  = [1, 2, 3];
      $otherIcons = ['siding' => 'layers', 'exterior-work' => 'hammer', 'roofing' => 'home'];
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
<section class="section section--light" id="estimate" aria-label="Request your free windows and doors estimate">
  <div class="container">
    <div class="estimate">
      <div class="card reveal-up" style="padding: clamp(1.5rem, 4vw, 2.5rem); border:1px solid var(--color-line); border-radius: var(--radius-lg); background: var(--color-surface);">
        <span class="eyebrow-label">Free Estimate</span>
        <h2>Ready to close the drafts for good?</h2>
        <p class="lead" style="margin-bottom: 1.25rem;">Send the details and A&amp;S Contracting Services will reply the same day to schedule your free on-site window and door measure.</p>

        <form action="<?php echo htmlspecialchars($formAction); ?>" method="POST" class="estimate-form">
          <input type="text" name="_honey" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true">
          <input type="hidden" name="_next" value="<?php echo htmlspecialchars($siteUrl); ?>/thank-you">
          <input type="hidden" name="_captcha" value="false">
          <input type="hidden" name="_template" value="table">
          <input type="hidden" name="_subject" value="New windows &amp; doors estimate request from <?php echo htmlspecialchars($siteName); ?>">
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

          <button type="submit" class="btn btn-primary btn-lg btn-block">Send my request</button>
        </form>
      </div>

      <div class="reveal-right">
        <span class="eyebrow-label">What Happens Next</span>
        <h2>What happens after you <span class="text-accent">request an estimate</span>?</h2>
        <ol class="next-steps">
          <li><strong>We reach out the same day.</strong> A&amp;S Contracting Services confirms the details and schedules your free on-site window and door measure.</li>
          <li><strong>You get a written estimate.</strong> Clear unit list, glass and door options, timeline, and price—all in writing.</li>
          <li><strong>One crew does the work.</strong> The same self-performing team removes the old units, sets the new ones, and seals every opening.</li>
        </ol>
        <div class="nap">
          <div><?php echo icon('phone', 18); ?> <a href="tel:<?php echo $phoneTel; ?>"><?php echo $phone; ?></a></div>
          <div><?php echo icon('mail', 18); ?> <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></div>
          <div><?php echo icon('map-pin', 18); ?> <span><?php echo $addressCity; ?>, <?php echo $addressState; ?> <?php echo $addressZip; ?></span></div>
          <div><?php echo icon('clock', 18); ?> <span><?php echo htmlspecialchars($businessHours); ?></span></div>
        </div>
        <p style="margin-top:1rem; color: var(--color-muted); font-size: .95rem;">Windows and doors across Warrenton, Wright City, Foristell, Wentzville, Troy, Jonesburg, Washington and everywhere within <?php echo $serviceRadius; ?> miles.</p>
      </div>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
