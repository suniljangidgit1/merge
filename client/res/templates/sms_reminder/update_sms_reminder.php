<?php session_start();

//set timezone
date_default_timezone_set('UTC'); 

//GET CONNECTION
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

//GET SMS CREDINTIALS
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/email_templates/SmsNotification.php');

//INCLUDE CUSTOM FUNCTION
include($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/bulk_message/contentTemplate/customFunctions.php');

$data["error"] 	= "true";
$data["status"] = "false";
$data["msg"] 	= "Invalid request!";

$sr_id 				= isset($_POST["sr_id"]) ? $_POST["sr_id"] : NULL; 
$record 			= smsRminderGet($sr_id, $json=false);

if( empty($record) || empty($sr_id) ){
	$data["msg"] 	= "No record found!";
	echo json_encode($data);return;
}

// check limit excceded of user 
$sr_createdBy = 1;

// $limiExcced = checkSmsLimitOfUser($sr_createdBy); // CHEKC HERE LIMIT OF USER
// if( !empty($sr_createdBy) && $limiExcced == "yes" ){

// 	$data["error"] 	= "true";
// 	$data["status"] = "false";
// 	$data["msg"] 	= "Limit excceded! Please contact to admin.";
// 	echo json_encode($data);return;
// }
// Check limit excceded of user 

//GET CURRENT USER ID
$userName 			= 	$_SESSION['Login'];
$userId 			=	getUserId($userName);

$sr_mobileNo 		= 	isset($_POST["smsMobileNo2"]) ? $_POST["smsMobileNo2"] : $record["sr_mobileNo"]; 
$sr_smsBody 		= 	isset($_POST["smsBody2"]) ? $_POST["smsBody2"] : $record["sr_smsBody"]; 
$sr_reminderDate 	= 	isset($_POST["smsDate2"]) ? $_POST["smsDate2"] : $record["sr_reminderDate"]; 
$sr_reminderTime 	= 	isset($_POST["smsTime2"]) ? $_POST["smsTime2"] : $record["sr_reminderTime"];

$senderId 			= 	isset($_POST["edit_smssenderid"]) ? $_POST["edit_smssenderid"] : $record["sr_reminderTime"];
$sendType 		 	= 	isset($_POST["edit_send_sms"]) ? $_POST["edit_send_sms"] : NULL;

$contentTemplate 	= 	isset($_POST["edit_smscontent_template"]) ? $_POST["edit_smscontent_template"] : $record["sr_reminderTime"];
$template       	=   explode(',', $contentTemplate);
$templateId     	=   $template[0];
$templateName   	=   $template[1];

$newsendsmsTime 	= 	date('g:i a',strtotime($sr_reminderTime));

$oldDate 			= 	strtr($sr_reminderDate, '/', '-');
$oldDate 			= 	strtotime($oldDate);
$sr_reminderDate 	= 	date("d/m/Y", $oldDate);
$sr_sendSmsDateTime = 	$sr_reminderDate." ".$newsendsmsTime;
$sr_reminderDate 	= 	date("Y-m-d", $oldDate);

$DateTime 			= 	new DateTime();
$sr_updatedAt 		= 	$DateTime->format('Y-m-d H:i:s');

$subdomain_url      = 	$_SERVER['HTTP_HOST'];
$id   				= 	getToken(17);

//CHECK SEND SMS TYPE
if($sendType == 'immediately') {

	//insert record on sent messages, updated record on common database & delete record on subdomain database for sms reminder
	$sendMessageId 		= 	$sr_id;
	$deliveryStatus 	= 	"Not-Delivered";
	$createdBy 			=   $userId;
	$numbers[]			=	$sr_mobileNo;
	$smsStatus 		    = 	"Active";

	//send sms
	$apiKey 		= 	SMSAPIKEY;
	$smsBody 		= 	"Reminder : ".rtrim($sr_smsBody,".")." - FinCRM.";
	$responseIds    =   sendSMS($apiKey, $senderId, $numbers, $smsBody);

	if(empty($responseIds)) {
		$data["error"] 	= "true";
		$data["status"] = "false";
		$data["msg"] 	= "Invalid sender id.";
		echo json_encode($data);return;
	} else {
		$responseId 	=	$responseIds[0];
	}

	//SAVE DATA ON SUBDOMAIN
	$sql = "insert into send_s_m_s_data(id, mobile_no, reminder_date, sms_body, reminder_time,status,sms_status, sms_shoot_id, created_at, created_by_id,assigned_user_id, delivery_status, send_from, content_template_name) values('$sendMessageId','$sr_mobileNo', '$sr_reminderDate','$sr_smsBody','$sr_reminderTime','1','$deliveryStatus','$responseId', '$sr_updatedAt', '$createdBy', '$createdBy','$deliveryStatus', '$senderId', '$templateName')";

	//DELETE CURRENT RECORD ON SUBDOMAIN
	$deleteSql    =  "DELETE FROM `s_m_s_reminder` WHERE `id` = '$sendMessageId'";

	$deleteResult =  exicuteQuery($deleteSql);
	if(!$deleteResult) {
		$data["error"] 	= "true";
		$data["status"] = "false";
		$data["msg"] 	= "Oops! Deleting record error.";
		echo json_encode($data);return;
	}

	//UDATE DATA ON COMMON DATABASE
	$comman_db_sql = "UPDATE `s_m_s_reminder` SET `send_sms_id`='$sendMessageId', `sms_shoot_id`='$responseId',`delivery_status`='send' WHERE `id` = '$sendMessageId'";

	$sucessMessage  = "Message sent successfully.";

} else {

	$sql = "UPDATE s_m_s_reminder SET mobile_no = '$sr_mobileNo', sms_body = '$sr_smsBody', reminder_date = '$sr_reminderDate', reminder_time = '$sr_reminderTime', send_sms_date_time = '$sr_sendSmsDateTime', modified_at = '$sr_updatedAt',`send_from`='$senderId', `content_template_name` = '$templateName' WHERE id = '$sr_id' ";

	$comman_db_sql = "UPDATE s_m_s_reminder SET mobile_no = '$sr_mobileNo', sms_body = '$sr_smsBody', reminder_date = '$sr_reminderDate', reminder_time = '$sr_reminderTime', send_sms_date_time = '$sr_sendSmsDateTime', modified_at = '$sr_updatedAt',subdomain_url = '$subdomain_url', sent_from = '$senderId', content_template_name = '$templateName' WHERE id = '$sr_id' ";

	$sucessMessage  = "Reminder updated successfully";
}


$result 		 = 	exicuteQuery($sql);
$comm_db_result  = 	exicuteQueryOnCommonDatabase($comman_db_sql);

if( $result && $comm_db_result ){
	$data["error"] 	= "false";
	$data["status"] = "true";
	$data["msg"] 	= $sucessMessage;
	echo json_encode($data);return;
}else{
	$data["error"] 	= "true";
	$data["status"] = "false";
	$data["msg"] 	= "Oops! Something went wrong.";
	echo json_encode($data);return;
}

echo json_encode($data);return;


function smsRminderGet($id="", $json=true){

	//CREATE CONNECTION
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	$data["error"] 	= "true";
	$data["status"] = "false";
	$data["msg"] 	= "Invalid request!";

	$sql = 'SELECT sr.id, sr.mobile_no, sr.sms_body, DATE_FORMAT(sr.reminder_time, "%H:%i") as sr_reminderTime, DATE_FORMAT(sr.reminder_date, "%d/%m/%Y") as sr_reminderDate, sr.created_at, sr.send_sms_date_time, sr.sms_status, sr.status FROM s_m_s_reminder as sr WHERE id="'.$id.'" ORDER BY sr.id ASC ';

	$result = mysqli_fetch_array(mysqli_query($conn, $sql));
	if( !empty($result) ){
		$data["error"] 	= "false";
		$data["status"] = "true";
		$data["msg"] 	= "Record found!";
		$data["data"] 	= $result;

		if( !$json ){
			return $result;
		}
		echo json_encode($data);return;
	}

	echo json_encode($data);		
}

function checkSmsLimitOfUser($userId=""){

	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	$isExcceded = "no";
	if( !empty($userId) ){

		$sql 		= " SELECT COUNT(sr.id) as count FROM s_m_s_reminder as sr WHERE sr.created_by_id = '".$userId."' ";
		$result 	= mysqli_fetch_array(mysqli_query($conn, $sql));

	 	$limitSql 	= " SELECT usl.usl_limit FROM user_sms_limit as usl WHERE usl.usl_userId ='".$userId."' ";
	 	$maxLimit 	= mysqli_fetch_array(mysqli_query($conn, $limitSql));
		
		if( !empty($maxLimit) ){
			$isExcceded = "yes";
		}
		if( !empty($result["count"]) && $result["count"] > $maxLimit['usl_limit'] ){
			$isExcceded = "yes";
		}else{
			$isExcceded = "no";
		}
	}
	return $isExcceded;
}
