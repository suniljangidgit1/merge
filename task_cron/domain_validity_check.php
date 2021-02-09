<?php
	require("PHPMailer/src/PHPMailer.php");
  	require("PHPMailer/src/SMTP.php");
  	require("PHPMailer/src/Exception.php");
    require("email_templates/EmailNotification.php");
    include("fincrmWebsiteConnection.php");
  	define('SENDFROM', 'FinCRM');
	define('SMSAPIKEY', 'nb80zacUDf7jFgri');
    $emailNotification = new EmailNotification();

	// Trasactional SMS key
	define('SMSTRANSACTIONALAPIKEY', 'nb80zacUDf7jFgri');
	$mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); // enable SMTP	
	// TO SEND OTP SMS
	if( !function_exists( 'sendSMS' ) ) {

	    function sendSMS($mobileNo, $smsBody) {

	        $api_key    =    SMSAPIKEY;
	        $from       =    SENDFROM;
            $smsBody    =    rtrim($smsBody,".")." - FinCRM.";
	        $smsBody    =    urlencode($smsBody);

	        $ch         =    curl_init();
	        curl_setopt($ch,CURLOPT_URL, "https://msg.mtalkz.com/V2/http-api.php");
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	        curl_setopt($ch, CURLOPT_POST, 1);
	        curl_setopt($ch, CURLOPT_POSTFIELDS, "apikey=".$api_key."&senderid=".$from."&number=".$mobileNo."&message=".$smsBody."&format=json");
	        $response   =    curl_exec($ch);
	        curl_close($ch);
	        return $response;
	    }
	}
	// $subject = "DEMO";
	$mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = ''; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "email-smtp.ap-south-1.amazonaws.com";
    $mail->Port = 587; // or 587
    $mail->IsHTML(true);
    $mail->Username = "AKIAVKMGGRZRTZ57QKML";
    $mail->Password = "BAql7y/engbX5VFuZBb4T7yJW/LXVsi+ql0lbaK5MY52";
    $mail->SetFrom("no-reply@fincrm.net", "FinCRM");
    $email_msg = "";
   

	$remaningDays = "";	
	$res11 = mysqli_query($conn, "SELECT u.u_id, u.rz_om_id, u.u_email, u.u_mobile, rm.requestType, rm.endDate, rm.pId, u.u_domain_name FROM users u, rz_order_master rm WHERE u.rz_om_id = rm.id AND u.u_status= 'Active' AND u.domain_status != 'Inactive' ");

    while($row = mysqli_fetch_assoc($res11)){
        $upcomming_plan_endDate = $emailNotification->check_is_more_plan($row['u_id'], $row['u_domain_name'],  $row['rz_om_id'], $conn);
        
        $res_pm = mysqli_query($conn, "SELECT pSlug FROM plan_master WHERE pId = '".$row['pId']."'");

        while($row_new = mysqli_fetch_assoc($res_pm)) {
        $pSlug = $row_new['pSlug'];
        }
        ;

        if($upcomming_plan_endDate == 0){
            // continue;
            $userId         = $row['u_id'];
            $rz_om_id       = $row['rz_om_id'];
            $requestType    = $row['requestType'];
            $u_email        = $row['u_email'];
            $u_mobile       = $row['u_mobile'];
            $subject        = "DEMO";
            $mail->AddAddress($u_email);    
            $current_date   = new DateTime(); 
            $end_date       = $row['endDate'];
            $end_date       = new DateTime($end_date);
            $days           = date_diff($current_date, $end_date);
            $pId            = $row['pId'];
            $domain         = $row['u_domain_name'];
            if($servername == "localhost"){
               $server_name = "fincrm_web.com";
            }else{
              $server_name = "fincrm.net";
            }
            
            $tokan = $emailNotification->genrate_tokan();

            if($requestType=="free"){
             $url = $server_name."/upgrade-plan/".base64_encode($userId)."/".$tokan;                    
           
            } else if($requestType == "razorpay"){
             $url = $server_name.'/pre-payment/'.base64_encode($domain).'/'.$pId.'/'.base64_encode($pSlug).'/'.$tokan;
            }

            

            if($requestType == "free"){
                if($current_date < $end_date){
                    $remaningDays = $days->format("%d")+1;
                    if($remaningDays == 7){
                        $mail->Subject = "FinCRM is about to expire in 7 days";
                        // Send Email code.... 
                        $sms_body= "Dear user, Your FinCRM subscription is about to expire in 7 days. Please upgrade to continue using without any interruptions.
                            ".$url."";
                            // fincrm.net/pricing/".base64_encode($userId)."";
                        $msg= "Your FinCRM subscription is about to expire in 7 days. Please upgrade to continue using without any interruptions.";
                        $email_body = $emailNotification->send_user_validity_email($msg, $userId, $conn, $requestType, $pSlug, $domain, $pId, $servername,$tokan);
                        $mail->Body = $email_body;
                        $mail->Send();
                        // Send SMS code.....
                        sendSMS($u_mobile, $sms_body);
                    }else if($remaningDays == 1){

                        $mail->Subject = "FinCRM is about to expire tomorrow.";
                        // Send Email code.... 
                        $sms_body= "Dear user, Your FinCRM subscription is about to expire tomorrow. Please upgrade to continue using without any interruptions. 
                            ".$url."";
                        $msg= "Your FinCRM subscription is about to expire tomorrow. Please upgrade to continue using without any interruptions.";
                        $email_body = $emailNotification->send_user_validity_email($msg, $userId, $conn, $requestType, $pSlug, $domain, $pId, $servername,$tokan);
                        $mail->Body = $email_body;
                        $mail->Send();
                        // Send SMS code.....
                        sendSMS($u_mobile, $sms_body);
                    }
                }else if($row['endDate'] == date("Y-m-d")){ // Today is last day to end free plan...
                    
                    $mail->Subject = "FinCRM has expired. Your account has been blocked.";
                    $sms_body= "Dear user, Your FinCRM subscription has expired. Please upgrade to continue using without any interruptions. Failing which your access will be blocked from tomorrow.
                        ".$url."";
                    $msg= "Your FinCRM subscription has expired. Please upgrade to continue using without any interruptions. Failing which your access will be blocked from tomorrow.";
                    $email_body = $emailNotification->send_user_validity_email($msg, $userId, $conn, $requestType, $pSlug, $domain, $pId, $servername,$tokan);
                    $mail->Body = $email_body;
                    $mail->Send();
                    // Send SMS code.....
                    sendSMS($u_mobile, $sms_body);
                    // }

                }else if($row['endDate'] < date("Y-m-d")){
                    $remaningDays = $days->format("%d");
                    if($remaningDays == 1){

                         mysqli_query($conn, "UPDATE users SET domain_status = 'Blocked' WHERE u_id=".$row['u_id']);
                        }

                    if($remaningDays == 7){

                        $sms_body = "Dear user, Your FinCRM subscription hasn't been upgraded. Your account will be deleted after 7 days. If you wish to continue using FinCRM, please upgrade.
                            ".$url."";
                        $msg = "Your FinCRM subscription hasn't been upgraded. Your account will be deleted after 7 days. If you wish to continue using FinCRM, please upgrade.";
                        $mail->Subject = "FinCRM has expired. Your account will be deleted soon.";
                        $email_body = $emailNotification->send_user_validity_email($msg, $userId, $conn, $requestType, $pSlug, $domain, $pId, $servername,$tokan);
                        $mail->Body = $email_body;
                        $mail->Send();
                        // Send SMS code.....
                        sendSMS($u_mobile, $sms_body);
                    
                    }
                    if($remaningDays == 14){

                        $sms_body = "Dear user, Your FinCRM subscription hasn't been upgraded. Your account will be deleted tomorrow. If you wish to continue using FinCRM, please upgrade.
                            ".$url."";
                        $msg = "Your FinCRM subscription hasn't been upgraded. Your account will be deleted tomorrow. If you wish to continue using FinCRM, please upgrade.";
                        $mail->Subject = "FinCRM has expired. Your account will be deleted soon.";
                        $email_body = $emailNotification->send_user_validity_email($msg, $userId, $conn, $requestType, $pSlug, $domain, $pId, $servername,$tokan);
                        $mail->Body = $email_body;
                        $mail->Send();
                        // Send SMS code.....
                        sendSMS($u_mobile, $sms_body);
                    }
                    if($remaningDays == 15){

                        $sms_body = "Dear user, Your FinCRM subscription hasn't been upgraded. Your account will be deleted today. If you wish to continue using FinCRM, please upgrade.
                            ".$url."";
                        $msg = "Your FinCRM subscription hasn't been upgraded. Your account will be deleted today. If you wish to continue using FinCRM, please upgrade.";
                        $mail->Subject = "Your FinCRM account has been deleted.";
                        $email_body = $emailNotification->send_user_validity_email($msg, $userId, $conn, $requestType, $pSlug, $domain, $pId, $servername,$tokan);
                        $mail->Body = $email_body;
                        $mail->Send();
                        // Send SMS code.....
                        sendSMS($u_mobile, $sms_body);
                    }

                }
            }else if($requestType == "razorpay"){
                 // echo $remaningDays = $days->format("%d");
                if($current_date < $end_date){
                    
                    $remaningDays = $days->format("%d")+1;
                    if($remaningDays == 7){

                        $sms_body = "Dear user, Your FinCRM subscription is about to expire in 7 days. Please renew to continue using without any interruptions.
                            ".$url."";
                        $msg = "Your FinCRM subscription is about to expire in 7 days. Please renew to continue using without any interruptions.";
                        $mail->Subject = "FinCRM is about to expire in 7 days.";
                       $email_body = $emailNotification->send_user_validity_email($msg, $userId, $conn, $requestType, $pSlug, $domain, $pId, $servername,$tokan);
                        $mail->Body = $email_body;
                        $mail->Send();
                        // Send SMS code.....
                        sendSMS($u_mobile, $sms_body);

                    }
                    if($remaningDays == 1){
                            
                        $sms_body = "Dear user, Your FinCRM subscription is about to expire tomorrow. Please renew to continue using without any interruptions.
                        ".$url."";
                        $msg = "Your FinCRM subscription is about to expire tomorrow. Please renew to continue using without any interruptions.";
                        $mail->Subject = "FinCRM is about to expire tomorrow.";
                        $email_body = $emailNotification->send_user_validity_email($msg, $userId, $conn, $requestType, $pSlug, $domain, $pId, $servername,$tokan);
                        $mail->Body = $email_body;
                        $mail->Send();
                        // Send SMS code.....
                        sendSMS($u_mobile, $sms_body);

                    }
                }else if($row['endDate'] == date("Y-m-d")){ 
                    
                    $sms_body = "Dear user, Your FinCRM subscription has expired. Please renew to continue using without any interruptions. Failing which your access will be blocked from tomorrow.
                        ".$url."";
                        $msg = "Your FinCRM subscription has expired. Please renew to continue using without any interruptions. Failing which your access will be blocked from tomorrow.";
                        $mail->Subject = "FinCRM has expired. Your account has been blocked.";
                        $email_body = $emailNotification->send_user_validity_email($msg, $userId, $conn, $requestType, $pSlug, $domain, $pId, $servername,$tokan);
                        $mail->Body = $email_body;
                        $mail->Send();
                        // Send SMS code.....
                        sendSMS($u_mobile, $sms_body);

                }else if($row['endDate'] < date("Y-m-d")){
                   
                       $remaningDays = $days->format("%d");

                        if($remaningDays == 1){

                         mysqli_query($conn, "UPDATE users SET domain_status = 'Blocked' WHERE u_id=".$row['u_id']);
                        }

                       if($remaningDays == 7){
                        
                        $sms_body = "Dear user, Your FinCRM subscription hasn't been renewed. If you wish to continue using FinCRM, please renew.
                        ".$url."";
                        $msg = "Your FinCRM subscription hasn't been renewed. If you wish to continue using FinCRM, please renew.";
                        $mail->Subject = "FinCRM has expired. Please renew for uninterrupted usage.";
                       $email_body = $emailNotification->send_user_validity_email($msg, $userId, $conn, $requestType, $pSlug, $domain, $pId, $servername,$tokan);
                        $mail->Body = $email_body;
                        $mail->Send();
                        // Send SMS code.....
                        sendSMS($u_mobile, $sms_body);
                    
                    }
                    
                    for($i=1 ; $i < 5; $i++){

                    if($remaningDays == 15*$i){
                        
                        $sms_body = "Dear user, Your FinCRM subscription hasn't been renewed. If you wish to continue using FinCRM, please renew.
                        ".$url."";
                        $msg = "Your FinCRM subscription hasn't been renewed. If you wish to continue using FinCRM, please renew.";
                        $mail->Subject = "FinCRM has expired. Please renew for uninterrupted usage.";
                        $email_body = $emailNotification->send_user_validity_email($msg, $userId, $conn, $requestType, $pSlug, $domain, $pId, $servername,$tokan);
                        $mail->Body = $email_body;
                        $mail->Send();
                        // Send SMS code.....
                        sendSMS($u_mobile, $sms_body);
                    
                    }
                    }

                }

            }    
        }else{

                if($row['endDate'] == date("Y-m-d")) {
                    $res = mysqli_query($conn, "UPDATE users SET rz_om_id=".$upcomming_plan_endDate['id']."WHERE id=".$upcomming_plan_endDate['u_id']);
                }    
        } 

   } 
	// echo $remaningDays;	