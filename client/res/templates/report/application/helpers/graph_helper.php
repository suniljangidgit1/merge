<?php 
// GRAPH HELPER


/*
* To get years list between start & end dates
* @parm 	= (string) $startDate
* @parm 	= (string) $endDate
* @return 	= (array) $yearList
*/
if( !function_exists("getYears") ){

	function getYears($startDate="", $endDate=""){

		$yearList 	= array();
        $tempDate 	= $startDate;
        // $diff 		= (int)$startDate-(int)$endDate;

        // ADD INITIAL YEARS IN ARRAY
		$yearList[] = date('Y', strtotime('01/01/'.$startDate));			

		// CHECK YEARS BETWEEN START AND END DATES
		for ( $i = $tempDate; $i < $endDate ; $i++) { 

			$startDate 	= strtotime('01/01/'.$startDate);
			$newDate 	= strtotime('+ 1 year', $startDate);

			// PUSH NEXT YEARS IN ARRAY
			$yearList[] = date('Y', $newDate);
			$startDate 	= date('Y', $newDate);
		}

        // echo "<pre>--*";print_r($yearList);die;
        return $yearList;
	}
}


/*
* To get months list between start & end dates
* @parm 	= (string) $startDate
* @parm 	= (string) $endDate
* @return 	= (array) $yearList
*/
if( !function_exists("getMonths") ){

	function getMonths($startDate="", $endDate=""){

		$yearList = [];

		$start    = (new DateTime($startDate))->modify('first day of this month');
		$end      = (new DateTime($endDate))->modify('first day of next month');

		// ADD INTERVAL FOR ADD
		$interval = DateInterval::createFromDateString('1 month');
		$period   = new DatePeriod($start, $interval, $end);

		foreach ($period as $dt) {
		    $yearList[] = $dt->format("Y-m");
		}

        // echo "<pre>--*";print_r($yearList);die;
        return $yearList;
	}
}


/*
* To get weeks list between start & end dates
* @parm 	= (string) $startDate Y-m-d
* @parm 	= (string) $endDate Y-m-d
* @return 	= (array) $yearList
*/
if( !function_exists("getWeeks") ){

	function getWeeks($startDate="", $endDate=""){

		$weekList 	= [];

		$startDateUnix 	= strtotime($startDate);
	    $endDateUnix 	= strtotime($endDate);

	    $currentDateUnix = $startDateUnix;

	    while ($currentDateUnix < $endDateUnix) {
	        
	        $weekList[] 		= date('Y-m-d', $currentDateUnix);

	        // ADD INTERVAL FOR ADD
	        $currentDateUnix 	= strtotime('+1 week', $currentDateUnix);
	    }

        // echo "<pre>--*";print_r($weekList);die;
        return $weekList;
	}
}


/*
* To get days list between start & end dates
* @parm 	= (string) $startDate
* @parm 	= (string) $endDate
* @return 	= (array) $dayList
*/
if( !function_exists("getDays") ){

	function getDays($startDate="", $endDate=""){

		$dayList  = [];

		$current 		= strtotime($startDate);
	    $last 			= strtotime($endDate);
	    $output_format 	= "Y-m-d";
	    $step = "+1 day";
	    
	    while( $current <= $last ) {

	        $dayList[] = date($output_format, $current);
	        $current = strtotime($step, $current);
	    }

        // echo "<pre>--*";print_r($dayList);die;
        return $dayList;
	}
}


/*
* To get hours list between start & end dates
* @parm 	= (string) $startDate
* @parm 	= (string) $endDate
* @return 	= (array) $dayList
*/
if( !function_exists("getHours") ){

	function getHours($startDate="", $endDate=""){

		$hourList = [];

		$begin 	= new DateTime( $startDate );
		$end 	= new DateTime( $endDate );
		$end 	= $end->modify( '+1 hour' );

		// ADD INTERVAL FOR ADD
		$interval 	= new DateInterval('PT1H');
		$daterange 	= new DatePeriod($begin, $interval ,$end);

		foreach($daterange as $date){
		  	$hourList[] = $date->format("Y-m-d H:i:s");
		}

        // echo "<pre>--*";print_r($hourList);die;
        return $hourList;
	}
}



/*
* To get month name eg : "Jan" OR "Dec" by month number
* @parm 	= (int) $monthNum
* @return 	= (string) $monthName
*/
if( !function_exists("getMonthName") ){

	function getMonthName($monthNum=""){
		
		$dateObj   = DateTime::createFromFormat('!m', $monthNum);
		return $monthName = $dateObj->format('M'); // March
	}
}



/*
* To check whether year is leap yer or not
* @parm 	= (int) $year
* @return 	= (bool) true/false
*/
if( !function_exists("isLeapYear") ){

	function isLeapYear($year=""){
		
		$leap = date('L', mktime(0, 0, 0, 1, 1, $year));
		return $leap ? true : false;
	}
}



/*
* To get leads staus dynamically from json file
* @return 	= (array) $listArr
*/
if( !function_exists("getLeadsStatusList") ){

	function getLeadsStatusList(){
	
		$listArr 		= array();
		$CI 			= & get_instance();
		$sundomainName 	= $CI->db->database;
		$defaultPath 	= $_SERVER["DOCUMENT_ROOT"]."/application/Finnova/Modules/Crm/Resources/metadata/entityDefs/Lead.json";
		$customPath 	= $_SERVER["DOCUMENT_ROOT"]."/custom/Finnova/Custom/".$sundomainName."/Resources/metadata/entityDefs/Lead.json";

		if( file_exists($customPath) ){

			$strJson = json_decode( file_get_contents($customPath), true); // CHANGE JSON FILE PATH 

			if( !empty($strJson['fields']['status']['options']) ){
				$listArr 	= $strJson['fields']['status']['options'];
			}else{

				if( file_exists($defaultPath) ){

					$strJson = json_decode( file_get_contents($defaultPath), true); // CHANGE JSON FILE PATH 

					if( !empty($strJson['fields']['status']['options']) ){
						$listArr 	= $strJson['fields']['status']['options'];
					}

				}
			}

		}

		asort($listArr);
        // echo "<pre>";print_r($listArr);die;
        return $listArr;
	}
}



/*
* To create lables for lead status graph
* @parm 	= (array) $dbArr
* @return 	= (string) $finalLable
*/
if( !function_exists("leadStatusLabels") ){

	function leadStatusLabels( $dbArr=array() ){
		
		$finalLable 	= NULL;
		
		// if ( !empty($dbArr) ) {
			
			$chkStatus 		= [];
			$strStatus		= [];
			$statusList 	= getLeadsStatusList();

			if( !empty($dbArr) ){ 
				foreach ($dbArr as $key => $value) {
					
					if( in_array($value['status'], $statusList) ){
						$strStatus[] = $value['status']." : ".$value['count'];
						$chkStatus[] = $value['status'];
					}
				}
			}

			$arrDiff = array_diff($statusList, $chkStatus);
			
			if( !empty($arrDiff) ){ 
				foreach ($arrDiff as $key => $value) {
					$strStatus[] = $value." : 0";
				}

				$finalLable = implode(", ", $strStatus);
			}

		// }

		// echo "<pre>finalLable - ";print_r( $finalLable );die;
		return $finalLable;

	}
}



/*
* To get leads source dynamically from json file
* @return 	= (array) $listArr
*/
if( !function_exists("getLeadsSourceList") ){

	function getLeadsSourceList(){
	
		$listArr 		= array();
		$CI 			= & get_instance();
		$sundomainName 	= $CI->db->database;
		$defaultPath 	= $_SERVER["DOCUMENT_ROOT"]."/application/Finnova/Modules/Crm/Resources/metadata/entityDefs/Lead.json";
		$customPath 	= $_SERVER["DOCUMENT_ROOT"]."/custom/Finnova/Custom/".$sundomainName."/Resources/metadata/entityDefs/Lead.json";

		if( file_exists($customPath) ){

			$strJson = json_decode( file_get_contents($customPath), true); // CHANGE JSON FILE PATH 

			if( !empty($strJson['fields']['source']['options']) ){
				$listArr 	= $strJson['fields']['source']['options'];
			}else{

				if( file_exists($defaultPath) ){

					$strJson = json_decode( file_get_contents($defaultPath), true); // CHANGE JSON FILE PATH 

					if( !empty($strJson['fields']['source']['options']) ){
						$listArr 	= $strJson['fields']['source']['options'];
					}

				}
			}

		}

		asort($listArr);
        // echo "<pre>";print_r($listArr);die;
        return $listArr;
	}
}



/*
* To create lables for lead source graph
* @parm 	= (array) $dbArr
* @return 	= (string) $finalLable
*/
if( !function_exists("leadSourceLabels") ){

	function leadSourceLabels( $dbArr=array() ){
		
		$finalLable 	= NULL;
		
		// if ( !empty($dbArr) ) {
			
			$chkStatus 		= [];
			$strStatus		= [];
			$statusList 	= getLeadsSourceList();

			if( !empty($dbArr) ){ 
				foreach ($dbArr as $key => $value) {
					
					if( in_array($value['source'], $statusList) ){
						$strStatus[] = $value['source']." : ".$value['count'];
						$chkStatus[] = $value['source'];
					}
				}
			}

			$arrDiff = array_diff($statusList, $chkStatus);
			
			if( !empty($arrDiff) ){ 
				foreach ($arrDiff as $key => $value) {
					$strStatus[] = $value." : 0";
				}

				$finalLable = implode(", ", $strStatus);
			}

		// }

		// echo "<pre>finalLable - ";print_r( $finalLable );die;
		return $finalLable;

	}
}




/*
* To get opportunity stage dynamically from json file
* @return 	= (array) $listArr
*/
if( !function_exists("getOpportunityStageList") ){

	function getOpportunityStageList(){
	
		$listArr 		= array();
		$CI 			= & get_instance();
		$sundomainName 	= $CI->db->database;
		$defaultPath 	= $_SERVER["DOCUMENT_ROOT"]."/application/Finnova/Modules/Crm/Resources/metadata/entityDefs/Opportunity.json";
		$customPath 	= $_SERVER["DOCUMENT_ROOT"]."/custom/Finnova/Custom/".$sundomainName."/Resources/metadata/entityDefs/Opportunity.json";

		if( file_exists($customPath) ){

			$strJson = json_decode( file_get_contents($customPath), true); // CHANGE JSON FILE PATH 

			if( !empty($strJson['fields']['stage']['options']) ){
				$listArr 	= $strJson['fields']['stage']['options'];
			}else{

				if( file_exists($defaultPath) ){

					$strJson = json_decode( file_get_contents($defaultPath), true); // CHANGE JSON FILE PATH 

					if( !empty($strJson['fields']['stage']['options']) ){
						$listArr 	= $strJson['fields']['stage']['options'];
					}

				}
			}

		}

		asort($listArr);
        // echo "<pre>";print_r($listArr);die;
        return $listArr;
	}
}



/*
* To create lables for lead status graph
* @parm 	= (array) $dbArr
* @return 	= (string) $finalLable
*/
if( !function_exists("leadOpportunityStageLabels") ){

	function leadOpportunityStageLabels( $dbArr=array() ){
		
		$finalLable 	= NULL;
		
		// if ( !empty($dbArr) ) {
			
			$chkStatus 		= [];
			$strStatus		= [];
			$statusList 	= getOpportunityStageList();

			if( !empty($dbArr) ){ 
				foreach ($dbArr as $key => $value) {
					
					if( in_array($value['stage'], $statusList) ){
						$strStatus[] = $value['stage']." : ".$value['count'];
						$chkStatus[] = $value['stage'];
					}
				}
			}

			$arrDiff = array_diff($statusList, $chkStatus);
			
			if( !empty($arrDiff) ){ 
				foreach ($arrDiff as $key => $value) {
					$strStatus[] = $value." : 0";
				}

				$finalLable = implode(", ", $strStatus);
			}

		// }

		// echo "<pre>finalLable - ";print_r( $finalLable );die;
		return $finalLable;

	}
}



/*
* To get opportunity probability dynamically from json file
* @return 	= (array) $listArr
*/
if( !function_exists("getOpportunityProbabilityList") ){

	function getOpportunityProbabilityList(){
	
		$listArr 		= array();
		$CI 			= & get_instance();
		$sundomainName 	= $CI->db->database;
		$defaultPath 	= $_SERVER["DOCUMENT_ROOT"]."/application/Finnova/Modules/Crm/Resources/metadata/entityDefs/Opportunity.json";
		$customPath 	= $_SERVER["DOCUMENT_ROOT"]."/custom/Finnova/Custom/".$sundomainName."/Resources/metadata/entityDefs/Opportunity.json";

		if( file_exists($customPath) ){

			$strJson = json_decode( file_get_contents($customPath), true); // CHANGE JSON FILE PATH 

			if( !empty($strJson['fields']['stage']['probabilityMap']) ){
				$listArr 	= $strJson['fields']['stage']['probabilityMap'];
			}else{

				if( file_exists($defaultPath) ){

					$strJson = json_decode( file_get_contents($defaultPath), true); // CHANGE JSON FILE PATH 

					if( !empty($strJson['fields']['stage']['probabilityMap']) ){
						$listArr 	= $strJson['fields']['stage']['probabilityMap'];
					}

				}
			}

		}

		asort($listArr);
        // echo "<pre>";print_r($listArr);die;
        return $listArr;
	}
}



/*
* To get opportunity probability dynamically from database file
* @return 	= (array) $listArr
*/
if( !function_exists("getDbOpportunityProbabilityList") ){

	function getDbOpportunityProbabilityList(){
	
		$CI = & get_instance();  

		$listArr = $CI->db->distinct()->select("probability", false)->order_by("probability","asc")->get("opportunity as o")->result_array();
        // echo "<pre>";print_r($listArr);die;
        return $listArr;
	}
}


/*
* To Convert digit or number in INR currency seprated by comma(,)
* @parm 	= (int/float) $num
* @return 	= (string) $num
*/
if( !function_exists("numberToIndianFormat") ){

	function numberToIndianFormat($num=0){
	
		$CI = & get_instance();  

		$explrestunits = "" ;
	    if(strlen($num)>3) {
	        $lastthree = substr($num, strlen($num)-3, strlen($num));
	        $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
	        $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
	        $expunit = str_split($restunits, 2);
	        for($i=0; $i<sizeof($expunit); $i++) {
	            // creates each of the 2's group and adds a comma to the end
	            if($i==0) {
	                $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
	            } else {
	                $explrestunits .= $expunit[$i].",";
	            }
	        }
	        $thecash = $explrestunits.$lastthree;
	    } else {
	        $thecash = $num;
	    }
	    return $thecash; // writes the final format where $currency is the currency symbol.
	}
}



/*
* To get leads type dynamically from json file
* @return 	= (array) $typeArr
*/
if( !function_exists("getLeadsTypeList") ){

	function getLeadsTypeList(){
	
		$listArr 		= array();
		$CI 			= & get_instance();
		$sundomainName 	= $CI->db->database;
		$defaultPath 	= $_SERVER["DOCUMENT_ROOT"]."/application/Finnova/Modules/Crm/Resources/metadata/entityDefs/Lead.json";
		$customPath 	= $_SERVER["DOCUMENT_ROOT"]."/custom/Finnova/Custom/".$sundomainName."/Resources/metadata/entityDefs/Lead.json";

		if( file_exists($customPath) ){

			$strJson = json_decode( file_get_contents($customPath), true); // CHANGE JSON FILE PATH 

			if( !empty($strJson['fields']['leadType']['options']) ){
				$listArr 	= $strJson['fields']['leadType']['options'];
			}else{

				if( file_exists($defaultPath) ){

					$strJson = json_decode( file_get_contents($defaultPath), true); // CHANGE JSON FILE PATH 

					if( !empty($strJson['fields']['leadType']['options']) ){
						$listArr 	= $strJson['fields']['leadType']['options'];
					}

				}
			}

		}

		asort($listArr);
        // echo "<pre>";print_r($listArr);die;
        return $listArr;
	}
}