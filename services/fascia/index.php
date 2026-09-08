<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ─── Page-level setup ───────────────────────────────────────────────────────
$serviceSlug     = 'fascia';
$pageType        = 'service';
$currentPage     = 'services';
$svcName         = 'Fascia';
$pageTitle       = 'Fascia in Warrenton, MO';
$pageDescription = 'Fascia board replacement and aluminum wrap in Warrenton, MO. A&S Contracting Services rebuilds rotted rooflines and re-hangs gutters level across Warren County. Free written estimates.';
$canonicalUrl    = $siteUrl . '/services/fascia/';

// ─── FAQ (service-specific) ─────────────────────────────────────────────────
$faqs = [
    [
        'question' => 'What exactly is fascia and why does it matter?',
        'answer'   => 'Fascia is the long board that runs along the roof edge, capping the ends of the rafter tails and carrying your gutters. A&S Contracting Services replaces it because when fascia rots, the gutters have nothing solid to hang on and water works its way back toward the roof deck and soffit. A straight, sound fascia is what keeps the whole roof edge sealed.',
    ],
    [
        'question' => 'How much does fascia replacement cost in Warrenton?',
        'answer'   => 'Fascia cost depends on how many linear feet need replacing, how much sub-fascia lumber has rotted, and whether the gutters come down and go back up. A&S Contracting Services prices every fascia job from an on-site measurement and gives you a written estimate, so you are paying for the footage you actually have—not a phone guess.',
    ],
    [
        'question' => 'Do I need to replace my soffit and gutters at the same time?',
        'answer'   => 'Often, yes. A&S Contracting Services treats fascia, soffit, and gutters as one roof-edge system, because water that rots the fascia usually reaches the soffit too, and the gutters have to come off either way. Doing them together means one straight, sealed edge instead of new board bolted to failing trim.',
    ],
    [
        'question' => 'Can you just wrap the fascia in aluminum without replacing the board?',
        'answer'   => 'Only if the wood underneath is still sound. A&S Contracting Services will not cap over rotted board—wrapping trapped, soft wood in aluminum just hides the decay while it spreads. When the lumber is solid, aluminum capping gives you a clean, color-matched, no-paint finish that holds up to Missouri weather for years.',
    ],
    [
        'question' => 'How long does a fascia and gutter job take?',
        'answer'   => 'Most single-family fascia and gutter jobs around Warrenton take one to two days, depending on the amount of rotted lumber found once the old board comes off. A&S Contracting Services runs its own crew, so the same people remove the old fascia, rebuild it, wrap it, and re-hang your gutters without waiting on a subcontractor.',
    ],
    [
        'question' => 'Are you licensed and insured for fascia work in Missouri?',
        'answer'   => 'Yes. A&S Contracting Services is a licensed Missouri general contractor and carries full insurance on every job, including work along the roof edge. That matters on fascia, where the crew is up on ladders and the roofline is open—your home and your property stay protected from the first board to the final cleanup.',
    ],
];

// ─── Schema (Service + FAQPage + BreadcrumbList) ─────────────────────────────
$serviceSchema = [
    '@context'    => 'https://schema.org',
    '@type'       => 'Service',
    '@id'         => $canonicalUrl . '#service-' . $serviceSlug,
    'name'        => 'Fascia',
    'serviceType' => 'Fascia installation',
    'description' => 'Fascia board replacement, rotted sub-fascia repair, and color-matched aluminum wrap in Warrenton, MO and Warren County, including gutter removal and re-hanging as part of the roof-edge system.',
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
        <span class="eyebrow">Fascia &middot; Warrenton &amp; Warren County</span>
        <h1>Fascia in <span class="text-accent">Warrenton, MO</span> — board replacement &amp; aluminum wrap</h1>
        <p class="hero-answer">A&amp;S Contracting Services is a licensed, insured Warrenton contractor that replaces rotted fascia board, wraps it in maintenance-free aluminum, and re-hangs your gutters level—restoring the straight roofline that caps every rafter tail across Warren County. One crew handles the whole roof edge, start to finish.</p>
        <div class="hero-actions">
          <a href="#estimate" class="btn btn-primary btn-lg hero-form-open">Get a free fascia estimate</a>
          <a class="link-call" href="tel:<?php echo $phoneTel; ?>"><?php echo icon('phone', 18); ?> or call <?php echo $phone; ?></a>
        </div>
        <ul class="hero-chips">
          <li><?php echo icon('shield-check', 16); ?> Licensed &amp; insured in Missouri</li>
          <li><?php echo icon('ruler', 16); ?> Color-matched aluminum capping</li>
          <li><?php echo icon('layers', 16); ?> Fascia, soffit &amp; gutters as one system</li>
        </ul>
      </div>

      <aside class="hero-form-card" id="hero-form">
        <h2>Want a free fascia estimate?</h2>
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
        <h2>How do you know your Warrenton fascia is failing?</h2>
        <p class="answer-block">A&amp;S Contracting Services looks for soft or rotted fascia boards, paint peeling off the trim behind your gutters, gutters sagging or pulling away from the house, dark water stains running down the fascia, and woodpecker or pest holes. Any one of these means water is getting behind the board and rotting the wood that holds your gutters.</p>
        <p class="pull-quote">By the time paint peels, the board behind it is usually already gone—the finish fails last, not first.</p>
      </div>
      <div class="sp-signs reveal-right">
        <div class="sp-sign">
          <div class="sp-sign__icon"><?php echo icon('droplets', 22); ?></div>
          <h3>Soft, rotted board</h3>
          <p>Spongy fascia behind the gutters means water has soaked into the wood.</p>
        </div>
        <div class="sp-sign">
          <div class="sp-sign__icon"><?php echo icon('paint-bucket', 22); ?></div>
          <h3>Peeling, blistered paint</h3>
          <p>Paint that will not hold is the first sign the board underneath is going.</p>
        </div>
        <div class="sp-sign">
          <div class="sp-sign__icon"><?php echo icon('waves', 22); ?></div>
          <h3>Sagging gutters</h3>
          <p>Gutters pulling loose or drooping have nothing solid left to fasten to.</p>
        </div>
        <div class="sp-sign">
          <div class="sp-sign__icon"><?php echo icon('leaf', 22); ?></div>
          <h3>Pest &amp; woodpecker holes</h3>
          <p>Holes and gnaw marks let insects and water straight into the rafter tails.</p>
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
        <div class="sp-position__stat">0<span>repaints—aluminum-wrapped fascia never needs scraping or painting again</span></div>
      </div>
      <div class="reveal-right">
        <span class="eyebrow-label">Why It Matters</span>
        <h2>What makes A&amp;S the right crew for your roofline?</h2>
        <p class="answer-block">A&amp;S Contracting Services treats the fascia, soffit, and gutters as one roof-edge system instead of three separate patch jobs. Because the same crew removes the failing gutters, replaces the rotted lumber, and caps it in color-matched aluminum, the finished edge stays straight, sealed, and watertight—no open seams left for the next contractor to blame.</p>
        <ul class="sp-evidence">
          <li><?php echo icon('users', 22); ?><span><b>One accountable crew.</b> The same team pulls the gutters, rebuilds the board, and re-hangs everything—so the roofline lines up when the job is done.</span></li>
          <li><?php echo icon('ruler', 22); ?><span><b>Color-matched capping.</b> Aluminum wrap is cut and bent to your board and matched to the trim, giving a clean, maintenance-free finish.</span></li>
          <li><?php echo icon('shield-check', 22); ?><span><b>Licensed &amp; fully insured.</b> Ladder work along an open roof edge is covered, so your home and property stay protected.</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════ SERVICE BREAKDOWN ═══════════════════ -->
<section class="section section--light">
  <div class="container">
    <span class="eyebrow-label">The Work</span>
    <h2>What&rsquo;s included in an A&amp;S fascia replacement?</h2>
    <p class="answer-block">A&amp;S Contracting Services delivers a complete roof-edge rebuild: we take down the failing gutters, tear off the rotted fascia and any soft sub-fascia lumber, install fresh board, wrap it in color-matched aluminum capping, re-hang the gutters dead level, and seal every seam. You end up with a clean, straight, maintenance-free edge across your Warrenton home.</p>
    <div class="sp-included">
      <div class="reveal-up">
        <h3>Included in the scope</h3>
        <ul class="sp-checklist">
          <li><?php echo icon('check', 20); ?> Remove damaged fascia and failing gutters as needed</li>
          <li><?php echo icon('check', 20); ?> Replace rotted sub-fascia and rafter-tail lumber</li>
          <li><?php echo icon('check', 20); ?> Install new fascia board, straight and true</li>
          <li><?php echo icon('check', 20); ?> Color-matched aluminum wrap for a no-paint finish</li>
          <li><?php echo icon('check', 20); ?> Re-hang gutters level with proper slope to the downspouts</li>
          <li><?php echo icon('check', 20); ?> Seal every seam and joint against water intrusion</li>
          <li><?php echo icon('check', 20); ?> Full cleanup and haul-away of old material</li>
        </ul>
      </div>
      <div class="reveal-right">
        <h3>How the project runs</h3>
        <ol class="process-steps">
          <li><b>Free inspection</b><span>We check the fascia, soffit, and gutter line and show you where the rot is on site.</span></li>
          <li><b>Written estimate</b><span>You get an itemized quote by the linear foot—materials, timeline, and price, no surprises.</span></li>
          <li><b>Remove &amp; rebuild</b><span>Old gutters and rotted board come off; we replace any soft sub-fascia lumber.</span></li>
          <li><b>Wrap &amp; re-hang</b><span>Fresh board is capped in aluminum, gutters go back up level, and the site is cleaned.</span></li>
        </ol>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════ PROOF / REVIEWS ═══════════════════ -->
<section class="section reviews-section edge-wave-top" aria-label="Fascia reviews">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container-wide">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">In Their Words</span>
      <h2>What do Warren County homeowners say about our roofline work?</h2>
      <p>Real reviews from A&amp;S Contracting Services fascia, soffit, and gutter customers across Warren County.</p>
    </div>
    <div class="reviews-track">
      <?php
      $fasciaReviews = array_filter($reviews, function ($r) { return in_array($r['author'], ['Diane L.', 'Marcus H.', 'Jennifer K.']); });
      foreach ($fasciaReviews as $rev):
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
      <span class="badge-strip"><?php echo icon('ruler', 16); ?> Color-Matched Capping</span>
    </div>
  </div>
</section>

<!-- ═══════════════════ COMPARISON ═══════════════════ -->
<section class="section">
  <div class="container">
    <span class="eyebrow-label">The Difference</span>
    <h2>Why replace the fascia instead of painting over it?</h2>
    <p class="answer-block">A&amp;S Contracting Services sees it every year: fresh paint slapped over a board that crumbles again within a season. Painting or spot-patching hides the rot; it does not stop it. Replacing the board and wrapping it in aluminum fixes the cause, so your gutters finally have something solid to hang on for good.</p>
    <div class="sp-compare">
      <div class="sp-compare__col sp-compare--them">
        <h3><?php echo icon('x', 20); ?> Paint-and-patch shortcuts</h3>
        <ul>
          <li><?php echo icon('minus', 18); ?> Fresh paint brushed over soft, rotted wood</li>
          <li><?php echo icon('minus', 18); ?> Spot-patched boards that rot again next season</li>
          <li><?php echo icon('minus', 18); ?> Gutters re-hung on failing lumber</li>
          <li><?php echo icon('minus', 18); ?> Seams left open for water to creep back in</li>
        </ul>
      </div>
      <div class="sp-compare__col sp-compare--us">
        <h3><?php echo icon('check-circle', 20); ?> A&amp;S Contracting Services</h3>
        <ul>
          <li><?php echo icon('check', 18); ?> Rotted lumber removed, not painted over</li>
          <li><?php echo icon('check', 18); ?> Solid new board wrapped in maintenance-free aluminum</li>
          <li><?php echo icon('check', 18); ?> Gutters re-hung level on sound wood</li>
          <li><?php echo icon('check', 18); ?> Every seam sealed against Missouri weather</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════ FAQ ═══════════════════ -->
<section class="section section--light" aria-label="Fascia FAQ">
  <div class="container-narrow">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Good Questions</span>
      <h2>Still have questions about your fascia?</h2>
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
      <h2>What else can A&amp;S handle along your roofline?</h2>
      <p class="hero-answer">Fascia is one piece of the roof edge. A&amp;S Contracting Services also self-performs the soffit, gutters, and roofing that finish and protect the top of your Warrenton home—one licensed crew for the whole edge.</p>
    </div>
    <div class="sp-other">
      <?php
      $otherSlugs = ['soffit', 'gutters', 'roofing'];
      $tintCycle  = [1, 2, 3];
      $otherIcons = ['soffit' => 'layers', 'gutters' => 'droplets', 'roofing' => 'home'];
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
<section class="section section--light" id="estimate" aria-label="Request your free fascia estimate">
  <div class="container">
    <div class="estimate">
      <div class="card reveal-up" style="padding: clamp(1.5rem, 4vw, 2.5rem); border:1px solid var(--color-line); border-radius: var(--radius-lg); background: var(--color-surface);">
        <span class="eyebrow-label">Free Estimate</span>
        <h2>Ready to fix a sagging, rotted roofline?</h2>
        <p class="lead" style="margin-bottom: 1.25rem;">Send the details and A&amp;S Contracting Services will reply the same day to schedule your free on-site fascia inspection.</p>

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
        <h2>What happens after you send the <span class="text-accent">details</span>?</h2>
        <ol class="next-steps">
          <li><strong>We reach out the same day.</strong> A&amp;S Contracting Services confirms the details and schedules your free on-site fascia inspection.</li>
          <li><strong>You get a written estimate.</strong> Clear scope, materials, timeline, and price—by the linear foot, with no surprises.</li>
          <li><strong>One crew does the work.</strong> The same self-performing team removes the old board, rebuilds it, and re-hangs your gutters level.</li>
        </ol>
        <div class="nap">
          <div><?php echo icon('phone', 18); ?> <a href="tel:<?php echo $phoneTel; ?>"><?php echo $phone; ?></a></div>
          <div><?php echo icon('mail', 18); ?> <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></div>
          <div><?php echo icon('map-pin', 18); ?> <span><?php echo $addressCity; ?>, <?php echo $addressState; ?> <?php echo $addressZip; ?></span></div>
          <div><?php echo icon('clock', 18); ?> <span><?php echo htmlspecialchars($businessHours); ?></span></div>
        </div>
        <p style="margin-top:1rem; color: var(--color-muted); font-size: .95rem;">Fascia and roofline work across Warrenton, Wright City, Foristell, Wentzville, Troy, Jonesburg, Washington and everywhere within <?php echo $serviceRadius; ?> miles.</p>
      </div>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
