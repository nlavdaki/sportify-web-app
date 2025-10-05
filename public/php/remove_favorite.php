<?php
require __DIR__ . '/session.php';
if (!isset($_SESSION['user_id'])) { http_response_code(403); exit('Not logged in'); }

require __DIR__ . '/db.php';
$user_id    = (int) $_SESSION['user_id'];
$product_id = (int) ($_POST['product_id'] ?? 0);

if ($product_id <= 0) { http_response_code(400); exit('Invalid product'); }

$stmt = $mysqli->prepare("DELETE FROM favorites WHERE user_id = ? AND product_id = ?");
$stmt->bind_param('ii', $user_id, $product_id);
$stmt->execute();

header('Location: /php/wishlist_view.php');
