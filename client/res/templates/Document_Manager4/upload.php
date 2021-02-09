<?php
//If directory doesnot exists create it.
session_start();
error_reporting(0);
$output_dir = "upload/";
$selectedUser= array();
$upload_dir_temp = "TEMP_FOLDER/";
$selectedUser=$_SESSION['selectedUsers'];
$firstSelectedUser= array();
$firstSelectedUser= $_SESSION['firstUserArr'];

$firstUser= implode(",",$firstSelectedUser );

$users= implode(",", $selectedUser);

$allUsers= $firstUser.$users;
//echo "ALL USERS = ". $allUsers;
$fId= $_SESSION["folderName"];

$msg="";

// Array Deceleration for duplicate files...
$arrayForDuplicateFilesSize = array();
$arrayForDuplicateFilesType = array();
$arrayForDuplicateFiles= array();
  
if(isset($_FILES["myfile"]))
{
	$ret = array();
	$error =$_FILES["myfile"]["error"];
	{
		// $conn = mysqli_connect('localhost', 'root', 'root', 'dms');
		// 		if($conn->connect_error){
		// 			die("Connection Failed ". $conn->connect_error);
		// 		}
		
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

    	if(!is_array($_FILES["myfile"]['name'])) //single file
    	{
			$fileName = $_FILES["myfile"]["name"];	
       	 	$fileSize= $_FILES["myfile"]["size"];
			$fileType= pathinfo($fileName, PATHINFO_EXTENSION);
			/* //// CHECK DUPLICATE FILE ENTRY ********..... 
			$res1= mysqli_query($conn, "SELECT * FROM document_master WHERE folder_id=1 AND document_name= '".$fileName."'");
			
			while($row1 = mysqli_fetch_array($res1)){
				$fileNameFromDB = $row1['document_name'];
				
				if($fileName===$fileNameFromDB){
					move_uploaded_file($_FILES["myfile"]["tmp_name"],$upload_dir_temp. $_FILES["myfile"]["name"]);
					
					$arrayForDuplicateFiles[]= $fileNameFromDB;
					$arrayForDuplicateFilesSize[]= $fileSize;
					$arrayForDuplicateFilesType[]= $fileType;
					$msg= "File already exist";
				}
			}
			$_SESSION['arrayForDuplicateFiles']=$arrayForDuplicateFiles;
			/////////////////////////////////////////
			 */
			
				//echo "SINGLE FILE.... ";
				
				if(!in_array($fileName, $arrayForDuplicateFiles)){
				
				move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir. $_FILES["myfile"]["name"]);
				 echo "<br> Error: ".$_FILES["myfile"]["error"];
				 
				 
				 $arrayForDuplicateFiles[]= $fileName;
				 $arrayForDuplicateFilesSize[]= $fileSize;
				 $arrayForDuplicateFilesType[]= $fileType;
				 
				 $_SESSION['arrayForDuplicateFiles']= $arrayForDuplicateFiles;
				 $_SESSION['arrayForDuplicateFilesSize']=$arrayForDuplicateFilesSize;
				 $_SESSION['arrayForDuplicateFilesType']=$arrayForDuplicateFilesType;
				 
					// $ret[$fileName]= $output_dir.$fileName;
					
					 date_default_timezone_set('Asia/Kolkata');
					// $result=  mysqli_query($conn, "INSERT INTO document_master(folder_id, document_name, document_type, document_size, document_content, created_user_id, assigned_user_id, define_access, createdAt) VALUES ('".$_SESSION["folderName"]."', '".$fileName."', '".$fileType."', '".$fileSize."', NULL , 'admin', '".$allUsers."', 'download', '".date("d-m-Y h:i:s A")."')");
				}
    	}
    	/* else
    	{
			echo "MULTIPLES FILES.... ";
    	      $fileCount = count($_FILES["myfile"]['name']);
    		  for($i=0; $i < $fileCount; $i++)
    		  {
    		  	$fileName = $_FILES["myfile"]["name"][$i];
	       	 	 $ret[$fileName]= $output_dir.$fileName;
    		    move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],$output_dir.$fileName );
    		  }
    	
    	}  */
		
	}	
    
    echo $msg;
 
}

?>