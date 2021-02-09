<?php
session_start();
error_reporting(~E_ALL);
$user_name = $_SESSION['Login'];
$entity_id=$_SESSION['entityID'];
$entity_name=$_SESSION['name'];

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

date_default_timezone_set("UTC");
$date=date("Y-m-d g:i:s");
$sql="update task set status='Started', date_start_date='".$date."' where id='$entity_id'";
$result=mysqli_query($conn,$sql);

if(isset($result))
{
	echo 1;
}
else
{
	echo 0;
}

?>