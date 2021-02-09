<?php

//DATABASE OPERATIONS
include($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/lead_api/facebook/databaseOperations.php');

$pageName			=	isset($_GET['pageName']) ? $_GET['pageName'] : NULL;
$facebookUserId 	=   isset($_GET['facebookUserId']) ? $_GET['facebookUserId'] : NULL;

// GET PAGE DETAILS
$sql        		=   "SELECT `page_id`, `page_access_token` FROM `facebook_ads_user_pages` WHERE `user_id` = '$facebookUserId' AND `page_name` = '$pageName'";
$row        		=   $databaseOperations->getRecordArray($sql);

$data['pageId']     		=   $row['page_id'];
$data['pageAccessToken']  	=   $row['page_access_token'];

echo json_encode($data);return;
?>   