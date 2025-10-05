<?php require __DIR__ . '/php/session.php'; ?>
<!doctype html>
<html lang="el">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Sign in</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php include __DIR__ . '/php/nav.php'; ?>

<main>
<h2>Sign in</h2>
<form class="card" method="post" action="php/login.php">
<label>Email <input type="email" name="email" required></label>
<label>Password <input type="password" name="password" required></label>
<button type="submit" class="btn">Sign in</button>
</form>
<p class="card">Don't have an account? <a href="register.php">Resgister</a></p>
</main>
<footer>© 2025</footer>
</body>
</html>