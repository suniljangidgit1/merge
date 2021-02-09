<?php
error_reporting(0);
//     session_start();
//     $userName=$_SESSION["Login"];
    
//     if($userName=="admin"){
//         $folderID=$_GET['id'];
//     	$conn= mysqli_connect('localhost', 'root', 'root', 'fincrm');;
//     	if($conn->connect_error){
//     		die("Connection Failed".$conn->connect_error);
//     	}
//     	$sql= "SELECT * FROM sub_folder_master WHERE id='".$folderID."'";
//     	$result= mysqli_query($conn, $sql);
//     	$row= mysqli_fetch_array($result);
//     	$folderName= $row['folder_name'];
//     	/// CODE FOR GET FILES RELATED TO FOLDER NAME...
//     	$resultForGetFiles= mysqli_query($conn, "SELECT * FROM document_master WHERE folder_id='".$folderID."'");
//     	$zipname = $folderName.'.zip';
//     	if(file_exists($zipname)){
//     	    unlink($zipname);    
//     	}
//     	$zip = new ZipArchive;
//         $zip->open($zipname, ZipArchive::CREATE);
//     	while($rowForGetFiles= mysqli_fetch_array($resultForGetFiles)){
//     		$zip->addFile("upload/".$rowForGetFiles['document_name']);
//     	}
//     	$zip->close();
//     	header('Content-Type: application/zip');
//         header("Content-Disposition: attachment; filename='adcs.zip'");
//         header('Content-Length: ' . filesize($zipname));
//         header("Location: ".$folderName.".zip");    
//     }else{
//         $folderID=$_GET['id'];
//     	$conn= mysqli_connect('localhost', 'root', 'root', 'fincrm');;
//     	if($conn->connect_error){
//     		die("Connection Failed".$conn->connect_error);
//     	}
//     	$sql= "SELECT * FROM sub_folder_master WHERE id='".$folderID."'";
//     	$result= mysqli_query($conn, $sql);
//     	$row= mysqli_fetch_array($result);
//     	$folderName= $row['folder_name'];
//     	$defineAccess= $row['defineAccess'];
//     	if($defineAccess=="Download"){
//     	    /// CODE FOR GET FILES RELATED TO FOLDER NAME...
//         	$resultForGetFiles= mysqli_query($conn, "SELECT * FROM document_master WHERE folder_id='".$folderID."'");
//         	$zipname = $folderName.'.zip';
//         	if(file_exists($zipname)){
//         	    unlink($zipname);    
//         	}
//         	$zip = new ZipArchive;
//             $zip->open($zipname, ZipArchive::CREATE);
//         	while($rowForGetFiles= mysqli_fetch_array($resultForGetFiles)){
//         		$zip->addFile("upload/".$rowForGetFiles['document_name']);
//         	}
//         	$zip->close();
//         	header('Content-Type: application/zip');
//             header("Content-Disposition: attachment; filename='adcs.zip'");
//             header('Content-Length: ' . filesize($zipname));
//             header("Location: ".$folderName.".zip");        
//     	}else if($defineAccess=="Both"){
//     	    /// CODE FOR GET FILES RELATED TO FOLDER NAME...
//         	$resultForGetFiles= mysqli_query($conn, "SELECT * FROM document_master WHERE folder_id='".$folderID."'");
//         	$zipname = $folderName.'.zip';
//         	if(file_exists($zipname)){
//         	    unlink($zipname);    
//         	}
//         	$zip = new ZipArchive;
//             $zip->open($zipname, ZipArchive::CREATE);
//         	while($rowForGetFiles= mysqli_fetch_array($resultForGetFiles)){
//         		$zip->addFile("upload/".$rowForGetFiles['document_name']);
//         	}
//         	$zip->close();
//         	header('Content-Type: application/zip');
//             header("Content-Disposition: attachment; filename='adcs.zip'");
//             header('Content-Length: ' . filesize($zipname));
//             header("Location: ".$folderName.".zip");        
//     	}else{
//     	    echo "<script type='text/javascript'>";
// 		    echo "alert('You dont have permission to download this file...');
// 					window.location='index.php'	;
// 			";
// 			echo "</script>";
//     	}
    	
//     }
	
	//Include the library
	require_once 'server/php/AESCryptFileLib.php';

	//Include an AES256 Implementation
	require_once 'server/php/aes256/MCryptAES256Implementation.php';

	//Construct the implementation
	$mcrypt = new MCryptAES256Implementation();

	//Use this to instantiate the encryption library class
	$lib = new AESCryptFileLib($mcrypt);



//	echo "DOWNLOAD SUB FOLDER";
	//$_GET['id']=17;
	$id= $_GET['id'];
	echo "<br>";
//	$id='1193';

	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	// $conn = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
	// if($conn->connect_error){
	// 	die("Connection Failed". $conn->connect_error);
	// }
	
	$res= mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE id='".$id."'");
	while($row= mysqli_fetch_array($res)){
		$folderName= $row['folder_name'];
		$id1= $row['id'];
		
		mkdir("for_download_folder/".$folderName);
		
		$res1= mysqli_query($conn, "SELECT * FROM document_master_3 WHERE folder_id= '".$id."'");
		while($row1= mysqli_fetch_array($res1)){
			$id1=$row1['id'];
			$fileName= $row1['document_name'];
			
			$encrypted_file = "upload/".$id1."_".$fileName.".aes";
			$decrypted_file = "DownloadFilesFolder/".$fileName;
		//	echo $encrypted_file;echo "<br>";
			$lib->decryptFile($encrypted_file, "1234", $decrypted_file);
			
			copy("DownloadFilesFolder/".$fileName, "for_download_folder/".$folderName."/".$fileName);
			
		}
	}
	
	$res2= mysqli_query($conn, "SELECT *FROM sub_folder_master_3 WHERE folder_master_id='".$id."'");
	while($row2= mysqli_fetch_array($res2)){
		$id2= $row2['id'];
		$folderName1= $row2['folder_name'];
		
		mkdir("for_download_folder/".$folderName."/".$folderName1);
		
		$res3= mysqli_query($conn, "SELECT * FROM document_master_3 WHERE folder_id='".$id2."'");
		while($row3= mysqli_fetch_array($res3)){
			$id3= $row3['id'];
			$fileName= $row3['document_name'];
			
			$encrypted_file = "upload/".$id3."_".$fileName.".aes";
			$decrypted_file = "DownloadFilesFolder/".$fileName;
		//	echo $encrypted_file;echo "<br>";
			$lib->decryptFile($encrypted_file, "1234", $decrypted_file);
			
			copy("DownloadFilesFolder/".$fileName, "for_download_folder/".$folderName."/".$folderName1."/".$fileName);
		}
		
		$res4 = mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id='".$id2."'");
		while($row4= mysqli_fetch_array($res4)){
			$id4= $row4['id'];
			$folderName2= $row4['folder_name'];
			
			mkdir("for_download_folder/".$folderName."/".$folderName1."/".$folderName2);
			
			$res5= mysqli_query($conn, "SELECT * FROM document_master_3 WHERE folder_id='".$id4."' ");
			while($row5= mysqli_fetch_array($res5)){
				$id5= $row5['id'];
				$fileName= $row5['document_name'];
				
				$encrypted_file = "upload/".$id5."_".$fileName.".aes";
				$decrypted_file = "DownloadFilesFolder/".$fileName;
			//	echo $encrypted_file;echo "<br>";
				$lib->decryptFile($encrypted_file, "1234", $decrypted_file);
				
				copy("DownloadFilesFolder/".$fileName, "for_download_folder/".$folderName."/".$folderName1."/".$folderName2."/".$fileName);
			}
		}
	}
	
	
	
	
	
	/// CREATE ZIP FOLDER...
	// Get real path for our folder
		$rootPath = realpath('for_download_folder/'.$folderName.'/');
		// Initialize archive object
		$zip = new ZipArchive();
		$zip->open('for_download_folder/'.$folderName.'.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);
		// Create recursive directory iterator
		
		$files = new RecursiveIteratorIterator(
			new RecursiveDirectoryIterator($rootPath),
			RecursiveIteratorIterator::LEAVES_ONLY
		);
		foreach ($files as $name => $file)
		{
			// Skip directories (they would be added automatically)
			if (!$file->isDir())
			{
				// Get real and relative path for current file
				$filePath = $file->getRealPath();
				$relativePath = substr($filePath, strlen($rootPath) + 1);
				// Add current file to archive
				$zip->addFile($filePath, $relativePath);
			}
		}
		// Zip archive will be created only after closing object
		$zip->close();
		$zip_file = "for_download_folder/".$folderName.".zip";
		/// DOWNLOAF FILE CODE....
		header($_SERVER['SERVER_PROTOCOL'].' 200 OK');
		header('Content-Description: File Transfer');
		header('Content-Type: application/zip');
		header('Content-Disposition: attachment; filename='.basename($zip_file).'');
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($zip_file));
		ob_flush();
		ob_clean();
	//	readfile($zip_file);
	//	include('after_remove_Subfolder.php'); 
		exit;
	
	
?>