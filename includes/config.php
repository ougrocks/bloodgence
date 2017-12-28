<?php
/**
 * Created by PhpStorm.
 * User: ZeroC00l
 * Date: 1/21/2015
 * Time: 5:23 PM
 */
error_reporting(0);
$hostname = "localhost";
$username = "root";
$password = "";
$database = "bloodgence_bank";

mysql_connect($hostname,$username,$password) or die(mysql_error());
mysql_select_db($database) or die(mysql_error());
