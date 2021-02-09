<?php
session_start();
$userName= $_SESSION['Login'];

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

$res= mysqli_query($conn, "SELECT id FROM user WHERE user_name='".$userName. "'");
$row=mysqli_fetch_array($res);
$userId= $row['id'];

 function unlinkFile(){

 		GLOBAL $userName;
 		GLOBAL $userId;
 		GLOBAL $conn;

		$er_id 			= isset($_GET["er_id"]) ? $_GET["er_id"] : NULL;
		$er_fileName 	= isset($_GET["er_fileName"]) ? $_GET["er_fileName"] : NULL;
		$er_fileName	= str_replace(" ", "", $er_fileName);

		$result = financialFileGet($er_id);
		
		if( !empty($er_id) && !empty($er_fileName) && !empty($result) ){

			if( !empty($result["filename"]) ){

				$filePath = "estimate/zipFolder/".$result["filename"];
				
				$zip = new ZipArchive;
				if ($zip->open($filePath) === TRUE)
				{
				    if ($zip->deleteName($er_fileName))
				    {
				    	$data["error"] 	= "false";
						$data["status"] = "true";
						$data["msg"] 	= "File deleted successfully.";
				    }
				    else
				    {
				    	$data["error"] 	= "false";
						$data["status"] = "true";
						$data["msg"] 	= "File deleting failed.";
						echo json_encode($data);return;
				    }
				    
				    $zip->close();
				}
				else {
				    $data["error"] 	= "false";
					$data["status"] = "true";
					$data["msg"] 	= "File deleting failed.";
					echo json_encode($data);return;
				}
			}
		}

		echo json_encode($data);return;
		die;
	}

	function financialFileGet($id=""){
	
	 	GLOBAL $conn;
		$sql1 = 'SELECT er.filename FROM estimate as er WHERE id="'.$id.'" ORDER BY id ASC ';
		$result1 = mysqli_fetch_array(mysqli_query($conn, $sql1));
		return $result1;	
	}
	unlinkFile();