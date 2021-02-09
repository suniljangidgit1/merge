<?php
session_start();

/*
* USERS TAB AJX CONTROLLER
* THIS IS AJAX CONTROLLER FOR USERS TAB AJAX REQUEST
* NOTE 	: * USERS TAB IN DASHBOARD IS ONLY FOR SUPER ADMIN OR ADMIN  
* NAME 	: userTabAjaxController.php 
*/


// FILES INCLUDES
require('dbConfig.php');
require('commonHelper.php');


// DEFINE GLOBAL VARIABLE
define("LOGIN", $_SESSION['Login']); // 


/* DOMAIN PLAN DETAILS */
function getDomainPlanDetails( $dbConn = array(), $isRecords = "", $filterDate = "", $filterUser = "", $filterTeam = "", $dbDetails = "" , $limitColumn = "" ){

	// Create connection for fincrm_web
	$webConn = mysqli_connect($dbDetails["servername"], $dbDetails["username"], $dbDetails["password"], $dbDetails["webdbname"]);

	// Check connection
	if (!$webConn) {
	  	die("Connection failed: " . mysqli_connect_error());
	}

	$helper 		= new Helper();
	$sessId 		= $helper->getUserIdByUsername(LOGIN);
	$userRole 		= $helper->getUserRole($sessId);
	$condition		= "";

	if( empty($sessId) || empty($userRole) || empty($dbConn) || empty($webConn) ) {
		return 0;
	}

	if( $isRecords == "false" ){

		$table 		= " `users` as u ";
		
		if( $limitColumn == "user" ){
			$select		= " pm.pUserLimit ";
		}else if( $limitColumn == "sms" ){
			$select		= " pm.pSmsLimit ";
		}else if( $limitColumn == "storage" ){
			$select		= " pm.pStorageLimit ";
		}else if( $limitColumn == "subscription" ){
			$select		= " pm.pName, rzom.startDate, rzom.endDate, pm.pUserLimit, pm.pSmsLimit, pm.pStorageLimit ";
		}else{
			$select		= " pm.pUserLimit, pm.pSmsLimit, pm.pStorageLimit ";
		}

		$where		= " u.u_domain_name = '".$dbDetails["dbname"]."' AND rzom.rzStatus = 'paid' ";
		
		$join 		= " INNER JOIN rz_order_master as rzom ON u.rz_om_id = rzom.id AND u.u_id = rzom.uId INNER JOIN plan_master as pm ON rzom.pId = pm.pId  "; 

		$query 		= " SELECT $select FROM $table $join WHERE $where ";
    	$result 	= mysqli_query($webConn, $query);

    	if( !empty($result) ){

    		$row = mysqli_fetch_assoc($result);

	    	if( $limitColumn == "user" ){
				return $count = isset( $row['pUserLimit'] ) ? $row['pUserLimit'] : 0;
			}else if( $limitColumn == "sms" ){
				return $count = isset( $row['pSmsLimit'] ) ? $row['pSmsLimit'] : 0;
			}else if( $limitColumn == "storage" ){
				return $count = isset( $row['pStorageLimit'] ) ? $row['pStorageLimit'] : 0;
			}else if( $limitColumn == "subscription" ){
				$row["startDate"] 	= date( "d-M-Y", strtotime( $row["startDate"] ) );
				$row["endDate"] 	= date( "d-M-Y", strtotime( $row["endDate"] ) );
				return $row;
			}else{
				return $count = 0;
			}
	    	
	    }

	    return 0;

	}

	return 0;

}

/* DOMAIN TOTAL USER COUNTS */
function getDomainTotalUsers( $dbConn = array(), $isRecords = "", $filterDate = "", $filterUser = "", $filterTeam = "" ){

	$helper 		= new Helper();
	$sessId 		= $helper->getUserIdByUsername(LOGIN);
	$userRole 		= $helper->getUserRole($sessId);
	$condition		= "";

	if( empty($sessId) || empty($userRole) || empty($dbConn) ) {
		return 0;
	}

	$table 		= " `user` as u";
	$where		= " u.id != 'system' AND deleted = '0' ";
	
	if( $isRecords == "false" ){

		$select		= " COUNT(u.id) as count ";
		$query 		= " SELECT $select FROM $table WHERE $where ";
    	$result 	= mysqli_query($dbConn, $query);

    	if( !empty($result) ){

	    	$row = mysqli_fetch_assoc($result);
	    	return $count = isset( $row['count'] ) ? $row['count'] : 0;
	    }

	    return 0;

	}

	return 0;

}


/* TO GET DOMAIN EXISTING SMS COUNT */
function getExistingDomainSmsCount( $dbConn = array() ) {

	$data = array();

	// GET TOTAL SMS REMINDER COUNT - NOT SEND
	$sql1 		= " SELECT COUNT(smsr.id) as count FROM s_m_s_reminder as smsr WHERE deleted = '0' ";
	$smsrRow 	= mysqli_query( $dbConn, $sql1 );
	$smsrData 	= mysqli_fetch_array( $smsrRow );
	$data["smsrCount"]  = isset( $smsrData["count"] ) ? $smsrData["count"] : 0 ;

	// GET TOTAL SMS REMINDER COUNT - SEND
	$sql2 		= " SELECT COUNT(ssmsr.id) as count FROM send_s_m_s_data as ssmsr ";
	$ssmsrRow 	= mysqli_query( $dbConn, $sql2 );
	$ssmsrData 	= mysqli_fetch_array( $ssmsrRow );
	$data["ssmsrCount"] = isset( $ssmsrData["count"] ) ? $ssmsrData["count"] : 0 ;

	// GET TOTAL BULK SMS REMINDER COUNT - NOT SEND
	$sql3 		= " SELECT SUM(sm.total_sent_sms) as sum FROM sent_messages as sm ";
	$smRow 		= mysqli_query( $dbConn, $sql3 );
	$smData 	= mysqli_fetch_array( $smRow );
	$data["smSum"] = isset( $smData["sum"] ) ? $smData["sum"] : 0 ;

	// GET TOTAL BULK SMS REMINDER COUNT - SEND
	$sql4 		= " SELECT SUM(cl.totalcontacts) as sum FROM my_campaigns as mc INNER JOIN contact_list as cl ON mc.list_id = cl.id WHERE mc.deleted = '0' ";
	$clRow 		= mysqli_query( $dbConn, $sql4 );
	$clData 	= mysqli_fetch_array( $clRow );
	$data["clSum"] = isset( $clData["sum"] ) ? $clData["sum"] : 0 ;

	// echo "<pre> getExistingDomainSmsCount called : ";print_r($data);die;
 	$exstingMsgCount = array_sum($data);
	return $exstingMsgCount;

}

/* TO GET DOMAIN EXISTING STORAGE COUNT */
function getExistingDomainStorageCount() {

	require_once($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3bucketfoldersize.php');
	$objS3buket = new S3bucketfoldersize();
	$existing 	= $objS3buket->FolderSize();
	return $new = $objS3buket->formatSizeUnits( (int) $existing , "GB" );
	
}

/* TO CONVERT CAMEL CASE TABLE NAME INTO DATBASE TABLE REQUIRED FORMAT  */
function convertEntityName( $entity = "" ) {

	return $isTable = strtolower( preg_replace('/\B([A-Z])/', '_$1', trim($entity) ) );

}

/* TO CONVERT NORMAL TABLE NAME */
function convertEntityNormalName( $entity = "" ) {

	return $isTable = preg_replace('/\B([A-Z])/', ' $1', trim($entity) );

}

/* TO CHECK WHETHER ENTITY IS EXISTS OR NOT */
function isEntityExists( $dbConn = array(), $entity = "" ) {

	$string 	= "";
	$tempEntity = convertEntityName( trim($entity) );

	$query 		= " show tables like '$tempEntity' ";
	$result 	= mysqli_query($dbConn, $query);

	if( !empty( $result->num_rows ) && $result->num_rows > 0 ) {
    	$string = $tempEntity;
    }

	return $string;

}

/* TO GET TOTAL ACTIVE RECORDS COUNT IN ENTITY */
function getActiveRecordsCount( $dbConn = array(), $entity = "" ) {

	$count 	= 0;
	$tempEntity = convertEntityName( trim($entity) );
	$tempEntity = strtolower( str_replace(" ", "_", $entity ) );

	$query 		= " SELECT COUNT(*) AS count FROM `$tempEntity` WHERE deleted = '0' ";
	$result 	= mysqli_query( $dbConn, $query );

	if( !empty( $result ) ) {
		$row 	= mysqli_fetch_assoc($result);
		$count 	= isset( $row['count'] ) ? $row['count'] : 0;
    }

	return $count;

}

/* TO SORT ARRAY BY GIVEN ARRAY */
function sortArrayByArray(array $requiredArr, array $tempArr) {
    
    $ordered 	= array();
    $ignoreArr 	= array();
    
    foreach ($tempArr as $key) {
        
        if (array_key_exists($key, $requiredArr)) {
            $ordered[$key] = $requiredArr[$key];
            unset($requiredArr[$key]);
        }else{

        	// IF NOT IN REQUIRED ARRAY
            if( !in_array($key, $requiredArr) ){
            	$ignoreArr[] = $key;
            }
        }
    }

    // ADD INGNORED VALUE IN ARRAY
    if( !empty($ignoreArr) ){
    	
    	foreach ($ignoreArr as $key => $value) {
    		$requiredArr[] = $value;
    	}

    }

    return $ordered + $requiredArr;

}

/* TO GET STRING FOR DISPLAY ENTITY NAME */
function entityTitleDisplay( $string ) {

    $finalString = "";
    $tempNew = explode(" ", $string);

    foreach ($tempNew as $key => $value) {
        
        if( ctype_upper($value) ) {
            $finalString .= $value;
        }else{
            $finalString .= " ".$value." ";
        }
    }

    $finalString = trim( preg_replace('!\s+!', ' ', $finalString) );

    return $finalString;
}

/* TO GET DOMAIN CRM ENTITY */
function getDomainEntitiesData( $dbConn, $dbDetails = array() ) {

	// $filePath = $_SERVER['DOCUMENT_ROOT']."/custom/Finnova/Custom/".$dbDetails["dbname"]."/Resources/metadata/entityDefs/Task.json";
	$filePath = $_SERVER['DOCUMENT_ROOT']."/data/".$dbDetails["dbname"]."_config.php";

	if( !empty($filePath) && file_exists($filePath) ){


	    $listArr    	= array();
	    $afterSortArr   = array();
		// $strJson    	= json_decode( file_get_contents($filePath), true); // CHANGE JSON FILE PATH 
		$strJson = require_once $filePath;
		// print_r($strJson);die;
		
		/*if( !empty($strJson['fields']['parent']['entityList']) ) {
			$enitityArr 	= $strJson['fields']['parent']['entityList'];
		}*/
		if( !empty($strJson['tabList']) ) {
			$enitityArr = $strJson['tabList'];
		}
		
		if( !empty($enitityArr) ) {

			/*$enitityArr[] = "Task";
			$enitityArr[] = "Meeting";
			$enitityArr[] = "Call";*/

		    $skipArr = array( "BillingEntity", "Designation","EmailReminder", "Estimate","Export", "ExportResult","Invoice", "MessageLog","NSICData", "OfficeLocation","Payments", "TestDemo","HolidayCalender");

		    /*foreach( $enitityArr as $key => $val ){

		    	// CHECK TABLE IS EXISTS OR NOT
		    	$isEntityExists = isEntityExists( $dbConn, trim($val) );

		    	// CHECK TABLE IS EXISTS OR NOT & NOT IN SKIPARR
		    	if( !in_array( $val, $skipArr ) && !empty( $isEntityExists ) ) {
		        	$entityName 	= convertEntityNormalName( $val ); 
		        	$entityCount 	= getActiveRecordsCount( $dbConn, trim($val) ); 
		        	$listArr[$val] 	= array ( "entityName" => $entityName, "entityTitle" => entityTitleDisplay($entityName), "entityCount" => $entityCount  );
		        	$listArrArr[] 		= $entityName; 
		        }
		    }*/

		    foreach( $enitityArr as $key => $val ){

		    	// CHECK TABLE IS EXISTS OR NOT
		    	$isEntityExists = isEntityExists( $dbConn, trim($val) );

		    	// CHECK TABLE IS EXISTS OR NOT & NOT IN SKIPARR
		    	if( !in_array( $val, $skipArr ) && !empty( $isEntityExists ) ) {
		        	$entityName 	= convertEntityNormalName( $val ); 
		        	$listArrArr[] 	= $entityName; 
		        }
		    }

		    // SORT ARRAY IN CUSTOM REQUIRED SEQUENCE
		    $requiredSortArr 	= array( "Account", "Contact", "Lead", "Opportunity", "Task", "Closed Task", "Case", "Meeting", "Call", "S M S Reminder", "Sent Messages", "Contact List", "My Campaigns", );

			$sortArr 			= sortArrayByArray( $requiredSortArr, $listArrArr );

		    foreach( $sortArr as $key1 => $val1 ){

	        	$entityName 	= convertEntityNormalName( $val1 ); 
	        	$entityCount 	= getActiveRecordsCount( $dbConn, trim($val1) ); 
	        	$afterSortArr[$val1] 	= array ( "entityName" => str_replace( " ", "", $entityName ), "entityTitle" => entityTitleDisplay($entityName), "entityCount" => $entityCount  ); 
		    }

		}

	}

	// echo "<pre>***";print_r($afterSortArr);die;
	return $afterSortArr;

}

/* TO GET DOMAIN CRM BRANCHES */
function getDomainBranchesData ( $dbConn, $dbDetails = array() ) {

	$officeArr  = array();
	$query 		= " SELECT id,name FROM `office_location` WHERE deleted = '0' ";
	$result 	= mysqli_query( $dbConn, $query );

	if( !empty( $result ) ) {
		
		$recordsArr = mysqli_fetch_all($result , MYSQLI_ASSOC);
		foreach ($recordsArr as $key => $value ) {

			// GET USER COUNT FOR OFFICE LOCATION
			$query1 	= " SELECT COUNT(id) AS count FROM `user` WHERE office_location_id = '".$value["id"]."' AND deleted = '0' ";
			$result1 	= mysqli_query( $dbConn, $query1 );
			$userCount 	= mysqli_fetch_assoc($result1);
			$count 		= isset( $userCount['count'] ) ? $userCount['count'] : 0;

			$officeArr[] = array( 'id' => $value['id'], 'name' => $value['name'], 'count' => $count );
		}
    }

	return $officeArr;
}

/* DOMAIN TOTAL USER TRANSACTION */
function getDomainUserTransaction( $dbConn = array(), $isRecords = "", $filterDate = "", $filterUser = "", $filterTeam = "", $dbDetails = "" ){

	// Create connection for fincrm_web
	$webConn = mysqli_connect($dbDetails["servername"], $dbDetails["username"], $dbDetails["password"], $dbDetails["webdbname"]);

	// Check connection
	if (!$webConn) {
	  	die("Connection failed: " . mysqli_connect_error());
	}

	$helper 		= new Helper();
	$sessId 		= $helper->getUserIdByUsername(LOGIN);
	$userRole 		= $helper->getUserRole($sessId);
	$condition		= "";

	if( empty($sessId) || empty($userRole) || empty($dbConn) || empty($webConn) ) {
		return 0;
	}

	if( $isRecords == "false" ){

		$table 		= " `rz_order_master` as rzom ";
		
		$select		= " rzom.requestType, rzom.id, rzom.uId, rzom.pId, pm.pSlug, rzom.rzPaymentId, rzom.rzOrderId, ( rzom.rzAmountPaid / 100 ) as rzAmountPaid, rzom.rzStatus, rzom.rzCreatedAt, DATE_FORMAT( rzom.createdAt, '%d %b, %Y') as createdAtDate, DATE_FORMAT( rzom.createdAt, '%l:%i %p' ) as createdAtTime, rzom.startDate, rzom.endDate ";
		
		$where		= " u.u_domain_name = '".$dbDetails["dbname"]."' AND rzom.rzStatus = 'Paid' ";
		
		$join 		= " INNER JOIN users as u ON rzom.uId = u.u_id  LEFT JOIN plan_master as pm ON rzom.pId = pm.pId ";

		$order 		= " ORDER BY rzom.createdAt DESC ";

		$query 		= " SELECT $select FROM $table $join WHERE $where $order ";
    	$result 	= mysqli_query($webConn, $query);

    	if( !empty($result) ){
    		return $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
	    }

	    return array();

	}

	return array();

}


/*
* HERE AJAX CALL
*/

$dbDetails = array(
	"servername" 	=> $servername,
	"username" 		=> $username,
	"password" 		=> $password,
	"dbname" 		=> $dbname,
	"webdbname" 	=> "fincrm_web",
);


$filterDate = isset( $_GET["filterDate"] ) ? $_GET["filterDate"] : NULL ;
$filterUser = isset( $_GET["filterUser"] ) ? $_GET["filterUser"] : NULL ;
$filterTeam = isset( $_GET["filterTeam"] ) ? $_GET["filterTeam"] : NULL ;
$methodName = isset( $_GET["methodName"] ) ? $_GET["methodName"] : NULL ;
$isRecords 	= isset( $_GET["isRecords"] ) ? $_GET["isRecords"] : NULL ;

/* TO GET DOMAIN USER DATA  */
if( $methodName == "getDomainUserData" && $isRecords == "false" ) {
	
	$response["status"] = "false";
	$response["msg"] 	= "Invalid Request!";
	$response["data"] 	= array();

	$usersLimitData 	= getDomainPlanDetails( $dbConn, $isRecords, $filterDate, $filterUser, $filterTeam, $dbDetails, $limitColumn = "user" );
	$userCountData 		= getDomainTotalUsers( $dbConn, $isRecords, $filterDate, $filterUser, $filterTeam );

	$response["status"] = "true";
	$response["msg"] 	= "Success!";
	$response["data"]["usersLimitData"] 	= isset($usersLimitData) ? $usersLimitData : 0 ;
	$response["data"]["userCountData"] 		= isset($userCountData) ? $userCountData : 0 ;
	$response["data"]["userDataPercentage"] = round( ( $response["data"]["userCountData"] / $response["data"]["usersLimitData"] ) * 100 );
	
	echo json_encode($response); 
	return true;

}

/* TO GET DOMAIN SMS DATA */
if( $methodName == "getDomainSmsData" && $isRecords == "false" ) {
	
	$response["status"] = "false";
	$response["msg"] 	= "Invalid Request!";
	$response["data"] 	= array();

	$smsLimitData 		= getDomainPlanDetails( $dbConn, $isRecords, $filterDate, $filterUser, $filterTeam, $dbDetails, $limitColumn = "sms" );
	$smsCountData 		= getExistingDomainSmsCount( $dbConn );

	$response["status"] = "true";
	$response["msg"] 	= "Success!";
	$response["data"]["smsLimitData"] 		= isset($smsLimitData) ? $smsLimitData : 0 ;
	$response["data"]["smsCountData"] 		= isset($smsCountData) ? $smsCountData : 0 ;
	$response["data"]["userDataPercentage"] = round( ( $response["data"]["smsCountData"] / $response["data"]["smsLimitData"] ) * 100 );
	
	echo json_encode($response); 
	return true;

}

/* TO GET DOMAIN STORAGE DATA */
if( $methodName == "getDomainStorageData" && $isRecords == "false" ) {
	
	$response["status"] = "false";
	$response["msg"] 	= "Invalid Request!";
	$response["data"] 	= array();

	$storageLimitData 		= getDomainPlanDetails( $dbConn, $isRecords, $filterDate, $filterUser, $filterTeam, $dbDetails, $limitColumn = "storage" );
	$storageCountData 		= getExistingDomainStorageCount();

	$response["status"] = "true";
	$response["msg"] 	= "Success!";
	$response["data"]["storageLimitData"] 		= isset($storageLimitData) ? $storageLimitData : 0 ;
	$response["data"]["storageCountData"] 		= isset($storageCountData) ? $storageCountData : 0 ;
	$response["data"]["userDataPercentage"] = round( ( $response["data"]["storageCountData"] / $response["data"]["storageLimitData"] ) * 100 );
	
	echo json_encode($response); 
	return true;

}

/* TO GET DOMAIN ENTITIES DATA */
if( $methodName == "getDomainEntitiesData" && $isRecords == "false" ) {
	
	$response["status"] = "false";
	$response["msg"] 	= "Invalid Request!";
	$response["data"] 	= "";
	$html 				= "";

	$entitiesData 		= getDomainEntitiesData( $dbConn, $dbDetails );

	if( !empty($entitiesData) ) {

		foreach ($entitiesData as $key => $value) {
			
			$html .= '<li data-id="" class="container list-group-item list-row">
                <div class="row">
                    <div class="col-xs-12 pl0">
                        <div class="pull-right right cell" data-name="buttons">
                            <div class="list-row-buttons btn-group pull-right">
                                
                            </div>
                        </div>
                        <div class="expanded-row expanded-assign">
                            <span class="cell task_data col-xs-5" data-name="name"><a href="#'.$value["entityName"].'" class="link" data-id="" title="Account" style="color:#283278;font-weight:600;">'.$value["entityTitle"].'</a>
                            </span>
                            <span class="cell task_data col-xs-5" data-name="status" style="padding-left: 15px;"><span class="text-default circles"><span>'.$value["entityCount"].'</span> Records</span>
                            </span>
                            </span>
                        </div>
                    </div>
                </div>
            </li>';
		}

		$response["status"] = "true";
		$response["msg"] 	= "Success!";
		$response["data"]	= $html ;
		
	}

	echo json_encode($response); 
	return true;

}

/* TO GET DOMAIN BRANCHES DATA */
if( $methodName == "getDomainBranchesData" && $isRecords == "false" ) {
	
	$response["status"] = "false";
	$response["msg"] 	= "Invalid Request!";
	$response["data"] 	= "";
	$html 				= "";

	$branchesData 		= getDomainBranchesData( $dbConn, $dbDetails );

	if( !empty($branchesData) ) {

		$url 	= "http://".$_SERVER["HTTP_HOST"]."#OfficeLocation/view/";

		foreach ($branchesData as $key => $value) {
			
			$html .= '<li data-id="" class="container list-group-item list-row">
                <div class="row">
               		 <div class="col-xs-12 pl0">
                        <div class="pull-right right cell" data-name="buttons">
                            <div class="list-row-buttons btn-group pull-right">
                                
                            </div>
                        </div>
                        <div class="expanded-row expanded-assign">
                        	<span class="cell task_data col-xs-5" data-name="name">
                                <a href="'.$url.$value["id"].'" class="link" data-id="" title="Account" style="color:#283278;font-weight:600;">'.$value["name"].'</a>
                            </span>
                            <span class="cell task_data col-xs-5" data-name="status" style="padding-left: 15px;">
                                <span class="text-default circles"><span>'.$value["count"].'</span> Users</span>
                            </span>
                        </div>
                    </div>
                </div>
            </li>';
		}

		$response["status"] = "true";
		$response["msg"] 	= "Success!";
		$response["data"]	= $html ;
		
	}

	echo json_encode($response); 
	return true;

}

/* TO GET DOMAIN SUBSCRIPTION DATA  */
if( $methodName == "getDomainSubscriptionData" && $isRecords == "false" ) {
	
	$response["status"] = "false";
	$response["msg"] 	= "Invalid Request!";
	$response["data"] 	= array();

	$subscriptionDetails = getDomainPlanDetails( $dbConn, $isRecords, $filterDate, $filterUser, $filterTeam, $dbDetails, $limitColumn = "subscription" );

	if( !empty($subscriptionDetails) ) {
		$response["status"] = "true";
		$response["msg"] 	= "Success!";
		$response["data"]   = $subscriptionDetails;
	}
	
	echo json_encode($response); 
	return true;

}

/* TO GET DOMAIN SUBSCRIPTION DATA  */
if( $methodName == "getDomainTransactionData" && $isRecords == "false" ) {
	
	$response["status"] = "false";
	$response["msg"] 	= "Invalid Request!";
	$response["data"] 	= array();
	$html 				= "";

	$subscriptionDetails = getDomainUserTransaction( $dbConn, $isRecords, $filterDate, $filterUser, $filterTeam, $dbDetails );
	// echo "<pre>";print_r($subscriptionDetails);die;


	if( !empty($subscriptionDetails) ) {

		$prePaymentDate 	= date( 'd M Y' , strtotime( "-7 days", strtotime($subscriptionDetails[0]["createdAtDate"]) ) );
		$prePaymentAmount 	= $subscriptionDetails[0]["rzAmountPaid"];
		$prePaymentPlanId 	= $subscriptionDetails[0]["pId"];
		
		$prePaymentExt 		= explode( ".", $_SERVER["HTTP_HOST"] );

		if( $prePaymentExt[1] == "fincrm" ){
			$prePaymentUrl 		= $_SERVER['REQUEST_SCHEME']."://fincrm.".$prePaymentExt[2]."/pre-payment/".base64_encode( $dbDetails['dbname'] )."/".$subscriptionDetails[0]['pId']."/".base64_encode($subscriptionDetails[0]["pSlug"]);
		}else{
			$prePaymentUrl 		= $_SERVER['REQUEST_SCHEME']."://fincrm_web.".$prePaymentExt[2]."/pre-payment/".base64_encode( $dbDetails['dbname'] )."/".$subscriptionDetails[0]['pId']."/".base64_encode($subscriptionDetails[0]["pSlug"]);
		}

		$currDate 			= strtotime( date("d-m-Y") );
		$notifyDate 		= strtotime( "-7 days", strtotime( $subscriptionDetails[0]["endDate"] ) ) ;
		
		if( $currDate >= $notifyDate && $subscriptionDetails[0]["requestType"] == "razorpay" ) {

			$html .= '<div class="step">
	                <span>'.$prePaymentDate.'</span>
	                <li data-id="" class="container list-group-item list-row">
	                    <div class="row">
	                        <div class="col-xs-12 pl0">
	                            <div class="expanded-row expanded-header">
	                                <span class="cell task_data col-xs-6" data-name="name"><a href="javascript:void(0);" class="link" data-id="" title="Bill Pay">Bill Pay</a>
	                                </span>
	                                <span class="cell task_data col-xs-5 pull-right"><span class="link ml5" data-id=""></span></span>
	                                </span>
	                            </div>
	                            <div class="expanded-row expanded-cost">
	                                <span class="cell task_data col-xs-10"><span>₹ '.$prePaymentAmount.'</span>
	                                </span>
	                            </div>
	                            <div class="expanded-row expanded-assign">
	                                <a href="'.$prePaymentUrl.'" target="_blank" >
	                                	<span class="cell task_data col-xs-5 pull-right text-right text-uppercase mr5">Pay</span>
	                            	</a>
	                            </div>
	                        </div>
	                    </div>
	                </li>
	            </div>';

		}



		foreach ($subscriptionDetails as $key => $value) {
			
			if( $value["requestType"] == "razorpay" ) {
				$viewReceipt = '<div class="expanded-row expanded-assign">
                                <a class="viewPaymentReceipt" href="#" data-pid = '.$value["rzPaymentId"].'  data-oid = '.$value["rzOrderId"].' ><span class="cell task_data col-xs-5 pull-right text-right text-uppercase mr5">
                                View Receipt
                                </span></a>
                            </div>';
			}else{
				$viewReceipt = '<div class="expanded-row expanded-assign">
                                <a class="viewPaymentReceipt" href="#" ><span class="cell task_data col-xs-5 pull-right text-right text-uppercase mr5">
                                
                                </span></a>
                            </div>';
			}

			$html .= '<div class="step">
                <span>'.$value["createdAtDate"].'</span>
                <li data-id="" class="container list-group-item list-row">
                    <div class="row">
                        <div class="col-xs-12 pl0">
                            <div class="expanded-row expanded-header">
                                <span class="cell task_data col-xs-6" data-name="name"><a href="" class="link" data-id="" title="Bill Paid">Bill Paid</a>
                                </span>
                                <span class="cell task_data col-xs-5 pull-right"><span class="link ml5" data-id="">'.$value["createdAtDate"].'&nbsp;<span>'.$value["createdAtTime"].'</span></span>
                                </span>
                            </div>
                            <div class="expanded-row expanded-cost">
                                <span class="cell task_data col-xs-10"><span>₹ '.$value["rzAmountPaid"].'</span>
                                </span>
                            </div>
                            '.$viewReceipt.'
                        </div>
                    </div>
                </li>
            </div>';

		}

		// echo "<pre>";print_r($html);die;

		$response["status"] = "true";
		$response["msg"] 	= "Success!";
		$response["data"]   = $html;
	}
	
	echo json_encode($response); 
	return true;

}

/* TO GET DOMAIN SUBSCRIPTION DETAILS DATA  */
if( $methodName == "getDomainTransactionDetailsData" && $isRecords == "false" ) {
	
	$response["status"] = "false";
	$response["msg"] 	= "Invalid Request!";
	$response["data"] 	= array();
	$html 				= "";

	// RAZORPAY 

	require_once("../../../../task_cron/razorpay-php/Razorpay_connect.php");
	$paymentObj 	= new Razorpay_connect();
	$pid 			= isset( $_GET["pid"] ) ? $_GET["pid"] : NULL ;
	$paymentDetails = $paymentObj->getPaymentDetails( $pid );
	// echo "<br><pre>Controller : ";print_r( $paymentDetails );die;
	
	// RAZORPAY 

	if( !empty($paymentDetails) ) {
		
		$methodType = "";
		if( $paymentDetails["bank"] != "" ) {
			$methodType = ucfirst($paymentDetails["bank"]);
		}else if( $paymentDetails["wallet"] != "" ) {
			$methodType = ucfirst($paymentDetails["bank"]);
		}else if( $paymentDetails["card_id"] != "" ) {
			$methodType = ucfirst($paymentDetails["card_id"]);
		}

		$amount 		= $paymentDetails["amount"]/100;
		$paymentMethod 	= ucfirst($paymentDetails["method"]).' '.$methodType;
		$status 		= ( $paymentDetails["captured"] == 1 ) ? "Captured" : "---";
		$createdOn 		= date( "d M Y, H:i:s A", $paymentDetails["created_at"] );


		$html .= ' <div class="PaymentDetails" > 
			<div class="row" >
				<div class="col-sm-12">

					<div class="printPaymentDetails">
						<table class="table"> 
							<tbody>
								<tr>
									<td>Payment Id</td>
									<td>'.$paymentDetails["id"].'</td>
								</tr>
								<tr>
									<td>Order Id</td>
									<td>'.$paymentDetails["order_id"].'</td>
								</tr>
								
								<tr>
									<td>Amount</td>
									<td>'.$amount.'</td>
								</tr>
								<tr>
									<td>Payment Method</td>
									<td>'.$paymentMethod.'</td>
								</tr>
								<tr>
									<td>Status</td>
									<td>'.$status.'</td>
								</tr>
								<tr>
									<td>Plan</td>
									<td>'.$paymentDetails["description"].'</td>
								</tr>
								<tr>
									<td>Email</td>
									<td>'.$paymentDetails["email"].'</td>
								</tr>
								<tr>
									<td>Contact No</td>
									<td>'.$paymentDetails["contact"].'</td>
								</tr>
								<tr>
									<td>Address</td>
									<td>'.$paymentDetails["notes"]["address"].'</td>
								</tr>
								<tr>
									<td>Create On</td>
									<td>'.$createdOn.'</td>
								</tr>
							</tbody>
						</table>
						<br>
					</div>
					<div class="" style="text-align:left">
						<button class="btn btn-primary printBtn" > Print </button>
					</div>

				</div>
			</div>
		</div>';

		// echo "<pre>";print_r($html);die;

		$response["status"] = "true";
		$response["msg"] 	= "Success!";
		$response["data"]   = $html;
	}
	
	echo json_encode($response); 
	return true;

}
