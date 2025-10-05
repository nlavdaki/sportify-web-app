<?php require __DIR__ . '/php/session.php'; ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>About</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php include __DIR__ . '/php/nav.php'; ?>

<main>
  <section class="card">
    <h2>Case Study</h2>
    <p><strong>Nikolaos Lavdakis</strong> | Data Scientist.</p>
    <p>This project is a sports shop web application built as a case study in 2025.  
       It demonstrates the use of full-stack web technologies (frontend + backend) with a focus on clean design and database integration.</p>
    <p>Contact: <a href="mailto:lavdisn@gmail.com">lavdisn@gmail.com</a></p>
  </section>

  <section class="card">
    <h3>Technologies Used</h3>
    <table class="table">
      <thead><tr><th>Technology</th><th>Purpose</th></tr></thead>
      <tbody>
        <tr><td>HTML5</td><td>Page structure and semantic layout</td></tr>
        <tr><td>CSS3</td><td>Styling, responsive grid, and UI design</td></tr>
        <tr><td>JavaScript</td><td>Form validation and interactive cart (LocalStorage)</td></tr>
        <tr><td>PHP</td><td>Server-side logic, user authentication, wishlist handling</td></tr>
        <tr><td>MySQL</td><td>Persistent storage of users, products, favorites</td></tr>
        <tr><td>Docker</td><td>Containerized environment (PHP-Apache, MySQL, Adminer)</td></tr>
      </tbody>
    </table>
  </section>
</main>

<footer>© 2025 – Case Study by Nikolaos Lavdakis</footer>
</body>
</html>
