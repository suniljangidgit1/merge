<?php
	$id= $_GET['userid'];
	//$entityName= $_GET['entityName'];
	$record_id= $_GET['record_id'];
	$entityName=preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s','', $_GET['entityName']);
	//echo "User ID= ". $id . " Entity Name= ". $entityName. " Record ID= ". $record_id;
	
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	$res1= mysqli_query($conn, "SELECT * FROM subscription WHERE entity_id='".$record_id."' AND user_id='".$id."'");
	$row1= mysqli_fetch_array($res1);
	
	if($row1!=""){
		echo 2;
	}
	if($row1==""){
		$res = mysqli_query($conn, "INSERT INTO subscription(entity_id, entity_type, user_id) VALUES('".$record_id."','".$entityName."','".$id."')");
		echo 1;
	}
?>