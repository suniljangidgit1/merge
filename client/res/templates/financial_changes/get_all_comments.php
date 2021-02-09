<?php
session_start();
error_reporting(~E_ALL);
$user_name = $_SESSION['Login'];

date_default_timezone_set('asia/kolkata');   

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


	$id=$_POST['estimate_id'];

	$sql1="select * from estimate_comments where estimate_id='$id'";
	$result1=mysqli_query($conn,$sql1);
	
	while($row1=mysqli_fetch_assoc($result1))
	{		
		$attachment_arr[] = array("comment" => $row1['comment'], "date" => $row1['date'], "user_name" => $row1['posted_by']);
		
	}


echo json_encode($attachment_arr); 
?>