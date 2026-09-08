<?php
/**
 * Head Template — A&S Contracting Services
 * Phase 2, 2026-09-08
 *
 * Required variables set by each page before including:
 *   $pageTitle       — Page-specific title (will be combined with site name)
 *   $pageDescription — Page-specific description
 *   $canonicalUrl    — Self-referencing canonical URL
 *   $currentPage     — Page identifier for active nav state
 *
 * Optional variables:
 *   $heroPreload     — Array with 'srcset' and 'sizes' for hero image preload
 *   $noindex         — Boolean, adds noindex,nofollow if true
 *   $ogImage         — Open Graph image URL (defaults to logo)
 *   $schema          — Additional schema markup to append
 */

// Require config.php (using absolute path)
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

// Build full page title
$fullTitle = $pageTitle . ' | ' . $siteName . ' | ' . $addressCity . ', ' . $addressState;

// Default OG image if not set
if (!isset($ogImage)) {
    $ogImage = $siteUrl . '/assets/images/logo-og.jpg';
}
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php
// SEO Meta Tags
echo '<title>' . htmlspecialchars($fullTitle) . '</title>' . "\n";
echo '<meta name="description" content="' . htmlspecialchars($pageDescription) . '">' . "\n";

// Noindex for thank-you, legal pages when needed
if (isset($noindex) && $noindex === true) {
    echo '<meta name="robots" content="noindex,nofollow">' . "\n";
}

// Canonical URL
echo '<link rel="canonical" href="' . htmlspecialchars($canonicalUrl) . '">' . "\n";
?>

<!-- Open Graph Tags -->
<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo htmlspecialchars($pageTitle . ' | ' . $siteName); ?>">
<meta property="og:description" content="<?php echo htmlspecialchars($pageDescription); ?>">
<meta property="og:url" content="<?php echo htmlspecialchars($canonicalUrl); ?>">
<meta property="og:image" content="<?php echo htmlspecialchars($ogImage); ?>">
<meta property="og:site_name" content="<?php echo htmlspecialchars($siteName); ?>">
<meta property="og:locale" content="en_US">

<!-- Favicons -->
<link rel="icon" type="image/svg+xml" href="/assets/images/favicon.svg">
<link rel="icon" type="image/png" sizes="32x32" href="/assets/images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon-16x16.png">

<!-- Font Preload (v6.2 — self-hosted, above-the-fold heading face only) -->
<link rel="preload" href="/assets/fonts/bricolage-grotesque.woff2" as="font" type="font/woff2" crossorigin>

<?php
// Hero image preload (v6.3 — AVIF srcset with fetchpriority=high)
if (isset($heroPreload) && !empty($heroPreload['srcset'])) {
    echo '<link rel="preload" as="image" type="image/avif" imagesrcset="' . htmlspecialchars($heroPreload['srcset']) . '" imagesizes="' . htmlspecialchars($heroPreload['sizes']) . '" fetchpriority="high">' . "\n";
}
?>

<!-- Critical CSS (v6.3 — inlined, above-the-fold styles extracted from framework.css) -->
<style><?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/critical.css'; ?></style>

<!-- Framework CSS (v6.3 — non-blocking load with preload + onload trick) -->
<link rel="preload" href="/assets/css/framework.css?v=<?php echo $cssVersion; ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="/assets/css/framework.css?v=<?php echo $cssVersion; ?>"></noscript>

<!-- Google Analytics (placeholder — replace at launch) -->
<?php if ($googleAnalyticsId !== 'G-XXXXXXXXXX'): ?>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $googleAnalyticsId; ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', '<?php echo $googleAnalyticsId; ?>');
</script>
<?php endif; ?>

<!-- Schema.org JSON-LD — LocalBusiness (homepage only) -->
<?php if ($currentPage === 'home'): ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "GeneralContractor",
  "@id": "<?php echo $siteUrl; ?>/#organization",
  "name": "<?php echo $siteName; ?>",
  "url": "<?php echo $siteUrl; ?>",
  "logo": "<?php echo $siteUrl; ?>/assets/images/logo.png",
  "image": "<?php echo $siteUrl; ?>/assets/images/logo-og.jpg",
  "description": "<?php echo htmlspecialchars($aboutDescription); ?>",
  "telephone": "<?php echo $phoneTel; ?>",
  "email": "<?php echo $email; ?>",
  "address": {
    "@type": "PostalAddress",
    <?php if ($addressPublic && !empty($addressStreet)): ?>
    "streetAddress": "<?php echo htmlspecialchars($addressStreet); ?>",
    <?php endif; ?>
    "addressLocality": "<?php echo $addressCity; ?>",
    "addressRegion": "<?php echo $addressState; ?>",
    "postalCode": "<?php echo $addressZip; ?>",
    "addressCountry": "US"
  },
  "areaServed": {
    "@type": "GeoCircle",
    "geoMidpoint": {
      "@type": "GeoCoordinates",
      "latitude": "38.8098",
      "longitude": "-91.1401"
    },
    "geoRadius": "<?php echo $serviceRadius; ?> miles"
  },
  "priceRange": "$$",
  "openingHoursSpecification": [
    {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
      "opens": "07:00",
      "closes": "18:00"
    },
    {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": "Saturday",
      "opens": "08:00",
      "closes": "15:00"
    }
  ]
}
</script>
<?php endif; ?>

<?php
// Additional page-specific schema (set by individual pages)
if (isset($schema) && !empty($schema)) {
    echo $schema . "\n";
}
?>

</head>
<body>
