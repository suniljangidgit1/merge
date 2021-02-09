<?php defined('BASEPATH') OR exit('No direct script access allowed');

session_start();

class Financial extends CI_Controller {


	public function __construct(){
		parent::__construct();
		
		if( empty($_SESSION['Login']) ){
  	 		echo "<script>window.location='http://".$_SERVER["HTTP_HOST"]."';</script>";
  	 	}
  	 	$this->Login = $_SESSION['Login']; // $_SESSION['Login']

		$this->load->model("FinancialModel");

	}
	

	/*
	* To display billing entity wise report
	* @parm 	- none
	* @return 	- none
	*/
	public function index($isAjaxRequest=''){

		$data 		= array();
		$response 	= array();
		$whereArr 	= array();
		$filterType = "";

		// check user is admin 
		$sessId 	= getUserIdByUsername($this->Login);
		$userRole 	= getUserRole($sessId);
		
		if( !empty($userRole) ){
			$data['filterData']	= $this->input->post();
		}

		// get billing entities list
		// $data['billEntityArr'] 	= getbillingentitylist();
		$data['billEntityArr'] 	= $this->FinancialModel->getbillingentitylist();

		if($this->input->post()){
			$filter_data = $this->input->post();
		}
		else {
			$filter_data['invoice_start_date'] = date("Y-m-d", strtotime("-6 days"));
			$filter_data['invoice_end_date'] = date("Y-m-d");

			$data['filterData'] = array("invoice_start_date" => $filter_data['invoice_start_date'], "invoice_end_date" => $filter_data['invoice_end_date']);
		}

		// if( empty($isAjaxRequest) ){
			$data['page_title'] = "Billing Entity wise Report";
			$hData['title'] 	= "Billing Entity wise Report";
			$sData 				= array();
			$fData 				= array();
			
			$sData['activeMenu']= 3;
			$this->load->view( "includes/header", $hData );
			$this->load->view( "includes/sidebar", $sData );
			// if($data) { echo '<pre>';print_r($data);die; }
			$this->load->view( "financial_report/billing_entity_report", $data );
			$this->load->view( "includes/footer", $fData );
		// }
		// else {
		// 	$response = array();
		// 	$trHTML = '';
		// 	$total_billed = 0;
		// 	$total_credited = 0;
		// 	$total_tds_receivable = 0;
		// 	$total_receivable = 0;
		// 	if(!empty($isAjaxRequest))
		// 	{
		// 		if(!empty($data['billEntityArr'])){
		// 			foreach($data['billEntityArr'] as $key => $val){
		// 				$p = getbillingentitiesinvoices($val['id'], $this->input->post());
		// 				// $response["name"][] = $val['name'];
		// 				if($p["amt_receivable"] !=0){
		// 					$total_credited += $pay_details['total_credited'];
		// 		        	$total_tds_receivable += $pay_details['total_tds'];
		// 		        	$total_receivable += $pay_details['total_receivable'];
		// 				}

		// 				$response[] = array("name" => $val['name'],
		// 									"total_billed_amt" => $p['total_billed_amt'],
		// 									"total_credited" => $p['total_credited'],
		// 									"total_tds" => $p['total_tds'],
		// 									"amt_receivable" => $p['amt_receivable'],
		// 									"total_billed" => $p['total_billed_amt']);
		// 			}
		// 		}

		// 		echo json_encode($response);return true;die;


		// 		$trHTML .= '
	 //       				<thead class="schedularth">
	 //               			<tr>
	 //               				<th><span><b>Billing Entity name</b></span></th>
	 //               				<th><span><b>Total billed amount</b></span></th>
	 //               				<th><span><b>Received amount</b></span></th>
	 //               				<th><span><b>TDS Receivable</b></span></th>
	 //               				<th><span><b>Amount Receivable</b></span></th>
	 //               				<th><span><b>See Details</b></span></th>
	 //               			</tr>
	 //               		</thead>
	 //               		<tbody>';
		// 		$filteredCnt = 0;
		// 		if(!empty($data['billEntityArr'])){
		// 			foreach($data['billEntityArr'] as $key => $val){
		// 				$p = getbillingentitiesinvoices($val['id'], $filter_data);
		// 				$trHTML .='
  //      							<tr class="list-row">
		//        						<td class="cell">
		//        							<a href="http://'.$_SERVER['SERVER_NAME'].'/#BillingEntity/view/'.$val['id'].'">'.$val['name'].'</a>
		//        						</td>';

		// 					if($p["amt_receivable"] !=0){
		//        					$trHTML .= 
		//        						'<td class="cell">'.'₹ '.number_format($p['total_billed_amt'],2).'</td>
		//                				<td class="cell">'.'₹ '.number_format($p['total_credited'],2).'</td>
		//                				<td class="cell">'.'₹ '.number_format($p['total_tds'],2).'</td>
		//                				<td class="cell">'.'₹ '.number_format($p['amt_receivable'],2).'</td>
		//                				<td>
		//                					<a href="#" class="view_details" data-name="'.$val['name'].'" data-id="'.$val['id'].'" data-startDate="'.$this->input->post("invoice_start_date").'" data-endDate="'.$this->input->post("invoice_end_date").'">View</a>
		//                				</td>';
	 //   						}
	 //   						else {
	 //   							$trHTML .= 
		//        						'<td class="cell">₹ 0</td>
		//                				<td class="cell">₹ 0</td>
		//                				<td class="cell">₹ 0</td>
		//                				<td class="cell">₹ 0</td>
		//                				<td></td>';
	 //   						}
	 //   						$trHTML .= '</tr>';
		// 			}
		// 		}
		// 		else {
		// 			$trHTML .= '<tbody>
  //      							<tr class="list-row">
  //      							<td></td>
  //      							</tr>
	 //       					</tbody>';
		// 		}
		// 		/*$trHTML .= '
	 //               <script>
	 //               $(".view_details").click( function(e){
		// 				e.preventDefault();
		// 				var dataId = $(this).data("id");
		// 				$.ajax({
		// 			        type: "POST",
		// 			        url: "'.base_url().'financial/getbilling_entity_invoices/"+dataId,
		// 			        data: { "invoice_start_date" : $(this).data("startdate"), "invoice_end_date" : $(this).data("enddate")},
		// 			        success: function (data){
		// 			            $("#addBillingEnitityInvoiceModal .modal-body").html(data);
		// 						$("#addBillingEnitityInvoiceModal").modal("show");
		// 			        }
		// 			    });
		// 			});
		// 			</script>';*/ 
		// 	}
		// 	// echo $trHTML;die; 
		// 	$response['html'] = $trHTML;
		// 	echo json_encode($response);
		// 	return true;
		// 	die;
		// }
	}

	public function get_records_billing_entitywise()
	{
		$data['billEntityArr'] 	= $this->FinancialModel->getbillingentitylist();
		$response = array();
		$trHTML = '';
		$total_billed = 0;
		$total_credited = 0;
		$total_tds_receivable = 0;
		$total_receivable = 0;
		if(!empty($data['billEntityArr']))
		{
			foreach($data['billEntityArr'] as $key => $val)
			{
				$p = getbillingentitiesinvoices($val['id'], $this->input->post());
				if($p["amt_receivable"] !=0)
				{
					$total_credited += $p['total_credited'];
		        	$total_tds_receivable += $p['total_tds'];
		        	// $total_receivable += $pay_details['total_receivable'];
				}

				if($p['amt_receivable']!=0){
					$viewOption = '<a href="#" class="view_details" data-name="'.$val['name'].'" data-id="'.$val['id'].'" data-startDate="'.$this->input->post("invoice_start_date").'" data-endDate="'.$this->input->post("invoice_end_date").'">View</a>';
				}
				else {
					$viewOption = '';
				}

				/*$name = '<a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/#BillingEntity/view/<?php echo $billEntArr['id'];?>"><?php echo $billEntArr['name'];?></a>';*/
				$name = '<a href="http://'.$_SERVER['SERVER_NAME'].'/#BillingEntity/view/'.$val['id'].'">'.$val['name'].'</a>';

				$response[] = array("name" => $name,
									"total_billed_amt" => number_format($p['total_billed_amt'],2),
									"total_credited" => number_format($p['total_credited'],2),
									"total_tds" => number_format($p['total_tds'],2),
									"amt_receivable" => number_format($p['amt_receivable'],2),
									"total_billed" => number_format($p['total_billed_amt'],2),
									"view" => $viewOption);
			}
		}
		echo json_encode($response);
	}

	/*
	* To display customer wise report
	* @parm 	- none
	* @return 	- none
	*/
	public function customerwise($isAjaxRequest='')
	{
		$data 		= array();
		$response 	= array();
		$whereArr 	= array();
		$filterType = "";

		// check user is admin 
		$sessId 	= getUserIdByUsername($this->Login);
		$userRole 	= getUserRole($sessId);
		
		if( !empty($userRole) ){ 
			$data['filterData']	= $this->input->post();
		}

		// get billing entities list
		// $data['customerArr']= $this->FinancialModel->getcustomerlist();

		if($this->input->post()){
			$filter_data = $this->input->post();
		}
		else {
			$filter_data['invoice_start_date'] = date("Y-m-d", strtotime("-6 days"));
			$filter_data['invoice_end_date'] = date("Y-m-d");

			$data['filterData'] = $filter_data = array("invoice_start_date" => $filter_data['invoice_start_date'], "invoice_end_date" => $filter_data['invoice_end_date']);
		}
		$data['customerArr']= $this->FinancialModel->getcustomerlist($filter_data);
		
		// if( empty($isAjaxRequest) ){
			// echo '<pre>';print_r($data);die;
			// $data['customerArr'] 	= getcustomerwisebillingentity();

			$data['page_title'] = "Customer wise Report";
			$hData['title'] 	= "Customer wise Report";
			$sData 				= array();
			$fData 				= array();

			$sData['activeMenu']= 3;
			$this->load->view( "includes/header", $hData );
			$this->load->view( "includes/sidebar", $sData );
			$this->load->view( "financial_report/customer_wise_report", $data );
			$this->load->view( "includes/footer", $fData );
		// }
		// else{
		// 	$response = array();
		// 	$trHTML = '';
		// 	// echo $isAjaxRequest;die;
		// 	if(!empty($isAjaxRequest)){
				// echo '<pre>';print_r($data['customerArr']);die;
				/*$trHTML .= '<table id="customer_wise_report" class="table">
       				<thead class="schedularth">
               			<tr>
               				<th><span><b>spanilled Entity</b></span></th>
               				<th><span><b>spanilling Entity</b></span></th>
               				<th><span><b>Total No of invoices raised</b></span></th>
               				<th><span><b>Total invoices value</b></span></th>
               				<th><span><b>Total payment received</b></span></th>
               				<th><span><b>Total TDS Deducted</b></span></th>
               				<th><span><b>Total amount receivable</b></span></th>
               				<th><span><b>Status</b></span></th>
               			</tr>
               		</thead>
               		<tbody>';
               		// echo '<pre>';print_r($data['customerArr']);die;
               		if(!empty($data['customerArr']))
               		{
	               		if(count($data['customerArr']) > 0)
	   					{
		               		foreach($data['customerArr'] as $custArr)
		       				{
	       						$total = ($custArr['total']) ? number_format($custArr['total'],2) : 0;
	       						$total_credited = ($custArr['total_credited']) ? number_format($custArr['total_credited'],2) : 0;
	       						$total_tds = ($custArr['total_tds']) ? number_format($custArr['total_tds'],2) : 0;
	       						$total_receivable = ($custArr['total_receivable']) ? number_format($custArr['total_receivable'],2) : 0;

	       						$trHTML .= '<tr>
	       							<td>'.$custArr['account_name'].'</td>
	       							<td>'.$custArr['billing_entity_name'].'</td>
	       							<td>'.$custArr['total_invoices'].'</td>
	       							<td>₹ '.$total.'</td>
	       							<td>₹ '.$total_credited.'</td>
	       							<td>₹ '.$total_tds.'</td>
	       							<td>₹ '.$total_receivable.'</td>
	       							<td>'.$custArr['status'].'</td>
	       						</tr>';
	       					}
	       				}
	   					else {
								$trHTML .= '<tr>
		   							<td class="cell">---</td>
		   							<td class="cell">₹ 0</td>
		   							<td class="cell">₹ 0</td>
		   							<td class="cell">₹ 0</td>
		   							<td class="cell">₹ 0</td>
		   							<td class="cell">₹ 0</td>
		   							<td class="cell">---</td>
								</tr>';
	   					}
   					}*/
				/*foreach($data['customerArr'] as $key => $val){
					$invoice_array = getcustomer_invoices($val['id'], $filter_data);

               		if(count($invoice_array) >= 1){
               			foreach($invoice_array as $invoices){
               				$invoice_details = getbillingentitiesinvoices($invoices['billing_entity_id']);

							$amt_receivable = $invoice_details['total_billed_amt'] - $invoice_details['total_credited'] - $invoice_details['total_tds'];

							if($amt_receivable > 0){
								$status = "Due";
							}
							else {
								$status = "Paid";
							}
							$trHTML .= '<tr>
								<td class="cell">
	       							<a href="http://'.$_SERVER['SERVER_NAME'].'/#Account/view/'.$val['id'].'">'.$val['name'].'</a>
	       						</td>
	       						<td class="cell">'.$invoices['billfromname'].'</td>
	               				<td class="cell">'.$invoices['total_invoices'].'</td>
	               				<td class="cell">'.'₹ '.number_format($invoice_details['total_billed_amt'], 2).'</td>
	               				<td class="cell">'.'₹ '.number_format($invoice_details['total_credited'], 2).'</td>
	               				<td class="cell">'.'₹ '.number_format($invoice_details['total_tds'], 2).'</td>
	               				<td class="cell">'.'₹ '.number_format($amt_receivable, 2).'</td>
	               				<td class="cell">'.$status.'</td>
							</tr>';
               			}
               		}
				}*/
		// 		$trHTML .= '</tbody>
  //              		</table>';
		// 	}
		// 	// echo $trHTML;die; 
		// 	$response['html'] = $trHTML;
		// 	echo json_encode($response);return true;die;
		// }
	}

	public function get_records_customerwise()
	{
		$data['customerArr'] = $this->FinancialModel->getcustomerlist($this->input->post());
		// echo '<pre>';print_r($data['customerArr']);die;
		$response = array();
		if(!empty($data['customerArr']))
   		{
       		if(count($data['customerArr']) > 0)
			{
           		foreach($data['customerArr'] as $custArr)
   				{
					$total = ($custArr['total']) ? number_format($custArr['total'],2) : 0;
					$total_credited = ($custArr['total_credited']) ? number_format($custArr['total_credited'],2) : 0;
					$total_tds = ($custArr['total_tds']) ? number_format($custArr['total_tds'],2) : 0;
					$total_receivable = ($custArr['total_receivable']) ? number_format($custArr['total_receivable'],2) : 0;

					// $account_name = <a href="http://'.$_SERVER['SERVER_NAME'].'/#Account/view/'.$val['id'].'">'.$val['name'].'</a>
					$account_name = '<a href="http://'.$_SERVER['SERVER_NAME'].'/#Account/view/'.$custArr['id'].'">'.$custArr['account_name'].'</a>';

					$response[] = array("account_name" => $account_name,
										"billing_entity_name" => $custArr['billing_entity_name'],
										"total_invoices" => $custArr['total_invoices'],
										"total" => $total,
										"total_credited" => $total_credited,
										"total_tds" => $total_tds,
										"total_receivable" => $total_receivable,
										"paystatus" => $custArr['status']);
				}
			}
		}
		echo json_encode($response);
	}

	public function get_payment_summary()
	{
		$invoice_id = $this->input->get('dataId');
		$getInvoiceDetails 	=	$this->FinancialModel->getinvoicedetails();
		$output = '';
		// echo '<pre>';print_r($getInvoiceDetails);die;
		
		$output .= '<h4><span><b>Invoice No:</b></span>'.$getInvoiceDetails["invoiceno"].'</h4>';
		$output .= '<form action="#" method="post" id="paymentSummaryFormRptr">';
		$output .= '<div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <table id="example" class="table" style="width:100%;background-color: #ececec;border-radius: 15px;">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Payment#</th>
                                            <th>Reference#</th>
                                            <th>Payment Mode</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                    $received_amount = 0;
                                    $tds = 0;
                                    $balance = 0;

                                    $get_paymentDetails = $this->FinancialModel->getpaymentdetails($getInvoiceDetails["invoiceno"]);
                                    if(!empty($get_paymentDetails))
                                    {
                                    	foreach($get_paymentDetails as $paymentDetail)
                                    	{
                                    		$received_amount = $received_amount + $paymentDetail['amountcredited'];
                                            $tds = $tds + $paymentDetail['tds'];

                                            $output.='<tr>
                                                <td> '.date("d-m-Y",strtotime($paymentDetail['pdate'])).'</td>
                                                <td> '.$paymentDetail['id'].'</td>
                                                <td> '.$paymentDetail['transactionid'].'</td>
                                                <td> '.$paymentDetail['mode'].'</td>
                                                <td>'.number_format($paymentDetail['amountcredited'],2).'</td>       
                                            </tr>';
                                    	}
                                    	$balance = $getInvoiceDetails['total'] - $received_amount - $tds;
                                    }

		$output .= '</tbody>
			</table>
			<div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6" style="padding: 0px;">
                            <span><b>Received Amount </b>:</span>
                        </div>
                        <div class="col-md-2" style="text-align: right;padding: 0px;">
                            <span>Rs</span>
                        </div>
                        <div class="col-md-4">
                            <span>'.number_format($received_amount,2).'</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6" style="padding: 0px;">
                            <span><b>TDS </b>:</span>
                        </div>
                        <div class="col-md-2" style="text-align: right;padding: 0px;">
                            <span>Rs</span>
                        </div>
                        <div class="col-md-4">
                            <span>'.number_format($tds,2).'</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6" style="padding: 0px;">
                            <span><b>Billed Amount</b> :</span>
                        </div>
                        <div class="col-md-2" style="text-align: right;padding: 0px;">
                            <span>Rs</span>
                        </div>
                        <div class="col-md-4">
                            <span>'.number_format($getInvoiceDetails['total'],2).'</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6" style="padding: 0px;">
                            <span><b>Balance </b>:</span>
                        </div>
                        <div class="col-md-2" style="text-align: right;padding: 0px;">
                            <span>Rs</span>
                        </div>
                        <div class="col-md-4">
                            <span>'.number_format($balance,2).'</span>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>    
        </div>
    </div>
</div>';
$output .= '</form>';

		echo $output;
	}

	public function getbilling_entity_invoices()
	{
		$bill_entity = $this->uri->segment(3);
		
		// ===================== Code for pagination ====================
		/*$this->load->library("pagination");
		$config = array();
        $config["base_url"] = base_url()."financial/getbilling_entity_invoices/".$bill_entity;
        $config["total_rows"] = $this->FinancialModel->getbillingentityinvoices_count();
        $config["per_page"] = 1;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["links"] = $this->pagination->create_links();

		$getBillingEntityArr 	=	$this->FinancialModel->getbillingentityinvoices('', $config["per_page"], $page);*/
		// ===================== Code for pagination ====================

		$getBillingEntityArr 	=	$this->FinancialModel->getbillingentityinvoices();
		// echo '<pre>';print_r($getBillingEntityArr);die;
		$output = '<table id="example_billing" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th><strong>Account</strong></th>
                                <th><strong>Invoice date</strong></th>
                                <th><strong>Invoice number</strong></th>
                                <th><strong>Total invoice value</strong></th>
                                <th><strong>Total payment received</strong></th>
                                <th><strong>Payment summary</strong></th>
                                <th><strong>Balance due</strong></th>
                            </tr>
                        </thead>
                        <tbody>';
                        if(!empty($getBillingEntityArr))
                        {
	                        $received_amount=0;
	                        $tds=0;
							// echo '<pre>';print_r($getBillingEntityArr);die;
	                        foreach($getBillingEntityArr as $billingEntities)
	                        {
	                        	$account = $this->FinancialModel->getaccountnameofinvoices($billingEntities['account_id']);

	                        	$payment = getinvoicepayment($billingEntities['invoiceno']);


	                        	if($billingEntities['total']){
	                        		$total_billed = $billingEntities['total'];
	                        		$balance_due = $billingEntities['total'] - $payment['total_credited'] - $payment['total_tds'];
	                        	}
	                        	else {
	                        		$total_billed = $billingEntities['total'];
	                        		$balance_due = $billingEntities['balance'];
	                        	}

	                        	// if($balance_due!=0){
		                        	$output .= '<tr>
		                                <td>'.$billingEntities['billtoname'].'</td>
		                                <td>'.$billingEntities['invoicedate'].'</td>
		                                <td>'.$billingEntities['invoiceno'].'</td>
		                                <td>₹ '.number_format($total_billed,2).'</td>
		                                <td>₹ '.number_format($payment['total_credited'],2).'</td>';

		                            if($billingEntities['paymentstatus']!='Not paid'){
		                            	$output .= '<td><a href="#" class="view_summary" data-id="'.$billingEntities['id'].'">View summary</a></td>';
		                        	}
		                        	else {
		                        		$output .= '<td></td>';
		                        	}
		                            $output .= '<td>₹ '.number_format($balance_due,2).'</td>       
		                            </tr>';
	                        	// }
	                        }
                    	}
                    	else {
                    		$output .= '<tr><td colspan="5" align="center">No Data</td></tr>';
                    	}

                        $output .= '</tbody>
            </table>

            <script>
			 $(document).ready(function() {
			     $("#example_billing").DataTable( {
			     	"pagingType": "full_numbers",
			        "dom": "<'."'".'pull-left'."'".'f><'."'".'pull-right'."'".'l>tip/",
			        "lengthMenu": [20, 50, 75, 100 ],
			        "pageLength": 20
			     } );
			 } );
			</script>';
            // $output .= '<p>'.$data["links"].'</p>';

        echo $output;
	}


	/*
	* To get lead data point data
	* @parm 	- none
	* @return 	- none
	*/
	public function dataPointData(){

		$result = $this->tabularLoadMore($isJson=false);
		echo json_encode($result);return;
	}


	public function debtorsaging_analysis($isAjaxRequest=''){

		$data["invoiceArr"] = $this->FinancialModel->displayAcc();

		// if( empty($isAjaxRequest) )
		// {
			$data['page_title'] = "Receivables Ageing Analysis";
			$hData['title'] 	= "Receivables Ageing Analysis";
			$sData 				= array();
			$fData 				= array();

			$sData['activeMenu']= 3;
			$this->load->view( "includes/header", $hData );
			$this->load->view( "includes/sidebar", $sData );
			$this->load->view( "financial_report/debtorsage_analysis_report", $data );
			$this->load->view( "includes/footer", $fData );
		// }
	}

	public function get_debtors_agingrecords()
	{
		$data["invoiceArr"] = $this->FinancialModel->displayAcc();
		$response = array();
		$trHTML = '';
		if(!empty($data["invoiceArr"]))
		{
			$total_not_overdue_balance = 0;
			$total_not_overdue_invoices = 0;
			$thirtyorless_balance = 0;
			$thirtyorless_invoices = 0;
			$thirtyonetosixty_balance = 0;
			$thirtyonetosixty_invoices = 0;
			$sixtyonetoninety_balance = 0;
			$sixtyonetoninety_invoices = 0;
			$ninetyoneormore_balance = 0;
			$ninetyoneormore_invoices = 0;
			$totalunpaid = 0;
			$trHTML .= '<table id="age_analysis_table" class="table">
				<thead class="schedularth">
       			<h1 class="no_of_days_overdue">NUMBER OF DAYS OVERDUE</h1>
       			<tr>
       				<th></th>
       				<th style="text-align:right;"><span>Not Yet Overdue</span></th>
       				<th style="text-align:right;"><span>30 or less</span></th>
       				<th style="text-align:right;"><span>31 to 60</span></th>
       				<th style="text-align:right;"><span>61 to 90</span></th>
       				<th style="text-align:right;"><span>91 or more</span></th>
       				<th style="text-align:right;"><span>Total Unpaid</span></th>
       			</tr>
       		</thead>
       		<tbody>';
       		
			foreach($data["invoiceArr"] as $invoices)
       		{
       			$trHTML .= '<tr>
					<td>'.$invoices['name'].'</td>
					<td style="text-align:right;">';
					if($invoices['notoverdue_balance']!=0){
						$trHTML .= "₹ ".number_format($invoices['notoverdue_balance'],2);
							$trHTML .= "<br/><span style='font-size:10px;color:gray;'>".$invoices['notoverdue_invoice_count']." invoices</span>";

							$total_not_overdue_balance += $invoices['notoverdue_balance'];
							$total_not_overdue_invoices += $invoices['notoverdue_invoice_count'];
					}
					$trHTML .= '</td>
					<td style="background-color:aliceblue;text-align:right;">';
					if($invoices['thirtyorless_invoice_count']!=0){
						$trHTML .= "₹ ".number_format($invoices['thirtyorless_balance'],2);
							$trHTML .= "<br/><span style='font-size:10px;color:gray;'>".$invoices['thirtyorless_invoice_count']." invoices</span>";

							$thirtyorless_balance += $invoices['thirtyorless_balance'];
							$thirtyorless_invoices += $invoices['thirtyorless_invoice_count'];
					}
					$trHTML .= '</td>
					<td style="background-color:aliceblue;text-align:right;">';
					if($invoices['thirtyonetosixty_invoice_count']!=0){
   						$trHTML .= "₹ ".number_format($invoices['thirtyonetosixty_balance'],2);
   						$trHTML .= "<br/><span style='font-size:10px;color:gray;'>".$invoices['thirtyonetosixty_invoice_count']." invoices</span>";

   						$thirtyonetosixty_balance += $invoices['thirtyonetosixty_balance'];
   						$thirtyonetosixty_invoices += $invoices['thirtyonetosixty_invoice_count'];
					}
					$trHTML .= '</td>
					<td style="background-color:aliceblue;text-align:right;">';
					if($invoices['sixtyonetoninety_invoice_count']!=0){
   						$trHTML .= "₹ ".number_format($invoices['sixtyonetoninety_balance'],2);
   						$trHTML .= "<br/><span style='font-size:10px;color:gray;'>".$invoices['sixtyonetoninety_invoice_count']." invoices</span>";

   						$sixtyonetoninety_balance += $invoices['sixtyonetoninety_balance'];
   						$sixtyonetoninety_invoices += $invoices['sixtyonetoninety_invoice_count'];
					}
					$trHTML .= '</td>
					<td style="background-color:aliceblue;text-align:right;">';
					if($invoices['ninetyoneormore_invoice_count']!=0){
   						$trHTML .= "₹ ".number_format($invoices['ninetyoneormore_balance'],2);
   						$trHTML .= "<br/><span style='font-size:10px;color:gray;'>".$invoices['ninetyoneormore_invoice_count']." invoices</span>";

   						$ninetyoneormore_balance += $invoices['ninetyoneormore_balance'];
   						$ninetyoneormore_invoices += $invoices['ninetyoneormore_invoice_count'];
					}
					$trHTML .= '</td>
					<td style="text-align:right;">';
					if($invoices['totalunpaid']!=0){
							$trHTML .= "₹ ".number_format($invoices['totalunpaid'],2);

							$totalunpaid += $invoices['totalunpaid'];
						}
					$trHTML .= '</td></tr>';

				/*if($invoices['notoverdue_balance']!=0)
				{
					$total_not_overdue_balance += $invoices['notoverdue_balance'];
					$total_not_overdue_invoices += $invoices['notoverdue_invoice_count'];
				}
				if($invoices['thirtyorless_invoice_count']!=0)
				{
					$thirtyorless_balance += $invoices['thirtyorless_balance'];
					$thirtyorless_invoices += $invoices['thirtyorless_invoice_count'];
				}
				if($invoices['thirtyonetosixty_invoice_count']!=0)
				{
					$thirtyonetosixty_balance += $invoices['thirtyonetosixty_balance'];
					$thirtyonetosixty_invoices += $invoices['thirtyonetosixty_invoice_count'];
				}
				if($invoices['sixtyonetoninety_invoice_count']!=0)
				{
					$sixtyonetoninety_balance += $invoices['sixtyonetoninety_balance'];
					$sixtyonetoninety_invoices += $invoices['sixtyonetoninety_invoice_count'];
				}
				if($invoices['ninetyoneormore_invoice_count']!=0)
				{
					$ninetyoneormore_balance += $invoices['ninetyoneormore_balance'];
					$ninetyoneormore_invoices += $invoices['ninetyoneormore_invoice_count'];
				}
				if($invoices['totalunpaid']!=0)
				{
					$totalunpaid += $invoices['totalunpaid'];
				}

				$response[] = array("name" => $invoices['name'],
									"total_not_overdue_balance"=> number_format($total_not_overdue_balance,2),
									"thirtyorless_balance" => number_format($thirtyorless_balance, 2),
									"thirtyonetosixty_balance" => number_format($thirtyonetosixty_balance,2),
									"sixtyonetoninety_balance" => number_format($sixtyonetoninety_balance, 2),
									"ninetyoneormore_balance" => number_format($ninetyoneormore_balance,2),
									"totalunpaid" => $totalunpaid);*/	
       		}
       		$trHTML .= '<tr>
       			<td style="text-align:right;"><b>Total Unpaid</b></td>
       			<td style="text-align:right;"><b>';
       			$trHTML .= "₹ ".number_format($total_not_overdue_balance,2)."<br/><span style='font-size:10px;color:gray;'>".$total_not_overdue_invoices." invoices</span>";
       			$trHTML .= '<td style="text-align:right;"><b>₹ '.number_format($thirtyorless_balance,2).'<br/><span style="font-size:10px;color:gray;">'.$thirtyorless_invoices.' invoices</span></b></td>';
       			$trHTML .= '<td style="text-align:right;"><b>₹ '.number_format($thirtyonetosixty_balance,2).'<br/><span style="font-size:10px;color:gray;">'.$thirtyonetosixty_invoices.' invoices</span></b></td>';
       			$trHTML .= '<td style="text-align:right;"><b>₹ '.number_format($sixtyonetoninety_balance,2).'<br/><span style="font-size:10px;color:gray;">'.$sixtyonetoninety_invoices.' invoices</span></b></td>';
       			$trHTML .= '<td style="text-align:right;"><b>₹ '.number_format($ninetyoneormore_balance,2).'<br/><span style="font-size:10px;color:gray;">'.$ninetyoneormore_invoices.' invoices</span></b></td>';
       			$trHTML .= '<td style="text-align:right;"><b>₹ '.number_format($totalunpaid,2).'</b></td>';

       		$trHTML .= '</tr>';
		}
		// echo $trHTML;die;
		$response['html'] = $trHTML;
		echo json_encode($response);
	}

}