<?php
	session_start();
	$i= $_POST['i'];
	$arrForUserAndAccess= preg_split ("/\,/", $i);
	print_r($arrForUserAndAccess);
	echo "FROM REMOVE USERS AND ACCESS=  ".$i;

	$arrForUsers=$_SESSION['alreadyAssignedUsers'];
	$arrForAccess=$_SESSION['alreadyAccessForUsers'];


//	Code for remove array element from arrUsers...
	for($i=0; $i<count($arrForUsers); $i++){
		$val= $arrForUsers[$i];

		if($val==$arrForUserAndAccess[0]){
			unset($arrForUsers[$i]);		
		}
	}
// Code for remive array element from arrAccess..	
	for($j=0; $j<count($arrForAccess); $j++){
		$val1= $arrForAccess[$j];

		if($val1==$arrForUserAndAccess[1]){
			unset($arrForAccess[$j]);
		}
	}
	//unset($arrForAccess["$arrForUserAndAccess[1]"]);
	echo "ARR FOR AFTER REMOVE USERS == ";
	print_r($arrForUsers);
	echo "ARR FOR AFTER REMOVE ACCESS == ";
	print_r($arrForAccess);

	$_SESSION['alreadyAssignedUsers']= $arrForUsers;
	$_SESSION['alreadyAccessForUsers']= $arrForAccess;


?>