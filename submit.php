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
				$photo_id = "SELECT id FROM photos WHERE url = '$image'";
				$ph_id = mysql_query($photo_id);
				$roww = mysql_fetch_assoc($ph_id);
				$photo_idd = $roww["id"];
                $random = md5("success");
				//$data = file_get_contents("https://www.google.com/maps?q=hospital&mrt=yp&sll=$latitude,$longitude&output=json");
				$fetch_lat_query = "SELECT name,address, ( 3959 * acos ( cos ( radians($latitude) ) * cos( radians( Latitude ) ) * cos( radians( Longitude ) - radians($longitude) ) + sin ( radians($latitude) ) * sin( radians( Latitude ) ) ) ) AS `distance` FROM `inventory` HAVING (distance < 50)";
				$res = mysql_query($fetch_lat_query);
				
				while($res_row = mysql_fetch_assoc($res)) {
				$hos_name = $res_row["name"];
				echo $hos_name.$photo_idd;
				$insert_noti = "INSERT INTO notification VALUES(uuid(),'$hos_name','$photo_idd','0')";
				mysql_query($insert_noti);
				}
                header("Location: reportaccident.php?action=$random");

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