<?php



if(empty($_POST) === false)
{
require 'config.php';
session_start();

//echo "INSERT INTO `inventory`(`A+`,`A-`,`B+`,`B-`,`O+`,`O-`,`AB+`,`AB-`) VALUES ("", "","", "", ".$_POST['o+quantity'].", ".$_POST['o-quantity'].", ".$_POST['ab+quantity'].", ".$_POST['ab-quantity']." ) WHERE username = '".$_POST['user']."'";
$db->query("UPDATE `inventory` SET `A+`=".$_POST['a+quantity'].",`A-`=".$_POST['a-quantity'].",`B+`=".$_POST['b+quantity'].",`B-`=".$_POST['b-quantity'].",`O+`=".$_POST['o+quantity'].",`O-`=".$_POST['o-quantity'].",`AB+`=".$_POST['ab+quantity'].",`AB-`=".$_POST['ab-quantity']." WHERE username = '".$_SESSION['user']."'");

 header("location: blood_levels.php");

}

?>
