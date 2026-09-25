<?php
require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/config/settings.php';

$pageTitle = 'Home';
$pageDescription = 'KOZI Coffee Bekasi — 100% Halal cafe serving rice bowls, ramen, pasta, smoked brisket, coffee, matcha and mocktails. ' . SITE_TAGLINE;

/* Recommended / featured dishes for the homepage highlight grid */
$stmt = $pdo->query("
    SELECT mi.*, c.name AS category_name, c.slug AS category_slug, c.`group` AS category_group
    FROM menu_items mi
    JOIN categories c ON c.id = mi.category_id
    WHERE mi.is_recommended = 1
    ORDER BY c.sort_order, mi.sort_order
    LIMIT 9
");
$featured = $stmt->fetchAll();

function rupiah($n) { return 'Rp ' . number_format($n, 0, ',', '.'); }

include __DIR__ . '/includes/header.php';
?>

<!-- ============================= HERO ============================= -->
<section class="hero">
  <svg class="hero-swirl" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
    <path fill="#e31c0e" d="M100,20 C140,20 175,50 175,95 C175,140 140,175 95,175 C55,175 25,150 20,115 C18,100 28,88 42,88 C54,88 62,96 64,107 C67,122 80,132 96,132 C116,132 132,116 132,96 C132,72 112,55 90,55 C70,55 55,66 48,82" stroke="none"/>
  </svg>

  <div class="container hero-inner">
    <div class="reveal in-view">
      <div class="hero-badge">
        <span class="dot">★</span>
        <?php echo SITE_RATING; ?> rating from <?php echo SITE_REVIEWS; ?> Google reviews
      </div>

      <h1>Good food, good coffee, <span class="accent">everyone's place.</span></h1>
      <p class="lead">KOZI Coffee is a 100% Halal cafe in <?php echo SITE_CITY; ?> serving hearty rice bowls, ramen, pasta and smoked brisket alongside signature coffee, matcha and mocktails — made for lingering with people you like.</p>

      <div class="hero-actions">
        <a href="menu.php" class="btn btn-primary">Explore The Menu</a>
        <a href="<?php echo SITE_MAPS_URL; ?>" target="_blank" rel="noopener" class="btn btn-outline">Get Directions</a>
      </div>

      <div class="hero-meta">
        <div><strong>100%</strong><span>Halal certified kitchen</span></div>
        <div><strong>70+</strong><span>menu items to explore</span></div>
        <div><strong>08–23</strong><span>open every day</span></div>
      </div>
    </div>

    <div class="hero-visual reveal in-view">
      <span class="hero-halal-tag">100% Halal · No Alcohol · No Pork</span>
      <div class="frame">
        <img src="images/gallery-rice-1.jpg" alt="KOZI Coffee signature rice bowls plated on a wooden table">
      </div>
      <div class="hero-rating-card">
        <div class="stars">★★★★★</div>
        <div>
          <strong><?php echo SITE_RATING; ?> / 5.0</strong>
          <span><?php echo SITE_REVIEWS; ?> Google reviews</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================= VIDEO REEL BANNER ============================= -->
<section class="video-banner">
  <div class="container video-banner-head reveal">
    <div class="eyebrow">Fresh Off The Feed</div>
    <h2>See KOZI in motion</h2>
  </div>

  <div class="reel-carousel-wrap reveal">
    <button class="reel-nav reel-nav-prev" aria-label="Previous video" type="button">‹</button>

    <div class="reel-carousel" id="reelCarousel">
      <div class="reel-card">
        <video class="reel-video" src="videos/kozi-vibes.mp4" muted loop playsinline autoplay preload="metadata"></video>
        <button class="reel-mute" aria-label="Toggle sound" type="button">🔇</button>
        <div class="reel-caption"><strong>Coffee, Vibes &amp; Food</strong><span>The full KOZI experience</span></div>
      </div>
      <div class="reel-card">
        <video class="reel-video" src="videos/kozi-wfc-spot.mp4" muted loop playsinline autoplay preload="metadata"></video>
        <button class="reel-mute" aria-label="Toggle sound" type="button">🔇</button>
        <div class="reel-caption"><strong>Your Go-To WFC Spot</strong><span>Work, coffee, repeat</span></div>
      </div>
      <div class="reel-card">
        <video class="reel-video" src="videos/kozi-hangout.mp4" muted loop playsinline autoplay preload="metadata"></video>
        <button class="reel-mute" aria-label="Toggle sound" type="button">🔇</button>
        <div class="reel-caption"><strong>Hang With Your People</strong><span>Community, always</span></div>
      </div>
    </div>

    <button class="reel-nav reel-nav-next" aria-label="Next video" type="button">›</button>
  </div>
</section>

<div class="marquee">
  <div class="marquee-track">
    <span>Rice Bowl</span><span>Ramen</span><span>Pasta</span><span>Smoked Brisket</span><span>Signature Coffee</span><span>Matcha</span><span>Mocktails</span><span>100% Halal</span>
    <span>Rice Bowl</span><span>Ramen</span><span>Pasta</span><span>Smoked Brisket</span><span>Signature Coffee</span><span>Matcha</span><span>Mocktails</span><span>100% Halal</span>
  </div>
</div>

<!-- ============================= ABOUT ============================= -->
<section class="about" id="about">
  <div class="container about-grid">
    <div class="about-gallery reveal">
      <img class="tall" src="images/gallery-coffee-signature.jpg" alt="Signature iced coffee lineup at KOZI Coffee">
      <img src="images/gallery-matcha.jpg" alt="Matcha drinks at KOZI Coffee">
      <img src="images/gallery-mocktails.jpg" alt="Colorful mocktails at KOZI Coffee">
    </div>

    <div class="reveal">
      <div class="eyebrow">Our Story</div>
      <h2>A neighbourhood cafe built for #everyoneplace</h2>
      <p style="margin-top:16px; font-size:16px; line-height:1.75; color:#574a3e;">
        KOZI Coffee started with a simple idea: one table where friends can order comfort food, students can camp out with a laptop and coffee, and families can share a big brisket platter — all without worrying about halal status. Every dish on our menu is 100% Halal, with no alcohol, pork, lard, or angciu, so everyone really does have a place here.
      </p>

      <ul class="about-list">
        <li><span class="ic">✓</span> 100% Halal kitchen — no alcohol, no pork, no lard, no angciu.</li>
        <li><span class="ic">✓</span> From all-day rice bowls and ramen to smoked brisket, pasta, and dessert.</li>
        <li><span class="ic">✓</span> House signature coffee, matcha, and mocktails crafted in-house daily.</li>
        <li><span class="ic">✓</span> Comfortable space to work, meet, or just hang out with friends.</li>
      </ul>

      <div class="hero-actions" style="margin-top:30px;">
        <a href="menu.php" class="btn btn-primary">See Full Menu</a>
        <a href="contact.php" class="btn btn-outline">Visit Us</a>
      </div>
    </div>
  </div>
</section>

<!-- ============================= MENU HIGHLIGHTS ============================= -->
<section class="highlights">
  <div class="container">
    <div class="section-head reveal">
      <div class="eyebrow">Crowd Favourites</div>
      <h2>What everyone orders twice</h2>
      <p>A quick taste of our most-loved rice bowls, coffee and mocktails — pulled straight from the KOZI menu.</p>
    </div>

    <div class="tab-bar reveal">
      <button class="tab-btn active" data-filter="all">All</button>
      <button class="tab-btn" data-filter="food">Food</button>
      <button class="tab-btn" data-filter="drink">Drinks</button>
    </div>

    <div class="dish-grid">
      <?php foreach ($featured as $item): ?>
        <div class="dish-card reveal" data-category="<?php echo $item['category_group']; ?>">
          <span class="badge-rec">Recommended</span>
          <span class="cat-tag"><?php echo htmlspecialchars($item['category_name']); ?></span>
          <h4><?php echo htmlspecialchars($item['name']); ?></h4>
          <p><?php echo htmlspecialchars($item['description'] ?: 'A KOZI signature, made fresh to order.'); ?></p>
          <div class="price-row">
            <span class="price"><?php echo rupiah($item['price']); ?></span>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="highlights-footer reveal">
      <a href="menu.php" class="btn btn-outline">View The Full Menu →</a>
    </div>
  </div>
</section>

<!-- ============================= GALLERY ============================= -->
<section class="gallery-section" id="gallery">
  <div class="container">
    <div class="section-head reveal">
      <div class="eyebrow">Inside KOZI</div>
      <h2>A little taste of the good stuff</h2>
      <p>Straight from our kitchen and bar — the dishes and drinks that make up the KOZI experience.</p>
    </div>

    <div class="gallery-masonry reveal">
      <a href="images/gallery-rice-1.jpg" data-lightbox data-label="Rice Bowl Selection" class="g-span-2 g-row-2">
        <img src="images/gallery-rice-1.jpg" alt="Rice bowl selection">
      </a>
      <a href="images/gallery-ramen.jpg" data-lightbox data-label="Toripaitan & Katsu Ramen">
        <img src="images/gallery-ramen.jpg" alt="Ramen bowls">
      </a>
      <a href="images/gallery-coffee-signature.jpg" data-lightbox data-label="Signature Coffee">
        <img src="images/gallery-coffee-signature.jpg" alt="Signature coffee">
      </a>
      <a href="images/gallery-mocktails.jpg" data-lightbox data-label="Mocktails Lineup" class="g-row-2">
        <img src="images/gallery-mocktails.jpg" alt="Mocktails lineup">
      </a>
      <a href="images/gallery-matcha.jpg" data-lightbox data-label="Matcha Series">
        <img src="images/gallery-matcha.jpg" alt="Matcha drinks">
      </a>
      <a href="images/gallery-noncoffee.jpg" data-lightbox data-label="Non-Coffee Series" class="g-span-2">
        <img src="images/gallery-noncoffee.jpg" alt="Non-coffee drinks">
      </a>
    </div>
  </div>
</section>

<!-- ============================= INSTAGRAM / SOCIAL ============================= -->
<section class="social-section" id="instagram">
  <div class="container">
    <div class="section-head center reveal" style="margin-left:auto; margin-right:auto; text-align:center;">
      <div class="eyebrow" style="justify-content:center;">@kozi.coffee</div>
      <h2>More KOZI on Instagram</h2>
      <p>Behind-the-bar moments, new drops, and the people who make your order — follow along for more.</p>
    </div>

    <div class="social-grid reveal">
      <div class="social-reel">
        <blockquote class="instagram-media" data-instgrm-permalink="<?php echo SITE_INSTAGRAM_REEL; ?>" data-instgrm-version="14" style="margin:0 auto; max-width:400px; width:100%;"></blockquote>
      </div>

      <div class="social-side">
        <div class="social-card">
          <h4>Meet the baristas</h4>
          <p>The faces behind every cup — catch their latest posts straight from our feed.</p>
          <a href="<?php echo SITE_INSTAGRAM; ?>" target="_blank" rel="noopener" class="btn btn-outline btn-block">See The Feed →</a>
        </div>

        <div class="social-card social-card-merch">
          <span class="cat-tag">Limited Merch</span>
          <h4>KOZI x Kadotjes Padel Bag</h4>
          <p>"Padel Up Your Life" — our collab padel bag, now up on Tokopedia.</p>
          <a href="<?php echo SITE_TOKOPEDIA_URL; ?>" target="_blank" rel="noopener" class="btn btn-primary btn-block">Shop On Tokopedia →</a>
        </div>
      </div>
    </div>

    <div class="highlights-footer reveal">
      <a href="<?php echo SITE_INSTAGRAM; ?>" target="_blank" rel="noopener" class="btn btn-outline">Follow @kozi.coffee →</a>
    </div>
  </div>
</section>

<!-- ============================= TESTIMONIALS ============================= -->
<section class="testimonials">
  <div class="container">
    <div class="section-head center reveal" style="margin-left:auto; margin-right:auto;">
      <div class="eyebrow" style="justify-content:center;">Guest Reviews</div>
      <h2><?php echo SITE_RATING; ?> out of 5, from <?php echo SITE_REVIEWS; ?> reviews on Google</h2>
      <p>A few words from guests who've made KOZI part of their routine.</p>
    </div>

    <div class="testi-grid">
      <div class="testi-card reveal">
        <div class="stars">★★★★★</div>
        <p>"The Nasi Goreng Katsu Kecombrang is my go-to order — the fried rice is so fragrant and the katsu is always crispy. Great spot to work from too."</p>
        <div class="who"><div class="avatar">D</div><div><strong>Dina R.</strong><span>Bekasi</span></div></div>
      </div>
      <div class="testi-card reveal">
        <div class="stars">★★★★★</div>
        <p>"Their Toripaitan Ramen honestly rivals dedicated ramen shops, and the Butterscotch Latte is worth the trip on its own. Halal too, which makes it easy to bring the whole family."</p>
        <div class="who"><div class="avatar">F</div><div><strong>Fajar A.</strong><span>Bekasi</span></div></div>
      </div>
      <div class="testi-card reveal">
        <div class="stars">★★★★★</div>
        <p>"Cozy place, friendly staff, and the Brisket Platter is huge for the price. We always end up ordering the Ubi Creme Brulee to share after."</p>
        <div class="who"><div class="avatar">M</div><div><strong>Melati S.</strong><span>Jakarta</span></div></div>
      </div>
    </div>
  </div>
</section>

<!-- ============================= LOCATION / INFO ============================= -->
<section class="info-section" id="location">
  <div class="container">
    <div class="section-head reveal">
      <div class="eyebrow">Find Us</div>
      <h2>Come say hi at KOZI Bekasi</h2>
      <p>Walk-ins welcome every day. Reserve ahead for bigger groups.</p>
    </div>

    <div class="info-grid">
      <div class="info-card reveal">
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
          <div class="ic">💳</div>
          <div><h4>Typical Spend</h4><p><?php echo SITE_PRICE_RANGE; ?> (excl. tax & service charge)</p></div>
        </div>
        <div class="info-row">
          <div class="ic">★</div>
          <div><h4>Rating</h4><p><?php echo SITE_RATING; ?> / 5.0 from <?php echo SITE_REVIEWS; ?> Google reviews</p></div>
        </div>
        <a href="<?php echo SITE_MAPS_URL; ?>" target="_blank" rel="noopener" class="btn btn-primary btn-block" style="margin-top:10px;">Open in Google Maps</a>
      </div>

      <div class="map-embed reveal">
        <iframe
          src="https://www.google.com/maps?q=KOZI+Coffee+Jl.+Boulevard+Raya+Pekayon+Jaya+Bekasi&output=embed"
          allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </div>
  </div>
</section>

<!-- ============================= CTA ============================= -->
<div class="cta-band">
  <div class="cta-inner reveal">
    <div>
      <h3>Hungry already? Browse the full KOZI menu.</h3>
      <p>70+ dishes and drinks — rice bowls, ramen, pasta, brisket, coffee, matcha and mocktails.</p>
    </div>
    <a href="menu.php" class="btn btn-light">Open Full Menu</a>
  </div>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>
