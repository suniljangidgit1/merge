<?php
$id 	=  	isset($_GET['id']) ? $_GET['id'] : NULL;
$json	=	true;

//CREATE CONNECTION
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

//INCLUDE CUSTOM FUNCTION
include($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/bulk_message/contentTemplate/customFunctions.php');

if( !empty($id) ){

	$res  		= 	mysqli_query($conn, "SELECT sms_status FROM s_m_s_reminder WHERE id= '".$id."'");
	$row  		= 	mysqli_fetch_array($res);

	$status 	= 	$row['sms_status'];

	if($status != "In Active"){

		$sql 		= 	'UPDATE s_m_s_reminder SET sms_status = "In Active" WHERE id = "'.$id.'" ';
		$result 	= 	mysqli_query($conn, $sql);

		//update on common database
		$commonDatabaseResult  = exicuteQueryOnCommonDatabase($sql);

		if($result & $commonDatabaseResult){
			echo 1;
		}
	}else{
		echo 0;
	}
}

