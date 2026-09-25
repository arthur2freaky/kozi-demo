<?php
require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/config/settings.php';

$pageTitle = 'Full Menu';
$pageDescription = 'The full KOZI Coffee Bekasi menu — rice bowls, ramen, pasta, smoked brisket, snacks, desserts, coffee, matcha and mocktails.';

function rupiah($n) { return 'Rp ' . number_format($n, 0, ',', '.'); }

/* All categories, in display order */
$categories = $pdo->query("SELECT * FROM categories ORDER BY sort_order")->fetchAll();

/* All items, grouped by category_id */
$itemsStmt = $pdo->query("SELECT * FROM menu_items ORDER BY category_id, sort_order");
$itemsByCategory = [];
foreach ($itemsStmt->fetchAll() as $row) {
    $itemsByCategory[$row['category_id']][] = $row;
}

include __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
  <svg class="hero-swirl" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
    <path fill="#ffffff" d="M100,20 C140,20 175,50 175,95 C175,140 140,175 95,175 C55,175 25,150 20,115 C18,100 28,88 42,88 C54,88 62,96 64,107 C67,122 80,132 96,132 C116,132 132,116 132,96 C132,72 112,55 90,55 C70,55 55,66 48,82" stroke="none"/>
  </svg>
  <div class="container">
    <div class="eyebrow">70+ Dishes &amp; Drinks</div>
    <h1>The Full KOZI Menu</h1>
    <p>Rice bowls, ramen, pasta and smoked brisket to start, then coffee, matcha and mocktails to finish. All prices exclude tax and service charge.</p>
  </div>
</section>

<div class="menu-toolbar">
  <div class="container menu-toolbar-inner">
    <div class="search-box">
      <span>🔍</span>
      <input type="text" id="menuSearch" placeholder="Search the menu — e.g. ramen, matcha, brisket...">
    </div>
    <div class="group-toggle">
      <button class="active" data-group="all">All Menu</button>
      <button data-group="food">Food</button>
      <button data-group="drink">Drinks</button>
    </div>
  </div>
  <div class="container">
    <div class="cat-chip-row">
      <?php foreach ($categories as $cat): ?>
        <button class="cat-chip" data-group="<?php echo $cat['group']; ?>" data-target="cat-<?php echo $cat['slug']; ?>"><?php echo htmlspecialchars($cat['name']); ?></button>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<div class="menu-body">
  <div class="container">

    <div class="no-results">
      <h3>No dishes match your search</h3>
      <p>Try another keyword, or browse a category above.</p>
    </div>

    <?php foreach ($categories as $cat):
      $items = $itemsByCategory[$cat['id']] ?? [];
      if (empty($items)) continue;
    ?>
      <div class="menu-category" id="cat-<?php echo $cat['slug']; ?>" data-group="<?php echo $cat['group']; ?>">
        <div class="menu-category-head">
          <h2><?php echo htmlspecialchars($cat['name']); ?></h2>
          <div class="line"></div>
        </div>

        <?php if (!empty($cat['banner_image'])): ?>
          <div class="menu-category-banner">
            <img src="images/<?php echo htmlspecialchars($cat['banner_image']); ?>" alt="<?php echo htmlspecialchars($cat['name']); ?> at KOZI Coffee">
          </div>
        <?php endif; ?>

        <div class="menu-items-grid">
          <?php foreach ($items as $item): ?>
            <div class="menu-item" data-name="<?php echo strtolower(htmlspecialchars($item['name'])); ?>">
              <div class="info">
                <h4>
                  <?php if ($item['is_recommended']): ?><span class="rec-dot">★</span><?php endif; ?>
                  <?php echo htmlspecialchars($item['name']); ?>
                </h4>
                <?php if (!empty($item['description'])): ?>
                  <p><?php echo htmlspecialchars($item['description']); ?></p>
                <?php endif; ?>
                <?php if (!empty($item['note'])): ?>
                  <p class="note"><?php echo htmlspecialchars($item['note']); ?></p>
                <?php endif; ?>
              </div>
              <div class="price"><?php echo rupiah($item['price']); ?></div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endforeach; ?>

    <p style="text-align:center; color:#a3927d; font-size:13px; margin-top:20px;">
      ★ = Recommended by KOZI · Extra Shot +Rp 8.000 · Oatmilk +Rp 5.000 · Pillow +Rp 3.000 · All prices exclude tax and service charge.
    </p>
  </div>
</div>

<div class="cta-band">
  <div class="cta-inner">
    <div>
      <h3>Ready to order in person?</h3>
      <p><?php echo SITE_ADDRESS; ?> — open <?php echo SITE_HOURS; ?>.</p>
    </div>
    <a href="<?php echo SITE_MAPS_URL; ?>" target="_blank" rel="noopener" class="btn btn-light">Get Directions</a>
  </div>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>
