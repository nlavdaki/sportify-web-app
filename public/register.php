<?php require __DIR__ . '/php/session.php'; ?>
<!doctype html>
<html lang="el">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Register</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php include __DIR__ . '/php/nav.php'; ?>

<main>
  <h2>Sign up</h2>

  <form id="regForm" class="card" method="post" action="php/register.php" novalidate>
    <label>Name
      <input type="text" name="fullname" id="fullname" required>
    </label>
    <div id="e_fullname" class="error"></div>

    <label>Email
      <input type="email" name="email" id="email" required>
    </label>
    <div id="e_email" class="error"></div>

    <label>Password
      <input type="password" name="password" id="password" required minlength="6">
    </label>
    <div id="e_password" class="error"></div>

    <label>Favorite Sport
      <select name="fav_sport" id="fav_sport">
        <option>Football</option>
        <option>Basketball</option>
        <option>Tennis</option>
        <option>Running</option>
      </select>
    </label>

    <button type="submit" class="btn">Register</button>
  </form>

  <h3>User Search (using email)</h3>
  <form class="card" method="get" action="php/fetch_user.php">
    <label>Email
      <input type="email" name="email" required>
    </label>
    <button type="submit" class="btn">Search</button>
  </form>

  <p class="card">Do you have existing account? <a href="login.php">Sign in</a></p>
</main>

<footer>© 2025</footer>
<script src="assets/js/validate.js"></script>
</body>
</html>
