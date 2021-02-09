<?php  
	session_start();
	include("../custom_dashboard/commonHelper.php");
	// DEFINE GLOBAL VARIABLE
	define("LOGIN", $_SESSION['Login']);

	// create helper object
	$helper 		= new Helper();
	$sessId 		= $helper->getUserIdByUsername(LOGIN);
	$userRole 		= $helper->getUserRole($sessId);
	$response		= $userRole;

	echo json_encode($response); 
?>