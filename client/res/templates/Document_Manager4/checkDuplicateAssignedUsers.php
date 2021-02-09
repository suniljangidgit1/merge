<?php
	session_start();
	error_reporting(0);
	$id= $_SESSION['singleFileIDForShare'];

	//echo $id."  ";
	//echo " /  ".$_POST['id']."   ";
	//echo "/  ".$_POST['val'];
	$checkedUserName= $_POST['val'];

	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	// $conn= mysqli_connect('localhost', 'root', 'root', 'fincrm');;
	if($conn->connect_error){
		die("Connection Failed". $conn->connect_error);
	}
	//Code for get all IDs from folder master..
	$arrForFolderMasterIDs =array();
	$res1= mysqli_query($conn, "SELECT * FROM folder_master_3");
	while($row1= mysqli_fetch_array($res1)){
	    $idForcheckBox=$row1['prefix']." ".$row1['id'];
		$arrForFolderMasterIDs[]= $idForcheckBox;
	}

	// Code for get all IDs from Sub folder matser..
	$arrForSubFolderMasterIDs= array();
	$res2= mysqli_query($conn, "SELECT * FROM sub_folder_master_3");
	while($row2= mysqli_fetch_array($res2)){
	    $idForcheckBox=$row2['prefix']." ".$row2['id'];
		$arrForSubFolderMasterIDs[]=$idForcheckBox;
	}

	// Code for get IDs from document master...
	$arrForDocumentMasterIDs= array();
	$res3= mysqli_query($conn, "SELECT * FROM document_master_3");
	while($row3= mysqli_fetch_array($res3)){
	    $idForcheckBox=$row3['prefix']." ".$row3['id'];
		$arrForDocumentMasterIDs[]= $idForcheckBox;

	}

	if(in_array($id, $arrForFolderMasterIDs)){
	    
	    $idWithPrefix=$id;
		$arrOfIdAndPrefix= explode(" ", $idWithPrefix);
	    
		$arrForAssignedUsers= array();
		$res4= mysqli_query($conn, "SELECT * FROM folder_master_3 WHERE id='".$arrOfIdAndPrefix[1]."'");
		$row4= mysqli_fetch_array($res4);

		$assignedUsers= $row4['assigned_user_id'];

		$arrForAssignedUsers=preg_split ("/\,/", $assignedUsers);

		if(in_array($checkedUserName, $arrForAssignedUsers)){
			echo 1;
		}
	}

	if(in_array($id, $arrForSubFolderMasterIDs)){
	    
	    $idWithPrefix=$id;
		$arrOfIdAndPrefix= explode(" ", $idWithPrefix);
	    
		$arrForAssignedUsers= array();
		$res5= mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE id='".$arrOfIdAndPrefix[1]."'");
		$row5= mysqli_fetch_array($res5);

		$assignedUsers= $row5['assigned_user_id'];
		$arrForAssignedUsers=preg_split ("/\,/", $assignedUsers);
		if(in_array($checkedUserName, $arrForAssignedUsers)){
			echo 1;
		}
	}

	//print_r($arrForDocumentMasterIDs);
	if(in_array($id, $arrForDocumentMasterIDs)){
	    
	    $idWithPrefix=$id;
		$arrOfIdAndPrefix= explode(" ", $idWithPrefix);
	    
		$arrForAssignedUsers= array();
		//echo "ID FROM DM";
		$res6= mysqli_query($conn, "SELECT * FROM document_master_3 WHERE id='".$arrOfIdAndPrefix[1]."'");
		$row6= mysqli_fetch_array($res6);
		$assignedUsers= $row6['assigned_user_id'];

		//echo $assignedUsers;
		$arrForAssignedUsers=preg_split ("/\,/", $assignedUsers);
		if(in_array($checkedUserName, $arrForAssignedUsers)){
			echo 1;
		}else{
			print_r($arrForAssignedUsers);
		}
	}
?>