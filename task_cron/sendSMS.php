<?php
//set timezone
date_default_timezone_set('Asia/Calcutta'); 
$dateTime 		= 	new DateTime();
$currentDate	= 	$dateTime->format('Y-m-d');

//get sms credintials
include('/var/www/html/crm.fincrm.net/crm/task_cron/email_templates/SmsNotification.php');
//include($_SERVER['DOCUMENT_ROOT'].'/task_cron/email_templates/SmsNotification.php');

//create common database connection
$filePath      = '/var/www/html/crm.fincrm.net/crm/data/config.php';
//$filePath      	 = 	$_SERVER['DOCUMENT_ROOT'].'/data/config.php';
include($filePath);

$comm_sql 		 = 	"SELECT * from s_m_s_reminder where reminder_date='".$currentDate."' AND reminder_time='".date("H:i")."' AND sms_status='Active' AND deleted='0' AND delivery_status = 'Not-Delivered'";

$result_s 		 = 	mysqli_query($conn,$comm_sql);
$num_rows 		 = 	mysqli_num_rows($result_s);

if($num_rows>0) {
    $id="";

	while($row_s = mysqli_fetch_assoc($result_s)) {

		$mobileNo 			= 	$row_s['mobile_no'];
		$sms_body			= 	$row_s['sms_body'];
		$id 				= 	$row_s['id'];

		$created_at     	=   $row_s['created_at'];
		$folder_name 		= 	$row_s['folder_name'];
		$send_sms_date_time = 	$row_s['send_sms_date_time'];
		$reminder_date 		= 	$row_s['reminder_date'];
		$reminder_time 		= 	$row_s['reminder_time'];
		$created_by_id 		= 	$row_s['created_by_id'];
		$sms_status      	= 	'Sent';
		$status          	= 	$row_s['status'];
		$subdomain_url   	= 	$row_s['subdomain_url'];
		$delivery_status 	= 	"Not-Delivered";

		$sentFrom          	= 	$row_s['sent_from'];
		$templateName   	= 	$row_s['content_template_name'];
		
		$api_key 		= 	SMSAPIKEY;
		$contacts 		= 	$mobileNo;
		$from 			=	$sentFrom;
		$reminder 		= 	"Reminder : ".rtrim($sms_body,".")." - FinCRM.";
		$sms_text 		= 	urlencode($reminder);

		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL, "https://msg.mtalkz.com/V2/http-api.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "apikey=".$api_key."&senderid=".$from."&number=".$contacts."&message=".$sms_text."&format=json");
		$response = curl_exec($ch);

		//get response id
        $response   	=    json_decode($response);
        $sms_shoot_id  	=    $response->data[0]->id;
		curl_close($ch);

		echo "<pre>";
		print_r($response);
		echo "<br>";

		$recordId		= 	getToken(17);

		$sql        	=   "SELECT `host_name`, `db_name`, `password`, `user_name` FROM `host_record` WHERE `domain_url` = '".$subdomain_url."'";

        $result    		=   mysqli_query($conn,$sql);   
        $row        	=   mysqli_fetch_assoc($result);

        $servername     =   $row['host_name'];
        $username       =   $row['user_name'];
        $password       =   $row['password'];
        $dbname         =   $row['db_name'];

        // Create subdomain connection
        $new_conn = mysqli_connect($servername, $username, $password, $dbname);

		//move sent data & delete 
		$sql = "insert into send_s_m_s_data(id, mobile_no, folder_name, reminder_date, sms_body, send_sms_date_time,reminder_time,status,sms_status, sms_shoot_id, created_at, created_by_id,assigned_user_id, delivery_status, send_from, content_template_name) values('$recordId','$mobileNo','$folder_name','$reminder_date','$sms_body','$send_sms_date_time','$reminder_time','$status','$sms_status','$sms_shoot_id', '$created_at', '$created_by_id', '$created_by_id','$delivery_status', '$sentFrom', '$templateName')";
			
		$subdomainResult  =  saveDataOnSubdomain($sql,$id,$new_conn);
            
		$sql 			  =  "UPDATE s_m_s_reminder SET delivery_status = 'send', sms_shoot_id = '".$sms_shoot_id."', send_sms_id = '".$recordId."' WHERE id = '".$id."' ";
		$updateResult     =  mysqli_query($conn,$sql);

		if($subdomainResult && $updateResult){
			echo "message sent successfully";
		} else {
			echo "somthing went wrong";
		}
	}
}
else {
	echo "Nothing else";
}

/*
* TO GET TOKEN
* @para -> $length  	   = (integer)
* @return 	= (string)
*/

function getToken($length = "") {

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

/*
* TO GET TOKEN ENCRYPTION
* @para -> $min  	   = (integer)
* @para -> $max  	   = (integer)
* @return 	= (string)
*/
function crypto_rand_secure($min, $max) {
	
$range = $max - $min;
if ($range < 1) return $min; // not so random...
$log = ceil(log($range, 2));
$bytes = (int) ($log / 8) + 1; // length in bytes
$bits = (int) $log + 1; // length in bits
$filter = (int) (1 << $bits) - 1; // set all lower bits to 1
do {
    $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
    $rnd = $rnd & $filter; // discard irrelevant bits
} while ($rnd > $range);
return $min + $rnd;
}

/* FOR SAVE & DELETE DATA ON SUB-DOMAIN
 * @para   ->  $saveSQL 	-> (string)
 * @para   ->  $deleteId	-> (string)
 * @para   ->  $subdomainConnection 
 * @return ->  boolean[ true, false]
*/
function saveDataOnSubdomain($saveSQL = "", $deleteId = "", $subdomainConnection = "") {

    $saveResult = mysqli_query($subdomainConnection, $saveSQL);
    if (!$saveResult) {
      echo("save data on subdomain error: " . mysqli_error($subdomainConnection));
    }

    $sql 			 = 	"DELETE FROM s_m_s_reminder WHERE id='$deleteId'";
	$deleteResult    = 	mysqli_query($subdomainConnection,$sql);
	if (!$deleteResult) {
      echo("delete data on subdomain error: " . mysqli_error($subdomainConnection));
    }

    if($saveResult && $deleteResult ){
    	return true;
    } else {
    	return false;
    }
}    
?>