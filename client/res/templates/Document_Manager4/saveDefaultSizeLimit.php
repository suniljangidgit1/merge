<?php
	$size= $_POST['setDefaultSizeLimit'];
	date_default_timezone_set('Asia/Kolkata');
	// $conn= mysqli_connect('localhost', 'root', 'root', 'fincrm');;
	// if ($conn->connect_error) { // Check connection
	// 	die("Connection failed: " . $conn->connect_error);
	// } 

 	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	$sql= "SELECT * from default_size_limit where id='1'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	if($row['id']== ''){
		mysqli_query($conn, "INSERT INTO default_size_limit (size, createdAt) values ('".$size."', '".date("d-m-Y h:i:s A")."')");
		header('location:successForDefaultSize.html');
	}else{
		mysqli_query($conn, "UPDATE default_size_limit SET size='".$size."' WHERE id='1' ");
		header('location:successForDefaultSize.html');	
	}
?>