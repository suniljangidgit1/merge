<?php 

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

/* To get domain user limit */
function getDomainUserLimit( $servername, $username, $password, $dbname ) {

	$dbWebName		= "fincrm_web"; // CHANGE DATBASE IF FINCRM WEBSITE DB NAME CHANGED
	
	$connWeb 		= mysqli_connect($servername, $username, $password , $dbWebName);
	if (!$connWeb) {
	  	die("Connection failed: " . mysqli_connect_error());
	}

	// To get domain user limit as per plan
	$sql = "
		SELECT u.u_id,rzom.id,pm.pId,pm.pUserLimit FROM users as u 
		INNER JOIN rz_order_master as rzom ON u.rz_om_id = rzom.id AND u.u_id = rzom.uId
		INNER JOIN plan_master as pm ON rzom.pId = pm.pId
		WHERE u.u_domain_name = '".trim($dbname)."' ";
	
	$res 		= mysqli_query($connWeb, $sql);
    $row 		= mysqli_fetch_array($res); 
 	// echo "<pre>";print_r($row);
 	return $count = isset( $row["pUserLimit"] ) ? $row["pUserLimit"] : 0 ;

}

/* To check whether domain user limit is exceeded or not */
function restrictDomainUser( $conn, $servername, $username, $password, $dbname ) {

	// Result  : TRUE => limit not exceeded | FALSE => limit exceeded
	$res 		= mysqli_query($conn, " SELECT COUNT(*) as count FROM user WHERE id != 'system' AND deleted != '1' ");

    $row 		= mysqli_fetch_array($res); 

    if( !empty($row['count']) ){

    	$userLimit = getDomainUserLimit( $servername, $username, $password, $dbname );
		
    	if( ( $row['count'] + 1 ) > $userLimit ){
    		return false;
    	}else{
    		return true;
    	} 

    }

    return false;

}

// ========================================================================================

$data["status"] = "false";
$data["msg"] 	= "Invalid Request!!";
$data["data"] 	= array();

$restriction = isset( $_GET["restriction"] ) ? $_GET["restriction"] : "";

if( !empty($restriction) && $restriction == "domain" ) {
	
	$isExceeded = restrictDomainUser( $conn, $servername, $username, $password, $dbname );
	if( !$isExceeded ){
		// restrict to add user
		$data["status"] = "false";
		$data["msg"] 	= "Your user limit has expired. Please contact admin if you wish to add more user.";
	}else{
		// user can create new users
		$data["status"] = "true";
		$data["msg"] 	= "";
	} 
}

echo json_encode($data);
return true;die;
