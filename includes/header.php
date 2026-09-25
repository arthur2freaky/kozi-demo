<?php
if (!defined('DB_HOST')) { require_once __DIR__ . '/../config/db.php'; }
if (!defined('SITE_NAME')) { require_once __DIR__ . '/../config/settings.php'; }
$current = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo isset($pageTitle) ? $pageTitle . ' — ' . SITE_NAME : SITE_NAME . ' Bekasi — Coffee, Rice Bowl, Ramen & More'; ?></title>
<meta name="description" content="<?php echo isset($pageDescription) ? $pageDescription : 'KOZI Coffee Bekasi — 100% Halal cafe serving rice bowls, ramen, pasta, smoked brisket, coffee, matcha and mocktails. ' . SITE_TAGLINE; ?>">
<link rel="icon" href="images/logo.jpg" type="image/jpeg">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav class="navbar">
  <div class="nav-inner">
    <a href="index.php" class="brand">
      <img src="images/logo.jpg" alt="<?php echo SITE_NAME; ?> logo">
      <span>KOZI<span class="tag"><?php echo SITE_TAGLINE; ?></span></span>
    </a>

    <ul class="nav-links">
      <li><a href="index.php" class="<?php echo $current === 'index.php' ? 'active' : ''; ?>">Home</a></li>
      <li><a href="menu.php" class="<?php echo $current === 'menu.php' ? 'active' : ''; ?>">Menu</a></li>
      <li><a href="index.php#about">About</a></li>
      <li><a href="index.php#gallery">Gallery</a></li>
      <li><a href="index.php#location">Location</a></li>
      <li><a href="contact.php" class="<?php echo $current === 'contact.php' ? 'active' : ''; ?>">Contact</a></li>
    </ul>

    <div class="nav-cta">
      <a href="tel:<?php echo SITE_PHONE_LINK; ?>" class="btn btn-outline">Call Us</a>
      <a href="menu.php" class="btn btn-primary">View Menu</a>
      <button class="nav-toggle" aria-label="Toggle menu">
        <span></span><span></span><span></span>
      </button>
    </div>
  </div>
</nav>
