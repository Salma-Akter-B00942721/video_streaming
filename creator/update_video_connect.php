
<?php

include('../database.php');
include("functions.php"); 

if (isset($_POST['update'])) {
    $nid = $_POST['video_id'];
    $title = $_POST['title'];
    $publisher = $_POST['publisher'];
    $producer = $_POST['producer'];
    $genre = $_POST['genre'];
    $agerating = $_POST['agerating'];
    $user_id = $_POST['user_id'];

    $sqlupdate = "Update videocontent SET Title='$title', Publisher='$publisher', Producer='$producer',Genre='$genre', AgeRating='$agerating', CreatorID='$user_id' WHERE VideoID='$nid'";
    $res = mysqli_query($con, $sqlupdate);
    $myText = "Information Updated Successfully!";

    if ($res) {
        $myText = "Successfully Updated";
        echo 'Information Successfully updated';
        header("location:video.php?id='$myText'");
    } else {
        echo 'Information not updated';
    }
}


?>
