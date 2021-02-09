<?php
	$id= $_GET['id'];
	//echo $id;
	$dataVal=$_GET['dataVal'];
	$entityName= preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s','', $_GET['entityName']);
	$tableName= strtolower(preg_replace('/\B([A-Z])/', '_$1', $entityName));
	$record_id= $_GET['record_id'];
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	if($dataVal=="same"){
		$res1= mysqli_query($conn, "UPDATE $tableName SET assigned_user_id=NULL WHERE id='".$record_id."'");
	}
	
	//echo $id. " ". $dataVal." ".$entityName." ".$record_id;
	$res = mysqli_query($conn, "DELETE FROM subscription WHERE id='".$id."'");
	
	echo 1;

?>