<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ─── Page-level setup ───────────────────────────────────────────────────────
$serviceSlug     = 'full-scale-interior-work';
$pageType        = 'service';
$currentPage     = 'services';
$svcName         = 'Full Scale Interior Work';
$pageTitle       = 'Full Scale Interior Work in Warrenton, MO';
$metaDescription = 'Full-scale interior remodeling in Warrenton, MO. A&S Contracting Services self-performs drywall, trim, paint, flooring, and additions across Warren County with one accountable crew. Free written estimates.';
$canonicalUrl    = $siteUrl . '/services/full-scale-interior-work/';

// ─── FAQ (service-specific) ─────────────────────────────────────────────────
$faqs = [
    [
        'question' => 'What counts as full-scale interior work?',
        'answer'   => 'Full-scale interior work means A&S Contracting Services handles every stage inside the home instead of one trade: demolition, framing changes, drywall, trim and finish carpentry, interior doors, flooring, and paint. From a single room refresh to a whole-house renovation or a finished basement, one crew carries the project from bare studs to the final walkthrough.',
    ],
    [
        'question' => 'Can you add a room or finish my basement?',
        'answer'   => 'Yes. A&S Contracting Services builds room additions and finishes basements, framing the new space, running drywall, adding trim and doors, and laying flooring so raw concrete or unused square footage becomes real living space. Because the same crew does every stage, the addition ties into your existing Warrenton home cleanly instead of looking bolted on.',
    ],
    [
        'question' => 'Do you repair storm or water damage inside the house?',
        'answer'   => 'Yes. A&S Contracting Services handles post-storm interior repairs—wet drywall, warped flooring, damaged ceilings, and the finish work to put a room back together after a Missouri storm or a leak. We can rebuild the interior as part of the same project that addresses the roof or exterior that let the water in.',
    ],
    [
        'question' => 'Will my house be livable during the remodel?',
        'answer'   => 'In most cases, yes. A&S Contracting Services protects floors and adjacent rooms, controls dust, and cleans the job site every day, so the rest of your Warrenton home stays usable while we work. For larger renovations we sequence the work room by room and walk you through what to expect before demo starts.',
    ],
    [
        'question' => 'How long does a full interior renovation take?',
        'answer'   => 'Timelines depend on scope—a single room runs days, while a whole-house or addition can run several weeks. A&S Contracting Services gives you a realistic schedule in the written estimate and keeps it because one in-house crew runs every stage; there is no waiting on separate subs to line up their calendars.',
    ],
    [
        'question' => 'Do you handle everything, or do I need to hire other trades?',
        'answer'   => 'A&S Contracting Services handles it all with one accountable crew—demo, framing, drywall, trim, doors, flooring, and paint—so you are not managing a lineup of subcontractors. You have one contractor, one schedule, and one point of contact from the first walkthrough to the final punch list.',
    ],
];

// ─── Schema (Service + FAQPage + BreadcrumbList) ─────────────────────────────
$serviceSchema = [
    '@context'    => 'https://schema.org',
    '@type'       => 'Service',
    '@id'         => $canonicalUrl . '#service-' . $serviceSlug,
    'name'        => 'Full Scale Interior Work',
    'serviceType' => 'Interior remodeling',
    'description' => 'Complete interior renovation in Warrenton, MO and Warren County—drywall, trim and finish carpentry, paint, flooring, room additions, basement finishing, and post-storm interior repair, self-performed by one crew.',
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
        <span class="eyebrow">Interior Remodeling &middot; Warrenton &amp; Warren County</span>
        <h1>Full Scale Interior Work in <span class="text-accent">Warrenton, MO</span> — one crew, every stage</h1>
        <p class="hero-answer">A&amp;S Contracting Services is a licensed, insured Warrenton contractor that runs full interior renovations with one self-performing crew—drywall, trim, paint, flooring, additions, and basement finishing across Warren County. The same team handles demo through final coat, with a clean job site every day.</p>
        <div class="hero-actions">
          <a href="#estimate" class="btn btn-primary btn-lg hero-form-open">Get a free remodel estimate</a>
          <a class="link-call" href="tel:<?php echo $phoneTel; ?>"><?php echo icon('phone', 18); ?> or call <?php echo $phone; ?></a>
        </div>
        <ul class="hero-chips">
          <li><?php echo icon('shield-check', 16); ?> Licensed &amp; insured in Missouri</li>
          <li><?php echo icon('users', 16); ?> One in-house crew, every stage</li>
          <li><?php echo icon('paint-bucket', 16); ?> Drywall to finish carpentry</li>
        </ul>
      </div>

      <aside class="hero-form-card" id="hero-form">
        <h2>Want a free remodel estimate?</h2>
        <p class="hero-form-tagline">No obligation. Same-day reply.</p>
        <form action="<?php echo htmlspecialchars($formAction); ?>" method="POST" class="hero-form">
          <input type="hidden" name="_next" value="<?php echo htmlspecialchars($siteUrl); ?>/thank-you">
          <input type="hidden" name="_captcha" value="false">
          <input type="hidden" name="_template" value="table">
          <input type="hidden" name="_subject" value="New interior remodel estimate request from <?php echo htmlspecialchars($siteName); ?>">
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
        <h2>When is it time for a full interior renovation?</h2>
        <p class="answer-block">A&amp;S Contracting Services hears the same reasons from Warrenton homeowners: a dated, worn interior that no longer fits the family, a need for more space through a room addition, an unfinished basement sitting empty, or storm and water damage that has to be rebuilt inside. Any of those is the moment to bring in one crew for the whole job.</p>
        <p class="pull-quote">The hardest part of a remodel is not the work—it is keeping one team accountable from demo to the final coat.</p>
      </div>
      <div class="sp-signs reveal-right">
        <div class="sp-sign">
          <div class="sp-sign__icon"><?php echo icon('paint-bucket', 22); ?></div>
          <h3>Dated, worn interior</h3>
          <p>Old finishes, tired paint, and rooms that no longer fit how you live.</p>
        </div>
        <div class="sp-sign">
          <div class="sp-sign__icon"><?php echo icon('building', 22); ?></div>
          <h3>Need more space</h3>
          <p>A room addition or bonus room to grow into instead of moving.</p>
        </div>
        <div class="sp-sign">
          <div class="sp-sign__icon"><?php echo icon('layers', 22); ?></div>
          <h3>Unfinished basement</h3>
          <p>Bare concrete and framing waiting to become real living space.</p>
        </div>
        <div class="sp-sign">
          <div class="sp-sign__icon"><?php echo icon('droplets', 22); ?></div>
          <h3>Water or storm damage</h3>
          <p>Wet drywall, warped floors, and ceilings that need rebuilding inside.</p>
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
        <div class="sp-position__stat">1<span>in-house crew handling demo, drywall, trim, paint, and floors—no separate subs to juggle</span></div>
      </div>
      <div class="reveal-right">
        <span class="eyebrow-label">Why It Matters</span>
        <h2>What makes A&amp;S the crew to run your whole remodel?</h2>
        <p class="answer-block">A&amp;S Contracting Services runs your entire interior project with one self-performing crew instead of a lineup of subcontractors you have to chase. The same team that demos the space hangs the drywall, sets the trim, lays the floor, and paints—so there are no gaps between trades and one number to call from start to final walkthrough.</p>
        <ul class="sp-evidence">
          <li><?php echo icon('users', 22); ?><span><b>One in-house crew.</b> Every stage is handled by the same people, so quality and cleanup stay consistent room to room.</span></li>
          <li><?php echo icon('clipboard-list', 22); ?><span><b>One schedule, one contact.</b> No lining up separate trades—there is a single timeline and a single point of accountability.</span></li>
          <li><?php echo icon('shield-check', 22); ?><span><b>Licensed &amp; fully insured.</b> Demo and construction happen inside your home, and our coverage protects it throughout.</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════ SERVICE BREAKDOWN ═══════════════════ -->
<section class="section section--light">
  <div class="container">
    <span class="eyebrow-label">The Work</span>
    <h2>What&rsquo;s included in a full-scale interior renovation?</h2>
    <p class="answer-block">A&amp;S Contracting Services covers every stage of the interior: demolition and protection, framing changes, drywall hang and finish, interior doors, trim and finish carpentry, flooring, and paint—with daily cleanup and dust control the whole way through. One crew carries your Warrenton project from bare studs to the final walkthrough.</p>
    <div class="sp-included">
      <div class="reveal-up">
        <h3>Included in the scope</h3>
        <ul class="sp-checklist">
          <li><?php echo icon('check', 20); ?> Demo and protection of floors, furniture, and adjacent rooms</li>
          <li><?php echo icon('check', 20); ?> Framing changes to open up or reconfigure the layout</li>
          <li><?php echo icon('check', 20); ?> Drywall hang, tape, and smooth finish</li>
          <li><?php echo icon('check', 20); ?> Interior doors, trim, and finish carpentry</li>
          <li><?php echo icon('check', 20); ?> Flooring—laminate, luxury vinyl, tile, or hardwood</li>
          <li><?php echo icon('check', 20); ?> Interior paint, ceilings to baseboards</li>
          <li><?php echo icon('check', 20); ?> Daily cleanup, dust control, and a final walkthrough</li>
        </ul>
      </div>
      <div class="reveal-right">
        <h3>How the project runs</h3>
        <ol class="process-steps">
          <li><b>Walkthrough &amp; plan</b><span>We walk the space with you, talk through the layout, and scope every stage of the work.</span></li>
          <li><b>Written estimate</b><span>You get an itemized quote—scope, materials, timeline, and price, all in writing.</span></li>
          <li><b>Build &amp; finish</b><span>Our crew demos, frames, hangs drywall, and moves through trim, flooring, and paint.</span></li>
          <li><b>Clean &amp; final walkthrough</b><span>The site is cleaned, and we review every finished room with you before we leave.</span></li>
        </ol>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════ PROOF / REVIEWS ═══════════════════ -->
<section class="section reviews-section edge-wave-top" aria-label="Interior remodeling reviews">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container-wide">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">In Their Words</span>
      <h2>What do Warren County homeowners say about our interior work?</h2>
      <p>Real reviews from A&amp;S Contracting Services renovation and interior customers across Warren County.</p>
    </div>
    <div class="reviews-track">
      <?php
      $interiorReviews = array_filter($reviews, function ($r) { return in_array($r['author'], ['Robert T.', 'Jennifer K.', 'Diane L.']); });
      foreach ($interiorReviews as $rev):
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
      <span class="badge-strip"><?php echo icon('users', 16); ?> Self-Performed, No Subs</span>
    </div>
  </div>
</section>

<!-- ═══════════════════ COMPARISON ═══════════════════ -->
<section class="section">
  <div class="container">
    <span class="eyebrow-label">The Difference</span>
    <h2>Why hire one crew instead of juggling subs yourself?</h2>
    <p class="answer-block">A&amp;S Contracting Services becomes the single point of accountability for your whole remodel. When you hire trades separately, a slip by the drywaller pushes the painter, and everyone blames someone else. Because our own crew does demo through paint on one schedule, the timeline holds and there is one contractor answering for the finished room.</p>
    <div class="sp-compare">
      <div class="sp-compare__col sp-compare--them">
        <h3><?php echo icon('x', 20); ?> Juggling separate trades</h3>
        <ul>
          <li><?php echo icon('minus', 18); ?> A different sub for demo, drywall, trim, and paint</li>
          <li><?php echo icon('minus', 18); ?> Schedules that slip when one trade runs late</li>
          <li><?php echo icon('minus', 18); ?> Finger-pointing when something does not line up</li>
          <li><?php echo icon('minus', 18); ?> You end up managing the whole job yourself</li>
        </ul>
      </div>
      <div class="sp-compare__col sp-compare--us">
        <h3><?php echo icon('check-circle', 20); ?> A&amp;S Contracting Services</h3>
        <ul>
          <li><?php echo icon('check', 18); ?> One in-house crew from demo to final coat</li>
          <li><?php echo icon('check', 18); ?> A single schedule that actually holds together</li>
          <li><?php echo icon('check', 18); ?> One contractor accountable for the finished space</li>
          <li><?php echo icon('check', 18); ?> Daily cleanup and dust control in your home</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════ FAQ ═══════════════════ -->
<section class="section section--light" aria-label="Interior remodeling FAQ">
  <div class="container-narrow">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Good Questions</span>
      <h2>Still have questions about your remodel?</h2>
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
      <h2>What else can A&amp;S handle inside your home?</h2>
      <p class="hero-answer">A full remodel touches more than one trade. A&amp;S Contracting Services also self-performs the drywall, window and door work, and exterior projects that round out a renovation across Warrenton and Warren County—all under one licensed crew.</p>
    </div>
    <div class="sp-other">
      <?php
      $otherSlugs = ['dry-wall', 'windows-doors', 'exterior-work'];
      $tintCycle  = [1, 2, 3];
      $otherIcons = ['dry-wall' => 'pencil-ruler', 'windows-doors' => 'building', 'exterior-work' => 'home'];
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
<section class="section section--light" id="estimate" aria-label="Request your free interior remodel estimate">
  <div class="container">
    <div class="estimate">
      <div class="card reveal-up" style="padding: clamp(1.5rem, 4vw, 2.5rem); border:1px solid var(--color-line); border-radius: var(--radius-lg); background: var(--color-surface);">
        <span class="eyebrow-label">Free Estimate</span>
        <h2>Ready to reimagine the inside of your home?</h2>
        <p class="lead" style="margin-bottom: 1.25rem;">Send the details and A&amp;S Contracting Services will reply the same day to schedule your free on-site remodel walkthrough.</p>

        <form action="<?php echo htmlspecialchars($formAction); ?>" method="POST" class="estimate-form">
          <input type="text" name="_honey" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true">
          <input type="hidden" name="_next" value="<?php echo htmlspecialchars($siteUrl); ?>/thank-you">
          <input type="hidden" name="_captcha" value="false">
          <input type="hidden" name="_template" value="table">
          <input type="hidden" name="_subject" value="New interior remodel estimate request from <?php echo htmlspecialchars($siteName); ?>">
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
        <h2>What happens after you send your <span class="text-accent">project details</span>?</h2>
        <ol class="next-steps">
          <li><strong>We reach out the same day.</strong> A&amp;S Contracting Services confirms the details and schedules your free on-site remodel walkthrough.</li>
          <li><strong>You get a written estimate.</strong> Clear scope, materials, timeline, and price for every stage—all in writing.</li>
          <li><strong>One crew does the work.</strong> The same self-performing team runs demo through the final coat, cleaning up every day.</li>
        </ol>
        <div class="nap">
          <div><?php echo icon('phone', 18); ?> <a href="tel:<?php echo $phoneTel; ?>"><?php echo $phone; ?></a></div>
          <div><?php echo icon('mail', 18); ?> <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></div>
          <div><?php echo icon('map-pin', 18); ?> <span><?php echo $addressCity; ?>, <?php echo $addressState; ?> <?php echo $addressZip; ?></span></div>
          <div><?php echo icon('clock', 18); ?> <span><?php echo htmlspecialchars($businessHours); ?></span></div>
        </div>
        <p style="margin-top:1rem; color: var(--color-muted); font-size: .95rem;">Interior renovations across Warrenton, Wright City, Foristell, Wentzville, Troy, Jonesburg, Washington and everywhere within <?php echo $serviceRadius; ?> miles.</p>
      </div>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
