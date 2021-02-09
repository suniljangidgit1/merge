<?php
/*
* OVERVIEW TAB AJX CONTROLLER
* THIS IS AJAX CONTROLLER FOR OVERVIEW TAB AJAX REQUEST
* BY 	: SUNIL JANGID
* NAME 	: overviewAjaxController.php 
*/

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
/*
* Database connection file include
*/
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
$dbConn = $conn;
/*
* beauty print & die
*/
function pd( $data=array() ) {
	echo "<pre>";print_r($data);die;
}


/*
* To get todays call
* @param 	- none 
* @return 	- json 
*/

function insertHolidays( $dbConn ){
	$reponse["status"] 	= "false";
	$reponse["msg"] 	= "Invalid Request!";
	$reponse["data"] 	= array();
    $branch = $_POST["branch_field"];
    $date   = $_POST["date_field"];
    $weeklyOff   = $_POST["weekly_field"];
    $resone   = $_POST["holiday_field"];
    $dummyData =Array("branch"=>array_values($branch),"date"=>array_values($date),"resone"=>array_values($resone),"weeklyOff"=>array_values($weeklyOff));
    $isinsert = "";
  // print_r($dummyData);die;
	if( !empty($dbConn) &&  !empty($dummyData["branch"]) ){
       $query1 = "DELETE FROM `weekly_off`";
            $dbConn->query($query1);

       $query2 = "DELETE FROM `yearly_holidays`";
       $dbConn->query($query2);
       for($i=0; $i<sizeof($dummyData["branch"]); $i++){
	  
            
	       			
	       	if(!empty($dummyData["weeklyOff"])){
                    $dummyData["branch"] = array_values($dummyData["branch"]);
                    $dummyData["weeklyOff"][$i] = array_values($dummyData["weeklyOff"][$i]);
       			for($l = 0; $l < sizeof($dummyData["weeklyOff"][$i]) ; $l++){
       				$table1 		= "`weekly_off`";
       				$query1 		= "INSERT INTO $table1 (w_branch_id, w_off_days, status, created_at ) VALUES ('".$dummyData["branch"][$i]."','".$dummyData["weeklyOff"][$i][$l]."','1','".Date("Y-m-d")."')";
                    // print_r($query1); die;
	       			if( $dbConn->query($query1) === true ){
	   
			    	$isinsert = 1;
			    	}else{
			    	$isinsert = 0;
			    	}
       			}
	              
	       	}
	       	
	       	if($isinsert == 1){
	       	  
	       if(!empty($dummyData["date"]) && !empty($dummyData["resone"]) ){
                $dummyData["branch"] = array_values($dummyData["branch"]);
                $dummyData["date"][$i] = array_values($dummyData["date"][$i]);
                $dummyData["resone"][$i] = array_values($dummyData["resone"][$i]);
                
		       	for($j=0; $j<sizeof($dummyData["date"][$i]); $j++){
	     			$table 		= "`yearly_holidays`";
	     		   
	     			$date	= trim( str_replace("/", "-", $dummyData["date"][$i][$j]) );
		            $Date	= trim( date("Y-n-j", strtotime($date) ) );
	     		    
					$query 		= "INSERT INTO $table (h_branch_id, holiday_date, holiday_resone, status, created_at ) VALUES ('".$dummyData["branch"][$i]."', '".$Date."','".$dummyData["resone"][$i][$j]."', '1','".Date("Y-m-d")."')";
                  
					if( $dbConn->query($query) === true ){
						$isinsert = 2;
			    	}else{
			    		$isinsert = 0;
			    	}
	     		}
	       }
      	}
	       
	     	   
     	}
		
    	if($isinsert == 2 ){
		    	$reponse["status"] 	= "true";
			    $reponse["msg"] 	= "Success!";
			    return $reponse;
		    	}

	} else {

		$reponse["status"] 	= "false";
		$reponse["msg"] 	= "Database Connection Failed!";
        return $reponse;
	}

	return $reponse;
}


function export(){
include("libraries/Pdf.php");
	 $pdf_data = array();
     $resone   = $_GET["duplicate_holiday"];
	 $days     = $_GET["weekly_value"];
	 $branch   = strtoupper($_GET["branch_value"]);
	 $date     = $_GET["duplicate_date"];
     $pdf_data = array("date" => $date ,"resone" => $resone);
	 $obj_pdf  = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false); 

	 $obj_pdf->SetCreator(PDF_CREATOR);  
	 $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
	 $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
	 $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
	 $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
	 $obj_pdf->SetDefaultMonospacedFont('helvetica');  
	 $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
	 $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '3', PDF_MARGIN_RIGHT);  
	 $obj_pdf->setPrintHeader(false);  
	 $obj_pdf->setPrintFooter(false);  
	 $obj_pdf->SetAutoPageBreak(TRUE, 10);  
	 $obj_pdf->SetFont('helvetica', '', 12);
	 $pdf_table  = "";
     $weekly_off = "";

		    for ($i = 0; $i < sizeof($pdf_data["date"]); $i++){
		    $pdf_table .= '<tr><td style="border: 1px solid #ccc;">'.$pdf_data["date"][$i].'</td><td style="border: 1px solid #ccc;">'.$pdf_data["resone"][$i].'</td></tr>';
		    }

           
            for ($i = 0; $i < sizeof($days); $i++){
		    $weekly_off .= '<tr><td style="border: 1px solid #ccc;">'.$days[$i].'</td></tr>';
		    } 

			$html = '<html xmlns="http://www.w3.org/1999/xhtml"><body style="font-family: Arial; font-size: 10pt; text-align: left;"><div><h3 style="background-color: #F7F7F7; ">HOLIDAY CALENDAR</h3><h4 style="background-color: #F7F7F7; ">BRANCH : '.$branch.'</h4></div><div><h4 style="background-color: #F7F7F7; ">YEARLY OFF</h4></div><div class="container"><table style="margin-bottom: 30px;border-collapse: collapse;padding-right: 30px; border: 1px solid #ccc; margin: 5px;"  cellspacing="0" cellpadding="3"><tr><th style="background-color: #F7F7F7; color: #333;font-weight: bold; background-color: #F7F7F7;color: #333; font-weight: bold; border: 1px solid #ccc;">Date</th><th style="background-color: #F7F7F7; color: #333;font-weight: bold; background-color: #F7F7F7;color: #333; font-weight: bold; border: 1px solid #ccc;">Occasion</th></tr>'.$pdf_table.'</table></div><div><h4 style="background-color: #F7F7F7; ">WEEKLY OFF</h4></div><div class="container"><table style="margin-bottom: 30px;border-collapse: collapse;padding-right: 30px; border: 1px solid #ccc; margin: 5px;"  cellspacing="0" cellpadding="3"><tr><th style="background-color: #F7F7F7; color: #333;font-weight: bold; background-color: #F7F7F7;color: #333; font-weight: bold; border: 1px solid #ccc;">Day</th></tr>'.$weekly_off.'</table></div></body></html>';
			
			$obj_pdf->AddPage(); 

			$obj_pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true); 


			$dir         = 'data/upload/';
			$filename    = 'holiday.pdf';
            
			if( ! is_dir( dirname(__FILE__) .'/'. $dir ) )
			mkdir( dirname(__FILE__) .'/' . $dir, 0777, TRUE );

			$obj_pdf->Output(dirname(__FILE__) .'/'. $dir . $filename, 'F');  
             // echo dirname($_SERVER['PHP_SELF']);die;
            $response["name"]   = $filename;
            $response["url"]  = str_replace('/','\\', dirname($_SERVER['PHP_SELF']).'/'. $dir . $filename);
            // $response["filepath"]  = str_replace('/','\\', $dir . $filename);
            $response["filepath"]  = $dir . $filename;
     
            return $response;
			
}

/*
* To get todays call
* @param 	- none 
* @return 	- json 
*/
 function unlinkFile($dbConn){

    $response["status"]  = "false";
	$response["msg"] 	 = "Invalid Request!";
	$response["data"] 	 = array();
	if( !empty($dbConn)){

    	$filePath = $_GET["filePath"];
        
    	if(!empty($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/holiday_calendar/'.$filePath)){

    		if(unlink($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/holiday_calendar/'.$filePath)){
    		$response["status"] 	= "true";
	        $response["msg"] 	= "sucess!";
	        $response["data"] 	= array();
	        return $response;
    		}
    		
    	}

    }

    return $response;
}


function getbranches($dbConn){
	// print_r($_POST);
	
	$reponse["status"] 	= "false";
	$reponse["msg"] 	= "Invalid Request!";
	$reponse["data"] 	= array();
	if( !empty($dbConn)){
       $table 		= "`office_location`";
		$query 		= "SELECT id,name FROM $table";
		$result 	= mysqli_query( $dbConn, $query);
		$reponse["data"] 	= $result;
		$reponse["status"] 	= "true";
		$reponse["msg"] 	= "sucess!";
       if( !empty($result) ){
	    	$rows 	= array();
	    	while( $row = mysqli_fetch_assoc($result) ) {
		        $rows[] = $row;
		    }
		    return $rows;
	    }

	} else {

		return false;
	}

	return false;
}

/*
* To get record close in this month
* @param 	- (array) $dbConn 
* @param 	- (bool) $isRecords 
* @param 	- (string) $filterUser 
* @param 	- (string) $filterTeam 
* @return 	- (bool/array)
*/

function getHolidayCalendarData( $dbConn){
	
	$response["status"] = "false";
	$response["msg"] 	= "Invalid Request!";
	$response["data"] 	= array();

	// create helper object
	
	if( empty($dbConn) ){
		$response["msg"] 	= "Database Connection Failed!";
	}
      
		$table 		= "`yearly_holidays` as y";
		$select		= " y.h_branch_id, o.name, DATE_FORMAT(y.holiday_date, '%e/%c/%Y' ) as holiday_date, y.holiday_resone";
		$join 		= "INNER JOIN office_location as o ON o.id = y.h_branch_id ";
		$orderBy 	= "ORDER BY y.h_branch_id ASC ";
		$query 		= "SELECT $select FROM $table $join $orderBy";
    	$result 	    = mysqli_query($dbConn, $query);

    	if( !empty($result) ){
          
        $table1 		= "`weekly_off`";
		$select1		= "w_branch_id , w_off_days";
		$orderBy1 	    = " ORDER BY w_branch_id ASC ";
		$query1 		= "SELECT $select1 FROM $table1 $orderBy1";
		$result1 	    = mysqli_query($dbConn, $query1);
	    $rows 	        = array();
	    $rows1 	        = array();

	    	while( $row = mysqli_fetch_assoc($result) ) {
		        $rows[] = $row;
		    }
		    while( $row1 = mysqli_fetch_assoc($result1) ) {
		        $rows1[] = $row1;
		    }
	    	$response["status"] = "true";
			$response["msg"] 	= "Success!";
			$response["data"] 	= array( 'yearly' =>$rows, 'weekly' =>$rows1);
	    }


	return $response;
}


function checkHolidayDate($dbConn){
	
	$response["status"] = "false";
	$response["msg"] 	= "Invalid Request!";
	$response["data"] 	= array();

	// create helper object
	
	if( empty($dbConn) ){
		$response["msg"] 	= "Database Connection Failed!";
	}
    
    $inputDate  = $_GET["inputDate"];
    $inputbranch= $_GET["inputbranch"]; 
	if(!empty($inputDate) && !empty($inputbranch)){
   
		$table 		= "`yearly_holidays`";
		$select		= "COUNT(holiday_date) as count";
		$where 	    = "h_branch_id = '$inputbranch' AND (DATE_FORMAT(holiday_date, '%d/%m/%Y' ) = '$inputDate')";
		$query 		= "SELECT $select FROM $table WHERE $where";
    	$result 	= mysqli_query($dbConn, $query);
    	if( !empty($result) ){

	    	$row 	= mysqli_fetch_assoc($result);
	    	$count 	= isset( $row['count'] ) ? $row['count'] : 0;
	    	$response["status"] = "true";
			$response["msg"] 	= "Success!";
			$response["data"] 	= array( 'count' =>$count);
	    
        }

    }

	return $response;
}


function getbranchById( $dbConn){
	
	$response["status"] = "false";
	$response["msg"] 	= "Invalid Request!";
	$response["data"] 	= array();

	// create helper object
	
	if( empty($dbConn) ){
		$response["msg"] 	= "Database Connection Failed!";
	}

    $inputbranch= $_GET["inputbranch"];
	if(!empty($inputbranch)){
        
		$table 		= "`office_location`";
		$select		= "name";
		$where 	    = "WHERE id = '$inputbranch'";
		$query 		= "SELECT $select FROM $table $where";
    	$result 	= mysqli_query($dbConn, $query);
       
    	if( !empty($result) ){

	        $row 	= mysqli_fetch_assoc($result);
	    	$brname 	= isset( $row['name'] ) ? $row['name'] : '';
	    	$response["status"] = "true";
			$response["msg"] 	= "Success!";
			$response["data"] 	= array( 'brname' =>$brname);
	    
        }

    }

	return $response;
}


/*
* Here ajax call
*/

$postmethodName = isset( $_POST["methodName"] ) ? $_POST["methodName"] : NULL ;
$getmethodName = isset( $_GET["methodName"] ) ? $_GET["methodName"] : NULL ;

if( $postmethodName == "insertHolidays" || $getmethodName == "insertHolidays") {

	$response = insertHolidays( $dbConn );
	echo json_encode($response); 
	return true;

}else if( $postmethodName == "getbranches" || $getmethodName == "getbranches") {

	$returnArr = getbranches( $dbConn );
	$html = '';
	if( !empty($returnArr) ) {
    $i = 0;
    $html = '<option value="">Select Branch</option>';
		foreach ($returnArr as $key => $value) {
				$html .= '<option value="'.$value["id"].'">'.$value["name"].'</option>';
				$i++;
		}
	}else{
		$html .= '<option value="">Select Branch</option>';
	}

	$response["status"] = "true";
	$response["msg"] 	= "Success!";
	$response["data"] 	= array( "html"=>$html );

	echo json_encode($response); 
	return true;
	

} else if($postmethodName == "export" || $getmethodName == "export"){
$responseArr = export();
$response["data"] 	= array( "url" => $responseArr["url"],"name"=> $responseArr["name"], "filepath" =>$responseArr["filepath"]);

	echo json_encode($response); 
	return true;
}else if($postmethodName == "unlinkFile" || $getmethodName == "unlinkFile"){
$response = unlinkFile( $dbConn );
 echo json_encode($response); 
 return true;
}else if($getmethodName == "getHolidayCalendarData"){
$response = getHolidayCalendarData( $dbConn );
 echo json_encode($response); 
 return true;
}else if($getmethodName == "checkHolidayDate"){
$response = checkHolidayDate( $dbConn );
 echo json_encode($response); 
 return true;
}else if($getmethodName == "getbranchById"){
$response = getbranchById( $dbConn );
 echo json_encode($response); 
 return true;
}