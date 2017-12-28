<?php 
require_once './dbinfo.php';
if(isset($_POST["action"]) && isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confrm_password = $_POST["retype"];
    $name = $_POST['name'];
    $lat= $_POST['lati'];
    $long= $_POST['long'];
    $add= $_POST['address'];
    $city = $_POST['city'];
    if($password != $confrm_password) {
        $notmatch = md5("notmatch");
        header("Location: hospital_register.php?error=$notmatch");
    } else {
        $check_query = "SELECT username FROM inventory WHERE username = '$username'";
        $result_check = mysql_query($check_query);
        if(mysql_num_rows($result_check) == 1) {
            $error = md5("sameusername");
            header("Location: hospital_register.php?error=$error");
        } else {
		
            $query = "INSERT INTO inventory VALUES('$username','$password','$name','$lat','$long','$add','$city',0,0,0,0,0,0,0,0)";
			//echo $query;
            $result = mysql_query($query) or die(mysql_error());
            if($result) {
                $success = md5("success");
                header("Location: hospital_login.php?success=$success");
            }
        }
    }
    
} else {
    echo"ttt";
}


?>