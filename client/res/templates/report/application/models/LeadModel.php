<?php defined('BASEPATH') OR exit('No direct script access allowed');


class LeadModel extends CI_Model {

 	public function __construct(){
		parent::__construct();

	}


	/*
	* To get year array for graph
	* @parm 	- (string) $startDate
	* @parm 	- (string) $endDate
	* @parm 	- (array) $userArr
	* @parm 	- (array) $whereArr
	* @parm 	- (string) $userRole
	* @parm 	- (string) $filterType
	* @return 	- (array) $yearArr
	*/
	public function yearData($startDate="", $endDate="", $userArr=array(), $whereArr=array(), $userRole="", $filterType=""){

		$yearCount 		= 0;
		$yearArr 		= [];

		$tempStartDate	= date('y',strtotime($startDate));
		$tempEndDate	= date('y',strtotime($endDate));
		$getYears 		= getYears($tempStartDate, $tempEndDate);
		
		if( empty($userArr) && ( $userRole == "super_admin" || $userRole == "admin"  || $userRole == "user" ) ){
			
			$key = 0;

			foreach ($getYears as $key1 => $value1) {

				$this->db->select("count(l.id) as count, DATE_FORMAT(l.created_at,'%Y') as created_at ");
				$this->db->order_by("YEAR(l.created_at) ASC");
				$this->db->join("user as u", "u.id = l.created_by_id", "inner");
				$this->db->join("user as u1", "u1.id = l.assigned_user_id", "left");

				$this->db->group_start();
				$this->db->where("l.deleted", "0" );
				$this->db->group_end();	

				$this->db->group_start();
				$this->db->where("YEAR(l.created_at)", $value1 );
				$this->db->group_end();

				$this->db->group_start();
				$this->db->where("DATE(l.created_at) >=", $startDate );
				$this->db->group_end();

				$this->db->group_start();
				$this->db->where("DATE(l.created_at) <=", $endDate );
				$this->db->group_end();

				if( isset($whereArr["reportSource"]) && $whereArr["reportSource"] != "" ){
					$this->db->group_start();
					$this->db->where("l.source", $whereArr["reportSource"] );
					$this->db->group_end();
				}

				if( isset($whereArr["reportStatus"]) && $whereArr["reportStatus"] != "" ){
					$this->db->group_start();
					$this->db->where("l.status", $whereArr["reportStatus"] );
					$this->db->group_end();
				}

				if( isset($whereArr["reportLeadType"]) && $whereArr["reportLeadType"] != "" ){
					$this->db->group_start();
					$this->db->where("l.lead_type", $whereArr["reportLeadType"] );
					$this->db->group_end();
				}

				if( isset($whereArr["reportBranch"]) && $whereArr["reportBranch"] != "" ){
					$this->db->group_start();
					$this->db->where("u1.office_location_id", $whereArr["reportBranch"] );
					$this->db->group_end();
				}

				if( !empty($whereArr["userId"]) && $userRole == "user" ){
					$this->db->group_start();
					$this->db->where("u.user_parent_id", $whereArr["userId"] );
					$this->db->or_where("u.id", $whereArr["userId"] );
					$this->db->group_end();
				}

				$yearCount = $this->db->get("lead as l")->row_array();
				// echo "<br>ALL -> ".$this->db->last_query();
				// echo "<pre>";print_r($yearCount);

				if( !empty($yearCount) ){
					$yearArr[$key][]	= array( "count" => $yearCount['count'], "created_at" => $value1, "tooltip" => $yearCount['count'] );
				}else{
					$yearArr[$key][]	= array( "count" => 0, "created_at" => $value1, "tooltip" => 0 );
				}

			}

			$yearArr = $this->graphData($yearArr, 1, count($getYears));
			// echo "<pre> ";print_r($yearArr);die;

		} else {
			
			if( $filterType == "user" || $userRole == "sub_user" ){

				foreach ($userArr as $key => $uid) {
					
					foreach ($getYears as $key1 => $value1) {

						$this->db->select("count(l.id) as count, DATE_FORMAT(l.created_at,'%Y') as created_at ");
						$this->db->group_by("YEAR(l.created_at)");
						$this->db->order_by("YEAR(l.created_at) ASC");
						$this->db->join("user as u", "u.id = l.created_by_id", "inner");
						$this->db->join("user as u1", "u1.id = l.assigned_user_id", "left");	

						$this->db->group_start();
						$this->db->where("l.deleted", "0" );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("l.assigned_user_id", $uid );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("YEAR(l.created_at)", $value1 );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("DATE(l.created_at) >=", $startDate );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("DATE(l.created_at) <=", $endDate );
						$this->db->group_end();

						if( isset($whereArr["reportSource"]) && $whereArr["reportSource"] != "" ){
							$this->db->group_start();
							$this->db->where("l.source", $whereArr["reportSource"] );
							$this->db->group_end();
						}

						if( isset($whereArr["reportStatus"]) && $whereArr["reportStatus"] != "" ){
							$this->db->group_start();
							$this->db->where("l.status", $whereArr["reportStatus"] );
							$this->db->group_end();
						}

						if( isset($whereArr["reportBranch"]) && $whereArr["reportBranch"] != "" ){
							$this->db->group_start();
							$this->db->where("u1.office_location_id", $whereArr["reportBranch"] );
							$this->db->group_end();
						}

						if( isset($whereArr["reportLeadType"]) && $whereArr["reportLeadType"] != "" ){
							$this->db->group_start();
							$this->db->where("l.lead_type", $whereArr["reportLeadType"] );
							$this->db->group_end();
						}

						$yearCount = $this->db->get("lead as l")->row_array();
						// echo "<br>Indiv :".$this->db->last_query();
						// echo "<pre>";print_r($yearCount);die;

						if( !empty($yearCount) ){
							$yearArr[$key][]	= array( "count" => $yearCount['count'], "created_at" => $value1, "tooltip" => $yearCount['count']  );
						}else{
							$yearArr[$key][]	= array( "count" => 0, "created_at" => $value1, "tooltip" => "0"  );
						}

					}

				}

			}else{

				// team flow here
				foreach ($userArr as $key => $uid) {
				
					foreach ($getYears as $key1 => $value1) {

						$this->db->select("count(l.id) as count, DATE_FORMAT(l.created_at,'%Y') as created_at ");
						$this->db->group_by("YEAR(l.created_at)");
						$this->db->order_by("YEAR(l.created_at) ASC");
						$this->db->join("user as u", "u.id = l.created_by_id", "inner");
						$this->db->join("entity_team as et", "et.entity_id = l.id", "inner");	
						$this->db->join("user as u1", "u1.id = l.assigned_user_id", "left");

						$this->db->group_start();
						$this->db->where("et.team_id", $uid );
						$this->db->where("et.deleted", "0" );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("l.deleted", "0" );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("YEAR(l.created_at)", $value1 );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("DATE(l.created_at) >=", $startDate );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("DATE(l.created_at) <=", $endDate );
						$this->db->group_end();

						if( isset($whereArr["reportSource"]) && $whereArr["reportSource"] != "" ){
							$this->db->group_start();
							$this->db->where("l.source", $whereArr["reportSource"] );
							$this->db->group_end();
						}

						if( isset($whereArr["reportStatus"]) && $whereArr["reportStatus"] != "" ){
							$this->db->group_start();
							$this->db->where("l.status", $whereArr["reportStatus"] );
							$this->db->group_end();
						}

						if( isset($whereArr["reportLeadType"]) && $whereArr["reportLeadType"] != "" ){
							$this->db->group_start();
							$this->db->where("l.lead_type", $whereArr["reportLeadType"] );
							$this->db->group_end();
						}

						if( isset($whereArr["reportBranch"]) && $whereArr["reportBranch"] != "" ){
							$this->db->group_start();
							$this->db->where("u1.office_location_id", $whereArr["reportBranch"] );
							$this->db->group_end();
						}

						$yearCount = $this->db->get("lead as l")->row_array();
						// echo "<br>Indiv :".$this->db->last_query();
						// echo "<pre>";print_r($yearCount);die;

						if( !empty($yearCount) ){
							$yearArr[$key][]	= array( "count" => $yearCount['count'], "created_at" => $value1, "tooltip" => $yearCount['count']  );
						}else{
							$yearArr[$key][]	= array( "count" => 0, "created_at" => $value1, "tooltip" => "0"  );
						}

					}

				}
			}

			// echo "<pre> ";print_r($yearArr);die;
			$yearArr = $this->graphData($yearArr, count($userArr), count($getYears));
		}
		
		// echo "<pre> ";print_r($yearArr);die;
		return $yearArr;

	}


	
	/*
	* To get month array for graph
	* @parm 	- (string) $startDate
	* @parm 	- (string) $endDate
	* @parm 	- (array) $userArr
	* @parm 	- (array) $whereArr
	* @parm 	- (string) $userRole
	* @parm 	- (string) $filterType
	* @return 	- (array) $monthArr
	*/
	public function monthData($startDate="", $endDate="", $userArr=array(), $whereArr=array(), $userRole="", $filterType=""){

		$monthCount 	= 0;
		$monthArr 		= [];

		$tempStartDate	= date('Y-m-d',strtotime($startDate));
		$tempEndDate	= date('Y-m-d',strtotime($endDate));
		$getMonths 		= getMonths($tempStartDate, $tempEndDate);

		if( empty($userArr) && ( $userRole == "super_admin" || $userRole == "admin"  || $userRole == "user" ) ){
			
			$key = 0;

			foreach ($getMonths as $key2 => $value2) {
				
				$arrYearMonth = explode("-",$value2);

				$this->db->select("count(l.id) as count, DATE_FORMAT(l.created_at,'%Y') as created_at ");
				$this->db->group_by("YEAR(l.created_at),MONTH(l.created_at)");
				$this->db->order_by("YEAR(l.created_at),MONTH(l.created_at) ASC");
				$this->db->join("user as u", "u.id = l.created_by_id", "inner");	
				$this->db->join("user as u1", "u1.id = l.assigned_user_id", "left");

				$this->db->group_start();
				$this->db->where("l.deleted", "0" );
				$this->db->group_end();	
				
				$this->db->group_start();
				$this->db->where("YEAR(l.created_at)", $arrYearMonth[0] );
				$this->db->group_end();

				$this->db->group_start();
				$this->db->where("MONTH(l.created_at)", $arrYearMonth[1] );
				$this->db->group_end();
				
				$this->db->group_start();
				$this->db->where("DATE(l.created_at) >=", $startDate );
				$this->db->group_end();

				$this->db->group_start();
				$this->db->where("DATE(l.created_at) <=", $endDate );
				$this->db->group_end();

				if( isset($whereArr["reportSource"]) && $whereArr["reportSource"] != "" ){
					$this->db->group_start();
					$this->db->where("l.source", $whereArr["reportSource"] );
					$this->db->group_end();
				}

				if( isset($whereArr["reportStatus"]) && $whereArr["reportStatus"] != "" ){
					$this->db->group_start();
					$this->db->where("l.status", $whereArr["reportStatus"] );
					$this->db->group_end();
				}

				if( isset($whereArr["reportLeadType"]) && $whereArr["reportLeadType"] != "" ){
					$this->db->group_start();
					$this->db->where("l.lead_type", $whereArr["reportLeadType"] );
					$this->db->group_end();
				}

				if( isset($whereArr["reportBranch"]) && $whereArr["reportBranch"] != "" ){
					$this->db->group_start();
					$this->db->where("u1.office_location_id", $whereArr["reportBranch"] );
					$this->db->group_end();
				}

				if( !empty($whereArr["userId"]) && $userRole == "user" ){
					$this->db->group_start();
					$this->db->where("u.user_parent_id", $whereArr["userId"] );
					$this->db->or_where("u.id", $whereArr["userId"] );
					$this->db->group_end();
				}

				$monthCount = $this->db->get("lead as l")->row_array();
				// echo "<br> > ALL USERS > ".$this->db->last_query();
				// echo "<pre>";print_r($monthCount);

				if( !empty($monthCount) ){
					$monthArr[$key][]	= array( "count" => $monthCount['count'], "created_at" => getMonthName($arrYearMonth[1])." ".$arrYearMonth[0], "tooltip" => $monthCount['count'] );

				}else{
					$monthArr[$key][]	= array( "count" => 0, "created_at" => getMonthName($arrYearMonth[1])." ".$arrYearMonth[0], "tooltip" => 0 );
				}

			}

			$monthArr = $this->graphData($monthArr, 1, count($getMonths));

		}else{


			if( $filterType == "user" || $userRole == "sub_user" ){ 

				foreach ($userArr as $key => $uid) {

					foreach ($getMonths as $key2 => $value2) {
						
						$arrYearMonth = explode("-",$value2);

						$this->db->select("count(l.id) as count, DATE_FORMAT(l.created_at,'%Y') as created_at ");
						$this->db->group_by("YEAR(l.created_at),MONTH(l.created_at)");
						$this->db->order_by("YEAR(l.created_at),MONTH(l.created_at) ASC");
						$this->db->join("user as u", "u.id = l.created_by_id", "inner");	
						$this->db->join("user as u1", "u1.id = l.assigned_user_id", "left");

						$this->db->group_start();
						$this->db->where("l.deleted", "0" );
						$this->db->group_end();
						
						$this->db->group_start();
						$this->db->where("l.assigned_user_id", $uid );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("YEAR(l.created_at)", $arrYearMonth[0] );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("MONTH(l.created_at)", $arrYearMonth[1] );
						$this->db->group_end();
						
						$this->db->group_start();
						$this->db->where("DATE(l.created_at) >=", $startDate );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("DATE(l.created_at) <=", $endDate );
						$this->db->group_end();

						if( isset($whereArr["reportSource"]) && $whereArr["reportSource"] != "" ){
							$this->db->group_start();
							$this->db->where("l.source", $whereArr["reportSource"] );
							$this->db->group_end();
						}

						if( isset($whereArr["reportStatus"]) && $whereArr["reportStatus"] != "" ){
							$this->db->group_start();
							$this->db->where("l.status", $whereArr["reportStatus"] );
							$this->db->group_end();
						}

						if( isset($whereArr["reportLeadType"]) && $whereArr["reportLeadType"] != "" ){
							$this->db->group_start();
							$this->db->where("l.lead_type", $whereArr["reportLeadType"] );
							$this->db->group_end();
						}

						if( isset($whereArr["reportBranch"]) && $whereArr["reportBranch"] != "" ){
							$this->db->group_start();
							$this->db->where("u1.office_location_id", $whereArr["reportBranch"] );
							$this->db->group_end();
						}

						$monthCount = $this->db->get("lead as l")->row_array();
						// echo "<br> > USERS > ".$this->db->last_query();
						// echo "<pre>";print_r($monthCount);die;

						if( !empty($monthCount) ){
							$monthArr[$key][]	= array( "count" => $monthCount['count'], "created_at" => getMonthName($arrYearMonth[1])." ".$arrYearMonth[0], "tooltip" => $monthCount['count'] );
						}else{
							$monthArr[$key][]	= array( "count" => 0, "created_at" => getMonthName($arrYearMonth[1])." ".$arrYearMonth[0], "tooltip" => 0 );
						}

					}

				}

			}else{

				// team flow here
				foreach ($userArr as $key => $uid) {

					foreach ($getMonths as $key2 => $value2) {
						
						$arrYearMonth = explode("-",$value2);

						$this->db->select("count(l.id) as count, DATE_FORMAT(l.created_at,'%Y') as created_at ");
						$this->db->group_by("YEAR(l.created_at),MONTH(l.created_at)");
						$this->db->order_by("YEAR(l.created_at),MONTH(l.created_at) ASC");
						$this->db->join("user as u", "u.id = l.created_by_id", "inner");
						$this->db->join("entity_team as et", "et.entity_id = l.id", "inner");	
						$this->db->join("user as u1", "u1.id = l.assigned_user_id", "left");

						$this->db->group_start();
						$this->db->where("et.team_id", $uid );
						$this->db->where("et.deleted", "0" );
						$this->db->group_end();
								
						$this->db->group_start();
						$this->db->where("l.deleted", "0" );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("YEAR(l.created_at)", $arrYearMonth[0] );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("MONTH(l.created_at)", $arrYearMonth[1] );
						$this->db->group_end();
						
						$this->db->group_start();
						$this->db->where("DATE(l.created_at) >=", $startDate );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("DATE(l.created_at) <=", $endDate );
						$this->db->group_end();

						if( isset($whereArr["reportSource"]) && $whereArr["reportSource"] != "" ){
							$this->db->group_start();
							$this->db->where("l.source", $whereArr["reportSource"] );
							$this->db->group_end();
						}

						if( isset($whereArr["reportStatus"]) && $whereArr["reportStatus"] != "" ){
							$this->db->group_start();
							$this->db->where("l.status", $whereArr["reportStatus"] );
							$this->db->group_end();
						}

						if( isset($whereArr["reportLeadType"]) && $whereArr["reportLeadType"] != "" ){
							$this->db->group_start();
							$this->db->where("l.lead_type", $whereArr["reportLeadType"] );
							$this->db->group_end();
						}

						if( isset($whereArr["reportBranch"]) && $whereArr["reportBranch"] != "" ){
							$this->db->group_start();
							$this->db->where("u1.office_location_id", $whereArr["reportBranch"] );
							$this->db->group_end();
						}


						$monthCount = $this->db->get("lead as l")->row_array();
						// echo "<br> > USERS > ".$this->db->last_query();
						// echo "<pre>";print_r($monthCount);die;

						if( !empty($monthCount) ){
							$monthArr[$key][]	= array( "count" => $monthCount['count'], "created_at" => getMonthName($arrYearMonth[1])." ".$arrYearMonth[0], "tooltip" => $monthCount['count'] );
						}else{
							$monthArr[$key][]	= array( "count" => 0, "created_at" => getMonthName($arrYearMonth[1])." ".$arrYearMonth[0], "tooltip" => 0 );
						}

					}

				}
			}

			$monthArr = $this->graphData($monthArr, count($userArr), count($getMonths));
		}

		
		// echo "<pre>";print_r($monthArr);die;
		return $monthArr;
		
	}	


	
	/*
	* To get day array for graph
	* @parm 	- (string) $startDate
	* @parm 	- (string) $endDate
	* @parm 	- (array) $userArr
	* @parm 	- (array) $whereArr
	* @parm 	- (string) $userRole
	* @parm 	- (string) $filterType
	* @return 	- (array) $dayArr
	*/
	public function dayData($startDate="", $endDate="",  $userArr=array(), $whereArr=array(), $userRole="", $filterType=""){

		$dayCount 		= 0;
		$dayArr 		= [];

		$tempStartDate	= date('Y-m-d',strtotime($startDate));
		$tempEndDate	= date('Y-m-d',strtotime($endDate));
		$getDays 		= getDays($tempStartDate, $tempEndDate);
		
		if( empty($userArr) && ( $userRole == "super_admin" || $userRole == "admin"  || $userRole == "user" ) ){
			
			$key = 0;

			foreach ($getDays as $key3 => $value3) {
					
				$this->db->select("count(l.id) as count, DATE_FORMAT(l.created_at, '%Y,%m,%d') as created_at ");
				$this->db->group_by("YEAR(l.created_at), MONTH(l.created_at), WEEK(l.created_at), DAY(l.created_at)");
				$this->db->order_by("YEAR(l.created_at), MONTH(l.created_at), WEEK(l.created_at), DAY(l.created_at) ASC");
				$this->db->join("user as u", "u.id = l.created_by_id", "inner");
				$this->db->join("user as u1", "u1.id = l.assigned_user_id", "left");

				$this->db->group_start();
				$this->db->where("l.deleted", "0" );
				$this->db->group_end();

				$this->db->group_start();
				$this->db->where("DATE(l.created_at)", $value3 );
				$this->db->group_end();

				if( isset($whereArr["reportSource"]) && $whereArr["reportSource"] != "" ){
					$this->db->group_start();
					$this->db->where("l.source", $whereArr["reportSource"] );
					$this->db->group_end();
				}

				if( isset($whereArr["reportStatus"]) && $whereArr["reportStatus"] != "" ){
					$this->db->group_start();
					$this->db->where("l.status", $whereArr["reportStatus"] );
					$this->db->group_end();
				}

				if( isset($whereArr["reportLeadType"]) && $whereArr["reportLeadType"] != "" ){
					$this->db->group_start();
					$this->db->where("l.lead_type", $whereArr["reportLeadType"] );
					$this->db->group_end();
				}

				if( isset($whereArr["reportBranch"]) && $whereArr["reportBranch"] != "" ){
					$this->db->group_start();
					$this->db->where("u1.office_location_id", $whereArr["reportBranch"] );
					$this->db->group_end();
				}

				if( !empty($whereArr["userId"]) && $userRole == "user" ){
					$this->db->group_start();
					$this->db->where("u.user_parent_id", $whereArr["userId"] );
					$this->db->or_where("u.id", $whereArr["userId"] );
					$this->db->group_end();
				}

				$dayCount = $this->db->get("lead as l")->row_array();
				//echo "<br>".$this->db->last_query();
				// echo "<pre>**";print_r($dayCount);

				if( !empty($dayCount) ){
					$dayArr[$key][]	= array( "count" => $dayCount['count'], "created_at" => $dayCount['created_at'], "tooltip" => $dayCount['count'], );
				}else{
					$dayArr[$key][]	= array( "count" => 0, "created_at" => date('Y,m,d', strtotime($value3) ), "tooltip" => 0 );
				}

			}

			$dayArr = $this->graphData($dayArr, 1, count($getDays));

		}else{
			
			if( $filterType == "user" || $userRole == "sub_user" ){

				foreach ($userArr as $key => $uid) {  // start of user foreach

					foreach ($getDays as $key3 => $value3) {
						
						$this->db->select("count(l.id) as count, DATE_FORMAT(l.created_at, '%d %b %Y') as created_at ");
						$this->db->group_by("YEAR(l.created_at), MONTH(l.created_at), WEEK(l.created_at), DAY(l.created_at) ");
						$this->db->order_by("YEAR(l.created_at), MONTH(l.created_at), WEEK(l.created_at), DAY(l.created_at) ASC");
						$this->db->join("user as u", "u.id = l.created_by_id", "inner");
						$this->db->join("user as u1", "u1.id = l.assigned_user_id", "left");

						$this->db->group_start();
						$this->db->where("l.deleted", "0" );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("l.assigned_user_id", $uid );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("DATE(l.created_at)", $value3 );
						$this->db->group_end();

						if( isset($whereArr["reportSource"]) && $whereArr["reportSource"] != "" ){
							$this->db->group_start();
							$this->db->where("l.source", $whereArr["reportSource"] );
							$this->db->group_end();
						}

						if( isset($whereArr["reportStatus"]) && $whereArr["reportStatus"] != "" ){
							$this->db->group_start();
							$this->db->where("l.status", $whereArr["reportStatus"] );
							$this->db->group_end();
						}

						if( isset($whereArr["reportLeadType"]) && $whereArr["reportLeadType"] != "" ){
							$this->db->group_start();
							$this->db->where("l.lead_type", $whereArr["reportLeadType"] );
							$this->db->group_end();
						}

						if( isset($whereArr["reportBranch"]) && $whereArr["reportBranch"] != "" ){
							$this->db->group_start();
							$this->db->where("u1.office_location_id", $whereArr["reportBranch"] );
							$this->db->group_end();
						}

						$dayCount = $this->db->get("lead as l")->row_array();
						// echo "<br>".$this->db->last_query();
						// echo "<pre>";print_r($dayCount);die;

						if( !empty($dayCount) ){
							$dayArr[$key][]	= array( "count" => $dayCount['count'], "created_at" => $dayCount['created_at'], "tooltip" => $dayCount['count'] ) ;
						}else{
							$dayArr[$key][]	= array( "count" => 0, "created_at" => date('Y,m,d', strtotime($value3) ), "tooltip" => 0 );
						}

					}

				
				} // end of user foreach

			}else{

				// team flow here
				foreach ($userArr as $key => $uid) {  // start of user foreach

					foreach ($getDays as $key3 => $value3) {
						
						$this->db->select("count(l.id) as count, DATE_FORMAT(l.created_at, '%Y,%m,%d') as created_at ");
						$this->db->group_by("YEAR(l.created_at), MONTH(l.created_at), WEEK(l.created_at), DAY(l.created_at) ");
						$this->db->order_by("YEAR(l.created_at), MONTH(l.created_at), WEEK(l.created_at), DAY(l.created_at) ASC");
						$this->db->join("user as u", "u.id = l.created_by_id", "inner");
						$this->db->join("entity_team as et", "et.entity_id = l.id", "inner");	
						$this->db->join("user as u1", "u1.id = l.assigned_user_id", "left");

						$this->db->group_start();
						$this->db->where("et.team_id", $uid );
						$this->db->where("et.deleted", "0" );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("l.deleted", "0" );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("DATE(l.created_at)", $value3 );
						$this->db->group_end();

						if( isset($whereArr["reportSource"]) && $whereArr["reportSource"] != "" ){
							$this->db->group_start();
							$this->db->where("l.source", $whereArr["reportSource"] );
							$this->db->group_end();
						}

						if( isset($whereArr["reportStatus"]) && $whereArr["reportStatus"] != "" ){
							$this->db->group_start();
							$this->db->where("l.status", $whereArr["reportStatus"] );
							$this->db->group_end();
						}

						if( isset($whereArr["reportBranch"]) && $whereArr["reportBranch"] != "" ){
							$this->db->group_start();
							$this->db->where("u1.office_location_id", $whereArr["reportBranch"] );
							$this->db->group_end();
						}

						if( isset($whereArr["reportLeadType"]) && $whereArr["reportLeadType"] != "" ){
							$this->db->group_start();
							$this->db->where("l.lead_type", $whereArr["reportLeadType"] );
							$this->db->group_end();
						}

						$dayCount = $this->db->get("lead as l")->row_array();
						// echo "<br>".$this->db->last_query();
						// echo "<pre>";print_r($dayCount);die;

						if( !empty($dayCount) ){
							$dayArr[$key][]	= array( "count" => $dayCount['count'], "created_at" => $dayCount['created_at'], "tooltip" => $dayCount['count'] ) ;
						}else{
							$dayArr[$key][]	= array( "count" => 0, "created_at" => date('Y,m,d', strtotime($value3) ), "tooltip" => 0 );
						}

					}

				
				} // end of user foreach

			}

			$dayArr = $this->graphData($dayArr, count($userArr), count($getDays));

		}

		// echo "<pre>";print_r($dayArr);die;
		return $dayArr;
		
	}	


	

	/*
	* To get tablular records
	* @parm 	- (array) $whereData
	* @parm 	- (int) $offset
	* @parm 	- (int) $limit
	* @parm 	- (bool) $isCount
	* @return 	- (array) $result
	*/
	public function getTablularRecords( $whereData = array(), $offset = "" , $limit = "", $isCount = false ){

		if( !empty($whereData['date']) && !empty($whereData['startDate']) && !empty($whereData['endDate']) && !empty($whereData['reportType']) ){

			// check isCount or not
			if( $isCount ){
				$this->db->select(" COUNT(l.id) as count");
			}else{
				$this->db->select(" l.id, account_name as lead_name, l.source, l.status, CONCAT( u1.first_name,' ', u1.last_name ) as assgigned_name, DATE_FORMAT(l.created_at, '%d %b %Y') as created_at ");
			}

			$this->db->join("user as u", "u.id = l.created_by_id", "inner");
			$this->db->join("user as u1", "u1.id = l.assigned_user_id", "left");

			$this->db->group_start();
			$this->db->where("l.deleted", "0" );
			$this->db->group_end();
						
			$this->db->group_start();
			$this->db->where("DATE(l.created_at) >=", $whereData['startDate'] );
			$this->db->group_end();

			$this->db->group_start();
			$this->db->where("DATE(l.created_at) <=", $whereData['endDate'] );
			$this->db->group_end();

			if( $whereData['reportType'] == 'y' ){
				$this->db->group_start();
				$this->db->where("YEAR(l.created_at)", $whereData['date'] );
				$this->db->group_end();
			} else if( $whereData['reportType'] == 'm' ){
				$this->db->group_start();
				$this->db->where("YEAR(l.created_at)", $whereData['year'] );
				$this->db->where("MONTH(l.created_at)", $whereData['date'] );
				$this->db->group_end();
			} else if( $whereData['reportType'] == 'w' ){
				$this->db->group_start();
				$this->db->where("DATE(l.created_at)", $whereData['date'] );
				$this->db->group_end();
			} else {
				$this->db->group_start();
				$this->db->where("DATE(l.created_at)", $whereData['date'] );
				$this->db->group_end();
			}
			
			if( isset($whereData["reportSource"]) && $whereData["reportSource"] != "" ){
				$this->db->group_start();
				$this->db->where("l.source", $whereData["reportSource"] );
				$this->db->group_end();
			}
			
			if( isset($whereData["reportStatus"]) && $whereData["reportStatus"] != "" ){
				$this->db->group_start();
				$this->db->where("l.status", $whereData["reportStatus"] );
				$this->db->group_end();
			}

			if( isset($whereData["reportLeadType"]) && $whereData["reportLeadType"] != "" ){
				$this->db->group_start();
				$this->db->where("l.lead_type", $whereData["reportLeadType"] );
				$this->db->group_end();
			}

			if( isset($whereData["reportBranch"]) && $whereData["reportBranch"] != "" ){
				$this->db->group_start();
				$this->db->where("u1.office_location_id", $whereData["reportBranch"] );
				$this->db->group_end();
			}

			// Filter : Check super admin/admin/user/userid/teamid

			if( empty($whereData["multiUsers"]) && ( $whereData["userRole"] == "super_admin" || $whereData["userRole"] == "admin"  || $whereData["userRole"] == "user" ) ){

				// if super admin || admin || user
				if( !empty($whereData["userId"]) && $whereData["userRole"] == "user" ){
					$this->db->group_start();
					$this->db->where("u.user_parent_id", $whereData["userId"] );
					$this->db->or_where("u.id", $whereData["userId"] );
					$this->db->group_end();
				}

			}else  {

				if( $whereData["filterType"] == "user" || $whereData["userRole"] == "sub_user" ){
					// if user || sub user 
					$this->db->group_start();
					$this->db->where_in("l.assigned_user_id", $whereData["multiUsers"] );
					$this->db->group_end();

				}else{
					// if team filter
					$this->db->select(" l.id, account_name as lead_name, l.source, l.status, CONCAT( u1.first_name,' ', u1.last_name ) as assgigned_name, t.name as team_name, DATE_FORMAT(l.created_at, '%d %b %Y') as created_at ");

					$this->db->join("entity_team as et", "et.entity_id = l.id", "inner");
					$this->db->join("team as t", "t.id = et.team_id", "inner");	
					
					$this->db->group_start();
					$this->db->where_in("et.team_id", $whereData["multiUsers"] );
					$this->db->where("et.deleted", "0" );
					$this->db->group_end();
				}

			}
		
			// Filter : Check super admin/admin/user/userid/teamid

			$this->db->order_by("l.id","ASC");

			// check isCount or not
			if( $isCount ){
				$result = $this->db->get("lead as l")->row_array();
				// echo "records count -> ".$this->db->last_query();
				return $result["count"];
			}else{
				$this->db->limit($limit, $offset);
				$result = $this->db->get("lead as l")->result_array();
				// echo "records rows -> ".$this->db->last_query();
				return $result;
			}
				
		}
		return false;
	}



	/*
	* To get tablular records
	* @parm 	- (string) $whereData
	* @parm 	- (bool) $isCount
	* @return 	- (array) $result
	*/
	public function getTablularRecordsCount( $whereData = array() ){

		$result = $this->getTablularRecords( $whereData, "" , "", $isCount = true );

		if( !empty($result) ){
			return $result;
		}
		return 0;

	}



	/*
	* To built multiple user graph data
	* @parm 	= (array) $result	
	* @parm 	= (int) $interval	
	* @return 	= (array) $final
	*/
	public function graphData( $result=array(), $userCount="", $interval="" ){
		
		$arr1	=[];
		$arr2	=[];
		$arr4	=[];
		$arr5	=[];
		$arr6	=[];
		$final	=[];

		for($i=0; $i<count($result); $i++){
			for($ik=0; $ik<count($result[$i]); $ik++){
				$arr1[]= $result[$i][$ik];	
			}
		}
		

		for($j=0; $j<count($arr1); $j++){
						
			$arr2["created_at"]		= $arr1[$j]["created_at"];
			$arr2["count"]			= $arr1[$j]["count"];
			$arr2["tooltip"]		= $arr1[$j]["tooltip"];
			$arr4[]					= $arr2["created_at"];
			$arr5[]					= $arr2["count"];
			$arr6[]					= $arr2["tooltip"];
		}
		
		$n = $userCount;
		for($k=0; $k<count($arr4); $k++){
			
			$arr7 	= [];
			$arr7[]	= $arr4[$k];
			$num 	= $n-$userCount;
			
			if( $n>count($arr4) ){ break; }

			$temp 	= 0+$k;
			for( $ki = $num; $ki < $n; $ki++){
				// $arr7[] = (int)$arr5[$ki];
				$arr7[] = (int)$arr5[$temp];
				$arr7[] = $arr6[$temp];
				$temp 	= $temp+$interval;
			}

			$final[] 	= $arr7;
			$n 			= $n+$userCount;
		}

		// echo "<pre> getGraph=";print_r($final);die;
		return $final;
	}

	public function getDomainStatus($url) {
			$newdb = $this->load->database('default1',TRUE);
   			$query = $newdb->select('domain_status');
   			$newdb->where('u_domain_name',$url);
        	$query = $newdb->get('users');
        	return $query ->row_array();
	}


}
