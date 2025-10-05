<?php require __DIR__ . '/php/session.php'; ?>
<!doctype html>
<html lang="el">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Services & News</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<?php include __DIR__ . '/php/nav.php'; ?>
<body>

<main>
<section class="card">
<h2></h2>
<ul>
<li>Team Offers</li>
<li>Equipment maintenance</li>
<li>Basic Coaching Advice</li>
</ul>
</section>


<section class="card">
<h2>Sports News (embeded)</h2>
<p>Content example keeping the user in this webpage without the need searcing info elsewhere.</p>
<iframe src="https://www.olympic.org/" width="100%" height="600" style="border:0"></iframe>
</section>
</main>
<footer>© 2025</footer>
</body>
</html>