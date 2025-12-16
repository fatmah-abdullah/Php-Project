<?php

$servername = "localhost"; 
$username = "root";        
$password = "";            
$dbname = "coffeeshop_db";    

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

$products = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Menu</title>
    <link rel="stylesheet" href="Main.css">
    <link rel="stylesheet" href="menu updated.css">
</head>

<body>
    <nav>
        <ul>
            <li><a href="Home.php">Home</a></li>
            <li><a href="Signin.php">Sign in</a></li>
            <li><a href="Story.php">Our Story</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="ContactUs.php">Contact us</a></li>
            <li><a href="AboutUs.php">About us</a></li>
            <li><a href="SignUp.php">Sign Up</a></li>
            <li><a href="feedback.php">Feedback</a></li>
        </ul>
    </nav>

    <header>
        <a href="#" class="logo">Menu</a>
        <div id="cart-icon">
            <img src="menu/cart.png" alt="cart" class="my-cart">
            <span class="count"></span>
        </div>
    </header>

    <div class="cart">
        <h2 class="cart-title">Your Cart</h2>
        <div class="cart-content"></div>
        <div class="total">
            <div class="total-title">Total</div>
            <div class="total-price">$0</div>
        </div>
        <button class="btn-buy">Buy Now</button>
        <img src="menu/close.png" id="cart-close">
    </div>

    <section class="menu">
        <h1 class="title">Drinks & Sweets</h1>
        <div class="product-content">
            <?php foreach($products as $product): ?>
            <div class="product-box">
                <div class="img-box">
                    <img src="<?php echo $product['imgSrc']; ?>" alt="<?php echo $product['name']; ?>">
                </div>
                <h2 class="product-name"><?php echo $product['name']; ?></h2>
                <div class="price-and-cart">
                    <span class="price">$<?php echo $product['price']; ?></span>
                    <img src="menu/cart.png" alt="cart" class="add-cart">
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <script type="text/javascript" src="menu updated.js"></script>
</body>
</html>
