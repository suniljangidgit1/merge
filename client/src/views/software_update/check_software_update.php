<?php 
include($_SERVER['DOCUMENT_ROOT']."/task_cron/fincrmWebsiteConnection.php");

$currentDomain = $_GET['currentDomain'];
$domain = explode(".",$currentDomain);
$domain = $domain[0];
$res = mysqli_query($conn, "SELECT u_id FROM users WHERE u_domain_name = '".$domain."'");
while($row = mysqli_fetch_assoc($res)){
  $u_id=  $row['u_id'];

}

include($_SERVER['DOCUMENT_ROOT']."/data/config.php");
$sql="SELECT * FROM `software_versions` ORDER BY id DESC 
                        LIMIT 1";
$result=mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result)){
       $s_version = $row['s_version'];
       $s_description = $row['s_description'];
}

$sofwareResp = array();

$sql1="SELECT `s_update_status` FROM `software_update` WHERE s_user_id = '".$u_id."'";
$result=mysqli_query($conn,$sql1);
// print_r($sql1);
while($row = mysqli_fetch_assoc($result)){
	 $software_update = $row['s_update_status'];
 	
}

$sofwareResp = array(
   "software_update" => isset($software_update) ? $software_update : "",
   "s_version" => isset($s_version) ? $s_version : "",
   "s_description" => isset($s_description) ? $s_description : "",
 );
echo json_encode($sofwareResp);exit;
