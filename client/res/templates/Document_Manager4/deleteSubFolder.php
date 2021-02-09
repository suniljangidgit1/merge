<?php

	session_start();
	$id= $_SESSION['subFolderID'];
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
	
	// $conn = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
	// if($conn->connect_error){
	// 	die("Connection Failed ". $conn->connect_error);
	// }
	
	mysqli_query($conn, "DELETE FROM sub_folder_master WHERE id='".$id."'");
	header('location:index.php');
	
?>