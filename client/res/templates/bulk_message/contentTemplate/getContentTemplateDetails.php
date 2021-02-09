<?php
// create CRM database connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

$template 		 =  array();
$templateId 	 =  '';
$templateName    =  '';

$id  			 = 	isset($_GET["smsContentTemplate"]) ? $_GET["smsContentTemplate"] : NULL;

$template        =   explode(',', $id);

if(count($template)>1){
	$templateId      =   $template[0];
	$templateName    =   $template[1];
}


$templateContent = 	 '';
$smsLengthCount  = 	 0;
$smsCount  		 = 	 1;

$sql     =  "SELECT `template_contents` FROM `content_template` WHERE `id` = '$templateId' AND `deleted` = '0'";

$result = mysqli_query($conn, $sql);
$count  = mysqli_num_rows($result);

if($count > 0) {

  while ($row = mysqli_fetch_assoc($result)) {
  	$templateContent     = 	$row["template_contents"];
  }
}

//count lenght
$smsLengthCount          =  	strlen($templateContent);

//count sms
$smsCount   = 	$smsLengthCount	 /	160 ;
$smsCount   = 	ceil($smsCount);

$data['status']   				= 	'true';
$data['contentTemplateBody'] 	= 	$templateContent;
$data['smsLengthCount'] 		= 	$smsLengthCount;
$data['smsCount'] 				= 	$smsCount;
echo json_encode($data);return;
?>