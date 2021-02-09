<?php
	session_start();
	$id= $_SESSION['fileId'];
	
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
	
	// $conn = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
	// if($conn->connect_error){
	// 	die("Connection Failed ". $conn->connect_error);
	// }
	$sql= "SELECT * FROM document_master WHERE id='".$id."'";
	$result= mysqli_query($conn, $sql);
	$row= mysqli_fetch_assoc($result);
	
	$fileName=$row['document_name'];
	
//	echo "FILE NAME==> ".$fileName;
	mysqli_query($conn, "DELETE FROM document_master WHERE id='".$id."'");
	$path="upload/".$fileName; 
	if(file_exists($path)){
		//unlink("upload/".$fileName);
	}
	header('location:index.php');
	
	
?>