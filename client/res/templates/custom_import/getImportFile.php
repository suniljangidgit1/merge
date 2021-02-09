<?php

$data["status"] = "false";
$data["msg"]    = "Invalid request!";
$data["data"]   = array();

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

//include custom functions
include($_SERVER['DOCUMENT_ROOT']."/client/res/templates/custom_import/customImportFunctions.php");

$entityName     = isset($_POST['import-entity-type']) ? $_POST['import-entity-type'] : NULL;

//required validation for entity name
if(empty($entityName)) {
	$data["error"]  = "true";
    $data["status"] = "false";
    $data["msg"]    = "Please select entity type.";
    echo json_encode($data);return;
}

//check empyt validation for choose file
if(!empty($_FILES['import_file']['name'][0])) {

	$target_dir 	= 	$_SERVER['DOCUMENT_ROOT']."/client/res/templates/custom_import/uploads/";
	$file_name      =   str_replace(" ", "_", $_FILES["import_file"]["name"][0]);
	$target_file 	= 	$target_dir . $file_name;
	$imageFileType 	= 	strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	//create directory if is not exists
	if(!is_dir($target_dir)) {
		mkdir($target_dir);
	}

	//unlink existing/old files & logs 
	unlinkLogs();

	// Allow certain file formats
	if($imageFileType != "csv" ) {
	    $data["error"]  = "true";
	    $data["status"] = "false";
	    $data["msg"]    = "Please select .csv file.";
	    echo json_encode($data);return;
	}

	//upload file
	if (move_uploaded_file($_FILES["import_file"]["tmp_name"][0], $target_file)) {

		//import log
		$importLogResult    =  importLog($file_name);
		if(!$importLogResult){
			$data["error"]  	= 	"true";
		    $data["status"] 	= 	"false";
		    $data["msg"]    	= 	"Import log inserting error.";
		    echo json_encode($data);return;
		}

		//get entity columns
		$columns  		= 	getColumnName($entityName);
		if(empty($columns)){
			$data["error"]  	= 	"true";
		    $data["status"] 	= 	"false";
		    $data["msg"]    	= 	"No colums found in our selected entity, please try onather one.";
		    echo json_encode($data);return;
		}

		//get file header
		$getFileHeader  =   getFileHeader($target_file);
		if(empty($getFileHeader)){
			$data["error"]  	= 	"true";
		    $data["status"] 	= 	"false";
		    $data["msg"]    	= 	"Header label not found.";
		    echo json_encode($data);return;
		}

		//get file value
		$getFileValue  =   getFileValue($target_file);
		if(empty($getFileValue)){
			$data["error"]  	= 	"true";
		    $data["status"] 	= 	"false";
		    $data["msg"]    	= 	"The file contains no records. Please select another file.";
		    echo json_encode($data);return;
		}

		//get total records 
		$getFileTotalRecords  =   getFileTotalRecords($target_file);
		if($getFileTotalRecords > 5000){
			$data["error"]  	= 	"true";
		    $data["status"] 	= 	"false";
		    $data["msg"]    	= 	"File exceeds 5,000 records.";
		    echo json_encode($data);return;
		}

		//get field mapping
		$fieldMapping  =   getFieldMapping($columns, $getFileHeader, $getFileValue);
		
		//get assigned users
		$assignedUsers =   getAssignedUsers();

		//get teams
		$getTeams      =   getTeams();
								
	    $data["error"]  		= 	"false";
	    $data["status"] 		= 	"true";
	    $data["fieldMapping"]	=	$fieldMapping;
	    $data["assignedUsers"]	=	$assignedUsers;
	    $data["getTeams"]		=	$getTeams;
	    $data["entityName"]		=	$entityName;
	    $data["fileName"]		=	$file_name;
	    $data["importLogId"]    =   $importLogResult;
	    $data["msg"]    		=   "file uploaded successfully.";
	    echo json_encode($data);return;

	  } else {
	    $data["error"]  	= 	"true";
	    $data["status"] 	= 	"false";
	    $data["msg"]    	= 	"File couldn't be uploaded. Please try again.";
	    echo json_encode($data);return;
	  }
}else {
	$data["error"]  	= 	"true";
    $data["status"] 	= 	"false";
    $data["msg"]    	= 	"Please select file.";
    echo json_encode($data);return;
}