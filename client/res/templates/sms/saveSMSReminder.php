<?php
	
	echo $_POST['date'];
	
	echo $_POST['time'];
	
	echo $_POST['mobileNO'];
	
	echo $_POST['smsbody'];
	$DateTime = new DateTime();
	date_default_timezone_set("Asia/Calcutta"); 
	$created_at= $DateTime->format('Y-m-d H:i:s');
	
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	mysqli_select_db($conn,"fincrm_finnovaadvisory_db");
	mysqli_query($conn,"INSERT into sms_reminder(mobileNo, reminder_date, reminder_time, sms_body, createdAt) values ('".$_POST['mobileNO']."', '".$_POST['date']."','".$_POST['time']."', '".$_POST['smsbody']."', '".$created_at."')");	
	
//	header('location:success.html');
?>