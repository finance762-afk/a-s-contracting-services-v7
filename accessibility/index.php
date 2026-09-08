<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ─── Page-level setup ───────────────────────────────────────────────────────
$currentPage       = 'accessibility';
$pageTitle         = 'Accessibility Statement';
$metaDescription   = 'A&S Contracting Services commitment to digital accessibility and WCAG 2.1 Level AA conformance.';
$canonicalUrl      = $siteUrl . '/accessibility/';
$lastUpdated       = date('F j, Y');

$companyState      = $addressState;
$companyEmail      = $email;
$companyPhone      = $phone;
$companyPhoneE164  = $phoneTel;
$companyAddress    = $businessAddress;

// BreadcrumbList + WebPage schema
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
                    'name' => 'Accessibility',
                    'item' => $canonicalUrl,
                ],
            ],
        ],
    ],
];
$schema = '<script type="application/ld+json">' . json_encode($schemaGraph, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- Hero -->
<section class="hero hero--legal" aria-label="Accessibility Statement">
  <div class="hero__copy">
    <span class="eyebrow-label">Legal</span>
    <h1>Accessibility Statement</h1>
    <span class="section-subtitle">inclusive design for everyone</span>
    <p class="hero__phone">Last Updated: <?php echo $lastUpdated; ?></p>
  </div>
</section>

<!-- Breadcrumb -->
<nav class="breadcrumb" aria-label="Breadcrumb">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li class="breadcrumb-sep" aria-hidden="true">›</li>
      <li aria-current="page">Accessibility</li>
    </ol>
  </div>
</nav>

<!-- Legal Content -->
<article class="legal-prose">

  <h2>1. Our Commitment</h2>
  <p><?php echo $siteName; ?> is committed to ensuring digital accessibility for people with disabilities. We continually improve the user experience for everyone and apply relevant accessibility standards to <?php echo $domain; ?>.</p>

  <h2>2. Conformance Status</h2>
  <p>This site is designed to conform with the <strong>Web Content Accessibility Guidelines (WCAG) 2.1 Level AA</strong>. WCAG defines requirements for designers and developers to improve accessibility for people with disabilities.</p>
  <p>Our site <strong>partially conforms</strong> with WCAG 2.1 Level AA, meaning some content does not yet fully meet the standard. We are working to address all known issues.</p>

  <h2>3. Accessibility Features</h2>
  <p>Our website includes the following accessibility features:</p>
  <ul>
    <li><strong>Semantic HTML5 markup</strong> with proper landmark regions (header, nav, main, footer)</li>
    <li><strong>Skip-to-content link</strong> at the top of every page, visible on keyboard focus</li>
    <li><strong>Visible keyboard focus indicators</strong> on all interactive elements (links, buttons, form fields)</li>
    <li><strong>Alt text</strong> on all meaningful images; decorative images marked with empty alt attributes</li>
    <li><strong>Sufficient color contrast</strong> for body text (minimum 4.5:1) and interactive elements (minimum 3:1)</li>
    <li><strong>Responsive design</strong> that works across screen sizes and zoom levels up to 200%</li>
    <li><strong>prefers-reduced-motion support</strong> — animations disabled for users who request reduced motion in their OS settings</li>
    <li><strong>ARIA labels</strong> on navigation menus, form elements, and interactive components</li>
    <li><strong>Form field labels</strong> associated with inputs via <code>for</code> and <code>id</code> attributes</li>
    <li><strong>Logical heading structure</strong> (H1 → H2 → H3) for screen reader navigation</li>
  </ul>

  <h2>4. Known Issues</h2>
  <p>We are aware of these areas needing improvement:</p>
  <ul>
    <li>Some third-party embeds (Google Maps, review widgets, social media) may not fully meet WCAG standards. We provide alternative ways to access this information: call us at <a href="tel:<?php echo $companyPhoneE164; ?>"><?php echo $companyPhone; ?></a> or email <a href="mailto:<?php echo $companyEmail; ?>"><?php echo $companyEmail; ?></a>.</li>
    <li>Some PDF documents may not be fully accessible. Contact us for alternative formats (plain text, large print).</li>
  </ul>

  <h2>5. Feedback and Reporting Issues</h2>
  <p>If you encounter an accessibility barrier on this site, please tell us. We aim to respond to accessibility feedback within <strong>5 business days</strong>.</p>
  <p>To report an issue:</p>
  <ul>
    <li>Email: <a href="mailto:<?php echo $companyEmail; ?>"><?php echo $companyEmail; ?></a></li>
    <li>Phone: <a href="tel:<?php echo $companyPhoneE164; ?>"><?php echo $companyPhone; ?></a></li>
  </ul>
  <p>Please include:</p>
  <ul>
    <li>The page URL where you encountered the issue</li>
    <li>A description of the problem</li>
    <li>The assistive technology you were using (if applicable)</li>
  </ul>

  <h2>6. Alternative Contact Methods</h2>
  <p>If our website is not accessible to you, you can reach us by phone or mail. We will provide service information in alternative formats on request.</p>
  <p>
    <strong><?php echo $siteName; ?></strong><br>
    Phone: <a href="tel:<?php echo $companyPhoneE164; ?>"><?php echo $companyPhone; ?></a><br>
    Email: <a href="mailto:<?php echo $companyEmail; ?>"><?php echo $companyEmail; ?></a><br>
    Mail: <?php echo $companyAddress; ?>
  </p>

  <h2>7. Changes to This Statement</h2>
  <p>We may update this Accessibility Statement from time to time as we improve site accessibility. The "Last Updated" date at the top will reflect the most recent version.</p>

  <h2>8. Contact Us</h2>
  <p>For questions about accessibility or to request accommodations:</p>
  <p>
    <strong><?php echo $siteName; ?></strong><br>
    Email: <a href="mailto:<?php echo $companyEmail; ?>"><?php echo $companyEmail; ?></a><br>
    Phone: <a href="tel:<?php echo $companyPhoneE164; ?>"><?php echo $companyPhone; ?></a><br>
    Address: <?php echo $companyAddress; ?>
  </p>

  <div class="legal-disclaimer">
    This Accessibility Statement is provided as a general template. We recommend reviewing this document with a licensed <?php echo $companyState; ?> attorney before publication.
  </div>

</article>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
