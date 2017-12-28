<?php
/**
 * Created by PhpStorm.
 * User: KThanksBye
 * Date: 5/28/2015
 * Time: 8:20 PM
 */
$img = 'images/q.jpg';
print_r(exif_read_data($img, 0, true));