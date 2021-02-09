<?php
	session_start();
	error_reporting(0);
	$userName=$_SESSION["Login"];
	$files= $_SESSION['files'];
	$_FILES['attachment']=$files;
	$file_n=$_POST['f_name'];
	$fileSize= $_SESSION['filesize'];
	$fileType= $_SESSION['fileType'];
	$folderID= $_SESSION['folderID'];
	$assignUser=$_SESSION['users'];
	$defineAccess="download";
	
	$arrayForDuplicateFileSize=$_SESSION['arrayForDuplicateFilesSize'];
	$arrayForDuplicateFileType=$_SESSION['arrayForDuplicateFilesType'];
	
	$duplicatesFilesArray=$_SESSION['duplicatesFilesArray'];
	date_default_timezone_set('Asia/Kolkata');

	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
	
	// $conn = mysqli_connect('localhost', 'root', 'root', 'dms');
	// if($conn->connect_error){
	// 	die("Connection Failed". $conn->connect_error);	
	// }
	//$oldFileName= $_FILES['attachment']['name']['0'];
	//rename('TEMP_FOLDER/'.$oldFileName, 'TEMP_FOLDER/'.$file_n);
	
	
	//$index=0;
	$uploads_dir = "upload/";
	//$file_n=$_FILES['attachment']['name']['0'];
	for($i=0; $i<count($duplicatesFilesArray); $i++)
	{
		$file_n= $duplicatesFilesArray[$i];
		copy('TEMP_FOLDER/'.$file_n, 'upload/'.$file_n);
		$fileType= $arrayForDuplicateFileType[$i];
		$fileSize= $arrayForDuplicateFileSize[$i];
		//move_uploaded_file($_FILES["attachment"]["tmp_name"][$index], $uploads_dir. basename($fileName= $name=$_FILES["attachment"]["name"]['0']));
		mysqli_query($conn, "INSERT INTO document_master(folder_id, document_name, document_type, document_size, document_content, created_user_id, assigned_user_id, define_access, createdAt) VALUES ('".$folderID."', '".$file_n."', '".$fileType."', '".$fileSize."', NULL , '".$userName."', '".$assignUser."', '".$defineAccess."', '".date("d-m-Y h:i:s A")."')");
		unlink('TEMP_FOLDER/'.$file_n);
	}
	unset($duplicatesFilesArray);
	unset($arrayForDuplicateFileType);
	unset($arrayForDuplicateFileSize);
	header('location:index.php');
	
?>