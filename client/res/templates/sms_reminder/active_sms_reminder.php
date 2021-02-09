<?php

$id 	=  	isset($_GET['id']) ? $_GET['id'] : NULL;
$json	=	true;

//CREATE CONNECTION
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

//INCLUDE CUSTOM FUNCTION
include($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/bulk_message/contentTemplate/customFunctions.php');

if( !empty($id) ){

	$res 	= 	mysqli_query($conn, "SELECT sms_status, reminder_date, reminder_time FROM s_m_s_reminder WHERE id= '".$id."'");
	$row    = 	mysqli_fetch_array($res);

	$status 	= 	$row['sms_status'];
	$date    	= 	$row['reminder_date'];
	$time    	= 	$row['reminder_time'];

	$currentDateTime 		= 	new DateTime();
	$currentDateTime 		= 	$currentDateTime->format('Y-m-d H:i');

	$minutes		 		=   270;    // minute [ 4:30 h]
	//$currentDateTime 		=	increaseTime($currentDateTime, $minutes);

	$reminderDateTime       =   date('Y-m-d', strtotime($date)).' '.$time;

	if($currentDateTime >= $reminderDateTime) {
		$data["error"] 		= "true";
		$data["status"] 	= "false";
		$data['msg']		= "The scheduled time for this reminder has passed away. Kindly edit the reminder and re-activate it.";
		echo json_encode($data);return;
	}

	if($status != "Active"){

		$sql 	=  'UPDATE s_m_s_reminder as er SET er.sms_status = "Active" WHERE er.id = "'.$id.'" ';
		$result  = mysqli_query($conn, $sql);

		$commonDatabaseResult  = exicuteQueryOnCommonDatabase($sql);

		if($result & $commonDatabaseResult){
			$data["error"] 		= "false";
			$data["status"] 	= "true";
			$data['msg']		= "Reminder activated to deliver at scheduled date and time!";
			echo json_encode($data);return;
		}
	}else{
		$data["error"] 		= "true";
		$data["status"] 	= "false";
		$data['msg']		= "This reminder is already active!";
		echo json_encode($data);return;
	}
}
