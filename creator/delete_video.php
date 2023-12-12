<?php
include('../database.php');
$did = $_GET['tid'];
$sql = "DELETE FROM videocontent WHERE VideoID='$did'";
$res = mysqli_query($con, $sql);
$myText = "Information Deleted Successfully!";

if ($res) {
	echo ("<script language='javascript'>
	window.alert('Deleted successfully...');
	window.location.href='video.php';</script>");
} else {
	echo ("<script language='javascript'>
		 window.alert('Not Deleted successfully...');
		 window.location.href='video.php';</script>");
}
?>