<?php defined('BASEPATH') OR exit('No direct script access allowed');


class OpportunityGraphModel extends CI_Model {

 	public function __construct(){
		parent::__construct();

	}


	/*
	* To get year array for graph - opportunity
	* @parm 	- (string) $startDate
	* @parm 	- (string) $endDate
	* @parm 	- (array) $userArr
	* @parm 	- (array) $whereArr
	* @parm 	- (array) $userRole
	* @parm 	- (array) $filterType
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

				$this->db->select("count(o.id) as count, DATE_FORMAT(o.created_at,'%Y') as created_at ");
				$this->db->group_by("YEAR(o.created_at)");
				$this->db->order_by("YEAR(o.created_at) ASC");
				$this->db->join("user as u", "u.id = o.created_by_id", "inner");	

				$this->db->group_start();
				$this->db->where("o.deleted", "0" );
				$this->db->group_end();

				$this->db->group_start();
				$this->db->where("YEAR(o.created_at)", $value1 );
				$this->db->group_end();

				$this->db->group_start();
				$this->db->where("DATE(o.created_at) >=", $startDate );
				$this->db->group_end();

				$this->db->group_start();
				$this->db->where("DATE(o.created_at) <=", $endDate );
				$this->db->group_end();

				if( isset($whereArr["reportStage"]) && $whereArr["reportStage"] != "" ){

					$this->db->group_start();
					$this->db->where("o.stage", $whereArr["reportStage"] );
					$this->db->group_end();
				}

				if( !empty($whereArr["userId"]) && $userRole == "user" ){

					$this->db->group_start();
					$this->db->where("u.user_parent_id", $whereArr["userId"] );
					$this->db->or_where("u.id", $whereArr["userId"] );
					$this->db->group_end();
				}

				$yearCount = $this->db->get("opportunity as o")->row_array();
				// echo "<br>ALL -> ".$this->db->last_query();
				// echo "<pre>";print_r($yearCount);die;

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

						$this->db->select("count(o.id) as count, DATE_FORMAT(o.created_at,'%Y') as created_at ");
						$this->db->group_by("YEAR(o.created_at)");
						$this->db->order_by("YEAR(o.created_at) ASC");
						$this->db->join("user as u", "u.id = o.created_by_id", "inner");	

						$this->db->group_start();
						$this->db->where("o.deleted", "0" );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("o.assigned_user_id", $uid );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("YEAR(o.created_at)", $value1 );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("DATE(o.created_at) >=", $startDate );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("DATE(o.created_at) <=", $endDate );
						$this->db->group_end();

						if( isset($whereArr["reportStage"]) && $whereArr["reportStage"] != "" ){

							$this->db->group_start();
							$this->db->where("o.stage", $whereArr["reportStage"] );
							$this->db->group_end();
						}

						$yearCount = $this->db->get("opportunity as o")->row_array();
						// echo "<br>Indiv :".$this->db->last_query();
						// echo "<pre>";print_r($yearCount);die;

						if( !empty($yearCount) ){

							$yearArr[$key][]	= array( "count" => $yearCount['count'], "created_at" => $value1, "tooltip" => $yearCount['count']  );
						}else{

							$yearArr[$key][]	= array( "count" => 0, "created_at" => $value1, "tooltip" => 0  );
						}

					}

				}

			}else {

				// team flow here
				foreach ($userArr as $key => $uid) {
					
					foreach ($getYears as $key1 => $value1) {

						$this->db->select("count(o.id) as count, DATE_FORMAT(o.created_at,'%Y') as created_at ");
						$this->db->group_by("YEAR(o.created_at)");
						$this->db->order_by("YEAR(o.created_at) ASC");
						$this->db->join("user as u", "u.id = o.created_by_id", "inner");
						$this->db->join("entity_team as et", "et.entity_id = o.id", "inner");	

						$this->db->group_start();
						$this->db->where("et.team_id", $uid );
						$this->db->where("et.deleted", "0" );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("o.deleted", "0" );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("YEAR(o.created_at)", $value1 );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("DATE(o.created_at) >=", $startDate );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("DATE(o.created_at) <=", $endDate );
						$this->db->group_end();

						if( isset($whereArr["reportStage"]) && $whereArr["reportStage"] != "" ){

							$this->db->group_start();
							$this->db->where("o.stage", $whereArr["reportStage"] );
							$this->db->group_end();
						}

						$yearCount = $this->db->get("opportunity as o")->row_array();
						// echo "<br> Team ->  :".$this->db->last_query();
						// echo "<br> Team -> ";print_r($yearCount);

						if( !empty($yearCount) ){

							$yearArr[$key][]	= array( "count" => $yearCount['count'], "created_at" => $value1, "tooltip" => $yearCount['count']  );
						}else{

							$yearArr[$key][]	= array( "count" => 0, "created_at" => $value1, "tooltip" => 0  );
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
	* To get month array for graph - opportunity
	* @parm 	- (string) $startDate
	* @parm 	- (string) $endDate
	* @parm 	- (array) $userArr
	* @parm 	- (array) $whereArr
	* @parm 	- (array) $userRole
	* @parm 	- (array) $filterType
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

				$this->db->select("count(o.id) as count, DATE_FORMAT(o.created_at,'%Y') as created_at ");
				$this->db->group_by("YEAR(o.created_at),MONTH(o.created_at)");
				$this->db->order_by("YEAR(o.created_at),MONTH(o.created_at) ASC");
				$this->db->join("user as u", "u.id = o.created_by_id", "inner");	
				
				$this->db->group_start();
				$this->db->where("o.deleted", "0" );
				$this->db->group_end();

				$this->db->group_start();
				$this->db->where("YEAR(o.created_at)", $arrYearMonth[0] );
				$this->db->group_end();

				$this->db->group_start();
				$this->db->where("MONTH(o.created_at)", $arrYearMonth[1] );
				$this->db->group_end();
				
				$this->db->group_start();
				$this->db->where("DATE(o.created_at) >=", $startDate );
				$this->db->group_end();

				$this->db->group_start();
				$this->db->where("DATE(o.created_at) <=", $endDate );
				$this->db->group_end();


				if( isset($whereArr["reportStage"]) && $whereArr["reportStage"] != "" ){

					$this->db->group_start();
					$this->db->where("o.stage", $whereArr["reportStage"] );
					$this->db->group_end();
				}

				if( !empty($whereArr["userId"]) && $userRole == "user" ){

					$this->db->group_start();
					$this->db->where("u.user_parent_id", $whereArr["userId"] );
					$this->db->or_where("u.id", $whereArr["userId"] );
					$this->db->group_end();
				}

				$monthCount = $this->db->get("opportunity as o")->row_array();
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

						$this->db->select("count(o.id) as count, DATE_FORMAT(o.created_at,'%Y') as created_at ");
						$this->db->group_by("YEAR(o.created_at),MONTH(o.created_at)");
						$this->db->order_by("YEAR(o.created_at),MONTH(o.created_at) ASC");
						$this->db->join("user as u", "u.id = o.created_by_id", "inner");	
								
						$this->db->group_start();
						$this->db->where("o.deleted", "0" );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("o.assigned_user_id", $uid );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("YEAR(o.created_at)", $arrYearMonth[0] );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("MONTH(o.created_at)", $arrYearMonth[1] );
						$this->db->group_end();
						
						$this->db->group_start();
						$this->db->where("DATE(o.created_at) >=", $startDate );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("DATE(o.created_at) <=", $endDate );
						$this->db->group_end();

						if( isset($whereArr["reportStage"]) && $whereArr["reportStage"] != "" ){

							$this->db->group_start();
							$this->db->where("o.stage", $whereArr["reportStage"] );
							$this->db->group_end();
						}


						$monthCount = $this->db->get("opportunity as o")->row_array();
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

						$this->db->select("count(o.id) as count, DATE_FORMAT(o.created_at,'%Y') as created_at ");
						$this->db->group_by("YEAR(o.created_at),MONTH(o.created_at)");
						$this->db->order_by("YEAR(o.created_at),MONTH(o.created_at) ASC");
						$this->db->join("user as u", "u.id = o.created_by_id", "inner");
						$this->db->join("entity_team as et", "et.entity_id = o.id", "inner");	

						$this->db->group_start();
						$this->db->where("et.team_id", $uid );
						$this->db->where("et.deleted", "0" );
						$this->db->group_end();
								
						$this->db->group_start();
						$this->db->where("o.deleted", "0" );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("YEAR(o.created_at)", $arrYearMonth[0] );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("MONTH(o.created_at)", $arrYearMonth[1] );
						$this->db->group_end();
						
						$this->db->group_start();
						$this->db->where("DATE(o.created_at) >=", $startDate );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("DATE(o.created_at) <=", $endDate );
						$this->db->group_end();


						if( isset($whereArr["reportStage"]) && $whereArr["reportStage"] != "" ){

							$this->db->group_start();
							$this->db->where("o.stage", $whereArr["reportStage"] );
							$this->db->group_end();
						}


						$monthCount = $this->db->get("opportunity as o")->row_array();
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
	* To get week array for graph - opportunity
	* @parm 	- (string) $startDate
	* @parm 	- (string) $endDate
	* @parm 	- (array) $userArr
	* @parm 	- (array) $whereArr
	* @parm 	- (array) $userRole
	* @parm 	- (array) $filterType
	* @return 	- (array) $weekArr
	*/
	public function weekData($startDate="", $endDate="", $userArr=array(), $whereArr=array(), $userRole="", $filterType=""){
		
		$num 		= 0;
		$datapoint1 = array();
		$endDate 	= strtotime($endDate);
		$firstDate 	= date("l",strtotime($startDate));
		$endDateFromDateReange = $endDate;
		$weekCount = 0;

		$stage = "";
		if( isset($whereArr["reportStage"]) && $whereArr["reportStage"] != "" ){
			$stage = 'AND o.stage = "'.$whereArr["reportStage"].'" ';
		}

		$probability = "";
		if( isset($whereArr["reportProbability"]) && $whereArr["reportProbability"] != "" ){
			$probability = 'AND o.probability = "'.$whereArr["reportProbability"].'" ';
		}
			
		$userCondition = "";
		if( !empty($whereArr["userId"]) && $userRole == "user" ){
			$userCondition = 'AND ( u.user_parent_id = "'.$whereArr["userId"].'" OR u.id = "'.$whereArr["userId"].'" ) ';
		}

		if( empty($userArr) && ( $userRole == "super_admin" || $userRole == "admin"  || $userRole == "user" ) ){
			
			$key = 0;

			if($firstDate!=="Sunday"){

				$startdate 	= date("Y-m-d",strtotime($startDate));
				$i 			= strtotime('Saturday', strtotime($startDate));
				$enddate 	= date('Y-m-d', $i);

				$query1 	= $this->db->query('SELECT COUNT(o.id) as count, o.stage FROM opportunity as o INNER JOIN user as u ON u.id = o.created_by_id WHERE DATE_FORMAT(o.created_at,"%Y-%m-%d") BETWEEN "'.$startdate.'" AND "'.$enddate.'" '.$stage.' '.$probability.' '.$userCondition.' GROUP BY o.stage ');

				// $count = $query1->num_rows();
				$count = $query1->result_array();
				// echo "Sunday - last_query1111<<<<<<<<".$this->db->last_query();
				// echo "<pre>count - ";print_r($count);

				$labelsStr = leadOpportunityStageLabels($count);
				// echo "<pre>labelsStr - ";print_r($labelsStr);die;

				$sum1 = 0;
				foreach ($count as $keyWeek1 => $valueWeek1) {
					$sum1 = $sum1+(int)$valueWeek1["count"];
				}
				
				// if( $count == "" ){ $count = 0; }

				// FIND WEEK FROM START DATE
				$weekNo = $this->db->query('SELECT DATE_FORMAT("'.date('Y-m-d', strtotime($enddate)).'", "%u") as weekno')->row_array();
				
				/*$point = array(
					"count" 		=> (int)$count,
					"created_at" 	=> date('d M Y', $i)." - ".date('d M Y',strtotime($enddate)), 
				);*/
				$point = array(
					"count" 		=> (int)$sum1,
					"created_at" 	=> date('d M Y', $i)." - ".date('d M Y',strtotime($enddate)), 
					"tooltip" 		=> $labelsStr, 
				);

				array_push($datapoint1, $point);        
				$weekCount++;
			}

			for($i = strtotime('Sunday', strtotime($startDate)); $i <= $endDate; $i = strtotime('+1 week', $i)){
				
				$num++;
			
				$givenDate 	= strtotime(date('Y-m-d', $i));
				$enddate 	= strtotime("+6 day", $givenDate);
				
				$fdate =  date('Y-m-d', $i);
				$ldate =  date('Y-m-d', $enddate); 

				if( $enddate > $endDateFromDateReange ){
					
					$ldate 		= date('Y-m-d', $endDateFromDateReange);
					$enddate 	= $endDateFromDateReange;
				}

				$query1 	= $this->db->query('SELECT COUNT(o.id) as count, o.stage FROM opportunity as o INNER JOIN user as u ON u.id = o.created_by_id WHERE DATE_FORMAT(o.created_at,"%Y-%m-%d") BETWEEN "'.$fdate.'" AND "'.$ldate.'" '.$stage.' '.$probability.' '.$userCondition.' GROUP BY o.stage ');

				// $count = $query1->num_rows();
				$count = $query1->result_array();
				// echo "Sunday <>- last_query".$this->db->last_query();
				// echo "<pre>count - ";print_r($count);

				$labelsStr = leadOpportunityStageLabels($count);
				// echo "<pre>labelsStr - ";print_r($labelsStr);die;

				$sum2 = 0;
				foreach ($count as $keyWeek2 => $valueWeek2) {
					$sum2 = $sum2+(int)$valueWeek2["count"];
				}

				// if($count==""){ $count=0; }

				// FIND WEEK FROM START DATE
				$weekNo = $this->db->query('SELECT DATE_FORMAT("'.date('Y-m-d', $i).'", "%u") as weekno')->row_array();

				/*$point = array(
					"count" 		=> (int)$count,
					"created_at" 	=> date('d M Y', $i)." - ".date('d M Y', $enddate), 
				);*/
				$point = array(
					"count" 		=> (int)$sum2,
					"created_at" 	=> date('d M Y', $i)." - ".date('d M Y', $enddate), 
					"tooltip" 		=> $labelsStr, 
				);

				array_push($datapoint1, $point);        
				$weekCount++;
			}


			$interval 	= $weekCount/1;
			$listArr 	= array_chunk($datapoint1, $interval);
			// echo "<pre>";print_r($listArr);die;
			$weekArr 	= $this->graphData($listArr, 1, $interval );

		}else{

			
			if( $filterType == "user" || $userRole == "sub_user" ){

				foreach ($userArr as $key => $uid) {
					
					if($firstDate!=="Sunday"){

						$startdate 	= date("Y-m-d",strtotime($startDate));
						$i 			= strtotime('Saturday', strtotime($startDate));
						$enddate 	= date('Y-m-d', $i);

						$query1 	= $this->db->query('SELECT * FROM opportunity as o INNER JOIN user as u ON u.id = o.created_by_id WHERE DATE_FORMAT(o.created_at,"%Y-%m-%d") BETWEEN "'.$startdate.'" AND "'.$enddate.'" AND o.created_by_id = "'.$uid.'" '.$stage.' '.$probability.' ');

						$count 		= $query1->num_rows();
						// echo "last".$this->db->last_query();die;
						
						if( $count == "" ){ $count = 0; }

						// FIND WEEK FROM START DATE
						$weekNo = $this->db->query('SELECT DATE_FORMAT("'.date('Y-m-d', strtotime($enddate)).'", "%u") as weekno')->row_array();
						
						$point = array(
							"count" 		=> (int)$count,
							"created_at" 	=> date('d M Y', $i)." - ".date('d M Y',strtotime($enddate)), 
							"tooltip" 		=> (int)$count, 
						);

						array_push($datapoint1, $point);        
						$weekCount++;
					}

					for($i = strtotime('Sunday', strtotime($startDate)); $i <= $endDate; $i = strtotime('+1 week', $i)){
						
						$num++;
					
						$givenDate 	= strtotime(date('Y-m-d', $i));
						$enddate 	= strtotime("+6 day", $givenDate);
						
						$fdate =  date('Y-m-d', $i);
						$ldate =  date('Y-m-d', $enddate); 

						if( $enddate > $endDateFromDateReange ){
							
							$ldate 		= date('Y-m-d', $endDateFromDateReange);
							$enddate 	= $endDateFromDateReange;
						}

						$query1 	= $this->db->query('SELECT * FROM opportunity as o INNER JOIN user as u ON u.id = o.created_by_id WHERE DATE_FORMAT(o.created_at,"%Y-%m-%d") BETWEEN "'.$fdate.'" AND "'.$ldate.'" AND o.created_by_id = "'.$uid.'" '.$stage.' '.$probability.' ');

						$count = $query1->num_rows();

						if($count==""){
							$count=0;
						}

						// FIND WEEK FROM START DATE
						$weekNo = $this->db->query('SELECT DATE_FORMAT("'.date('Y-m-d', $i).'", "%u") as weekno')->row_array();

						$point = array(
							"count" 		=> (int)$count,
							"created_at" 	=> date('d M Y', $i)." - ".date('d M Y', $enddate), 
							"tooltip" 		=> (int)$count, 
						);

						array_push($datapoint1, $point);        
						$weekCount++;
					}
				
				}

			}else{

				// team flow here
				foreach ($userArr as $key => $uid) {

					if($firstDate!=="Sunday"){

						$startdate 	= date("Y-m-d",strtotime($startDate));
						$i 			= strtotime('Saturday', strtotime($startDate));
						$enddate 	= date('Y-m-d', $i);

						$query1 	= $this->db->query('SELECT * FROM opportunity as o 
							INNER JOIN user as u ON u.id = o.created_by_id INNER JOIN team_user as tu ON tu.user_id = u.id INNER JOIN team as t ON t.id = tu.team_id WHERE DATE_FORMAT(o.created_at,"%Y-%m-%d") BETWEEN "'.$startdate.'" AND "'.$enddate.'" AND t.id = "'.$uid.'" '.$stage.' '.$probability.' ');

						$count 		= $query1->num_rows();
						// echo "last".$this->db->last_query();die;
						
						if( $count == "" ){ $count = 0; }

						// FIND WEEK FROM START DATE
						$weekNo = $this->db->query('SELECT DATE_FORMAT("'.date('Y-m-d', strtotime($enddate)).'", "%u") as weekno')->row_array();
						
						$point = array(
							"count" 		=> (int)$count,
							"created_at" 	=> date('d M Y', $i)." - ".date('d M Y',strtotime($enddate)), 
							"tooltip" 		=> (int)$count, 
						);

						array_push($datapoint1, $point);        
						$weekCount++;
					}

					for($i = strtotime('Sunday', strtotime($startDate)); $i <= $endDate; $i = strtotime('+1 week', $i)){
						
						$num++;
					
						$givenDate 	= strtotime(date('Y-m-d', $i));
						$enddate 	= strtotime("+6 day", $givenDate);
						
						$fdate =  date('Y-m-d', $i);
						$ldate =  date('Y-m-d', $enddate); 

						if( $enddate > $endDateFromDateReange ){
							
							$ldate 		= date('Y-m-d', $endDateFromDateReange);
							$enddate 	= $endDateFromDateReange;
						}

						$query1 	= $this->db->query('SELECT * FROM opportunity as o 
							INNER JOIN user as u ON u.id = o.created_by_id INNER JOIN team_user as tu ON tu.user_id = u.id INNER JOIN team as t ON t.id = tu.team_id WHERE DATE_FORMAT(o.created_at,"%Y-%m-%d") BETWEEN "'.$fdate.'" AND "'.$ldate.'" AND t.id = "'.$uid.'" '.$stage.' '.$probability.' ');

						$count = $query1->num_rows();

						if($count==""){
							$count=0;
						}

						// FIND WEEK FROM START DATE
						$weekNo = $this->db->query('SELECT DATE_FORMAT("'.date('Y-m-d', $i).'", "%u") as weekno')->row_array();

						$point = array(
							"count" 		=> (int)$count,
							"created_at" 	=> date('d M Y', $i)." - ".date('d M Y', $enddate), 
							"tooltip" 		=> (int)$count, 
						);

						array_push($datapoint1, $point);        
						$weekCount++;
					}
				
				}
			}


			$interval 	= $weekCount/count($userArr);
			$listArr 	= array_chunk($datapoint1, $interval);
			// echo "<pre>";print_r($listArr);die;
			$weekArr 	= $this->graphData($listArr, count($userArr), $interval );

		}

				
		// echo "<pre>";print_r($weekArr);die;
		return $weekArr;

		
	}		


	
	/*
	* To get day array for graph - opportunity
	* @parm 	- (string) $startDate
	* @parm 	- (string) $endDate
	* @parm 	- (array) $userArr
	* @parm 	- (array) $whereArr
	* @parm 	- (array) $userRole
	* @parm 	- (array) $filterType
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
					
				$this->db->select("count(o.id) as count, DATE_FORMAT(o.created_at, '%Y,%m,%d') as created_at ");
				$this->db->group_by("YEAR(o.created_at), MONTH(o.created_at), WEEK(o.created_at), DAY(o.created_at) ");
				$this->db->order_by("YEAR(o.created_at), MONTH(o.created_at), WEEK(o.created_at), DAY(o.created_at) ASC");
				$this->db->join("user as u", "u.id = o.created_by_id", "inner");

				$this->db->group_start();
				$this->db->where("o.deleted", "0" );
				$this->db->group_end();

				$this->db->group_start();
				$this->db->where("DATE(o.created_at)", $value3 );
				$this->db->group_end();

				if( isset($whereArr["reportStage"]) && $whereArr["reportStage"] != "" ){

					$this->db->group_start();
					$this->db->where("o.stage", $whereArr["reportStage"] );
					$this->db->group_end();
				}

				if( !empty($whereArr["userId"]) && $userRole == "user" ){

					$this->db->group_start();
					$this->db->where("u.user_parent_id", $whereArr["userId"] );
					$this->db->or_where("u.id", $whereArr["userId"] );
					$this->db->group_end();
				}

				$dayCount = $this->db->get("opportunity as o")->row_array();
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

						$this->db->select("count(o.id) as count, DATE_FORMAT(o.created_at, '%Y,%m,%d') as created_at ");
						$this->db->group_by("YEAR(o.created_at), MONTH(o.created_at), WEEK(o.created_at), DAY(o.created_at) ");
						$this->db->order_by("YEAR(o.created_at), MONTH(o.created_at), WEEK(o.created_at), DAY(o.created_at) ASC");
						$this->db->join("user as u", "u.id = o.created_by_id", "inner");

						$this->db->group_start();
						$this->db->where("o.deleted", "0" );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("o.assigned_user_id", $uid );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("DATE(o.created_at)", $value3 );
						$this->db->group_end();


						if( isset($whereArr["reportStage"]) && $whereArr["reportStage"] != "" ){

							$this->db->group_start();
							$this->db->where("o.stage", $whereArr["reportStage"] );
							$this->db->group_end();
						}

						$dayCount = $this->db->get("opportunity as o")->row_array();
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

						$this->db->select("count(o.id) as count, DATE_FORMAT(o.created_at, '%Y,%m,%d') as created_at ");
						$this->db->group_by("YEAR(o.created_at), MONTH(o.created_at), WEEK(o.created_at), DAY(o.created_at) ");
						$this->db->order_by("YEAR(o.created_at), MONTH(o.created_at), WEEK(o.created_at), DAY(o.created_at) ASC");
						$this->db->join("user as u", "u.id = o.created_by_id", "inner");
						$this->db->join("entity_team as et", "et.entity_id = o.id", "inner");	

						$this->db->group_start();
						$this->db->where("et.team_id", $uid );
						$this->db->where("et.deleted", "0" );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("o.deleted", "0" );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("DATE(o.created_at)", $value3 );
						$this->db->group_end();

						if( isset($whereArr["reportStage"]) && $whereArr["reportStage"] != "" ){

							$this->db->group_start();
							$this->db->where("o.stage", $whereArr["reportStage"] );
							$this->db->group_end();
						}

						$dayCount = $this->db->get("opportunity as o")->row_array();
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
	* To get hour array for graph - opportunity
	* @parm 	- (string) $startDate
	* @parm 	- (string) $endDate
	* @parm 	- (array) $userArr
	* @parm 	- (array) $whereArr
	* @parm 	- (array) $userRole
	* @parm 	- (array) $filterType
	* @return 	- (array) $hourArr
	*/
	public function hourData($startDate="", $endDate="", $userArr=array(), $whereArr=array(), $userRole="", $filterType=""){

		$hourCount 		= 0;
		$hourArr 		= [];

		$startDate		= $startDate." 00:00:00";
		$endDate		= $endDate." 23:00:00";

		$tempStartDate	= date('Y-m-d H:i:s',strtotime($startDate));
		$tempEndDate	= date('Y-m-d H:i:s',strtotime($endDate));
		$getHours 		= getHours($tempStartDate, $tempEndDate);
		
		if( empty($userArr) && ( $userRole == "super_admin" || $userRole == "admin"  || $userRole == "user" ) ){
			
			$key = 0;

			foreach ($getHours as $key3 => $value3) {
				
				$this->db->select("count(o.id) as count, o.stage, DATE_FORMAT(o.created_at, '%d %b %Y %H') as created_at ");
				$this->db->group_by("YEAR(o.created_at), MONTH(o.created_at), WEEK(o.created_at), DAY(o.created_at), HOUR(o.created_at), o.stage ");
				$this->db->order_by("YEAR(o.created_at), MONTH(o.created_at), WEEK(o.created_at), DAY(o.created_at), HOUR(o.created_at) ASC");
				$this->db->join("user as u", "u.id = o.created_by_id", "inner");

				$tempDate = date('Y-m-d', strtotime($value3) );
				$this->db->group_start();
				$this->db->where("DATE(o.created_at)", $tempDate );
				$this->db->group_end();
				
				$tempHour = date('H', strtotime($value3) );
				$this->db->group_start();
				$this->db->where("HOUR(o.created_at)", $tempHour );
				$this->db->group_end();


				if( isset($whereArr["reportStage"]) && $whereArr["reportStage"] != "" ){

					$this->db->group_start();
					$this->db->where("o.stage", $whereArr["reportStage"] );
					$this->db->group_end();
				}

				if( isset($whereArr["reportProbability"]) && $whereArr["reportProbability"] != "" ){

					$this->db->group_start();
					$this->db->where("o.probability", $whereArr["reportProbability"] );
					$this->db->group_end();
				}

				if( !empty($whereArr["userId"]) && $userRole == "user" ){

					$this->db->group_start();
					$this->db->where("u.user_parent_id", $whereArr["userId"] );
					$this->db->or_where("u.id", $whereArr["userId"] );
					$this->db->group_end();
				}


				$hourCount = $this->db->get("opportunity as o")->row_array();
				// echo $this->db->last_query();
				// echo "<pre>";print_r($hourCount);die;

				$labelsStr = leadOpportunityStageLabels($hourCount);
				// echo "<pre>labelsStr - ";print_r($labelsStr);die;

				if( !empty($hourCount) ){

					$sum = 0;
					foreach ($hourCount as $keyHour => $valueHour) {
						$sum = $sum+(int)$valueHour["count"];
					}

					// $hourArr[$key][]	= array( "count" => $hourCount['count'], "created_at" => $hourCount['created_at'].":00" );
					$hourArr[$key][]	= array( "count" => $sum, "created_at" => $hourCount['created_at'].":00", "tooltip" => $labelsStr );
				}else{

					// $hourArr[$key][]	= array( "count" => 0, "created_at" => date('d M Y H', strtotime($value3) ).":00" );
					$hourArr[$key][]	= array( "count" => 0, "created_at" => date('d M Y H', strtotime($value3) ).":00", "tooltip" => $labelsStr );
				}

			}


			$hourArr = $this->graphData($hourArr, 1, count($getHours));

		}else{

			if( $filterType == "user" || $userRole == "sub_user" ){


				foreach ($userArr as $key => $uid) {

					foreach ($getHours as $key3 => $value3) {
						
						$this->db->select("count(o.id) as count, DATE_FORMAT(o.created_at, '%d %b %Y %H') as created_at ");
						$this->db->group_by("YEAR(o.created_at), MONTH(o.created_at), WEEK(o.created_at), DAY(o.created_at), HOUR(o.created_at) ");
						$this->db->order_by("YEAR(o.created_at), MONTH(o.created_at), WEEK(o.created_at), DAY(o.created_at), HOUR(o.created_at) ASC");
						$this->db->join("user as u", "u.id = o.created_by_id", "inner");

						$this->db->group_start();
						$this->db->where("o.created_by_id", $uid );
						$this->db->group_end();

						$tempDate = date('Y-m-d', strtotime($value3) );
						$this->db->group_start();
						$this->db->where("DATE(o.created_at)", $tempDate );
						$this->db->group_end();
						
						$tempHour = date('H', strtotime($value3) );
						$this->db->group_start();
						$this->db->where("HOUR(o.created_at)", $tempHour );
						$this->db->group_end();


						if( isset($whereArr["reportStage"]) && $whereArr["reportStage"] != "" ){

							$this->db->group_start();
							$this->db->where("o.stage", $whereArr["reportStage"] );
							$this->db->group_end();
						}

						if( isset($whereArr["reportProbability"]) && $whereArr["reportProbability"] != "" ){

							$this->db->group_start();
							$this->db->where("o.probability", $whereArr["reportProbability"] );
							$this->db->group_end();
						}


						$hourCount = $this->db->get("opportunity as o")->row_array();
						// echo $this->db->last_query();
						// echo "<pre>";print_r($hourCount);die;

						if( !empty($hourCount) ){

							// $hourArr[$key][]	= array( "count" => $hourCount['count'], "created_at" => $hourCount['created_at'].":00" );
							$hourArr[$key][]	= array( "count" => $hourCount['count'], "created_at" => $hourCount['created_at'].":00", "tooltip" => $hourCount['count'] );
						}else{

							// $hourArr[$key][]	= array( "count" => 0, "created_at" => date('d M Y H', strtotime($value3) ).":00" );
							$hourArr[$key][]	= array( "count" => 0, "created_at" => date('d M Y H', strtotime($value3) ).":00", "tooltip" => "0" );
						}

					}

				}

			}else{

				// team flow here
				foreach ($userArr as $key => $uid) {

					foreach ($getHours as $key3 => $value3) {
						
						$this->db->select("count(o.id) as count, DATE_FORMAT(o.created_at, '%d %b %Y %H') as created_at ");
						$this->db->group_by("YEAR(o.created_at), MONTH(o.created_at), WEEK(o.created_at), DAY(o.created_at), HOUR(o.created_at) ");
						$this->db->order_by("YEAR(o.created_at), MONTH(o.created_at), WEEK(o.created_at), DAY(o.created_at), HOUR(o.created_at) ASC");
						$this->db->join("user as u", "u.id = o.created_by_id", "inner");
						$this->db->join("team_user as tu", "tu.user_id = u.id", "inner");
						$this->db->join("team as t", "t.id = tu.team_id", "inner");

						$this->db->group_start();
						$this->db->where("t.id", $uid );
						$this->db->group_end();

						$tempDate = date('Y-m-d', strtotime($value3) );
						$this->db->group_start();
						$this->db->where("DATE(o.created_at)", $tempDate );
						$this->db->group_end();
						
						$tempHour = date('H', strtotime($value3) );
						$this->db->group_start();
						$this->db->where("HOUR(o.created_at)", $tempHour );
						$this->db->group_end();


						if( isset($whereArr["reportStage"]) && $whereArr["reportStage"] != "" ){

							$this->db->group_start();
							$this->db->where("o.stage", $whereArr["reportStage"] );
							$this->db->group_end();
						}

						if( isset($whereArr["reportProbability"]) && $whereArr["reportProbability"] != "" ){

							$this->db->group_start();
							$this->db->where("o.probability", $whereArr["reportProbability"] );
							$this->db->group_end();
						}


						$hourCount = $this->db->get("opportunity as o")->row_array();
						// echo $this->db->last_query();
						// echo "<pre>";print_r($hourCount);die;

						if( !empty($hourCount) ){

							// $hourArr[$key][]	= array( "count" => $hourCount['count'], "created_at" => $hourCount['created_at'].":00" );
							$hourArr[$key][]	= array( "count" => $hourCount['count'], "created_at" => $hourCount['created_at'].":00", "tooltip" => $hourCount['count'] );
						}else{

							// $hourArr[$key][]	= array( "count" => 0, "created_at" => date('d M Y H', strtotime($value3) ).":00" );
							$hourArr[$key][]	= array( "count" => 0, "created_at" => date('d M Y H', strtotime($value3) ).":00", "tooltip" => "0" );
						}

					}

				}

			}

			$hourArr = $this->graphData($hourArr, count($userArr), count($getHours));

		}


		
		// echo "<pre>";print_r($hourArr);die;
		return $hourArr;
		
	}	


	



	/*
	* To get tablular records - stage
	* @parm 	- (array) $whereData
	* @parm 	- (int) $offset
	* @parm 	- (int) $limit
	* @parm 	- (bool) $isCount
	* @return 	- (array) $result
	*/
	public function getOppStageTablularRecords( $whereData = array(), $offset = "" , $limit = "", $isCount = false ){

		// echo "<pre> model whereData -> ";print_r($whereData);
		if( !empty($whereData['date']) && !empty($whereData['startDate']) && !empty($whereData['endDate']) && !empty($whereData['reportType']) ){

			// check isCount or not
			if( $isCount ){
				$this->db->select(" COUNT(o.id) as count");
			}else{
				$this->db->select(" o.id, o.name as opp_name, o.stage, CONCAT( u1.first_name,' ', u1.last_name ) as assgigned_name, DATE_FORMAT(o.created_at, '%d %b %Y') as created_at ");
			}

			$this->db->join("user as u", "u.id = o.created_by_id", "inner");
			$this->db->join("user as u1", "u1.id = o.assigned_user_id", "left");
			// $this->db->join("account as a", "a.id = o.account_id", "left");

			$this->db->group_start();
			$this->db->where("o.deleted", "0" );
			$this->db->group_end();
						
			$this->db->group_start();
			$this->db->where("DATE(o.created_at) >=", $whereData['startDate'] );
			$this->db->group_end();

			$this->db->group_start();
			$this->db->where("DATE(o.created_at) <=", $whereData['endDate'] );
			$this->db->group_end();

			if( $whereData['reportType'] == 'y' ){
				$this->db->group_start();
				$this->db->where("YEAR(o.created_at)", $whereData['date'] );
				$this->db->group_end();
			} else if( $whereData['reportType'] == 'm' ){
				$this->db->group_start();
				$this->db->where("YEAR(o.created_at)", $whereData['year'] );
				$this->db->where("MONTH(o.created_at)", $whereData['date'] );
				$this->db->group_end();
			} else if( $whereData['reportType'] == 'w' ){
				$this->db->group_start();
				$this->db->where("DATE(o.created_at)", $whereData['date'] );
				$this->db->group_end();
			} else {
				$this->db->group_start();
				$this->db->where("DATE(o.created_at)", $whereData['date'] );
				$this->db->group_end();
			}
			
			if( isset($whereData["reportStage"]) && $whereData["reportStage"] != "" ){
				$this->db->group_start();
				$this->db->where("o.stage", $whereData["reportStage"] );
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
					$this->db->where_in("o.assigned_user_id", $whereData["multiUsers"] );
					$this->db->group_end();

				}else{

					// if team filter
					$this->db->select(" o.id,  o.name as opp_name, o.stage, CONCAT( u1.first_name,' ', u1.last_name ) as assgigned_name, t.name as team_name, DATE_FORMAT(o.created_at, '%d %b %Y') as created_at ");

					$this->db->join("entity_team as et", "et.entity_id = o.id", "inner");
					$this->db->join("team as t", "t.id = et.team_id", "inner");	
					
					$this->db->group_start();
					$this->db->where_in("et.team_id", $whereData["multiUsers"] );
					$this->db->where("et.deleted", "0" );
					$this->db->group_end();


				}

			}
		
			// Filter : Check super admin/admin/user/userid/teamid


			$this->db->order_by("o.id","ASC");

			// check isCount or not
			if( $isCount ){
				$result = $this->db->get("opportunity as o")->row_array();
				// echo "records count -> ".$this->db->last_query();
				// echo "<pre>";print_r($result);die;
				return $result["count"];
			}else{
				$this->db->limit($limit, $offset);
				$result = $this->db->get("opportunity as o")->result_array();
				// echo "records rows -> ".$this->db->last_query();
				// echo "<pre>";print_r($result);die;
				return $result;
			}
				

		}
		return false;
	}



	/*
	* To get tablular records - stage
	* @parm 	- (string) $whereData
	* @parm 	- (bool) $isCount
	* @return 	- (array) $result
	*/
	public function getOppStageTablularRecordsCount( $whereData = array() ){

		$result = $this->getOppStageTablularRecords( $whereData, "" , "", $isCount = true );

		if( !empty($result) ){
			return $result;
		}
		return 0;

	}




	/*
	* To get kanban records - stage
	* @parm 	- (array) $whereData
	* @parm 	- (int) $offset
	* @parm 	- (int) $limit
	* @parm 	- (bool) $isCount
	* @return 	- (array) $result
	*/
	public function getOppStageKanbanRecords( $whereData = array(), $offset = "" , $limit = "", $isCount = false ){

		if( !empty($whereData['date']) && !empty($whereData['startDate']) && !empty($whereData['endDate']) && !empty($whereData['reportType']) ){

			// check isCount or not
			if( $isCount ){
				$this->db->select(" COUNT(o.id) as count");
			}else{
				$this->db->select(" o.id, o.name as opp_name, o.stage, CONCAT( u1.first_name,' ', u1.last_name ) as assgigned_name, DATE_FORMAT(o.created_at, '%d %b %Y') as created_at ");
			}

			$this->db->join("user as u", "u.id = o.created_by_id", "inner");
			$this->db->join("user as u1", "u1.id = o.assigned_user_id", "left");
			// $this->db->join("account as a", "a.id = o.account_id", "left");

			$this->db->group_start();
			$this->db->where("o.deleted", "0" );
			$this->db->group_end();
						
			$this->db->group_start();
			$this->db->where("DATE(o.created_at) >=", $whereData['startDate'] );
			$this->db->group_end();

			$this->db->group_start();
			$this->db->where("DATE(o.created_at) <=", $whereData['endDate'] );
			$this->db->group_end();

			if( $whereData['reportType'] == 'y' ){
				$this->db->group_start();
				$this->db->where("YEAR(o.created_at)", $whereData['date'] );
				$this->db->group_end();
			} else if( $whereData['reportType'] == 'm' ){
				$this->db->group_start();
				$this->db->where("YEAR(o.created_at)", $whereData['year'] );
				$this->db->where("MONTH(o.created_at)", $whereData['date'] );
				$this->db->group_end();
			} else if( $whereData['reportType'] == 'w' ){
				$this->db->group_start();
				$this->db->where("DATE(o.created_at)", $whereData['date'] );
				$this->db->group_end();
			} else {
				$this->db->group_start();
				$this->db->where("DATE(o.created_at)", $whereData['date'] );
				$this->db->group_end();
			}
			
			if( isset($whereData["oppStage"]) && $whereData["oppStage"] != "" ){
				$this->db->group_start();
				$this->db->where("o.stage", $whereData["oppStage"] );
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
					$this->db->where_in("o.assigned_user_id", $whereData["multiUsers"] );
					$this->db->group_end();

				}else{

					// if team filter
					$this->db->select(" o.id,  o.name as opp_name, o.stage, CONCAT( u1.first_name,' ', u1.last_name ) as assgigned_name, t.name as team_name, DATE_FORMAT(o.created_at, '%d %b %Y') as created_at ");

					$this->db->join("entity_team as et", "et.entity_id = o.id", "inner");	
					$this->db->join("team as t", "t.id = et.team_id", "inner");	

					$this->db->group_start();
					$this->db->where_in("et.team_id", $whereData["multiUsers"] );
					$this->db->where("et.deleted", "0" );
					$this->db->group_end();

				}

			}
		
			// Filter : Check super admin/admin/user/userid/teamid


			$this->db->order_by("o.id","ASC");

			// check isCount or not
			if( $isCount ){
				$result = $this->db->get("opportunity as o")->row_array();
				// echo "records count -> ".$this->db->last_query();
				// echo "<pre>";print_r($result);die;
				return $result["count"];
			}else{
				$this->db->limit($limit, $offset);
				$result = $this->db->get("opportunity as o")->result_array();
				// echo "records rows -> ".$this->db->last_query();
				// echo "<pre>";print_r($result);die;
				return $result;
			}
				

		}
		return false;
		
	}



	/*
	* To get kanban records - stage
	* @parm 	- (string) $whereData
	* @parm 	- (bool) $isCount
	* @return 	- (array) $result
	*/
	public function getOppStageKanbanRecordsCount( $whereData = array() ){

		$result = $this->getOppStageKanbanRecords( $whereData, "" , "", $isCount = true );

		if( !empty($result) ){
			return $result;
		}
		return 0;

	}





	/*=============================>START OPP REVENUE REPORT<=============================*/


	/*
	* To get year array for graph - OPP REVENUE
	* @parm 	- (string) $startDate
	* @parm 	- (string) $endDate
	* @parm 	- (array) $userArr
	* @parm 	- (array) $whereArr
	* @parm 	- (string) $userRole
	* @parm 	- (string) $filterType
	* @return 	- (array) $yearArr
	*/
	public function oppRevenueYearData($startDate="", $endDate="", $userArr=array(), $whereArr=array(), $userRole="", $filterType=""){

		$yearCount 		= 0;
		$yearArr 		= [];

		$tempStartDate	= date('y',strtotime($startDate));
		$tempEndDate	= date('y',strtotime($endDate));
		$getYears 		= getYears($tempStartDate, $tempEndDate);
		
		if( empty($userArr) && ( $userRole == "super_admin" || $userRole == "admin"  || $userRole == "user" ) ){
			
			$key = 0;

			foreach ($getYears as $key1 => $value1) {

				$this->db->select("SUM(o.amount) as sum, DATE_FORMAT(o.close_date,'%Y') as close_date ");
				$this->db->group_by("YEAR(o.close_date)");
				$this->db->order_by("YEAR(o.close_date) ASC");
				$this->db->join("user as u", "u.id = o.created_by_id", "inner");	

				$this->db->group_start();
				$this->db->where("o.deleted", "0" );
				$this->db->group_end();

				$this->db->group_start();
				$this->db->where("YEAR(o.close_date)", $value1 );
				$this->db->group_end();

				$this->db->group_start();
				$this->db->where("DATE(o.close_date) >=", $startDate );
				$this->db->group_end();

				$this->db->group_start();
				$this->db->where("DATE(o.close_date) <=", $endDate );
				$this->db->group_end();

				if( !empty($whereArr["userId"]) && $userRole == "user" ){

					$this->db->group_start();
					$this->db->where("u.user_parent_id", $whereArr["userId"] );
					$this->db->or_where("u.id", $whereArr["userId"] );
					$this->db->group_end();
				}

				$yearCount = $this->db->get("opportunity as o")->row_array();

				if( !empty($yearCount) ){

					$yearArr[$key][]	= array( "count" => $yearCount['sum'], "created_at" => $value1, "tooltip" => numberToIndianFormat($yearCount['sum']) );
				}else{

					$yearArr[$key][]	= array( "count" => 0, "created_at" => $value1, "tooltip" => numberToIndianFormat(0) );
				}

			}

			$yearArr = $this->graphData($yearArr, 1, count($getYears));

		} else {
			
			if( $filterType == "user" || $userRole == "sub_user" ){

				foreach ($userArr as $key => $uid) {
					
					foreach ($getYears as $key1 => $value1) {

						$this->db->select("sum(o.amount) as sum, DATE_FORMAT(o.close_date,'%Y') as created_at ");
						$this->db->group_by("YEAR(o.close_date)");
						$this->db->order_by("YEAR(o.close_date) ASC");
						$this->db->join("user as u", "u.id = o.created_by_id", "inner");	

						$this->db->group_start();
						$this->db->where("o.deleted", "0" );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("o.assigned_user_id", $uid );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("YEAR(o.close_date)", $value1 );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("DATE(o.close_date) >=", $startDate );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("DATE(o.close_date) <=", $endDate );
						$this->db->group_end();

						$yearCount = $this->db->get("opportunity as o")->row_array();

						if( !empty($yearCount) ){

							$yearArr[$key][]	= array( "count" => $yearCount['sum'], "created_at" => $value1, "tooltip" => numberToIndianFormat($yearCount['sum'])  );
						}else{

							$yearArr[$key][]	= array( "count" => 0, "created_at" => $value1, "tooltip" => numberToIndianFormat(0)  );
						}

					}

				}

			}else {

				// team flow here
				foreach ($userArr as $key => $uid) {
					
					foreach ($getYears as $key1 => $value1) {

						$this->db->select("SUM(o.amount) as sum, DATE_FORMAT(o.close_date,'%Y') as close_date ");
						$this->db->group_by("YEAR(o.close_date)");
						$this->db->order_by("YEAR(o.close_date) ASC");
						$this->db->join("user as u", "u.id = o.created_by_id", "inner");
						$this->db->join("entity_team as et", "et.entity_id = o.id", "inner");	

						$this->db->group_start();
						$this->db->where("et.team_id", $uid );
						$this->db->where("et.deleted", "0" );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("o.deleted", "0" );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("YEAR(o.close_date)", $value1 );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("DATE(o.close_date) >=", $startDate );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("DATE(o.close_date) <=", $endDate );
						$this->db->group_end();

						$yearCount = $this->db->get("opportunity as o")->row_array();

						if( !empty($yearCount) ){

							$yearArr[$key][]	= array( "count" => $yearCount['sum'], "created_at" => $value1, "tooltip" => numberToIndianFormat($yearCount['sum'])  );
						}else{

							$yearArr[$key][]	= array( "count" => 0, "created_at" => $value1, "tooltip" => numberToIndianFormat(0)  );
						}

					}

				}

			}

			$yearArr = $this->graphData($yearArr, count($userArr), count($getYears));
		}
		
		// echo "<pre> ";print_r($yearArr);die;
		return $yearArr;

	}


	
	/*
	* To get month array for graph - OPP REVENUE
	* @parm 	- (string) $startDate
	* @parm 	- (string) $endDate
	* @parm 	- (array) $userArr
	* @parm 	- (array) $whereArr
	* @parm 	- (string) $userRole
	* @parm 	- (string) $filterType
	* @return 	- (array) $monthArr
	*/
	public function oppRevenueMonthData($startDate="", $endDate="", $userArr=array(), $whereArr=array(), $userRole="", $filterType=""){

		$monthCount 	= 0;
		$monthArr 		= [];

		$tempStartDate	= date('Y-m-d',strtotime($startDate));
		$tempEndDate	= date('Y-m-d',strtotime($endDate));
		$getMonths 		= getMonths($tempStartDate, $tempEndDate);

		if( empty($userArr) && ( $userRole == "super_admin" || $userRole == "admin"  || $userRole == "user" ) ){
			
			$key = 0;

			foreach ($getMonths as $key2 => $value2) {
				
				$arrYearMonth = explode("-",$value2);

				$this->db->select("SUM(o.amount) as sum, DATE_FORMAT(o.close_date,'%Y') as close_date ");
				$this->db->group_by("YEAR(o.close_date),MONTH(o.close_date)");
				$this->db->order_by("YEAR(o.close_date),MONTH(o.close_date) ASC");
				$this->db->join("user as u", "u.id = o.created_by_id", "inner");	
				
				$this->db->group_start();
				$this->db->where("o.deleted", "0" );
				$this->db->group_end();

				$this->db->group_start();
				$this->db->where("YEAR(o.close_date)", $arrYearMonth[0] );
				$this->db->group_end();

				$this->db->group_start();
				$this->db->where("MONTH(o.close_date)", $arrYearMonth[1] );
				$this->db->group_end();
				
				$this->db->group_start();
				$this->db->where("DATE(o.close_date) >=", $startDate );
				$this->db->group_end();

				$this->db->group_start();
				$this->db->where("DATE(o.close_date) <=", $endDate );
				$this->db->group_end();

				if( !empty($whereArr["userId"]) && $userRole == "user" ){

					$this->db->group_start();
					$this->db->where("u.user_parent_id", $whereArr["userId"] );
					$this->db->or_where("u.id", $whereArr["userId"] );
					$this->db->group_end();
				}

				$monthCount = $this->db->get("opportunity as o")->row_array();
				// echo "<pre><br> <= START => <br>";print_r($this->db->last_query());
				if( !empty($monthCount) ){

					$monthArr[$key][]	= array( "count" => $monthCount['sum'], "created_at" => getMonthName($arrYearMonth[1])." ".$arrYearMonth[0], "tooltip" => numberToIndianFormat($monthCount['sum']) );
				}else{

					$monthArr[$key][]	= array( "count" => 0, "created_at" => getMonthName($arrYearMonth[1])." ".$arrYearMonth[0], "tooltip" => numberToIndianFormat(0) );
				}

			}

			$monthArr = $this->graphData($monthArr, 1, count($getMonths));

		}else{

			if( $filterType == "user" || $userRole == "sub_user" ){ 

				foreach ($userArr as $key => $uid) {

					foreach ($getMonths as $key2 => $value2) {
						
						$arrYearMonth = explode("-",$value2);

						$this->db->select("SUM(o.amount) as sum, DATE_FORMAT(o.close_date,'%Y') as close_date ");
						$this->db->group_by("YEAR(o.close_date),MONTH(o.close_date)");
						$this->db->order_by("YEAR(o.close_date),MONTH(o.close_date) ASC");
						$this->db->join("user as u", "u.id = o.created_by_id", "inner");	
								
						$this->db->group_start();
						$this->db->where("o.deleted", "0" );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("o.assigned_user_id", $uid );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("YEAR(o.close_date)", $arrYearMonth[0] );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("MONTH(o.close_date)", $arrYearMonth[1] );
						$this->db->group_end();
						
						$this->db->group_start();
						$this->db->where("DATE(o.close_date) >=", $startDate );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("DATE(o.close_date) <=", $endDate );
						$this->db->group_end();

						$monthCount = $this->db->get("opportunity as o")->row_array();

						if( !empty($monthCount) ){

							$monthArr[$key][]	= array( "count" => $monthCount['sum'], "created_at" => getMonthName($arrYearMonth[1])." ".$arrYearMonth[0], "tooltip" => numberToIndianFormat($monthCount['sum']) );
						}else{

							$monthArr[$key][]	= array( "count" => 0, "created_at" => getMonthName($arrYearMonth[1])." ".$arrYearMonth[0], "tooltip" => numberToIndianFormat(0) );
						}

					}

				}

			}else{

				// team flow here
				foreach ($userArr as $key => $uid) {

					foreach ($getMonths as $key2 => $value2) {
						
						$arrYearMonth = explode("-",$value2);

						$this->db->select("SUM(o.amount) as sum, DATE_FORMAT(o.close_date,'%Y') as close_date ");
						$this->db->group_by("YEAR(o.close_date),MONTH(o.close_date)");
						$this->db->order_by("YEAR(o.close_date),MONTH(o.close_date) ASC");
						$this->db->join("user as u", "u.id = o.created_by_id", "inner");
						$this->db->join("entity_team as et", "et.entity_id = o.id", "inner");	

						$this->db->group_start();
						$this->db->where("et.team_id", $uid );
						$this->db->where("et.deleted", "0" );
						$this->db->group_end();
								
						$this->db->group_start();
						$this->db->where("o.deleted", "0" );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("YEAR(o.close_date)", $arrYearMonth[0] );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("MONTH(o.close_date)", $arrYearMonth[1] );
						$this->db->group_end();
						
						$this->db->group_start();
						$this->db->where("DATE(o.close_date) >=", $startDate );
						$this->db->group_end();

						$this->db->group_start();
						$this->db->where("DATE(o.close_date) <=", $endDate );
						$this->db->group_end();

						$monthCount = $this->db->get("opportunity as o")->row_array();

						if( !empty($monthCount) ){

							$monthArr[$key][]	= array( "count" => $monthCount['sum'], "created_at" => getMonthName($arrYearMonth[1])." ".$arrYearMonth[0], "tooltip" => numberToIndianFormat($monthCount['sum']) );
						}else{

							$monthArr[$key][]	= array( "count" => 0, "created_at" => getMonthName($arrYearMonth[1])." ".$arrYearMonth[0], "tooltip" => numberToIndianFormat(0) );
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
	* To get tablular records - OPP REVENUE
	* @parm 	- (array) $whereData
	* @parm 	- (int) $offset
	* @parm 	- (int) $limit
	* @parm 	- (bool) $isCount
	* @return 	- (array) $result
	*/
	public function getOppRevenueTablularRecords( $whereData = array(), $offset = "" , $limit = "", $isCount = false ){

		if( !empty($whereData['date']) && !empty($whereData['startDate']) && !empty($whereData['endDate']) && !empty($whereData['reportType']) ){

			// check isCount or not
			if( $isCount ){
				$this->db->select(" COUNT(o.id) as count");
			}else{
				$this->db->select(" o.id, o.name, a.name as account_name, amount, CONCAT( u1.first_name,' ', u1.last_name ) as assgigned_name, DATE_FORMAT(o.close_date, '%d %b %Y') as close_date ");
			}

			$this->db->join("user as u", "u.id = o.created_by_id", "inner");
			$this->db->join("user as u1", "u1.id = o.assigned_user_id", "left");
			$this->db->join("account as a", "a.id = o.account_id", "left");

			$this->db->group_start();
			$this->db->where("o.deleted", "0" );
			$this->db->group_end();
						
			$this->db->group_start();
			$this->db->where("DATE(o.close_date) >=", $whereData['startDate'] );
			$this->db->group_end();

			$this->db->group_start();
			$this->db->where("DATE(o.close_date) <=", $whereData['endDate'] );
			$this->db->group_end();

			if( $whereData['reportType'] == 'y' ){
				$this->db->group_start();
				$this->db->where("YEAR(o.close_date)", $whereData['date'] );
				$this->db->group_end();
			} else if( $whereData['reportType'] == 'm' ){
				$this->db->group_start();
				$this->db->where("YEAR(o.close_date)", $whereData['year'] );
				$this->db->where("MONTH(o.close_date)", $whereData['date'] );
				$this->db->group_end();
			} else if( $whereData['reportType'] == 'w' ){
				$this->db->group_start();
				$this->db->where("DATE(o.close_date)", $whereData['date'] );
				$this->db->group_end();
			} else {
				$this->db->group_start();
				$this->db->where("DATE(o.close_date)", $whereData['date'] );
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
					$this->db->where_in("o.assigned_user_id", $whereData["multiUsers"] );
					$this->db->group_end();

				}else{

					// if team filter
					$this->db->select(" o.id, o.name, a.name as account_name, amount, CONCAT( u1.first_name,' ', u1.last_name ) as assgigned_name, t.name as team_name, DATE_FORMAT(o.close_date, '%d %b %Y') as close_date ");

					$this->db->join("entity_team as et", "et.entity_id = o.id", "inner");
					$this->db->join("team as t", "t.id = et.team_id", "inner");	
					
					$this->db->group_start();
					$this->db->where_in("et.team_id", $whereData["multiUsers"] );
					$this->db->where("et.deleted", "0" );
					$this->db->group_end();
				}

			}
		
			// Filter : Check super admin/admin/user/userid/teamid

			$this->db->order_by("o.id","ASC");

			// check isCount or not
			if( $isCount ){
				
				$result = $this->db->get("opportunity as o")->row_array();
				return $result["count"];
			}else{
				
				$this->db->limit($limit, $offset);
				$result = $this->db->get("opportunity as o")->result_array();
				return $result;
			}
				

		}
		return false;
	}



	/*
	* To get tablular records - OPP REVENUE
	* @parm 	- (string) $whereData
	* @parm 	- (bool) $isCount
	* @return 	- (array) $result
	*/
	public function getOppRevenueTablularRecordsCount( $whereData = array() ){

		$result = $this->getOppRevenueTablularRecords( $whereData, "" , "", $isCount = true );

		if( !empty($result) ){
			return $result;
		}
		return 0;

	}


	/*================================>END OPP REVENUE REPORT<================================*/



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

		/*echo "<pre>";print_r($result);
		echo "<pre>";print_r($result);
		echo "<pre>";print_r($result);die;*/

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
					
			$num = $n-$userCount;
			
			if( $n>count($arr4) ){ break; }

			$temp 	= 0+$k;
			for( $ki = $num; $ki < $n; $ki++){
				// $arr7[] = (int)$arr5[$ki];

				$arr7[] = (int)$arr5[$temp];
				$arr7[] = $arr6[$temp];
				$temp 	= $temp+$interval;
			}

			$final[] = $arr7;
			
			$n = $n+$userCount;
			
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
