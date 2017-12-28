<?php
/**
 * Created by PhpStorm.
 * User: KThanksBye
 * Date: 5/29/2015
 * Time: 1:12 AM
 */
session_start();
include_once 'includes/config.php';
include_once 'includes/functions.php';
if(isset($_POST["upload"])) {
    $latitude = $_POST["lati"];
    $longitude = $_POST["long"];
    $address = $_POST["address"];
    if (!empty($_FILES["file"]["name"])) {
        $file_name=$_FILES["file"]["name"];
        $temp_name=$_FILES["file"]["tmp_name"];
        $imgtype=$_FILES["file"]["type"];
        $ext= GetImageExtension($imgtype);
        $imagename=date("d-m-Y")."-".time().$ext;
        $image = "uploads/images/".$imagename;
        $time = getTime();
        if(move_uploaded_file($temp_name, $image)) {
                $query = "INSERT INTO photos VALUES(uuid(),'$image','$latitude','$longitude', '$address', '$time')";
                mysql_query($query) or die("error in $query == ----> " . mysql_error());
                $random = md5("success");
                header("Location: index.php?action=$random");

        }else{

            exit("Error While uploading Content on the server");
        }

    }
    else
    {
        echo "error";
    }
}
else {
    echo "test";
}