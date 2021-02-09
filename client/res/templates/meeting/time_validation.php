<?php
//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

$current_url   =  isset($_GET['curl']) ? $_GET['curl'] : NULL;
$date   	   =  isset($_GET['rdate']) ? $_GET['rdate'] : NULL;
$time   	   =  isset($_GET['rtime']) ? $_GET['rtime'] : NULL;
$sec   		   =  isset($_GET['rsec']) ? $_GET['rsec'] : NULL;

foreach($sec as $seconds){
	$minutes[] 	= 	$seconds/60;
}

if(!empty($time) && !empty($date)){

	$time    	= 	explode(' ', $time);
	if($time[1] == 'pm') {
		$extractTime	= 	explode(':', $time[0]);
		if($extractTime[0] == 12) {
			$newTime   		=  	$extractTime[0]+0;	
		} else {
			$newTime   		=  	$extractTime[0]+12;
		}
		
		$newTime		=	$newTime.':'.$extractTime[1];

	} else {
		$newTime        = 	$time[0];

	}

	$date = date('Y-m-d', strtotime($date));
	$getTime 		=	$date.' '.$newTime;
}

if(!empty($current_url)) {
	$current_url   = 	str_replace('#Meeting/view/', '', $current_url);
	$res 		   = 	mysqli_query($conn, "SELECT `date_start` FROM `meeting` WHERE `id`='".$current_url. "'");

	$row		   =	mysqli_fetch_array($res);
	$date_start	   = 	$row['date_start'];

	$getTime 	   = 	increaseTime($date_start);
}

foreach($minutes as $min){
	$getDate[]   = deacreaseTime($min, $getTime);
}


date_default_timezone_set('Asia/Calcutta'); 
$DateTime 		= 	new DateTime();
$currentDate	= 	$DateTime->format('Y-m-d');
$currentDate    =   $currentDate.' '.date("H:i");
$currentDate 	= 	new DateTime($currentDate);

foreach($getDate as $gDate) {
	$gDate		= 	new DateTime($gDate);
	if($gDate	<	$currentDate){
		$data['status']   = 'Error';
		$data['type'] 	  =	'false';
		$data['message']  = 'Reminder can not be set for a past time';
		echo json_encode($data);return;
	}
}

$data['status']   = 'Success';
$data['type'] 	  =	'true';
echo json_encode($data);return;

//minus minutes
function deacreaseTime($minutes = "", $dateTime = ""){
	$minutes_to_minus = $minutes;		//minute
	$time = new DateTime($dateTime);
	$time->sub(new DateInterval('PT' . $minutes_to_minus . 'M'));

	$getDate	    = $time->format('Y-m-d H:i');
	return $getDate;
}

//add  Minute
function increaseTime($date = "") {
	
	if(!empty($date)) {
		$minutes_to_add = 330;		//minute
		$time = new DateTime($date);
		$time->add(new DateInterval('PT' . $minutes_to_add . 'M'));

		$stamp = $time->format('Y-m-d H:i');
		return $stamp;
	}
}
?>