<?php
// database connection
include('../../task_cron/fincrmWebsiteConnection.php');
$connWeb = $conn;

$sql 		= 	'SELECT `u_id`, `u_domain_name`, `u_password` FROM `users` WHERE u_status = "Active" AND domain_status = "Inactive" ORDER BY u_id ASC LIMIT 1';
$result 	=	mysqli_query($connWeb,$sql);	

if (mysqli_num_rows($result) > 0) {

	$row			=	mysqli_fetch_assoc($result);
	$userId 		=   $row['u_id'];
	$domainName 	=   $row['u_domain_name'].'.fincrm.net';
	$userPassword	=  	base64_decode($row['u_password']);
	$databaseName   =   $row['u_domain_name'];

	$data['status'] 			=  'success';
	$data['domainName']			=  $domainName;
	$data['hostName']			=  $servername;
	$data['databaseName']		=  $databaseName;
	$data['databaseUserName']	=  $username;
	$data['databasePassword']	=  $password;
	$data['userId']				=  $userId;
	$data['userPassword']		=  $userPassword;
	echo json_encode($data);return;
}
else {
	$data['status'] 			=  'fail';
	echo json_encode($data);return;
}
?>