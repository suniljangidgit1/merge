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

//GET CURRENT USER ID
$userName 			= 	$_SESSION['Login'];
$userId 			=	getUserId($userName);

$sr_mobileNo 		= 	isset($_POST["smsMobileNo1"]) ? $_POST["smsMobileNo1"] : NULL; 
$sr_smsBody 		= 	isset($_POST["smsBody1"]) ? $_POST["smsBody1"] : NULL; 
$sr_reminderDate 	= 	isset($_POST["smsDate1"]) ? $_POST["smsDate1"] : NULL; 
$sr_reminderTime 	= 	isset($_POST["smsTime1"]) ? $_POST["smsTime1"] : NULL;
$sendType 		 	= 	isset($_POST["add_send_sms"]) ? $_POST["add_send_sms"] : NULL;
$senderId 			= 	isset($_POST["smssenderid"]) ? $_POST["smssenderid"] : NULL; 
$contentTemplate 	= 	isset($_POST["smscontent_template"]) ? $_POST["smscontent_template"] : NULL;
$template       	=   explode(',', $contentTemplate);
$templateId     	=   $template[0];
$templateName   	=   $template[1];

$newsendsmsTime 	= 	date('g:i a',strtotime($sr_reminderTime));

$oldDate 			= 	strtr($sr_reminderDate, '/', '-');
$oldDate 			= 	strtotime($oldDate);
$sr_reminderDate 	= 	date("d/m/Y", $oldDate);
$sr_sendSmsDateTime = 	$sr_reminderDate." ".$newsendsmsTime;

$sr_reminderDate 	= 	date("Y-m-d", $oldDate);

$sr_folderName  	= 	NULL; // PLEASE ADD HERE DOMAIN NAME
$sr_smsStatus 		= 	"Active";
$sr_status 			= 	1;
$sr_createdBy 		= 	$userId; // PLEASE ADD HERE USER SESSION USER_ID
$DateTime 			= 	new DateTime();
$sr_createdAt 		= 	$DateTime->format('Y-m-d H:i:s');
$subdomain_url 		= 	$_SERVER['HTTP_HOST'];
// Check limit excceded of sms 
/*$limiExcced = checkSmsLimitOfUser($sr_createdBy); // CHEKC HERE LIMIT OF USER
if( !empty($sr_createdBy) && $limiExcced == "yes" ){

	$data["error"] 	= "true";
	$data["status"] = "false";
	$data["msg"] 	= "Limit excceded! Please contact to admin.";
	echo json_encode($data);return;
}*/

$smsLimit 			= getDomainSmsLimit( $servername, $username, $password, $dbname );
$exstingMsgCount 	= getExistingDomainSmsCount( $conn ); // CHEKC HERE LIMIT OF USER

if( ( $exstingMsgCount + 1 ) > $smsLimit ){
	$data["error"] 	= "true";
	$data["status"] = "false";
	$data["msg"] 	= "Your SMS limit has expired. Please contact admin if you wish to send more SMS.";
	echo json_encode($data);return;
}
// Check limit excceded of sms 

$id   = 	getToken(17);

//check send sms type
if($sendType == 'immediately') {

	$sendMessageId 		= 	$id;
	$deliveryStatus 	= 	"Not-Delivered";
	$numbers[]			=	$sr_mobileNo;

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

	//save data on subdomain
	$sql = "insert into send_s_m_s_data(id, mobile_no, reminder_date, sms_body, reminder_time,status,sms_status, sms_shoot_id, created_at, created_by_id,assigned_user_id, delivery_status, send_from, content_template_name) values('$sendMessageId','$sr_mobileNo', '$sr_reminderDate','$sr_smsBody','$sr_reminderTime','1','$deliveryStatus','$responseId', '$sr_createdAt', '$sr_createdBy', '$sr_createdBy','$deliveryStatus', '$senderId', '$templateName')";

	//save data on common database
	$comman_db_sql = "INSERT INTO s_m_s_reminder (id, mobile_no, sms_body, reminder_date, reminder_time, send_sms_date_time, folder_name, created_by_id, sms_status, status, created_at, assigned_user_id, subdomain_url, user_name, delivery_status, sent_from, content_template_name, send_sms_id, sms_shoot_id) VALUES ('$id', '$sr_mobileNo', '$sr_smsBody', '$sr_reminderDate', '$sr_reminderTime', '$sr_sendSmsDateTime', '$sr_folderName', '$sr_createdBy', '$sr_smsStatus', '$sr_status', '$sr_createdAt', '$sr_createdBy','$subdomain_url','$userName','send', '$senderId', '$templateName', '$sendMessageId', '$responseId')";

	$sucessMessage  = "Message sent successfully.";

} else {

	$sql  = 	"INSERT INTO s_m_s_reminder (id, mobile_no, sms_body, reminder_date, reminder_time, send_sms_date_time, folder_name, created_by_id, sms_status, status, created_at, assigned_user_id, `send_from`, `content_template_name`) VALUES ('$id', '$sr_mobileNo', '$sr_smsBody', '$sr_reminderDate', '$sr_reminderTime', '$sr_sendSmsDateTime', '$sr_folderName', '$sr_createdBy', '$sr_smsStatus', '$sr_status', '$sr_createdAt', '$sr_createdBy', '$senderId', '$templateName')";

	$comman_db_sql = "INSERT INTO s_m_s_reminder (id, mobile_no, sms_body, reminder_date, reminder_time, send_sms_date_time, folder_name, created_by_id, sms_status, status, created_at, assigned_user_id, subdomain_url, user_name, delivery_status, sent_from, content_template_name ) VALUES ('$id', '$sr_mobileNo', '$sr_smsBody', '$sr_reminderDate', '$sr_reminderTime', '$sr_sendSmsDateTime', '$sr_folderName', '$sr_createdBy', '$sr_smsStatus', '$sr_status', '$sr_createdAt', '$sr_createdBy','$subdomain_url','$userName','Not-Delivered', '$senderId', '$templateName')";

	$sucessMessage  = "Reminder added successfully.";
}


$result    			= 	mysqli_query($conn, $sql);
$comman_db_result 	= 	exicuteQueryOnCommonDatabase($comman_db_sql);

if( $result && $comman_db_result ){

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


/*==========================CUSTOM FUNCTIONS START=================================*/

function checkSmsLimitOfUser($userId=""){
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	$isExcceded = "no";
	if( !empty($userId) ){

		$sql 		= " SELECT COUNT(sr.id) as count FROM s_m_s_reminder as sr WHERE sr.created_by_id = '".$userId."' ";
		$result 	= mysqli_fetch_array(mysqli_query($conn, $sql));
	 	// echo "<pre>";print_r($result);

	 	$limitSql 	= " SELECT usl.usl_limit FROM user_sms_limit as usl WHERE usl.usl_userId ='".$userId."' ";
	 	$maxLimit 	= mysqli_fetch_array(mysqli_query($conn, $limitSql));
	 	// echo "<pre>";print_r($maxLimit);
		
		if( !empty($maxLimit) ){
			$isExcceded = "yes";
		}
		if( !empty($result["count"]) && $result["count"] > $maxLimit['usl_limit'] ){
			$isExcceded = "yes";
		}else{
			$isExcceded = "no";
		}
	}
	
	// echo $isExcceded;die;
	return $isExcceded;

}

/* To get domain sms limit as per plan */
function getDomainSmsLimit( $servername, $username, $password, $dbname ) {

	$dbWebName		= "fincrm_web"; // CHANGE DATBASE IF FINCRM WEBSITE DB NAME CHANGED
	
	$connWeb 		= mysqli_connect($servername, $username, $password , $dbWebName);
	if (!$connWeb) {
	  	die("Connection failed: " . mysqli_connect_error());
	}

	// To get domain sms limit as per plan
	$sql = "
		SELECT u.u_id,rzom.id,pm.pId,pm.pSmsLimit FROM users as u 
		INNER JOIN rz_order_master as rzom ON u.rz_om_id = rzom.id AND u.u_id = rzom.uId
		INNER JOIN plan_master as pm ON rzom.pId = pm.pId
		WHERE u.u_domain_name = '".trim($dbname)."' ";
	
	$res 		= mysqli_query($connWeb, $sql);
    $row 		= mysqli_fetch_array($res); 
 	// echo "<pre>";print_r($row);die;
 	return $count = isset( $row["pSmsLimit"] ) ? $row["pSmsLimit"] : 0 ;

}

/* To get domain existing sms count */
function getExistingDomainSmsCount( $conn ) {

	$data = array();

	// GET TOTAL SMS REMINDER COUNT - NOT SEND
	$sql1 		= " SELECT COUNT(smsr.id) as count FROM s_m_s_reminder as smsr WHERE deleted = '0' ";
	$smsrRow 	= mysqli_query( $conn, $sql1 );
	$smsrData 	= mysqli_fetch_array( $smsrRow );
	$data["smsrCount"]  = isset( $smsrData["count"] ) ? $smsrData["count"] : 0 ;
 	// echo "<pre><br> smsrCount :- ";print_r($data["smsrCount"]); 

	// GET TOTAL SMS REMINDER COUNT - SEND
	$sql2 		= " SELECT COUNT(ssmsr.id) as count FROM send_s_m_s_data as ssmsr ";
	$ssmsrRow 	= mysqli_query( $conn, $sql2 );
	$ssmsrData 	= mysqli_fetch_array( $ssmsrRow );
	$data["ssmsrCount"] = isset( $ssmsrData["count"] ) ? $ssmsrData["count"] : 0 ;
 	// echo "<pre><br> ssmsrCount :- ";print_r($data["ssmsrCount"]); 

	// GET TOTAL BULK SMS REMINDER COUNT - NOT SEND
	$sql3 		= " SELECT SUM(sm.total_sent_sms) as sum FROM sent_messages as sm ";
	$smRow 		= mysqli_query( $conn, $sql3 );
	$smData 	= mysqli_fetch_array( $smRow );
	$data["smSum"] = isset( $smData["sum"] ) ? $smData["sum"] : 0 ;
 	// echo "<pre><br> smSum :- ";print_r($data["smSum"]); 

	// GET TOTAL BULK SMS REMINDER COUNT - SEND
	$sql4 		= " SELECT SUM(cl.totalcontacts) as sum FROM my_campaigns as mc INNER JOIN contact_list as cl ON mc.list_id = cl.id WHERE mc.deleted = '0' ";
	$clRow 		= mysqli_query( $conn, $sql4 );
	$clData 	= mysqli_fetch_array( $clRow );
	$data["clSum"] = isset( $clData["sum"] ) ? $clData["sum"] : 0 ;
 	// echo "<pre><br> clSum :- ";print_r($data["clSum"]); 

	// echo "<pre> getExistingDomainSmsCount called : ";print_r($data);die;
 	$exstingMsgCount = array_sum($data);
	return $exstingMsgCount;

}

/*==========================CUSTOM FUNCTIONS END=================================*/