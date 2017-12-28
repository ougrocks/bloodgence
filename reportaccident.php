<?php
include_once 'includes/config.php';
?>
<html>
	<head>
		<title>Welcome To Bloodgence</title>
		<!--<script src="js/bootstrap.js"></script>
		<script src="js/bootstrap.min.js"></script>-->
		<script src="js/materialize.min.js"></script>
		<script src="js/materialize.js"></script>
		<script scr="js/jquery-1.11.3.min.js"></script>
		<!--<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">-->
		<link rel="stylesheet" type="text/css" href="css/materialize.css">
		<link rel="stylesheet" type="text/css" href="css/materialize-min.css">
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
		</style>
	</head>
	<body>
		<nav>
			<div class="nav-wrapper">
			<center><a class="brand-logo center" href="index.html">Bloodgence</a></center>
			</div>
		</nav>
		<section>
			<center>
			<br></br>
			
			 <?php
                $temp = $_GET["action"];
                if($temp != md5('success')) {
                ?>
                <form action="submit.php" method="post" enctype="multipart/form-data">
                    <input type="hidden"  value="<?php echo md5("capture"); ?>" name="action">
               
                    <input type="file" class="waves-effect waves-light btn-large" name="file" id="take-picture" accept="image/*" capture="camera">
                
                    <input type="submit" class="waves-effect waves-light btn-large" value="Upload" name="upload">
                    
                    <div id="geo" class="geolocation_data" ></div>
                    <p id="error"></p>
                </form>
                <h2>Preview:</h2>
                <p>
                    <img width="500px" height="300px" src="about:blank" alt="" id="show-picture">
                </p>
                <?php }else if($temp == md5('success')) {
                    echo '<p>Data Submitted to Nearest Hospitals';
                } ?>

			
			</center>
		</section>
		 <?php
        if($temp != md5('success')) {
        ?>
        <script type="text/JavaScript" src="js/geo.js"></script>
        <?php } ?>
        <script src="js/base.js"></script>

	</body>
</html>