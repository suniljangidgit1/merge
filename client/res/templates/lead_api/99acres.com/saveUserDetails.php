<?php session_start();
$userName   = $_SESSION['Login'];

//get connection
//include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
// get super admin connection 
$filePath   = $_SERVER['DOCUMENT_ROOT'].'/data/config.php';

include($filePath);

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$user_name      =   $_POST['User_Name'];
$user_email     =   $_POST['User_Mail'];
$lead_sorce     =   $_POST['lead_sorce'];
$assigned_user  =   $_POST['assigned_user'];
$subdomain_url  =   $_SERVER['HTTP_HOST'];

$createdBy      =   getUserId($userName);

$sql    =   "SELECT id FROM `integrations_users` WHERE `lead_sorce` = '$lead_sorce' AND user_email = '$user_email'";
$result =   mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0)
{
    $data["error"]  = "true";
    $data["status"] = "false";
    $data["msg"]    = "Oops! Email id already exists. Please try another one.";
    echo json_encode($data);return;
}

$sql = "INSERT INTO `integrations_users`(`user_name`, `user_email`, `lead_sorce`,`created_by_id`, `assigned_user_id`, `subdomain_url`) VALUES ('$user_name','$user_email','$lead_sorce','$createdBy','$assigned_user', '$subdomain_url')";
$result=mysqli_query($conn,$sql);

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

function getUserId($userName) {
    include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
    $res            =   mysqli_query($conn, "SELECT id FROM user WHERE user_name='".$userName. "'");
    $row            =   mysqli_fetch_array($res);
    return $row['id'];
}
?>