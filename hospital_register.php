<html>
	<head>
		<title>Welcome To Bloodgence</title>
		<!--<script src="js/bootstrap.js"></script>
		<script src="js/bootstrap.min.js"></script>-->
			<script scr="js/jquery-1.11.3.min.js"></script>
		<script src="js/materialize.min.js"></script>
		<script src="js/materialize.js"></script>
	
		<script type="text/JavaScript" src="js/geo.js"></script>
		<!--<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">-->
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
		form {
			display: inline-block;
		}
		section input {
			border: 1px dotted rgb(38, 166, 154) !important;
			padding: 0px 10px !important;
		}
		</style>
	</head>
	<body>
		<nav>
			<div class="nav-wrapper">
			<center><a class="brand-logo center" href="hospital_login.php">Bloodgence</a></center>
			</div>
		</nav>
		<section>
			<center>
			<br></br>
			<form class="col s12" action="come.php" method="post">
				<div class="row">
					<div class="input-field col s12">
					  Hospital Name: <input id="name" type="text" name="name" placeholder="Name Of Blood Bank" class="validate">
					  <!--<label for="email">Email</label>-->
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
					  Username: <input id="email" type="text" name="username" placeholder="Username" class="validate">
					  <!--<label for="email">Email</label>-->
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
					  Password: <input id="password" type="password" name="password" placeholder="Password" class="validate">
					  <!--<label for="password">Password</label>-->
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
					  Confirm Password: <input id="password" type="password" name="retype" placeholder="Username" class="validate">
					  <!--<label for="password">Password</label>-->
					</div>
				</div>
				<div id="geo" class="geolocation_data"></div>
                    <p id="error"></p>
				<button class="btn waves-effect waves-light" type="submit" name="action">Register
					<i class="mdi-content-send right"></i>
				</button>
			</form>
			<br></br>
			<?php if(isset($_GET["error"]) && $_GET["error"] == md5("notmatch")){ ?>
			<p>Password doesn't Match</p>
			<?php } else {
			if(isset($_GET["error"]) && $_GET["error"] == md5("sameusername")){
		?>
			<p>Username already exist</p>
			<?php } }?>
			<a href="hospital_login.php">Registered users. Login</a>
			<br></br>
			</center>
			
		</section>
		
	</body>
</html>