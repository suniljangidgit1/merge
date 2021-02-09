<?php

/*
* To get entity dynamically from json file
* @return 	= (json)
*/

$data["status"] = "false";
$data["msg"]    = "Invalid request!";
$data["data"]   = array();

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

$dbname 	= 	$dbname.'_config.php';
$filePath 	= 	$_SERVER['DOCUMENT_ROOT']."/data/".$dbname;

if( !empty($filePath) && file_exists($filePath) ){
    
    $listArr    = 	array();
    $filePath 	= 	include($filePath);

    if( !empty($filePath) ){
		$enitityArr 	= $filePath['tabList'];
	}
	
	if( !empty($enitityArr) ) {
	    
	    asort($enitityArr);

	    //hide entites
	    $expectForm = array("ClosedTask","ContactList","Designation","EmailReminder","Estimate","Export","ExportResult","Invoice","MessageLog","MyCampaigns","OfficeLocation","Payments","SMSReminder","SentMessages","TestDemo", "HolidayCalender", "NSICData", "BillingEntity", "ExportResult","ImportResult", "_delimiter_");

	    foreach( $enitityArr as $key => $val ){

	        $key 			= 	preg_replace('/\B([A-Z])/', '_$1', $val);
	        $key  			= 	preg_replace('/\B([A-Z])/', '_$1', $val);
	        $entityValue 	= 	strtolower($key);
	        $key 			= 	ucwords(str_replace('_', ' ', $key));

	    	if(!in_array($val, $expectForm)){
	        	$listArr[$key] = $entityValue; 
	        } 
	    }
	}
	
	$data["status"] = "true";
    $data["msg"]    = "Entity list fetch successfully!";
    $data["data"]   = $listArr;

}else{
    
    $data["status"] = "false";
    $data["msg"]    = "File not found!";
    $data["data"]   = array();
}

echo json_encode($data); 
return true;
?>