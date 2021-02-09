<?php
/*==========================CUSTOM FUNCTIONS START=================================*/


/*
 * FOR GET LOGIN USER ID
 * @para   -> $userName  = (string)
 * #return -> $userId    = (string)
*/
if( !function_exists( 'getUserId' ) ) {
  
  function getUserId($userName = "") {

  	GLOBAL $conn;

  	$res	= 	mysqli_query($conn, "SELECT id FROM user WHERE user_name='".$userName. "'");
  	$row	=	mysqli_fetch_array($res);
  	$userId	= 	$row['id'];

  	return $userId;
  }
}

/*
* TO GET TOKEN
* @para -> $length  	   = (integer)
* #return 	= (string)
*/
if( !function_exists( 'getToken' ) ) {

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
}

/*
* TO GET TOKEN ENCRYPTION
* @para -> $min  	   = (integer)
* @para -> $max  	   = (integer)
* #return 	= (string)
*/
if( !function_exists( 'crypto_rand_secure' ) ) {

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
}

/*
* FOR SEND MAIL
* @para ->  $varialbles  	   = (array)
* #return 	= (boolean)
*/
if( !function_exists( 'sendMail' ) ) {

  function sendMail($varialbles = array()){

  	//geting mail template credentials
  	require_once($_SERVER['DOCUMENT_ROOT']."/task_cron/email_templates/EmailNotification.php");

  	$sendMailObj  	=   new EmailNotification();

  	$mailSubject    = 	'New Content template inserted';

  	$domainName     =   $_SERVER['HTTP_HOST'];

  	$mailBody		= 	'<p><b>New Content template inserted as </b></p><br>

  		Template Name 			: '.$varialbles["TemplateName"].'<br>
  		Principle Entity Id 	: '.$varialbles["PrincipleEntityId"].'<br>
  		Template Id 			: '.$varialbles["TemplateId"].'<br>
  		Content Type 			: '.$varialbles["content_type"].'<br>
  		Category Type 			: '.$varialbles["category_type"].'<br>
  		Sender Id 				: '.$varialbles["Sender_Id"].'<br>
  		Unicode Type 			: '.$varialbles["unicodeType"].'<br>
  		Template Contents 		: '.$varialbles["TemplateContents"].'<br>
  		Domain Name 	 		: '.$domainName.'<br>
  	';

  	$sendTo      	= 	array();
  	//$sendTo[]	 	= 	'100067@fincrm.net';
  	$sendTo[]	 	= 	'info@fincrm.net'; 

    $sendResult     =   $sendMailObj->sendEmail($sendTo, $mailBody, $mailSubject, "", "");

    if($sendResult) {
       	return true;
    } else {
        return false;
    }
  }
}

/* FOR GETING SENDER ID
 * @param -> $category -> (string)
 * #return  //associative array
*/
if( !function_exists( 'getSenderId' ) ) {

  function getSenderId($category = ''){

    GLOBAL $conn;

    if(empty($category)){
    		$category  = "";
    } else {
    		$category  = " AND `category_type` = '".$category."'";
    }

    $listArr        =  array();

    $sql     =  "SELECT `sender_id` FROM `sender_i_d` WHERE deleted = 0 AND status = 'Active'".$category;

    $result = mysqli_query($conn, $sql);
    $count  = mysqli_num_rows($result);

    if($count > 0) {

      while ($row = mysqli_fetch_assoc($result)) {
        $sender_id            =   $row["sender_id"];
        $listArr[$sender_id]  =   $sender_id;
      }
    }

    return $listArr;
  }
}

/* FOR GETING CONTENT TEMPLATE
 * #return  //associative array
*/
if( !function_exists( 'getContentTemplate' ) ) {

  function getContentTemplate($senderId = ""){

    GLOBAL $conn;

    $listArr        =  array();

    $sql     =  "SELECT `id`, `template_name` FROM `content_template` WHERE `sender_id` = '$senderId' AND `deleted` = '0'";

    $result = mysqli_query($conn, $sql);
    $count  = mysqli_num_rows($result);

    if($count > 0) {

      while ($row = mysqli_fetch_assoc($result)) {

        $id               =   $row["id"];
        $template_name    =   $row["template_name"];

        $listArr[$template_name]  =   $id.','.$template_name;
      }
    }

    return $listArr;
  }
}

/*
* FOR CONTENT TEMPLATE UPDATE MAIL
* @para ->  $varialbles      = (array)
* #return   = (boolean)
*/
if( !function_exists( 'updateContentTemplateMail' ) ) {

  function updateContentTemplateMail($varialbles = array()){

    //geting mail template credentials
    require_once($_SERVER['DOCUMENT_ROOT']."/task_cron/email_templates/EmailNotification.php");

    $sendMailObj    =   new EmailNotification();

    $mailSubject    =    'Content template updated';

    $domainName     =   $_SERVER['HTTP_HOST'];

    $mailBody   =   '<p><b>Content template updated as </b></p><br>

      Template Name       : '.$varialbles["edit_TemplateName"].'<br>
      Principle Entity Id   : '.$varialbles["edit_PrincipleEntityId"].'<br>
      Template Id       : '.$varialbles["edit_TemplateId"].'<br>
      Content Type      : '.$varialbles["edit_content_type"].'<br>
      Category Type       : '.$varialbles["edit_category_type"].'<br>
      Sender Id         : '.$varialbles["edit_Sender_Id"].'<br>
      Unicode Type      : '.$varialbles["edit_unicodeType"].'<br>
      Template Contents     : '.$varialbles["edit_TemplateContents"].'<br>
      Domain Name       : '.$domainName.'<br>
    ';

    $sendTo       =   array();
    //$sendTo[]   =   '100067@fincrm.net';
    $sendTo[]   =   'info@fincrm.net'; 

    $sendResult     =   $sendMailObj->sendEmail($sendTo, $mailBody, $mailSubject, "", "");

    if($sendResult) {
        return true;
    } else {
        return false;
    }
  }
}

/* FOR EXICUTE ANY QUERY ON COMMON DATABASE
 * @para    ->  $query  [string]
 * #return  ->  $result [boolean]
*/
if( !function_exists( 'exicuteQueryOnCommonDatabase' ) ) {

  function exicuteQueryOnCommonDatabase($query = "") {

    // create common database connection 
    include($_SERVER['DOCUMENT_ROOT'].'/data/config.php');

    $result = mysqli_query($conn, $query);
    return ($result) ? true : false ;
  }
}

/* FOR EXICUTE ANY QUERY ON SUBDOMAIN DATABASE
 * @para    ->  $query  [string]
 * #return  ->  $result [boolean]
*/
if( !function_exists( 'exicuteQuery' ) ) {

  function exicuteQuery($query = "") {

    GLOBAL $conn;

    $result = mysqli_query($conn, $query);
    return ($result) ? true : false ;
  }
}

/* FOR INCREASE TIME
 * @para    ->  $date      [ date ]
 * @para    ->  $minutes   [ minutes ]
 * #return  ->  $stamp [ date ]
*/
if( !function_exists( 'increaseTime' ) ) {

  function increaseTime($date = "", $minutes = "") {
    
    if(!empty($date)) {

      $time = new DateTime($date);
      $time->add(new DateInterval('PT' . $minutes . 'M'));

      $stamp = $time->format('Y-m-d H:i');
      return $stamp;
    }
  }
}
/*==========================CUSTOM FUNCTIONS END=================================*/