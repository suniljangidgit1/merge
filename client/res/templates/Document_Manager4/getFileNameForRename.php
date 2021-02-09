<?php
	error_reporting(0);
	session_start();
	//echo "ID FROM GET FILE NAME FOR RENAME= ".$_POST['id'];
	$id= $_POST['id'];
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
	
	$_SESSION['idForRename']= $id;
	// $conn= mysqli_connect('localhost', 'root', 'root', 'fincrm');;
	// if($conn->connect_error){
	// 	die("Connection Failed ".$conn->connect_error);
	// }

	// Get All IDs from folder master...
	$arrForFolderMasterIds= array();
	$res= mysqli_query($conn, "SELECT * FROM folder_master_3");
	while($row= mysqli_fetch_array($res)){
		$idForcheckBox=$row['prefix']." ".$row['id'];
		$arrForFolderMasterIds[]= $idForcheckBox;
	}

	//Get All IDs from sub folder master..
	$arrForSubFolderMasterIds= array();
	$res1= mysqli_query($conn, "SELECT * FROM sub_folder_master_3");
	while($row1=mysqli_fetch_array($res1)){
		$idForcheckBox=$row1['prefix']." ".$row1['id'];
		$arrForSubFolderMasterIds[]=$idForcheckBox;
	}

	//Get All IDs from document master..
	$arrForDocumentMasterIds=array();
	$res2= mysqli_query($conn, "SELECT * FROM document_master_3");
	while($row2= mysqli_fetch_array($res2)){
		$idForcheckBox=$row2['prefix']." ".$row2['id'];
		$arrForDocumentMasterIds[]= $idForcheckBox;
	}

	if(in_array($id, $arrForFolderMasterIds)){

		$idWithPrefix=$id;
		$arrOfIdAndPrefix= explode(" ", $idWithPrefix);
		$resFolderMaster= mysqli_query($conn, "SELECT * FROM folder_master_3 WHERE id='".$arrOfIdAndPrefix[1]."'");

		$rowFolderMaster= mysqli_fetch_array($resFolderMaster);
		$fileOrFolderName= $rowFolderMaster['folder_name'];

		echo $fileOrFolderName;

	}

	if(in_array($id, $arrForSubFolderMasterIds)){

		$idWithPrefix=$id;
		$arrOfIdAndPrefix= explode(" ", $idWithPrefix);

		$resForSubFolderMaster= mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE id='".$arrOfIdAndPrefix[1]."'");
		$rowForSubFolderMaster= mysqli_fetch_array($resForSubFolderMaster);
		$fileOrFolderName= $rowForSubFolderMaster['folder_name'];

		echo $fileOrFolderName;
	}

	if(in_array($id, $arrForDocumentMasterIds)){

		$idWithPrefix=$id;
		$arrOfIdAndPrefix= explode(" ", $idWithPrefix);

		$resForDocumentMaster= mysqli_query($conn, "SELECT * FROM document_master_3 WHERE id='".$arrOfIdAndPrefix[1]."'");
		$rowForDocumentMaster= mysqli_fetch_array($resForDocumentMaster);
		$fileOrFolderName= $rowForDocumentMaster['document_name'];

		echo $fileOrFolderName;
	}

?>