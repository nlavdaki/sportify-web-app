<?php
require __DIR__ . '/db.php';
$email = trim($_GET['email'] ?? '');
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { http_response_code(400); exit('Invalid email'); }


$stmt = $mysqli->prepare("SELECT id, fullname, email, fav_sport, created_at FROM users WHERE email=?");
$stmt->bind_param('s', $email);
$stmt->execute();
$res = $stmt->get_result();
if ($row = $res->fetch_assoc()) {
header('Content-Type: text/plain; charset=utf-8');
echo "ID: {$row['id']}\nName: {$row['fullname']}\nEmail: {$row['email']}\nSport: {$row['fav_sport']}\nDate: {$row['created_at']}\n";
} else {
echo "Email not found: " . htmlspecialchars($email);
}