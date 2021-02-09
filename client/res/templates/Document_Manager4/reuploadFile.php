<?php
error_reporting(0);
if(isset($_POST['renamefile']))
{
	session_start();
	$files= $_SESSION['files'];
	$_FILES['attachment']=$files;
	$file_n=$_POST['f_name'];
	$fileSize= $_SESSION['filesize'];
	$fileType= $_SESSION['fileType'];
	$folderID= $_SESSION['folderID'];
	$assignUser=$_SESSION['assignUser'];
	$defineAccess=$_SESSION['defineAccess'];
	date_default_timezone_set('Asia/Kolkata');
	// $conn = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
	// if($conn->connect_error){
	// 	die("Connection Failed". $conn->connect_error);	
	// }

	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	$oldFileName= $_FILES['attachment']['name']['0'];
	rename('TEMP_FOLDER/'.$oldFileName, 'TEMP_FOLDER/'.$file_n);
	copy('TEMP_FOLDER/'.$file_n, 'upload/'.$file_n);
	$index=0;
	$uploads_dir = "upload/";
	$_FILES['attachment']['name']['0']= $file_n;
	move_uploaded_file($_FILES["attachment"]["tmp_name"][$index], $uploads_dir. basename($fileName= $name=$_FILES["attachment"]["name"]['0']));
	$result=mysqli_query($conn, "INSERT INTO document_master_3(folder_id, document_name, document_type, document_size, document_content, created_user_id, assigned_user_id, define_access, createdAt) VALUES ('".$folderID."', '".$file_n."', '".$fileType."', '".$fileSize."', NULL , 'Admin', '".$assignUser."', '".$defineAccess."', '".date("d-m-Y h:i:s A")."')");
	unlink('TEMP_FOLDER/'.$file_n);
	if($result)
			{
				echo"<script>
				alert('File updated successfully !!!!');
				history.go(-2);
				</script>";
			}
			else{
				echo"<script>alert('Something went wrong  !!');
				history.go(-2);</script>";
			}
}
?>