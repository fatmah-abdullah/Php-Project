<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Menu</title>

        <link rel="stylesheet" href="Main.css">
        <link rel="stylesheet" href="menu.css">
        <script type="text/javascript" src="menu.js"></script>
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
    
        
        
        
        
        
        
        
        
        
<section class="body">
        
    <h1><em>Menu</em> <img src="menu/cart.png" alt ="cart" class="my-cart"> 
        <span id="count">0</span>
    </h1>
    <hr>
    
    <section class="gallery">

        <section class="item">
            <a><img src="menu/BlackCoffee.png" alt ="coffee1" class="my-img1"></a>
            <h4>Macchiato <input type="submit" value="+" onclick="addToCart(0);"></h4>
            <p class="desc">an Italian espresso-based drink meaning "marked" or "stained"</p>
        </section>
        
        <section class="item">
            <a><img src="menu/coffee2.png" alt ="coffee2" class="my-img2"></a>
            <h4>Cappuccino <input type="submit" value="+" onclick="addToCart(1);"></h4>
            <p class="desc">composed of equal parts espresso, steamed milk, and milk foam</p>
        </section>
        
        <section class="item">
            <a><img src="menu/blackcoffee.png" alt ="coffee3" class="my-img3"></a>
            <h4>Americano <input type="submit" value="+" onclick="addToCart(2);"></h4>
            <p class="desc">espresso-based coffee drink made by adding hot water to espresso</p>
        </section>
        
        <section class="item">
            <a><img src="menu/co9.png" alt ="coffee4" class="my-img4"></a>
            <h4>Espresso <input type="submit" value="+" onclick="addToCart(3);"></h4>
            <p class="desc">coffee made by forcing hot water under high pressure through finely ground coffee beans</p>
        </section>
        
        <section class="item">
            <a><img src="menu/coffee33.png" alt ="coffee5" class="my-img5"></a>
            <h4>Double Espresso <input type="submit" value="+" onclick="addToCart(4);"></h4>
            <p class="desc">a single-serving coffee drink made by extracting two shots of espresso</p>
        </section>
        
        <section class="item">
            <a><img src="menu/FrapCoffee.png" alt ="coffee6" class="my-img6"></a>
            <h4>Cafe Latte <input type="submit" value="+" onclick="addToCart(5);"></h4>
            <p class="desc">coffee drink made with shots of espresso and steamed milk</p>
        </section>
        
        <section class="item">
            <a><img src="menu/ma.png" alt ="coffee7" class="my-img7"></a>
            <h4>Matcha <input type="submit" value="+" onclick="addToCart(6);"></h4>
            <p class="desc">A fine Japanese tea powder used traditionally and in modern drinks</p>
        </section>
        
        <section class="item">
            <a><img src="menu/nn.png" alt ="coffee8" class="my-img8"></a>
            <h4>Flat White <input type="submit" value="+" onclick="addToCart(7);"></h4>
            <p class="desc">espresso with steamed milk and thin microfoam</p>
        </section>

    </section>
        
    <br><br>
    <section class="hor"><hr></section>

    <section class="food">
        <h3>SWEETS</h3>
    
        <ol>
            <li>Chocolate Waffle <input type="submit" value="+" onclick="addToCart(8);" class="sweet"></li>
            <li>Strawberry Waffle <input type="submit" value="+" onclick="addToCart(9);" class="sweet"></li>
            <li>Chocolate Cake <input type="submit" value="+" onclick="addToCart(10);" class="sweet"></li>
            <li>Ice Cream <input type="submit" value="+" onclick="addToCart(11);" class="sweet"></li>
            <li>Chocolate Pudding <input type="submit" value="+" onclick="addToCart(12);" class="sweet"></li>
            <li>Strawberry Pudding <input type="submit" value="+" onclick="addToCart(13);" class="sweet"></li>
        </ol>
     </section>

</section>
    
</body>
</html>
