<?php
	error_reporting(0);
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
//	echo "<br>";
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
		readfile($zip_file);
		exit;
		
		
		
		
		
// 		header($_SERVER['SERVER_PROTOCOL'].' 200 OK');
// 		header('Content-Description: File Transfer');
// 		header('Content-Type: application/zip');
// 		header('Content-Disposition: attachment; filename='.basename($zip_file).'');
// 		header('Content-Transfer-Encoding: binary');
// 		header('Expires: 0');
// 		header('Cache-Control: must-revalidate');
// 		header('Pragma: public');
// 		header('Content-Length: ' . filesize($zip_file));
// 		ob_flush();
// 		ob_clean();
// 	//	readfile($zip_file);
// 	//	include('after_remove_Subfolder.php'); 
// 		exit;
 
//  session_start();
//  $userName=$_SESSION['Login'];
  
  
//  //user side
 
//  /* if($userName!="admin")
//  { */
// 	 $con=mysqli_connect('localhost', 'root', 'root', 'fincrm');;
// 	 if($con->connect_error){
//     		die("Connection Failed" . $con->connect_error);
//     	}
// 		 echo "<script></script>";
// 	//echo $userName;
// 		$sub_folder_master_id=array();
// 				  $j=0;
// 				  $resul_check_subfolder=mysqli_query($con, "SELECT * FROM sub_folder_master");
// 				  while($row_check_subfolder=mysqli_fetch_array($resul_check_subfolder))
// 				  {
// 					  $sub_folder_master_id[$j]=$row_check_subfolder['folder_master_id'];
// 					  $j++;
// 				  }
				
// 				$structure = "for_download_folder";
				
// 				$sub_folder_id=0;
// //				echo"sub folder data<br>";
// 				//$conn = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
// 				if($con->connect_error){
// 					die("Connection Failed". $conn->connect_error);
// 				}
// 				$sub_of_main_folder=array();
// 				$i=0;
// 				$rlt= mysqli_query($con, "SELECT * FROM sub_folder_master WHERE id='".$_GET['id']."'");
// 				while ($rw= mysqli_fetch_array($rlt))
// 				{
// 					$sub_of_main_folder[$i]=$rw['id'];
// 					$sub_folder_id= $rw['id'];
// 					$subfolder_name=$rw['folder_name'];
// //					echo "<br>".$subfolder_name."<br>";
// //					echo "<br>".$sub_folder_id."<br>";
					
// 					//create Sub folder
// 					mkdir($structure."/".$subfolder_name);
					
// 					$result_document_sub=mysqli_query($con, "SELECT * FROM document_master WHERE folder_id='".$rw['id']."'");
// 							while($row_document_sub=mysqli_fetch_array($result_document_sub))
// 							{
// //								echo $row_document_sub['document_name'];
								
// 								$file1 = "upload/".$row_document_sub['document_name'];
// 								 $newfile1 = $structure."/".$subfolder_name."/".$row_document_sub['document_name'];
							 
// //							 echo "sub document old path = ".$file."<br>";
// //							 echo "sub document new path = ".$newfile."<br>";
// 								  if (!copy($file1, $newfile1)) {
// 									echo "failed to copy $file...\n";
// 								 }
// 								 else{
// 								//	echo "copied $file into $newfile\n";
// 								 }
// 							} 
// 					$i++;	
				
// 				/* print_r($sub_of_main_folder);
// 				echo "<br>"; */
				
					
				  
				  
// 				$result_check=mysqli_query($con,"SELECT * FROM sub_folder_master");
					
// 				  $length= count($sub_folder_master_id);
				  
// 				  for($i= 0; $i<$length; $i++){
					  
// 					  $id_from_array = $sub_folder_master_id[$i];
// 					  /* echo "<br>";
// 					  echo "ID FROM ARRAY = ". $id_from_array; */
// 					  if($sub_folder_id == $id_from_array){
						  
// 						  $sql1= "SELECT * FROM sub_folder_master WHERE folder_master_id='".$sub_folder_id."'";
						  
// 						  $result1= mysqli_query($con, $sql1);
						  
// 						  while($row1= mysqli_fetch_array($result1)){
							  
// 							$sub_folder_name= $row1['folder_name'];
// 							$sub_folder_id= $row1['id'];	
							
// //							echo "<br>";
// //							echo "SUB FOLDER NAME @@@ ". $sub_folder_name;
// //							echo "<br>";
// //							echo "SUB FOLDER ID IN LOOP @@@ ".$sub_folder_id;
							
// 							mkdir($structure."/".$subfolder_name."/".$sub_folder_name);
// 							$result_document_subfolder=mysqli_query($con, "SELECT * FROM document_master WHERE folder_id='".$sub_folder_id."'");
// 							while($row_document_subfolder=mysqli_fetch_array($result_document_subfolder))
// 							{
// //								echo $row_document_subfolder['document_name'];
								
// 								$file2 = "upload/".$row_document_subfolder['document_name'];
// 								 $newfile2 = $structure."/".$subfolder_name."/".$sub_folder_name."/".$row_document_subfolder['document_name'];
							 
// //							 echo "sub document old path = ".$file."<br>";
// //							 echo "sub document new path = ".$newfile."<br>";
// 								   if (!copy($file2, $newfile2)) {
// 									//echo "failed to copy $file...\n";
// 								 }
// 								 else{
// 								//	echo "copied $file into $newfile\n";
// 								 } 
// 							}
// 						  }
						  
// 					  }
					  
// 				  }
					 
// 				}  
				
		
// 				// Get real path for our folder
// $test="for_download_folder/".$subfolder_name.".zip";
// $rootPath = realpath("for_download_folder/".$subfolder_name);

// // Initialize archive object
// $zip = new ZipArchive();
// $zip->open($test, ZipArchive::CREATE | ZipArchive::OVERWRITE);

// // Create recursive directory iterator
// $files = new RecursiveIteratorIterator(
//     new RecursiveDirectoryIterator($rootPath),
//     RecursiveIteratorIterator::LEAVES_ONLY
// );

// foreach ($files as $name => $test)
// {
// 	if (!$test->isDir())
//     {
		
//         // Get real and relative path for current file
//         $filePath = $test->getRealPath();
//         $relativePath = substr($filePath, strlen($rootPath) + 1);
//         // Add current file to archive
//         $zip->addFile($filePath, $relativePath);
//     }
	
// }

// // Zip archive will be created only after closing object
// $zip->close();

	  
//     $filepath = "for_download_folder/".$subfolder_name.'.zip';
    
//     // Process download
//       if(file_exists($filepath)) {
//         header('Content-Description: File Transfer');
//         header('Content-Type: application/octet-stream');
//         header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
//         header('Expires: 0');
//         header('Cache-Control: must-revalidate');
//         header('Pragma: public');
//         header('Content-Length: ' . filesize($filepath));
//         flush(); // Flush system output buffer
//         readfile($filepath);
//       //  exit;
//     }  

// 		include('after_remove_Subfolder.php'); 
// 		//unlink zip file after download
// 		 $dirname = "for_download_folder/".$subfolder_name;
// 		//echo $dirname;
//         if(rmdir($dirname))
//         {
//           //echo ("$dirname successfully removed");
// 		  ///header('location:folder_is_empty.php');
// 		  echo "<script>alert('This folder is empty');</script>";
//         }
// 		else{
// 			//header('location:index.php');	 
// 			echo "<script>window.location</script>";
// 		} 
//  //}
 
 
 
?>