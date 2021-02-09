<?php
session_start();
error_reporting(~E_ALL);
$user_name = $_SESSION['Login'];
$entity_id=$_SESSION['entityID'];
$entity_name=$_SESSION['name'];

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

$account_id=$_GET['account_id'];

$sql1="update account set howmanygstdetails = '1' where id='$account_id' and deleted = '0'";
$result1=mysqli_query($conn,$sql1);

$sql2 = "select * from account_gst_details where account_id='$account_id' and deleted = '0'";
$result2=mysqli_query($conn,$sql2);
$rowcount1 = mysqli_num_rows($result2);
if($rowcount1 > 0)
{
	$sql3 = "delete from account_gst_details where account_id='$account_id' and deleted = '0'";
	$result3=mysqli_query($conn,$sql3);
}

if(isset($result1)){
	echo '1';
}
else {
	echo '0';
}
?>