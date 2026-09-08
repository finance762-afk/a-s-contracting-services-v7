<?php
/**
 * Footer — A&S Contracting Services
 * Phase 2, 2026-09-08
 *
 * Uses prefixed loop variables to avoid collision with page variables.
 */

// Require config if not already loaded
if (!isset($siteName)) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
}
?>

</main>

<!-- Footer -->
<footer class="site-footer">
  <div class="footer-top">
    <div class="container">
      <div class="footer-grid">

        <!-- Column 1: About / Trust Badges -->
        <div class="footer-col">
          <div class="footer-logo">
            <a href="/" aria-label="<?php echo $siteName; ?> Home">
              <picture>
                <source srcset="/assets/images/logo.webp?v=2" type="image/webp">
                <img src="/assets/images/logo.png?v=2" alt="<?php echo htmlspecialchars($siteName); ?> logo" width="800" height="407" loading="lazy" decoding="async">
              </picture>
            </a>
          </div>
          <p class="footer-tagline"><?php echo htmlspecialchars($tagline); ?></p>
          <p class="footer-description"><?php echo htmlspecialchars(substr($aboutDescription, 0, 180)); ?>…</p>

          <div class="footer-trust-badges">
            <div class="trust-badge">
              <?php echo icon('badge-check', 20); ?>
              <span>Licensed & Insured</span>
            </div>
            <div class="trust-badge">
              <?php echo icon('calendar-check', 20); ?>
              <span><?php echo $yearsInBusiness; ?> Years in Business</span>
            </div>
            <div class="trust-badge">
              <?php echo icon('award', 20); ?>
              <span>Free Estimates</span>
            </div>
          </div>
        </div>

        <!-- Column 2: Services Links (first half) -->
        <div class="footer-col">
          <h3 class="footer-heading">Our Services</h3>
          <ul class="footer-links">
            <?php
            $footSvcs = array_slice($services, 0, ceil(count($services) / 2));
            foreach ($footSvcs as $footSvc):
            ?>
            <li><a href="/services/<?php echo $footSvc['slug']; ?>/"><?php echo htmlspecialchars($footSvc['name']); ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>

        <!-- Column 3: Services Links (second half) or Service Areas -->
        <div class="footer-col">
          <?php if ($tier === 'premium' && count($serviceAreas) > 0): ?>
          <h3 class="footer-heading">Service Areas</h3>
          <ul class="footer-links">
            <?php
            $footAreas = array_slice($serviceAreas, 0, 5);
            foreach ($footAreas as $footArea):
              $areaSlug = getAreaSlug($footArea['city']);
              $areaExists = is_dir($_SERVER['DOCUMENT_ROOT'] . '/areas/' . $areaSlug);
            ?>
            <li>
              <?php if ($areaExists): ?>
              <a href="/areas/<?php echo $areaSlug; ?>/"><?php echo htmlspecialchars($footArea['city']); ?>, <?php echo $footArea['state']; ?></a>
              <?php else: ?>
              <a href="/service-areas/#<?php echo $areaSlug; ?>"><?php echo htmlspecialchars($footArea['city']); ?>, <?php echo $footArea['state']; ?></a>
              <?php endif; ?>
            </li>
            <?php endforeach; ?>
            <?php if (count($serviceAreas) > 5): ?>
            <li><a href="/service-areas/" class="view-all">View All Areas</a></li>
            <?php endif; ?>
          </ul>
          <?php else: ?>
          <h3 class="footer-heading">More Services</h3>
          <ul class="footer-links">
            <?php
            $footSvcs2 = array_slice($services, ceil(count($services) / 2));
            foreach ($footSvcs2 as $footSvc):
            ?>
            <li><a href="/services/<?php echo $footSvc['slug']; ?>/"><?php echo htmlspecialchars($footSvc['name']); ?></a></li>
            <?php endforeach; ?>
          </ul>
          <?php endif; ?>
        </div>

        <!-- Column 4: Contact Info -->
        <div class="footer-col">
          <h3 class="footer-heading">Contact Us</h3>
          <ul class="footer-contact">
            <li>
              <?php echo icon('phone', 18); ?>
              <a href="tel:<?php echo $phoneTel; ?>"><?php echo $phone; ?></a>
            </li>
            <li>
              <?php echo icon('mail', 18); ?>
              <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
            </li>
            <li>
              <?php echo icon('map-pin', 18); ?>
              <span>
                <?php if ($addressPublic && !empty($addressStreet)): ?>
                <?php echo htmlspecialchars($addressStreet); ?><br>
                <?php endif; ?>
                <?php echo $addressCity; ?>, <?php echo $addressState; ?> <?php echo $addressZip; ?>
              </span>
            </li>
            <li>
              <?php echo icon('clock', 18); ?>
              <span><?php echo htmlspecialchars($businessHours); ?></span>
            </li>
          </ul>

          <a href="/contact/" class="btn-primary footer-cta-btn">Get Free Estimate</a>
        </div>

      </div>
    </div>
  </div>

  <!-- AEO Entity Block (required for every page) -->
  <div class="footer-entity" itemscope itemtype="https://schema.org/LocalBusiness">
    <meta itemprop="name" content="<?php echo $siteName; ?>">
    <meta itemprop="url" content="<?php echo $siteUrl; ?>">
    <meta itemprop="telephone" content="<?php echo $phoneTel; ?>">
    <div class="container">
      <p>
        <strong><?php echo $siteName; ?></strong> is a licensed and insured general contractor based in
        <?php echo $addressCity; ?>, <?php echo $addressState; ?>, serving residential and commercial clients
        within a <?php echo $serviceRadius; ?>-mile radius. Founded in <?php echo $yearEstablished; ?>,
        we self-perform roofing, siding, gutters, drywall, windows, and full-scale renovations across
        Warren County and central Missouri—no subcontractors, no surprises.
        Call <a href="tel:<?php echo $phoneTel; ?>"><?php echo $phone; ?></a> for a free estimate.
      </p>
    </div>
  </div>

  <!-- Footer Legal Row (v6.1 compliance — REQUIRED) -->
  <div class="footer-legal-row">
    <div class="container">
      <nav aria-label="Legal">
        <a href="/privacy-policy/">Privacy Policy</a>
        <span class="footer-legal-divider">|</span>
        <a href="/terms/">Terms of Service</a>
        <span class="footer-legal-divider">|</span>
        <a href="/cookie-policy/">Cookie Policy</a>
        <span class="footer-legal-divider">|</span>
        <a href="/faq/">FAQ</a>
        <a href="/accessibility/">Accessibility</a>
        <span class="footer-legal-divider">|</span>
        <a href="/privacy-policy/#ccpa-rights">Do Not Sell or Share My Personal Information</a>
        <span class="footer-legal-divider">|</span>
        <a href="/sitemap.xml">Sitemap</a>
      </nav>
    </div>
  </div>

  <!-- Footer Bottom Bar -->
  <div class="footer-bottom">
    <div class="container">
      <p>&copy; <?php echo date('Y'); ?> <?php echo $siteName; ?>. All rights reserved.</p>
      <p>
        <a href="https://pageoneinsights.com" rel="dofollow" target="_blank">
          Web Design &amp; Hosting by Page One Insights, LLC
        </a>
      </p>
    </div>
  </div>

  <!-- Back to Top Button -->
  <button class="back-to-top" aria-label="Back to top" id="back-to-top" style="display:none;">
    <?php echo icon('arrow-up', 20); ?>
  </button>

</footer>

<!-- Mobile Floating CTA Bar (visible below 768px) -->
<div class="mobile-cta-bar">
  <a href="tel:<?php echo $phoneTel; ?>" class="mobile-cta-btn mobile-cta-call">
    <?php echo icon('phone', 20); ?>
    <span>Call</span>
  </a>
  <a href="/contact/" class="mobile-cta-btn mobile-cta-estimate">
    <?php echo icon('clipboard-list', 20); ?>
    <span>Estimate</span>
  </a>
</div>

<!-- Cookie Banner (v6.3 compliance) -->
<div class="cookie-banner" id="cookie-banner" role="region" aria-label="Cookie notice">
  <p class="cookie-banner__text">
    We use cookies to improve your experience and analyze site usage. By continuing, you agree to our use of cookies. <a href="/cookie-policy/">Learn more</a>.
  </p>
  <button type="button" class="cookie-banner__dismiss" id="cookie-banner-dismiss" aria-label="Dismiss cookie notice">Got it</button>
</div>

<!-- Scripts (v6.3 — ALL scripts carry defer, no CDN libraries) -->
<script src="/assets/js/main.js" defer></script>

<!-- Back-to-top inline script -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const backToTopBtn = document.getElementById('back-to-top');

    if (backToTopBtn) {
      window.addEventListener('scroll', function() {
        if (window.pageYOffset > 400) {
          backToTopBtn.style.display = 'flex';
        } else {
          backToTopBtn.style.display = 'none';
        }
      });

      backToTopBtn.addEventListener('click', function() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
      });
    }
  });
</script>

<!-- Cookie Banner Dismissal Script (v6.3) -->
<script>
(function () {
  var banner = document.getElementById('cookie-banner');
  var dismissBtn = document.getElementById('cookie-banner-dismiss');
  if (!banner || !dismissBtn) return;

  var storageKey = 'cookieBannerDismissed_v1';
  var dismissed = false;
  try { dismissed = localStorage.getItem(storageKey) === 'true'; } catch (e) {}

  if (dismissed) return;

  // Show banner after slight delay so it doesn't compete with first paint
  setTimeout(function () { banner.classList.add('is-visible'); }, 800);

  dismissBtn.addEventListener('click', function () {
    banner.classList.remove('is-visible');
    setTimeout(function () { banner.remove(); }, 500);
    try { localStorage.setItem(storageKey, 'true'); } catch (e) {}
  });
})();
</script>

</body>
</html>
