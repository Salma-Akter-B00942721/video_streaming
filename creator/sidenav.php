<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
	<div class="sb-sidenav-menu">
		<div class="nav">
			<a class="nav-link" href="dashboard.php">
				<div class="sb-nav-link-icon">
					<i class="fas fa-tachometer-alt"></i>
				</div>
				Dashboard
			</a>

			<div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
				<nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
						<div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
							<nav class="sb-sidenav-menu-nested nav">
								<a class="nav-link" href="login.html">Login</a>
								<a class="nav-link" href="register.html">Register</a>
								<a class="nav-link" href="password.html">Forgot Password</a>
							</nav>
						</div>
					</a>
				</nav>
			</div>

			<!-- <a class="nav-link" href="product_category.php">
				<div class="sb-nav-link-icon">
					<i class="fas fa-file-alt"></i>
				</div>
				Product Categories
			</a> -->

			<a class="nav-link" href="video.php">
				<div class="sb-nav-link-icon">
					<i class="fas fa-box"></i>
				</div>
				Videos
			</a>

			<!-- <a class="nav-link" href="category.php">
				<div class="sb-nav-link-icon">
					<i class="fas fa-bookmark"></i>
				</div>
				Blog Categories
			</a>

			<a class="nav-link" href="blogs.php">
				<div class="sb-nav-link-icon">
					<i class="fas fa-files"></i>
				</div>
				Blogs
			</a>

			<a class="nav-link" href="service.php">
				<div class="sb-nav-link-icon">
					<i class="fas fa-chart-pie"></i>
				</div>
				Service
			</a>

			<a class="nav-link" href="client.php">
				<div class="sb-nav-link-icon">
					<i class="fas fa-users"></i>
				</div>
				Client
			</a>

			<a class="nav-link" href="workflow.php">
				<div class="sb-nav-link-icon">
					<i class="fas fa-sync-alt fa-spin"></i>
				</div>
				Workflow
			</a>

			<a class="nav-link" href="process.php">
				<div class="sb-nav-link-icon">
					<i class="fas fa-spinner fa-pulse"></i>
				</div>
				Process
			</a>

			<a class="nav-link" href="point.php">
				<div class="sb-nav-link-icon">
					<i class="fas fa-check-square"></i>
				</div>
				Point 
			</a>-->
			<div>
				<div>
					<div class="sb-sidenav-footer">
						<?php
						if (isset($_SESSION['login_user'])) {
						?>
							<div class="small"><?php echo "Logged as " . $_SESSION['login_user']; ?></div>
						<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</nav>