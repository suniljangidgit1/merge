<?php
date_default_timezone_set('UTC');

$created_at			=	date("Y-m-d h:i:s ");
$modified_at		=	date("Y-m-d h:i:s ");

date_default_timezone_set('Asia/Calcutta'); 
$DateTime      	= 	new DateTime();
$currentDate 	= 	$DateTime->format('d-m-Y');

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

$commonDbSql = "SELECT mc.*, hr.host_name,hr.db_name,hr.password, hr.user_name FROM my_campaigns mc INNER JOIN host_record hr ON mc.domain_name = hr.domain_url WHERE send_sms_date ='".$currentDate."' AND `send_sms_time`='".date("H:i")."' AND domain_status = 'reminder'";

$commonDbResult 	= 	mysqli_query($commonDbConn,$commonDbSql);
$commonDbNumRows 	=	mysqli_num_rows($commonDbResult);

if($commonDbNumRows>0){

	while($commonDbRows = mysqli_fetch_assoc($commonDbResult)) {
		$id 				= 	$commonDbRows['id'];
		$send_sms_date 		= 	$commonDbRows['send_sms_date'];
		$send_sms_time 		= 	$commonDbRows['send_sms_time'];
		$host_name 			= 	$commonDbRows['host_name'];
		$user_name 			= 	$commonDbRows['user_name'];
		$password 			= 	$commonDbRows['password'];
		$db_name 			= 	$commonDbRows['db_name'];

		// Create connection
		$conn = mysqli_connect($host_name, $user_name, $password, $db_name);

		// Check connection
		if (!$conn) {
		  die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "SELECT mc.`id`,mc.`campaigns_name`, mc.`list_name`, mc.`list_id`, mc.`sms_body`, mc.`send_from`, mc.`send_sms_date`, mc.`send_sms_time`, mc.`created_by_id`, mc.`domainname`, cl.`totalcontacts`, mc.`content_template_name`, mc.`scheduled_at` FROM `my_campaigns` mc INNER JOIN `contact_list` cl ON mc.list_id = cl.id WHERE mc.deleted='0' AND mc.id ='".$id."'";

		$result_s 	= 	mysqli_query($conn,$sql);
		$num_rows 	=	mysqli_num_rows($result_s);

		if($num_rows>0){

			while($row_s = mysqli_fetch_assoc($result_s)) {
				$id 			= 	$row_s['id'];
				$campaigns_name	= 	$row_s['campaigns_name'];
				$list_name		=	$row_s['list_name'];
				$list_id		=	$row_s['list_id'];
				$sms_body 		= 	$row_s['sms_body'];
				$send_from 		= 	$row_s['send_from'];
				$send_sms_date 	= 	$row_s['send_sms_date'];
				$send_sms_time 	= 	$row_s['send_sms_time'];
				$created_by_id 	= 	$row_s['created_by_id'];
				$domain_name 	= 	$row_s['domainname'];
				$total_contacts	= 	$row_s['totalcontacts'];
				$templateName	= 	$row_s['content_template_name'];
				$scheduledAt	= 	$row_s['scheduled_at'];

				$sent_message_id	=   getToken(17);

				//insert contacts in queue
				$sql = "INSERT INTO sent_bulk_sms(`sent_message_id`, `phones`) VALUES ";

				$res_contacts= mysqli_query($conn, "SELECT phone FROM contacts WHERE deleted='0' AND list_id='".$list_id."'");
				while($row = mysqli_fetch_assoc($res_contacts)) {

					if(!empty($row["phone"])) {
						$sql .= "('$sent_message_id','".$row["phone"]."'),";
					}
				  }

				$sql = rtrim($sql,',');
				mysqli_query($conn,$sql);

				// inserted contacts on sent message
				$total_sent_sms = $total_contacts;
				$total_delivered_s_m_s  = '0';
				$total_not_delivered_s_m_s = $total_contacts;

				$sql = "INSERT INTO `sent_messages`(`id`, `deleted`, `created_at`,`modified_at`, `created_by_id`, `campaigns_name`, `list_name`, `list_id`, `sms_body`, `send_from`, `sendsmsdate`, `sendsmstime`, `total_sent_sms`, `total_delivered_s_m_s`, `total_not_delivered_s_m_s`, `assigned_user_id`, `content_template_name`, `scheduled_at`) VALUES ('$sent_message_id','0','$created_at','$modified_at','$created_by_id','$campaigns_name','$list_name','$list_id','$sms_body','$send_from','$send_sms_date','$send_sms_time', '$total_sent_sms', '$total_delivered_s_m_s', '$total_not_delivered_s_m_s', '$created_by_id', '$templateName', '$scheduledAt')";
				
				mysqli_query($conn,$sql);

				$sql = "DELETE FROM `my_campaigns` WHERE id='".$id."'";
				mysqli_query($conn,$sql);

				$commonDbSql = 'UPDATE my_campaigns SET domain_status = "transfer", sent_messages_id="'.$sent_message_id.'" WHERE id = "'.$id.'"';
				mysqli_query($commonDbConn,$commonDbSql);
			}
		}
		else {
			echo "don't have any sms reminder";
		}
	}
} else {
	echo "Nothing else";
}
	
function getToken($length) {

	$token = "";
	$codeAlphabet = "abcdefghijklmnopqrstuvwxyz1234567890";
	$codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
	$codeAlphabet.= "0123456789";
	$max = strlen($codeAlphabet); // edited
	for ($i=0; $i < $length; $i++) {
		$token .= $codeAlphabet[crypto_rand_secure(0, $max-1)];
	}
	return $token;
}


function crypto_rand_secure($min, $max) {
	
    $range = $max - $min;
    if ($range < 0) {
        return $min;
    }
    ## Not so random
    $log = log($range, 2);
    $bytes = (int) ($log / 8) + 1;
    ## Length in bytes
    $bits = (int) $log + 1;
    ## Length in bits
    $filter = (int) (1 << $bits) - 1;
    ## Set all lower bits to 1
    do {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter;
        ## Discard irrelevant bits
    } while ($rnd >= $range);
    return $min + $rnd;
}
?>
