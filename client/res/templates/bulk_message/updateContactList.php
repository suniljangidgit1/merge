<?php
//set timezone
date_default_timezone_set('UTC'); 

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

$list_id		=	$_POST['list_id'];
$list_name 		=	$_POST['list_name'];
$modified_at	=	date("Y-m-d h:i:s ");

if(!$list_name){
    $data["error"]  = "true";
    $data["status"] = "false";
    $data["msg"]    = "Oops! List Name is required";
    echo json_encode($data);return;
}

$sql = "SELECT id from contact_list WHERE listname = '$list_name' AND deleted = '0' AND id !='$list_id'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){
    $data["error"]  = "true";
    $data["status"] = "false";
    $data["msg"]    = "Oops! List Already exists";
    echo json_encode($data);return;
}

$sql="UPDATE contact_list SET modified_at='$modified_at',listname='$list_name' WHERE id = '".$list_id."'";

$result=mysqli_query($conn,$sql);

if($result){
    $data["error"]  	= "false";
    $data["status"] 	= "true";
    $data["msg"]    	= "Contact List Updated!";
    $data["list_id"] 	= $list_id;
    $data["list_name"]	= $list_name;
    echo json_encode($data);return;
}else{
    $data["error"]  = "true";
    $data["status"] = "false";
    $data["msg"]    = "Oops! Contact List Already Created";
    echo json_encode($data);return;
}

?>