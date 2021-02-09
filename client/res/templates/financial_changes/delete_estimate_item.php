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

$sql5="delete from estimates_items where id='$id'";
$result5=mysqli_query($conn,$sql5);

if(isset($result5))
{
	echo "1";
}
else
{
	echo "0";
}
?>