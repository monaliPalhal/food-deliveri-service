<?php
session_start();
error_reporting(0);
$db = "foss";
$dbhostname = "localhost";
$dbusername = "root";
$dbpassword = "";
$link = mysqli_connect($dbhostname,$dbusername,$dbpassword);
$db_selected = mysqli_select_db($link,$db );
if(isset($_POST['cart_id']))
{

    $command = "DELETE FROM tblorders  WHERE FoodId= ".$_POST['cart_id']." ";
    $result = mysqli_query($link, $command);
    if($result){
    	header('location:cart.php');
    }
}

?>
