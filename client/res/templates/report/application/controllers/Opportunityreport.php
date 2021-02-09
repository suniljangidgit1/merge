<?php defined('BASEPATH') OR exit('No direct script access allowed');

session_start();

class Opportunityreport extends CI_Controller {


	public function __construct(){
		parent::__construct();

		if(empty($_SESSION['Login'])){
            echo "<script>window.location='http://".$_SERVER["HTTP_HOST"]."';</script>";
        }
        $this->Login = $_SESSION['Login'];   
		$this->load->model("OpportunityGraphModel");
		$url    = $_SERVER["HTTP_HOST"];
        $domain = explode(".", $url);
        $domain = $domain[0];
        $domainStatus = $this->OpportunityGraphModel->getDomainStatus($domain);
        
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
	* To display opportunity stage graph
	* @parm 	- none
	* @return 	- none
	*/
	public function oppStage(){

		$data 		= array();
		$response 	= array();
		$whereArr 	= array();
		$filterType = "";

		// check user is admin 
		$sessId 	= getUserIdByUsername($this->Login);
		$userRole 	= getUserRole($sessId);

		if( !empty($userRole) ){ 
			
			$startDate			= ""; // Y-m-d
			$endDate			= ""; // Y-m-d

			$reportType			= $this->input->post('reportType');
			$teamId				= $this->input->post('teamId');
			$userId				= $this->input->post('userId');
			$reportStage		= $this->input->post('reportStage');
			$reportProbability	= $this->input->post('reportProbability');

			$whereArr["reportStage"] 		= $reportStage;
			// $whereArr["reportProbability"] 	= $reportProbability;
			$whereArr["userId"] 			= $sessId;

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
				$uWhere 	= array("user_parent_id"=>$sessId); // Defualt parent id condition
			}else{
				$uWhere 	= array("id"=>$sessId); // Defualt parent id condition
			}

			if( !empty($teamId) ){

				$filterType	= "team";
				$multiUsers = $teamId;
			}else if( !empty($userId) ){

				$filterType	= "user";
				$multiUsers = $userId;
			}else {

				if( $userRole == "super_admin" || $userRole == "admin"){

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
			$data['yTitle']		= "Total Opportunity";

			// GET YEAR LIST
			if( !empty($reportType) && $reportType == "y" ){
				
				$data['xTitle']	= "Years";
				$result 		= $this->OpportunityGraphModel->yearData($startDate, $endDate, $multiUsers, $whereArr, $userRole, $filterType);

			}

			// GET MONTH LIST
			else if( !empty($reportType) && $reportType == "m" ){
				
				$data['xTitle']	= "Months";
				$result 		= $this->OpportunityGraphModel->monthData($startDate, $endDate, $multiUsers, $whereArr, $userRole, $filterType);

			}

			// GET WEEK LIST
			else if( !empty($reportType) && $reportType == "w" ){
				
				$data['xTitle']	= "Weeks";
				$result 		= $this->OpportunityGraphModel->weekData($startDate, $endDate, $multiUsers, $whereArr, $userRole, $filterType);
			}

			// GET DAY LIST
			else if( !empty($reportType) && $reportType == "d" ){
				
				$data['xTitle']	= "Days";
				$result 		= $this->OpportunityGraphModel->dayData($startDate, $endDate, $multiUsers, $whereArr, $userRole, $filterType);
			}

			// GET HOUR LIST
			else if( !empty($reportType) && $reportType == "h" ){
				
				$data['xTitle']	= "Hours";
				$result 		= $this->OpportunityGraphModel->hourData($startDate, $endDate, $multiUsers, $whereArr, $userRole, $filterType);
			}

			// GET LAST 30 DAYS LIST
			else if( !empty($reportType) && $reportType == "l30" ){
				
				$tempStart 		= date('Y/m/d', strtotime('today - 29 days'));
				$tempEnd 		= date('Y/m/d');

				$data['xTitle']	= "Last 30 Days";
				$result 		= $this->OpportunityGraphModel->dayData($tempStart, $tempEnd, $multiUsers, $whereArr, $userRole, $filterType);
			}

			// GET LAST 7 DAYS LIST
			else if( !empty($reportType) && $reportType == "l7" ){
				
				$tempStart 		= date('Y/m/d', strtotime('today - 6 days'));
				$tempEnd 		= date('Y/m/d');

				$data['xTitle']	= "Last 7 Days";
				$result 		= $this->OpportunityGraphModel->dayData($tempStart, $tempEnd, $multiUsers, $whereArr, $userRole, $filterType);

			}else{

				// DEFAULT LAST 30 DAYS
				$tempStart 		= date('Y/m/d', strtotime('today - 29 days'));
				$tempEnd 		= date('Y/m/d');

				$data['xTitle']	= "Last 30 Days";
				$result 		= $this->OpportunityGraphModel->dayData($tempStart, $tempEnd, $multiUsers, $whereArr, $userRole, $filterType);
			}
			
			$resultSet 		= [];

			/* NEW-Lable added in headers */
			$user 		= [];
			$arrayStr 	= "";

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
					$arrayStr	= "Opportunities";
				}
			}

			$arrayStr 		= explode(",", ltrim($arrayStr,', '));

			$new[] = array( 'id'=> $data['xTitle'], "label"=>$data['xTitle'],"type"=>"date" );
			for ( $i=0; $i<count($arrayStr); $i++ ){

				$new[] = array( 'id'=> $arrayStr[$i], "label"=>$arrayStr[$i],"type"=>"number" );
				$new[] = array( 'id'=> 'Tooltip', "label"=>"Tooltip","role"=>"tooltip","type"=>"string","p"=>array( /*"html" => true*/));
			}

			$resultSet['cols']	= $new;

			/* NEW-Lable added in headers */
			
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
			
			$resultSet = json_encode($resultSet, true);

			$data["result"] = $resultSet;

			$userList = getUserList($uWhere);
			if( $userRole == "user" ){
				$userList[] = array("u_id"=>$sessId, "name"=>getUserNameById($sessId) );
			}

			$data['userList'] = $userList;

		}

		// get opportunity list
		$data['stageArr'] 			= getOpportunityStageList();
		// $data['probabilityArr'] 	= getDbOpportunityProbabilityList();
		$data['teamArr'] 			= ( $userRole == "super_admin" || $userRole == "admin" ) ? getTeamList() : array();

		$data['page_title'] 		= "Opportunity By Stage Report";
		$hData['title'] 			= "Opportunity Report";
		$sData 						= array();
		$fData 						= array();

		$this->load->view( "includes/header", $hData );
		$this->load->view( "includes/sidebar", $sData );
		$this->load->view( "opportunity_report/opportunity_stage_report", $data );
		$this->load->view( "includes/footer", $fData );
		
	}


	/*
	* To display leads status tabular or kanban view
	* @parm 	- (bool) 	$isJson
	* @return 	- (array/bool) 	$data
	*/
	public function oppStageTabularLoadMore( $isJson = true ){

		$data['error'] 		= true; 
		$data['status'] 	= false; 
		$data['msg'] 		= "Invalid request."; 

		$requestData 	= $this->input->post(NULL); 
		// echo "<pre> requestData -> ";print_r($requestData);die;


		if( !empty($requestData['reportrange']) && !empty($requestData['reportType']) && !empty($requestData['dataPoint'])  ){

			// offset and limit
			$page 						= isset($requestData['page']) ? $requestData['page'] : 0;
			$offset 					= TABULAR_LOAD_MORE_LIMIT*$page;
        	$limit 						= TABULAR_LOAD_MORE_LIMIT;

			$whereData["reportType"]	= isset($requestData['reportType']) ? $requestData['reportType'] : NULL;
			$whereData["userId"]		= isset($requestData['userId']) ? $requestData['userId'] : NULL;
			$whereData["teamId"]		= isset($requestData['teamId']) ? $requestData['teamId'] : NULL;
			$whereData["reportStage"]	= isset($requestData['reportStage']) ? $requestData['reportStage'] : NULL;

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
				$uWhere 	= array("id"=>$sessId,"user_parent_id"=>$sessId); // Defualt parent id condition
			}else{
				$uWhere 	= array("id"=>$sessId, "user_parent_id"=>$sessId); // Defualt parent id condition
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

			// check view type
			if( !empty($whereData["reportStage"]) ){

				// TABLUAR VIEW

				$getOppStageTablularRecords 		= $this->OpportunityGraphModel->getOppStageTablularRecords( $whereData, $offset , $limit );
				$getOppStageTablularRecordsCount 	= $this->OpportunityGraphModel->getOppStageTablularRecordsCount( $whereData );
				// echo "<pre> controller getOppStageTablularRecords -> ";print_r($getOppStageTablularRecords);
				// echo "<pre> controller getOppStageTablularRecordsCount -> ";print_r($getOppStageTablularRecordsCount);

				if( !empty($getOppStageTablularRecords) ){

					$tabularHtml = "";
					foreach ($getOppStageTablularRecords as $key => $value) {

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
						$tabularHtml .= ( isset($value["opp_name"]) != "") ? "<a href='http://".$_SERVER["HTTP_HOST"]."/#Opportunity/view/".$value["id"]."' target='_blank' >".$value["opp_name"]."</a>" : "";
						// $tabularHtml .= ( $value["opp_name"] != "" ) ? "<a href='http://localhost:8080/fincrm/#Lead/view/".$value["id"]."' target='_blank' >".$value["opp_name"]."</a>" : "";
						$tabularHtml .= "</td>";
						$tabularHtml .= "<td>";
						$tabularHtml .= ( isset($value["stage"]) != "" ) ? $value["stage"] : "";
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

					$remaining 			= ( $offset == 0 ) ? ( $getOppStageTablularRecordsCount - $limit ) : ( $getOppStageTablularRecordsCount - ( $page + 1 ) * $limit );
					$data['error'] 		= false; 
					$data['status'] 	= true; 
					$data['msg'] 		= "Record found."; 
					$data['viewType'] 	= "tabular"; 
					$data['data'] 		= array( "total" => $getOppStageTablularRecordsCount, "html" => $tabularHtml, "remaining" => $remaining ); 
					
				} else {

					$tabularHtml = "<tr><td colspan='6' align='center'>No record found.</td></tr>";

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

			}else{

				// KANBAN VIEW

				// get all lead status 
				$kanbanView 	= '';
				$statusGroupArr = array();
				$stageArr 		= getOpportunityStageList();
				$kanbanStatus 	= $this->input->post("kanbanStatus");
				
				// check if individual status load more request
				if( !empty($kanbanStatus) ){
					$stageArr = array( $kanbanStatus );
				}
				
				if( !empty($stageArr) ){
					foreach ($stageArr as $key => $value) {

						$kanbanPage 	= isset($requestData['kanbanPage']) ? $requestData['kanbanPage'] : 0;
						$kanbanOffset 	= KANABAN_LOAD_MORE_LIMIT*$kanbanPage;
			        	$kanbanLimit 	= KANABAN_LOAD_MORE_LIMIT;
			        	
						$whereData["oppStage"] 		= trim($value);
						$getOppStageKanbanRecords 		= $this->OpportunityGraphModel->getOppStageKanbanRecords( $whereData, $kanbanOffset , $kanbanLimit );
						$getOppStageKanbanRecordsCount 	= $this->OpportunityGraphModel->getOppStageKanbanRecordsCount( $whereData );

						$kanbanRemaining 				= ( $kanbanOffset == 0 ) ? ( (int)$getOppStageKanbanRecordsCount - (int)$kanbanLimit ) : ( (int)$getOppStageKanbanRecordsCount - ( (int)$kanbanPage + 1 ) * (int)$kanbanLimit );

						$statusGroupArr[trim($value)] = array(
							"data" 		=> $getOppStageKanbanRecords,
							"total" 	=> $getOppStageKanbanRecordsCount,
							"remaining" => $kanbanRemaining,
						);
						
						if( empty($kanbanStatus) ){

							$kanbanView .= ' 
							<!-- end single status panel main table columns -->
	                  		<td>
								<div class="table-responsive">
									<table class="table '.trim($value).' ">

										<thead>
											<th>'.trim($value).'<div class="border-bottom"></div></th>
										</thead>

										<tbody> <!-- start here dynamic rows -->';
						}	


						if( !empty($getOppStageKanbanRecords) ){
							
							foreach ($getOppStageKanbanRecords as $key1 => $value1) {
								
								$leadAnchorTag = ( isset($value1["opp_name"]) != "") ? "<a href='http://".$_SERVER["HTTP_HOST"]."/#Opportunity/view/".$value1["id"]."' target='_blank' >".$value1["opp_name"]."</a>" : "";

								$kanbanView .= '
									<!-- start single status panel user data -->
									<tr>
										<td>
											<div>
												<div class="panel panel-default">
													<div class="panel-body">
														<div>
															<div class="row">

																<div class="kanban_section_heading left_alignment">
                                                  					<h5 class="large_content">'.$leadAnchorTag.'</h5>
                                               					</div>

															</div>
														</div>

														<div>
                                            				<div class="row kanban_section_footer">
                                               					<div class="left_alignment">
                                              						<span class="large_content">'.trim($value1["assgigned_name"]).'</span>
                                               					</div>
                                               					<div class="right_alignment">
                                              						<span>'.trim($value1["created_at"]).'</span>
                                               					</div>
                                            				</div>
                                         				</div>

													</div>
												</div>
											</div>
										</td>
									</tr>
									<!-- end single status panel user data --> ';

							}

							// start load more if records has more than 10 records
							$nextPage = (int)$kanbanPage+1;
							if( !empty($statusGroupArr[trim($value)]['remaining']) && $statusGroupArr[trim($value)]['remaining'] > 0 ){ 
								$kanbanView .= ' 	
								
										<!-- start single status panel load more -->
		                              	<tr>
		                                 	<td class="button_section">
		                                    	<div class="kanban-load-more ">
		                                       		<button type="button" class="'.trim($value).' btn btn-primary left_alignment" value="'.$nextPage.'" onclick="load_more_kanban(this);"  >Show More</button>
		                                       		<span class="right_alignment">Remaining:'.$statusGroupArr[trim($value)]['remaining'].'</span>
		                                    	</div>
		                                 	</td>
		                              	</tr>
		                              	<!-- end single status panel load more -->';
                          	}
							// end load more if records has more than 10 records

						}else{

							if( empty($kanbanStatus) ){
								$kanbanView .= '
									<!-- start here no rows -->
									<tr>
										<td>
											<div>
												<div class="panel panel-default">
													<div class="panel-body">
														<div>
															<div class="row">
																<p>No Data</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
									</tr>
									<!-- end here no rows -->
								';
							}

						}

						if( empty($kanbanStatus) ){

							$kanbanView .= ' 				


										<!-- end here dynamic rows -->

										</tbody>
									</table>
								</div>
							</td>
							<!-- end single status panel main table columns -->';

						}

					}
				}

				$data['error'] 		= false; 
				$data['status'] 	= true; 
				$data['msg'] 		= "Record found."; 
				$data['viewType'] 	= "kanban"; 
				$data['data'] 		= array( "total" => 0, "html" => $kanbanView, "remaining" => 0, "array" => $statusGroupArr );

				if( $isJson ){
					echo json_encode($data);return;
				}else{
					return $data;
				}
			}

		}
		

		if( $isJson ){
			echo json_encode($data);return;
		}else{
			return $data;
		}

	}



	/*
	* To get opp satge data point data
	* @parm 	- none
	* @return 	- none
	*/
	public function oppStageDataPointData(){

		$result = $this->oppStageTabularLoadMore($isJson=false);
		echo json_encode($result);return;
	}



	/*
	* To display opportunity revenue graph
	* @parm 	- none
	* @return 	- none
	*/
	public function oppRevenue(){

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

			$reportType		= ( $this->input->post('reportType') ) ? $this->input->post('reportType') : 'tq';
			$teamId			= $this->input->post('teamId');
			$userId			= $this->input->post('userId');

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
				$uWhere 	= array("user_parent_id"=>$sessId); // Defualt parent id condition
			}else{
				$uWhere 	= array("id"=>$sessId); // Defualt parent id condition
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
				$reportType 	= "m"; 			// Default report Type wise
			}

			// Graph labels
			$data['xTitle']		= "";
			$data['yTitle']		= "Total Opportunity Revenue";

			// GET YEAR LIST
			if( !empty($reportType) && $reportType == "y" ){
				
				$data['xTitle']	= "Years";
				$result 		= $this->OpportunityGraphModel->oppRevenueYearData($startDate, $endDate, $multiUsers, $whereArr, $userRole, $filterType);
			}

			// GET MONTH LIST
			else if( !empty($reportType) && $reportType == "m" ){
				
				$data['xTitle']	= "Months";
				$result 		= $this->OpportunityGraphModel->oppRevenueMonthData($startDate, $endDate, $multiUsers, $whereArr, $userRole, $filterType);
			} 

			// GET THIS THIS QUARTER
			else if( !empty($reportType) && $reportType == "tq" ){
				
				$current_month 	= date('m');
				$current_year 	= date('Y');
				
				if($current_month>=1 && $current_month<=3) {
					$tempStart 	= date('Y-m-d', strtotime('1-January-'.$current_year) ); 
					$tempEnd 	= date('Y-m-d', strtotime('31-March-'.$current_year) );  
				} else  if($current_month>=4 && $current_month<=6) {
					$tempStart 	= date('Y-m-d', strtotime('1-April-'.$current_year) ); 
					$tempEnd 	= date('Y-m-d', strtotime('30-June-'.$current_year) );
				} else  if($current_month>=7 && $current_month<=9) {
					$tempStart 	= date('Y-m-d', strtotime('1-July-'.$current_year) ); 
					$tempEnd 	= date('Y-m-d', strtotime('30-September-'.$current_year) );
				} else  if($current_month>=10 && $current_month<=12) {
					$tempStart 	= date('Y-m-d', strtotime('1-October-'.$current_year) ); 
					$tempEnd 	= date('Y-m-d', strtotime('31-December-'.$current_year) );
				}

				$data['xTitle']	= "This Quarter";
				$result 		= $this->OpportunityGraphModel->oppRevenueMonthData($tempStart, $tempEnd, $multiUsers, $whereArr, $userRole, $filterType);

			} else {

				// DEFAULT THIS QUARTER
				$data['xTitle']	= "Months";
				$result 		= $this->OpportunityGraphModel->oppRevenueMonthData($startDate, $endDate, $multiUsers, $whereArr, $userRole, $filterType);
			}


			$resultSet 		= [];

			/* NEW-Lable added in headers */
			$user 		= [];
			$arrayStr 	= "";

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
					$arrayStr	= "Amount";
				}
			}

			$arrayStr 		= explode(",", ltrim($arrayStr,', '));

			$new[] = array( 'id'=> $data['xTitle'], "label"=>$data['xTitle'],"type"=>"date" );
			for ( $i=0; $i<count($arrayStr); $i++ ){

				$new[] = array( 'id'=> $arrayStr[$i], "label"=>$arrayStr[$i],"type"=>"number" );
				$new[] = array( 'id'=> 'Tooltip', "label"=>"Tooltip","role"=>"tooltip","type"=>"string","p"=>array( /*"html" => true*/));
			}

			$resultSet['cols']	= $new;
			
			/* NEW-Lable added in headers */
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
			
			$resultSet = json_encode($resultSet, true);

			$data["result"] = $resultSet;

			$userList = getUserList($uWhere);
			if( $userRole == "user" ){
				$userList[] = array("u_id"=>$sessId, "name"=>getUserNameById($sessId) );
			}

			$data['userList'] = $userList;

		}

		// get leads status list
		$data['teamArr'] 	= ( $userRole == "super_admin" || $userRole == "admin" ) ? getTeamList() : array();

		$data['page_title'] = "Opportunity By Revenue Report";
		$hData['title'] 	= "Opportunity Report";
		$sData 				= array();
		$fData 				= array();

		$this->load->view( "includes/header", $hData );
		$this->load->view( "includes/sidebar", $sData );
		$this->load->view( "opportunity_report/opportunity_revenue_report", $data );
		$this->load->view( "includes/footer", $fData );
		
	}


	/*
	* To display opportunity revenue tabular or kanban view
	* @parm 	- (bool) 	$isJson
	* @return 	- (array/bool) 	$data
	*/
	public function oppRevenueTabularLoadMore( $isJson = true ){

		$data['error'] 		= true; 
		$data['status'] 	= false; 
		$data['msg'] 		= "Invalid request."; 

		$requestData 	= $this->input->post(NULL);

		if( !empty($requestData['reportrange']) && !empty($requestData['reportType']) && !empty($requestData['dataPoint'])  ){

			// offset and limit
			$page 						= isset($requestData['page']) ? $requestData['page'] : 0;
			$offset 					= TABULAR_LOAD_MORE_LIMIT*$page;
        	$limit 						= TABULAR_LOAD_MORE_LIMIT;

			$whereData["reportType"]	= isset($requestData['reportType']) ? $requestData['reportType'] : NULL;
			$whereData["userId"]		= isset($requestData['userId']) ? $requestData['userId'] : NULL;
			$whereData["teamId"]		= isset($requestData['teamId']) ? $requestData['teamId'] : NULL;

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
				$uWhere 	= array("user_parent_id"=>$sessId); // Defualt parent id condition
			}else{
				$uWhere 	= array("id"=>$sessId); // Defualt parent id condition
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

					if( $userRole == "user" || $userRole == "Sub_user"){
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
			$getOppRevenueTablularRecords 			= $this->OpportunityGraphModel->getOppRevenueTablularRecords( $whereData, $offset , $limit );
			$getOppRevenueTablularRecordsCount 	    = $this->OpportunityGraphModel->getOppRevenueTablularRecordsCount( $whereData );
			/*echo "<pre> controller getOppRevenueTablularRecords -> ";print_r($getOppRevenueTablularRecords);die;
			echo "<pre> controller getOppRevenueTablularRecordsCount -> ";print_r($getOppRevenueTablularRecordsCount);die;*/

			if( !empty($getOppRevenueTablularRecords) ){

				$tabularHtml = "";
				foreach ($getOppRevenueTablularRecords as $key => $value) {

					$assgigned_name = ( isset($value["assgigned_name"]) != "" ) ? $value["assgigned_name"] : ""; 
					$team_name 		= ( isset($value["team_name"]) != "" ) ? "( ".$value["team_name"]." )" : "";
					$ass_team 		= $assgigned_name." ".$team_name;
					
					$tabularHtml .= "<tr>";
					$tabularHtml .= "<td class=''>";
					$tabularHtml .= $tabularSrNo;
					$tabularHtml .= "</td>";
					$tabularHtml .= "<td>";
					$tabularHtml .= ( isset($value["name"]) != "") ? "<a href='http://".$_SERVER["HTTP_HOST"]."/#Opportunity/view/".$value["id"]."' target='_blank' >".$value["name"]."</a>" : "";
					// $tabularHtml .= ( $value["name"] != "" ) ? "<a href='http://localhost:8080/fincrm/#Lead/view/".$value["id"]."' target='_blank' >".$value["name"]."</a>" : "";
					$tabularHtml .= "</td>";
					$tabularHtml .= "<td>";
					$tabularHtml .= ( isset($value["account_name"]) != "" ) ? $value["account_name"] : "";
					$tabularHtml .= "</td>";
					$tabularHtml .= "<td>";
					$tabularHtml .= ( isset($value["amount"]) != "" ) ? numberToIndianFormat($value["amount"]) : "";
					$tabularHtml .= "</td>";
					$tabularHtml .= "<td>";
					$tabularHtml .= ( $ass_team != "" ) ? $ass_team : ""; 
					$tabularHtml .= "</td>";
					$tabularHtml .= "<td>";
					$tabularHtml .= ( isset($value["close_date"]) != "" ) ? $value["close_date"] : "";
					$tabularHtml .= "</td>";
					$tabularHtml .= "</tr>";

					$tabularSrNo++;
				}

				$remaining 			= ( $offset == 0 ) ? ( $getOppRevenueTablularRecordsCount - $limit ) : ( $getOppRevenueTablularRecordsCount - ( $page + 1 ) * $limit );
				$data['error'] 		= false; 
				$data['status'] 	= true; 
				$data['msg'] 		= "Record found."; 
				$data['viewType'] 	= "tabular"; 
				$data['data'] 		= array( "total" => $getOppRevenueTablularRecordsCount, "html" => $tabularHtml, "remaining" => $remaining ); 
				
			} else {

				$tabularHtml = "<tr><td colspan='6' align='center'>No record found.</td></tr>";

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
	* To get opportunity revenue data point data
	* @parm 	- none
	* @return 	- none
	*/
	public function oppRevenueDataPointData(){

		$result = $this->oppRevenueTabularLoadMore($isJson=false);
		echo json_encode($result);return;
	}



	
}