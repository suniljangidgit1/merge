<?php

/*
* DATABASE CONNECTION
* THIS IS DB CONFIG FOR DATABSE CONNECTIVITY
* NAME 	: dbConfig.php 
*/
date_default_timezone_set("Asia/Kolkata");
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
$dbConn = $conn;