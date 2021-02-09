<?php session_start();
//set timezone
date_default_timezone_set('UTC'); 

// get login user name
$userName		= 	$_SESSION['Login'];

// create database connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

// include custom function
include($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/bulk_message/contentTemplate/customFunctions.php');

// required validaton
$allVariables    	=  	$_POST;
foreach($allVariables as $varialble){
	if(empty($varialble)){
		$data["error"] 	 = 	"true";
		$data["status"]  = 	"false";
		$data["msg"] 	 = 	"All field required.";
		echo json_encode($data);return;
	}
}

$userId  			=  	getUserId($userName);
$modifiedAt			=	date("Y-m-d h:i:s");
$modifiedBy 		= 	$userId;

$id 				= 	isset($_POST["id"]) ? $_POST["id"] : NULL;
$templateId 		= 	isset($_POST["edit_TemplateId"]) ? $_POST["edit_TemplateId"] : NULL;
$templateName 		= 	isset($_POST["edit_TemplateName"]) ? $_POST["edit_TemplateName"] : NULL;
$principleEntityId 	= 	isset($_POST["edit_PrincipleEntityId"]) ? $_POST["edit_PrincipleEntityId"] : NULL;
$contentType 		= 	isset($_POST["edit_content_type"]) ? $_POST["edit_content_type"] : NULL;
$categoryType 		= 	isset($_POST["edit_category_type"]) ? $_POST["edit_category_type"] : NULL;
$senderId 			= 	isset($_POST["edit_Sender_Id"]) ? $_POST["edit_Sender_Id"] : NULL;
$templateType 		= 	isset($_POST["edit_unicodeType"]) ? $_POST["edit_unicodeType"] : NULL;
$templateContents 	= 	isset($_POST["edit_TemplateContents"]) ? $_POST["edit_TemplateContents"] : NULL;

$sql     	= 	"UPDATE `content_template` SET `modified_at`= '$modifiedAt',`modified_by_id`= '$modifiedBy',`template_name`= '$templateName',`principle_entity_id`='$principleEntityId',`template_id`='$templateId',`content_type`='$contentType',`category_type`='$categoryType',`sender_id`='$senderId',`template_type`='$templateType',`template_contents`='$templateContents' WHERE id = '".$id."'";

//send mail
$sendMailResult   =    updateContentTemplateMail($allVariables);

$result			  =	   mysqli_query($conn,$sql);

if($result && $sendMailResult){
    $data["error"]  	= "false";
    $data["status"] 	= "true";
    $data["msg"]    	= "Content Template Updated Successfully.";
    echo json_encode($data);return;
}else{
    $data["error"]  = "true";
    $data["status"] = "false";
    $data["msg"]    = "Oops! Something went wrong.";
    echo json_encode($data);return;
}
?>