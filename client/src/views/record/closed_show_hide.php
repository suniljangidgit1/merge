<?php
session_start();
error_reporting(~E_ALL);
$user_name = $_SESSION['Login'];
$entity_id=$_SESSION['entityID'];
$entity_name=$_SESSION['name'];

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

$sql="select * from user where user_name='$user_name'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

$sql1="select * from task where id='$entity_id'";
$result1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_assoc($result1);

$user_id=$row['id'];
$created_by_id=$row1['created_by_id'];
$is_admin=$row['is_admin'];
$status=$row1['status'];

if($entity_name=="Task" && $status!="Closed" && $status=="Completed" &&($created_by_id==$user_id || $is_admin==1 ))
{
	echo "1";
}
else
{
	echo "0";
}
?>