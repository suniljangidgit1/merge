<?php

// echo '<pre>';print_r($_REQUEST); die;

$output = '<style type="text/css">
    .material-icons-outlined{
      font-size: 18px;
      position: relative;
      cursor: pointer;
    }

  #invoice_main_detailsPreview .panel-default .panel-heading{
    background-color: #ECF0F3;
    color: #000000 !important;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    /*font-weight: 600;*/
    padding: 6px 10px;
    font-size: 13px;
}

#invoice_main_detailsPreview .modal-header{
    padding: 15px;
    border-bottom: 0px solid #e5e5e5;
}

#invoice_main_detailsPreview .form-control{
    height: 30px;
    font-size: 12px;
    font-weight: 400;
}

#invoice_main_detailsPreview .panel{
  border-radius: 15px;
  border: 1px solid #dcdcdc;
  box-shadow: unset;
 }

 #invoice_main_detailsPreview .BillingFromCard,
 #invoice_main_detailsPreview .BillingToCard{
  border: 1px solid #DEDEDE;
    border-radius: 15px;
    padding: 35px;
    width: 63%;
    cursor: pointer;
 }

 #invoice_main_detailsPreview .BillingFromAddress,
 .BillingFrom_address_and_gst,
  #invoice_main_detailsPreview .BillingToAddress,
  .BillingTo_address_and_gst{
  font-size: 12px;
  width: 68%;
 }

 #invoice_main_detailsPreview .BillingFromAddress .form-group,
 #invoice_main_detailsPreview .BillingToAddress .form-group{
  margin-bottom: 5px;
 }


 #invoice_main_detailsPreview .usericoncard{
  font-size: 35px;
  color: #337AB7;
 }

 #invoice_main_detailsPreview .billingcardtitle{
  display: inline-block;
    margin-left: 10px;
    font-weight: 600;
    position: relative;
    top: -8px;
 }

 #invoice_main_detailsPreview .pr0{
  padding-right: 0px;
 }

 #invoice_main_detailsPreview .overflowhide{
  overflow: hidden;
 }

 #invoice_main_detailsPreview #Address_Details .form-group,
 #invoice_main_detailsPreview #Address_Details_BillTo .form-group{
    margin-bottom: 10px;
}

#invoice_main_detailsPreview #Address_Details .input-group-addon{
  padding: 3px 7px;
}

#invoice_main_detailsPreview #participantTable td input[type=checkbox], 
#invoice_main_detailsPreview #participantTable th input[type=checkbox] {
    margin: 0;
    position: relative;
    top: 2px;
    width: 11px;
    height: 11px;
}

#invoice_main_detailsPreview #participantTable{
  background: #ECF0F3;
  margin-top: 20px;
  margin-bottom: 0px;
}

#invoice_main_detailsPreview #participantTable .main_amount{
  font-size: 12px;
}

#invoice_main_detailsPreview #participantTable .invoice_remove{
  cursor: pointer;
}

#invoice_main_detailsPreview #invoice_billedto #addButtonRow .Estimate_add{
  cursor: pointer;
  color: #337AB7;
  font-weight: 600;
}

#invoice_main_detailsPreview #participantTable_discounts .main_amount,
#invoice_main_detailsPreview #Calculate_discounts .main_amount{
  font-size: 12px;
  font-weight: 400;
  display: inline-block;
    padding-left: 5px;
}

#invoice_main_detailsPreview #participantTable_discounts{
  background: #ECF0F3;
}

#invoice_main_detailsPreview #Calculate_discounts{
  background: #ECF0F3;
}

#invoice_main_detailsPreview #participantTable .custom-a11yselect-container,
#invoice_main_detailsPreview #Calculate_discounts .custom-a11yselect-container{
  margin-right: 0px;
}

#invoice_main_detailsPreview #participantTable.table>tbody>tr>td,
#invoice_main_detailsPreview #Calculate_discounts.table>tbody>tr>td{
  border-top: none !important;
  overflow: inherit !important;
}

.custom-a11yselect-container .custom-a11yselect-menu.custom-a11yselect-overflow#item_gst_discont0-menu,
.custom-a11yselect-container .custom-a11yselect-menu.custom-a11yselect-overflow#Calculate_rate-menu{
  max-height:80px !important;
}

#invoice_main_detailsPreview #Calculate_discounts{
  margin-bottom: 0px;
  font-size: 12px;
  color:#000;
}

#invoice_main_detailsPreview #participantTable_discounts.table>tbody>tr:last-child{
  border-bottom: 2px solid #ddd;
}

#invoice_main_detailsPreview #main_calculation .form-group{
  margin-bottom: 10px;
}

#invoice_main_detailsPreview #main_calculation .form-group:first-child{
  margin-top:15px;
}

#invoice_main_detailsPreview #main_calculation .form-group:last-child{
  background: #ECF0F3;
  font-weight: 800;
}

#invoice_main_detailsPreview .invoice_remove_discount,
#invoice_main_detailsPreview .invoice_remove_adddiscount{
  cursor: pointer;
}

#invoice_main_detailsPreview .width_20{
  width:22%;
}

#invoice_main_detailsPreview .width_15{
  width:15%;
}

#invoice_main_detailsPreview .width_10{
  width:10%;
}

#invoice_main_detailsPreview .width_5{
  width:5%;
}

#invoice_main_detailsPreview .invoiceDiffBillingEntity,
#invoice_main_detailsPreview .invoiceDiffcustomer{
  color: #337AB7;
    cursor: pointer;
    font-size: 14px;
}

#BillingFromAddress span,
#BillingToAddress span{
  white-space: pre-line;
}

@media screen and (max-width: 767px){
  #invoice_main_detailsPreview .BillingFromCard,
 #invoice_main_detailsPreview .BillingToCard{
  width: 100%;
 margin-bottom: 15px;
 }

 #invoice_main_detailsPreview .modal-content#invoice_main_detailsPreview .table-responsive{
  margin-bottom: 0px;
  border:none;
 }
}

.textarea-content
{
  height: 125px !important;
}

#InvoicePreviewModel #BillFromGST_streetPreview span,
#InvoicePreviewModel #BillToGST_addressPreview span{
	white-space: pre-line;
}
</style>
<script>
   $(".invoice_Percentage").customA11ySelect();
   $(".invoice_IGSTandCGST").customA11ySelect();
   $(".Calculate_IGSTandCGST").customA11ySelect();
   $(".DiscountPer").customA11ySelect();
   $(".diff_billing_entity").show();
   $(".diff_customer_link").show();
</script>
<div class="modal-dialog modal-lg">
	<div class="modal-content" id="invoice_main_detailsPreview">
		<div class="modal-header">
			<button type="button" id="close_button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Preview Invoice</h4>
		</div>
		<div class="modal-body">
			<form id="InvoicePreviewForm" method="post">
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default" id="invoice_billedfrom_preview">
							<div class="panel-heading">Billed From</div>
							<div class="panel-body" id="invoice_Address_Details_Preview">
								<div class="row">
                    				<div class="col-md-7">';
                    				// echo '<per>';print_r($_REQUEST);die;
                    				$fromemail = $_REQUEST['invoice_billingemailaddress'];
									$fromphone = $_REQUEST['invoice_billingphoneno'];

									if($fromemail!="" && $fromphone!=""){
										$fromemail_phone = $fromemail.', '.$fromphone;
									}
									else if($fromemail!=""){
										$fromemail_phone = $fromemail;
									}
									else if($fromphone!=""){
										$fromemail_phone = $fromphone;
									}
									else {
										$fromemail_phone = '';
									}

									$street_from = ($_REQUEST['invoice_billing_address_street']) ? $_REQUEST['invoice_billing_address_street'].',' : '';
			                     	$city_from = ($_REQUEST['invoice_billing_address_city']) ? $_REQUEST['invoice_billing_address_city'].',' : '';
			                     	$state_from = ($_REQUEST['invoice_billing_address_state']) ? $_REQUEST['invoice_billing_address_state'].'-' : '';
			                     	$zipcode_from = ($_REQUEST['invoice_billing_address_postal_code']) ? $_REQUEST['invoice_billing_address_postal_code'] : '';
			                     	$gst_num_from = ($_REQUEST['invoice_billingaddressgstin']) ? $_REQUEST['invoice_billingaddressgstin'] : '';
			                     	
			                     	$address_from = $street_from.$city_from.$state_from.$zipcode_from;

                    			$output .= '<div class="BillingFrom_address_and_gst">
                    						<div class="form-group BillingFrom_gst_main">
                    							<div class="form-group BillingFromGSTDetails">
                    								<div class="form-group BillingFromGSTDetails" style="display: block;">
						                                <div id="BillFromGST_namePreview" class="form-group">
						                                	<span><b>'.$_REQUEST['invoice_billfromname'].'</b></span>
						                                </div>
						                                <div id="BillFromGST_streetPreview" class="form-group">
						                                	<span>'.$address_from.'</span>
						                                </div>';

						                 	if($fromemail_phone!=""){
						                        $output .= '<div id="BillFromGST_email_phonePreview" class="form-group">
						                                	<span>'.$fromemail_phone.'</span>
						                                </div>';
											}

											if($_REQUEST['invoice_billingaddressgstin']){
						                        $output .= '<div id="BillFromGST_numPreview" class="form-group">
						                                	<span><b>GSTIN: </b>'.$_REQUEST['invoice_billingaddressgstin'].'</span>
						                                </div>';
				                            }

				                            if($_REQUEST['invoice_billingaddresspanno']){
						                        $output .= '<div id="BillFromGST_pannoPreview" class="form-group">
						                                	<span><b>PAN: </b>'.$_REQUEST['invoice_billingaddresspanno'].'</span>
						                                </div>';
				                            }

	                                		if($_REQUEST['invoice_billingfrom_udyamno']){
						                        $output .= '<div id="BillFromGST_statePreview" class="form-group">
						                                	<span><b>UDYAM REGISTRATION NO.: </b>'.$_REQUEST['invoice_billingfrom_udyamno'].'</span>
						                                </div>';
											}

						                    $output .= '</div>
                    							</div>
                    						</div>
                    					</div>
                    				</div>
                    				<div class="col-md-5">
                                        <div class="row form-group">
                                            <label class="col-md-5 pr0"><span class="pull-right">Invoice number <span class="text-danger">*</span></span></label>
                                            <div class="col-md-7">
					                            <div class="">'.$_REQUEST['invoice_number'].'</div>
					                        </div>
                                        </div>
                                        <div class="row form-group">
											<label class="col-md-5 pr0"><span class="pull-right">P.O./S.O. number</span>
											</label>
											<div class="col-md-7">
												<div class="">'.$_REQUEST['invoice_po_so_number'].'</div>
											</div>
										</div>
										<div class="row form-group">
											<label class="col-md-5 pr0"><span class="pull-right">Invoice date</span>
											</label>
											<div class="col-md-7">
												<div id="datepicker" class="input-group date invoice_datepicker" data-date-format="dd-mm-yyyy">'.$_REQUEST['invoice_date'].'</div>
											</div>
										</div>
										<div class="row form-group">
											<label class="col-md-5 pr0"><span class="pull-right">Due date</span>
											</label>
											<div class="col-md-7">
												<div id="datepicker" class="input-group date invoice_datepicker" data-date-format="dd-mm-yyyy">'.$_REQUEST['due_date'].'</div>
											</div>
										</div>
                                    </div>
                    			</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
    				<div class="col-md-12">
    					<div class="panel panel-default" id="invoice_billedto_preview">
    						<div class="panel-heading">Billed To</div>
    						<div class="panel-body" id="Address_Details_BillToPreview">
    							<div class="row">
      								<div class="col-md-7">
      									<div class="BillingTo_address_and_gst">
      										<div class="form-group BillingTo_gst_main">
  												<div class="form-group BillingToGSTDetails">
  													<div id="BillToGST_namePreview" class="form-group">
  														<span><b>'.$_REQUEST['invoice_billtoname'].'</b></span>
  													</div>';

						$street_to = (isset($_REQUEST['invoice_shipping_address_street']) && $_REQUEST['invoice_shipping_address_street']!='undefined') ? $_REQUEST['invoice_shipping_address_street'].', ' : '';
                     	$city_to = (isset($_REQUEST['invoice_shipping_address_city']) && $_REQUEST['invoice_shipping_address_city']!='undefined') ? $_REQUEST['invoice_shipping_address_city'].', ' : '';
                     	$state_to = (isset($_REQUEST['invoice_shipping_address_state']) && $_REQUEST['invoice_shipping_address_state']!='undefined') ? $_REQUEST['invoice_shipping_address_state'].'- ' : '';
                     	$zipcode_to = (isset($_REQUEST['invoice_shipping_address_postal_code']) && $_REQUEST['invoice_shipping_address_postal_code']!='undefined') ? $_REQUEST['invoice_shipping_address_postal_code'] : '';
                     	$gst_num_to = (isset($_REQUEST['invoice_shippingaddressgstin']) && $_REQUEST['invoice_shippingaddressgstin']!='undefined') ? $_REQUEST['invoice_shippingaddressgstin'] : '';
                     	
                     	$address_to = $street_to.$city_to.$state_to.$zipcode_to;

                     	$billingto_udyamno = (isset($_REQUEST['invoice_billingto_udyamno']) && $_REQUEST['invoice_billingto_udyamno']!='undefined') ? $_REQUEST['invoice_billingto_udyamno'] : '';

						$toemail = $_REQUEST['invoice_shippingaddressemailid'];
						$tophone = $_REQUEST['invoice_shippingaddresshphoneno'];
						if($toemail!="" && $tophone!=""){
							$toemail_phone = $toemail.', '.$tophone;
						}
						else if($toemail!=""){
							$toemail_phone = $toemail;
						}
						else if($tophone!=""){
							$toemail_phone = $tophone;
						}
						else {
							$toemail_phone = '';
						}

					                        $output .= '<div id="BillToGST_addressPreview" class="form-group">
					                                	<span>'.$address_to.'</span>
					                                </div>
					                                <div id="BillToGST_email_phonePreview" class="form-group">
					                                	<span>'.$toemail_phone.'</span>
					                                </div>';

					                        if($gst_num_to!=""){
					                        	$output .= '<div id="BillToGST_gstPreview" class="form-group">
					                                	<span><b>GSTIN: </b>'.$gst_num_to.'</span>
					                                </div>';
				                            }

				                            if($_REQUEST['invoice_shippingaddresspanno']){
					                        $output .= '<div id="BillToGST_panPreview" class="form-group">
					                                	<span><b>PAN: </b>'.$_REQUEST['invoice_shippingaddresspanno'].'</span>
					                                </div>';
					                            }

					                	if($_REQUEST['invoice_billingto_udyamno']){
					                        $output .= '<div id="BillToGST_udyamPreview" class="form-grosup">
					                                	<span><b>UDYAM REGISTRATION NO.: </b>'.$_REQUEST['invoice_billingto_udyamno'].'</span>
					                                </div>';
				                    	}

  									$output .= '</div>
      										</div>
      									</div>
      								</div>
      							</div>
      							<div class="row">
      								<div class="table-responsive">
				                        <table class="table" id="participantTable">
				                          	<thead>
				                            	<tr>
				                              		<th class="">S.N</th>
													<th class="">Item description</th>
													<th class="width_15">HSN/SAC</th>
													<th class="width_10">Quantity</th>
													<th class="width_10">Rate (₹)</th>
													<th>Amount (₹)</th>
				                            	</tr>
				                          	</thead>
				                          	<tbody class="participantRow">';

									$count_items = count($_REQUEST['invoice_item_descr']);

									$m = 1;

									$count=0;
									$count2=0;
									$total_amount=0;
									$total_amount_taxes=0;
									$total_amount_after_discount=0;
									$igst = 0;
									$cgst = 0;
									$sgst = 0;
									$total_tax_amount = '0000.00';
									$total_invoice_value = 0;
									$invoice_calculated_disc_amt = 0;

									$selected_both_dropdowns = 0;

									for($i=0;$i<$count_items;$i++)
									{
										$flag = 0;
										$output .= '<tr class="main-group" style="border-top: 2px solid #ddd;">
											<td><span>'.$m.'</span></td>
											<td>'.$_REQUEST['invoice_item_descr'][$i].'</td>
											<td>'.$_REQUEST['invoice_item_hsn'][$i].'</td>
											<td>'.$_REQUEST['invoice_item_qty'][$i].'</td>
											<td>'.$_REQUEST['invoice_item_rate'][$i].'</td>
											<td>₹ '.number_format($_REQUEST['invoice_item_main_amount'][$i],2,'.','').'</td>
										</tr>
										<tr>
											<td></td>
											<td></td>
											<td class="width_20" style="font-size: 12px;font-weight: 600;">
												<span class="pull-right">- Discount (At item level)</span>
											</td>';

											$item_discount_type = ($_REQUEST['invoice_item_discount_type'][$i]) ? $_REQUEST['invoice_item_discount_type'][$i] : "Select Type";

											$item_discount_rate = ($_REQUEST['invoice_item_discount_rate'][$i]) ? $_REQUEST['invoice_item_discount_rate'][$i] : "";

											$discountamount = 0;

											if($_REQUEST['invoice_item_discount_type'][$i] == 'Percentage'){
		                                       $discountamount = $_REQUEST['invoice_calculated_discount'][$i];
		                                       $total_amount_after_discount += $discountamount;
		                                    }
		                                    if($_REQUEST['invoice_item_discount_type'][$i] == 'Amount'){
		                                       $discountamount = $_REQUEST['invoice_calculated_discount'][$i];
		                                       $total_amount_after_discount += $discountamount;
		                                    }

		                                    if(!$discountamount){
		                                        $discountamount_label = str_pad($discountamount, 4, "0", STR_PAD_LEFT).'.'.str_pad($discountamount, 2, "0", STR_PAD_RIGHT);
		                                        $discountamount = 0;
		                                    }
		                                    else{
		                                        $discountamount_label = number_format($discountamount,2,'.','');
		                                    }

		                                    if($_REQUEST['invoice_item_discount_type'][$i] == 'Select Type'){
		                                       $display_delete_icon = ' style="display: none;"';
		                                    }
		                                    else {
		                                       $display_delete_icon = ' style="display: block;"';
		                                    }

											$output .= '<td class="width_15 discount_section" style="font-size:12px;">'.$item_discount_type.'</td>
														<td class="width_10" style="font-size:12px;">'.$item_discount_rate.'</td>
														<td class="width_15"><span class="main_amount">₹ '.$discountamount_label.'</span></td>
													</tr>
													<tr class="CGST_TR_section">
														<td></td>
					                                    <td></td>
					                                    <td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right">+ GST (At item level)</span>
					                                    </td>';
					                                    
					                        $item_gst_type = (isset($_REQUEST['invoice_item_gst_type'][$i]) && $_REQUEST['invoice_item_gst_type'][$i]!="") ? $_REQUEST['invoice_item_gst_type'][$i] : 'Select Type';

					                        if($item_gst_type==="IGST")
											{
												$gst_calculated_val = number_format($_REQUEST['invoice_item_igst_amount'][$i],2,'.','');
											}
											else if($item_gst_type==="CGST")
											{
												$gst_calculated_val = number_format($_REQUEST['invoice_item_cgst_amount'][$i],2,'.','');
											}
											else {
												$gst_calculated_val = "0000.00";
											}

											if($_REQUEST['invoice_item_gst_discont'][$i]!=0)
											{
												$item_gst_discont = number_format($_REQUEST['invoice_item_gst_discont'][$i],2,'.','');
											}
											else {
												$item_gst_discont = '0000.00';
											}

					                        $output .= '<td class="width_15 GST_section" style="font-size:12px;">'.$item_gst_type.'</td>
					                        			<td class="width_10 rate_data" style="font-size:12px;">'.$_REQUEST['invoice_item_gst_discont'][$i].'%</td>
					                        			<td class=" class="width_15""><span class="main_amount">₹ '.$gst_calculated_val.'</span></td>';

											$output .= '</tr>';

											if($item_gst_type==="CGST")
											{
												$output .= '<tr class="SGST_Discount">
													<td></td>
				                                    <td></td>
				                                    <td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right"></span>
				                                    </td>
				                                    <td class="width_15" style="font-size:12px;">SGST</td>
				                                    <td class="width_10 rate_data"></td>
				                                    <td class="width_15"><span class="main_amount">₹ '.number_format($gst_calculated_val,2,'.','').'</span>
				                                    </td>
												</tr>';
												$flag += 1;
											}
										$m++;
									}

						if($_REQUEST['Invoice_Percentage_select']!=""){
							$invoice_discount = $_REQUEST['Invoice_Percentage_select'];
						}
						else {
							$invoice_discount = 'Select Type';
						}

						$invoice_gst_type = ($_REQUEST['invoice_gst_type']!="") ? $_REQUEST['invoice_gst_type'] : 'Select Type';
						
						
						if($_REQUEST['invoice_items_discount_selected']==1){
							$dis_inv_disc_disp = 'style="display:none;"';
						}
						else {
							$dis_inv_disc_disp = '';
						}
						$dis_est_sgst_style = 'style="display:none;"';
						if($_REQUEST['invoice_items_gst_type_selected']==1){
							$dis_inv_gst_style = 'style="display:none;"';
						}
						else {
							$dis_inv_gst_style = '';
						}

						if($_REQUEST['invoice_items_discount_selected']==1 && $_REQUEST['invoice_items_gst_type_selected']==1){
							$dis_inv_levelstyle = 'style="padding:0px;margin-top:8px;background-color:#ffffff;"';
						}
						else {
							$dis_inv_levelstyle = '';
						}


						$dis_est_style = '';

						$cgst_amount = $sgst_amount = $igst_amount = '0000.00'; 

						if($_REQUEST['invoice_gst_type'] === 'CGST'){
							$gst_amount = number_format($_REQUEST['invoice_cgst_amount'],2,'.','');
							$gst_amount = number_format($_REQUEST['invoice_sgst_amount'],2,'.','');
							$dis_estSGST_style = '';
						}
						else if($_REQUEST['invoice_gst_type'] == 'IGST'){
							$gst_amount = number_format($_REQUEST['invoice_igst_amount'],2,'.','');
							$dis_estSGST_style = 'style="display:none;"';
						}
						else {
							$gst_amount = '0000.00';
							$dis_estSGST_style = 'style="display:none;"';
						}

						if($flag===1){
							$dis_est_disc_style = 'display:none;';
						}
						else {
							$dis_est_disc_style = 'background-color: #ECF0F3;';
						}

						if($_REQUEST['invoice_calculated_disc_amt']!=0){
							$calculated_disc = number_format($_REQUEST['invoice_calculated_disc_amt'],2,'.','');
						}
						else {
							$calculated_disc = '0000.00';
						}

							$output .= '</tbody>
                        			</table>
                        		</div>
    						</div>
    					</div>
    				</div>
    			</div>
    			<div class="">
    				<div class="col-md-12">
    					<div class="panel panel-default" id="invoice_calculationPreview">
    						<div class="panel-heading" '.$dis_inv_levelstyle.'>
    							<div class="table-responsive">
    								<table class="table" id="Calculate_discountsPreview" style="'.$dis_est_disc_style.'">
    									<tr '.$dis_inv_disc_disp.'>
    										<td></td>
											<td></td>
											<td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right">- Discount (At invoice level)</span>
											</td>
											<td class="width_15 discount_section">'.$invoice_discount.'</td>
						                    <td class="width_10">'.$_REQUEST['invoice_disc_amt'].'</td>
						                    <td class="width_15"><span class="main_amount">₹ '.$calculated_disc.'</span></td>
    									</tr>
    									<tr class="CGST_TR_section" '.$dis_inv_gst_style.'>
    										<td></td>
											<td></td>
											<td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right">+ GST (At invoice level)</span>
											</td>
											<td class="width_15 GST_section">'.$invoice_gst_type.'</td>
											<td class="width_10 rate_data">'.$_REQUEST['invoice_calculate_rate'].'%</td>
											<td class="width_15"><span class="main_amount">₹ '.$gst_amount.'</span>
											</td>
    									</tr>
    									<tr id="SGST_CalculatePreview" class="SGST_Discount" '.$dis_est_sgst_style.'>
											<td></td>
											<td></td>
											<td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right"></span>
											</td>
											<td class="width_15">SGST</td>
											<td class="width_10 rate_data"></td>
											<td class="width_15"><span class="main_amount">₹ '.$sgst_amount.'</span>
											</td>
										</tr>
    								</table>
    							</div>
    						</div>
    						<div class="panel-body" id="Address_Details_CalculationPreview">
				                <div class="row" id="main_calculationPreview">
				                  	<div class="col-xs-12 col-md-offset-8 col-md-4">
					                    <div class="form-group form-control">
					                      	<label class="col-xs-5 col-md-5 pr0 control-label">Subtotal</label>
					                      	<div class="col-xs-7 col-md-7"> <span class="invoice_subtotal">
				                                ₹ '.number_format($_REQUEST['invoice_subtotal_amount'],2,'.','').'
					                              </span>
					                      	</div>
					                    </div>';

				                    if($_REQUEST['invoice_totaldiscount_amount']){
					                	$est_total_disc = number_format($_REQUEST['invoice_totaldiscount_amount'],2,'.','');
					                }
					                else {
					                	$est_total_disc = '0000.00';
					                }

					            $output .= '<div class="form-group form-control">
					                      	<label class="col-xs-5 col-md-5 pr0 control-label">Total discount</label>
					                      	<div class="col-xs-7 col-md-7"> <span class="invoice_total_discount">
				                                ₹ '.$est_total_disc.'
					                              </span>
					                      	</div>
					                    </div>';

					                    if($_REQUEST['invoice_totaltaxes_amount']!=0){
					                    	$total_taxes = number_format($_REQUEST['invoice_totaltaxes_amount'],2,'.','');
					                    }
					                    else {
					                    	$total_taxes = '0000.00';
					                    }
					                    
					               $output .= '<div class="form-group form-control">
					                      <label class="col-xs-5 col-md-5 pr0 control-label">Total taxes</label>
					                      <div class="col-xs-7 col-md-7"> <span class="invoice_total_taxes">
				                                ₹ '.$total_taxes.'
					                              </span>
					                      </div>
					                    </div>
					                    <div class="form-group form-control">
					                      	<label class="col-xs-5 col-md-5 pr0 control-label">Total amount</label>
					                      	<div class="col-xs-7 col-md-7"> <span class="invoice_total_amount">
				                                ₹ '.number_format($_REQUEST['invoicetotal_amount'],2,'.','').'
					                              </span>
					                      	</div>
					                    </div>
				                  	</div>
				                </div>
			              	</div>
    					</div>
    				</div>
    			</div>
    			<div class="">';

    				if($_REQUEST['invoice_terms_conditions']){

	    				$output .= '<div class="col-md-6">
							<div class="panel panel-default" id="Terms_ConditionsPreview">
								<div class="panel-heading">Add Terms & Conditions</div>
									<div class="panel-body" id="">
										<div class="row">
											<div class="col-md-12">
											<div class="">'.$_REQUEST['invoice_terms_conditions'].'</div>
										</div>
									</div>
								</div>
							</div>
						</div>';
					}

					$output .= '<div class="col-md-6">
						<div class="panel panel-default" id="BankInvoice_Details">
							<div class="panel-heading">Add Bank details</div>
							<div class="panel-body" id="">
								<div class="row">
									<div class="col-md-12">';
							$bank_holder_name = (isset($_REQUEST['invoice_bank_holder_name'])) ? $_REQUEST['invoice_bank_holder_name'] : '';
							$bank_name = (isset($_REQUEST['invoice_bank_name'])) ? $_REQUEST['invoice_bank_name'] : '';
							$account_no = (isset($_REQUEST['invoice_account_no'])) ? $_REQUEST['invoice_account_no'] : '';
							$account_type = (isset($_REQUEST['invoice_bank_accType'])) ? $_REQUEST['invoice_bank_accType'] : '';
							$IFSCcode = (isset($_REQUEST['invoice_IFSCcode'])) ? $_REQUEST['invoice_IFSCcode'] : '';
							$bank_UPI = (isset($_REQUEST['invoice_bank_UPI'])) ? $_REQUEST['invoice_bank_UPI'] : '';


	                  		$output .= '<div class="Invoice_AccountDetails">';

	                  			if($bank_holder_name){
	                  				$output .= '<div id="preview_Holder_name"><span><b>A/C Holder Name: </b>'.$bank_holder_name.'</span></div>';
	                  			}

	                  			if($bank_name){
	                    			$output .= '<div id="preview_bank_name"><span><b>Bank Name: </b>'.$bank_name.'</span></div>';
	                    		}

	                    		if($account_no){
	                    			$output .= '<div id="preview_acc_no"><span><b>Account No.: </b>'.$account_no.'</span></div>';
	                    		}

	                    		if($IFSCcode){
	                    			$output .= '<div id="preview_IFSC_Code"><span><b>IFSC Code: </b>'.$IFSCcode.'</span></div>';
	                    		}

	                    		if($account_type){
	                    			$output .= '<div id="preview_acc_type"><span><b>Account Type: </b>'.$account_type.'</span></div>';
	                    		}

            					if(isset($_REQUEST['bank_UPI'])){
            						$output .= '<div id="preview_UPI"><span><b>UPI: </b>'.$_REQUEST['bank_UPI'].'</span></div>';
            					}

            					if(isset($_REQUEST["no_bank_details"])){
            						$output .= '<div id="preview_bank_details"><span><b>'.$_REQUEST["no_bank_details"].'</b></span></div>';
            					}
            					else if(!$account_no && !isset($_REQUEST["no_bank_details"])){
            						$output .= '<div id="preview_bank_details"><span><b>No bank details selected</b></span></div>';
            					}

	                  			$output .= '</div>
	                				</div>
								</div>
							</div>
						</div>
					</div>
    			</div>';

    		if(!empty($_REQUEST['feedback_attachment'])){
		    	$output .= '<div class="row">
					<div class="col-md-12">
						<div id="filelist">
							<ul class="list-unstyled">';
							// $file_counts = count($_REQUEST['feedback_attachment']);
							$file_arr  = explode(",", $_REQUEST['feedback_attachment'][0]);
							$file_counts = count($file_arr);

							if($file_counts > 0){
								for($m=0;$m<$file_counts;$m)
								{
									$output.='<div class="row" id="'.$m.'1" style="margin-left: 2px !important;">
										<div class="col-xs-6 col-sm-6 col-md-6">
											<div class="li">
												<li>'.$file_arr[$m].'</li>
											</div>
										</div>
										<div class="col-xs-6 col-sm-6 col-md-6">
											<!--<div class="delete_file" id="delete_file" style="color:#0f243f; cursor:pointer;">&nbsp;</span>
											</div>-->
										</div>
									</div>';
									$m++;
								}
							}
							$output .= '</ul>
						</div>
					</div>
				</div>';
			}

	$output .= '</form>
		</div>
	</div>
</div>';

$_POST = array();
echo json_encode($output);
?>