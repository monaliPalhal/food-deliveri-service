<?php
session_start();
error_reporting(0);
$db = "foss";
$dbhostname = "localhost";
$dbusername = "root";
$dbpassword = "";
$link = mysqli_connect($dbhostname,$dbusername,$dbpassword);
$db_selected = mysqli_select_db($link,$db);



if(isset($_GET['id']))	{	
		$id = $_GET['id'];	}	
	
	$query  = "SELECT image FROM blob_eg.upload WHERE id='7' ";		
	$result = mysql_query($query) or die(mysql_error());
	
	if (mysql_num_rows($result) == 0) die("There is no image.");
	echo "<br /> '$query' <br />";
	echo "<br /> '$result' <br/ > \n";	
  
    $row       = mysql_fetch_array($result);	 
	$content = $row['image'];	
	echo "<img src=\"!retrieve.php?id='id'\" width=\"250\" height=\"180\" >";
?>