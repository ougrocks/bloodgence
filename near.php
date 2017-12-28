<?php
$latitude = 28.6208768;
$longitude = 77.3726377;
$string = file_get_contents("https://www.google.com/maps?q=hospital&mrt=yp&sll=$latitude,$longitude&output=json");
$json = json_encode($string);
$temp = explode(";",$json);
echo '<pre>';
print_r($temp);
echo '</pre>';
?>