<?php
	session_start();
	error_reporting(0);
	$id=$_SESSION['fileID'];
	$newfileName= $_POST['fileName'];
	$assignUser= $_POST['assignUser'];
	$access= $_POST['userAccess'];
	$filename="";
	$withoutExtOldFile = preg_replace('/\\.[^.\\s]{3,4}$/', '', $_SESSION['old_file_name']);
	$withoutExtNewFile = preg_replace('/\\.[^.\\s]{3,4}$/', '', $newfileName);
	$path= "upload/".$newfileName;
	
	$data=array();
	$defineaccessData=array();
	
	$data[0]=$assignUser;
	$defineaccessData[0]=$access;
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
			 
			 $datauser=implode(",",$data);
			 $dataaccess=implode(",",$defineaccessData);
		//	 echo $datauser." ".$dataaccess;
	
	
	$old_file_extension=end(explode(".", $_SESSION['old_file_name']));
	$new_file_extension=end(explode(".", $newfileName));
	$oldFileTorename= $withoutExtOldFile.".".$old_file_extension;
	$newFileTorename= $withoutExtNewFile.".".$new_file_extension; 
	rename("upload/".$oldFileTorename, "upload/".$newFileTorename);
	// $conn = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
	// if($conn->connect_error){
	// 	die('Connection Failed:' . $conn->connect_error);	
	// }

	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
	
	mysqli_query($conn, "UPDATE document_master SET document_name='".$newfileName."', assigned_user_id='".$datauser."', define_access='".$dataaccess."' WHERE id='".$id."'");
	header('location:successForUpdateFile.html');
	
?>