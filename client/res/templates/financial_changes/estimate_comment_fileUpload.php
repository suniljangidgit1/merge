<?php
error_reporting(~E_ALL);
//Estimate Feedback File upload
function estimate_feedback_file_upload(){
$data["error"] = "true";
$data["status"] = "false";
$data["msg"] = "Invalid request.";
if(!empty($_FILES['feedback_attachment']['name'][0]) )
{
	// echo "hi in file upload";
$target_dir = 'feedback/uploads/';

if(!is_dir($target_dir))
{
	// echo "in chk dir";
mkdir($target_dir, 0777, true);
}

$index = 0;
foreach($_FILES['feedback_attachment']['name'] as $filename) {
$innerFileName = str_replace(' ', '_', $filename);
$target_file = $target_dir.$innerFileName;
move_uploaded_file($_FILES['feedback_attachment']['tmp_name'][$index], $target_file);
$index++;
}

$data["error"] = "false";
$data["status"] = "true";
$data["msg"] = "Please try later.";
return $data;
}
return $data;
}

function estimate_feedback_delete_current_file(){
$data["error"] = "true";
$data["status"] = "false";
$data["msg"] = "Invalid request.";
$target_dir = 'feedback/uploads/'.$_GET["deleteFile"];

if(file_exists($target_dir)){
unlink($target_dir);
$data["error"] = "false";
$data["status"] = "true";
$data["msg"] = "Please try later.";
return $data;
}

return $data;

}

function estimate_feedback_deleteFolder(){
$data["error"] = "true";
$data["status"] = "false";
$data["msg"] = "Invalid request.";

$filePath1 = $_SERVER['DOCUMENT_ROOT'].'/client/res/templates/financial_changes/estimate/uploads';

if( !empty($filePath1)){
foreach(glob($filePath1.'/*.*') as $v){
unlink($v);
}

$data["error"] = "false";
$data["status"] = "true";
$data["msg"] = "files deleted Successfully.";
return $data;

}
return $data;
}

$methodName = isset( $_POST["methodName"] ) ? $_POST["methodName"] : NULL ;
$methodName1 = isset( $_GET["methodName"] ) ? $_GET["methodName"] : NULL ;

if($methodName=="estimate_feedback_file_upload"){
$response = estimate_feedback_file_upload();
echo json_encode($response);return;
}
elseif($methodName1=="estimate_feedback_delete_current_file"){
$response = estimate_feedback_delete_current_file();
echo json_encode($response);return;
}
elseif($methodName1=="estimate_feedback_deleteFolder"){
$response = estimate_feedback_deleteFolder();
echo json_encode($response);return;
}


?>