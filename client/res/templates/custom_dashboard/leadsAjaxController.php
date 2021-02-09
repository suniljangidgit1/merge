
<?php
session_start();
/*
* LEADS TAB AJX CONTROLLER
* THIS IS AJAX CONTROLLER FOR LEADS TAB AJAX REQUEST
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

function getCounts( $dbConn = array(), $isRecords = "", $status = "", $type = "", $filterDate = "", $filterUser = "", $filterTeam = "" ){

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

	if( $isRecords == "false" ){

		$table 		= " `lead` as l";
		$select		= " COUNT(l.id) as count ";

		// $where		= " l.deleted = '0' AND l.status = '$status' ".$condition;
		if( !empty($type) ) {
			$where		= " l.deleted = '0' AND l.lead_type = '$type' ".$condition;
		}else{
			$where		= " l.deleted = '0' AND l.status = '$status' ".$condition;
		}

		$join 		= " INNER JOIN user as u ON u.id = l.assigned_user_id ";
		$join 		.= " INNER JOIN user as u1 ON u1.id = l.created_by_id ";

		$query 		= " SELECT $select FROM $table $join WHERE $where ";
    	$result 	= mysqli_query($dbConn, $query);

    	if( !empty($result) ){

	    	$row = mysqli_fetch_assoc($result);
	    	return $count = isset( $row['count'] ) ? $row['count'] : 0;
	    }

	    return false;

	}else{

		$table 		= " `lead` as l ";
		$select		= " l.id, CONCAT(l.salutation_name, ' ', l.first_name, ' ', l.last_name ) as title, l.status, l.source, l.opportunity_amount, CONCAT( u.first_name, ' ', u.last_name ) as assigned_user, CONCAT( u1.first_name, ' ', u1.last_name ) as assigned_by_user, DATE_FORMAT( l.created_at, '%d %b %Y' ) as created_at ";
		
		/*$where		= " l.deleted = '0' AND l.status = '$status' ".$condition;
		$join 		= " INNER JOIN user as u ON u.id = l.assigned_user_id ";*/

		if( !empty($type) ) {
			$where		= " l.deleted = '0' AND l.lead_type = '$type' ".$condition;
		}else{
			$where		= " l.deleted = '0' AND l.status = '$status' ".$condition;
		}

		$join 		= " INNER JOIN user as u ON u.id = l.assigned_user_id ";
		$join 		.= " INNER JOIN user as u1 ON u1.id = l.created_by_id ";

		$query 		= " SELECT $select FROM $table $join WHERE $where ";
		$orderBy 	= " ORDER BY l.created_at DESC ";

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
* To get count & records of kanaban
* @param 	- (string) $status 
* @param 	- (array) $leadArr
* @return 	- (array) $data 
*/

function buildKanbanTableHtml( $status = "", $leadArr = array() ) {

	$count 	= 0;
	$html 	= "";

	if( !empty($status) && !empty($leadArr) ) {

		$html	.= '<table>';
		$url 	= "http://".$_SERVER["HTTP_HOST"]."#Lead/view/";
		foreach ($leadArr as $key => $value) {

			$oppAmount = ( $value["opportunity_amount"] != "" ) ? $value["opportunity_amount"] : 0 ;
			$html .= '<tr> <td> <div class="row"> <div class="col-xs-12"> <div class="form-group LeadsName LeadsName"> <div class="field" data-name="name"> <a href="'.$url.$value["id"].'" class="link" data-id="'.$value["id"].'" title="'.$value["title"].'">'.$value["title"].'</a> </div> </div> </div> <div class="col-xs-6"> <div class="LeadsPrice"> <div class="field field-right-align field-large" data-name="amount"> <span title="₹'.$oppAmount.'">₹'.$oppAmount.'</span> </div> </div> </div> <div class="col-xs-6"> <div class="LeadsDate"> <div class="field" data-name="closeDate"> <span>'.$value["created_at"].'</span> </div> </div> </div> </div> </td> </tr>';

			$count++;
		}

		$html	.= '</table>';

	}else{
		$html .= '<table> <tr> <td class=""> <div class="row"> <div class="col-xs-12"> <div class="field" data-name="name"> No Data </div> </div> </div> </td> </tr> </table>';

	}

	return array( "$status" =>
					array( 
						"count" => $count, 
						"html" => $html 
					)
				);
}



/*
* To get count & records of kanaban
* @param 	- (string) $status 
* @param 	- (array) $leadArr
* @return 	- (array) $data 
*/

function buildLeadTabHtml( $type = "", $leadArr = array() ) {

	$count 	= 0;
	$html 	= "";

	if( !empty($type) && !empty($leadArr) ) {

		$url 	= "http://".$_SERVER["HTTP_HOST"]."#Lead/view/";
		foreach ($leadArr as $key => $value) {

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
				            	<span class="cell task_data col-xs-10" data-name=""><a href="'.$url.$value["id"].'" class="link" data-id="" title="'.$value["title"].'">'.$value["title"].'</a></span>
				         	</div>
				         	<div class="expanded-row expanded-assign">
				            	<span class="cell task_data col-xs-6" data-name=""><span class="text-default">Assigned From '.$value["assigned_by_user"].'</span></span>
				            	<span class="cell task_data col-xs-5 pull-right mr5" data-name="dateEnd">Source - '.$value["source"].'</span>
				         	</div>
				      	</div>
				   	</div>
				</li>';

			$count++;
		}

	}else{
		$html .= '<li data-id="" class="container list-group-item list-row">
				      		No Data
		      	</li>';

	}

	return array( "$type" =>
					array( 
						"count" => $count, 
						"html" => $html 
					)
				);
}



/*
* Here ajax call
*/

$filterDate = isset( $_GET["filterDate"] ) ? $_GET["filterDate"] : NULL ;
$filterUser = isset( $_GET["filterUser"] ) ? $_GET["filterUser"] : NULL ;
$filterTeam = isset( $_GET["filterTeam"] ) ? $_GET["filterTeam"] : NULL ;

$methodName = isset( $_GET["methodName"] ) ? $_GET["methodName"] : NULL ;
$isRecords 	= isset( $_GET["isRecords"] ) ? $_GET["isRecords"] : NULL ;
$status 	= isset( $_GET["status"] ) ? $_GET["status"] : NULL ;

if( $methodName == "getCounts" && $isRecords == "false" && ( $status == "Converted" || $status == "New" ) ) {
	
	// GET COUNTS - CONVERTED / NEW
	$response["status"] = "false";
	$response["msg"] 	= "Invalid Request!";
	$response["data"] 	= array();

	$resultData = getCounts( $dbConn, $isRecords, $status, "", $filterDate, $filterUser, $filterTeam );

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

} else if( $methodName == "getRecords" && $isRecords == "true" && ( $status == "Converted" || $status == "New" ) ) {
	
	// GET RECORDS - CONVERTED / NEW
	$response["status"] = "false";
	$response["msg"] 	= "Invalid Request!";
	$response["data"] 	= array();

	$returnArr 	= getCounts( $dbConn, $isRecords, $status, "", $filterDate, $filterUser, $filterTeam );
	// echo "<pre>";print_r($returnArr);die;
	$html 		= "";

	if( !empty($returnArr) ) {

		$i = 1;
		$url = "http://".$_SERVER["HTTP_HOST"]."#Lead/view/";
		foreach ($returnArr as $key => $value) {
			$html .= '<tr>
					<td>'.$i.'</td>
					<td><a class="close-modal" href="'.$url.$value["id"].'" >'.$value["title"].' </a> </td>
					<td>'.$value["assigned_user"].'</td>
					<td>'.$value["status"].'</td>
					<td>'.$value["created_at"].'</td>
				</tr>';
			$i++;
		}
	}else{
		$html .= '';
	}

	$response["status"] = "true";
	$response["msg"] 	= "Success!";
	$response["data"] 	= array( "html" => $html );

	echo json_encode($response); 
	return true;

} else if( $methodName == "getLeadsKanbanData" ) {
	
	// GET KANBAN COUNTS & RECORDS - NEW/OPEN/QUALIFIED/CONVERTED
	$response["status"] = "true";
	$response["msg"] 	= "Success!";
	$response["data"] 	= array();

	$newArr 		= getCounts( $dbConn, $isRecords, "New", "", $filterDate, $filterUser, $filterTeam );
	$openArr 		= getCounts( $dbConn, $isRecords, "Open", "", $filterDate, $filterUser, $filterTeam );
	$qualifiedArr 	= getCounts( $dbConn, $isRecords, "Qualified", "", $filterDate, $filterUser, $filterTeam );
	$convertedArr 	= getCounts( $dbConn, $isRecords, "Converted", "", $filterDate, $filterUser, $filterTeam );

	$response["data"]["NewLeads"] 		= buildKanbanTableHtml( "New", $newArr );
	$response["data"]["OpenLeads"] 		= buildKanbanTableHtml( "Open", $openArr );
	$response["data"]["QualifiedLeads"] = buildKanbanTableHtml( "Qualified", $qualifiedArr );
	$response["data"]["ConvertedLeads"] = buildKanbanTableHtml( "Converted", $convertedArr );
	// echo "<pre>response--> ";print_r($response);die;

	echo json_encode($response); 
	return true;

} else if( $methodName == "getLeadsTabData" ) {
	
	// GET KANBAN COUNTS & RECORDS - NEW/OPEN/QUALIFIED/CONVERTED
	$response["status"] = "true";
	$response["msg"] 	= "Success!";
	$response["data"] 	= array();

	$hotArr 		= getCounts( $dbConn, "true", "", "Hot Lead", $filterDate, $filterUser, $filterTeam );
	$warmArr 		= getCounts( $dbConn, "true", "", "Warm Lead", $filterDate, $filterUser, $filterTeam );
	$coldArr 		= getCounts( $dbConn, "true", "", "Cold Lead", $filterDate, $filterUser, $filterTeam );
	$deadArr 		= getCounts( $dbConn, "true", "", "Dead Lead", $filterDate, $filterUser, $filterTeam );

	$response["data"]["hotLeads"] 		= buildLeadTabHtml( "hot", $hotArr );
	$response["data"]["warmLeads"] 		= buildLeadTabHtml( "warm", $warmArr );
	$response["data"]["coldLeads"] 		= buildLeadTabHtml( "cold", $coldArr );
	$response["data"]["deadLeads"] 		= buildLeadTabHtml( "dead", $deadArr );

	echo json_encode($response); 
	return true;

} else if( $methodName == "getLeadsPipelineChartData" ) {
	
	// GET GRAPH COUNT - NEW/OPEN/QUALIFIED/CONVERTED
	$response["status"] = "true";
	$response["msg"] 	= "Success!";
	$response["data"] 	= array();

	$response["data"]["newLeadsCount"] 			= getCounts( $dbConn, $isRecords, "New", "", $filterDate, $filterUser, $filterTeam );
	$response["data"]["openLeadsCount"] 		= getCounts( $dbConn, $isRecords, "Open", "", $filterDate, $filterUser, $filterTeam );
	$response["data"]["qualifiedLeadsCount"] 	= getCounts( $dbConn, $isRecords, "Qualified", "", $filterDate, $filterUser, $filterTeam );
	$response["data"]["convertedLeadsCount"] 	= getCounts( $dbConn, $isRecords, "Converted", "", $filterDate, $filterUser, $filterTeam );

	if( $response["data"]["newLeadsCount"] == 0 && $response["data"]["openLeadsCount"] == 0 && $response["data"]["qualifiedLeadsCount"] == 0 && $response["data"]["convertedLeadsCount"] == 0 ){
		$response["data"]["hide"] = "false";
	}else{
		$response["data"]["hide"] = "true";
	}

	echo json_encode($response); 
	return true;

}