<?php

/*
* FORGOT PASSWORD CONTROLLER ON LOGIN PAGE
* NAME 	: forgotPasswordController.php
*/

session_start();
date_default_timezone_set("Asia/Kolkata");


/* DATABASE CONNECTION */
require_once($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
$dbConn = $conn;


/* INCLUDE COMMON HELPER FUNCTION */
require_once($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/custom_dashboard/commonHelper.php');


/* INCLUDE EMAIL TEMPLATE CLASS  */
require_once($_SERVER['DOCUMENT_ROOT'].'/task_cron/email_templates/EmailNotification.php');


/* TO SEND OTP */
function sendOtp( $dbConn = array(), $fUserName = "" ) {

	$response["status"] = "false";
	$response["msg"] 	= "Invalid Request!";
	$response["data"] 	= array();

	$emailData 			= array();

	// CREATE HELPER OBJECT
	$helper 	= new Helper();
	$uDetails 	= $helper->isValidUserName($fUserName);

	if( empty($uDetails["user_name"]) ) {
		$response["msg"] = "User id dosen't exist.";
		return $response;

	}else if( empty($uDetails["email"]) ) {
		$response["msg"] = "Email not registred with this user id.";
		return $response;

	}else{

		// INCLUDE FORGOT PASSWORD OTP EMAIL TEMPLATE
		$emailTemplatObj 	= new EmailNotification();

		// GENRATE OTP
		$emailData["otp"] 	= $otp = rand(1111,9999);
		$emailData["name"] 	= ucwords($uDetails["name"]);
		
		// SEND EMAIL HERE : OTP
		$emailSubject 	= 'OTP for FinCRM password reset.';
		$emailBody 		= $emailTemplatObj->forgotPasswordOtpTemplate($emailData);

		if( $helper->sendSmtpMail( $uDetails["email"], "", "", $emailSubject, $emailBody, "" ) ) {

			$response["status"] = "true";
			$response["msg"] 	= "OTP has been sent to your registered email id and phone no.";

			// CHECK ALREADY EXIST USER TOKEN
			$checkQuery 	= " SELECT * FROM custom_token WHERE userId = '".$uDetails["id"]."' LIMIT 1";
			$checkresult 	= mysqli_query( $dbConn, $checkQuery );

    		if( !empty($checkresult) ) {

    			$checkRow = mysqli_fetch_assoc( $checkresult );

    			if( !empty($checkRow['userId'] ) ) {

    				// UPDATE CUSTOM_TOKEN DATABASE TABLE
    				$checkUpdate = "UPDATE custom_token SET forgotPasswordOtp = '".$otp."', otpTimeStamp = '".strtotime(date("Y-m-d H:i:s"))."', updatedAt = '".date("Y-m-d H:i:s")."'  WHERE userId = '".$uDetails["id"]."' ";

    				if( !mysqli_query( $dbConn, $checkUpdate ) ) {
    					$response["status"] = "false";
    					$response["msg"] = "Oops! Something went wrong.";
						return $response;
    				}

    			}else{
    				
    				// INSERT CUSTOM_TOKEN DATABASE TABLE
    				$insertQuery = "INSERT INTO custom_token (userId, forgotPasswordOtp, otpTimeStamp)
    				VALUES ('".$uDetails["id"]."', '".$otp."', '".strtotime(date("Y-m-d H:i:s"))."' )";

    				if( !mysqli_query($dbConn, $insertQuery) ) {
    					$response["status"] = "false";
    					$response["msg"] = "Oops! Something went wrong.";
						return $response;
    				}
    			}

			}


			$uMobile = $helper->getUserPrimaryMobile($uDetails["id"]);
			if( !empty($uMobile["mobile"]) ) {

				$response["status"] = "true";
				$response["msg"] 	= "OTP has been sent to your registered email id and phone no.";
				

				// SEND SMS HERE : OTP
				$smsBody = $otp.' is your One Time Passowrd (OTP) for FinCRM password reset. Do not share this with anyone. Valid for three minute.';

				$smsDetails = $helper->sendSMS( $uMobile["mobile"] , $smsBody );

				if( !empty($smsDetails) ) {
					$response["msg"] = "OTP has been sent to your registered email id and phone no.";
				}
				
			}
			
			$response["data"] 	= array("id" => $uDetails["id"], "fEmail" => $uDetails["email"] );
			return $response;

		}else{
			$response["msg"] = "Oops! Something went wrong.";
			return $response;
		}
	}

	return $response;

}


/* TO VERIFY OTP */
function verifyOtp( $dbConn = array(), $fUserId = "", $fOtp = "" ) {

	$response["status"] = "false";
	$response["msg"] 	= "Invalid Request!";
	$response["data"] 	= array();

	/*if ( !filter_var($fOtp, FILTER_VALIDATE_INT) ) {
		$response["msg"] = "Please Enter 4 Digit OTP.";
		return $response;
	}*/

	// CREATE HELPER OBJECT
	$helper 	= new Helper();
	$uDetails 	= $helper->isAuthenticateUserById($fUserId);

	if ( empty( $uDetails["id"] ) ) {
		$response["msg"] = "Not authenticate user.";
		return $response;
	}

	// TO VERIFY TOKEN
	$customToken 	= $helper->getCustomToken($uDetails["id"]);
	// echo "<pre>";print_r($customToken);die;

	if( !empty($customToken["forgotPasswordOtp"]) && !empty($customToken["otpTimeStamp"])  ) {

		/*echo "<br>".date( "d-m-Y H:i:s", strtotime( "3 minutes", $customToken["otpTimeStamp"] ) );
		echo "<br>".date( "d-m-Y H:i:s", strtotime( date("Y-m-d H:i:s") ) );die;*/

		if( strtotime( date("Y-m-d H:i:s") ) > strtotime( "3 minutes", $customToken["otpTimeStamp"] ) ) {

			$response["msg"] = "OTP has expired.";
			return $response;

		}else{

			if( $customToken["forgotPasswordOtp"] == $fOtp ) {
				
				$checkUpdate = "UPDATE custom_token SET forgotPasswordOtp = NULL, otpTimeStamp = NULL, updatedAt = '".date("Y-m-d H:i:s")."'  WHERE userId = '".$uDetails["id"]."' ";

				if( mysqli_query( $dbConn, $checkUpdate ) ) {

					$response["status"] = "true";
					$response["msg"] 	= "OTP verify successfully.";
					return $response;

				}

			}else{

				$response["msg"] = "Incorrect OTP! Please retry.";
				return $response;
			}
		}

	}
	
	return $response;

}


/* TO RESET PASSWORD */
function resetPassword( $dbConn = array(), $fUserId = "", $fEmail = "", $fPassword = "", $fCnfPassword = "") {

	$response["status"] = "false";
	$response["msg"] 	= "Invalid Request!";
	$response["data"] 	= array();

	$emailData 			= array();

	if ( empty( $fPassword ) || ( $fPassword != $fCnfPassword ) ) {
		$response["msg"] = "Password & Confirm Password not match.";
		return $response;
	}

	// CREATE HELPER OBJECT
	$helper 	= new Helper();
	$uDetails 	= $helper->isAuthenticateUserById($fUserId);

	if ( empty( $uDetails["id"] ) ) {
		$response["msg"] = "Not authenticate user.";
		return $response;
	}

	$emailData["name"] 		= ucwords($uDetails["name"]);
	$emailData["user_name"] = $uDetails["user_name"];
	$emailData["password"] 	= $fPassword;

	// TO GENRATE USER HASH PASSWORD
	$updatePass = $helper->hashDomainPassword($fPassword);
	// echo "<pre>";print_r($updatePass);die;


	// TO UPDATE USER HASH PASSWORD AS NEW PASSWORD
	if( !empty($updatePass) ) {

		$userUpdate = " UPDATE user SET password = '".$updatePass."', modified_at = '".date("Y-m-d H:i:s")."' WHERE id = '".$uDetails["id"]."' AND user_name = '".$uDetails["user_name"]."' ";

		if( mysqli_query( $dbConn, $userUpdate ) ) {

			// INCLUDE RESET PASSWORD SUCCESSFULLy EMAIL TEMPLATE
			$emailTemplatObj 	= new EmailNotification();

			$emailSubject 	= 'FinCRM Password Reset Successfully.';
			$emailBody 		= $emailTemplatObj->forgotPasswordResetSuccessfullyTemplate($emailData);

			if( $helper->sendSmtpMail( $fEmail, "", "", $emailSubject, $emailBody, "" ) ) {

				$response["status"] = "true";
				$response["msg"] 	= "Password reset successfully.";
				return $response;
			}

		}else{

			$response["msg"] 	= "Oops! Something went wrong.";
			return $response;
		}

	}else{

		$response["msg"] 	= "Oops! Something went wrong.";
		return $response;
	}

	return $response;

}



/* GET AJAX VALUES */
$methodName 	= isset($_GET["methodName"]) ? $_GET["methodName"] : "" ;
$fEmail 		= isset($_GET["fEmail"]) ? $_GET["fEmail"] : "" ;
$fUserName 		= isset($_GET["fUserName"]) ? $_GET["fUserName"] : "" ;
$fUserId 		= isset($_GET["fUserId"]) ? $_GET["fUserId"] : "" ;
$fOtp 			= isset($_GET["fOtp"]) ? $_GET["fOtp"] : "" ;
$fPassword 		= isset($_GET["fPassword"]) ? $_GET["fPassword"] : "" ;
$fCnfPassword 	= isset($_GET["fCnfPassword"]) ? $_GET["fCnfPassword"] : "" ;


/* TO SEND OTP */
if( $methodName == "sendOtp" && !empty($fUserName) ) {
	
	$sendOtpResp = sendOtp( $dbConn, $fUserName );
	echo json_encode($sendOtpResp);return true;die;

}

/* TO VERIFY OTP */
if( $methodName == "verifyOtp" && !empty($fUserId) && !empty($fOtp) ) {

	$verifyOtpResp = verifyOtp( $dbConn, $fUserId, $fOtp );
	echo json_encode($verifyOtpResp);return true;die;

}

/* TO RESET PASSWORD */
if( $methodName == "resetPassword" && !empty($fUserId) && !empty($fPassword) && !empty($fCnfPassword) && !empty($fEmail) ) {

	$resetPasswordResp = resetPassword( $dbConn, $fUserId, $fEmail, $fPassword, $fCnfPassword );
	echo json_encode($resetPasswordResp);return true;die;

}
