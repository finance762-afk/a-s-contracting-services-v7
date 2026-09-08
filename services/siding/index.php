<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ─── Page-level setup ───────────────────────────────────────────────────────
$serviceSlug     = 'siding';
$pageType        = 'service';
$currentPage     = 'services';
$svcName         = 'Siding';
$pageTitle       = 'Siding in Warrenton, MO';
$pageDescription = 'Siding contractor in Warrenton, MO. A&S Contracting Services installs and repairs vinyl, insulated, and fiber-cement siding across Warren County—storm panel replacement handled. Free written estimates.';
$canonicalUrl    = $siteUrl . '/services/siding/';

// ─── FAQ (service-specific) ─────────────────────────────────────────────────
$faqs = [
    [
        'question' => 'How much does new siding cost in Warrenton, MO?',
        'answer'   => 'Siding cost in Warrenton depends on the square footage of wall, the material you choose, and whether sheathing under the old siding needs repair. A&S Contracting Services prices every job from a free on-site measurement and a written estimate, so vinyl, insulated vinyl, fiber-cement, or engineered wood each come with a clear number before any work begins.',
    ],
    [
        'question' => 'What siding material holds up best to Missouri weather?',
        'answer'   => 'A&S Contracting Services installs insulated vinyl and fiber-cement most often around Warren County because both shrug off the freeze-thaw swings, summer humidity, and wind-driven rain that punish central Missouri homes. We match the material to your budget and how long you plan to stay, then explain the trade-offs in plain terms instead of pushing the priciest option.',
    ],
    [
        'question' => 'Can you match the siding on my existing house?',
        'answer'   => 'Yes. A&S Contracting Services regularly patches storm-damaged panels and matches profile, color, and texture to blend a repair into the existing wall. When an exact match is discontinued, we tell you honestly and lay out options—replacing one full elevation or the whole house—so the finished exterior looks intentional, not patched.',
    ],
    [
        'question' => 'Do you replace hail and storm-damaged siding through insurance?',
        'answer'   => 'A&S Contracting Services documents cracked, punctured, and wind-torn siding with photos, meets your adjuster on site, and provides an itemized estimate your insurer can process. Warren County hail cracks vinyl and dents metal panels, and clean documentation is what keeps a siding claim moving from inspection to installation.',
    ],
    [
        'question' => 'Will new siding lower my energy bills?',
        'answer'   => 'It can. A&S Contracting Services installs a fresh house wrap and can add rigid insulation board behind insulated vinyl or fiber-cement, cutting the drafts that drive up heating and cooling costs in older Warrenton homes. Sealing penetrations and replacing failed panels stops the air leaks that a coat of paint never fixes.',
    ],
    [
        'question' => 'Are you licensed and insured for siding work in Missouri?',
        'answer'   => 'Yes. A&S Contracting Services is a licensed Missouri general contractor and carries full insurance on every siding job. That protects your home while the old panels come off and the sheathing is exposed, and it means the crew wrapping your house is covered from tear-off to final cleanup.',
    ],
];

// ─── Schema (Service + FAQPage + BreadcrumbList) ─────────────────────────────
$serviceSchema = [
    '@context'    => 'https://schema.org',
    '@type'       => 'Service',
    '@id'         => $canonicalUrl . '#service-' . $serviceSlug,
    'name'        => 'Siding',
    'serviceType' => 'Siding contractor',
    'description' => 'Vinyl, insulated vinyl, fiber-cement, and engineered-wood siding installation and repair in Warrenton, MO and Warren County, including house wrap, trim, and storm-damaged panel replacement.',
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
        <span class="eyebrow">Siding &middot; Warrenton &amp; Warren County</span>
        <h1>Siding in <span class="text-accent">Warrenton, MO</span> — install, repair &amp; storm replacement</h1>
        <p class="hero-answer">A&amp;S Contracting Services is a licensed, insured Warrenton siding contractor that installs and repairs vinyl, insulated vinyl, and fiber-cement siding within 50 miles of Warren County—house wrap, trim, and hail-cracked panels handled by one self-performing crew.</p>
        <div class="hero-actions">
          <a href="#estimate" class="btn btn-primary btn-lg hero-form-open">Get a free siding estimate</a>
          <a class="link-call" href="tel:<?php echo $phoneTel; ?>"><?php echo icon('phone', 18); ?> or call <?php echo $phone; ?></a>
        </div>
        <ul class="hero-chips">
          <li><?php echo icon('shield-check', 16); ?> Licensed &amp; insured in Missouri</li>
          <li><?php echo icon('layers', 16); ?> Vinyl, insulated &amp; fiber-cement</li>
          <li><?php echo icon('users', 16); ?> Self-performed &mdash; no subcontractors</li>
        </ul>
      </div>

      <aside class="hero-form-card" id="hero-form">
        <h2>Free siding estimate</h2>
        <p class="hero-form-tagline">No obligation. Same-day reply.</p>
        <form action="<?php echo htmlspecialchars($formAction); ?>" method="POST" class="hero-form">
          <input type="hidden" name="_next" value="<?php echo htmlspecialchars($siteUrl); ?>/thank-you">
          <input type="hidden" name="_captcha" value="false">
          <input type="hidden" name="_template" value="table">
          <input type="hidden" name="_subject" value="New siding estimate request from <?php echo htmlspecialchars($siteName); ?>">
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
        <h2>How do you know your Warrenton siding is failing?</h2>
        <p class="answer-block">If panels are cracked, warped, or buckling, the paint on wood siding is peeling, or you feel drafts and see energy bills climbing, the exterior skin of your home is losing the battle with Missouri weather. A&amp;S Contracting Services checks for these signs, probes the sheathing behind the panels, and tells you plainly whether a repair or a full re-side is the right call.</p>
        <p class="pull-quote">Siding hides the sheathing that keeps water out of your walls—when it goes, the damage moves inward.</p>
      </div>
      <div class="sp-signs reveal-right">
        <div class="sp-sign">
          <div class="sp-sign__icon"><?php echo icon('layers', 22); ?></div>
          <h3>Cracked or buckled panels</h3>
          <p>Warped and split siding after freeze-thaw and hail lets wind-driven rain slip behind the wall.</p>
        </div>
        <div class="sp-sign">
          <div class="sp-sign__icon"><?php echo icon('sun', 22); ?></div>
          <h3>Chalking &amp; heavy fading</h3>
          <p>A powdery film and blotchy color mean the surface has broken down and no longer sheds water well.</p>
        </div>
        <div class="sp-sign">
          <div class="sp-sign__icon"><?php echo icon('droplets', 22); ?></div>
          <h3>Soft, rotten spots</h3>
          <p>Spongy areas behind the panels signal moisture has reached the sheathing underneath.</p>
        </div>
        <div class="sp-sign">
          <div class="sp-sign__icon"><?php echo icon('wind', 22); ?></div>
          <h3>Drafts &amp; loose panels</h3>
          <p>Rising heating bills and panels that rattle after a storm point to a failed weather barrier.</p>
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
        <div class="sp-position__stat">1<span>local crew that removes the old siding, repairs the sheathing, and wraps your Warrenton home start to finish</span></div>
      </div>
      <div class="reveal-right">
        <span class="eyebrow-label">Why It Matters</span>
        <h2>What makes A&amp;S a siding contractor Warren County homeowners trust?</h2>
        <p class="answer-block">A&amp;S Contracting Services self-performs every re-side it quotes instead of subbing the labor to a big-box installer&rsquo;s rotating crews. The same people who measure your walls and write the estimate strip the old panels, fix the wood underneath, and hang the new siding—so nothing gets covered up and hidden.</p>
        <ul class="sp-evidence">
          <li><?php echo icon('users', 22); ?><span><b>One accountable crew.</b> The same team is on your walls each day, so cut lines, caulking, and cleanup stay consistent.</span></li>
          <li><?php echo icon('shield-check', 22); ?><span><b>House wrap done right.</b> We inspect and replace bad sheathing and install a fresh weather barrier before a single panel goes up.</span></li>
          <li><?php echo icon('clipboard-list', 22); ?><span><b>Documented for insurance.</b> Photo-backed reports and itemized estimates give your adjuster what a hail or wind claim needs.</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════ SERVICE BREAKDOWN ═══════════════════ -->
<section class="section section--light">
  <div class="container">
    <span class="eyebrow-label">The Work</span>
    <h2>What&rsquo;s included in an A&amp;S siding replacement?</h2>
    <p class="answer-block">A&amp;S Contracting Services delivers a full wall system, not just panels: complete tear-off of old siding, inspection and repair of the sheathing, a new weather-resistive house wrap, optional insulation board, new siding with matching trim, corner posts, and J-channel, sealed penetrations, and a clean job site. Every step is documented so you know exactly what went on your Warrenton home.</p>
    <div class="sp-included">
      <div class="reveal-up">
        <h3>Included in the scope</h3>
        <ul class="sp-checklist">
          <li><?php echo icon('check', 20); ?> Full tear-off of the existing siding</li>
          <li><?php echo icon('check', 20); ?> Inspection and replacement of damaged or rotted sheathing</li>
          <li><?php echo icon('check', 20); ?> New house wrap / weather-resistive barrier</li>
          <li><?php echo icon('check', 20); ?> Optional rigid insulation board for added efficiency</li>
          <li><?php echo icon('check', 20); ?> Vinyl, insulated vinyl, fiber-cement, or engineered-wood panels</li>
          <li><?php echo icon('check', 20); ?> Matching trim, corner posts, and J-channel</li>
          <li><?php echo icon('check', 20); ?> Caulk and seal at windows, doors, and penetrations</li>
          <li><?php echo icon('check', 20); ?> Full cleanup and haul-away of the old material</li>
        </ul>
      </div>
      <div class="reveal-right">
        <h3>How the project runs</h3>
        <ol class="process-steps">
          <li><b>Free measurement</b><span>We measure the walls, check the sheathing, and go over material options on site.</span></li>
          <li><b>Written estimate</b><span>You get an itemized quote—material, timeline, and price, insurance-ready if needed.</span></li>
          <li><b>Tear-off &amp; wrap</b><span>Our crew strips the old siding, repairs the wood, and installs a fresh weather barrier.</span></li>
          <li><b>Install &amp; walkthrough</b><span>New panels and trim go on, the site is cleaned, and we review the finished exterior with you.</span></li>
        </ol>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════ PROOF / REVIEWS ═══════════════════ -->
<section class="section reviews-section edge-wave-top" aria-label="Siding reviews">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container-wide">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">In Their Words</span>
      <h2>What do Warrenton homeowners say about our siding?</h2>
      <p>Real reviews from A&amp;S Contracting Services siding and exterior customers across Warren County.</p>
    </div>
    <div class="reviews-track">
      <?php
      $sidingReviews = array_filter($reviews, function ($r) { return in_array($r['author'], ['Jennifer K.', 'Marcus H.', 'Diane L.']); });
      foreach ($sidingReviews as $rev):
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
      <span class="badge-strip"><?php echo icon('layers', 16); ?> Vinyl &amp; Fiber-Cement</span>
    </div>
  </div>
</section>

<!-- ═══════════════════ COMPARISON ═══════════════════ -->
<section class="section">
  <div class="container">
    <span class="eyebrow-label">The Difference</span>
    <h2>Why choose A&amp;S over a big-box siding installer?</h2>
    <p class="answer-block">Big-box home stores sell the siding and then sub the labor out to whichever crew is available that week, with no one accountable when a panel fails. A&amp;S Contracting Services is a local, licensed contractor that measures, tears off, and installs with its own crew—so you deal with the same people who did the work if you ever need them again.</p>
    <div class="sp-compare">
      <div class="sp-compare__col sp-compare--them">
        <h3><?php echo icon('x', 20); ?> Measure-and-sub-out installers</h3>
        <ul>
          <li><?php echo icon('minus', 18); ?> Labor handed to a rotating third-party crew</li>
          <li><?php echo icon('minus', 18); ?> Bad sheathing covered up instead of repaired</li>
          <li><?php echo icon('minus', 18); ?> A call center, not the people on your walls</li>
          <li><?php echo icon('minus', 18); ?> Little accountability once the panels are up</li>
        </ul>
      </div>
      <div class="sp-compare__col sp-compare--us">
        <h3><?php echo icon('check-circle', 20); ?> A&amp;S Contracting Services</h3>
        <ul>
          <li><?php echo icon('check', 18); ?> Warrenton-based and here year after year</li>
          <li><?php echo icon('check', 18); ?> Self-performed by one accountable crew</li>
          <li><?php echo icon('check', 18); ?> Sheathing inspected and repaired, not hidden</li>
          <li><?php echo icon('check', 18); ?> A local number that actually answers</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════ FAQ ═══════════════════ -->
<section class="section section--light" aria-label="Siding FAQ">
  <div class="container-narrow">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Good Questions</span>
      <h2>What do Warrenton homeowners ask before a siding project?</h2>
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
      <p class="hero-answer">Siding is one trade under one licensed roof. A&amp;S Contracting Services also self-performs the rest of the exterior envelope that keeps water off your Warrenton home—so the whole outside of the house is handled by one accountable crew.</p>
    </div>
    <div class="sp-other">
      <?php
      $otherSlugs = ['gutters', 'soffit', 'exterior-work'];
      $tintCycle  = [1, 2, 3];
      $otherIcons = ['gutters' => 'droplets', 'soffit' => 'wind', 'exterior-work' => 'home'];
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
<section class="section section--light" id="estimate" aria-label="Request your free siding estimate">
  <div class="container">
    <div class="estimate">
      <div class="card reveal-up" style="padding: clamp(1.5rem, 4vw, 2.5rem); border:1px solid var(--color-line); border-radius: var(--radius-lg); background: var(--color-surface);">
        <span class="eyebrow-label">Free Estimate</span>
        <h2>Ready for a straight answer on your siding?</h2>
        <p class="lead" style="margin-bottom: 1.25rem;">Send the details and A&amp;S Contracting Services will reply the same day to schedule your free on-site siding inspection.</p>

        <form action="<?php echo htmlspecialchars($formAction); ?>" method="POST" class="estimate-form">
          <input type="text" name="_honey" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true">
          <input type="hidden" name="_next" value="<?php echo htmlspecialchars($siteUrl); ?>/thank-you">
          <input type="hidden" name="_captcha" value="false">
          <input type="hidden" name="_template" value="table">
          <input type="hidden" name="_subject" value="New siding estimate request from <?php echo htmlspecialchars($siteName); ?>">
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
        <h2>What happens after you <span class="text-accent">request your estimate</span>?</h2>
        <ol class="next-steps">
          <li><strong>We reach out the same day.</strong> A&amp;S Contracting Services confirms the details and schedules your free on-site siding inspection.</li>
          <li><strong>You get a written estimate.</strong> Clear scope, material, timeline, and price—insurance-ready if you have storm damage.</li>
          <li><strong>One crew does the work.</strong> The same self-performing team tears off, wraps, and installs your new siding.</li>
        </ol>
        <div class="nap">
          <div><?php echo icon('phone', 18); ?> <a href="tel:<?php echo $phoneTel; ?>"><?php echo $phone; ?></a></div>
          <div><?php echo icon('mail', 18); ?> <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></div>
          <div><?php echo icon('map-pin', 18); ?> <span><?php echo $addressCity; ?>, <?php echo $addressState; ?> <?php echo $addressZip; ?></span></div>
          <div><?php echo icon('clock', 18); ?> <span><?php echo htmlspecialchars($businessHours); ?></span></div>
        </div>
        <p style="margin-top:1rem; color: var(--color-muted); font-size: .95rem;">Siding across Warrenton, Wright City, Foristell, Wentzville, Troy, Jonesburg, Washington and everywhere within <?php echo $serviceRadius; ?> miles.</p>
      </div>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
