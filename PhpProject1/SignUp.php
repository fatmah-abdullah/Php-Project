<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sing in</title>

        <link rel="stylesheet" href="Main.css">
        <link rel="stylesheet" href="SignUp.css" />
        <script type="text/javascript" src="SignUp.js"></script>

        <meta charset="UTF-8" />
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

        <a><img src="signin/signinlogo.jpg" alt="coffee" class="my-img"></a>

        <section class="box">
            <form method="POST" onsubmit="fun()">
                <label for="username"><strong><em>User Name:</em></strong></label>
                <input type="text" id="username" name="username" placeholder="Write your name" required><br>

                <label for="password"><strong><em>Password:</em></strong></label>
                <input type="password" id="password" name="password" placeholder="Write your password" required><br>

                <label for="email"><strong><em>email:</em></strong></label>
                <input type="email" id="email" name="email" placeholder="Write your email" required><br>

                <label for="age"><strong><em>age:</em></strong></label>
                <input type="number" id="age" name="age" placeholder="Write your age" min="13" required><br>

                <input type="submit" id="login" value="             SIGN UP             ">
            </form>
        </section>

        <br>

    </body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coffeeshop_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $age      = $_POST['age'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password, age)
            VALUES ('$username', '$email', '$hashedPassword', '$age')";

    $conn->query($sql);

    $conn->close();
}
?>
