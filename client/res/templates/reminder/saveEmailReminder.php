<?php session_start();
//set timezone
date_default_timezone_set('UTC'); 

$userName 	= 	$_SESSION['Login'];

//INCLUDE CUSTOM FUNCTION
include($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/email_reminder/customFunctions.php');

//DATABASE OPERATIONS
include($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/email_reminder/databaseOperations.php');

$sql				=  "SELECT id FROM user WHERE user_name = '$userName'";
$row				=  $databaseOperations->getRecordArray($sql);
$userId				=  $row['id'];	

$data["error"] 		=  "true";
$data["status"] 	=  "false";
$data["msg"] 		=  "Invalid request!";

$emailTo 			=  isset($_POST["to"]) ? $_POST["to"] : NULL; 
$emailCc 			=  isset($_POST["cc"]) ? $_POST["cc"] : NULL; 
$subject 			=  isset($_POST["subject"]) ? $_POST["subject"] : NULL; 
$emailBody 			=  isset($_POST["editor100"]) ? $_POST["editor100"] : NULL;
$sendEmailDate 		=  isset($_POST["date100"]) ? $_POST["date100"] : NULL; 
$emailType 			=  isset($_POST["add_emailReminder_send_email"]) ? $_POST["add_emailReminder_send_email"] : NULL;
$sendEmailTime 		=  isset($_POST["time100"]) ? $_POST["time100"] : NULL; 

$newsendEmailTime 	=  date('g:i a',strtotime($sendEmailTime));
$oldDate 			=  strtr($sendEmailDate, '/', '-');
$oldDate 			=  strtotime($oldDate);
$sendEmailDate 		=  date("d/m/Y", $oldDate);
$sendEmailDateTime 	=  $sendEmailDate." ".$newsendEmailTime;
$sendEmailDate 		=  date("Y-m-d", $oldDate);

$fileName 			=  NULL;
$id 				=  getToken(17);
$mailAttachment 	=  array();


$dirPath   = $_SERVER["DOCUMENT_ROOT"]."/client/res/templates/reminder/uploads/";
$destdir   = $dirPath;
$handle    = opendir($destdir);

$c = 0;
while ($file = readdir($handle)&& $c<3) {
    $c++;
}

if( $c > 2 ) {

	$uploads_dir = $_SERVER["DOCUMENT_ROOT"]."/client/res/templates/reminder/uploads/";
	if(!is_dir($uploads_dir)) {
		mkdir($uploads_dir);
	}

	$uploads_dir = $_SERVER["DOCUMENT_ROOT"]."/client/res/templates/reminder/zipFolder/";
	if(!is_dir($uploads_dir)) {
		mkdir($uploads_dir);
	}

	$zip = new ZipArchive();

	$fileName =  time() . date("YmdHis") . ".zip";
	$zip_name = getcwd() . "/zipFolder/". $fileName;

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
	$size = filesize('zipFolder/'.$fileName);

	include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3bucketfoldersize.php');

	$objS3buket         = new S3bucketfoldersize();
	$s3BucketSize       = $objS3buket->FolderSize();
	$currentFileSize    = $objS3buket->formatSizeUnits( $size, "BYTES" );
	$planStorageLimit   = $objS3buket->getDomainStorageLimit();
	$finalExisting      = ( $s3BucketSize + $currentFileSize );
	// $finalExisting = $objS3buket->formatSizeUnits( $finalExisting, "GB" );;
    $planStorageLimit   = $objS3buket->convertMemorySize( $planStorageLimit."Gb", "b" );

	if( $finalExisting > $planStorageLimit ) {

	    // delete local file
	    $zip_name = 'zipFolder/'.$fileName;
		if(file_exists($zip_name)){
           unlink($zip_name);
        }

	    $data["error"] 	= "true";
		$data["status"] = "false";
	    $data["msg"]    = "Your space limit is over. Please contact admin if you wish to add more documents.";
	    echo json_encode($data);return;
	}

	// s3 bucket transfer
	include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/wasabi_connect.php');
	// Where the files will be source from
	$source = 'zipFolder/'.$fileName;

	// Where the files will be transferred to
	$dest = 'Production/'.$_SERVER['SERVER_NAME'].'/email_reminder_files/'.$userName.'/'.$id.'/'.$fileName;

	// Create a transfer object
	// $manager = new \Aws\S3\Transfer($s3, $source, $dest);

	// //Perform the transfer synchronously
	// $manager->transfer();

	$result = $client->putObject([
        'Bucket' => 'fincrm',
        'Key'    => $dest,
        'SourceFile' => $source         
 	]);

	$zip_name = 'zipFolder/'.$fileName;
	if( file_exists( $zip_name ) ) {
       unlink( $zip_name );
    }
 }

$folderName  	= 	NULL;
$emailStatus 	= 	"Active";
$status 		= 	1;
$DateTime 		= 	new DateTime();
$createdBy 		= 	$userId;
$createdAt 		= 	$DateTime->format('Y-m-d H:i:s');
$subdomain_url 	= 	$_SERVER['HTTP_HOST'];

//check email type for sending emails
if($emailType == 'add_emailReminder_sms_date') {

	// get super admin connection 
	$sql = "INSERT INTO email_reminder (id, email_to, email_cc, subject, email_body, file_name, send_email_date, send_email_time, send_email_date_time, folder_name, email_status, `status`, created_by_id, created_at, assigned_user_id) VALUES ('$id','$emailTo', '$emailCc', '$subject', '$emailBody', '$fileName', '$sendEmailDate', '$sendEmailTime', '$sendEmailDateTime', '$folderName', '$emailStatus', '$status', '$createdBy', '$createdAt', '$createdBy')";

	$commanDbSql = "INSERT INTO email_reminder (id, email_to, email_cc, subject, email_body, file_name, send_email_date, send_email_time, send_email_date_time, folder_name, email_status, `status`, created_by_id, created_at, assigned_user_id,subdomain_url,user_name) VALUES ('$id','$emailTo', '$emailCc', '$subject', '$emailBody', '$fileName', '$sendEmailDate', '$sendEmailTime', '$sendEmailDateTime', '$folderName', '$emailStatus', '$status', '$createdBy', '$createdAt', '$createdBy', '$subdomain_url', '$userName')";

	$commanDbResult   	=   $databaseOperations->exicuteQueryOnCommonDatabase($commanDbSql);

	$successMessage  =  "Reminder added successfully.";

} else {

	$emailStatus 	= 	"Sent";

	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/email_templates/EmailNotification.php');
	$sendMail  		=   new EmailNotification();

	$emailToArr 	=  explode(',', $emailTo);
	$emailCcArr 	=  explode(',', $emailCc);

	$sendMailResult         =   $sendMail->sendEmail($emailToArr, $emailBody, $subject, $emailCcArr, $mailAttachment);

	if( !$sendMailResult ) {
	    $data["error"] 	= "true";
		$data["status"] = "false";
		$data["msg"] 	= "Oops! Something went wrong.";
		echo json_encode($data);return;
	}

	$sql   =  "INSERT INTO sent_email_reminder(id, email_to, email_cc, subject, email_body, send_email_date,email_status, created_at, created_by_id,send_email_time,assigned_user_id, file_name) VALUES('$id','$emailTo','$emailCc','$subject','$emailBody','$sendEmailDate','$emailStatus', '$createdAt', '$createdBy', '$sendEmailTime', '$createdBy', '$fileName')";

	$commanDbResult 	= 	true;
	$successMessage  	=  	"Email sent successfully.";
}

//delete local unziped files
if( !empty($mailAttachment) && count($mailAttachment) > 0  ) {

	foreach( $mailAttachment as $attachment ) {

		if( file_exists($attachment) ) {
		    unlink($attachment);
		}
	}
}

$result   =    $databaseOperations->exicuteQuery($sql);

if( $result && $commanDbResult ) {
	$data["error"] 	= "false";
	$data["status"] = "true";
	$data["msg"] 	= $successMessage;
	echo json_encode($data);return;
} else {
	$data["error"] 	= "true";
	$data["status"] = "false";
	$data["msg"] 	= "Oops! Something went wrong.";
	echo json_encode($data);return;
}

echo json_encode($data);return;
?>