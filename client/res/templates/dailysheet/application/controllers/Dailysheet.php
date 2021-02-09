<?php

session_start();

defined('BASEPATH') OR exit('No direct script access allowed');

//$this->session->userdata('Login');
// $_SESSION['Login']="fincrm";

class Dailysheet extends CI_Controller {

	
	public function __construct() {
       
    	parent::__construct();
       	$this->load->model('Dailysheet_model');

       	$this->load->library("Pdf");
        // $this->db_default1 = $this->load->database('default1', TRUE); 

        date_default_timezone_set('Asia/Kolkata');
        //$current_login_user=$_SESSION['Login'];
        $username   = $_SESSION['Login'];
        if(empty($_SESSION['Login'])){
        	// echo "hello"; die;
            echo "<script>window.location='http://".$_SERVER["HTTP_HOST"]."';</script>";
        }
        $this->data = array(
          'username'=> $username,
          'url'=> $this->Dailysheet_model->siteURL(),
        );
        $url          = $this->data['url'];
        $domain       = explode(".", $url);
        $domain       = $domain[0];
        $domainStatus = $this->Dailysheet_model->getDomainStatus($domain);
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


	public function index() {
		$sData             = array();

		$username          = $this->data['username'];

		$user['user1']	   = $this->Dailysheet_model->getUserIdByUsername($username);

	    $userId 	       = $user['user1']['id'];

		$isUserReviewer	   = $this->Dailysheet_model->isUserReviewer($userId);
        
	    $isUserAdmin	    = $this->Dailysheet_model->isUserAdmin($userId);
     
           if(!empty($isUserAdmin)){
	       	$sData["isuser"] = 1;
	       }else if(!empty($isUserReviewer)){
	       	$sData["isuser"]    = 1;
	       }else{
	       	$sData["isuser"]    = 0;
	       }

		$this->load->view('includes/header');
		$this->load->view('includes/sidebar',$sData);
		$this->load->view('dashboard');
	    $this->load->view('includes/footer');
	}

    
     /*
	* To get daily sheet list for user
	* @parm 	- none
	* @return 	- none
	*/
     public function fetch_data(){

		## Read value
		$draw               =$this->input->post('draw');
        $columnIndex1       =$this->input->post('order');
        $columns            =$this->input->post('columns');
        $columnIndex        =$columnIndex1[0]['column'];
        
        $searchKey          = array(

        'row'               => $this->input->post('start'),
		'rowperpage'        =>  $this->input->post('length'),// Rows display per page
		'columnName'        => $columns[$columnIndex]['data'], // Column name
		'columnSortOrder'   => $columnIndex1[0]['dir'], // asc or desc
		'keyword'           => $this->input->post('searchByName'),
		'location'          => $this->input->post('locationfilter'),
		'datefilter' 	    => $this->input->post('datefilter'),
		'statusfilter' 	    => $this->input->post('statusfilter'),
	    'filter_date_start' => $this->input->post('filter_date_start'),
		'filter_date_end'	=> $this->input->post('filter_date_end'),
        );
		## Search 
		$username           = $this->data['username'];
        
		$user['user1']	    = $this->Dailysheet_model->getUserIdByUsername($username);
		 
	    $userId 	        = $user['user1']['id'];
		## Total number of records without filtering
		$totalRecords       = $this->Dailysheet_model->daily_sheet_data($userId);
		## Total number of records with filtering
		$totalRecordwithFilter= $this->Dailysheet_model->getemployeebyorder($searchKey,$userId,$isCount=true);
		## Fetch records
		$empRecords= $this->Dailysheet_model->getemployeebyorder($searchKey,$userId,$isCount=false);
		
		$data = array();
        
		foreach ($empRecords as $key => $value) {
			# code...
			if($value['activity_status']==1){
		     	$activity      = "<div class ='label-save-as-draft' >Save as Draft </div>";
		     	$data_value    ="draft";
		     	$display_type  = "edit";
		     }else if($value['activity_status']==2){
                $activity      = '<div class ="label-info" >Submitted </div>';
                $data_value    ="pending_review";
                $display_type  = "view";
		     }else if($value['activity_status']==3){
                $activity      = '<div class ="label-success" >Accepted </div>';
                $data_value    ="accept";
                $display_type  = "view";
		     }else if($value['activity_status']==4){
		     	 $activity     =  '<div class ="label-danger" >Rejected </div>';
		     	 $data_value   ="reject";
		     	 $display_type = "edit";
		     }else{
		     	 $activity     = '---';
		     	 $data_value   ="---";
		     	 $display_type = "---";
		     }

				$date          =date_create($value['daily_sheet_date']);
				$date          = date_format($date, 'd M, Y');
				$in_time       =strtotime($value['in_time']);
				$in_time       = date("H:i",$in_time);
				$out_time      =strtotime($value['out_time']);
				$out_time      = date("H:i",$out_time);
				$srNo          = $this->input->post("start")+$key+1;
				
				$data[] = array(
				"srNo"	          =>$value['id'],
				"id"              =>$srNo,
				"daily_sheet_date"=>$date,
				"activity_status" =>$activity,
				"working_from"    =>$value['working_from'],
				"in_time"         =>$in_time,
				"in_time"         =>$in_time,
				"out_time"        =>$out_time,
				"data_value"      =>$data_value,
				"display_type"    =>$display_type,
				"totalRecords"    =>$totalRecords,
				 "TotalDisplayRecords" => $totalRecordwithFilter,
		        );
		}

		## Response
		$response = array(
		  "draw"                 => intval($draw),
		  "iTotalRecords"        => $totalRecords,
		  "iTotalDisplayRecords" => $totalRecordwithFilter,
		  "aaData"               => $data
		);

		echo json_encode($response);



	}

    /*
	* To get daily sheet list excluding draft, for reviewer and admin
	* @parm 	- none
	* @return 	- none
	*/
    public function review_fetch_data(){

		## Read value
		$draw               =$this->input->post('draw');
        $columnIndex1       =$this->input->post('order');
        $columns            =$this->input->post('columns');
        $columnIndex        =$columnIndex1[0]['column'];
        
        $searchKey          = array(

        'row'               => $this->input->post('start'),
		'rowperpage'        =>  $this->input->post('length'),// Rows display per page
		'columnName'        => $columns[$columnIndex]['data'], // Column name
		'columnSortOrder'   => $columnIndex1[0]['dir'], // asc or desc
		'keyword'           => $this->input->post('searchByName'),
		'allusernames'      => $this->input->post('allusernames'),
		'location'          => $this->input->post('locationfilter'),
		'datefilter' 	    => $this->input->post('datefilter'),
		'statusfilter' 	    => $this->input->post('statusfilter'),
	    'filter_date_start' => $this->input->post('filter_date_start'),
		'filter_date_end'	=> $this->input->post('filter_date_end'),
        );
		

		$username  		             = $this->data['username'];
		$user['user1']	             = $this->Dailysheet_model->getUserIdByUsername($username);
	    $userId 		             = $user['user1']['id'];
		## Total number of records without filtering
		$totalRecords_review         = $this->Dailysheet_model->review_daily_sheet_count($userId);
		## Total number of records with filtering
		$totalRecordwithFilter_review= $this->Dailysheet_model->review_select_sheet($searchKey,$userId,$isCount=true);
		## Fetch records
		$empRecords_review           = $this->Dailysheet_model->review_select_sheet($searchKey,$userId,$isCount=false );
      
		$data = array();

		foreach ($empRecords_review as $key => $value) {
			# code...
			if($value['activity_status']==1){
		     	$activity      = "<div class ='label-save-as-draft' >Save as Draft </div>";
		     	$data_value    ="draft";
		     	$display_type  = "edit";
		     }else if($value['activity_status']==2){
                $activity      = '<div class ="label-info" >Pending </div>';
                $data_value    ="pending_review";
                $display_type  = "view";
		     }else if($value['activity_status']==3){
                $activity      = '<div class ="label-success" >Accepted </div>';
                $data_value    ="accept";
                $display_type  = "view";
		     }else if($value['activity_status']==4){
		     	 $activity     =  '<div class ="label-danger" >Rejected </div>';
		     	 $data_value   ="reject";
		     	 $display_type = "edit";
		     }else{
		     	 $activity     = '---';
		     	 $data_value   ="---";
		     	 $display_type = "---";
		     }
				$date     = date_create($value['daily_sheet_date']);
				$date     = date_format($date, 'd M, Y');
				$in_time  = strtotime($value['in_time']);
				$in_time  = date("H:i",$in_time);
				$out_time = strtotime($value['out_time']);
				$out_time = date("H:i",$out_time);
				$username = $value['first_name']." ".$value['last_name'];
				$srNo     = $this->input->post("start")+$key+1;

                //echo $username;
				$data[] = array(
				"id"	          =>$srNo,
				"srNo"            =>$value['id'],
				"daily_sheet_date"=>$date,
				"activity_status" =>$activity,
				"working_from"    =>$value['working_from'],
				"in_time"         =>$in_time,
				"first_name"      =>$username,
				"out_time"        =>$out_time,
				"data_value"      =>$data_value,
				"display_type"    =>$display_type,
				"totalRecords"    =>$totalRecords_review,
				"iTotalDisplayRecords" => $totalRecordwithFilter_review,
				);
		}

		## Response
		$response = array(
		  "draw"                 => intval($draw),
		  "iTotalRecords"        => $totalRecords_review,
		  "iTotalDisplayRecords" => $totalRecordwithFilter_review,
		  "aaData"               => $data
		);

		echo json_encode($response);



	}
    

    /*
	* To get daily sheet list of accepted task for reviewer and admin 
	* @parm 	- none
	* @return 	- none
	*/
	public function accepted_fetch_data(){

		## Read value
		$draw               =$this->input->post('draw');
        $columnIndex1       =$this->input->post('order');
        $columns            =$this->input->post('columns');
        $columnIndex        =$columnIndex1[0]['column'];
        
        $searchKey          = array(

        'row'               => $this->input->post('start'),
		'rowperpage'        =>  $this->input->post('length'),// Rows display per page
		'columnName'        => $columns[$columnIndex]['data'], // Column name
		'columnSortOrder'   => $columnIndex1[0]['dir'], // asc or desc
		'keyword'           => $this->input->post('searchByName'),
		'allusernames'      => $this->input->post('allusernames'),
		'location'          => $this->input->post('locationfilter'),
		'datefilter' 	    => $this->input->post('datefilter'),
		'statusfilter' 	    => $this->input->post('statusfilter'),
	    'filter_date_start' => $this->input->post('filter_date_start'),
		'filter_date_end'	=> $this->input->post('filter_date_end'),
        );
		

		$username                = $this->data['username'];

		$user['user1']		     = $this->Dailysheet_model->getUserIdByUsername($username);

	    $userId 	             = $user['user1']['id'];
		## Total number of records without filtering
		$totalRecords_review     = $this->Dailysheet_model->accepted_daily_sheet_count($userId);
		## Total number of records with filtering
		$totalRecordwithFilter_review= $this->Dailysheet_model->accepted_select_sheet($searchKey,$userId,$isCount=true);
		## Fetch records
		$empRecords_review       = $this->Dailysheet_model->accepted_select_sheet($searchKey,$userId,$isCount=false);
        
		$data                    = array();

		foreach ($empRecords_review as $key => $value) {
			# code...
			if($value['activity_status']==1){
		     	$activity      = "<div class ='label-save-as-draft' >Save as Draft </div>";
		     	$data_value    ="draft";
		     	$display_type  = "edit";
		     }else if($value['activity_status']==2){
                $activity      = '<div class ="label-info" >Submitted </div>';
                $data_value    ="pending_review";
                $display_type  = "view";
		     }else if($value['activity_status']==3){
                $activity      = '<div class ="label-success" >Accepted </div>';
                $data_value    ="accept";
                $display_type  = "view";
		     }else if($value['activity_status']==4){
		     	 $activity     =  '<div class ="label-danger" >Rejected </div>';
		     	 $data_value   ="reject";
		     	 $display_type = "edit";
		     }else{
		     	 $activity     = '---';
		     	 $data_value   ="---";
		     	 $display_type = "---";
		     }
				$date              =date_create($value['daily_sheet_date']);
				$date              = date_format($date, 'd M, Y');
				$in_time           =strtotime($value['in_time']);
				$in_time           = date("H:i",$in_time);
				$out_time          =strtotime($value['out_time']);
				$out_time          = date("H:i",$out_time);
				$username          = $value['first_name']." ".$value['last_name'];
				$srNo              = $this->input->post("start")+$key+1;

                //echo $username;
				$data[]            = array(
			    "srNo"             =>$value['id'],
				"id"               =>$srNo,
				"daily_sheet_date" =>$date,
				"activity_status"  =>$activity,
				"working_from"     =>$value['working_from'],
				"in_time"          =>$in_time,
				"first_name"       =>$username,
				"out_time"         =>$out_time,
				"data_value"       =>$data_value,
				"display_type"     =>$display_type,
				"totalRecords"     =>$totalRecords_review,
				"iTotalDisplayRecords" => $totalRecordwithFilter_review,
				);
		}

		## Response
		$response = array(
		  "draw"                   => intval($draw),
		  "iTotalRecords"          => $totalRecords_review,
		  "iTotalDisplayRecords"   => $totalRecordwithFilter_review,
		  "aaData"                 => $data
		);

		echo json_encode($response);

	}

	/*
	* To load view of ceated dailysheet list
	* @parm 	- none
	* @return 	- none
	*/
	public function daily_sheet( $format = "d-m-Y")	{	

		$data 				= array();	 
		$hData['title'] 	= "Daily Sheet";
		$sData 				= array();
		$fData 				= array();
		$reviewer1          ="";
        
        $username  = $this->data['username'];
        
		$user['user1']		= $this->Dailysheet_model->getUserIdByUsername($username);
		 
		$keysearch          = $this->input->post("search");

	    $userId 	        = $user['user1']['id']; 

	    $reviewerId         = $user['user1']['user_parent_id'];

        if(!empty($reviewerId)){
        
        	$reviewer['name']	= $this->Dailysheet_model->getReviewerById($reviewerId);
        	$reviewer1          = $reviewer['name'][0]["first_name"]." ".$reviewer['name'][0]["last_name"];
        }
       
        $UserNameByid	    = $this->Dailysheet_model->UserNameByid($userId);

        $isUserReviewer	    = $this->Dailysheet_model->isUserReviewer($userId);
        $isUserAdmin	    = $this->Dailysheet_model->isUserAdmin($userId);

        
           if(!empty($isUserAdmin)){
	       	$sData["isuser"] = 1;
	       }else if(!empty($isUserReviewer)){
	       	$sData["isuser"]    = 1;
	       }else{
	       	$sData["isuser"]    = 0;
	       }
        
	 	$_SESSION['username']       =$UserNameByid;
	 	$_SESSION['reviewer']       =$reviewer1;
	 	$_SESSION['userId']         =$userId;
	 	$_SESSION['reviewerId']     =$reviewerId;

		$data['userRegisterDate'] 	= $this->Dailysheet_model->getUserDateByUserId($userId);

		$data['select_braches'] 	= $this->Dailysheet_model->select_braches();

		$data['lastDailySheet'] 	= $this->Dailysheet_model->getAllDailySheetDatesByUserId($userId);

		$data['activityDetails'] 	= $this->Dailysheet_model->select_activity_data($userId);
      
     	$AllDates = array();
     	$data['select_braches'] 	= $this->Dailysheet_model->select_braches();
		$data['allusernames'] 	    = $this->Dailysheet_model->get_all_usernames($userId);

        foreach($data['lastDailySheet'] as $key=>$value) {
        	$AllDates[] = date('d-m-Y',strtotime($value["daily_sheet_date"])) ;
       	}

       
     	$DailySheetDatesByUser       = $data['lastDailySheet'];

 	  	$begin 	                     = date('d-m-Y',strtotime($data['userRegisterDate'])); 

      	$end 	                     = date('d-m-Y'); 
      	
		// Use strtotime function 
		$Variable1                   = strtotime( $begin); 

		$Variable2                   = strtotime($end); 
		  
		// Use for loop to store dates into array 
		for ($currentDate = $Variable1; $currentDate <= $Variable2; $currentDate += (86400)) { 
		                                      
			$Store = date('d-m-Y', $currentDate); 
			$AllDatesBetweenRegAndCurrentDates[] = $Store; 

		} 
		  
        $data['uncommon_dates']      = array_values( array_diff($AllDatesBetweenRegAndCurrentDates,$AllDates) );

   		$data['data']                = $this->Dailysheet_model->select_sheet($userId,$keysearch);
  		
		$this->load->view( "includes/header", $hData );
		$this->load->view( "includes/sidebar", $sData);
		$this->load->view( "daily_sheet_list", $data);
		$this->load->view( "includes/footer", $fData );

	}

	
	/*
	* To get edit daily sheet
	* @parm 	- none
	* @return 	- none
	*/
	public function ajaxGetDailySheetDetails(){

		$data           = array();
		$data["error"] 	= "true";
		$data["status"] = "false";
		$data["msg"] 	= "Invalid request!";
	    $username  = $this->data['username'];
		$user['user1']		= $this->Dailysheet_model->getUserIdByUsername($username);
	    $userId 	        = $user['user1']['id']; 
		$editId = $this->input->post("editId");
		
        $UserNameByid	    = $this->Dailysheet_model->UserNameByid($userId);
        $isUserAdmin	    = $this->Dailysheet_model->isUserAdmin($userId);
        if(!empty($isUserAdmin)){
        	$isAdmin = 1;
        }else{
        	$isAdmin = 0;
        }
		if( !empty($editId) ){

			$dailySheetDetails 			= $this->Dailysheet_model->getDailySheetDetails($editId);
				

			$dailySheetActivityDetails 	= $this->Dailysheet_model->getdailySheetActivityDetails($editId);
			$dailySheetFeedbackDetails 	= $this->Dailysheet_model->getdailySheetFeedback($editId);
			
            $url  			            = $this->data['url'];

             if( !empty($dailySheetDetails) && !empty($dailySheetActivityDetails) ){
             
				$data["error"] 	= "false";
				$data["status"] = "true";
				$data["msg"] 	= "Record found!";
				$data['data'] 	= array( "main" => $dailySheetDetails, "activities" => $dailySheetActivityDetails , "feedback" => $dailySheetFeedbackDetails ,"url" =>$url,"UserNameByid"=>$UserNameByid, "isUserAdmin"=>$isAdmin);
				echo json_encode($data);return;

			}
			
		}
        
		echo json_encode($data);return;

	}

	/*
	* To load view of dailysheet list for reviewer 
	* @parm 	- none
	* @return 	- none
	*/
	public function review_sheet( $format = "d-m-Y") {	

		$data 				= array();	 
		$hData['title'] 	= "Daily Sheet";
		$sData 			    = array();
		$fData 				= array();
		
        $rowId              = $this->input->post("trId");
     	$username  			= $this->data['username'];

       	$user['user1']		= $this->Dailysheet_model->getUserIdByUsername($username);

	    $userId 	        = $user['user1']['id']; 
	    $reviewerId         = $user['user1']['user_parent_id'];

        $isUserReviewer	= $this->Dailysheet_model->isUserReviewer($userId);
        $isUserAdmin	    = $this->Dailysheet_model->isUserAdmin($userId);
	       if(!empty($isUserAdmin)){
	       	$sData["isuser"] = 1;
	       }else if(!empty($isUserReviewer)){
	       	$sData["isuser"]    = 1;
	       }else{
	       	$sData["isuser"]    = 0;
	       }
	   	$reviewerId                 = $this->Dailysheet_model->getReviewerIdByReviewername($username);
		$data['select_braches'] 	= $this->Dailysheet_model->select_braches();
		
		$data['allusernames'] 	    = $this->Dailysheet_model->get_all_usernames($userId);
		
		$this->load->view( "includes/header", $hData );
		$this->load->view( "includes/sidebar", $sData );
		$this->load->view( "reviewer_list", $data);
		$this->load->view( "includes/footer", $fData );
	}


    /*
	* To load view of accepted dailysheet list for reviewer
	* @parm 	- none
	* @return 	- none
	*/

	public function accepted_sheet( $format = "d-m-Y") {	

		$data 				      = array();	 
		$hData['title'] 	      = "Daily Sheet";
		$sData 			          = array();
		$fData 				      = array();
		
        $rowId                    = $this->input->post("trId");
     	$username                 = $this->data['username'];

       	$user['user1']		      = $this->Dailysheet_model->getUserIdByUsername($username);

	    $userId 	              = $user['user1']['id']; 
	    $reviewerId               = $user['user1']['user_parent_id'];

        $isUserReviewer	          = $this->Dailysheet_model->isUserReviewer($userId);
        
	    $isUserAdmin	    = $this->Dailysheet_model->isUserAdmin($userId);
	       if(!empty($isUserAdmin)){
	       	$sData["isuser"] = 1;
	       }else if(!empty($isUserReviewer)){
	       	$sData["isuser"]    = 1;
	       }else{
	       	$sData["isuser"]    = 0;
	       }
	   	$reviewerId               = $this->Dailysheet_model->getReviewerIdByReviewername($username);

	   	$data['select_braches']   = $this->Dailysheet_model->select_braches();
        $data['allusernames'] 	  = $this->Dailysheet_model->get_all_usernames($userId);

		$this->load->view( "includes/header", $hData );
		$this->load->view( "includes/sidebar", $sData );
		$this->load->view( "accepted_list", $data);
		$this->load->view( "includes/footer", $fData );
	}
		
	
	/*
	* To add daily sheet
	* @parm 	- none
	* @return 	- none
	*/
	public function addDailySheet() {
		
		$data 			             = array();
		$data["error"] 	             = "true";
		$data["status"]              = "false";
		$data["msg"] 	             = "Invalid request!";
        $data                        = $this->input->post("");

        $attachment 	             = $this->input->post('attach_files');
		$attachment 	          = array_values($attachment);

		$data                     = $this->input->post("");
		$url        			  = $this->Dailysheet_model->siteURL();
		$username                 = $this->data['username'];
        $dir                      = "";
        $user['user1']		      = $this->Dailysheet_model->getUserIdByUsername($username);
        $userId 	              = $user['user1']['id']; 
        $date                     = str_replace('/', '-', $this->input->post('date_1'));
        $create_dailysheet_dates  = $this->Dailysheet_model->getallInsertedDates($userId);
        if(!empty($create_dailysheet_dates)){

        	$inserted_date      = array_column($create_dailysheet_dates, 'daily_sheet_date');
        	$matchIndex = array_search($date, $inserted_date);
	        $display_date = $this->input->post('date_1');
			if($matchIndex !== false){
			 	$data["error"] 	= "true";
			 	$data["status"] = "false";
				$data["msg"] 	= "Sorry, you have already submitted the daily time sheet for ".$display_date;
				echo json_encode($data);
				return;
			}
        }
		

        $uploads_dir 			  = "";
	    
	    include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/wasabi_connect.php');
		for($j=0; $j <count($attachment); $j++){
			
			if(!empty($attachment[$j])){
			$attachment1             = explode(',', $attachment[$j]);
			
			$LastId 		         = $this->Dailysheet_model->getlastIdofDailySheet();
			$CurrentId 		         = $LastId + 1 ;
			$uploads_dir 	         = 'uploads/'.$url.'/daily_sheet/create&review/'.$CurrentId;

            if (!is_dir('uploads/'.$url.'/daily_sheet/create&review/'.$CurrentId)) {
         		mkdir('uploads/'.$url.'/daily_sheet/create&review/'.$CurrentId, 0777, true);
          	}
			$dir = "uploads/".$url."/daily_sheet/create&review/tempName/".$username;//"path/to/targetFiles";
			
				if (is_dir($dir)) {
					if ($dh = opendir($dir) ) {
					
			            for($i=0; $i<count($attachment1); $i++){
							$pos = strrpos($attachment1[$i], '.');
						    $name = substr($attachment1[$i], 0, $pos);
						    $ext  = substr($attachment1[$i], $pos);
							rename($dir."/".$name.".zip",$uploads_dir."/".$name.".zip");
							
							$source = 'uploads/'.$url.'/daily_sheet/create&review/'.$CurrentId.'/'.$name.".zip";

							// // Where the files will be transferred to
							$dest = 'Production/'.$url.'/daily_sheet/create&review/'.$CurrentId.'/'.$name.".zip";

							// // Create a transfer object
							// $manager = new \Aws\S3\Transfer($s3, $source, $dest);
							echo $source. "<br>"; 
							echo $dest. "<br>"; 
							// //Perform the transfer synchronously
							// $manager->transfer();
							
						    $result = $client->putObject([
						        'Bucket' => 'fincrm',
						        'Key'    => $dest,
						        'SourceFile' => $source         
						 	]);
						}

					}
		    	}
	     	}
    	}
     
			
       	$user_id 		   			= $this->input->post('employee_id');
		$user_parent_id     		= $this->input->post('reporting_id');
		
	    $daily_sheet_task_date     	= date('Y-m-d', strtotime($date));
		$daily_sheet_in_time 	   	= $this->input->post('inTime');
		$daily_sheet_out_time 	   	= $this->input->post('outTime');
		$daily_sheet_working_from  	= $this->input->post('working_from');
	    $daily_sheet_activity      	= $this->input->post('activity_msg');
		$daily_sheet_start_time    	= $this->input->post('activity_inTime');
		$daily_sheet_end_time      	= $this->input->post('activity_outTime');
		
	    $daily_sheet_status        	= $this->input->post('status');
       
        $insertData = array(
	        'user_id' 			=> $user_id,
	        'user_parent_id' 	=> $user_parent_id,
	        'daily_sheet_date' 	=> $daily_sheet_task_date,
	        'in_time' 			=> $daily_sheet_in_time,
	        'out_time' 			=> $daily_sheet_out_time,
	        'working_from' 		=> $daily_sheet_working_from,
	        'activity_status' 	=> $daily_sheet_status,
	        'created_at' 		=> date("Y-m-d h:i:s"),
	        'status' 			=>'0',
	    );


      	if( $this->form_validation->run('create_daily_sheet') == TRUE ){    
       		
       		$last_id            = $this->Dailysheet_model->insert_sheet($insertData);
 			
 			if(!empty($last_id)){
       			//echo $last_id;
	        	for($i = 0; $i < count($daily_sheet_activity); $i++) {
	          	
			      	$insertActivity = array(
						'daily_sheet_id' 		=> $last_id,
						'activity' 				=> $daily_sheet_activity[$i],
						'start_time' 			=> $daily_sheet_start_time[$i],
						'end_time' 				=> $daily_sheet_end_time[$i],
						'attachment' 			=> $attachment[$i],
						'created_at' 			=> Date('Y-m-d'),
						'status' 				=> '0',
					);
                   
	        		$activity =	$this->Dailysheet_model->insert_activity($insertActivity);
            		
	        	}

	        	if ( $activity ) {

             	   if(is_dir($dir)){
                         delete_files($dir."/");
                          rmdir($dir);
                    }
                    
                    if(is_dir($uploads_dir)){
                        	delete_files($uploads_dir."/");
                        	//rmdir($uploads_dir);
                        }
                    $data['allusernames'] 	  = $this->Dailysheet_model->get_all_usernames($userId);

		
	             	$data["error"] 	= "false";
					$data["status"] = "true";
					$data["msg"] 	= "Daily sheet added successfully.";
					echo json_encode($data);return;

	            }else{
	              
	               if(is_dir($dir)){
                        delete_files($dir."/");
                        rmdir($dir);
                    }

                    if(is_dir($uploads_dir)){
                        	delete_files($uploads_dir."/");
                        	// rmdir($uploads_dir);
                        }
	                $data["error"] 	= "false";
					$data["status"] = "true";
					$data["msg"] 	= "Please try later.";
					echo json_encode($data);return;
	            }
				
	        
 			}
                    
	 		
      	}else{
       		
      		
      		$data["error"] 	= "true";
			$data["status"] = "false";
			$data["msg"] 	= "Your Data not submited becuse of invalid input.";
			echo json_encode($data);return;
      	}
       		
        
		echo json_encode($data); return;
  	}
    
    /*
	* To upload file at create daily sheet
	* @parm 	- none
	* @return 	- none
	*/
    public function upload_file() {
    	
    	$data["error"]       	= "true";
		$data["status"]         = "false";
		$data["msg"] 	        = "Invalid request.";
        $uploads_dir            = "";
    	$fileName 		        = array(); 
    	$lastFiles 		        = trim( $this->input->post("last_files"), "," ); 
    	//print_r($lastFiles);
    	$current_index 	        = trim( $this->input->post("current_index"), "attachment[][]" );
    	$uploaded_file = $this->input->post("uploaded_file");
    	$username               = $this->data['username'];
	 	$url        			= $this->Dailysheet_model->siteURL();
	 	$size = 0;
	 	if( !empty($_FILES)){

       		include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3bucketfoldersize.php');
			$objS3buket         = new S3bucketfoldersize();

  			$uploads_dir 	    = 'uploads/'.$url.'/daily_sheet/create&review/tempName/'.$username.'/';
			$index 			    = 0;
			$fileName 		    = array();                 
			$fileName1 		    = array();                 
         
           	if (!is_dir('uploads/'.$url.'/daily_sheet/create&review/tempName/'.$username)) {
         		mkdir('uploads/'.$url.'/daily_sheet/create&review/tempName/'.$username, 0777, true);
          	}
     	
     		$count = 0;
            $findIndex     = 0;

        	for($i=0; $i <= $count; $i++){
			
				$fileName 	   = array();
				$index 		   = 0;
                
				foreach($_FILES['attachment']['name'][$current_index] as $filename) {
			    	
				if($filename == $uploaded_file){
				
                 $currentIndex = $findIndex;		
				 $findIndex ++;
     			 $formateAllowed = array("jpeg", "jpg", "png", "docx", "doc", "xlsx", "xls", "zip", "rar", "pdf", "txt", "csv");
				    $extension 	= pathinfo($filename, PATHINFO_EXTENSION);
					if(!in_array($extension, $formateAllowed)){
					// 	return true;
					// }else{
						$data["error"] 	= "true";
					    $data["status"] = "false";
					    $data["msg"]    = $filename." File format not supported.";
					    $data["files"] 	= '';
					    // echo $data["msg"];
					    echo json_encode($data); 
						return false;
					}

				   	 $file_name  = $filename;
				   	if ($pos = strrpos($file_name, '.')) {
						   $name = substr($file_name, 0, $pos);
						   $ext  = substr($file_name, $pos);
						} else {
						   $name = $file_name;
						}

					if(file_exists($uploads_dir.$name.".zip")){
						

					$file_name = $name.'_'.date('s').$ext;
                        
                       
				   }

				   // echo $uploads_dir.$file_name;die;
					// move_uploaded_file($_FILES['attachment']['tmp_name'][$current_index][$index], $uploads_dir. basename( trim($file_name) ));
					 $pos_n = strrpos($file_name, '.'); 
				     $name = substr($file_name, 0, $pos_n);
					 $zip = new ZipArchive(); // Load zip library 
					 $zip_name = $name.".zip"; // Zip name

	                 $zip_filename = getcwd() . '/uploads/'.$url.'/daily_sheet/create&review/tempName/'.$username.'/'.$zip_name;
					 if($zip->open($zip_filename, ZIPARCHIVE::CREATE)!==TRUE)
					 { 
					  echo "Sorry ZIP creation failed at this time";
					 }
                     

	                 $zip->addFromString($file_name, file_get_contents($_FILES['attachment']['tmp_name'][$current_index][$currentIndex]));
					 
                     $zip->close();
                     
                 	// To check s3 bucket existing folder size in gb
                 	clearstatcache();
                 	
					$size = filesize($zip_filename);
					$s3BucketSize       = $objS3buket->FolderSize();
					$currentFileSize    = $objS3buket->formatSizeUnits( $size, "BYTES" );
					$planStorageLimit   = $objS3buket->getDomainStorageLimit();
					$finalExisting      = ( $s3BucketSize + $currentFileSize );
					// $finalExisting = $objS3buket->formatSizeUnits( $finalExisting, "GB" );
					$planStorageLimit = $objS3buket->convertMemorySize( $planStorageLimit."Gb", "b" );

					if( $finalExisting > $planStorageLimit ){

					    // delete local file
					    $deleteFile = $zip_filename;
					    if( file_exists($deleteFile) ){
					        unlink($deleteFile);
					    }

					    $data["error"] 	= "true";
					    $data["status"] = "false";
					    $data["size"]   = $size;
					    $data["msg"]    = "Your space limit is over. Please contact admin if you wish to add more documents.";
					    echo json_encode($data); 
					    return true;
					}
					   
					
						if( !empty($filename) ){
							array_push( $fileName, trim($file_name) );
						}else{
							$fileName = "";
					}
	                 
					$index++;
								
				} 
			}
				
  			}

			// store files name               
			if( !empty($fileName) ){
				$finalFiles  	= implode(",", $fileName);

				$finalFiles 	= trim( $finalFiles , "," );
 			}else{
				$finalFiles 	= "";
			}

			// concat last files : if already
			// $finalFiles = trim( $lastFiles.",".$finalFiles , "," );
	
			if ( !empty($finalFiles) ) {
         	
             	$data["error"] 	= "false";
				$data["status"] = "true";
				$data["msg"] 	= "files uploaded successfully.";
				$data["files"] 	= $finalFiles;
				echo json_encode($data);return;

            } else {
                
                $data["error"] 	= "false";
				$data["status"] = "true";
				$data["msg"] 	= "Please try later.";
				echo json_encode($data);return;
            }

		}

		echo json_encode($data);return;	
	
	}
    /*
	* To upload files at edit daily sheet
	* @parm 	- none
	* @return 	- none
	*/
	public function edit_upload_file() {
    	
    	$data["error"] 	= "true";
		$data["status"] = "false";
		$data["msg"] 	= "Invalid request.";
        $username  		= $this->data['username'];
    	$fileName 		= array(); 
    	$url        			= $this->Dailysheet_model->siteURL();
    	$current_index 	= trim( $this->input->post("current_index"), "update_attachment[][]" );
    	$edit_uploaded_file = $this->input->post("edit_uploaded_file");

	 	$fileName1 		= array();      
       
        if( !empty($_FILES) ){

        	include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3bucketfoldersize.php');
			$objS3buket         = new S3bucketfoldersize();
        	
            $CurrentId 		= $this->input->post('daily_sheet_id');
  			$uploads_dir 	= 'uploads/'.$url.'/daily_sheet/create&review/tempName/'.$username.'/';
			$index 			= 0;
			$fileName 		= array();                 
           
           	if (!is_dir('uploads/'.$url.'/daily_sheet/create&review/tempName/'.$username)) {
         		mkdir('uploads/'.$url.'/daily_sheet/create&review/tempName/'.$username, 0777, true);
          	}

          	$x 	    = 'uploads/'.$url.'/daily_sheet/create&review/tempName/'.$username.'/';
         
          	$count = 0;
            $findIndex     = 0;

            for($i=0; $i<=$count; $i++){
				
				$fileName 	= array();
				$index 		= 0;

				foreach($_FILES['update_attachment']['name'][$current_index] as $filename) {

					if($edit_uploaded_file == $filename){

                      $currentIndex = $findIndex;		
				      $findIndex ++;
				      $formateAllowed = array("jpeg", "jpg", "png", "docx", "doc", "xlsx", "xls", "zip", "rar", "pdf", "txt", "csv");
				    $extension 	= pathinfo($filename, PATHINFO_EXTENSION);
					if(!in_array($extension, $formateAllowed)){
					// 	return true;
					// }else{
						$data["error"] 	= "true";
					    $data["status"] = "false";
					    $data["msg"]    = $filename." File format not supported.";
					    // echo $data["msg"];
					    echo json_encode($data); 
						return false;
					}
					

				   	$file_name = $filename;

				   	if ($pos = strrpos($file_name, '.')) {
						   $name = substr($file_name, 0, $pos);
						   $ext  = substr($file_name, $pos);
						} else {
						   $name = $file_name;
						}
				   
                    if(file_exists($uploads_dir.$name.".zip")){
						
                     $file_name  = $name .'_'. date('s') . $ext; 
				}
				
				   	// move_uploaded_file($_FILES['update_attachment']['tmp_name'][$current_index][$index], $uploads_dir. basename( trim($file_name) ));

				     $pos_n = strrpos($file_name, '.'); 
				     $name = substr($file_name, 0, $pos_n);
					 $zip = new ZipArchive(); // Load zip library 
					 $zip_name = $name.".zip"; // Zip name

	                 $zip_filename = getcwd() . '/uploads/'.$url.'/daily_sheet/create&review/tempName/'.$username.'/'.$zip_name;
					 if($zip->open($zip_filename, ZIPARCHIVE::CREATE)!==TRUE)
					 { 
					  echo "Sorry ZIP creation failed at this time";
					 }


					 $innerFileName = $_FILES['update_attachment']['name'][$current_index][$index];

	                 $zip->addFromString($file_name, file_get_contents($_FILES['update_attachment']['tmp_name'][$current_index][$currentIndex]));
					
                     $zip->close();

                 	// To check s3 bucket existing folder size in gb
                 	clearstatcache();
					$size = filesize($zip_filename);
					$s3BucketSize       = $objS3buket->FolderSize();
					$currentFileSize    = $objS3buket->formatSizeUnits( $size, "BYTES" );
					$planStorageLimit   = $objS3buket->getDomainStorageLimit();
					$finalExisting      = ( $s3BucketSize + $currentFileSize );
					// $finalExisting = $objS3buket->formatSizeUnits( $finalExisting, "GB" );
					$planStorageLimit = $objS3buket->convertMemorySize( $planStorageLimit."Gb", "b" );

					if( $finalExisting > $planStorageLimit ){

					    // delete local file
					    $deleteFile = $zip_filename;
					    if( file_exists($deleteFile) ){
					        unlink($deleteFile);
					    }

					    $data["error"] 	= "false";
					    $data["status"] = "true";
					    $data["files"]  = "";
					    $data["msg"]    = "Your space limit is over. Please contact admin if you wish to add more documents.";
					    echo json_encode($data); 
					    return true;
					}
					   
					// To check s3 bucket existing folder size in gb
			
					if( !empty($filename) ){
						array_push( $fileName, trim($file_name) );
					}else{
						$fileName = "";
					}
					
					$index++;
								
				}

			}
             
      		}

      		// store files name               
			if( !empty($fileName) ){
				$finalFiles  	= implode(",", $fileName);
				$finalFiles 	= trim( $finalFiles , "," );
 			}else{
				$finalFiles 	= "";
			}


			if ( !empty($finalFiles) ) {
         	
             	$data["error"] 	= "false";
				$data["status"] = "true";
				$data["msg"] 	= "files uploaded successfully.";
				$data["files"] 	= $finalFiles;
				echo json_encode($data);return;

            } else {
                
                $data["error"] 	= "false";
				$data["status"] = "true";
				$data["msg"] 	= "Please try later.";
				$data["files"]  = "";
				echo json_encode($data);return;
            }
          	
		}

		echo json_encode($data);return;	

	}


	/*
	* To edit daily sheet
	* @parm 	- none
	* @return 	- (json) $data
	*/
	public function editDailySheet(){
 		
		$data 			       = array();
		$data["error"] 	       = "true";
		$data["status"]        = "false";
		$data["msg"] 	       = "Invalid request!";
        $username              = $this->data['username'];
        $attachment      	   = $this->input->post('update_Attachment');
        $final_attachment      = $this->input->post('update_ifAttachmentExiting');
        $daily_sheet_id        = $this->input->post('daily_sheet_id');
        $arr_deleted_files     = $this->input->post("delete_ifAttachmentExiting");
	    $url        			= $this->Dailysheet_model->siteURL();
		$attachment            = array_values($attachment);
		
		$final_attachment      = array_values($final_attachment);
		
		$dir                   = "";
        $uploads_dir           = "";
		 include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/wasabi_connect.php');  
                // Create S3Client object ....
			if(!empty($attachment)){
			   
				for($j=0; $j <count($attachment); $j++){
				
					if(!empty($attachment[$j])){
					    
						$attachment1    = explode(',', $attachment[$j]);
						
					    $uploads_dir 	= 'uploads/'.$url.'/daily_sheet/create&review/'.$daily_sheet_id;
                      
			            if (!is_dir('uploads/'.$url.'/daily_sheet/create&review/'.$daily_sheet_id)) {
			         		mkdir('uploads/'.$url.'/daily_sheet/create&review/'.$daily_sheet_id, 0777, true);
			          	}

					   $dir = "uploads/".$url."/daily_sheet/create&review/tempName/".$username;
						if (is_dir($dir)) {
						
							if ($dh = opendir($dir) ) {
							  
					            for($i=0; $i<count($attachment1); $i++){
								   $pos = strrpos($attachment1[$i], '.');
						           $name = substr($attachment1[$i], 0, $pos);
						           $ext  = substr($attachment1[$i], $pos);
									rename($dir."/".$name.".zip",$uploads_dir."/".$name.".zip");
									
									$source = 'uploads/'.$url.'/daily_sheet/create&review/'.$daily_sheet_id.'/'.$name.".zip";

									// Where the files will be transferred to
									$dest = 'Production/'.$url.'/daily_sheet/create&review/'.$daily_sheet_id.'/'.$name.".zip";

									// // Create a transfer object
									// $manager = new \Aws\S3\Transfer($s3, $source, $dest);

									// //Perform the transfer synchronously
									// $manager->transfer();


									// GET OBJECT

									$result = $client->putObject(array(
								    	'Bucket' => 'fincrm',
								        'Key'    => $dest,
								    	'SourceFile' => $source,
									));
								}

							}
			    		}
		     		}
        		}
    		}
		// append string already existing file
		
		
       	$daily_sheet_id 		     = $this->input->post('daily_sheet_id');		
		$daily_sheet_task_date       = str_replace('/', '-', $this->input->post('update_date_1'));
	    $daily_sheet_task_date       = date('Y-m-d', strtotime($daily_sheet_task_date));
		$daily_sheet_in_time 	     = $this->input->post('update_inTime');
		$daily_sheet_out_time 	     = $this->input->post('update_outTime');
		$daily_sheet_working_from    = $this->input->post('update_working_from');
	    $daily_sheet_activity        = $this->input->post('update_activity_msg');
		$daily_sheet_start_time      = $this->input->post('activity_update_inTime');
		$daily_sheet_end_time        = $this->input->post('activity_update_outTime');
	    $daily_sheet_status          = $this->input->post('status'); 
       
       	// build array to update dailsheet details
        $updateMain = array(
	        'daily_sheet_date' 	     => $daily_sheet_task_date,
	        'in_time' 			     => $daily_sheet_in_time,
	        'out_time' 			     => $daily_sheet_out_time,
	        'working_from' 		     => $daily_sheet_working_from,
	        'activity_status' 	     => $daily_sheet_status,
	        'modify_at' 		     => date("Y-m-d h:i:s"),
	        'status' 			     => '0', 
	    );

	    // update data dailysheet main table
 		if( $this->Dailysheet_model->updateDailySheet( $daily_sheet_id, $updateMain ) ){
        	
        	$this->Dailysheet_model->deleteActivity($daily_sheet_id);

        	for($i = 0; $i < count($daily_sheet_activity); $i++) {
          		
        		$latestFiles = isset($final_attachment[$i]) ? $final_attachment[$i] : "";

		      	$insertActivity = array(
					'daily_sheet_id' 		=> $daily_sheet_id,
					'activity' 				=> $daily_sheet_activity[$i],
					'start_time' 			=> $daily_sheet_start_time[$i],
					'end_time' 				=> $daily_sheet_end_time[$i],
					'attachment' 			=> $latestFiles,
					'created_at' 			=> date('Y-m-d h:i:s'),
					'status' 				=> '0',
				);

    		 	$isActivityUpdate = $this->Dailysheet_model->insert_activity($insertActivity);
        
        	}
	        
 		}

                
	 	if( !empty($isActivityUpdate) ) {

         	if(!empty($arr_deleted_files) ){

                for($k=0 ; $k<count($arr_deleted_files); $k++){
                	
                	if(!empty($arr_deleted_files[$k]) ){
                	
	                	$delete_files = explode(',', $arr_deleted_files[$k]);
	                        
	                    for($p=0 ; $p<count($delete_files); $p++){

	                    	$tFile = trim($delete_files[$p]);
                            $pos = strrpos($tFile, '.');
						    $name = substr($tFile, 0, $pos);
						    $ext  = substr($tFile, $pos);
						    include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/wasabi_connect.php'); 
	                        $filePath = $_SERVER['DOCUMENT_ROOT']."/dailysheet/uploads/".$url."/daily_sheet/create&review/".trim($daily_sheet_id)."/".$name.".zip";
	                       
	                        $s3_filePath = 'Production/'.$url.'/daily_sheet/create&review/'.trim($daily_sheet_id).'/'.$name.".zip";

		                 // 	if(file_exists($filePath) ){
		                 		
			                //  	unlink($filePath);
			                 	
		                	// }
		                	
			                 	$result = $client->deleteObject([
							        'Bucket' => 'fincrm',
							        'Key'    => $s3_filePath,
							    ]);

	                  	}
                	}
              	}
          	}
        	
     		if(is_dir($dir)){
              	delete_files($dir."/");
            	rmdir($dir);
            } 
            
            if(is_dir($uploads_dir)){
                delete_files($uploads_dir."/");
                        	//rmdir($uploads_dir);
            }

          	$data["error"] 	= "false";
			$data["status"] = "true";
			$data["msg"] 	= "Daily sheet updated successfully.";
			$data["files"] 	= $attachment;
		
			echo json_encode($data); return;

        } else {

	        $data["error"] 	= "true";
			$data["status"] = "false";
			$data["msg"] 	= "Please try later.";
		    if(is_dir($dir)){

                delete_files($dir."/");
                rmdir($dir);
            }

            if(is_dir($uploads_dir)){
               delete_files($uploads_dir."/");
            //   rmdir($uploads_dir);
            }

			echo json_encode($data); return;
		}
		
		echo json_encode($data); return;

  	}
    
    
    /*
	* To aceept or reject dailysheet in review
	* @parm 	- none
	* @return 	- none
	*/
    public function addFeedbackStatus(){
    	$data               = array();
		$data["error"] 	    = "true";
		$data["status"]     = "false";
		$data["msg"] 	    = "Invalid request!";
	    $daily_sheet_id     = $this->input->post('daily_sheet_id');
	    $daily_sheet_status = $this->input->post('status');
        
		$data1 			    = array('activity_status' => $daily_sheet_status,'created_at'=> date("Y-m-d h:i:s"));
  	        
	    	if(!empty($data1)){

              	$this->Dailysheet_model->update_daily_sheet_status($data1,$daily_sheet_id);
             	        
     	        $data["error"] 	= "false";
				$data["status"] = "true";
				$data["msg"] 	= "Status updated successfully.";
				$data['data'] 	= array("feedback" => '' );

				echo json_encode($data);return;

            }else {
                
        		$data["error"] 	= "true";
				$data["status"] = "false";
				$data["msg"] 	= "please try later.";

				echo json_encode($data);return;
            }

           echo json_encode($data);return; 
    }
    
    /*
	* To add feedback in  daily sheet
	* @parm 	- none
	* @return 	- (json) $data
	*/
	public function addFeedback(){

		$data               = array();
		$data["error"] 	    = "true";
		$data["status"]     = "false";
		$data["msg"] 	    = "Invalid request!";
        $username  = $this->data['username'];
        $daily_sheet_id     = $this->input->post('daily_sheet_id');
        $feedback 		    = $this->input->post('feedback');
	    $daily_sheet_status = $this->input->post('status');
	    $feedback_given_by = $this->input->post('feedback_given_by');
	    $dir                = "";
        $url        			= $this->Dailysheet_model->siteURL();
 		if($daily_sheet_status == 5 || $daily_sheet_status == 6){
      	    
      		$insertFile 	= "";
      		$attachment    	= $this->input->post('current_feedback');
			$attachment1   	= implode(',', $attachment);
			$attachment   	= explode(',', $attachment1);

            include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/wasabi_connect.php');  
                // Create S3Client object ....

			if(!empty($attachment)){
	        
			 	$uploads_dir 	= 'uploads/'.$url.'/daily_sheet/create&review/'.$daily_sheet_id;

	            if (!is_dir('uploads/'.$url.'/daily_sheet/create&review/'.$daily_sheet_id)) {
	         		mkdir('uploads/'.$url.'/daily_sheet/create&review/'.$daily_sheet_id, 0777, true);
	          	}

			 	$dir = "uploads/".$url."/daily_sheet/create&review/tempName/".$username;//"path/to/targetFiles";

				if (is_dir($dir)) {
					
					if ($dh = opendir($dir) ) {
					   
			            for($i=0; $i<count($attachment); $i++){
			            	if(!empty($attachment[$i])){
			                $pos = strrpos($attachment[$i], '.');
						    $name = substr($attachment[$i], 0, $pos);
						    $ext  = substr($attachment[$i], $pos);
							rename($dir."/".$name.".zip",$uploads_dir."/".$name.".zip");
							$source = 'uploads/'.$url.'/daily_sheet/create&review/'.$daily_sheet_id.'/'.$name.".zip";

							// Where the files will be transferred to
							$dest = 'Production/'.$url.'/daily_sheet/create&review/'.$daily_sheet_id.'/'.$name.".zip";

							// Create a transfer object
							// $manager = new \Aws\S3\Transfer($s3, $source, $dest);

							// //Perform the transfer synchronously
							// $manager->transfer();

								$result = $client->putObject(array(
								    	'Bucket' => 'fincrm',
								        'Key'    => $dest,
								    	'SourceFile' => $source,
								));
			            	}
							
						}

					}
		    	}
	     	}
      
   	        $feedback_details = array(
	        'daily_sheet_id' 		=> $daily_sheet_id,
	        'feedback' 	            => $feedback,
	        'feedback_by' 	        => $daily_sheet_status,
	        'feedback_attachment'  	=> $attachment1,
	        'created_at' 		    => date("Y-m-d h:i:s"),
	        'feedback_given_by'     => $feedback_given_by,
	    	);
          
        	if($this->form_validation->run('daily_sheet_feedback') == true){    
             
 				if($this->Dailysheet_model->insert_feedback($feedback_details)){
 					
                    $lastId = $this->db->insert_id(); 
 					$dailySheetFeedbackDetails 	= $this->Dailysheet_model->getFeedbackDetails($lastId);

 					   if(is_dir($dir)){
                        	delete_files($dir."/");
                        	rmdir($dir);
                        }

                        if(is_dir($uploads_dir)){
                        	delete_files($uploads_dir."/");
                        	// rmdir($uploads_dir);
                        }

                        $data["error"] 	= "false";
						$data["status"] = "true";
						$data["msg"] 	= "Feedback submitted successfully.";
						$data['data'] 	= array("feedback" => $dailySheetFeedbackDetails,"url"=>$url );

                } else {

                	    if(is_dir($dir)){
                        	delete_files($dir."/");
                        	rmdir($dir);
                        }

                        if(is_dir($uploads_dir)){
                        	delete_files($uploads_dir."/");
                        	// rmdir($uploads_dir);
                        }

                	    $data["error"] 	= "true";
						$data["status"] = "false";
						$data["msg"] 	= "please try later.";
						$data['data'] 	= array("feedback" => "" );

						echo json_encode($data);return;
                   
                }
		
      		}else{

      			if(is_dir($dir)){
                        delete_files($dir."/");
                        rmdir($dir);
                    }
  			    $data["error"] 	= "true";
				$data["status"] = "false";
				$data["msg"] 	= "please try later.";
				$data['data'] 	= array("feedback" => "" );
				
				echo json_encode($data);return;
      		}

		}
        
       echo json_encode($data);return;
  	}


     
	   
    /*
	* To upload files at feedback section in edit daily sheet
	* @parm 	- none
	* @return 	- (json) $data
	*/
	public function feedback_upload_file() {
    	
    	$data["error"] 	    = "true";
		$data["status"]     = "false";
		$data["msg"] 	    = "Invalid request.";  
        $username           = $this->data['username'];
        $url        			= $this->Dailysheet_model->siteURL();
        $feedback_uploaded_file = $this->input->post("feedback_uploaded_file");
       if( !empty($_FILES) ){
	        
	        include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3bucketfoldersize.php');
			$objS3buket         = new S3bucketfoldersize();

			$uploads_dir 	= 'uploads/'.$url.'/daily_sheet/create&review/tempName/'.$username.'/';
			$index 			= 0;
			$fileName 		= array();                 
			$fileName1 		= array();                 
	       
	   		if (!is_dir('uploads/'.$url.'/daily_sheet/create&review/tempName/'.$username)) {

	     		mkdir('uploads/'.$url.'/daily_sheet/create&review/tempName/'.$username, 0777, true);
	  		}
	  		$count = 0;
	  		$findIndex = 0;

            for($i=0; $i <= $count; $i++ ){
			foreach($_FILES['feedback_attachment']['name'] as $filename) {

			if($feedback_uploaded_file == $filename ){
				$currentIndex = $findIndex;		
				$findIndex ++;
				$formateAllowed = array("jpeg", "jpg", "png", "docx", "doc", "xlsx", "xls", "zip", "rar", "pdf", "txt", "csv");
				    $extension 	= pathinfo($filename, PATHINFO_EXTENSION);
					if(!in_array($extension, $formateAllowed)){
					// 	return true;
					// }else{
						$data["error"] 	= "true";
					    $data["status"] = "false";
					    $data["msg"]    = $filename." File format not supported.";
					    $data["files"]    = "";
					    // echo $data["msg"];
					    echo json_encode($data); 
						return false;
					}

			   
			    $file_name = $filename;

				// move_uploaded_file($_FILES['feedback_attachment']['tmp_name'][$index], $uploads_dir. basename($file_name));

				     $pos_n = strrpos($file_name, '.'); 
				     $name = substr($file_name, 0, $pos_n);
					 $zip = new ZipArchive(); // Load zip library 
					 $zip_name = $name.".zip"; // Zip name

	                 $zip_filename = getcwd() . '/uploads/'.$url.'/daily_sheet/create&review/tempName/'.$username.'/'.$zip_name;
					 if($zip->open($zip_filename, ZIPARCHIVE::CREATE)!==TRUE)
					 { 
					  echo "Sorry ZIP creation failed at this time";
					 }

					 $innerFileName = $_FILES['feedback_attachment']['name'][$index];

	                 $zip->addFromString($file_name, file_get_contents($_FILES['feedback_attachment']['tmp_name'][$currentIndex]));
					
                     $zip->close();
				
					// To check s3 bucket existing folder size in gb
                 	clearstatcache();
					$size = filesize($zip_filename);
					$s3BucketSize       = $objS3buket->FolderSize();
					$currentFileSize    = $objS3buket->formatSizeUnits( $size, "BYTES" );
					$planStorageLimit   = $objS3buket->getDomainStorageLimit();
					$finalExisting      = ( $s3BucketSize + $currentFileSize );
					// $finalExisting = $objS3buket->formatSizeUnits( $finalExisting, "GB" );
					$planStorageLimit = $objS3buket->convertMemorySize( $planStorageLimit."Gb", "b" );

					if( $finalExisting > $planStorageLimit ){

					    // delete local file
					    $deleteFile = $zip_filename;
					    if( file_exists($deleteFile) ){
					        unlink($deleteFile);
					    }

					    $data["error"] 	= "true";
					    $data["status"] = "false";
					    $data["msg"]    = "Your space limit is over. Please contact admin if you wish to add more documents.";
					    echo json_encode($data); 
					    return true;
					}
					   
					// To check s3 bucket existing folder size in gb

				if( !empty($filename) ){
					array_push( $fileName, $file_name );
				}
	             
				$index++;
							
			} 
	       }
	   }
			if( !empty($fileName) ){
				$tempName  	= implode(",", $fileName);
				
			}else{
				$tempName  = "";
			}

			if ( !empty($tempName) ) {
         	
             	$data["error"] 	= "false";
				$data["status"] = "true";
				$data["msg"] 	= "files uploaded successfully.";
				$data["files"] 	= $tempName;

				echo json_encode($data);return;

            } else {
                
                $data["error"] 	= "false";
				$data["status"] = "true";
				$data["msg"] 	= "Please try later.";
				$data["files"]  = "";

				echo json_encode($data);return;
            }
          	
		}

		echo json_encode($data);return;	
	}	
    

    /*
	* To delete file upload folder to delete extra files
	* @parm 	- none
	* @return 	- none
	*/
	public function delete_folder(){

		$data["error"] 	= "true";
		$data["status"] = "false";
		$data["msg"] 	= "Invalid request.";
		$username       = $this->data['username'];  
		$url        			= $this->Dailysheet_model->siteURL();
		$dir            = "uploads/".$url."/daily_sheet/create&review/tempName/".$username;
		 
		
	    if(is_dir($dir)){

	    	delete_files($dir."/");
	    	rmdir($dir);

            $data["error"] 	= "false";
			$data["status"] = "true";
			$data["msg"] 	= "Delete folder successfully.";
				
			echo json_encode($data);return;
             
        } else {
                
            $data["error"] 	= "true";
			$data["status"] = "false";
			$data["msg"] 	= "Please try later.";
			
			echo json_encode($data);return;
        }
    }
	
 
    /*
	* To check duplicate date in database
	* @parm 	- none
	* @return 	- none
	*/
	public function check_date($format = "d-m-Y"){
		
		$data["error"] 	       = "false";
		$data["status"]        = "true";
	    $data["msg"] 	       = "please try later";
	    $username                    = $this->data['username'];
        $dir                         = "";
        $user['user1']		      = $this->Dailysheet_model->getUserIdByUsername($username);

	    $userId 	              = $user['user1']['id']; 
        $daily_sheet_task_date = $this->input->post("task_date");
        $selected_date = explode("/",$daily_sheet_task_date);
        $date1 = $selected_date[2]."-".$selected_date[1]."-".$selected_date[0];
        $date["date"]          = $this->Dailysheet_model->check_dailysheet_date($date1,$userId);

		if (!empty($date["date"])){
         	
			$data["error"] 	   = "true";
			$data["status"]    = "false";
			$data["msg"] 	   = "Date is already used";
				
			echo json_encode($data);return;

        } else {
                
            $data["error"] 	   = "false";
			$data["status"]    = "true";
			$data["msg"] 	   = "Date not selected";
			
			echo json_encode($data);return;
        }
	}
    
    /*
	* To load view of ceated dailysheet
	* @parm 	- none
	* @return 	- none
	*/
	public function all_table_value(){

		$data["error"] 	      = "false";
		$data["status"]       = "true";
	    $data["msg"] 	      = "please try later";
         
        $allusernames         = $this->Dailysheet_model->get_all_usernames();

		if (!empty($date["date"])){
         	
			$data["error"] 	  = "true";
			$data["status"]   = "false";
			$data["msg"] 	  = "Date is already used";
			$data["data"] 	  = array('allusernames' => $allusernames, );;
			
			echo json_encode($data);return;

        } else {
                
            $data["error"] 	  = "false";
			$data["status"]   = "true";
			$data["msg"] 	  = "Date not selected";
			
			echo json_encode($data);return;
        }
	}


    
    /*
	* To load view of dailysheet attendance
	* @parm 	- none
	* @return 	- none
	*/
	public function dailysheet_attendance() {	

		$data 				    = array();	 
		$hData['title'] 	    = "Daily Sheet";
		$sData 			        = array();
		$fData 				    = array();
     	$username  			    = $this->data['username'];

       	$user['user1']		    = $this->Dailysheet_model->getUserIdByUsername($username);

	    $userId 	            = $user['user1']['id']; 
	    $reviewerId             = $user['user1']['user_parent_id'];
        $data["AllUserName"]	  = $this->Dailysheet_model->get_all_usernames($userId);
	    $UserNameByid			= $this->Dailysheet_model->UserNameByid($userId);

        $isUserReviewer	        = $this->Dailysheet_model->isUserReviewer($userId);
        // $url        			= $this->Dailysheet_model->siteURL();
        $url        			= $this->db->database;
		$data['activate_date']	= $this->Dailysheet_model->getDateData($url);
		
        $data["branches"]	    = $this->Dailysheet_model->select_braches();
        $isUserAdmin	    = $this->Dailysheet_model->isUserAdmin($userId);
     
           if(!empty($isUserAdmin)){
	       	$Data["isuser"] = 1;
	       	$sData["isuser"] = 1;
	       }else if(!empty($isUserReviewer)){
	       	$sData["isuser"]    = 1;
	       	$Data["isuser"]    = 2;
	       }else{
	       	$sData["isuser"]    = 0;
	       	$Data["isuser"]    = 0;
	       }
        
	   	$reviewerId             = $this->Dailysheet_model->getReviewerIdByReviewername($username);
		
		$this->load->view( "includes/header", $hData );
		$this->load->view( "includes/sidebar", $sData );
		$this->load->view( "dailysheet_attendance", $data);
		$this->load->view( "includes/footer", $fData );
	}


    /*
	* To get all attendance data for perticular month
	* @parm 	- (string) isPDF
	* @return 	- none
	*/

    public function SummaryOfAttendance( $isPDF = false) {	

		$username               = $this->data['username'];
        $months                 = $this->input->post("month")+1;  
		$years                  = $this->input->post("year");
		$filterByName           = $this->input->post("AllUserNames");
		$filterByBranch         = $this->input->post("AllBranches");
		$SearchByName           = $this->input->post("SearchByName");
		$totalHours             = 0;
		$user['user1']	        = $this->Dailysheet_model->getUserIdByUsername($username);

		$user['search']	        = $this->Dailysheet_model->getUserIdByUsername($SearchByName);
		        
		if(!empty($SearchByName && $user['search']) ){
			$userId             = $user['search']['id'];
		}else if(!empty($filterByName)){

			$userId             = $filterByName;
		}else{
			$userId 	        = $user['user1']['id'];
		}

	    $UserNameByid	        = $this->Dailysheet_model->UserNameByid($userId);
	    $designation	        = $this->Dailysheet_model->GetDesignation($userId);
	    
	    $userOfficeLocation	    = $this->Dailysheet_model->getUserOfficeLocationIdByUsername($userId);
		$officeLocation         = $userOfficeLocation["office_location_id"];
		// print_r($userOfficeLocation);
	    
	    $employeeAllDaysDetails = $this->Dailysheet_model->employeeAllDaysDetails($userId,$months,$years);
	    $weeklyOffDays          = $this->Dailysheet_model->getweeklyOffDays($officeLocation);

	    $MonthlyHolidays        = $this->Dailysheet_model->getMonthlyHolidays($officeLocation,$months,$years);
	    $MonthlyHolidaysCount   = !empty($MonthlyHolidays) ? count($MonthlyHolidays) : 0 ;
	    
        $date                   = array_column($employeeAllDaysDetails, 'daily_sheet_date');
		                                   
		$monthName              = date("F", mktime(0, 0, 0, $months));
		$fromdt                 = date('Y-m-01 ',strtotime("First Day Of  $monthName $years")) ;
		$todt                   = date('Y-m-d ',strtotime("Last Day of $monthName $years"));
    
		$num_sundays               = 0;    
		$upto_current_date_sundays = 0;    
		$upto_current_date_holiday = 0;    
        $totalHours                = 0;
        $totalminutes              = 0;
        $holiday_date              = array();
	    
	    if($weeklyOffDays !=""){

           for ($i = 0; $i < ((strtotime($todt) - strtotime($fromdt)) / 86400); $i++)
		    {  
				for($j = 0; $j < count($weeklyOffDays); $j++){

					 if(date('l',strtotime($fromdt) + ($i * 86400)) == $weeklyOffDays[$j]['w_off_days'])
			        {
			            $num_sundays++;
			        }

			   
				}
		      
		    }
        
           for ($i = 0; $i < ((strtotime(date('Y-m-d')) - strtotime($fromdt)) / 86400); $i++)
		    {  
				for($j = 0; $j < count($weeklyOffDays); $j++){
					 if(date('l',strtotime($fromdt) + ($i * 86400)) == $weeklyOffDays[$j]['w_off_days'])
			        {
			            $upto_current_date_sundays++;

			        }

			   
			}
                
                if($MonthlyHolidays != ""){

                	for($j = 0; $j < count($MonthlyHolidays); $j++){

					 if(date('l',strtotime(date('Y-m-d')) + ($i * 86400)) == $MonthlyHolidays[$j]['holiday_date'])
					        {
					            $upto_current_date_holiday++;
					        }

				    }
                
                }
				
		      
		    }
        
	    }
		

        for ($currentDate = strtotime($fromdt); $currentDate <= strtotime($todt);  
                                $currentDate += (86400)) { 
                                     
        $Store             = date('Y-m-d', $currentDate); 
        $dates[]           =  $Store;
        }

        for ($currentDate1 = strtotime($fromdt); $currentDate1 <= strtotime(date('Y-m-d'));  
                                $currentDate1 += (86400)) { 
                                     
        $Store1             = date('Y-m-d', $currentDate1); 
        $uptoCurrentDate[]           =  $Store1;
        }
        
        // print_r(count($uptoCurrentDate));
        $lives             = count($uptoCurrentDate) - (count($employeeAllDaysDetails) + $upto_current_date_sundays + $upto_current_date_holiday );
        $WorkingDays       = count($dates) - ($num_sundays + $MonthlyHolidaysCount) ;
        
      if(!empty($MonthlyHolidays)){
        $holiday_date      = array_column($MonthlyHolidays, 'holiday_date');
        foreach ($holiday_date as $value) {

        $specificDate      = strtotime($value);
	    $offday            = date('l', $specificDate);
	    if($weeklyOffDays!=""){

        $weekly_of_days    = array_column($weeklyOffDays, 'w_off_days');
	    }else{
	    	$weekly_of_days =array();
	    }
        
        $monthlyHolidayIndex = array_search($offday, $weekly_of_days);
            
            if($monthlyHolidayIndex === false){
             
            }else{
             $lives++;
             $WorkingDays++;
            }

        }
          $finallives       = $lives; 
          
          $finalWorkingDays = $WorkingDays; 
          
    }
       
    if(!empty($dates)){
        
        foreach ($dates as $value) {

        	$outTimeArr     =  0 ;
            $inTimeArr      =  0 ;
        	$specificDate   = strtotime($value);
                    
			$day            = date('l', $specificDate);
	
	       
	        $holidayindex   = array_search($value, $holiday_date);
         
           	if ($holidayindex === false) {
            	
		        $hours      = "Absent";
		        $occesion   = "Absent";
	        } else{
		        $hours      = "Holiday";
                $occesion   = $MonthlyHolidays[$holidayindex]["holiday_resone"];
	        }
            
            if($weeklyOffDays!=""){

	        $weekly_of_days    = array_column($weeklyOffDays, 'w_off_days');
		    }else{
		    	$weekly_of_days =array();
		    }
            $weeklyOfIndex  = array_search($day, $weekly_of_days);
            
            if($weeklyOfIndex === false){
             
            }else{
             $hours         = "Weekly"." "."Off" ;
             $occesion      = "Weekly"." "."Off";
            }
       
            $index          = array_search($value, $date);

	        if ($index === false) {
		        $dataarray[] = array(
				"intime"	           =>"NA",
				"outtime"              =>"NA",
				"daily_sheet_date"     =>$value,
				"day"                  => $day,
			    "occesion"             =>$occesion,
			    "hours"                =>$hours,
				
			    );
	        } else {

	        $outTimeArr  = explode(':', $employeeAllDaysDetails[$index]["out_time"]);
            $inTimeArr   = explode(':', $employeeAllDaysDetails[$index]["in_time"]);
            $Hours       = 0;
            $Hours       = $outTimeArr[0] - $inTimeArr[0];
            $minutes     = 0;

		        if($outTimeArr[1] >= $inTimeArr[1] ) {
		             $minutes      = $outTimeArr[1] - $inTimeArr[1];
		         }else {
		             $minutes = ($outTimeArr[1] + 60) - $inTimeArr[1];
		             $Hours--;
		         } 
	        $minutes           = substr("00{$minutes}", -2);
		  	$totalHours        = $totalHours + $Hours;
		  	$totalminutes      = $totalminutes + $minutes;
	      	
		      	if($totalminutes >= 60) {
		      		$remainder     = $totalminutes % 60;
	                $quotient      = ($totalminutes - $remainder) / 60;
	                $totalHours    = $totalHours + $quotient;
	                $totalminutes  = $remainder;
		      	}  
		           $totalminutes   = substr("00{$totalminutes}", -2);
			        $dataarray[]   = array(
					"intime"	           =>$inTimeArr[0].":".$inTimeArr[1],
					"outtime"              =>$outTimeArr[0].":".$outTimeArr[1],
					"daily_sheet_date"     =>$value,
					"occesion"             => "".$Hours." Hrs ".$minutes." Min",
					"hours"                => "".$Hours." Hrs ".$minutes." Min",
					"day"                  => $day,
					

			        );
				}

	        }

	    }else{
	   	    $dataarray[] = array(
				"intime"	           =>"NA",
				"outtime"              =>"NA",
				"daily_sheet_date"     =>"NA",
				"day"                  =>"NA",
			    "hours"                =>"NA",
			    "occesion"             =>"NA",
			);
	    }

	     
       $summary = array(
       	"leaves"          => isset($finallives) ? $finallives : $lives,
       	"WorkingDays"     => isset($finalWorkingDays)  ? $finalWorkingDays : $WorkingDays,
		"totalRecords"    => count($employeeAllDaysDetails),
       	"totalHours"      => "".$totalHours." Hrs ," .$totalminutes." Min", 
       	"month"           => $months,
       	"year"            => $years,
       	"position"        => $designation["name"],
       	"username"        => $UserNameByid,
       
       );
 
	    $data["containt"]         = $dataarray;
	    $data["summary"]          = $summary;
	    $data["weekly_of_days"]   = $weekly_of_days;
	    $totalHours               = 0;
	    $totalminutes             = 0;

		if( !$isPDF ){

			echo json_encode($data);return;

		}else{
			//execute TCPDF code
			$obj_pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false); 
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

			$PdfHtml     = $this->load->view("attendance_table_pdf", $data ,TRUE);

			$obj_pdf->AddPage();  

			$obj_pdf->writeHTMLCell(0, 0, '', '', $PdfHtml, 0, 1, 0, true, '', true); 

            $url         = $this->Dailysheet_model->siteURL();
			$dir         = 'uploads/'.$url.'/daily_sheet/attendance/';
			$filename    = 'attendance_'.$UserNameByid. '_'.$months.'_'.$years.'.pdf';

			if( ! is_dir( FCPATH . $dir ) )
			mkdir( FCPATH . $dir, 0777, TRUE );
            
			$obj_pdf->Output(FCPATH . $dir . $filename, 'F');  
            $pos_n = strrpos($filename, '.'); 
		    $name = substr($filename, 0, $pos_n);
			$zip = new ZipArchive(); // Load zip library 
			$zip_name = $name.".zip"; // Zip name

	        $zip_filename = getcwd() . '/uploads/'.$url.'/daily_sheet/attendance/'.$zip_name;
					 
			 if($zip->open($zip_filename, ZIPARCHIVE::CREATE)!==TRUE)
			 { 
			  echo "Sorry ZIP creation failed at this time";
			 }

	         // $zip->addFromString($filename, $dir.$filename);
	         $zip->addFromString($filename, file_get_contents($dir.$filename));
			
	         $zip->close();
	         
             unlink('uploads/'.$url.'/daily_sheet/attendance/'.$filename);

			// To check s3 bucket existing folder size in gb
			include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3bucketfoldersize.php');
			$objS3buket         = new S3bucketfoldersize();  
         	clearstatcache();
			$size = filesize($zip_filename);

			$s3BucketSize       = $objS3buket->FolderSize();
			$currentFileSize    = $objS3buket->formatSizeUnits( $size, "BYTES" );
			$planStorageLimit   = $objS3buket->getDomainStorageLimit();

			$finalExisting = ( $s3BucketSize + $currentFileSize );
			// $finalExisting = $objS3buket->formatSizeUnits( $finalExisting, "GB" );
			$planStorageLimit = $objS3buket->convertMemorySize( $planStorageLimit."Gb", "b" );

			if( $finalExisting > $planStorageLimit ){

			    // delete local file
			    $deleteFile = $zip_filename;
			    if( file_exists($deleteFile) ){
			        unlink($deleteFile);
			    }

			    $data["error"] 	= "true";
			    $data["status"] = "false";
			    $data["msg"]    = "Your space limit is over. Please contact admin if you wish to add more documents.";
			    echo json_encode($data); 
			    return true;
			}
			   
			// To check s3 bucket existing folder size in gb       	

	         include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/wasabi_connect.php');

	         $source = 'uploads/'.$url.'/daily_sheet/attendance/'.$zip_name;
							// Where the files will be transferred to
			 $dest = 'Production/'.$url.'/daily_sheet/attendance/'.$zip_name;
				// Create a transfer object
			 // $manager = new \Aws\S3\Transfer($client, $source, $dest);
				// //Perform the transfer synchronously
			 // $manager->transfer();
			  $result = $client->putObject([
		        'Bucket' => 'fincrm',
		        'Key'    => $dest,
		        'SourceFile' => $source         
		 	]);

             unlink('uploads/'.$url.'/daily_sheet/attendance/'.$zip_name);

			 $source1 = 'Production/'.$url.'/daily_sheet/attendance/'.$zip_name;
							// Where the files will be transferred to
			 $dest123 = 'upload/attendance/';
			 $dest1 = 'upload/attendance/'.$zip_name;

			 if( ! is_dir( FCPATH . $dest123 ) )
			mkdir( FCPATH . $dest123, 0777, TRUE );
				// Create a transfer object
			 // $manager1 = new \Aws\S3\Transfer($s3, $source1, $dest1);

				// //Perform the transfer synchronously
			 // $manager1->transfer();

			

			  $result = $client->getObject(array(
		    	'Bucket' => 'fincrm',
		        'Key'    => $source1,
		    	'SaveAs' => $dest1,
			));

			 $savePath = 'upload/attendance';
        
	        if( ! is_dir( FCPATH . $savePath ) )
				mkdir( FCPATH . $savePath, 0777, TRUE );

			$result = $client->getObject(array(
			  		'Bucket' => 'fincrm',
			        'Key'    => 'Production/'.$url.'/daily_sheet/attendance/'.$zip_name,
			  		'SaveAs' => $savePath.'/'.$zip_name
			));


			$zip = new ZipArchive;
		    $file_path = "upload/attendance/".$zip_name;
	    
            $res = $zip->open($file_path);
			if ($res === TRUE) {
			    $zip->extractTo("upload/attendance/");
			    $zip->close();
	          
			}else{
			  echo "error to unzip";
			}
        
		$downloadFile = base_url()."upload/attendance/".$filename;
        $deleteFolder = "upload/attendance";
        
        // $deleteFolder = "";
					
			echo json_encode(array(
			//'path' => FCPATH . $dir . $filename,
				'error'		=> "false",
				'status'	=> "true",
				'url'  		=> $downloadFile,
				'path' 		=> $deleteFolder,
				'file_name' => $filename
			));
		}
	}

	public function filterHtmlOfUser(){
		$username                 = $this->data['username'];
		$filterByBranch           = $this->input->post("AllBranches");
		$user['user1']	          = $this->Dailysheet_model->getUserIdByUsername($username);
		

		if(!empty($filterByName)){
			$userId               = $filterByName;
		}else{
			$userId 	          = $user['user1']['id'];
		}
        $data['userByBranch']	  = $this->Dailysheet_model->getUsersByBranch($filterByBranch,$userId);
		$data["AllUserName"]	  = $this->Dailysheet_model->get_all_usernames($userId);

		if(!empty($data['userByBranch'])){
		            $html ='<option value="">Select User</option>';
                
	        foreach($data['userByBranch'] as $key => $value) {
				$html .= '<option value="'.$value["id"].'" >'.$value["first_name"].' '.$value["last_name"].'</option>';
			}    
        }else{
            $html ='<option value="">Select User</option>';
        	
        } 
        $data["userHtml"]   = $html;
        echo json_encode($data);
  
	}

	public function unzipfolder(){
		
		 
		
	    $link = $this->input->post('link');
		$url = $this->data['url'];
	    $link1 = basename($link);
	    $pos = strrpos($link1, '.');
	    $name = substr($link1, 0, $pos);
		$ext  = substr($link1, $pos);
	    $dirname = dirname($link);
	    $task_number = basename($dirname);

	    include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/wasabi_connect.php');
	    $savePath = 'upload/dailysheet';
        
        if( ! is_dir( FCPATH . $savePath ) )
			mkdir( FCPATH . $savePath, 0777, TRUE );

		$result = $client->getObject(array(
		  		'Bucket' => 'fincrm',
		        'Key'    => 'Production/'.$url.'/daily_sheet/create&review/'.$task_number.'/'.$name.'.zip',
		  		'SaveAs' => $savePath.'/'.$name.'.zip'
		));


			$zip = new ZipArchive;
		    $file_path = "upload/dailysheet/".$name.".zip";
            $res = $zip->open($file_path);
		if ($res === TRUE) {
		    $zip->extractTo("upload/dailysheet/");
		    $zip->close();
           
		}else{
		  echo "error to unzip";
		}
        
		$downloadFile = base_url()."upload/dailysheet/".$link1;
        $deleteFolder = "upload/dailysheet";
        // $deleteFolder = "";
        $data = array('path' => $downloadFile ,"file_name" => $link1,"deleteFolder" =>$deleteFolder);
        
       echo json_encode($data);    

    }

    public function unlinkFile(){

    	$filePath  = $this->input->post("filePath");
    	// echo "File path - ". $filePath; die;
    	$filePath1 = $_SERVER['DOCUMENT_ROOT'].'/client/res/templates/dailysheet/'.$filePath;
    	if( !empty($filePath1)){
    	    delete_files($filePath1.'/');
    	    $dirname = dirname($filePath);
    		rmdir($filePath);
    		// rmdir($dirname);
    		echo "true";
    		
    		die;
    	}else{
    		$dirname = dirname($filePath);
    		rmdir($filePath);
    		// rmdir($dirname);
    		echo "true";
    		die;
    	}

    }

    public function date_limit(){
    	$data["error"] 	      = "false";
		$data["status"]       = "true";
	    $data["msg"] 	      = "please try later";
        $AllDates = array();
    	$username  = $this->data['username'];
        
		$user['user1']		= $this->Dailysheet_model->getUserIdByUsername($username);

	    $userId 	        = $user['user1']['id'];

    	$data['userRegisterDate'] 	= $this->Dailysheet_model->getUserDateByUserId($userId);
            $data['lastDailySheet'] 	= $this->Dailysheet_model->getAllDailySheetDatesByUserId($userId);

            foreach($data['lastDailySheet'] as $key=>$value) {
        	$AllDates[] = date('d-m-Y',strtotime($value["daily_sheet_date"])) ;
       	    }

       
	     	$DailySheetDatesByUser       = $data['lastDailySheet'];

	 	  	$begin 	                     = date('d-m-Y',strtotime($data['userRegisterDate'])); 

	      	$end 	                     = date('d-m-Y'); 
	      	
			// Use strtotime function 
			$Variable1                   = strtotime( $begin); 

			$Variable2                   = strtotime($end); 
			  
			// Use for loop to store dates into array 
			for ($currentDate = $Variable1; $currentDate <= $Variable2; $currentDate += (86400)) { 
			                                      
				$Store = date('d-m-Y', $currentDate); 
				$AllDatesBetweenRegAndCurrentDates[] = $Store; 

			} 
			  
	     $data['uncommon_dates']      = array_values( array_diff($AllDatesBetweenRegAndCurrentDates,$AllDates) );
		if(!empty($data['uncommon_dates'])){
		$data["error"] 	      = "false";
		$data["status"]       = "true";
	    $data["msg"] 	      = "success";
		}else{
			$data["error"] 	     = "true";
		$data["status"]       = "false";
	    $data["msg"] 	      = "please try later";
		}

		echo json_encode($data);
    }

 }

