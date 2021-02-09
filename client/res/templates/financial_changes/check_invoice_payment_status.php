<?php
session_start();
// error_reporting(~E_ALL);
$user_name = $_SESSION['Login'];
// $entity_id=$_SESSION['entityID'];
$entity_name=$_SESSION['name'];

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

$id=$_GET['inv_id'];

$sql5="select * from invoice where id='$id'";
$result5=mysqli_query($conn,$sql5);
$row5=mysqli_fetch_assoc($result5);

$paymentstatus=$row5['paymentstatus'];

if($paymentstatus=='Paid')
{
	echo "0";
}
else
{
	echo "1";
}
?>