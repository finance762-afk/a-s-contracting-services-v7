<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ─── Page-level setup ───────────────────────────────────────────────────────
$serviceSlug     = 'general-contracting';
$pageType        = 'service';
$currentPage     = 'services';
$svcName         = 'General Contracting';
$pageTitle       = 'General Contracting in Warrenton, MO';
$pageDescription = 'General contractor in Warrenton, MO. A&S Contracting Services manages residential and commercial projects end to end across Warren County. Free estimate.';
$canonicalUrl    = $siteUrl . '/services/general-contracting/';

// ─── Hero + recent-work photos (image manifest) ─────────────────────────────
$heroImage    = '1779985082241-xuoxbh-11-Feb_09__2026_15-26-29-L2wD';
$heroImageAlt = 'A&S Contracting Services crew installing a new roof on a residential project near Warrenton, MO';
$heroPreload  = [
    'srcset' => "/assets/images/{$heroImage}-480.avif 480w, /assets/images/{$heroImage}-960.avif 960w",
    'sizes'  => '100vw',
];
$workPhotos = [
    ['1779985138888-d41ths-3-Nov_20__2024_22-50-31-ZRts', 'Gray-sided home with a covered porch and protective wrap during a Warren County build'],
    ['1779985209297-ld8mti-1-Dec_23__2025_13-34-30-gKpa', 'Elevated home with metal siding under construction in a wooded Warren County lot'],
    ['1779985127211-6wrwx6-41-Mar_19__2026_17-08-38-89QF', 'A&S worker on a ladder finishing a wooden overhang on a Warrenton home'],
];

// ─── FAQ (service-specific) ─────────────────────────────────────────────────
$faqs = [
    [
        'question' => 'How much does a general contracting project cost in Warrenton?',
        'answer'   => 'A&S Contracting Services prices each project from its actual scope—the trades involved, materials, permits, and timeline—laid out in a written, itemized estimate. A room addition, a whole renovation, and a commercial build-out are very different numbers, so we scope the work on site rather than quote a general contractor by the square foot over the phone.',
    ],
    [
        'question' => 'Do you handle permits and inspections?',
        'answer'   => 'Yes. A&S Contracting Services pulls the required permits and coordinates inspections through each phase of the project. Warren County and its municipalities each have their own requirements, and part of hiring a general contractor is not having to learn them—we keep the project moving from permit to final sign-off so nothing stalls on paperwork.',
    ],
    [
        'question' => 'Do you take on both residential and commercial projects?',
        'answer'   => 'Yes. A&S Contracting Services manages residential renovations and additions as well as commercial build-outs across Warren County. The core skill is the same: sequencing trades, holding the schedule, and staying accountable for the budget—whether it is a family\'s addition or a storefront that has to open on a set date.',
    ],
    [
        'question' => 'Do you self-perform the work or subcontract it?',
        'answer'   => 'A&S Contracting Services self-performs the core trades—roofing, siding, drywall, and interior work—which is the whole point of hiring us. When a specialty trade like electrical or plumbing is required, we bring in licensed partners and manage them, so you still have one company accountable for the schedule and the finished result.',
    ],
    [
        'question' => 'How do you keep a project on schedule?',
        'answer'   => 'A&S Contracting Services builds one schedule and sequences the trades so each phase is ready for the next. Because we self-perform most of the work, we are not waiting on a subcontractor\'s separate calendar. You get a single point of contact who tracks the timeline and tells you where the project stands instead of guessing.',
    ],
    [
        'question' => 'Are you a licensed general contractor in Missouri?',
        'answer'   => 'Yes. A&S Contracting Services is a licensed Missouri general contractor and carries full insurance on every project. That licensing and coverage protect you on larger jobs where multiple trades, permits, and inspections are in play, and it means the company managing your Warren County project is accountable for it in writing.',
    ],
];

// ─── Schema (Service + FAQPage + BreadcrumbList) ─────────────────────────────
$serviceSchema = [
    '@context'    => 'https://schema.org',
    '@type'       => 'Service',
    '@id'         => $canonicalUrl . '#service-' . $serviceSlug,
    'name'        => 'General Contracting',
    'serviceType' => 'General contractor',
    'description' => 'Full-service general contracting for residential and commercial projects in Warrenton, MO and Warren County—planning, permits, scheduling, and self-performed trades under one accountable team.',
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
        <span class="eyebrow">General Contracting &middot; Warrenton &amp; Warren County</span>
        <h1>General Contracting in <span class="text-accent">Warrenton, MO</span> — one team, planning to punch list</h1>
        <p class="hero-answer">A&amp;S Contracting Services is a licensed, insured Warrenton general contractor that manages residential and commercial projects from planning through final walkthrough—permits, scheduling, and self-performed roofing, siding, drywall, and interior trades under one accountable roof, so you have a single point of contact instead of a stack of subcontractors to chase across Warren County.</p>
        <div class="hero-actions">
          <a href="#estimate" class="btn btn-primary btn-lg hero-form-open">Get a free project estimate</a>
          <a class="link-call" href="tel:<?php echo $phoneTel; ?>"><?php echo icon('phone', 18); ?> or call <?php echo $phone; ?></a>
        </div>
        <ul class="hero-chips">
          <li><?php echo icon('shield-check', 16); ?> Licensed &amp; insured in Missouri</li>
          <li><?php echo icon('clipboard-list', 16); ?> Permits &amp; scheduling handled</li>
          <li><?php echo icon('users', 16); ?> Self-performed trades &mdash; one team</li>
        </ul>
      </div>

      <aside class="hero-form-card" id="hero-form">
        <h2>Want a free project estimate?</h2>
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
        <h2>When does your Warren County project need a general contractor?</h2>
        <p class="answer-block">A&amp;S Contracting Services steps in when a project touches more than one trade—an addition, a whole renovation, a storm rebuild, or a commercial build-out. The moment framing, roofing, drywall, and finishes all have to be scheduled, permitted, and inspected in the right order, you need one manager accountable for the budget and the timeline, not a homeowner playing dispatcher.</p>
        <p class="pull-quote">The hardest part of a big project isn&rsquo;t any one trade—it&rsquo;s getting all of them to line up in the right order.</p>
      </div>
      <div class="sp-signs reveal-right">
        <div class="sp-sign">
          <div class="sp-sign__icon"><?php echo icon('building-2', 22); ?></div>
          <h3>Multi-trade project</h3>
          <p>An addition or renovation that needs framing, roofing, drywall, and finishes all coordinated.</p>
        </div>
        <div class="sp-sign">
          <div class="sp-sign__icon"><?php echo icon('clipboard-list', 22); ?></div>
          <h3>Permits &amp; inspections</h3>
          <p>Work that requires pulled permits and passed inspections you would rather not manage.</p>
        </div>
        <div class="sp-sign">
          <div class="sp-sign__icon"><?php echo icon('calendar-check', 22); ?></div>
          <h3>Nobody owns the schedule</h3>
          <p>Subcontractors on their own calendars leave the timeline with no one in charge.</p>
        </div>
        <div class="sp-sign">
          <div class="sp-sign__icon"><?php echo icon('hard-hat', 22); ?></div>
          <h3>Commercial build-out</h3>
          <p>A storefront or office fit-out that has to open on a firm date.</p>
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
        <div class="sp-position__stat">1<span>accountable team managing your whole project—planning, permits, trades, and walkthrough</span></div>
      </div>
      <div class="reveal-right">
        <span class="eyebrow-label">Why It Matters</span>
        <h2>What makes A&amp;S accountable from start to finish?</h2>
        <p class="answer-block">A&amp;S Contracting Services self-performs most of the trades it manages—roofing, siding, drywall, and interior work—so the general contractor and the crew are the same company. There is no subcontractor to blame for a missed day. One team plans the job, pulls the permits, runs the schedule, and answers for the result at the final walkthrough.</p>
        <ul class="sp-evidence">
          <li><?php echo icon('users', 22); ?><span><b>One in-house team.</b> Because we self-perform the core trades, scheduling and quality stay under one roof instead of scattered across subs.</span></li>
          <li><?php echo icon('clipboard-list', 22); ?><span><b>Permits and inspections handled.</b> We pull the permits, coordinate inspections, and keep the project moving through each sign-off.</span></li>
          <li><?php echo icon('shield-check', 22); ?><span><b>Licensed &amp; fully insured.</b> You work with a licensed Missouri general contractor carrying full insurance on every project, residential or commercial.</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════ SERVICE BREAKDOWN ═══════════════════ -->
<section class="section section--light">
  <div class="container">
    <span class="eyebrow-label">The Work</span>
    <h2>What&rsquo;s included when A&amp;S manages your project?</h2>
    <p class="answer-block">A&amp;S Contracting Services runs the whole job: consultation and planning, a written scope and itemized estimate, permits and inspection coordination, scheduling, self-performed roofing, siding, drywall, and interior trades, ongoing communication, and a final walkthrough. From the first meeting to the punch list, one Warrenton company owns the budget, the timeline, and the result.</p>
    <div class="sp-included">
      <div class="reveal-up">
        <h3>Included in the scope</h3>
        <ul class="sp-checklist">
          <li><?php echo icon('check', 20); ?> Consultation and project planning</li>
          <li><?php echo icon('check', 20); ?> Written scope and itemized estimate</li>
          <li><?php echo icon('check', 20); ?> Permit applications and inspection coordination</li>
          <li><?php echo icon('check', 20); ?> Full schedule with trades sequenced in order</li>
          <li><?php echo icon('check', 20); ?> Self-performed roofing, siding, drywall, and interior work</li>
          <li><?php echo icon('check', 20); ?> Ongoing project management and communication</li>
          <li><?php echo icon('check', 20); ?> Final walkthrough and punch-list completion</li>
        </ul>
      </div>
      <div class="reveal-right">
        <h3>How the project runs</h3>
        <ol class="process-steps">
          <li><b>Consultation &amp; plan</b><span>We meet on site, learn the goal, and map the scope, budget, and rough timeline.</span></li>
          <li><b>Written scope &amp; estimate</b><span>You get an itemized proposal covering every phase—no vague allowances or hidden trades.</span></li>
          <li><b>Permits &amp; scheduling</b><span>We pull the permits and sequence the trades so each phase is ready for the next.</span></li>
          <li><b>Build &amp; walkthrough</b><span>Our team performs the work, coordinates inspections, and walks the finished project with you.</span></li>
        </ol>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════ PROOF / REVIEWS ═══════════════════ -->
<section class="section reviews-section edge-wave-top" aria-label="General contracting reviews">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container-wide">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">In Their Words</span>
      <h2>What do Warren County clients say about A&amp;S on bigger projects?</h2>
      <p>Real reviews from A&amp;S Contracting Services renovation, addition, and full-project customers across Warren County.</p>
    </div>
    <div class="reviews-track">
      <?php
      $gcReviews = array_filter($reviews, function ($r) { return in_array($r['author'], ['Marcus H.', 'Robert T.', 'Jennifer K.']); });
      foreach ($gcReviews as $rev):
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
      <span class="badge-strip"><?php echo icon('users', 16); ?> Self-Performed Trades</span>
    </div>
  </div>
</section>

<!-- ═══════════════════ COMPARISON ═══════════════════ -->
<section class="section">
  <div class="container">
    <span class="eyebrow-label">The Difference</span>
    <h2>Why hire A&amp;S instead of managing subcontractors yourself?</h2>
    <p class="answer-block">A&amp;S Contracting Services is one licensed general contractor accountable for the whole project. Acting as your own GC means chasing separate subcontractors, reconciling their schedules, and eating the delay when one no-shows. With A&amp;S self-performing the core trades, the schedule stays under one roof and one company answers for the finished result.</p>
    <div class="sp-compare">
      <div class="sp-compare__col sp-compare--them">
        <h3><?php echo icon('x', 20); ?> Being your own GC</h3>
        <ul>
          <li><?php echo icon('minus', 18); ?> Coordinating separate subs on clashing schedules</li>
          <li><?php echo icon('minus', 18); ?> Chasing quotes, invoices, and change orders yourself</li>
          <li><?php echo icon('minus', 18); ?> One no-show stalls the whole project</li>
          <li><?php echo icon('minus', 18); ?> No single party accountable for the result</li>
        </ul>
      </div>
      <div class="sp-compare__col sp-compare--us">
        <h3><?php echo icon('check-circle', 20); ?> A&amp;S Contracting Services</h3>
        <ul>
          <li><?php echo icon('check', 18); ?> One licensed contractor over the whole job</li>
          <li><?php echo icon('check', 18); ?> Core trades self-performed in-house</li>
          <li><?php echo icon('check', 18); ?> Permits, schedule, and inspections handled</li>
          <li><?php echo icon('check', 18); ?> One team accountable at the final walkthrough</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════ FAQ ═══════════════════ -->
<section class="section section--light" aria-label="General contracting FAQ">
  <div class="container-narrow">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Good Questions</span>
      <h2>What do Warren County clients ask about general contracting?</h2>
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
<section class="section sp-gallery" aria-label="Recent general contracting projects">
  <div class="container-wide">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Recent Work</span>
      <h2>What recent projects has A&amp;S completed as a Warrenton general contractor?</h2>
      <p class="answer-block">These are real projects A&amp;S Contracting Services self-performed across Warrenton and Warren County&mdash;each one handled start to finish by the same in-house crew, never a subcontractor.</p>
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
      <h2>What can A&amp;S self-perform on your project?</h2>
      <p class="hero-answer">As your general contractor, A&amp;S Contracting Services performs most trades in-house. These are the core services our own crews bring to your Warrenton or Warren County project.</p>
    </div>
    <div class="sp-other">
      <?php
      $otherSlugs = ['full-scale-interior-work', 'exterior-work', 'roofing'];
      $tintCycle  = [1, 2, 3];
      $otherIcons = ['full-scale-interior-work' => 'paint-bucket', 'exterior-work' => 'hammer', 'roofing' => 'home'];
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
<section class="section section--light" id="estimate" aria-label="Request your free project estimate">
  <div class="container">
    <div class="estimate">
      <div class="card reveal-up" style="padding: clamp(1.5rem, 4vw, 2.5rem); border:1px solid var(--color-line); border-radius: var(--radius-lg); background: var(--color-surface);">
        <span class="eyebrow-label">Free Estimate</span>
        <h2>Ready to hand your project to one team?</h2>
        <p class="lead" style="margin-bottom: 1.25rem;">Send the details and A&amp;S Contracting Services will reply the same day to schedule your free on-site consultation.</p>

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
        <h2>What happens after you send your <span class="text-accent">project details</span>?</h2>
        <ol class="next-steps">
          <li><strong>We reach out the same day.</strong> A&amp;S Contracting Services confirms the details and schedules your free on-site consultation.</li>
          <li><strong>You get a written scope.</strong> An itemized estimate covering every phase—trades, permits, timeline, and price.</li>
          <li><strong>One team runs the job.</strong> The same self-performing crew builds, coordinates inspections, and walks the finished project with you.</li>
        </ol>
        <div class="nap">
          <div><?php echo icon('phone', 18); ?> <a href="tel:<?php echo $phoneTel; ?>"><?php echo $phone; ?></a></div>
          <div><?php echo icon('mail', 18); ?> <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></div>
          <div><?php echo icon('map-pin', 18); ?> <span><?php echo $addressCity; ?>, <?php echo $addressState; ?> <?php echo $addressZip; ?></span></div>
          <div><?php echo icon('clock', 18); ?> <span><?php echo htmlspecialchars($businessHours); ?></span></div>
        </div>
        <p style="margin-top:1rem; color: var(--color-muted); font-size: .95rem;">General contracting across Warrenton, Wright City, Foristell, Wentzville, Troy, Jonesburg, Washington and everywhere within <?php echo $serviceRadius; ?> miles.</p>
      </div>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
