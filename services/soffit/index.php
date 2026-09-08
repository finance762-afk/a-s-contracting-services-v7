<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ─── Page-level setup ───────────────────────────────────────────────────────
$serviceSlug     = 'soffit';
$pageType        = 'service';
$currentPage     = 'services';
$svcName         = 'Soffit';
$pageTitle       = 'Soffit in Warrenton, MO';
$pageDescription = 'Soffit installation in Warrenton, MO. A&S Contracting Services installs and repairs vented soffit across Warren County—attic airflow restored, pests sealed out. Free written estimates.';
$canonicalUrl    = $siteUrl . '/services/soffit/';

// ─── Hero + recent-work photos (image manifest) ─────────────────────────────
$heroImage    = '1779985210676-rimzkx-29-Dec_24__2025_18-22-23-xd3W';
$heroImageAlt = 'Worker installing soffit trim on a two-story Warrenton home by A&S Contracting Services';
$heroPreload  = [
    'srcset' => "/assets/images/{$heroImage}-480.avif 480w, /assets/images/{$heroImage}-960.avif 960w",
    'sizes'  => '100vw',
];
$workPhotos = [
    ['1779984974072-agw64u-4-Aug_06__2025_13-45-27-DRwn', 'Single-story home with tan siding and finished soffit and eaves near Warrenton'],
    ['1779985049352-yx87w1-20-Mar_12__2025_18-21-31-DDFM', 'Home addition with new dark siding and dormers mid-construction in Warren County'],
    ['1779985485739-cy4u83-81-Dec_05__2024_18-25-35-1ywp', 'Completed metal barn with a white metal roof and finished trim in rural Missouri'],
];

// ─── FAQ (service-specific) ─────────────────────────────────────────────────
$faqs = [
    [
        'question' => 'How much does soffit installation cost in Warrenton, MO?',
        'answer'   => 'Soffit cost in Warrenton depends on the linear footage of eave, the material, and how much of the rafter tail or fascia behind it needs repair. A&S Contracting Services measures the roofline and gives a free written estimate, so vented aluminum or vinyl soffit comes with a clear number that accounts for any hidden wood rot before the work starts.',
    ],
    [
        'question' => 'What does soffit actually do for my house?',
        'answer'   => 'A&S Contracting Services installs soffit as the vented underside of your roof overhang, and it does two jobs at once. It pulls fresh air into the attic to balance the ventilation that protects your roof and lowers cooling costs, and it seals the eaves so birds, wasps, and squirrels cannot nest in the roof structure of your Warrenton home.',
    ],
    [
        'question' => 'Why do I need vented soffit for attic airflow?',
        'answer'   => 'A&S Contracting Services installs vented soffit because an attic needs air coming in at the eaves and out at the ridge to stay dry and cool. Without that intake, Missouri summer heat bakes the attic and winter moisture condenses on the decking, shortening the life of the roof above. Solid or clogged soffit chokes that airflow and traps the problem inside.',
    ],
    [
        'question' => 'Can you keep birds and wasps out of my eaves?',
        'answer'   => 'Yes. Sealing pests out of the eaves is one of the most common reasons A&S Contracting Services gets called for soffit work. We remove the failed or gapped panels, close the openings birds and wasps use to get behind the roofline, and install tight, vented soffit that lets air through while keeping nesters out of the overhang.',
    ],
    [
        'question' => 'Should soffit, fascia, and gutters be done together?',
        'answer'   => 'Usually, yes. A&S Contracting Services treats the soffit, fascia, and gutters as one roofline system because they meet at the same edge of the roof. When the fascia is rotted or the gutters have to come down anyway, doing the soffit at the same time means one crew, one setup, and a finished eave that matches instead of a patchwork of repairs.',
    ],
    [
        'question' => 'Are you licensed and insured for soffit work in Missouri?',
        'answer'   => 'Yes. A&S Contracting Services is a licensed Missouri general contractor and carries full insurance on every soffit job. Because working the eaves means ladders and roof-edge access, that coverage protects your home while the same crew that handles your roof, gutters, and fascia restores the overhang.',
    ],
];

// ─── Schema (Service + FAQPage + BreadcrumbList) ─────────────────────────────
$serviceSchema = [
    '@context'    => 'https://schema.org',
    '@type'       => 'Service',
    '@id'         => $canonicalUrl . '#service-' . $serviceSlug,
    'name'        => 'Soffit',
    'serviceType' => 'Soffit installation',
    'description' => 'Vented aluminum and vinyl soffit installation and repair in Warrenton, MO and Warren County—restoring attic ventilation, sealing eaves against pests, and matching the existing roofline.',
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
        <span class="eyebrow">Soffit &middot; Warrenton &amp; Warren County</span>
        <h1>Soffit in <span class="text-accent">Warrenton, MO</span> — vented install, repair &amp; pest sealing</h1>
        <p class="hero-answer">A&amp;S Contracting Services is a licensed, insured Warrenton contractor that installs and repairs vented soffit within 50 miles of Warren County—restoring attic airflow, sealing birds and wasps out of the eaves, and matching your existing roofline with one self-performing crew.</p>
        <div class="hero-actions">
          <a href="#estimate" class="btn btn-primary btn-lg hero-form-open">Get a free soffit estimate</a>
          <a class="link-call" href="tel:<?php echo $phoneTel; ?>"><?php echo icon('phone', 18); ?> or call <?php echo $phone; ?></a>
        </div>
        <ul class="hero-chips">
          <li><?php echo icon('shield-check', 16); ?> Licensed &amp; insured in Missouri</li>
          <li><?php echo icon('wind', 16); ?> Vented for attic airflow</li>
          <li><?php echo icon('users', 16); ?> Self-performed &mdash; no subcontractors</li>
        </ul>
      </div>

      <aside class="hero-form-card" id="hero-form">
        <h2>Free soffit estimate</h2>
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
        <h2>How do you know your Warrenton soffit needs work?</h2>
        <p class="answer-block">If soffit panels are peeling or sagging, birds and wasps are nesting in the eaves, or the attic runs hot and shows mildew, the underside of your roof overhang has stopped doing its job. A&amp;S Contracting Services inspects the eaves and rafter tails, finds where air and pests are getting through, and tells you whether a repair or full soffit replacement is the right move.</p>
        <p class="pull-quote">The soffit is the intake vent for your whole attic—block it, and the roof above starts to cook.</p>
      </div>
      <div class="sp-signs reveal-right">
        <div class="sp-sign">
          <div class="sp-sign__icon"><?php echo icon('layers', 22); ?></div>
          <h3>Peeling or sagging panels</h3>
          <p>Drooping, blistered soffit means water has gotten in and the overhang is coming apart.</p>
        </div>
        <div class="sp-sign">
          <div class="sp-sign__icon"><?php echo icon('leaf', 22); ?></div>
          <h3>Pests in the eaves</h3>
          <p>Birds, wasps, and squirrels nesting overhead have found a gap in the roofline to exploit.</p>
        </div>
        <div class="sp-sign">
          <div class="sp-sign__icon"><?php echo icon('flame', 22); ?></div>
          <h3>Hot, stuffy attic</h3>
          <p>Blocked intake vents choke airflow, so summer heat builds up and drives cooling bills higher.</p>
        </div>
        <div class="sp-sign">
          <div class="sp-sign__icon"><?php echo icon('droplets', 22); ?></div>
          <h3>Attic moisture &amp; rot</h3>
          <p>Mildew on the decking and soft rafter tails point to trapped humidity from poor ventilation.</p>
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
        <div class="sp-position__stat">2<span>jobs done at once—soffit that keeps the attic breathing and seals pests out of your Warrenton eaves</span></div>
      </div>
      <div class="reveal-right">
        <span class="eyebrow-label">Why It Matters</span>
        <h2>What makes A&amp;S a soffit contractor Warren County homeowners trust?</h2>
        <p class="answer-block">A&amp;S Contracting Services treats soffit as part of the whole roofline instead of a cosmetic panel. The same crew that inspects your rafter tails installs vented soffit for proper attic airflow, seals the gaps pests use, and matches the finish—so ventilation and pest control are fixed together, not patched over.</p>
        <ul class="sp-evidence">
          <li><?php echo icon('wind', 22); ?><span><b>Ventilation restored.</b> Vented soffit feeds fresh air to the attic, protecting the roof deck and lowering cooling costs.</span></li>
          <li><?php echo icon('shield-check', 22); ?><span><b>Sealed against pests.</b> We close the openings birds, wasps, and squirrels use to nest in the eaves.</span></li>
          <li><?php echo icon('home', 22); ?><span><b>One roofline system.</b> Soffit, fascia, gutters, and roof handled by the same crew for a finished, matching eave.</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════ SERVICE BREAKDOWN ═══════════════════ -->
<section class="section section--light">
  <div class="container">
    <span class="eyebrow-label">The Work</span>
    <h2>What&rsquo;s included in an A&amp;S soffit installation?</h2>
    <p class="answer-block">A&amp;S Contracting Services delivers a full eave restoration, not just a cover-up: removal of the old soffit, inspection of the rafter tails and lookouts, repair of any hidden rot, vented soffit installed for proper airflow, gaps sealed against pests, a color-matched finish, and a clean job site. Every eave on your Warrenton home breathes and keeps nesters out.</p>
    <div class="sp-included">
      <div class="reveal-up">
        <h3>Included in the scope</h3>
        <ul class="sp-checklist">
          <li><?php echo icon('check', 20); ?> Removal of the old or failing soffit panels</li>
          <li><?php echo icon('check', 20); ?> Inspection of rafter tails and lookouts</li>
          <li><?php echo icon('check', 20); ?> Repair of hidden wood rot at the eaves</li>
          <li><?php echo icon('check', 20); ?> Vented aluminum or vinyl soffit for proper attic airflow</li>
          <li><?php echo icon('check', 20); ?> Gaps sealed against birds, wasps, and squirrels</li>
          <li><?php echo icon('check', 20); ?> Color-matched finish to blend with the existing roofline</li>
          <li><?php echo icon('check', 20); ?> Full cleanup and haul-away of the old material</li>
        </ul>
      </div>
      <div class="reveal-right">
        <h3>How the project runs</h3>
        <ol class="process-steps">
          <li><b>Free inspection</b><span>We check the eaves, rafter tails, and attic ventilation, and go over options on site.</span></li>
          <li><b>Written estimate</b><span>You get an itemized quote—material, timeline, and price, with any rot repair spelled out.</span></li>
          <li><b>Remove &amp; repair</b><span>Our crew pulls the old soffit, fixes the wood underneath, and seals the openings pests use.</span></li>
          <li><b>Install &amp; walkthrough</b><span>Vented soffit goes up, the site is cleaned, and we review the finished eaves with you.</span></li>
        </ol>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════ PROOF / REVIEWS ═══════════════════ -->
<section class="section reviews-section edge-wave-top" aria-label="Soffit reviews">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container-wide">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">In Their Words</span>
      <h2>What do Warrenton homeowners say about our soffit work?</h2>
      <p>Real reviews from A&amp;S Contracting Services soffit, fascia, and roofline customers across Warren County.</p>
    </div>
    <div class="reviews-track">
      <?php
      $soffitReviews = array_filter($reviews, function ($r) { return in_array($r['author'], ['Diane L.', 'Marcus H.', 'Jennifer K.']); });
      foreach ($soffitReviews as $rev):
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
      <span class="badge-strip"><?php echo icon('wind', 16); ?> Attic Ventilation</span>
    </div>
  </div>
</section>

<!-- ═══════════════════ COMPARISON ═══════════════════ -->
<section class="section">
  <div class="container">
    <span class="eyebrow-label">The Difference</span>
    <h2>Why replace failing soffit instead of painting over it?</h2>
    <p class="answer-block">Painting a sagging, pest-chewed soffit hides the problem for a season while the rot and blocked ventilation keep working behind the panel. A&amp;S Contracting Services removes the failed soffit, fixes the wood, and installs vented panels that actually restore airflow and seal the eaves—so the fix lasts instead of peeling off the next humid Missouri summer.</p>
    <div class="sp-compare">
      <div class="sp-compare__col sp-compare--them">
        <h3><?php echo icon('x', 20); ?> Paint-over &amp; patchwork</h3>
        <ul>
          <li><?php echo icon('minus', 18); ?> Rot and moisture hidden under fresh paint</li>
          <li><?php echo icon('minus', 18); ?> Blocked ventilation left choking the attic</li>
          <li><?php echo icon('minus', 18); ?> Pest openings never actually sealed</li>
          <li><?php echo icon('minus', 18); ?> Mismatched patches instead of a finished eave</li>
        </ul>
      </div>
      <div class="sp-compare__col sp-compare--us">
        <h3><?php echo icon('check-circle', 20); ?> A&amp;S Contracting Services</h3>
        <ul>
          <li><?php echo icon('check', 18); ?> Rot repaired before anything goes back up</li>
          <li><?php echo icon('check', 18); ?> Vented soffit that restores real attic airflow</li>
          <li><?php echo icon('check', 18); ?> Eaves sealed tight against birds and wasps</li>
          <li><?php echo icon('check', 18); ?> Color-matched, finished by one local crew</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════ FAQ ═══════════════════ -->
<section class="section section--light" aria-label="Soffit FAQ">
  <div class="container-narrow">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Good Questions</span>
      <h2>What do Warrenton homeowners ask before a soffit project?</h2>
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
<section class="section sp-gallery" aria-label="Recent soffit projects">
  <div class="container-wide">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Recent Work</span>
      <h2>What recent soffit projects has A&amp;S completed near Warrenton?</h2>
      <p class="answer-block">These are real soffit projects A&amp;S Contracting Services self-performed across Warrenton and Warren County&mdash;each one handled start to finish by the same in-house crew, never a subcontractor.</p>
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
      <p class="hero-answer">Soffit is one trade under one licensed roof. A&amp;S Contracting Services installs the full roofline as a system, so the fascia, gutters, and roof that meet your soffit at the eave are handled by the same accountable crew across Warrenton and Warren County.</p>
    </div>
    <div class="sp-other">
      <?php
      $otherSlugs = ['fascia', 'gutters', 'roofing'];
      $tintCycle  = [1, 2, 3];
      $otherIcons = ['fascia' => 'ruler', 'gutters' => 'droplets', 'roofing' => 'home'];
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
<section class="section section--light" id="estimate" aria-label="Request your free soffit estimate">
  <div class="container">
    <div class="estimate">
      <div class="card reveal-up" style="padding: clamp(1.5rem, 4vw, 2.5rem); border:1px solid var(--color-line); border-radius: var(--radius-lg); background: var(--color-surface);">
        <span class="eyebrow-label">Free Estimate</span>
        <h2>Ready to get your eaves breathing again?</h2>
        <p class="lead" style="margin-bottom: 1.25rem;">Send the details and A&amp;S Contracting Services will reply the same day to schedule your free on-site soffit inspection.</p>

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
          <li><strong>We reach out the same day.</strong> A&amp;S Contracting Services confirms the details and schedules your free on-site soffit inspection.</li>
          <li><strong>You get a written estimate.</strong> Clear scope, material, timeline, and price—with any rot repair spelled out up front.</li>
          <li><strong>One crew does the work.</strong> The same self-performing team removes, repairs, and installs your vented soffit.</li>
        </ol>
        <div class="nap">
          <div><?php echo icon('phone', 18); ?> <a href="tel:<?php echo $phoneTel; ?>"><?php echo $phone; ?></a></div>
          <div><?php echo icon('mail', 18); ?> <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></div>
          <div><?php echo icon('map-pin', 18); ?> <span><?php echo $addressCity; ?>, <?php echo $addressState; ?> <?php echo $addressZip; ?></span></div>
          <div><?php echo icon('clock', 18); ?> <span><?php echo htmlspecialchars($businessHours); ?></span></div>
        </div>
        <p style="margin-top:1rem; color: var(--color-muted); font-size: .95rem;">Soffit across Warrenton, Wright City, Foristell, Wentzville, Troy, Jonesburg, Washington and everywhere within <?php echo $serviceRadius; ?> miles.</p>
      </div>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
