<?php
// create database connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

$listArr     =  array();

$sql     	 =  "SELECT `sender_id` FROM `sender_i_d` WHERE status = 'Active' AND deleted = 0";

$result = mysqli_query($conn, $sql);
$count  = mysqli_num_rows($result);

if($count >= 0) {

  while ($row = mysqli_fetch_assoc($result)) {
  	$sender_id     			= 	$row["sender_id"];
  	$listArr[$sender_id] 	= 	$sender_id;
  }
}

$data['status']    = 'true';
$data['senderIds'] = $listArr;
echo json_encode($data);return;
?>