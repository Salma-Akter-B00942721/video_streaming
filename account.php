<?php
    session_start();

    include 'config/database.php';

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user_type = $_POST['user_type'];
        
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Perform SQL insert into Users table
        $sql = "INSERT INTO Users (Username, Email, PasswordHash, UserType, RegistrationDate) VALUES ('$username', '$email', '$hashed_password', '$user_type', NOW())";

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
    <?php include "config/head2.php"; ?>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark bg-secondary">
            <a href="homepage.php" class="navbar-brand"> <img src="images/ulster-university.png" alt=""> </a>
            <span class="navbar-text">NeonFlix</span>
            <ul class="navbar-nav">
                <li class="nav-item"> <a href="homepage.php" class="nav-link">Home</a> </li>
                <li class="nav-item"> <a href="logout.php" class="nav-link">Logout</a> </li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <?php
            include 'config/database.php';
            $id = $_SESSION['id'];
            $sql = "SELECT * FROM users WHERE UserID = $id ";
            $newrecords = mysqli_query($conn,$sql);
            $result = mysqli_fetch_assoc($newrecords);

            echo"  
            <form  action='update.php' method='POST'><br><br>
            <input type='text' class='form-control' placeholder='Enter full name' name='fname' value='".ucwords($result['name'])."'><br>
            <input type='text' class='form-control' placeholder='Enter mobile number' name='phn' value='".$result['phone']."'><br>
            <label><b>Date of Birth : </b></label>
            <input type='text' class='from-control' placeholder='Enter Date of Birth' name='dob' value='".$result['DOB']."'><br>

            <div class='signupbutton'>
            <br><br>
            <button type='submit' class='btn btn-success' name='sub' value='submit'>Update Details</button>

            </div>
            </form>


            <br><br>
            <label><b>Email Id : </b>".$result['email']."</label>
            <br><br>
            <a href='accountp.php'>Change Password</a>";
        ?>
    </div>
</body>
</html>
