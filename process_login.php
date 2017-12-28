<?php
require_once './dbinfo.php';
session_start();
if(isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $query = "SELECT * FROM inventory WHERE username = '$username' AND password = '$password'";
    $result = mysql_query($query);
    if(mysql_num_rows($result) == 1){
        $_SESSION["user"] = $username;
        header("Location: blood_levels.php");
    } else {
        header("Location: hospital_login.php");
    }
}
?>