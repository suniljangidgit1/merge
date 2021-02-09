<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Emailreport extends CI_Controller {


	public function __construct(){
		parent::__construct();

		$this->load->model("EmailGraphModel");
        $url    = $_SERVER["HTTP_HOST"];
        $domain = explode(".", $url);
        $domain = $domain[0];
        $domainStatus = $this->EmailGraphModel->getDomainStatus($domain);
        if($domainStatus['domain_status'] == "Blocked")
        {   
        	if(isset($_SERVER["HTTP_X_FORWARDED_PROTO"])){
        		$addr = 'http://';
        	}else
        	{
        		$addr = 'https://';
        	}
           session_destroy();
           redirect($addr.$_SERVER["HTTP_HOST"]);
        }
	}
		
	/*
	* To display sms graph
	* @parm 	- none
	* @return 	- none
	*/
	public function index(){

		$data 		= array();
		$response 	= array();
		$whereArr 	= array();

		$startDate	= ""; // Y-m-d
		$endDate	= ""; // Y-m-d

		// check user is admin 
		$sessId 	= "1"; // Session id here of user id
		// $sessId 	= "5dedf2040d6450716"; // Session id here of user id
		// $sessId 	= "5c0d4bf192a286f99"; // Session id here of user id
		// $sessId 	= "5b79b7bc6b5cfe0c0"; // Session id here of user id
		$userRole 	= getUserRole($sessId);
		
		if( !empty($userRole) ){ 
			
			if( $userRole == "sub_user" ){
				$uWhere 	= array("id"=>$sessId); // Defualt parent id condition
			}else{
				$uWhere 	= array("user_parent_id"=>$sessId); // Defualt parent id condition
				$whereArr["selfId"] = $sessId;
			}

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

			$reportType		= $this->input->post('reportType');
			$reportStatus	= $this->input->post('reportStatus');
			$whereArr["reportStatus"] = $reportStatus;
			
			// echo "<pre>";print_r($whereArr);die;
			$userId			= $this->input->post('userId');

			if( empty($userId) ){

				if( $userRole != "sub_user" ){
					$multiUsers[] = $sessId;
				}

				$tempUserArr = getUserIdList($uWhere);			// Default all users 
				foreach ($tempUserArr as $key => $value) {
					$multiUsers[] = $value["u_id"];
				}


			}else{
				$multiUsers = $userId;
			}
			
			// MULTIPLE URSERS
			$countMultiUsers 	= count($multiUsers);

			if( empty($reportType) ){
				$reportType 	= "l7"; 			// Default report Type wise
			}

			// Graph labels
			$data['xTitle']		= "";
			$data['yTitle']		= "Counts";

			// GET YEAR LIST
			if( !empty($reportType) && $reportType == "y" ){

				$data['xTitle']	= "Years";
				$result 		= $this->EmailGraphModel->yearData($startDate, $endDate, $multiUsers, $whereArr);
			}

			// GET MONTH LIST
			else if( !empty($reportType) && $reportType == "m" ){
				
				$data['xTitle']	= "Months";
				$result 		= $this->EmailGraphModel->monthData($startDate, $endDate, $multiUsers, $whereArr);
			}

			// GET WEEK LIST
			else if( !empty($reportType) && $reportType == "w" ){
				
				$data['xTitle']	= "Weeks";
				$result 		= $this->EmailGraphModel->weekData($startDate, $endDate, $multiUsers, $whereArr);
			}

			// GET DAY LIST
			else if( !empty($reportType) && $reportType == "d" ){
				
				$data['xTitle']	= "Days";
				$result 		= $this->EmailGraphModel->dayData($startDate, $endDate, $multiUsers, $whereArr);
			}

			// GET HOUR LIST
			else if( !empty($reportType) && $reportType == "h" ){
				
				$data['xTitle']	= "Hours";
				$result 		= $this->EmailGraphModel->hourData($startDate, $endDate, $multiUsers, $whereArr);
			}

			// GET LAST 30 DAYS LIST
			else if( !empty($reportType) && $reportType == "l30" ){
				
				$tempStart 		= date('Y/m/d', strtotime('today - 29 days'));
				$tempEnd 		= date('Y/m/d');

				$data['xTitle']	= "Last 30 Days";
				$result 		= $this->EmailGraphModel->dayData($tempStart, $tempEnd, $multiUsers, $whereArr);
			}

			// GET LAST 7 DAYS LIST
			else if( !empty($reportType) && $reportType == "l7" ){
				
				$tempStart 		= date('Y/m/d', strtotime('today - 6 days'));
				$tempEnd 		= date('Y/m/d');

				$data['xTitle']	= "Last 7 Days";
				$result 		= $this->EmailGraphModel->dayData($tempStart, $tempEnd, $multiUsers, $whereArr);
			}else{

				// DEFAULT LAST 30 DAYS
				$tempStart 		= date('Y/m/d', strtotime('today - 29 days'));
				$tempEnd 		= date('Y/m/d');

				$data['xTitle']	= "Last 30 Days";
				$result 		= $this->EmailGraphModel->dayData($tempStart, $tempEnd, $multiUsers, $whereArr);
			}

			
			
			$resultSet 		= [];
			
			// Build dynamic array
			$arrayStr 		= "Year";
			for( $hCount 	= 0; $hCount < $countMultiUsers; $hCount++ ){
				$arrayStr	= $arrayStr.",".getUserNameById($multiUsers[$hCount])."";
			}

			$arrayStr 		= explode(",", $arrayStr);
			$resultSet[0]	= $arrayStr;

			if( !empty($result) ){

				foreach ($result as $key => $value) {
					$resultSet[$key+1] = $value;
				}

			}else{

				$emptyData[0] = "";
				for( $hCount = 0; $hCount < $countMultiUsers; $hCount++ ){
					$emptyData[] = 0;
				}
				$resultSet[1]	= $emptyData;

			}	

			if( isset($_POST['reportType']) ){
				// echo json_encode($resultSet, true);die;

				$response["error"] 	= "false";
				$response["status"] = "true";
				$response["msg"] 	= "Records fetch successfully!";
				$response["xTitle"] = $data["xTitle"];
				$response["yTitle"] = $data["yTitle"];
				$response["data"] 	= $resultSet;
				echo  json_encode($response, true);return;
			}
			
			$resultSet = json_encode($resultSet, true);
			// echo "<pre>";print_r($resultSet);die;

			$data["result"] = $resultSet;
			// echo "<pre>";print_r($data["result"]);die;

			$userList = getUserList($uWhere);
			
			if( $userRole != "sub_user" ){
				$userList[] = array("u_id"=>$sessId, "name"=>getUserNameById($sessId) );
			}
			// echo "<pre>";print_r($userList);die;

			$data['userList'] = $userList;
		}

		$hData['title'] 	= "Email report";
		$sData 				= array();
		$fData 				= array();

		$this->load->view( "includes/header", $hData );
		$this->load->view( "includes/sidebar", $sData );
		$this->load->view( "email_report/email_report", $data );
		$this->load->view( "includes/footer", $fData );
		
	}




	
}