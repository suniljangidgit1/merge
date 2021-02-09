<?php

	session_start();
	error_reporting(0);
	$arrForDeleteFiles = $_SESSION['idsForDelete'];
	//$str_user= $_SESSION['access_user'];
	$count= count($arrForDeleteFiles);

	// $conn = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
	// if($conn->connect_error){
	// 	die("Connection Failed". $conn->connect_error);
	// }

	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	$arrForUsers= array();
	$arrForAccess= array();	
	$arrForUsers= $_POST['arrForUsers'];
	$arrForAccess=$_POST['arrForAccess'];
		
	$users=implode(",", $arrForUsers);
	$access= implode(",", $arrForAccess);

	

	$arrForFolderMasterIds=array();
	$arrForSubFolderMasterIds= array();
	$arrForDocsIds= array();

	$res= mysqli_query($conn, "SELECT * FROM folder_master_3");
	while($row= mysqli_fetch_array($res)){
		$idForcheckBox=$row['prefix']." ".$row['id'];
		$arrForFolderMasterIds[]= $idForcheckBox;

	}

	$res1= mysqli_query($conn, "SELECT * FROM sub_folder_master_3");
	while($row1=mysqli_fetch_array($res1)){
		$idForcheckBox=$row1['prefix']." ".$row1['id'];
		$arrForSubFolderMasterIds[]=$idForcheckBox;
	}

	$res2= mysqli_query($conn, "SELECT * FROM document_master_3");
	while($row2= mysqli_fetch_array($res2)){
		$idForcheckBox=$row2['prefix']." ".$row2['id'];
		$arrForDocsIds[]= $idForcheckBox;
	}

	
	for($i=0; $i<$count; $i++){
	
		$alreadyAssignUsersFolderMaster='';
		$alreadyAssignAccessFolderMaster='';

		$alreadyAssignUsersSubFolderMaster='';
		$alreadyAssignAccessSubFolderMaster='';

		$alreadyAssignedUsersDocs='';
		$alreadyAssignedAccesDocs='';

		if(in_array($arrForDeleteFiles[$i], $arrForFolderMasterIds)){
			
			$idWithPrefix=$arrForDeleteFiles[$i];
			$arrOfIdAndPrefix= explode(" ", $idWithPrefix);
			
			$resForGetAssignedUser = mysqli_query($conn, "SELECT * FROM folder_master_3 WHERE id='".$arrOfIdAndPrefix[1]."'");

			$rowForGetAssignedUser=mysqli_fetch_array($resForGetAssignedUser);
			$alreadyAssignUsersFolderMaster= $rowForGetAssignedUser['assigned_user_id'];
			$alreadyAssignAccessFolderMaster= $rowForGetAssignedUser['define_access'];

			$arrForAlreadyAssignUsersFolderMaster=array();
			$arrForAlreadyAssignAccessFolderMaster= array();

			$arrForAlreadyAssignUsersFolderMaster= preg_split ("/\,/", $alreadyAssignUsersFolderMaster);

			$arrForAlreadyAssignAccessFolderMaster= preg_split ("/\,/", $alreadyAssignAccessFolderMaster);

			
			if(count($arrForAlreadyAssignUsersFolderMaster)==0){
					
				$arrForAlreadyAssignUsersFolderMaster=$arrForUsers;
			 	$arrForAlreadyAssignAccessFolderMaster=$arrForAccess;
			}
			
				for($ik=0; $ik<count($arrForUsers); $ik++){
			
					if(in_array($arrForUsers[$ik],$arrForAlreadyAssignUsersFolderMaster)){
			
						for($j=0; $j<count($arrForAlreadyAssignUsersFolderMaster); $j++){
			
							if($arrForUsers[$ik]==$arrForAlreadyAssignUsersFolderMaster[$j]){
								$arrForAlreadyAssignAccessFolderMaster[$j]=$arrForAccess[$ik];
							}
						}
					}else{
						$arrForAlreadyAssignUsersFolderMaster[]=$arrForUsers[$ik];
						$arrForAlreadyAssignAccessFolderMaster[]= $arrForAccess[$ik];
					}
				}
			
			
			$finalUserListForFolderMaster= implode(",",$arrForAlreadyAssignUsersFolderMaster);
			$finalUserListForFolderMaster=rtrim($finalUserListForFolderMaster, ',');
			$finalAccessListForFolderMaster= implode(",",$arrForAlreadyAssignAccessFolderMaster);
			$finalAccessListForFolderMaster=rtrim($finalAccessListForFolderMaster, ',');


			// echo $finalUserListForFolderMaster."<br>";
			// echo $finalAccessListForFolderMaster."<br>";
			$result= mysqli_query($conn, "UPDATE folder_master_3 SET assigned_user_id='$finalUserListForFolderMaster', define_access='$finalAccessListForFolderMaster' WHERE id='".$arrOfIdAndPrefix[1]."'");
			//echo "UPDATE folder_master SET assigned_user_id='$finalUserListForFolderMaster', define_access='$finalAccessListForFolderMaster' WHERE id='".$arrForDeleteFiles[$i];
			if($result){
				// echo "<script>alert('file updated');</script>";
			}else{
				mysqli_error($conn);
			}
			$arrForUsersForFolderMaster=array();
			$arrForAccessForFolderMaster=array();
			 
		}
		//GET ALREADY ASSIGNED USERS AND ACCESS FROM SUB FOLDER MASTER ....
		if(in_array($arrForDeleteFiles[$i], $arrForSubFolderMasterIds)){

			$idWithPrefix=$arrForDeleteFiles[$i];
			$arrOfIdAndPrefix= explode(" ", $idWithPrefix);
			//GET ALREADY ASSIGNED USERS AND ACCESS FROM SUB FOLDER MASTER....
			// echo "IN SUB FOLDER";

			$arrForAlreadyAssignUsersSubFolderMaster=array();
			$arrForAlreadyAssignAccessSubFolderMaster= array();

			$resForGetAssignedUserFromSubFolder= mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE id='".$arrOfIdAndPrefix[1]."'");
			$rowForGetAssignedUserFromSubFolder= mysqli_fetch_array($resForGetAssignedUserFromSubFolder);
			$alreadyAssignUsersSubFolderMaster=$rowForGetAssignedUserFromSubFolder['assigned_user_id'];
			$alreadyAssignAccessSubFolderMaster=$rowForGetAssignedUserFromSubFolder['defineAccess'];


			$arrForAlreadyAssignUsersSubFolderMaster= preg_split ("/\,/", $alreadyAssignUsersSubFolderMaster);
			$arrForUsersSubFolderMaster=array();

			

			$arrForAlreadyAssignAccessSubFolderMaster= preg_split ("/\,/", $alreadyAssignAccessSubFolderMaster);
			$arrForAccessForSubFolderMaster=array();

			if(count($arrForAlreadyAssignUsersSubFolderMaster)==0){
				$arrForAlreadyAssignUsersSubFolderMaster=$arrForUsers;
			 	$arrForAlreadyAssignAccessSubFolderMaster=$arrForAccess;
			}
			
			for($ik=0; $ik<count($arrForUsers); $ik++){
			
					if(in_array($arrForUsers[$ik],$arrForAlreadyAssignUsersSubFolderMaster)){
			
						for($j=0; $j<count($arrForAlreadyAssignUsersSubFolderMaster); $j++){
			
							if($arrForUsers[$ik]==$arrForAlreadyAssignUsersSubFolderMaster[$j]){
								$arrForAlreadyAssignAccessSubFolderMaster[$j]=$arrForAccess[$ik];
							}
						}
					}else{
						$arrForAlreadyAssignUsersSubFolderMaster[]=$arrForUsers[$ik];
						$arrForAlreadyAssignAccessSubFolderMaster[]= $arrForAccess[$ik];
					}
				}


			$finalUserListForSubFolderMaster= implode(",",$arrForAlreadyAssignUsersSubFolderMaster);
			$finalUserListForSubFolderMaster=rtrim($finalUserListForSubFolderMaster, ',');
			$finalUserListForSubFolderMaster=rtrim($finalUserListForSubFolderMaster, ',');
			
			$finalAccessListForSubFolderMaster= implode(",",$arrForAlreadyAssignAccessSubFolderMaster);
			$finalAccessListForSubFolderMaster=rtrim($finalAccessListForSubFolderMaster, ',');
			$finalAccessListForSubFolderMaster=rtrim($finalAccessListForSubFolderMaster, ',');

			$result1= mysqli_query($conn, "UPDATE sub_folder_master_3 SET assigned_user_id='$finalUserListForSubFolderMaster', defineAccess='$finalAccessListForSubFolderMaster' WHERE id='".$arrOfIdAndPrefix[1]."'");

			// echo $alreadyAssignUsersSubFolderMaster."<br>";
			// echo $alreadyAssignAccessSubFolderMaster."<br>";
			// echo "<script>alert('Files and Folders Shared Successfully');history.go(-1);</script>";
		}
		//GET ALREADY ASSIGNED USERS AND ACCESS FROM DOCUMENT MASTER ....
		if(in_array($arrForDeleteFiles[$i], $arrForDocsIds)){
			// echo "IN DOCS";
			$idWithPrefix=$arrForDeleteFiles[$i];
			$arrOfIdAndPrefix= explode(" ", $idWithPrefix);

			$arrForAlreadyAssignUsersSubFolderMaster=array();
			$arrForAlreadyAssignAccessSubFolderMaster= array();


			$resForGetAssignedUserFromDocs= mysqli_query($conn, "SELECT * FROM document_master_3 WHERE id='".$arrOfIdAndPrefix[1]."'");
			$rowForGetAssignedUserUserFromDocs=mysqli_fetch_array($resForGetAssignedUserFromDocs);
			$alreadyAssignedUsersDocs= $rowForGetAssignedUserUserFromDocs['assigned_user_id'];
			$alreadyAssignedAccesDocs= $rowForGetAssignedUserUserFromDocs['define_access'];

			$arrForAlreadyAssignUsersDocs= preg_split ("/\,/", $alreadyAssignedUsersDocs);
			$arrForUsersDocs=array();
			// if(count($arrForAlreadyAssignUsersDocs)!=""){
			// 	$arrForUsersDocs=array_merge($arrForUsers, $arrForAlreadyAssignUsersDocs);
			// }else{
			// 	$arrForUsersDocs=$arrForUsers;
			// }
			

			$arrForAlreadyAssignAccessDocs= preg_split ("/\,/", $alreadyAssignedAccesDocs);
			$arrForAccessForDocs=array();

			// if(count($arrForAlreadyAssignAccessDocs)!=""){
			// 	$arrForAccessForDocs= array_merge($arrForAccess, $arrForAlreadyAssignAccessDocs);
			// }else{
			// 	$arrForAccessForDocs=$arrForAccess;
			// }
			if(count($arrForAlreadyAssignUsersDocs)==0){
				$arrForAlreadyAssignUsersDocs=$arrForUsers;
			 	$arrForAlreadyAssignAccessDocs=$arrForAccess;
			}
			print_r($arrForAlreadyAssignUsersDocs);
			print_r($arrForAlreadyAssignAccessDocs);
			for($ik=0; $ik<count($arrForUsers); $ik++){
			
					if(in_array($arrForUsers[$ik],$arrForAlreadyAssignUsersDocs)){
			
						for($j=0; $j<count($arrForAlreadyAssignUsersDocs); $j++){
			
							if($arrForUsers[$ik]==$arrForAlreadyAssignUsersDocs[$j]){
								$arrForAlreadyAssignAccessDocs[$j]=$arrForAccess[$ik];
							}
						}
					}else{
						$arrForAlreadyAssignUsersDocs[]=$arrForUsers[$ik];
						$arrForAlreadyAssignAccessDocs[]= $arrForAccess[$ik];
					}
				}


			$finalUserListForDocs= implode(",",$arrForAlreadyAssignUsersDocs);
			$finalUserListForDocs=rtrim($finalUserListForDocs, ',');

			$finalAccessListForDocs= implode(",",$arrForAlreadyAssignAccessDocs);
			$finalAccessListForDocs=rtrim($finalAccessListForDocs, ',');


			$result2= mysqli_query($conn, "UPDATE document_master_3 SET assigned_user_id='$finalUserListForDocs', define_access='$finalAccessListForDocs' WHERE id='".$arrOfIdAndPrefix[1]."'");
			// echo $alreadyAssignedUsersDocs."<br>";
			// echo $alreadyAssignedAccesDocs."<br>";

			// echo "<script>alert('Files and Folders Shared Successfully');history.go(-1);</script>";
		}
	}
	$_SESSION['idsForDelete']="";
	//echo "FROM SAVESHAREFOLDERANDFILES PAGE....";	
	//echo "<script>alert('Files and Folders Shared Successfully');history.go(-1);</script>";
	// echo "<br>";
	// echo $count;
	// echo "<br>";
	//print_r($str_user);

?>