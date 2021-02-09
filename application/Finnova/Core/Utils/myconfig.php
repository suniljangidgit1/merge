<?php

$HTTP_HOST 		= $_SERVER['SERVER_NAME'];
$servername 	= "164.52.205.204";
$username 		= "proadmin";
$password 		= 'mJmxCj*92WuFcfB_';
$dbname 		= "crmdev";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

//$sql = "SELECT * FROM host_record where status=2";
if($HTTP_HOST=='164.52.205.201'){
	$sql = "SELECT * FROM host_record where domain_url like '%$HTTP_HOST%' AND status=2";
}else{
	$sql = "SELECT * FROM host_record where domain_url like '%$HTTP_HOST%' AND status=1";
}

$domainName='';
$result = mysqli_query($conn, $sql);
$HostResult=mysqli_fetch_array($result,MYSQLI_ASSOC);


$domainName 		= '';
$result 			= $conn->query($sql);
$HostResult 		= mysqli_fetch_array($result,MYSQLI_ASSOC);

$configSetting		= $HostResult['config_details']; 
$configSetting 		= stripslashes(html_entity_decode($configSetting));
$finalConfigArray 	= json_decode($configSetting,TRUE);
$testconfigfile 	= '';
$cacheDataPath 		= '';
// echo "HOST NAME = ". $HostResult['domain_url']; die;
if($HostResult['domain_url']==$HTTP_HOST){

	$db 			= $finalConfigArray['database']['dbname'];
	$domainName 	= $db.'/';
	$user 			= $finalConfigArray['database']['user'];
	$password 		= $finalConfigArray['database']['password'];
	$passwordSalt 	= $finalConfigArray['passwordSalt'];
	$siteUrl 		= $finalConfigArray['siteUrl'];
	$cryptKey 		= $finalConfigArray['cryptKey'];
	$hashSecretKey 	= $finalConfigArray['hashSecretKey'];


	if($HTTP_HOST=='164.52.205.201'){
		$testconfigfile='data/defaultconfig.php';
		$cacheDataPath='default';
	}else if($HTTP_HOST=='dev.fincrm.net'){
		$testconfigfile='data/myoffice_config.php';
		$cacheDataPath='myoffice';
	}
	else{
		// echo 'data/'.$db.'_config.php'; die;
		$testconfigfile='data/'.$db.'_config.php';
		$cacheDataPath=$db;
	}
}
?>