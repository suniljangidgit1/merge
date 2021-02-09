<?php
session_start();
error_reporting(~E_ALL);
$user_name = $_SESSION['Login'];
$entity_id=$_SESSION['entityID'];
$entity_name=$_SESSION['name'];

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id = $_GET['id'];

/*$sql1="select * from estimate_files where estimate_id='$id'";
$result1=mysqli_query($conn,$sql1);
while($row1=mysqli_fetch_assoc($result1))
{		
	$link="../../client/res/templates/financial_changes/download_estimate_attachments.php?id=".$row1['id'];

	    $attachment_arr[] = array("id" => $row1['id'], "estimate_id" => $row1['estimate_id'], "filepath" => $row1['filepath'], "original_filename" => $row1['original_filename'],"link" => $link);
	
}*/

$sql1 = "SELECT * FROM estimate where id='$id'";
$result1 = mysqli_query($conn, $sql1);
$row1=mysqli_fetch_assoc($result1);

// $attachment_arr = array();

if(!empty($row1['filename']))
{
	// echo $row1['filename'];die; 
	$sql4="select * from user where user_name='$user_name'";
	$result4=mysqli_query($conn,$sql4);
	$row4=mysqli_fetch_assoc($result4);
	$user=$row4['user_name'];

	$uploads_zipdir = 'estimate/zipFolder/';
	if(!is_dir($uploads_zipdir))
	{
		mkdir($uploads_zipdir,0777,true);
		// chmod($uploads_dir, 0755);
	}

	// transfer file from s3 buckets to local
	// include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3Connect.php');
	include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/wasabi_connect.php');
	// Where the files will be source from
	/*$source = 's3://fincrm/Development/'.$_SERVER['SERVER_NAME'].'/financial_files/estimates/'.$row1['user_name'].'/'.$id.'/';

	// Where the files will be transferred to
	$dest = $_SERVER['DOCUMENT_ROOT'].'/client/res/templates/financial_changes/estimate/zipFolder/';

	// Create a transfer object
	$manager = new \Aws\S3\Transfer($s3, $source, $dest);

	//Perform the transfer synchronously
	$manager->transfer();*/

	$source = 'Production/'.$_SERVER['SERVER_NAME'].'/financial_files/estimates/'.$user.'/'.$id.'/'.$row1['filename'];

    // Where the files will be transferred to
    $dest = $_SERVER['DOCUMENT_ROOT'].'/client/res/templates/financial_changes/estimate/zipFolder/'.$row1['filename'];

    // Create a transfer object
    $result = $client->getObject(array(     
        'Bucket' => 'fincrm',
        'Key'    => $source,
        'SaveAs' => $dest,
    ));

	$file_path = $_SERVER["DOCUMENT_ROOT"]."/client/res/templates/financial_changes/estimate/zipFolder/".$row1['filename'];

	$extractpath = $_SERVER["DOCUMENT_ROOT"]."/client/res/templates/financial_changes/estimate/uploads/";

	// $extract_path = pathinfo(realpath($extractpath), PATHINFO_DIRNAME);

	$ExtractFileName = '';
	$zip = new ZipArchive;
	$res = $zip->open($file_path);
	if($res == TRUE)
  	{
		// $zip->extractTo($extract_path.'/uploads/');
		// $zip->extractTo($extractpath);
		for($i = 0; $i < $zip->numFiles; $i++)
		{
			$ExtractFileName = $zip->getNameIndex($i);

			$link = "../../client/res/templates/financial_changes/download_estimate_attachments.php?filename=".$ExtractFileName;
			$attachment_arr[] = array("id" => $row1['id'], "estimate_id" => $id, "filepath" => $file_path, "original_filename" => $ExtractFileName,"link" => $link);
      	}
      	$zip->close();
  	}
}

// encoding array to json format
echo json_encode($attachment_arr);


?>