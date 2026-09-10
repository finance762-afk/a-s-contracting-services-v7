<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/blog-data.php';

$pageType = 'blog';
$pageTitle = 'Hail Damage Roof Insurance Claims: First 72 Hours in Missouri';
$pageDescription = 'Missouri homeowner\'s guide to filing a hail damage roof insurance claim in Warren County. What to document in the first 72 hours, how adjusters assess damage, and common claim denial reasons to avoid.';
$canonicalUrl = $siteUrl . '/blog/hail-damage-roof-claims-in-warren-county-first-72-hours/';
$currentPage = 'blog';

// FAQ data for visible section + schema
$faqs = [
    [
        'question' => 'How long do I have to file a hail damage roof claim in Missouri?',
        'answer' => 'Most Missouri homeowner policies require you to report damage "promptly" or "as soon as reasonably possible"—typically interpreted as within 30-60 days of the storm. Filing within the first 72 hours shows diligence and prevents insurer pushback on delayed reporting. Check your specific policy for exact deadlines.'
    ],
    [
        'question' => 'Will my insurance claim be denied if I wait a week to call?',
        'answer' => 'Not automatically, but delay gives insurers room to question whether damage was pre-existing or storm-related. The longer you wait, the harder it becomes to prove the hail event caused the damage—especially if additional storms occur between the hail date and your inspection.'
    ],
    [
        'question' => 'Do I need a contractor estimate before filing a claim?',
        'answer' => 'No. You should report the claim to your insurer first, before hiring a contractor. The adjuster will assess damage and provide a settlement estimate. A contractor inspection can identify issues the adjuster missed, but most insurers want their own assessment before approving repair work.'
    ],
    [
        'question' => 'What if the adjuster says my roof has no claimable damage?',
        'answer' => 'Request a written denial explaining why damage was deemed insufficient. You can hire a licensed public adjuster to re-inspect and appeal the denial, or get a second opinion from a contractor experienced in storm damage documentation. Missouri law allows you to dispute claim denials through the Department of Commerce and Insurance if the insurer is acting in bad faith.'
    ],
    [
        'question' => 'Can I choose my own roofing contractor for insurance repairs?',
        'answer' => 'Yes. Missouri law gives you the right to choose your own contractor—the insurance company cannot require you to use their "preferred vendor" network. However, your contractor\'s estimate must align with the adjuster\'s scope of work and settlement offer, or you\'ll negotiate the difference.'
    ]
];

// Schema: BlogPosting + BreadcrumbList + FAQPage
$faqSchemaItems = [];
foreach ($faqs as $faq) {
    $faqSchemaItems[] = [
        '@type' => 'Question',
        'name' => $faq['question'],
        'acceptedAnswer' => [
            '@type' => 'Answer',
            'text' => $faq['answer']
        ]
    ];
}

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
      "keywords": "hail damage roof insurance claim Missouri, Warren County hail damage, roof insurance claim first 72 hours, Missouri homeowner insurance claim, storm damage adjuster"
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
          "name": "Hail Damage Roof Claims",
          "item": "{$canonicalUrl}"
        }
      ]
    },
    {
      "@type": "FAQPage",
      "mainEntity": [
SCHEMA;

foreach ($faqSchemaItems as $i => $item) {
    $schema .= "\n        " . json_encode($item, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    if ($i < count($faqSchemaItems) - 1) $schema .= ',';
}

$schema .= <<<SCHEMA

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
/* Blog Post Styles */
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
  margin: 0 0 12px 0;
  color: var(--color-primary);
}

.faq-item p {
  margin: 0;
  color: var(--color-text);
  line-height: 1.7;
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
      <span>Hail Damage Roof Claims</span>
    </nav>

    <span class="blog-post-category">Roofing</span>

    <h1>Hail Damage Roof Insurance Claims: First 72 Hours in Missouri</h1>

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
      Missouri homeowner's guide to filing a hail damage roof insurance claim in Warren County. What to document in the
      first 72 hours, how adjusters assess damage, and common claim denial reasons to avoid.
    </p>
  </div>
</section>

<!-- Content -->
<article class="blog-post-content">
  <div class="answer-block">
    <p>
      <strong>In the first 72 hours after a hailstorm, you need to document roof damage with dated photos, call your
      insurance company to open a claim, and protect your property from further water intrusion.</strong> Don't climb
      on the roof yourself—photograph visible ground-level damage (dented gutters, cracked siding, granule piles in
      downspouts), review your policy for coverage limits and deductibles, and schedule a professional contractor
      inspection to identify concealed damage before the adjuster arrives.
    </p>
    <p>
      Missouri homeowner policies typically require "prompt" damage reporting—usually within 30-60 days of the storm—but
      filing within the first 72 hours shows diligence, prevents insurer pushback on delayed claims, and starts the
      settlement timeline before repair backlogs spike during hail season. Warren County sees concentrated hail events
      in spring (April-June), and contractors book weeks out after widespread storms.
    </p>
  </div>

  <h2>Step 1: Document Damage Immediately (Day 1)</h2>
  <p>
    Your insurance claim succeeds or fails on documentation. <strong>The adjuster will visit your property once,</strong>
    and if you can't show clear evidence that hail—not age, wind, or poor maintenance—caused the damage, the claim gets
    denied or reduced.
  </p>

  <h3>What to Photograph (Without Getting on the Roof)</h3>
  <ul>
    <li><strong>Dented or cracked gutters and downspouts:</strong> Hail dents are round, wind damage is linear. Count
    visible dents per section—adjusters use density as a severity indicator.</li>
    <li><strong>Granule loss in downspouts and around foundation:</strong> Fresh granule piles signal recent shingle
    impact damage. Photograph the pile, then scoop a sample into a clear bag for the adjuster visit.</li>
    <li><strong>Damaged siding, window trim, or soffit:</strong> Hail doesn't just hit the roof—impact marks on
    <a href="/services/siding/">vinyl siding</a>, wood trim, or aluminum fascia corroborate the claim and establish
    storm severity.</li>
    <li><strong>Outdoor fixtures (AC units, mailbox, deck railings):</strong> Dented HVAC covers or patio furniture
    prove hail size and impact force—useful when insurers question whether the storm was severe enough to damage shingles.</li>
    <li><strong>Date-stamped weather records:</strong> Screenshot NOAA storm reports, local news coverage, or
    Weather.gov radar images showing the hail event over your ZIP code. Missouri sees multiple hail events per season—
    timestamped proof ties damage to a specific date.</li>
  </ul>
  <p>
    Use your phone's camera—it automatically embeds GPS coordinates and timestamps in the metadata. Take wide shots
    showing property context (full home elevation with visible damage) and close-ups of individual impact points. The
    adjuster will use similar photos, so your documentation becomes the baseline for comparing their assessment.
  </p>

  <h3>Don't Climb on the Roof Yourself</h3>
  <p>
    <strong>Fall injuries void your liability coverage,</strong> and amateur inspections miss concealed damage that
    licensed contractors recognize—bruised shingles (subsurface mat fractures that don't break the surface immediately),
    compromised seal strips, and flashing separation that won't leak until the next rain. Hire a
    <a href="/services/roofing/">licensed Missouri roofing contractor</a> experienced in storm damage assessment—they
    know what adjusters look for and can document findings in your claim file.
  </p>

  <div class="cta-band">
    <h3>Need a Storm Damage Roof Inspection?</h3>
    <p>
      A&S Contracting Services provides free storm damage assessments for Warren County homeowners. We document hail
      impact damage with professional-grade photos, itemized damage reports, and scope-of-work estimates that align with
      insurance adjuster standards—no cost until you approve repair work.
    </p>
    <a href="/contact/" class="btn-primary">Schedule Free Inspection</a>
  </div>

  <h2>Step 2: Call Your Insurance Company (Day 1-2)</h2>
  <p>
    Once you've documented visible damage, contact your homeowner's insurance carrier to open a formal claim. Don't
    wait for a contractor estimate first—<strong>Missouri insurers want their adjuster to assess damage before you hire
    anyone for repairs,</strong> and delayed reporting gives them leverage to argue damage was pre-existing or
    storm-unrelated.
  </p>

  <h3>What to Tell the Claims Representative</h3>
  <ul>
    <li><strong>Storm date and time:</strong> Be specific. "We had a hailstorm on April 15, 2024, around 6:30 PM" is
    better than "sometime last week." Reference local news or NOAA reports if you're uncertain.</li>
    <li><strong>Visible damage:</strong> List what you photographed—dented gutters, granule loss, cracked siding—but
    don't speculate about roof shingle damage you haven't inspected. Stick to observable facts.</li>
    <li><strong>No emergency repairs yet:</strong> If the roof is actively leaking, you're required to mitigate
    further damage (tarp the area), but avoid permanent repairs before the adjuster visit. Most policies cover
    reasonable mitigation costs; premature full repairs let insurers argue you destroyed evidence.</li>
  </ul>
  <p>
    The representative will assign a claim number and schedule an adjuster visit—typically within 7-14 days in
    non-catastrophe conditions, longer after widespread hail events when adjusters are backlogged. Get the claim number
    in writing and confirm the adjuster's scheduled arrival window.
  </p>

  <h2>Step 3: Review Your Policy (Day 2-3)</h2>
  <p>
    While you're waiting for the adjuster, <strong>read your homeowner's policy declarations page and coverage
    endorsements.</strong> Not all policies cover the same scope, and knowing your limits before the settlement offer
    prevents unpleasant surprises.
  </p>

  <h3>Key Coverage Questions</h3>
  <ul>
    <li><strong>Replacement cost vs. actual cash value (ACV):</strong> Replacement cost pays for new materials at
    current prices; ACV deducts depreciation based on roof age. A 15-year-old roof on an ACV policy might only net you
    half the <a href="/blog/roof-replacement-cost-guide-missouri/">full replacement cost</a>, even if hail damage is
    total.</li>
    <li><strong>Deductible amount and type:</strong> Standard deductibles are flat dollar amounts ($500-$2,500).
    Some policies use percentage deductibles (1%-5% of dwelling coverage)—on a $250,000 insured home, a 2% wind/hail
    deductible is $5,000 out of pocket before insurance pays anything.</li>
    <li><strong>Wind/hail exclusions or separate deductibles:</strong> Missouri carriers sometimes separate wind/hail
    coverage with higher deductibles than general property damage. Check whether your policy includes a named-storm or
    catastrophic-loss clause that changes your deductible after declared disaster events.</li>
    <li><strong>Code upgrade coverage:</strong> If your roof was installed before current building codes (pre-2010
    underlayment standards, missing ice-and-water shield), replacement may require upgrades to meet code. Code upgrade
    endorsements cover the added cost; without it, you pay the difference.</li>
  </ul>

  <h2>Step 4: Get a Contractor Inspection Before the Adjuster (Day 3-7)</h2>
  <p>
    <strong>You're not required to have a contractor present during the adjuster visit, but it's highly
    recommended.</strong> Contractors experienced in storm damage claims know what adjusters overlook—concealed bruising,
    thermal cracking from hail impact, damaged underlayment visible only from the attic—and can advocate for full-scope
    replacement when adjusters try to approve patch repairs on systemic damage.
  </p>
  <p>
    A pre-adjuster contractor inspection gives you leverage: if the contractor documents 40% shingle damage across the
    roof and the adjuster only counts 15%, you have a competing professional opinion to support your appeal or request
    for re-inspection.
  </p>

  <h3>What Contractors Look For (That Adjusters Sometimes Miss)</h3>
  <ul>
    <li><strong>Bruised shingles:</strong> Subsurface mat fractures that don't show as visible cracks immediately, but
    fail within 1-3 years as moisture infiltrates. Adjusters trained to count only surface-visible damage may miss these.</li>
    <li><strong>Thermal shock cracking:</strong> Hail impact weakens the asphalt matrix; subsequent heat cycles cause
    delayed cracking along impact points. Fresh hail damage looks minor; six months later, the roof is failing.</li>
    <li><strong>Seal strip failure:</strong> Shingles bond via adhesive strips; hail impacts can break the bond without
    cracking the shingle. Wind-driven rain then lifts unsealed tabs, causing leaks the adjuster attributes to "wear and
    tear" instead of storm damage.</li>
    <li><strong>Flashing and penetration damage:</strong> Hail bends step flashing, cracks pipe boots, and dents ridge
    vents—secondary damage that leaks even if shingles are intact. Contractors check every penetration; adjusters often
    focus only on field shingles.</li>
  </ul>

  <h2>Common Reasons Hail Claims Get Denied (and How to Avoid Them)</h2>
  <p>
    Missouri insurers deny or reduce hail claims for predictable reasons. <strong>Most denials aren't about whether
    damage exists—they're about whether you proved the storm caused it.</strong>
  </p>

  <h3>Pre-Existing Damage</h3>
  <p>
    If your roof had curling shingles, granule loss, or visible wear before the hail event, the adjuster will argue
    current damage is age-related, not storm-caused. Counter this by providing dated photos showing roof condition
    before the storm (home inspection reports, real estate listings, or previous contractor evaluations work as
    baseline evidence).
  </p>

  <h3>Delayed Reporting</h3>
  <p>
    Filing three months after the storm—especially if additional storms occurred in the interim—lets insurers question
    which event caused damage. Missouri's frequent spring hail makes this a common denial tactic. File within 72 hours
    whenever possible, and reference specific NOAA storm reports by date.
  </p>

  <h3>Insufficient Damage Density</h3>
  <p>
    Adjusters use industry test squares (10x10 foot sections) to count impacts. If damage doesn't meet their carrier's
    threshold—often 8-12 impacts per square—they'll approve spot repairs instead of full replacement, even if damage is
    widespread. Contractor documentation showing higher impact counts across multiple roof planes can override this.
  </p>

  <h3>Maintenance Neglect</h3>
  <p>
    Policies exclude damage resulting from "lack of maintenance." If your gutters were clogged before the storm, causing
    ice damming that contributed to leaks after hail impact, the insurer can deny the water-damage portion of the claim.
    Keep maintenance records (gutter cleaning receipts, annual inspections) to prove the roof was properly maintained.
  </p>

  <section class="faq-section">
    <h2>Frequently Asked Questions</h2>
    <?php foreach ($faqs as $faq): ?>
    <div class="faq-item">
      <h3><?php echo htmlspecialchars($faq['question']); ?></h3>
      <p><?php echo htmlspecialchars($faq['answer']); ?></p>
    </div>
    <?php endforeach; ?>
  </section>

  <div class="related-articles">
    <h3>Related Articles</h3>
    <div class="related-grid">
      <?php
      // Show related posts from same category
      $relatedPosts = array_filter($blogPosts, function($post) {
        return $post['slug'] !== 'hail-damage-roof-claims-in-warren-county-first-72-hours' && $post['category'] === 'Roofing';
      });

      // Limit to 2 posts
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
