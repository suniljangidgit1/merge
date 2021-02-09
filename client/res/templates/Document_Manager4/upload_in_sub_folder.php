<?php
	session_start();
	error_reporting(0);
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
  	$connForGetDefaultSize 	=$conn;
  	$kv       				= $conn;

	$userName=$_SESSION["Login"];
	$assignUser= $_POST['user'];
	$defineAccess= $_POST['userAccess'];
	
	$data=array();
	$defineaccessData=array();
	$assignedUserId= $_POST['user'];
	$defineAccess= $_POST['userAccess'];
	$data[0]=$assignedUserId;
	$defineaccessData[0]=$defineAccess;
	$extrausersession=$_POST['usercount'];
	$temp_cnt=0;
			
			if($extrausersession>=0)
			{
				for($i=1; $i<=$extrausersession;$i++)
				{
					if($i==$extrausersession)
					{
						$data[$i]=$_POST['extrausername'.$i];
						$defineaccessData[$i]=$_POST['extradefineaccess'.$i];
					}
					else
					{
						$data[$i]=$_POST['extrausername'.$i];
						$defineaccessData[$i]=$_POST['extradefineaccess'.$i];
					}
					
				}
			}	
			 
			 $datauser=implode(",",$data);
			 $dataaccess=implode(",",$defineaccessData);
			// echo $datauser." ".$dataaccess;
	if(count($_FILES['attachment']['name']) > 0){
		$folder_id =$_SESSION['folderIDForUpload'];
		// $conn= mysqli_connect('localhost', 'root', 'root', 'fincrm');;
		// if($conn->connect_error){
		// 	die("Connection Failed ".$conn->connect_error);
		// }
		$ind=0;
		$up_dir= "TEMP_FOLDER/";
		foreach($_FILES['attachment']['name'] as $name){	
			move_uploaded_file($_FILES["attachment"]["tmp_name"][$ind], $up_dir. basename($fileName= $name=$_FILES["attachment"]["name"][$ind]));
		}
		$fileNameToCheck=$_FILES['attachment']['name'];
		if($folder_id=='#'){
			$folder_id=0;
		}
		foreach($_FILES['attachment']['error'] as $error) {
			if($error)
				die( "Error: ".$error); 		
		}
		// File size Resctrictions GET THE DEFAULT FILE SIZE FROM THE DATABASE WHICH IS SET BY ADMIN.
		// $connForGetDefaultSize= mysqli_connect('localhost', 'root', 'root', 'fincrm');;
		// if ($connForGetDefaultSize->connect_error) { // Check connection
		// 	die("Connection failed: " . $connForGetDefaultSize->connect_error);
		// } 
		$sqlForGetDefaultSize="SELECT * from default_size_limit where id='1'";
		$resultForGetDefaultSize= mysqli_query($connForGetDefaultSize, $sqlForGetDefaultSize);
		$rowForGetDefaultSize = mysqli_fetch_array($resultForGetDefaultSize);
		$default_size= $rowForGetDefaultSize['size'];
		$maxsize = $default_size * 1024 * 1024; //300MB maximum allowed.
		foreach($_FILES['attachment']['size'] as $size) {
			if($size > $maxsize)
				die("Error: File size is larger than the allowed limit.");		
		}
		$allowed = array('ASP', 'ASPX', 'EXE', 'BAT', 'DLL', 'COM', 'ASA', 'ASAX', 'ASCX', 'ASHX', 'ASMX', 'AXD', 'CDX', 'CER', 'CONFIG', 'IDC', 'CS', 'CSPROJ', 'JSL', 'LICX', 'REM', 'RESOURCES', 'RESX', 'SHIM', 'SHTML', 'SOAP', 'STM', 'VB', 'VBPROJ', 'VJSPROJ', 'VSDISCO', 'WEBINFO', 'INI');
		foreach($_FILES['attachment']['name'] as $name) {
		$type = pathinfo($name, PATHINFO_EXTENSION); 
		if(in_array($type, $allowed)) 
			die("Error: Please select a valid file format.-".$type);	
		}
		
		// $kv = new mysqli('localhost', 'root', 'root', 'subdomain');
		// if ($kv->connect_error) { // Check connection
		// 	die("Connection failed: " . $kv->connect_error);
		// } 
		$DateTime = new DateTime();
		date_default_timezone_set('Asia/Kolkata');
		$created_at= $DateTime->format('d-m-Y h:i:s A');
		$index=0;
		$uploads_dir = "upload/";
		foreach($_FILES['attachment']['name'] as $filename) {
			// $conn = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
			// if($conn->connect_error){
			// 	die("Connection Failed " . $conn->connect_error);
			// }
			$fileName= $name=$_FILES["attachment"]["name"][$index];
			$sql= "SELECT * FROM document_master WHERE folder_id= '".$folder_id."' AND document_name='".$fileName."'";
			$result= mysqli_query($conn, $sql);
			$row= mysqli_fetch_array($result);
			$fileNameFromDB= $row['document_name'];
			if($fileName===$fileNameFromDB){
				$_SESSION['files']=$_FILES['attachment'];
				$_SESSION['filename']= $fileName;
				$_SESSION['filesize']= $size;
				$_SESSION['fileType']=$type;
				$_SESSION['folderID']=$folder_id;
				echo "<script type='text/javascript'>";
				echo "var msg = confirm('".$fileName." file with same name already exists, do you still want to upload?');
					//alert('MSG VALUE== '+msg);
					if(msg == true ){
						//window.location='upload.php';
						//window.location='renameFile.php';
						//var url='renameFiles.php';
						//window.open(url,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=700,height=700,directories=no,location=no'); 
					}
					if(msg == false ){
					//alert('<?php saveFiles(); ?>');
						window.location= 'renameFile.php';
						//var url='localhost:8080/DMS/uploadFile.php';
						//window.open(url,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=700,height=700,directories=no,location=no'); 			
					}	
				";
				echo "</script>";
				function saveFiles(){
					header('location:uploadFile.php');
				}
			}
			copy('TEMP_FOLDER/'.$fileName, 'upload/'.$fileName); 
			$type = pathinfo($name, PATHINFO_EXTENSION); 
			move_uploaded_file($_FILES["attachment"]["tmp_name"][$index], $uploads_dir. basename($fileName= $name=$_FILES["attachment"]["name"][$index])); 
			mysqli_query($kv, "INSERT INTO document_master(folder_id, document_name, document_type, document_size, document_content, created_user_id, assigned_user_id, define_access, createdAt) VALUES ('".$folder_id."', '".$fileName."', '".$type."', '".$size."', NULL , '".$userName."', '".$datauser."', '".$dataaccess."', '".date("d-m-Y h:i:s A")."')");
			$index++;
			unlink('TEMP_FOLDER/'.$fileName);
			echo "<script type='text/javascript'>";
			echo "window.location ='success.html';";//header('location: success.html');
			echo "</script>";
		}
	}
?>