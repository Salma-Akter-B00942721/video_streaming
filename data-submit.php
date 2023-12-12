

<?php

include 'database.php';

if(isset($_POST['rating_value'])){
	
		$rating_value = $_POST['rating_value'];
		$user_id = $_POST['user_id'];
		$video_id = $_POST['video_id'];
		$comment = $_POST['comment'];
		$now = time();
		
	$sql = "INSERT INTO comments (VideoID, UserID, comment, rating, datetime)
	VALUES ('$user_id', '$video_id', '$comment', '$rating_value', '$now')";

	if (mysqli_query($con, $sql)) {
	echo "New Review Added Successfully";
	} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}

	mysqli_close($con);

}
?>