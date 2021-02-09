<?php
	session_start();
	error_reporting(0);
	$userName=$_SESSION["Login"];
	date_default_timezone_set('Asia/Kolkata');
	// $conn= mysqli_connect('localhost', 'root', 'root', 'fincrm');;
	// if($conn->connect_error){
	// 	die("Connection Failed ". $conn->connect_error);
	// }
	
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	$subFolderName= $_POST['subFolderName'];
	$folderID=$_SESSION['subFolderID'];
	$assignedUserId= $_POST['assignUser'];
	$defineAccess= $_POST['userAccess'];
	
	$data=array();
	$defineaccessData=array();
	
	$data[0]=$assignedUserId;
	$defineaccessData[0]=$defineAccess;	
	$extrausersession=$_POST['usercount'];
	$temp_cnt=0;
			
			for($i=1; $i<=$extrausersession;$i++)
			{
				if($i==$extrausersession)
				{
					$data[$i]=$_POST['extrausername'.$i];
					$defineaccessData[$i]=$_POST['extradefineaccess'.$i];
				}
				else
				{
					$data[$i]=$_POST['extrausername'.$i];
					$defineaccessData[$i]=$_POST['extradefineaccess'.$i];
				}
				
			}
			 
			 $datauser=implode(",",$data);
			 $dataaccess=implode(",",$defineaccessData);
		//	 echo $datauser." ".$dataaccess;
	// $conn = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
	// if($conn->connect_error){
	// 	die("Connection Failed ". $conn->connect_error);
	// }
	mysqli_query($conn , "INSERT INTO sub_folder_master_3(folder_master_id, folder_name, created_user_id, assigned_user_id, defineAccess, createdAt) VALUES('".$folderID."', '".$subFolderName."', '".$userName."', '".$datauser."', '".$dataaccess."', '".date("d-m-Y h:i:s A")."')");
	header('location: successforFolder.html');
?>