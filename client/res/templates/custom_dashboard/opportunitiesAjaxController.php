
<?php
session_start();
/*
* OPPORTUNITIES TAB AJAX CONTROLLER
* THIS IS AJAX CONTROLLER FOR OPPORTUNITIES TAB AJAX REQUEST
* NAME 	: opportunitiesAjaxController.php 
*/


// FILES INCLUDES
require('dbConfig.php');
require('commonHelper.php');


// DEFINE GLOBAL VARIABLE
define("LOGIN", $_SESSION['Login']);


/*
* To get todays call
* @param 	- (array) $dbConn 
* @param 	- (bool) $isRecords 
* @param 	- (string) $stage 
* @param 	- (string) $filterDate 
* @param 	- (string) $filterUser 
* @param 	- (string) $filterTeam 
* @return 	- (bool/array)
*/

function getOpportunities( $dbConn = array(), $isRecords = false ,$filterUser = "", $filterTeam = "" , $filterDate = "" , $stage = ""){
	
	$response["status"] = "false";
	$response["msg"] 	= "Invalid Request!";
	$response["data"] 	= array();

	// create helper object
	$helper 		= new Helper();
	$sessId 		= $helper->getUserIdByUsername(LOGIN);
	$userRole 		= $helper->getUserRole($sessId);
	$condition		= "";
	
	if( empty($sessId) || empty($userRole) ) {
		return $response;
	}

	if( empty($dbConn) ){
		$response["msg"] 	= "Database Connection Failed!";
	}


	if(!empty($filterDate)){
		
		$reportrange= trim(str_replace(" - ", ",", $filterDate));
		$rangeArr	= explode(",", $reportrange);
		$rangeArr[0]	= trim( str_replace("/", "-", $rangeArr[0]) );
		$rangeArr[1]	= trim( str_replace("/", "-", $rangeArr[1]) );
		$startDate	= trim( date("Y-m-d", strtotime($rangeArr[0]) ) );
		$endDate	= trim( date("Y-m-d", strtotime($rangeArr[1]) ) );

		$condition .= " AND ( DATE(o.created_at) BETWEEN '$startDate' AND '$endDate' ) ";
	}
         
	if( !empty($filterUser) ){
		$condition .= " AND ( o.assigned_user_id = '$filterUser' ) ";
	} else {
		if( !empty($filterTeam) ){
	    	$condition .= " AND ( o.assigned_user_id IN ( SELECT id FROM user WHERE default_team_id ='$filterTeam' ) ) ";
		}else{
	        $condition .= " AND ( o.assigned_user_id = '$sessId' ) ";
		}
	}

	if( !empty($stage) ){
		$condition .= " AND ( o.stage = '$stage' ) ";
	}
		
	if( empty($isRecords) ){

		$table 		= "`opportunity` as o";
		$select		= "COUNT(id) as count";
		$where		= "o.deleted = '0' $condition ";
        
		$query 		= "SELECT $select FROM $table WHERE $where";
    	$result 	= mysqli_query($dbConn, $query);
    	if( !empty($result) ){

	    	$row 	= mysqli_fetch_assoc($result);
	    	$count 	= isset( $row['count'] ) ? $row['count'] : 0;

	    	$response["status"] = "true";
			$response["msg"] 	= "Success!";
			$response["data"] 	= array("count" => $count );
	    }
     
	}else{

		$table 		= "`opportunity` as o";
		$select		= " o.id, o.name, o.stage, CONCAT(u.first_name,' ',u.last_name) as assigned_user, DATE_FORMAT(o.created_at, '%d %b %Y' ) as created_at , DATE_FORMAT(o.close_date, '%d %b %Y' ) as close_date ";
		$where		= "o.deleted = '0' $condition ";
		$join 		= " INNER JOIN user as u ON u.id = o.assigned_user_id ";
		$join1 		= " INNER JOIN user as u1 ON u1.id = o.created_by_id ";
		$orderBy 	= " ORDER BY o.created_at ASC ";

		$query 		= "SELECT $select FROM $table $join $join1 WHERE $where $orderBy";
		
    	$result 	= mysqli_query($dbConn, $query);
    	if( !empty($result) ){

	    	$rows 	= array();
	    	while( $row = mysqli_fetch_assoc($result) ) {
		        $rows[] = $row;
		    }

	    	$response["status"] = "true";
			$response["msg"] 	= "Success!";
			$response["data"] 	= array( $rows );
	    }

	}

	return $response;
}

/*
* To get record close in this month
* @param 	- (array) $dbConn 
* @param 	- (bool) $isRecords 
* @param 	- (string) $filterUser 
* @param 	- (string) $filterTeam 
* @return 	- (bool/array)
*/

function getClosingThisMonthRecords( $dbConn = array(), $isRecords = true ,$filterUser = "", $filterTeam = ""){
	
	$response["status"] = "false";
	$response["msg"] 	= "Invalid Request!";
	$response["data"] 	= array();

	// create helper object
	$helper 		= new Helper();
	$sessId 		= $helper->getUserIdByUsername(LOGIN);
	$userRole 		= $helper->getUserRole($sessId);
	$condition		= "";
	
	if( empty($sessId) || empty($userRole) ) {
		return $response;
	}

	if( empty($dbConn) ){
		$response["msg"] 	= "Database Connection Failed!";
	}

	if( !empty($filterUser) ){
		$condition .= " AND ( o.assigned_user_id = '$filterUser' ) ";
	} else {
		if( !empty($filterTeam) ){
	    	$condition .= " AND ( o.assigned_user_id IN ( SELECT id FROM user WHERE default_team_id ='$filterTeam' ) ) ";
		}else{
	        $condition .= " AND ( o.assigned_user_id = '$sessId' ) ";
		}
	}
        $current_month = DATE('m');
		$table 		= "`opportunity` as o";
		$select		= " o.id, o.name, o.stage, o.account_id, o.amount, o.amount_currency ,a.name as account, CONCAT(u.first_name,' ',u.last_name) as assigned_user, DATE_FORMAT(o.created_at, '%d %b %Y' ) as created_at , CONCAT(u1.first_name,' ',u1.last_name) as assigned_from ";
		$where		= "o.deleted = '0' AND DATE_FORMAT(o.close_date,'%m') = $current_month $condition ";
		$join 		= " INNER JOIN user as u ON u.id = o.assigned_user_id ";
		$join1 		= " INNER JOIN user as u1 ON u1.id = o.created_by_id ";
		$join2 		= " INNER JOIN account as a ON o.account_id = a.id ";
		$orderBy 	= " ORDER BY o.created_at ASC ";
         
		$query 		= "SELECT $select FROM $table $join $join1 $join2 WHERE $where $orderBy";
		
		// print_r(DATE('m'));
    	$result 	= mysqli_query($dbConn, $query);
    	if( !empty($result) ){

	    	$rows 	= array();
	    	while( $row = mysqli_fetch_assoc($result) ) {
		        $rows[] = $row;
		    }

	    	$response["status"] = "true";
			$response["msg"] 	= "Success!";
			$response["data"] 	= array( $rows );
	    }


	return $response;
}


/*
* To get monthly income
* @param 	- (array) $dbConn 
* @param 	- (bool) $isRecords 
* @param 	- (string) $filterUser 
* @param 	- (string) $filterTeam 
* @return 	- (bool/array)
*/
function getMonthlyIncome( $dbConn = array(), $isRecords = true ,$filterUser = "", $filterTeam = ""){
	
	$response["status"] = "false";
	$response["msg"] 	= "Invalid Request!";
	$response["data"] 	= array();

	// create helper object
	$helper 		= new Helper();
	$sessId 		= $helper->getUserIdByUsername(LOGIN);
	$userRole 		= $helper->getUserRole($sessId);
	$condition		= "";
	
	if( empty($sessId) || empty($userRole) ) {
		return $response;
	}

	if( empty($dbConn) ){
		$response["msg"] 	= "Database Connection Failed!";
	}

	if( !empty($filterUser) ){
		$condition .= " AND ( o.assigned_user_id = '$filterUser' ) ";
	} else {
		if( !empty($filterTeam) ){
	    	$condition .= " AND ( o.assigned_user_id IN ( SELECT id FROM user WHERE default_team_id ='$filterTeam' ) ) ";
		}else{
	        $condition .= " AND o.assigned_user_id = '$sessId'";
		}
	}
      
		$current_year = DATE('Y');
		$table 		= "`opportunity` as o";
		$select		= "month(o.close_date) as month, sum(o.amount) as value";
		$where		= "o.deleted = '0' AND year(o.close_date) = '".$current_year."' $condition ";
		$query 		= "select $select from opportunity as o where $where group by year(o.close_date),month(o.close_date) order by year(o.close_date),month(o.close_date)";
		

    	$result 	= mysqli_query($dbConn, $query);
            $month[] 	= "01";
			$month[] 	= "02";
			$month[] 	= "03";
			$month[] 	= "04";
			$month[] 	= "05";
			$month[] 	= "06";
			$month[] 	= "07";
			$month[] 	= "08";
			$month[] 	= "09";
			$month[] 	= "10";
			$month[] 	= "11";
			$month[] 	= "12";
            
            $year 		= Date("Y");
    	if( !empty($result) ){

	    	$rows 	= array();
	    	while( $row = mysqli_fetch_assoc($result) ) {
		        $rows[] = $row;
		    }
             
		    $row_month = array_column($rows,'month');

            foreach ($month as $value) {
            	$monthindex   = array_search($value,$row_month);
         
            if ($monthindex === false) {
		       $response["value"][] 	= array( 'month' => $year.'-'.$value.'-01' , 'value' =>'0');
	        } else{
		       $response["value"][] 	= array( 'month' => $year.'-'.$value.'-01' , 'value' => ($rows[$monthindex]["value"]/100000));
	        }

            }

	    	$response["year"] = $year;
	    	$response["status"] = "true";
			$response["msg"] 	= "Success!";
			
	    }

	return $response;
}

/*
* To get income opportunity stage wise
* @param 	- (array) $dbConn 
* @param 	- (bool) $isRecords 
* @param 	- (string) $filterUser 
* @param 	- (string) $filterTeam 
* @param 	- (string) $filterDate 
* @return 	- (bool/array)
*/
function getOpportunityStageWiseIncome( $dbConn = array(), $isRecords = true ,$filterUser = "", $filterTeam = "",$filterDate = ""){
	
	$response["status"] = "false";
	$response["msg"] 	= "Invalid Request!";
	$response["data"] 	= array();

	// create helper object
	$helper 		= new Helper();
	$sessId 		= $helper->getUserIdByUsername(LOGIN);
	$userRole 		= $helper->getUserRole($sessId);
	$condition		= "";
	
	if( empty($sessId) || empty($userRole) ) {
		return $response;
	}

	if( empty($dbConn) ){
		$response["msg"] 	= "Database Connection Failed!";
	}

	if(!empty($filterDate)){
		
		$reportrange= trim(str_replace(" - ", ",", $filterDate));
		$rangeArr	= explode(",", $reportrange);
		$rangeArr[0]	= trim( str_replace("/", "-", $rangeArr[0]) );
		$rangeArr[1]	= trim( str_replace("/", "-", $rangeArr[1]) );
		$startDate	= trim( date("Y-m-d", strtotime($rangeArr[0]) ) );
		$endDate	= trim( date("Y-m-d", strtotime($rangeArr[1]) ) );

		$condition .= "AND ( DATE(o.created_at) BETWEEN '$startDate' AND '$endDate' ) ";
	}

	if( !empty($filterUser) ){
		$condition .= "AND ( o.assigned_user_id = '$filterUser' ) ";
	} else {
		if( !empty($filterTeam) ){
	    	$condition .= "AND ( o.assigned_user_id IN ( SELECT id FROM user WHERE default_team_id ='$filterTeam' ) ) ";
		}else{
	        $condition .= "AND o.assigned_user_id = '$sessId'";
		}
	}
      
		$table 		= "`opportunity` as o";
		$select		= "o.stage as country, sum(o.amount) as back";
		$where		= "o.deleted = '0' AND o.stage !='Closed Lost' $condition ";
		$query 		= "select $select from opportunity as o where $where group by o.stage order by o.stage";
	
    	$result 	= mysqli_query($dbConn, $query);
            $stage[] 	= "Unqualified";
			$stage[] 	= "Qualified";
			$stage[] 	= "Proposal";
			$stage[] 	= "Negotiation";
			$stage[] 	= "Closed Won";
			
            
    	if( !empty($result) ){

	    	$rows 	= array();
	    	while( $row = mysqli_fetch_assoc($result) ) {
		        $rows[] = $row;
		    }

		    $row_stage = array_column($rows,'country');

            foreach ($stage as $value) {
            	$monthindex   = array_search($value,$row_stage);
         
            if ($monthindex === false) {
		       $response["value"][] 	= array( 'country' => $value , 'back' =>'0');
	        } else{
		       $response["value"][] 	= array( 'country' => $value , 'back' => ($rows[$monthindex]["back"]/100000));
	        }

            }

	    	$response["status"] = "true";
			$response["msg"] 	= "Success!";
			
	    }
        
	return $response;
}

/*
* To get count of each leadSource
* @param 	- (array) $dbConn 
* @param 	- (bool) $isRecords 
* @param 	- (string) $filterUser 
* @param 	- (string) $filterTeam 
* @param 	- (string) $filterDate 
* @return 	- (bool/array)
*/
function getEachLeadSourceCount( $dbConn = array(), $isRecords = true ,$filterUser = "", $filterTeam = "",$filterDate = ""){
	
	$response["status"] = "false";
	$response["msg"] 	= "Invalid Request!";
	$response["data"] 	= array();

	// create helper object
	$helper 		= new Helper();
	$sessId 		= $helper->getUserIdByUsername(LOGIN);
	$userRole 		= $helper->getUserRole($sessId);
	$condition		= "";
	
	if( empty($sessId) || empty($userRole) ) {
		return $response;
	}

	if( empty($dbConn) ){
		$response["msg"] 	= "Database Connection Failed!";
	}

	if(!empty($filterDate)){
		
		$reportrange= trim(str_replace(" - ", ",", $filterDate));
		$rangeArr	= explode(",", $reportrange);
		$rangeArr[0]	= trim( str_replace("/", "-", $rangeArr[0]) );
		$rangeArr[1]	= trim( str_replace("/", "-", $rangeArr[1]) );
		$startDate	= trim( date("Y-m-d", strtotime($rangeArr[0]) ) );
		$endDate	= trim( date("Y-m-d", strtotime($rangeArr[1]) ) );

		$condition .= "AND ( DATE(o.created_at) BETWEEN '$startDate' AND '$endDate' ) ";
	}

	if( !empty($filterUser) ){
		$condition .= "AND ( o.assigned_user_id = '$filterUser' ) ";
	} else {
		if( !empty($filterTeam) ){
	    	$condition .= "AND ( o.assigned_user_id IN ( SELECT id FROM user WHERE default_team_id ='$filterTeam' ) ) ";
		}else{
	        $condition .= "AND o.assigned_user_id = '$sessId'";
		}
	}
      
		$table 		= "`opportunity` as o";
		$select		= "o.lead_source as country, count(o.lead_source) as litres";
		$where		= "o.deleted = '0' $condition ";
		$query 		= "select $select from opportunity as o where $where group by o.lead_source order by o.lead_source";
	    
    	$result 	= mysqli_query($dbConn, $query);
            $lead_source[] 	= "Call";
			$lead_source[] 	= "Email";
			$lead_source[] 	= "Existing Customer";
			$lead_source[] 	= "Partner";
			$lead_source[] 	= "Public Relations";
			$lead_source[] 	= "Web Site";
			$lead_source[] 	= "Campaign";
			$lead_source[] 	= "Other";
            
    	if( !empty($result) ){

	    	$rows 	= array();
	    	while( $row = mysqli_fetch_assoc($result) ) {
		        $rows[] = $row;
		    }

		    $row_stage = array_column($rows,'country');

            foreach ($lead_source as $value) {
            	$monthindex   = array_search($value,$row_stage);
         
            if ($monthindex === false) {
		       $response["value"][] 	= array( 'country' => $value , 'litres' =>'0');
	        } else{
		       $response["value"][] 	= array( 'country' => $value , 'litres' => $rows[$monthindex]["litres"]);
	        }

            }

	    	$response["status"] = "true";
			$response["msg"] 	= "Success!";

			if(count($rows) == 0)
			{
			  $response["hide"] = "false";
			}
	    }
	return $response;
	   
}




/*
* Here ajax call
*/

$methodName = isset( $_GET["methodName"] ) ? $_GET["methodName"] : NULL ;
$parameters = isset( $_GET["parameters"] ) ? $_GET["parameters"] : NULL ;
$filterUser = isset( $_GET["filterUser"] ) ? $_GET["filterUser"] : NULL ;
$filterTeam = isset( $_GET["filterTeam"] ) ? $_GET["filterTeam"] : NULL ;
$filterDate = isset( $_GET["filterDate"] ) ? $_GET["filterDate"] : NULL ;
$stage 	    = isset( $_GET["stage"] ) ? $_GET["stage"] : NULL ;

// ############## OPPORTUNITIES COUNT PANEL ##############

if( $methodName == "getOpportunities" && $parameters == "false" && ( $stage == "Closed Won" || $stage == "Closed Lost" || $stage == "Unqualified" ) ) {
	
	// GET COUNTS 
	$response = getOpportunities( $dbConn, $isRecords = false ,$filterUser, $filterTeam , $filterDate , $stage );
	echo json_encode($response); 
	return true;

} else if( $methodName == "getOpportunities" && $parameters == "true" && ( $stage == "Closed Won" || $stage == "Closed Lost" || $stage == "Unqualified" ) ) {
	
	// GET COUNTS
	$response = getOpportunities( $dbConn, $isRecords = true , $filterUser, $filterTeam , $filterDate , $stage);
	$html 		= "";
	if( !empty($response["status"]) && $response["status"] == "true" && !empty($response["data"]) ){
		if( !empty($response["data"][0]) ) {

			$url = "http://".$_SERVER["HTTP_HOST"]."#Opportunity/view/";
			$Sr_No = 1;
			foreach ($response["data"][0] as $key => $value) {
				$html .= '<tr>
						<td>'.$Sr_No.'</td>
						<td><a class="close-modal" href="'.$url.$value["id"].'" >'.$value["name"].' </a> </td>
						<td>'.$value["assigned_user"].'</td>
						<td>'.$value["stage"].'</td>
						<td>'.$value["created_at"].'</td>
					</tr>';
				$Sr_No++;

			}
		}else{
			$html .="";
		}
	}
	$response["data"]["html"] = $html;
	unset($response["data"][0]);
	echo json_encode($response); 
	return true;


    } else if( $methodName == "getClosingThisMonthRecords" && $parameters == "true" ) {
	
	// GET COUNTS
	$response = getClosingThisMonthRecords( $dbConn, $isRecords = true , $filterUser, $filterTeam);
	$html 		= "";
	if( !empty($response["status"]) && $response["status"] == "true" && !empty($response["data"]) ){
		if( !empty($response["data"][0]) ) {

			$url = "http://".$_SERVER["HTTP_HOST"]."#Opportunity/view/";
			$accountUrl = "http://".$_SERVER["HTTP_HOST"]."#Account/view/";
			foreach ($response["data"][0] as $key => $value) {
				$html .= '<li data-id="" class="container list-group-item list-row">
            <div class="row">
               <div class="col-xs-12 pl0">
                  <div class="pull-right right cell" data-name="buttons">
                     <div class="list-row-buttons btn-group pull-right">
                        <button type="button" class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu pull-right">
                           <li><a href="" class="action" data-action="quickView" data-id="">View</a></li>
                           <li><a href="" class="action" data-action="quickEdit" data-id="">Edit</a></li>
                           <li><a href="javascript:" class="action" data-action="setCompleted" data-id="">Complete</a></li>
                           <li><a href="javascript:" class="action" data-action="quickRemove" data-id="" data-scope="Task">Remove</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="expanded-row expanded-header">
                     <span class="cell task_data col-xs-6" data-name="name"><a href="'.$url.$value['id'].'" class="link" data-id="" title="Lorem Ipsum Opportunity">'.$value["name"].'</a>
                     </span>
                     <span class="cell task_data col-xs-5 pull-right" data-name="name"><a href="'.$accountUrl.$value['account_id'].'" class="link ml5" data-id="" title="'.$value["account"].'">'.$value["account"].'</a>
                     </span>
                  </div>
                  <div class="expanded-row expanded-cost">
                     <span class="cell task_data col-xs-10"><span>'.$value["amount"].' '.$value["amount_currency"].'</span>
                     </span>
                  </div>
                  <div class="expanded-row expanded-assign">
                     <span class="cell task_data col-xs-6" data-name="status"><span class="text-default">Assigned From '.$value["assigned_from"].'</span>
                     </span>
                     <span class="cell task_data col-xs-5 pull-right mr5" data-name="dateEnd">
                     Added '.$value["created_at"].'
                     </span>
                  </div>
               </div>
            </div>
         </li>';
			}
		}else{
			$html .= '<li data-id="" class="container list-group-item list-row" style="font-size:14px !important;">No Data
				</li>';
		}
	}
	$response["data"]["html"] = $html;
	unset($response["data"][0]);
	echo json_encode($response); 
	return true;


    }else if( $methodName == "getMonthlyIncome" && $parameters == "true" ) {
	
	// GET COUNTS 
	$response = getMonthlyIncome( $dbConn, $isRecords = true ,$filterUser, $filterTeam);
	echo json_encode($response); 
	return true;

    }else if( $methodName == "getOpportunityStageWiseIncome" && $parameters == "true" ) {
	
	// GET COUNTS 
	$response = getOpportunityStageWiseIncome( $dbConn, $isRecords = true ,$filterUser, $filterTeam, $filterDate);
	echo json_encode($response); 
	return true;

	}else if( $methodName == "getEachLeadSourceCount" && $parameters == "true" ) {
		
		// GET COUNTS 
		$response = getEachLeadSourceCount( $dbConn, $isRecords = true ,$filterUser, $filterTeam, $filterDate);
		echo json_encode($response); 
		return true;

	}
// ############## OPPORTUNITIES PANEL ##############