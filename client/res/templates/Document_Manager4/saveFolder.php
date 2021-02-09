<?php
	error_reporting(0);
	session_start();	
	//echo $_POST['folderName'];
	//echo "<br>";
	$userName=$_SESSION["Login"];
	// $conn= mysqli_connect('localhost', 'root', 'root', 'fincrm');;
	// if($conn->connect_error){
	// 	die('Connection Failed'. $conn->connect_error);
	// }

	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
	
	/// Check duplicate Entry.....
	$sql= "SELECT * FROM folder_master_3 WHERE folder_name='".$_POST['folderName']."'";
	$result= mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	
	
	
	$folderNameFromDB= $row['folder_name'];
	$_SESSION['folderName']=$_POST['folderName'];
	$_SESSION['assignUser']=$_POST['user'];
	$_SESSION['userAccess']= $_POST['userAccess'];
	if($folderNameFromDB == $_POST['folderName']){
		echo "<script type='text/javascript'>";
		echo "var msg = confirm('".$_POST['folderName']." folder with same name already exists, do you still want to create duplicate folder?');
				if(msg== true){
					window.location= 'saveFolderInDB.php';
				}
				if(msg == false ){
					window.location= 'renameFolder.php';
				} 
				";
		echo "</script>";
	}
		 //echo $msg;
		 $data=array();
		$defineaccessData=array();
		
		date_default_timezone_set('Asia/Kolkata');
		$folderName= $_POST['folderName'];
		$createdBy =$userName;
		$assignedUserId= $_POST['user'];
		$defineAccess= $_POST['userAccess'];
		
		$data[0]=$assignedUserId;
		$defineaccessData[0]=$defineAccess;
		//assign more user name
		$extrausersession=$_POST['usercount'];
		//$data=$assignedUserId;
		//$defineaccessData=$defineAccess;
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
			
			   
			 //echo $datauser." ".$dataaccess;
		//echo $folderName. " / " . $createdBy. " / " .$assignedUserId . " / ". $defineAccess;
		
		mysqli_query($conn, "INSERT INTO folder_master_3(folder_name, created_user_id, assigned_user_id, define_access, createdAt) VALUES ('".$folderName."', '".$createdBy."', '".$datauser."', '".$dataaccess."', '".date("d-m-Y h:i:s A")."')");
		//echo"<script type='text/javascript'> document.getElementById('myDialog').showModal();</script>";
		
		header('location:successforFolder.html');
		
	
?>
