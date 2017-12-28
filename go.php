<?php
require_once 'includes/config.php';
if(isset($_GET['action'])) {
$photo_id = $_GET["action"];
$check = "SELECT * FROM notification WHERE photo_id = '$photo_id'";
$result= mysql_query($check);
mysql_num_rows($result);
if(mysql_num_rows($result)>0) {
$update = "UPDATE notification SET status = '1' WHERE photo_id = '$photo_id'";
mysql_query($update);
}
header("Location: dashboard.php");
}
?>

