<?php
include 'database.php';


  $im = "SELECT * FROM videocontent" ;
  $records = mysqli_query($con,$im);
  $count = mysqli_num_rows($records);


  $i=$count;
  $j=$count-3;
  $newim = "SELECT * FROM videocontent WHERE VideoID BETWEEN '$j' AND '$i'" ;
  $newrecords = mysqli_query($con,$newim);
    while($fetchr = mysqli_fetch_assoc($newrecords)){

      echo"<form action='movie.php' method='POST'>";
      echo"<div class='col'>";
      echo "<img src='images/picture/".$fetchr['Image']."' height='250' width='200' style='margin-top: 30px;margin-left:50px;margin-right:20px;' />";
        echo"<div class='noob'>";
          echo "<input type='submit' name='submit' class='btn btn-outline-info' style='display:block;width:200px;padding-bottom:15px;margin-bottom:30px;margin-left:50px;margin-right:20px;' value='".ucwords($fetchr['Title'])."'/>";
        echo"</div>";
      echo"</div>";
      echo"</form>";


    }

    ?>
