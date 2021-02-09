<?php
ini_set('max_execution_time', 0);

//geting mail template credentials
require_once("/var/www/html/crm.fincrm.net/crm/task_cron/email_templates/EmailNotification.php");

$sendMailObj  =   new EmailNotification();
///var/www/html/crm.fincrm.net/crm

//get current date time 
date_default_timezone_set('Asia/Calcutta'); 
$DateTime 		= 	new DateTime();
$currentDate	= 	$DateTime->format('d/m/Y');
$currentDate    =   $currentDate.' '.date("H:i");

// get common database connection
$filePath      = '/var/www/html/crm.fincrm.net/crm/data/config.php';

include($filePath);
// Create connection
$commonDbConn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$commonDbConn) {
  die("Common Database Connection failed: " . mysqli_connect_error());
}

$commonDbSql = "SELECT mr.*, hr.host_name,hr.db_name,hr.password, hr.user_name FROM `meeting_reminder` mr INNER JOIN host_record hr ON mr.domain_name = hr.domain_url ";

$commonDbResult 	= 	mysqli_query($commonDbConn,$commonDbSql);
$commonDbNumRows 	=	mysqli_num_rows($commonDbResult);

if($commonDbNumRows>0){

	while($commonDbRows = mysqli_fetch_assoc($commonDbResult)) {

		$commonDbId 		= 	$commonDbRows['id'];
		$host_name 			= 	$commonDbRows['host_name'];
		$user_name 			= 	$commonDbRows['user_name'];
		$password 			= 	$commonDbRows['password'];
		$db_name 			= 	$commonDbRows['db_name'];
		$commonDBMeetingId 	= 	$commonDbRows['meeting_id'];

		// Create connection
		$conn = mysqli_connect($host_name, $user_name, $password, $db_name);

		// Check connection
		if (!$conn) {
		  die("Sub-domain Databas Connection failed: " . mysqli_connect_error());
		}

		$sql 		=	"SELECT DISTINCT m.name, `remind_at`,`start_at` FROM `reminder` r INNER JOIN meeting m ON r.`entity_id` = m.id WHERE r.`type` = 'Email' AND r.`entity_id` = '$commonDBMeetingId' AND r.`deleted` = '0'";

		$result 	= 	mysqli_query($conn,$sql);
		$num_rows 	=	mysqli_num_rows($result);

		if($num_rows>0){

			while($row = mysqli_fetch_assoc($result)) {

				$remind_at    =  $row['remind_at'];
				$name 		  =  $row['name'];
				$start_at     =  $row['start_at'];

				//add 5:30 hours
				$newDate 	  =  increaseTime($remind_at);
				$start_at 	  =  increaseTime($start_at);

				if($newDate == $currentDate) {

					// geting all mails
					$emails  		= 	reminderEmails($commonDBMeetingId);
					if(count($emails) > 0 && !empty($emails)) {
						$mailSubject    = 	'Reminder to meeting '.$name;
						$mailBody		= 	'
						<p>This is a reminder to your meeting.</p><br>

						<b>Meeting Name:</b>  '.$name.'<br>
						<b>Start Date:</b>  '.$start_at;

						foreach($emails as $email) {
							$sendTo      = array();
							$sendTo[]	 = $email;
							//send mail
				            $sendResult       =   $sendMailObj->sendEmail($sendTo, $mailBody, $mailSubject, "", "");
				            if($sendResult) {
				                echo "mail sent<br>";
				            } else {
				                echo "mail sending error -". $email."-";
				                print_r($result);
				                echo "<br>";
				           }
						}
					} else {
						echo "mails not present";
					}					
				}

			}
		} else {
			$sql = "DELETE FROM `meeting_reminder` WHERE `id` = '$commonDbId'";
			mysqli_query($commonDbConn,$sql);
		}
	}
}

//geting all emails
function reminderEmails($meetingId = ""){

	$emails  = array();

	//get lead emails
	$sql    =    "SELECT ea.name FROM `lead_meeting` lm INNER JOIN `entity_email_address` ema ON lm.`lead_id` = ema.entity_id INNER JOIN email_address ea ON ema.email_address_id = ea.id WHERE lm.deleted='0' AND lm.meeting_id = '$meetingId'";
	$lead_emails  = fetchRecord($sql);

	//get contacts emails
	$sql    =    "SELECT ea.name FROM `contact_meeting` cm INNER JOIN `entity_email_address` ema ON cm.`contact_id` = ema.entity_id INNER JOIN email_address ea ON ema.email_address_id = ea.id WHERE cm.deleted='0' AND cm.meeting_id = '$meetingId'";
	$contact_emails  = fetchRecord($sql);

	//get user emails
	$sql    =    "SELECT ea.name FROM `meeting_user` mu INNER JOIN `entity_email_address` ema ON mu.`user_id` = ema.entity_id INNER JOIN email_address ea ON ema.email_address_id = ea.id WHERE mu.deleted='0' AND mu.meeting_id = '$meetingId'";

	$user_emails  = fetchRecord($sql);

	//get parent emails
	$sql    =    "SELECT ea.name FROM `meeting` m INNER JOIN `entity_email_address` ema ON m.parent_id = ema.entity_id INNER JOIN email_address ea ON ema.email_address_id = ea.id WHERE m.deleted='0' AND m.id = '$meetingId'";

	$parent_emails  = fetchRecord($sql);

	//get team emails
	$sql    =    "SELECT ea.name FROM `entity_team` et INNER JOIN team_user tu ON et.team_id = tu.team_id INNER JOIN `entity_email_address` ema ON tu.user_id = ema.entity_id INNER JOIN email_address ea ON ema.email_address_id = ea.id WHERE et.`deleted`='0' AND et.`entity_id` = '$meetingId'";

	$team_emails  = fetchRecord($sql);

	//merge all emails
	$emails = array_merge($lead_emails, $contact_emails, $user_emails,$parent_emails,$team_emails);

	//remove duplicate emails
	$emails = array_unique($emails);
	
	return $emails;
}

//fetch multiple emails
function fetchRecord($sql = "") {

	GLOBAL $conn;
	$emails     =   array();
	$result 	= 	mysqli_query($conn,$sql);
	$num_rows 	=	mysqli_num_rows($result);
	if($num_rows > 0){
		while($row = mysqli_fetch_assoc($result)) {
			$emails[]	= $row['name'];
		}
	}
	return $emails;
}

//add  Minute
function increaseTime($date = "") {
	
	if(!empty($date)) {
		$minutes_to_add = 330;		//minute
		$time = new DateTime($date);
		$time->add(new DateInterval('PT' . $minutes_to_add . 'M'));

		$stamp = $time->format('d/m/Y H:i');
		return $stamp;
	}
}
