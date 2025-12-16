<?php

$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "coffeeshop_db";


$conn = new mysqli($servername, $db_username, $db_password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$result = $conn->query("SELECT * FROM our_story ORDER BY id ASC");
$sections = [];
while ($row = $result->fetch_assoc()) {
    $sections[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Our Story - Coffee Shop</title>
<link rel="stylesheet" href="Main.css"> 
<link rel="stylesheet" href="Story.css"> 
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

<?php foreach ($sections as $section): ?>
<section class="story-section">
    <section class="story-text">
        <h2><?php echo htmlspecialchars($section['section_title']); ?></h2>
        <p><?php echo nl2br(htmlspecialchars($section['section_text'])); ?></p>
    </section>
    <section class="story-image">
        <img src="<?php echo htmlspecialchars($section['section_image']); ?>" alt="">
    </section>
</section>
<?php endforeach; ?>

</body>
</html>
<?php $conn->close(); ?>
