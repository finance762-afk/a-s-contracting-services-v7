<?php
/**
 * SEO Verification Script — Phase 5
 * Checks all pages for SEO completeness
 */

$issues = [];
$passes = 0;
$fails = 0;

// Get all index.php files
$pages = [];
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator("."));
foreach ($iterator as $file) {
    if ($file->isFile() && $file->getFilename() === "index.php") {
        $path = $file->getPathname();
        if (strpos($path, "/includes/") === false && strpos($path, "/references/") === false) {
            $pages[] = $path;
        }
    }
}
sort($pages);

echo "SEO VERIFICATION REPORT\n";
echo "=======================\n\n";
echo "Checking " . count($pages) . " pages...\n\n";

foreach ($pages as $pagePath) {
    $content = file_get_contents($pagePath);
    $pageIssues = [];

    // Check for pageTitle
    if (!preg_match('/\$pageTitle\s*=\s*[\'"](.+?)[\'"];/', $content, $titleMatch)) {
        $pageIssues[] = "Missing \$pageTitle";
    } else {
        $title = $titleMatch[1];
        if (strlen($title) > 60) {
            $pageIssues[] = "Title too long (" . strlen($title) . " chars): $title";
        }
    }

    // Check for metaDescription
    if (!preg_match('/\$pageDescription\s*=\s*[\'"](.+?)[\'"];/s', $content, $descMatch)) {
        $pageIssues[] = "Missing \$pageDescription";
    } else {
        $desc = $descMatch[1];
        if (strlen($desc) < 140 || strlen($desc) > 160) {
            $pageIssues[] = "Meta description length issue (" . strlen($desc) . " chars, should be 140-160)";
        }
    }

    // Check for placeholder text
    $placeholders = ['Lorem ipsum', 'TODO', 'PLACEHOLDER', 'example.com', '555-', '[VERIFY]', 'XXXXXXXXXX'];
    foreach ($placeholders as $placeholder) {
        if (stripos($content, $placeholder) !== false) {
            $pageIssues[] = "Contains placeholder: $placeholder";
        }
    }

    // Check for schema
    if (!preg_match('/\$schema\s*=/', $content)) {
        $pageIssues[] = "Missing \$schema variable";
    }

    // Check for canonicalUrl
    if (!preg_match('/\$canonicalUrl\s*=/', $content)) {
        $pageIssues[] = "Missing \$canonicalUrl";
    }

    // Report
    if (empty($pageIssues)) {
        $passes++;
    } else {
        $fails++;
        $issues[$pagePath] = $pageIssues;
    }
}

echo "\n";
echo "RESULTS:\n";
echo "--------\n";
echo "✓ Passed: $passes pages\n";
echo "✗ Failed: $fails pages\n\n";

if (!empty($issues)) {
    echo "ISSUES FOUND:\n";
    echo "-------------\n";
    foreach ($issues as $page => $pageIssues) {
        echo "\n" . $page . ":\n";
        foreach ($pageIssues as $issue) {
            echo "  - " . $issue . "\n";
        }
    }
} else {
    echo "All pages passed SEO verification!\n";
}

echo "\n";
