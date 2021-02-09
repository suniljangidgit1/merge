<?php

$id 	=  	isset($_GET['id']) ? $_GET['id'] : NULL;
$json	=	true;

//INCLUDE CUSTOM FUNCTION
include($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/email_reminder/customFunctions.php');

//DATABASE OPERATIONS
include($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/email_reminder/databaseOperations.php');

if( !empty($id) ) {

	//get single recrod
	$sql 		=   "SELECT email_status, send_email_date, send_email_time FROM email_reminder WHERE id= '$id'";
	$row 		=   $databaseOperations->getRecordArray($sql);

	$status 	= 	$row['email_status'];
	$status 	= 	$row['email_status'];
	$date    	= 	$row['send_email_date'];
	$time    	= 	$row['send_email_time'];

	$currentDateTime 		= 	new DateTime();
	$currentDateTime 		= 	$currentDateTime->format('Y-m-d H:i');

	$minutes		 		=   270;    // minute [ 4:30 h]
	// $currentDateTime 		=	increaseTime($currentDateTime, $minutes);

	$reminderDateTime       =   date('Y-m-d', strtotime($date)).' '.$time;

	if( $currentDateTime >= $reminderDateTime ) {
		$data["error"] 		= "true";
		$data["status"] 	= "false";
		$data['msg']		= "The scheduled time for this reminder has passed away. Kindly edit the reminder and re-activate it.";
		echo json_encode($data);return;
	}

	if( $status != "Active" ) {

		$sql 		=   "UPDATE email_reminder SET email_status = 'Active' WHERE id = '$id'";
		$result 	= 	$databaseOperations->exicuteQuery($sql);

		$commonDatabaseResult  = $databaseOperations->exicuteQueryOnCommonDatabase($sql);

		if($result && $commonDatabaseResult){
			$data["error"] 		= "false";
			$data["status"] 	= "true";
			$data['msg']		= "Reminder activated to deliver at scheduled date and time!";
			echo json_encode($data);return;
		}
	} else {
		$data["error"] 		= "true";
		$data["status"] 	= "false";
		$data['msg']		= "This reminder is already active!";
		echo json_encode($data);return;
	}
} else {
	$data["error"] 		= "true";
	$data["status"] 	= "false";
	$data['msg']		= "Oops! somethig wents wrong.";
	echo json_encode($data);return;
}
?>