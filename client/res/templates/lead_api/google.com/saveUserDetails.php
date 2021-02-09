<?php session_start();
$userName= $_SESSION['Login'];

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

$google_key             =   $_POST['google_key'];
$google_lead_structure  =   $_POST['google_fields_name'];
$google_fields_name     =   explode(',', $google_lead_structure);
$assigned_user          =   $_POST['assigned_user'];

$res            =   mysqli_query($conn, "SELECT id FROM user WHERE user_name='".$userName. "'");
$row            =   mysqli_fetch_array($res);
$createdBy      =   $row['id'];

foreach($google_fields_name as $row)
{
    $crm_leads_form_array[] = $_POST[$row];
}
$crm_leads_form = implode(',', $crm_leads_form_array);

$sql = "INSERT INTO google_form_fields_mapping(google_key, google_lead_structure, crm_leads_structure,`created_by_id`, `assigned_by_id`) VALUES ('$google_key','$google_lead_structure','$crm_leads_form','$createdBy','$assigned_user')";

$result = mysqli_query($conn, $sql);
if($result){
    $data["error"]      = "false";
    $data["status"]     = "true";
    $data["msg"]        = "Integration has been successfully completed.";
    echo json_encode($data);return;
}else{
    $data["error"]  = "true";
    $data["status"] = "false";
    $data["msg"]    = "Oops! Somthing wen't to wrong.";
    echo json_encode($data);return;
}

// connection closing
mysqli_close($conn);
?>