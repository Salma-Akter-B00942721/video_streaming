<?php include('change_password.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php include 'head.php'; ?>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
				<div class="container-fluid">
					<div style="margin-left:10px; margin-top:40px; border:1px solid black;">
						<div class="panel panel-primary" style="margin:100px;">
							<form class="login-form" action="enter_email.php" method="post">
								<h2 class="form-title">Change password</h2>
								<!-- form validation messages -->
								<?php include('messages.php'); ?>
								<div class="form-group">
									<label>Enter Your Current Password Please</label>
									<input type="password" name="password">
								</div>
								<div class="form-group">
									<button type="submit" name="reset-password" class="login-btn" style="margin:auto">Submit</button>
								</div>
							</form>
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
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
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