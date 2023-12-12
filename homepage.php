<?php 
    session_start();
    include "config/database.php"; 
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <?php include "config/head2.php"; ?>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark bg-secondary">
            <a href="#" class="navbar-brand"> <img src="images/ulster-university.png" alt=""> </a>
            <span class="navbar-text">NewFlix</span>
            <ul class="navbar-nav">
                <?php
                    echo"<li class='nav-item'> <a href='account.php' class='nav-link'>Account</a> </li>
                    <li class='nav-item'> <a href='logout.php' class='nav-link'>Logout</a> </li>
            </ul>
        </nav>
        <div class='container-fluid'> <br><br><br>";
                include 'database.php';
                $id = $_SESSION['user_id'];
                $quer = "SELECT * FROM users WHERE UserID = '$id' ";
                //echo $id;
                $check = mysqli_query($con,$quer);
				$rel = mysqli_fetch_assoc($check);
                $quer2 = "SELECT * FROM videocontent;";
                $check2 = mysqli_query($con,$quer2);
                $rel2 = mysqli_fetch_assoc($check2);
            
                echo"<h1 style='color:black;position:sticky;'>WELCOME </h1><b style = 'color: black;font-size: 25px'><i> ".ucwords($rel['Username'])." !</i></b>
        </div>
    </header>

    <section>
        <div class='jumbotron' style='margin-top:15px;padding-top:30px;padding-bottom:30px;'>
            <div class='row'>
                <div class='col'>
                    <form action='movie.php' method='POST'>
                        <h4 style='color:black;font-size:30px;'>Recent :
                        <input type='submit' name='submit' class='btn btn-success' style='display:inline;width:200px;margin-left:20px;margin-right:20px;' value='".ucwords($rel['Username'])."'/></h4>
                    </form>
                </div>
                <div class='col'>
                    <form action='search.php' method='POST'>
                        <select  name='option' style='padding:5px;'>
                            <option selected>Search By</option>
                            <option value='name'>Name</option>
                            <option value='genre'>Genre</option>
                            <option value='rdate'>Release year</option>
                        </select>
                        <input type='text' placeholder='Enter..' style='margin-left:10px;margin-top:10px;padding:5px;' name='textoption'>

                        <input type='submit' name='submit' class='btn btn-success' style='display:inline;width:100px;margin-left:20px;margin-right:20px;margin-top:5px;' value='Search'/></h4>
                    </form>
                </div>
            </div>
        </div>";
        ?>
        <div class="jumbotron">
            <h2 style='margin-top:0px;padding-top:0px;'>Latest updated</h2>
            <div class="row">
                <?php include 'latest-fetcher.php'; ?>
            </div>
        </div>
        <div class="jumbotron">
            <h2>  All movies</h2>
            <?php include 'fetcher.php';?>
        </div>

    </section>
    <!-- Header area end -->

    <!-- Footer area start -->
    <?php include "config/footer.php"; ?>
    <!-- Footer area end -->
</body>
</html>
