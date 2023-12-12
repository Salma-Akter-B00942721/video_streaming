<?php
session_start();
include 'config/database.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user details from the database based on email
    $sql = "SELECT * FROM Users WHERE Email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['Password'])) {
            // Password matches, set session variables or redirect to dashboard
            $_SESSION['user_id'] = $row['UserID'];
            $_SESSION['username'] = $row['Username'];
            // Redirect to dashboard.php or perform other actions
            //echo "Login successful!";
            header("location: homepage.php");
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "User not found!";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<?php include "config/head.php"; ?>
</head>
	<body>
        <header>
            <nav class="navbar navbar-expand-md navbar-dark bg-secondary">
                <a href="index.php" class="navbar-brand"> <img src="images/ulster-university.png" alt=""> </a>
                <span class="navbar-text">NewFlix</span>
                <ul class="navbar-nav">
                    <li class="nav-item"> <a href="#" class="nav-link"> Services</a> </li>
                    <li class="nav-item"> <a href="register.php" class="nav-link"> SignUp</a> </li>
                </ul>
            </nav>
		</header>

        <div class="container">
            <div class="jumbotron">
                <h1>User Login</h1>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit" type="submit" value="Login">Submit</button>
                </form>
            </div>
        </div>

		<!-- Footer area start -->
		<?php include "config/footer.php"; ?>
		<!-- Footer area end -->
	</body>
</html>

