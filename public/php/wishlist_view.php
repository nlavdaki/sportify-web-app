<?php
require __DIR__ . '/session.php';
if (!isset($_SESSION['user_id'])) { echo 'You must sign in first.'; exit; }

require __DIR__ . '/db.php';
$user_id = (int) $_SESSION['user_id'];

$sql = "SELECT p.id, p.name, p.price, p.img, f.created_at
        FROM favorites f
        JOIN products p ON p.id = f.product_id
        WHERE f.user_id = ?
        ORDER BY f.created_at DESC";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$res = $stmt->get_result();
?>
<!doctype html>
<html lang="el">
<head>
  <meta charset="utf-8">
  <title>Wishlist</title>
  <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<?php include __DIR__ . '/nav.php'; ?>
<main>
  <h2>My Wishlist</h2>
  <section class="grid products">
    <?php while ($row = $res->fetch_assoc()): ?>
      <?php
        // Normalize to /img/<filename>
        $file   = basename($row['img'] ?: '');
        $imgUrl = $file ? "/img/$file" : "/img/placeholder.png";
      ?>
      <article class="card product">
        <img src="<?= htmlspecialchars($imgUrl) ?>" alt="<?= htmlspecialchars($row['name']) ?>">
        <h3><?= htmlspecialchars($row['name']) ?></h3>
        <div class="price">€<?= number_format($row['price'], 2, ',', '.') ?></div>
        <small>Added: <?= htmlspecialchars($row['created_at']) ?></small>
        <form method="post" action="/php/remove_favorite.php">
          <input type="hidden" name="product_id" value="<?= (int)$row['id'] ?>">
          <button class="btn" type="submit">− Remove</button>
        </form>
      </article>
    <?php endwhile; ?>
  </section>
</main>
</body>
</html>
