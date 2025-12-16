<?php

$servername = "localhost";
$db_username = "root";          
$db_password = "";              
$dbname = "coffeeshop_db"; 


$conn = new mysqli($servername, $db_username, $db_password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $msg = $_POST['message'];

    
    $stmt = $conn->prepare("INSERT INTO feedbacks (username, message) VALUES (?, ?)");
    $stmt->bind_param("ss", $user, $msg);

    if ($stmt->execute()) {
        echo "Your feedback has been sent successfully! Thank you, " . htmlspecialchars($user) . "!";
    } else {
        echo "Error saving feedback: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request.";
}

$conn->close();
?>