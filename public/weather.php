<?php require __DIR__ . '/php/session.php'; ?>
<!doctype html><html lang="el"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Weather LIVE</title><link rel="stylesheet" href="assets/css/style.css">
</head>
<?php include __DIR__ . '/php/nav.php'; ?>
<body>


<main>
<h2>Wather conditions in Greece LIVE</h2>
<iframe src="https://www.meteo.gr/cf.cfm?city_id=1" width="100%" height="600" style="border:0"></iframe>
</main>
<footer>© 2025</footer>
</body></html>