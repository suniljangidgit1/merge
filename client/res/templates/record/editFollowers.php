<?php
	//echo "IN editFollowers.php";
	$id= $_GET['id'];
	$entityName= preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s','', $_GET['entityName']);
	
	//echo "ENTITY ID= ". $id;
	//echo "ENTITY NAME= ". $entityName;
	
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	$arrForFollowers= array();
	$res= mysqli_query($conn, "SELECT * FROM subscription WHERE entity_id='".$id."'");
	while($row= mysqli_fetch_array($res)){
		//echo "Entity id= ". $row['user_id']. "<br>";
		//$output.="<div><table><tr><td>Name</td></td>Achyut</td></tr></table></div>"; 
		$res1= mysqli_query($conn, "SELECT * FROM user  WHERE id='".$row['user_id']."'");
		$row1= mysqli_fetch_array($res1);
		$fN= $row1['first_name'];
		$lN= $row1['last_name'];
		
		$fullName= $fN ." ". $lN;
		
		$arrForFollowers[]=array("id" => $row['id'], "firstName" => $fN, "lastName" => $lN);
		//asort($arrForFollowers['firstName']);
 
	}
	//asort($arrForFollowers['firstName']);
	//if(count($arrForFollowers)!=0){
	echo json_encode($arrForFollowers, true);
	//}
?>









