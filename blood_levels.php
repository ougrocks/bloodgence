<?php 
session_start();
require_once 'dbinfo.php';
if(isset($_SESSION["user"])) { 
$username = $_SESSION["user"];
$query = "SELECT * FROM inventory WHERE username = '$username'";
$result = mysql_query($query);
$group = mysql_fetch_assoc($result);     
$name = $group["name"];
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
		table {
			width: 50%;
		}
		.input-field input {
			border: 1px dotted rgb(38, 166, 154) !important;
			padding: 0px 10px !important;
			width: 40%;
		}
		</style>
	</head>
	<body>
		<nav>
			<div class="nav-wrapper">
			<center><a class="brand-logo center" href="blood_levels.php">Bloodgence <?=$username;?></a></center>
			<button style="float:right; margin-top:1%; margin-right:1%" class="btn waves-effect waves-light" onclick="window.location.href='dashboard.php'">Accident Notification<?php
			$count_q = "SELECT COUNT(id) AS count_noti FROM notification WHERE name = '$name' AND status = '0'";
			$result_q = mysql_query($count_q);
			$rr = mysql_fetch_assoc($result_q);
			$count_not = $rr["count_noti"];
			echo "(".$count_not.")";
			?>
			</button>
			<button style="float:right; margin-top:1%; margin-right:1%" class="btn waves-effect waves-light" onclick="window.location.href='logout.php'">Logout</button>
			</div>
		</nav>
		<section>
			<center>
			<br></br>
			<form action="update.php" method="post">
			<table class="bordered responsive-table">
				<thead>
				  <tr>
					  <th data-field="id">Blood Group</th>
					  <th data-field="name">Level</th>
				  </tr>
				</thead>

				<tbody>
				  <tr>
					<td>O+</td>
					<td>
						<div class="input-field">
						  <input id="level" type="text" name="o+quantity" placeholder="O+ Quantity" value=" <?=$group['O+'];?>"/>
						</div>
					</td>
				  </tr>
				  <tr>
					<td>O-</td>
					<td>
						<div class="input-field">
						  <input id="level" name="o-quantity" type="text" placeholder="O- Quantity" value=" <?=$group['O-'];?>">
						</div>
					</td>
				  </tr>
				  <tr>
					<td>A+</td>
					<td>
						<div class="input-field">
						  <input id="level" type="text" name="a+quantity" placeholder="A+ Quantity" value=" <?=$group['A+'];?>">
						</div>
					</td>
				  </tr>
				  <tr>
					<td>A-</td>
					<td>
						<div class="input-field">
						  <input id="level" type="text" name="a-quantity" placeholder="A- Quantity" value=" <?=$group['A-'];?>">
						</div>
					</td>
				  </tr>
				  <tr>
					<td>B+</td>
					<td>
						<div class="input-field">
						  <input id="level" type="text" name="b+quantity" placeholder="B+ Quantity" value=" <?=$group['B+'];?>">
						</div>
					</td>
				  </tr>
				  <tr>
					<td>B-</td>
					<td>
						<div class="input-field">
						  <input id="level" type="text" name="b-quantity" placeholder="B- Quantity" value=" <?=$group['B-'];?>">
						</div>
					</td>
				  </tr>
				  <tr>
					<td>AB+</td>
					<td>
						<div class="input-field">
						  <input id="level" type="text" name="ab+quantity" placeholder="AB+ Quantity" value=" <?=$group['AB+'];?>">
						</div>
					</td>
				  </tr>
				  <tr>
					<td>AB-</td>
					<td>
						<div class="input-field">
						  <input id="level" type="text" name="ab-quantity" placeholder="AB- Quantity" value=" <?=$group['AB-'];?>">
						</div>
					</td>
				  </tr>
				</tbody>
			</table>
			<br>
			<button class="btn waves-effect waves-light" type="submit" name="action">Update
					
			</button>
			</form>
			</center>
		</section>
	</body>
</html>
<?php
  }
  else {
  header("location:hospital_login.php");   
  }
?>