<?php
session_start();
	error_reporting(0);
	$fileOrFolderName= $_POST['fileName'];
	// echo $fileOrFolderName; 
	//$fileOrFolderName= "F-3";
	//$fileOrFolderName= str_replace(" ", "", $fileOrFolderName);
	$id=$_SESSION['idForRename'];
	$domainName= $_SERVER['SERVER_NAME'];
	$folder_path = "";
	$old_folder_path = "";
	// //$id = "SFM 100031";
	// echo "ID FOR RENAME = ".$id;
	// echo "<br>";
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	// Get All IDs from folder master....
	$arrForFolderMasterIds= array();
	$res= mysqli_query($conn, "SELECT * FROM folder_master_3");
	while($row= mysqli_fetch_array($res)){
		$idForcheckBox=$row['prefix']." ".$row['id'];
		$arrForFolderMasterIds[]= $idForcheckBox;
	}

	//Get All IDs from sub folder master..
	$arrForSubFolderMasterIds= array();
	$res1= mysqli_query($conn, "SELECT * FROM sub_folder_master_3");
	while($row1=mysqli_fetch_array($res1)){
		$idForcheckBox=$row1['prefix']." ".$row1['id'];
		$arrForSubFolderMasterIds[]=$idForcheckBox;
	}

	//Get All IDs from document master..
	$arrForDocumentMasterIds=array();
	$res2= mysqli_query($conn, "SELECT * FROM document_master_3");
	while($row2= mysqli_fetch_array($res2)){
		$idForcheckBox=$row2['prefix']." ".$row2['id'];
		$arrForDocumentMasterIds[]= $idForcheckBox;
	}

	$idWithPrefix=$id;
	$arrOfIdAndPrefix= explode(" ", $idWithPrefix);
	
	// echo "<pre>"; print_r($arrForFolderMasterIds);
	// echo "<pre>"; print_r($arrForSubFolderMasterIds);
	// echo "<pre>"; print_r($arrForDocumentMasterIds);

	if(in_array($id, $arrForFolderMasterIds)){

		$resForFile=  mysqli_query($conn, "SELECT * FROM document_master_3 WHERE folder_id=". $arrOfIdAndPrefix[1]);	
		$rowForFile= mysqli_fetch_array($resForFile);
		$fileName= $rowForFile['document_name'];
		$id = $rowForFile['id'];



		$zipFileName= $id.'_'.$fileName.'.zip';

		$res  = mysqli_query($conn, "SELECT * FROM folder_master_3 WHERE id=". $arrOfIdAndPrefix[1]);

		$row = mysqli_fetch_array($res);

		$folderName = $row['folder_name'];
		if($folderName == $fileOrFolderName){
			echo 0;die;
		}
		//$folder_path = $row['folder_path'];

		// //if($folder_path == "/"){
		// 	$folder_path= $folderName;
		// //}
		// Rename file in s3...
		include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/S3Connect.php');

		$oldName= 's3://fincrm/Development/'.$_SERVER['SERVER_NAME'].'/document_manager/'.$folderName.'/'.$zipFileName;
		$newName= 's3://fincrm/Development/'.$_SERVER['SERVER_NAME'].'/document_manager/'.$fileOrFolderName.'/'.$zipFileName;




		// $result = $s3->copyObject(array(
	 //    	'Bucket' => 'fincrm',
	 //        'Key'    => 'Development/'.$_SERVER['SERVER_NAME'].'/document_manager/'.$fileOrFolderName.'/',
	 //        'ACL' => 'public-read',
	 //    	'CopySource' => 'Development/'.$_SERVER['SERVER_NAME'].'/document_manager/'.$folderName.'/'
		// ));


		$s3->registerStreamWrapper();
		rename($oldName, $newName);	
		// echo $oldName."<br>                               "; 
		// echo $newName."<br>";
		 //die;
		// rename('upload/'.$domainName.'/'.$folderName, 'upload/'.$domainName.'/'.$fileOrFolderName);
		mysqli_query($conn, "UPDATE folder_master_3 SET folder_name='".$fileOrFolderName."' WHERE id=".$arrOfIdAndPrefix[1]);	

		// echo "Folder rename successfully...";
		$res1 = mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id=". $arrOfIdAndPrefix[1]);
		while($row1 = mysqli_fetch_array($res1)){
			$subFolderId = $row1['id'];
			$folder_path = $fileOrFolderName."/".$row1['folder_name'];

			mysqli_query($conn, "UPDATE sub_folder_master_3 SET folder_path='".$folder_path."' WHERE id=". $subFolderId);
			$res2 = mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id=". $subFolderId);
			while($row2 = mysqli_fetch_array($res2)){
				$subFolderId1= $row2['id'];
				$folder_path = $folder_path."/".$row2['folder_name'];

				mysqli_query($conn, "UPDATE sub_folder_master_3 SET folder_path='".$folder_path."' WHERE id=". $subFolderId1);

				$res3 = mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id=". $subFolderId1);
				while($row3 = mysqli_fetch_array($res3)){
					$subFolderId2= $row3['id'];
					$folder_path = $folder_path."/".$row3['folder_name'];

					mysqli_query($conn, "UPDATE sub_folder_master_3 SET folder_path='".$folder_path."' WHERE id=". $subFolderId2);

					$res4 = mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id=". $subFolderId2);
					while ($row4 = mysqli_fetch_array($res4)) {
						$subFolderId3= $row4['id'];
						$folder_path = $folder_path."/".$row4['folder_name'];

						mysqli_query($conn, "UPDATE sub_folder_master_3 SET folder_path='".$folder_path."' WHERE id=". $subFolderId3);

						$res5 = mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id=". $subFolderId3);
						while($row5 = mysqli_fetch_array($res5)){
							$subFolderId4= $row5['id'];
							$folder_path = $folder_path."/".$row5['folder_name'];

							mysqli_query($conn, "UPDATE sub_folder_master_3 SET folder_path='".$folder_path."' WHERE id=". $subFolderId4);
							$res6 = mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id=". $subFolderId4);
							while($row6 = mysqli_fetch_array($res6)){
								$subFolderId5= $row6['id'];
								$folder_path = $folder_path."/".$row6['folder_name'];

								mysqli_query($conn, "UPDATE sub_folder_master_3 SET folder_path='".$folder_path."' WHERE id=". $subFolderId5);
								$res7 = mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id=". $subFolderId5);
								while($row7 = mysqli_fetch_array($res7)){
									$subFolderId6= $row7['id'];
									$folder_path = $folder_path."/".$row7['folder_name'];

									mysqli_query($conn, "UPDATE sub_folder_master_3 SET folder_path='".$folder_path."' WHERE id=". $subFolderId6);

									$res8 = mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id=". $subFolderId6);
									while($row8 = mysqli_fetch_array($res8)){
										$subFolderId7= $row8['id'];
										$folder_path = $folder_path."/".$row8['folder_name'];

										mysqli_query($conn, "UPDATE sub_folder_master_3 SET folder_path='".$folder_path."' WHERE id=". $subFolderId7);

										$res9 = mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id=". $subFolderId7);
										while($row9 = mysqli_fetch_array($res9)){
											$subFolderId8= $row9['id'];
											$folder_path = $folder_path."/".$row9['folder_name'];

											mysqli_query($conn, "UPDATE sub_folder_master_3 SET folder_path='".$folder_path."' WHERE id=". $subFolderId8);
										}
									}
								}
							}
						}
					}
				}
			}
		}


		//


		echo 1;	
	}else if(in_array($id, $arrForSubFolderMasterIds)){
		$res1 = mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE id=". $arrOfIdAndPrefix[1]);
		$subFolderId = $row1['id'];



		//rename('upload/'.$domainName.'/'.$row1['folder_path'].'/'.$folderName, 'upload/'.$domainName.'/'.$row1['folder_path'].'/'.$fileOrFolderName);
		// mysqli_query($conn, "UPDATE sub_folder_master_3 SET folder_name='".$fileOrFolderName")	
		while($row1 = mysqli_fetch_array($res1)){

			$subFolderId = $row1['id'];
			$old_folder_path = $row1['folder_path'];
			$folder_path = $row1['folder_path'];

			// echo $old_folder_path; //die;

			$folderName = $row1['folder_name'];
			if($folderName == $fileOrFolderName){
				echo 0;die;
			}
			$arrFolderPath = explode("/", $folder_path);
			// echo "<pre>"; print_r($arrFolderPath); //die;
			$arrFolderPathLength = count($arrFolderPath);
			// echo $arrFolderPathLength."=========" ; //die;
			// echo $arrFolderPathLength-2;// die;
			$arrFolderPath[$arrFolderPathLength-2] = $fileOrFolderName;
			$arrFolderPath = array_filter($arrFolderPath);
			$folder_path =  implode("/", $arrFolderPath);

			// echo $old_folder_path."<br>" ; 
			// echo $folder_path." <br><br><br><br><br><br><br><br><br><br><br><br>" ; //die;
			// 	// echo $folder_pathNEW; 
			// echo $arrFolderPathLength;
			// echo "ddddddd<pre>"; print_r($arrFolderPath);
			// die;
			$resForFile=  mysqli_query($conn, "SELECT * FROM document_master_3 WHERE folder_id=". $arrOfIdAndPrefix[1]);	
			$rowForFile= mysqli_fetch_array($resForFile);
			$fileName= $rowForFile['document_name'];
			$id = $rowForFile['id'];

			$zipFileName= $id.'_'.$fileName.'.zip';
			// echo $zipFileName;
			include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3Connect.php');

			$oldName= 's3://fincrm/Development/'.$_SERVER['SERVER_NAME'].'/document_manager/'.$old_folder_path.$zipFileName;
			$newName= 's3://fincrm/Development/'.$_SERVER['SERVER_NAME'].'/document_manager/'.$folder_path.'/'.$zipFileName;
			$s3->registerStreamWrapper();
			rename($oldName, $newName);	
			// echo $oldName."<br>33333333333333    "; 
			// echo $newName."<br>";
			// // die;
			// rename('upload/'.$domainName.'/'.$old_folder_path, 'upload/'.$domainName.'/'.$folder_path);		
			mysqli_query($conn, "UPDATE sub_folder_master_3 SET folder_path='".$folder_path."', folder_name='".$fileOrFolderName."' WHERE id=".$arrOfIdAndPrefix[1] );
			$resForDOC = mysqli_query($conn, "SELECT * FROM document_master_3 WHERE folder_id=".$arrOfIdAndPrefix[1] );
			// echo "SELECT * FROM document_master_3 WHERE folder_id=".$arrOfIdAndPrefix[1] ; die;
			while($rowForDOC = mysqli_fetch_array($resForDOC)){
				$fileID= $rowForDOC['id'];
				// echo $fileID; die;
				mysqli_query($conn, "UPDATE document_master_3 SET folder_path='". $folder_path. "' WHERE id=". $fileID);
			}

			$res2 = mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id=". $subFolderId);
			while($row2 = mysqli_fetch_array($res2)){
				$subFolderId1= $row2['id'];
				$folder_path = $folder_path."/".$row2['folder_name'];
				mysqli_query($conn, "UPDATE sub_folder_master_3 SET folder_path='".$folder_path."' WHERE id=".$subFolderId1);


				$res3 = mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id=". $subFolderId1);
				while($row3 = mysqli_fetch_array($res3)){
					$subFolderId2= $row3['id'];
					$folder_path = $folder_path."/".$row3['folder_name'];
					mysqli_query($conn, "UPDATE sub_folder_master_3 SET folder_path='".$folder_path."' WHERE id=".$subFolderId2);
					$res4 = mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id=". $subFolderId2);
					while ($row4 = mysqli_fetch_array($res4)) {
						$subFolderId3= $row4['id'];
						$folder_path = $folder_path."/".$row4['folder_name'];
						mysqli_query($conn, "UPDATE sub_folder_master_3 SET folder_path='".$folder_path."' WHERE id=".$subFolderId3);

						$res5 = mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id=". $subFolderId3);
						while($row5 = mysqli_fetch_array($res5)){
							$subFolderId4= $row5['id'];
							$folder_path = $folder_path."/".$row5['folder_name'];
							mysqli_query($conn, "UPDATE sub_folder_master_3 SET folder_path='".$folder_path."' WHERE id=".$subFolderId4);

							$res6 = mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id=". $subFolderId4);
							while($row6 = mysqli_fetch_array($res6)){
								$subFolderId5= $row6['id'];
								$folder_path = $folder_path."/".$row6['folder_name'];
								mysqli_query($conn, "UPDATE sub_folder_master_3 SET folder_path='".$folder_path."' WHERE id=".$subFolderId5);

								$res7 = mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id=". $subFolderId5);
								while($row7 = mysqli_fetch_array($res7)){
									$subFolderId6= $row7['id'];
									$folder_path = $folder_path."/".$row7['folder_name'];
									mysqli_query($conn, "UPDATE sub_folder_master_3 SET folder_path='".$folder_path."' WHERE id=".$subFolderId6);

									$res8 = mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id=". $subFolderId6);
									while($row8 = mysqli_fetch_array($res8)){
										$subFolderId7= $row8['id'];
										$folder_path = $folder_path."/".$row8['folder_name'];
										mysqli_query($conn, "UPDATE sub_folder_master_3 SET folder_path='".$folder_path."' WHERE id=".$subFolderId7);

										$res9 = mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id=". $subFolderId7);
										while($row9 = mysqli_fetch_array($res9)){
											$subFolderId8= $row9['id'];
											$folder_path = $folder_path."/".$row9['folder_name'];
											mysqli_query($conn, "UPDATE sub_folder_master_3 SET folder_path='".$folder_path."' WHERE id=".$subFolderId8);
										}
									}
								}
							}
						}
					}
				}
			}
		}
		echo 1;
	}else{
		//echo "IN CHANGE FILE NAME"; 
		$res  = mysqli_query($conn, "SELECT * FROM document_master_3 WHERE id=". $arrOfIdAndPrefix[1]);

		$row = mysqli_fetch_array($res);

		$fileName= $row['document_name'];
		$folder_path = $row['folder_path'];

		// echo $folder_path; die;

		if($folder_path == "/"){
			$folder_pathold = $arrOfIdAndPrefix[1].'_'.$fileName.'.zip';
			$folder_pathnew1 = $arrOfIdAndPrefix[1].'_'.$fileOrFolderName.'.zip';
		}else{
			$folder_pathold = $folder_path.$arrOfIdAndPrefix[1].'_'.$fileName.'.zip';
			$folder_pathnew1 = $folder_path.$arrOfIdAndPrefix[1].'_'.$fileOrFolderName.'.zip';
		}

		include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3Connect.php');

			$oldName= 's3://fincrm/Development/'.$_SERVER['SERVER_NAME'].'/document_manager/'.$folder_pathold;
			$newName= 's3://fincrm/Development/'.$_SERVER['SERVER_NAME'].'/document_manager/'.$folder_pathnew1;

			// echo "OLD  == ".$oldName."<br>"; 
			// echo "NEW  == ".$newName."<br>";
			// die;
			$s3->registerStreamWrapper();
			rename($oldName, $newName);	

		// rename("upload/".$domainName.'/'.$folder_path.'/'.$arrOfIdAndPrefix[1].'_'.$fileName.'.zip', "upload/".$domainName.'/'.$folder_path.'/'.$arrOfIdAndPrefix[1].'_'.$fileOrFolderName.'.zip');
		$oldFileName= 'files/'.$domainName.'/'.$arrOfIdAndPrefix[1].'_'.$fileName;
		$newFileName= 'files/'.$domainName.'/'.$arrOfIdAndPrefix[1].'_'.$fileOrFolderName;

	
		$zip = new ZipArchive;
		$res1 = $zip->open("upload/".$domainName.'/'.$folder_path.'/'.$arrOfIdAndPrefix[1].'_'.$fileOrFolderName.'.zip');
		//echo $res1; //die;
		if ($res1 === TRUE) {

		    $zip->renameName($oldFileName,$newFileName);
		    $zip->close();
		    //echo "FILE RENAMED"; die;
		} else {
		    //echo 'failed, code:' //. $res1;die;
		}

		mysqli_query($conn, "UPDATE document_master_3 SET document_name='".$fileOrFolderName."' WHERE id=".$arrOfIdAndPrefix[1] );
		echo 1;
	}	


