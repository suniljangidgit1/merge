<?php
	error_reporting(0);
	session_start();
	$userName= $_SESSION["Login"];
	$folderName= $_SESSION['folderName'];
	$createdBy = $userName;
	$assignedUserId= $_SESSION['assignUser'];
	$defineAccess= $_SESSION['userAccess'];
	date_default_timezone_set('Asia/Kolkata');	
	// $conn = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
	// if($conn-> connect_error){
	// 	die("Connection Failed: " . $conn-> connect_error);
	// }

  //get connection
  include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	mysqli_query($conn, "INSERT INTO folder_master_3(folder_name, created_user_id, assigned_user_id, define_access, createdAt) VALUES ('".$folderName."', '".$createdBy."', '".$assignedUserId."', '".$defineAccess."', '".date("Y-m-d H:i:s")."')");
	header('location:success.html');
?>