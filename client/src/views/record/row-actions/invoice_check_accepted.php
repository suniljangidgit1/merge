<?php
session_start();
// error_reporting(~E_ALL);
$user_name = $_SESSION['Login'];
// $entity_id=$_SESSION['entityID'];
$entity_name=$_SESSION['name'];

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

$id=$_GET['invoice_id'];

$sql5="select * from invoice where id='$id'";
$result5=mysqli_query($conn,$sql5);
$row5=mysqli_fetch_assoc($result5);

$status=$row5['status'];

if($status=='Rejected' || $status=='Pending')
{
	echo "1";
}
else
{
	echo "0";
}
?>