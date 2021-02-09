<?php
//print_r($_SERVER);die;
$HTTP_HOST= $_SERVER['SERVER_NAME'];
//$HTTP_HOST=$_SERVER['HTTP_HOST'];
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "crmv2dev";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

//$sql = "SELECT * FROM host_record where status=2";
if($HTTP_HOST=='localhost'){
$sql = "SELECT * FROM host_record where domain_url like '%$HTTP_HOST%' AND status=2";
    
}else{
$sql = "SELECT * FROM host_record where domain_url like '%$HTTP_HOST%' AND status=1";
}
$result = $conn->query($sql);
$HostResult=mysqli_fetch_array($result,MYSQLI_ASSOC);

   $configSetting=$HostResult['config_details']; 
  
//
 $configSetting = stripslashes(html_entity_decode($configSetting));
  $finalConfigArray=json_decode($configSetting,TRUE);
$testconfigFile='';
//print_r($finalConfigArray); 
//die;
if($HostResult['domain_url']==$HTTP_HOST){
	$db=$finalConfigArray['database']['dbname'];
	$user=$finalConfigArray['database']['user'];
	$password=$finalConfigArray['database']['password'];
	$passwordSalt=$finalConfigArray['passwordSalt'];
	$siteUrl=$finalConfigArray['siteUrl'];
	$cryptKey=$finalConfigArray['cryptKey'];
	$hashSecretKey=$finalConfigArray['hashSecretKey'];
	$testconfigFile=$db."_config.php";
}

?>
