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
$invoice_id=$_GET['dataId'];
$comment=$_GET['comment'];
$status='Rejected';

if($comment=="")
{
	$sql_update="update invoice set status='$status' where id='$invoice_id' ";
	$result_invoice = mysqli_query($conn, $sql_update);
}
else
{
	$sql_update="update invoice set status='$status' where id='$invoice_id' ";
	$result_invoice = mysqli_query($conn, $sql_update);

	$sql_invoice="insert into invoice_comments (invoice_id,comment,date,posted_by) values('$invoice_id','$comment','$date','$user_name')";
	$result_invoice=mysqli_query($conn,$sql_invoice);
}

if(mysqli_affected_rows($conn))
{
	$data["status"] = "true";
	$data["msg"]    = "Invoice Rejected Successfully!";
	echo json_encode($data); 
	return true;
}

?>