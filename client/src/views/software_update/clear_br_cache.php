<?php

$currentDomain = $_GET['currentDomain'];

if($_GET['currentDomain'] != ""){
// include "..\..\..\..\bootstrap.php";
include ($_SERVER['DOCUMENT_ROOT']."/bootstrap.php");

$app = new \Finnova\Core\Application();
$app->runClearCache();
$app->runRebuild();

$current_date = Date("Y-m-d H:i:d");
$version      = $_GET['version'];
$description  = $_GET['description'];
$domain       = explode(".",$currentDomain);
$domain       = $domain[0];
include($_SERVER['DOCUMENT_ROOT'].'/data/config.php');  
$sqlcomm = "UPDATE software_update SET s_update_status = 0, s_modified_at = '".$current_date."', version = '".$version."', description = '".$description."' WHERE s_domain_name = '".$domain."' ";
$result = mysqli_query($conn,$sqlcomm);

echo json_encode($result);
}
?>