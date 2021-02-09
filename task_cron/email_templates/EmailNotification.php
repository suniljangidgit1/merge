<?php

/* ALL INCLUDES FILES */
if($_SERVER["HTTP_HOST"] == 'fincrm.crm.com'){
	require_once($_SERVER['DOCUMENT_ROOT']."/task_cron/PHPMailer/src/PHPMailer.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/task_cron/PHPMailer/src/SMTP.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/task_cron/PHPMailer/src/Exception.php");
}
else {
	require_once("/var/www/html/crm.fincrm.net/crm/task_cron/PHPMailer/src/PHPMailer.php");
	require_once("/var/www/html/crm.fincrm.net/crm/task_cron/PHPMailer/src/SMTP.php");
	require_once("/var/www/html/crm.fincrm.net/crm/task_cron/PHPMailer/src/Exception.php");
}

// EMAIL
if (!defined("SMTPHOST")) { define('SMTPHOST', 'email-smtp.ap-south-1.amazonaws.com'); }
if (!defined("SMTPPORT")) { define('SMTPPORT', '587'); }
if (!defined("USERNAME")) { define('USERNAME', 'AKIAVKMGGRZRTZ57QKML'); }
if (!defined("PASSWORD")) { define('PASSWORD', 'BAql7y/engbX5VFuZBb4T7yJW/LXVsi+ql0lbaK5MY52'); }
if (!defined("FROMNAME")) { define('FROMNAME', 'FinCRM'); }
if (!defined("FROMMAIL")) { define('FROMMAIL', 'no-reply@fincrm.net'); }

class EmailNotification {
    
    function genrate_tokan(){          
		return $tokan  = md5( rand(111111, 999999)); 
	}

	function send_user_validity_email($msg = "", $userId = "", $conn = "", $requestType = "" , $pSlug = "", $domain="", $pId= "", $servername= "" ,$tokan= ""){
		
		$userId = base64_encode($userId);
		$domain = base64_encode($domain);
		$pSlug  = base64_encode($pSlug);
		
        if($servername == "localhost"){
          $server_name = "fincrm_web.com";
        }else{
           $server_name = "fincrm.net";
        }
        if($requestType=="free"){
                                   
            $button = '<tr>
                            <td style="text-align:center;">
                                <a class="btn btn-orange_upgrade" style="background-color: #fd7e14;color: #fff;border-color: #fd7e14;padding: 10px 12px;border-radius: 20px;font-size: 14px;font-weight: 500;text-decoration: none;" href="http://'.$server_name.'/upgrade-plan/'.$userId.'/'.$tokan.'">UPGRADE NOW</a>
                            </td>
                        </tr>';
        }else if($requestType == "razorpay"){
            $button = '<tr>
                            <td style="text-align:center;">
                                <a class="btn btn-orange_upgrade" style="background-color: #fd7e14;color: #fff;border-color: #fd7e14;padding: 10px 12px;border-radius: 20px;font-size: 14px;font-weight: 500;text-decoration: none;" href="http://'.$server_name.'/pre-payment/'.$domain.'/'.$pId.'/'.$pSlug.'/'.$tokan.'">Pay</a>
                            </td>
                       </tr>';
        }
		// echo "IN SEND USER VALIDITY EMAIL"; print_r($conn);
		$email_body = '<!DOCTYPE html>
	        <html>
	        <head>
	            <title></title>
	            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	            <meta name="viewport" content="width=device-width, initial-scale=1">
	            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	            <style type="text/css">
	                @media screen {
	                    @font-face {
	                        font-family: "Lato";
	                        font-style: normal;
	                        font-weight: 400;
	                        src: local("Lato Regular"), local("Lato-Regular"), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format("woff");
	                    }

	                    @font-face {
	                        font-family: "Lato";
	                        font-style: normal;
	                        font-weight: 700;
	                        src: local("Lato Bold"), local("Lato-Bold"), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format("woff");
	                    }

	                    @font-face {
	                        font-family: "Lato";
	                        font-style: italic;
	                        font-weight: 400;
	                        src: local("Lato Italic"), local("Lato-Italic"), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format("woff");
	                    }

	                    @font-face {
	                        font-family: "Lato";
	                        font-style: italic;
	                        font-weight: 700;
	                        src: local("Lato Bold Italic"), local("Lato-BoldItalic"), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format("woff");
	                    }
	                }

	                /* iOS BLUE LINKS */
	                a[x-apple-data-detectors] {
	                    color: inherit !important;
	                    text-decoration: none !important;
	                    font-size: inherit !important;
	                    font-family: inherit !important;
	                    font-weight: inherit !important;
	                    line-height: inherit !important;
	                }

	                /* ANDROID CENTER FIX */
	                div[style*="margin: 16px 0;"] {
	                    margin: 0 !important;
	                }
	            </style>
	        </head>

	        <body style="margin: 0 !important; padding: 0 !important;height: 100% !important;margin: 0 !important;padding: 0 !important;width: 100% !important;">
	            <!-- HIDDEN PREHEADER TEXT -->
	            <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family:"Roboto", sans-serif !important; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"></div>

	            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse !important;">
	                <!-- LOGO -->
	                <tr>
	                    <td bgcolor="#5F7AEA" align="center" style="">
	                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;border-collapse: collapse !important;">
	                            <tr>
	                                <td bgcolor="#5F7AEA" align="center" style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: "Roboto", sans-serif !important; font-size: 18px; font-weight: 400; line-height: 25px;">
	                                    
	                                </td>
	                            </tr>
	                        </table>
	                    </td>
	                </tr>
	                <tr>
	                    <td bgcolor="#5F7AEA" align="center" style="padding: 0px 10px 0px 10px;">
	                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;border-collapse: collapse !important;">
	                            <tr>
	                                <td bgcolor="#ffffff" align="left" style="color: #000000; padding:45px 80px 50px 80px; font-size: 14px; font-weight: 400; line-height: 20px;text-align: center;border-radius: 30px;">
	                                    
	                                    <!-- <h4 style="font-size:18px; font-weight: 500; color:#2C2C2C;margin: 2;text-align: center;">Hi <?php //echo str_replace("-", " ", $_GET["name"]); ?>NAME,</h4> -->
	                                    
	                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse !important;">
	                                        <tr>
	                                            <td style="text-align:center;">
	                                                <a href="#"><img src="http://www.fincrm.net/assets/emailTemplate/LOGO.svg" width="40%" height="100%" style=" border: 0;height: auto;line-height: 100%;outline: none;text-decoration: none;" /></a>
	                                            </td>
	                                        </tr>
	                                        <tr>
	                                            <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 30px 30px;border-radius: 0px 0px 30px 30px;">
	                                                <table border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse !important;">
	                                                    <tr>
	                                                        <td colspan="2">
	                                                            <p style="font-family: "Lato";size: 20px;">Dear user, </p><p style="font-family: "Lato";size: 20px;">'.$msg.'</p>
	                                                        </td>
	                                                    </tr>
	                                                    
	                                                </table>
	                                            </td>
	                                        </tr>
	                                       '.$button.'

	                                    </table>
	                                    
	                                </td>
	                            </tr>
	                        </table>
	                    </td>
	                </tr>
	                <tr>
	                    <td bgcolor="#5F7AEA" align="center" style="padding: 30px 10px 0px 10px;">
	                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;border-collapse: collapse !important;">
	                            <tr>
	                                <td bgcolor="#5F7AEA" align="center" style="padding: 15px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: "Roboto", sans-serif !important; font-size: 18px; font-weight: 400; line-height: 25px;">
	                                    <a href="http://facebook.com/fincrmofficial"><img src="http://www.fincrm.net/assets/emailTemplate/facebook.svg" width="30" height="30" style="display: inline-block;     margin-right: 10px; border: 0px;border: 0;height: auto;line-height: 100%;outline: none;text-decoration: none;" /></a>
	                                    <a href="https://www.linkedin.com/company/35877262"><img src="http://www.fincrm.net/assets/emailTemplate/linkedin.svg" width="30" height="30" style="display: inline-block;    margin-right: 10px;  border: 0px;border: 0;height: auto;line-height: 100%;outline: none;text-decoration: none;" /></a>
	                                    <a href="https://twitter.com/fincrmofficial"><img src="http://www.fincrm.net/assets/emailTemplate/Twitter.svg" width="30" height="30" style="display: inline-block; border: 0px;border: 0;height: auto;line-height: 100%;outline: none;text-decoration: none;" /></a>
	                                    <a href="http://fincrm.net/" style="text-decoration: none;color: #ffffff;font-size: 16px;display: block;margin-top: 10px;">www.fincrm.net</a>
	                                    <ul style="list-style: none"></ul>
	                                </td>
	                            </tr>
	                        </table>
	                    </td>
	                </tr>
	            </table>
	        </body>

	        </html>
	        ';
	        // echo "USER ID = ". $userId."     ". $tokan; die; 
	        $res = mysqli_query($conn, "SELECT * FROM users_token WHERE uId=".base64_decode($userId));
	        $row = mysqli_fetch_assoc($res);
	        if($row['uId']==0){

	        	mysqli_query($conn, "INSERT INTO users_token (`uId`, `upgrade_token`) VALUES (".base64_decode($userId).", '$tokan')");
	        }else{
	        	mysqli_query($conn, "UPDATE users_token SET upgrade_token='$tokan' WHERE uId=".base64_decode($userId));
	        }

	        // echo 
	        return $email_body;
	
	}

	function check_is_more_plan($u_id = "", $domain = "", $rz_om_id = "", $conn = ""){
		
		$res = mysqli_query($conn, "SELECT rz.id, rz.endDate, u.u_id FROM users as u RIGHT JOIN rz_order_master as rz ON u.u_id = rz.uId WHERE u.u_status = 'Active' AND u.domain_status = 'Active' AND rz.id!=".$rz_om_id." AND rz.rzStatus='Paid' AND u.u_id=".$u_id." AND rz.id > u.rz_om_id ORDER By rz.id ASC LIMIT 1");

		$row = mysqli_fetch_assoc($res);
		if(!$row){
			return 0;
		}else{
			return $row;		
		}	
		
	} 

	/*
	* To send CRM forgot password OTP email template
	*/
	public function forgotPasswordOtpTemplate( $emailData = array() ){

		$emailBody = '<!DOCTYPE html>
				<html>
					<head>
				        <title></title>
				        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				        <meta name="viewport" content="width=device-width, initial-scale=1">
				        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
				        <style type="text/css">
				            @media screen {
				                @font-face {
				                    font-family: "Lato";
				                    font-style: normal;
				                    font-weight: 400;
				                    src: local("Lato Regular"), local("Lato-Regular"), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format("woff");
				                }

				                @font-face {
				                    font-family: "Lato";
				                    font-style: normal;
				                    font-weight: 700;
				                    src: local("Lato Bold"), local("Lato-Bold"), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format("woff");
				                }

				                @font-face {
				                    font-family: "Lato";
				                    font-style: italic;
				                    font-weight: 400;
				                    src: local("Lato Italic"), local("Lato-Italic"), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format("woff");
				                }

				                @font-face {
				                    font-family: "Lato";
				                    font-style: italic;
				                    font-weight: 700;
				                    src: local("Lato Bold Italic"), local("Lato-BoldItalic"), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format("woff");
				                }
				            }

				            /* iOS BLUE LINKS */
				            a[x-apple-data-detectors] {
				                color: inherit !important;
				                text-decoration: none !important;
				                font-size: inherit !important;
				                font-family: inherit !important;
				                font-weight: inherit !important;
				                line-height: inherit !important;
				            }

				            /* ANDROID CENTER FIX */
				            div[style*="margin: 16px 0;"] {
				                margin: 0 !important;
				            }
				        </style>
				    </head>

				    <body style="margin: 0 !important; padding: 0 !important;height: 100% !important;margin: 0 !important;padding: 0 !important;width: 100% !important;">
				        
				        <!-- HIDDEN PREHEADER TEXT -->
				        <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family:"Roboto", sans-serif !important; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"></div>

				        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse !important;">
				            
				            <!-- LOGO -->
				            <tr>
				                <td bgcolor="#5F7AEA" align="center" style="">
				                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;border-collapse: collapse !important;">
				                        <tr>
				                            <td bgcolor="#5F7AEA" align="center" style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: "Roboto", sans-serif !important; font-size: 18px; font-weight: 400; line-height: 25px;">
				                                
				                            </td>
				                        </tr>
				                    </table>
				                </td>
				            </tr>
				            <tr>
				                <td bgcolor="#5F7AEA" align="center" style="padding: 0px 10px 0px 10px;">
				                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;border-collapse: collapse !important;">
				                        <tr>
				                            <td bgcolor="#ffffff" align="left" style="color: #000000; padding:45px 80px 50px 80px; font-size: 14px; font-weight: 400; line-height: 20px;text-align: center;border-radius: 30px;">
				                                
				                                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse !important;">
				                                    <tr>
				                                        <td style="text-align:center;">
				                                            <a href="#"><img src="http://www.fincrm.net/assets/emailTemplate/LOGO.png" width="40%" height="100%" style=" border: 0;height: auto;line-height: 100%;outline: none;text-decoration: none;" /></a>
				                                        </td>
				                                    </tr>
				                                    <tr>
				                                        <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 30px 30px;border-radius: 0px 0px 30px 30px;">
				                                            <table border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse !important;">
				                                                <tr>
				                                                    <td colspan="2">
				                                                        <p style="font-family: "Lato";size: 20px;"><br>Dear '.$emailData["name"].', </p><p style="font-family: "Lato";size: 20px;">'.$emailData["otp"].' is your One Time Passowrd (OTP) for FinCRM password reset. Do not share this with anyone. Valid for three minute.</p>
				                                                    </td>
				                                                </tr>
				                                                
				                                            </table>
				                                        </td>
				                                    </tr>
				                                </table>
				                                
				                            </td>
				                        </tr>
				                    </table>
				                </td>
				            </tr>
				            <tr>
				                <td bgcolor="#5F7AEA" align="center" style="padding: 30px 10px 0px 10px;">
				                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;border-collapse: collapse !important;">
				                        <tr>
				                            <td bgcolor="#5F7AEA" align="center" style="padding: 15px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: "Roboto", sans-serif !important; font-size: 18px; font-weight: 400; line-height: 25px;">
				                                <a href="http://facebook.com/fincrmofficial"><img src="http://www.fincrm.net/assets/emailTemplate/facebook.png" width="30" height="30" style="display: inline-block;     margin-right: 10px; border: 0px;border: 0;height: auto;line-height: 100%;outline: none;text-decoration: none;" /></a>
				                                <a href="https://www.linkedin.com/company/35877262"><img src="http://www.fincrm.net/assets/emailTemplate/linkedin.png" width="30" height="30" style="display: inline-block;    margin-right: 10px;  border: 0px;border: 0;height: auto;line-height: 100%;outline: none;text-decoration: none;" /></a>
				                                <a href="https://twitter.com/fincrmofficial"><img src="http://www.fincrm.net/assets/emailTemplate/Twitter.png" width="30" height="30" style="display: inline-block; border: 0px;border: 0;height: auto;line-height: 100%;outline: none;text-decoration: none;" /></a>
				                                <a href="http://fincrm.net/" style="text-decoration: none;color: #ffffff;font-size: 16px;display: block;margin-top: 10px;">www.fincrm.net</a>
				                                <ul style="list-style: none"></ul>
				                            </td>
				                        </tr>
				                    </table>
				                </td>
				            </tr>
				        </table>
				    </body>

				</html>';


		// echo "<pre>";print_r($emailBody);die;
		return $emailBody;

	}

	/*
	* To send CRM forgot password reset successfully email template
	*/
	public function forgotPasswordResetSuccessfullyTemplate( $emailData = array() ){

		$emailBody = '<!DOCTYPE html>
				<html>
					<head>
				        <title></title>
				        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				        <meta name="viewport" content="width=device-width, initial-scale=1">
				        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
				        <style type="text/css">
				            @media screen {
				                @font-face {
				                    font-family: "Lato";
				                    font-style: normal;
				                    font-weight: 400;
				                    src: local("Lato Regular"), local("Lato-Regular"), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format("woff");
				                }

				                @font-face {
				                    font-family: "Lato";
				                    font-style: normal;
				                    font-weight: 700;
				                    src: local("Lato Bold"), local("Lato-Bold"), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format("woff");
				                }

				                @font-face {
				                    font-family: "Lato";
				                    font-style: italic;
				                    font-weight: 400;
				                    src: local("Lato Italic"), local("Lato-Italic"), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format("woff");
				                }

				                @font-face {
				                    font-family: "Lato";
				                    font-style: italic;
				                    font-weight: 700;
				                    src: local("Lato Bold Italic"), local("Lato-BoldItalic"), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format("woff");
				                }
				            }

				            /* iOS BLUE LINKS */
				            a[x-apple-data-detectors] {
				                color: inherit !important;
				                text-decoration: none !important;
				                font-size: inherit !important;
				                font-family: inherit !important;
				                font-weight: inherit !important;
				                line-height: inherit !important;
				            }

				            /* ANDROID CENTER FIX */
				            div[style*="margin: 16px 0;"] {
				                margin: 0 !important;
				            }
				        </style>
				    </head>

				    <body style="margin: 0 !important; padding: 0 !important;height: 100% !important;margin: 0 !important;padding: 0 !important;width: 100% !important;">
				        
				        <!-- HIDDEN PREHEADER TEXT -->
				        <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family:"Roboto", sans-serif !important; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"></div>

				        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse !important;">
				            
				            <!-- LOGO -->
				            <tr>
				                <td bgcolor="#5F7AEA" align="center" style="">
				                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;border-collapse: collapse !important;">
				                        <tr>
				                            <td bgcolor="#5F7AEA" align="center" style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: "Roboto", sans-serif !important; font-size: 18px; font-weight: 400; line-height: 25px;">
				                                
				                            </td>
				                        </tr>
				                    </table>
				                </td>
				            </tr>
				            <tr>
				                <td bgcolor="#5F7AEA" align="center" style="padding: 0px 10px 0px 10px;">
				                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;border-collapse: collapse !important;">
				                        <tr>
				                            <td bgcolor="#ffffff" align="left" style="color: #000000; padding:45px 80px 50px 80px; font-size: 14px; font-weight: 400; line-height: 20px;text-align: center;border-radius: 30px;">
				                                
				                                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse !important;">
				                                    <tr>
				                                        <td style="text-align:center;">
				                                            <a href="#"><img src="http://www.fincrm.net/assets/emailTemplate/LOGO.png" width="40%" height="100%" style=" border: 0;height: auto;line-height: 100%;outline: none;text-decoration: none;" /></a>
				                                        </td>
				                                    </tr>
				                                    <tr>
				                                        <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 30px 30px;border-radius: 0px 0px 30px 30px;">
				                                            <table border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse !important;">
				                                                <tr>
				                                                    <td colspan="2">
				                                                        <p style="font-family: "Lato";size: 20px;"><br>Dear '.$emailData["name"].', </p><p style="font-family: "Lato";size: 20px;">Your FinCRM password has been reset successfully. These are your new details:</p>
				                                                        <p>User Id:'.$emailData["user_name"].'
				                                                        <br>Password:'.$emailData["password"].'</p>
				                                                    </td>
				                                                </tr>
				                                                
				                                            </table>
				                                        </td>
				                                    </tr>
				                                </table>
				                                
				                            </td>
				                        </tr>
				                    </table>
				                </td>
				            </tr>
				            <tr>
				                <td bgcolor="#5F7AEA" align="center" style="padding: 30px 10px 0px 10px;">
				                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;border-collapse: collapse !important;">
				                        <tr>
				                            <td bgcolor="#5F7AEA" align="center" style="padding: 15px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: "Roboto", sans-serif !important; font-size: 18px; font-weight: 400; line-height: 25px;">
				                                <a href="http://facebook.com/fincrmofficial"><img src="http://www.fincrm.net/assets/emailTemplate/facebook.png" width="30" height="30" style="display: inline-block;     margin-right: 10px; border: 0px;border: 0;height: auto;line-height: 100%;outline: none;text-decoration: none;" /></a>
				                                <a href="https://www.linkedin.com/company/35877262"><img src="http://www.fincrm.net/assets/emailTemplate/linkedin.png" width="30" height="30" style="display: inline-block;    margin-right: 10px;  border: 0px;border: 0;height: auto;line-height: 100%;outline: none;text-decoration: none;" /></a>
				                                <a href="https://twitter.com/fincrmofficial"><img src="http://www.fincrm.net/assets/emailTemplate/Twitter.png" width="30" height="30" style="display: inline-block; border: 0px;border: 0;height: auto;line-height: 100%;outline: none;text-decoration: none;" /></a>
				                                <a href="http://fincrm.net/" style="text-decoration: none;color: #ffffff;font-size: 16px;display: block;margin-top: 10px;">www.fincrm.net</a>
				                                <ul style="list-style: none"></ul>
				                            </td>
				                        </tr>
				                    </table>
				                </td>
				            </tr>
				        </table>
				    </body>

				</html>';


		// echo "<pre>";print_r($emailBody);die;
		return $emailBody;

	}

	/*
	* SEND MAIL
	* @parm 		- (array) 	$sendTo
	* @parm 		- (string) 	$mailBody
	* @parm 		- (string) 	$mailSubject
	* @parm         - (array)   $sendCc
	* @parm         - (array)   $mailAttachment
	* @return 		- (boolean) $result
	*/
	function sendEmail($sendTo = array(), $mailBody = "", $mailSubject = "", $sendCc = array(), $mailAttachment = array()) {

		$mail = new PHPMailer\PHPMailer\PHPMailer();
		$mail->IsSMTP(); // enable SMTP
		$mail->SMTPAuth = true; // authentication enabled
		$mail->SMTPSecure = ''; // secure transfer enabled REQUIRED for Gmail
		$mail->Host = SMTPHOST;
		$mail->Port = SMTPPORT; // or 587
		$mail->IsHTML(true);
		$mail->AllowEmpty = true;
		$mail->Username = USERNAME;
		$mail->Password = PASSWORD;
		$mail->SetFrom(FROMMAIL, FROMNAME);
		
		//send mail
		if(!empty($sendTo)) {
			foreach ($sendTo as $key => $value) {
				$mail->AddAddress($value);
			}
		}

		//send cc
		if(!empty($sendCc)) {
			foreach($sendCc as $keyForcc => $valueForcc){
				$mail->AddCC($valueForcc);
			}
		}

		$mail->Subject 	= $mailSubject;
		$mail->Body 	= $mailBody;

		//add attachment
		if(!empty($mailAttachment)) {
			foreach($mailAttachment as $keyForcc => $valueForcc){
				$mail->addAttachment($valueForcc);
			}
		}
		
		//send mail
		if ($mail->Send()) {
		  return true;
		} else {
			echo 'Mailer Error: ' . $mail->ErrorInfo;die;
			return false;
		}
	}


	function sendEmail_estimate_invoice($sendTo = array(), $mailBody = "", $mailSubject = "", $sendCc = array(), $mailAttachment = array(), $sendFromName='', $sendFromMail='') {

		$mail = new PHPMailer\PHPMailer\PHPMailer();
		$mail->IsSMTP(); // enable SMTP
		$mail->SMTPAuth = true; // authentication enabled
		$mail->SMTPSecure = ''; // secure transfer enabled REQUIRED for Gmail
		$mail->Host = SMTPHOST;
		$mail->Port = SMTPPORT; // or 587
		$mail->IsHTML(true);
		$mail->Username = USERNAME;
		$mail->Password = PASSWORD;
		$mail->SetFrom(FROMMAIL, FROMNAME);

		//send mail
		if(!empty($sendTo)) {
			foreach ($sendTo as $key => $value) {
				$mail->AddAddress($value);
			}
		}

		//send cc
		if(!empty($sendCc)) {
			foreach($sendCc as $keyForcc => $valueForcc){
				$mail->AddCC($valueForcc);
			}
		}

		// $mail->rfcDate();

		$mail->Subject 	= $mailSubject;
		$mail->Body 	= $mailBody;

		//add attachment
		if(!empty($mailAttachment)) {
			foreach($mailAttachment as $keyForcc => $valueForcc){
				$mail->addAttachment($valueForcc);
			}
		}

		//From email address and name
		$mail->From = "no-reply@fincrm.net";
		$mail->FromName = $sendFromName;

		//Address to which recipient will reply
		$mail->addReplyTo($sendFromMail);
		
		//send mail
		if ($mail->Send()) {
		  return true;
		} else {
			return false;
		}
	}


}
