<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/blog-data.php';

$pageType = 'blog';
$pageTitle = 'Soffit & Fascia Rot: Signs Missouri Homeowners Miss';
$pageDescription = 'Peeling paint and water stains on eaves signal hidden rot. Learn the warning signs of soffit and fascia damage Missouri homeowners overlook—and when repair stops being cost-effective.';
$canonicalUrl = $siteUrl . '/blog/soffit-and-fascia-rot-signs-missouri-homeowners-miss/';
$currentPage = 'blog';

// Schema: BlogPosting + BreadcrumbList + FAQPage
$schema = <<<SCHEMA
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "BlogPosting",
      "headline": "{$pageTitle}",
      "description": "{$pageDescription}",
      "author": {
        "@type": "Organization",
        "@id": "{$siteUrl}/#organization"
      },
      "publisher": {
        "@type": "Organization",
        "@id": "{$siteUrl}/#organization"
      },
      "datePublished": "2024-09-10",
      "dateModified": "2024-09-10",
      "url": "{$canonicalUrl}",
      "keywords": "soffit fascia repair Missouri, soffit rot, fascia damage, eave repair, wood rot repair"
    },
    {
      "@type": "BreadcrumbList",
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "name": "Home",
          "item": "{$siteUrl}/"
        },
        {
          "@type": "ListItem",
          "position": 2,
          "name": "Blog",
          "item": "{$siteUrl}/blog/"
        },
        {
          "@type": "ListItem",
          "position": 3,
          "name": "Soffit & Fascia Rot Signs",
          "item": "{$canonicalUrl}"
        }
      ]
    },
    {
      "@type": "FAQPage",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "How long do soffit and fascia boards typically last?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Properly installed and maintained soffit and fascia boards last 20–30 years for vinyl or aluminum, 15–25 years for wood (depending on exposure and maintenance), and 30–50 years for fiber cement. Lifespan depends on material quality, installation quality, gutter performance, and annual maintenance. Neglected wood soffit and fascia in Missouri's humid climate can fail in 10–15 years."
          }
        },
        {
          "@type": "Question",
          "name": "Can I repair just the damaged section of soffit or fascia?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes, if damage is localized and the rest of the boards are sound. A single rotted fascia board section or a few damaged soffit panels can be replaced individually. However, if rot has spread to multiple boards, if the underlying rafter tails are damaged, or if repair costs exceed 40% of full replacement cost, replacing the entire run is more cost-effective."
          }
        },
        {
          "@type": "Question",
          "name": "What causes soffit and fascia to rot prematurely?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Clogged or damaged gutters are the primary cause—overflow water soaks the fascia and soffit instead of draining away. Other causes include missing or failed drip edge, improperly vented attics (trapping moisture against soffit), gaps in roof shingles allowing wind-driven rain behind boards, and lack of primer or paint on wood surfaces. Most premature rot traces back to deferred gutter maintenance."
          }
        },
        {
          "@type": "Question",
          "name": "How much does soffit and fascia repair cost in Missouri?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Expect to pay $6–$12 per linear foot for soffit or fascia board replacement, depending on material and accessibility. A typical repair addressing 20–30 linear feet of damaged boards runs $300–$800 including materials and labor. Full eave replacement on a 1,500-square-foot home costs $2,000–$4,500. Prices increase if rafter tails need sistering or if siding must be removed to access boards."
          }
        },
        {
          "@type": "Question",
          "name": "Should I replace gutters at the same time as fascia boards?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "If your gutters are more than 15 years old, have visible rust or separation at seams, or contributed to the fascia damage through chronic overflow, replace them during fascia work. Accessing the fascia requires removing gutters anyway, and installing new gutters on new fascia boards ensures proper pitch and attachment. Reinstalling old failing gutters on new fascia wastes the opportunity to address the root cause of the rot."
          }
        }
      ]
    }
  ]
}
</script>
SCHEMA;

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* Blog post styles - reuse from existing posts */
.blog-post-hero {
  background: linear-gradient(135deg, var(--color-primary) 0%, rgba(0,0,0,0.85) 100%);
  padding: calc(var(--nav-height) + 40px) 0 60px;
  position: relative;
  overflow: hidden;
}

.blog-post-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.02'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
  opacity: 0.4;
}

.blog-post-hero .container {
  position: relative;
  z-index: 1;
  max-width: 800px;
}

.breadcrumb {
  display: flex;
  align-items: center;
  gap: 8px;
  margin-bottom: 16px;
  font-size: 0.875rem;
  color: rgba(255,255,255,0.7);
}

.breadcrumb a {
  color: var(--color-accent);
  text-decoration: none;
}

.breadcrumb-sep {
  color: rgba(255,255,255,0.4);
}

.blog-post-meta {
  display: flex;
  align-items: center;
  gap: 20px;
  margin-bottom: 16px;
  font-size: 0.875rem;
  color: rgba(255,255,255,0.8);
}

.blog-post-meta__item {
  display: flex;
  align-items: center;
  gap: 6px;
}

.blog-post-category {
  background: var(--color-accent);
  color: var(--color-primary);
  padding: 6px 12px;
  border-radius: 4px;
  font-size: 0.75rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  display: inline-block;
  margin-bottom: 16px;
}

.blog-post-hero h1 {
  font-size: clamp(1.75rem, 4vw, 2.5rem);
  font-weight: 700;
  color: #fff;
  line-height: 1.2;
  margin-bottom: 20px;
}

.blog-post-excerpt {
  font-size: 1.125rem;
  line-height: 1.6;
  color: rgba(255,255,255,0.9);
}

.blog-post-content {
  max-width: 800px;
  margin: 0 auto;
  padding: 80px 20px;
}

.answer-block {
  background: #f8f9fa;
  border-left: 4px solid var(--color-accent);
  padding: 24px;
  margin-bottom: 40px;
  border-radius: 0 8px 8px 0;
}

.answer-block p {
  margin-bottom: 16px;
  font-size: 1.0625rem;
  line-height: 1.7;
}

.answer-block p:last-child {
  margin-bottom: 0;
}

.blog-post-content h2 {
  font-size: 1.75rem;
  margin: 48px 0 20px;
  font-weight: 700;
  color: var(--color-primary);
  line-height: 1.3;
}

.blog-post-content h3 {
  font-size: 1.375rem;
  margin: 32px 0 16px;
  font-weight: 600;
  color: var(--color-primary);
}

.blog-post-content p {
  margin-bottom: 20px;
  line-height: 1.7;
  font-size: 1.0625rem;
}

.blog-post-content ul,
.blog-post-content ol {
  margin: 20px 0 20px 24px;
  line-height: 1.7;
}

.blog-post-content li {
  margin-bottom: 8px;
}

.blog-post-content strong {
  font-weight: 600;
  color: var(--color-primary);
}

.blog-post-content a {
  color: var(--color-primary);
  text-decoration: underline;
  transition: color 0.2s;
}

.blog-post-content a:hover {
  color: var(--color-accent);
}

.cta-band {
  background: linear-gradient(135deg, var(--color-accent) 0%, #a5a7a9 100%);
  padding: 60px 20px;
  text-align: center;
  margin: 60px 0;
  border-radius: 12px;
}

.cta-band h3 {
  font-size: 1.75rem;
  margin-bottom: 12px;
  color: var(--color-primary);
}

.cta-band p {
  font-size: 1.0625rem;
  margin-bottom: 24px;
  color: var(--color-primary);
  opacity: 0.9;
}

.faq-section {
  background: #f8f9fa;
  padding: 60px 20px;
  margin: 60px 0;
  border-radius: 12px;
}

.faq-section h2 {
  text-align: center;
  font-size: 1.75rem;
  margin-bottom: 32px;
  color: var(--color-primary);
}

.faq-item {
  background: #fff;
  border-radius: 8px;
  padding: 24px;
  margin-bottom: 16px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.06);
}

.faq-item h3 {
  font-size: 1.125rem;
  font-weight: 700;
  margin-bottom: 12px;
  color: var(--color-primary);
  margin-top: 0;
}

.faq-item p {
  margin-bottom: 0;
  line-height: 1.7;
  color: var(--color-text);
}

.related-articles {
  background: #f8f9fa;
  padding: 60px 20px;
  margin-top: 60px;
  border-radius: 12px;
}

.related-articles h3 {
  text-align: center;
  font-size: 1.75rem;
  margin-bottom: 32px;
}

.related-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 24px;
}

.related-card {
  background: #fff;
  border-radius: 8px;
  padding: 24px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.06);
  transition: transform 0.2s;
}

.related-card:hover {
  transform: translateY(-2px);
}

.related-card__category {
  font-size: 0.75rem;
  font-weight: 700;
  text-transform: uppercase;
  color: var(--color-accent);
  margin-bottom: 8px;
}

.related-card__title {
  font-size: 1.125rem;
  font-weight: 700;
  margin-bottom: 12px;
}

.related-card__title a {
  color: var(--color-primary);
  text-decoration: none;
}

.related-card__excerpt {
  font-size: 0.9375rem;
  line-height: 1.6;
  color: var(--color-text);
  margin-bottom: 16px;
}

.related-card__link {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  font-weight: 600;
  font-size: 0.9375rem;
  color: var(--color-primary);
  text-decoration: none;
}

@media (max-width: 768px) {
  .blog-post-content {
    padding: 60px 20px;
  }

  .blog-post-content h2 {
    font-size: 1.5rem;
  }

  .related-grid {
    grid-template-columns: 1fr;
  }
}
</style>

<!-- Hero -->
<section class="blog-post-hero">
  <div class="container">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="/">Home</a>
      <span class="breadcrumb-sep">/</span>
      <a href="/blog/">Blog</a>
      <span class="breadcrumb-sep">/</span>
      <span>Soffit & Fascia Rot Signs</span>
    </nav>

    <span class="blog-post-category">Exterior</span>

    <h1>Soffit & Fascia Rot: Signs Missouri Homeowners Miss</h1>

    <div class="blog-post-meta">
      <span class="blog-post-meta__item">
        <?php echo icon('calendar', 16); ?>
        September 10, 2024
      </span>
      <span class="blog-post-meta__item">
        <?php echo icon('clock', 16); ?>
        7 min read
      </span>
    </div>

    <p class="blog-post-excerpt">
      Peeling paint and water stains on eaves signal hidden rot. Learn the warning signs of soffit and fascia damage
      Missouri homeowners overlook—and when repair stops being cost-effective.
    </p>
  </div>
</section>

<!-- Content -->
<article class="blog-post-content">
  <div class="answer-block">
    <p>
      <strong>Replace soffit and fascia boards when you see persistent peeling paint, visible rot or soft spots when
      probed, water stains on eave undersides, or daylight visible through gaps.</strong> Wood soffit and fascia typically
      last 15–25 years with proper maintenance; vinyl and aluminum last 20–30 years. If damage affects more than 40% of
      the boards or if <a href="/services/gutters/">gutter overflow</a> has saturated the wood for multiple seasons,
      replacement is more cost-effective than patching individual sections.
    </p>
    <p>
      A&S Contracting Services works across Warren, St. Charles, Lincoln, and Franklin counties replacing rotted eave
      components. Most homeowners don't inspect their soffits and fascia until they're repainting or replacing gutters—by
      that point, rot has often spread to rafter tails and roof sheathing, turning a simple board replacement into structural
      carpentry work.
    </p>
  </div>

  <h2>What Are Soffit and Fascia, and Why Do They Matter?</h2>
  <p>
    <strong>Fascia boards are the horizontal trim that runs along the roofline edge, directly attached to rafter tails.</strong>
    They carry the gutters and form the vertical face you see when looking up at your eaves. <strong>Soffit boards are the
    horizontal panels underneath the eaves,</strong> spanning from the house wall to the fascia, creating the "ceiling" of
    your roof overhang.
  </p>
  <p>
    Both components serve structural and functional purposes. Fascia provides backing for gutter attachment and protects
    rafter tails from weather exposure. <a href="/services/soffit/">Soffit panels</a> ventilate the attic (most soffits
    include perforations or vents) while blocking pests from entering the eave cavity. When either component fails, you
    lose weather protection, ventilation, and structural integrity at the roofline—problems that escalate quickly in
    Missouri's freeze-thaw cycles and humid summers.
  </p>

  <h2>What Are the Early Warning Signs of Soffit and Fascia Rot?</h2>
  <p>
    Rot rarely announces itself with catastrophic failure. <strong>Most soffit and fascia damage starts with minor cosmetic
    issues—paint bubbling, slight discoloration, small gaps—and progresses over months or years</strong> until the wood is
    spongy, the boards sag, or water intrudes into the attic.
  </p>

  <h3>Peeling or Bubbling Paint</h3>
  <p>
    Paint peels when moisture gets trapped behind it. <strong>Persistent peeling on fascia boards—especially along the bottom
    edge where gutters attach—indicates water is wicking into the wood grain.</strong> If you repaint and the same spots
    peel again within a year or two, the wood underneath is staying wet. That's rot in progress.
  </p>

  <h3>Water Stains on Soffit Undersides</h3>
  <p>
    Dark streaks, yellowish stains, or discolored patches on soffit panels mean water has been running across the surface
    or soaking through from above. <strong>Stains that persist after cleaning indicate chronic moisture exposure</strong>—either
    from <a href="/services/gutters/">clogged gutters</a> overflowing onto the soffit, failed roof flashing directing water
    behind the fascia, or condensation from poor attic ventilation.
  </p>

  <h3>Soft Spots or Spongy Wood</h3>
  <p>
    Press a screwdriver blade or your thumb against the fascia and soffit boards. Healthy wood resists pressure. <strong>Soft,
    spongy spots or wood that crumbles under light pressure are advanced rot.</strong> If the screwdriver sinks more than
    1/8 inch into the board, the wood has lost structural integrity and needs replacement.
  </p>
  <p>
    Check the fascia where gutters attach—standing water in sagging gutters soaks the top edge—and check soffit corners
    where two roof planes meet, as these areas trap wind-driven rain.
  </p>

  <h3>Gaps, Warping, or Sagging Boards</h3>
  <p>
    Wood shrinks as it dries and swells when it absorbs moisture. Repeated wet-dry cycles cause boards to warp, twist, or
    pull away from their mounting points. <strong>Visible gaps between the fascia and the roof edge, or between soffit panels
    and the house wall, let pests and water into the eave cavity.</strong>
  </p>
  <p>
    Sagging fascia boards—most obvious when sighting down the roofline from the corner—indicate either rotted wood that's
    lost its stiffness or damaged rafter tails that no longer provide solid backing.
  </p>

  <h3>Daylight Visible from the Attic</h3>
  <p>
    Walk your attic on a sunny day with the lights off. <strong>If you see daylight peeking through at the eaves—between
    the roof sheathing and the top plate, or through gaps where the soffit should seal—your soffit or fascia has failed.</strong>
    Those gaps let conditioned air escape, pests enter, and moisture infiltrate.
  </p>

  <h3>Pests or Nesting Materials in Eaves</h3>
  <p>
    Carpenter bees drilling holes in fascia boards, wasps nesting in soffit vents, squirrels tearing at rotted soffit corners—all
    of these indicate compromised wood. <strong>Pests target soft, decayed wood because it's easier to excavate.</strong> If
    you're dealing with recurring pest intrusion at the roofline, inspect the boards for rot.
  </p>

  <div class="cta-band">
    <h3>Suspect Soffit or Fascia Damage?</h3>
    <p>
      A&S Contracting Services provides free eave inspections across Warren, St. Charles, Lincoln, and Franklin counties.
      We'll probe suspect areas, identify the extent of damage, and provide a written estimate for repair or replacement.
    </p>
    <a href="/contact/" class="btn-primary">Schedule Free Inspection</a>
  </div>

  <h2>What Causes Soffit and Fascia to Rot?</h2>
  <p>
    Water exposure is the root cause of nearly all soffit and fascia rot. Wood boards are designed to shed water, not sit
    in it—but common installation and maintenance failures turn eaves into chronic wet zones.
  </p>

  <h3>Clogged or Damaged Gutters</h3>
  <p>
    <strong>This is the number-one cause.</strong> When gutters clog with leaves and debris, water overflows and runs down
    the back of the gutter, soaking the fascia board's top edge. <a href="/services/gutters/">Damaged gutter seams</a>,
    sagging sections, or detached hangers let water pour directly onto soffit and fascia instead of draining to downspouts.
  </p>
  <p>
    Even a single season of neglected gutters can saturate wood fascia enough to start rot. Multiple years of overflow turn
    fascia into sponge and spread rot into rafter tails.
  </p>

  <h3>Missing or Failed Drip Edge</h3>
  <p>
    Drip edge is the metal flashing installed along the roof edge, tucked under the first course of shingles and extending
    over the fascia. It directs water into the gutter instead of letting it run down the fascia face. <strong>Missing drip
    edge—common on older roofs—lets every rainstorm soak the fascia's top edge and back face.</strong>
  </p>
  <p>
    When <a href="/services/roofing/">replacing shingles</a>, insist on new drip edge. It's a small line item that prevents
    expensive fascia rot.
  </p>

  <h3>Improperly Vented Attics</h3>
  <p>
    Attics need balanced intake (soffit vents) and exhaust (ridge vents or roof vents) to prevent moisture buildup. <strong>Blocked
    soffit vents, missing ridge vents, or painted-over soffit perforations trap humid air in the attic,</strong> which condenses
    on cold surfaces in winter and soaks into soffit boards from the attic side.
  </p>
  <p>
    Poor ventilation also shortens shingle lifespan and promotes ice dams—both of which accelerate roof and eave deterioration.
  </p>

  <h3>Lack of Paint or Primer on Wood Surfaces</h3>
  <p>
    Bare or poorly primed wood absorbs water like a sponge. <strong>Wood fascia and soffit need a quality exterior primer
    and at least two coats of paint to seal the grain and shed moisture.</strong> Skipping primer, using interior paint,
    or neglecting repainting every 5–7 years leaves wood vulnerable to rot.
  </p>

  <h2>Can I Repair Just the Damaged Section?</h2>
  <p>
    Yes—if the damage is localized and the rest of the boards are sound. <strong>A single rotted fascia board section or a
    few damaged soffit panels can be cut out and replaced individually.</strong> This works when the rot hasn't spread beyond
    the visibly damaged area and the underlying structure (rafter tails, frieze blocks) is dry and solid.
  </p>
  <p>
    However, if rot affects multiple boards across different sections of the roofline, if you can press a screwdriver into
    more than 30% of the fascia length, or if rafter tails are soft when probed, replacement of the entire run is more
    cost-effective. <strong>Patching scattered rot buys you a year or two before the next section fails</strong>—and you'll
    pay for scaffolding, labor setup, and paint twice.
  </p>

  <h2>What Does Soffit and Fascia Repair Cost in Missouri?</h2>
  <p>
    Expect to pay <strong>$6–$12 per linear foot</strong> for soffit or fascia board replacement, depending on material
    (wood, vinyl, aluminum, or fiber cement), board width, and accessibility. A typical repair addressing 20–30 linear feet
    of damaged boards costs $300–$800 including materials and labor.
  </p>
  <p>
    Full eave replacement on a 1,500-square-foot single-story home—replacing all fascia, soffit, and associated trim—runs
    $2,000–$4,500. Two-story homes or houses with complex rooflines (multiple gables, dormers, steep pitches) increase costs
    due to scaffolding and labor time.
  </p>
  <p>
    <strong>If rafter tails need sistering (reinforcing rotted rafter ends with new lumber) or if siding must be removed to
    access the soffit, add $500–$1,500 to the base cost.</strong> This is why early intervention matters—catching rot before
    it spreads to structural framing keeps the job a trim replacement instead of a carpentry project.
  </p>

  <h2>Should I Replace Gutters at the Same Time?</h2>
  <p>
    If your <a href="/services/gutters/">gutters</a> are more than 15 years old, show visible rust or separation at seams,
    or contributed to the fascia damage through chronic overflow, <strong>replace them during fascia work.</strong>
  </p>
  <p>
    Accessing the fascia requires removing gutters anyway—you're already paying for that labor. Installing new gutters on
    new fascia boards ensures proper pitch, secure attachment, and eliminates the root cause of the rot. <strong>Reinstalling
    old failing gutters on new fascia wastes the opportunity and risks repeating the same damage cycle.</strong>
  </p>

  <h2>What Material Should I Use for Replacement?</h2>
  <p>
    <strong>For fascia:</strong> 1x6 or 1x8 primed pine or cedar is the traditional choice—easy to work with, readily
    available, and paintable. It requires regular paint maintenance every 5–7 years. PVC or composite fascia boards cost
    more upfront but never rot and don't need painting.
  </p>
  <p>
    <strong>For soffit:</strong> Vented vinyl soffit is the most common replacement material—affordable, low-maintenance,
    pre-vented, and available in several colors. Aluminum soffit is more durable and doesn't sag but costs more. Wood soffit
    (tongue-and-groove pine or plywood) offers a traditional look but requires painting and is vulnerable to the same rot
    if gutters fail again.
  </p>

  <!-- FAQ Section -->
  <section class="faq-section">
    <h2>Frequently Asked Questions</h2>

    <div class="faq-item">
      <h3>How long do soffit and fascia boards typically last?</h3>
      <p>
        Properly installed and maintained soffit and fascia boards last 20–30 years for vinyl or aluminum, 15–25 years for
        wood (depending on exposure and maintenance), and 30–50 years for fiber cement. Lifespan depends on material quality,
        installation quality, gutter performance, and annual maintenance. Neglected wood soffit and fascia in Missouri's humid
        climate can fail in 10–15 years.
      </p>
    </div>

    <div class="faq-item">
      <h3>Can I repair just the damaged section of soffit or fascia?</h3>
      <p>
        Yes, if damage is localized and the rest of the boards are sound. A single rotted fascia board section or a few
        damaged soffit panels can be replaced individually. However, if rot has spread to multiple boards, if the underlying
        rafter tails are damaged, or if repair costs exceed 40% of full replacement cost, replacing the entire run is more
        cost-effective.
      </p>
    </div>

    <div class="faq-item">
      <h3>What causes soffit and fascia to rot prematurely?</h3>
      <p>
        Clogged or damaged gutters are the primary cause—overflow water soaks the fascia and soffit instead of draining away.
        Other causes include missing or failed drip edge, improperly vented attics (trapping moisture against soffit), gaps
        in roof shingles allowing wind-driven rain behind boards, and lack of primer or paint on wood surfaces. Most premature
        rot traces back to deferred gutter maintenance.
      </p>
    </div>

    <div class="faq-item">
      <h3>How much does soffit and fascia repair cost in Missouri?</h3>
      <p>
        Expect to pay $6–$12 per linear foot for soffit or fascia board replacement, depending on material and accessibility.
        A typical repair addressing 20–30 linear feet of damaged boards runs $300–$800 including materials and labor. Full
        eave replacement on a 1,500-square-foot home costs $2,000–$4,500. Prices increase if rafter tails need sistering or
        if siding must be removed to access boards.
      </p>
    </div>

    <div class="faq-item">
      <h3>Should I replace gutters at the same time as fascia boards?</h3>
      <p>
        If your gutters are more than 15 years old, have visible rust or separation at seams, or contributed to the fascia
        damage through chronic overflow, replace them during fascia work. Accessing the fascia requires removing gutters anyway,
        and installing new gutters on new fascia boards ensures proper pitch and attachment. Reinstalling old failing gutters
        on new fascia wastes the opportunity to address the root cause of the rot.
      </p>
    </div>
  </section>

  <div class="related-articles">
    <h3>Related Articles</h3>
    <div class="related-grid">
      <?php
      // Show other blog posts (exclude current)
      $relatedPosts = array_filter($blogPosts, function($post) {
        return $post['slug'] !== 'soffit-and-fascia-rot-signs-missouri-homeowners-miss';
      });
      // Limit to 2 most recent posts
      $relatedPosts = array_slice($relatedPosts, 0, 2);
      foreach ($relatedPosts as $related):
      ?>
      <div class="related-card">
        <div class="related-card__category"><?php echo htmlspecialchars($related['category']); ?></div>
        <h4 class="related-card__title">
          <a href="/blog/<?php echo $related['slug']; ?>/"><?php echo htmlspecialchars($related['title']); ?></a>
        </h4>
        <p class="related-card__excerpt"><?php echo htmlspecialchars($related['excerpt']); ?></p>
        <a href="/blog/<?php echo $related['slug']; ?>/" class="related-card__link">
          Read Article <?php echo icon('arrow-right', 16); ?>
        </a>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</article>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
