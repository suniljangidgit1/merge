<?php

// echo '<pre>';print_r($_REQUEST); die;

$output = '<style type="text/css">
    .material-icons-outlined{
      font-size: 18px;
      position: relative;
      cursor: pointer;
    }

#participantTable .main-group{
	font-size: 12px;
}

#estimate_main_detailsPreview .panel-default .panel-heading{
    background-color: #ECF0F3;
    color: #000000 !important;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    /*font-weight: 600;*/
    padding: 6px 10px;
    font-size: 12px;
}

#estimate_main_detailsPreview .modal-header{
    padding: 15px;
    border-bottom: 0px solid #e5e5e5;
}

#estimate_main_detailsPreview .form-control{
    height: 30px;
    font-size: 12px;
    font-weight: 400;
}

#estimate_main_detailsPreview .panel{
  border-radius: 15px;
  border: 1px solid #dcdcdc;
  box-shadow: unset;
 }

 #estimate_main_detailsPreview .BillingFromCard,
 #estimate_main_detailsPreview .BillingToCard{
  border: 1px solid #DEDEDE;
    border-radius: 15px;
    padding: 35px;
    width: 63%;
    cursor: pointer;
 }

 #estimate_main_detailsPreview .BillingFromAddress,
 .BillingFrom_address_and_gst,
  #estimate_main_detailsPreview .BillingToAddress,
  .BillingTo_address_and_gst{
  	font-size: 12px;
  	width: 68%;
 }

 #estimate_main_detailsPreview .BillingFromAddress .form-group,
 #estimate_main_detailsPreview .BillingToAddress .form-group{
  	margin-bottom: 5px;
 }


 #estimate_main_detailsPreview .usericoncard{
  	font-size: 35px;
  	color: #337AB7;
 }

 #estimate_main_detailsPreview .billingcardtitle{
  	display: inline-block;
    margin-left: 10px;
    font-weight: 600;
    position: relative;
    top: -8px;
 }

 #estimate_main_detailsPreview .pr0{
  	padding-right: 0px;
 }

 #estimate_main_detailsPreview .overflowhide{
  	overflow: hidden;
 }

 #estimate_main_detailsPreview #Address_Details .form-group,
 #estimate_main_detailsPreview #Address_Details_BillTo .form-group{
    margin-bottom: 10px;
}

#estimate_main_detailsPreview #Address_Details .input-group-addon{
  	padding: 3px 7px;
}

#estimate_main_detailsPreview #participantTable td input[type=checkbox], 
#estimate_main_detailsPreview #participantTable th input[type=checkbox] {
    margin: 0;
    position: relative;
    top: 2px;
    width: 11px;
    height: 11px;
}

#estimate_main_detailsPreview #participantTable{
  	background: #ECF0F3;
  	margin-top: 20px;
  	margin-bottom: 0px;
}

#estimate_main_detailsPreview #participantTable .main_amount{
  	font-size: 12px;
}

#estimate_main_detailsPreview #participantTable .estimate_remove{
  	cursor: pointer;
}

#estimate_main_detailsPreview #estimate_billedto #addButtonRow .Estimate_add{
  	cursor: pointer;
  	color: #337AB7;
  	font-weight: 600;
}

#estimate_main_detailsPreview #participantTable_discounts .main_amount,
#estimate_main_detailsPreview #Calculate_discounts .main_amount{
  	font-size: 12px;
  	font-weight: 400;
  	display: inline-block;
	padding-left: 5px;
}

#estimate_main_detailsPreview #participantTable_discounts{
  background: #ECF0F3;
}

#estimate_main_detailsPreview #Calculate_discounts{
  background: #ECF0F3;
}

#estimate_main_detailsPreview #participantTable .custom-a11yselect-container,
#estimate_main_detailsPreview #Calculate_discounts .custom-a11yselect-container{
  margin-right: 0px;
}

#estimate_main_detailsPreview #participantTable.table>tbody>tr>td,
#estimate_main_detailsPreview #Calculate_discounts.table>tbody>tr>td{
  border-top: none !important;
  overflow: inherit !important;
}

.custom-a11yselect-container .custom-a11yselect-menu.custom-a11yselect-overflow#item_gst_discont0-menu,
.custom-a11yselect-container .custom-a11yselect-menu.custom-a11yselect-overflow#Calculate_rate-menu{
  max-height:80px !important;
}

#estimate_main_detailsPreview #Calculate_discounts{
  margin-bottom: 0px;
  font-size: 12px;
  color:#000;
}

#estimate_main_detailsPreview #participantTable_discounts.table>tbody>tr:last-child{
  border-bottom: 2px solid #ddd;
}

#estimate_main_detailsPreview #main_calculation .form-group{
  margin-bottom: 10px;
}

#estimate_main_detailsPreview #main_calculation .form-group:first-child{
  margin-top:15px;
}

#estimate_main_detailsPreview #main_calculation .form-group:last-child{
  background: #ECF0F3;
  font-weight: 800;
}

#estimate_main_detailsPreview .estimate_remove_discount,
#estimate_main_detailsPreview .estimate_remove_adddiscount{
  cursor: pointer;
}

#estimate_main_detailsPreview .width_20{
  width:22%;
}

#estimate_main_detailsPreview .width_15{
  width:15%;
}

#estimate_main_detailsPreview .width_10{
  width:10%;
}

#estimate_main_detailsPreview .width_5{
  width:5%;
}

#estimate_main_detailsPreview .estimateDiffBillingEntity,
#estimate_main_detailsPreview .estimateDiffcustomer{
  color: #337AB7;
    cursor: pointer;
    font-size: 14px;
}

#BillingFromAddress span,
#BillingToAddress span{
  white-space: pre-line;
}

@media screen and (max-width: 767px){
  #estimate_main_detailsPreview .BillingFromCard,
 #estimate_main_detailsPreview .BillingToCard{
  width: 100%;
 margin-bottom: 15px;
 }

 #estimate_main_detailsPreview .modal-content#estimate_main_detailsPreview .table-responsive{
  margin-bottom: 0px;
  border:none;
 }
}

.textarea-content
{
  height: 125px !important;
}

#EstimatePrviewModel #BillFromGST_streetPreview span,
#EstimatePrviewModel #BillToGST_addressPreview span{
	white-space: pre-line;
}
</style>
<script>
   $(".Estimate_Percentage").customA11ySelect();
   $(".Estimate_IGSTandCGST").customA11ySelect();
   $(".Calculate_IGSTandCGST").customA11ySelect();
   $(".DiscountPer").customA11ySelect();
   $(".diff_billing_entity").show();
   $(".diff_customer_link").show();
</script>
<div class="modal-dialog modal-lg">
	<div class="modal-content" id="estimate_main_detailsPreview">
		<div class="modal-header">
			<button type="button" id="close_button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Preview Estimate</h4>
		</div>
		<div class="modal-body">
			<form id="EstimatePreviewForm" method="post">
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default" id="estimate_billedfrom_preview">
							<div class="panel-heading">Billed From</div>
							<div class="panel-body" id="estimate_Address_Details_Preview">
								<div class="row">
                    				<div class="col-md-7">';
                    				// echo '<pre>';print_r($_REQUEST);die;
                    				// $fromemail = $_REQUEST['billingemailaddress'];
                    				// $fromemail = $_REQUEST['billingaddressemailid'];

                    				if(isset($_REQUEST['billingaddressemailid'])){
									    $fromemail = $_REQUEST['billingaddressemailid'];
									}
									if(isset($_REQUEST['billingemailaddress'])){
									    $fromemail = $_REQUEST['billingemailaddress'];
									}

									if((isset($_REQUEST['billingaddressemailid']) && $_REQUEST['billingaddressemailid']=="") || (isset($_REQUEST['billingemailaddress']) && $_REQUEST['billingemailaddress']=="")){
									    $fromemail = "";
									}

									// $fromphone = $_REQUEST['billingphoneno'];
									// $fromphone = $_REQUEST['billingaddresshphoneno'];

									if(isset($_REQUEST['billingphoneno'])){
									    $fromphone = $_REQUEST['billingphoneno'];
									}
									else if(isset($_REQUEST['billingaddresshphoneno'])){
									    $fromphone = $_REQUEST['billingaddresshphoneno'];
									}
									else{
									    $fromphone = "";
									}

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

									$street_from = ($_REQUEST['billing_address_street']) ? $_REQUEST['billing_address_street'].',' : '';
			                     	$city_from = ($_REQUEST['billing_address_city']) ? $_REQUEST['billing_address_city'].',' : '';
			                     	$state_from = ($_REQUEST['billing_address_state']) ? $_REQUEST['billing_address_state'].'-' : '';
			                     	$zipcode_from = ($_REQUEST['billing_address_postal_code']) ? $_REQUEST['billing_address_postal_code'] : '';
			                     	$gst_num_from = ($_REQUEST['billingaddressgstin']) ? $_REQUEST['billingaddressgstin'] : '';
			                     	
			                     	$address_from = $street_from.$city_from.$state_from.$zipcode_from;


                    			$output .= '<div class="BillingFrom_address_and_gst">
                    						<div class="form-group BillingFrom_gst_main">
                    							<div class="form-group BillingFromGSTDetails">
                    								<div class="form-group BillingFromGSTDetails" style="display: block;">
						                                <div id="BillFromGST_namePreview" class="form-group">
						                                	<span><b>'.$_REQUEST['billfromname'].'</b></span>
						                                </div>
						                                <div id="BillFromGST_streetPreview" class="form-group">
						                                	<span>'.$address_from.'</span>
						                                </div>';

						                 	if($fromemail_phone!=""){
						                        $output .= '<div id="BillFromGST_email_phonePreview" class="form-group">
						                                	<span>'.$fromemail_phone.'</span>
						                                </div>';
											}

											if($_REQUEST['billingaddressgstin']){
						                        $output .= '<div id="BillFromGST_numPreview" class="form-group">
						                                	<span><b>GSTIN: </b>'.$_REQUEST['billingaddressgstin'].'</span>
						                                </div>';
				                            }

				                        	if($_REQUEST['billingaddresspanno']!=""){
				                                $output .= '<div id="BillFromGST_pannoPreview" class="form-group">
				                                	<span><b>PAN: </b>'.$_REQUEST['billingaddresspanno'].'</span>
				                                </div>';
				                            }

	                                		if(isset($_REQUEST['billingfrom_udyamno'])){
						                        $output .= '<div id="BillFromGST_statePreview" class="form-group">
						                                	<span><b>UDYAM REGISTRATION NO.: </b>'.$_REQUEST['billingfrom_udyamno'].'</span>
						                                </div>';
											}

						                    $output .= '</div>
                    							</div>
                    						</div>
                    					</div>
                    				</div>
                    				<div class="col-md-5">
                                        <div class="row form-group">
                                            <label class="col-md-5 pr0"><span class="pull-right">Estimate number <span class="text-danger">*</span></span></label>
                                            <div class="col-md-7">
					                            <div class="">'.$_REQUEST['estimate_number'].'</div>
					                        </div>
                                        </div>
                                        <div class="row form-group">
											<label class="col-md-5 pr0"><span class="pull-right">P.O./S.O. number</span>
											</label>
											<div class="col-md-7">
												<div class="">'.$_REQUEST['po_so_number'].'</div>
											</div>
										</div>
										<div class="row form-group">
											<label class="col-md-5 pr0"><span class="pull-right">Estimate date</span>
											</label>
											<div class="col-md-7">
												<div id="datepicker" class="input-group date estimate_datepicker" data-date-format="dd-mm-yyyy">'.$_REQUEST['estimate_date'].'</div>
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
    					<div class="panel panel-default" id="estimate_billedto_preview">
    						<div class="panel-heading">Billed To</div>
    						<div class="panel-body" id="Address_Details_BillToPreview">
    							<div class="row">
      								<div class="col-md-7">
      									<div class="BillingTo_address_and_gst">
      										<div class="form-group BillingTo_gst_main">
  												<div class="form-group BillingToGSTDetails">
  													<div id="BillToGST_namePreview" class="form-group">
  														<span><b>'.$_REQUEST['billtoname'].'</b></span>
  													</div>';

						$street_to = ($_REQUEST['shipping_address_street']) ? $_REQUEST['shipping_address_street'].',' : '';
                     	$city_to = ($_REQUEST['shipping_address_city']) ? $_REQUEST['shipping_address_city'].',' : '';
                     	$state_to = ($_REQUEST['shipping_address_state']) ? $_REQUEST['shipping_address_state'].'-' : '';
                     	$zipcode_to = ($_REQUEST['shipping_address_postal_code']) ? $_REQUEST['shipping_address_postal_code'] : '';
                     	$gst_num_to = ($_REQUEST['shippingaddressgstin']) ? $_REQUEST['shippingaddressgstin'].',' : '';
                     	
                     	$address_to = $street_to.$city_to.$state_to.$zipcode_to;

                     	$billingto_udyamno = ($_REQUEST['billingto_udyamno']) ? $_REQUEST['billingto_udyamno'] : '';

						$toemail = $_REQUEST['shippingaddressemailid'];
						$tophone = $_REQUEST['shippingaddresshphoneno'];
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

			                                if($gst_num_to){
					                        	$output .= '<div id="BillToGST_gstPreview" class="form-group">
					                                	<span><b>GSTIN: </b>'.$gst_num_to.'</span>
					                                </div>';
				                            }


					                        if($_REQUEST['shippingaddresspanno']!=""){
					                        	$output .= '<div id="BillToGST_panPreview" class="form-group">
					                                	<span><b>PAN: </b>'.$_REQUEST['shippingaddresspanno'].'</span>
					                                </div>';
					                        }

					                	if($_REQUEST['billingto_udyamno']){
					                        $output .= '<div id="BillToGST_udyamPreview" class="form-group">
					                                	<span><b>UDYAM REGISTRATION NO.: </b>'.$_REQUEST['billingto_udyamno'].'</span>
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

									$count_items = count($_REQUEST['item_descr']);

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
									$total_estimate_value = 0;
									$estimate_calculated_disc_amt = 0;

									// echo '<pre>';print_r($_REQUEST);die;

									$selected_both_dropdowns = 0;

									for($i=0;$i<$count_items;$i++)
									{
										$flag = 0;
										$output .= '<tr class="main-group" style="border-top: 2px solid #ddd;">
											<td><span>'.$m.'</span></td>
											<td>'.$_REQUEST['item_descr'][$i].'</td>
											<td>'.$_REQUEST['item_hsn'][$i].'</td>
											<td>'.$_REQUEST['item_qty'][$i].'</td>
											<td>'.$_REQUEST['item_rate'][$i].'</td>
											<td>₹ '.number_format($_REQUEST['item_main_amount'][$i],2,'.','').'</td>
										</tr>
										<tr>
											<td></td>
											<td></td>
											<td class="width_20" style="font-size: 12px;font-weight: 600;">
												<span class="pull-right">- Discount (At item level)</span>
											</td>';

											$item_discount_type = ($_REQUEST['item_discount_type'][$i]) ? $_REQUEST['item_discount_type'][$i] : "Select Type";

											$item_discount_rate = ($_REQUEST['item_discount_rate'][$i]) ? $_REQUEST['item_discount_rate'][$i] : "";

											$discountamount = 0;

											if($_REQUEST['item_discount_type'][$i] == 'Percentage'){
		                                       $discountamount = $_REQUEST['calculated_discount'][$i];
		                                       $total_amount_after_discount += $discountamount;
		                                    }
		                                    if($_REQUEST['item_discount_type'][$i] == 'Amount'){
		                                       $discountamount = $_REQUEST['calculated_discount'][$i];
		                                       $total_amount_after_discount += $discountamount;
		                                    }

		                                    if(!$discountamount){
		                                        $discountamount_label = str_pad($discountamount, 4, "0", STR_PAD_LEFT).'.'.str_pad($discountamount, 2, "0", STR_PAD_RIGHT);
		                                        $discountamount = 0;
		                                    }
		                                    else{
		                                        $discountamount_label = number_format($discountamount,2,'.','');
		                                    }

		                                    if($_REQUEST['item_discount_type'][$i] == 'Select Type'){
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

					                        $item_gst_type = (isset($_REQUEST['item_gst_type'][$i]) && $_REQUEST['item_gst_type'][$i]!="Select Type") ? $_REQUEST['item_gst_type'][$i] : 'Select Type';

					                        if($item_gst_type==="IGST")
											{
												$gst_calculated_val = number_format($_REQUEST['item_igst_amount'][$i],2,'.','');
											}
											else if($item_gst_type==="CGST")
											{
												$gst_calculated_val = number_format($_REQUEST['item_cgst_amount'][$i],2,'.','');
											}
											else {
												$gst_calculated_val = "0000.00";
											}

					                        $output .= '<td class="width_15 GST_section" style="font-size:12px;">'.$item_gst_type.'</td>
					                        			<td class="width_10 rate_data" style="font-size:12px;">'.$_REQUEST['item_gst_discont'][$i].'%</td>
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

						if($_REQUEST['Estimate_Percentage_select']!=""){
							$estimate_discount = $_REQUEST['Estimate_Percentage_select'];
						}
						else {
							$estimate_discount = 'Select Type';
						}

						$estimate_gst_type = ($_REQUEST['estimate_gst_type']!="") ? $_REQUEST['estimate_gst_type'] : 'Select Type';
						

						if($_REQUEST['estimate_items_discount_selected']==1){
							$dis_est_disc_disp = 'style="display:none;"';
						}
						else {
							$dis_est_disc_disp = '';
						}
						$dis_est_sgst_style = 'style="display:none;"';
						if($_REQUEST['estimate_items_gst_type_selected']==1){
							$dis_est_gst_style = 'style="display:none;"';
						}
						else {
							$dis_est_gst_style = '';
						}

						if($_REQUEST['estimate_items_discount_selected']==1 && $_REQUEST['estimate_items_gst_type_selected']==1){
							$dis_est_levelstyle = 'style="padding:0px;margin-top:8px;background-color:#ffffff;"';
						}
						else {
							$dis_est_levelstyle = '';
						}

						$cgst_amount = $sgst_amount = $igst_amount = '0000.00'; 

						if($_REQUEST['estimate_gst_type'] == 'CGST'){
							$gst_amount = number_format($_REQUEST['estimate_cgst_amount'],2,'.','');
							$sgst_amount = number_format($_REQUEST['estimate_sgst_amount'],2,'.','');
							$dis_estSGST_style = '';
						}
						else if($_REQUEST['estimate_gst_type'] == 'IGST'){
							$gst_amount = number_format($_REQUEST['estimate_igst_amount'],2,'.','');
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

						if($_REQUEST['estimate_calculated_disc_amt']!=0){
							$est_tr_row = 'style="display:none;"';
						}
						else if($_REQUEST['estimate_calculated_disc_amt']!=""){
							$est_tr_row = 'style="display:none;"';
						}
						else {
							$est_tr_row = '';
						}


						if($_REQUEST['estimate_calculated_disc_amt']){
							$calculated_disc = number_format($_REQUEST['estimate_calculated_disc_amt'],2,'.','');
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
    					<div class="panel panel-default" id="estimate_calculationPreview">
    						<div class="panel-heading" '.$dis_est_levelstyle.'>
    							<div class="table-responsive">
    								<table class="table" id="Calculate_discountsPreview" style="'.$dis_est_disc_style.'">
    									<tr '.$dis_est_disc_disp.'>
    										<td></td>
											<td></td>
											<td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right">- Discount (At estimate level)</span>
											</td>
											<td class="width_15 discount_section">'.$estimate_discount.'</td>
						                    <td class="width_10">'.$_REQUEST['estimate_disc_amt'].'</td>
						                    <td class="width_15"><span class="main_amount">₹ '.$calculated_disc.'</span></td>
    									</tr>
    									<tr class="CGST_TR_section" '.$dis_est_gst_style.'>
    										<td></td>
											<td></td>
											<td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right">+ GST (At estimate level)</span>
											</td>
											<td class="width_15 GST_section">'.$estimate_gst_type.'</td>
											<td class="width_10 rate_data">'.$_REQUEST['calculate_rate'].'%</td>
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
					                      	<div class="col-xs-7 col-md-7"> <span class="estimate_subtotal">
				                                ₹ '.number_format($_REQUEST['estimate_subtotal_amount'],2,'.','').'
					                              </span>
					                      	</div>
					                    </div>';

					                if($_REQUEST['estimate_totaldiscount_amount']){
					                	$est_total_disc = number_format($_REQUEST['estimate_totaldiscount_amount'],2,'.','');
					                }
					                else {
					                	$est_total_disc = '0000.00';
					                }

					            $output .= '<div class="form-group form-control">
					                      	<label class="col-xs-5 col-md-5 pr0 control-label">Total discount</label>
					                      	<div class="col-xs-7 col-md-7"> <span class="estimate_total_discount">
				                                ₹ '.$est_total_disc.'
					                              </span>
					                      	</div>
					                    </div>';

					                    if($_REQUEST['estimate_totaltaxes_amount']!=0){
					                    	$total_taxes = number_format($_REQUEST['estimate_totaltaxes_amount'],2,'.','');
					                    }
					                    else {
					                    	$total_taxes = '0000.00';
					                    }
					                    
					               $output .= '<div class="form-group form-control">
					                      <label class="col-xs-5 col-md-5 pr0 control-label">Total taxes</label>
					                      <div class="col-xs-7 col-md-7"> <span class="estimate_total_taxes">
				                                ₹ '.$total_taxes.'
					                              </span>
					                      </div>
					                    </div>
					                    <div class="form-group form-control">
					                      	<label class="col-xs-5 col-md-5 pr0 control-label">Total amount</label>
					                      	<div class="col-xs-7 col-md-7"> <span class="estimate_total_amount">
				                                ₹ '.number_format($_REQUEST['estimatetotal_amount'],2,'.','').'
					                              </span>
					                      	</div>
					                    </div>
				                  	</div>
				                </div>
			              	</div>
    					</div>
    				</div>
    			</div>';

    			if($_REQUEST['estimate_terms_conditions']){
		    		$output .= '<div class="">
		    				<div class="col-md-6">
								<div class="panel panel-default" id="Terms_ConditionsPreview">
									<div class="panel-heading">Add Terms & Conditions</div>
										<div class="panel-body" id="">
											<div class="row">
												<div class="col-md-12">
												<div class="">'.$_REQUEST['estimate_terms_conditions'].'</div>
											</div>
										</div>
									</div>
								</div>
							</div>
		    			</div>';
    			}

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

$_REQUEST = array();
echo json_encode($output);

?>