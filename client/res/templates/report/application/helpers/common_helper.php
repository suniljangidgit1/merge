<?php
// COMMON HELPER


/*
* To get user name by userid
* @parm 	= (int) $userId
* @return 	= (array) $name
*/
if( !function_exists("getUserNameById") ){

	function getUserNameById($userId=""){

		$name 	= NULL;
       	
       	if( !empty($userId) ){
	
			$CI = & get_instance();  
			
			$name = $CI->db->select(' CONCAT( u.first_name, " ", u.last_name) as name ', false)->where("u.id", $userId)->get("user as u")->row_array();

			if( !empty($name["name"]) ){
				$name = $name["name"];
			}
       	}
        // echo "<pre>";print_r($name);die;
        return $name;
	}
}


/*
* To get user id by username
* @parm 	= (int) $username
* @return 	= (array) $id
*/
if( !function_exists("getUserIdByUsername") ){

	function getUserIdByUsername($username=""){

		$id 	= NULL;
       	
       	if( !empty($username) ){
	
			$CI = & get_instance();  
			
			$id = $CI->db->select('id', false)->where("u.user_name", $username)->get("user as u")->row_array();

			if( !empty($id["id"]) ){
				$id = $id["id"];
			}
       	}
        // echo "<pre>";print_r($id);die;
        return $id;
	}
}


/*
* To get team name by id
* @parm 	= (int) $id
* @return 	= (array) $name
*/
if( !function_exists("getTeamNameById") ){

	function getTeamNameById($id=""){

		$name 	= NULL;
       	$CI = & get_instance();  
       	
       	if( !empty($id) ){
	
			$team = $CI->db->select("t.name", false)->where("t.id", $id)->order_by("t.name","asc")->get("team as t")->row_array();

			if( !empty($team["name"]) ){
				$name = $team["name"];
			}
       	}
        // echo "<pre>";print_r($name);die;
        return $name;
	}
}


/*
* To get users list
* @parm 	= (array) $where
* @return 	= (array) $userList
*/
if( !function_exists("getUserList") ){

	function getUserList( $where = array() ){
		$CI = & get_instance(); 

		if( empty($where) ){

			$userList = $CI->db->select(' u.id as u_id, CONCAT( u.first_name, " ", u.last_name) as name ', false)->where( array("deleted"=> "0", "is_active" => "1", "is_portal_user" => "0", "id !=" => "system"  ) )->order_by("u.first_name","asc")->get("user as u")->result_array();
		}else{ 

			if( !empty($where["id"]) ){
				$CI->db->where("id", $where["id"] );
				$CI->db->or_where("user_parent_id", $where["id"] );
			}

			$userList = $CI->db->select(' u.id as u_id, CONCAT( u.first_name, " ", u.last_name) as name ', false)->where( array("deleted"=> "0", "is_active" => "1", "is_portal_user" => "0", "id !=" => "system"  ) )->order_by("u.first_name","asc")->get("user as u")->result_array();
		}

        // echo "<pre>";print_r($userList);die;
        return $userList;
	}
}


/*
* To get users id list
* @parm 	= (array) $where
* @return 	= (array) $userList
*/
if( !function_exists("getUserIdList") ){

	function getUserIdList( $where = array() ){
		$CI = & get_instance();  

		if( empty($where) ){

			$userList = $CI->db->select('u.id as u_id', false)->where(array("deleted"=> "0", "is_active" => "1", "is_portal_user" => "0", "id !=" => "system"  ))->order_by("u.first_name","asc")->get("user as u")->result_array();
		}else{
			if( !empty($where["id"]) ){
				$CI->db->where("id", $where["id"] );
				$CI->db->or_where("user_parent_id", $where["id"] );
			}

			$userList = $CI->db->select('u.id as u_id', false)->where(array("deleted"=> "0", "is_active" => "1", "is_portal_user" => "0", "id !=" => "system" ))->where($where)->order_by("u.first_name","asc")->get("user as u")->result_array();
		
		}

        // echo "<pre>";print_r($userList);die;
        return $userList;
	}
}


/*
* To get team list
* @parm 	= (array) $where
* @return 	= (array) $teamList
*/
if( !function_exists("getTeamList") ){

	function getTeamList( $where = array() ){
	
		$CI = & get_instance();  

		if( empty($where) ){

			$teamList = $CI->db->select("id,name", false)->where("deleted", "0")->order_by("name","asc")->get("team as t")->result_array();
		}else{

			$teamList = $CI->db->select("id,name", false)->where("deleted", "0")->where($where)->order_by("name","asc")->get("team as t")->result_array();

		}
		// 
        // echo "<pre>";print_r($teamList);die;
        return $teamList;
	}
}


/*
* To get team id list
* @parm 	= (array) $where
* @return 	= (array) $teamList
*/
if( !function_exists("getTeamIdList") ){

	function getTeamIdList( $where = array() ){
	
		$CI = & get_instance();  

		if( empty($where) ){

			$teamList = $CI->db->select("u.id as u_id", false)->where("deleted", "0")->order_by("name","asc")->get("team as t")->result_array();
		}else{

			$teamList = $CI->db->select("u.id as u_id", false)->where("deleted", "0")->where($where)->order_by("name","asc")->get("team as t")->result_array();
		}
		// 
        // echo "<pre>";print_r($teamList);die;
        return $teamList;
	}
}


/*
* To check whether user is super admin, admin, parent user or child user
* @parm 	= (array) $id
* @return 	= (string) $userRole
*/
if( !function_exists("getUserRole") ){

	function getUserRole( $id="" ){
		
		$userRole = NULL;
		$CI = & get_instance();  

		$userDetails = $CI->db->select('u.id, u.is_super_admin, u.is_admin, u.user_parent_id', false)->where("u.id", $id)->get("user as u")->row_array();
        
		
		if( !empty($userDetails) ){ 
			if( $userDetails['is_super_admin'] == "1" ){
				$userRole = "super_admin";
			}else if( $userDetails['is_super_admin'] == "0" && $userDetails['is_admin'] == "1" ) {
				$userRole = "admin";
			}/*else if( $userDetails['is_super_admin'] == "0" && $userDetails['is_admin'] == "0" && empty($userDetails['user_parent_id']) ) {
				$userRole = "user";
			}*/else{
				$userRole = "sub_user";
			}
		}

        // echo "<pre>";print_r($userRole);die;
        return $userRole;
	}
}


/*
* To get emails by entity id (table id)
* @parm 	= (int) $EntityId
* @return 	= (array) $name
*/
if( !function_exists("getEmailAddressByEntityId") ){

	function getEmailAddressByEntityId($EntityId=""){

		$emails 	= NULL;
       	
       	if( !empty($EntityId) ){
	
			$CI = & get_instance();  
			$emails = $CI->db->select(' ea.lower ')
			->where("l.id", $EntityId)
			->join("entity_email_address as eea", "eea.entity_id = l.id", "inner")
			->join("email_address as ea", "ea.id = eea.email_address_id", "left")	
			->get("lead as l")->result_array();
        	// echo "<pre>";print_r($emails);die;
       	}
		return $emails;
        
	}
}


// ================= These functions are used for financial's report ==================
/*
* To get branch location list
* @return 	= (array) $branchArr
*/
if( !function_exists("getBranchList") ){

	function getBranchList(){
	
		$CI 		= & get_instance(); 
		$branchArr 	= array();

		$branchArr = $CI->db->select(' l.id, l.name ', false)->where("deleted", "0")->order_by("l.name","asc")->get("office_location as l")->result_array();

        // echo "<pre>";print_r($branchArr);die;
        return $branchArr;
	}
}


/*
* To get billing entity list
* @return 	= (array) $billingEntityArr
*/
if( !function_exists("getbillingentitylist") ){

	function getbillingentitylist( $where = '' ){

		$CI 		= & get_instance(); 
		$billingEntityArr 	= array();

		$billingEntityArr = $CI->db->select(' * ', false)->where("deleted", "0")->order_by("name","asc")->get("billing_entity")->result_array();

        // echo "<pre>";print_r($billingEntityArr);die;
        return $billingEntityArr;
	}
}

/*
* To get billing entity name by id
* @return 	= (array) $billingEntityArr
*/
if( !function_exists("getbillingentityname") ){

	function getbillingentityname($id){
	
		$CI 		= & get_instance(); 
		$billingEntityArr 	= array();

		$billingEntityArr = $CI->db->select(' * ', false)->where("id", $id)->where("deleted", "0")->order_by("name","asc")->get("billing_entity")->result_array();

        // echo "<pre>";print_r($billingEntityArr);die;
        return $billingEntityArr;
	}
}

/*
* To get customer list from account table
* @return 	= (array) $customerListArr
*/
if( !function_exists("getcustomerlist") ){

	function getcustomerlist(){
	
		$CI 		= & get_instance(); 
		$customerListArr 	= array();

		$customerListArr = $CI->db->select(' * ', false)->where("deleted", "0")->order_by("name","asc")->get("account")->result_array();

		// $result = $CI->db->query("SELECT a.id, a.name, be.name, i.billfromname FROM invoice as i LEFT JOIN account as a ON i.account_id = a.id LEFT JOIN billing_entity as be ON be.id = i.billing_entity_id WHERE a.deleted = '0' AND be.deleted = '0' AND i.deleted = '0' ")->result_array();

		/*$CI->db->select('a.*, i.*');
    	$CI->db->from('account as a');
    	$CI->db->join('invoice as i', 'a.id = i.account_id');
    	$CI->db->where("a.deleted", "0");
    	// $CI->db->group_by('i.billing_entity_id');
    	$customerListArr = $CI->db->get()->result_array();*/
    	// echo $CI->db->last_query();die;
    	
        // echo "<pre>";print_r($result);die;
        return $result;
	}
}

/*
* To get invoices of billing entities
* @return 	= (array) $billingEntityArr
*/
if( !function_exists("getbillingentitiesinvoices") ){

	function getbillingentitiesinvoices($bill_entity_id, $filter_data = array()){
		
		$CI 		= & get_instance(); 
		$billingEntityInvoiceArr 	= array();
		$invoiceArr 	= array();

		// echo '<pre>';print_r($filter_data);die;

		if($CI->input->post()){
			$filter_data = $CI->input->post();
		}

		$CI->db->select('*');
    	$CI->db->from('invoice');
    	$CI->db->where("billing_entity_id", $bill_entity_id);
    	$CI->db->where("deleted", 0);
    	if($filter_data){
    		if($filter_data['invoice_start_date']){
    			$invoice_start_date = date('Y-m-d', strtotime($filter_data['invoice_start_date']));
    			$invoice_end_date = date('Y-m-d', strtotime($filter_data['invoice_end_date']));
    			
    			$CI->db->where("invoice_datefilter BETWEEN '".$invoice_start_date."' AND '".$invoice_end_date."'");
    		}
    	}
    	$billing_query=$CI->db->get();
    	// echo '<br/>'.$CI->db->last_query(); // die;
		$billingEntityInvoiceArr = $billing_query->result_array();
        // echo "<pre>";print_r($billingEntityInvoiceArr);die;
		$total_billed = 0;
		$total_credited = 0;
		$total_tds_receivable = 0;
		$total_receivable = 0;
		if( !empty($billingEntityInvoiceArr) ){
	        foreach($billingEntityInvoiceArr as $invoiceDet){
        		$total_billed += $invoiceDet['total'];
	        	
	        	$pay_details = getinvoicepayment($invoiceDet['invoiceno']);
	        	if(!empty($pay_details)){
		        	$total_credited += $pay_details['total_credited'];
		        	$total_tds_receivable += $pay_details['total_tds'];
		        	$total_receivable += $pay_details['total_receivable'];
	        	}
	        	// $total_billed += $invoiceDet['billedamount'];
	        }
    	}
        $total_receivable_amt = $total_billed - $total_credited - $total_tds_receivable;
        

        return array('total_billed_amt' => $total_billed, 'total_credited' => $total_credited, 'total_tds' => $total_tds_receivable, 'amt_receivable' => $total_receivable_amt, 'total_billed' => $total_billed, 'filteredCnt' => count($billingEntityInvoiceArr));
	}
}

/*
* To get invoices of billing entities
* @return 	= (array) $billingEntityArr
*/
if( !function_exists("getinvoicepayment") ){

	function getinvoicepayment($invoice_no='', $account_id=''){
	
		$CI 		= & get_instance(); 
		$invoicePaymentArr 	= array();

		$CI->db->select('*');
    	$CI->db->from('payments');
    	if($invoice_no){
    		$CI->db->where("invoiceno", $invoice_no);
    	}
    	if($account_id){
    		$CI->db->where("account_id", $account_id);
    	}
    	$payment_query=$CI->db->get();
    	// echo $CI->db->last_query();die;
		$invoicePaymentArr = $payment_query->result_array();
        // echo "<pre>";print_r($invoicePaymentArr);die;

		$total_billed = 0;
		$total_credited = 0;
		$total_tds_receivable = 0;
		$total_receivable = 0;
        foreach($invoicePaymentArr as $invoicePayDet){
        	$total_billed += $invoicePayDet['billedamount'];
        	$total_credited += $invoicePayDet['amountcredited'];
        	$total_tds_receivable += (float)$invoicePayDet['tds'];
        	// $total_receivable += $invoicePayDet['total_receivable'];
        }
        $total_receivable_amt = $total_billed - $total_credited - $total_tds_receivable;
        
        return array('total_credited' => $total_credited, 'total_tds' => $total_tds_receivable, 'total_receivable' => $total_receivable_amt, 'total_billed' => $total_billed);
	}
}

/*
* To get billing entity for account
* @return 	= (array) $customerListArr
*/
if( !function_exists("getcustomerwisebillingentity") ){

	function getcustomerwisebillingentity($acc_id){
	
		$CI 		= & get_instance(); 
		$invoiceDetailArr 	= array();

		$CI->db->select('a.id, a.name, COUNT(i.id) as invoice_count, i.billfromname, i.invoiceno');
    	$CI->db->from('account as a');
    	$CI->db->join('invoice as i', 'a.id = i.account_id');
    	$CI->db->where("a.id", $acc_id);
    	$invoiceDetailArr = $CI->db->get()->row_array();

		// $invoiceDetailArr = $CI->db->select(' * ', false)->where("account_id", $acc_id)->where("deleted", "0")->order_by("name","asc")->get("invoice")->result_array();
    	// echo '<br/>'.$CI->db->last_query();

		// echo "<pre>";print_r($invoiceDetailArr);die;

    	return array('billing_entity' => $invoiceDetailArr['billfromname'], 'invoice_count' => $invoiceDetailArr['invoice_count'], 'invoice_total' => $invoiceDetailArr['total'], 'invoiceno' => $invoiceDetailArr['invoiceno']);
	}
}

/*
* To get billing entity for account
* @return 	= (array) $customerListArr
*/
if( !function_exists("getcustomer_invoices") ){

	function getcustomer_invoices($acc_id, $filter_data=array()){
	
		$CI 		= & get_instance(); 
		$invoiceDetailArr 	= array();

		// $invoiceDetailArr = $CI->db->select(' *, COUNT(*) as total_invoices ', false)->where("account_id", $acc_id)->where("deleted", "0")->order_by("name","asc")->group_by("billing_entity_id")->get("invoice")->result_array();
		
		$CI->db->select('*, COUNT(*) as total_invoices', false);
    	$CI->db->from('invoice');
    	$CI->db->where("account_id", $acc_id);
    	$CI->db->where("deleted", 0);
    	if($CI->input->post()){
    		$invoice_start_date = date('Y-m-d', strtotime($CI->input->post('invoice_start_date')));
			$invoice_end_date = date('Y-m-d', strtotime($CI->input->post('invoice_end_date')));
			
			$CI->db->where("invoice_datefilter BETWEEN '".$invoice_start_date."' AND '".$invoice_end_date."'");
    	}
    	else if($filter_data){
    		if($filter_data['invoice_start_date']){
    			$invoice_start_date = date('Y-m-d', strtotime($filter_data['invoice_start_date']));
    			$invoice_end_date = date('Y-m-d', strtotime($filter_data['invoice_end_date']));
    			
    			$CI->db->where("invoice_datefilter BETWEEN '".$invoice_start_date."' AND '".$invoice_end_date."'");
    		}
    	}

    	// $CI->db->group_by("billing_entity_id");
    	$invoiceDetailArr = $CI->db->get()->result_array();

		// echo '<br/>'.$CI->db->last_query();

		// echo "<pre>";print_r($invoiceDetailArr);die;

		if( !empty($invoiceDetailArr) ){
			return $invoiceDetailArr;
		}
		return 0;
	}
}

/*
* To get differrence between dates
*/
if( !function_exists("dateDifference") ){

	function dateDifference($date_1 , $date_2 , $differenceFormat = '%a' )
	{
	    $datetime1 = date_create($date_1);
	    $datetime2 = date_create($date_2);
	   
	    $interval = date_diff($datetime1, $datetime2);
	   
	    return $interval->format($differenceFormat);
	   
	}
}

/*
* To get invoice details
*/
if( !function_exists("get_invoice_details_frombillingentity") ){

	function get_invoice_details_frombillingentity($account_id){

		$CI 		= & get_instance(); 
		$invoiceArr 	= array();
		// echo '<pre>';print_r($CI->input->post());die;
		$CI->db->select('*');
		$CI->db->from('invoice');
		if($account_id){
			$CI->db->where("account_id", $account_id);
		}

		if($CI->input->post()){
    		$invoice_start_date = date('Y-m-d', strtotime($CI->input->post('invoice_start_date')));
			$invoice_end_date = date('Y-m-d', strtotime($CI->input->post('invoice_end_date')));
			
			$CI->db->where("invoice_datefilter BETWEEN '".$invoice_start_date."' AND '".$invoice_end_date."'");
    	}

		$invoice_query=$CI->db->get();
		// echo $CI->db->last_query(); // die;
		$invoiceArr = $invoice_query->result_array();
	    // echo "<pre>";print_r($invoiceArr);die;

		$total_billed = 0;
		$total_credited = 0;
		$total_tds_receivable = 0;
		$total_receivable = 0;
		$total_invoices = 0;
		foreach($invoiceArr as $invoiceDet)
		{
			$total_billed += $invoiceDet['total'];

			$pay_details = getinvoicepayment($invoiceDet['invoiceno']);
        	if(!empty($pay_details)){
	        	$total_credited += $pay_details['total_credited'];
	        	$total_tds_receivable += $pay_details['total_tds'];
	        	$total_receivable += $pay_details['total_receivable'];
        	}

        	if($invoiceDet['duedate']!=""){
				$date1 = $invoiceDet['duedate'];
			}
			else {
				$date1 = $invoiceDet['invoicedate'];
			}
			$date2 = date("Y-m-d");
			$days = dateDifference($date2, $date1);

			// if($days === 0)
			
			$data = array("number_of_days" => $days);
			$CI->db->where('id', $invoiceDet['id']);
    		$CI->db->update('invoice', $data);
	    }

	    // echo "total_billed: ".$total_billed.'<br/>';
	    // echo "total_credited: ".$total_credited.'<br/>';
	    // echo "total_tds_receivable: ".$total_tds_receivable.'<br/>';

	    $total_receivable_amt = $total_billed - $total_credited - $total_tds_receivable;

	    return array("total_due" => $total_receivable_amt);
	}
}

if( !function_exists('in_multi_array')){

	function in_multi_array($needle, $haystack, $strict = false) {
	    foreach ($haystack as $item) {
	        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_multi_array($needle, $item, $strict))) {
	            return true;
	        }
	    }
	    return false; 
	}
}
// ================= These functions are used for financial's report ==================

