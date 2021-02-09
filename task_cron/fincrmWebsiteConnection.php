<?php

// get super admin connection 
$filePath      = $_SERVER['DOCUMENT_ROOT'].'/data/config.php';

include($filePath);

$dbname ='fincrm_web';
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


