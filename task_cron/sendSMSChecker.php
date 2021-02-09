<?php

//get connection
// include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
include('/var/www/html/crm.fincrm.net/crm/task_cron/email_templates/SmsNotification.php');
//include($_SERVER['DOCUMENT_ROOT'].'/task_cron/email_templates/SmsNotification.php');

$filePath      = 	'/var/www/html/crm.fincrm.net/crm/data/config.php';
//$filePath      = 	$_SERVER['DOCUMENT_ROOT'].'/data/config.php';
include($filePath);

$sql 		   =	"SELECT `id`, `delivery_status`, `sms_shoot_id`,subdomain_url ,send_sms_id FROM `s_m_s_reminder` WHERE delivery_status = 'send'";
$result 	   =	mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {

		$api_key 		= 	SMSAPIKEY;
		$sms_shoot_id 	= 	$row['sms_shoot_id'];
		$subdomain_url 	= 	$row['subdomain_url'];
		$send_sms_id 	= 	$row['send_sms_id'];
		$delete_id 		= 	$row['id'];
		$api_url 		= 	"https://msg.mtalkz.com/V2/http-dlr.php?apikey=".$api_key."&id=".$sms_shoot_id."&format=json";
		$response 		= 	file_get_contents($api_url);
		$dlr_array 		= 	json_decode($response);

		$delivery_status = 	$dlr_array->data[0]->status;

		echo "<pre>";
		print_r($dlr_array);
		echo "<br>";

		if($delivery_status == 'Delivered') {

			$sql        	=   "SELECT `host_name`, `db_name`, `password`, `user_name` FROM `host_record` WHERE `domain_url` = '".$subdomain_url."'";
            $result     	=   mysqli_query($conn,$sql);   
            $row        	=   mysqli_fetch_assoc($result);

            $servername     =   $row['host_name'];
            $username       =   $row['user_name'];
            $password       =   $row['password'];
            $dbname         =   $row['db_name'];

	        // Create subdomain connection
	        $new_conn = mysqli_connect($servername, $username, $password, $dbname);
			$dlrs_sql = "UPDATE send_s_m_s_data SET delivery_status='Delivered' WHERE id='".$send_sms_id."'";
			mysqli_query($new_conn,$dlrs_sql);

	        $sql = "DELETE FROM s_m_s_reminder WHERE id='".$delete_id."'";
			mysqli_query($conn,$sql);
		}
	}
} else {
	echo "Nothing else";
}
?> 