<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ─── Page-level setup ───────────────────────────────────────────────────────
$currentPage       = 'cookie-policy';
$pageTitle         = 'Cookie Policy';
$metaDescription   = 'How A&S Contracting Services uses cookies and tracking technologies on our website.';
$canonicalUrl      = $siteUrl . '/cookie-policy/';
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
                    'name' => 'Cookie Policy',
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
<section class="hero hero--legal" aria-label="Cookie Policy">
  <div class="hero__copy">
    <span class="eyebrow-label">Legal</span>
    <h1>Cookie Policy</h1>
    <span class="section-subtitle">how we track and what you control</span>
    <p class="hero__phone">Last Updated: <?php echo $lastUpdated; ?></p>
  </div>
</section>

<!-- Breadcrumb -->
<nav class="breadcrumb" aria-label="Breadcrumb">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li class="breadcrumb-sep" aria-hidden="true">›</li>
      <li aria-current="page">Cookie Policy</li>
    </ol>
  </div>
</nav>

<!-- Legal Content -->
<article class="legal-prose">

  <h2>1. What Are Cookies?</h2>
  <p>Cookies are small text files stored on your device when you visit a website. They are used to make websites work more efficiently and provide information to site owners about how visitors use the site.</p>

  <h2>2. Cookies We Use</h2>

  <h3>Strictly Necessary</h3>
  <p>Essential for site functionality (form submission, security, session persistence). These cannot be disabled without breaking core site features.</p>
  <p><strong>Examples:</strong></p>
  <ul>
    <li>Session cookies during contact form submission</li>
    <li>Cookie banner dismissal preference (localStorage)</li>
  </ul>

  <h3>Analytics (Google Analytics 4)</h3>
  <p>We use Google Analytics 4 to understand how visitors use our site. GA4 sets cookies prefixed with <code>_ga</code> and <code>_gid</code>. Data is anonymized via IP truncation and used solely to improve site performance and content.</p>
  <p><strong>Information collected:</strong></p>
  <ul>
    <li>Pages visited</li>
    <li>Time spent on site</li>
    <li>Referring website or search engine</li>
    <li>Device type and browser</li>
    <li>General geographic location (city/state level, not exact address)</li>
  </ul>

  <h3>Third-Party Embeds</h3>
  <p>Our site may embed tools and content from third parties (Google Maps, social media, manufacturer partner sites, review widgets). These services may set their own cookies subject to their own privacy policies. We do not control third-party cookies.</p>

  <h2>3. How to Control Cookies</h2>
  <p>Most browsers allow you to view, delete, or block cookies through their settings. You can:</p>
  <ul>
    <li>Block third-party cookies only (while allowing first-party cookies for site functionality)</li>
    <li>Block all cookies (note: this may break site functionality such as contact forms)</li>
    <li>Delete cookies after each browsing session</li>
    <li>Set your browser to ask for permission before accepting each cookie</li>
  </ul>
  <p>Browser-specific instructions are available from:</p>
  <ul>
    <li><a href="https://support.google.com/chrome/answer/95647" target="_blank" rel="noopener">Google Chrome</a></li>
    <li><a href="https://support.mozilla.org/en-US/kb/enhanced-tracking-protection-firefox-desktop" target="_blank" rel="noopener">Mozilla Firefox</a></li>
    <li><a href="https://support.apple.com/guide/safari/manage-cookies-sfri11471/mac" target="_blank" rel="noopener">Apple Safari</a></li>
    <li><a href="https://support.microsoft.com/en-us/microsoft-edge/delete-cookies-in-microsoft-edge-63947406-40ac-c3b8-57b9-2a946a29ae09" target="_blank" rel="noopener">Microsoft Edge</a></li>
  </ul>

  <h2>4. Opt Out of Google Analytics</h2>
  <p>You can opt out of GA4 tracking site-wide by installing the <a href="https://tools.google.com/dlpage/gaoptout" target="_blank" rel="noopener">Google Analytics Opt-out Browser Add-on</a>.</p>

  <h2>5. Our Cookie Notice</h2>
  <p>We display a brief banner notifying visitors of our cookie use on first visit. Once dismissed, the banner is suppressed for future visits via localStorage. You can re-enable the banner by clearing your browser's site data for <?php echo $domain; ?>.</p>

  <h2>6. Changes to This Policy</h2>
  <p>We may update this Cookie Policy from time to time. The "Last Updated" date at the top will reflect the most recent change. Material changes will be prominently posted on the site.</p>

  <h2>7. Contact Us</h2>
  <p>For questions about cookies or to exercise your privacy rights:</p>
  <p>
    <strong><?php echo $siteName; ?></strong><br>
    Email: <a href="mailto:<?php echo $companyEmail; ?>"><?php echo $companyEmail; ?></a><br>
    Phone: <a href="tel:<?php echo $companyPhoneE164; ?>"><?php echo $companyPhone; ?></a><br>
    Address: <?php echo $companyAddress; ?>
  </p>

  <div class="legal-disclaimer">
    This Cookie Policy is provided as a general template. We recommend reviewing this document with a licensed <?php echo $companyState; ?> attorney before publication.
  </div>

</article>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
