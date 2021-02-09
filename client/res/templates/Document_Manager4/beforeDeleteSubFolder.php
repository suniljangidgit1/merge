<?php
	session_start();
	$_SESSION['subFolderID']=$_POST['id'];
	if($_POST['id']!=''){
		// $conn = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	if($conn->connect_error){
		die("Connection Failed ". $conn->connect_error);
	}
	
	mysqli_query($conn, "DELETE FROM sub_folder_master WHERE id='".$_POST['id']."'");
	//header('location:index.php');
	} 
	
?>