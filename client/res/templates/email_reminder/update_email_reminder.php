<?php session_start();

//set timezone
date_default_timezone_set('UTC'); 

$userName 	= 	$_SESSION['Login'];

//INCLUDE CUSTOM FUNCTION
include($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/email_reminder/customFunctions.php');

//DATABASE OPERATIONS
include($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/email_reminder/databaseOperations.php');

$sql			=  	"SELECT id FROM user WHERE user_name = '$userName'";
$row			=  	$databaseOperations->getRecordArray($sql);
$userId			=  	$row['id'];

$data["error"] 	=	"true";
$data["status"] =	"false";
$data["msg"] 	=	"Invalid request!";
$er_id 			= 	isset($_POST["er_id"]) ? $_POST["er_id"] : NULL; 

$sql 	 		= 	"SELECT er.id, er.subject, er.email_to, er.email_cc, er.email_body, DATE_FORMAT(er.send_email_time, '%H:%i') as send_email_time, DATE_FORMAT(er.send_email_date, '%d/%m/%Y') as send_email_date, er.file_name, er.created_at, er.send_email_date_time, er.email_status, er.status FROM email_reminder as er WHERE id='$er_id' ORDER BY id ASC ";

$record 		= 	$databaseOperations->getRecordArray($sql);

if( empty($record) || empty($er_id) ){
	$data["msg"] 	= "No record found!";
	echo json_encode($data);return;
}

$er_emailTo 			= 	isset($_POST["to1"]) ? $_POST["to1"] : $record["email_to"]; 
$er_emailCc 			= 	isset($_POST["cc1"]) ? $_POST["cc1"] : $record["email_cc"]; 
$er_subject 			= 	isset($_POST["subject1"]) ? $_POST["subject1"] : $record["subject"]; 
$er_emailBody 			= 	isset($_POST["editor201"]) ? $_POST["editor201"] : $record["email_body"];
$er_sendEmailDate 		= 	isset($_POST["date15"]) ? $_POST["date15"] : $record["send_email_date"]; 
$er_sendEmailTime 		= 	isset($_POST["time15"]) ? $_POST["time15"] : $record["send_email_time"];
$sendEmailType 	 		= 	isset($_POST["edit_emailReminder_send_email"]) ? $_POST["edit_emailReminder_send_email"] : null;


$er_newsendEmailTime   	= 	date('g:i a',strtotime($er_sendEmailTime));
$er_existingFileName 	= 	$_POST["existing_file_name"];

$oldDate 				= 	strtr($er_sendEmailDate, '/', '-');
$oldDate 				= 	strtotime($oldDate);
$er_sendEmailDate 		= 	date("d/m/Y", $oldDate);

$er_sendEmailDateTime 	= 	$er_sendEmailDate." ".$er_newsendEmailTime;
$er_sendEmailDate 		= 	date("Y-m-d", $oldDate);

$DateTime 				= 	new DateTime();
$er_createdBy 			= 	$userId; 
$er_updatedAt 			= 	$DateTime->format('Y-m-d H:i:s');
$file_name 				= 	null;
$fileName 				= 	array();
$newfileName    		= 	'';
$subdomain_url      	= 	$_SERVER['HTTP_HOST'];
$mailAttachment         = 	array();

$index 					= 	0;
$dirPath 				= 	$_SERVER["DOCUMENT_ROOT"]."/client/res/templates/reminder/uploads/";
$destdir 				= 	$dirPath;
$handle 				= 	opendir($destdir);
$c 						= 	0;

while( $file = readdir($handle)&& $c<3 ) {
    $c++;
}

//Check folder is not empty
if( $c > 2 ) {
	if($er_existingFileName) {

		$fileconpress = '../reminder/zipFolder/'.$_POST['existing_file_name'];
		
		// OLD EXSTING ZIP FILE SIZE
		$oldExistingSize = filesize($fileconpress);

		$zip = new ZipArchive();
		$files = scandir($_SERVER["DOCUMENT_ROOT"]."/client/res/templates/reminder/uploads/");
		foreach($files as $filename) {
			if ($filename !== '.' && $filename !== '..') {

				$conpress = $zip->open($fileconpress);
				if ($conpress === true)
				{
				   $filecontent = $_SERVER["DOCUMENT_ROOT"]."/client/res/templates/reminder/uploads/".$filename;
					$zip->addFromString($filename, file_get_contents($filecontent));
					// $index++;
					$delete_files = '../reminder/uploads/'.$filename;
					if(file_exists($delete_files)){
			           unlink($delete_files);
			        }	
				}
		    }
		}
		
		$zip->close();

		// To check s3 bucket existing folder size in gb
		clearstatcache();
		$size = filesize($fileconpress);

		include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3bucketfoldersize.php');

		$objS3buket         = new S3bucketfoldersize();
		
		$s3BucketSize       = $objS3buket->FolderSize();
		$oldExistingSize 	= $objS3buket->formatSizeUnits( (int) $oldExistingSize, "BYTES" );
		$currentFileSize    = $objS3buket->formatSizeUnits( $size, "BYTES" );
		$planStorageLimit   = $objS3buket->getDomainStorageLimit();
		$finalExisting 		= ( ( (int) $s3BucketSize - (int) $oldExistingSize ) + (int) $currentFileSize );
		// $finalExisting 		= $objS3buket->formatSizeUnits( $finalExisting, "GB" );;
		$planStorageLimit 	= $objS3buket->convertMemorySize( $planStorageLimit."Gb", "b" );

		if( $finalExisting > $planStorageLimit ) {

		    // delete local file
		    $deleteFile = $filename.'.zip';
		    if( file_exists($deleteFile) ){
		        unlink($deleteFile);
		    }

		    $data["error"] 	= "true";
			$data["status"] = "false";
		    $data["msg"]    = "Your space limit is over. Please contact admin if you wish to add more documents.";
		    echo json_encode($data); 
		    return true;
		} 
		// To check s3 bucket existing folder size in gb

		// delete server file, update local file & delete file on local
		include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/wasabi_connect.php');
	    $result = $client->deleteObject(array(
	        'Bucket' => 'fincrm',
	        'Key'    => 'Production/'.$_SERVER['SERVER_NAME'].'/email_reminder_files/'.$userName.'/'.$er_id.'/'.$er_existingFileName,
	    ));

		// updated from local file to server

		// Where the files will be source from
		$source = '../reminder/zipFolder/'.$er_existingFileName;

		// Where the files will be transferred to
		$dest = 'Production/'.$_SERVER['SERVER_NAME'].'/email_reminder_files/'.$userName.'/'.$er_id.'/'.$er_existingFileName;

		// Create a transfer object
		// $manager = new \Aws\S3\Transfer($s3, $source, $dest);

		// //Perform the transfer synchronously
		// $manager->transfer();
		$result = $client->putObject([
	        'Bucket' => 'fincrm',
	        'Key'    => $dest,
	        'SourceFile' => $source         
	 	]);
		// delete local file
		$zip_name = '../reminder/uploads/'.$er_existingFileName;

		//EXTRACT FILE IF SENDING IMMEDIATELY
		if( $sendEmailType == 'edit_emailReminder_immediately' ) {

			$file_path = '../reminder/zipFolder/'.$er_existingFileName;
			$ExtractFileName = '';
			
	        $zip = new ZipArchive;
	        $res = $zip->open($file_path);
	        if ($res === TRUE) {

	            $zip->extractTo($zip_name);
	            for($i = 0; $i < $zip->numFiles; $i++) {
	            	$ExtractFileName = $zip->getNameIndex($i);

	            	$attachmentPath  = $zip_name.'/'.$ExtractFileName;
	            	$mailAttachment[] = $attachmentPath;
	            }
	            $zip->close();
	        }
		}

		if(file_exists($zip_name)) {
           unlink($zip_name);
        }

	} else {
	
		$index 			= 0;
		$zip = new ZipArchive();

		$fileName =  time() . date("YmdHis") . ".zip";
		$newfileName = $fileName;
		$zip_name = "../reminder/zipFolder/".$fileName;

		// Create a zip target
		if ($zip->open($zip_name, ZipArchive::CREATE) !== TRUE) {
		    $error .= "Sorry ZIP creation is not working currently.<br/>";
		}

		$files = scandir($_SERVER["DOCUMENT_ROOT"]."/client/res/templates/reminder/uploads/");

		foreach($files as $filename) {
			if ($filename !== '.' && $filename !== '..') {

				$filecontent = $_SERVER["DOCUMENT_ROOT"]."/client/res/templates/reminder/uploads/".$filename;
				
			    $zip->addFromString($filename,file_get_contents($filecontent));

		  		$mailAttachment[] = $filecontent;	
			}	
		}

		$zip->close();

		// To check s3 bucket existing folder size in gb
		clearstatcache();
		$size = filesize($zip_name);

		include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3bucketfoldersize.php');

		$objS3buket         = new S3bucketfoldersize();
		
		$s3BucketSize       = $objS3buket->FolderSize();
		$currentFileSize    = $objS3buket->formatSizeUnits( $size, "BYTES" );
		$planStorageLimit   = $objS3buket->getDomainStorageLimit();

		$finalExisting 		= ( (int) $s3BucketSize + (int) $currentFileSize );
		$finalExisting 		= $objS3buket->formatSizeUnits( $finalExisting, "GB" );;

		if( $finalExisting > $planStorageLimit ){

		    // delete local file
		    $deleteFile = $zip_name;
		    if( file_exists($deleteFile) ){
		        unlink($deleteFile);
		    }

		    $data["error"] 	= "true";
			$data["status"] = "false";
		    $data["msg"]    = "Your space limit is over. Please contact admin if you wish to add more documents.";
		    echo json_encode($data); 
		    return true;
		}
		   
		// To check s3 bucket existing folder size in gb

		// ***transfer file from local to server
		// s3 bucket transfer
		include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/wasabi_connect.php');
		// Where the files will be source from
		$source = '../reminder/zipFolder/'.$newfileName;

		// Where the files will be transferred to
		$dest = 'Production/'.$_SERVER['SERVER_NAME'].'/email_reminder_files/'.$userName.'/'.$er_id.'/'.$newfileName;

		// // Create a transfer object
		// $manager = new \Aws\S3\Transfer($s3, $source, $dest);

		// //Perform the transfer synchronously
		// $manager->transfer();
		$result = $client->putObject([
	        'Bucket' => 'fincrm',
	        'Key'    => $dest,
	        'SourceFile' => $source         
	 	]);
		// delete local file
		if(file_exists($zip_name)){
           unlink($zip_name);
        }
	}
} else {
	if ( $er_existingFileName ) { //echo "test 4";die;

		// delete server file
		include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/wasabi_connect.php');
	    $result = $client->deleteObject(array(
	        'Bucket' => 'fincrm',
	        'Key'    => 'Production/'.$_SERVER['SERVER_NAME'].'/email_reminder_files/'.$userName.'/'.$er_id.'/'.$er_existingFileName,
	    ));

		// ***transfer file from local to server
		// s3 bucket transfer
		include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/wasabi_connect.php');
		// Where the files will be source from
		$source = '../reminder/zipFolder/'.$er_existingFileName;

		// Where the files will be transferred to
		$dest = 'Production/'.$_SERVER['SERVER_NAME'].'/email_reminder_files/'.$userName.'/'.$er_id.'/'.$er_existingFileName;

		// Create a transfer object
		// $manager = new \Aws\S3\Transfer($s3, $source, $dest);

		// //Perform the transfer synchronously
		// $manager->transfer();
		if(file_exists($source)){
			$result = $client->putObject([
		        'Bucket' => 'fincrm',
		        'Key'    => $dest,
		        'SourceFile' => $source         
		 	]);

			$zip_name 	 = '../reminder/zipFolder/'.$er_existingFileName;

			$extractPath = $_SERVER["DOCUMENT_ROOT"]."/client/res/templates/reminder/uploads/".$er_existingFileName."/";

			//EXTRACT FILE IF SENDING IMMEDIATELY
			if( $sendEmailType == 'edit_emailReminder_immediately' ) {

				//$file_path = '../reminder/zipFolder/'.$er_existingFileName;
				$ExtractFileName = '';
				
		        $zip = new ZipArchive;
		        $res = $zip->open($zip_name);
		        if ($res === TRUE) {

		            $zip->extractTo($extractPath);
		            for($i = 0; $i < $zip->numFiles; $i++) {
		            	$ExtractFileName = $zip->getNameIndex($i);

		            	$attachmentPath  = $extractPath.$ExtractFileName;
		            	$mailAttachment[] = $attachmentPath;
		            }
		            $zip->close();
		        }
			}

			if(file_exists($zip_name)) {
	           unlink($zip_name);
	        } else {
	        	$er_existingFileName = '';
	        }
		}else{
			$er_existingFileName = '';
		}
		
	}
}

$er_fileName 	= 	$er_existingFileName.$newfileName;

$er_folderName  = 	NULL; // PLEAS ADD HERE DOMAIN NAME

if($sendEmailType == 'edit_emailReminder_sms_date') {

	$sql 			= 	"UPDATE email_reminder SET email_to = '$er_emailTo', email_cc = '$er_emailCc', subject = '$er_subject', email_body = '$er_emailBody', file_name = '$er_fileName', send_email_date = '$er_sendEmailDate', send_email_time = '$er_sendEmailTime', send_email_date_time = '$er_sendEmailDateTime',  created_by_id = '$er_createdBy', modified_at = '$er_updatedAt' WHERE id = '$er_id' ";

	$commanDbSql 	= 	"UPDATE email_reminder SET email_to = '$er_emailTo', email_cc = '$er_emailCc', subject = '$er_subject', email_body = '$er_emailBody', file_name = '$er_fileName', send_email_date = '$er_sendEmailDate', send_email_time = '$er_sendEmailTime', send_email_date_time = '$er_sendEmailDateTime',  created_by_id = '$er_createdBy', modified_at = '$er_updatedAt',subdomain_url = '$subdomain_url', user_name = '$userName' WHERE id = '$er_id' ";
	$successMessage  	=   "Reminder updated successfully.";

} else {

	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/email_templates/EmailNotification.php');
	$sendMail  		=   new EmailNotification();

	$emailToArr 	=  explode(',', $er_emailTo);
	$emailCcArr 	=  explode(',', $er_emailCc);

	$sendMailResult         =   $sendMail->sendEmail($emailToArr, $er_emailBody, $er_subject, $emailCcArr, $mailAttachment);

	if( !$sendMailResult ) {
	    $data["error"] 	= "true";
		$data["status"] = "false";
		$data["msg"] 	= "Oops! Something went wrong.";
		echo json_encode($data);return;
	}

	if( !empty($mailAttachment) && count($mailAttachment) > 0 ) {

		$extractDir   =  $_SERVER["DOCUMENT_ROOT"]."/client/res/templates/reminder/uploads/";
		emptyFolder($extractDir);

		$zipFiles     = $_SERVER["DOCUMENT_ROOT"]."/client/res/templates/reminder/zipFolder/";
		emptyFolder($zipFiles);
	}
	
	$emailStatus 	= 	'Sent';

	$sql   =  "INSERT INTO sent_email_reminder(id, email_to, email_cc, subject, email_body, send_email_date,email_status, created_at, created_by_id,send_email_time,assigned_user_id, file_name) VALUES('$er_id','$er_emailTo','$er_emailCc','$er_subject','$er_emailBody','$er_sendEmailDate','$emailStatus', '$er_updatedAt', '$er_createdBy', '$er_sendEmailTime', '$er_createdBy', '$er_fileName')";

	$result 		= 	$databaseOperations->exicuteQuery($sql);
	if( !$result ) {
		$data["error"] 	= "true";
		$data["status"] = "false";
		$data["msg"] 	= "Oops! Something went wrong.1";
		echo json_encode($data);return;
	}

	$sql  				= 	"DELETE FROM `email_reminder` WHERE `id` = '$er_id'";
	$commanDbSql		= 	$sql;
	$successMessage  	=  	"Email sent successfully.";
}

$result 		= 	$databaseOperations->exicuteQuery($sql);
$commDbResult 	= 	$databaseOperations->exicuteQueryOnCommonDatabase($commanDbSql);

if( $result && $commDbResult ) {
	$data["error"] 	= "false";
	$data["status"] = "true";
	$data["msg"] 	= $successMessage;
	echo json_encode($data);return;
} else {
	$data["error"] 	= "true";
	$data["status"] = "false";
	$data["msg"] 	= "Oops! Something went wrong.2";
	echo json_encode($data);return;
}
?>