<?php
	session_start();
	error_reporting(0);
	include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3Connect.php');
	$userName=$_SESSION['Login'];
	if($userName=="fincrm"){
		$userName= "admin";
	}
	$arrForDeleteFiles= array();// Array For get selected id for delete..
	$arrForDeleteFiles = $_SESSION['idsForDelete'];// store ids for delete from session to array...
		
	$arrForFolderMasterId= array();// Array for store all ids from folder master table...
	$arrForSubFolderMasterId = array();//Array for store all ids from sub folder master...
	$arrForDocumentMasterId = array();// Array for store all ids from document master..

	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
	
	// $conn = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
	// if($conn->connect_error){
	// 	die("Connection Failed ".$conn->connect_error);
	// }
	
	// GET USER ID FOR INSERT INTO FILE DELETE REQUEST TABLE....
	$resForUserId= mysqli_query($conn, "SELECT id FROM user WHERE user_name='".$userName."'");
	$rowForUserId= mysqli_fetch_array($resForUserId);
	$user_id= $rowForUserId['id'];
	
	echo "USERID=== ". $user_id;
	
	print_r($arrForDeleteFiles);
	$arrForFMID = array();
	$arrForSFMID = array();
	$arrForDMID = array();	
	
	//Get ids from FM...
	$res11= mysqli_query($conn, "SELECT * FROM folder_master_3");
	while($row11= mysqli_fetch_array($res11)){
		$idForcheckBox=$row11['prefix']." ".$row11['id'];
		$arrForFMID[]= $idForcheckBox;
	}
					
	// Get ids from sub folder master...
	$res12= mysqli_query($conn, "SELECT * FROM sub_folder_master_3");
	while($row12= mysqli_fetch_array($res12)){
		$idForcheckBox=$row12['prefix']." ".$row12['id'];
		$arrForSFMID[]= $idForcheckBox;
	}

	//Get ids from DM ....

	$res13= mysqli_query($conn, "SELECT * FROM document_master_3");
	while($row13 = mysqli_fetch_array($res13)){
		$idForcheckBox=$row13['prefix']." ".$row13['id'];
		$arrForDMID = $idForcheckBox;
	}	
	// echo "<pre>ids = >"; print_r($arrForDMID);die;	
	for($i=0; $i<count($arrForDeleteFiles); $i++){
		// Get ids from folder master table...
		$res= mysqli_query($conn, "SELECT * FROM folder_master_3");
		while($row= mysqli_fetch_array($res)){
			$idForcheckBox=$row['prefix']." ".$row['id'];
			$arrForFolderMasterId[]= $idForcheckBox;
		}
				
		// Get ids from sub folder master...
		$res1= mysqli_query($conn, "SELECT * FROM sub_folder_master_3");
		while($row1= mysqli_fetch_array($res1)){
			$idForcheckBox=$row1['prefix']." ".$row1['id'];
			$arrForSubFolderMasterId[]= $idForcheckBox;
		}
			
		// Get ids from document_master .....
		$res2= mysqli_query($conn, "SELECT * FROM document_master_3");
		while($row2=mysqli_fetch_array($res2)){
			$idForcheckBox=$row2['prefix']." ".$row2['id'];
			$arrForDocumentMasterId[] = $idForcheckBox;
		}

		
	}
	if($userName=="admin"){
		
		for($i=0; $i<count($arrForDeleteFiles); $i++){
			$id=$arrForDeleteFiles[$i];
			echo "ID ONE BY ONE ----> ". $id;
			if(in_array($id, $arrForFMID)){
				echo "IN FOLDER MASTER <br>";
				$idFromFMID = explode(" ", $id);
				echo $idFromFMID[1];
				// Query to get main folder name .....	
				$res= mysqli_query($conn, "SELECT * FROM folder_master_3 WHERE id=".$idFromFMID[1]);
				$row = mysqli_fetch_array($res);	
				$folderName = $row['folder_name'];
				mysqli_query($conn, "DELETE FROM folder_master_3 WHERE id=".$idFromFMID[1]);

				// echo "DELETE * FROM folder_master_3 WHERE id=".$idFromFMID[1];
				// Query to delete all files from main folder....
				$res1= mysqli_query($conn, "SELECT * FROM document_master_3 WHERE folder_id=".$idFromFMID[1]);
				while($row1 = mysqli_fetch_array($res1)){
					$fileName1= $row1['document_name'];
					$fileId1= $row1['id'];
					$folder_path = $row1['folder_path'];

					$zipFileName1= $fileId1.'_'.$fileName1.'.zip';

					if($folder_path == "/"){
						$folder_path = $zipFileName1;
					}else{
						$folder_path = $folder_path.$zipFileName1;
					} 
					echo 'Development/fincrm.crm.com/document_manager/'.$folder_path."<br>";	
					// Delete File from S3 bucket....
					//include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3Connect.php'); \
					$s3Client = new Aws\S3\S3Client([
				        'version' => '2006-03-01',
				        'region' => 'ap-south-1',
				        'credentials' => [
				            'key' => 'AKIAVKMGGRZRUOQQMSEE',
				            'secret' => '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',
				        ],
				    ]);
					$result = $s3Client->deleteObject(array(
				        'Bucket' => 'fincrm',
				        'Key'    => 'Development/fincrm.crm.com/document_manager/'.$folder_path,
				    ));	

				    mysqli_query($conn, "DELETE FROM document_master_3 WHERE id=".$fileId1);
				}	
				// Query for get sub folders....
				$res2 = mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id =". $idFromFMID[1]);
				while($row2= mysqli_fetch_array($res2)){
					$fodlerName2= $row2['folder_name'];
					$folder_path = $row2['folder_path'];
					$folderId2 = $row2['id'];
					echo "IN STEP 2<br>"; 
					echo "FOLDER ID 2 = ". $folderId2. "<br>";
					// Query for get files form sub folder....	
					$res3= mysqli_query($conn, "SELECT * FROM document_master_3 WHERE folder_id=".$folderId2);
					while($row3= mysqli_fetch_array($res3)){
						$fileName2= $row3['document_name'];
						$fileId2= $row3['id'];
						$folder_path1 = $row3['folder_path'];
						$zipFileName2= $fileId2.'_'.$fileName2.'.zip';
						echo "FOLDER PATH = > ". $folder_path1. "<br>";
						echo "ZIP FILE NAME = ". $zipFileName2."<br>";
						if($folder_path == "/"){
							$folder_path1 = $zipFileName2;
						}else{
							$folder_path1 = $folder_path1.$zipFileName2;
						}
						echo 'Development/fincrm.crm.com/document_manager/'.$folder_path1."<br>";	 
						$s3Client = new Aws\S3\S3Client([
					        'version' => '2006-03-01',
					        'region' => 'ap-south-1',
					        'credentials' => [
					            'key' => 'AKIAVKMGGRZRUOQQMSEE',
					            'secret' => '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',
					        ],						
					    ]);
						$result = $s3Client->deleteObject(array(
					        'Bucket' => 'fincrm',
					        'Key'    => 'Development/fincrm.crm.com/document_manager/'.$folder_path1,
					    ));	

					    mysqli_query($conn, "DELETE FROM document_master_3 WHERE id=".$fileId2);
					}
					mysqli_query($conn, "DELETE FROM sub_folder_master_3 WHERE id=". $folderId2);
					$s3Client = new Aws\S3\S3Client([
						        'version' => '2006-03-01',
						        'region' => 'ap-south-1',
						        'credentials' => [
						            'key' => 'AKIAVKMGGRZRUOQQMSEE',
						            'secret' => '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',
						        ],						
						    ]);
						$s3Client->deleteMatchingObjects('fincrm','Development/fincrm.crm.com/document_manager/'.$folder_path);
					// Get Sub folder ...
					$res4= mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id=".$folderId2);
					while($row4 = mysqli_fetch_array($res4)){
						$fodlerName3= $row4['folder_name'];
						$folder_path = $row4['folder_path'];
						$folderId3 = $row4['id'];

						//get files from sub folder....
						$res5= mysqli_query($conn, "SELECT * FROM document_master_3 WHERE folder_id=".$folderId3);
						while ($row5= mysqli_fetch_array($res5)) {
							$fileName3= $row5['document_name'];
							$fileId3= $row5['id'];
							$folder_path2 = $row5['folder_path'];
							$zipFileName3= $fileId3.'_'.$fileName3.'.zip';
							if($folder_path == "/"){
								$folder_path2 = $zipFileName3;
							}else{
								$folder_path2 = $folder_path2.$zipFileName3;
							} 
							echo 'Development/fincrm.crm.com/document_manager/'.$folder_path2."<br>";	
							$s3Client = new Aws\S3\S3Client([
						        'version' => '2006-03-01',
						        'region' => 'ap-south-1',
						        'credentials' => [
						            'key' => 'AKIAVKMGGRZRUOQQMSEE',
						            'secret' => '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',
						        ],						
						    ]);
							$result = $s3Client->deleteObject(array(
						        'Bucket' => 'fincrm',
						        'Key'    => 'Development/fincrm.crm.com/document_manager/'.$folder_path2,
						    ));	

						    mysqli_query($conn, "DELETE FROM document_master_3 WHERE id=".$fileId3);
						}
						$s3Client = new Aws\S3\S3Client([
						        'version' => '2006-03-01',
						        'region' => 'ap-south-1',
						        'credentials' => [
						            'key' => 'AKIAVKMGGRZRUOQQMSEE',
						            'secret' => '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',
						        ],						
						    ]);
						$s3Client->deleteMatchingObjects('fincrm','Development/fincrm.crm.com/document_manager/'.$folder_path);
					}
					mysqli_query($conn, "DELETE FROM sub_folder_master_3 WHERE id=". $folderId3);
					// Get Sub folder name ....
					$res6= mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id=".$folderId3);

					while($row6 = mysqli_fetch_array($res6)){
						$fodlerName4= $row6['folder_name'];
						$folder_path = $row6['folder_path'];
						$folderId4 = $row6['id'];
						//get files from sub folder....
						$res7= mysqli_query($conn, "SELECT * FROM document_master_3 WHERE folder_id=".$folderId4);
						while($row7= mysqli_fetch_array($res7)){
							$fileName4= $row7['document_name'];
							$fileId4= $row7['id'];
							$folder_path3 = $row7['folder_path'];
							$zipFileName4= $fileId4.'_'.$fileName4.'.zip';
							if($folder_path3 == "/"){
								$folder_path3 = $zipFileName4;
							}else{
								$folder_path3 = $folder_path3.$zipFileName4;
							} 
							echo 'Development/fincrm.crm.com/document_manager/'.$folder_path3."<br>";	
						}

					}

					mysqli_query($conn, "DELETE FROM sub_folder_master_3 WHERE id=".$folderId2);
				}	

			}

			if(in_array($id, $arrForSFMID)){

				echo "IN SUB FOLDER MASTER";
				echo "IN FOLDER MASTER <br>";
				$idFromSFMID = explode(" ", $id);
				echo $idFromSFMID[1];
				$res1= mysqli_query($conn, "SELECT * FROM document_master_3 WHERE folder_id=".$idFromSFMID[1]);
				mysqli_query($conn, "DELETE FROM sub_folder_master_3 WHERE id =". $idFromSFMID[1]);
				while($row1 = mysqli_fetch_array($res1)){
					$fileName1= $row1['document_name'];
					$fileId1= $row1['id'];
					$folder_path = $row1['folder_path'];

					$zipFileName1= $fileId1.'_'.$fileName1.'.zip';

					if($folder_path == "/"){
						$folder_path = $zipFileName1;
					}else{
						$folder_path = $folder_path.$zipFileName1;
					} 
					echo 'Development/fincrm.crm.com/document_manager/'.$folder_path."<br>";	
					// Delete File from S3 bucket....
					//include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3Connect.php'); \
					$s3Client = new Aws\S3\S3Client([
				        'version' => '2006-03-01',
				        'region' => 'ap-south-1',
				        'credentials' => [
				            'key' => 'AKIAVKMGGRZRUOQQMSEE',
				            'secret' => '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',
				        ],
				    ]);
					$result = $s3Client->deleteObject(array(
				        'Bucket' => 'fincrm',
				        'Key'    => 'Development/fincrm.crm.com/document_manager/'.$folder_path,
				    ));	

				    mysqli_query($conn, "DELETE FROM document_master_3 WHERE id=".$fileId1);
				}	
				// Query for get sub folders....
				$res2 = mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id =". $idFromSFMID[1]);
				while($row2= mysqli_fetch_array($res2)){
					$fodlerName2= $row2['folder_name'];
					$folder_path = $row2['folder_path'];
					$folderId2 = $row2['id'];
					echo "IN STEP 2<br>"; 
					echo "FOLDER ID 2 = ". $folderId2. "<br>";
					// Query for get files form sub folder....	
					$res3= mysqli_query($conn, "SELECT * FROM document_master_3 WHERE folder_id=".$folderId2);
					while($row3= mysqli_fetch_array($res3)){
						$fileName2= $row3['document_name'];
						$fileId2= $row3['id'];
						$folder_path1 = $row3['folder_path'];
						$zipFileName2= $fileId2.'_'.$fileName2.'.zip';
						echo "FOLDER PATH = > ". $folder_path1. "<br>";
						echo "ZIP FILE NAME = ". $zipFileName2."<br>";
						if($folder_path == "/"){
							$folder_path1 = $zipFileName2;
						}else{
							$folder_path1 = $folder_path1.$zipFileName2;
						}
						echo 'Development/fincrm.crm.com/document_manager/'.$folder_path1."<br>";	 
						$s3Client = new Aws\S3\S3Client([
					        'version' => '2006-03-01',
					        'region' => 'ap-south-1',
					        'credentials' => [
					            'key' => 'AKIAVKMGGRZRUOQQMSEE',
					            'secret' => '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',
					        ],						
					    ]);
						$result = $s3Client->deleteObject(array(
					        'Bucket' => 'fincrm',
					        'Key'    => 'Development/fincrm.crm.com/document_manager/'.$folder_path1,
					    ));	

					    mysqli_query($conn, "DELETE FROM document_master_3 WHERE id=".$fileId2);
					}
					mysqli_query($conn, "DELETE FROM sub_folder_master_3 WHERE id=". $folderId2);
					$s3Client = new Aws\S3\S3Client([
						        'version' => '2006-03-01',
						        'region' => 'ap-south-1',
						        'credentials' => [
						            'key' => 'AKIAVKMGGRZRUOQQMSEE',
						            'secret' => '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',
						        ],						
						    ]);
						$s3Client->deleteMatchingObjects('fincrm','Development/fincrm.crm.com/document_manager/'.$folder_path);
					// Get Sub folder ...
					$res4= mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id=".$folderId2);
					while($row4 = mysqli_fetch_array($res4)){
						$fodlerName3= $row4['folder_name'];
						$folder_path = $row4['folder_path'];
						$folderId3 = $row4['id'];

						//get files from sub folder....
						$res5= mysqli_query($conn, "SELECT * FROM document_master_3 WHERE folder_id=".$folderId3);
						while ($row5= mysqli_fetch_array($res5)) {
							$fileName3= $row5['document_name'];
							$fileId3= $row5['id'];
							$folder_path2 = $row5['folder_path'];
							$zipFileName3= $fileId3.'_'.$fileName3.'.zip';
							if($folder_path == "/"){
								$folder_path2 = $zipFileName3;
							}else{
								$folder_path2 = $folder_path2.$zipFileName3;
							} 
							echo 'Development/fincrm.crm.com/document_manager/'.$folder_path2."<br>";	
							$s3Client = new Aws\S3\S3Client([
						        'version' => '2006-03-01',
						        'region' => 'ap-south-1',
						        'credentials' => [
						            'key' => 'AKIAVKMGGRZRUOQQMSEE',
						            'secret' => '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',
						        ],						
						    ]);
							$result = $s3Client->deleteObject(array(
						        'Bucket' => 'fincrm',
						        'Key'    => 'Development/fincrm.crm.com/document_manager/'.$folder_path2,
						    ));	

						    mysqli_query($conn, "DELETE FROM document_master_3 WHERE id=".$fileId3);
						}
						$s3Client = new Aws\S3\S3Client([
						        'version' => '2006-03-01',
						        'region' => 'ap-south-1',
						        'credentials' => [
						            'key' => 'AKIAVKMGGRZRUOQQMSEE',
						            'secret' => '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',
						        ],						
						    ]);
						$s3Client->deleteMatchingObjects('fincrm','Development/fincrm.crm.com/document_manager/'.$folder_path);
					}

					// Get Sub folder name ....
					$res6= mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id=".$folderId3);

					while($row6 = mysqli_fetch_array($res6)){
						$fodlerName4= $row6['folder_name'];
						$folder_path = $row6['folder_path'];
						$folderId4 = $row6['id'];
						//get files from sub folder....
						$res7= mysqli_query($conn, "SELECT * FROM document_master_3 WHERE folder_id=".$folderId4);
						while($row7= mysqli_fetch_array($res7)){
							$fileName4= $row7['document_name'];
							$fileId4= $row7['id'];
							$folder_path3 = $row7['folder_path'];
							$zipFileName4= $fileId4.'_'.$fileName4.'.zip';
							if($folder_path3 == "/"){
								$folder_path3 = $zipFileName4;
							}else{
								$folder_path3 = $folder_path3.$zipFileName4;
							} 
							echo 'Development/fincrm.crm.com/document_manager/'.$folder_path3."<br>";	
						}

					}
			}

		}
		if(in_array($id, $arrForDocumentMasterId)){
			echo "ID FROM DM == > ". $id."<br>";
			$idFromDMID = explode(" ", $id);	

			$res= mysqli_query($conn, "SELECT * FROM document_master_3 WHERE id=". $idFromDMID[1]);
			$row= mysqli_fetch_array($res);	
			$fileId= $row['id'];
			$fileName = $row['document_name'];
			$folder_path = $row['folder_path'];

			$zipFileName = $fileId.'_'.$fileName.'.zip';

			if($folder_path == "/"){
				$folder_path = $zipFileName;
			}else{
				$folder_path = $folder_path.$zipFileName;
			}	

			$s3Client = new Aws\S3\S3Client([
				'version' => '2006-03-01',
				'region' => 'ap-south-1',
				'credentials' => [
					'key' => 'AKIAVKMGGRZRUOQQMSEE',
					'secret' => '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',
				],						
			]);
			$result = $s3Client->deleteObject(array(
				'Bucket' => 'fincrm',
				'Key'    => 'Development/fincrm.crm.com/document_manager/'.$folder_path,
			));	

			mysqli_query($conn, "DELETE FROM document_master_3 WHERE id=".$fileId);	

		}	
			
		}
		unset($_SESSION['idsForDelete']);

	}
	if($userName!="admin"){
		for($i=0; $i<count($arrForDeleteFiles); $i++){
			$id=$arrForDeleteFiles[$i];
			
				if(in_array($id, $arrForFolderMasterId)){
					
					$idWithPrefix=$id;
				$arrOfIdAndPrefix= explode(" ", $idWithPrefix);
					
					mysqli_query($conn, "INSERT INTO file_delete_request(file_id, user_id, createdAt, status) VALUES ('".$arrOfIdAndPrefix[1]."', '".$user_id."', '".date("d-m-Y h:i:s A")."', '0' )");
					
				}
				
				if(in_array($id, $arrForSubFolderMasterId)){
					//$res2= mysqli_query($conn, "SELECT * FROM sub_folder_master WHERE id='".$id."'");
					$idWithPrefix=$id;
				$arrOfIdAndPrefix= explode(" ", $idWithPrefix);
					mysqli_query($conn, "INSERT INTO file_delete_request(file_id, user_id, createdAt, status) VALUES ('".$arrOfIdAndPrefix[1]."', '".$user_id."', '".date("d-m-Y h:i:s A")."', '0' )");
				}
				
				if(in_array($id, $arrForDocumentMasterId)){
				    $idWithPrefix=$id;
				$arrOfIdAndPrefix= explode(" ", $idWithPrefix);
					mysqli_query($conn, "INSERT INTO file_delete_request(file_id, user_id, createdAt, status) VALUES ('".$arrOfIdAndPrefix[1]."', '".$user_id."', '".date("d-m-Y h:i:s A")."', '0' )");
				}
				
			//}
		}
		unset($_SESSION['idsForDelete']);
		
	}
	
	
	
	//echo "FROM deletedMultipleSelectedFiles.php PAGE";
	//print_r($_SESSION['idsForDelete']);
	
	

?>