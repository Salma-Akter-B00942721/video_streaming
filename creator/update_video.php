<?php

include('../database.php');

$video_id = $_GET['tid'];
$sql32 = "select videocontent.*, users.* from videocontent,users where users.UserID=videocontent.CreatorID";
$res32 = mysqli_query($con, $sql32);
$row32 = mysqli_fetch_assoc($res32);

if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $publisher = $_POST['publisher'];
    $producer = $_POST['producer'];
    $genre = $_POST['genre'];
    $agerating = $_POST['agerating'];
    $user_id = $_POST['user_id'];

    $sqlupdate = "Update videocontent SET Title='$title', Publisher='$publisher', Producer='$producer',Genre='$genre', AgeRating='$agerating', CreatorID='$user_id' WHERE VideoID='$video_id'";
    $res = mysqli_query($con, $sqlupdate);
    $myText = "Information Updated Successfully!";
	

    if ($res) {
		//echo $sqlupdate;
        //$myText = "Successfully Updated";
        //echo 'Information Successfully updated';
        header("location:video.php?id='$myText'");
    } else {
        echo 'Information not updated';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php include 'head.php'; ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
</head>

<body class="sb-nav-fixed">
	<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
		<?php include 'top_menu.php'; ?>
	</nav>
	<div id="layoutSidenav">
		<div id="layoutSidenav_nav">
			<?php include 'sidenav.php'; ?>
		</div>
		<div id="layoutSidenav_content">
			<main>
				<div class="container">
					<div style="padding:20px; margin-left:70px; margin-top:40px; border:1px solid black;">
						<div class="panel panel-primary">
							<div class="panel-heading text-center">
								<h1>Edit Video Information</h1>
							</div>
							<div class="panel-body">
								<form action="" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label for="title">Edit Title</label>
										<input type="text" class="form-control" id="title" name="title" value="<?php echo $row32["Title"] ?>" required />
									</div>
									<div class="form-group">
										<label for="publisher">Edit Publisher</label>
										<input type="text" class="form-control" id="publisher" name="publisher" value="<?php echo $row32["Publisher"] ?>" required />
									</div>
									<div class="form-group">
                                        <label for="producer">Edit Producer</label>
                                        <input type="text" class="form-control" id="producer" name="producer" value="<?php echo $row32["Producer"]; ?>" required />
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="genre">Edit Genre</label>
                                        <input type="text" class="form-control" id="genre" name="genre" value="<?php echo $row32["Genre"]; ?>" required />
                                    </div>
									<div class="form-group">
										<label for="agerating">Edit AgeRating</label>
										<input type="text" class="form-control" id="agerating" name="agerating" value="<?php echo $row32["AgeRating"]; ?>" required />
									</div>
									<div class="form-group">
										<label for="name">Enter Creator</label>
										<?php
										$query3 = "SELECT *
										FROM Users
										WHERE UserType = 'Creator';";
										$res3 = mysqli_query($con, $query3);
										?>

										<!-- creator dropdown -->
										<select id="creator" class="form-control" name="user_id" required>
											<option value="<?php echo $row32['UserID']; ?>"> <?php echo $row32['Username']; ?></option>
											<?php
											if ($res3->num_rows > 0) {
												while ($row3 = $res3->fetch_assoc()) {
													echo '<option value="' . $row3['UserID'] . '">' . $row3['Username'] . '</option>';
												}
											} else {
												echo '<option value="">Creator not available</option>';
											}
											?>
										</select>
									</div><br>
									<input type="submit" name="update" value="Update" class="btn btn-primary">
								</form>
							</div>
						</div>
					</div>
				</div>
			</main>
			<footer class="py-4 bg-light mt-auto">
				<div class="container-fluid">
					<?php include 'footer.php'; ?>
				</div>
			</footer>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
	<script src="js/scripts.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
	<script src="assets/demo/chart-area-demo.js"></script>
	<script src="assets/demo/chart-bar-demo.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
	<script src="assets/demo/datatables-demo.js"></script>
</body>

</html>