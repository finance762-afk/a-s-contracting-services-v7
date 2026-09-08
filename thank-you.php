<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ─── Page-level setup ───────────────────────────────────────────────────────
$currentPage     = 'thank-you';
$pageTitle       = 'Thank You';
$pageDescription = 'Thank you for contacting A&S Contracting Services. We will respond to your inquiry within one business day.';
$canonicalUrl    = $siteUrl . '/thank-you/';
$noindex         = true;  // Don't index thank-you pages

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>

<!-- Page-specific composition -->
<style>
.thankyou-hero { background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%); padding: calc(var(--nav-height) + var(--space-4xl)) var(--space-xl) var(--space-4xl); text-align: center; min-height: 70vh; display: flex; align-items: center; justify-content: center; }
.thankyou-content { max-width: 600px; margin: 0 auto; }
.thankyou-icon { width: 80px; height: 80px; background: rgba(255,255,255,0.2); backdrop-filter: blur(8px); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto var(--space-xl); border: 3px solid rgba(255,255,255,0.4); }
.thankyou-icon svg { color: #fff; }
.thankyou-hero h1 { color: #fff; margin-bottom: var(--space-md); font-size: 2.5rem; }
.thankyou-hero p { color: rgba(255,255,255,0.95); font-size: 1.15rem; margin-bottom: var(--space-xl); line-height: 1.7; }

.next-steps { background: var(--color-bg-alt); padding: var(--space-lg); border-radius: var(--radius-lg); margin-bottom: var(--space-2xl); text-align: left; border-left: 4px solid var(--color-accent); }
.next-steps h2 { color: #fff; font-size: 1.2rem; margin-bottom: var(--space-md); }
.next-steps ul { color: rgba(255,255,255,0.9); margin: 0; padding-left: var(--space-lg); }
.next-steps li { margin-bottom: var(--space-sm); line-height: 1.6; }

.cta-buttons { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; }
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- Thank You Hero -->
<section class="thankyou-hero" aria-label="Thank You">
  <div class="thankyou-content">
    <div class="thankyou-icon">
      <?php echo icon('check-circle', 40); ?>
    </div>
    <h1>Thank You!</h1>
    <p>
      We received your message and will get back to you within one business day. We're looking forward to
      discussing your project.
    </p>

    <div class="next-steps">
      <h2>What Happens Next?</h2>
      <ul>
        <li>We'll review your project details and reach out within 1 business day.</li>
        <li>If you requested an estimate, we'll schedule a free on-site visit at a time that works for you.</li>
        <li>You'll receive a detailed written quote with no pressure to move forward.</li>
        <li>If you approve the quote, we'll schedule your project start date.</li>
      </ul>
    </div>

    <p style="color: rgba(255,255,255,0.9); margin-bottom: var(--space-lg);">
      Need to reach us immediately? Give us a call:
    </p>

    <div class="cta-buttons">
      <a href="tel:<?php echo $phoneTel; ?>" class="btn-primary" style="font-size: 1.2rem; padding: var(--space-md) var(--space-2xl);">
        <?php echo icon('phone', 24); ?>
        Call <?php echo $phone; ?>
      </a>
      <a href="/" class="btn-secondary">
        <?php echo icon('home', 20); ?>
        Return Home
      </a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
