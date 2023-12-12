<?php
session_start();
if (isset($_POST['submit'])) {

	$title = $_POST['submit'];

	include 'database.php';
	$im = "SELECT * FROM videocontent WHERE Title = '$title'" ;

	$records = mysqli_query($con,$im);
	$result = mysqli_fetch_assoc($records);
	$video_id = $result['VideoID'];
	$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang='en' dir='ltr'>
<head>
	<meta charset='utf-8'>
	<title>Movie List</title>
	<link rel='stylesheet' href='movie.css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

	<div class='jumbotron-fluid'>
		<div class='container'>
			<?php ?><br>
			<a href='homepage.php' style='font-size: 20px;color:orange;border:1px solid orange;border-radius:5px;padding:10px;text-decoration:none;'>Back to Home </a> 
		
			<br><br><h5 style='display: inline;'><br>Movie Name : </h5><h1 style='display: inline;'><?php echo $result['Title'];?></h1>
			<br><h5 style='display: inline;' >Genre : </h5><h4 style='display: inline;'><?php echo $result['Genre'];?></h4>
			<br><h5 style='display: inline;' >Producer : </h5><h4 style='display: inline;'><?php echo $result['Producer'];?></h4>
			<br><h5 style='display: inline;' >Publisher : </h5><h4 style='display: inline;'><?php echo $result['Publisher'];?></h4><br>
			<div class='col-sm-4 text-left' style="margin-top:20px;">
				<button class='btn-primary' id='add_review' > Add Review </button>
			</div>
			<br><br><br>
			<div class="embed-responsive embed-responsive-16by9">
				<video controls="controls" class="embed-responsive-item">
				<source src="images/videos/<?php echo $result['Video'];?>" type="video/mp4"> 
				Your browser does not support the HTML5 Video element.
				</video>
			</div><br>

			<h4>Reviews of this Movie</h4><br>
			<div class="reviews" style="display:flex; flex-direction:row;gap:50px">
				<?php
					$sql = "select comments.*, videocontent.*, users.* from comments,videocontent,users where comments.VideoID=videocontent.VideoID and comments.UserID=users.UserID and comments.VideoID='$video_id'" ;

					$rec = mysqli_query($con,$sql);
					while($res = mysqli_fetch_assoc($rec)){
				?>
				
				<div class="single_reviws">
					<span>Username: <?php echo $res['Username']; ?> </span><br>
					<span>Rating: <?php echo $res['rating']; ?>star </span><br>
					<span>Comment: <?php echo $res['Comment']; ?> </span><br>
				</div>
			
			
				<?php
				}
			}
				?>
				</div>
		</div>

		<div id="display_review"></div>
			    
		<!-- The Modal -->
		<div class="modal" id="myModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title">Write your Review</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
				
					<!-- Modal body -->
					<div class="modal-body text-center">
							<h4>
								<i class="fa fa-star star-light submit_star  mr-1 " id='submit_star_1'  data-rating='1'></i>
								<i class="fa fa-star star-light submit_star  mr-1 " id='submit_star_2' data-rating='2'></i>
								<i class="fa fa-star star-light submit_star   mr-1 " id='submit_star_3' data-rating='3'></i>
								<i class="fa fa-star star-light submit_star  mr-1 " id='submit_star_4' data-rating='4'></i>
								<i class="fa fa-star star-light submit_star  mr-1 " id='submit_star_5' data-rating='5'></i>
							</h4>
							<div class="form-group">
								<input type="hidden" name="video_id" value="<?php echo $video_id;?>">
								<input type="hidden" name="user_id" value="<?php echo $user_id;?>">
							</div>
							<div class="form-group">
								<textarea name="comment" id="comment" class="form-control" placeholder="Enter message"></textarea>
							</div>
							<div class="form-group">
								<button class="btn-primary" id='sendReview'>Submit</button>
							</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>

  	<script src="script.js"></script>

</body>
</html>


