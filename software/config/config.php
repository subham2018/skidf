<?php

// database
error_reporting(0);

	$dbhost = "localhost"; 
	$dbuser = "root"; 
	$dbpass = ''; 
	$dbname = "skidf";
	


$link = @mysqli_connect($dbhost, $dbuser, $dbpass) or die("Could not connect to the host because " . mysqli_error()); 
$db = @mysqli_select_db($link , $dbname) or die("Could not select the database because " . mysqli_error()); 


$page = basename($_SERVER['PHP_SELF']);
$prefix = "soinit_";

date_default_timezone_set('Asia/Kolkata');
?>
