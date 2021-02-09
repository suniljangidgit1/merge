<?php
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	$arrForUsers= array();
	$res= mysqli_query($conn, "SELECT * FROM user WHERE deleted='0' AND is_portal_user='0' AND is_active='1' AND password!=''  ORDER BY first_name ASC");
	while($row= mysqli_fetch_array($res)){
		$id=$row['id'];
		$fN= $row['first_name'];
		$lN= $row['last_name'];
		$arrForUsers[]=array("id" => $row['id'], "firstName" => $fN, "lastName" => $lN);
	}
	
	echo json_encode($arrForUsers,true);
?>