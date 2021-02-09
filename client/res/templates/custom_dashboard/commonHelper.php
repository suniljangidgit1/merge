<?php

/*
* COMMON HELPER
* THIS IS COMMON HELPER FOR COMMON FUNCTIONS
* NAME 	: commonHelper.php 
*/


/* ALL INCLUDES FILES */
require_once($_SERVER['DOCUMENT_ROOT']."/task_cron/PHPMailer/src/PHPMailer.php");
require_once($_SERVER['DOCUMENT_ROOT']."/task_cron/PHPMailer/src/SMTP.php");
require_once($_SERVER['DOCUMENT_ROOT']."/task_cron/PHPMailer/src/Exception.php");

// SMS
define('SENDFROM', 'FinCRM');
define('SMSAPIKEY', 'AD0snYOeimnTrBOU'); // OTP SMS KEY

// EMAIL
define('SMTPHOST', 'email-smtp.ap-south-1.amazonaws.com');
define('SMTPPORT', '587');
define('USERNAME', 'AKIAVKMGGRZRTZ57QKML');
define('PASSWORD', 'BAql7y/engbX5VFuZBb4T7yJW/LXVsi+ql0lbaK5MY52');
define('FROMNAME', 'FinCRM');
define('FROMMAIL', 'no-reply@fincrm.net');

class Helper {
  

	/*
	* Constructor - called once class immediately after class call
	* @parm 	= (string) $username
	* @return 	= (array) $id
	*/
	public function __construct(){
			    
		// Database connection file include
		require('dbConfig.php');
		$this->dbConn = $dbConn;

		

  	}


	/*
	* To get user id by username
	* @parm 	= (string) $username
	* @return 	= (array) $id
	*/
	public function getUserIdByUsername( $username="" ){

		$id 	= NULL;
       	if( !empty($username) ){
			
			$query 		= "SELECT u.id FROM user as u WHERE u.user_name = '".$username."' ";
			$result 	= mysqli_query( $this->dbConn, $query);

			if( !empty($result) ){
	    	
	    		$userDetails 	= mysqli_fetch_assoc($result);
	    		
	    		if( !empty( $userDetails["id"] ) ){
					$id = $userDetails["id"];
				}
			}
       	}

        return $id;
	}




	/*
	* To check whether user is super admin, admin, parent user or child user
	* @parm 	= (string) $id
	* @return 	= (string) $userRole
	*/
	public function getUserRole( $id="" ){
		
		$userRole 	= NULL;

		$query 		= "SELECT u.id, u.is_super_admin, u.is_admin, u.user_parent_id FROM user as u WHERE u.id = '".$id."' ";
		$result 	= mysqli_query( $this->dbConn, $query);
		
		if( !empty($result) ){
	    	
	    	$userDetails = mysqli_fetch_assoc($result);
        	
			if( $userDetails['is_super_admin'] == "1" ){
				$userRole = "super_admin";
			}else if( $userDetails['is_super_admin'] == "0" && $userDetails['is_admin'] == "1" ) {
				$userRole = "admin";
			}else {
				$userRole = "user";
			}
		}

        return $userRole;
	}


	/*
	* To get team list
	* @parm 	= mone
	* @return 	= (array) $teamList
	*/
	public function getTeamList(){
	
		$teamList = array();

		$query 		= "SELECT t.id, t.name FROM team as t WHERE t.deleted = '0' ORDER BY t.name ASC ";
		$result 	= mysqli_query( $this->dbConn, $query);
		
		if( !empty($result) ) {
	    	
	    	while( $row = mysqli_fetch_assoc($result) ) {
		        $teamList[] = $row;
		    }
		}

        return $teamList;
	}



	/*
	* To get users list
	* @parm 	= (string) $parentId
	* @return 	= (array) $userList
	*/
	public function getUserList( $parentId = "" ){
		
		$userList 	= array();
		$where 		= "";

		if( !empty($parentId) ){
			$where 	= " AND ( u.id = '$parentId' OR u.user_parent_id = '$parentId' ) ";
		}

		$query 		= "SELECT u.id, CONCAT( u.first_name, ' ', u.last_name) as name FROM user as u WHERE u.deleted = '0' AND is_active = '1' AND u.is_portal_user = '0' AND u.id != 'system' $where ORDER BY u.first_name, u.last_name ASC";
		$result 	= mysqli_query( $this->dbConn, $query);

		if( !empty($result) ) {
	    	
	    	while( $row = mysqli_fetch_assoc($result) ) {
		        $userList[] = $row;
		    }
		}

        return $userList;
	}



	/*
	* To sort multidimenssional array by key
	* @parm 	= (array) $array
	* @parm 	= (string) $on
	* @parm 	= (string) $order
	* @return 	= (array) $userList
	*/
	public function array_sort($array, $on, $order=SORT_ASC){

	    $new_array = array();
	    $sortable_array = array();

	    if (count($array) > 0) {
	        foreach ($array as $k => $v) {
	            if (is_array($v)) {
	                foreach ($v as $k2 => $v2) {
	                    if ($k2 == $on) {
	                        $sortable_array[$k] = $v2;
	                    }
	                }
	            } else {
	                $sortable_array[$k] = $v;
	            }
	        }

	        switch ($order) {
	            case SORT_ASC:
	                asort($sortable_array);
	                break;
	            case SORT_DESC:
	                arsort($sortable_array);
	                break;
	        }

	        foreach ($sortable_array as $k => $v) {
	            $new_array[$k] = $array[$k];
	        }
	    }

	    return $new_array;

	}



	/*
	* To check username valid or not = to get primary email
	* @parm 	= (string) $username
	* @return 	= (array) $result
	*/
	public function isValidEmail( $email = "" ){
		
		$result = array();

		if( !empty($email) ){

			$query 	= " SELECT u.id, u.user_name, CONCAT( u.first_name, ' ', u.last_name ) as name, ea.lower as email FROM user AS u INNER JOIN entity_email_address AS eea ON u.id = eea.entity_id AND eea.primary = '1' INNER JOIN email_address AS ea ON eea.email_address_id = ea.id WHERE ea.lower = '$email' AND u.deleted = '0' LIMIT 1 ";
			$result = mysqli_query( $this->dbConn, $query);

			if( !empty($result) ) {
	    		$userDetails 	= mysqli_fetch_assoc($result);
		    	return $userDetails;
			}

		}

        return $result;
	}



	/*
	* To get user primary mobile number
	* @parm 	= (string) $uId
	* @return 	= (array) $result
	*/
	public function getUserPrimaryMobile( $uId = "" ){
		
		$result = array();

		if( !empty($uId) ){

			$query 	= " SELECT u.id, u.user_name, CONCAT( u.first_name, ' ', u.last_name ) as name, pn.name as mobile FROM user AS u INNER JOIN entity_phone_number AS epn ON u.id = epn.entity_id AND epn.primary = '1' INNER JOIN phone_number AS pn ON epn.phone_number_id = pn.id WHERE u.id = '$uId' LIMIT 1";
			$result = mysqli_query( $this->dbConn, $query);
			if( !empty($result) ) {
	    		$userDetails 	= mysqli_fetch_assoc($result);
		    	return $userDetails;
			}

		}

        return $result;
	}



	/*
	* To send sms otp
	* @parm 	= (string) $mobileNo
	* @parm 	= (string) $smsBody
	* @return 	= (array) $result
	*/
	public function sendSMS( $mobileNo = "", $smsBody = "" ) {

		if( !empty($mobileNo) && !empty($mobileNo) ) {

	        $api_key    = SMSAPIKEY;
	        $from       = SENDFROM;
	        $smsBody 	= rtrim($smsBody,".")." - FinCRM.";
	        $smsBody    = urlencode($smsBody);

	        $ch         = curl_init();
	        curl_setopt($ch,CURLOPT_URL, "https://msg.mtalkz.com/V2/http-api.php");
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	        curl_setopt($ch, CURLOPT_POST, 1);
	        curl_setopt($ch, CURLOPT_POSTFIELDS, "apikey=".$api_key."&senderid=".$from."&number=".$mobileNo."&message=".$smsBody."&format=json");
	        $response   =    curl_exec($ch);
	        // $response   =    json_decode($response);
	        // $messageId  =    $response->data[0]->id;

	        curl_close($ch);
	        return $response;
		}

		return false;
    }



    /*
	* SEND MAIL
	* @parm 		- (string) 	$to
	* @parm 		- (string) 	$cc
	* @parm 		- (string) 	$bcc
	* @parm 		- (string) 	$subject
	* @parm 		- (string) 	$body
	* @parm         - (string)  $attachment
	* @return 		- (bool) True/False
	*/
	public function sendSmtpMail( $to = "", $cc = "", $bcc = "", $subject = "", $body = "", $attachment = "" ) {	
	    
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
		$phpMailerObj->Subject 		= $subject;
		$phpMailerObj->Body 		= $body;
		$phpMailerObj->setFrom( FROMMAIL, FROMNAME );
		$phpMailerObj->AddAddress($to);

		if( !empty($cc) ) {
			$phpMailerObj->AddCC($cc);
		}

		if( !empty($bcc) ) {
			$phpMailerObj->addBCC($bcc);
		}

		if( !empty($attachment) ) {
			$phpMailerObj->AddAttachment($attachment); // Full FILE PATHH HERE
		}

		if( $phpMailerObj->Send() ) {
			return true;
		}

		return false;

	}



	/*
	* To check authenticate user or not
	* @parm 	= (string) $userId
	* @return 	= (array) $result
	*/
	public function isAuthenticateUserById( $userId = "" ){
		
		$result = array();

		if( !empty($userId) ){

			$query 	= " SELECT u.id, u.user_name, CONCAT( u.first_name, ' ', u.last_name ) as name FROM user AS u WHERE u.id = '$userId' LIMIT 1 ";
			$result = mysqli_query( $this->dbConn, $query);

			if( !empty($result) ) {
	    		$userDetails 	= mysqli_fetch_assoc($result);
		    	return $userDetails;
			}

		}

        return $result;
	}



	/*
	* To get user custom tokens
	* @parm 	= (string) $userId
	* @return 	= (array) $result
	*/
	public function getCustomToken( $userId = "" ){
		
		$result = array();

		if( !empty($userId) ){

			$query 	= " SELECT * FROM custom_token WHERE userId = '".$userId."' LIMIT 1 ";
			$result = mysqli_query( $this->dbConn, $query);

			if( !empty($result) ) {
	    		$customToken 	= mysqli_fetch_assoc($result);
		    	return $customToken;
			}

		}

        return $result;
	}



	/*
	* To get domain password salt
	* @parm 	= (none) 
	* @return 	= (string) $salt
	*/
	public function getDomainSalt(){
	 	
	    $salt = "";
	    $domainDetails 	= $_SERVER['HTTP_HOST'];
	    $domainName 	= explode(".", $domainDetails);
	    
	    if($domainName[0] == 'crm'){
	   		$domainName[0] = 'fincrm';
	    }
	    $defaultPath 	= require_once($_SERVER["DOCUMENT_ROOT"]."/data/".$domainName[0]."_config.php");

	    if( !empty($defaultPath["passwordSalt"]) ){
			$salt = $defaultPath["passwordSalt"];
		}

		$salt = $this->normalizeDomainSalt($salt);

		return $salt;

	}



	/*
	* To get normalize domain password salt
	* @parm 	= (none) 
	* @return 	= (string) $salt
	*/
	public function normalizeDomainSalt($salt){

	    return str_replace("{0}", $salt, '$6${0}$');

	}



	/*
	* To get password hash : genrate user password
	* @parm 	= (string) $password 
	* @parm 	= (bool) $useMd5 
	* @return 	= (string) $hash
	*/
	public function hashDomainPassword($password, $useMd5 = true){

	    $salt = $this->getDomainSalt();

	    if ($useMd5) { 
	    	$password = md5($password); 
	    }
	    
	    $hash = crypt($password, $salt);
	    $hash = str_replace($salt, '', $hash);

	    return $hash;

	}


	
	/*
	* To get user access entity access by user role table
	* @parm 	= (string) $uId
	* @return 	= (array) $result
	*/
	public function checkUserEntityAccess( $uId = "" ){

       	if( !empty($uId) ){
			
			$query 		= " SELECT u.id, ru.id, r.data FROM user AS u INNER JOIN role_user as ru ON u.id = ru.user_id INNER JOIN role as r ON ru.role_id = r.id WHERE u.id = '".$uId."' ";

			$result 	= mysqli_query( $this->dbConn, $query);

			if( !empty($result) ){
	    	
	    		$userRoleData = mysqli_fetch_assoc($result);
	    		
	    		if( !empty( $userRoleData["data"] ) ){
					return $userRoleData["data"];
				}
			}
       	}

        return array();
	}

	
	/*
	* To get user access entity access by user team role table
	* @parm 	= (string) $Uid
	* @return 	= (array) $result
	*/
	public function checkTeamEntityAccess( $uId="" ){

		if( !empty($uId) ){
			
			$query 		= " SELECT u.id, rt.id, r.data FROM user AS u INNER JOIN team_user as tu ON u.id = tu.user_id INNER JOIN role_team as rt ON tu.team_id = rt.team_id INNER JOIN role as r ON rt.role_id = r.id WHERE u.id = '".$uId."' ";

			$result 	= mysqli_query( $this->dbConn, $query);

			if( !empty($result) ){
	    	
	    		$teamRoleData = mysqli_fetch_assoc($result);
	    		
	    		if( !empty( $teamRoleData["data"] ) ){
					return $teamRoleData["data"];
				}
			}
       	}

        return array();
	}

	
	/*
	* To get user entity access array
	* @parm 	= (string) $uId
	* @return 	= (array) $roleAccess
	*/
	public function userHasEntityAccess( $uId="" ){

		$userRoleAccess = $this->checkUserEntityAccess( $uId );

		if( empty($userRoleAccess) ){

			$teamRoleAccess = $this->checkTeamEntityAccess( $uId );

			if( empty($teamRoleAccess) ){

				return false;

			}else{

				return $teamRoleAccess;
			}

		}

		return $userRoleAccess;

	}




	/*
	* To check username valid or not = to get primary email
	* @parm 	= (string) $username
	* @return 	= (array) $result
	*/
	public function isValidUserName( $username = "" ){
		
		$result = array();

		if( !empty($username) ){

			$query 	= " SELECT u.id, u.user_name, CONCAT( u.first_name, ' ', u.last_name ) as name, ea.lower as email FROM user AS u LEFT JOIN entity_email_address AS eea ON u.id = eea.entity_id AND eea.primary = '1' LEFT JOIN email_address AS ea ON eea.email_address_id = ea.id WHERE u.user_name = '".trim($username)."' AND u.deleted = '0' LIMIT 1 ";
			$result = mysqli_query( $this->dbConn, $query);

			if( !empty($result) ) {
	    		$userDetails 	= mysqli_fetch_assoc($result);
		    	return $userDetails;
			}

		}

        return $result;
	}

}
