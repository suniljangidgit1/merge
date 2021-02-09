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

$commonDbSql = "SELECT mc.*, hr.host_name,hr.db_name,hr.password, hr.user_name FROM my_campaigns mc INNER JOIN host_record hr ON mc.domain_name = hr.domain_url WHERE domain_status = 'sent'";

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

		$sql="SELECT sbs.`id`, `sent_message_id`, `phones`, `status`, `sent_sms_date`, `sms_shoot_id`, sm.total_delivered_s_m_s, sm.total_not_delivered_s_m_s, sbs.created_at FROM `sent_bulk_sms` sbs INNER JOIN sent_messages sm ON sbs.`sent_message_id` = sm.id WHERE sbs.status = 'Not-Delivered' AND sbs.sent_message_id ='".$commonDBSentMessageId."'";

		$result=mysqli_query($conn,$sql);
		$count  = 1;
		

		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$api_key = SMSPROMOTIONALAPIKEY;
				$sms_shoot_id = $row['sms_shoot_id'];
				$sent_message_id = $row['sent_message_id'];
				$phones = $row['phones'];
				$delivery_status = '';
				$createdAt = $row['created_at'];
				
				//increase one day 
				$createdAt = increaseTime($createdAt);
				
				//get current date
				date_default_timezone_set('Asia/Calcutta'); 
				$DateTime = new DateTime();
				$currentDate= $DateTime->format('Y-m-d H:i:s');

				if($count == '1'){
					$total_delivered_s_m_s = $row['total_delivered_s_m_s'];
					$total_not_delivered_s_m_s = $row['total_not_delivered_s_m_s'];
				}
				$count++;

				$id = $row['id'];

				if(preg_match('/^[0-9]{10}+$/', $phones) && $currentDate < $createdAt) {

					$api_url = "https://msg.mtalkz.com/V2/http-dlr.php?apikey=".$api_key."&id=".$sms_shoot_id."&format=json";
					$response = file_get_contents($api_url);
					$dlr_array = json_decode($response);

					$delivery_status = $dlr_array->data[0]->status;
					echo "<pre>";
					print_r($dlr_array);
				} else {
					$sql = "UPDATE sent_bulk_sms SET status='Error' WHERE id=".$id;
					mysqli_query($conn,$sql);
				}

				if($delivery_status == 'Delivered')
				{
					$dlrs_sql = "UPDATE sent_bulk_sms SET status='Delivered' WHERE id=".$id;
					mysqli_query($conn,$dlrs_sql);


					$total_delivered_s_m_s = $total_delivered_s_m_s+1;
					$total_not_delivered_s_m_s = $total_not_delivered_s_m_s - 1;

					$sql = "UPDATE sent_messages SET total_not_delivered_s_m_s='$total_not_delivered_s_m_s', total_delivered_s_m_s='$total_delivered_s_m_s' WHERE id='".$sent_message_id."'";
					mysqli_query($conn,$sql);
				}
			}
		} else {
			$commonDbsql = "DELETE FROM `my_campaigns` WHERE id='".$commonDbId."'";
			mysqli_query($commonDbConn,$commonDbsql);
		}
	}
} else {
	echo "Nothing else";
}

//add  Minute
function increaseTime($date = "") {
	
	if(!empty($date)) {
		$minutes_to_add = 1440;		//minute
		$time = new DateTime($date);
		$time->add(new DateInterval('PT' . $minutes_to_add . 'M'));

		$stamp = $time->format('Y-m-d H:i:s');
		return $stamp;
	}
}
?> 