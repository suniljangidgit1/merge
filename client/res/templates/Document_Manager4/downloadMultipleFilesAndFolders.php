<?php

	// require 'vendor/autoload.php';
	include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3Connect.php');
	session_start();
	error_reporting(0);
	$arrForDeleteFiles = $_SESSION['idsForDelete'];
	// echo "<pre>"; print_r($arrForDeleteFiles);
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	//Array for all ids from Folder Master, Sub Folder Master And Document Master....
	$arrForFolderMasterIds= array();
	$arrForSubFolderMasterIds= array();
	$arrForDocumentMasterIds= array();
	//Get All Ids from folder Master...
	$resForFolderMasterIDs= mysqli_query($conn, "SELECT * FROM folder_master_3");
	while($rowForFolderMasterIDs= mysqli_fetch_array($resForFolderMasterIDs)){
		$idForcheckBox=$rowForFolderMasterIDs['prefix']." ".$rowForFolderMasterIDs['id'];
		$arrForFolderMasterIds[]= $idForcheckBox;
	}
	//Get All Ids from sub folder master ....
	$resForSubFolderMasterIDs= mysqli_query($conn, "SELECT * FROM sub_folder_master_3");
	while($rowForSubFolderMasterIDs= mysqli_fetch_array($resForSubFolderMasterIDs)){
		$idForcheckBox=$rowForSubFolderMasterIDs['prefix']." ".$rowForSubFolderMasterIDs['id'];
		$arrForSubFolderMasterIds[]= $idForcheckBox;
	}
	//Get All Ids from Document Master.....
	$resForDocumentMasterIDs= mysqli_query($conn, "SELECT * FROM document_master_3");
	while($rowForDocumentMasterIDs= mysqli_fetch_array($resForDocumentMasterIDs)){
		$idForcheckBox=$rowForDocumentMasterIDs['prefix']." ".$rowForDocumentMasterIDs['id'];
		$arrForDocumentMasterIds[]= $idForcheckBox;
	}

	
	$arrForIds= array();
	$arrForIds=$arrForDeleteFiles;

	for($i=0; $i<count($arrForIds); $i++){
		$id= $arrForIds[$i];

		if(in_array($id, $arrForFolderMasterIds)){
			$idWithPrefix=$id;
			$arrOfIdAndPrefix= explode(" ", $idWithPrefix);
			//Get Document files of main folder,,,...........
			$res = mysqli_query($conn, "SELECT * FROM folder_master_3 WHERE id=".$arrOfIdAndPrefix[1]);
			while($row = mysqli_fetch_array($res)){
				$folderId  = $row['id'];
				$folderName= $row['folder_name'];
				//$folder_path = $row['folder_path'];

				//echo "FODLER NAME = ". $folderName."<br>";
				// //echo "FODLER PATH = ". $folder_path."<br>";
				if(!is_dir("upload/All")){
					mkdir("upload/All/");
					chmod("upload/All/", 0777);
				}
				if(!is_dir("upload/All/".$folderName)){
					mkdir("upload/All/".$folderName);
					chmod("upload/All/".$folderName, 0777);	
				}
				$res0 = mysqli_query($conn, "SELECT * FROM document_master_3 WHERE folder_id=".$folderId);
				while($row0=mysqli_fetch_array($res0)){
					$fileId= $row0['id'];
					$fileName = $row0['document_name'];
					$folder_path = $row0['folder_path'];
					//echo "Folder Path ----->>>> ".$folder_path."<br>";
					$zipFileName= $fileId.'_'.$fileName.'.zip';
					//echo "ZIP FILE NAME = <<<<>>>>> ". $zipFileName."<br>";
					if($folder_path=="/"){
						$path = $zipFileName;
					}else{
						$path = $folder_path.$zipFileName;
					}

					$s3 = new Aws\S3\S3Client([
			            'region'  => 'ap-south-1',
			            'version' => '2006-03-01',
			            'credentials' => [
			                'key'    => "AKIAVKMGGRZRUOQQMSEE",
			                'secret' => "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",
			            ]
			        ]);
					//echo 'upload/All/'.$path."<br>";
			        $result = $s3->getObject(array(
				    	'Bucket' => 'fincrm',
				        'Key'    => 'Development/'.$_SERVER['SERVER_NAME'].'/document_manager/'.$path,
				    	'SaveAs' => 'upload/All/'.$path
					));

			        // Extract files....
			        //echo "ZIP FILE PATH --- < < > > upload/All/".$path. "<br>";
			        $zip = new ZipArchive;
					if ($zip->open('upload/All/'.$path) === TRUE) {
					    $zip->extractTo('upload/All/'.$folder_path);
					    $zip->close();
					    //echo 'ok';
					} else {
					    //echo 'failed';
					}

					// File decrypt code start.....//////////////////////
					$encrypted_file = 'upload/All/'.$folder_path.'files/fincrm.crm.com/'.$fileId.'_'.$fileName;
					$decrypted_file = 'upload/All/'.$folder_path.$fileName;

					//echo "ENCRYPTED FILE PATH = >>>". $encrypted_file. "<br>";
					//echo "DECRYPTED FILE PATH = >>>". $decrypted_file. "<br>";
					//die;
					$password = 'password';
					$fd_in = fopen($encrypted_file, 'rb');
					$fd_out = fopen($decrypted_file, 'wb');
					$chunk_size = 4096;
					$alg = unpack('C', fread($fd_in, 1))[1];
					$opslimit = unpack('P', fread($fd_in, 8))[1];
					$memlimit = unpack('P', fread($fd_in, 8))[1];
					$salt = fread($fd_in, SODIUM_CRYPTO_PWHASH_SALTBYTES);

					$header = fread($fd_in, SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_HEADERBYTES);

					$secret_key = sodium_crypto_pwhash(SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_KEYBYTES,
					                                   $password, $salt, $opslimit, $memlimit, $alg);

					$stream = sodium_crypto_secretstream_xchacha20poly1305_init_pull($header, $secret_key);
					do {
					    $chunk = fread($fd_in, $chunk_size + SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_ABYTES);
					    $res = sodium_crypto_secretstream_xchacha20poly1305_pull($stream, $chunk);
					    if ($res === FALSE) {
					       break;
					    }
					    list($decrypted_chunk, $tag) = $res;
					    fwrite($fd_out, $decrypted_chunk);
					} while (!feof($fd_in) && $tag !== SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_TAG_FINAL);
					$ok = feof($fd_in);

					fclose($fd_out);
					fclose($fd_in);

					if (!$ok) {
					    die('Invalid/corrupted input');
					}
					unlink('upload/All/'.$folder_path.'files/fincrm.crm.com/'.$fileId.'_'.$fileName);
					unlink('upload/All/'.$path);
					rmdir('upload/All/'.$folder_path.'/files/fincrm.crm.com');
					rmdir('upload/All/'.$folder_path.'/files');
				}

				$res1 = mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id=". $folderId);
				while($row1=mysqli_fetch_array($res1)){
					$subFolderId = $row1['id'];
					$subFolderName= $row1['folder_name'];
					$folder_path = $row1['folder_path'];

					if(!is_dir("upload/All/".$folder_path)){
						mkdir("upload/All/".$folder_path);
						chmod("upload/All/".$folder_path, 0777);	
					}
					$res2 = mysqli_query($conn, "SELECT * FROM document_master_3 WHERE folder_id=".$subFolderId);
					while($row2=mysqli_fetch_array($res2)){
						$fileId1= $row2['id'];
						$fileName1 = $row2['document_name'];
						$folder_path1 = $row2['folder_path'];
						//echo "Folder Path1111111111 ----->>>> ".$folder_path1."<br>";
						$zipFileName1= $fileId1.'_'.$fileName1.'.zip';
						//echo "ZIP FILE NAME11111111111111 = <<<<>>>>> ". $zipFileName1."<br>";
						if($folder_path1=="/"){
							$path1 = $zipFileName1;
						}else{
							$path1 = $folder_path1.$zipFileName1;
						}
						$s3 = new Aws\S3\S3Client([
				            'region'  => 'ap-south-1',
				            'version' => '2006-03-01',
				            'credentials' => [
				                'key'    => "AKIAVKMGGRZRUOQQMSEE",
				                'secret' => "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",
				            ]
				        ]);
						//echo 'upload/All/'.$path."<br>";
				        $result = $s3->getObject(array(
					    	'Bucket' => 'fincrm',
					        'Key'    => 'Development/'.$_SERVER['SERVER_NAME'].'/document_manager/'.$path1,
					    	'SaveAs' => 'upload/All/'.$path1
						));
						// Extract files....
				        //echo "ZIP FILE PATH11111111111 --- < < > > upload/All/".$path. "<br>";
				        $zip = new ZipArchive;
						if ($zip->open('upload/All/'.$path1) === TRUE) {
						    $zip->extractTo('upload/All/'.$folder_path1);
						    $zip->close();
						    //echo 'ok';
						} else {
						    //echo 'failed';
						}

						// File decrypt code start.....//////////////////////
						$encrypted_file = 'upload/All/'.$folder_path1.'files/fincrm.crm.com/'.$fileId1.'_'.$fileName1;
						$decrypted_file = 'upload/All/'.$folder_path1.$fileName1;

						//echo "ENCRYPTED FILE PATH111111111 = >>>". $encrypted_file. "<br>";
						//echo "DECRYPTED FILE PATH111111111 = >>>". $decrypted_file. "<br>";
						//die;
						$password = 'password';
						$fd_in = fopen($encrypted_file, 'rb');
						$fd_out = fopen($decrypted_file, 'wb');
						$chunk_size = 4096;
						$alg = unpack('C', fread($fd_in, 1))[1];
						$opslimit = unpack('P', fread($fd_in, 8))[1];
						$memlimit = unpack('P', fread($fd_in, 8))[1];
						$salt = fread($fd_in, SODIUM_CRYPTO_PWHASH_SALTBYTES);

						$header = fread($fd_in, SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_HEADERBYTES);

						$secret_key = sodium_crypto_pwhash(SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_KEYBYTES,
						                                   $password, $salt, $opslimit, $memlimit, $alg);

						$stream = sodium_crypto_secretstream_xchacha20poly1305_init_pull($header, $secret_key);
						do {
						    $chunk = fread($fd_in, $chunk_size + SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_ABYTES);
						    $res = sodium_crypto_secretstream_xchacha20poly1305_pull($stream, $chunk);
						    if ($res === FALSE) {
						       break;
						    }
						    list($decrypted_chunk, $tag) = $res;
						    fwrite($fd_out, $decrypted_chunk);
						} while (!feof($fd_in) && $tag !== SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_TAG_FINAL);
						$ok = feof($fd_in);

						fclose($fd_out);
						fclose($fd_in);

						if (!$ok) {
						    die('Invalid/corrupted input');
						}
						unlink('upload/All/'.$folder_path1.'files/fincrm.crm.com/'.$fileId1.'_'.$fileName1);
						unlink('upload/All/'.$path1);
						rmdir('upload/All/'.$folder_path1.'/files/fincrm.crm.com');
						rmdir('upload/All/'.$folder_path1.'/files');

					}
					$res3 = mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id=".$subFolderId);
					while($row3 = mysqli_fetch_array($res3)){
						$subFolderId1 = $row3['id'];
						$subFolderName1= $row3['folder_name'];
						$folder_path = $row3['folder_path'];

						if(!is_dir("upload/All/".$folder_path)){
							mkdir("upload/All/".$folder_path);
							chmod("upload/All/".$folder_path, 0777);	
						}
						$res4 = mysqli_query($conn, "SELECT * FROM document_master_3 WHERE folder_id=".$subFolderId1);
						while($row4=mysqli_fetch_array($res4)){
							$fileId2= $row4['id'];
							$fileName2 = $row4['document_name'];
							$folder_path = $row4['folder_path'];
							//echo "Folder Path1111111111 ----->>>> ".$folder_path."<br>";
							$zipFileName= $fileId2.'_'.$fileName2.'.zip';
							//echo "ZIP FILE NAME11111111111111 = <<<<>>>>> ". $zipFileName1."<br>";
							if($folder_path=="/"){
								$path = $zipFileName;
							}else{
								$path = $folder_path.$zipFileName;
							}
							$s3 = new Aws\S3\S3Client([
					            'region'  => 'ap-south-1',
					            'version' => '2006-03-01',
					            'credentials' => [
					                'key'    => "AKIAVKMGGRZRUOQQMSEE",
					                'secret' => "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",
					            ]
					        ]);
							//echo 'upload/All/'.$path."<br>";
					        $result = $s3->getObject(array(
						    	'Bucket' => 'fincrm',
						        'Key'    => 'Development/'.$_SERVER['SERVER_NAME'].'/document_manager/'.$path,
						    	'SaveAs' => 'upload/All/'.$path
							));
							// Extract files....
					        //echo "ZIP FILE PATH11111111111 --- < < > > upload/All/".$path. "<br>";
					        $zip = new ZipArchive;
							if ($zip->open('upload/All/'.$path) === TRUE) {
							    $zip->extractTo('upload/All/'.$folder_path);
							    $zip->close();
							    //echo 'ok';
							} else {
							    //echo 'failed';
							}
							// File decrypt code start.....//////////////////////
							$encrypted_file = 'upload/All/'.$folder_path.'files/fincrm.crm.com/'.$fileId2.'_'.$fileName2;
							$decrypted_file = 'upload/All/'.$folder_path.$fileName2;

							//echo "ENCRYPTED FILE PATH111111111 = >>>". $encrypted_file. "<br>";
							//echo "DECRYPTED FILE PATH111111111 = >>>". $decrypted_file. "<br>";
							//die;
							$password = 'password';
							$fd_in = fopen($encrypted_file, 'rb');
							$fd_out = fopen($decrypted_file, 'wb');
							$chunk_size = 4096;
							$alg = unpack('C', fread($fd_in, 1))[1];
							$opslimit = unpack('P', fread($fd_in, 8))[1];
							$memlimit = unpack('P', fread($fd_in, 8))[1];
							$salt = fread($fd_in, SODIUM_CRYPTO_PWHASH_SALTBYTES);

							$header = fread($fd_in, SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_HEADERBYTES);

							$secret_key = sodium_crypto_pwhash(SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_KEYBYTES,
							                                   $password, $salt, $opslimit, $memlimit, $alg);

							$stream = sodium_crypto_secretstream_xchacha20poly1305_init_pull($header, $secret_key);
							do {
							    $chunk = fread($fd_in, $chunk_size + SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_ABYTES);
							    $res = sodium_crypto_secretstream_xchacha20poly1305_pull($stream, $chunk);
							    if ($res === FALSE) {
							       break;
							    }
							    list($decrypted_chunk, $tag) = $res;
							    fwrite($fd_out, $decrypted_chunk);
							} while (!feof($fd_in) && $tag !== SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_TAG_FINAL);
							$ok = feof($fd_in);

							fclose($fd_out);
							fclose($fd_in);

							if (!$ok) {
							    die('Invalid/corrupted input');
							}
							unlink('upload/All/'.$folder_path.'files/fincrm.crm.com/'.$fileId2.'_'.$fileName2);
							unlink('upload/All/'.$path);
							rmdir('upload/All/'.$folder_path.'files/fincrm.crm.com');
							rmdir('upload/All/'.$folder_path.'files');
	
						}

						$res5 = mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id=".$subFolderId1);
						while($row5=mysqli_fetch_array($res5)){
							$subFolderId2 = $row5['id'];
							$subFolderName2= $row5['folder_name'];
							$folder_path = $row5['folder_path'];

							if(!is_dir("upload/All/".$folder_path)){
								mkdir("upload/All/".$folder_path);
								chmod("upload/All/".$folder_path, 0777);	
							}
							$res6 = mysqli_query($conn, "SELECT * FROM document_master_3 WHERE folder_id=".$subFolderId2);
							while($row6=mysqli_fetch_array($res6)){
								$fileId3= $row6['id'];
								$fileName3 = $row6['document_name'];
								$folder_path = $row6['folder_path'];
								//echo "Folder Path1111111111 ----->>>> ".$folder_path."<br>";
								$zipFileName= $fileId3.'_'.$fileName3.'.zip';
								//echo "ZIP FILE NAME11111111111111 = <<<<>>>>> ". $zipFileName."<br>";
								if($folder_path=="/"){
									$path = $zipFileName;
								}else{
									$path = $folder_path.$zipFileName;
								}
								$s3 = new Aws\S3\S3Client([
						            'region'  => 'ap-south-1',
						            'version' => '2006-03-01',
						            'credentials' => [
						                'key'    => "AKIAVKMGGRZRUOQQMSEE",
						                'secret' => "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",
						            ]
						        ]);
								//echo 'upload/All/'.$path."<br>";
						        $result = $s3->getObject(array(
							    	'Bucket' => 'fincrm',
							        'Key'    => 'Development/'.$_SERVER['SERVER_NAME'].'/document_manager/'.$path,
							    	'SaveAs' => 'upload/All/'.$path
								));
								// Extract files....
						        //echo "ZIP FILE PATH11111111111 --- < < > > upload/All/".$path. "<br>";
						        $zip = new ZipArchive;
								if ($zip->open('upload/All/'.$path) === TRUE) {
								    $zip->extractTo('upload/All/'.$folder_path);
								    $zip->close();
								    //echo 'ok';
								} else {
								    //echo 'failed';
								}
								// File decrypt code start.....//////////////////////
								$encrypted_file = 'upload/All/'.$folder_path.'files/fincrm.crm.com/'.$fileId3.'_'.$fileName3;
								$decrypted_file = 'upload/All/'.$folder_path.$fileName3;

								//echo "ENCRYPTED FILE PATH111111111 = >>>". $encrypted_file. "<br>";
								//echo "DECRYPTED FILE PATH111111111 = >>>". $decrypted_file. "<br>";
								//die;
								$password = 'password';
								$fd_in = fopen($encrypted_file, 'rb');
								$fd_out = fopen($decrypted_file, 'wb');
								$chunk_size = 4096;
								$alg = unpack('C', fread($fd_in, 1))[1];
								$opslimit = unpack('P', fread($fd_in, 8))[1];
								$memlimit = unpack('P', fread($fd_in, 8))[1];
								$salt = fread($fd_in, SODIUM_CRYPTO_PWHASH_SALTBYTES);

								$header = fread($fd_in, SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_HEADERBYTES);

								$secret_key = sodium_crypto_pwhash(SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_KEYBYTES,
								                                   $password, $salt, $opslimit, $memlimit, $alg);

								$stream = sodium_crypto_secretstream_xchacha20poly1305_init_pull($header, $secret_key);
								do {
								    $chunk = fread($fd_in, $chunk_size + SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_ABYTES);
								    $res = sodium_crypto_secretstream_xchacha20poly1305_pull($stream, $chunk);
								    if ($res === FALSE) {
								       break;
								    }
								    list($decrypted_chunk, $tag) = $res;
								    fwrite($fd_out, $decrypted_chunk);
								} while (!feof($fd_in) && $tag !== SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_TAG_FINAL);
								$ok = feof($fd_in);

								fclose($fd_out);
								fclose($fd_in);

								if (!$ok) {
								    die('Invalid/corrupted input');
								}
								unlink('upload/All/'.$folder_path.'files/fincrm.crm.com/'.$fileId3.'_'.$fileName3);
								unlink('upload/All/'.$path);
								rmdir('upload/All/'.$folder_path.'files/fincrm.crm.com');
								rmdir('upload/All/'.$folder_path.'files');	
							}	
						}
					}

				}

			}
		}
		if(in_array($id, $arrForSubFolderMasterIds)){
			$idWithPrefix=$id;
			$arrOfIdAndPrefix= explode(" ", $idWithPrefix);
			

			// echo "ID --- >". $arrOfIdAndPrefix[1]."<br>";
			// echo "SELECT * FROM sub_folder_master_3 WHERE id=".$arrOfIdAndPrefix[1];	
			$res = mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE id=".$arrOfIdAndPrefix[1]);
			while($row = mysqli_fetch_array($res)){
				$folderId  = $row['id'];
				$folder_master_id = $row['folder_master_id'];
				$folderName= $row['folder_name'];
				$folder_path = $row['folder_path'];
				if(!is_dir("upload/All")){
					mkdir("upload/All/");
					chmod("upload/All/", 0777);
				}
			$rrr = mysqli_query($conn, "SELECT * FROM folder_master_3 WHERE id=". $folder_master_id);
			$roro= mysqli_fetch_array($rrr);
			$mainFolderName= $roro['folder_name'];

				// echo "FODLER NAME = ". $folderName."<br>";
				// echo "FODLER PATH = ". $folder_path."<br>";
				if(!is_dir("upload/All")){

					mkdir("upload/All/");
					chmod("upload/All/", 0777);	
				}
				if(!is_dir("upload/All/".$mainFolderName)){

					mkdir("upload/All/".$mainFolderName);
					chmod("upload/All/".$mainFolderName, 0777);	
				}
				
				if(!is_dir("upload/All/".$folder_path)){
					mkdir("upload/All/".$folder_path);
					chmod("upload/All/".$folder_path, 0777);
				}
				$res0 = mysqli_query($conn, "SELECT * FROM document_master_3 WHERE folder_id=".$folderId);
				while($row0=mysqli_fetch_array($res0)){
					$fileId= $row0['id'];
					$fileName = $row0['document_name'];
					$folder_path = $row0['folder_path'];
					//echo "Folder Path ----->>>> ".$folder_path."<br>";
					$zipFileName= $fileId.'_'.$fileName.'.zip';
					//echo "ZIP FILE NAME = <<<<>>>>> ". $zipFileName."<br>";
					if($folder_path=="/"){
						$path = $zipFileName;
					}else{
						$path = $folder_path.$zipFileName;
					}

					$s3 = new Aws\S3\S3Client([
			            'region'  => 'ap-south-1',
			            'version' => '2006-03-01',
			            'credentials' => [
			                'key'    => "AKIAVKMGGRZRUOQQMSEE",
			                'secret' => "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",
			            ]
			        ]);
					// echo 'upload/All/'.$path."<br>";
			        $result = $s3->getObject(array(
				    	'Bucket' => 'fincrm',
				        'Key'    => 'Development/'.$_SERVER['SERVER_NAME'].'/document_manager/'.$path,
				    	'SaveAs' => 'upload/All/'.$path
					));

			        // Extract files....
			        //echo "ZIP FILE PATH --- < < > > upload/All/".$path. "<br>";
			        $zip = new ZipArchive;
					if ($zip->open('upload/All/'.$path) === TRUE) {
					    $zip->extractTo('upload/All/'.$folder_path);
					    $zip->close();
					    //echo 'ok';
					} else {
					    //echo 'failed';
					}

					// File decrypt code start.....//////////////////////
					$encrypted_file = 'upload/All/'.$folder_path.'files/fincrm.crm.com/'.$fileId.'_'.$fileName;
					$decrypted_file = 'upload/All/'.$folder_path.$fileName;

					//echo "ENCRYPTED FILE PATH = >>>". $encrypted_file. "<br>";
					//echo "DECRYPTED FILE PATH = >>>". $decrypted_file. "<br>";
					//die;
					$password = 'password';
					$fd_in = fopen($encrypted_file, 'rb');
					$fd_out = fopen($decrypted_file, 'wb');
					$chunk_size = 4096;
					$alg = unpack('C', fread($fd_in, 1))[1];
					$opslimit = unpack('P', fread($fd_in, 8))[1];
					$memlimit = unpack('P', fread($fd_in, 8))[1];
					$salt = fread($fd_in, SODIUM_CRYPTO_PWHASH_SALTBYTES);

					$header = fread($fd_in, SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_HEADERBYTES);

					$secret_key = sodium_crypto_pwhash(SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_KEYBYTES,
					                                   $password, $salt, $opslimit, $memlimit, $alg);

					$stream = sodium_crypto_secretstream_xchacha20poly1305_init_pull($header, $secret_key);
					do {
					    $chunk = fread($fd_in, $chunk_size + SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_ABYTES);
					    $res = sodium_crypto_secretstream_xchacha20poly1305_pull($stream, $chunk);
					    if ($res === FALSE) {
					       break;
					    }
					    list($decrypted_chunk, $tag) = $res;
					    fwrite($fd_out, $decrypted_chunk);
					} while (!feof($fd_in) && $tag !== SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_TAG_FINAL);
					$ok = feof($fd_in);

					fclose($fd_out);
					fclose($fd_in);

					if (!$ok) {
					    die('Invalid/corrupted input');
					}
					unlink('upload/All/'.$folder_path.'files/fincrm.crm.com/'.$fileId.'_'.$fileName);
					unlink('upload/All/'.$path);
					rmdir('upload/All/'.$folder_path.'/files/fincrm.crm.com');
					rmdir('upload/All/'.$folder_path.'/files');
				}

				$res1 = mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id=". $folderId);
				while($row1=mysqli_fetch_array($res1)){
					$subFolderId = $row1['id'];
					$subFolderName= $row1['folder_name'];
					$folder_path = $row1['folder_path'];

					if(!is_dir("upload/All/".$folder_path)){
						mkdir("upload/All/".$folder_path);
						chmod("upload/All/".$folder_path, 0777);	
					}
					$res2 = mysqli_query($conn, "SELECT * FROM document_master_3 WHERE folder_id=".$subFolderId);
					while($row2=mysqli_fetch_array($res2)){
						$fileId1= $row2['id'];
						$fileName1 = $row2['document_name'];
						$folder_path1 = $row2['folder_path'];
						//echo "Folder Path1111111111 ----->>>> ".$folder_path1."<br>";
						$zipFileName1= $fileId1.'_'.$fileName1.'.zip';
						//echo "ZIP FILE NAME11111111111111 = <<<<>>>>> ". $zipFileName1."<br>";
						if($folder_path1=="/"){
							$path1 = $zipFileName1;
						}else{
							$path1 = $folder_path1.$zipFileName1;
						}
						$s3 = new Aws\S3\S3Client([
				            'region'  => 'ap-south-1',
				            'version' => '2006-03-01',
				            'credentials' => [
				                'key'    => "AKIAVKMGGRZRUOQQMSEE",
				                'secret' => "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",
				            ]
				        ]);
						//echo 'upload/All/'.$path."<br>";
				        $result = $s3->getObject(array(
					    	'Bucket' => 'fincrm',
					        'Key'    => 'Development/'.$_SERVER['SERVER_NAME'].'/document_manager/'.$path1,
					    	'SaveAs' => 'upload/All/'.$path1
						));
						// Extract files....
				        //echo "ZIP FILE PATH11111111111 --- < < > > upload/All/".$path. "<br>";
				        $zip = new ZipArchive;
						if ($zip->open('upload/All/'.$path1) === TRUE) {
						    $zip->extractTo('upload/All/'.$folder_path1);
						    $zip->close();
						    //echo 'ok';
						} else {
						    //echo 'failed';
						}

						// File decrypt code start.....//////////////////////
						$encrypted_file = 'upload/All/'.$folder_path1.'files/fincrm.crm.com/'.$fileId1.'_'.$fileName1;
						$decrypted_file = 'upload/All/'.$folder_path1.$fileName1;

						//echo "ENCRYPTED FILE PATH111111111 = >>>". $encrypted_file. "<br>";
						//echo "DECRYPTED FILE PATH111111111 = >>>". $decrypted_file. "<br>";
						//die;
						$password = 'password';
						$fd_in = fopen($encrypted_file, 'rb');
						$fd_out = fopen($decrypted_file, 'wb');
						$chunk_size = 4096;
						$alg = unpack('C', fread($fd_in, 1))[1];
						$opslimit = unpack('P', fread($fd_in, 8))[1];
						$memlimit = unpack('P', fread($fd_in, 8))[1];
						$salt = fread($fd_in, SODIUM_CRYPTO_PWHASH_SALTBYTES);

						$header = fread($fd_in, SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_HEADERBYTES);

						$secret_key = sodium_crypto_pwhash(SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_KEYBYTES,
						                                   $password, $salt, $opslimit, $memlimit, $alg);

						$stream = sodium_crypto_secretstream_xchacha20poly1305_init_pull($header, $secret_key);
						do {
						    $chunk = fread($fd_in, $chunk_size + SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_ABYTES);
						    $res = sodium_crypto_secretstream_xchacha20poly1305_pull($stream, $chunk);
						    if ($res === FALSE) {
						       break;
						    }
						    list($decrypted_chunk, $tag) = $res;
						    fwrite($fd_out, $decrypted_chunk);
						} while (!feof($fd_in) && $tag !== SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_TAG_FINAL);
						$ok = feof($fd_in);

						fclose($fd_out);
						fclose($fd_in);

						if (!$ok) {
						    die('Invalid/corrupted input');
						}
						unlink('upload/All/'.$folder_path1.'files/fincrm.crm.com/'.$fileId1.'_'.$fileName1);
						unlink('upload/All/'.$path1);
						rmdir('upload/All/'.$folder_path1.'/files/fincrm.crm.com');
						rmdir('upload/All/'.$folder_path1.'/files');

					}
					$res3 = mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id=".$subFolderId);
					while($row3 = mysqli_fetch_array($res3)){
						$subFolderId1 = $row3['id'];
						$subFolderName1= $row3['folder_name'];
						$folder_path = $row3['folder_path'];

						if(!is_dir("upload/All/".$folder_path)){
							mkdir("upload/All/".$folder_path);
							chmod("upload/All/".$folder_path, 0777);	
						}
						$res4 = mysqli_query($conn, "SELECT * FROM document_master_3 WHERE folder_id=".$subFolderId1);
						while($row4=mysqli_fetch_array($res4)){
							$fileId2= $row4['id'];
							$fileName2 = $row4['document_name'];
							$folder_path = $row4['folder_path'];
							//echo "Folder Path1111111111 ----->>>> ".$folder_path."<br>";
							$zipFileName= $fileId2.'_'.$fileName2.'.zip';
							//echo "ZIP FILE NAME11111111111111 = <<<<>>>>> ". $zipFileName1."<br>";
							if($folder_path=="/"){
								$path = $zipFileName;
							}else{
								$path = $folder_path.$zipFileName;
							}
							$s3 = new Aws\S3\S3Client([
					            'region'  => 'ap-south-1',
					            'version' => '2006-03-01',
					            'credentials' => [
					                'key'    => "AKIAVKMGGRZRUOQQMSEE",
					                'secret' => "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",
					            ]
					        ]);
							//echo 'upload/All/'.$path."<br>";
					        $result = $s3->getObject(array(
						    	'Bucket' => 'fincrm',
						        'Key'    => 'Development/'.$_SERVER['SERVER_NAME'].'/document_manager/'.$path,
						    	'SaveAs' => 'upload/All/'.$path
							));
							// Extract files....
					        //echo "ZIP FILE PATH11111111111 --- < < > > upload/All/".$path. "<br>";
					        $zip = new ZipArchive;
							if ($zip->open('upload/All/'.$path) === TRUE) {
							    $zip->extractTo('upload/All/'.$folder_path);
							    $zip->close();
							    //echo 'ok';
							} else {
							    //echo 'failed';
							}
							// File decrypt code start.....//////////////////////
							$encrypted_file = 'upload/All/'.$folder_path.'files/fincrm.crm.com/'.$fileId2.'_'.$fileName2;
							$decrypted_file = 'upload/All/'.$folder_path.$fileName2;

							//echo "ENCRYPTED FILE PATH111111111 = >>>". $encrypted_file. "<br>";
							//echo "DECRYPTED FILE PATH111111111 = >>>". $decrypted_file. "<br>";
							//die;
							$password = 'password';
							$fd_in = fopen($encrypted_file, 'rb');
							$fd_out = fopen($decrypted_file, 'wb');
							$chunk_size = 4096;
							$alg = unpack('C', fread($fd_in, 1))[1];
							$opslimit = unpack('P', fread($fd_in, 8))[1];
							$memlimit = unpack('P', fread($fd_in, 8))[1];
							$salt = fread($fd_in, SODIUM_CRYPTO_PWHASH_SALTBYTES);

							$header = fread($fd_in, SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_HEADERBYTES);

							$secret_key = sodium_crypto_pwhash(SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_KEYBYTES,
							                                   $password, $salt, $opslimit, $memlimit, $alg);

							$stream = sodium_crypto_secretstream_xchacha20poly1305_init_pull($header, $secret_key);
							do {
							    $chunk = fread($fd_in, $chunk_size + SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_ABYTES);
							    $res = sodium_crypto_secretstream_xchacha20poly1305_pull($stream, $chunk);
							    if ($res === FALSE) {
							       break;
							    }
							    list($decrypted_chunk, $tag) = $res;
							    fwrite($fd_out, $decrypted_chunk);
							} while (!feof($fd_in) && $tag !== SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_TAG_FINAL);
							$ok = feof($fd_in);

							fclose($fd_out);
							fclose($fd_in);

							if (!$ok) {
							    die('Invalid/corrupted input');
							}
							unlink('upload/All/'.$folder_path.'files/fincrm.crm.com/'.$fileId2.'_'.$fileName2);
							unlink('upload/All/'.$path);
							rmdir('upload/All/'.$folder_path.'files/fincrm.crm.com');
							rmdir('upload/All/'.$folder_path.'files');
	
						}

						$res5 = mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id=".$subFolderId1);
						while($row5=mysqli_fetch_array($res5)){
							$subFolderId2 = $row5['id'];
							$subFolderName2= $row5['folder_name'];
							$folder_path = $row5['folder_path'];

							if(!is_dir("upload/All/".$folder_path)){
								mkdir("upload/All/".$folder_path);
								chmod("upload/All/".$folder_path, 0777);	
							}
							$res6 = mysqli_query($conn, "SELECT * FROM document_master_3 WHERE folder_id=".$subFolderId2);
							while($row6=mysqli_fetch_array($res6)){
								$fileId3= $row6['id'];
								$fileName3 = $row6['document_name'];
								$folder_path = $row6['folder_path'];
								//echo "Folder Path1111111111 ----->>>> ".$folder_path."<br>";
								$zipFileName= $fileId3.'_'.$fileName3.'.zip';
								//echo "ZIP FILE NAME11111111111111 = <<<<>>>>> ". $zipFileName."<br>";
								if($folder_path=="/"){
									$path = $zipFileName;
								}else{
									$path = $folder_path.$zipFileName;
								}
								$s3 = new Aws\S3\S3Client([
						            'region'  => 'ap-south-1',
						            'version' => '2006-03-01',
						            'credentials' => [
						                'key'    => "AKIAVKMGGRZRUOQQMSEE",
						                'secret' => "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",
						            ]
						        ]);
								//echo 'upload/All/'.$path."<br>";
						        $result = $s3->getObject(array(
							    	'Bucket' => 'fincrm',
							        'Key'    => 'Development/'.$_SERVER['SERVER_NAME'].'/document_manager/'.$path,
							    	'SaveAs' => 'upload/All/'.$path
								));
								// Extract files....
						        //echo "ZIP FILE PATH11111111111 --- < < > > upload/All/".$path. "<br>";
						        $zip = new ZipArchive;
								if ($zip->open('upload/All/'.$path) === TRUE) {
								    $zip->extractTo('upload/All/'.$folder_path);
								    $zip->close();
								    //echo 'ok';
								} else {
								    //echo 'failed';
								}
								// File decrypt code start.....//////////////////////
								$encrypted_file = 'upload/All/'.$folder_path.'files/fincrm.crm.com/'.$fileId3.'_'.$fileName3;
								$decrypted_file = 'upload/All/'.$folder_path.$fileName3;

								//echo "ENCRYPTED FILE PATH111111111 = >>>". $encrypted_file. "<br>";
								//echo "DECRYPTED FILE PATH111111111 = >>>". $decrypted_file. "<br>";
								//die;
								$password = 'password';
								$fd_in = fopen($encrypted_file, 'rb');
								$fd_out = fopen($decrypted_file, 'wb');
								$chunk_size = 4096;
								$alg = unpack('C', fread($fd_in, 1))[1];
								$opslimit = unpack('P', fread($fd_in, 8))[1];
								$memlimit = unpack('P', fread($fd_in, 8))[1];
								$salt = fread($fd_in, SODIUM_CRYPTO_PWHASH_SALTBYTES);

								$header = fread($fd_in, SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_HEADERBYTES);

								$secret_key = sodium_crypto_pwhash(SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_KEYBYTES,
								                                   $password, $salt, $opslimit, $memlimit, $alg);

								$stream = sodium_crypto_secretstream_xchacha20poly1305_init_pull($header, $secret_key);
								do {
								    $chunk = fread($fd_in, $chunk_size + SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_ABYTES);
								    $res = sodium_crypto_secretstream_xchacha20poly1305_pull($stream, $chunk);
								    if ($res === FALSE) {
								       break;
								    }
								    list($decrypted_chunk, $tag) = $res;
								    fwrite($fd_out, $decrypted_chunk);
								} while (!feof($fd_in) && $tag !== SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_TAG_FINAL);
								$ok = feof($fd_in);

								fclose($fd_out);
								fclose($fd_in);

								if (!$ok) {
								    die('Invalid/corrupted input');
								}
								unlink('upload/All/'.$folder_path.'files/fincrm.crm.com/'.$fileId3.'_'.$fileName3);
								unlink('upload/All/'.$path);
								rmdir('upload/All/'.$folder_path.'files/fincrm.crm.com');
								rmdir('upload/All/'.$folder_path.'files');	
							}	
						}
					}

				}

			}
		}
		// echo "<pre>"
		if(in_array($id, $arrForDocumentMasterIds)){
			$idWithPrefix=$id;
			$arrOfIdAndPrefix= explode(" ", $idWithPrefix);

			// echo "ID --- >". $arrOfIdAndPrefix[1]."<br>";
			$r= mysqli_query($conn, "SELECT * FROM document_master_3 WHERE id=".$arrOfIdAndPrefix[1]);
			while($ro=mysqli_fetch_array($r)){
				$fid= $ro['id'];
				$fName= $ro['document_name'];
				$folder_path = $ro['folder_path'];
				echo "Folder Path ----->>>> ".$folder_path."<br>";
				$zipFileName= $fid.'_'.$fName.'.zip';
				//echo "ZIP FILE NAME = <<<<>>>>> ". $zipFileName."<br>";
				if($folder_path=="/"){
					$path = $zipFileName;
				}else{
					$path = $folder_path.$zipFileName;
				}
				// if(!is_dir('upload/All/')){
				// 	mkdir('upload/All/');
				// 	// chmod('upload/All/', 0777);
				// }
				// if(!is_dir('upload/All/'.$folder_path)){
				// 	mkdir('upload/All/'.$folder_path);
				// 	chmod('upload/All/'.$folder_path, 0777);
				// }

				$arrForPath = explode("/", $folder_path);
				// echo "<pre>"; print_r($arrForPath);
				$fullPath= "";
				if(!is_dir("upload/All/".$folder_path)){

				for($i=0; $i<count($arrForPath); $i++){
					if($arrForPath[$i]!=""){
						$fullPath = $fullPath.$arrForPath[$i];
						// echo "Full Path = ".$fullPath."<br>";
						// echo $arrForPath[$i]."<br>";
						if(!is_dir('upload/All/'.$fullPath)){
							mkdir('upload/All/'.$fullPath);
							// chmod('upload/All/');
						}
						$fullPath = $fullPath.'/';
					}
				}
				}
				// if(!is_dir($path)){
				// 	mkdir(pathname)
				// }
				// echo 'path == '.$path;
				// $s3 = new Aws\S3\S3Client([
			 //    	'region'  => 'ap-south-1',
			 //        'version' => '2006-03-01',
			 //        'credentials' => [
			 //        	'key'    => "AKIAVKMGGRZRUOQQMSEE",
			 //            'secret' => "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",
			 //        ]
			 //    ]);
				include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/S3Connect.php'); 
				// echo '<br>'.$_SERVER['DOCUMENT_ROOT'].'/client/res/templates/Document_Manager4/upload/All/'.$path."<br>";
			    $result = $s3->getObject(array(
					'Bucket' => 'fincrm',
				    'Key'    => 'Development/'.$_SERVER['SERVER_NAME'].'/document_manager/'.$path,
				    'SaveAs' => $_SERVER['DOCUMENT_ROOT'].'/client/res/templates/Document_Manager4/upload/All/'.$path
				));
			    // Extract files....
			    // echo "ZIP FILE PATH --- < < > > upload/All/".$path. "<br>";
			    $zip = new ZipArchive;
				if ($zip->open('upload/All/'.$path) === TRUE) {
					$zip->extractTo('upload/All/'.$folder_path);
					$zip->close();
					//echo 'ok';
				} else {
					//echo 'failed';
				}
				// Extract files....
			    //echo "ZIP FILE PATH --- < < > > upload/All/".$path. "<br>";
			    $zip = new ZipArchive;
				if ($zip->open('upload/All/'.$path) === TRUE) {
					$zip->extractTo('upload/All/'.$folder_path);
					$zip->close();
					    //echo 'ok';
					} else {
					    //echo 'failed';
					}

				// File decrypt code start.....//////////////////////
				$encrypted_file = 'upload/All/'.$folder_path.'files/fincrm.crm.com/'.$fid.'_'.$fName;
				$decrypted_file = 'upload/All/'.$folder_path.$fName;

				// echo "ENCRYPTED FILE PATH = >>>". $encrypted_file. "<br>";
				// echo "DECRYPTED FILE PATH = >>>". $decrypted_file. "<br>";
				// //die;
				$password = 'password';
				$fd_in = fopen($encrypted_file, 'rb');
				$fd_out = fopen($decrypted_file, 'wb');
				$chunk_size = 4096;
				$alg = unpack('C', fread($fd_in, 1))[1];
				$opslimit = unpack('P', fread($fd_in, 8))[1];
				$memlimit = unpack('P', fread($fd_in, 8))[1];
				$salt = fread($fd_in, SODIUM_CRYPTO_PWHASH_SALTBYTES);

				$header = fread($fd_in, SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_HEADERBYTES);

				$secret_key = sodium_crypto_pwhash(SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_KEYBYTES,
					                                   $password, $salt, $opslimit, $memlimit, $alg);

				$stream = sodium_crypto_secretstream_xchacha20poly1305_init_pull($header, $secret_key);
				do {
					$chunk = fread($fd_in, $chunk_size + SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_ABYTES);
					$res = sodium_crypto_secretstream_xchacha20poly1305_pull($stream, $chunk);
					if ($res === FALSE) {
					 	break;
					}
					list($decrypted_chunk, $tag) = $res;
					fwrite($fd_out, $decrypted_chunk);
				} while (!feof($fd_in) && $tag !== SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_TAG_FINAL);
					$ok = feof($fd_in);

					fclose($fd_out);
					fclose($fd_in);

					if (!$ok) {
					    die('Invalid/corrupted input');
					}
					unlink('upload/All/'.$folder_path.'files/fincrm.crm.com/'.$fid.'_'.$fName);
					unlink('upload/All/'.$path);
					rmdir('upload/All/'.$folder_path.'/files/fincrm.crm.com');
					rmdir('upload/All/'.$folder_path.'/files');
			}
		}
	}
	//Code start for create Zip File....
	$rootPath = realpath('upload/All');
	$zip = new ZipArchive();
	$zip->open('upload/All.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);
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
	$zip->close();
	$zip_file = "upload/All.zip";

	/// Download file code....
	if(file_exists($zip_file)) {
		header($_SERVER['SERVER_PROTOCOL'].' 200 OK');
        header('Content-Description: File Transfer');
        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="'.basename($zip_file).'"');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($zip_file));
        flush(); // Flush system output buffer
        ob_clean();
        readfile($zip_file);
         // $val = delete_directory('upload/');
        rrmdir('upload/');
        exit;
          function rrmdir($dir) {
			  if (is_dir($dir)) {
			    $objects = scandir($dir);
			    foreach ($objects as $object) {
			      if ($object != "." && $object != "..") {
			        if (filetype($dir."/".$object) == "dir") 
			           rrmdir($dir."/".$object); 
			        else unlink   ($dir."/".$object);
			      }
			    }
			    reset($objects);
			    rmdir($dir);
			  }
			 }
		
    }