<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/blog-data.php';

$pageTitle = 'Blog';
$metaDescription = 'Expert advice on roofing, siding, gutters, and home renovations from A&S Contracting Services. Learn about Missouri-specific building challenges, material choices, and maintenance tips from licensed contractors.';
$canonicalUrl = $siteUrl . '/blog/';
$currentPage = 'blog';

// Schema: BreadcrumbList
$schema = <<<SCHEMA
<script type="application/ld+json">
{
  "@context": "https://schema.org",
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
      "item": "{$canonicalUrl}"
    }
  ]
}
</script>
SCHEMA;

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* Blog Index Styles */
.hero--blog {
  background: linear-gradient(135deg, var(--color-primary) 0%, rgba(0,0,0,0.85) 100%);
  padding: calc(var(--nav-height) + 60px) 0 80px;
  position: relative;
  overflow: hidden;
}

.hero--blog::before {
  content: '';
  position: absolute;
  inset: 0;
  background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.02'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
  opacity: 0.4;
}

.hero--blog .container {
  position: relative;
  z-index: 1;
  max-width: 900px;
  text-align: center;
}

.breadcrumb {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  margin-bottom: 16px;
  font-size: 0.875rem;
  color: rgba(255,255,255,0.7);
}

.breadcrumb a {
  color: var(--color-accent);
  text-decoration: none;
  transition: color 0.2s;
}

.breadcrumb a:hover {
  color: #fff;
}

.breadcrumb-sep {
  color: rgba(255,255,255,0.4);
}

.eyebrow {
  font-family: var(--font-accent);
  font-size: 0.875rem;
  font-weight: 600;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  color: var(--color-accent);
  margin-bottom: 16px;
}

.hero--blog h1 {
  font-size: clamp(2rem, 5vw, 2.75rem);
  font-weight: 700;
  color: #fff;
  margin-bottom: 20px;
  line-height: 1.2;
}

.hero-answer {
  font-size: 1.125rem;
  line-height: 1.6;
  color: rgba(255,255,255,0.9);
  max-width: 700px;
  margin: 0 auto;
}

.blog-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
  gap: 40px;
  padding: 80px 0;
}

.blog-card {
  background: #fff;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
  transition: all 0.3s ease;
  border: 1px solid rgba(0,0,0,0.06);
  display: flex;
  flex-direction: column;
}

.blog-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 12px 24px rgba(0,0,0,0.12);
}

.blog-card__image {
  position: relative;
  aspect-ratio: 16 / 9;
  overflow: hidden;
  background: linear-gradient(135deg, var(--color-primary) 0%, rgba(0,0,0,0.7) 100%);
}

.blog-card__image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.3s ease;
}

.blog-card:hover .blog-card__image img {
  transform: scale(1.05);
}

.blog-card__category {
  position: absolute;
  top: 16px;
  left: 16px;
  background: var(--color-accent);
  color: var(--color-primary);
  padding: 6px 12px;
  border-radius: 4px;
  font-size: 0.75rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.05em;
}

.blog-card__body {
  padding: 24px;
  flex-grow: 1;
  display: flex;
  flex-direction: column;
}

.blog-card__meta {
  display: flex;
  align-items: center;
  gap: 16px;
  font-size: 0.875rem;
  color: var(--color-text-light);
  margin-bottom: 12px;
}

.blog-card__meta-item {
  display: flex;
  align-items: center;
  gap: 6px;
}

.blog-card__title {
  font-size: 1.375rem;
  font-weight: 700;
  color: var(--color-primary);
  margin-bottom: 12px;
  line-height: 1.3;
}

.blog-card__title a {
  color: inherit;
  text-decoration: none;
  transition: color 0.2s;
}

.blog-card__title a:hover {
  color: var(--color-accent);
}

.blog-card__excerpt {
  font-size: 0.9375rem;
  line-height: 1.6;
  color: var(--color-text);
  margin-bottom: 20px;
  flex-grow: 1;
}

.blog-card__cta {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  font-weight: 600;
  font-size: 0.9375rem;
  color: var(--color-primary);
  text-decoration: none;
  transition: gap 0.2s;
}

.blog-card__cta:hover {
  gap: 12px;
}

@media (max-width: 768px) {
  .blog-grid {
    grid-template-columns: 1fr;
    gap: 32px;
    padding: 60px 0;
  }
}
</style>

<!-- Hero Section -->
<section class="hero--blog">
  <div class="container">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="/">Home</a>
      <span class="breadcrumb-sep" aria-hidden="true">/</span>
      <span>Blog</span>
    </nav>

    <div class="eyebrow">Expert Advice & Insights</div>
    <h1>Contracting & Home Improvement <span class="text-accent">Blog</span></h1>
    <p class="hero-answer">
      Practical advice on roofing, siding, gutters, and renovations from licensed Missouri contractors.
      Learn about material choices, maintenance tips, cost factors, and what to look for when hiring a contractor.
    </p>
  </div>
</section>

<!-- Blog Grid -->
<section class="blog-grid container">
  <?php foreach ($blogPosts as $post): ?>
  <article class="blog-card">
    <div class="blog-card__image">
      <?php if (file_exists($_SERVER['DOCUMENT_ROOT'] . $post['image'])): ?>
      <img
        src="<?php echo $post['image']; ?>"
        alt="<?php echo htmlspecialchars($post['alt']); ?>"
        loading="lazy"
        width="600"
        height="338"
      >
      <?php endif; ?>
      <span class="blog-card__category"><?php echo htmlspecialchars($post['category']); ?></span>
    </div>
    <div class="blog-card__body">
      <div class="blog-card__meta">
        <span class="blog-card__meta-item">
          <?php echo icon('calendar', 16); ?>
          <?php echo htmlspecialchars($post['date']); ?>
        </span>
        <span class="blog-card__meta-item">
          <?php echo icon('clock', 16); ?>
          <?php echo htmlspecialchars($post['readtime']); ?>
        </span>
      </div>
      <h2 class="blog-card__title">
        <a href="/blog/<?php echo $post['slug']; ?>/"><?php echo htmlspecialchars($post['title']); ?></a>
      </h2>
      <p class="blog-card__excerpt"><?php echo htmlspecialchars($post['excerpt']); ?></p>
      <a href="/blog/<?php echo $post['slug']; ?>/" class="blog-card__cta">
        Read Article <?php echo icon('arrow-right', 18); ?>
      </a>
    </div>
  </article>
  <?php endforeach; ?>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
