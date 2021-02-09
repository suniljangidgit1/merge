<?php
	 // error_reporting(0);
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	date_default_timezone_set('Asia/Kolkata');
	$currentDate1= date("d-m-Y h:i:s A");
	
	//$date = '2011-04-8 08:29:49';
	$currentDate = strtotime($currentDate1);
	$futureDate = $currentDate+(60*1);
	$formatDate = date("Y-m-d H:i:s", $futureDate);
	
	$folderMasterId= array();// Array For Folder Master ID..
	$subFolderMasterId= array();//Array For Sub Folder Master ID..

	//Code for get All folder master id//
	$res1= mysqli_query($conn, "SELECT * FROM folder_master_3");
	while($row1= mysqli_fetch_array($res1)){
		$folderMasterId [] = $row1['id'];
	}

	//Code for get All sub folder master id//
	$re2= mysqli_query($conn, "SELECT * FROM sub_folder_master_3");
	while($row2 = mysqli_fetch_array($re2)){
		$subFolderMasterId [] = $row2['id'];
	}


	$result = mysqli_query($conn, "SELECT * FROM document_master_3 WHERE encryption_key='NULL' OR encryption_key=''");

	while($row= mysqli_fetch_array($result)){
		$id= $row['id'];
		$folder_id= $row['folder_id'];
		$fileName= $row['document_name'];
		$createdAt= $row['createdAt'];
		$folder_url = $row['folder_path'];

		// echo $folder_id."<br>"; 
		// echo $fileName."<br>"; 
		// die;
		// if($folder_path == ""){

		// }
		echo $fileName;
		echo "IN IF BLOCK..";
		echo "<br>";

		if(in_array($folder_id, $folderMasterId)){
			$res4= mysqli_query($conn, "SELECT * FROM folder_master_3 WHERE id=".$folder_id);
			$row4= mysqli_fetch_array($res4);

			$folder_path= $row4['folder_name'];
		}

		if(in_array($folder_id, $subFolderMasterId)){
			$res5= mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE id=".$folder_id);
			$row5= mysqli_fetch_array($res5);

			$folder_path= $row5['folder_path'];
		}

		// File encryption using sodium Lib
		$password = 'password';
		$input_file = "files/".$_SERVER['SERVER_NAME']."/".$fileName;
		$encrypted_file = "files/".$_SERVER['SERVER_NAME']."/".$id."_".$fileName;
		$chunk_size = 4096;

		echo "INPUT FILE NAME == ".$input_file."<br>";
		echo "ENCRYPTED FILE NAME == ".$encrypted_file."<br>";

		$alg = SODIUM_CRYPTO_PWHASH_ALG_DEFAULT;
		$opslimit = SODIUM_CRYPTO_PWHASH_OPSLIMIT_MODERATE;
		$memlimit = SODIUM_CRYPTO_PWHASH_MEMLIMIT_MODERATE;
		$salt = random_bytes(SODIUM_CRYPTO_PWHASH_SALTBYTES);

		$secret_key = sodium_crypto_pwhash(SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_KEYBYTES,
		                                   $password, $salt, $opslimit, $memlimit, $alg);

		$fd_in = fopen($input_file, 'rb');
		$fd_out = fopen($encrypted_file, 'wb');

		fwrite($fd_out, pack('C', $alg));
		fwrite($fd_out, pack('P', $opslimit));
		fwrite($fd_out, pack('P', $memlimit));
		fwrite($fd_out, $salt);

		list($stream, $header) = sodium_crypto_secretstream_xchacha20poly1305_init_push($secret_key);

		fwrite($fd_out, $header);

		$tag = SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_TAG_MESSAGE;
		do {
		    $chunk = fread($fd_in, $chunk_size);
		    if (feof($fd_in)) {
		        $tag = SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_TAG_FINAL;
		    }
		    $encrypted_chunk = sodium_crypto_secretstream_xchacha20poly1305_push($stream, $chunk, '', $tag);
		    fwrite($fd_out, $encrypted_chunk);
		} while ($tag !== SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_TAG_FINAL);

		fclose($fd_out);
		fclose($fd_in);


		////////////////////////////////////
		if(file_exists($encrypted_file)){
			echo "IN IF BLOCK OF ZIP FILE <br>";
			if(is_dir('files/fincrm.crm.com/thumbnail')){
				$val = delete_directory('files/fincrm.crm.com/thumbnail');
				if($val== "true"){
					echo "delete";
				}else{
					echo "Not delete";
				}	
			}
			

			//die;

			$zip = new ZipArchive;
			if ($zip->open('files/'.$_SERVER['SERVER_NAME'].'/'.$id."_".$fileName.'.zip', ZipArchive::CREATE) == TRUE)
			{
				echo "IN IF BLOCK OF ADD FILES TO ZIP FILES <br>";
				// Add files to the zip file
				$zip->addFile($encrypted_file);
			    $zip->close();
			}
			// if(!is_dir($folder_url))
			// {
			// 	mkdir($folder_url);
			// }
			// unlink("files/".$_SERVER['SERVER_NAME']."/".$id."_".$fileName);	
			// unlink("files/".$_SERVER['SERVER_NAME']."/".$fileName);	
			// unlink($encrypted_file);
			

			unlink("files/".$_SERVER['SERVER_NAME']."/".$fileName);	
			unlink($encrypted_file);
			// unlink($encrypted_file.'.zip');
		}

		mysqli_query($conn, "UPDATE document_master_3 SET encryption_key='1' WHERE id='".$id."'");
	}
	// S3 Bucket code ...... 

			include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3Connect.php');  
			

			// Where the files will be source from
			$source = 'files/'.$_SERVER['SERVER_NAME'].'/';
			// Where the files will be transferred to
			$dest = 's3://fincrm/Development/'.$_SERVER['SERVER_NAME'].'/document_manager/'.$folder_url;
			// Create a transfer object
			$manager = new \Aws\S3\Transfer($s3, $source, $dest);
			//Perform the transfer synchronously
			$manager->transfer();
			unlink('files/'.$_SERVER['SERVER_NAME'].'/'.$id.'_'.$fileName.'.zip');







	$dir_handle = "";
	$val = delete_directory('files/fincrm.crm.com/');
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
?>