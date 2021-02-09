<?php

//INCLUDE CUSTOM FUNCTION
include($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/email_reminder/customFunctions.php');

$zipPath      =   $_SERVER["DOCUMENT_ROOT"]."/client/res/templates/reminder/zipFolder/";

//delete existing files
if( is_dir($zipPath) ) {
    deleteDir($zipPath);
}

$extractPath =  $_SERVER["DOCUMENT_ROOT"]."/client/res/templates/reminder/uploads/";
if( is_dir($extractPath) ) {
    deleteDir($extractPath);
}

$json   		=   true;
$data['status'] = 'true';
$data['msg'] 	= 'empty record succussfully';
echo json_encode($data);return;
?>