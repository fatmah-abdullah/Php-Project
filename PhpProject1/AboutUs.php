<?php

$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "coffeeshop_db";


$conn = new mysqli($servername, $db_username, $db_password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$result = $conn->query("SELECT * FROM about_us LIMIT 1");
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title><?php echo htmlspecialchars($row['title']); ?></title>
    <link rel="stylesheet" href="Main.css">
    <link rel="stylesheet" href="AboutUs.css">
</head>
<body>
    <!-- Navigation bar -->
    <nav>
        <ul>
            <li><a href="Home.php">Home</a></li>
            <li><a href="Signin.php">Sign in</a></li>
            <li><a href="Story.php">Our Story</a></li>
            <li><a href="menu updated.php">Menu</a></li>
            <li><a href="ContactUs.php">Contact us</a></li>
            <li><a href="AboutUs.php">About us</a></li>
            <li><a href="SignUp.php">Sign Up</a></li>
            <li><a href="feedback.php">Feedback</a></li>
        </ul>
    </nav>

    <section>
        <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="Coffee Shop Logo" width="20%" height="20%">
        <h1><?php echo htmlspecialchars($row['title']); ?></h1>
        <p><em><?php echo nl2br(htmlspecialchars($row['description'])); ?></em></p>
    </section>
</body>
</html>
<?php $conn->close(); ?>
