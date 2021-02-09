<?php
session_start();
$user_name = $_SESSION['Login'];
error_reporting(~E_ALL);
//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

date_default_timezone_set('Asia/Kolkata'); 
$date=date("Y/m/d H:i:s");
$estimate_id=$_GET['dataId'];
$comment=$_GET['comment'];
$status='Rejected';

if($comment=="")
{
	$sql_update="update estimate set status='$status' where id='$estimate_id' ";
	$result_estimate = mysqli_query($conn, $sql_update);
}
else
{
	$sql_update="update estimate set status='$status' where id='$estimate_id' ";
	$result_estimate = mysqli_query($conn, $sql_update);

	$sql_estimate="insert into estimate_comments (estimate_id,comment,date,posted_by) values('$estimate_id','$comment','$date','$user_name')";
	$result_estimate=mysqli_query($conn,$sql_estimate);
}

if(mysqli_affected_rows($conn))
{
	$data["status"] = "true";
	$data["msg"]    = "Estimate Rejected Successfully!";
	echo json_encode($data); 
	return true;
}

?>