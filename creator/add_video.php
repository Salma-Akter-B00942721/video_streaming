<?php

session_start();
//check if session exists?
if (isset($_SESSION['login_user'])) {

?>

	<!DOCTYPE html>
	<html>

	<head>
		<?php include 'head.php'; ?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
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
						<div style="padding:20px; margin-left:10px; margin-top:40px; border:1px solid black;">
							<div class="panel panel-primary">
								<div class="panel-heading text-center">
									<h1>Add Video Details</h1>
								</div>
								<div class="panel-body">
									<form action="insert_video.php" method="post" enctype="multipart/form-data">
										<div class="form-group">
											<label for="title">Title</label>
											<input type="text" class="form-control" id="title" name="title" />
										</div>
										
										<div class="form-group">
											<label for="publisher">Publisher</label>
											<input type="text" class="form-control" id="publisher" name="publisher" />
										</div>
										
										<div class="form-group">
											<label for="producer">Producer</label>
											<input type="text" class="form-control" id="producer" name="producer" />
										</div>

										<div class="form-group">
											<label for="genre">Genre Name e.g. "Action, Romantic"</label>
											<input type="text" class="form-control" id="genre" name="genre" />
										</div>

										<div class="form-group">
											<label for="agerating">AgeRating e.g. "PG, 18"</label>
											<input type="text" class="form-control" id="agerating" name="agerating" />
										</div>

										<div class="form-group">
											<label for="name">Select Creator</label>
											<?php
											include('../database.php');
											$query3 = "SELECT *
											FROM Users
											WHERE UserType = 'Creator';";
											$res3 = mysqli_query($con, $query3);
											?>
											<!-- creator dropdown -->
											<select id="creator" class="form-control" name="user_id" required>
												<option value="">Select Creator</option>
												<?php
												if ($res3->num_rows > 0) {
													while ($row3 = $res3->fetch_assoc()) {
														echo '<option value="' . $row3['UserID'] . '">' . $row3['Username'] . '</option>';
													}
												} else {
													echo '<option value="0">Creator not available</option>';
												}
												?>
											</select>
										</div><br>

										<div class="form-group">
											<label for="date"> Date</label>
											<input type="date" class="form-control" id="datetime" name="datetime" value="" />
										</div><br>

										<div class="form-group">
											<label for="picture">Image</label>
											<input type="file" class="form-control" id="picture" name="picture" />
										</div>

										<div class="form-group">
											<label for="video">Video</label>
											<input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
										</div>

										<input type="submit" name="submit" class="btn btn-primary" />
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


		<!-- Initialize Quill editor -->
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
<?php
} else {
	header("location: index.php");
}
?>