<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Our Story - Coffee Shop</title>
    <link rel="stylesheet" href="Main.css">
    <link rel="stylesheet" href="feedback.css">
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
        </ul>
    </nav>

    <a><img src="signin/signinlogo.jpg" alt="coffee" class="my-img"></a>

    <section class="box">
        <form id="feedbackForm">
            <label for="username"><strong><em>User Name:</em></strong></label>
            <input type="text" id="username" name="username" placeholder="Write your name" required><br>
            <label for="area"><strong><em>Write Below:</em></strong></label>
            <textarea name="area" rows="15" cols="60" required></textarea>
            <input type="submit" id="submit" value="Submit">
        </form>
    </section>

    <script>
        document.getElementById('feedbackForm').addEventListener('submit', function(event) {
            event.preventDefault(); 

            const username = document.getElementById('username').value.trim();
            const message = document.querySelector('textarea[name="area"]').value.trim();

            if (!username || !message) {
                alert('Please fill in all fields!');
                return;
            }

           
            fetch('save_feedback.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `username=${encodeURIComponent(username)}&message=${encodeURIComponent(message)}`
            })
            .then(response => response.text())
            .then(data => {
                
                alert(data);
                document.getElementById('feedbackForm').reset(); 
            })
            .catch(error => {
                alert('Error: ' + error);
            });
        });
    </script>
</body>
</html>
