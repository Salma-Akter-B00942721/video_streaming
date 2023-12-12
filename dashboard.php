<?php
session_start();
include 'config/database.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT vc.Title, vc.Publisher, vc.Producer, vc.Genre, vc.AgeRating, u.Username
        FROM VideoContent vc
        INNER JOIN Users u ON vc.CreatorID = u.UserID
        ORDER BY vc.UploadDate DESC
        LIMIT 10"; // Display latest 10 videos

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Display video details on the dashboard
        echo "Title: " . $row["Title"] . "<br>";
        echo "Publisher: " . $row["Publisher"] . "<br>";
        echo "Producer: " . $row["Producer"] . "<br>";
        echo "Genre: " . $row["Genre"] . "<br>";
        echo "Age Rating: " . $row["AgeRating"] . "<br>";
        echo "Creator: " . $row["Username"] . "<br><br>";
    }
} else {
    echo "No videos available";
}

$conn->close();
?>
