<?php
    session_start();
	error_reporting(~E_ALL);
	$user_name = $_SESSION['Login'];
    $id = $_GET["id"];
    $donwloadFile = $_GET["filename"];
	
    /*//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	if($conn->connect_error){
		die("Connection Failed" . $conn->connect_error);
	}

	$sql4="select * from user where user_name='$user_name'";
	$result4=mysqli_query($conn,$sql4);
	$row4=mysqli_fetch_assoc($result4);
	$user=$row4['user_name'];

	$sql1="select * from invoice_files where id='$id'";
	$result1=mysqli_query($conn,$sql1);
	$row1=mysqli_fetch_assoc($result1);
	$invid=$row1['invoice_id'];
	$filename=$row1['original_filename'];
    $temp = explode('.', $filename);
    $ext  = array_pop($temp);
    $name = implode('.', $temp);
	// echo $name;die();
    include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/wasabi_connect.php');
	// include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3Connect.php');
    // $path='uploads/financial_files';
    $path = $_SERVER['DOCUMENT_ROOT'].'/client/res/templates/financial_files/estimate/uploads/';

    if(!is_dir($path))
    {
        mkdir($path,0777,TRUE);
    }

    // echo 'Development/'.$_SERVER['SERVER_NAME'].'/financial_files/estimates/'.$user.'/'.$estid.'/'. $name;die;
    $result=$s3->getObject(
    	array(
    		  'Bucket'=>'fincrm',
    		  'Key'=>'Development/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$row1['user_name'].'/'.$invid.'/'. $name.'.zip',
    		  'SaveAs'=>$path.'/'.$name.'.zip'
    		)
    );

    $zip=new ZipArchive;
    // $file_path='uploads/financial_files/'.$name.'.zip';
    $file_path='financial_files/invoice/zipFolder/'.$row1["filename"];
    $res=$zip->open($file_path);
    if($res===TRUE)
    {
    	// $zip->extractTo('uploads/financial_files/');
        $zip->extractTo($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/financial_files/invoice/uploads/');
    	$zip->close();
    }
    else{
    	echo "error to unzip";
    }*/
	
	// $path = 'uploads/financial_files/'.$filename;
    $path = 'invoice/uploads/'.$donwloadFile;
    // $path = $_SERVER['DOCUMENT_ROOT'].'/client/res/templates/financial_files/invoice/uploads/'.$donwloadFile;
	
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
	// header("Content-type:" .pathinfo($filename, PATHINFO_EXTENSION));
    header("Content-type:" .pathinfo($donwloadFile, PATHINFO_EXTENSION));
    header("Content-Disposition: attachment; filename=\"" . basename($path) . "\";");
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    // header('Content-Length: ' . $size);
    ob_clean();
    flush();
    readfile($path); //showing the path to the server where the file is to be download
	unlink($path);
    
	
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
            rmdir($path);
            return true;

    }
    delete_directory('uploads/');
    exit;
	
?>