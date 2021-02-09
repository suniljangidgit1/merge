<?php
	session_start();
	error_reporting(0);
	$id= $_POST['ids'];
	echo $id;
	//$arrForIds = array();
	if($_SESSION['idsForDelete']!=""){
		$oldSessionValue= implode(",",$_SESSION['idsForDelete']);
	}
	//echo $oldSessionValue;
	
	$arrForIds= explode(",", $oldSessionValue);
	
	array_push($arrForIds, $id);
	
	$_SESSION['idsForDelete']= $arrForIds;
	//echo "ARRAY VALUE";
	print_r($_SESSION['idsForDelete']);
	
?>