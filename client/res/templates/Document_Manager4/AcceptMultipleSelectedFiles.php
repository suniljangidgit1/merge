<?php
	session_start();
	error_reporting(0);
	//echo "IN AcceptMultipleSelectedFiles PAGE ";
	///print_r($_SESSION['idsForDelete']);
	
	$arrForIDForDelete= array();// ARRAY for get selected id for delete..
	$arrForIDForDelete= $_SESSION['idsForDelete'];
	
	print_r($arrForIDForDelete);
	// echo count($arrForIDForDelete);die;
	$arrForFolderMasterID = array(); // Array for folder_master id..
	$arrForSubFolderMasterID= array(); // Array for sub_folder_master id..
	$arrForDocumentMasterID = array(); // Array for document_master id..
	
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
	
	// $conn = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
	if($conn->connect_error){
		die("Connection Failed ".$conn->connect_error);
		
	}
	
	
	// GET ID FROM folder_master...
	$res1= mysqli_query($conn, "SELECT * FROM folder_master_3");
	while($row1= mysqli_fetch_array($res1)){
	    //	echo "IN WHILE LOOP OF FOLDER MASTER";
		$arrForFolderMasterID[]= $row1['id'];
	}
	print_r($arrForFolderMasterID);
	// GET ID FROM sub_folder_master ....
	$res2= mysqli_query($conn, "SELECT * FROM sub_folder_master_3");
	while($row2= mysqli_fetch_array($res2)){
	//	echo "IN WHILE LOOP OF SUB FOLDER MASTER";
		$arrForSubFolderMasterID[]= $row2['id'];
	}
	print_r($arrForSubFolderMasterID);
	//GET ID FROM document_master....
	$res3= mysqli_query($conn, "SELECT * FROM document_master_3");
	while($row3= mysqli_fetch_array($res3)){
	//	echo "IN WHILE LOOP OF DOCUMENT MASTER";
		$arrForDocumentMasterID[]= $row3['id'];
	}
	//echo "ABCD";
	print_r($arrForDocumentMasterID);
	for($i=0; $i<count($arrForIDForDelete); $i++){
		$id=$arrForIDForDelete[$i];
		echo "IN FOR LOOP FOR GET ID ONE BY ONE....";
		echo $id;
		//CHECK IF ID IS FROM FOLDER MASTER OR NOT ..
		if(in_array($id, $arrForFolderMasterID)){
			echo "ID OF FOLDER MASTER";
			$resForDeleteFolder= mysqli_query($conn, "DELETE FROM folder_master_3 WHERE id='".$id."'");
		
			mysqli_query($conn, "DELETE FROM file_delete_request WHERE file_id='".$id."'");
			if($resForDeleteFolder){
				echo "Folder Deleted Successfully ";
			}
		}
		
		//CHECK IF ID IS FROM SUB FOLDER MASTER...
		if(in_array($id, $arrForSubFolderMasterID)){
		    echo "ID OF SUB FOLDER MASTER";
			$resForDeleteSubFolder= mysqli_query($conn, "DELETE FROM sub_folder_master_3 WHERE id='".$id."'");
		
			mysqli_query($conn, "DELETE FROM file_delete_request WHERE file_id='".$id."'");
		
			if($resForDeleteSubFolder){
				echo "Folder Deleted Successfully";
			}
		}
		
		//CHECK IF ID FROM DOCUMENT MASTER ....
		if(in_array($id, $arrForDocumentMasterID)){
		    echo "ID OF DOCUMENT MASTER";
			$res2= mysqli_query($conn, "SELECT * FROM document_master_3 WHERE id='".$id."'");
			$row2= mysqli_fetch_array($res2);
			$fileName= $row2['document_name'];
		
			$res= mysqli_query($conn, "DELETE FROM document_master_3 WHERE id='".$id."'");
		
			mysqli_query($conn, "DELETE FROM file_delete_request WHERE file_id='".$id."'");
		
			unlink("upload/".$fileName);
		
			if($res){
				echo "File deleted successfully !!";
			}else{
				echo "File not deleted somthing went wrong.";
			}
		}
		
	//	echo "ID FOR DELETE = ". $id;
	}
?>