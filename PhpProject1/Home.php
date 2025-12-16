<?php
// ================== DB CONNECTION ==================
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "coffeeshop_db";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ================== GET BEST SELLERS ==================
$sql = "
    SELECT p.name, p.imgSrc, SUM(o.quantity) AS total_sold
    FROM orders o
    JOIN products p ON o.product_name = p.name
    GROUP BY p.name, p.imgSrc
    ORDER BY total_sold DESC
    LIMIT 3
";

$result = $conn->query($sql);
$best_sellers = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $best_sellers[] = $row;
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Espresso Coffee Shop</title>

    <link rel="stylesheet" href="Main.css" />
    <link rel="stylesheet" href="Home.css" />
    <script type="text/javascript" src="Home.js"></script>
</head>

<body>

<!-- ================== NAVBAR ================== -->
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

<!-- ================== PREVIEW ================== -->
<section class="preview">
    <img src="coffee-images/HomePuringinCup.jpg" alt="Coffee Cup Placeholder" />
    <h1>COFFEE IS WHAT you really, really need</h1>
    <p>A cup of coffee a day keeps the stress away</p>
</section>

<!-- ================== BEST SELLERS ================== -->
<section class="best-sellers">
    <h2>Best Sellers</h2>

    <section class="items">
        <?php foreach ($best_sellers as $item): ?>
            <section class="item">
                <img src="<?php echo htmlspecialchars($item['imgSrc']); ?>" alt="Best Seller">
                <h3><?php echo htmlspecialchars($item['name']); ?></h3>
                <p>
                    <?php
                    switch ($item['name']) {
                        case 'Espresso':
                            echo 'Stay cool, stay classic';
                            break;
                        case 'Cappuccino':
                            echo 'A very smoth and fluffy coffe with balanced amount of milk ,Best choice for Holidays mornung.';
                            break;
                        case 'Flat White':
                            echo 'perfect coffee for any time.';
                            break;
                        default:
                            echo 'Delicious coffee for you';
                    }
                    ?>
                </p>
            </section>
        <?php endforeach; ?>
    </section>
</section>

<!-- ================== DELIVERY ================== -->
<section class="delivery">
    <h2>Can we ring your bell?</h2>
    <p>
        We’ll come to you when you can’t come to us. Our home delivery service is faster than the light,
        you’ll always get your order hot or cold, but never worm.
    </p>
    <img src="coffee-images/HomeDelivery-removebg.png" alt="Delivery Icon" />
</section>

<!-- ================== FOOTER ================== -->
<footer>
    <p>CoffeeShop made by three students © 2025. All Rights Reserved.</p>
    <a href="https://wa.me/054XXXXXX">Your FeedBack</a>
</footer>

</body>
</html>

<?php $conn->close(); ?>
