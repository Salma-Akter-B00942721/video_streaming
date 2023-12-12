<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
	<li class="breadcrumb-item active">Latest Videos</li>
</ol>
<div class="row">
	<!-- <div class="col-xl-3 col-md-6">
		<div class="card bg-primary text-white mb-4">
			<span>
				<h4 class="count" style="text-align: center; font-size:50px">Latest Videos</h4>
			</span><br>
			<p class="count" style="text-align: center; font-size:20px"> Number of Videos (
				<?php
				include('../database.php');

				$query = "select videocontent.*, users.* from videocontent,users where users.UserID=videocontent.CreatorID limit 1";
				$res = mysqli_query($con, $query);
				$arr_users = [];
				
				if ($res->num_rows > 0) {
					$arr_users = $res->fetch_all(MYSQLI_ASSOC);
				}
				?>
				)
			</p>
			<div class="card-footer d-flex align-items-center justify-content-between">
				<a class="small text-white stretched-link" href="show_all_messages.php">View All Messages</a>
				<div class="small text-white"><i class="fas fa-angle-right"></i></div>
			</div>
		</div>
	</div> -->
	<div style="margin:2%;">
		<table id="userTable" class="table table-striped table-bordered" style="width:100%;font-size: 13px;">
			<thead>
				<tr style="text-align:center;">
					<th> SL</th>
					<th> Title</th>
					<th> Image</th>
					<th> Video</th>
					<th> Genre</th>
					<th> AgeRating </th>
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
							<td><img src="../images/picture/<?php echo $user['Image'];?>" width="50px" height="50px"> </td>
							<td><video width="400" controls><source src="../images/videos/<?php echo $user['Video'];?>" type="video/mp4"width="50px" height="50px"></video> </td>
							<td><?php echo $user['Genre']; ?> </td>
							<td><?php echo $user['AgeRating']; ?> </td>
						</tr>

				<?php
					}
				}
				?>
			</tbody>
		</table>
	</div>
</div>