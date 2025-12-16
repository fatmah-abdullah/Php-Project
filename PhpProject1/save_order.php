<?php
error_reporting(0);
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coffeeshop_db";

$input = json_decode(file_get_contents('php://input'), true);

if (!$input || !isset($input['cart'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid input']);
    exit;
}

$cart = $input['cart'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => $conn->connect_error]);
    exit;
}

foreach ($cart as $item) {
    $name = $conn->real_escape_string($item['name']);
    $price = $item['price'];
    $quantity = $item['quantity'];
    $created_at = date('Y-m-d H:i:s');

    $sql = "INSERT INTO `orders` (product_name, price, quantity, created_at) VALUES ('$name', $price, $quantity, '$created_at')";
    if (!$conn->query($sql)) {
        echo json_encode(['success' => false, 'message' => $conn->error]);
        exit;
    }
}

$conn->close();

echo json_encode(['success' => true]);
?>
