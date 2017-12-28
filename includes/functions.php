<?php
/**
 * Created by PhpStorm.
 * User: KThanksBye
 * Date: 5/29/2015
 * Time: 1:14 AM
 */
function GUID()
{
    if (function_exists('com_create_guid') === true)
    {
        return trim(com_create_guid(), '{}');
    }

    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}
function GetImageExtension($imagetype)
{
    if(empty($imagetype)) return false;
    switch($imagetype)
    {
        case 'image/bmp': return '.bmp';
        case 'image/gif': return '.gif';
        case 'image/jpeg': return '.jpg';
        case 'image/png': return '.png';
        case 'application/pdf': return '.pdf';
        default: return false;
    }

}
function getTime() {
    $offset=5.5*60*60; //converting 5 hours to seconds.
    $dateFormat="d-m-Y H:i:s";
    $timeNdate=gmdate($dateFormat, time()+$offset);
    return $timeNdate;
}