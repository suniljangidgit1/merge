<?php session_start();
$userName   =   $_SESSION['Login'];

//DATABASE OPERATIONS
include($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/lead_api/facebook/databaseOperations.php');

$pageId 		= 	$_POST['page_id'];
$formId 		= 	$_POST['form_id'];
$formleads  	= 	$_POST['fb_form_leads'];
$domainName     =   $_SERVER['HTTP_HOST'];

$sql            =  "SELECT id FROM user WHERE user_name = '$userName'";
$row            =  $databaseOperations->getRecordArray($sql);
$createdBy      =  $row['id']; 

//CHECK LEADS
if( empty($formleads) ){
	$data["error"]  	=	 "true";
    $data["status"] 	=	 "false";
    $data["msg"]    	=	 "No leads in their form.";
    echo json_encode($data);return;
}

$formLeadsArr  			= 	explode(',', $formleads);
$formLeadsValuesArr 	= 	explode(',', $_POST['fb_form_leads_value']);

//GET FORM FIELD MAPPING VALUES
foreach($formLeadsArr as $row) {
	$formLeadArr[] = $_POST[$row];
}

//CHECK DUPLICATE VALUE
$uniqueValues   =  duplicateArryaItem($formLeadArr);

if( !empty($uniqueValues) && count($uniqueValues)  >  0 ){
	$data["error"]  = "true";
    $data["status"] = "false";
    $data["msg"]    = "can't select one field name multiple time.";
    echo json_encode($data);return;
}

$formLeads 	        = 	implode(',', $formLeadArr);

$sql 		        = 	"INSERT INTO fb_form_fields_mapping(page_id, form_id, fb_leads_structure, crm_leads_structure, created_by_id) VALUES ('$pageId','$formId','$formleads','$formLeads', '$createdBy')";

$commonDbSql        =   "INSERT INTO `facebook_ads_users`(`page_id`, `form_id`, `domain_name`) VALUES ('$pageId','$formId','$domainName')";

$commonDbResult     =   $databaseOperations->executeQueryOnCommonDatabase($commonDbSql);

$result 	        =   $databaseOperations->executeQuery($sql);

if( $result && $commonDbResult ){
    $data["error"]      = "false";
    $data["status"]     = "true";
    $data["msg"]        = "Integration has been successfully completed.";
    echo json_encode($data);return;
}else{
    $data["error"]  = "true";
    $data["status"] = "false";
    $data["msg"]    = "Oops! Somthing went to wrong.";
    echo json_encode($data);return;
}

/*CHECK DUPLICATE ARRAY ITEMS
	@par[1]   ->  $arry   [array]
	#return   ->  array
*/
function duplicateArryaItem(array $array) {

    return array_diff_assoc($array, array_unique($array));
}
?>