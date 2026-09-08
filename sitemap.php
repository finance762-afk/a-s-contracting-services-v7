<?php
/**
 * Dynamic Sitemap — A&S Contracting Services
 * Phase 5, 2026-09-08
 *
 * Generates sitemap.xml from config.php ($services, $serviceAreas) + static pages.
 * .htaccess already rewrites /sitemap.xml to this file.
 *
 * NEVER create a static sitemap.xml — it goes stale and shadows the rewrite.
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

// Set XML content-type header
header('Content-Type: application/xml; charset=utf-8');

// Get current date for lastmod
$lastmod = date('Y-m-d');

// Start XML
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

// ─── Homepage ───────────────────────────────────────────────────────────────
echo "  <url>\n";
echo "    <loc>" . htmlspecialchars($siteUrl . '/') . "</loc>\n";
echo "    <lastmod>" . $lastmod . "</lastmod>\n";
echo "    <changefreq>weekly</changefreq>\n";
echo "    <priority>1.0</priority>\n";
echo "  </url>\n";

// ─── Service Pages (dynamic from config.php) ───────────────────────────────
echo "  <url>\n";
echo "    <loc>" . htmlspecialchars($siteUrl . '/services/') . "</loc>\n";
echo "    <lastmod>" . $lastmod . "</lastmod>\n";
echo "    <changefreq>monthly</changefreq>\n";
echo "    <priority>0.9</priority>\n";
echo "  </url>\n";

foreach ($services as $svc) {
    echo "  <url>\n";
    echo "    <loc>" . htmlspecialchars($siteUrl . '/services/' . $svc['slug'] . '/') . "</loc>\n";
    echo "    <lastmod>" . $lastmod . "</lastmod>\n";
    echo "    <changefreq>monthly</changefreq>\n";
    echo "    <priority>0.8</priority>\n";
    echo "  </url>\n";
}

// ─── Service Area Pages (Premium tier — dynamic from config.php) ───────────
if ($tier === 'premium' && count($serviceAreas) > 0) {
    echo "  <url>\n";
    echo "    <loc>" . htmlspecialchars($siteUrl . '/service-areas/') . "</loc>\n";
    echo "    <lastmod>" . $lastmod . "</lastmod>\n";
    echo "    <changefreq>monthly</changefreq>\n";
    echo "    <priority>0.7</priority>\n";
    echo "  </url>\n";

    foreach ($serviceAreas as $area) {
        $areaSlug = getAreaSlug($area['city']);
        $areaPath = $_SERVER['DOCUMENT_ROOT'] . '/areas/' . $areaSlug;

        // Only include if the area page actually exists
        if (is_dir($areaPath)) {
            echo "  <url>\n";
            echo "    <loc>" . htmlspecialchars($siteUrl . '/areas/' . $areaSlug . '/') . "</loc>\n";
            echo "    <lastmod>" . $lastmod . "</lastmod>\n";
            echo "    <changefreq>monthly</changefreq>\n";
            echo "    <priority>0.7</priority>\n";
            echo "  </url>\n";
        }
    }
}

// ─── Blog (Premium tier) ────────────────────────────────────────────────────
if ($tier === 'premium') {
    echo "  <url>\n";
    echo "    <loc>" . htmlspecialchars($siteUrl . '/blog/') . "</loc>\n";
    echo "    <lastmod>" . $lastmod . "</lastmod>\n";
    echo "    <changefreq>weekly</changefreq>\n";
    echo "    <priority>0.7</priority>\n";
    echo "  </url>\n";

    // Blog posts from registry
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/includes/blog-data.php')) {
        include $_SERVER['DOCUMENT_ROOT'] . '/includes/blog-data.php';
        if (isset($blogPosts) && is_array($blogPosts)) {
            foreach ($blogPosts as $post) {
                echo "  <url>\n";
                echo "    <loc>" . htmlspecialchars($siteUrl . '/blog/' . $post['slug'] . '/') . "</loc>\n";
                echo "    <lastmod>" . htmlspecialchars($post['dateISO']) . "</lastmod>\n";
                echo "    <changefreq>yearly</changefreq>\n";
                echo "    <priority>0.6</priority>\n";
                echo "  </url>\n";
            }
        }
    }
}

// ─── Static Pages ───────────────────────────────────────────────────────────
$staticPages = [
    ['path' => '/about/',   'priority' => '0.6', 'changefreq' => 'monthly'],
    ['path' => '/contact/', 'priority' => '0.8', 'changefreq' => 'monthly'],
    ['path' => '/faq/',     'priority' => '0.5', 'changefreq' => 'monthly'],
];

foreach ($staticPages as $page) {
    echo "  <url>\n";
    echo "    <loc>" . htmlspecialchars($siteUrl . $page['path']) . "</loc>\n";
    echo "    <lastmod>" . $lastmod . "</lastmod>\n";
    echo "    <changefreq>" . $page['changefreq'] . "</changefreq>\n";
    echo "    <priority>" . $page['priority'] . "</priority>\n";
    echo "  </url>\n";
}

// ─── Legal Pages (v6.1 — REQUIRED sitemap entries) ─────────────────────────
$legalPages = [
    '/privacy-policy/',
    '/terms/',
    '/cookie-policy/',
    '/accessibility/',
];

foreach ($legalPages as $legalPath) {
    echo "  <url>\n";
    echo "    <loc>" . htmlspecialchars($siteUrl . $legalPath) . "</loc>\n";
    echo "    <lastmod>" . $lastmod . "</lastmod>\n";
    echo "    <changefreq>yearly</changefreq>\n";
    echo "    <priority>0.3</priority>\n";
    echo "  </url>\n";
}

// Close XML
echo "</urlset>\n";
