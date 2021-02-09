<?php
    date_default_timezone_set('Asia/Calcutta'); 
	$DateTime = new DateTime();
	$currentDate= $DateTime->format('Y-m-d');
	
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	$sql= "SELECT * from s_m_s_reminder where reminder_date='".$currentDate."' AND reminder_time='".date("H:i")."' AND sms_status='Active' AND deleted='0'";

	$result = mysqli_query($conn,$sql);
	$num_rows=mysqli_num_rows($result);

	if($num_rows>0){
	    $id="";
		while($row = mysqli_fetch_array($result)) {
			$mobileNo= $row['mobile_no'];
			$sms_body= $row['sms_body'];
			$id=$row['id'];
		}

		$api_key = '45D303BAF92352';
		$contacts = $mobileNo;
		$from = 'FINCRM';
		$sms_text = urlencode($sms_body);

		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL, "http://bulksms.smsroot.com/app/smsapi/index.php");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "key=".$api_key."&campaign=0&routeid=13&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text);
		$response = curl_exec($ch);

		//new code
		$sms_shoot_id = str_replace('SMS-SHOOT-ID/', '', $response);

		curl_close($ch);

		//move sent data & delete 
			$sql="Select created_at, mobile_no, folder_name, reminder_date, sms_body, send_sms_date_time, reminder_time, sms_status, status, assigned_user_id, created_by_id from s_m_s_reminder where id='".$id."'";

			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_array($result);

			$created_at=$row['created_at'];
			$mobile_no = $row['mobile_no'];
			$folder_name = $row['folder_name'];
			$send_sms_date_time = $row['send_sms_date_time'];
			$sms_body = $row['sms_body'];
			$reminder_date = $row['reminder_date'];
			$reminder_time = $row['reminder_time'];
			$sms_status = 'Sent';
			$status = $row['status'];
			$created_by_id = $row['created_by_id'];
			$assigned_user_id = $row['assigned_user_id'];
            $recordId= getToken(17);
			$sql = "insert into send_s_m_s_data(id, mobile_no, folder_name, reminder_date, sms_body, send_sms_date_time,reminder_time,status,sms_status, sms_shoot_id, created_at, created_by_id,assigned_user_id) values('$recordId','$mobile_no','$folder_name','$reminder_date','$sms_body','$send_sms_date_time','$reminder_time','$status','$sms_status','$sms_shoot_id', '$created_at', '$created_by_id', '$created_by_id')";
            echo $sql;
			mysqli_query($conn,$sql);

			// $sql = "UPDATE s_m_s_reminder SET deleted='1' WHERE id=".$id;
			$sql = "DELETE FROM s_m_s_reminder WHERE id='".$id."'";
			mysqli_query($conn,$sql);
	}
	else
	{
		echo "don't have any sms reminder";
	}
	
	function getToken($length)
	{
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
	
	function crypto_rand_secure($min, $max)
    {
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

?>