<?php
session_start();
/*
* OVERVIEW TAB AJX CONTROLLER
* THIS IS AJAX CONTROLLER FOR OVERVIEW TAB AJAX REQUEST
* NAME 	: overviewAjaxController.php 
*/


// FILES INCLUDES
require('dbConfig.php');
require('commonHelper.php');


// DEFINE GLOBAL VARIABLE
define("LOGIN", $_SESSION['Login']); 


/*
* To get user list [ filter ]
* @param 	- (array) $dbConn 
* @return 	- (json)  $response 
*/

function getFilterUserList( $dbConn = array() ){

	$response["status"] 	= "false";
	$response["msg"] 		= "Invalid Request!";
	$response["data"] 		= array();
	$response["userRole"] 	= "";

	// create helper object
	$helper 		= new Helper();

	$sessId 		= $helper->getUserIdByUsername(LOGIN);
	$userRole 		= $helper->getUserRole($sessId);
	
	if( empty($sessId) || empty($userRole) ) {
		return $response;
	}

	if( empty($dbConn) ){
		$response["msg"] 	= "Database Connection Failed!";
	}

	if( $userRole == "user" ){
		$userList = $helper->getUserList($sessId);
	}else{
		$userList = $helper->getUserList();
	}

	$response["userRole"] 	= $userRole;

	if( !empty($userList) ){

		$response["status"] 	= "true";
		$response["msg"] 		= "Success!";
		$response["data"] 		= $userList;
	}

	return $response;
}



/*
* To get team list [ filter ]
* @param 	- (array) $dbConn 
* @return 	- (json)  $response 
*/

function getFilterTeamList( $dbConn = array() ){

	$response["status"] 	= "false";
	$response["msg"] 		= "Invalid Request!";
	$response["data"] 		= array();
	$response["userRole"] 	= "";

	// create helper object
	$helper 		= new Helper();

	$sessId 		= $helper->getUserIdByUsername(LOGIN);
	$userRole 		= $helper->getUserRole($sessId);
	
	if( empty($sessId) || empty($userRole) ) {
		return $response;
	}

	if( empty($dbConn) ){
		$response["msg"] 	= "Database Connection Failed!";
	}

	if( $userRole != "user" ){
		$userList = $helper->getTeamList();
	}

	$response["userRole"] 	= $userRole;

	if( !empty($userList) ){

		$response["status"] 	= "true";
		$response["msg"] 		= "Success!";
		$response["data"] 		= $userList;
	}

	return $response;
}


/*
* Here ajax call
*/

$methodName = isset( $_GET["methodName"] ) ? $_GET["methodName"] : NULL ;
$parameters = isset( $_GET["parameters"] ) ? $_GET["parameters"] : NULL ;


if( $methodName == "getFilterUserList" && $parameters == "false" ) {

	// GET USER LIST
	$response 			= getFilterUserList( $dbConn );
	$options 			= "";

	if( !empty($response["data"]) ){
		foreach ($response["data"] as $key => $value) {
			$options .= '<option value="'.$value["id"].'" >'.$value["name"].'</option>';
		}

		$response["status"] = "true";
		$response["msg"] 	= "Success!";
		$response["data"] 	= array( "hide" => "false" , "html" => $options );
	}else{

		$response["status"] = "false";
		$response["msg"] 	= "Invalid Request!";
		$response["data"] 	= array( "hide" => "true" , "html" => "");
	}

	echo json_encode($response); 
	return true;

}else if( $methodName == "getFilterTeamList" && $parameters == "false" ) {

	// GET USER LIST
	$response 			= getFilterTeamList( $dbConn );
	$options 			= "";

	if( !empty($response["data"]) ){
		foreach ($response["data"] as $key => $value) {
			$options .= '<option value="'.$value["id"].'" >'.$value["name"].'</option>';
		}

		$response["status"] = "true";
		$response["msg"] 	= "Success!";
		$response["data"] 	= array( "hide" => "false" , "html" => $options);
	}else{

		$response["status"] = "false";
		$response["msg"] 	= "Invalid Request!";

		if( $response["userRole"] == "user" ){
			$response["data"] 	= array( "hide" => "true" , "html" => "");
		}else{
			$response["data"] 	= array( "hide" => "false" , "html" => "");
		}
	}

	echo json_encode($response); 
	return true;

}