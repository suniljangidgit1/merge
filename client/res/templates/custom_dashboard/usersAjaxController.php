
<?php
session_start();
/*
* USERS TAB AJX CONTROLLER
* THIS IS AJAX CONTROLLER FOR USERS TAB AJAX REQUEST
* NOTE 	: * USERS TAB IN DASHBOARD IS ONLY FOR SUPER ADMIN OR ADMIN  
* NAME 	: leadsAjaxController.php 
*/


// FILES INCLUDES
require('dbConfig.php');
require('commonHelper.php');


// DEFINE GLOBAL VARIABLE

define("LOGIN", $_SESSION['Login']);


/*
* To get count & records of converted/new leads
* @param 	- (array) $dbConn 
* @param 	- (bool) $isRecords 
* @param 	- (string) $status 
* @param 	- (string) $type 
* @param 	- (string) $filterDate 
* @param 	- (string) $filterUser 
* @param 	- (string) $filterTeam 
* @return 	- (bool/array) 
*/

function getEntitities( $dbConn = array(), $isRecords = "", $filterDate = "", $filterUser = "", $filterTeam = "" ){

	$helper 		= new Helper();
	$sessId 		= $helper->getUserIdByUsername(LOGIN);
	$userRole 		= $helper->getUserRole($sessId);
	$condition		= "";

	if( empty($sessId) || empty($userRole) || empty($dbConn) ) {
		return false;
	}

	if(!empty($filterDate)){
		
		$reportrange= trim(str_replace(" - ", ",", $filterDate));
		$rangeArr	= explode(",", $reportrange);
		$rangeArr[0]= trim( str_replace("/", "-", $rangeArr[0]) );
		$rangeArr[1]= trim( str_replace("/", "-", $rangeArr[1]) );
		$startDate	= trim( date("Y-m-d", strtotime($rangeArr[0]) ) );
		$endDate	= trim( date("Y-m-d", strtotime($rangeArr[1]) ) );

		$condition .= " AND ( DATE(l.created_at) BETWEEN '$startDate' AND '$endDate' ) ";
	}

	if( !empty($filterUser) ){
		$condition .= " AND ( l.assigned_user_id = '$filterUser' ) ";
	} else {
		if( !empty($filterTeam) ){
	    	$condition .= " AND ( l.assigned_user_id IN ( SELECT id FROM user WHERE default_team_id ='$filterTeam' ) ) ";
		}else{
	        $condition .= " AND ( l.assigned_user_id = '$sessId' ) ";
		}
	}

	$table 		= " `lead` as l";
	$where		= "";

	$join 		= " INNER JOIN user as u ON u.id = l.assigned_user_id ";
	$join 		.= " INNER JOIN user as u1 ON u1.id = l.created_by_id ";


	if( $isRecords == "false" ){

		$select		= " COUNT(l.id) as count ";
		$query 		= " SELECT $select FROM $table $join WHERE $where ";
    	$result 	= mysqli_query($dbConn, $query);

    	if( !empty($result) ){

	    	$row = mysqli_fetch_assoc($result);
	    	return $count = isset( $row['count'] ) ? $row['count'] : 0;
	    }

	    return false;

	}else{

		$select		= " l.id, CONCAT(l.salutation_name, ' ', l.first_name, ' ', l.last_name ) as title, l.status, l.source, l.opportunity_amount, CONCAT( u.first_name, ' ', u.last_name ) as assigned_user, CONCAT( u1.first_name, ' ', u1.last_name ) as assigned_by_user, DATE_FORMAT( l.created_at, '%d %b %Y' ) as created_at ";
		
		$orderBy 	= " ORDER BY l.created_at DESC ";
		$query 		= " SELECT $select FROM $table $join WHERE $where $orderBy ";

    	$result 	= mysqli_query($dbConn, $query);
    	
    	if( !empty($result) ){

	    	$rows 	= array();
	    	while( $row = mysqli_fetch_assoc($result) ) {
		        $rows[] = $row;
		    }

		    return $rows;
	    }

	    return false;

	}

	return false;
}




/*
* Here ajax call
*/

$filterDate = isset( $_GET["filterDate"] ) ? $_GET["filterDate"] : NULL ;
$filterUser = isset( $_GET["filterUser"] ) ? $_GET["filterUser"] : NULL ;
$filterTeam = isset( $_GET["filterTeam"] ) ? $_GET["filterTeam"] : NULL ;

$methodName = isset( $_GET["methodName"] ) ? $_GET["methodName"] : NULL ;
$isRecords 	= isset( $_GET["isRecords"] ) ? $_GET["isRecords"] : NULL ;

if( $methodName == "getEntitities" && $isRecords == "true" ) {
	
	// GET COUNTS - CONVERTED / NEW
	$response["status"] = "false";
	$response["msg"] 	= "Invalid Request!";
	$response["data"] 	= array();

	$resultData = getCounts( $dbConn, $isRecords, $filterDate, $filterUser, $filterTeam );

	if( !empty($resultData) ){

		$response["status"] = "true";
		$response["msg"] 	= "Success!";
		$response["data"] 	= array( "count" => $resultData );
	}else{
		$response["status"] = "true";
		$response["msg"] 	= "Success!";
		$response["data"] 	= array( "count" => 0 );
	}

	echo json_encode($response); 
	return true;

}
