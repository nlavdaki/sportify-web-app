<?php
require __DIR__ . '/db.php';


$fullname = trim($_POST['fullname'] ?? '');
$email = trim($_POST['email'] ?? '');
$pass = $_POST['password'] ?? '';
$fav = trim($_POST['fav_sport'] ?? '');


if ($fullname === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($pass) < 6) {
http_response_code(400); echo 'Invalid input'; exit;
}


$hash = password_hash($pass, PASSWORD_DEFAULT);
$stmt = $mysqli->prepare("INSERT INTO users(fullname,email,password_hash,fav_sport) VALUES(?,?,?,?)");
$stmt->bind_param('ssss', $fullname, $email, $hash, $fav);


if ($stmt->execute()) {
echo "Succesfull Registration: " . htmlspecialchars($email);
} else {
if ($mysqli->errno == 1062) echo "The email already exists."; else { http_response_code(500); echo "DB Error."; }
}