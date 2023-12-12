<?php
session_start();
include 'config/database.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $publisher = $_POST['publisher'];
    $producer = $_POST['producer'];
    $genre = $_POST['genre'];
    $ageRating = $_POST['ageRating'];
    $uploadDate = date("Y-m-d H:i:s");
    $creatorID = $_POST['creatorID'];

    $sql = "INSERT INTO VideoContent (Title, Publisher, Producer, Genre, AgeRating, UploadDate, CreatorID) 
            VALUES ('$title', '$publisher', '$producer', '$genre', '$ageRating', '$uploadDate', '$creatorID')";

    if ($conn->query($sql) === TRUE) {
        echo "Video uploaded successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

//$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Video Upload</title>
</head>
<body>
    <h2>Video Upload</h2>
    <form action="" method="post">
        Title: <input type="text" name="title"><br>
        Publisher: <input type="text" name="publisher"><br>
        Producer: <input type="text" name="producer"><br>
        Genre: <input type="text" name="genre"><br>
        Age Rating: <input type="text" name="ageRating"><br>
        Creator ID: <input type="text" name="creatorID"><br> <!-- Assuming this is obtained from logged-in user -->
        <input name="submit" type="submit" value="Upload">
    </form>
</body>
</html>
