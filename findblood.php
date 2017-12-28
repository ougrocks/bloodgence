<?php
session_start();
require_once 'dbinfo.php';
if(isset($_SESSION["username"])) {
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
			<button id="accident" onclick="window.location.href='findblood.php?select=O+'" class="waves-effect waves-light btn-large">&nbsp;&nbsp;O+</button></a>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
			<button id="blood" onclick="window.location.href='findblood.php?select=O-'" class="waves-effect waves-light btn-large">&nbsp;&nbsp;O-</button><br></br>
			<button id="accident" onclick="window.location.href='findblood.php?select=A+'" class="waves-effect waves-light btn-large">&nbsp;&nbsp;A+</button>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
			<button id="blood" onclick="window.location.href='findblood.php?select=A-'" class="waves-effect waves-light btn-large">&nbsp;&nbsp;A-</button><br></br>
			<button id="accident" onclick="window.location.href='findblood.php?select=B+'" class="waves-effect waves-light btn-large">&nbsp;&nbsp;B+</button>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
			<button id="blood" onclick="window.location.href='findblood.php?select=B-'" class="waves-effect waves-light btn-large">&nbsp;&nbsp;B-</button><br></br>
			<button id="accident" onclick="window.location.href='findblood.php?select=AB+'" class="waves-effect waves-light btn-large">AB+</button>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
			<button id="blood" onclick="window.location.href='findblood.php?select=AB-'" class="waves-effect waves-light btn-large">AB-</button><br></br>
			</center>
			<?php if(isset($_GET["select"])) {
			$select = $_GET["select"];
			?>
			<center>
			<div style="width:100px; height=50px;">
			<form action="" method="post">
			<input type="hidden" value="<?=$select;?>" name="select">
			<label><strong>Unit Quantity</strong></label>
			<input type="text" name="quantity" placeholder="Unit Quantity">
			<input type="submit" name="submit" value="Find">
			</form>
			</div>
			
			<?php } 
			if(isset($_POST["submit"])){
				$selected = urlencode($_POST["select"]);
				$quantity = $_POST["quantity"];
				$query = "SELECT * FROM inventory WHERE '$selected' > '$quantity'";
				//echo $query;
				$result = mysql_query($query) or die(mysql_error());
				//echo mysql_num_rows($result);
				if(mysql_num_rows($result) > 0) {
				while($row = mysql_fetch_assoc($result)) {
				$name = $row["name"];
				$quantity = $row[$selected];
				
			?>
			<h3>Name: <?=$name;?></h3>
			<h4>Quantity: <?=$quantity;?></h4>
			<?php } }
else {
echo '<h3>No Blood Match Found</h3>';
}			}
			?>
			</center>
		</section>
	</body>
</html>
<?php }
else {
echo "Access Denied";
}
?>