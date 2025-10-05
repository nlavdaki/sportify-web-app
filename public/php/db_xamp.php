<?php
// public/php/db.php
if (session_status() === PHP_SESSION_NONE) { session_start(); }

$host = 'localhost';   // instead of 'db'
$db   = 'sports_shop';
$user = 'root';        // or the user you created
$pass = '';            // in XAMPP root dir is usually empty

$mysqli = @new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_errno) {
  http_response_code(500);
  header('Content-Type: text/plain; charset=utf-8');
  echo "DB CONNECT ERROR ({$mysqli->connect_errno}): {$mysqli->connect_error}\n";
  echo "Tried host=$host db=$db user=$user\n";
  exit;
}

$mysqli->set_charset('utf8mb4');
