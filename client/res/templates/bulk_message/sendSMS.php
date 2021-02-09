<?php session_start();
//set timezone
date_default_timezone_set('UTC'); 
$userName = $_SESSION['Login'];

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

//include custom function
include($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/bulk_message/contentTemplate/customFunctions.php');

$userId  		=  	getUserId($userName);
$createdBy 		= 	$userId;
$id				=	getToken(17);
$sms_body		=	$_POST['sms_text'];
$sms_from 		=	$_POST['sms_from'];

if($_POST['sms_recipients'] != 'manually'){

	$sms_recipients =	explode(',', $_POST['sms_recipients']);
	$list_name 		=	$sms_recipients[1];
	$list_id		=   $sms_recipients[0];
} else {
	$list_id   		=  $_POST['sms_recipients'];
}	

$copy_paste 	=	explode(',', $_POST['copy_paste']);
$send_sms 		=	$_POST['send_sms'];

$date 			=	$_POST['date'];
$oldDate 		= 	strtr($date, '/', '-');
$oldDate 		= 	strtotime($oldDate);
$date 			= 	date("d-m-Y", $oldDate);

$time 			=	$_POST['time'];
$campaigns_name = 	$_POST['campaigns_name'];
$created_at		=	date("Y-m-d h:i:s ");
$modified_at	=	date("Y-m-d h:i:s ");

$template 	    = 	isset($_POST["sms_content_template"]) ? $_POST["sms_content_template"] : NULL;
$template       =   explode(',', $template);
$templateId     =   $template[0];
$templateName   =   $template[1];

$domain_name 	= 	$_SERVER['HTTP_HOST'];

//schduled at
$schduledTime 		= 	date('g:i a',strtotime($time));
$schduledDate 		= 	strtr($date, '/', '-');
$schduledDate 		= 	strtotime($schduledDate);
$schduledDate 		= 	date("d/m/Y", $schduledDate);
$schduledDateTime 	= 	$schduledDate." ".$schduledTime;


if( $list_id == 'manually' ) {

	$new_list_id	=	getToken(15);
	$contact_id		=	getToken(16);
	$list_name		=	'New List - '.date("d-m-Y his");
	
    $inserted_contacts = 0;

	$totalcontacts = count($copy_paste);
	$contacts_array = array();

	if(empty($copy_paste[0])) {
		$data["error"]  = "true";
	    $data["status"] = "false";
	    $data["msg"]    = "Please enter recipients.";
	    echo json_encode($data);return;
	}

	$sql = "INSERT INTO contacts(id, list_id, phone) VALUES ";
	foreach($copy_paste as $contact) {

		$sql .= "('$contact_id','$new_list_id','$contact'),";
		$inserted_contacts++;  
	}

	// Check limit excceded of sms 
	$smsLimit 			= getDomainSmsLimit( $servername, $username, $password, $dbname );
	$exstingMsgCount 	= getExistingDomainSmsCount( $conn ); // CHEKC HERE LIMIT OF USER
	
	if( ( $exstingMsgCount + (int) $inserted_contacts ) > $smsLimit ){
		$data["error"] 	= "true";
		$data["status"] = "false";
		$data["msg"] 	= "Your SMS limit has expired. Please contact admin if you wish to send more SMS.";
		echo json_encode($data);return;
	}
	// Check limit excceded of sms 

	$sql 		= 	rtrim($sql,',');
	$result		=	mysqli_query($conn,$sql);
	if($result) {
		$message = "
		            <b>Total Records : ".$totalcontacts."<br>
		            Total Contacts : ".$inserted_contacts."<br>
		            Campaign Created!</b>
		";
	} else {
		$data["error"]  = "true";
	    $data["status"] = "false";
	    $data["msg"]    = "Oops! Something went wrong.";
	    echo json_encode($data);return;
	}

	$sql="INSERT INTO contact_list(id,  created_at, modified_at,totalcontacts, listname,created_by_id, assigned_user_id, total_emails) VALUES ('$new_list_id','$created_at','$modified_at','$inserted_contacts','$list_name','$userId','$userId','0')";
	$result=mysqli_query($conn,$sql);
	if(!$result){
	    $data["error"]  = "true";
	    $data["status"] = "false";
	    $data["msg"]    = "Oops! Something went wrong.";
	    echo json_encode($data);return;
	}
	$list_id = $new_list_id;
} else {

	$sql = "SELECT `totalcontacts` FROM `contact_list` WHERE id ='".$list_id. "'";
	$res= mysqli_query($conn, $sql);
	$row=mysqli_fetch_array($res);
	$inserted_contacts = $row['totalcontacts'];

	if($inserted_contacts <= 0) {

		$data["error"] 	= "true";
		$data["status"] = "false";
		$data["msg"] 	= "Empty List! Please Add Contacts.";
		echo json_encode($data);return;

	}

	// Check limit excceded of sms 
	$smsLimit 			= getDomainSmsLimit( $servername, $username, $password, $dbname );
	$exstingMsgCount 	= getExistingDomainSmsCount( $conn ); // CHEKC HERE LIMIT OF USER
	
	if( ( $exstingMsgCount + (int) $inserted_contacts ) > $smsLimit ){
		$data["error"] 	= "true";
		$data["status"] = "false";
		$data["msg"] 	= "Your SMS limit has expired. Please contact admin if you wish to send more SMS.";
		echo json_encode($data);return;
	}

	// Check limit excceded of sms
}

if($send_sms == "immediately") {

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

	$sql = "INSERT INTO `sent_messages`(`id`, `deleted`, `created_at`,`modified_at`, `created_by_id`, `campaigns_name`, `list_name`, `list_id`, `sms_body`, `send_from`, `sendsmsdate`, `sendsmstime`, `total_sent_sms`, `total_delivered_s_m_s`, `total_not_delivered_s_m_s`,`assigned_user_id`, `content_template_name`) VALUES ('$id','0','$created_at','$modified_at','$userId','$campaigns_name','$list_name','$list_id','$sms_body','$sms_from','$date','$time', '$total_sent_sms', '$total_delivered_s_m_s', '$total_not_delivered_s_m_s', '$userId', '$templateName')";

	$message = "Message sent successfully.";

	// save on common datavase
	$commonDbSql = "INSERT INTO `my_campaigns`(`id`, `domain_name`, `domain_status`, `sent_messages_id`) VALUES ('$id','$domain_name','transfer','$id')";

	saveOnCommonDatabase($commonDbSql);
} else {

	$sql="INSERT INTO `my_campaigns`(`id`,`deleted`, `created_at`, `modified_at`,`created_by_id`, `campaigns_name`, `list_name`, `list_id`,`sms_body`,`send_from`,`send_sms_date`,`send_sms_time`, `domainname`,`assigned_user_id`, `content_template_id`, `content_template_name`, `scheduled_at`) VALUES ('$id','0','$created_at','$modified_at','$userId','$campaigns_name','$list_name','$list_id','$sms_body','$sms_from','$date','$time', '$domain_name','$userId', '$templateId', '$templateName', '$schduledDateTime')";

	//save on common database
	$commonDbSql   =  "INSERT INTO `my_campaigns`(`id`, `send_sms_date`, `send_sms_time`, `domain_name`) VALUES ('$id','$date','$time','$domain_name')";

	saveOnCommonDatabase($commonDbSql);

	$message = "Campaigns Created!";
}

$result  =  mysqli_query($conn,$sql);
if($result) {
    $data["error"]  	= "false";
    $data["status"] 	= "true";
    $data["msg"]    	= $message;
    echo json_encode($data);return;
} else {
    $data["error"]  = "true";
    $data["status"] = "false";
    $data["msg"]    = "Oops! Something went wrong.";
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

// save on common database
function saveOnCommonDatabase($commonDbSql) { 

	// create connection
	$filePath      = $_SERVER['DOCUMENT_ROOT'].'/data/config.php';

	include($filePath);
	// Create connection
	$commonDatabaseConn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$commonDatabaseConn) {
	  die("Common Database Connection failed: " . mysqli_connect_error());
	}

	$result = mysqli_query($commonDatabaseConn, $commonDbSql);
     if (!$result) {
      echo("Error description: " . mysqli_error($commonDatabaseConn));
      return false;
    } else {
    	return true;
    }

	// close connection
	mysqli_close($commonDatabaseConn);

}