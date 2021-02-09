<?php session_start();
//set timezone
date_default_timezone_set('UTC'); 

//get login user name
$userName		= 	$_SESSION['Login'];

// create database connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

//include custom function
include($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/bulk_message/contentTemplate/customFunctions.php');

$userId  			=  	getUserId($userName);
$id  				= 	getToken(20);
$createdAt			=	date("Y-m-d h:i:s");
$createdBy 			= 	$userId;

$templateName 		= 	isset($_POST["TemplateName"]) ? $_POST["TemplateName"] : NULL;
$principleEntityId 	= 	isset($_POST["PrincipleEntityId"]) ? $_POST["PrincipleEntityId"] : NULL;
$templateId 		= 	isset($_POST["TemplateId"]) ? $_POST["TemplateId"] : NULL;
$contentType 		= 	isset($_POST["content_type"]) ? $_POST["content_type"] : NULL;
$categoryType 		= 	isset($_POST["category_type"]) ? $_POST["category_type"] : NULL;
$senderId 			= 	isset($_POST["Sender_Id"]) ? $_POST["Sender_Id"] : NULL;
$unicodeType 		= 	isset($_POST["unicodeType"]) ? $_POST["unicodeType"] : NULL;
$templateContents 	= 	isset($_POST["TemplateContents"]) ? $_POST["TemplateContents"] : NULL;

//required validaton
$allVariables    	=  	$_POST;
foreach($allVariables as $varialble){
	if(empty($varialble)){
		$data["error"] 	= "true";
		$data["status"] = "false";
		$data["msg"] 	= "All field required.";
		echo json_encode($data);return;
	}
}

//send mail
$sendMailResult   =    sendMail($allVariables);

$sql = "INSERT INTO `content_template`(`id`, `deleted`, `created_at`, `created_by_id`, `assigned_user_id`, `template_name`, `principle_entity_id`, `template_id`, `content_type`, `category_type`, `sender_id`, `template_type`, `template_contents`, `modified_at`) VALUES ('".$id."', '0', '".$createdAt."', '".$createdBy."', '".$createdBy."', '".$templateName."', '".$principleEntityId."', '".$templateId."', '".$contentType."', '".$categoryType."', '".$senderId."', '".$unicodeType."', '".$templateContents."', '".$createdAt."')";

$result    = mysqli_query($conn, $sql);

if( $result && $sendMailResult ){
	$data["error"] 	= "false";
	$data["status"] = "true";
	$data["msg"] 	= "Content Template added successfully.";
	echo json_encode($data);return;
}else{
	$data["error"] 	= "true";
	$data["status"] = "false";
	$data["msg"] 	= "Oops! Something went wrong.";
	echo json_encode($data);return;
}
?>