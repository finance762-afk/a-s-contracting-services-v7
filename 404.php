<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

// Set HTTP 404 status code
http_response_code(404);
?>
<?php
// ─── Page-level setup ───────────────────────────────────────────────────────
$currentPage     = '404';
$pageTitle       = 'Page Not Found';
$pageDescription = 'The page you are looking for could not be found. Return to the homepage or contact A&S Contracting Services for assistance.';
$canonicalUrl    = $siteUrl . '/404/';
$noindex         = true;  // Don't index 404 pages

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>

<!-- Page-specific composition -->
<style>
.error-hero { background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%); padding: calc(var(--nav-height) + var(--space-4xl)) var(--space-xl) var(--space-4xl); text-align: center; min-height: 60vh; display: flex; align-items: center; justify-content: center; }
.error-content { max-width: 600px; margin: 0 auto; }
.error-code { font-size: 8rem; font-weight: 900; color: rgba(255,255,255,0.2); line-height: 1; margin-bottom: var(--space-md); font-family: var(--font-heading); }
.error-hero h1 { color: #fff; margin-bottom: var(--space-md); font-size: 2rem; }
.error-hero p { color: rgba(255,255,255,0.9); font-size: 1.1rem; margin-bottom: var(--space-2xl); line-height: 1.6; }

.error-links { background: var(--color-bg); padding: var(--space-4xl) var(--space-xl); }
.error-links .container { max-width: var(--max-width); margin: 0 auto; text-align: center; }
.error-links h2 { margin-bottom: var(--space-lg); }
.popular-links { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: var(--space-md); margin-top: var(--space-xl); }
.popular-link { background: var(--color-bg-alt); padding: var(--space-lg); border-radius: var(--radius); text-decoration: none; display: flex; align-items: center; gap: var(--space-sm); transition: transform var(--transition), box-shadow var(--transition); border: 2px solid var(--color-border); }
.popular-link:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); border-color: var(--color-primary); }
.popular-link svg { color: var(--color-primary); flex-shrink: 0; }
.popular-link span { color: var(--color-text); font-weight: 600; }

.cta-buttons { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; margin-top: var(--space-2xl); }
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- Error Hero -->
<section class="error-hero" aria-label="Page Not Found">
  <div class="error-content">
    <div class="error-code">404</div>
    <h1>Page Not Found</h1>
    <p>
      The page you're looking for doesn't exist or has been moved. Let's get you back on track.
    </p>
    <div class="cta-buttons">
      <a href="/" class="btn-primary">
        <?php echo icon('home', 20); ?>
        Go Home
      </a>
      <a href="/contact/" class="btn-secondary">
        <?php echo icon('mail', 20); ?>
        Contact Us
      </a>
    </div>
  </div>
</section>

<!-- Popular Links -->
<section class="error-links">
  <div class="container">
    <h2>Looking for something specific?</h2>
    <p style="color: var(--color-text-light); margin-bottom: var(--space-xl);">
      Here are some of our most popular pages:
    </p>

    <div class="popular-links">
      <a href="/services/roofing/" class="popular-link">
        <?php echo icon('home', 20); ?>
        <span>Roofing Services</span>
      </a>
      <a href="/services/siding/" class="popular-link">
        <?php echo icon('layers', 20); ?>
        <span>Siding Services</span>
      </a>
      <a href="/services/gutters/" class="popular-link">
        <?php echo icon('droplets', 20); ?>
        <span>Gutter Services</span>
      </a>
      <a href="/about/" class="popular-link">
        <?php echo icon('users', 20); ?>
        <span>About Us</span>
      </a>
      <a href="/faq/" class="popular-link">
        <?php echo icon('help-circle', 20); ?>
        <span>FAQ</span>
      </a>
      <a href="/contact/" class="popular-link">
        <?php echo icon('phone', 20); ?>
        <span>Contact</span>
      </a>
    </div>

    <p style="margin-top: var(--space-2xl); color: var(--color-text-light);">
      Or call us directly at <a href="tel:<?php echo $phoneTel; ?>" style="color: var(--color-primary); font-weight: 700;"><?php echo $phone; ?></a>
    </p>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
