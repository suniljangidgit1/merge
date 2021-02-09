<?php
	
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	$arrForRegistredDomain = array();
	$arrForAllocatedSMS= array();
	$res= mysqli_query($conn, "SELECT * FROM user_registration");
	while($row= mysqli_fetch_array($res)){
		$arrForRegistredDomain[]= $row['domain'];	
		$arrForAllocatedSMS[]= $row['numberofsms'];
	}
	
	for($i=0; $i<count($arrForRegistredDomain); $i++){
		$domain= $arrForRegistredDomain[$i];
		$no_of_sms= $arrForAllocatedSMS[$i];
		echo $domain . "<br>";
		//$result1=mysqli_query();
		
		$result= mysqli_query($conn, "SELECT count(*) FROM sms_reminder WHERE folder_name='".$domain."'");
		
		$row=mysqli_fetch_array($result);
		
		$count= $row['count(*)'];
		
		echo "<br>";
		echo $count. "<br>";
		$remaning_sms=$no_of_sms-$count;
		echo "REMANING SMS = ". $remaning_sms;
			
		mysqli_query($conn, "UPDATE user_registration SET remaning_sms='".$remaning_sms."' WHERE domain='".$domain."'");
	}

?>