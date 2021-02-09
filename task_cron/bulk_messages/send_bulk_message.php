<?php
//get sms getway credentials
include('/var/www/html/crm.fincrm.net/crm/task_cron/email_templates/SmsNotification.php');
//include($_SERVER['DOCUMENT_ROOT'].'/task_cron/email_templates/SmsNotification.php');

// get common database connection
$filePath      = '/var/www/html/crm.fincrm.net/crm/data/config.php';
//$filePath      = $_SERVER['DOCUMENT_ROOT'].'/data/config.php';

include($filePath);

// Create connection
$commonDbConn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$commonDbConn) {
  die("Connection failed: " . mysqli_connect_error());
}

$commonDbSql = "SELECT mc.*, hr.host_name,hr.db_name,hr.password, hr.user_name FROM my_campaigns mc INNER JOIN host_record hr ON mc.domain_name = hr.domain_url WHERE domain_status = 'transfer'";

$commonDbResult 	= 	mysqli_query($commonDbConn,$commonDbSql);
$commonDbNumRows 	=	mysqli_num_rows($commonDbResult);

if($commonDbNumRows>0){

	while($commonDbRows = mysqli_fetch_assoc($commonDbResult)) {

		$commonDbId 		= 	$commonDbRows['id'];
		$send_sms_date 		= 	$commonDbRows['send_sms_date'];
		$send_sms_time 		= 	$commonDbRows['send_sms_time'];
		$host_name 			= 	$commonDbRows['host_name'];
		$user_name 			= 	$commonDbRows['user_name'];
		$password 			= 	$commonDbRows['password'];
		$db_name 			= 	$commonDbRows['db_name'];
		$commonDBSentMessageId = $commonDbRows['sent_messages_id'];

		// Create connection
		$conn = mysqli_connect($host_name, $user_name, $password, $db_name);

		// Check connection
		if (!$conn) {
		  die("Connection failed: " . mysqli_connect_error());
		}

		$sql     =   "SELECT sbs.`id`, `phones`, sm.send_from, sm.sms_body FROM `sent_bulk_sms` sbs INNER JOIN sent_messages sm ON sbs.`sent_message_id` = sm.id WHERE sbs.status = 'Not-Delivered' AND sbs.sent_message_id = '".$commonDBSentMessageId."' AND sbs.send_status = 'not'";
		$result  =   mysqli_query($conn,$sql);

		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$api_key = SMSPROMOTIONALAPIKEY;
				$contacts = $row['phones'];
				$from = $row['send_from'];
				$sms_body = rtrim($row['sms_body'],".")." - FinCRM.";
				$sms_text = urlencode($sms_body);
				$id = $row['id'];
				$sms_shoot_id = '';

				$ch = curl_init();
				curl_setopt($ch,CURLOPT_URL, "https://msg.mtalkz.com/V2/http-api.php");
		        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		        curl_setopt($ch, CURLOPT_POST, 1);
		        curl_setopt($ch, CURLOPT_POSTFIELDS, "apikey=".$api_key."&senderid=".$from."&number=".$contacts."&message=".$sms_text."&format=json");
				$response = curl_exec($ch);
				
				$response   =    json_decode($response);
				echo "<pre>";
				print_r($response);
				echo "<br>";
				if(preg_match('/^[0-9]{10}+$/', $contacts)) {
					$sms_shoot_id  =    $response->data[0]->id;
				}
    			
				curl_close($ch);

				$sql = "UPDATE sent_bulk_sms SET sms_shoot_id='$sms_shoot_id', send_status = 'sent' WHERE id=".$id;
				mysqli_query($conn,$sql);
			}
		} else {
			//$commonDbsql = "UPDATE my_campaigns SET domain_status = 'sent' WHERE id='".$commonDbId."'";
			$commonDbsql = "DELETE FROM `my_campaigns` WHERE id='".$commonDbId."'";
			mysqli_query($commonDbConn,$commonDbsql);
		}
	}
}else {
	echo "Nothing else";
}
?> 