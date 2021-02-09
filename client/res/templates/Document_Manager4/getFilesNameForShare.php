<?php
	error_reporting(0);
	session_start();
	$arrForDeleteFiles = $_SESSION['idsForDelete'];

	$arrCount= count($arrForDeleteFiles);

	//print_r($arrForDeleteFiles);

	$arrForFolderMasterId= array();// Array for store all ids from folder master table...
	$arrForSubFolderMasterId = array();//Array for store all ids from sub folder master...
	$arrForDocumentMasterId = array();// Array for store all ids from document master..
	// $conn = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
	// if($conn->connect_error){
	// 	die("Connection Failed: ".$conn->connect_error);
	// }

	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');	


		$res11= mysqli_query($conn, "SELECT * FROM folder_master_3");
		while($row11= mysqli_fetch_array($res11)){
			$idForcheckBox=$row11['prefix']." ".$row11['id'];
			$arrForFolderMasterId[]= $idForcheckBox;
		}
				
		// Get ids from sub folder master...
		$res12= mysqli_query($conn, "SELECT * FROM sub_folder_master_3");
		while($row12= mysqli_fetch_array($res12)){
			$idForcheckBox=$row12['prefix']." ".$row12['id'];
			$arrForSubFolderMasterId[]= $idForcheckBox;
		}
			
		// Get ids from document_master .....
		$res13= mysqli_query($conn, "SELECT * FROM document_master_3");
		while($row13=mysqli_fetch_array($res13)){
			$idForcheckBox=$row13['prefix']." ".$row13['id'];
			$arrForDocumentMasterId[] = $idForcheckBox;
		}

	// print_r($arrForFolderMasterId)	;
	// print_r($arrForSubFolderMasterId)	;
	// print_r($arrForDocumentMasterId)	;

	$output="";
	for($i=0; $i<$arrCount; $i++){
		//echo $arrForDeleteFiles[$i];
		if(in_array($arrForDeleteFiles[$i], $arrForFolderMasterId)){
			$idWithPrefix=$arrForDeleteFiles[$i];
			$arrOfIdAndPrefix= explode(" ", $idWithPrefix);
			//print_r($arrOfIdAndPrefix);
			$res= mysqli_query($conn, "SELECT * FROM folder_master_3 Where id='".$arrOfIdAndPrefix[1]."'");
			$row= mysqli_fetch_array($res);

			$output.="<div class='row' id='".$i."'><div class='col-10 col-xs-10 col-sm-10 col-md-10'><input type='text' class='form-control mb-3' name='folderName".$i."' value='".$row['folder_name']."' readonly></div><div class='col-2 col-xs-2 col-sm-2 col-md-2'><i class='removeButton fas fa-times' id='".$i."' onclick='removeRow1(".$i.")' style='margin-top:15px'></i></div></div>";

		}else if(in_array($arrForDeleteFiles[$i], $arrForSubFolderMasterId)){
			$idWithPrefix=$arrForDeleteFiles[$i];
			$arrOfIdAndPrefix= explode(" ", $idWithPrefix);

			$res1= mysqli_query($conn, "SELECT * FROM sub_folder_master_3 WHERE id='".$arrOfIdAndPrefix[1]."'");
			$row1= mysqli_fetch_array($res1);

			$output.= "<div class='row' id='".$i."'><div class='col-10 col-xs-10 col-sm-10 col-md-10'><input type='text' class='form-control mb-3' name='folderName".$i."' value='".$row1['folder_name']."' readonly></div><div class='col-2 col-xs-2 col-sm-2 col-md-2'><i class='removeButton fas fa-times' id='".$i."' onclick='removeRow1(".$i.")' style='margin-top:15px'></i></div></div>"; 

		}else if(in_array($arrForDeleteFiles[$i], $arrForDocumentMasterId)){
			$idWithPrefix=$arrForDeleteFiles[$i];
			$arrOfIdAndPrefix= explode(" ", $idWithPrefix);

			$res2= mysqli_query($conn, "SELECT * FROM document_master_3 WHERE id='".$arrOfIdAndPrefix[1]."'");
			$row2= mysqli_fetch_array($res2);

			$output.="<div class='row' id='".$i."'><div class='col-10 col-xs-10 col-sm-10 col-md-10'><input type='text' class='form-control mb-3' name='folderName".$i."' value='".$row2['document_name']."'  readonly></div><div class='col-2 col-xs-2 col-sm-2 col-md-2'><i class='removeButton fas fa-times' id='".$i."' onclick='removeRow1(".$i.")' style='margin-top:15px'></i></div></div>";
		}
		//$res= mysqli_query($conn, "SELECT * FROM ")
	}


	echo $output;
	//print_r($arrForDeleteFiles);

?>