<?php

include('../database.php');

$query = "select videocontent.*, users.* from videocontent,users where users.UserID=videocontent.CreatorID";
$res = mysqli_query($con, $query);
$arr_users = [];

if ($res->num_rows > 0) {
	$arr_users = $res->fetch_all(MYSQLI_ASSOC);
}

session_start();
if (isset($_SESSION['login_user'])) {

?>
	<!DOCTYPE html>
	<html>

	<head>
		<?php include 'head.php'; ?>
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
		<style>
			table.dataTable tbody th,
			table.dataTable tbody td {
				padding: 8px 5px;
			}

			ul {
				padding-left: 20px;
			}
		</style>
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
					<div style="margin:2%;">
						<h1>Video</h1>
						<ol class="breadcrumb mb-4">
							<li class="breadcrumb-item active">Video</li>
						</ol>
						<p class="text-right"><a href="add_video.php" class="btn btn-info"> Add Video</a></p>
						<table id="userTable" class="table table-striped table-bordered" style="width:100%;font-size: 13px;">
							<thead>
								<tr style="text-align:center;">
									<th> SL</th>
									<th> Title</th>
									<th> Publisher</th>
									<th> Producer</th>
									<th> Genre</th>
									<th> AgeRating </th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$serial = 1; 
								?>

								<?php if (!empty($arr_users)) { ?>
									<?php foreach ($arr_users as $user) { ?>

										<tr style="text-align:center;">
											<td><?php echo $serial++; ?></td>
											<td><?php echo $user['Title']; ?> </td>
											<td><?php echo $user['Publisher']; ?> </td>
											<td><?php echo $user['Producer']; ?> </td>
											<td><?php echo $user['Genre']; ?> </td>
											<td><?php echo $user['AgeRating']; ?> </td>
											<td style="display:flex;flex-direction:row;gap:5px;justify-content:center;align-items:center;">
												<!-- <a href="video_description.php?tid=<?= $user['VideoID'] ?>" class="btn btn-success btn-sm">View</a> -->

												<a class="btn btn-dark btn-sm" href="update_video.php?tid=<?php echo $user['VideoID']; ?>"> Edit</a>

												<a class="btn btn-danger btn-sm" href="#" onclick="confirmation(<?php echo $user['VideoID']; ?>)"> Delete</a>
											</td>
										</tr>

								<?php
									}
								}
								?>
							</tbody>
						</table>
					</div>
				</main>
				<footer class="py-4 bg-light mt-auto">
					<div class="container-fluid">
						<?php include 'footer.php'; ?>
					</div>
				</footer>
			</div>
		</div>

		<script>
			function confirmation(delid) {
				if (confirm("Do you want to delete?")) {
					window.location.href = 'delete_video.php?tid=' + delid + '';
					return true;
				}
			}
		</script>

		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
		<script src="js/scripts.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
		<script src="admin_page/dist/assets/demo/chart-area-demo.js"></script>
		<script src="admin_page/dist/assets/demo/chart-bar-demo.js"></script>
		<script src="admin_page/dist/assets/demo/datatables-demo.js"></script>

		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
		<script>
			$(document).ready(function() {
				$('#userTable').DataTable();
			});
		</script>
	</body>

	</html>

<?php
} else {
	header("location: index.php");
}
?>