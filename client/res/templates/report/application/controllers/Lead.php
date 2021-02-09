<?php defined('BASEPATH') OR exit('No direct script access allowed');

session_start();

class Lead extends CI_Controller {


	public function __construct(){
		parent::__construct();
		
		if( empty($_SESSION['Login']) ){
  	 		echo "<script>window.location='http://".$_SERVER["HTTP_HOST"]."';</script>";
  	 	}
  	 	$this->Login = $_SESSION['Login']; // $_SESSION['Login']

		$this->load->model("LeadModel");
        
        $url    = $_SERVER["HTTP_HOST"];
        $domain = explode(".", $url);
        $domain = $domain[0];
        $domainStatus = $this->LeadModel->getDomainStatus($domain);
        
        if($domainStatus['domain_status'] == "Blocked")
        {   
        	if(isset($_SERVER["HTTP_X_FORWARDED_PROTO"])){
        		$addr = 'https://';
        	}else
        	{
        		$addr = 'http://';
        	}
           session_destroy();
           // echo $_SESSION['Login'];die;
           redirect($addr.$_SERVER["HTTP_HOST"]);
        }
	}
	

	/*
	* To display leads graph
	* @parm 	- none
	* @return 	- none
	*/
	public function index(){

		$data 		= array();
		$response 	= array();
		$whereArr 	= array();
		$filterType = "";

		// check user is admin 
		$sessId 	= getUserIdByUsername($this->Login);
		$userRole 	= getUserRole($sessId);
		
		if( !empty($userRole) ){ 
			
			$startDate		= ""; // Y-m-d
			$endDate		= ""; // Y-m-d

			$reportType		= $this->input->post('reportType');
			$teamId			= $this->input->post('teamId');
			$userId			= $this->input->post('userId');
			$reportSource	= $this->input->post('reportSource');
			$reportStatus	= $this->input->post('reportStatus');
			$reportLeadType	= $this->input->post('reportLeadType');
			$reportBranch	= $this->input->post('reportBranch');

			$whereArr["reportSource"] 	= $reportSource;
			$whereArr["reportStatus"] 	= $reportStatus;
			$whereArr["reportLeadType"] = $reportLeadType;
			$whereArr["reportBranch"] 	= $reportBranch;
			$whereArr["userId"] 		= $sessId;

			// Date range picker - jquery
			$reportrange= $this->input->post('reportrange');
			$reportrange= trim(str_replace(" To ", ",", $reportrange));
			$rangeArr	= explode(",", $reportrange);

			if( !empty($reportrange) ){
				
				if( empty($rangeArr) || !is_array($rangeArr) ){

					$response["error"] 	= "true";
					$response["status"] = "false";
					$response["msg"] 	= "Invalid date format!";
					echo  json_encode($response);return;

				}else{ 
					
					$startDate	= date("Y/m/d", strtotime($rangeArr[0]) ); // Y-m-d
					$endDate	= date("Y/m/d", strtotime($rangeArr[1]) ); // Y-m-d
				}

			}
			// Date range picker - jquery

					
					
			if( ( empty($teamId) || empty($userId) ) && $userRole == "super_admin" || $userRole == "admin" ){
				$uWhere 	= array(); 
			}else if( $userRole == "user" ){
				$uWhere 	= array("id"=>$sessId ,"user_parent_id"=>$sessId); // Defualt parent id condition
			}else{
				$uWhere 	= array("id"=>$sessId ,"user_parent_id"=>$sessId); // Defualt parent id condition
			}

			if( !empty($teamId) ){

				$filterType	= "team";
				$multiUsers = $teamId;
			}else if( !empty($userId) ){

				$filterType	= "user";
				$multiUsers = $userId;
			}else {

				if( $userRole == "super_admin" || $userRole == "admin" ){

					$multiUsers = [];
						
				}else{

					if( $userRole == "user" || $userRole == "sub_user"){
						$multiUsers[] = $sessId;
					}
					$tempUserArr = getUserIdList($uWhere);			// Default all users 
					foreach ($tempUserArr as $key => $value) {
						$multiUsers[] = $value["u_id"];
					}
				}
			}

			// MULTIPLE URSERS
			$countMultiUsers 	= count($multiUsers);
			if( empty($reportType) ){
				$reportType 	= "l7"; 			// Default report Type wise
			}

			// Graph labels
			$data['xTitle']		= "";
			$data['yTitle']		= "Total Leads";

			// GET YEAR LIST
			if( !empty($reportType) && $reportType == "y" ){
				
				$data['xTitle']	= "Years";
				$result 		= $this->LeadModel->yearData($startDate, $endDate, $multiUsers, $whereArr, $userRole, $filterType);
			}

			// GET MONTH LIST
			else if( !empty($reportType) && $reportType == "m" ){
				
				$data['xTitle']	= "Months";
				$result 		= $this->LeadModel->monthData($startDate, $endDate, $multiUsers, $whereArr, $userRole, $filterType);
			}

			// GET DAY LIST
			else if( !empty($reportType) && $reportType == "d" ){
				
				$data['xTitle']	= "Days";
				$result 		= $this->LeadModel->dayData($startDate, $endDate, $multiUsers, $whereArr, $userRole, $filterType);
			}

			// GET LAST 30 DAYS LIST
			else if( !empty($reportType) && $reportType == "l30" ){
				
				$tempStart 		= date('Y/m/d', strtotime('today - 29 days'));
				$tempEnd 		= date('Y/m/d');

				$data['xTitle']	= "Last 30 Days";
				$result 		= $this->LeadModel->dayData($tempStart, $tempEnd, $multiUsers, $whereArr, $userRole, $filterType);
			}

			// GET LAST 7 DAYS LIST
			else if( !empty($reportType) && $reportType == "l7" ){
				
				$tempStart 		= date('Y/m/d', strtotime('today - 6 days'));
				$tempEnd 		= date('Y/m/d');

				$data['xTitle']	= "Last 7 Days";
				$result 		= $this->LeadModel->dayData($tempStart, $tempEnd, $multiUsers, $whereArr, $userRole, $filterType);
			}else{

				// DEFAULT LAST 30 DAYS
				$tempStart 		= date('Y/m/d', strtotime('today - 29 days'));
				$tempEnd 		= date('Y/m/d');

				$data['xTitle']	= "Last 30 Days";
				$result 		= $this->LeadModel->dayData($tempStart, $tempEnd, $multiUsers, $whereArr, $userRole, $filterType);
			}


			$resultSet 		= [];
			$user 			= [];
			$arrayStr 		= "";

			if( !empty($teamId) ){
				for( $hCount 	= 0; $hCount < $countMultiUsers; $hCount++ ){
					$arrayStr	= $arrayStr.",".getTeamNameById($multiUsers[$hCount])."";
				}
			}else if( !empty($userId) ){
				for( $hCount 	= 0; $hCount < $countMultiUsers; $hCount++ ){
					$arrayStr	= $arrayStr.",".getUserNameById($multiUsers[$hCount])."";
				}
			}else{
				for( $hCount 	= 0; $hCount < 1; $hCount++ ){
					$arrayStr	= "Leads";
				}
			}

			$arrayStr 		= explode(",", ltrim($arrayStr,', '));

			$new[] 			= array( 'id'=> $data['xTitle'], "label"=>$data['xTitle'],"type"=>"date" );

			for ( $i=0; $i<count($arrayStr); $i++ ){

				$new[] = array( 'id'=> $arrayStr[$i], "label"=>$arrayStr[$i],"type"=>"number" );
				$new[] = array( 'id'=> 'Tooltip', "label"=>"Tooltip","role"=>"tooltip","type"=>"string","p"=>array( /*"html" => true*/));
			}

			$resultSet['cols']	= $new;

			if( !empty($result) ){

				foreach ($result as $key => $value) {
					
					foreach ($value as $key1 => $value1) {

						$resultSet['rows'][$key]["c"][] = array( "v" => str_replace("`", "", $value1) );

					}
					
				}

			}else{

				$emptyData[0] = "";

				if( !empty($teamId) || !empty($userId) ){
					for( $hCount = 0; $hCount < $countMultiUsers; $hCount++ ){
						$emptyData[] = 0;
					}
				}else{
					for( $hCount = 0; $hCount < 1; $hCount++ ){
						$emptyData[] = 0;
					}
				}

				$resultSet[]	= $emptyData;

			}	
			
			if( isset($_POST['reportType']) ){

				$response["error"] 	= "false";
				$response["status"] = "true";
				$response["msg"] 	= "Records fetch successfully!";
				$response["xTitle"] = $data["xTitle"];
				$response["yTitle"] = $data["yTitle"];
				$response["data"] 	= $resultSet;
				echo  json_encode($response, true);return;
			}
			
			$resultSet 		= json_encode($resultSet, true);
			$data["result"] = $resultSet;

			$userList 		= getUserList($uWhere);
			if( $userRole == "user" ){
				$userList[] = array("u_id"=>$sessId, "name"=>getUserNameById($sessId) );

			}

			$data['userList'] = $userList;

		}

		// get leads source list
		$data['sourceArr'] 	= getLeadsSourceList();

		// get leads status list
		$data['statusArr'] 	= getLeadsStatusList();

		// get leads type list
		$data['leadTypeArr']= getLeadsTypeList();

		// get branch list
		$data['branchArr']	= getBranchList();

		$data['teamArr'] 	= ( $userRole == "super_admin" || $userRole == "admin" ) ? getTeamList() : array();

		$data['page_title'] = "Lead Report";
		$hData['title'] 	= "Lead Report";
		$sData 				= array();
		$fData 				= array();

		$this->load->view( "includes/header", $hData );
		$this->load->view( "includes/sidebar", $sData );
		$this->load->view( "leads_report/lead", $data );
		$this->load->view( "includes/footer", $fData );
		
	}


	/*
	* To display leads tabular view
	* @parm 	- (bool) 	$isJson
	* @return 	- (array/bool) 	$data
	*/
	public function tabularLoadMore( $isJson = true ){

		$data['error'] 		= true; 
		$data['status'] 	= false; 
		$data['msg'] 		= "Invalid request."; 

		$requestData 		= $this->input->post(NULL); 

		if( !empty($requestData['reportrange']) && !empty($requestData['reportType']) && !empty($requestData['dataPoint'])  ){

			// offset and limit
			$page 						= isset($requestData['page']) ? $requestData['page'] : 0;
			$offset 					= TABULAR_LOAD_MORE_LIMIT*$page;
        	$limit 						= TABULAR_LOAD_MORE_LIMIT;

			$whereData["reportType"]	= isset($requestData['reportType']) ? $requestData['reportType'] : NULL;
			$whereData["userId"]		= isset($requestData['userId']) ? $requestData['userId'] : NULL;
			$whereData["teamId"]		= isset($requestData['teamId']) ? $requestData['teamId'] : NULL;
			$whereData["reportSource"]	= isset($requestData['reportSource']) ? $requestData['reportSource'] : NULL;
			$whereData["reportStatus"]	= isset($requestData['reportStatus']) ? $requestData['reportStatus'] : NULL;
			$whereData["reportLeadType"]= isset($requestData['reportLeadType']) ? $requestData['reportLeadType'] : NULL;

			$reportrange				= trim(str_replace(" To ", ",", $requestData['reportrange']));
			$rangeArr					= explode(",", $reportrange);
			$whereData["startDate"]		= date("Y/m/d", strtotime($rangeArr[0]) ); // Y-m-d
			$whereData["endDate"]		= date("Y/m/d", strtotime($rangeArr[1]) ); // Y-m-d
			
		
			// ******************* filter ddl ******************* 
			$sessId 					= getUserIdByUsername($this->Login);
			$userRole 					= getUserRole($sessId);
			$filterType 				= "";

			$teamId						= $whereData["teamId"];
			$userId						= $whereData["userId"];
			$whereData["userId"] 		= $sessId;

			if( ( empty($teamId) || empty($userId) ) && $userRole == "super_admin" || $userRole == "admin" ){
				$uWhere 	= array(); 
			}else if( $userRole == "user" ){
				$uWhere 	= array( "id" => $sessId, "user_parent_id" => $sessId ); // Defualt parent id condition

			}else{
				$uWhere 	= array( "id" => $sessId, "user_parent_id" => $sessId ); // Defualt parent id condition

			}

			if( !empty($teamId) ){

				$filterType	= "team";
				$multiUsers = $teamId;
			}else if( !empty($userId) ){

				$filterType	= "user";
				$multiUsers = $userId;
			}else {

				if( $userRole == "super_admin" || $userRole == "admin" ){

					$multiUsers = [];
				}else{

					if( $userRole == "user" || $userRole == "sub_user"){
						$multiUsers[] = $sessId;
					}

					$tempUserArr = getUserIdList($uWhere);			// Default all users 
					foreach ($tempUserArr as $key => $value) {
						$multiUsers[] = $value["u_id"];
					}
				}

			}

			$whereData["filterType"] 	= $filterType;
			$whereData["userRole"] 		= $userRole;
			$whereData["multiUsers"] 	= $multiUsers;

			// ******************* filter ddl ******************* 

			// check report type to compare lead created at
			if( $whereData['reportType'] == 'y' ){
				$whereData['date'] = trim($requestData['dataPoint']);
			} else if( $whereData['reportType'] == 'm' ){
				$whereData['year'] = date("Y", strtotime($requestData['dataPoint']) );
				$whereData['date'] = date("m", strtotime($requestData['dataPoint']) );
			} else if( $whereData['reportType'] == 'w' ){
				$whereData['date'] = date("Y/m/d", strtotime($requestData['dataPoint']) );
			} else {
				$whereData['date'] = date("Y/m/d", strtotime($requestData['dataPoint']) );
			}

			$tabularSrNo = $offset+1;
			$kanbanSrNo  = $offset+1;

		
			// TABLUAR VIEW
			
			$getTablularRecords 		= $this->LeadModel->getTablularRecords( $whereData, $offset , $limit );
			$getTablularRecordsCount 	= $this->LeadModel->getTablularRecordsCount( $whereData );
			// echo "<pre> controller getTablularRecords -> ";print_r($getTablularRecords);
			// echo "<pre> controller getTablularRecordsCount -> ";print_r($getTablularRecordsCount);

			if( !empty($getTablularRecords) ){

				$tabularHtml = "";
				foreach ($getTablularRecords as $key => $value) {

					$emailAddress = getEmailAddressByEntityId($value["id"]);
					$emailAddressString = "";
					if( !empty($emailAddress) ){
						foreach ($emailAddress as $key1 => $value1) {
							$emailAddressString = $value1['lower'].",";
						}
						$emailAddressString = trim($emailAddressString, ",");
					}

					$assgigned_name = ( isset($value["assgigned_name"]) != "" ) ? $value["assgigned_name"] : ""; 
					$team_name 		= ( isset($value["team_name"]) != "" ) ? "( ".$value["team_name"]." )" : "";
					$ass_team 		= $assgigned_name." ".$team_name;
					
					$tabularHtml .= "<tr>";
					$tabularHtml .= "<td class=''>";
					$tabularHtml .= $tabularSrNo;
					$tabularHtml .= "</td>";
					$tabularHtml .= "<td>";
					$tabularHtml .= ( isset($value["lead_name"]) != "") ? "<a href='http://".$_SERVER["HTTP_HOST"]."/#Lead/view/".$value["id"]."' target='_blank' >".$value["lead_name"]."</a>" : "";
					$tabularHtml .= "</td>";
					$tabularHtml .= "<td>";
					$tabularHtml .= ( isset($value["source"]) != "" ) ? $value["source"] : "";
					$tabularHtml .= "</td>";
					$tabularHtml .= "<td>";
					$tabularHtml .= ( isset($value["status"]) != "" ) ? $value["status"] : "";
					$tabularHtml .= "</td>";
					$tabularHtml .= "<td>";
					$tabularHtml .= ( $emailAddressString != "" ) ? $emailAddressString : "";
					$tabularHtml .= "</td>";
					$tabularHtml .= "<td>";
					$tabularHtml .= ( $ass_team != "" ) ? $ass_team : ""; 
					$tabularHtml .= "</td>";
					$tabularHtml .= "<td>";
					$tabularHtml .= ( isset($value["created_at"]) != "" ) ? $value["created_at"] : "";
					$tabularHtml .= "</td>";
					$tabularHtml .= "</tr>";

					$tabularSrNo++;
				}

				$remaining 			= ( $offset == 0 ) ? ( $getTablularRecordsCount - $limit ) : ( $getTablularRecordsCount - ( $page + 1 ) * $limit );
				$data['error'] 		= false; 
				$data['status'] 	= true; 
				$data['msg'] 		= "Record found."; 
				$data['viewType'] 	= "tabular"; 
				$data['data'] 		= array( "total" => $getTablularRecordsCount, "html" => $tabularHtml, "remaining" => $remaining ); 
				
			} else {

				$tabularHtml = "<tr><td colspan='7' align='center'>No record found.</td></tr>";

				$data['error'] 		= false; 
				$data['status'] 	= true; 
				$data['msg'] 		= "No record found."; 
				$data['viewType'] 	= "tabular"; 
				$data['data'] 		= array( "total" => 0, "html" => $tabularHtml, "remaining" => 0 );

			}

			if( $isJson ){
				echo json_encode($data);return;
			}else{
				return $data;
			}
			
		}

		if( $isJson ){
			echo json_encode($data);return;
		}else{
			return $data;
		}

	}



	/*
	* To get lead data point data
	* @parm 	- none
	* @return 	- none
	*/
	public function dataPointData(){

		$result = $this->tabularLoadMore($isJson=false);
		echo json_encode($result);return;
	}

	
}