<?php require __DIR__ . '/php/session.php'; ?>
<!doctype html>
<html lang="el">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title>Sportify | Home</title>
<link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
<?php include __DIR__ . '/php/nav.php'; ?>

<main>
<section class="card">
<h2>Wellcome to Sportify</h2>
<p>Athletic e‑shop case study with pages such as products, news & services, live weather, cart, wishlist etc. Webpage utilizing HTML5, CSS3, JavaScript & PHP.</p>
</section>
<section class="grid products">
<article class="card product">
<img src="img/demo_shoes.jpg" alt="Running Shoes" />
<h3>Running Shoes X</h3>
<div class="price">€79.90</div>
<a class="btn" href="products.php">See more</a>
</article>
<article class="card product">
<img src="img/demo_ball.jpg" alt="Basketball" />
<h3>Basketball Pro</h3>
<div class="price">€29.90</div>
<a class="btn" href="products.php">See more</a>
</article>
<article class="card product">
<img src="img/demo_racket.jpg" alt="Tennis Racket" />
<h3>Tennis Racket S</h3>
<div class="price">€119.00</div>
<a class="btn" href="products.php">See more</a>
</article>
</section>
</main>
<footer>© 2025 • <a href="mailto:lavdisn@gmail.com">Email</a></footer>
</body>
</html>