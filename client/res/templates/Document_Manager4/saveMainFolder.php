<?php
	session_start();
	error_reporting(0);
	$userName=$_SESSION["Login"];
	$mainFolderId= $_SESSION['mainFolderId'];	
	// $conn = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
	// if($conn->connect_error){
	// 	die("Connection Failed ". $conn->connect_error);	
	// }

	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	$folderName= $_POST['folderName'];
	$assignedUser=$_POST['user'];
	$userAccess= $_POST['userAccess'];
	$sql= "SELECT * FROM folder_master WHERE folder_name='".$_POST['folderName']."'";
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
	}else{
		date_default_timezone_set('Asia/Kolkata');
		$folderName= $_POST['folderName'];
		$createdBy = $userName;
		$assignedUserId= $_POST['user'];
		$defineAccess= $_POST['userAccess'];
		mysqli_query($conn, "INSERT INTO folder_master(folder_name, created_user_id, assigned_user_id, define_access, createdAt) VALUES ('".$folderName."', '".$createdBy."', '".$assignedUserId."', '".$defineAccess."', '".date("Y-m-d H:i:s")."')");
		header('location:successforFolder.html');
	}	
?>