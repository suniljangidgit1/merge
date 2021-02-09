<?php
	session_start();
	$oldFolderName= $_SESSION['oldFolderName'];
	// $conn = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
	// if($conn->connect_error){
	// 	die("Connection failed: " . $conn->connect_error);	
	// }

	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	$id= $_SESSION['folderId'];
	$folderName= $_POST['folderName'];
	$assignUser= $_POST['assignUser'];
	$accessUser= $_POST['userAccess'];
	//echo $assignUser." ".$accessUser;
	$data=array();
	$defineaccessData=array();
	
	$data[0]=$assignUser;
	$defineaccessData[0]=$accessUser;
	$extrausersession=$_POST['usercount'];
	//echo $extrausersession;
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
			  $datauser_array = array_filter($data); 
			 $dataaccess_array = array_filter($defineaccessData);
			 $datauser=implode(",",$datauser_array);
			 $dataaccess=implode(",",$dataaccess_array);
			// echo $datauser." ".$dataaccess;
	
	mysqli_query($conn, "UPDATE sub_folder_master SET folder_name='".$folderName."', assigned_user_id='".$datauser."', defineAccess='".$dataaccess."' WHERE id='".$id."'");
	header('location:successforUpdateFolder.html');	
?>