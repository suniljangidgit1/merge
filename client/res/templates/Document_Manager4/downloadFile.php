<?php
    session_start();
	// error_reporting(0);
    $userName=$_SESSION["Login"];
    $folder_path = "";
   //get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
	
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


	$result= mysqli_query($conn, "SELECT * FROM document_master_3 WHERE id='".$_GET['id']."'");
	
	$row= mysqli_fetch_array($result);
	$id=$row['id'];
	$folder_id= $row['folder_id'];
	$filename= $row['document_name'];
	$size= $row['document_size'];
	$document_size= $row['document_size'];
	$fileType=$row['document_type'];
	$folder_path = $row['folder_path'];
	$withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
	
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
	if($folder_path == "/"){
		$path = $id."_".$filename.'.zip';
	}else{

	 $path = $folder_path."/".$id."_".$filename.'.zip';
	}
	// echo $path ;die;
	// // S3 bucket code. .....
	  include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3Connect.php');  
	// // Where the files will be source from
	// $source = 's3://fincrm/Development/'.$_SERVER['SERVER_NAME'].'/document_manager/';
	// // Where the files will be transferred to
	// $dest = 'upload/'.$_SERVER['SERVER_NAME'].'/';
	// // Create a transfer object
	// $manager = new \Aws\S3\Transfer($s3, $source, $dest);
	// //Perform the transfer synchronously
	// $manager->transfer();
	 //echo 'PATH => Development/'.$_SERVER['SERVER_NAME'].'/document_manager/'.$path;die;
	$result = $s3->getObject(array(
    	'Bucket' => 'fincrm',
        'Key'    => 'Development/'.$_SERVER['SERVER_NAME'].'/document_manager/'.$path,
    	'SaveAs' => 'upload/'.$id."_".$filename.'.zip'
	));


	$zipFileName= $id."_".$filename.'.zip';
	// echo "PATH = >". $path;die;
	  //echo 'upload/'.$_SERVER['SERVER_NAME'].'/<br><br>'; //die;
	$zip = new ZipArchive;
	if ($zip->open('upload/'.$id."_".$filename.'.zip') === TRUE) {
	    $zip->extractTo('upload/');
	    $zip->close();
	    echo 'ok';
	} else {
	    echo 'failed';
	}
	//die;
	// echo "FOLDER PATH = >" . $path ."<br>"; 
	// File decrypt code start.....//////////////////////
	$encrypted_file = 'upload/files/'.$_SERVER['SERVER_NAME'].'/'.$id."_".$filename;
	$decrypted_file = 'upload/files/'.$_SERVER['SERVER_NAME'].'/'.$filename;

	echo "ENCRYPTED FILE PATH = >>>". $encrypted_file. "<br>";
	echo "DECRYPTED FILE PATH = >>>". $decrypted_file. "<br>";
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

	////////////////////////////////////////////////////
	// die;	
    $download_path = 'upload/files/'.$_SERVER['SERVER_NAME'].'/'.$filename;

    // echo "DOWNLOAD PATH - <". $download_path;die;
	$path = 'upload/files/'.$_SERVER['SERVER_NAME'].'/'.$filename;

	echo $download_path; 
	echo "<br>";
	echo $path; //die;	

	header('Content-Description: File Transfer');
    header('Content-Type: application/force-download');
	header("Content-type:" .pathinfo($filename, PATHINFO_EXTENSION));
    header("Content-Disposition: attachment; filename=\"" . basename($path) . "\";");
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . $size);
    ob_clean();
    flush();
    readfile($path); //showing the path to the server where the file is to be download
	unlink($path);
	unlink('upload/'.$_SERVER['SERVER_NAME'].'/files/'.$_SERVER['SERVER_NAME'].'/'.$id.'_'.$filename);
	// unlink($path);
	rmdir('upload/'.$_SERVER['SERVER_NAME'].'/files');

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
	
?>
