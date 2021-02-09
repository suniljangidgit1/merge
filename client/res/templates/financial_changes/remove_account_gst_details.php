<?php
session_start();
error_reporting(~E_ALL);
$user_name = $_SESSION['Login'];
$entity_id=$_SESSION['entityID'];
$entity_name=$_SESSION['name'];

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

$account_id=$_GET['account_id'];

$sql1="select * from account where id='$account_id' and deleted = '0'";
$query1=mysqli_query($conn,$sql1);
$result1=mysqli_fetch_assoc($query1);
$rowCount=mysqli_num_rows($query1);

$no_of_gst = $result1['howmanygstdetails'] - 1;
if($rowCount > 1)
{
	$sql2="update account set howmanygstdetails = '".$no_of_gst."' where id='$account_id'";
	$result2=mysqli_query($conn,$sql2);

	$sql1="select * from account_gst_details where account_id='$account_id'";
	$query1=mysqli_query($conn,$sql1);
	$result1=mysqli_fetch_assoc($query1);
	if(!empty($result1))
	{
		$sql3="delete from account_gst_details where account_id='$account_id'";
		$result3=mysqli_query($conn,$sql3);
	}
}
else {
	$sql4="update account set doyouhavegstnum = 'No',howmanygstdetails = '".$no_of_gst."' where id='$account_id'";
	$result4=mysqli_query($conn,$sql4);

	$sql3="delete from account_gst_details where account_id='$account_id'";
	$result3=mysqli_query($conn,$sql3);
}

?>