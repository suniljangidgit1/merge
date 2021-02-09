<?php
session_start();
error_reporting(~E_ALL);
$user_name1 = $_SESSION['Login'];

date_default_timezone_set('asia/kolkata');   

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

	

// echo "<pre>"; print_r($_POST);die;
date_default_timezone_set('Asia/Kolkata'); 
$date=date("Y/m/d H:i:s");
$closed_at=date("d/M/Y h:i:s",strtotime($date));
// echo $closed_at;
$id=$_POST['estimate_id'];
$comment=$_POST['feedback'];
// $feedback_attachment=$_POST['feedback_attachment'];

$sql_estimate="insert into estimate_comments(estimate_id,comment,posted_by,date) values('$id','$comment','$user_name1','$date')";
$result_estimate=mysqli_query($conn,$sql_estimate);


$last_insert_id = mysqli_insert_id($conn);

// echo "<pre>";print_r($_FILES);
// echo "<pre>";print_r($_FILES['feedback_attachment']["name"]);
// if(!empty($_FILES['feedback_attachment']["name"])){
// 	echo 'In if case';
// }
// die;
//file Uploading ...
$allFiles='feedback/uploads/';
// if(!empty($_FILES['feedback_attachment']["name"]))
if(!empty(is_dir($allFiles)))
{
    // echo "in if";die;
    /*include_once ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3bucketfoldersize.php');    
    $objS3buket         = new S3bucketfoldersize();
    include_once ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3Connect.php');*/
    // include_once ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3Connect.php');
    
    $uploads_dir = 'uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/estimates/feedback/'.$id;
    if(!is_dir($uploads_dir))
    {
        mkdir($uploads_dir,0777,true);
    }
     
    // Count total files
     $files = scandir($_SERVER["DOCUMENT_ROOT"]."/client/res/templates/financial_changes/feedback/uploads");
    $attch_file="";
  // print_r($files);die;
    foreach ($files as $filename) {
      if ($filename !== '.' && $filename !== '..'){
    // $countfiles = count($_FILES['feedback_attachment']["name"]);
    // Looping all files
    // for($i=0;$i<$countfiles;$i++)
    // {
        // $filename = $_FILES['feedback_attachment']["name"][$i];
        $filename = $filename;
        $temp = explode('.', $filename);
        $ext  = array_pop($temp);
        $name = implode('.', $temp);
  
        $filepath='uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/estimates/feedback/'.$id.'/'.$filename;
       
        $zip = new ZipArchive();
        $zipfileName =  $name. ".zip";
        $zip_name ='uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/estimates/feedback/'.$id.'/'.$zipfileName;
         
        if ($zip->open($zip_name, ZipArchive::CREATE) !== TRUE) 
        {
            // $error .= "Sorry ZIP creation is not working currently.<br/>";
            $data["status"] = "false";
            $data["msg"]    = "Sorry ZIP creation is not working currently.";
            echo json_encode($data); 
            return true;
        }
        
        // $innerFileName = str_replace(' ', '_', $_FILES['feedback_attachment']["name"][$i]);
        // $zip->addFromString($innerFileName, file_get_contents($_FILES['feedback_attachment']['tmp_name'][$i]));
         $filecontent = $_SERVER["DOCUMENT_ROOT"]."/client/res/templates/financial_changes/feedback/uploads/".$filename;
        // $zip->addFromString($filename, file_get_contents($innerFileName));
        $zip->addFromString($filename,file_get_contents($filecontent));
        
        $delete_files = 'feedback/uploads/'.$filename;
        if(file_exists($delete_files)){
        unlink($delete_files);
        }
         
        $zip->close();

        // To check s3 bucket existing folder size in gb

        clearstatcache();
        $size = filesize($zip_name);

        include_once ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3bucketfoldersize.php');    
        $objS3buket         = new S3bucketfoldersize();
        
        $s3BucketSize       = $objS3buket->FolderSize();
        $currentFileSize    = $objS3buket->formatSizeUnits( $size, "BYTES" );
        $planStorageLimit   = $objS3buket->getDomainStorageLimit();
        $finalExisting      = ( (int) $s3BucketSize + (int) $currentFileSize );
        // $finalExisting      = $objS3buket->formatSizeUnits( $finalExisting, "GB" );;
        $planStorageLimit = $objS3buket->convertMemorySize( $planStorageLimit."Gb", "b" );
        
        if( $finalExisting > $planStorageLimit ){

            // delete local file
            $deleteFile = $zip_name;
            if( file_exists($deleteFile) ){
                unlink($deleteFile);
            }

            $data["status"] = "false";
            $data["msg"]    = "Your space limit is over. Please contact admin if you wish to add more documents.";
            echo json_encode($data); 
            return true;
        }
           
        // To check s3 bucket existing folder size in gb
        

        include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/wasabi_connect.php');

        // Where the files will be source from
        $source = 'uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/estimates/feedback/'.$id.'/'.$zipfileName;

        $dest = 'Production/'.$_SERVER['SERVER_NAME'].'/financial_files/estimates/feedback/'.$id.'/'.$zipfileName;
        // Where the files will be transferred to
        $dest = 'Production/'.$_SERVER['SERVER_NAME'].'/financial_files/estimates/feedback/'.$id.'/'.$zipfileName;

        // Create a transfer object
        $result = $client->putObject([
            'Bucket' => 'fincrm',
            'Key'    => $dest,
            'SourceFile' => $source         
        ]);

        $attch_file .= $filename.',';
	}
    // $i++; 
    }    
}


$attch_file = substr($attch_file, 0, -1);
$sql_estimates_files="update estimate_comments set comment_attachment ='$attch_file' where id='$last_insert_id'";
$result_estimates_files=mysqli_query($conn,$sql_estimates_files);


function delete_directory($uploads_dir) 
{
    if (is_dir($uploads_dir))
        $dir_handle = opendir($uploads_dir);
    // if (!$dir_handle){
    // return false;

    // }
    while($file = readdir($dir_handle))
    {
        if ($file != "." && $file != "..") 
        {
            if (!is_dir($uploads_dir."/".$file))
            unlink($uploads_dir."/".$file);
            else
            delete_directory($uploads_dir.'/'.$file);
        }
    }
    closedir($dir_handle);
    // rmdir($uploads_dir);
    return true;
}
delete_directory('uploads/');

$date1=date("d M");
$comment_arr[]= array("comment" => $comment, "date" => $date1, "user_name" => $user_name1, "filenames" => $attch_file,"dataId"=>$id);

echo json_encode($comment_arr); 


?>