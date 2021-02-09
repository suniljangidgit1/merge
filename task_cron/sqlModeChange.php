<?php
//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

$res= mysqli_query($conn, "SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");

if($res){
    echo "true";
}else{
    echo mysqli_error($conn);
}