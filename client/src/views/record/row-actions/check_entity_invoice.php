<?php

session_start();
error_reporting(~E_ALL);
$user_name = $_SESSION['Login'];
$entity_id=$_REQUEST['task_id'];
$entity_name=$_SESSION['name'];

if($entity_name=='Invoice')
echo '2';
else
echo '3';
?>