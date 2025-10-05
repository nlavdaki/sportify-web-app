<?php
// public/php/db.php
if (session_status() === PHP_SESSION_NONE) { session_start(); }

$host = 'db'; 
$db   = getenv('MYSQL_DATABASE') ?: 'sports_shop';
$user = getenv('MYSQL_USER')     ?: 'sports_user';
$pass = getenv('MYSQL_PASSWORD') ?: 'changeme_user';

$mysqli = @new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_errno) {
  http_response_code(500);
  header('Content-Type: text/plain; charset=utf-8');
  echo "DB CONNECT ERROR ({$mysqli->connect_errno}): {$mysqli->connect_error}\n";
  echo "Tried host=$host db=$db user=$user\n";
  exit;
}

$mysqli->set_charset('utf8mb4');
