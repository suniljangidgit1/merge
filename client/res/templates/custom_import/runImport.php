<?php session_start();
date_default_timezone_set('UTC');
ini_set('max_execution_time', '100000000');
set_time_limit(100000000);

//set timezone
date_default_timezone_set('UTC'); 

$data["status"] = "false";
$data["msg"]    = "Invalid request!";
$data["data"]   = array();

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

//get current user name
$userName 	= 	$_SESSION['Login'];
$res 		= 	mysqli_query($conn, "SELECT id FROM user WHERE user_name='".$userName. "'");
$row 		=	mysqli_fetch_array($res);
$userId 	= 	$row['id'];

//include custom functions
include($_SERVER['DOCUMENT_ROOT']."/client/res/templates/custom_import/customImportFunctions.php");

$assignUser     = 	isset($_POST['assign_user']) ? $_POST['assign_user'] : NULL;
$team     		= 	isset($_POST['team']) ? $_POST['team'] : NULL;

$entityName     = 	isset($_POST['entityName']) ? $_POST['entityName'] : NULL;
$fileName     	= 	isset($_POST['fileName']) ? $_POST['fileName'] : NULL;
$importLogId    = 	isset($_POST['importLogId']) ? $_POST['importLogId'] : NULL;

//if assigned user empty then get defualt created user
if(empty($assignUser)){
	$assignUser =  $userId;
}

$targetfile 		=	$_SERVER['DOCUMENT_ROOT']."/client/res/templates/custom_import/uploads/".$fileName;
$entityColumnsArr	=	array();
$headerRowValue 	=   '';

//geting headers
$headers		 =	getFileHeader($targetfile);

$skipRecordCount =  0;
$skipRecordArr   =  array();

//get field mapping select values
foreach($headers as $headersValue){

	$headerRowValue   =  filterString($headersValue);
	$fieldValue       =  $_POST[$skipRecordCount.$headerRowValue];
	if(!empty($fieldValue)){
		$entityColumnsArr[] 	=  $fieldValue;
	} else {
		$skipRecordArr[]  =  $skipRecordCount;
	}
	
	$entityColumnsAllArr[]  = $fieldValue;
	$skipRecordCount++;
}

//check field mapping empty or not
if(count($entityColumnsArr) <= 0){
	$data["error"]  = "true";
    $data["status"] = "false";
    $data["msg"]    = "Please select at least one field.";
    echo json_encode($data);return;
}

//implode columns values array
$entityColumns   = implode(',', $entityColumnsArr);

//for team
$teamSQL = '';
$teamSQLValues='';
$teamResult = true;

//for phone
$phonePosition = array();
$phoneSQL = '';
$phoneResult = true;

$phoneSQLEntity = '';
$phoneEResult = true;

//for email
$emailPosition = array();
$emailSQL = '';
$emailResult = true;

$emailSQLEntity = '';
$emailEResult = true;

//open CSV file
$handle = fopen($targetfile, "r");

$entityColumnsArr1 = $entityColumnsArr;

//for phone SQL
if(in_array('phone', $entityColumnsArr)){
	for($index = 0; $index < count($entityColumnsAllArr); $index++){
		if($entityColumnsAllArr[$index] == "phone")
    	{
	    	$phonePosition[] =  $index;
	    	//unset($entityColumnsArr1[$index]);
	    }
	}

	for($index = 0; $index < count($entityColumnsArr); $index++){
		if($entityColumnsArr[$index] == "phone")
    	{
	    	// $phonePosition[] =  $index;
	    	unset($entityColumnsArr1[$index]);
	    }
	}

	$entityColumns   = implode(',', $entityColumnsArr1);

	$phoneSQLEntity = "INSERT INTO `entity_phone_number`(`entity_id`, `phone_number_id`, `entity_type`, `primary`, `deleted`) VALUES ";

	$phoneSQL 		=  "INSERT INTO `phone_number`(`id`, `name`, `deleted`, `type`, `numeric`, `invalid`, `opt_out`) VALUES  ";
}

//Maximum 5 phone numbers can be selected validation
if(count($phonePosition) > 5){
	$data["error"]  = "true";
    $data["status"] = "false";
    $data["msg"]    = "Maximum 5 phone numbers can be selected.";
    echo json_encode($data);return;
}

//for email SQL
if(in_array('email', $entityColumnsArr)){
	for($index = 0; $index < count($entityColumnsAllArr); $index++){
		if($entityColumnsAllArr[$index] == "email")
    	{
	    	$emailPosition[] =  $index;
	    	//unset($entityColumnsArr1[$index]);
	    }
	}

	for($index = 0; $index < count($entityColumnsArr); $index++){
		if($entityColumnsArr[$index] == "email")
    	{
	    	//$emailPosition[] =  $index;
	    	unset($entityColumnsArr1[$index]);
	    }
	}
	
	$entityColumns   = implode(',', $entityColumnsArr1);

	$emailSQLEntity = "INSERT INTO `entity_email_address`( `entity_id`, `email_address_id`, `entity_type`, `primary`, `deleted`) VALUES ";

	$emailSQL 		=  "INSERT INTO `email_address`(`id`, `name`, `deleted`, `lower`, `invalid`, `opt_out`) VALUES  ";
}

//Maximum 5 emails can be selected validation
if(count($emailPosition) > 5){
	$data["error"]  = "true";
    $data["status"] = "false";
    $data["msg"]    = "Maximum 5 emails can be selected.";
    echo json_encode($data);return;
}

//for entity SQL
$entityColumns = 'id'.','.$entityColumns.',created_at,created_by_id,assigned_user_id';//
$entityColumns = str_replace(',,', ',', $entityColumns);
$sql  = "INSERT INTO `$entityName`(".$entityColumns.") VALUES ";

//for team SQL
if(!empty($team)){
	$teamSQL =  "INSERT INTO `entity_team`(`entity_id`, `team_id`, `entity_type`, `deleted`) VALUES ";
}

//get current time
$DateTime 	= new DateTime();
$createdAt 	= $DateTime->format('Y-m-d H:i:s');

//get created by id
$createdBy 	= $userId;

//formate for entity name
$entityNameFormated		= 	str_replace('_', ' ', $entityName);
$entityNameFormatedC 	= 	ucwords($entityNameFormated);
$entityNameFormated		= 	str_replace(' ', '', $entityNameFormatedC);

$getValues  	= '';
$count 			= 0;

//read csv file
while(! feof($handle)) {

	$getRecord = fgetcsv($handle);
	
	if(is_array($getRecord)) {

		if(count($getRecord) > 1 && $count > 0){

			$valuesPosition = 0;
			$phoneNumber    = array();
			$email    		= array();
			foreach( $getRecord as $getValue )  {

			   //check skip records
			   if(!in_array($valuesPosition, $skipRecordArr)){
			   		$getValue  = trim(mysqli_real_escape_string($conn,$getValue));

			   		if(in_array($valuesPosition, $phonePosition)){
			   			//check value is empty or not
			   			if( !empty($getValue) ) {
							$phoneNumber[] = $getValue;
			   			}
					}else if(in_array($valuesPosition, $emailPosition)){
						if( !empty($getValue) ) {
							$email[] = $getValue;
						}
					}else{

						if(is_float($getValue)){
							$getValue  = $getValue;
						}else if(strtotime($getValue) && strlen($getValue) > 5){
							$getValue = date('Y-m-d', strtotime($getValue));
						}
						$getValues  .= "'".$getValue."',";
					}
			   }

			   $valuesPosition++;
			}

			//for entity values
			$entityId 	 = 	getToken(20);
			$getValues   = 	"'".$entityId."',".$getValues."'".$createdAt."','".$createdBy."','".$assignUser."'";

			$sql 		.= 	"(".$getValues."),";
			$getValues   = 	'';

			//for phone values
			if(in_array('phone', $entityColumnsArr) && count($phoneNumber) > 0){

				foreach($phoneNumber as $pn){
					$phone_number_id   = getToken(17);
					$phoneSQLEntity   .=  "('$entityId','$phone_number_id','$entityNameFormated','1','0'),";
					$phoneSQL         .=  "('$phone_number_id','$pn','0','Mobile','$pn','0','0'),";
				}

				
			}

			//for email values
			if(in_array('email', $entityColumnsArr) && count($email) > 0){

				foreach($email as $e){
					$email_id   	   = getToken(17);
					$emailSQLEntity   .=  "('$entityId','$email_id','$entityNameFormated','1','0'),";
					$emailSQL         .=  "('$email_id','$e','0','".strtolower($e)."','0','0'),";
				}
			}

			//for team values
			if(!empty($team)){
				$teamSQLValues 		.=  	"'".$entityId."','".$team."','".$entityNameFormated."','0'";
				$teamSQL 			.= 		"(".$teamSQLValues."),";
				$teamSQLValues 		 = 		'';
			}
		}
	}
	$count++;
}

//close opened file 
 fclose($handle);

//count total record
$totalRecords   = 	$count-2;

//for import result SQL
$importId	    = 	getToken(20);
$importSQL  	=   "INSERT INTO `import_result`(`id`, `deleted`, `created_at`, `created_by_id`, `assigned_user_id`, `entity_name`, `no_of_records`) VALUES ('$importId', '0', '$createdAt', '$createdBy', '$assignUser', '$entityNameFormatedC', '$totalRecords');";

//for delete import log
$deleteFileSQL   = 	"DELETE FROM `import_log` WHERE id = '".$importLogId."'";

$sql = 	rtrim($sql,',').';'.$importSQL.$deleteFileSQL ;

//for team result
if(!empty($team)){
	$teamSQL 	= 	rtrim($teamSQL,',').';';
	$teamResult	=	mysqli_multi_query($conn,$teamSQL);

	if(!$teamResult){
		echo "error in teamSQL ->".mysqli_error($conn);
	}
}

//for phone result
if(in_array('phone', $entityColumnsArr)){
	$phoneSQLEntity 	= 	rtrim($phoneSQLEntity,',').';';
	$phoneEResult		=	mysqli_multi_query($conn,$phoneSQLEntity);
	if(!$phoneEResult){
		echo "error in phone entity SQL ->".mysqli_error($conn);
	}

	$phoneSQL 			= 	rtrim($phoneSQL,',').';';
	$phoneResult		=	mysqli_multi_query($conn,$phoneSQL);
	if(!$phoneResult){
		echo "error in phoneSQL ->".mysqli_error($conn);
	}
}

//for email result
if(in_array('email', $entityColumnsArr)){
	$emailSQLEntity 	= 	rtrim($emailSQLEntity,',').';';
	$emailEResult		=	mysqli_multi_query($conn,$emailSQLEntity);
	if(!$emailEResult){
		echo "error in email entity SQL ->".mysqli_error($conn);
	}

	$emailSQL 			= 	rtrim($emailSQL,',').';';
	$emailResult		=	mysqli_multi_query($conn,$emailSQL);
	if(!$emailResult){
		echo "error in email SQL->".mysqli_error($conn);
	}
}

//for entity & import log result
$result		=	mysqli_multi_query($conn,$sql); 

if($result == true && $teamResult == true && $phoneEResult == true && $phoneResult == true && $emailEResult == true && $emailResult == true){

	//remove csv file from local
	if(file_exists($targetfile)) { 
		unlink($targetfile);
	}

	$resultMessage          =  "<b>Entity Name : ".$entityNameFormatedC."<br>No. of Records : ".number_format($totalRecords);

	$data["error"]  		= 	"false";
    $data["status"] 		= 	"true";
    $data["msg"]    		=   $resultMessage;
    echo json_encode($data);return;
} else {
	$data["error"]  = "true";
    $data["status"] = "false";
    $data["msg"]    = "somthing went's to be wrong.".mysqli_error($conn);
    echo json_encode($data);return;
}
