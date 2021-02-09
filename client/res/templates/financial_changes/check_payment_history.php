<?php

session_start();
error_reporting(~E_ALL);
$user_name = $_SESSION['Login'];
$entity_id=$_SESSION['entityID'];
$entity_name=$_SESSION['name'];

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$invoiceid=$_GET['id'];

$sql1="select * from invoice where id='$invoiceid'";
$result1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_assoc($result1);
$invoiceno=$row1['invoiceno'];
$sql2="select * from payments where invoiceno='$invoiceno'";
$result2=mysqli_query($conn,$sql2);
$count=0;
while($row2=mysqli_fetch_assoc($result2)) 
{
	$count++;
}


if($count > 0)
	{
		echo "1";
	}

	else 
	{
		echo "0";
	}



?>