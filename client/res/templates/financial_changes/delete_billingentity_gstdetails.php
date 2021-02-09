<?php
session_start();
error_reporting(~E_ALL);
$user_name = $_SESSION['Login'];
// $entity_id=$_SESSION['entityID'];
$entity_name=$_SESSION['name'];

//get connection

include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



$id=$_GET['id'];

$sqlCnt = "select billing_entity_id from billing_entity_gstdetails where id='$id' limit 1";
$result3=mysqli_query($conn,$sqlCnt);
$row3=mysqli_fetch_assoc($result3);

$sqlCnt_total = "select * from billing_entity_gstdetails where billing_entity_id='".$row3["billing_entity_id"]."'";
$result4=mysqli_query($conn,$sqlCnt_total);
$row4=mysqli_fetch_assoc($result4);

// Delete the data from table
$sql5="delete from billing_entity_gstdetails where id='$id'";
$result5=mysqli_query($conn,$sql5);

$sqlCntTotal = "select COUNT(*) as cnt from billing_entity_gstdetails where billing_entity_id='".$row4["billing_entity_id"]."'";
$result1=mysqli_query($conn,$sqlCntTotal);
$row1=mysqli_fetch_assoc($result1);
$rowCount1=$row1['cnt'];

if(isset($result5))
{
	echo '"1,'.$rowCount1.'"';
}
else
{
	echo "0";
}






?>