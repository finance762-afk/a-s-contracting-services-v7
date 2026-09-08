<?php
/**
 * includes/hero-form.php — hero estimate card shared by the service-area pages.
 * Set $heroFormTitle / $heroFormId before including; posts to $formAction (Page One leads endpoint).
 */
$heroFormTitle = isset($heroFormTitle) ? $heroFormTitle : 'Get a free estimate';
$heroFormId    = isset($heroFormId) ? $heroFormId : 'hero';
?>
<aside class="hero-form-card" id="hero-form">
  <h2><?php echo htmlspecialchars($heroFormTitle); ?></h2>
  <p class="hero-form-tagline">No obligation. Same-day reply.</p>
  <form action="<?php echo htmlspecialchars($formAction); ?>" method="POST" class="hero-form">
    <input type="hidden" name="_next" value="<?php echo htmlspecialchars($siteUrl); ?>/thank-you">
    <input type="text" name="_honey" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true">
    <?php echo p1_attribution_fields($heroFormId); ?>
    <input type="hidden" name="consent_version" value="v2.1">
    <input type="hidden" name="consent_page" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
    <div class="form-row"><label class="sr-only" for="<?php echo $heroFormId; ?>-name">Name</label><input id="<?php echo $heroFormId; ?>-name" type="text" name="name" placeholder="Name" autocomplete="name" required></div>
    <div class="form-row"><label class="sr-only" for="<?php echo $heroFormId; ?>-phone">Phone</label><input id="<?php echo $heroFormId; ?>-phone" type="tel" name="phone" placeholder="Phone" autocomplete="tel" required></div>
    <div class="form-row"><label class="sr-only" for="<?php echo $heroFormId; ?>-service">Service</label>
      <select id="<?php echo $heroFormId; ?>-service" name="service">
        <option value="">What do you need?</option>
        <?php foreach ($services as $heroSvc): ?>
        <option value="<?php echo htmlspecialchars($heroSvc['name']); ?>"><?php echo htmlspecialchars($heroSvc['name']); ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <label class="consent"><input type="checkbox" name="terms_accepted" value="yes" required><span>I agree to the <a href="/terms/" target="_blank" rel="noopener">Terms</a> and <a href="/privacy-policy/" target="_blank" rel="noopener">Privacy Policy</a> and consent to be contacted. *</span></label>
    <!-- spam shield: signed render timestamp + JS interaction signal -->
    <?php $__ft_ts = (string) time(); ?>
    <input type="hidden" name="_ft" value="<?php echo $__ft_ts . '.' . hash_hmac('sha256', $__ft_ts, $leadsFormSecret); ?>">
    <input type="hidden" name="_js" value="" class="js-shield-field">
    <?php if (empty($GLOBALS['__js_shield'])) { $GLOBALS['__js_shield'] = 1; ?>
    <script>(function(){var d=document,f=function(){var i,e=d.querySelectorAll('.js-shield-field');for(i=0;i<e.length;i++)e[i].value='1';d.removeEventListener('pointerdown',f);d.removeEventListener('keydown',f);};d.addEventListener('pointerdown',f);d.addEventListener('keydown',f);})();</script>
    <?php } ?>
    <button type="submit" class="btn btn-primary btn-block">Get my free estimate</button>
  </form>
</aside>
