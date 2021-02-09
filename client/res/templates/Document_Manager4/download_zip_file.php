<?php
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	$id =$_GET['id'];

	$folder_path = "";
	$folder_name = "";
	$folder_path_main= "";
	$folderName1= "";
	$folderName2= "";
	$folderName3= "";
	$folderName4= "";
	$folderName5= "";
	$folderName6= "";

	//Get ids from folder master table.
	$arrForFMId = array();
	$resFM = mysqli_query($conn, "SELECT * FROM folder_master_3");
	while($rowFM = mysqli_fetch_array($resFM)){
		$arrForFMId[] = $rowFM['id'];
	}

	//Get ids from sub folder master.
	$arrForSFMId= array();
	$resSFM = mysqli_query($conn, "SELECT * FROM sub_folder_master_3");
	while($rowSFM = mysqli_fetch_array($resSFM)){
		$arrForSFMId[] = $rowSFM['id'];
	}

	// S3 bucket code. .....
	include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3Connect.php');  
	// Where the files will be source from
	$source = 's3://fincrm/Development/'.$_SERVER['SERVER_NAME'].'/document_manager/';
	// Where the files will be transferred to
	$dest = 'upload/'.$_SERVER['SERVER_NAME'].'/';
	// Create a transfer object
	$manager = new \Aws\S3\Transfer($s3, $source, $dest);
	//Perform the transfer synchronously
	$manager->transfer();

	if(in_array($id, $arrForFMId)){
		
		$resForFMId = mysqli_query($conn, "SELECT * FROM folder_master_3 WHERE id=". $id);
		$rowForFMId = mysqli_fetch_array($resForFMId);
		$folder_name = $rowForFMId['folder_name'];
		$folder_path = $rowForFMId['folder_name'];
		$folder_path_main = $folder_path;
		// NEW CODE STARTED .....
		if(!is_dir('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'/temp')){
			mkdir('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'/temp');
			chmod('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'/temp', 0777);
		}

		$res1= mysqli_query($conn,"SELECT * FROM document_master_3 WHERE folder_id=". $id);
		while($row1= mysqli_fetch_array($res1)){
			$fileId = $row1['id'];
			$fileName = $row1['document_name'];
			$folderName1 = $folderName;
			$zipFileName = $fileId.'_'.$fileName.'.zip';

			$path = 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'/'.$zipFileName;
			$zip = new ZipArchive;
			if ($zip->open($path) === TRUE) {
			    $zip->extractTo('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path);
			    $zip->close();
			    // echo 'ok';
			} else {
			    // echo 'failed';
			}
			// file dycript code...

			$encrypted_file = 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'/files/'.$_SERVER['SERVER_NAME'].'/'.$fileId."_".$fileName;
			$decrypted_file = 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'/files/'.$_SERVER['SERVER_NAME'].'/'.$fileName;
			
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

			unlink($encrypted_file);
			copy('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'/files/'.$_SERVER['SERVER_NAME'].'/'.$fileName , 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'/temp/'.$fileName);
			
		}
		$res2 = mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id=".$id);
		while($row2 = mysqli_fetch_array($res2)){
			$folderName= $row2['folder_name'];
			$folderName2 = $folderName;
			$subFolderId1= $row2['id'];
			if(!is_dir('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'/temp/'.$folderName)){
				mkdir('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'/temp/'.$folderName);
				chmod('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'/temp/'.$folderName, 0777);
			}

			$res3 = mysqli_query($conn, "SELECT * FROM document_master_3 WHERE folder_id=".$subFolderId1);
			while($row3 = mysqli_fetch_array($res3)){
				$fileId = $row3['id'];
				$fileName = $row3['document_name'];
				$folder_path = $row3['folder_path'];
				$zipFileName = $fileId.'_'.$fileName.'.zip';

				$path = 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'/'.$zipFileName;
				$zip = new ZipArchive;
				if ($zip->open($path) === TRUE) {
				    $zip->extractTo('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path);
				    $zip->close();
				    //echo 'ok';
				} else {
				    //echo 'failed';
				}
				// file dycript code...

				$encrypted_file = 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'/files/'.$_SERVER['SERVER_NAME'].'/'.$fileId."_".$fileName;
				$decrypted_file = 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'/files/'.$_SERVER['SERVER_NAME'].'/'.$fileName;

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

				unlink($encrypted_file);
				copy('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'files/'.$_SERVER['SERVER_NAME'].'/'.$fileName , 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path_main.'/temp/'.$folderName.'/'.$fileName);

				// file dycript code...	
			}

			$res4 = mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id=". $subFolderId1);
			while($row4 = mysqli_fetch_array($res4)){
				$folderName= $row4['folder_name'];
				$folderName3 = $folderName;
				$subFolderId2= $row4['id'];
				
				if(!is_dir('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path_main.'/temp/'.$folderName2.'/'.$folderName)){
					mkdir('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path_main.'/temp/'.$folderName2.'/'.$folderName);
					chmod('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path_main.'/temp/'.$folderName2.'/'.$folderName, 0777);
				}

				$res5 = mysqli_query($conn, "SELECT * FROM document_master_3 WHERE folder_id=".$subFolderId2);
				while($row5= mysqli_fetch_array($res5)){
					$fileId = $row5['id'];
					$fileName = $row5['document_name'];
					$folder_path = $row5['folder_path'];
					$zipFileName = $fileId.'_'.$fileName.'.zip';
					$path = 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.$zipFileName;
					$zip = new ZipArchive;
					if ($zip->open($path) === TRUE) {
					    $zip->extractTo('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path);
					    $zip->close();
					   // echo 'ok';
					} else {
					   // echo 'failed';
					}
					// file dycript code...

					$encrypted_file = 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'files/'.$_SERVER['SERVER_NAME'].'/'.$fileId."_".$fileName;
					$decrypted_file = 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'files/'.$_SERVER['SERVER_NAME'].'/'.$fileName;

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

					unlink($encrypted_file);
					copy('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'files/'.$_SERVER['SERVER_NAME'].'/'.$fileName , 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path_main.'/temp/'.$folderName1.'/'.$folderName2.'/'.$folderName3.'/'.$fileName);
					

					// file dycript code...	
				}

				$res6 = mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id=".$subFolderId2);
				while($row6= mysqli_fetch_array($res6)){
					$folderName= $row6['folder_name'];
					$folderName4 = $folderName;
					$subFolderId3= $row6['id'];
					if(!is_dir('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path_main.'/temp/'.$folderName2.'/'.$folderName3.'/'.$folderName)){
						mkdir('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path_main.'/temp/'.$folderName2.'/'.$folderName3.'/'.$folderName);
						chmod('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path_main.'/temp/'.$folderName2.'/'.$folderName3.'/'.$folderName, 0777);
					}

					$res7 = mysqli_query($conn, "SELECT * FROM document_master_3 WHERE folder_id=".$subFolderId3);
					while($row7=mysqli_fetch_array($res7)){
						$fileId = $row7['id'];
						$fileName = $row7['document_name'];
						$folder_path = $row7['folder_path'];
						$zipFileName = $fileId.'_'.$fileName.'.zip';
						$path = 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.$zipFileName;
						$zip = new ZipArchive;
						if ($zip->open($path) === TRUE) {
						    $zip->extractTo('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path);
						    $zip->close();
						    //echo 'ok';
						} else {
						    //echo 'failed';
						}
						// file dycript code...

						$encrypted_file = 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'files/'.$_SERVER['SERVER_NAME'].'/'.$fileId."_".$fileName;
						$decrypted_file = 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'files/'.$_SERVER['SERVER_NAME'].'/'.$fileName;
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

						unlink($encrypted_file);
						copy('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'files/'.$_SERVER['SERVER_NAME'].'/'.$fileName , 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path_main.'/temp/'.$folderName1.'/'.$folderName2.'/'.$folderName3.'/'.$folderName4.'/'.$fileName);
						

						// file dycript code...	
					}

					$res8= mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id=".$subFolderId3);
					while($row8=mysqli_fetch_array($res8)){
						$folderName= $row8['folder_name'];
						$folderName5 = $folderName;
						$subFolderId4= $row8['id'];
						if(!is_dir('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path_main.'/temp/'.$folderName2.'/'.$folderName3.'/'.$folderName4.'/'.$folderName)){
							mkdir('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path_main.'/temp/'.$folderName2.'/'.$folderName3.'/'.$folderName4.'/'.$folderName);
							chmod('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path_main.'/temp/'.$folderName2.'/'.$folderName3.'/'.$folderName4.'/'.$folderName, 0777);
						}
						$res9 = mysqli_query($conn, "SELECT * FROM document_master_3 WHERE folder_id=".$subFolderId4);
						while($row9= mysqli_fetch_array($res9)){
							$fileId = $row9['id'];
							$fileName = $row9['document_name'];
							$folder_path = $row9['folder_path'];
							$zipFileName = $fileId.'_'.$fileName.'.zip';
							$path = 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.$zipFileName;
							$zip = new ZipArchive;
							if ($zip->open($path) === TRUE) {
							    $zip->extractTo('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path);
							    $zip->close();
							   // echo 'ok';
							} else {
							   // echo 'failed';
							}
							// file dycript code...

							$encrypted_file = 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'files/'.$_SERVER['SERVER_NAME'].'/'.$fileId."_".$fileName;
							$decrypted_file = 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'files/'.$_SERVER['SERVER_NAME'].'/'.$fileName;

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

							unlink($encrypted_file);
							copy('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'files/'.$_SERVER['SERVER_NAME'].'/'.$fileName , 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path_main.'/temp/'.$folderName1.'/'.$folderName2.'/'.$folderName3.'/'.$folderName4.'/'.$folderName5.'/'.$fileName);
							

							// file dycript code...
						}

						$res10 = mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id=".$subFolderId4);
						while($row10=mysqli_fetch_array($res10)){
							$folderName= $row10['folder_name'];
							$folderName6 = $folderName;
							$subFolderId5= $row10['id'];
							if(!is_dir('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path_main.'/temp/'.$folderName2.'/'.$folderName3.'/'.$folderName4.'/'.$folderName5.'/'.$folderName)){
								mkdir('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path_main.'/temp/'.$folderName2.'/'.$folderName3.'/'.$folderName4.'/'.$folderName5.'/'.$folderName);
								chmod('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path_main.'/temp/'.$folderName2.'/'.$folderName3.'/'.$folderName4.'/'.$folderName5.'/'.$folderName, 0777);
							}

							$res11 = mysqli_query($conn, "SELECT * FROM document_master_3 WHERE folder_id=".$subFolderId5);
							while($row11 = mysqli_fetch_array($res11)){
								$fileId = $row11['id'];
								$fileName = $row11['document_name'];
								$folder_path = $row11['folder_path'];
								$zipFileName = $fileId.'_'.$fileName.'.zip';
								$path = 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.$zipFileName;
								$zip = new ZipArchive;
								if ($zip->open($path) === TRUE) {
								    $zip->extractTo('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path);
								    $zip->close();
								   // echo 'ok';
								} else {
								   // echo 'failed';
								}
								// file dycript code...

								$encrypted_file = 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'files/'.$_SERVER['SERVER_NAME'].'/'.$fileId."_".$fileName;
								$decrypted_file = 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'files/'.$_SERVER['SERVER_NAME'].'/'.$fileName;

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

								unlink($encrypted_file);
								copy('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'files/'.$_SERVER['SERVER_NAME'].'/'.$fileName , 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path_main.'/temp/'.$folderName1.'/'.$folderName2.'/'.$folderName3.'/'.$folderName4.'/'.$folderName5.'/'.$folderName6.'/'.$fileName);
								

								// file dycript code...
							}
						}
					}
				}
			}

		}
		//die;
		// NEW CODE ENDED....

	}else{
		if(in_array($id, $arrForSFMId)){
			$resForSFMId = mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE id=". $id);
			$rowForSFMId = mysqli_fetch_array($resForSFMId);
			$folder_name = $rowForSFMId['folder_name'];
			$folder_path = $rowForSFMId['folder_path'];
			$folder_path_main = $folder_path;
			// NEW CODE STARTED .....
			if(!is_dir('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'/temp')){
				mkdir('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'/temp');
				chmod('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'/temp', 0777);
			}
			$res1= mysqli_query($conn, "SELECT * FROM document_master_3 WHERE folder_id=".$id);
			while($row1= mysqli_fetch_array($res1)){
				$fileId = $row1['id'];
				$fileName = $row1['document_name'];
				$folderName1 = $folderName;
				$zipFileName = $fileId.'_'.$fileName.'.zip';
				$path = 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'/'.$zipFileName;
				$zip = new ZipArchive;
				if ($zip->open($path) === TRUE) {
				    $zip->extractTo('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path);
				    $zip->close();
				   // echo 'ok';
				} else {
				   // echo 'failed';
				}
				// file dycript code...

				$encrypted_file = 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'/files/'.$_SERVER['SERVER_NAME'].'/'.$fileId."_".$fileName;
				$decrypted_file = 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'/files/'.$_SERVER['SERVER_NAME'].'/'.$fileName;

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

				unlink($encrypted_file);
				copy('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'/files/'.$_SERVER['SERVER_NAME'].'/'.$fileName , 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'/temp/'.$fileName);
				// file dycript code..
			}

			$res2 = mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id=".$id);
			while($row2= mysqli_fetch_array($res2)){
				$folderName= $row2['folder_name'];
				$folderName2 = $folderName;
				$subFolderId1= $row2['id'];
				if(!is_dir('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'/temp/'.$folderName)){
					mkdir('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'/temp/'.$folderName);
					chmod('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'/temp/'.$folderName, 0777);
				}
				$res3 = mysqli_query($conn, "SELECT * FROM document_master_3 WHERE folder_id=".$subFolderId1);
				while($row3=mysqli_fetch_array($res3)){
					$fileId = $row3['id'];
					$fileName = $row3['document_name'];
					$folder_path = $row3['folder_path'];
					$zipFileName = $fileId.'_'.$fileName.'.zip';

					$path = 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'/'.$zipFileName;
					$zip = new ZipArchive;
					if ($zip->open($path) === TRUE) {
					    $zip->extractTo('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path);
					    $zip->close();
					  //  echo 'ok';
					} else {
					  //  echo 'failed';
					}
					// file dycript code...

					$encrypted_file = 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'/files/'.$_SERVER['SERVER_NAME'].'/'.$fileId."_".$fileName;
					$decrypted_file = 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'/files/'.$_SERVER['SERVER_NAME'].'/'.$fileName;

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

					unlink($encrypted_file);
					copy('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'files/'.$_SERVER['SERVER_NAME'].'/'.$fileName , 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path_main.'/temp/'.$folderName.'/'.$fileName);

					// file dycript code...	
				}
				$res4 = mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id=". $subFolderId1);
				while($row4 = mysqli_fetch_array($res4)){
					$folderName= $row4['folder_name'];
					$folderName3 = $folderName;
					$subFolderId2= $row4['id'];
					
					if(!is_dir('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path_main.'/temp/'.$folderName2.'/'.$folderName)){
						mkdir('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path_main.'/temp/'.$folderName2.'/'.$folderName);
						chmod('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path_main.'/temp/'.$folderName2.'/'.$folderName, 0777);
					}

					$res5 = mysqli_query($conn, "SELECT * FROM document_master_3 WHERE folder_id=".$subFolderId2);
					while($row5= mysqli_fetch_array($res5)){
						$fileId = $row5['id'];
						$fileName = $row5['document_name'];
						$folder_path = $row5['folder_path'];
						$zipFileName = $fileId.'_'.$fileName.'.zip';
						$path = 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.$zipFileName;
						$zip = new ZipArchive;
						if ($zip->open($path) === TRUE) {
						    $zip->extractTo('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path);
						    $zip->close();
						   // echo 'ok';
						} else {
						   // echo 'failed';
						}
						// file dycript code...

						$encrypted_file = 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'files/'.$_SERVER['SERVER_NAME'].'/'.$fileId."_".$fileName;
						$decrypted_file = 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'files/'.$_SERVER['SERVER_NAME'].'/'.$fileName;

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

						unlink($encrypted_file);
						copy('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'files/'.$_SERVER['SERVER_NAME'].'/'.$fileName , 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path_main.'/temp/'.$folderName1.'/'.$folderName2.'/'.$folderName3.'/'.$fileName);
						

						// file dycript code...	
					}

					$res6 = mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id=".$subFolderId2);
					while($row6= mysqli_fetch_array($res6)){
						$folderName= $row6['folder_name'];
						$folderName4 = $folderName;
						$subFolderId3= $row6['id'];
						if(!is_dir('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path_main.'/temp/'.$folderName2.'/'.$folderName3.'/'.$folderName)){
							mkdir('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path_main.'/temp/'.$folderName2.'/'.$folderName3.'/'.$folderName);
							chmod('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path_main.'/temp/'.$folderName2.'/'.$folderName3.'/'.$folderName, 0777);
						}

						$res7 = mysqli_query($conn, "SELECT * FROM document_master_3 WHERE folder_id=".$subFolderId3);
						while($row7=mysqli_fetch_array($res7)){
							$fileId = $row7['id'];
							$fileName = $row7['document_name'];
							$folder_path = $row7['folder_path'];
							$zipFileName = $fileId.'_'.$fileName.'.zip';
							$path = 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.$zipFileName;
							echo "Folder Path ->>>> ".$path."<br>"; //die;
							$zip = new ZipArchive;
							if ($zip->open($path) === TRUE) {
							    $zip->extractTo('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path);
							    $zip->close();
							 //  echo 'ok';
							} else {
							 //   echo 'failed';
							}
							// file dycript code...

							$encrypted_file = 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'files/'.$_SERVER['SERVER_NAME'].'/'.$fileId."_".$fileName;
							$decrypted_file = 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'files/'.$_SERVER['SERVER_NAME'].'/'.$fileName;

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

							unlink($encrypted_file);
							copy('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'files/'.$_SERVER['SERVER_NAME'].'/'.$fileName , 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path_main.'/temp/'.$folderName1.'/'.$folderName2.'/'.$folderName3.'/'.$folderName4.'/'.$fileName);
							

							// file dycript code...	
						}

						$res8= mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id=".$subFolderId3);
						while($row8=mysqli_fetch_array($res8)){
							$folderName= $row8['folder_name'];
							$folderName5 = $folderName;
							$subFolderId4= $row8['id'];
							if(!is_dir('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path_main.'/temp/'.$folderName2.'/'.$folderName3.'/'.$folderName4.'/'.$folderName)){
								mkdir('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path_main.'/temp/'.$folderName2.'/'.$folderName3.'/'.$folderName4.'/'.$folderName);
								chmod('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path_main.'/temp/'.$folderName2.'/'.$folderName3.'/'.$folderName4.'/'.$folderName, 0777);
							}
							$res9 = mysqli_query($conn, "SELECT * FROM document_master_3 WHERE folder_id=".$subFolderId4);
							while($row9= mysqli_fetch_array($res9)){
								$fileId = $row9['id'];
								$fileName = $row9['document_name'];
								$folder_path = $row9['folder_path'];
								$zipFileName = $fileId.'_'.$fileName.'.zip';
								$path = 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.$zipFileName;
								$zip = new ZipArchive;
								if ($zip->open($path) === TRUE) {
								    $zip->extractTo('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path);
								    $zip->close();
								    //echo 'ok';
								} else {
								   // echo 'failed';
								}
								// file dycript code...

								$encrypted_file = 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'files/'.$_SERVER['SERVER_NAME'].'/'.$fileId."_".$fileName;
								$decrypted_file = 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'files/'.$_SERVER['SERVER_NAME'].'/'.$fileName;

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

								unlink($encrypted_file);
								copy('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'files/'.$_SERVER['SERVER_NAME'].'/'.$fileName , 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path_main.'/temp/'.$folderName1.'/'.$folderName2.'/'.$folderName3.'/'.$folderName4.'/'.$folderName5.'/'.$fileName);
								

								// file dycript code...
							}

							$res10 = mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE folder_master_id=".$subFolderId4);
							while($row10=mysqli_fetch_array($res10)){
								$folderName= $row10['folder_name'];
								$folderName6 = $folderName;
								$subFolderId5= $row10['id'];
								if(!is_dir('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path_main.'/temp/'.$folderName2.'/'.$folderName3.'/'.$folderName4.'/'.$folderName5.'/'.$folderName)){
									mkdir('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path_main.'/temp/'.$folderName2.'/'.$folderName3.'/'.$folderName4.'/'.$folderName5.'/'.$folderName);
									chmod('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path_main.'/temp/'.$folderName2.'/'.$folderName3.'/'.$folderName4.'/'.$folderName5.'/'.$folderName, 0777);
								}

								$res11 = mysqli_query($conn, "SELECT * FROM document_master_3 WHERE folder_id=".$subFolderId5);
								while($row11 = mysqli_fetch_array($res11)){
									$fileId = $row11['id'];
									$fileName = $row11['document_name'];
									$folder_path = $row11['folder_path'];
									$zipFileName = $fileId.'_'.$fileName.'.zip';
									$path = 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.$zipFileName;
									$zip = new ZipArchive;
									if ($zip->open($path) === TRUE) {
									    $zip->extractTo('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path);
									    $zip->close();
									   // echo 'ok';
									} else {
									    //echo 'failed';
									}
									// file dycript code...

									$encrypted_file = 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'files/'.$_SERVER['SERVER_NAME'].'/'.$fileId."_".$fileName;
									$decrypted_file = 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'files/'.$_SERVER['SERVER_NAME'].'/'.$fileName;

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

									unlink($encrypted_file);
									copy('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path.'files/'.$_SERVER['SERVER_NAME'].'/'.$fileName , 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path_main.'/temp/'.$folderName1.'/'.$folderName2.'/'.$folderName3.'/'.$folderName4.'/'.$folderName5.'/'.$folderName6.'/'.$fileName);
									

									// file dycript code...
								}
							}
						}
					}
				}
			}
		}

		//die;
	}
	
	$rootPath = 'upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path_main.'/temp/';
	
	// Initialize archive object
	$zip = new ZipArchive();
	$zip->open(trim('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path_main,'/temp').'.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);
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

	$zip_file = trim('upload/'.$_SERVER['SERVER_NAME'].'/'.$folder_path_main,'/temp').'.zip';

	header($_SERVER['SERVER_PROTOCOL'].' 200 OK');
	header('Content-Description: File Transfer');
	header('Content-Type: application/zip');
	// header('Content-Disposition: attachment; filename\''='.basename($zip_file). "\";");
	header("Content-Disposition: attachment; filename=\"" . basename($zip_file) . "\";");
	header('Content-Transfer-Encoding: binary');
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	header('Content-Length: ' . filesize($zip_file));
	flush();
	ob_clean();
	readfile($zip_file);
	$val = delete_directory('upload');
	exit;

	function delete_directory($dirname) {
         if (is_dir($dirname))
           $dir_handle = opendir($dirname);
     // if (!$dir_handle){
     //     return false;

     // }
	     while($file = readdir($dir_handle)) {
	           if ($file != "." && $file != "..") {
	                if (!is_dir($dirname."/".$file))
	                     unlink($dirname."/".$file);
	                else
	                     delete_directory($dirname.'/'.$file);
	           }
     		}
     closedir($dir_handle);
     rmdir($dirname);
     return true;
}