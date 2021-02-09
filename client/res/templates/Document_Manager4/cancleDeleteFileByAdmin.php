<?php

	//echo "IN DELETE FILR CANCLE PROCESS";

	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
  	// $con       =    mysqli_connect($host, $user, $password, $dbname);
	// $conn = mysqli_connect('localhost','root','root','subdomain');
	if($conn->connect_error){
		die("Connection Failed ".$conn->connect_error);
	}
	
	$res= mysqli_query($conn, "DELETE FROM file_delete_request WHERE id='".$_POST['id']."'");
	
	if($res){
		echo "Request cancled successfully";
	}else{
		echo "Somthing went wrong..";
	}
?>