<?php
require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/config/settings.php';

$pageTitle = 'Contact';
$pageDescription = 'Get in touch with KOZI Coffee Bekasi — address, phone, hours, and a message form.';

include __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
  <svg class="hero-swirl" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
    <path fill="#ffffff" d="M100,20 C140,20 175,50 175,95 C175,140 140,175 95,175 C55,175 25,150 20,115 C18,100 28,88 42,88 C54,88 62,96 64,107 C67,122 80,132 96,132 C116,132 132,116 132,96 C132,72 112,55 90,55 C70,55 55,66 48,82" stroke="none"/>
  </svg>
  <div class="container">
    <div class="eyebrow">Get In Touch</div>
    <h1>We'd love to hear from you</h1>
    <p>Questions, group reservations, or feedback — send us a message or reach out directly.</p>
  </div>
</section>

<section class="info-section">
  <div class="container info-grid" style="align-items:flex-start;">

    <div class="contact-form-card reveal in-view">
      <h3 style="margin-bottom:22px;">Send a message</h3>

      <div class="form-alert" id="formAlert" style="display:none;"></div>

      <form id="contactForm">
        <div class="form-row">
          <div class="form-group">
            <label for="name">Full name</label>
            <input type="text" id="name" name="name" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label for="phone">Phone (optional)</label>
            <input type="tel" id="phone" name="phone">
          </div>
          <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" placeholder="e.g. Group reservation">
          </div>
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Send Message</button>
      </form>
    </div>

    <div class="reveal in-view">
      <div class="info-card">
        <div class="info-row">
          <div class="ic">📍</div>
          <div><h4>Address</h4><p><?php echo SITE_ADDRESS; ?></p></div>
        </div>
        <div class="info-row">
          <div class="ic">🕒</div>
          <div><h4>Hours</h4><p><?php echo SITE_HOURS; ?></p></div>
        </div>
        <div class="info-row">
          <div class="ic">☎</div>
          <div><h4>Phone</h4><p><a href="tel:<?php echo SITE_PHONE_LINK; ?>"><?php echo SITE_PHONE; ?></a></p></div>
        </div>
        <div class="info-row">
          <div class="ic">📷</div>
          <div><h4>Instagram</h4><p><a href="<?php echo SITE_INSTAGRAM; ?>" target="_blank" rel="noopener">@kozi.coffee</a></p></div>
        </div>
      </div>

      <div class="map-embed" style="margin-top:24px;">
        <iframe
          src="https://www.google.com/maps?q=KOZI+Coffee+Jl.+Boulevard+Raya+Pekayon+Jaya+Bekasi&output=embed"
          allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </div>

  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
