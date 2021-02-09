<?php

// get super admin connection 
$filePath      = $_SERVER['DOCUMENT_ROOT'].'/data/config.php';

include($filePath);
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$current_domain = $_SERVER['SERVER_NAME'];

$sql 		= 	"SELECT `host_name`, `db_name`, `password`, `user_name` FROM `host_record` WHERE `domain_url` = '".$current_domain."'";
$result 	=	mysqli_query($conn,$sql);	
$row		=	mysqli_fetch_assoc($result);

$servername 	= 	$row['host_name'];
$username 		= 	$row['user_name'];
$password 		= 	$row['password'];
$dbname			=	$row['db_name'];

// Create subdomain connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check subdomain connection
if (!$conn) {
  die("Sub Domain Connection failed: " . mysqli_connect_error());
}
?>
