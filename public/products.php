<?php require __DIR__ . '/php/session.php'; require __DIR__ . '/php/db.php'; ?>
<!doctype html>
<html lang="el">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Products</title>
  <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<?php include __DIR__ . '/php/nav.php'; ?>

<main>
  <h2>Products</h2>
  <?php $res = $mysqli->query("SELECT id, name, price, img FROM products ORDER BY id"); ?>
  <section class="grid products">
    <?php while ($row = $res->fetch_assoc()): ?>
      <?php
        // Keep only the filename from DB and serve from /img/
        $file = basename($row['img'] ?: '');
        $imgUrl = $file ? "/img/$file" : "/img/placeholder.png";
      ?>
      <article class="card product">
        <img src="<?= htmlspecialchars($imgUrl) ?>" alt="<?= htmlspecialchars($row['name']) ?>">
        <h3><?= htmlspecialchars($row['name']) ?></h3>
        <div class="price">€<?= number_format($row['price'], 2, ',', '.') ?></div>

        <button class="btn add-to-cart"
                data-id="<?= (int)$row['id'] ?>"
                data-name="<?= htmlspecialchars($row['name']) ?>"
                data-price="<?= htmlspecialchars($row['price']) ?>"
                data-img="<?= htmlspecialchars($imgUrl) ?>">
          Buy
        </button>

        <?php if (!empty($_SESSION['user_id'])): ?>
          <form method="post" action="/php/wishlist_add.php" style="margin-top:.5rem">
            <input type="hidden" name="product_id" value="<?= (int)$row['id'] ?>">
            <button class="btn" type="submit">+ Favorite</button>
          </form>
        <?php else: ?>
          <a class="btn" href="/login.php" style="margin-top:.5rem">My Wishlist</a>
        <?php endif; ?>
      </article>
    <?php endwhile; ?>
  </section>
</main>

<footer>© 2025</footer>
<script src="/assets/js/cart.js"></script>
</body>
</html>
