<?php
	session_start();
	$id= $_POST['id'];

	$_SESSION['singleFileIDForShare']= $id;

	// $conn= mysqli_connect('localhost', 'root', 'root', 'fincrm');;
	// if($conn->connect_error){
	// 	die("Connection Failed ".$conn->connect_error);
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
	$output="";

	// Check if ID From Folder Master if yes Get Folder Name...
	if(in_array($id, $arrForFolderMasterIDs)){

		$idWithPrefix=$id;
		$arrOfIdAndPrefix= explode(" ", $idWithPrefix);

		$resForGetFileorFolderName= mysqli_query($conn, "SELECT * from folder_master_3 WHERE id='".$arrOfIdAndPrefix[1]."'");
		$rowForGetFileorFolderName= mysqli_fetch_array($resForGetFileorFolderName);

		$fileOrFolderName= $rowForGetFileorFolderName['folder_name'];
		$users= $rowForGetFileorFolderName['assigned_user_id'];
		$access= $rowForGetFileorFolderName['define_access'];
		$arrForUsers= preg_split ("/\,/", $users);
		$arrForAccess= preg_split ("/\,/", $access);

		$_SESSION['alreadyAssignedUsers']= $arrForUsers;
		$_SESSION['alreadyAccessForUsers']= $arrForAccess;

		$output.="<div class='row' id='1'><div class='col-10 col-xs-10 col-sm-10 col-md-10'><input type='text' name='singleFileName$id' id='singleFileName' class='form-control mb-3' value='".$fileOrFolderName."' readonly></div><div class='col-2 col-xs-2 col-sm-2 col-md-2'><i class='removeButton fas fa-times' id='1' onclick='removeRow1(1)' style='margin-top:15px'></i></div></div>";

		for($i=0; $i<count($arrForUsers); $i++){
			if($arrForUsers[$i]==""){

			}else{
				$res= mysqli_query($conn, "SELECT * FROM user WHERE user_name='".$arrForUsers[$i]."'");
				$row= mysqli_fetch_array($res);
				$f_name= $row['first_name'];
				$l_name= $row['last_name'];

				$full_name=$f_name." ". $l_name;

				$output.="<div class='row' id='".$arrForUsers[$i].','.$arrForAccess[$i]."'><div class='col-5 col-xs-5 col-sm-5 col-md-5'><input type='text' name='users$i' class='form-control mb-3' value='".$full_name."'></div><div class='col-5 col-xs-5 col-sm-5 col-md-5'><input type='text' name='access' class='form-control mb-3' value='".$arrForAccess[$i]."'></div><div class='col-2 col-xs-2 col-sm-2 col-md-2'><i class='removeButton fas fa-times' id='1' onclick='removeRow1(\"" .$arrForUsers[$i].','.$arrForAccess[$i]. "\")' style='margin-top:15px'></i></div></div>";
			}
			
		}
	}

	// Check if ID From Sub Folder Master if Yes Get Folder Name...
	if(in_array($id, $arrForSubFolderMasterIDs)){

		$idWithPrefix=$id;
		$arrOfIdAndPrefix= explode(" ", $idWithPrefix);

		$resForGetFileorFolderName1= mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE id='".$arrOfIdAndPrefix[1]."'");

		$rowForGetFileorFolderName1=mysqli_fetch_array($resForGetFileorFolderName1);

		$fileOrFolderName= $rowForGetFileorFolderName1['folder_name'];
		$users= $rowForGetFileorFolderName1['assigned_user_id'];
		$access= $rowForGetFileorFolderName1['defineAccess'];
		$arrForUsers= preg_split ("/\,/", $users);
		$arrForAccess= preg_split ("/\,/", $access);

		$_SESSION['alreadyAssignedUsers']= $arrForUsers;
		$_SESSION['alreadyAccessForUsers']= $arrForAccess;


		$output.="<div class='row' id='1'><div class='col-10 col-xs-10 col-sm-10 col-md-10'><input type='text' name='singleFileName$id' class='form-control mb-3' value='".$fileOrFolderName."' readonly></div><div class='col-2 col-xs-2 col-sm-2 col-md-2'><i class='removeButton fas fa-times' id='1' onclick='removeRow1(1)' style='margin-top:15px'></i></div></div>";

		for($i=0; $i<count($arrForUsers); $i++){
			if($arrForUsers[$i]!=""){
				$res= mysqli_query($conn, "SELECT * FROM user WHERE user_name='".$arrForUsers[$i]."'");
				$row= mysqli_fetch_array($res);
				$f_name= $row['first_name'];
				$l_name= $row['last_name'];

				$full_name=$f_name." ". $l_name;

				$output.="<div class='row' id='".$arrForUsers[$i].','.$arrForAccess[$i]."'><div class='col-5 col-xs-5 col-sm-5 col-md-5'><input type='text' name='users$i' class='form-control mb-3' value='".$full_name."'></div><div class='col-5 col-xs-5 col-sm-5 col-md-5'><input type='text' name='access' class='form-control mb-3' value='".$arrForAccess[$i]."'></div><div class='col-2 col-xs-2 col-sm-2 col-md-2'><i class='removeButton fas fa-times' id='1' onclick='removeRow1(\"" .$arrForUsers[$i].','.$arrForAccess[$i]. "\")' style='margin-top:15px'></i></div></div>";	
			}
			
		}
	}

	// Check if ID From Docmuent Master if yes Get File Name....
	if(in_array($id, $arrForDocumentMansterIDs)){
		$idWithPrefix=$id;
		$arrOfIdAndPrefix= explode(" ", $idWithPrefix);


		$resForGetFileorFolderName2= mysqli_query($conn, "SELECT * FROM document_master_3 WHERE id='".$arrOfIdAndPrefix[1]."'");
		$rowForGetFileorFolderName2= mysqli_fetch_array($resForGetFileorFolderName2);

		$fileOrFolderName= $rowForGetFileorFolderName2['document_name'];
		$users= $rowForGetFileorFolderName2['assigned_user_id'];
		$access= $rowForGetFileorFolderName2['define_access'];
		$arrForUsers= preg_split ("/\,/", $users);
		$arrForAccess= preg_split ("/\,/", $access);

		$_SESSION['alreadyAssignedUsers']= $arrForUsers;
		$_SESSION['alreadyAccessForUsers']= $arrForAccess;

		$output.="<div class='row' id='1'><div class='col-10 col-xs-10 col-sm-10 col-md-10'><input type='text' name='singleFileName$id' class='form-control mb-3' value='".$fileOrFolderName."' readonly></div><div class='col-2 col-xs-2 col-sm-2 col-md-2'><i class='removeButton fas fa-times' id='1' onclick='removeRow1(1)' style='margin-top:15px'></i></div></div>";

		for($i=0; $i<count($arrForUsers); $i++){
			if($arrForUsers[$i]!=""){

				$res= mysqli_query($conn, "SELECT * FROM user WHERE user_name='".$arrForUsers[$i]."'");
				$row= mysqli_fetch_array($res);
				$f_name= $row['first_name'];
				$l_name= $row['last_name'];

				$full_name=$f_name." ". $l_name;

				$output.="<div class='row' id='".$arrForUsers[$i].','.$arrForAccess[$i]."'><div class='col-5 col-xs-5 col-sm-5 col-md-5'><input type='text' name='users$i' class='form-control mb-3' value='".$full_name."'></div><div class='col-5 col-xs-5 col-sm-5 col-md-5'><input type='text' name='access' class='form-control mb-3' value='".$arrForAccess[$i]."'></div><div class='col-2 col-xs-2 col-sm-2 col-md-2'><i class='removeButton fas fa-times' id='1' onclick='removeRow1(\"" .$arrForUsers[$i].','.$arrForAccess[$i]. "\")' style='margin-top:15px'></i></div></div>";	
			}
			
		}
	}

	
	echo $output;

?>