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
    
    $listArr    = array();
	$filePath 	= 	include($filePath);

    if( !empty($filePath) ){
		$enitityArr 	= $filePath['tabList'];
	}
	
	if( !empty($enitityArr) ) {
	    
	    asort($enitityArr);
	     $expectForm = array("Case","ClosedTask","ContactList","Designation","EmailReminder","Estimate","Export","ExportResult","Invoice","MessageLog","MyCampaigns","OfficeLocation","Payments","SMSReminder","SentMessages","TestDemo", "HolidayCalender", "NSICData", "BillingEntity", "_delimiter_");

	    foreach( $enitityArr as $key => $val ){
	        // $listArr[strtolower(preg_replace('/\B([A-Z])/', '_$1', $val))] = strtolower(preg_replace('/\B([A-Z])/', '_$1', $val)); 
	        //if( $val != "ExportResult" ){
	    	if(!in_array($val, $expectForm)){
	        	$listArr[$val] = $val; 
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

// echo "<pre>***";print_r(data);die;
echo json_encode($data); 
return true;
