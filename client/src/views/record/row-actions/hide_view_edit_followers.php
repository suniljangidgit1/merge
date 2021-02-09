<?php
session_start();
error_reporting(~E_ALL);
$user_name = $_SESSION['Login'];

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

$res = mysqli_query($conn, "SELECT * FROM user WHERE user_name='".$user_name."'");
$row= mysqli_fetch_array($res);

$is_admin= $row['is_admin'];

if($is_admin==1){
	echo 1;
}else{
	echo 2;
}
?>