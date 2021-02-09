<?php
	session_start();
	error_reporting(0);
	echo "IN upload_into_db ";
	
	echo "Folder ID= ".$_GET['folder'];
	$folderId= $_GET['folder'];
	echo "<br>";
	echo "USER LIST = ".$_GET['users'];
	$users= $_GET['users'];
	echo "<br>";
	//print_r($_SESSION['arrayForDuplicateFiles']);
	echo "<br>";
	print($_GET['files']);
	echo "<br>";
	
	$arrayForDuplicatesFile= array();
	$arrayForDuplicateFileSize= array();
	$arrayForDuplicateFileType= array();

	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	// $conn = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
	// if($conn->connect_error){
	// 	die("Connection Failed ". $conn->connect_error);
	// }
	
	$fileArr= array();
	$fileArr=preg_split ("/\,/", $_GET['files']);
	
	for($i=0; $i<count($fileArr); $i++){
		$fileName= $fileArr[$i];  
		
		// CHECK DUPLICATE ENTRY FOR FILES WITHIN SAME FOLDER...
		
		$res1= mysqli_query($conn, "SELECT * FROM document_master WHERE document_name='".$fileName."' AND folder_id='".$folderId."'");
		while($row1= mysqli_fetch_array($res1)){
			$fileNameFromDB= $row1['document_name'];
			if($fileNameFromDB === $fileName){
				copy("upload/".$fileNameFromDB, "TEMP_FOLDER/".$fileNameFromDB);
				
				$path="upload/".$fileNameFromDB;
				$fileSizeFromDB= filesize($path);
				$fileTypeFromDB=pathinfo($fileNameFromDB, PATHINFO_EXTENSION);
				$arrayForDuplicatesFile[]=$fileNameFromDB;
				$arrayForDuplicateFileSize[]=$fileSizeFromDB;
				$arrayForDuplicateFileType[] = $fileTypeFromDB;
				$_SESSION['duplicatesFilesArray']= $arrayForDuplicatesFile;
				$_SESSION['arrayForDuplicateFilesSize']= $arrayForDuplicateFileSize;
				$_SESSION['arrayForDuplicateFilesType']= $arrayForDuplicateFileType;
				$_SESSION['folderID']=$folderId;
				$_SESSION['users']=$users;
			}
		}
			
		/////////////////////////////////////////////////////////
		
		if($arrayForDuplicatesFile){
		echo "<script type='text/javascript'>";
					echo "var msg = confirm(' file with same name already exists, do you still want to upload?');
						 //alert('MSG VALUE== '+msg);
						 if(msg == true ){
							window.location='uploadDuplicateFile.php';
							//window.location='renameFile.php';
							var url='renameFiles.php';
							//window.open(url,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=700,height=700,directories=no,location=no'); 
						 }
						 if(msg == false ){
							//alert('<?php saveFiles(); ?>');
							window.location= 'renameFile.php';
							//var url='localhost:8080/DMS/uploadFile.php';
							//window.open(url,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=700,height=700,directories=no,location=no'); 			
						 }	
							";
					echo "</script>";
		
		}else{
				
				$path="upload/".$fileName;
				$fileSize= filesize($path);
				$fileType=pathinfo($fileName, PATHINFO_EXTENSION);
				echo "<br>";
				echo $i;
				echo "<br>";
				echo "FILE NAME= ". $fileName;
				echo "<br>";
				echo "FILE SIZE= ". $fileSize;
		
				$res= mysqli_query($conn, "INSERT INTO document_master(folder_id, document_name, document_type, document_size, document_content, created_user_id, assigned_user_id, define_access, createdAt) VALUES ('".$folderId."', '".$fileName."', '".$fileType."', '".$fileSize."', NULL , 'admin', '".$users."', 'download', '".date("d-m-Y h:i:s A")."')");
			}
		
		
		
	}
	unset($duplicatesFilesArray);
	unset($arrayForDuplicateFileType);
	unset($arrayForDuplicateFileSize);
	echo "<script>alert('File Uploaded successfully !!!');</script>";
	/* echo "<br>FILE NAMES = ";
	print_r($arrayForDuplicatesFile);
	echo "<br>FILE SIZE = ";
	print_r($arrayForDuplicateFileSize);
	echo "<br>FILE TYPE = ";
	print_r($arrayForDuplicateFileType); */
	//print_r($_SESSION['arrayForDuplicateFilesSize']);
?>