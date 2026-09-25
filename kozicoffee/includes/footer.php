<?php if (!defined('SITE_NAME')) { require_once __DIR__ . '/../config/settings.php'; } ?>
<footer>
  <div class="container">
    <div class="footer-grid">
      <div>
        <div class="footer-brand">
          <img src="images/logo.jpg" alt="<?php echo SITE_NAME; ?> logo">
          <strong>KOZI Company</strong>
        </div>
        <p style="font-size:14px; line-height:1.7; max-width:280px;">100% Halal cafe in <?php echo SITE_CITY; ?> serving rice bowls, ramen, pasta, smoked brisket, coffee, matcha and mocktails — <?php echo SITE_TAGLINE; ?>.</p>
        <div class="footer-social">
          <a href="<?php echo SITE_INSTAGRAM; ?>" target="_blank" rel="noopener" aria-label="Instagram">IG</a>
          <a href="tel:<?php echo SITE_PHONE_LINK; ?>" aria-label="Phone">☎</a>
          <a href="<?php echo SITE_MAPS_URL; ?>" target="_blank" rel="noopener" aria-label="Maps">📍</a>
        </div>
      </div>

      <div>
        <h5>Explore</h5>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="menu.php">Full Menu</a></li>
          <li><a href="index.php#about">About Us</a></li>
          <li><a href="index.php#gallery">Gallery</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </div>

      <div>
        <h5>Menu</h5>
        <ul>
          <li><a href="menu.php#rice-bowl">Rice Bowl</a></li>
          <li><a href="menu.php#ramen">Ramen</a></li>
          <li><a href="menu.php#signature-coffee">Signature Coffee</a></li>
          <li><a href="menu.php#mocktails">Mocktails</a></li>
          <li><a href="menu.php#desserts">Desserts</a></li>
        </ul>
      </div>

      <div>
        <h5>Visit Us</h5>
        <ul>
          <li><?php echo SITE_ADDRESS; ?></li>
          <li><?php echo SITE_HOURS; ?></li>
          <li><?php echo SITE_PHONE; ?></li>
        </ul>
      </div>
    </div>

    <div class="footer-bottom">
      <span>&copy; <?php echo date('Y'); ?> KOZI Company. All rights reserved.</span>
      <span>100% Halal · No Alcohol · No Pork · No Lard · No Angciu</span>
    </div>
  </div>
</footer>

<button class="scroll-top" aria-label="Scroll to top">↑</button>

<div class="lightbox" id="lightbox">
  <span class="lightbox-close">&times;</span>
  <img id="lightboxImg" src="" alt="Preview">
</div>

<script src="js/main.js"></script>
<script async src="//www.instagram.com/embed.js"></script>
</body>
</html>
