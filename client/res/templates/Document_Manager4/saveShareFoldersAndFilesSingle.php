<?php
	session_start();
	error_reporting(0);
	$arrAlreadyAssignedForUsers= $_SESSION['alreadyAssignedUsers'];
	$arrAlreadyGivenForAccess= $_SESSION['alreadyAccessForUsers'];

	$singleFileIDForShare= $_SESSION['singleFileIDForShare'];
	$accessCount= $_POST['accessCount1'];
	$arrForUsers=array();
	$arrForAccess=array();

	$arrForUsers= $_POST['arrForUsers'];
	$arrForAccess= $_POST['arrForAccess'];

	$singleFileName=$_POST['singleFileName'];

	echo $accessCount;
	print_r($arrForUsers);
	print_r($arrForAccess);

	echo $singleFileName;

	// $conn= mysqli_connect('localhost', 'root', 'root', 'fincrm');;
	// if($conn->connect_error){
	// 	die("Connection Failed ". $conn->connect_error);
	// }

	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	$arrForFolderMasterIDs= array();// For Folder Master IDs..
	$arrForSubFolderMasterIDs= array();// For Sub Folder Master IDs.. 
	$arrForDocumentMansterIDs= array();// For Document Master IDs..

	// GET ALL IDs FROM FOLDER MASTER ID...
	$res= mysqli_query($conn, "SELECT * FROM folder_master_3");
	while($row=mysqli_fetch_array($res)){
		$idForcheckBox=$row['prefix']." ".$row['id'];
		$arrForFolderMasterIDs[]= $idForcheckBox;
	}

	// GET ALL IDs FROM SUB FOLDER MASTER ID..
	$res1= mysqli_query($conn, "SELECT * FROM sub_folder_master_3");
	while($row1= mysqli_fetch_array($res1)){
		$idForcheckBox=$row1['prefix']." ".$row1['id'];
		$arrForSubFolderMasterIDs[]= $idForcheckBox;
	}

	// GET ALL IDs FORM DOCUMENT MASTER...
	$res2= mysqli_query($conn, "SELECT * FROM document_master_3");
	while($row2=mysqli_fetch_array($res2)){
		$idForcheckBox=$row2['prefix']." ".$row2['id'];
		$arrForDocumentMansterIDs[]=$idForcheckBox;
	}

	if(in_array($singleFileIDForShare, $arrForFolderMasterIDs)){

		$idWithPrefix=$singleFileIDForShare;
		$arrOfIdAndPrefix= explode(" ", $idWithPrefix);

		$users=implode(",", $arrForUsers);
		$access= implode(",", $arrForAccess);
		$alreadyAssignUsersFolderMaster='';
		$alreadyAssignAccessFolderMaster='';

		
		
		$res1= mysqli_query($conn, "SELECT * FROM folder_master_3 WHERE id='".$arrOfIdAndPrefix[1]."'");
		$row1= mysqli_fetch_array($res1);
		$alreadyAssignUsersFolderMaster= $row1['assigned_user_id'];
		$alreadyAssignAccessFolderMaster = $row1['define_access'];

		$arrForAlreadyAssignUsersFolderMaster=array();
		$arrForAlreadyAssignAccessFolderMaster= array();

		//$arrForAlreadyAssignUsersFolderMaster= preg_split ("/\,/", $alreadyAssignUsersFolderMaster);
		$arrForAlreadyAssignUsersFolderMaster=$_SESSION['alreadyAssignedUsers'];
		$arrForUsersFolderMaster=array();

		if(count($arrForAlreadyAssignUsersFolderMaster)!=""){
			if($arrForUsers!=""){
				$arrForUsersFolderMaster=array_merge($arrForUsers, $arrForAlreadyAssignUsersFolderMaster);
				$arrForUsersFolderMaster=array_filter($arrForUsersFolderMaster);
			}else{
				$arrForUsersFolderMaster=$arrForAlreadyAssignUsersFolderMaster;
				$arrForUsersFolderMaster=array_filter($arrForUsersFolderMaster);
			}
			
		}else{
			$arrForUsersFolderMaster=$arrForUsers;
			$arrForUsersFolderMaster=array_filter($arrForUsersFolderMaster);
		}
			
		//$arrForAlreadyAssignAccessFolderMaster= preg_split ("/\,/", $alreadyAssignAccessFolderMaster);
		$arrForAlreadyAssignAccessFolderMaster=$_SESSION['alreadyAccessForUsers'];
		$arrForAccessForFolderMaster=array();
		if(count($arrForAlreadyAssignAccessFolderMaster)!=""){
			if($arrForAccess!=""){
				$arrForAccessForFolderMaster= array_merge($arrForAccess, $arrForAlreadyAssignAccessFolderMaster);
				$arrForAccessForFolderMaster=array_filter($arrForAccessForFolderMaster);	
			}else{
				$arrForAccessForFolderMaster=$arrForAlreadyAssignAccessFolderMaster;
				$arrForAccessForFolderMaster=array_filter($arrForAccessForFolderMaster);
			}
				
		}else{
			$arrForAccessForFolderMaster=$arrForAccess;
			$arrForAccessForFolderMaster=array_filter($arrForAccessForFolderMaster);
		}

		$finalUserListForFolderMaster= implode(",",$arrForUsersFolderMaster);
		$finalUserListForFolderMaster=rtrim($finalUserListForFolderMaster, ',');
		$finalAccessListForFolderMaster= implode(",",$arrForAccessForFolderMaster);
		$finalAccessListForFolderMaster=rtrim($finalAccessListForFolderMaster, ',');

		echo $users;
		echo $access;
		mysqli_query($conn, "UPDATE folder_master_3 SET assigned_user_id='$finalUserListForFolderMaster', define_access='$finalAccessListForFolderMaster' WHERE id='".$arrOfIdAndPrefix[1]."'");
		}

	//}

	if(in_array($singleFileIDForShare, $arrForSubFolderMasterIDs)){

		$idWithPrefix=$singleFileIDForShare;
		$arrOfIdAndPrefix= explode(" ", $idWithPrefix);

		$users=implode(",", $arrForUsers);
		$access= implode(",", $arrForAccess);

		$alreadyAssignUsersSubFolderMaster='';
		$alreadyAssignAccessSubFolderMaster='';

		$res2= mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE id='".$arrOfIdAndPrefix[1]."'");
		$row2= mysqli_fetch_array($res2);

		$alreadyAssignUsersSubFolderMaster = $row2['assigned_user_id'];
		$alreadyAssignAccessSubFolderMaster = $row2['defineAccess'];

		$arrForAlreadyAssignUsersSubFolderMaster=array();
		$arrForAlreadyAssignAccessSubFolderMaster= array();

		//$arrForAlreadyAssignUsersSubFolderMaster= preg_split ("/\,/", $alreadyAssignUsersSubFolderMaster);
		$arrForAlreadyAssignUsersSubFolderMaster=$_SESSION['alreadyAssignedUsers'];
		$arrForUsersSubFolderMaster=array();

		if(count($arrForAlreadyAssignUsersSubFolderMaster)!=""){
			$arrForUsersSubFolderMaster=array_merge($arrForUsers, $arrForAlreadyAssignUsersSubFolderMaster);
		}else{
			$arrForUsersSubFolderMaster=$arrForUsers;
		}
		//$arrForAlreadyAssignAccessSubFolderMaster= preg_split ("/\,/", $alreadyAssignAccessSubFolderMaster);
		$arrForAlreadyAssignAccessSubFolderMaster=$_SESSION['alreadyAccessForUsers'];
		$arrForAccessForSubFolderMaster=array();

		if(count($arrForAlreadyAssignAccessSubFolderMaster)!=""){
			$arrForAccessForSubFolderMaster= array_merge($arrForAccess, $arrForAlreadyAssignAccessSubFolderMaster);
		}else{
			$arrForAccessForSubFolderMaster=$arrForAccess;
		}
			

		$finalUserListForSubFolderMaster= implode(",",$arrForUsersSubFolderMaster);
		$finalUserListForSubFolderMaster=rtrim($finalUserListForSubFolderMaster, ',');
		$finalAccessListForSubFolderMaster= implode(",",$arrForAccessForSubFolderMaster);
		$finalAccessListForSubFolderMaster=rtrim($finalAccessListForSubFolderMaster, ',');

		mysqli_query($conn, "UPDATE sub_folder_master_3 SET assigned_user_id='$finalUserListForSubFolderMaster', defineAccess='$finalAccessListForSubFolderMaster' WHERE id='".$arrOfIdAndPrefix[1]."'");
	}

	if(in_array($singleFileIDForShare, $arrForDocumentMansterIDs)){

		$idWithPrefix=$singleFileIDForShare;
		$arrOfIdAndPrefix= explode(" ", $idWithPrefix);

		echo "SELECTED Id = ".$singleFileIDForShare;
		echo "AFTER SPLIT Id = ". $arrOfIdAndPrefix[1];

		$users=implode(",", $arrForUsers);
		$access= implode(",", $arrForAccess);

		$alreadyAssignedUsersDocs='';
		$alreadyAssignedAccesDocs='';

		$res3= mysqli_query($conn, "SELECT * FROM document_master_3 WHERE id='".$arrOfIdAndPrefix[1]."'");
		$row3= mysqli_fetch_array($res3);
		$alreadyAssignedUsersDocs= $row3['assigned_user_id'];
		$alreadyAssignedAccesDocs= $row3['define_access'];

		//$arrForAlreadyAssignUsersDocs= preg_split ("/\,/", $alreadyAssignedUsersDocs);
		$arrForAlreadyAssignUsersDocs=$_SESSION['alreadyAssignedUsers'];
		$arrForUsersDocs=array();
		if(count($arrForAlreadyAssignUsersDocs)!=""){
			$arrForUsersDocs=array_merge($arrForUsers, $arrForAlreadyAssignUsersDocs);
		}else{
			$arrForUsersDocs=$arrForUsers;
		}
			
		//$arrForAlreadyAssignAccessDocs= preg_split ("/\,/", $alreadyAssignedAccesDocs);
		$arrForAlreadyAssignAccessDocs=$_SESSION['alreadyAccessForUsers'];
		$arrForAccessForDocs=array();

		if(count($arrForAlreadyAssignAccessDocs)!=""){
			$arrForAccessForDocs= array_merge($arrForAccess, $arrForAlreadyAssignAccessDocs);
		}else{
			$arrForAccessForDocs=$arrForAccess;
		}
			
		$finalUserListForDocs= implode(",",$arrForUsersDocs);
		$finalUserListForDocs=rtrim($finalUserListForDocs, ',');

		$finalAccessListForDocs= implode(",",$arrForAccessForDocs);
		$finalAccessListForDocs=rtrim($finalAccessListForDocs, ',');

		mysqli_query($conn, "UPDATE document_master_3 SET assigned_user_id='$finalUserListForDocs', define_access='$finalAccessListForDocs' WHERE id='".$arrOfIdAndPrefix[1]."'");

	}
	//mysqli_query($conn, "UPDATE ")

?>