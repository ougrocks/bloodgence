<?php
session_start();
require_once 'includes/config.php';
if(isset($_SESSION["user"])) {
?>
<html>
	<head>
		<title>Welcome To Bloodgence</title>
		<script src="js/jquery-1.11.3.min.js"></script>
		<script src="js/materialize.js"></script>
		<script src="js/materialize.min.js"></script>
		
		
		<link rel="stylesheet" type="text/css" href="css/materialize.css">
		<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
		<style>
		@font-face {
			font-family: 'Stencil';
			src: url('fonts/Stencil.ttf');
		}
		section {
			font-family: Calibri;
		}
		nav {
			font-family: Stencil;
		}
		
		body {
			background: url('images/fabric_of_squares_gray.png')
		}
		.card {
			width: 60%;
			height: 100%;
		}
		</style>
	</head>
	<body>
		<nav>
			<div class="nav-wrapper">
			<center><a class="brand-logo center" href="blood_levels.php">Bloodgence</a></center>
			<button style="float:right; margin-top:1%; margin-right:1%" class="btn waves-effect waves-light" onclick="window.location.href='logout.php'">Logout</button>
			</div>
		</nav>
		<section>
			<center>
			<br></br>
			<?php
			$username = $_SESSION["user"];
			$fetch = "SELECT name FROM inventory WHERE username = '$username'";
			$result_fet = mysql_query($fetch);
			$row_f = mysql_fetch_assoc($result_fet);
			$name_hospital = $row_f["name"];
			$noti_query = "SELECT * FROM notification WHERE name = '$name_hospital' AND status = '0'";
			$res_noti = mysql_query($noti_query);
			while($not_row = mysql_fetch_assoc($res_noti)) {
			$photo_id = $not_row["photo_id"];
			$photo_query = "SELECT * FROM photos WHERE id = '$photo_id'";
			$photo_result = mysql_query($photo_query);
			$photo_row = mysql_fetch_assoc($photo_result);
			$photo_url = $photo_row["url"];
			$photo_address = $photo_row["address"];
			$photo_time = $photo_row["time"];
			?>
			    <div class="card medium">
				<div class="card-image waves-effect waves-block waves-light">
				  <img class="activator" width="500px" height="400px" src="<?=$photo_url;?>">
				</div>
				<div class="card-content">
				  <span class="card-title activator grey-text text-darken-4">Emergency <i class="mdi-navigation-more-vert right"></i></span>
				  
				</div>
				<div class="card-reveal">
				  <span class="card-title grey-text text-darken-4">Emergency <i class="mdi-navigation-close right"></i></span>
				  <p>Accident Location: <?=$photo_address;?>, Time: <?=$photo_time;?></p>
				  <button onclick="window.location.href='go.php?action=<?=$photo_id;?>'" class="btn waves-effect waves-light">Go</button>
				</div>
			    </div>
				<?php } 
				$page = $_SERVER['PHP_SELF'];
				$sec = "10";
				header("Refresh: $sec; url=$page");
				?>
			</center>
		</section>
	</body>
</html>
<?php } else {
echo "Access Denied"; 
} ?>