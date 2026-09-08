<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ─── Page-level setup ───────────────────────────────────────────────────────
$pageType        = 'contact';
$currentPage     = 'contact';
$pageTitle       = 'Contact Us';
$pageDescription = 'Contact A&S Contracting Services for a free estimate. Licensed Missouri general contractor serving Warrenton and Warren County. Call (636) 359-7204 or submit a contact form.';
$canonicalUrl    = $siteUrl . '/contact/';

// BreadcrumbList schema
$schemaGraph = [
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type' => 'WebPage',
            '@id' => $canonicalUrl . '#webpage',
            'url' => $canonicalUrl,
            'name' => $pageTitle,
            'description' => $pageDescription,
        ],
        [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Home',
                    'item' => $siteUrl . '/',
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => 'Contact',
                    'item' => $canonicalUrl,
                ],
            ],
        ],
    ],
];
$schema = '<script type="application/ld+json">' . json_encode($schemaGraph, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>

<!-- Page-specific composition -->
<style>
.contact-hero { background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%); padding: calc(var(--nav-height) + var(--space-2xl)) var(--space-xl) var(--space-2xl); }
.contact-hero .container { max-width: var(--max-width); margin: 0 auto; text-align: center; }
.contact-hero h1 { color: #fff; margin-bottom: var(--space-sm); }
.contact-hero p { color: rgba(255,255,255,0.9); font-size: 1.1rem; max-width: 60ch; margin: 0 auto; }

.contact-grid { display: grid; grid-template-columns: 1fr 1.2fr; gap: var(--space-3xl); max-width: var(--max-width-wide); margin: 0 auto; padding: var(--space-4xl) var(--space-xl); }
@media (max-width: 900px) { .contact-grid { grid-template-columns: 1fr; gap: var(--space-2xl); } }

.contact-info h2 { margin-bottom: var(--space-lg); }
.contact-methods { display: flex; flex-direction: column; gap: var(--space-lg); margin-bottom: var(--space-2xl); }
.contact-method { display: flex; align-items: flex-start; gap: var(--space-md); padding: var(--space-md); background: var(--color-bg-alt); border-radius: var(--radius); }
.contact-method-icon { width: 48px; height: 48px; background: var(--color-primary); color: #fff; border-radius: var(--radius); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.contact-method-content h3 { font-size: 1rem; margin-bottom: var(--space-xs); color: var(--color-primary); }
.contact-method-content p { margin: 0; line-height: 1.6; }
.contact-method-content a { color: var(--color-text); text-decoration: none; transition: color var(--transition); }
.contact-method-content a:hover { color: var(--color-primary); }

.contact-form { background: var(--color-bg-alt); padding: var(--space-2xl); border-radius: var(--radius-lg); box-shadow: var(--shadow-lg); }
.contact-form h2 { margin-bottom: var(--space-md); }
.contact-form-intro { color: var(--color-text-light); margin-bottom: var(--space-xl); line-height: 1.6; }

.form-field { position: relative; margin-bottom: var(--space-lg); }
.form-field input, .form-field textarea, .form-field select { width: 100%; padding: var(--space-md); border: 2px solid var(--color-border); border-radius: var(--radius); font-family: var(--font-body); font-size: 1rem; background: var(--color-bg); transition: border-color var(--transition); }
.form-field input:focus, .form-field textarea:focus, .form-field select:focus { outline: none; border-color: var(--color-primary); }
.form-field label { display: block; margin-bottom: var(--space-xs); font-weight: 600; color: var(--color-text); }
.form-field textarea { min-height: 120px; resize: vertical; }

.form-consent-fieldset { border: 2px solid var(--color-border); border-radius: var(--radius); padding: var(--space-lg); margin: var(--space-xl) 0; background: var(--color-bg); }
.form-consent-legend { font-weight: 700; color: var(--color-primary); padding: 0 var(--space-sm); font-size: 1.05rem; }
.form-consent-item { display: flex; align-items: flex-start; gap: var(--space-sm); margin-bottom: var(--space-md); cursor: pointer; }
.form-consent-item:last-child { margin-bottom: 0; }
.form-consent-item input[type="checkbox"] { width: 20px; height: 20px; margin-top: 2px; flex-shrink: 0; accent-color: var(--color-primary); cursor: pointer; }
.form-consent-item .consent-label { font-size: 0.92rem; line-height: 1.5; color: var(--color-text); }
.form-consent-item .consent-label strong { color: var(--color-primary); }
.form-consent-item .consent-label a { color: var(--color-primary); text-decoration: underline; }
.form-consent-required { background: rgba(0,0,0,0.02); padding: var(--space-md); border-radius: var(--radius); margin-top: var(--space-md); }
.required-star { color: #d32f2f; font-weight: 700; }

.btn-submit { width: 100%; background: var(--color-primary); color: #fff; padding: var(--space-md) var(--space-xl); border: none; border-radius: var(--radius); font-family: var(--font-body); font-weight: 700; font-size: 1.05rem; cursor: pointer; transition: background var(--transition), transform var(--transition); }
.btn-submit:hover { background: var(--color-accent); transform: translateY(-2px); }

.hours-block { background: var(--color-bg-alt); padding: var(--space-lg); border-radius: var(--radius); margin-top: var(--space-xl); }
.hours-block h3 { margin-bottom: var(--space-sm); color: var(--color-primary); }
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- Hero -->
<section class="contact-hero" aria-label="Contact A&S Contracting Services">
  <div class="container">
    <h1>Get in Touch</h1>
    <p>
      Ready to start your project? Fill out the form below or call us directly. We respond to all inquiries
      within one business day.
    </p>
  </div>
</section>

<!-- Breadcrumb -->
<nav class="breadcrumb" aria-label="Breadcrumb">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li class="breadcrumb-sep" aria-hidden="true">›</li>
      <li aria-current="page">Contact</li>
    </ol>
  </div>
</nav>

<!-- Contact Grid -->
<section class="contact-grid">

  <!-- Contact Info -->
  <div class="contact-info">
    <h2>Contact Information</h2>

    <div class="contact-methods">
      <div class="contact-method">
        <div class="contact-method-icon">
          <?php echo icon('phone', 24); ?>
        </div>
        <div class="contact-method-content">
          <h3>Phone</h3>
          <p><a href="tel:<?php echo $phoneTel; ?>"><?php echo $phone; ?></a></p>
          <p style="font-size: 0.9rem; color: var(--color-text-light); margin-top: 4px;">
            Call for immediate assistance or to schedule an estimate.
          </p>
        </div>
      </div>

      <div class="contact-method">
        <div class="contact-method-icon">
          <?php echo icon('mail', 24); ?>
        </div>
        <div class="contact-method-content">
          <h3>Email</h3>
          <p><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
          <p style="font-size: 0.9rem; color: var(--color-text-light); margin-top: 4px;">
            Email us with project details or questions.
          </p>
        </div>
      </div>

      <div class="contact-method">
        <div class="contact-method-icon">
          <?php echo icon('map-pin', 24); ?>
        </div>
        <div class="contact-method-content">
          <h3>Service Area</h3>
          <p>
            <?php echo $addressCity; ?>, <?php echo $addressState; ?> <?php echo $addressZip; ?>
          </p>
          <p style="font-size: 0.9rem; color: var(--color-text-light); margin-top: 4px;">
            Serving Warren County and surrounding areas within <?php echo $serviceRadius; ?> miles.
          </p>
        </div>
      </div>
    </div>

    <div class="hours-block">
      <h3>Business Hours</h3>
      <p style="margin: 0; line-height: 1.7;"><?php echo htmlspecialchars($businessHours); ?></p>
      <p style="font-size: 0.9rem; color: var(--color-text-light); margin-top: var(--space-sm);">
        We respond to messages within one business day. For emergencies, call us directly.
      </p>
    </div>
  </div>

  <!-- Contact Form -->
  <div class="contact-form">
    <h2>Request a Free Estimate</h2>
    <p class="contact-form-intro">
      Tell us about your project. We'll get back to you within one business day with next steps or a quote.
    </p>

    <form action="<?php echo htmlspecialchars($formAction); ?>" method="POST">
      <!-- Honeypot -->
      <input type="text" name="_honey" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true">

      <!-- Formsubmit.co directives -->
      <input type="hidden" name="_next" value="<?php echo htmlspecialchars($siteUrl); ?>/thank-you/">
      <input type="hidden" name="_captcha" value="false">
      <input type="hidden" name="_template" value="table">
      <input type="hidden" name="_subject" value="New lead from <?php echo htmlspecialchars($siteName); ?>">
      <input type="hidden" name="_cc" value="CustomerService@pageoneinsights.com">

      <!-- v6.3 attribution -->
      <?php echo p1_attribution_fields('contact'); ?>

      <!-- Consent tracking -->
      <input type="hidden" name="consent_version" value="v2.1">
      <input type="hidden" name="consent_page" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">

      <!-- Required fields -->
      <div class="form-field">
        <label for="contact-name">Your Name <span class="required-star">*</span></label>
        <input type="text" id="contact-name" name="name" required>
      </div>

      <div class="form-field">
        <label for="contact-email">Email <span class="required-star">*</span></label>
        <input type="email" id="contact-email" name="email" required>
      </div>

      <div class="form-field">
        <label for="contact-phone">Phone <span class="required-star">*</span></label>
        <input type="tel" id="contact-phone" name="phone" required>
      </div>

      <div class="form-field">
        <label for="contact-service">Service Needed</label>
        <select id="contact-service" name="service">
          <option value="">Select a service</option>
          <?php foreach ($services as $svc): ?>
          <option value="<?php echo htmlspecialchars($svc['name']); ?>"><?php echo htmlspecialchars($svc['name']); ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="form-field">
        <label for="contact-message">Project Details</label>
        <textarea id="contact-message" name="message" rows="5" placeholder="Tell us about your project..."></textarea>
      </div>

      <!-- Three Separate Consent Checkboxes (TCPA 2025/2026) -->
      <fieldset class="form-consent-fieldset">
        <legend class="form-consent-legend">Communication Consent</legend>

        <label class="form-consent-item">
          <input type="checkbox" name="email_opt_in" value="yes" class="consent-checkbox">
          <span class="consent-label">
            <strong>Email updates (optional):</strong> I agree to receive emails from
            <?php echo htmlspecialchars($siteName); ?> about my inquiry, services, promotions, and news.
            I understand I can unsubscribe anytime via the link in any email or by emailing
            <?php echo htmlspecialchars($email); ?>. Message frequency varies.
          </span>
        </label>

        <label class="form-consent-item">
          <input type="checkbox" name="sms_opt_in" value="yes" class="consent-checkbox">
          <span class="consent-label">
            <strong>SMS/Text messages (optional):</strong> I agree to receive text messages from
            <?php echo htmlspecialchars($siteName); ?> at the phone number I provided. Message types may
            include appointment reminders, service updates, and promotional offers. Message frequency varies.
            Message and data rates may apply. Reply STOP to unsubscribe, HELP for help.
            <strong>Consent is not a condition of purchase.</strong>
          </span>
        </label>

        <label class="form-consent-item form-consent-required">
          <input type="checkbox" name="terms_accepted" value="yes" class="consent-checkbox" required>
          <span class="consent-label">
            I have read and agree to the
            <a href="/privacy-policy/" target="_blank" rel="noopener">Privacy Policy</a>
            and
            <a href="/terms/" target="_blank" rel="noopener">Terms of Service</a>. <span class="required-star">*</span>
          </span>
        </label>

      </fieldset>

      <button type="submit" class="btn-submit">Send Message</button>
    </form>
  </div>

</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
