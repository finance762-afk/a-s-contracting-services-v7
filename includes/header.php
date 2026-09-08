<?php
/**
 * Header / Navigation — A&S Contracting Services
 * Phase 2, 2026-09-08
 *
 * Requires $currentPage to be set by the including page.
 * Uses prefixed loop variables to avoid collision with page variables.
 */

// Require config if not already loaded
if (!isset($siteName)) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
}
?>

<!-- Skip to main content (accessibility) -->
<a href="#main-content" class="skip-link">Skip to main content</a>

<!-- Header -->
<header class="site-header site-header--dark" data-header>
  <nav class="navbar" role="navigation" aria-label="Main navigation">
    <div class="navbar-inner container">

      <!-- Logo (client logo, cut to transparency from intake JPG — silver on dark, hence .site-header--dark) -->
      <a href="/" class="site-logo" aria-label="<?php echo $siteName; ?> Home">
        <picture>
          <source srcset="/assets/images/logo.webp?v=2" type="image/webp">
          <img src="/assets/images/logo.png?v=2" alt="<?php echo htmlspecialchars($siteName); ?> logo" width="800" height="407" fetchpriority="high" decoding="async">
        </picture>
      </a>

      <!-- Desktop Navigation Links -->
      <ul class="navbar-links" role="menubar">
        <li role="none">
          <a href="/" role="menuitem" <?php if ($currentPage === 'home') echo 'aria-current="page"'; ?>>Home</a>
        </li>

        <!-- Services Dropdown -->
        <li class="has-dropdown" role="none">
          <button class="dropdown-toggle" aria-haspopup="true" aria-expanded="false" id="services-menu-btn">
            Services <?php echo icon('chevron-down', 16); ?>
          </button>
          <ul class="dropdown" role="menu" aria-labelledby="services-menu-btn" style="display:none">
            <?php foreach ($services as $navSvc): ?>
            <li role="none">
              <a href="/services/<?php echo $navSvc['slug']; ?>/" role="menuitem"><?php echo htmlspecialchars($navSvc['name']); ?></a>
            </li>
            <?php endforeach; ?>
          </ul>
        </li>

        <!-- Service Areas Dropdown (Premium tier) -->
        <?php if ($tier === 'premium'): ?>
        <li class="has-dropdown" role="none">
          <button class="dropdown-toggle" aria-haspopup="true" aria-expanded="false" id="areas-menu-btn">
            Service Areas <?php echo icon('chevron-down', 16); ?>
          </button>
          <ul class="dropdown" role="menu" aria-labelledby="areas-menu-btn" style="display:none">
            <?php foreach ($serviceAreas as $navArea):
              $areaSlug = getAreaSlug($navArea['city']);
              $areaPath = '/areas/' . $areaSlug . '/';
              // Only link if the page exists on disk
              $areaExists = is_dir($_SERVER['DOCUMENT_ROOT'] . '/areas/' . $areaSlug);
            ?>
            <li role="none">
              <?php if ($areaExists): ?>
              <a href="<?php echo $areaPath; ?>" role="menuitem"><?php echo htmlspecialchars($navArea['city']); ?></a>
              <?php else: ?>
              <a href="/service-areas/#<?php echo $areaSlug; ?>" role="menuitem"><?php echo htmlspecialchars($navArea['city']); ?></a>
              <?php endif; ?>
            </li>
            <?php endforeach; ?>
            <li role="none" class="dropdown-cta">
              <a href="/service-areas/" role="menuitem" class="view-all">View All Areas</a>
            </li>
          </ul>
        </li>
        <?php endif; ?>

        <li role="none">
          <a href="/about/" role="menuitem" <?php if ($currentPage === 'about') echo 'aria-current="page"'; ?>>About</a>
        </li>

        <?php if ($tier === 'premium'): ?>
        <li role="none">
          <a href="/blog/" role="menuitem" <?php if ($currentPage === 'blog') echo 'aria-current="page"'; ?>>Blog</a>
        </li>
        <?php endif; ?>

        <li role="none">
          <a href="/contact/" role="menuitem" <?php if ($currentPage === 'contact') echo 'aria-current="page"'; ?>>Contact</a>
        </li>
      </ul>

      <!-- Desktop CTA -->
      <div class="navbar-cta">
        <a href="tel:<?php echo $phoneTel; ?>" class="navbar-phone" aria-label="Call <?php echo $phone; ?>">
          <?php echo icon('phone', 18); ?>
          <span><?php echo $phone; ?></span>
        </a>
        <a href="/contact/" class="btn-primary">Free Estimate</a>
      </div>

      <!-- Mobile Hamburger -->
      <button class="hamburger" aria-label="Toggle navigation menu" aria-expanded="false" aria-controls="mobile-menu">
        <span class="hamburger-line"></span>
        <span class="hamburger-line"></span>
        <span class="hamburger-line"></span>
      </button>

    </div>
  </nav>
</header>

<!-- Mobile Menu (OUTSIDE header — v7 fix for backdrop-filter containing block issue) -->
<div class="mobile-menu" id="mobile-menu" aria-hidden="true">
  <div class="mobile-menu-inner">
    <ul class="mobile-menu-links">
      <li><a href="/">Home</a></li>

      <!-- Services submenu -->
      <li class="mobile-has-submenu">
        <span class="mobile-submenu-label">Services</span>
        <ul class="mobile-submenu">
          <?php foreach ($services as $navSvc): ?>
          <li><a href="/services/<?php echo $navSvc['slug']; ?>/"><?php echo htmlspecialchars($navSvc['name']); ?></a></li>
          <?php endforeach; ?>
        </ul>
      </li>

      <!-- Service Areas submenu (Premium) -->
      <?php if ($tier === 'premium'): ?>
      <li class="mobile-has-submenu">
        <span class="mobile-submenu-label">Service Areas</span>
        <ul class="mobile-submenu">
          <?php foreach ($serviceAreas as $navArea):
            $areaSlug = getAreaSlug($navArea['city']);
            $areaExists = is_dir($_SERVER['DOCUMENT_ROOT'] . '/areas/' . $areaSlug);
          ?>
          <li>
            <?php if ($areaExists): ?>
            <a href="/areas/<?php echo $areaSlug; ?>/"><?php echo htmlspecialchars($navArea['city']); ?></a>
            <?php else: ?>
            <a href="/service-areas/#<?php echo $areaSlug; ?>"><?php echo htmlspecialchars($navArea['city']); ?></a>
            <?php endif; ?>
          </li>
          <?php endforeach; ?>
        </ul>
      </li>
      <?php endif; ?>

      <li><a href="/about/">About</a></li>
      <?php if ($tier === 'premium'): ?>
      <li><a href="/blog/">Blog</a></li>
      <?php endif; ?>
      <li><a href="/contact/">Contact</a></li>
    </ul>

    <div class="mobile-menu-cta">
      <a href="tel:<?php echo $phoneTel; ?>" class="btn-secondary">
        <?php echo icon('phone', 20); ?>
        Call Now
      </a>
      <a href="/contact/" class="btn-primary">Free Estimate</a>
    </div>
  </div>
</div>

<!-- Main Content Wrapper -->
<main id="main-content">
