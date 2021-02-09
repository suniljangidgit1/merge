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

$sql4="select * from user where user_name='$user_name'";
$result4=mysqli_query($conn,$sql4);
$row4=mysqli_fetch_assoc($result4);

$created_by_id=$row4['id'];
$is_admin=$row4['is_admin'];


if($is_admin=='1')
{
		$sql1="select id,name As Name,billing_address_city as City from account where deleted='0'";
		$result1=mysqli_query($conn,$sql1);
		$data = array();
while( $rows = mysqli_fetch_assoc($result1) ) {
$data[] = $rows;
}

		$results = array(
"sEcho" => 1,
"iTotalRecords" => count($data),
"iTotalDisplayRecords" => count($data),
"aaData"=>$data);
echo json_encode($results);

}
else
{
		$sql1="select id,name As Name,billing_address_city as City from account where deleted='0' and created_by_id='$created_by_id' or assigned_user_id='$created_by_id'";
		$result1=mysqli_query($conn,$sql1);
		$data = array();
while( $rows = mysqli_fetch_assoc($result1) ) {
$data[] = $rows;
}

		$results = array(
"sEcho" => 1,
"iTotalRecords" => count($data),
"iTotalDisplayRecords" => count($data),
"aaData"=>$data);
echo json_encode($results);

}


?>