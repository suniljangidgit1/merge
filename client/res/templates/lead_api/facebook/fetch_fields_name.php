<?php
//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$sql = "SELECT * FROM facebook_ads_leads_data";
$except_fields = array('id','all_data','leadgen_id','created_date','updated_date','delete_status');
if ($result = mysqli_query($conn, $sql)) {
  while ($fieldinfo = mysqli_fetch_field($result)) {
  	if(!in_array($fieldinfo->name, 
  		$except_fields))
  	{
  		echo $fieldinfo->name.'<br>';
  	}
  }
}

mysqli_close($conn);
?>