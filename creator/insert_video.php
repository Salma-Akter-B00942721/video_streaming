<?php

include('../database.php');
include("functions.php"); 

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $publisher = $_POST['publisher'];
    $producer = $_POST['producer'];
    $genre = $_POST['genre'];
    $agerating = $_POST['agerating'];
    $user_id = $_POST['user_id'];
    $input_date = $_POST['datetime'];
    $date = date("Y-m-d", strtotime($input_date));

    $picture = $_FILES['picture']['name'];
    $temp = $_FILES['picture']['tmp_name'];
    move_uploaded_file($temp, "../images/picture/$picture");

    //$targetvid = "video-uploads/".basename($_FILES['video']['name']);

    $video = $_FILES['fileToUpload']['name'];
    $temp2 = $_FILES['fileToUpload']['tmp_name'];
    move_uploaded_file($temp2, "../images/videos/$video");

    if ($con->connect_error) {
        echo "$con->connect_error";
        die("Connection Failed : " . $con->connect_error);
    } else {
        $sql5 = "insert into videocontent(Title,Publisher,Producer,Genre,AgeRating,Image,Video,UploadDate,CreatorID) values('$title','$publisher','$producer','$genre','$agerating','$picture','$video','$date','$user_id')";

        if (mysqli_query($con, $sql5)) {
            echo ("<script language='javascript'>
                window.alert('Submitted successfully...');
                window.location.href='video.php';</script>");
        } else {
            echo "not successfull";
            echo $sql5;
        }
    }         
}

?>