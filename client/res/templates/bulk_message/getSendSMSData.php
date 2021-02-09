<?php
$json=true;

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

//include custom function
include($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/bulk_message/contentTemplate/customFunctions.php');

// Check limit excceded of sms 
$smsLimit 			= getDomainSmsLimit( $servername, $username, $password, $dbname );
$exstingMsgCount 	= getExistingDomainSmsCount( $conn ); // CHEKC HERE LIMIT OF USER
$userDomainDetails 	= getDomainUserDetails( $servername, $username, $password, $dbname ); // CHEKC HERE LIMIT OF USER

// Check limit excceded of sms 

$total_messages 	=	$smsLimit;
$sent_messages 		=	$exstingMsgCount;
$remaining_messages =	( $smsLimit - $exstingMsgCount );
$plan_expiry_date 	=	strtotime( $userDomainDetails["endDate"] );
$sender_id			=	$userDomainDetails["sender_id"];
$current_date  		=   strtotime( date("Y-m-d") );

if( $current_date > $plan_expiry_date ) {
	$remaining_messages = '<div class="bg bg-danger" style="padding: 10px;">Your plan has expired. Please contact the admin to extend your plan.</div>
		<script>$("#sendSMSbtn").attr("disabled",true); </script>
	';
	$data['remaining_messages'] = $remaining_messages;
	echo json_encode($data);return;
}

if($remaining_messages <= 0) {
	$remaining_messages = '<div class="bg bg-danger" style="padding: 10px;">Your SMS limit has expired. Please contact admin if you wish to send more SMS.</div>
		<script>$("#sendSMSbtn").attr("disabled",true); </script>
	';
	$data['remaining_messages'] = $remaining_messages;
} else {
	$remaining_messages = '<b> Remaining Messages : '.$remaining_messages.' </b>
	<script>$("#sendSMSbtn").attr("disabled",false); </script>
	';
	$data['remaining_messages'] = $remaining_messages;
}

//get content template
// $contentTemplate      =  getContentTemplate();

// if(!empty($contentTemplate) && count($contentTemplate) > 0 && isset($contentTemplate)) {
// 	$data['smsContentTemplate'] = $contentTemplate;
// }

//get sender id's
$category		=  'Promotional';
$senderIds      =  getSenderId($category);

if(!empty($senderIds) && count($senderIds) > 0 && isset($senderIds)) {
	$data['senderIds'] = $senderIds;
} else {
	$remaining_messages = '<div class="bg bg-danger" style="padding: 10px;">You do not have DLT approved sender id for your account. Please contact admin.</div>
		<script>$("#sendSMSbtn").attr("disabled",true); </script>
	';
	$data['remaining_messages'] = $remaining_messages;
	echo json_encode($data);return;
}

$campaigns_name = "My Campaign - ".date("d-m-Y-his");
$campaigns_name = '<input type="text" id="campaigns_name" name="campaigns_name" class="form-control" placeholder="Campaign Name" value="'.$campaigns_name.'">
';

$data['campaigns_name']  = $campaigns_name;

	$sendSMS = '<select name="sms_from" class="form-control">';
	$sendSMS 	.='<option value="">Select Sender ID</option>';

$sendSMS		.=               '</select>';
$data['sendSMS'] = $sendSMS;

$sql = "SELECT id,listname FROM contact_list WHERE deleted = '0'";

$result=mysqli_query($conn,$sql);
$output = '<select id="sms_recipients" name="sms_recipients" class="form-control">
                  <option value="manually">Add Manually</option>';
while($row = mysqli_fetch_assoc($result)) {
	$output .= '<option value="'.$row['id'].','.$row['listname'].'">'.$row['listname'].'</option>';
}

$output .= '</select>';
$output .='<script>
	$("#sms_recipients").change(function() {
      var $option = $(this).find("option:selected");
      var value = $option.val();
      if(value == "manually")
      {
        $(".recipients_show").css("display","block");
        $("#recipients").focus();
        $("#send-sms-form").bootstrapValidator("enableFieldValidators", "copy_paste", true);
      }
      else
      {
        $(".recipients_show").css("display","none");
        $("#send-sms-form").bootstrapValidator("enableFieldValidators", "copy_paste", false);
      }
  });
</script>';

$data['data'] = $output;
echo json_encode($data);return;


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
