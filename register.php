<?php
include 'config/database.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $user_type = $_POST['user_type'];
    
    // Hash the password
    //$hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Perform SQL insert into Users table
    $sql = "INSERT INTO Users (Username, Email, Password, UserType, RegistrationDate) VALUES ('$username', '$email', '$password', '$user_type', NOW())";

    if ($conn->query($sql) === TRUE) {
        //echo "Registration successful!";
        header("location: homepage.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
    <!-- Navbar Area Start -->
	<?php include "config/navbar.php"; ?>
	<!-- Navbar Area End -->
        
    <!-- <div class="container-fluid"> -->
        <div class="container">
            <div class="jumbotron">
                <h1>User Registration</h1>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="username" class="form-control" id="username" placeholder="Enter username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="user_type">User Type</label>
                        <select name="user_type" class="form-control">
                            <option value="Creator">Creator</option>
                            <option value="Consumer">Consumer</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit" type="submit" value="Login">Submit</button>
                </form>
            </div>
        </div>
    <!-- </div> -->

    <!-- Footer area start -->
    <?php include "config/footer.php"; ?>
    <!-- Footer area end -->
</body>
</html>
