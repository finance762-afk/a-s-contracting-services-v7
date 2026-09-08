/**
 * Main JavaScript — A&S Contracting Services
 * Phase 2, 2026-09-08
 * v6.3 — all scripts carry defer, animations fail-open
 */

(function() {
  'use strict';

  // Add js-anim class to enable animations (fail-open system)
  document.documentElement.classList.add('js-anim');

  // ─── Mobile Menu Toggle ──────────────────────────────────────────────────
  const hamburger = document.querySelector('.hamburger');
  const mobileMenu = document.querySelector('.mobile-menu');

  if (hamburger && mobileMenu) {
    hamburger.addEventListener('click', function() {
      const isActive = mobileMenu.classList.contains('active');

      if (isActive) {
        // Close menu
        mobileMenu.classList.remove('active');
        mobileMenu.setAttribute('aria-hidden', 'true');
        hamburger.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';

        // Reset hamburger to bars
        const lines = hamburger.querySelectorAll('.hamburger-line');
        lines[0].style.transform = '';
        lines[1].style.opacity = '';
        lines[2].style.transform = '';
      } else {
        // Open menu
        mobileMenu.classList.add('active');
        mobileMenu.setAttribute('aria-hidden', 'false');
        hamburger.setAttribute('aria-expanded', 'true');
        document.body.style.overflow = 'hidden';

        // Transform hamburger to X
        const lines = hamburger.querySelectorAll('.hamburger-line');
        lines[0].style.transform = 'rotate(45deg) translateY(7px)';
        lines[1].style.opacity = '0';
        lines[2].style.transform = 'rotate(-45deg) translateY(-7px)';
      }
    });

    // Close mobile menu when clicking a link
    const mobileLinks = mobileMenu.querySelectorAll('a');
    mobileLinks.forEach(function(link) {
      link.addEventListener('click', function() {
        mobileMenu.classList.remove('active');
        mobileMenu.setAttribute('aria-hidden', 'true');
        hamburger.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';

        // Reset hamburger
        const lines = hamburger.querySelectorAll('.hamburger-line');
        lines[0].style.transform = '';
        lines[1].style.opacity = '';
        lines[2].style.transform = '';
      });
    });
  }

  // ─── Desktop Dropdown Menus ──────────────────────────────────────────────
  const dropdownToggles = document.querySelectorAll('.dropdown-toggle');

  dropdownToggles.forEach(function(toggle) {
    const dropdown = toggle.nextElementSibling;

    if (dropdown && dropdown.classList.contains('dropdown')) {
      // Show on mouseenter
      toggle.parentElement.addEventListener('mouseenter', function() {
        dropdown.style.display = 'block';
        toggle.setAttribute('aria-expanded', 'true');
      });

      // Hide on mouseleave
      toggle.parentElement.addEventListener('mouseleave', function() {
        dropdown.style.display = 'none';
        toggle.setAttribute('aria-expanded', 'false');
      });

      // Keyboard: toggle on Enter/Space
      toggle.addEventListener('click', function(e) {
        e.preventDefault();
        const isExpanded = toggle.getAttribute('aria-expanded') === 'true';

        if (isExpanded) {
          dropdown.style.display = 'none';
          toggle.setAttribute('aria-expanded', 'false');
        } else {
          dropdown.style.display = 'block';
          toggle.setAttribute('aria-expanded', 'true');
        }
      });
    }
  });

  // ─── Scrolled Nav State ──────────────────────────────────────────────────
  const header = document.querySelector('.site-header');

  if (header) {
    let lastScrollTop = 0;

    window.addEventListener('scroll', function() {
      const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

      if (scrollTop > 40) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }

      lastScrollTop = scrollTop;
    });
  }

  // ─── Scroll Reveal Animations (v6.3 fail-open — IntersectionObserver) ───
  if ('IntersectionObserver' in window) {
    const revealElements = document.querySelectorAll('[data-animate], .reveal, .reveal-up, .reveal-down, .reveal-left, .reveal-right, .reveal-scale');

    const revealObserver = new IntersectionObserver(function(entries) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('revealed');
          revealObserver.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.15,
      rootMargin: '0px 0px -80px 0px'
    });

    revealElements.forEach(function(el) {
      revealObserver.observe(el);
    });

    // Safety net: force reveal after 2.5s if JS loaded but observer didn't fire
    setTimeout(function() {
      revealElements.forEach(function(el) {
        if (!el.classList.contains('revealed')) {
          el.classList.add('revealed');
        }
      });
    }, 2500);
  } else {
    // No IntersectionObserver support: immediately reveal everything (fail-open)
    const revealElements = document.querySelectorAll('[data-animate], .reveal, .reveal-up, .reveal-down, .reveal-left, .reveal-right, .reveal-scale');
    revealElements.forEach(function(el) {
      el.classList.add('revealed');
    });
  }

  // ─── Stat Counter Animation ──────────────────────────────────────────────
  const statNumbers = document.querySelectorAll('.stat-number[data-target]');

  if (statNumbers.length > 0 && 'IntersectionObserver' in window) {
    const statObserver = new IntersectionObserver(function(entries) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
          entry.target.classList.add('counted');
          animateCounter(entry.target);
          statObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.5 });

    statNumbers.forEach(function(stat) {
      statObserver.observe(stat);
    });
  }

  function animateCounter(element) {
    const target = parseInt(element.getAttribute('data-target'), 10);
    const duration = 2000; // 2 seconds
    const increment = target / (duration / 16); // ~60fps
    let current = 0;

    const timer = setInterval(function() {
      current += increment;
      if (current >= target) {
        element.textContent = target.toLocaleString();
        clearInterval(timer);
      } else {
        element.textContent = Math.floor(current).toLocaleString();
      }
    }, 16);
  }

  // ─── Smooth Scroll for Anchor Links ─────────────────────────────────────
  document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
    anchor.addEventListener('click', function(e) {
      const href = this.getAttribute('href');

      // Skip empty hash or hash-only links
      if (href === '#' || href === '#!') return;

      const target = document.querySelector(href);
      if (target) {
        e.preventDefault();
        const offsetTop = target.getBoundingClientRect().top + window.pageYOffset - 100;
        window.scrollTo({ top: offsetTop, behavior: 'smooth' });
      }
    });
  });

})();
