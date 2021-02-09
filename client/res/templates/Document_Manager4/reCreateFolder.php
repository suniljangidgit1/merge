<?php
	session_start();
	date_default_timezone_set('Asia/Kolkata');
	$folderName= $_POST['folderName'];
	$assignUser= $_SESSION['assignUser'];
	$userAccess= $_SESSION['userAccess'];
	$createdBy= "Admin" ;
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
	// $conn = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
	// if($conn->connect_error){
	// 	die("Connection Failed ". $conn->connect_error);
	// }
	mysqli_query($conn, "INSERT INTO folder_master(folder_name, created_user_id, assigned_user_id, define_access, createdAt) VALUES ('".$folderName."', '".$createdBy."', '".$assignUser."', '".$userAccess."', '".date("Y-m-d H:i:s")."')");
	header('location: success.html');
?>