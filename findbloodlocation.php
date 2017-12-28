<?php
require_once 'dbinfo.php';
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
                <script type="text/JavaScript" src="js/geo.js"></script>
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
                
                <style>
                    
                    table {
color: #333;
font-family: Helvetica, Arial, sans-serif;
width: 640px;
border-collapse:
collapse; border-spacing: 0;
}

td, th {
border: 1px solid transparent; /* No more visible border */
height: 30px;
transition: all 0.3s;  /* Simple transition for hover effect */
}

th {
background: #DFDFDF;  /* Darken header a bit */
font-weight: bold;
}

td {
background: #FAFAFA;
text-align: center;
}

/* Cells in even rows (2,4,6...) are one color */
tr:nth-child(even) td { background: #F1F1F1; }  

/* Cells in odd rows (1,3,5...) are another (excludes header cells)  */
tr:nth-child(odd) td { background: #FEFEFE; } 

tr td:hover { background: #666; color: #FFF; } /* Hover cell effect! */
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
			<button id="accident" onclick="window.location.href='findbloodlocation.php?select=O+'" class="waves-effect waves-light btn-large">&nbsp;&nbsp;O+</button></a>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
			<button id="blood" onclick="window.location.href='findbloodlocation.php?select=O-'" class="waves-effect waves-light btn-large">&nbsp;&nbsp;O-</button><br></br>
			<button id="accident" onclick="window.location.href='findbloodlocation.php?select=A+'" class="waves-effect waves-light btn-large">&nbsp;&nbsp;A+</button>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
			<button id="blood" onclick="window.location.href='findbloodlocation.php?select=A-'" class="waves-effect waves-light btn-large">&nbsp;&nbsp;A-</button><br></br>
			<button id="accident" onclick="window.location.href='findbloodlocation.php?select=B+'" class="waves-effect waves-light btn-large">&nbsp;&nbsp;B+</button>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
			<button id="blood" onclick="window.location.href='findbloodlocation.php?select=B-'" class="waves-effect waves-light btn-large">&nbsp;&nbsp;B-</button><br></br>
			<button id="accident" onclick="window.location.href='findbloodlocation.php?select=AB+'" class="waves-effect waves-light btn-large">AB+</button>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
			<button id="blood" onclick="window.location.href='findbloodlocation.php?select=AB-'" class="waves-effect waves-light btn-large">AB-</button><br></br>
			</center>
			<?php if(isset($_GET["select"])) {
			$select = $_GET["select"];
			?>
			<center>
			<div style="width:100px; height=50px;">
			<form action="" method="post">
                            <div id="geo" class="geolocation_data"></div>
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
				if(isset($_POST["city"])) {
                $location = $_POST['city'];
				}else {
				$location = null;
				}
                               
				$temp = "SELECT `$selected` FROM inventory";
				//echo $temp;
				$gg = mysql_query($temp)or die(mysql_error());
				while($ff = mysql_fetch_assoc($gg)) {
				$value = $ff[$selected];
				$query = "SELECT * FROM inventory WHERE '$value' > '$quantity' and city = '$location'";
				//echo $query;
				$result = mysql_query($query) or die(mysql_error());
				//echo mysql_num_rows($result);
				if(mysql_num_rows($result) > 0) {
                                    ?>
                            <table >
                                <tr>
                                    <td style="width: 20%">Name of Blood Bank</td>
                                    <td style="width: 10%">Unit of Blood Available</td>
                                    <td style="width: 50%">Address</td>
                                </tr>
                            <?php
				while($row = mysql_fetch_assoc($result)) {
				$name = $row["name"];
				$quantity = $row[$selected];
                                $address = $row["address"]
				
			?>
                                <tr>
                                    <td><?=$name;?></td>
                                    <td><?=$quantity;?></td>
                                    <td><?=$address; ?></td>
                            </tr>
                            </table>
			<?php } } 
                        
                        else {
                            echo '<h3>No Blood Match Found</h3>';
                        }		}	}
			?>
			</center>
		</section>
	</body>
</html>
