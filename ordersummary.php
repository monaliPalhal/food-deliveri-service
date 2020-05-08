<?php
session_start();
error_reporting(0);
$db = "foss";
$dbhostname = "localhost";
$dbusername = "root";
$dbpassword = "";
$link = mysqli_connect($dbhostname,$dbusername,$dbpassword);
$db_selected = mysqli_select_db($link,$db );
?>
