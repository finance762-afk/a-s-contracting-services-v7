<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ─── Page-level setup ───────────────────────────────────────────────────────
$serviceSlug     = 'dry-wall';
$pageType        = 'service';
$currentPage     = 'services';
$svcName         = 'Dry Wall';
$pageTitle       = 'Dry Wall in Warrenton, MO';
$pageDescription = 'Drywall contractor in Warrenton, MO. A&S Contracting Services hangs, tapes, textures and repairs drywall in Warren County. Free paint-ready estimate.';
$canonicalUrl    = $siteUrl . '/services/dry-wall/';

// ─── Hero + recent-work photos (image manifest) ─────────────────────────────
$heroImage    = '1779984936314-5pnhuy-43-Aug_06__2025_23-34-36-CJqa';
$heroImageAlt = 'Home renovation in progress with new siding and interior build-out by A&S Contracting Services near Warrenton';
$heroPreload  = [
    'srcset' => "/assets/images/{$heroImage}-480.avif 480w, /assets/images/{$heroImage}-960.avif 960w",
    'sizes'  => '100vw',
];
$workPhotos = [
    ['1779985083901-6czd8y-29-Feb_09__2026_17-31-13-2hYG', 'Interior and roof build-out in progress with new decking and framing in Warren County'],
    ['1779985357413-bd2qlx-35-Aug_06__2025_18-05-09-sh7A', 'Active job site with house wrap and exposed subflooring during a Warrenton renovation'],
    ['1779985124323-t7sz4h-25-Mar_19__2026_16-22-48-7m7y', 'Exposed framing and sheathing during an interior renovation near Warrenton'],
];

// ─── FAQ (service-specific) ─────────────────────────────────────────────────
$faqs = [
    [
        'question' => 'How much does drywall installation or repair cost in Warrenton?',
        'answer'   => 'A&S Contracting Services prices drywall by the size of the job, the finish level, and the texture to match, measured on site. A single patch is a small line item; a full addition is priced by the board and finish. Either way you get a written estimate up front, not a number invented over the phone.',
    ],
    [
        'question' => 'Can you match my existing wall texture?',
        'answer'   => 'Yes. A&S Contracting Services matches knockdown, orange peel, and smooth-wall finishes so a repair blends into the room. Texture matching is the step most patches skip, and it is the reason a bad fix stands out—we get the spray and knockdown right before priming so the wall reads as one continuous surface.',
    ],
    [
        'question' => 'How long does drywall need to dry before painting?',
        'answer'   => 'A&S Contracting Services builds drywall mud in coats, and each coat needs to dry before the next—usually about a day apart depending on humidity. Missouri\'s damp stretches slow it down. We sand the final coat flat and leave the wall prime-ready, so your painter can prime and paint once the mud is fully cured.',
    ],
    [
        'question' => 'Do you repair water-damaged or sagging drywall?',
        'answer'   => 'Yes. A&S Contracting Services cuts out water-stained, soft, or sagging panels, confirms the source of the moisture is resolved, and replaces the board with a taped, textured finish. Painting over water-damaged drywall only hides it until it fails again, so we replace what the water reached rather than coat over it.',
    ],
    [
        'question' => 'Will you clean up the drywall dust?',
        'answer'   => 'Yes. A&S Contracting Services controls dust during sanding and hauls away scrap board and debris before leaving. Drywall dust is fine enough to travel through a whole house, so we contain the work area, clean the space, and leave your Warrenton home ready for paint—not a mess for you to deal with.',
    ],
    [
        'question' => 'Do you finish drywall for additions and new construction?',
        'answer'   => 'Yes. A&S Contracting Services hangs and finishes drywall for new construction, room additions, and remodels, tying the new board into existing walls and ceilings. Because we also self-perform framing and interior trades, the drywall arrives on schedule with the rest of the project instead of waiting on an outside crew.',
    ],
];

// ─── Schema (Service + FAQPage + BreadcrumbList) ─────────────────────────────
$serviceSchema = [
    '@context'    => 'https://schema.org',
    '@type'       => 'Service',
    '@id'         => $canonicalUrl . '#service-' . $serviceSlug,
    'name'        => 'Dry Wall',
    'serviceType' => 'Drywall contractor',
    'description' => 'Drywall hang, tape, three-coat finish, texture matching, and repair for new construction, additions, and remodels in Warrenton, MO and Warren County.',
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
        <span class="eyebrow">Drywall &middot; Warrenton &amp; Warren County</span>
        <h1>Drywall in <span class="text-accent">Warrenton, MO</span> — hang, tape, texture &amp; repair</h1>
        <p class="hero-answer">A&amp;S Contracting Services is a licensed, insured Warrenton contractor that hangs, tapes, and finishes drywall to a smooth, paint-ready surface—new construction, additions, remodels, and repairs—matching your existing texture and controlling the dust so the wall looks like it was always there across Warren County.</p>
        <div class="hero-actions">
          <a href="#estimate" class="btn btn-primary btn-lg hero-form-open">Get a free drywall estimate</a>
          <a class="link-call" href="tel:<?php echo $phoneTel; ?>"><?php echo icon('phone', 18); ?> or call <?php echo $phone; ?></a>
        </div>
        <ul class="hero-chips">
          <li><?php echo icon('shield-check', 16); ?> Licensed &amp; insured in Missouri</li>
          <li><?php echo icon('pencil-ruler', 16); ?> Taped, floated &amp; texture-matched</li>
          <li><?php echo icon('users', 16); ?> Self-performed &mdash; no subcontractors</li>
        </ul>
      </div>

      <aside class="hero-form-card" id="hero-form">
        <h2>Want your free drywall estimate?</h2>
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
        <h2>How do you know your drywall needs repair or finishing?</h2>
        <p class="answer-block">A&amp;S Contracting Services looks for cracks running along seams, nail and screw heads popping through the paint, water-stained or sagging panels, and holes from moving or accidents. Any of these means the board or its finish has failed—and a proper taped, floated repair, not a smear of spackle, is what makes it disappear under paint.</p>
        <p class="pull-quote">A bad patch never really hides—it telegraphs through the paint the first time the light hits it.</p>
      </div>
      <div class="sp-signs reveal-right">
        <div class="sp-sign">
          <div class="sp-sign__icon"><?php echo icon('droplets', 22); ?></div>
          <h3>Water-stained panels</h3>
          <p>Brown rings or soft, sagging drywall mean a past leak soaked the board and it needs replacing.</p>
        </div>
        <div class="sp-sign">
          <div class="sp-sign__icon"><?php echo icon('waves', 22); ?></div>
          <h3>Cracked seams</h3>
          <p>Cracks tracking along a joint show the tape and mud have failed and need re-taping.</p>
        </div>
        <div class="sp-sign">
          <div class="sp-sign__icon"><?php echo icon('hammer', 22); ?></div>
          <h3>Holes &amp; damage</h3>
          <p>Doorknob dents, moving scrapes, and holes leave the wall open and uneven.</p>
        </div>
        <div class="sp-sign">
          <div class="sp-sign__icon"><?php echo icon('layers', 22); ?></div>
          <h3>Popped fasteners</h3>
          <p>Nail and screw heads pushing through the paint break the smooth surface.</p>
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
        <div class="sp-position__stat">3<span>coats of mud, taped and sanded flat, so seams vanish under paint instead of shadowing through</span></div>
      </div>
      <div class="reveal-right">
        <span class="eyebrow-label">Why It Matters</span>
        <h2>What makes an A&amp;S drywall finish worth the extra step?</h2>
        <p class="answer-block">A&amp;S Contracting Services finishes drywall the full way—tape, then a three-coat mud build, sanded flat, with the texture matched to the surrounding wall. A quick patch skips those steps, so it flashes and shadows once the wall is coated. Doing it right is the difference between a repair you see and one you never find again.</p>
        <ul class="sp-evidence">
          <li><?php echo icon('pencil-ruler', 22); ?><span><b>Taped and three-coat floated.</b> We embed tape, then build and feather the mud so the joint sits dead flat—not a lump you feel in raking light.</span></li>
          <li><?php echo icon('layers', 22); ?><span><b>Texture matched.</b> Knockdown, orange peel, or smooth—we match the existing wall so a patch blends into the room instead of announcing itself.</span></li>
          <li><?php echo icon('shield-check', 22); ?><span><b>Licensed &amp; fully insured.</b> Whether it is one wall or a whole addition, the crew in your home is licensed, insured, and cleans up its own dust.</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════ SERVICE BREAKDOWN ═══════════════════ -->
<section class="section section--light">
  <div class="container">
    <span class="eyebrow-label">The Work</span>
    <h2>What&rsquo;s included in an A&amp;S drywall job?</h2>
    <p class="answer-block">A&amp;S Contracting Services handles the full drywall sequence: hanging board, taping and a three-coat mud finish, sanding, texture matching, and a prime-ready wall—plus dust control and haul-away. Whether it is a single water-damaged panel or a whole Warrenton addition, the wall leaves smooth, matched to the room, and ready for your painter.</p>
    <div class="sp-included">
      <div class="reveal-up">
        <h3>Included in the scope</h3>
        <ul class="sp-checklist">
          <li><?php echo icon('check', 20); ?> Hang drywall on walls and ceilings, cut around openings</li>
          <li><?php echo icon('check', 20); ?> Embed tape and apply a three-coat mud finish</li>
          <li><?php echo icon('check', 20); ?> Sand seams and fasteners flat and smooth</li>
          <li><?php echo icon('check', 20); ?> Match existing texture—knockdown, orange peel, or smooth</li>
          <li><?php echo icon('check', 20); ?> Patch and replace water-damaged or cracked panels</li>
          <li><?php echo icon('check', 20); ?> Dust control during sanding to protect the room</li>
          <li><?php echo icon('check', 20); ?> Prime-ready finish, plus debris haul-away and cleanup</li>
        </ul>
      </div>
      <div class="reveal-right">
        <h3>How the project runs</h3>
        <ol class="process-steps">
          <li><b>On-site look</b><span>We check the walls or framing, confirm the texture to match, and go over the scope.</span></li>
          <li><b>Written estimate</b><span>You get an itemized quote—board, finish level, texture, and price, no guessing.</span></li>
          <li><b>Hang, tape &amp; float</b><span>We hang the board and build the mud in coats, sanding each one flat.</span></li>
          <li><b>Texture &amp; cleanup</b><span>We match the surrounding texture, leave the wall prime-ready, and haul the dust and scrap away.</span></li>
        </ol>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════ PROOF / REVIEWS ═══════════════════ -->
<section class="section reviews-section edge-wave-top" aria-label="Drywall reviews">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container-wide">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">In Their Words</span>
      <h2>What do Warren County homeowners say about our drywall?</h2>
      <p>Real reviews from A&amp;S Contracting Services drywall, interior, and finish customers across Warren County.</p>
    </div>
    <div class="reviews-track">
      <?php
      $dwReviews = array_filter($reviews, function ($r) { return in_array($r['author'], ['Robert T.', 'Diane L.', 'Jennifer K.']); });
      foreach ($dwReviews as $rev):
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
      <span class="badge-strip"><?php echo icon('pencil-ruler', 16); ?> Texture Matched</span>
    </div>
  </div>
</section>

<!-- ═══════════════════ COMPARISON ═══════════════════ -->
<section class="section">
  <div class="container">
    <span class="eyebrow-label">The Difference</span>
    <h2>Why hire a drywall finisher instead of patching it yourself?</h2>
    <p class="answer-block">A&amp;S Contracting Services tapes, floats, and texture-matches drywall so the repair disappears. A quick handyman or DIY patch skips the tape and the mud build, so the seam cracks again and the fix shows through every coat of paint. Done properly the first time, you stop seeing the wall and start seeing the room.</p>
    <div class="sp-compare">
      <div class="sp-compare__col sp-compare--them">
        <h3><?php echo icon('x', 20); ?> A quick patch job</h3>
        <ul>
          <li><?php echo icon('minus', 18); ?> Spackle over the crack with no tape</li>
          <li><?php echo icon('minus', 18); ?> One thin coat that shrinks and cracks again</li>
          <li><?php echo icon('minus', 18); ?> Texture that never matches the wall</li>
          <li><?php echo icon('minus', 18); ?> Fine dust left through the whole house</li>
        </ul>
      </div>
      <div class="sp-compare__col sp-compare--us">
        <h3><?php echo icon('check-circle', 20); ?> A&amp;S Contracting Services</h3>
        <ul>
          <li><?php echo icon('check', 18); ?> Tape embedded so the seam stays flat</li>
          <li><?php echo icon('check', 18); ?> Three-coat mud, sanded dead level</li>
          <li><?php echo icon('check', 18); ?> Texture matched to the surrounding wall</li>
          <li><?php echo icon('check', 18); ?> Dust controlled and hauled away</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════ FAQ ═══════════════════ -->
<section class="section section--light" aria-label="Drywall FAQ">
  <div class="container-narrow">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Good Questions</span>
      <h2>What do Warrenton homeowners ask about drywall?</h2>
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
<section class="section sp-gallery" aria-label="Recent drywall projects">
  <div class="container-wide">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Recent Work</span>
      <h2>What recent drywall projects has A&amp;S completed near Warrenton?</h2>
      <p class="answer-block">These are real drywall and interior build-out projects A&amp;S Contracting Services self-performed across Warrenton and Warren County&mdash;each one handled start to finish by the same in-house crew, never a subcontractor.</p>
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
      <h2>What else can A&amp;S finish inside your home?</h2>
      <p class="hero-answer">Drywall is one interior trade under one licensed crew. A&amp;S Contracting Services also handles the finish work and full projects that often follow new board across Warrenton and Warren County.</p>
    </div>
    <div class="sp-other">
      <?php
      $otherSlugs = ['full-scale-interior-work', 'general-contracting', 'windows-doors'];
      $tintCycle  = [1, 2, 3];
      $otherIcons = ['full-scale-interior-work' => 'paint-bucket', 'general-contracting' => 'hard-hat', 'windows-doors' => 'home'];
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
<section class="section section--light" id="estimate" aria-label="Request your free drywall estimate">
  <div class="container">
    <div class="estimate">
      <div class="card reveal-up" style="padding: clamp(1.5rem, 4vw, 2.5rem); border:1px solid var(--color-line); border-radius: var(--radius-lg); background: var(--color-surface);">
        <span class="eyebrow-label">Free Estimate</span>
        <h2>Ready for a smooth, paint-ready wall?</h2>
        <p class="lead" style="margin-bottom: 1.25rem;">Send the details and A&amp;S Contracting Services will reply the same day to schedule your free on-site drywall estimate.</p>

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
        <h2>What happens after you send your <span class="text-accent">drywall details</span>?</h2>
        <ol class="next-steps">
          <li><strong>We reach out the same day.</strong> A&amp;S Contracting Services confirms the details and schedules your free on-site drywall estimate.</li>
          <li><strong>You get a written estimate.</strong> Clear scope, finish level, texture match, and price—no surprises once the crew arrives.</li>
          <li><strong>One crew does the work.</strong> The same self-performing team hangs, tapes, textures, and cleans up—then walks the finished wall with you.</li>
        </ol>
        <div class="nap">
          <div><?php echo icon('phone', 18); ?> <a href="tel:<?php echo $phoneTel; ?>"><?php echo $phone; ?></a></div>
          <div><?php echo icon('mail', 18); ?> <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></div>
          <div><?php echo icon('map-pin', 18); ?> <span><?php echo $addressCity; ?>, <?php echo $addressState; ?> <?php echo $addressZip; ?></span></div>
          <div><?php echo icon('clock', 18); ?> <span><?php echo htmlspecialchars($businessHours); ?></span></div>
        </div>
        <p style="margin-top:1rem; color: var(--color-muted); font-size: .95rem;">Drywall across Warrenton, Wright City, Foristell, Wentzville, Troy, Jonesburg, Washington and everywhere within <?php echo $serviceRadius; ?> miles.</p>
      </div>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
