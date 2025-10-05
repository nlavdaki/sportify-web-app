<?php
session_start();
require __DIR__ . '/db.php';


$email = trim($_POST['email'] ?? '');
$pass = $_POST['password'] ?? '';


if (!filter_var($email, FILTER_VALIDATE_EMAIL) || $pass === '') { http_response_code(400); exit('Invalid input'); }


$stmt = $mysqli->prepare("SELECT id, fullname, email, password_hash FROM users WHERE email=?");
$stmt->bind_param('s', $email);
$stmt->execute();
$res = $stmt->get_result();
if ($row = $res->fetch_assoc()) {
if (password_verify($pass, $row['password_hash'])) {
$_SESSION['user_id'] = $row['id'];
$_SESSION['fullname'] = $row['fullname'];
echo "Succesfull Sign in! Wellcome!!!, " . htmlspecialchars($row['fullname']) . ". ";
echo '<a href="/index.php">Go to Index page</a> | <a href="/php/logout.php">Log out</a>';
} else {
echo "Wrong Password.";
}
} else {
echo "No user found on that email.";
}