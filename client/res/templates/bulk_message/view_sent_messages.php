<?php error_reporting(0);

//set timezone
date_default_timezone_set('UTC'); 

$id	=	$_GET['id'];
$json=true;
	
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	$sql = "SELECT campaigns_name FROM `sent_messages` WHERE id='".$id."'";
	$result		=	mysqli_query($conn,$sql);
	$row 		=	mysqli_fetch_array($result);

	$data['campaigns_name'] = $row['campaigns_name'];
	
echo json_encode($data);return;
?>