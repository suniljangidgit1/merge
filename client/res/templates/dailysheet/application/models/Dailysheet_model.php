<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Dailysheet_model extends CI_Model {

 	public function __construct(){
		parent::__construct();
		
	}

	/*
	* To get user id by user_name
	* @parm 	- (string) $userName
	* @return 	- (string) $id
	*/
	public function getUserIdByUsername($userName="") {
   		
   		$query = $this->db->select('*')->get_where('user', array('user_name' => $userName) )->row_array();
   	
   		if( !empty($query) ){
    		return $query;
   		}
		
		return false;
	}

	/*
	* To get user id by user_name
	* @parm 	- (string) $userName
	* @return 	- (string) $id
	*/
	public function getallInsertedDates($userId="") {
   		
   		$query = $this->db->select('daily_sheet_date')->get_where('daily_sheet', array('user_id' => $userId) )->result_array();
   	
   		if( !empty($query) ){
    		return $query;
   		}
		
		return false;
	}

	/*
	* To get user office location id by user_name
	* @parm 	- (string) $userName
	* @return 	- (string) $id
	*/
	public function getUserOfficeLocationIdByUsername($userId="") {
   		
   		$query = $this->db->select('office_location_id')->get_where('user', array('id' => $userId) )->row_array();
   	
   		if( !empty($query) ){
    		return $query;
   		}
		
		return false;
	}

	/*
	* To get weekly off by office location 
	* @parm 	- (string) $officeLocation
	* @return 	- (string) $id
	*/
	public function getweeklyOffDays($officeLocation="") {
   		
   		$query = $this->db->select('w_off_days')->get_where('weekly_off', array('w_branch_id' => $officeLocation) )->result_array();
   	
   		if( !empty($query) ){
    		return $query;
   		}
		
		return false;
	}
    
    /*
	* To get weekly off by office location 
	* @parm 	- (string) $officeLocation
	* @return 	- (string) $id
	*/
	public function getMonthlyHolidays($officeLocation,$months,$years) {
   		
   		$query = $this->db->select('DATE_FORMAT(holiday_date, "%Y-%m-%d") as holiday_date,holiday_resone')->get_where('yearly_holidays', array('h_branch_id' => $officeLocation,'MONTH(holiday_date)' => $months,'YEAR(holiday_date)' => $years) )->result_array();
   	
   		if( !empty($query) ){
    		return $query;
   		}
		
		return false;
	} 
    

	/*
	* To get reviewer name by reviewer id
	* @parm 	- (string) $reviewer
	* @return 	- (string) $reviewerId
	*/
	public function getReviewerById($reviewerId="") {
   		
   		$query = $this->db->select('first_name,last_name')->get_where('user', array('id' => $reviewerId) )->result_array();
   		if( !empty($query) ){
    		return $query;
   		}
		
		return false;
	}

	/*
	* To get reviewerId by Reviewername
	* @parm 	- (string) $username
	* @return 	- (string) $reviewerId
	*/

    public function getReviewerIdByReviewername($username="") {
   		
   		$query = $this->db->select('id')->get_where('user', array('user_name' => $username) )->row_array();
   		
   		if( !empty($query) ){
    		return $query['id'];
   		}
		
		return false;
	}


	/*
	* To get user registered date by userId
	* @parm 	- (string) $userId
	* @return 	- (date) $registerDate
	*/
	public function getUserDateByUserId($userId="") {
   		
   		$query = $this->db->select(' DATE_FORMAT(created_at, "%Y-%m-%d") as registerDate ')->get_where('user', array('id' => $userId) )->row_array();
   		if( !empty($query) ){
    		return $query['registerDate'];
   		}
		
		return false;
	}


	/*
	* To get user last daily sheet date by user id
	* @parm 	- (string) $userId
	* @return 	- (string) $dateArr
	*/
	public function getAllDailySheetDatesByUserId($userId=""){

		$query = $this->db->select(' DATE_FORMAT(daily_sheet_date, "%Y-%m-%d") as daily_sheet_date ')->get_where('daily_sheet', array('user_id' => $userId) )->result_array();

		return  $query;
	}


	/*
	* To get user last daily sheet date by user id
	* @parm 	- (string) $userId
	* @return 	- (string) $dateArr
	*/
	public function getlastIdofDailySheet(){

		$query=$this->db->select('*')->order_by('id',"desc")->limit(1)->get('daily_sheet')->row_array();
		return  $query['id'];
	}


	/*
	* To get dailysheet details by rowId
	* @parm 	- (string) $rowId
	* @return 	- (string) $result
	*/
	public function getDailySheetDetails($editId){

		$result = array();

		if( !empty($editId) ){ 
			$result = $this->db->select('ds.id, ds.user_parent_id,ds.user_id, DATE_FORMAT(in_time, "%H:%i") as in_time, DATE_FORMAT(out_time, "%H:%i") as out_time, DATE_FORMAT(ds.daily_sheet_date, "%d/%m/%Y") as daily_sheet_date, ds.working_from, CONCAT(u1.first_name, " ", u1.last_name) as user_name, CONCAT(u2.first_name, " ", u2.last_name) as parent_name ' , false)
			->join('user as u1', 'u1.id = ds.user_id', 'left')
			->join('user as u2', 'u2.id = ds.user_parent_id', 'left')
			->where('ds.id', $editId)
			->get('daily_sheet as ds')
			->row_array();
		}

		return $result;
	}


	/*
	* To get dailysheet activity details by rowId
	* @parm 	- (string) $rowId
	* @return 	- (string) $resulteditId
	*/
	public function getdailySheetActivityDetails($editId){

		$result = array();
		
		if( !empty($editId) ){ 
			$result = $this->db->select('da.id, da.activity, DATE_FORMAT(da.start_time, "%H:%i") as start_time, DATE_FORMAT(da.end_time, "%H:%i") as end_time, da.attachment ')
			->where('da.daily_sheet_id', $editId)
			->get('daily_activity as da')
			->result_array();
		}

		return $result;
	}
    
    /*
	* To get feedback by daily sheet id
	* @parm 	- (string) $editId
	* @return 	- (string) $result
	*/
	public function getdailySheetFeedback($editId){

		$result = array();
		
		if( !empty($editId) ){ 
			$result = $this->db->select('dsf.feedback, dsf.feedback_by,dsf.feedback_attachment,dsf.daily_sheet_id,dsf.created_at,dsf.feedback_given_by')
			->where('dsf.daily_sheet_id', $editId)
			->get('daily_sheet_feedback as dsf')
			->result_array();
		}

		return $result;
	}

    /*
	* To get feedback by feedback id
	* @parm 	- (string) $lastId
	* @return 	- (string) $result
	*/
	public function getFeedbackDetails($lastId){

			$result = array();
			
			if( !empty($lastId) ){ 
				$result = $this->db->select('dsf.feedback, dsf.feedback_by,dsf.feedback_attachment,dsf.daily_sheet_id,dsf.created_at')
				->where('dsf.id', $lastId)
				->get('daily_sheet_feedback as dsf')
				->result_array();
			}

			return $result;
		}



	/*
	* To get dailysheet activity details by rowId
	* @parm 	- (string) $rowId
	* @return 	- (string) $result
	*/
	public function select_sheet($userId="") {
    
      	$query = $this->db->select('*')
      	->order_by('id',"desc")
      	->get_where('daily_sheet', array('user_id' => $userId))
      	->result_array();
		return $query;
	}


	/*
	* To get dailysheet activity files by activity id
	* @parm 	- (string) $id
	* @return 	- (string) $result
	*/
	public function getActivityFiles($id="") {
    
      	$query = $this->db->select('attachment')
      	->order_by('id',"desc")
      	->get_where('daily_activity', array('id' => $id))
      	->row_array();

      	if( !empty($query["attachment"])  ){
      		return $query["attachment"];
      	}
		return false;
	}


	/*
	* To update dailysheet activity files by activity id
	* @parm 	- (string) $id
	* @parm 	- (string) $fileString
	* @return 	- (string) $result
	*/
	public function updateActivityFiles($id="",$fileString="") {
    
      	if( !empty($id) ){
      		$this->db->where('id', $id)->update('daily_activity', array("attachment"=> $fileString ) );
      		return true;
      	}
		return false;
	}

    


	/*
	* To insert daily sheet
	* @parm 	- (array) $data
	* @return 	- (bool/int) 
	*/
    public function insert_sheet($data){
    
    	if( !empty($data) ) {
    		
			$this->db->insert('daily_sheet', $data);
			
			return $this->db->insert_id();
		}
	   
		return false;
   }

    /*
	* To insert daily sheet feedback
	* @parm 	- (array) $data
	* @return 	- (bool/int) 
	*/
	public function insert_feedback($data){
    	if( !empty($data) ) {
    		
			$this->db->insert('daily_sheet_feedback', $data);
			return $this->db->insert_id();
		}
	
		return false;
    }


    /*
	* get activity details by userId
	* @parm 	- (srting) $userId
	* @return 	- (array)  result
	*/
	
	public function select_activity_data($userId)
	{
    
 		$query = $this->db->select('*')->get_where('daily_activity', array('daily_sheet_id' => $userId ))->result_array();

	    if( !empty($query) ){
	    	return $query;
   		}
			
		return false;
		
	}
    
    
    /*
	* get dailysheet details by rowId = userId
	* @parm 	- (srting) $rowId
	* @return 	- (array)  result
	*/
    public function select_dailysheet_data_by_row($rowId)
	{
    	$query = $this->db->select('*')->get_where('daily_sheet', array('id' => $rowId))->result_array();
   
   		if( !empty($query) ){
    		return $query;
   		}
		
		return false;
		
	}
    
   

    /*
	* get activity details by rowId = userId
	* @parm 	- (srting) $rowId
	* @return 	- (array)  result
	*/
	public function select_activity_data_by_row($rowId)
	{

    $query = $this->db->select('*')->get_where('daily_activity', array('daily_sheet_id' => $rowId))->result_array();
   
	   if( !empty($query) ){
	    		return $query;
	   		}
			
		return false;
		
	}

    /*
	* to update status of dailysheet details by $daily_sheet_id
	* @parm 	- (array) $data1
	* @parm 	- (srting) $daily_sheet_id
	* @return 	- (bool)  result
	*/
	public function update_daily_sheet_status($data1,$daily_sheet_id){
    	if( !empty($data1) ) {
    		
    		$this->db->where('id',$daily_sheet_id);
			$this->db->update('daily_sheet', $data1);
			
			return ;
		}
	
		return false;
 	}


	/*
	* To update dauly sheet details by id
	* @parm 	- (int) $daily_sheet_id
	* @parm 	- (array) $data
	* @return 	- (bool) 
	*/
	public function updateDailySheet($daily_sheet_id, $data) {
    	
    	if( !empty($daily_sheet_id) && !empty($data) ) {
    		$this->db->where('id' ,$daily_sheet_id);
			$this->db->update('daily_sheet', $data);
			
			return true;
		}
	
		return false;
	}


	/*
	* To delete activities before insert new which wan already exists
	* @parm 	- (int) $daily_sheet_id
	* @return 	- (bool) 
	*/
	public function deleteActivity($daily_sheet_id){

		$this->db->where('daily_sheet_id', $daily_sheet_id);
		$this->db->delete('daily_activity');
		return true;
	}



	/*
	* To insert activity
	* @parm 	- (array) $data
	* @return 	- (bool) 
	*/
    public function insert_activity($data){
    	
    	if( !empty($data) ) {
			$this->db->insert('daily_activity', $data);
			return true;
		}
	
		return false;
    }

    /*
	* To update activity by dailysheetId
	* @parm 	- (array) $data1
	* @parm 	- (int) $daily_sheet_user
	* @return 	- (bool) 
	*/
	public function update_activity_sheet($data1,$daily_sheet_user){
    	if( !empty($data1) ) {
    		
    		$this->db->where('daily_sheet_id', $daily_sheet_user);
			$this->db->update('daily_activity', $data1);
			
			return true;
		}
	
		//return false;
	}

	/*
	* To count all records by userId
	* @parm 	- (sting) $userId
	* @return 	- (int) result
	*/
	public function daily_sheet_data($userId)
	{
		
    
        $query = $this->db->select('count(*) as allcount ')->get_where('daily_sheet',array('user_id' => $userId))->row_array();
   		// echo "<pre>";print_r($query);die;
   		if( !empty($query) ){
    		return $query['allcount'];
   		}
		
		return false;
	}


	
    /*
	* get dailysheety details by ($searchKey,$userId)
	* @parm 	- (sting) $searchKey
	* @parm 	- (sting) $userId
	* @parm 	- (sting) $isCount
	* @return 	- (array) result
	*/
    public function getemployeebyorder($searchKey,$userId,$isCount){

	 $query = $this->db->select('*');
     $this->db->order_by($searchKey["columnName"], $searchKey["columnSortOrder"]);
     $this->db->where('user_id',$userId);
    
     if($searchKey["keyword"]!=""){
     	 $this->db->group_start();
      	 $this->db->like('id',$searchKey["keyword"]);
      	 $this->db->or_like('in_time',$searchKey["keyword"]);
       	 $this->db->or_like('out_time',$searchKey["keyword"]);
      	 $this->db->or_like('daily_sheet_date',$searchKey["keyword"]);
      	 $this->db->or_like('working_from',$searchKey["keyword"]);
      	 $this->db->or_like('activity_status',$searchKey["keyword"]);
      	 $this->db->group_end();
       }//put your code here

       if($searchKey["location"]!=""){
        $this->db->group_start();
        $this->db->where_in('working_from',$searchKey["location"]);
        $this->db->group_end();
        
       //code for copy end
       }

        if($searchKey["statusfilter"]!=""){
        $this->db->group_start();
        $this->db->where_in('activity_status',$searchKey["statusfilter"]);
        $this->db->group_end();
       
       //code for copy end
       }

        if($searchKey["datefilter"]!=""){
        $this->db->group_start();

        if($searchKey["datefilter"] == "today"){
        $this->db->where('daily_sheet_date',date("Y-m-d"));

        }else if($searchKey["datefilter"] == "yesterday"){
        $yesterday = date('Y-m-d',strtotime("today -1 days"));
        $this->db->where('daily_sheet_date',$yesterday);	

        }else if($searchKey["datefilter"] =='7day'){
        
        $this->db->where('daily_sheet_date BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()');
    
        }else if($searchKey["datefilter"] =='30day'){

        $thirtyday = date('Y-m-d',strtotime("today -29 days"));
       
        $this->db->where('daily_sheet_date BETWEEN CURDATE() - INTERVAL 29 DAY AND CURDATE()');

        }else if($searchKey["datefilter"] =='thismonth'){
        $thismonth = date('m');
        $this->db->where('MONTH(daily_sheet_date)',$thismonth);

        }else if($searchKey["datefilter"] =='lastmonth'){
            $thismonth = date('m');
        	$date=$thismonth-1;
        	$this->db->where('MONTH(daily_sheet_date)',$date);

        }elseif($searchKey["datefilter"] =='custom'){
        
        $this->db->where('daily_sheet_date BETWEEN "'. date('Y-m-d', strtotime($searchKey["filter_date_start"])). '" and "'. date('Y-m-d', strtotime($searchKey["filter_date_end"])).'"');
        
        }
        $this->db->group_end();
     }
     
     
     if($isCount== false){
     	 $this->db->limit($searchKey["rowperpage"],$searchKey["row"]);
     	 $query = $this->db->get('daily_sheet');
             return $query ->result_array();
       	}else{
         $query = $this->db->get('daily_sheet');
            return $query ->num_rows();
       	}
     	
	}
    
    /*
	* get dailysheety details by ($searchKey,$userId)
	* @parm 	- (sting) $searchKey
	* @parm 	- (sting) $userId
	* @parm 	- (sting) $isCount
	* @return 	- (array) result
	*/
    public function review_daily_sheet_count($reviewerId){
	  $query = $this->db->select('ds.user_id,u.is_admin');
	  $this->db->join('user as u', 'u.id = ds.user_id','Left');
	  $this->db->where('ds.user_id',$reviewerId);
	  $this->db->where('u.is_admin',1);
	  $query = $this->db->get('daily_sheet as ds');
	  $query ->result_array();

	    if( !empty($query ->result_array())){
    	  $query = $this->db->select('*');
    	  $this->db->join('user as u', 'u.id = ds.user_id','Left');
	      $this->db->where('ds.activity_status !=',1);
	      $this->db->where('ds.activity_status !=',3);
	      $query = $this->db->get('daily_sheet as ds');
		  $query_count= $query ->result_array();
		  $query = count($query_count);
      
        return $query;

        }else{

	      $query = $this->db->select('*');
    	  $this->db->join('user as u', 'u.id = ds.user_id','Left');
          $this->db->where('ds.user_parent_id',$reviewerId);
          $this->db->where('ds.activity_status !=',1);
          $this->db->where('ds.activity_status !=',3);
          $query = $this->db->get('daily_sheet as ds');
	      $query_count = $query ->result_array();
	      $query = count($query_count);
      
        return $query;
        }
        return false;
    }

    /*
	* To get daily sheet details by userId and $searchKey
	* @parm 	- (string) userId
	* @parm 	- (string) $searchKey
	* @return 	- (array) result
	*/
	public function review_select_sheet($searchKey,$userId,$isCount){
	  
	    $query = $this->db->select('ds.user_id,u.is_admin');
	    $this->db->join('user as u', 'u.id = ds.user_id', 'Left');
	    $this->db->where('ds.user_id',$userId);
	    $this->db->where('u.is_admin',1);
	    $query = $this->db->get('daily_sheet as ds');
	    $query ->result_array();
      
		if( !empty($query ->result_array())){
	         $query = $this->db->select('ds.id ,ds.in_time,ds.out_time,ds.daily_sheet_date,ds.working_from,ds.activity_status,u.first_name,u.last_name');

	       	 $this->db->join('user as u', 'u.id = ds.user_id', 'Left');

	     	if($searchKey["columnName"] == "first_name"){
		        $this->db->order_by("u.".$searchKey["columnName"], $searchKey["columnSortOrder"]);
	     	}else{
	     		$this->db->order_by("ds.".$searchKey["columnName"], $searchKey["columnSortOrder"]);
	     	}
     
 		// $this->db->where('user_parent_id',$reviewerId);
	     	$this->db->where('ds.activity_status !=', 1);
	     	$this->db->where('ds.activity_status !=', 3);
	     	
	         	if($searchKey["keyword"]!=""){
	     	
			         $this->db->group_start();
			         $this->db->like('ds.in_time',$searchKey["keyword"]);
			       	 $this->db->or_like('ds.out_time',$searchKey["keyword"]);
			      	 $this->db->or_like('ds.daily_sheet_date',$searchKey["keyword"]);
			      	 $this->db->or_like('ds.working_from',$searchKey["keyword"]);
			      	 $this->db->or_like('ds.activity_status',$searchKey["keyword"]);
			      	 $this->db->or_like('u.first_name',$searchKey["keyword"]);
			      	 $this->db->or_like('u.last_name',$searchKey["keyword"]);
			      	 $this->db->group_end();
		     	
       			}

		       if($searchKey["allusernames"]!=""){
			        $this->db->group_start();
			        $this->db->where_in('ds.user_id',$searchKey["allusernames"]);
			        $this->db->group_end();
		        
		       
		       }

		       if($searchKey["location"]!=""){
		        $this->db->group_start();
		        $this->db->where_in('ds.working_from',$searchKey["location"]);
		        $this->db->group_end();
		        
		       //code for copy end
		       }

		        if($searchKey["statusfilter"]!=""){
		        $this->db->group_start();
		        $this->db->where_in('ds.activity_status',$searchKey["statusfilter"]);
		        $this->db->group_end();
		       
		       //code for copy end
		       }

		        if($searchKey["datefilter"]!=""){
		        $this->db->group_start();
		        //echo date("Y-m-d");
		        if($searchKey["datefilter"] == "today"){
		        $this->db->where('ds.daily_sheet_date',date("Y-m-d"));

		        }else if($searchKey["datefilter"] == "yesterday"){
		        $yesterday = date('Y-m-d',strtotime("today -1 days"));
		        	$this->db->where('ds.daily_sheet_date',$yesterday);	

		        }else if($searchKey["datefilter"] =='7day'){
		      
		        	$this->db->where('ds.daily_sheet_date BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()');
		        
		        }else if($searchKey["datefilter"] =='30day'){
			        $thirtyday = date('Y-m-d',strtotime("today -29 days"));
			        $this->db->where('ds.daily_sheet_date BETWEEN CURDATE() - INTERVAL 29 DAY AND CURDATE()');

		        }else if($searchKey["datefilter"] =='thismonth'){
			        $thismonth = date('m');
			        $this->db->where('MONTH(ds.daily_sheet_date)',$thismonth);

		        }else if($searchKey["datefilter"] =='lastmonth'){
		            $thismonth = date('m');
		        	$date=$thismonth-1;
		        	$this->db->where('MONTH(daily_sheet_date)',$date);
		        }elseif($searchKey["datefilter"] =='custom'){
		        	$this->db->where('ds.daily_sheet_date BETWEEN "'. date('Y-m-d', strtotime($searchKey["filter_date_start"])). '" and "'. date('Y-m-d', strtotime($searchKey["filter_date_end"])).'"');
		        
		        }
		        
		        $this->db->group_end();
		       
		       //code for copy end
		       }
		      
		       	if($isCount == false){
		       		$this->db->limit($searchKey["rowperpage"],$searchKey["row"]);
		       		 $query = $this->db->get('daily_sheet as ds');
		             return $query ->result_array();
		       	}else{
		              $query = $this->db->get('daily_sheet as ds');
		            return $query ->num_rows();
		       	}
		     	
       
       
			}else{
				$query = $this->db->select('ds.id ,ds.in_time,ds.out_time,ds.daily_sheet_date,ds.working_from,ds.activity_status,u.first_name,u.last_name');

		          $this->db->join('user as u', 'u.id = ds.user_id', 'Left');
		          //$this->db->join('office_location as ol', 'ol.id = ds.user_id', 'Left');
		     	if($searchKey["columnName"] == "first_name"){

		     		$this->db->order_by("u.".$searchKey["columnName"], $searchKey["columnSortOrder"]);
		     	}else{
		     	
		     		$this->db->order_by("ds.".$searchKey["columnName"], $searchKey["columnSortOrder"]);

		     	}
					$this->db->where('ds.user_parent_id',$userId);
					$this->db->where('ds.activity_status !=', 1);
					$this->db->where('ds.activity_status !=', 3);
					$this->db->limit($searchKey["rowperpage"],$searchKey["row"]);
				 if($searchKey["keyword"]!=""){
		     	 
					$this->db->group_start();
					$this->db->like('ds.in_time',$searchKey["keyword"]);
					$this->db->or_like('ds.out_time',$searchKey["keyword"]);
					$this->db->or_like('ds.daily_sheet_date',$searchKey["keyword"]);
					$this->db->or_like('ds.working_from',$searchKey["keyword"]);
					$this->db->or_like('ds.activity_status',$searchKey["keyword"]);
					$this->db->or_like('u.first_name',$searchKey["keyword"]);
					$this->db->or_like('u.last_name',$searchKey["keyword"]);
					$this->db->group_end();
		        
		       }

		        if($searchKey["allusernames"]!=""){
			        $this->db->group_start();
			        $this->db->where_in('ds.user_id',$searchKey["allusernames"]);
			        $this->db->group_end();
			      
		       }

		        if($searchKey["statusfilter"]!=""){
			        $this->db->group_start();
			        $this->db->where_in('ds.activity_status',$searchKey["statusfilter"]);
			        $this->db->group_end();
			      
		       }

		       if($searchKey["location"]!=""){
			        $this->db->group_start();
			        $this->db->where_in('ds.working_from',$searchKey["location"]);
			        $this->db->group_end();
		       }

		       if($searchKey["datefilter"]!=""){
		        	$this->db->group_start();
			        if($searchKey["datefilter"] == "today"){
			        	$this->db->where('ds.daily_sheet_date',date("Y-m-d"));
			        }else if($searchKey["datefilter"] == "yesterday"){
				        $yesterday = date('Y-m-d',strtotime("today -1 days"));
				        $this->db->where('ds.daily_sheet_date',$yesterday);	
			        }else if($searchKey["datefilter"] =='7day'){
			        
			        	$this->db->where('ds.daily_sheet_date BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()');
			        
			        }else if($searchKey["datefilter"] =='30day'){
				        $thirtyday = date('Y-m-d',strtotime("today -29 days"));
				        $this->db->where('ds.daily_sheet_date BETWEEN CURDATE() - INTERVAL 29 DAY AND CURDATE()');
			        }else if($searchKey["datefilter"] =='thismonth'){
			        	$thismonth = date('m');
			        	$this->db->where('MONTH(ds.daily_sheet_date)',$thismonth);
			        }else if($searchKey["datefilter"] =='lastmonth'){
			        	$thismonth = date('m');
			        	$date=$thismonth-1;
			        	$this->db->where('MONTH(daily_sheet_date)',$date);
			        
			        }elseif($searchKey["datefilter"] =='custom'){
				        $this->db->where('ds.daily_sheet_date BETWEEN "'. date('Y-m-d', strtotime($searchKey["filter_date_start"])). '" and "'. date('Y-m-d', strtotime($searchKey["filter_date_end"])).'"');
				        
				        }
				        
				        $this->db->group_end();
		       
	       		}
		       	 
		     	
		        if($isCount == false){
		       		$this->db->limit($searchKey["rowperpage"],$searchKey["row"]);
		       		 $query = $this->db->get('daily_sheet as ds');
		             return $query ->result_array();
		       	}else{
		              $query = $this->db->get('daily_sheet as ds');
		            return $query ->num_rows();
		       	}
		     	
		     	
		       
		        
			}
		    
		       
				return false;
			}

    /*
	* get office branches
	* @parm 	- 
	* @return 	- (array) result
	*/
	public function select_braches(){
		$query = $this->db->select('name,id')
	      	->order_by('id',"desc")
	      	->get_where('office_location', array('deleted' => 0) )
	      	->result_array();
			return $query;
	}


    /*
	* get user fullname by $userId
	* @parm 	-  $userId
	* @return 	- (array) result
	*/
	public function UserNameByid($userId){
		$query = $this->db->select('first_name,last_name')->get_where('user', array('id' => $userId) )->result_array();
		$userName= $query[0]['first_name']." ".$query[0]['last_name'];
		return $userName;
	}


    /*
	* get dailysheet details by date
	* @parm 	- (string) $daily_sheet_task_date
	* @return 	- (array) result
	*/
	public function check_dailysheet_date($daily_sheet_task_date,$userId)
	{
		$query = $this->db->select("id")->get_where('daily_sheet',array('daily_sheet_date' => $daily_sheet_task_date,'user_id'=>$userId))->row_array();
	    // print_r($this->db->last_query());die;
		return $query;
	}

     /*
	* get dailysheet details by date
	* @parm 	- (string) $daily_sheet_task_date
	* @return 	- (array) result
	*/
	public function accepted_daily_sheet_count($reviewerId){
      $query = $this->db->select('ds.user_id,u.is_admin');
	  $this->db->join('user as u', 'u.id = ds.user_id','left');
	  $this->db->where('ds.user_id',$reviewerId);
	  $this->db->where('u.is_admin',1);
	  $query = $this->db->get('daily_sheet as ds');
	  $query ->result_array();
      //print_r($query ->row_array());die;
		if( !empty($query ->result_array())){
	    		$query = $this->db->select('count(*) as allcount')->order_by('id',"desc")->get_where('daily_sheet', array('activity_status' => 3))->row_array();
	      
	      return $query['allcount'];
	    }else{

		 $query = $this->db->select('count(*) as allcount')->order_by('id',"desc")
	      ->get_where('daily_sheet', array('user_parent_id' => $reviewerId,'activity_status' => 3))->row_array();

	      return $query['allcount'];
	   }
return false;
}



    
    /*
	* To get attendance details from daily sheet table by user id and date
	* @parm 	- (string) $userId
	* @parm 	- (string) $select_date
	* @return 	- (string) $dateArr
	*/
 	public function accepted_select_sheet($searchKey,$userId,$isCount){
	 $query = $this->db->select('ds.user_id,u.is_admin');
	  $this->db->join('user as u', 'u.id = ds.user_id', 'left');
	  $this->db->where('ds.user_id',$userId);
	  $this->db->where('u.is_admin',1);
	  $query = $this->db->get('daily_sheet as ds');
	  $query ->result_array();
      //print_r($query ->row_array());die;
	if( !empty($query ->result_array())){
		 $query = $this->db->select('ds.id,ds.in_time,ds.out_time,ds.daily_sheet_date,ds.working_from,ds.activity_status,u.first_name,u.last_name');
     	 $this->db->join('user as u', 'u.id = ds.user_id', 'left');
         //$this->db->order_by($columnName, $columnSortOrder);
         if($searchKey["columnName"] == "first_name"){
         	$this->db->order_by("u.".$searchKey["columnName"],$searchKey["columnSortOrder"]);
         }else
         {  $this->db->order_by("ds.".$searchKey["columnName"], $searchKey["columnSortOrder"]);
         }
       
     	 // $this->db->where('user_parent_id',$reviewerId);
         $this->db->where('ds.activity_status',3);
         
         if($searchKey["keyword"]!=""){
     	
         $this->db->group_start();
         $this->db->like('ds.in_time',$searchKey["keyword"]);
       	 $this->db->or_like('ds.out_time',$searchKey["keyword"]);
      	 $this->db->or_like('ds.daily_sheet_date',$searchKey["keyword"]);
      	 $this->db->or_like('ds.working_from',$searchKey["keyword"]);
      	 $this->db->or_like('ds.activity_status',$searchKey["keyword"]);
      	 $this->db->or_like('u.first_name',$searchKey["keyword"]);
      	 $this->db->or_like('u.last_name',$searchKey["keyword"]);
      	 $this->db->group_end();
     	
         
       }
       if($searchKey["allusernames"]!=""){
        $this->db->group_start();
        $this->db->where_in('ds.user_id',$searchKey["allusernames"]);
        $this->db->group_end();
      
       
       }


       if($searchKey["location"]!=""){
        $this->db->group_start();
        $this->db->where_in('ds.working_from',$searchKey["location"]);
        $this->db->group_end();
        
       //code for copy end
       }

       if($searchKey["datefilter"]!=""){
        $this->db->group_start();
        if($searchKey["datefilter"] == "today"){
        $this->db->where('ds.daily_sheet_date',date("Y-m-d"));
        }else if($searchKey["datefilter"] == "yesterday"){
        $yesterday = date('Y-m-d',strtotime("today -1 days"));
        $this->db->where('ds.daily_sheet_date',$yesterday);	
        }else if($searchKey["datefilter"] =='7day'){
        //$sevenday = date('Y-m-d',strtotime("today -7 days"));
        $this->db->where('ds.daily_sheet_date BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()');
        //date BETWEEN DATE_SUB(NOW(), INTERVAL 15 DAY) AND NOW()
        //$this->db->where_in('daily_sheet_date',$sevenday);
        }else if($searchKey["datefilter"] =='30day'){
        $thirtyday = date('Y-m-d',strtotime("today -29 days"));
        // $this->db->where_in('daily_sheet_date',$thirtyday);
        $this->db->where('ds.daily_sheet_date BETWEEN CURDATE() - INTERVAL 29 DAY AND CURDATE()');
        }else if($searchKey["datefilter"] =='thismonth'){
        $thismonth = date('m');
        $this->db->where('MONTH(ds.daily_sheet_date)',$thismonth);
        }else if($searchKey["datefilter"] =='lastmonth'){
        $thismonth = date('m');
        	$date=$thismonth-1;
        	$this->db->where('MONTH(daily_sheet_date)',$date);
        
        }elseif($searchKey["datefilter"] =='custom'){
        $this->db->where('ds.daily_sheet_date BETWEEN "'. date('Y-m-d', strtotime($searchKey["filter_date_start"])). '" and "'. date('Y-m-d', strtotime($searchKey["filter_date_end"])).'"');
        
        }
        
        $this->db->group_end();
       
       //code for copy end
       }

       	 if($isCount== false){
       		$this->db->limit($searchKey["rowperpage"],$searchKey["row"]);
       		 $query = $this->db->get('daily_sheet as ds');
             return $query ->result_array();
       	}else{
              $query = $this->db->get('daily_sheet as ds');
            return $query ->num_rows();
       	}
      
       
	}else{
		 $query = $this->db->select('ds.id,ds.in_time,ds.out_time,ds.daily_sheet_date,ds.working_from,ds.activity_status,u.first_name,u.last_name');
     	 $this->db->join('user as u', 'u.id = ds.user_id', 'left');
         if($searchKey["columnName"] == "first_name"){
             $this->db->order_by("u.".$searchKey["columnName"], $searchKey["columnSortOrder"]);
         }else{
         	$this->db->order_by("ds.".$searchKey["columnName"], $searchKey["columnSortOrder"]);
         }
         
     	 $this->db->where('ds.user_parent_id',$userId);
         $this->db->where('ds.activity_status', 3);
        
		 if($searchKey["keyword"]!=""){
     	 
         $this->db->group_start();
         $this->db->like('ds.in_time',$searchKey["keyword"]);
       	 $this->db->or_like('ds.out_time',$searchKey["keyword"]);
      	 $this->db->or_like('ds.daily_sheet_date',$searchKey["keyword"]);
      	 $this->db->or_like('ds.working_from',$searchKey["keyword"]);
      	 $this->db->or_like('ds.activity_status',$searchKey["keyword"]);
      	 $this->db->or_like('u.first_name',$searchKey["keyword"]);
      	 $this->db->or_like('u.last_name',$searchKey["keyword"]);
      	 $this->db->group_end();

       }
       if($searchKey["allusernames"]!=""){
        $this->db->group_start();
        $this->db->where_in('ds.user_id',$searchKey["allusernames"]);
        $this->db->group_end();
      
       
       }


       if($searchKey["location"]!=""){
        $this->db->group_start();
        $this->db->where_in('ds.working_from',$searchKey["location"]);
        $this->db->group_end();
        
       //code for copy end
       }

       if($searchKey["datefilter"]!=""){
        $this->db->group_start();
        if($searchKey["datefilter"] == "today"){
        $this->db->where('ds.daily_sheet_date',date("Y-m-d"));
        }else if($searchKey["datefilter"] == "yesterday"){
        $yesterday = date('Y-m-d',strtotime("today -1 days"));
        $this->db->where('ds.daily_sheet_date',$yesterday);	
        }else if($searchKey["datefilter"] =='7day'){
        //$sevenday = date('Y-m-d',strtotime("today -7 days"));
        $this->db->where('ds.daily_sheet_date BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()');
        
        }else if($searchKey["datefilter"] =='30day'){
        $thirtyday = date('Y-m-d',strtotime("today -29 days"));
        // $this->db->where_in('daily_sheet_date',$thirtyday);
        $this->db->where('ds.daily_sheet_date BETWEEN CURDATE() - INTERVAL 29 DAY AND CURDATE()');
        }else if($searchKey["datefilter"] =='thismonth'){
        $thismonth = date('m');
        $this->db->where('MONTH(ds.daily_sheet_date)',$thismonth);
        }else if($searchKey["datefilter"] =='lastmonth'){
        $thismonth = date('m');
        	$date=$thismonth-1;
        	$this->db->where('MONTH(daily_sheet_date)',$date);
        
        }elseif($searchKey["datefilter"] =='custom'){
        $this->db->where('ds.daily_sheet_date BETWEEN "'. date('Y-m-d', strtotime($searchKey["filter_date_start"])). '" and "'. date('Y-m-d', strtotime($searchKey["filter_date_end"])).'"');
        
        }
        
        $this->db->group_end();
       
       //code for copy end
       }
       	 
     	 if($isCount== false){
       		$this->db->limit($searchKey["rowperpage"],$searchKey["row"]);
       		 $query = $this->db->get('daily_sheet as ds');
             return $query ->result_array();
       	}else{
              $query = $this->db->get('daily_sheet as ds');
            return $query ->num_rows();
       	}
        
	}
    
       
		return false;
	}

    /*
	* To get user names under reviewer and admin by user id 
	* @parm 	- (string) $userId
	* @return 	- (string) $usernameArr
	*/
	function get_all_usernames($userId){
		
	  $query = $this->db->select('is_admin');
	  // $this->db->join('user as u', 'u.id = ds.user_id', 'left');
	  $this->db->where('id',$userId);
	  $this->db->where('is_admin',1);

	  $query = $this->db->get('user');
	  $query ->result_array();
	  if(!empty($query ->result_array())){
      $query = $this->db->select('first_name,last_name,id')->order_by("first_name","asc")->get_where('user', array('is_active'=>1, 'deleted' => 0, 'is_portal_user'=>0))->result_array();
      }else{
      $query = $this->db->select('first_name,last_name,id')->order_by("first_name","asc")->get_where('user', array('user_parent_id'=>$userId, 'is_active'=>1, 'deleted' => 0, 'is_portal_user'=>0) )->result_array();
      }
      return $query;
	}

	/*
	* To get user names under reviewer and admin by user id 
	* @parm 	- (string) $userId
	* @return 	- (string) $usernameArr
	*/
	function getUsersByBranch($branchId,$userId){
	 $query = $this->db->select('is_admin');
	  // $this->db->join('user as u', 'u.id = ds.user_id', 'left');
	  $this->db->where('id',$userId);
	  $this->db->where('is_admin',1);

	  $query = $this->db->get('user');
	  $query ->result_array();
	  if(!empty($query ->result_array())){

      $query = $this->db->select('first_name,last_name,id')->order_by("first_name","asc")->get_where('user', array('office_location_id'=>$branchId, 'is_active'=>1, 'deleted'=>0, 'is_portal_user'=>0))->result_array();

      }else{
       $query = $this->db->select('first_name,last_name,id')->order_by("first_name","asc")->get_where('user', array('office_location_id'=>$branchId, 'is_active'=>1,'user_parent_id'=>$userId, 'deleted'=>0,'is_portal_user'=>0))->result_array();
      }

      return $query;
	
	 }

    /*
	* To check login user is reviewer or not by user id
	* @parm 	- (string) $userId
	* @return 	- (string) $dataArr*/
	function isUserReviewer($userId){
		$query = $this->db->select('user_parent_id')->get_where('user', array('user_parent_id'=>$userId)  )->result_array();
      return $query;
	}
   
   /*
	* To check login user is admin or not by user id
	* @parm 	- (string) $userId
	* @return 	- (string) $dataArr*/
	function isUserAdmin($userId){
		$query = $this->db->select('id')->get_where('user', array('id'=>$userId,'is_admin'=>1)  )->result_array();
      return $query;
	}
	/*
	* To get attendance details from daily sheet table by userid,months and years
	* @parm 	- (string) $userId
	* @parm 	- (string) $months
	* @parm 	- (string) $years
	* @return 	- (string) $dataArr
	*/

	function employeeAllDaysDetails($userId,$months,$years){
		$query = $this->db->select('in_time,out_time,daily_sheet_date');
        $this->db->where('MONTH(daily_sheet_date)',$months);
        $this->db->where('YEAR(daily_sheet_date)',$years);
		$this->db->where('user_id',$userId);
		$this->db->group_by('daily_sheet_date');
        $this->db->order_by("daily_sheet_date","asc");
		$query = $this->db->get('daily_sheet');
        return $query ->result_array();
      
	}
	

	/*
	* To get designation from designation table by user id 
	* @parm 	- (string) $userId
	* @return 	- (string) $designation array
	*/	
	function GetDesignation($userId){
		$query = $this->db->select('d.name');
	    $this->db->join('designation as d', 'd.id = u.designation_id', 'left');
	    $this->db->where('u.id',$userId);
		$query = $this->db->get('user as u');
        return $query ->row_array();
      
	}

     /*
	* To get attendance details from daily sheet table by user id and date
	* @parm 	- (string) $userId
	* @parm 	- (string) $select_date
	* @return 	- (string) $dateArr*/

	function selectedDateData($userId,$select_date){
		$query = $this->db->select('in_time,out_time,daily_sheet_date');
        $this->db->where('daily_sheet_date',$select_date);
		$this->db->where('user_id',$userId);
        $this->db->order_by("daily_sheet_date","asc");
		$query = $this->db->get('daily_sheet');
        return $query ->result_array();
      
	}

	 /*
	* To get Domain URL
	* @parm 	- 
	* @return 	- (string) $url*/

	function siteURL() {
	    $domainName = $_SERVER['HTTP_HOST'];
	    $url=$domainName;
	    return $url;
	}

	 /*
	* To get Created at date form users table
	* @parm 	- (string) $url
	* @return 	- (string) $query*/

	public function getDateData($url) {
			$newdb = $this->load->database('default1',TRUE);
   			$query = $newdb->select('u_created_at');
   			$newdb->where('u_domain_name',$url);
        	$query = $newdb->get('users');
        	return $query ->result_array();
	}

	public function getDomainStatus($url) {
			$newdb = $this->load->database('default1',TRUE);
   			$query = $newdb->select('domain_status');
   			$newdb->where('u_domain_name',$url);
        	$query = $newdb->get('users');
        	return $query ->row_array();
	}

	
}