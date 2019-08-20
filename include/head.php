<?php 
ob_start();
session_start();
include 'software/config/config.php';
include 'software/function/function.php';	// function
error_reporting(E_ALL);
$site =site_info();
$now = date('Y-m-d H:i:s');
$current = date('m/d/Y');
$siteurl=$site->base;

define("UPLOAD_DOC_PATH", "software/upload/doc/");
define("UPLOAD_IMG_PATH", "software/upload/original/");
define("UPLOAD_TMB_IMG_PATH", "software/upload/thumbnail/t_");
?>
   