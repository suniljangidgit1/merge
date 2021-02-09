<?php

    session_start();
	// error_reporting(~E_ALL);
    $user_name = $_SESSION['Login'];

   //get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
	
	if($conn->connect_error){
		die("Connection Failed" . $conn->connect_error);
	}

    // echo '<pre>';print_r($_GET);die;

    $id=$_GET["est_id"];
    // echo $id;
    $filename=$_GET["file_names"];


	$sql4="select * from user where user_name='$user_name'";
	$result4=mysqli_query($conn,$sql4);
	$row4=mysqli_fetch_assoc($result4);
	$user=$row4['user_name'];

	$sql1="select * from estimate_comments where estimate_id='$id'";
	$result1=mysqli_query($conn,$sql1);
	$row1=mysqli_fetch_assoc($result1);
	// $estid=$row1['estimate_id'];

	// $filename=$row1['comment_attachment'];
	 $temp = explode('.', $filename);
     $ext  = array_pop($temp);
     $name = implode('.', $temp);
     // echo $name;die();
     include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/wasabi_connect.php');
     $path='uploads/financial_files';

     if(!is_dir($path))
     {
     	mkdir($path,0777,TRUE);
     	
     }

   
    // echo 'Development/'.$_SERVER['SERVER_NAME'].'/financial_files/estimates/feedback/'.$user.'/'.$id.'/'. $name;die;
    $result=$client->getObject(
    	array(
    		  'Bucket'=>'fincrm',
    		  'Key'=>'Production/'.$_SERVER['SERVER_NAME'].'/financial_files/estimates/feedback/'.$id.'/'. $name.'.zip',
    		  'SaveAs'=>$path.'/'.$name.'.zip'
    		)
    );

    $zip=new ZipArchive;
    $file_path='uploads/financial_files/'.$name.'.zip';
    $res=$zip->open($file_path);
    if($res===TRUE)
    {
    	$zip->extractTo('uploads/financial_files/');
    	$zip->close();
    }
    else{
    	echo "error to unzip";
    }
    

	$path = 'uploads/financial_files/'.$filename;
	header('Content-Description: File Transfer');
    header('Content-Type: application/force-download');
	header("Content-type:" .pathinfo($filename, PATHINFO_EXTENSION));
    // header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=\"" . basename($path) . "\";");
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    // header('Content-Length: ' . $size);
    ob_clean();
    flush();
    readfile($path); //showing the path to the server where the file is to be download
	// unlink($path);
    
	
	 function delete_directory($path) 
    {
        if (is_dir($path))
        
            $dir_handle = opendir($path);
            // if (!$dir_handle){
            // return false;

            // }
            while($file = readdir($dir_handle)) 
            {
                if ($file != "." && $file != "..") 
                {
                    if (!is_dir($path."/".$file))
                    unlink($path."/".$file);
                    else
                    delete_directory($path.'/'.$file);
                }
            }

            closedir($dir_handle);
            // rmdir($path);
            return true;

    }
    delete_directory('uploads/');
    exit;
    // echo 1;
// echo json_encode($path);
?>