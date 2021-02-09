<?php
session_start();
error_reporting(~E_ALL);
$user_name = $_SESSION['Login'];
$entity_id=$_SESSION['entityID'];
$entity_name=$_SESSION['name'];

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

$account_id=$_GET['account_id'];

$sql1="select * from account_gst_details where account_id='$account_id' and deleted = '0'";
$result1=mysqli_query($conn,$sql1);
$rowCount=mysqli_num_rows($result1);
if($rowCount){
	$arr = [];
	while($row1 = mysqli_fetch_assoc($result1)){
		$arr[] = $row1;
	}
	//echo '<pre>';print_r($arr);die;
	echo json_encode($arr);
}
else {
	echo '0';
}
?>