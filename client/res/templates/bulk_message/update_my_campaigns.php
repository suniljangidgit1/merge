<?php session_start();
//set timezone
date_default_timezone_set('UTC'); 

$userName = $_SESSION['Login'];

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

//include custom function
include($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/bulk_message/contentTemplate/customFunctions.php');

$userId  		=  	getUserId($userName);
$id				=	$_POST['id'];
$sms_body		=	$_POST['sms_text'];
$sms_from 		=	$_POST['editSmsSenderId'];

$sms_recipients =	explode(',', $_POST['sms_recipients']);
$list_name 		=	$sms_recipients[1];
$list_id		=   $sms_recipients[0];

$date 			=	$_POST['date'];
$oldDate 		= 	strtr($date, '/', '-');
$oldDate 		= 	strtotime($oldDate);
$date 			= 	date("d-m-Y", $oldDate);

$time 			=	$_POST['time'];
$campaigns_name = 	$_POST['campaigns_name'];

$modified_at	=	date("Y-m-d h:i:s ");

$template 	    = 	isset($_POST["editSmsContentTemplate"]) ? $_POST["editSmsContentTemplate"] : NULL;
$template       =   explode(',', $template);
$templateId     =   $template[0];
$templateName   =   $template[1];

$schduledTime 		= 	date('g:i a',strtotime($time));
$schduledDate 		= 	strtr($date, '/', '-');
$schduledDate 		= 	strtotime($schduledDate);
$schduledDate 		= 	date("d/m/Y", $schduledDate);
$schduledDateTime 	= 	$schduledDate." ".$schduledTime;

$sendSMSType 		=	$_POST['edit_send_sms'];
// Check limit excceded of sms 
$sql1 				= " SELECT `list_id` FROM `my_campaigns` WHERE id ='".$id. "' ";
$resObj 			= mysqli_query($conn, $sql1);
$oldContactListId	= mysqli_fetch_array($resObj);

// EXISTING LIST CONTACT COUNT
$oldListContactsCount = 0;
if( !empty( $oldContactListId["list_id"] ) ) {
	$oldListContactsCount = getContactListTotalContacts( $conn, $oldContactListId["list_id"] );
}

// NEW LIST CONTACT COUNT
$newListContactsCount = 0;
if( !empty( $list_id ) ) {
	$newListContactsCount = getContactListTotalContacts( $conn, $list_id );
}

$smsLimit 			= getDomainSmsLimit( $servername, $username, $password, $dbname );
$exstingMsgCount 	= getExistingDomainSmsCount( $conn ); // CHEKC HERE LIMIT OF USER
$userDomainDetails 	= getDomainUserDetails( $servername, $username, $password, $dbname ); 

// CHEKC HERE LIMIT OF USER
$tempExisting = ( $exstingMsgCount - $oldListContactsCount );

if( ( $tempExisting + (int) $newListContactsCount ) > $smsLimit ){
	$data["error"] 	= "true";
	$data["status"] = "false";
	$data["msg"] 	= "Your SMS limit has expired. Please contact admin if you wish to send more SMS.";
	echo json_encode($data);return;
}
// Check limit excceded of sms 

$sql  			   	= 	"SELECT `totalcontacts` FROM `contact_list` WHERE id ='".$list_id. "'";
$res 			   	= 	mysqli_query($conn, $sql);
$row      		   	=	mysqli_fetch_array($res);
$inserted_contacts 	= 	$row['totalcontacts'];

if($inserted_contacts <= 0) {

	$data["error"] 	= "true";
	$data["status"] = "false";
	$data["msg"] 	= "Empty List! Please Add/Upload Contacts.";
	echo json_encode($data);return;

}

if($sendSMSType == 'edit_immediately') {

	//insert contacts in queue
	$sql = "INSERT INTO sent_bulk_sms(`sent_message_id`, `phones`) VALUES ";

	$res_contacts= mysqli_query($conn, "SELECT phone FROM contacts WHERE deleted='0' AND list_id='".$list_id."'");
	while($row = mysqli_fetch_assoc($res_contacts)) {
		if(!empty($row["phone"])) {
			$sql .= "('$id','".$row["phone"]."'),";
		}
	}

	$sql 		= 	rtrim($sql,',');
	$result 	=	mysqli_query($conn,$sql);

	$total_sent_sms 			= 	$inserted_contacts;
	$total_delivered_s_m_s  	= 	'0';
	$total_not_delivered_s_m_s 	= 	$inserted_contacts;

	$sql = "INSERT INTO `sent_messages`(`id`, `deleted`, `created_at`,`modified_at`, `created_by_id`, `campaigns_name`, `list_name`, `list_id`, `sms_body`, `send_from`, `sendsmsdate`, `sendsmstime`, `total_sent_sms`, `total_delivered_s_m_s`, `total_not_delivered_s_m_s`,`assigned_user_id`, `content_template_name`) VALUES ('$id','0','$modified_at','$modified_at','$userId','$campaigns_name','$list_name','$list_id','$sms_body','$sms_from','$date','$time', '$total_sent_sms', '$total_delivered_s_m_s', '$total_not_delivered_s_m_s', '$userId', '$templateName')";

	//DELETE CURRENT RECORD ON SUBDOMAIN
	$deleteSql    =  "DELETE FROM `my_campaigns` WHERE `id` = '$id'";

	$deleteResult =  exicuteQuery($deleteSql);
	if(!$deleteResult) {
		$data["error"] 	= "true";
		$data["status"] = "false";
		$data["msg"] 	= "Oops! Something wen't wrong.";
		echo json_encode($data);return;
	}

	//UDATE DATA ON COMMON DATABASE
	$commonDbSql 	  =  "UPDATE my_campaigns SET domain_status = 'transfer', sent_messages_id='$id' WHERE id = '$id'";

	$successMessage   = "Message sent successfully.";
}else {

	$sql 	="UPDATE `my_campaigns` SET `modified_at`='$modified_at',`campaigns_name`='$campaigns_name',`list_name`='$list_name',`list_id`='$list_id',`sms_body`='$sms_body',`send_from`='$sms_from',`send_sms_date`='$date',`send_sms_time`='$time', `content_template_id` = '$templateId', `content_template_name` = '$templateName', `scheduled_at` = '$schduledDateTime' WHERE id = '".$id."'";

	//update data on common database 
	$commonDbSql 	  =	 "UPDATE `my_campaigns` SET `send_sms_date`='$date',`send_sms_time`='$time' WHERE id = '".$id."'";

	$successMessage  =  "Campaign Updated Successfully.";
}

$result 		  =    exicuteQuery($sql);
$commonDbResult   =    exicuteQueryOnCommonDatabase($commonDbSql);

if( $result && $commonDbResult ){
    $data["error"]  	= "false";
    $data["status"] 	= "true";
    $data["msg"]    	= $successMessage;
    echo json_encode($data);return;
}else{
    $data["error"]  = "true";
    $data["status"] = "false";
    $data["msg"]    = "Oops! Something wen't wrong.";
    echo json_encode($data);return;
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

/* To get domain start & end date as per plan */
function getDomainUserDetails( $servername, $username, $password, $dbname ) {

	$data 			= array();
	$dbWebName		= "fincrm_web"; // CHANGE DATBASE IF FINCRM WEBSITE DB NAME CHANGED
	
	$connWeb 		= mysqli_connect($servername, $username, $password , $dbWebName);
	if (!$connWeb) {
	  	die("Connection failed: " . mysqli_connect_error());
	}

	// To get domain sms limit as per plan
	$sql = "
		SELECT u.u_id,rzom.id,pm.pId,rzom.startDate,rzom.endDate,u.sender_id FROM users as u 
		INNER JOIN rz_order_master as rzom ON u.rz_om_id = rzom.id AND u.u_id = rzom.uId
		INNER JOIN plan_master as pm ON rzom.pId = pm.pId
		WHERE u.u_domain_name = '".trim($dbname)."' ";
	
	$res 		= mysqli_query($connWeb, $sql);
    $row 		= mysqli_fetch_array($res); 
 	// echo "<pre>";print_r($row);die;
 	$data["startDate"] 	= isset( $row["startDate"] ) ? $row["startDate"] : "" ;
 	$data["endDate"] 	= isset( $row["endDate"] ) ? $row["endDate"] : "" ;
 	$data["sender_id"] 	= isset( $row["sender_id"] ) ? $row["sender_id"] : "" ;
 	return $data;

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

/* To get contact list  */
function getContactListTotalContacts( $conn, $listId ) {

	$sql 		= "SELECT `totalcontacts` FROM `contact_list` WHERE id ='".$listId. "' ";
	$resObj 	= mysqli_query($conn, $sql);
	$rowArr		= mysqli_fetch_array($resObj);
	return $contactListTotalCount = isset( $rowArr["totalcontacts"] ) ? $rowArr["totalcontacts"] : 0 ;
}