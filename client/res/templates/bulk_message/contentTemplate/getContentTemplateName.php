<?php
// create CRM database connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

$senderId      =  isset($_GET["senderId"]) ? $_GET["senderId"] : NULL;

$listArr      =  array();

$sql     =  "SELECT `id`, `template_name` FROM `content_template` WHERE `sender_id` = '$senderId' AND `deleted` = '0'";

$result = mysqli_query($conn, $sql);
$count  = mysqli_num_rows($result);

if($count > 0) {

  while ($row = mysqli_fetch_assoc($result)) {
  	$id     					= 	$row["id"];
  	$template_name     			= 	$row["template_name"];

  	$listArr[$template_name] 	= 	$id.",".$template_name;
  }
}

$data['status']    = 'true';
$data['contentTemplateName'] = $listArr;
echo json_encode($data);return;
?>