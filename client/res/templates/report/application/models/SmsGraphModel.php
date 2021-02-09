<?php defined('BASEPATH') OR exit('No direct script access allowed');


class SmsGraphModel extends CI_Model {

 	public function __construct(){
		parent::__construct();

	}


	/*
	* To get year array for graph
	* @parm 	- (string) $startDate
	* @parm 	- (string) $endDate
	* @parm 	- (array) $userArr
	* @parm 	- (array) $whereArr
	* @return 	- (array) $yearArr
	*/
	public function yearData($startDate="", $endDate="", $userArr=array(), $whereArr=array()){

		$yearCount 		= 0;
		$yearArr 		= [];

		$tempStartDate	= date('y',strtotime($startDate));
		$tempEndDate	= date('y',strtotime($endDate));
		$getYears 		= getYears($tempStartDate, $tempEndDate);
		// echo "<pre>";print_r($userArr);

		foreach ($userArr as $key => $uid) {
			
			foreach ($getYears as $key1 => $value1) {

				$this->db->select("count(sr.sr_id) as count, DATE_FORMAT(sr.sr_createdAt,'%Y') as sr_createdAt ");
				$this->db->group_by("YEAR(sr.sr_createdAt)");
				$this->db->order_by("YEAR(sr.sr_createdAt) ASC");

				if( isset($whereArr["selfId"]) && $whereArr["selfId"] != "" ){
					$this->db->join("user as u", "u.id = sr.sr_createdBy", "inner");	
				}else{
					$this->db->join("user as u", "u.user_parent_id = sr.sr_createdBy", "inner");	
				}

				$this->db->group_start();
				$this->db->where("sr.sr_createdBy", $uid );
				$this->db->group_end();

				$this->db->group_start();
				$this->db->where("YEAR(sr.sr_createdAt)", $value1 );
				$this->db->group_end();

				$this->db->group_start();
				$this->db->where("DATE(sr.sr_createdAt) >=", $startDate );
				$this->db->group_end();

				$this->db->group_start();
				$this->db->where("DATE(sr.sr_createdAt) <=", $endDate );
				$this->db->group_end();

				if( isset($whereArr["reportStatus"]) && $whereArr["reportStatus"] != "3" ){

					$this->db->group_start();
					$this->db->where("sr.sr_smsStatus", $whereArr["reportStatus"] );
					$this->db->group_end();
				}

				$yearCount = $this->db->get("sms_reminder as sr")->row_array();
				// echo "<br>".$this->db->last_query();
				// echo "<pre>";print_r($yearCount);die;

				if( !empty($yearCount) ){

					// $yearArr[]	= array( "count" => $yearCount['count'], "sr_createdAt" => $value1, "tooltip" => "Total Users : ".(int)$yearCount['count'].", ".$value1 );
					$yearArr[$key][]	= array( "count" => $yearCount['count'], "sr_createdAt" => $value1 );
				}else{

					// $yearArr[]	= array( "count" => 0, "sr_createdAt" => $value1, "tooltip" => "Total Users : 0, ".$value1 );
					$yearArr[$key][]	= array( "count" => 0, "sr_createdAt" => $value1 );
				}

			}

		}
		
		// echo "<pre> ";print_r($yearArr);die;
		$yearArr = $this->graphData($yearArr, count($userArr), count($getYears));
		return $yearArr;

		
	}


	
	/*
	* To get month array for graph
	* @parm 	- (string) $startDate
	* @parm 	- (string) $endDate
	* @parm 	- (array) $userArr
	* @parm 	- (array) $whereArr
	* @return 	- (array) $monthArr
	*/
	public function monthData($startDate="", $endDate="", $userArr=array(), $whereArr=array()){

		$monthCount 	= 0;
		$monthArr 		= [];

		$tempStartDate	= date('Y-m-d',strtotime($startDate));
		$tempEndDate	= date('Y-m-d',strtotime($endDate));
		$getMonths 		= getMonths($tempStartDate, $tempEndDate);
		// echo "<pre>";print_r($getMonths);die;

		foreach ($userArr as $key => $uid) {

			foreach ($getMonths as $key2 => $value2) {
				
				$arrYearMonth = explode("-",$value2);

				$this->db->select("count(sr.sr_id) as count, DATE_FORMAT(sr.sr_createdAt,'%Y') as sr_createdAt ");
				$this->db->group_by("YEAR(sr.sr_createdAt),MONTH(sr.sr_createdAt)");
				$this->db->order_by("YEAR(sr.sr_createdAt),MONTH(sr.sr_createdAt) ASC");
				
				if( isset($whereArr["selfId"]) && $whereArr["selfId"] != "" ){
					$this->db->join("user as u", "u.id = sr.sr_createdBy", "inner");	
				}else{
					$this->db->join("user as u", "u.user_parent_id = sr.sr_createdBy", "inner");	
				}	
				
				$this->db->group_start();
				$this->db->where("sr.sr_createdBy", $uid );
				$this->db->group_end();

				$this->db->group_start();
				$this->db->where("YEAR(sr.sr_createdAt)", $arrYearMonth[0] );
				$this->db->group_end();

				$this->db->group_start();
				$this->db->where("MONTH(sr.sr_createdAt)", $arrYearMonth[1] );
				$this->db->group_end();
				
				$this->db->group_start();
				$this->db->where("DATE(sr.sr_createdAt) >=", $startDate );
				$this->db->group_end();

				$this->db->group_start();
				$this->db->where("DATE(sr.sr_createdAt) <=", $endDate );
				$this->db->group_end();


				if( isset($whereArr["reportStatus"]) && $whereArr["reportStatus"] != "3" ){

					$this->db->group_start();
					$this->db->where("sr.sr_smsStatus", $whereArr["reportStatus"] );
					$this->db->group_end();
				}


				$monthCount = $this->db->get("sms_reminder as sr")->row_array();
				// echo "<br>".$this->db->last_query();
				// echo "<pre>";print_r($monthCount);die;

				if( !empty($monthCount) ){

					// $monthArr[]	= array( "count" => $monthCount['count'], "sr_createdAt" => getMonthName($arrYearMonth[1])." ".$arrYearMonth[0], "tooltip" => "Total Users : ".(int)$monthCount['count'].", ".getMonthName($arrYearMonth[1])." ".$arrYearMonth[0]  );
					$monthArr[$key][]	= array( "count" => $monthCount['count'], "sr_createdAt" => getMonthName($arrYearMonth[1])." ".$arrYearMonth[0] );
				}else{

					// $monthArr[]	= array( "count" => 0, "sr_createdAt" => getMonthName($arrYearMonth[1])." ".$arrYearMonth[0], "tooltip" => "Total Users : 0, ".getMonthName($arrYearMonth[1])." ".$arrYearMonth[0]  );
					$monthArr[$key][]	= array( "count" => 0, "sr_createdAt" => getMonthName($arrYearMonth[1])." ".$arrYearMonth[0] );
				}

			}

		}

		$monthArr = $this->graphData($monthArr, count($userArr), count($getMonths));
		// echo "<pre>";print_r($monthArr);die;
		return $monthArr;
		
	}	


	
	/*
	* To get week array for graph
	* @parm 	- (string) $startDate
	* @parm 	- (string) $endDate
	* @parm 	- (array) $userArr
	* @parm 	- (array) $whereArr
	* @return 	- (array) $weekArr
	*/
	public function weekData($startDate="", $endDate="", $userArr=array(), $whereArr=array()){

		$num 		= 0;
		$datapoint1 = array();
		$endDate 	= strtotime($endDate);
		$firstDate 	= date("l",strtotime($startDate));
		$endDateFromDateReange = $endDate;
		$weekCount = 0;

		foreach ($userArr as $key => $uid) {

			if($firstDate!=="Sunday"){

				$startdate 	= date("Y-m-d",strtotime($startDate));
				$i 			= strtotime('Saturday', strtotime($startDate));
				$enddate 	= date('Y-m-d', $i);

				if( isset($whereArr["reportStatus"]) && $whereArr["reportStatus"] != "3" ){

					$query1 	= $this->db->query('SELECT * FROM sms_reminder as sr WHERE DATE_FORMAT(sr.sr_createdAt,"%Y-%m-%d") BETWEEN "'.$startdate.'" AND "'.$enddate.'" AND sr.sr_createdBy = "'.$uid.'" AND sr.sr_smsStatus = "'.$whereArr["reportStatus"].'" ');
				}else{
					$query1 	= $this->db->query('SELECT * FROM sms_reminder as sr WHERE DATE_FORMAT(sr.sr_createdAt,"%Y-%m-%d") BETWEEN "'.$startdate.'" AND "'.$enddate.'" AND sr.sr_createdBy = "'.$uid.'"  ');
				}

				$count 		= $query1->num_rows();
				// echo "last".$this->db->last_query();die;
				
				if( $count == "" ){ $count = 0; }

				// FIND WEEK FROM START DATE
				$weekNo = $this->db->query('SELECT DATE_FORMAT("'.date('Y-m-d', strtotime($enddate)).'", "%u") as weekno')->row_array();
				
				/*$point = array(
					"count" 		=> (int)$count,
					"created_on" 	=> date('d M Y', $i),
					"tooltip" 		=> "Total Users : ".(int)$count.", ".date('d M Y', $i)." - ".date('d M Y',strtotime($enddate)), 
				);*/
				$point = array(
					"count" 		=> (int)$count,
					"sr_createdAt" 	=> date('d M Y', $i)." - ".date('d M Y',strtotime($enddate)), 
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

				if( isset($whereArr["reportStatus"]) && $whereArr["reportStatus"] != "3" ){

					$query1 	= $this->db->query('SELECT * FROM sms_reminder as sr WHERE DATE_FORMAT(sr.sr_createdAt,"%Y-%m-%d") BETWEEN "'.$fdate.'" AND "'.$ldate.'" AND sr.sr_createdBy = "'.$uid.'" AND sr.sr_smsStatus = "'.$whereArr["reportStatus"].'" ');
				}else{

					$query1 	= $this->db->query('SELECT * FROM sms_reminder as sr WHERE DATE_FORMAT(sr.sr_createdAt,"%Y-%m-%d") BETWEEN "'.$fdate.'" AND "'.$ldate.'" AND sr.sr_createdBy = "'.$uid.'" ');
				}


				$count = $query1->num_rows();

				if($count==""){
					$count=0;
				}

				// FIND WEEK FROM START DATE
				$weekNo = $this->db->query('SELECT DATE_FORMAT("'.date('Y-m-d', $i).'", "%u") as weekno')->row_array();

				/*$point = array(
					"count" 		=> (int)$count,
					"created_on" 	=> date('d M Y', $i),
					"tooltip" 		=> "Total Users : ".(int)$count.", ".date('d M Y', $i)." - ".date('d M Y', $enddate), 
				);*/
				$point = array(
					"count" 		=> (int)$count,
					"sr_createdAt" 	=> date('d M Y', $i)." - ".date('d M Y', $enddate), 
				);

				array_push($datapoint1, $point);        
				$weekCount++;
			}
		
		}

		// echo "<pre>";print_r($datapoint1);die;
		// return $datapoint1;
		
		$interval 	= $weekCount/count($userArr);
		$listArr 	= array_chunk($datapoint1, $interval);
		// echo "<pre>";print_r($listArr);die;
		$weekArr 	= $this->graphData($listArr, count($userArr), $interval );
		// echo "<pre>";print_r($weekArr);die;
		return $weekArr;

		
	}		


	
	/*
	* To get day array for graph
	* @parm 	- (string) $startDate
	* @parm 	- (string) $endDate
	* @parm 	- (array) $userArr
	* @parm 	- (array) $whereArr
	* @return 	- (array) $dayArr
	*/
	public function dayData($startDate="", $endDate="",  $userArr=array(), $whereArr=array()){

		$dayCount 		= 0;
		$dayArr 		= [];

		$tempStartDate	= date('Y-m-d',strtotime($startDate));
		$tempEndDate	= date('Y-m-d',strtotime($endDate));
		$getDays 		= getDays($tempStartDate, $tempEndDate);
		// echo "<pre>";print_r($getDays);die;

		foreach ($userArr as $key => $uid) {
		
			foreach ($getDays as $key3 => $value3) {
				
				$this->db->select("count(sr.sr_id) as count, DATE_FORMAT(sr.sr_createdAt, '%d %b %Y') as sr_createdAt ");
				$this->db->group_by("YEAR(sr.sr_createdAt), MONTH(sr.sr_createdAt), WEEK(sr.sr_createdAt), DAY(sr.sr_createdAt) ");
				$this->db->order_by("YEAR(sr.sr_createdAt), MONTH(sr.sr_createdAt), WEEK(sr.sr_createdAt), DAY(sr.sr_createdAt) ASC");
				
				if( isset($whereArr["selfId"]) && $whereArr["selfId"] != "" ){
					$this->db->join("user as u", "u.id = sr.sr_createdBy", "inner");	
				}else{
					$this->db->join("user as u", "u.user_parent_id = sr.sr_createdBy", "inner");	
				}	

				$this->db->group_start();
				$this->db->where("sr.sr_createdBy", $uid );
				$this->db->group_end();

				$this->db->group_start();
				$this->db->where("DATE(sr.sr_createdAt)", $value3 );
				$this->db->group_end();


				if( isset($whereArr["reportStatus"]) && $whereArr["reportStatus"] != "3" ){

					$this->db->group_start();
					$this->db->where("sr.sr_smsStatus", $whereArr["reportStatus"] );
					$this->db->group_end();
				}

				$dayCount = $this->db->get("sms_reminder as sr")->row_array();
				// echo $this->db->last_query();
				// echo "<pre>";print_r($dayCount);die;

				if( !empty($dayCount) ){

					// $dayArr[]	= array( "count" => $dayCount['count'], "sr_createdAt" => $dayCount['sr_createdAt'], "tooltip" => "Total Users : ".(int)$dayCount['count'].", ".$dayCount['sr_createdAt']) ;
					$dayArr[$key][]	= array( "count" => $dayCount['count'], "sr_createdAt" => $dayCount['sr_createdAt']) ;
				}else{

					// $dayArr[]	= array( "count" => 0, "sr_createdAt" => date('d, M Y', strtotime($value3) ), "tooltip" => "Total Users : 0, ".date('d M Y', strtotime($value3) )  );
					$dayArr[$key][]	= array( "count" => 0, "sr_createdAt" => date('d M Y', strtotime($value3) )  );
				}

			}

		}

		$dayArr = $this->graphData($dayArr, count($userArr), count($getDays));
		// echo "<pre>";print_r($dayArr);die;
		return $dayArr;
		
	}	


	
	/*
	* To get hour array for graph
	* @parm 	- (string) $startDate
	* @parm 	- (string) $endDate
	* @parm 	- (array) $userArr
	* @parm 	- (array) $whereArr
	* @return 	- (array) $hourArr
	*/
	public function hourData($startDate="", $endDate="", $userArr=array(), $whereArr=array()){

		$hourCount 		= 0;
		$hourArr 		= [];

		$startDate		= $startDate." 00:00:00";
		$endDate		= $endDate." 23:00:00";

		$tempStartDate	= date('Y-m-d H:i:s',strtotime($startDate));
		$tempEndDate	= date('Y-m-d H:i:s',strtotime($endDate));
		$getHours 		= getHours($tempStartDate, $tempEndDate);
		// echo "<pre>";print_r($getHours);die;

		foreach ($userArr as $key => $uid) {

			foreach ($getHours as $key3 => $value3) {
				
				$this->db->select("count(sr.sr_id) as count, DATE_FORMAT(sr.sr_createdAt, '%d %b %Y %H') as sr_createdAt ");
				$this->db->group_by("YEAR(sr.sr_createdAt), MONTH(sr.sr_createdAt), WEEK(sr.sr_createdAt), DAY(sr.sr_createdAt), HOUR(sr.sr_createdAt) ");
				$this->db->order_by("YEAR(sr.sr_createdAt), MONTH(sr.sr_createdAt), WEEK(sr.sr_createdAt), DAY(sr.sr_createdAt), HOUR(sr.sr_createdAt) ASC");
				$this->db->join("user as u", "u.user_parent_id = sr.sr_createdBy", "inner");

				$this->db->group_start();
				$this->db->where("sr.sr_createdBy", $uid );
				$this->db->group_end();

				$tempDate = date('Y-m-d', strtotime($value3) );
				$this->db->group_start();
				$this->db->where("DATE(sr.sr_createdAt)", $tempDate );
				$this->db->group_end();
				
				$tempHour = date('H', strtotime($value3) );
				$this->db->group_start();
				$this->db->where("HOUR(sr.sr_createdAt)", $tempHour );
				$this->db->group_end();


				if( isset($whereArr["reportStatus"]) && $whereArr["reportStatus"] != "3" ){

					$this->db->group_start();
					$this->db->where("sr.sr_smsStatus", $whereArr["reportStatus"] );
					$this->db->group_end();
				}


				$hourCount = $this->db->get("sms_reminder as sr")->row_array();
				// echo $this->db->last_query();
				// echo "<pre>";print_r($hourCount);die;

				if( !empty($hourCount) ){

					// $hourArr[]	= array( "count" => $hourCount['count'], "sr_createdAt" => $hourCount['sr_createdAt'].":00", "tooltip" => "Total Users : ".$hourCount['count'].", ".$hourCount['sr_createdAt'].":00" );
					$hourArr[$key][]	= array( "count" => $hourCount['count'], "sr_createdAt" => $hourCount['sr_createdAt'].":00" );
				}else{

					// $hourArr[]	= array( "count" => 0, "sr_createdAt" => date('d M Y H', strtotime($value3) ).":00", "tooltip" => "Total Users : 0, ".date('d M Y H', strtotime($value3) ) );
					$hourArr[$key][]	= array( "count" => 0, "sr_createdAt" => date('d M Y H', strtotime($value3) ).":00" );
				}

			}

		}

		$hourArr = $this->graphData($hourArr, count($userArr), count($getHours));
		// echo "<pre>";print_r($hourArr);die;
		return $hourArr;
		
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
		$final	=[];


		for($i=0; $i<count($result); $i++){
			
			for($ik=0; $ik<count($result[$i]); $ik++){
				$arr1[]= $result[$i][$ik];	
			}
		}
		

		for($j=0; $j<count($arr1); $j++){
						
			$arr2["sr_createdAt"]	= $arr1[$j]["sr_createdAt"];
			$arr2["count"]			= $arr1[$j]["count"];
			$arr4[]					= $arr2["sr_createdAt"];
			$arr5[]					= $arr2["count"];
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
