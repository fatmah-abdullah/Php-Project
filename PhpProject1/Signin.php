<?php
session_start();

$message = "";
$redirect = false;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coffeeshop_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_input = $_POST['username'];
    $pass       = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$user_input'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        $message = "You are not registered. Please sign up first.";
    } else {
        $row = $result->fetch_assoc();

        if (!password_verify($pass, $row['password'])) {
            $message = "Wrong password.";
        } else {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];

            $message = "Login successful!";
            $redirect = true;
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign in</title>

    <link rel="stylesheet" href="Main.css">
    <link rel="stylesheet" href="Signin.css" />
    <script type="text/javascript" src="Signin.js"></script>
      
    <meta charset="UTF-8" />

    <script type="text/javascript">
        window.onload = function () {
            <?php if ($message != ""): ?>
                alert("<?php echo $message; ?>");
            <?php endif; ?>

            <?php if ($redirect): ?>
                window.location.href = "Home.php";
            <?php endif; ?>
        }
    </script>
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

<a><img src="signin/signinlogo.jpg" alt ="coffee" class="my-img"></a>

<section class="box">
  <form onsubmit="fun()" method="POST">
    <label for="username"><strong><em>User Name:</em></strong></label>
    <input type="text" id="username" name="username" placeholder="Write your name" required><br>

    <label for="password"><strong><em>Password:</em></strong></label>
    <input type="password" id="password" name="password" placeholder="Write your password" required><br>

    <input type="submit" id="login" value="             SIGN IN             ">
  </form>
</section>

<br>
</body>
</html>
