<?php
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "coffeeshop_db";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM contact_info LIMIT 1";
$result = $conn->query($sql);
$contact = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Contact Us</title>

    <link rel="stylesheet" href="Main.css">
    <link rel="stylesheet" href="ContactUs.css">
</head>

<body>

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
    <img class="divimg" src="signin/logo-removebg.png" alt="Coffee Shop Logo" width="20%" height="20%">

    <h1>Contact Us</h1>

    <p style="text-align:center; color:#7b4b2a; font-size:14pt; margin-bottom:20px;">
        <em>
            <?php echo htmlspecialchars($contact['description']); ?>
        </em>
    </p>

    <ul>
        <li>
            <a href="<?php echo htmlspecialchars($contact['whatsapp']); ?>" target="_blank">
                Whatsapp
            </a>
        </li>
        <li>
            <a href="<?php echo htmlspecialchars($contact['instagram']); ?>" target="_blank">
                Instagram
            </a>
        </li>
        <li>
            <a href="<?php echo htmlspecialchars($contact['twitter']); ?>" target="_blank">
                (X)
            </a>
        </li>
    </ul>
</section>

<footer>
  <p>
    CoffeeShop made by three students © 2025. All Rights Reserved.
    <a href="feedback.php"><strong>Your FeedBack</strong></a>
  </p>
</footer>

</body>
</html>

<?php $conn->close(); ?>
