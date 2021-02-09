<?php
// create database connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

//include custom function
include($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/bulk_message/contentTemplate/customFunctions.php');

$errorMessage   =  	'';
$senderIds		= 	'';

//get sender id's
$category		=  'Transactional';
$senderIds      =  getSenderId($category);

if(!empty($senderIds) && count($senderIds) > 0 && isset($senderIds)) {
	$data['senderIds'] 		= 	$senderIds;
	$data['errorMessage']   = 	$errorMessage;
} else {

	$errorMessage = '<div class="bg bg-danger" style="padding: 10px;">You do not have DLT approved sender id for your account. Please contact admin.</div><br>
	';
	$data['errorMessage'] = $errorMessage;
}

$data['status']    = 'true';
echo json_encode($data);return;
?>