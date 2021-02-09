<?php defined('BASEPATH') OR exit('No direct script access allowed');


class FinancialModel extends CI_Model {

 	public function __construct(){
		parent::__construct();

	}

	// ================= Following all functions are used for financial's report ==================
	/*
	* To get count of invoices records of billing entity
	* @parm 	- (string) $whereData
	* @parm 	- (bool) $isCount
	* @return 	- (array) $result
	*/
	public function getbillingentityinvoices_count($billing_entity_id=''){

		$bill_entity = ($billing_entity_id) ? $billing_entity_id : $this->uri->segment(3);

		$this->db->select(" COUNT(*) as cnt ");
		$this->db->where("billing_entity_id", $bill_entity);
		$this->db->where("balance !=", 0);
		$result = $this->db->get("invoice")->row_array();
		// echo $this->db->last_query();die;

		if( !empty($result) ){
			return $result['cnt'];
		}
		return 0;
	}

	/*
	* To get invoices records of billing entity
	* @parm 	- (string) $whereData
	* @parm 	- (bool) $isCount
	* @return 	- (array) $result
	*/
	public function getbillingentityinvoices($billing_entity_id='', $limit='', $start=''){

		$bill_entity = ($billing_entity_id) ? $billing_entity_id : $this->uri->segment(3);
		// echo '<pre>';print_r($this->input->post());die;
		$this->db->select(" * ");
		$this->db->where("billing_entity_id", $bill_entity);
		// $this->db->where("balance !=", 0);
		$this->db->where("deleted", 0);
		if($this->input->post()){
			$invoice_start_date = date('Y-m-d', strtotime($this->input->post('invoice_start_date')));
			$invoice_end_date = date('Y-m-d', strtotime($this->input->post('invoice_end_date')));

			$this->db->where("invoice_datefilter BETWEEN '".$invoice_start_date."' AND '".$invoice_end_date."'");
		}
		else if($this->input->get()){
			$invoice_start_date = date('Y-m-d', strtotime($this->input->get('invoice_start_date')));
			$invoice_end_date = date('Y-m-d', strtotime($this->input->get('invoice_end_date')));

			$this->db->where("invoice_datefilter BETWEEN '".$invoice_start_date."' AND '".$invoice_end_date."'");
		}
		if($limit){
			$this->db->limit($limit, $start);
		}
		$result = $this->db->get("invoice")->result_array();
		// echo $this->db->last_query();die;

		if( !empty($result) ){
			return $result;
		}
		return 0;
	}

	/*
	* To get account details billing entity
	* @parm 	- (string) $whereData
	* @parm 	- (bool) $isCount
	* @return 	- (array) $result
	*/
	public function getaccountnameofinvoices($account_id){

		// echo '<pre>';print_r($this->input->post());die;
		$this->db->select(" * ");
		$this->db->where("id", $account_id);
		$this->db->order_by("id");
		$result = $this->db->get("account")->row_array();
		// echo $this->db->last_query();die;

		if( !empty($result) ){
			return array('name' => $result['name']);
		}
		return 0;
	}

	/*
	* To get billing entities
	* @parm 	- (string) $whereData
	* @parm 	- (bool) $isCount
	* @return 	- (array) $result
	*/
	public function getbillingentitylist($billing_entity_id=''){

		$this->db->select(" * ");
		$this->db->from("billing_entity");
		$this->db->where("deleted", 0);
		if($billing_entity_id!=""){
			$this->db->where("id", $billing_entity_id);	
		}

		if($this->input->post('searchByName')!="")
		{
			$this->db->like("name", $this->input->post('searchByName'));
		}
		
		$this->db->order_by("name","asc");
		$result = $this->db->get()->result_array();

		/*$this->db->select(" b.name as billing_entity_name,b.id as billing_entity_id,b.*,i.*, SUM(i.total) as total");
		$this->db->from("billing_entity as b");
		$this->db->join("invoice as i", 'i.billing_entity_id = b.id', 'left');
		$this->db->where("b.deleted", 0);
		// $this->db->where("i.balance !=", 0);
		$this->db->group_by("b.id");
		$this->db->order_by("b.name","asc");
		$result = $this->db->get()->result_array();*/
		
		// echo $this->db->last_query();die;
		
		if( !empty($result) ){
			return $result;
		}
		return 0;
	}

	/*
	* To get billing entities
	* @parm 	- (string) $whereData
	* @parm 	- (bool) $isCount
	* @return 	- (array) $result
	*/
	public function getcustomerlist($filter_data)
	{
		// $customerListArr = $this->db->select(' * ', false)->where("deleted", "0")->order_by("name","asc")->get("account")->result_array();
		$customerListArr = $this->db->select(' * ', false)->order_by("name","asc")->get("account")->result_array();

		$result = array();
		$cnt1 = 0;
		$cnt = 0;

		$total_billed = 0;
		$total_credited = 0;
		$total_tds_receivable = 0;
		$total_receivable = 0;

		foreach($customerListArr as $key => $val)
		{
			$cust_invoices = $this->getcustomer_invoices($val['id'], $filter_data);
			// echo '<br/>'.$val['id'].' === <pre>'.print_r($cust_invoices);
			/*if(count($cust_invoices) > 1)
			{*/	
				foreach ($cust_invoices as $key1 => $value1)
				{
					$result[$cnt]['id'] = $val['id'];
					$result[$cnt]['account_name'] = $val['name'];
					$result[$cnt]['billing_entity_id'] = $value1['billing_entity_id'];
					$result[$cnt]['billing_entity_name'] = $value1['billing_entity_name'];
					$result[$cnt]['total_invoices'] = $value1['total_invoices'];

					// $total_billed += $value1['total_amt'];

					$result[$cnt]['total'] = $value1['total_amt'];

					$pay_details = $this->getinvoicepayment($value1['invoiceno'], $val['id'], $total_billed);
					
					if(!empty($pay_details)){
						$result[$cnt]['total_credited'] = $value1['total_amt'] - $value1['total_balance'];
			        	$result[$cnt]['total_tds'] = $pay_details['total_tds'];
					}

	        		$result[$cnt]['total_receivable'] = $value1['total_balance'];// - $pay_details['total_credited'] - $pay_details['total_tds'];

	        		if($result[$cnt]['total_receivable'] > 0){
	        			$result[$cnt]['status'] = 'Due';
	        		} else {
	        			$result[$cnt]['status'] = 'Paid';
	        		}

					$cnt++;
				}

				// $result[$cnt1]['total'] = $total_billed;
				// $cnt1++;
			/*}
			else
			{
				$result[$cnt]['id'] 				= $val['id'];
				$result[$cnt]['account_name'] 		= $val['name'];
				$result[$cnt]['billing_entity_id'] 	= '';
				$result[$cnt]['billing_entity_name']= '';
				$result[$cnt]['total_invoices'] 	= 0;
				$result[$cnt]['total_credited'] 	= 0;
				$result[$cnt]['total_tds'] 			= 0;
				$result[$cnt]['total_receivable'] 	= 0;

				$cnt++;
			}*/
		}
		// echo '<pre>';print_r($result);die;
		// echo $this->db->last_query();die;
		// die;
		if( !empty($result) ){
			// return $this->getAllBillingEntities($result, $customerListArr);
			return $result;
		}
		return 0;
	}

	public function getAllBillingEntities($allBillingInvoice, $customerListArr)
	{

		$finalArr = array();
		
		$billinList = $this->db->select(" b.id, b.name ")->from("billing_entity as b")->where("b.deleted", 0)->order_by("b.name","asc")->get()->result_array();

		/*foreach($billing_result as $key => $val)
		{
			$finalArr[$key]['billing_entity_name'] = $val['name'];
		}*/

		$tempCount = 0;

		/*if( !empty($allBillingInvoice) ) {

			foreach($allBillingInvoice as $key => $val)
			{

				if( !empty($billinList) && in_array( $val["billing_entity_id"] , $billinList) ) {

					$finalArr[$tempCount]['billing_entity_id'] 	= $val['billing_entity_id'];
					$finalArr[$tempCount]['account_name'] 		= $val['account_name'];
					$finalArr[$tempCount]['total_invoices'] 	= $val['total_invoices'];
					$finalArr[$tempCount]['total_credited'] 	= $val['total_credited'];
					$finalArr[$tempCount]['total_tds'] 			= $val['total_tds'];
					$finalArr[$tempCount]['total_receivable'] 	= $val['total_receivable'];
					$finalArr[$tempCount]['status'] 			= $val['status'];
				}else{

					$finalArr[$tempCount]['billing_entity_id'] 	= "";
					$finalArr[$tempCount]['account_name'] 		= "";
					$finalArr[$tempCount]['total_invoices'] 	= "";
					$finalArr[$tempCount]['total_credited'] 	= "";
					$finalArr[$tempCount]['total_tds'] 			= "";
					$finalArr[$tempCount]['total_receivable'] 	= "";
					$finalArr[$tempCount]['status'] 			= "";
				}	

				$tempCount++;
			}

		}*/
		// echo '<pre>';print_r($billinList);
		// echo '<pre>';print_r($customerListArr);
		if( !empty($billinList) ) {

			foreach($billinList as $key => $val)
			{
				if( in_multi_array($val["id"], $allBillingInvoice) )
				{
					/// check whether key exists or not
					foreach ($allBillingInvoice as $indexKey => $indexVal)
					{
			       		if ($indexVal['billing_entity_id'] === $val['id'])
			       		{
			       			$finalArr[$tempCount]['billing_entity_id'] 	= $allBillingInvoice[$indexKey]['billing_entity_id'];
							$finalArr[$tempCount]['account_name'] 		= $allBillingInvoice[$indexKey]['account_name'];
							$finalArr[$tempCount]['total_invoices'] 	= $allBillingInvoice[$indexKey]['total_invoices'];
							$finalArr[$tempCount]['total_credited'] 	= $allBillingInvoice[$indexKey]['total_credited'];
							$finalArr[$tempCount]['total_tds'] 			= $allBillingInvoice[$indexKey]['total_tds'];
							$finalArr[$tempCount]['total_receivable'] 	= $allBillingInvoice[$indexKey]['total_receivable'];
							$finalArr[$tempCount]['status'] 			= $allBillingInvoice[$indexKey]['status'];
				       	}
				   	}
				}
				else{
					foreach($customerListArr as $keys => $vals)
					{
						if( in_multi_array($val["id"], $allBillingInvoice) )
						{	
							$finalArr[$tempCount]['account_name'] 		= $vals['name'];
							$finalArr[$tempCount]['billing_entity_id'] 	= "";
							$finalArr[$tempCount]['total_invoices'] 	= "";
							$finalArr[$tempCount]['total_credited'] 	= "";
							$finalArr[$tempCount]['total_tds'] 			= "";
							$finalArr[$tempCount]['total_receivable'] 	= "";
							$finalArr[$tempCount]['status'] 			= "";
						}
					} 
				}	

				$tempCount++;
			}

		}
		// die;	
		// echo '<pre>';print_r($billinList);
		// echo '<pre>';print_r($finalArr);die;
		if(!empty($finalArr)){
			return $finalArr;
		}
		return 0;
	}

	public function getcustomer_invoices($acc_id, $filter_data=array())
	{	
		// echo 'Inside getcustomer_invoices() <br/><pre>';print_r($filter_data);die;
		$this->db->select('COUNT(i.id) as total_invoices, SUM(i.total) as total_amt, SUM(i.balance) as total_balance, b.name as billing_entity_name, b.id as billing_entity_id, i.id, i.invoiceno, i.billing_entity_id, i.total');
		$this->db->from('invoice as i');
    	$this->db->join('billing_entity as b', 'b.id = i.billing_entity_id', 'left');
    	$this->db->where("i.account_id", $acc_id);
    	$this->db->where("i.deleted", 0);
    	// $this->db->where("b.deleted", 0);


    	/*if($this->input->post()){
    		$invoice_start_date = date('Y-m-d', strtotime($this->input->post('invoice_start_date')));
			$invoice_end_date = date('Y-m-d', strtotime($this->input->post('invoice_end_date')));
			
			$this->db->where("i.invoice_datefilter BETWEEN '".$invoice_start_date."' AND '".$invoice_end_date."'");
    	} else */
    	if($filter_data)
    	{
    		if($filter_data['invoice_start_date'])
    		{	
    			$invoice_start_date = date('Y-m-d', strtotime($filter_data['invoice_start_date']));
    			$invoice_end_date = date('Y-m-d', strtotime($filter_data['invoice_end_date']));
    			
    			$this->db->where("i.invoice_datefilter BETWEEN '".$invoice_start_date."' AND '".$invoice_end_date."'");
    		}
    	}
    	$this->db->group_by("i.billing_entity_id");
    	// echo $this->db->last_query();echo '<br/><br/>';
    	// $CI->db->group_by("billing_entity_id");
    	$invoiceDetailArr = $this->db->get()->result_array();
    	// echo '<pre>';print_r($invoiceDetailArr);die;
    	if( !empty($invoiceDetailArr) ){
			return $invoiceDetailArr;
		}
		return 0;
	}

	public function getinvoicepayment($invoice_no='', $account_id='', $total_billed=''){
	
		$this->db->select('*');
    	$this->db->from('payments');
    	/*if($invoice_no){
    		$this->db->where("invoiceno", $invoice_no);
    	}
    	if($account_id){*/
    		$this->db->where("account_id", $account_id);
    	// }
    	$payment_query=$this->db->get();
    	// echo $this->db->last_query(); echo '<br/>';// die;
		$invoicePaymentArr = $payment_query->result_array();
        // echo "<pre>";print_r($invoicePaymentArr);die;

		$total_billed = 0;
		$total_credited = 0;
		$total_tds_receivable = 0;
		$total_receivable = 0;
        foreach($invoicePaymentArr as $invoicePayDet)
        {
        	$total_billed += $invoicePayDet['billedamount'];
        	$total_credited += $invoicePayDet['amountcredited'];
        	$total_tds_receivable += (float)$invoicePayDet['tds'];
        	//  $total_receivable += $invoicePayDet['total_receivable'];
        }
        $total_receivable_amt = $total_billed - $total_credited - $total_tds_receivable;

        // echo 'account_id: '.$account_id.' == '.'total_billed: '.$total_billed.' == total_credited: '.$total_credited.' == total_receivable_amt: '.$total_receivable_amt.'<br/>';

        return array('total_credited' => $total_credited, 'total_tds' => $total_tds_receivable, 'total_receivable' => $total_receivable_amt, 'total_billed' => $total_billed);
	}

	public function getbillingentitydetails(){
		
		$filter_data = $this->input->post();

		$this->db->select(" * ");
		$this->db->from("invoice");
		$this->db->where("deleted", 0);
		if($filter_data['invoice_start_date']){
			$this->db->where("invoice_datefilter BETWEEN '".strtotime($filter_data['invoice_start_date'])."' AND '".strtotime($filter_data['invoice_end_date'])."'");
		}
		$result = $this->db->get()->result_array();
		// echo $this->db->last_query();die;

		if( !empty($result) ){
			return $result;
		}
		return 0;
	}


	/*
	* To get invoice details
	* @parm 	- (string) $whereData
	* @parm 	- (bool) $isCount
	* @return 	- (array) $result
	*/
	public function getinvoices(){

		$this->db->select(" * ");
		$this->db->where("deleted", 0);
		$this->db->group_by("account_id");
		$result = $this->db->get("invoice")->result_array();
		// echo $this->db->last_query();die;

		if( !empty($result) ){
			return $result;
		}
		return 0;
	}

	/*
	* To get display details
	* @parm 	- (string) $whereData
	* @parm 	- (bool) $isCount
	* @return 	- (array) $result
	*/
	public function displayAcc()
	{
		$accDetails =	$this->getAccount();
		$accDues = array();

		if( !empty($accDetails) )
		{
			foreach($accDetails as $key => $val)
			{
				get_invoice_details_frombillingentity($val["id"]);

				$accDues = $this->getduesAmt($val["id"]);

				$accDetails[$key]['notoverdue_balance'] = $accDues['notoverdue_balance'];
				$accDetails[$key]['notoverdue_invoice_count'] = $accDues['notoverdue_invoice_count'];
				$accDetails[$key]['thirtyorless_balance'] = $accDues['thirtyorless_balance'];
				$accDetails[$key]['thirtyorless_invoice_count'] = $accDues['thirtyorless_invoice_count'];
				$accDetails[$key]['thirtyonetosixty_balance'] = $accDues['thirtyonetosixty_balance'];
				$accDetails[$key]['thirtyonetosixty_invoice_count'] = $accDues['thirtyonetosixty_invoice_count'];
				$accDetails[$key]['sixtyonetoninety_balance'] = $accDues['sixtyonetoninety_balance'];
				$accDetails[$key]['sixtyonetoninety_invoice_count'] = $accDues['sixtyonetoninety_invoice_count'];
				$accDetails[$key]['ninetyoneormore_balance'] = $accDues['ninetyoneormore_balance'];
				$accDetails[$key]['ninetyoneormore_invoice_count'] = $accDues['ninetyoneormore_invoice_count'];
				$accDetails[$key]['totalunpaid'] = $accDues['totalunpaid'];
			}
		}

		// echo '<pre>';print_r($accDetails);die;
		// echo '<pre>';print_r($accDues);die;
		if( !empty($accDetails) ){
			return $accDetails;
		}
		return 0;
	}

	function getAccount(){
		
		$accArr = array();

		$this->db->select(" * ");
		// $this->db->where("deleted", 0);
		$accArr = $this->db->get("account")->result_array();
		// echo $this->db->last_query();die;

		if( !empty($accArr) ){
			return $accArr;
		}
		return 0;
	}

	// function getduesAmt($accArr = array())
	function getduesAmt($acc_id)
	{
		$not_yet_overdue = array();	

		// if(!empty($accArr)){
			$not_overdue_balance = 0; $not_overdue_invoice_count = 0;
			$thirtyorless_balance = 0; $thirtyorless_invoice_count = 0;
			$thirtyonetosixty_balance = 0; $thirtyonetosixty_invoice_count = 0;
			$sixtyonetoninety_balance = 0; $sixtyonetoninety_invoice_count = 0;
			$ninetyoneormore_balance = 0; $ninetyoneormore_invoice_count = 0;

			$total_dues = 0;
			// foreach( $accArr as $key => $val ) {
				
				$not_yet_overdue = $this->get_not_yet_overdue_invoices_details($acc_id);
				if( $not_yet_overdue )
				{
					$not_overdue_balance = $not_yet_overdue['balance'];
					$not_overdue_invoice_count = $not_yet_overdue['invoice_cnt'];
				}

				$thirty_or_less = $this->get_thirty_or_less_invoices_details($acc_id);
				if( $thirty_or_less )
				{
					$thirtyorless_balance = $thirty_or_less['balance'];
					$thirtyorless_invoice_count = $thirty_or_less['invoice_cnt'];
				}

				$thirtyone_to_sixty = $this->get_thirtyone_to_sixty_invoices_details($acc_id);
				if( $thirtyone_to_sixty )
				{
					$thirtyonetosixty_balance = $thirtyone_to_sixty['balance'];
					$thirtyonetosixty_invoice_count = $thirtyone_to_sixty['invoice_cnt'];
				}

				$sixtyone_to_ninety = $this->get_sixtyone_to_ninety_invoices_details($acc_id);
				if( $sixtyone_to_ninety )
				{
					$sixtyonetoninety_balance = $sixtyone_to_ninety['balance'];
					$sixtyonetoninety_invoice_count = $sixtyone_to_ninety['invoice_cnt'];
				}

				$ninetyone_or_more = $this->get_ninetyone_or_more_invoices_details($acc_id);
				if( $ninetyone_or_more )
				{
					$ninetyoneormore_balance = $ninetyone_or_more['balance'];
					$ninetyoneormore_invoice_count = $ninetyone_or_more['invoice_cnt'];
				}

				$total_dues = $not_overdue_balance + $thirtyorless_balance + $thirtyonetosixty_balance + $sixtyonetoninety_balance + $ninetyoneormore_balance;
			// }

			return array("notoverdue_balance" => $not_overdue_balance,
						 "notoverdue_invoice_count" => $not_overdue_invoice_count,
						 "thirtyorless_balance" => $thirtyorless_balance,
						 "thirtyorless_invoice_count" => $thirtyorless_invoice_count,
						 "thirtyonetosixty_balance" => $thirtyonetosixty_balance,
						 "thirtyonetosixty_invoice_count" => $thirtyonetosixty_invoice_count,
						 "sixtyonetoninety_balance" => $sixtyonetoninety_balance,
						 "sixtyonetoninety_invoice_count" => $sixtyonetoninety_invoice_count,
						 "ninetyoneormore_balance" => $ninetyoneormore_balance,
						 "ninetyoneormore_invoice_count" => $ninetyoneormore_invoice_count,
						 "totalunpaid" => $total_dues);
		// }
	}

	function get_not_yet_overdue_invoices_details($account_id){
		
		if($this->input->post())
		{
			$invoice_start_date = date('Y-m-d', strtotime($this->input->post('invoice_start_date')));
			$invoice_end_date = date('Y-m-d', strtotime($this->input->post('invoice_end_date')));
			
			$date_filter = " and invoice_datefilter BETWEEN '".$invoice_start_date."' AND '".$invoice_end_date."'";
			// $filter = 
		}
		else {
			$filter_data['invoice_start_date'] = date("Y-m-d", strtotime("-6 days"));
			$filter_data['invoice_end_date'] = date("Y-m-d");

			$date_filter = " and invoice_datefilter  BETWEEN '".$filter_data['invoice_start_date']."' AND '".$filter_data['invoice_end_date']."'";
		}

		$query = $this->db->query("select case when duedate!='' then duedate else invoicedate end as invdate, invoice.* from invoice where deleted = '0' and account_id = '".$account_id."' and number_of_days = '0'");
		$result = $query->result_array();

		// echo $this->db->last_query();echo '<br/>';
		// echo '<pre>';print_r($result);die;
		if( !empty($result) ){
			
			$balance = 0;
			foreach($result as $res){
				$balance += $res['balance'];
			}
			return array("balance" => $balance, "invoice_cnt" => count($result));
		}
		return 0;
	}

	function get_thirty_or_less_invoices_details($account_id){
		
		if($this->input->post()){
			$invoice_start_date = date('Y-m-d', strtotime($this->input->post('invoice_start_date')));
			$invoice_end_date = date('Y-m-d', strtotime($this->input->post('invoice_end_date')));
			
			$date_filter = " and invoice_datefilter BETWEEN '".$invoice_start_date."' AND '".$invoice_end_date."'";
			// $filter = 
		}
		else {
			$filter_data['invoice_start_date'] = date("Y-m-d", strtotime("-6 days"));
			$filter_data['invoice_end_date'] = date("Y-m-d");

			$date_filter = " and invoice_datefilter  BETWEEN '".$filter_data['invoice_start_date']."' AND '".$filter_data['invoice_end_date']."'";
		}

		$query = $this->db->query("select case when duedate!='' then duedate else invoicedate end as invdate, invoice.* from invoice where deleted = '0' and account_id = '".$account_id."' and number_of_days >= '1' and number_of_days <= '30'".$date_filter);
		$result = $query->result_array();
		// echo $this->db->last_query();echo '<br/>';
		// echo '<pre>';print_r($result);die;
		if( !empty($result) ){
			
			$balance = 0;
			foreach($result as $res){
				$balance += $res['balance'];
			}
			return array("balance" => $balance, "invoice_cnt" => count($result));
		}
		return 0;
	}

	function get_thirtyone_to_sixty_invoices_details($account_id){
		
		if($this->input->post()){
			$invoice_start_date = date('Y-m-d', strtotime($this->input->post('invoice_start_date')));
			$invoice_end_date = date('Y-m-d', strtotime($this->input->post('invoice_end_date')));
			
			$date_filter = " and invoice_datefilter BETWEEN '".$invoice_start_date."' AND '".$invoice_end_date."'";
			// $filter = 
		}
		else {
			$filter_data['invoice_start_date'] = date("Y-m-d", strtotime("-6 days"));
			$filter_data['invoice_end_date'] = date("Y-m-d");

			$date_filter = " and invoice_datefilter  BETWEEN '".$filter_data['invoice_start_date']."' AND '".$filter_data['invoice_end_date']."'";
		}

		$query = $this->db->query("select case when duedate!='' then duedate else invoicedate end as invdate, invoice.* from invoice where deleted = '0' and account_id = '".$account_id."' and number_of_days >= '31' and  number_of_days <= '60'".$date_filter);
		$result = $query->result_array();
		// echo $this->db->last_query();echo '<br/>';
		// echo '<pre>';print_r($result);die;
		if( !empty($result) ){
			
			$balance = 0;
			foreach($result as $res){
				$balance += $res['balance'];
			}
			return array("balance" => $balance, "invoice_cnt" => count($result));
		}
		return 0;
	}

	function get_sixtyone_to_ninety_invoices_details($account_id){
		
		if($this->input->post()){
			$invoice_start_date = date('Y-m-d', strtotime($this->input->post('invoice_start_date')));
			$invoice_end_date = date('Y-m-d', strtotime($this->input->post('invoice_end_date')));
			
			$date_filter = " and invoice_datefilter BETWEEN '".$invoice_start_date."' AND '".$invoice_end_date."'";
			// $filter = 
		}
		else {
			$filter_data['invoice_start_date'] = date("Y-m-d", strtotime("-6 days"));
			$filter_data['invoice_end_date'] = date("Y-m-d");

			$date_filter = " and invoice_datefilter  BETWEEN '".$filter_data['invoice_start_date']."' AND '".$filter_data['invoice_end_date']."'";
		}

		$query = $this->db->query("select case when duedate!='' then duedate else invoicedate end as invdate, invoice.* from invoice where deleted = '0' and account_id = '".$account_id."' and number_of_days >= '61' and  number_of_days <= '90'".$date_filter);
		$result = $query->result_array();
		// echo $this->db->last_query();echo '<br/>';
		// echo '<pre>';print_r($result);die;
		if( !empty($result) ){
			
			$balance = 0;
			foreach($result as $res){
				$balance += $res['balance'];
			}
			return array("balance" => $balance, "invoice_cnt" => count($result));
		}
		return 0;
	}

	function get_ninetyone_or_more_invoices_details($account_id){
		
		if($this->input->post()){
			$invoice_start_date = date('Y-m-d', strtotime($this->input->post('invoice_start_date')));
			$invoice_end_date = date('Y-m-d', strtotime($this->input->post('invoice_end_date')));
			
			$date_filter = " and invoice_datefilter BETWEEN '".$invoice_start_date."' AND '".$invoice_end_date."'";
			// $filter = 
		}
		else {
			$filter_data['invoice_start_date'] = date("Y-m-d", strtotime("-6 days"));
			$filter_data['invoice_end_date'] = date("Y-m-d");

			$date_filter = " and invoice_datefilter  BETWEEN '".$filter_data['invoice_start_date']."' AND '".$filter_data['invoice_end_date']."'";
		}

		$query = $this->db->query("select case when duedate!='' then duedate else invoicedate end as invdate, invoice.* from invoice where deleted = '0' and account_id = '".$account_id."' and number_of_days >= '91'".$date_filter);
		$result = $query->result_array();
		// echo $this->db->last_query();echo '<br/>';
		// echo '<pre>';print_r($result);die;
		if( !empty($result) ){
			
			$balance = 0;
			foreach($result as $res){
				$balance += $res['balance'];
			}
			return array("balance" => $balance, "invoice_cnt" => count($result));
		}
		return 0;
	}

	public function getinvoicedetails()
	{
		$invoiceArr = array();

		$this->db->select(" * ");
		$this->db->where("deleted", 0);
		$this->db->where("id", $this->input->get('dataId'));
		$invoiceArr = $this->db->get("invoice")->row_array();
		// echo $this->db->last_query();die;

		if( !empty($invoiceArr) ){
			return $invoiceArr;
		}
		return 0;
	}

	public function getpaymentdetails($invoice_no)
	{
		$paymentArr = array();

		$this->db->select(" * ");
		$this->db->where("deleted", 0);
		$this->db->where("invoiceno", $invoice_no);
		$paymentArr = $this->db->get("payments")->result_array();
		// echo $this->db->last_query();die;

		if( !empty($paymentArr) ){
			return $paymentArr;
		}
		return 0;
	}
}

