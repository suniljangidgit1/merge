<?php
	//echo "IN deleteFileByAdmin.php PAGE";
	error_reporting(0);
	echo $_POST['id'];
	$arrForFolderMasterID= array();
	$arrForSubFolderMasterID= array();
	$arrForDocumentMasterID= array();	
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
	
	// GET ALL ID FROM folder_master...
	$res1= mysqli_query($conn, "SELECT * FROM folder_master");
	while($row1= mysqli_fetch_array($res1)){
		$arrForFolderMasterID[]= $row1['id'];
	}
	
	//GET ALL ID FROM sub_folder_master ...
	$res2= mysqli_query($conn, "SELECT * FROM sub_folder_master");
	while($row2= mysqli_fetch_array($res2)){
		$arrForSubFolderMasterID[]= $row2['id'];
	}
	
	// GET ALL ID FROM document_master ...
	$res3= mysqli_query($conn, "SELECT * FROM document_master");
	while($row3= mysqli_fetch_array($res3)){
		$arrForDocumentMasterID[]= $row3['id'];
	}
	
	
	// DELETE FILE FROM document_master....
	if(in_array($_POST['id'], $arrForDocumentMasterID)){
		$res2= mysqli_query($conn, "SELECT * FROM document_master WHERE id='".$_POST['id']."'");
		$row2= mysqli_fetch_array($res2);
		
		$fileName= $row2['document_name'];
		
		$res= mysqli_query($conn, "DELETE FROM document_master WHERE id='".$_POST['id']."'");
		
		mysqli_query($conn, "DELETE FROM file_delete_request WHERE file_id='".$_POST['id']."'");
		
		unlink("upload/".$fileName);
		
		if($res){
			echo "File deleted successfully !!";
		}else{
			echo "File not deleted somthing went wrong.";
		}
	}
	
	//DELETE FOLDER FROM folder_master...
	if(in_array($_POST['id'], $arrForFolderMasterID)){
		
		$resForDeleteFolder= mysqli_query($conn, "DELETE FROM folder_master WHERE id='".$_POST['id']."'");
		
		mysqli_query($conn, "DELETE FROM file_delete_request WHERE file_id='".$_POST['id']."'");
		if($resForDeleteFolder){
			echo "Folder Deleted Successfully ";
		}
	}
	
	// DELETE FOLDER FROM sub_folder_master...
	if(in_array($_POST['id'], $arrForSubFolderMasterID)){
		
		$resForDeleteSubFolder= mysqli_query($conn, "DELETE FROM sub_folder_master WHERE id='".$_POST['id']."'");
		
		mysqli_query($conn, "DELETE FROM file_delete_request WHERE file_id='".$_POST['id']."'");
		
		if($resForDeleteSubFolder){
			echo "Folder Deleted Successfully";
		}
	}
	
	
?>