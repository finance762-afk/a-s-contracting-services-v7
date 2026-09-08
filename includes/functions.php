<?php
/**
 * Helper Functions — A&S Contracting Services
 * Phase 2, 2026-09-08
 */

// Prevent direct access
if (!defined('ABSPATH')) define('ABSPATH', $_SERVER['DOCUMENT_ROOT']);

/**
 * Check if current page matches a given page identifier
 * @param string $page Page identifier to check against $currentPage
 * @return bool
 */
function isActivePage($page) {
    global $currentPage;
    return isset($currentPage) && $currentPage === $page;
}

/**
 * Format phone number for display
 * @param string $phone Phone number in any format
 * @return string Formatted as (XXX) XXX-XXXX
 */
function formatPhone($phone) {
    // Strip all non-numeric characters
    $clean = preg_replace('/[^0-9]/', '', $phone);

    // Format as (XXX) XXX-XXXX
    if (strlen($clean) === 11 && substr($clean, 0, 1) === '1') {
        $clean = substr($clean, 1); // Remove leading 1
    }

    if (strlen($clean) === 10) {
        return sprintf('(%s) %s-%s',
            substr($clean, 0, 3),
            substr($clean, 3, 3),
            substr($clean, 6, 4)
        );
    }

    // Return original if not 10 digits
    return $phone;
}

/**
 * Generate slug from service name
 * @param string $name Service name
 * @return string URL-safe slug
 */
function getServiceSlug($name) {
    $slug = strtolower(trim($name));
    $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);
    $slug = preg_replace('/[\s-]+/', '-', $slug);
    $slug = preg_replace('/&/', 'and', $slug);
    return $slug;
}

/**
 * Generate slug from area city name
 * @param string $city City name
 * @return string URL-safe slug
 */
function getAreaSlug($city) {
    $slug = strtolower(trim($city));
    $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);
    $slug = preg_replace('/[\s-]+/', '-', $slug);
    return $slug;
}

/**
 * Generate Service schema JSON-LD
 * @param array $service Service array with name, description, keywords
 * @return string JSON-LD script tag
 */
function generateServiceSchema($service) {
    global $siteName, $siteUrl, $addressCity, $addressState;

    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        'name' => $service['name'],
        'description' => $service['description'],
        'provider' => [
            '@id' => $siteUrl . '/#organization'
        ],
        'areaServed' => [
            '@type' => 'City',
            'name' => $addressCity,
            'containedIn' => [
                '@type' => 'State',
                'name' => $addressState
            ]
        ]
    ];

    return '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
}

/**
 * Generate FAQPage schema JSON-LD
 * @param array $faqs Array of FAQ items with 'question' and 'answer' keys
 * @return string JSON-LD script tag
 */
function generateFAQSchema($faqs) {
    if (empty($faqs)) return '';

    $mainEntity = [];
    foreach ($faqs as $faq) {
        $mainEntity[] = [
            '@type' => 'Question',
            'name' => $faq['question'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => $faq['answer']
            ]
        ];
    }

    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => $mainEntity
    ];

    return '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
}

/**
 * Generate meta tags for SEO
 * @param string $title Page title
 * @param string $description Meta description
 * @param string $canonical Canonical URL
 * @return string Meta tags HTML
 */
function generateMetaTags($title, $description, $canonical) {
    global $siteName, $siteUrl;

    $output = '';
    $output .= '<title>' . htmlspecialchars($title) . '</title>' . "\n";
    $output .= '<meta name="description" content="' . htmlspecialchars($description) . '">' . "\n";
    $output .= '<link rel="canonical" href="' . htmlspecialchars($canonical) . '">' . "\n";

    // Open Graph
    $output .= '<meta property="og:title" content="' . htmlspecialchars($title) . '">' . "\n";
    $output .= '<meta property="og:description" content="' . htmlspecialchars($description) . '">' . "\n";
    $output .= '<meta property="og:url" content="' . htmlspecialchars($canonical) . '">' . "\n";
    $output .= '<meta property="og:site_name" content="' . htmlspecialchars($siteName) . '">' . "\n";

    return $output;
}

/**
 * Render a responsive <picture> for a local /assets/images/ photo.
 *
 * Emits an AVIF <source> + WebP <img srcset> using ONLY the variant files that
 * actually exist on disk (the pipeline generates -480/-960/-1600 in webp+avif,
 * but not every photo has a -1600). Never references a missing file.
 *
 * @param string $base Filename WITHOUT extension (the .jpg base name)
 * @param string $alt  Alt text (descriptive; "" for decorative)
 * @param array  $opts sizes|width|height|loading|fetchpriority|decoding|imgClass
 * @return string <picture> markup (falls back to a plain <img> if no variants)
 */
function p1_picture($base, $alt, $opts = []) {
    $dir = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/';
    $webset = [];
    $aviset = [];
    foreach ([480, 960, 1600] as $w) {
        if (file_exists($dir . $base . '-' . $w . '.webp')) $webset[] = "/assets/images/{$base}-{$w}.webp {$w}w";
        if (file_exists($dir . $base . '-' . $w . '.avif')) $aviset[] = "/assets/images/{$base}-{$w}.avif {$w}w";
    }

    $sizes    = $opts['sizes']    ?? '100vw';
    $loading  = $opts['loading']  ?? 'lazy';
    $decoding = $opts['decoding'] ?? ($loading === 'eager' ? 'sync' : 'async');

    $attrs  = ' alt="' . htmlspecialchars($alt) . '"';
    $attrs .= isset($opts['width'])  ? ' width="' . (int)$opts['width'] . '"'   : '';
    $attrs .= isset($opts['height']) ? ' height="' . (int)$opts['height'] . '"' : '';
    $attrs .= ' loading="' . htmlspecialchars($loading) . '" decoding="' . htmlspecialchars($decoding) . '"';
    $attrs .= !empty($opts['fetchpriority']) ? ' fetchpriority="' . htmlspecialchars($opts['fetchpriority']) . '"' : '';
    $attrs .= !empty($opts['imgClass'])      ? ' class="' . htmlspecialchars($opts['imgClass']) . '"'            : '';

    $out = '<picture>';
    if ($aviset) $out .= '<source type="image/avif" srcset="' . implode(', ', $aviset) . '" sizes="' . htmlspecialchars($sizes) . '">';
    $out .= '<img src="/assets/images/' . htmlspecialchars($base) . '.jpg"';
    if ($webset) $out .= ' srcset="' . implode(', ', $webset) . '" sizes="' . htmlspecialchars($sizes) . '"';
    $out .= $attrs . '></picture>';

    return $out;
}

/**
 * Render an inline SVG icon from references/lucide-icons/
 * @param string $name Icon name (without .svg extension)
 * @param int $size Icon width/height in pixels (default 24)
 * @param string $class Additional CSS classes
 * @return string SVG markup
 */
function icon($name, $size = 24, $class = '') {
    $iconPath = $_SERVER['DOCUMENT_ROOT'] . '/references/lucide-icons/' . $name . '.svg';

    if (!file_exists($iconPath)) {
        return '<!-- Icon not found: ' . htmlspecialchars($name) . ' -->';
    }

    $svg = file_get_contents($iconPath);

    // Add aria-hidden, width, height, and optional class
    $svg = str_replace('<svg', '<svg aria-hidden="true" width="' . $size . '" height="' . $size . '"' . ($class ? ' class="' . htmlspecialchars($class) . '"' : ''), $svg);

    return $svg;
}
