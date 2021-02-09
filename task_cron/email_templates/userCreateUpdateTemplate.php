<?php

/* ALL INCLUDES FILES */
/*require_once($_SERVER['DOCUMENT_ROOT']."/task_cron/PHPMailer/src/PHPMailer.php");
require_once($_SERVER['DOCUMENT_ROOT']."/task_cron/PHPMailer/src/SMTP.php");
require_once($_SERVER['DOCUMENT_ROOT']."/task_cron/PHPMailer/src/Exception.php");

// EMAIL
define('SMTPHOST', 'email-smtp.ap-south-1.amazonaws.com');
define('SMTPPORT', '587');
define('USERNAME', 'AKIAVKMGGRZRTZ57QKML');
define('PASSWORD', 'BAql7y/engbX5VFuZBb4T7yJW/LXVsi+ql0lbaK5MY52');
define('FROMNAME', 'FinCRM');
define('FROMMAIL', 'no-reply@fincrm.net');*/

if (!defined("SMTPHOST")) { define('SMTPHOST', 'email-smtp.ap-south-1.amazonaws.com'); }
if (!defined("SMTPPORT")) { define('SMTPPORT', '587'); }
if (!defined("USERNAME")) { define('USERNAME', 'AKIAVKMGGRZRTZ57QKML'); }
if (!defined("PASSWORD")) { define('PASSWORD', 'BAql7y/engbX5VFuZBb4T7yJW/LXVsi+ql0lbaK5MY52'); }
if (!defined("FROMNAME")) { define('FROMNAME', 'FinCRM'); }
if (!defined("FROMMAIL")) { define('FROMMAIL', 'no-reply@fincrm.net'); }

require_once("EmailNotification.php");

$emailData["name"] = $emailData["firstName"]." ".$emailData["lastName"];

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
	                                                        <p style="font-family: "Lato";size: 20px;"><br>Dear '.$emailData["name"].', </p><p style="font-family: "Lato";size: 20px;">'.$emailData["emailBody"].'</p>
	                                                        <p>Login URL : '.$emailData["siteUrl"].'<br>User Id : '.$emailData["userName"].'
	                                                        <br>Password : '.$emailData["password"].'</p>
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

$phpMailerObj 	= new PHPMailer\PHPMailer\PHPMailer();

$phpMailerObj->IsSMTP();
$phpMailerObj->IsHTML(true);
// $phpMailerObj->SMTPDebug = 1;
$phpMailerObj->SMTPAuth 	= true;
$phpMailerObj->SMTPSecure 	= 'tls';
$phpMailerObj->Host 		= SMTPHOST;
$phpMailerObj->Port 		= SMTPPORT;
$phpMailerObj->Username 	= USERNAME;
$phpMailerObj->Password 	= PASSWORD;
$phpMailerObj->Subject 		= $emailData["emailSubject"];
$phpMailerObj->Body 		= $emailBody;
$phpMailerObj->setFrom( FROMMAIL, FROMNAME );
$phpMailerObj->AddAddress($emailData["emailAddress"]);

if( !empty($emailData["emailCc"]) ) {
	$phpMailerObj->AddCC($emailData["emailCc"]);
}

if( !empty($emailData["emailBcc"]) ) {
	$phpMailerObj->addBCC($emailData["emailBcc"]);
}

if( !empty($attachment) ) {
	$phpMailerObj->AddAttachment($attachment); // Full FILE PATHH HERE
}

if( $phpMailerObj->Send() ) {
	return true;
}
return true;
