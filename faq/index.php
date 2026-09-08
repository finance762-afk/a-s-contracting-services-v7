<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ─── Page-level setup ───────────────────────────────────────────────────────
$pageType        = 'faq';
$currentPage     = 'faq';
$pageTitle       = 'Frequently Asked Questions';
$metaDescription = 'Common questions about A&S Contracting Services. Learn about our pricing, process, service area, timelines, and what to expect when you hire us for roofing, siding, or remodeling in Warrenton, MO.';
$canonicalUrl    = $siteUrl . '/faq/';

// FAQ data organized by category
$faqCategories = [
    'General' => [
        [
            'question' => 'Is A&S Contracting Services licensed and insured in Missouri?',
            'answer'   => 'Yes. A&S Contracting Services is a licensed Missouri general contractor and carries full insurance. Every roofing, siding, and remodeling project in Warrenton and Warren County is covered from the first estimate through final walkthrough.',
        ],
        [
            'question' => 'Does A&S Contracting Services subcontract any of its work?',
            'answer'   => 'No. A&S Contracting Services self-performs every trade—roofing, siding, gutters, drywall, windows, and interior work—with the same crew from start to finish. There are no subcontracted surprises and one accountable team stands behind the job.',
        ],
        [
            'question' => 'What areas around Warrenton does A&S Contracting Services serve?',
            'answer'   => 'A&S Contracting Services works within roughly 50 miles of Warrenton, MO, including Wright City, Foristell, Wentzville, Troy, Jonesburg, and Washington across Warren County and central Missouri.',
        ],
        [
            'question' => 'Do you offer free estimates?',
            'answer'   => 'Yes. Every estimate is free, with no obligation. We come out, inspect the project, and provide a detailed written quote. There is no pressure to move forward, and the estimate costs you nothing.',
        ],
    ],
    'Services' => [
        [
            'question' => 'What roofing services do you offer?',
            'answer'   => 'We handle new roof installations, full tear-offs and replacements, storm and hail damage repairs, and insurance claim documentation. We work with asphalt shingles, metal roofing, and other residential roofing systems.',
        ],
        [
            'question' => 'Can you handle both exterior and interior work?',
            'answer'   => 'Yes. A&S Contracting Services offers roofing, siding, gutters, windows, and doors on the exterior side, plus drywall, trim, paint, and full-scale interior renovations. We handle complete projects under one contract.',
        ],
        [
            'question' => 'Do you do commercial projects?',
            'answer'   => 'Yes. We work on both residential and commercial projects. Commercial jobs include roof repairs, siding replacements, interior tenant improvements, and maintenance contracts for property managers.',
        ],
        [
            'question' => 'Can A&S Contracting Services help with a storm or hail insurance claim?',
            'answer'   => 'Yes. A&S Contracting Services documents storm and hail damage, provides a detailed written estimate, and works alongside your insurer so the roofing or siding claim moves smoothly from inspection to installation.',
        ],
    ],
    'Pricing & Process' => [
        [
            'question' => 'How much does a new roof or siding job cost in Warrenton?',
            'answer'   => 'Every project is priced from a free written estimate—there is no flat number, because cost depends on square footage, materials, and the condition of the existing structure. A&S Contracting Services quotes exactly what you pay, with no upselling.',
        ],
        [
            'question' => 'Do you charge extra if the job takes longer than expected?',
            'answer'   => 'No. Our written estimate covers the entire project at the quoted price. If we run into unexpected issues—hidden rot, code upgrades—we discuss those with you before adding to the scope. The original quote stands unless you approve a change.',
        ],
        [
            'question' => 'What payment methods do you accept?',
            'answer'   => 'We accept checks, electronic transfers, and financing through approved third-party providers. Payment terms are outlined in your project contract, typically with a deposit at signing and final balance due upon completion.',
        ],
        [
            'question' => 'How does the project timeline work?',
            'answer'   => 'After you approve the estimate, we schedule a start date based on material lead times and our crew availability. Most roofing jobs are completed in 1-3 days. Larger renovations are scheduled with milestone dates outlined in the contract.',
        ],
    ],
    'Project Details' => [
        [
            'question' => 'How soon can A&S Contracting Services start my project?',
            'answer'   => 'A&S Contracting Services usually schedules a free on-site estimate within days and gives you a clear start window in writing. Because the same crew handles every stage, timelines stay predictable from the first day to the final walkthrough.',
        ],
        [
            'question' => 'Will I have the same crew for the entire project?',
            'answer'   => 'Yes. The team that starts your project is the same team that completes it. You are not managing multiple subcontractors or dealing with crew rotations.',
        ],
        [
            'question' => 'Do you clean up the job site?',
            'answer'   => 'Yes. We sweep, bag debris, and clear walkways at the end of every workday. Your property stays accessible and safe while work is underway. At project completion, we do a final cleanup and walkthrough.',
        ],
        [
            'question' => 'What happens if I need to cancel the project?',
            'answer'   => 'Cancellation terms are detailed in your contract. Generally, if you cancel before materials are ordered, your deposit is refunded minus administrative costs. After materials are ordered or work begins, you are responsible for materials and completed work.',
        ],
    ],
    'Materials & Warranties' => [
        [
            'question' => 'What brands of materials do you use?',
            'answer'   => 'We work with manufacturer-backed roofing, siding, and window products from trusted suppliers. Specific brands vary by project and client preference—we present options during the estimate and explain the differences in cost and warranty coverage.',
        ],
        [
            'question' => 'Do you offer warranties on your work?',
            'answer'   => 'Yes. Workmanship warranties are detailed in your project contract. Manufacturer warranties on materials (shingles, siding, windows) pass through to you at project completion and are backed by those manufacturers.',
        ],
        [
            'question' => 'Can I supply my own materials?',
            'answer'   => 'Generally no. We source materials directly from suppliers to ensure quality, correct quantities, and warranty coverage. Customer-supplied materials can void manufacturer warranties and create liability issues if defects appear later.',
        ],
    ],
];

// Build FAQPage schema from all FAQs
$allFaqs = [];
foreach ($faqCategories as $category => $faqs) {
    $allFaqs = array_merge($allFaqs, $faqs);
}
$faqSchema = generateFAQSchema($allFaqs);

// BreadcrumbList schema
$schemaGraph = [
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type' => 'WebPage',
            '@id' => $canonicalUrl . '#webpage',
            'url' => $canonicalUrl,
            'name' => $pageTitle,
            'description' => $metaDescription,
        ],
        [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Home',
                    'item' => $siteUrl . '/',
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => 'FAQ',
                    'item' => $canonicalUrl,
                ],
            ],
        ],
    ],
];
$schema = '<script type="application/ld+json">' . json_encode($schemaGraph, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
$schema .= "\n" . $faqSchema;

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>

<!-- Page-specific composition -->
<style>
.faq-hero { background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%); padding: calc(var(--nav-height) + var(--space-2xl)) var(--space-xl) var(--space-2xl); }
.faq-hero .container { max-width: var(--max-width); margin: 0 auto; text-align: center; }
.faq-hero h1 { color: #fff; margin-bottom: var(--space-sm); }
.faq-hero p { color: rgba(255,255,255,0.9); font-size: 1.1rem; max-width: 60ch; margin: 0 auto; }

.faq-content { max-width: var(--max-width); margin: 0 auto; padding: var(--space-4xl) var(--space-xl); }
.faq-category { margin-bottom: var(--space-3xl); }
.faq-category:last-child { margin-bottom: 0; }
.faq-category-title { font-size: 1.5rem; color: var(--color-primary); margin-bottom: var(--space-lg); padding-bottom: var(--space-sm); border-bottom: 3px solid var(--color-accent); }

.faq-item { margin-bottom: var(--space-lg); background: var(--color-bg-alt); border-radius: var(--radius); overflow: hidden; }
.faq-question { width: 100%; text-align: left; background: var(--color-bg-alt); border: 2px solid var(--color-border); border-radius: var(--radius); padding: var(--space-md) var(--space-lg); font-family: var(--font-heading); font-size: 1.1rem; font-weight: 600; color: var(--color-primary); cursor: pointer; display: flex; justify-content: space-between; align-items: center; gap: var(--space-md); transition: background var(--transition), border-color var(--transition); }
.faq-question:hover { background: var(--color-bg); border-color: var(--color-primary); }
.faq-question svg { flex-shrink: 0; transition: transform 0.3s ease; }
.faq-question.active svg { transform: rotate(180deg); }
.faq-answer { max-height: 0; overflow: hidden; transition: max-height 0.3s ease, padding 0.3s ease; padding: 0 var(--space-lg); }
.faq-answer.active { max-height: 400px; padding: var(--space-md) var(--space-lg) var(--space-lg); }
.faq-answer p { margin: 0; line-height: 1.7; color: var(--color-text); }

.faq-cta { background: var(--color-bg-dark); color: #fff; padding: var(--space-4xl) var(--space-xl); text-align: center; margin-top: var(--space-4xl); }
.faq-cta h2 { color: #fff; margin-bottom: var(--space-md); }
.faq-cta p { color: rgba(255,255,255,0.9); max-width: 60ch; margin: 0 auto var(--space-xl); font-size: 1.1rem; }
.cta-buttons { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; }
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- Hero -->
<section class="faq-hero" aria-label="Frequently Asked Questions">
  <div class="container">
    <h1>Frequently Asked Questions</h1>
    <p>
      Common questions about our services, pricing, process, and what to expect when you hire A&S Contracting
      Services for your roofing, siding, or remodeling project in Warrenton, MO.
    </p>
  </div>
</section>

<!-- Breadcrumb -->
<nav class="breadcrumb" aria-label="Breadcrumb">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li class="breadcrumb-sep" aria-hidden="true">›</li>
      <li aria-current="page">FAQ</li>
    </ol>
  </div>
</nav>

<!-- FAQ Content -->
<section class="faq-content">
  <?php foreach ($faqCategories as $category => $faqs): ?>
  <div class="faq-category">
    <h2 class="faq-category-title"><?php echo htmlspecialchars($category); ?></h2>

    <?php foreach ($faqs as $index => $faq): ?>
    <div class="faq-item">
      <button class="faq-question" aria-expanded="false" id="faq-q-<?php echo $category . '-' . $index; ?>">
        <span><?php echo htmlspecialchars($faq['question']); ?></span>
        <?php echo icon('chevron-down', 20); ?>
      </button>
      <div class="faq-answer" id="faq-a-<?php echo $category . '-' . $index; ?>" aria-labelledby="faq-q-<?php echo $category . '-' . $index; ?>">
        <p><?php echo htmlspecialchars($faq['answer']); ?></p>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
  <?php endforeach; ?>
</section>

<!-- CTA -->
<section class="faq-cta">
  <div class="container">
    <h2>Still Have Questions?</h2>
    <p>
      Can't find what you're looking for? Give us a call or send us a message. We're happy to answer any questions
      about your specific project.
    </p>
    <div class="cta-buttons">
      <a href="/contact/" class="btn-primary">Get Free Estimate</a>
      <a href="tel:<?php echo $phoneTel; ?>" class="btn-secondary">
        <?php echo icon('phone', 20); ?>
        Call <?php echo $phone; ?>
      </a>
    </div>
  </div>
</section>

<!-- FAQ Accordion JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  const faqQuestions = document.querySelectorAll('.faq-question');

  faqQuestions.forEach(function(question) {
    question.addEventListener('click', function() {
      const answer = this.nextElementSibling;
      const isActive = this.classList.contains('active');

      // Close all other FAQs
      document.querySelectorAll('.faq-question.active').forEach(function(q) {
        if (q !== question) {
          q.classList.remove('active');
          q.setAttribute('aria-expanded', 'false');
          q.nextElementSibling.classList.remove('active');
        }
      });

      // Toggle this FAQ
      if (isActive) {
        this.classList.remove('active');
        this.setAttribute('aria-expanded', 'false');
        answer.classList.remove('active');
      } else {
        this.classList.add('active');
        this.setAttribute('aria-expanded', 'true');
        answer.classList.add('active');
      }
    });
  });
});
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
