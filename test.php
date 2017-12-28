<?php
$geocode=file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng=48.283273,14.295041&sensor=false');

        $output= json_decode($geocode);

echo $output->results[0]->town_city;

?>