<?php
error_reporting(0);
session_start();
$userName= $_SESSION['Login'];
date_default_timezone_set('Asia/Kolkata');
//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

if($userName == 'fincrm'){
    $userName = 'admin';
}
if($userName=='admin'){
    $id=$_POST['id'];
	$idWithPrefix=$id;
    $arrOfIdAndPrefix= explode(" ", $idWithPrefix);
	$res= mysqli_query($conn, "SELECT * FROM document_master_3 WHERE id=".$arrOfIdAndPrefix[1]);
    $row = mysqli_fetch_array($res);
    $folder_path = $row['folder_path'];
    $filename = $row['document_name'];
    if($folder_path == "/"){
        $path = $arrOfIdAndPrefix[1]."_".$filename.'.zip';
    }else{

     $path = $folder_path.$arrOfIdAndPrefix[1]."_".$filename.'.zip';
    }

    // echo 'Development/'.$_SERVER['SERVER_NAME'].'/document_manager/'.$path; die;
	mysqli_query($conn, "DELETE FROM document_master_3 WHERE id='".$arrOfIdAndPrefix[1]."'");
    //unlink('upload/'.$_SERVER['DOCUMENT_ROOT'].'/'.$folder_path.'/'.$id.'_'.$row['document_name'].'.zip');
    include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3Connect.php');
    $result = $s3->deleteObject(array(
        'Bucket' => 'fincrm',
        'Key'    => 'Development/'.$_SERVER['SERVER_NAME'].'/document_manager/'.$path,
    ));

    echo "1";
   // die;
}
if($userName!= 'admin'){
    
    $id= $_POST['id'];
    //$id=$_POST['id'];
	$idWithPrefix=$id;
    $arrOfIdAndPrefix= explode(" ", $idWithPrefix);
    
    $res= mysqli_query($conn, "SELECT * FROM document_master_3 WHERE id='". $arrOfIdAndPrefix[1]."'");
    $row= mysqli_fetch_array($res);
    
    $fileName= $row['document_name'];
    $fileID= $row['id'];
    $folder_path = $row['folder_path'];

    $path= $folder_path. $arrOfIdAndPrefix[1].'_'.$fileName;

    $res2= mysqli_query($conn, "SELECT * FROM user WHERE user_name= '".$userName."'");
    $row2= mysqli_fetch_array($res2);
    $user_id= $row2['id'];
    
    
    
    mysqli_query($conn, "INSERT INTO file_delete_request (file_id, user_id, createdAt) VALUES ('".$fileID."', '".$user_id."', '".date("d-m-Y h:i:s A")."')");
    include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3Connect.php');
    // $result = $s3->deleteObject(array(
    //     'Bucket' => 'fincrm',
    //     'Key'    => 'Development/'.$_SERVER['SERVER_NAME'].'/document_manager/'.$path,
    // ));
    $msg="Not Admin";
    echo $msg;
}
?>