<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/blog-data.php';

$pageType = 'blog';
$pageTitle = 'Roof Replacement Cost Guide for Missouri Homeowners';
$pageDescription = 'What does a new roof cost in Missouri? Licensed contractor breaks down material costs, labor rates, and hidden factors that affect your quote. Compare asphalt shingle, metal, and flat roof pricing.';
$canonicalUrl = $siteUrl . '/blog/roof-replacement-cost-guide-missouri/';
$currentPage = 'blog';

// Schema: BlogPosting + BreadcrumbList
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
      "datePublished": "2024-09-08",
      "dateModified": "2024-09-08",
      "url": "{$canonicalUrl}",
      "keywords": "roof replacement cost Missouri, roofing costs Warren County, asphalt shingle cost, metal roof cost, contractor estimate"
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
          "name": "Roof Replacement Cost Guide",
          "item": "{$canonicalUrl}"
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
      <span>Roof Replacement Cost Guide</span>
    </nav>

    <span class="blog-post-category">Roofing</span>

    <h1>Roof Replacement Cost Guide for Missouri Homeowners</h1>

    <div class="blog-post-meta">
      <span class="blog-post-meta__item">
        <?php echo icon('calendar', 16); ?>
        September 8, 2024
      </span>
      <span class="blog-post-meta__item">
        <?php echo icon('clock', 16); ?>
        8 min read
      </span>
    </div>

    <p class="blog-post-excerpt">
      What does a new roof actually cost in Missouri? We break down material costs, labor rates, and the hidden
      factors that affect your final quote—plus what to watch for when comparing contractor estimates.
    </p>
  </div>
</section>

<!-- Content -->
<article class="blog-post-content">
  <div class="answer-block">
    <p>
      <strong>A full roof replacement in Missouri typically costs $8,000–$25,000 for a 2,000-square-foot home,</strong>
      depending on material choice, roof complexity, and whether you're tearing off existing layers or building over them.
      Asphalt shingles (the most common choice) run $350–$550 per square (100 sq ft) installed, metal roofing costs
      $700–$1,200 per square, and flat or low-slope systems range from $450–$800 per square.
    </p>
    <p>
      Those ranges reflect real quotes from licensed Missouri contractors serving Warren, Lincoln, St. Charles, and Franklin
      counties. The final number depends on pitch, access, tearoff requirements, ventilation upgrades, and whether your
      insurer is covering storm damage or you're paying out of pocket for a planned upgrade.
    </p>
  </div>

  <h2>What Drives the Cost of a Roof Replacement?</h2>
  <p>
    Roof replacement costs aren't arbitrary—they're built from measurable inputs. Understanding what contractors price
    lets you compare quotes accurately and spot lowball estimates that skip necessary work.
  </p>

  <h3>Material Choice</h3>
  <p>
    <strong><a href="/services/roofing/">Roofing material</a> is the single largest cost driver.</strong> Missouri homeowners
    choose from:
  </p>
  <ul>
    <li><strong>Asphalt shingles (3-tab):</strong> $90–$150 per square (materials only). Shortest lifespan (15–20 years),
    minimal wind resistance. Rarely installed on new construction anymore.</li>
    <li><strong>Asphalt shingles (architectural/dimensional):</strong> $120–$250 per square. Most common choice. 25–30 year
    warranty, Class 4 impact ratings available, wind resistance to 110+ mph.</li>
    <li><strong>Metal roofing (standing seam):</strong> $400–$700 per square. 40–50 year lifespan, excellent wind and hail
    resistance, energy-efficient. Higher upfront cost, lower lifetime cost.</li>
    <li><strong>Flat/low-slope systems (TPO, EPDM, modified bitumen):</strong> $250–$500 per square. Commercial-grade membranes
    for <a href="/services/general-contracting/">low-slope residential applications</a>. Requires professional installation—DIY
    fails are common.</li>
  </ul>

  <h3>Roof Size & Complexity</h3>
  <p>
    Contractors measure roofs in "squares" (100 square feet). A 2,000-square-foot home typically has 20–24 squares of roof
    area once you account for pitch and overhangs. Steeper pitch means more material and slower work—a 12/12 pitch roof
    costs 20–30% more to install than a 4/12 pitch with the same footprint.
  </p>
  <p>
    Complexity adds labor time: every valley, dormer, chimney, and skylight slows production and increases the risk of
    leaks if flashing isn't detailed correctly. A simple gable roof on a ranch house costs less per square than a multi-hip
    Victorian with six dormers and two chimneys.
  </p>

  <h3>Tearoff vs. Overlay</h3>
  <p>
    <strong>Tearoff (removing existing shingles) adds $100–$150 per square in labor and disposal costs,</strong> but it's
    the only way to inspect the deck for rot, ensure proper ventilation, and install a code-compliant underlayment.
    Most building codes in Missouri allow one layer of shingles over an existing roof, but we don't recommend it—you're
    covering problems you can't see, shortening the new roof's lifespan, and creating a tearoff nightmare when that layer fails.
  </p>

  <h3>Ventilation & Underlayment Upgrades</h3>
  <p>
    Missouri's humid summers and freeze-thaw winters demand proper attic ventilation (ridge vent + soffit intake) and
    a quality underlayment. Synthetic underlayment costs $50–$100 more per square than felt paper, but it won't tear during
    installation, resists UV exposure during construction delays, and provides better secondary water protection.
  </p>

  <div class="cta-band">
    <h3>Need a Written Roof Estimate?</h3>
    <p>
      A&S Contracting Services provides free, no-obligation written estimates for all <a href="/services/roofing/" style="color: var(--color-primary); text-decoration: underline;">roofing projects</a>
      across Warren, St. Charles, Lincoln, and Franklin counties. We'll visit your property, measure the roof, and
      provide line-item pricing—no surprises.
    </p>
    <a href="/contact/" class="btn-primary">Get Free Estimate</a>
  </div>

  <h2>How Do I Compare Contractor Estimates?</h2>
  <p>
    Not all roof quotes are structured the same way. Some contractors give you a single lump-sum number with no breakdown.
    Others provide line-item pricing that shows exactly what you're paying for. <strong>A detailed estimate lets you compare
    apples to apples.</strong>
  </p>
  <p>
    Look for these details in every quote:
  </p>
  <ul>
    <li><strong>Material brand and model:</strong> "architectural shingles" isn't enough. Is it Owens Corning Duration, GAF
    Timberline HDZ, or a builder-grade shingle with a 20-year warranty? Brand and model determine wind rating, impact
    resistance, and warranty transferability.</li>
    <li><strong>Scope of work:</strong> Does the estimate include tearoff, disposal, new underlayment, drip edge, ridge
    vent, and flashing replacement? Or just "new shingles installed"?</li>
    <li><strong>Warranty coverage:</strong> Manufacturer's warranty (material defects) is separate from workmanship warranty
    (installation errors). A 30-year shingle warranty doesn't cover leaks from improper flashing—that's on the contractor.</li>
    <li><strong>Timeline and payment terms:</strong> How long will the job take? What's the deposit requirement? When is
    final payment due? Avoid contractors who demand full payment upfront or work on a "pay when we're done, no contract" basis.</li>
  </ul>

  <h2>What About Insurance Claims?</h2>
  <p>
    If your roof suffered hail or wind damage, your homeowner's insurance may cover replacement. <strong>Contractors can't
    negotiate with your adjuster on your behalf</strong> (that requires a public adjuster license in Missouri), but we can
    document damage, provide repair estimates, and point out issues the adjuster might miss during their initial inspection.
  </p>
  <p>
    Insurance typically covers "like kind and quality" replacement—if you had architectural shingles, they'll pay for
    architectural shingles. Upgrades (impact-resistant shingles, metal roofing, additional ventilation) are out-of-pocket
    unless your policy specifically covers them.
  </p>

  <h2>When Is Repair More Cost-Effective Than Replacement?</h2>
  <p>
    Not every roof problem requires a full tearoff. <strong>Localized damage—missing shingles, isolated leaks, damaged
    flashing—can often be repaired</strong> if the rest of the roof is sound and you're not approaching the end of its
    rated lifespan.
  </p>
  <p>
    A good rule: if repair costs exceed 30% of replacement cost, or if your roof is past 70% of its expected lifespan,
    replacement is the better long-term investment. Patching a 20-year-old roof with widespread granule loss and curling
    shingles just delays the inevitable—and you'll pay for both the repair and the replacement within a few years.
  </p>

  <div class="related-articles">
    <h3>Related Articles</h3>
    <div class="related-grid">
      <?php
      // Show other blog posts (exclude current)
      $relatedPosts = array_filter($blogPosts, function($post) {
        return $post['slug'] !== 'roof-replacement-cost-guide-missouri';
      });
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
