<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } ?>
<header class="site-header">
  <div class="brand">
    <a href="/index.php" class="brand-link">
      <img src="/img/logo.png" alt="Sportify logo" class="logo">
      <span>Sportify</span>
    </a>
  </div>
  <nav class="main-nav">
    <a href="/index.php">Home</a>
    <a href="/products.php">Products</a>
    <a href="/services.php">News & Services</a>
    <a href="/weather.php">LIVE Weather</a>
    <a href="/cart.php">Cart <span id="cart-count"></span></a>
    <a href="/about.php">About</a>

    <?php if (isset($_SESSION['user_id'])): ?>
      <a href="/php/wishlist_view.php">Wishlist</a>
      <span class="user-slot"> | Signed in:
        <?= htmlspecialchars($_SESSION['fullname']) ?>
        (<a href="/php/logout.php">Log Out</a>)
      </span>
    <?php else: ?>
      <a href="/register.php">Sign up</a>
      <a href="/login.php">Sign in</a>
    <?php endif; ?>
  </nav>
</header>
