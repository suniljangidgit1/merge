<?PHP
	
	$id= $_GET['id'];
	$record_id= $_GET['record_id'];
	$entityName= preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s','', $_GET['entityName']);
	$tableName= strtolower(preg_replace('/\B([A-Z])/', '_$1', $entityName));
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	//echo "SELECT * FROM '".$tableName."' WHERE id='".$record_id."'";
	$assignedUser="";
	$res = mysqli_query($conn, "SELECT * FROM $tableName WHERE id='".$record_id."'");
	while($row = mysqli_fetch_array($res)){
	$assignedUser= $row['assigned_user_id'];
	}
	//echo $assignedUser;
	
	$res1=mysqli_query($conn, "SELECT * FROM subscription WHERE id='".$id."'");
	$row1= mysqli_fetch_array($res1);
	
	$userId= $row1['user_id'];
	
	///echo $user_id;
	
	if($assignedUser==$userId){
		echo 2;
	}else{
		echo 3;
	}
	//echo $id;
	//$res1 = mysqli_query();		

?>