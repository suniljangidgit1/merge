<?php
session_start();
/*
* OVERVIEW TAB AJX CONTROLLER
* THIS IS AJAX CONTROLLER FOR OVERVIEW TAB AJAX REQUEST
* NAME 	: dashboardAjaxController.php 
*/


// FILES INCLUDES
require('dbConfig.php');
require('commonHelper.php');


// DEFINE GLOBAL VARIABLE
define("LOGIN", $_SESSION['Login']); 


/*
* To know user permissions
* @param 	- (array) $dbConn 
* @return 	- (json)  $response 
*/

function checkEntityAccess( $entity = "" ){

	$response["status"] 	= "false";
	$response["msg"] 		= "Invalid request!";
	$response["userRole"] 	= "";

	// create helper object
	$helper 		= new Helper();

	$sessId 		= $helper->getUserIdByUsername(LOGIN);
	$userRole 		= $helper->getUserRole($sessId);
	
	if( empty($sessId) || empty($userRole) ) {
		$response["msg"] 		= "Not authenticate user!";
		return $response;
	}

	$response["userRole"] 	= $userRole;

	if( empty($entity) ){
		$response["msg"] 	= "Entity can't be empty!";
		return $response;
	}

	if( !empty($userRole) && $userRole == "admin" ) {
		$response["msg"] 	= "Admin is logged in.";
		return $response;
	}

	$userRoleAccess = $helper->userHasEntityAccess( $sessId );
	// echo "<pre>";print_r($userRoleAccess);die;

	if( !empty($userRoleAccess) ) {

		$entityArr = array();
		$accessArr = json_decode( $userRoleAccess, TRUE );

		foreach ($accessArr as $key => $value) {
			
			if( trim($entity) == $key ) {
				
				$response["status"] = "true";
				$response["msg"] 	= "User has access of ".$key." entity access.";
				return $response;
			} 
		}

	}

	$response["userRole"] 	= $userRole;
	return $response;

}


/*
* Here ajax call
*/

$methodName = isset( $_GET["methodName"] ) ? $_GET["methodName"] : NULL ;
$parameters = isset( $_GET["parameters"] ) ? $_GET["parameters"] : NULL ;

// ############## OPPORTUNITIES COUNT PANEL ##############
if( $methodName == "checkEntityAccess" && $parameters == "false" ) {
	
	$accessArr["status"] 		= "false";
	$accessArr["Lead"] 			= "false";
	$accessArr["Opportunity"] 	= "false";

	$leadAccess = checkEntityAccess( "Lead" );
	if( !empty($leadAccess) && $leadAccess["status"] == "true" ) {
		$accessArr["status"] 	= "true";
		$accessArr["Lead"] 		= "true";
	}

	$opportunityAccess = checkEntityAccess( "Opportunity" );
	if( !empty($opportunityAccess) && $opportunityAccess["status"] == "true" ) {
		$accessArr["status"] 		= "true";
		$accessArr["Opportunity"] 	= "true";
	}

	$accessArr["userRole"] 	= $opportunityAccess["userRole"];

	// echo "<pre>";print_r($accessArr);die; 
	echo json_encode($accessArr);return true;

}