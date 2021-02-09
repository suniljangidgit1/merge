<?php

// CREATE COMMON DATABASE CONNECTIONS
// include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
$filePath      = '/var/www/html/crm.fincrm.net/crm/data/config.php';
// $filePath      = $_SERVER['DOCUMENT_ROOT'].'/data/config.php';
include($filePath);

$commonDbConn = mysqli_connect($servername, $username, $password, $dbname);

// CHECK CONNECTION
if (!$commonDbConn) {
  die("Connection failed: " . mysqli_connect_error());
}

$challenge      =   $_REQUEST['hub_challenge'];
$verify_token   =   $_REQUEST['hub_verify_token'];

if ($verify_token === "abc1234") {
  print_r($challenge);
}

$data = file_get_contents('php://input');

 //     //error_log(print_r($data, true));
 //    $myFile = fopen("a2.txt", "w" );
 //    fwrite($myFile, "Hi16 -> ".$_REQUEST."input:".$data."challenge:".$challenge.'request:'.$_REQUEST."post".$_POST.'GET:'.$_GET);
 //    fclose($myFile);


//$data = '{"object": "page", "entry": [{"id": "443194073112437", "time": 1588831374, "changes": [{"value": {"form_id": "232086651384014", "leadgen_id": "3380278028670655", "created_time": 1588831373, "page_id": "443194073112437"}, "field": "leadgen"}]}]}';

$data_array   =   json_decode($data,true);
$form_id      =   $data_array['entry'][0]['changes'][0]['value']['form_id'];
$leadgen_id   =   $data_array['entry'][0]['changes'][0]['value']['leadgen_id'];
$page_id      =   $data_array['entry'][0]['changes'][0]['value']['page_id'];

$sql          =   "INSERT INTO facebook_ads_webhook(form_id, leadgen_id, page_id) VALUES ('$form_id', '$leadgen_id', '$page_id')";
$result       =   mysqli_query($commonDbConn, $sql);

if( $result ) {
 echo "inserted successfully";
} else {
   echo "Error: " . $sql . "<br>" . mysqli_error($commonDbConn);
}
?>