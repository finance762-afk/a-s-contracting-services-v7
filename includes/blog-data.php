<?php
/**
 * Blog Registry — A&S Contracting Services
 * Single source of truth for all blog posts
 *
 * This array is read by:
 * - /blog/index.php (full listing)
 * - index.php ("From the Blog" homepage preview)
 * - Related Articles blocks on individual posts
 * - sitemap.php (blog post URLs)
 *
 * NEVER hardcode post lists elsewhere — always read from this registry.
 */

$blogPosts = [
    [
        'slug'        => 'roof-replacement-cost-guide-missouri',
        'title'       => 'Roof Replacement Cost Guide for Missouri Homeowners',
        'excerpt'     => 'What does a new roof actually cost in Missouri? We break down material costs, labor rates, and the hidden factors that affect your final quote—plus what to watch for when comparing contractor estimates.',
        'image'       => '',  // no client photo yet
        'alt'         => 'Roofing contractor installing shingles on Missouri home',
        'date'        => 'September 8, 2024',
        'dateISO'     => '2024-09-08',
        'category'    => 'Roofing',
        'readtime'    => '8 min read',
    ],
    [
        'slug'        => 'when-to-replace-siding-missouri',
        'title'       => 'When to Replace Your Siding: Warning Signs Missouri Homeowners Miss',
        'excerpt'     => 'Cracked siding isn\'t always obvious from the curb. Learn the early warning signs Missouri homeowners overlook—warping, moisture intrusion, and rising energy bills—and when repair stops being cost-effective.',
        'image'       => '',  // no client photo yet
        'alt'         => 'Close-up of damaged vinyl siding showing warping and cracks',
        'date'        => 'September 8, 2024',
        'dateISO'     => '2024-09-08',
        'category'    => 'Siding',
        'readtime'    => '6 min read',
    ],
];
