
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
* To get todays call
* @param 	- none 
* @return 	- json 
*/

function getTodayCallCount( $dbConn = array(), $isRecords = false ){
	
	$response["status"] = "false";
	$response["msg"] 	= "Invalid Request!";
	$response["data"] 	= array();

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
		
	if( empty($isRecords) ){

		$table 		= "`call`";
		$select		= "COUNT(id) as count";
		$where		= "deleted = '0' AND DATE(date_start) = CURDATE() AND status = 'Planned' AND assigned_user_id = '$sessId' ";

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

		$uWhere 	= " AND u.id ='".$sessId."' ";

		$table 		= "`call` as c";

		$select		= " c.id, c.name, DATE_FORMAT( ADDTIME(c.date_start, '5:30') , '%h:%i' ) as time, DATE_FORMAT(c.date_start, '%p' ) as ampm, CONCAT(u1.first_name, ' ', u1.last_name) as assigned_by, DATE_FORMAT(c.created_at, '%d %b %Y' ) as created_at ";

		$where		= "c.deleted = '0' AND DATE(c.date_start) = CURDATE() AND c.status = 'Planned' ".$uWhere;
		$join 		= " INNER JOIN user as u ON u.id = c.assigned_user_id ";
		$join1 		= " INNER JOIN user as u1 ON u1.id = c.created_by_id ";
		$orderBy 	= " ORDER BY c.created_at ASC ";

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
* To get todays meetings
* @param 	- none 
* @return 	- json 
*/

function getTodayMeetingsCount( $dbConn = array(), $isRecords = false ){
	
	$response["status"] = "false";
	$response["msg"] 	= "Invalid Request!";
	$response["data"] 	= array();

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
		
	if( empty($isRecords) ){

		$table 		= "`meeting`";
		$select		= "COUNT(id) as count";
		$where		= "deleted = '0' AND DATE(date_start) = CURDATE() AND status = 'Planned' AND assigned_user_id = '$sessId' ";

		$query 		= "SELECT $select FROM $table WHERE $where";
    	$result 	= mysqli_query($dbConn, $query);
 
    	if( !empty($result) ){

	    	$row 			= mysqli_fetch_assoc($result);
	    	$count 			= isset( $row['count'] ) ? $row['count'] : 0;

	    	$response["status"] 	= "true";
			$response["msg"] 	= "Success!";
			$response["data"] 	= array("count" => $count );
	    }

	}else{

		$uWhere 	= " AND u.id ='".$sessId."' ";

		$table 		= "`meeting` as m";

		$select		= "m.id, m.name, DATE_FORMAT( ADDTIME(m.date_start, '5:30') , '%h:%i' ) as time, DATE_FORMAT(m.date_start, '%p' ) as ampm, CONCAT(u1.first_name, ' ', u1.last_name) as assigned_by, DATE_FORMAT(m.created_at, '%d %b %Y' ) as created_at ";

		$where		= "m.deleted = '0' AND DATE(m.date_start) = CURDATE() AND m.status = 'Planned' ".$uWhere;
		$join 		= " INNER JOIN user as u ON u.id = m.assigned_user_id ";
		$join1 		= " INNER JOIN user as u1 ON u1.id = m.created_by_id ";
		$orderBy 	= " ORDER BY m.created_at ASC ";

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
* To get todays task
* @param 	- none 
* @return 	- json 
*/

function getTodayTaskCount( $dbConn = array(), $isRecords = false ){
	
	$response["status"] = "false";
	$response["msg"] 	= "Invalid Request!";
	$response["data"] 	= array();

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
		
	if( empty($isRecords) ){

		$table 		= "`task`";
		$select		= "COUNT(id) as count";
		$where		= "deleted = '0' AND (CASE WHEN date_end_date IS NULL THEN DATE( ADDTIME(date_end, '5:30') ) = CURDATE() WHEN date_end_date IS NOT NULL THEN DATE(date_end_date) = CURDATE() END) AND status != 'Completed' AND assigned_user_id = '$sessId' ";

	    $query 		= "SELECT $select FROM $table WHERE $where";
    	$result 	= mysqli_query($dbConn, $query);
    	
    	if( !empty($result) ){
	    	$row 			= mysqli_fetch_assoc($result);
	    	$count 			= isset( $row['count'] ) ? $row['count'] : 0;

	    	$response["status"] 	= "true";
			$response["msg"] 	= "Success!";
			$response["data"] 	= array("count" => $count );
	    }

	}else{

		$uWhere 	= " AND u.id ='".$sessId."' ";

		$table 		= "`task` as t";
		$select		= "t.id, t.name, DATE_FORMAT( ADDTIME(t.date_end, '5:30') , '%h:%i' ) as time, DATE_FORMAT( ADDTIME(t.date_end, '5:30') , '%p' ) as ampm, CONCAT(u1.first_name, ' ', u1.last_name) as assigned_by, DATE_FORMAT(t.created_at, '%d %b %Y' ) as created_at ";
		$where		= "t.deleted = '0' AND (CASE WHEN date_end_date IS NULL THEN DATE( ADDTIME(date_end, '5:30') ) = CURDATE() WHEN date_end_date IS NOT NULL THEN DATE(date_end_date) = CURDATE() END) AND t.status != 'Completed' ".$uWhere;
		$join 		= " INNER JOIN user as u ON u.id = t.assigned_user_id ";
		$join1 		= " INNER JOIN user as u1 ON u1.id = t.created_by_id ";
		$orderBy 	= " ORDER BY t.created_at ASC ";

		$query 		= "SELECT $select FROM $table $join $join1 WHERE $where $orderBy";
    	$result 	= mysqli_query($dbConn, $query);
    	
    	if( !empty($result) ){

	    	$rows 	= array();
	    	while( $row = mysqli_fetch_assoc($result) ) {
		        $rows[] = $row;
		    }

	    	$response["status"] 	= "true";
			$response["msg"] 	= "Success!";
			$response["data"] 	= array( $rows );
	    }

	}

	return $response;
}


/*
* To get todays overdue task
* @param 	- none 
* @return 	- json 
*/

function getTodayOverdueTaskCount( $dbConn = array(), $isRecords = false ){
	
	$response["status"] = "false";
	$response["msg"] 	= "Invalid Request!";
	$response["data"] 	= array();

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
		
	if( empty($isRecords) ){

		$table 		= "`task`";
		$select		= "COUNT(id) as count";
		$where		= "deleted = '0' AND (CASE WHEN date_end_date IS NULL THEN DATE( ADDTIME(date_end, '5:30') ) < CURDATE() WHEN date_end_date IS NOT NULL THEN DATE(date_end_date) < CURDATE() END) AND status != 'Completed' AND assigned_user_id = '$sessId' ";

		$query 		= "SELECT $select FROM $table WHERE $where";
    	$result 	= mysqli_query($dbConn, $query);
    	$count 		= 0;
    	if( !empty($result) ){
	    	$row 			= mysqli_fetch_assoc($result);
	    	$count 			= isset( $row['count'] ) ? $row['count'] : 0;

	    	$response["status"] 	= "true";
			$response["msg"] 	= "Success!";
			$response["data"] 	= array("count" => $count );
	    }

	}else{
		
		$FullHtmlOfLi	= "";
		$htmlOfLi 		= "";

		$uWhere 	= " AND u.id ='".$sessId."' ";

		$table 		= "`task` as t";
		$select		= "t.id, t.name, DATE_FORMAT( ADDTIME(t.date_end, '5:30') , '%h:%i' ) as time, DATE_FORMAT( ADDTIME(t.date_end, '5:30') , '%p' ) as ampm, DATE_FORMAT(t.created_at, '%d %b %Y' ) as created_at , CASE WHEN date_end_date IS NULL THEN  ADDTIME(date_end, '5:30')  WHEN date_end_date IS NOT NULL THEN date_end_date END as date_end_date, CONCAT( u1.first_name, ' ', u1.last_name ) as assigned_by";
		
		$where		= "t.deleted = '0' AND (CASE WHEN date_end_date IS NULL THEN DATE( ADDTIME(date_end, '5:30') ) < CURDATE() WHEN date_end_date IS NOT NULL THEN DATE(date_end_date) < CURDATE() END) AND t.status != 'Completed' ".$uWhere;
		$join 		= " INNER JOIN user as u ON u.id = t.assigned_user_id ";
		$join1 		= " INNER JOIN user as u1 ON u1.id = t.created_by_id ";
		$orderBy 	= " ORDER BY t.created_at ASC ";
        
		$query 		= "SELECT $select FROM $table $join $join1 WHERE $where  $orderBy";
		
    	$result 	= mysqli_query($dbConn, $query);
    	$count      = mysqli_num_rows($result);

    	if( !empty($result) ){
 
			$rows 	= array();
	    	while( $row = mysqli_fetch_assoc($result) ) {
		        $rows[] = $row;
		    }

	    	$response["status"] 	= "true";
			$response["msg"] 	= "Success!";
			$response["data"] 	= array( $rows );
	    }

	}

	return $response;
}

/*
* To get overDew call
* @param 	- none 
* @return 	- json 
*/

function getOverdueCall( $dbConn, $isRecords = false ){
	
	$response["status"] = "false";
	$response["msg"] 	= "Invalid Request!";
	$response["data"] 	= array();
	
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

	if( empty($isRecords) ){
     	
		$table 		= "`call`";
		$select		= "COUNT(id) as count";
		$where		= "deleted = '0' AND DATE(date_start) < CURDATE() AND status = 'Planned' ";

		$query 		= "SELECT $select FROM $table WHERE $where";
    	$result 	= mysqli_query($dbConn, $query);

    	if( !empty($result) ){
	    	
	    	$row 			= mysqli_fetch_assoc($result);
	    	$count 			= isset( $row['count'] ) ? $row['count'] : 0;

	    	$response["status"] 	= "true";
			$response["msg"] 	= "Success!";
			$response["data"] 	= array("count" => $count );
	    }

    } else{

		$htmlOfLi       = "";
		$FullHtmlOfLi	= "";
		$uWhere			= "";
		
		$uWhere 	.= " AND u.id ='".$sessId."' ";

		$table 		= "`call` as c";
		$select		= "c.id,c.name,c.status,DATE_FORMAT( ADDTIME(c.created_at, '5:30'), '%h:%i' ) as time, DATE_FORMAT( ADDTIME(c.created_at, '5:30'), '%p' ) as ampm,DATE_FORMAT(c.date_end, '%d %M %Y') as date_end,CONCAT( u1.first_name, ' ', u1.last_name ) as assigned_by";
		$where		= "c.deleted = '0' AND DATE(c.date_start) < CURDATE() AND c.status = 'Planned' ".$uWhere;
		
		$join 		= " INNER JOIN user as u ON u.id = c.assigned_user_id ";
        $join1 		= " INNER JOIN user as u1 ON u1.id = c.created_by_id "; 
		$orderBy 	= " ORDER BY c.created_at ASC ";

		$query 		= "SELECT $select FROM $table $join $join1 WHERE $where $orderBy";
    	$result 	= mysqli_query($dbConn, $query);
    	$count      = mysqli_num_rows($result);
        
    	if( !empty($count) ){

	    	while( $row = mysqli_fetch_assoc($result) ) {
		        $url = "http://".$_SERVER["HTTP_HOST"]."#Call/view/";
		        $htmlOfLi 		='<li data-id='.$row["id"].' class="container list-group-item list-row"><div class="row"><div class="col-xs-12 pl0"><div class="pull-right right cell" data-name="buttons"><div class="list-row-buttons btn-group pull-right"><button type="button" class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button><ul class="dropdown-menu pull-right"><li><a href="" class="action" data-action="quickView" data-id="">View</a></li><li><a href="" class="action" data-action="quickEdit" data-id="">Edit</a></li><li><a href="javascript:" class="action" data-action="setCompleted" data-id="">Complete</a></li><li><a href="javascript:" class="action" data-action="quickRemove" data-id="" data-scope="Task">Remove</a></li></ul></div></div><div class="expanded-row expanded-header"><span class="cell task_data col-xs-10" data-name="name"><a href='.$url.$row["id"].' class="link" data-id="" title="Finnova Private Limited">'.$row["name"].'</a></span></div><div class="expanded-row expanded-assign"><span class="cell task_data col-xs-6" data-name="status"><span class="text-default">Assigned From '.$row["assigned_by"].'</span></span><span class="cell task_data col-xs-5 pull-right mr5" data-name="dateEnd">Due date '.$row["date_end"].'</span></div></div></div></li>';
	    		$FullHtmlOfLi = $FullHtmlOfLi . $htmlOfLi;
		    }

	    	$response["status"] 	= "true";
			$response["msg"] 	= "Success!";
			$response["data"] 	= array( "htmlOfLi" => $FullHtmlOfLi , "count"=> $count  );

	    }else{

			$response["status"] 	= "false";
			$response["msg"] 	= "error!";
			$response["data"] 	= array( "htmlOfLi" => $FullHtmlOfLi , "count"=> $count  );
	    }

	}
 
 	return $response;
	
}


/*
* To get OverDew Meetings
* @param 	- none 
* @return 	- json 
*/

function getOverdueMeeting( $dbConn, $isRecords = false ){

	$response["status"] 	= "false";
	$response["msg"] 	= "Invalid Request!";
	$response["data"] 	= array();
	
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

	if( empty($isRecords) ){
     	
		$table 		= "`meeting`";
		$select		= "COUNT(id) as count";
		$where		= "deleted = '0' AND DATE(date_start) < CURDATE() AND status = 'Planned' ";

		$query 		= "SELECT $select FROM $table WHERE $where";
    	$result 	= mysqli_query($dbConn, $query);

    	if( !empty($result) ){
	    	
	    	$row 			= mysqli_fetch_assoc($result);
	    	$count 			= isset( $row['count'] ) ? $row['count'] : 0;

	    	$response["status"] 	= "true";
			$response["msg"] 	= "Success!";
			$response["data"] 	= array("count" => $count );
	    }

    } else{

		$htmlOfLi       = "";
		$FullHtmlOfLi	= "";
		$uWhere			= "";

	    $uWhere 	.= " AND u.id ='".$sessId."' ";
		$table 		= "`meeting` as m";
		$select		= "m.id,m.name,m.status,DATE_FORMAT( ADDTIME(m.created_at, '5:30'), '%h:%i' ) as time, DATE_FORMAT( ADDTIME(m.created_at, '5:30'), '%p' ) as ampm,DATE_FORMAT(m.date_end, '%d %M %Y') as date_end,CONCAT( u1.first_name, ' ', u1.last_name ) as assigned_by";
		$where		= "m.deleted = '0' AND DATE(m.date_start) < CURDATE() AND m.status = 'Planned' ".$uWhere;
		$join 		= " INNER JOIN user as u ON u.id = m.assigned_user_id ";
		$join1 		= " INNER JOIN user as u1 ON u1.id = m.created_by_id ";
		$orderBy 	= " ORDER BY u.created_at ASC ";

		$query 		= "SELECT $select FROM $table $join $join1 WHERE $where $orderBy";
    	$result 	= mysqli_query($dbConn, $query);
    	$count      = mysqli_num_rows($result);

    	if( !empty($count) ){

	    	while( $row = mysqli_fetch_assoc($result) ) {
		        $url = "http://".$_SERVER["HTTP_HOST"]."#Meeting/view/";
		        $htmlOfLi 		='<li data-id='.$row["id"].' class="container list-group-item list-row"><div class="row"><div class="col-xs-12 pl0"><div class="pull-right right cell" data-name="buttons"><div class="list-row-buttons btn-group pull-right"><button type="button" class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button><ul class="dropdown-menu pull-right"><li><a href="" class="action" data-action="quickView" data-id="">View</a></li><li><a href="" class="action" data-action="quickEdit" data-id="">Edit</a></li><li><a href="javascript:" class="action" data-action="setCompleted" data-id="">Complete</a></li><li><a href="javascript:" class="action" data-action="quickRemove" data-id="" data-scope="Task">Remove</a></li></ul></div></div><div class="expanded-row expanded-header"><span class="cell task_data col-xs-10" data-name="name"><a href='.$url.$row["id"].' class="link" data-id="" title="Finnova Private Limited">'.$row["name"].'</a></span></div><div class="expanded-row expanded-assign"><span class="cell task_data col-xs-6" data-name="status"><span class="text-default">Assigned From '.$row["assigned_by"].'</span></span><span class="cell task_data col-xs-5 pull-right mr5" data-name="dateEnd">Due date '.$row["date_end"].'</span></div></div></div></li>';
	    		$FullHtmlOfLi = $FullHtmlOfLi . $htmlOfLi;
		    }

	    	$response["status"] 	= "true";
			$response["msg"] 	= "Success!";
			$response["data"] 	= array( "htmlOfLi" => $FullHtmlOfLi , "count" => $count  );

	    }else{
	    	
	    	$response["status"] 	= "false";
			$response["msg"] 	= "error!";
			$response["data"] 	= array( "htmlOfLi" => $FullHtmlOfLi , "count" => $count  );
	    }

	}
 
 	return $response;

}


/*
* To get newly created accounts
* @param 	- none 
* @return 	- json 
*/

function getNewlyAccounts( $dbConn , $isRecords = false, $filterUser = "", $filterTeam = "" , $filterDate = ""){
	
	$response["status"] 	= "false";
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

		$condition .= " AND ( DATE(a.created_at) BETWEEN '$startDate' AND '$endDate' ) ";
	}

	if( !empty($filterUser) ){
		$condition .= " AND ( a.assigned_user_id = '$filterUser' ) ";
	} else {
		if( !empty($filterTeam) ){
	    	$condition .= " AND ( a.assigned_user_id IN ( SELECT id FROM user WHERE default_team_id ='$filterTeam' ) ) ";
		}else{
	        $condition .= " AND ( a.assigned_user_id = '$sessId' ) ";
		}
	}

	if( empty($isRecords) ){
     	
		$table 		= "`account` as a";
		$select		= "COUNT(id) as count";
		$where		= "a.deleted = '0' $condition";
		$query 		= "SELECT $select FROM $table WHERE $where";
    	$result 	= mysqli_query($dbConn, $query);
        
    	if( !empty($result) ){

	    	$row 			= mysqli_fetch_assoc($result);
	    	$count 			= isset( $row['count'] ) ? $row['count'] : 0;

	    	$response["status"] 	= "true";
			$response["msg"] 	= "Success!";
			$response["data"] 	= array("count" => $count );
	    }

    } else{

		$htmlOfLi       = "";
		$FullHtmlOfLi	= "";
		
		$table 		= "`account` as a";
		$select		= "a.id,a.name,DATE_FORMAT(a.created_at, '%d %M %Y' ) as time,CONCAT( u.first_name, ' ', u.last_name ) as assigned_by ";
		$where		= "a.deleted = '0' $condition ";
		$join 		= " INNER JOIN user as u ON u.id = a.created_by_id ";
		$query 		= "SELECT $select FROM $table $join WHERE $where ";
    	$result 	= mysqli_query($dbConn, $query);
    	$count      = mysqli_num_rows($result);
    	
    	if( !empty($count) ){
	    	while( $row = mysqli_fetch_assoc($result) ) {
		        $url = "http://".$_SERVER["HTTP_HOST"]."#Account/view/";
		        $htmlOfLi 	='<li data-id='.$row["id"].' class="container list-group-item list-row"><div class="row"><div class="col-xs-12 pl0"><div class="expanded-row expanded-assign"><span class="cell task_data col-xs-4" data-name="name"><a href='.$url.$row["id"].' class="link" data-id="" title="Finnova Private Limited">'.$row["name"].'</a></span><span class="cell task_data col-xs-4" data-name="createdBy"><span class="text-default">'.$row["assigned_by"].'</span></span><span class="cell task_data col-xs-4" data-name="status"><span class="text-default">'.$row["time"].'</span></span></div></div></div></li>';
	    		$FullHtmlOfLi = $FullHtmlOfLi . $htmlOfLi;
		    }

	    	$response["status"] 	= "true";
			$response["msg"] 	= "Success!";
			$response["data"] 	= array( "htmlOfLi" => $FullHtmlOfLi , "count" => $count  );

	    }else{
	    	
            $FullHtmlOfLi .= '<li data-id="" class="container list-group-item list-row" style="font-size:14px !important;">No Data</li>';
	    	$response["status"] 	= "false";
			$response["msg"] 	= "error!";
			$response["data"] 	= array( "htmlOfLi" => $FullHtmlOfLi , "count" => $count  );
	    }

	}
 
 	return $response;
	
}


/*
* To get todays overdue task
* @param 	- none 
* @return 	- json 
*/

function getThingdToDoToday( $dbConn = array() ){
	
	$response["status"] = "false";
	$response["msg"] 	= "Invalid Request!";
	$response["data"] 	= array();

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
	
	$combinedArr 	= array();

	$callArr 		= getTodayCallCount( $dbConn, $isRecords = true  );
	$meetingsArr 	= getTodayMeetingsCount( $dbConn, $isRecords = true  );
	$taskArr 		= getTodayTaskCount( $dbConn, $isRecords = true  );
	// $overdueTaskArr = getTodayOverdueTaskCount( $dbConn, $isRecords = true  );

	if( !empty($callArr["data"][0]) ){

		foreach ( $callArr["data"][0] as $key1 => $value1 ) {
			$value1["link"] = "http://".$_SERVER["HTTP_HOST"]."#Call/view/".$value1["id"];
			$combinedArr[] = $value1;
		}
	}
	if( !empty($meetingsArr["data"][0]) ){

		foreach ( $meetingsArr["data"][0] as $key1 => $value1 ) {
			
			$value1["link"] = "http://".$_SERVER["HTTP_HOST"]."#Meeting/view/".$value1["id"]; 
			$combinedArr[] = $value1;
		}
	}
	if( !empty($taskArr["data"][0]) ){

		foreach ( $taskArr["data"][0] as $key1 => $value1 ) {
			$value1["link"] = "http://".$_SERVER["HTTP_HOST"]."#Task/view/".$value1["id"];
			$combinedArr[] = $value1;
		}
	}
	/*if( !empty($overdueTaskArr["data"][0]) ){

		foreach ( $overdueTaskArr["data"][0] as $key1 => $value1 ) {
			$value1["link"] = "http://".$_SERVER["HTTP_HOST"]."#Task/view/".$value1["id"];
			$combinedArr[] = $value1;
		}
	}*/

	if( !empty($combinedArr) ) {

		$finalArr = $helper->array_sort($combinedArr, 'time', SORT_ASC);
		$response["status"] = "true";
		$response["msg"] 	= "Success!";
		$response["data"] 	= $finalArr;
	}

	return $response;
}


/*
* Here ajax call
*/

$methodName 	= isset( $_GET["methodName"] ) ? $_GET["methodName"] : NULL ;
$parameters 	= isset( $_GET["parameters"] ) ? $_GET["parameters"] : NULL ;
$filterUser 	= isset( $_GET["filterUser"] ) ? $_GET["filterUser"] : NULL ;
$filterTeam 	= isset( $_GET["filterTeam"] ) ? $_GET["filterTeam"] : NULL ;
$filterDate 	= isset( $_GET["filterDate"] ) ? $_GET["filterDate"] : NULL ;
$calendarDate 	= isset( $_GET["calendarDate"] ) ? $_GET["calendarDate"] : NULL ;


// ############## TODAYS COUNT PANEL ##############

if( $methodName == "getTodayCallCount" && $parameters == "false" ) {
	
	// GET COUNTS
	$response = getTodayCallCount( $dbConn, $isRecords = false  );
	echo json_encode($response); 
	return true;

} else if( $methodName == "getTodayMeetingsCount" && $parameters == "false" ) {
	
	// GET COUNTS
	$response = getTodayMeetingsCount( $dbConn, $isRecords = false  );
	echo json_encode($response); 
	return true;

} else if( $methodName == "getTodayTaskCount" && $parameters == "false" ) {
	
	// GET COUNTS
	$response = getTodayTaskCount( $dbConn, $isRecords = false  );
	echo json_encode($response); 
	return true;

} else if( $methodName == "getTodayOverdueTaskCount" && $parameters == "false" ) {
	
	// GET COUNTS
	$response = getTodayOverdueTaskCount( $dbConn, $isRecords = false  );
	echo json_encode($response); 
	return true;

} else if( $methodName == "getTodayCallRecords" && $parameters == "true" ) {
	
	// GET RECORDS
	$response = getTodayCallCount( $dbConn, $isRecords = true  );
	$html 		= "";
	if( !empty($response["status"]) && $response["status"] == "true" && !empty($response["data"]) ){
		if( !empty($response["data"][0]) ) {

			$i =1;
			$url = "http://".$_SERVER["HTTP_HOST"]."#Call/view/";
			foreach ($response["data"][0] as $key => $value) {
				$html .= '<tr>
						<td>'.$i.'</td>
						<td><a class="close-modal" href="'.$url.$value["id"].'" >'.$value["name"].' </a> </td>
						<td>'.$value["time"].' '.$value["ampm"].'</td>
						<td>'.$value["created_at"].'</td>
					</tr>';
				$i++;
			}
		}else{
			$html .= "";	
		}
	}
	$response["data"]["html"] = $html;
	unset($response["data"][0]);
	echo json_encode($response); 
	return true;

} else if( $methodName == "getTodayMeetingsRecords" && $parameters == "true" ) {
	
	// GET RECORDS
	$response = getTodayMeetingsCount( $dbConn, $isRecords = true  );
	$html 	  = "";

	if( !empty($response["status"]) && $response["status"] == "true" && !empty($response["data"]) ){
		if( !empty($response["data"][0]) ) {

			$i =1;
			$url = "http://".$_SERVER["HTTP_HOST"]."#Meeting/view/";
			foreach ($response["data"][0] as $key => $value) {
				$html .= '<tr>
						<td>'.$i.'</td>
						<td><a class="close-modal" href="'.$url.$value["id"].'" >'.$value["name"].' </a> </td>
						<td>'.$value["time"].' '.$value["ampm"].'</td>
						<td>'.$value["created_at"].'</td>
					</tr>';
				$i++;
			}
		}else{
			$html .= '';
		}
	}
	$response["data"]["html"] = $html;
	unset($response["data"][0]);
	echo json_encode($response); 
	return true;

} else if( $methodName == "getTodayTaskRecords" && $parameters == "true" ) {
	
	// GET RECORDS
	$response = getTodayTaskCount( $dbConn, $isRecords = true  );
	$html 		= "";

	if( !empty($response["status"]) && $response["status"] == "true" && !empty($response["data"]) ){
		if( !empty($response["data"][0]) ) {

			$i =1;
			$url = "http://".$_SERVER["HTTP_HOST"]."#Task/view/";
			foreach ($response["data"][0] as $key => $value) {
				$html .= '<tr>
						<td>'.$i.'</td>
						<td><a class="close-modal" href="'.$url.$value["id"].'" >'.$value["name"].' </a> </td>
						<td>'.$value["time"].' '.$value["ampm"].'</td>
						<td>'.$value["created_at"].'</td>
					</tr>';
				$i++;
			}
		}else{
			$html .= '';
		}
	}
	$response["data"]["html"] = $html;
	unset($response["data"][0]);
	echo json_encode($response); 
	return true;

} else if( $methodName == "getTodayOverdueTaskRecords" && $parameters == "true" ) {
	
	// GET RECORDS
	$response 	= getTodayOverdueTaskCount( $dbConn, $isRecords = true  );
	$html 		= "";

	if( !empty($response["status"]) && $response["status"] == "true" && !empty($response["data"]) ){
		if( !empty($response["data"][0]) ) {

			$i =1;
			$url = "http://".$_SERVER["HTTP_HOST"]."#Task/view/";
			foreach ($response["data"][0] as $key => $value) {
				$html .= '<tr>
						<td>'.$i.'</td>
						<td><a class="close-modal" href="'.$url.$value["id"].'" >'.$value["name"].' </a> </td>
						<td>'.$value["time"].' '.$value["ampm"].'</td>
						<td>'.$value["created_at"].'</td>
					</tr>';
				$i++;
			}
		}else{
			$html .= '';
		}
	}
	$response["data"]["html"] = $html;
	unset($response["data"][0]);
	echo json_encode($response); 
	return true;

}else if( $methodName == "getThingdToDoToday" && $parameters == "true" ){

	// GET RECORDS
	$response 	= getThingdToDoToday( $dbConn );
	$html 		= "";

	if( !empty($response["status"]) && $response["status"] == "true" && !empty($response["data"]) ){
		if( !empty($response["data"]) ) {

			foreach ($response["data"] as $key => $value) {
				$html .= '<li data-id="" class="container list-group-item list-row">
	                <div class="row">
	                    <div class="col-xs-2 time pr0">
	                        <span>'.$value["time"].'</span><br>
	                        <span>'.$value["ampm"].'</span>
	                    </div>
	                    <div class="col-xs-10 pl0">
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
	                            <span class="cell task_data col-xs-10" data-name="name">
	                                <a href='.$value["link"].' class="link close-modal" data-id="" title="Finnova Private Limited">'.$value["name"].'</a>
	                           </span>
	                        </div>
	                        <div class="expanded-row expanded-assign">
	                            <span class="cell task_data col-xs-6" data-name="status">
	                                <span class="text-default">Assigned From '.$value["assigned_by"].'.</span>
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
			$html .= '';
		}
	}

	// echo "<pre>";print_r($response);die;
	unset($response["data"]);
	$response["data"]["html"] = $html;
	echo json_encode($response); 
	return true;
}

// ############## TODAYS COUNT PANEL ##############

// ############## OVERDUE PANEL ##############

if( $methodName == "getOverdueTask" && $parameters == "true" ) {
	
	// GET RECORDS
	$response 	= getTodayOverdueTaskCount( $dbConn, $isRecords = true  );
	$html 		= "";
	$count 		= 0;
	if( !empty($response["status"]) && $response["status"] == "true" && !empty($response["data"]) ){
		if( !empty($response["data"][0]) ) {

            $url = "http://".$_SERVER["HTTP_HOST"]."#Task/view/";
			foreach ($response["data"][0] as $key => $value) {

				$html .= '<li data-id='.$value["id"].' class="container list-group-item list-row"><div class="row"><div class="col-xs-12 pl0"><div class="pull-right right cell" data-name="buttons"><div class="list-row-buttons btn-group pull-right"><button type="button" class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button><ul class="dropdown-menu pull-right"><li><a href="" class="action" data-action="quickView" data-id="">View</a></li><li><a href="" class="action" data-action="quickEdit" data-id="">Edit</a></li><li><a href="javascript:" class="action" data-action="setCompleted" data-id="">Complete</a></li><li><a href="" class="action" data-action="quickRemove" data-id="" data-scope="Task">Remove</a></li></ul></div></div><div class="expanded-row expanded-header"><span class="cell task_data col-xs-10" data-name="name"><a href="'.$url.$value["id"].'" class="link close-modal" data-id="" title="Finnova Private Limited">'.$value["name"].'</a></span></div><div class="expanded-row expanded-assign"><span class="cell task_data col-xs-6" data-name="status"><span class="text-default"> Assigned From '.$value["assigned_by"].'</span></span><span class="cell task_data col-xs-5 pull-right mr5" data-name="dateEnd">Due date '.date('d M Y', strtotime($value["date_end_date"])).'</span></div></div></div></li>';

				$count++;
			}
		}else{
			$html .= '<li data-id="" class="container list-group-item list-row" style="font-size:14px !important; ">No Data
				</li>';
		}
	}

	$response["data"]["htmlOfLi"] 	= $html;
	$response["data"]["count"] 		= $count;
	unset($response["data"][0]);
	echo json_encode($response); 
	return true;

}else if( $methodName == "getOverdueCall" && $parameters == "true" ) {
	
	// GET RECORDS
	$response = getOverdueCall( $dbConn, $isRecords = true  );
	echo json_encode($response); 
	return true;

}else if( $methodName == "getOverdueMeeting" && $parameters == "true" ) {
    
    // GET RECORDS
	$response = getOverdueMeeting( $dbConn, $isRecords = true  );
	echo json_encode($response); 
	return true;

}else if( $methodName == "getNewlyAccounts" && $parameters == "true" ) {
    
    // GET RECORDS
	$response = getNewlyAccounts( $dbConn , $isRecords = true, $filterUser, $filterTeam , $filterDate);
	echo json_encode($response); 
	return true;
}


// ############## OVERDUE PANEL ##############


// ############## CALENDAR PANEL ##############

function getCalendarTaskData( $dbConn = array(), $isRecords = false, $filterUser = "", $filterTeam = "", $calendarDate = "" ) {

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
		$condition .= " AND ( t.assigned_user_id = '$filterUser' ) ";
	} else {
		if( !empty($filterTeam) ){
	    	$condition .= " AND ( t.assigned_user_id IN ( SELECT id FROM user WHERE default_team_id ='$filterTeam' ) ) ";
		}else{
	        $condition .= " AND ( t.assigned_user_id = '$sessId' ) ";
		}
	}

	if( !empty($calendarDate) ){
		$calendarDate 	= trim( date("Y-m-d", strtotime($calendarDate) ) );
	}else{
		$calendarDate 	= "CURDATE()";
	}   
		
	if( empty($isRecords) ){

		$table 		= "`task` as t";
		$select		= "COUNT(t.id) as count";
		$where		= "t.deleted = '0' AND (CASE WHEN t.date_end_date IS NULL THEN DATE( ADDTIME(t.date_end, '5:30') ) = '$calendarDate' WHEN t.date_end_date IS NOT NULL THEN DATE(t.date_end_date) = '$calendarDate' END) AND t.status != 'Completed' $condition ";

	    $query 		= "SELECT $select FROM $table WHERE $where";
    	$result 	= mysqli_query($dbConn, $query);
    	
    	if( !empty($result) ){
	    	$row 			= mysqli_fetch_assoc($result);
	    	$count 			= isset( $row['count'] ) ? $row['count'] : 0;

	    	$response["status"] = "true";
			$response["msg"] 	= "Success!";
			$response["data"] 	= array("count" => $count );
	    }

	}else{

		$table 		= "`task` as t";
		$select		= "t.id, t.name, DATE_FORMAT( ADDTIME(t.date_end, '5:30'), '%h:%i' ) as time, DATE_FORMAT( ADDTIME(t.date_end, '5:30'), '%p' ) as ampm, CONCAT(u1.first_name, ' ', u1.last_name) as assigned_by, DATE_FORMAT(t.created_at, '%d %b %Y' ) as created_at ";
		$where		= "t.deleted = '0' AND (CASE WHEN t.date_end_date IS NULL THEN DATE( ADDTIME(t.date_end, '5:30') ) = '$calendarDate' WHEN t.date_end_date IS NOT NULL THEN DATE( t.date_end_date) = '$calendarDate' END) AND t.status != 'Completed' ".$condition;
		$join 		= " INNER JOIN user as u ON u.id = t.assigned_user_id ";
		$join1 		= " INNER JOIN user as u1 ON u1.id = t.created_by_id ";
		$orderBy 	= " ORDER BY t.created_at ASC ";

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


function getCalendarMeetingsData( $dbConn = array(), $isRecords = false, $filterUser = "", $filterTeam = "", $calendarDate = "" ) {

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
		$condition .= " AND ( m.assigned_user_id = '$filterUser' ) ";
	} else {
		if( !empty($filterTeam) ){
	    	$condition .= " AND ( m.assigned_user_id IN ( SELECT id FROM user WHERE default_team_id ='$filterTeam' ) ) ";
		}else{
	        $condition .= " AND ( m.assigned_user_id = '$sessId' ) ";
		}
	}

	if( !empty($calendarDate) ){
		$calendarDate 	= trim( date("Y-m-d", strtotime($calendarDate) ) );
	}else{
		$calendarDate 	= "CURDATE()";
	}   
	
	if( empty($isRecords) ){

		$table 		= "`meeting` as m";
		$select		= "COUNT(id) as count";
		$where		= "m.deleted = '0' AND DATE(m.date_start) = '$calendarDate' AND m.status = 'Planned' $condition";

		$query 		= "SELECT $select FROM $table WHERE $where";
    	$result 	= mysqli_query($dbConn, $query);
 
    	if( !empty($result) ){

	    	$row 			= mysqli_fetch_assoc($result);
	    	$count 			= isset( $row['count'] ) ? $row['count'] : 0;

	    	$response["status"] = "true";
			$response["msg"] 	= "Success!";
			$response["data"] 	= array("count" => $count );
	    }

	} else{

		$table 		= "`meeting` as m";

		$select		= "m.id, m.name, DATE_FORMAT(m.date_start, '%h:%i' ) as time, DATE_FORMAT(m.date_start, '%p' ) as ampm, CONCAT(u1.first_name, ' ', u1.last_name) as assigned_by, DATE_FORMAT(m.created_at, '%d %b %Y' ) as created_at ";

		$where		= "m.deleted = '0' AND DATE(m.date_start) = '$calendarDate' AND m.status = 'Planned' ".$condition ;
		$join 		= " INNER JOIN user as u ON u.id = m.assigned_user_id ";
		$join1 		= " INNER JOIN user as u1 ON u1.id = m.created_by_id ";
		$orderBy 	= " ORDER BY m.created_at ASC ";

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


function getCalendarCallsData( $dbConn = array(), $isRecords = false, $filterUser = "", $filterTeam = "", $calendarDate = "" ) {

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
		$condition .= " AND ( c.assigned_user_id = '$filterUser' ) ";
	} else {
		if( !empty($filterTeam) ){
	    	$condition .= " AND ( c.assigned_user_id IN ( SELECT id FROM user WHERE default_team_id ='$filterTeam' ) ) ";
		}else{
	        $condition .= " AND ( c.assigned_user_id = '$sessId' ) ";
		}
	}

	if( !empty($calendarDate) ){
		$calendarDate 	= trim( date("Y-m-d", strtotime($calendarDate) ) );
	}else{
		$calendarDate 	= "CURDATE()";
	}   
	
	if( empty($isRecords) ){

		$table 		= "`call` as c";
		$select		= "COUNT(c.id) as count";
		$where		= "c.deleted = '0' AND DATE(c.date_start) = '$calendarDate' AND c.status = 'Planned' $condition ";

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

		$table 		= "`call` as c";

		$select		= " c.id, c.name, DATE_FORMAT(c.date_start, '%h:%i' ) as time, DATE_FORMAT(c.date_start, '%p' ) as ampm, CONCAT(u1.first_name, ' ', u1.last_name) as assigned_by, DATE_FORMAT(c.created_at, '%d %b %Y' ) as created_at ";

		$where		= "c.deleted = '0' AND DATE(c.date_start) = '$calendarDate' AND c.status = 'Planned' ".$condition;
		$join 		= " INNER JOIN user as u ON u.id = c.assigned_user_id ";
		$join1 		= " INNER JOIN user as u1 ON u1.id = c.created_by_id ";
		$orderBy 	= " ORDER BY c.created_at ASC ";

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

if( $methodName == "getCalendarTaskData" && $parameters == "false" ) {

	// GET COUNTS
	$response = getCalendarTaskData( $dbConn, $isRecords = false, $filterUser, $filterTeam, $calendarDate );
	echo json_encode($response); 
	return true;

} else if( $methodName == "getCalendarMeetingsData" && $parameters == "false" ) {

	// GET COUNTS
	$response = getCalendarMeetingsData( $dbConn, $isRecords = false, $filterUser, $filterTeam, $calendarDate );
	echo json_encode($response); 
	return true;

} else if( $methodName == "getCalendarCallsData" && $parameters == "false" ) {

	// GET COUNTS
	$response = getCalendarCallsData( $dbConn, $isRecords = false, $filterUser, $filterTeam, $calendarDate );
	echo json_encode($response); 
	return true;

} else if( $methodName == "getCalendarTaskData" && $parameters == "true" ) {

	// GET COUNTS
	$returnArr 	= getCalendarTaskData( $dbConn, true, $filterUser, $filterTeam, $calendarDate );
	$html 		= "";

	if( !empty($returnArr["data"][0]) ) {

		$i = 1;
		$url = "http://".$_SERVER["HTTP_HOST"]."#Task/view/";
		foreach ($returnArr["data"][0] as $key => $value) {

			$html .= '<tr>
						<td>'.$i.'</td>
						<td><a class="close-modal" href="'.$url.$value["id"].'" >'.$value["name"].' </a> </td>
						<td>'.$value["time"].' '.$value["ampm"].'</td>
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
	
} else if( $methodName == "getCalendarMeetingsData" && $parameters == "true" ) {

	// GET COUNTS
	$returnArr 	= getCalendarMeetingsData( $dbConn, true, $filterUser, $filterTeam, $calendarDate );
	$html 		= "";

	if( !empty($returnArr["data"][0]) ) {

		$i = 1;
		$url = "http://".$_SERVER["HTTP_HOST"]."#Meeting/view/";
		foreach ($returnArr["data"][0] as $key => $value) {

			$html .= '<tr>
						<td>'.$i.'</td>
						<td><a class="close-modal" href="'.$url.$value["id"].'" >'.$value["name"].' </a> </td>
						<td>'.$value["time"].' '.$value["ampm"].'</td>
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

} else if( $methodName == "getCalendarCallsData" && $parameters == "true" ) {

	// GET COUNTS
	$returnArr = getCalendarCallsData( $dbConn, true, $filterUser, $filterTeam, $calendarDate );
	$html 		= "";

	if( !empty($returnArr["data"][0]) ) {

		$i = 1;
		$url = "http://".$_SERVER["HTTP_HOST"]."#Call/view/";
		foreach ($returnArr["data"][0] as $key => $value) {

			$html .= '<tr>
						<td>'.$i.'</td>
						<td><a class="close-modal" href="'.$url.$value["id"].'" >'.$value["name"].' </a> </td>
						<td>'.$value["time"].' '.$value["ampm"].'</td>
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

}
// ############## CALENDAR PANEL ##############
