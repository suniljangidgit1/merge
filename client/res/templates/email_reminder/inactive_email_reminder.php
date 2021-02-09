<?php

$id 	=  	isset($_GET['id']) ? $_GET['id'] : NULL;
$json	=	true;

//INCLUDE CUSTOM FUNCTION
include($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/email_reminder/customFunctions.php');

//DATABASE OPERATIONS
include($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/email_reminder/databaseOperations.php');

if( !empty($id) ) {

	//get single recrod
	$sql 		=   "SELECT email_status FROM email_reminder WHERE id= '$id'";
	$row 		=   $databaseOperations->getRecordArray($sql);

	$status 	= 	$row['email_status'];

	if( $status != "In Active" ) {

		$sql 		= 	"UPDATE email_reminder SET email_status = 'In Active' WHERE id = '$id'";
		$result 	= 	$databaseOperations->exicuteQuery($sql);

		//update data on common database
		$commonDatabaseResult  = $databaseOperations->exicuteQueryOnCommonDatabase($sql);

		if( $result && $commonDatabaseResult ) {
			echo 1;
		}
	} else {
		echo 0;
	}
}
?>