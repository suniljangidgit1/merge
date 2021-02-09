<?php
session_start();
$user_name = $_SESSION['Login'];
error_reporting(~E_ALL);
//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id=$_GET['dataId'];
$sql1 = "SELECT * FROM estimate where id='$id'";
$result1 = mysqli_query($conn, $sql1);
$row1=mysqli_fetch_assoc($result1);

$account_id=$row1['account_id'];
$sql5= "SELECT * FROM account where id='$account_id'";
$result5=mysqli_query($conn,$sql5);
$row5=mysqli_fetch_assoc($result5);

$estimate_id=$row1['id'];
$sql2="select * from estimates_items where estimate_id='$estimate_id'";
$result2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_assoc($result2);

$sql12="select * from estimate_files where estimate_id='$id'";
$result12=mysqli_query($conn,$sql12);
$row12=mysqli_fetch_assoc($result12);

$sql4="select * from user where user_name='$user_name'";
$result4=mysqli_query($conn,$sql4);
$row4=mysqli_fetch_assoc($result4);
$user=$row4['user_name'];

$output = '<style type="text/css">
    .material-icons-outlined{
      font-size: 18px;
      position: relative;
      cursor: pointer;
      display : none;
    }

  #edit_estimate_main_details .panel-default .panel-heading{
    background-color: #ECF0F3;
    color: #000000 !important;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    font-weight: 600;
    padding: 6px 10px;
    font-size: 13px;
}

#edit_estimate_main_details .modal-header{
    padding: 15px;
    border-bottom: 0px solid #e5e5e5;
}

#edit_estimate_main_details .form-control{
    height: 30px;
    font-size: 12px;
    font-weight: 400;
}

#edit_estimate_main_details .panel{
  border-radius: 15px;
  border: 1px solid #dcdcdc;
  box-shadow: unset;
 }

 #edit_estimate_main_details .BillingFromCard,
 #edit_estimate_main_details .BillingToCard{
  border: 1px solid #DEDEDE;
    border-radius: 15px;
    padding: 35px;
    width: 63%;
    cursor: pointer;
 }

 #edit_estimate_main_details .BillingFromAddress,
 .BillingFrom_address_and_gst,
  #edit_estimate_main_details .BillingToAddress,
  .BillingTo_address_and_gst{
  font-size: 12px;
  width: 68%;
 }

 #edit_estimate_main_details .BillingFromAddress .form-group,
 #edit_estimate_main_details .BillingToAddress .form-group{
  margin-bottom: 5px;
 }


 #edit_estimate_main_details .usericoncard{
  font-size: 35px;
  color: #337AB7;
 }

 #edit_estimate_main_details .billingcardtitle{
  display: inline-block;
    margin-left: 10px;
    font-weight: 600;
    position: relative;
    top: -8px;
 }

 #edit_estimate_main_details .pr0{
  padding-right: 0px;
 }

 #edit_estimate_main_details .overflowhide{
  overflow: hidden;
 }

 #edit_estimate_main_details #edit_Address_Details .form-group,
 #edit_estimate_main_details #edit_Address_Details_BillTo .form-group{
    margin-bottom: 10px;
}

#edit_estimate_main_details #edit_Address_Details .input-group-addon{
  padding: 3px 7px;
}

#edit_estimate_main_details #edit_participantTable td input[type=checkbox], 
#edit_estimate_main_details #edit_participantTable th input[type=checkbox] {
    margin: 0;
    position: relative;
    top: 2px;
    width: 11px;
    height: 11px;
}

#edit_estimate_main_details #edit_participantTable{
  background: #ECF0F3;
  margin-top: 20px;
  margin-bottom: 0px;
}

#edit_estimate_main_details #edit_participantTable .main_amount{
  font-size: 12px;
}

#edit_estimate_main_details #edit_participantTable .estimate_remove{
  cursor: pointer;
}

#edit_estimate_main_details #estimate_billedto #edit_addButtonRow .edit_Estimate_add{
  cursor: pointer;
  color: #337AB7;
  font-weight: 600;
}

#edit_estimate_main_details #edit_participantTable_discounts .main_amount,
#edit_estimate_main_details #edit_Calculate_discounts .main_amount{
  font-size: 12px;
  font-weight: 400;
  display: inline-block;
    padding-left: 5px;
}

#edit_estimate_main_details #edit_participantTable_discounts{
  background: #ECF0F3;
}

#edit_estimate_main_details #edit_Calculate_discounts{
  background: #ECF0F3;
}

#edit_estimate_main_details #edit_participantTable .custom-a11yselect-container,
#edit_estimate_main_details #edit_Calculate_discounts .custom-a11yselect-container{
  margin-right: 0px;
}

#edit_estimate_main_details #edit_participantTable.table>tbody>tr>td,
#edit_estimate_main_details #edit_Calculate_discounts.table>tbody>tr>td{
  border-top: none !important;
  overflow: inherit !important;
}

.custom-a11yselect-container .custom-a11yselect-menu.custom-a11yselect-overflow#edit_item_gst_discont0-menu,
.custom-a11yselect-container .custom-a11yselect-menu.custom-a11yselect-overflow#edit_Calculate_rate-menu{
  max-height:80px !important;
}

#edit_estimate_main_details #edit_Calculate_discounts{
  margin-bottom: 0px;
  font-size: 12px;
  color:#000;
}

#edit_estimate_main_details #edit_participantTable_discounts.table>tbody>tr:last-child{
  border-bottom: 2px solid #ddd;
}

#edit_estimate_main_details #edit_main_calculation .form-group{
  margin-bottom: 10px;
}

#edit_estimate_main_details #edit_main_calculation .form-group:first-child{
  margin-top:15px;
}

#edit_estimate_main_details #edit_main_calculation .form-group:last-child{
  background: #ECF0F3;
  font-weight: 800;
}

#edit_estimate_main_details .estimate_remove_discount,
#edit_estimate_main_details .estimate_remove_adddiscount{
  cursor: pointer;
}

#edit_estimate_main_details .width_20{
  width:22%;
}

#edit_estimate_main_details .width_15{
  width:15%;
}

#edit_estimate_main_details .width_10{
  width:10%;
}

#edit_estimate_main_details .width_5{
  width:5%;
}

#edit_estimate_main_details .estimateDiffBillingEntity,
#edit_estimate_main_details .estimateDiffcustomer{
  color: #337AB7;
    cursor: pointer;
    font-size: 14px;
    display : none;
}

@media screen and (max-width: 767px){
  #edit_estimate_main_details .BillingFromCard,
 #edit_estimate_main_details .BillingToCard{
  width: 100%;
 margin-bottom: 15px;
 }

 #edit_estimate_main_details .modal-content#edit_estimate_main_details .table-responsive{
  margin-bottom: 0px;
  border:none;
 }
}

.textarea-content
{
  height: 125px !important;
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
';

//$output .= '<script src="../../client/js/financial_estimate_calculations_edit.js"></script>';

$output .='<div id="edit_estimate_main_details">
<form name="updateEstimateForm" id="updateEstimateForm" method="post" autocomplete="off">
            <div class="row">
              <div class="col-md-12">
                <div class="" style="margin-bottom: 15px;">
                  <input type="hidden" id="editId" name="recordId" value="'.$id.'" readonly="readonly">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-default" id="edit_estimate_billedfrom">
                  <div class="panel-heading">Billed From</div>
                  <div class="panel-body" id="edit_Address_Details">
                    <div class="row">
                      <div class="col-md-7">';
                     //echo '<pre>';print_r($row1);die;
                     $street = ($row1['billing_address_street']) ? $row1['billing_address_street'] : '';
                     $city = ($row1['billing_address_city']) ? $row1['billing_address_city'] : '';
                     $state = ($row1['billing_address_state']) ? $row1['billing_address_state'] : '';
                     $zipcode = ($row1['billing_address_postal_code']) ? $row1['billing_address_postal_code'] : '';
                     $gst_num = ($row1['billingaddressgstin']) ? $row1['billingaddressgstin'] : '';

                     $address = $street.', '.$city.', '.$state.' - '.$zipcode;

                     $fromemail = $row1['billingfromemail'];
                     $fromphone = $row1['billingfromphone'];

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

                     // When popup of edit estimate loads show
                     $output .= '<div id="edit_BillingFromAddress" class="BillingFromAddress">
                            <div id="edit_BillFromAddress_name" class="form-group"><span><b>'.$row1['billfromname'].'</b></span><input type="hidden" name="billfromname" id="edit_billfromname" value="'.$row1['billfromname'].'" readonly="readonly"></div>
                            <div id="edit_BillFromAddress_street" class="form-group"><span>'.$address.'</span>
                            <input type="hidden" name="billing_address_street" id="edit_billing_address_street" value="Office no.1, Tower no.2, Mayfair tower, Wakadewadi, Shivajinagar" readonly="readonly">
                            <input type="hidden" name="billing_address_city" id="edit_billing_address_city" value="'.$city.'" readonly="readonly">
                            <input type="hidden" name="billing_address_state" id="edit_billing_address_state" value="'.$state.'" readonly="readonly">
                            <input type="hidden" name="billing_address_postal_code" id="edit_billing_address_postal_code" value="'.$zipcode.'" readonly="readonly">
                            <input type="hidden" name="billingaddressgstin" id="edit_billingaddressgstin" value="'.$gst_num.'" readonly="readonly">
                            <input type="hidden" name="billingaddresspanno" id="edit_billingaddresspanno" value="'.$row1['billfrompanno'].'">
                            <input type="hidden" name="billingemailaddress" id="edit_billingemailaddress" value="'.$fromemail.'" />
                            <input type="hidden" name="billingphoneno" id="billingphoneno" value="'.$fromphone.'" />
                            <input type="hidden" name="billingfrom_udyamno" id="edit_billingfrom_udyamno" value="'.$row1['billingfrom_udyamno'].'">
                            </div>';

                     if($fromemail_phone!=""){
                        $output .= '<div id="edit_BillFromAddress_email_phone" class="form-group"><span>'.$fromemail_phone.'</span></div>';
                     }
                            
                     $output .= '<div id="edit_BillFromAddress_num" class="form-group"><span><b>GSTIN: </b>'.$gst_num.'</span></div>
                            <div id="edit_BillFromAddress_panno" class="form-group"><span><b>PAN: </b>'.$row1['billfrompanno'].'</span></div>';

                     // If udyam registration number is added then show
                     if($row1['billingfrom_udyamno']){
                        $output .= '<div id="edit_BillFromAddress_udyam" class="form-group"><span><b>UDYAM REGISTRATION NO.: </b>'.$row1['billingfrom_udyamno'].'</span></div>';
                     }

                     $output .= '<div class="form-group diff_billing_entity"><span class="estimateDiffBillingEntity">Choose a different Billing Entity</span></div>
                        </div>';
                  
                     // When change billing entity or gst number then show this
                     $output .= '<div id="BillingFromAddress_edit" class="BillingFromAddress" style="display: none;">
                            <div id="edit_BillFromAddress_name" class="form-group"></div>
                            <div id="edit_BillFromAddress_street" class="form-group"></div>
                            <div id="edit_BillFromAddress_email_phone" class="form-group"></div>
                            <div id="edit_BillFromAddress_num" class="form-group"></div>
                            <div id="edit_BillFromAddress_panno" class="form-group"></div>
                            <div id="edit_BillFromAddress_udyam" class="form-group"></div>
                            <div class="form-group diff_billing_entity"><span class="estimateDiffBillingEntity">Choose a different Billing Entity</span></div>
                        </div>
                        <div id="BillingFrom_address_and_gst_edit" class="BillingFrom_address_and_gst" style="display: none;">
                          <div class="form-group BillingFrom_address_main">
                            <select name="" id="edit_BillingFrom_addr" class="BillingFrom_address form-control" disabled="true">
                              <option value="">Select billing entity</option>
                            </select>
                          </div>
                          <div class="form-group BillingFrom_gst_main" style="display: none;">
                            <div class="form-group BillingFromGSTDetails_dropdown">
                                <select name="" id="edit_BillingFrom_gstno" class="BillingFrom_gst form-control" disabled="true">
                                    <option value="">Select GSTIN</option>
                                </select>
                            </div>
                            <div class="form-group BillingFromGSTDetails">
                                <div id="edit_BillFromGST_name" class="form-group"></div>
                                <div id="edit_BillFromGST_street" class="form-group"></div>
                                <div id="edit_BillFromGST_email_phone" class="form-group"></div>
                                <div id="edit_BillFromGST_num" class="form-group"></div>
                                <div id="edit_BillFromGST_panno" class="form-group"></div>
                                <div id="edit_BillFromGST_state" class="form-group"></div>
                                <div class="form-group diff_billing_entity"><span class="estimateDiffBillingEntity">Choose a different Billing Entity</span></div>
                            </div>
                          </div>
                        </div>';
                  

               $output .= '</div>
                      <div class="col-md-5">
                        <div class="row form-group">
                          <label class="col-md-5 pr0"><span class="pull-right">Estimate number</span>
                          </label>
                          <div class="col-md-7">
                            <div class="">
                              <input name="estimate_number" class="form-control" type="text" value="'.$row1["invoice_number"].'" readonly="readonly"/>
                            </div>
                          </div>
                        </div>
                        <div class="row form-group">
                          <label class="col-md-5 pr0"><span class="pull-right">P.O./S.O. number</span>
                          </label>
                          <div class="col-md-7">
                            <div class="">
                              <input name="po_so_number" class="form-control" type="text" value="'.$row1["po_order_no"].'" readonly="readonly"/>
                            </div>
                          </div>
                        </div>
                        <div class="row form-group">
                          <label class="col-md-5 pr0"><span class="pull-right">Estimate date</span>
                          </label>
                          <div class="col-md-7">
                            <div id="edit_datepicker" class="input-group " data-date-format="dd-mm-yyyy" style="width:100%">
                              <input name="estimate_date" class="form-control" type="text" value="'.date("d/m/Y", strtotime($row1["date"])).'" readonly="readonly" />
                            </div>
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
                <div class="panel panel-default" id="estimate_billedto">
                  <div class="panel-heading">Billed To</div>
                  <div class="panel-body" id="edit_Address_Details_BillTo">
                    <div class="row">
                      <div class="col-md-7">';

                     $street_to = ($row1['shipping_address_street']) ? $row1['shipping_address_street'] : '';
                     $city_to = ($row1['shipping_address_city']) ? $row1['shipping_address_city'] : '';
                     $state_to = ($row1['shipping_address_state']) ? $row1['shipping_address_state'] : '';
                     $zipcode_to = ($row1['shipping_address_postal_code']) ? $row1['shipping_address_postal_code'] : '';
                     $gst_num_to = ($row1['shippingaddressgstin']) ? $row1['shippingaddressgstin'] : '';

                     $address_to = $street_to.', '.$city_to.', '.$state_to.' - '.$zipcode_to;

                     $billingto_udyamno = ($row1['billingto_udyamno']) ? $row1['billingto_udyamno'] : '';

                     $toemail = $row1['billingtoemail'];
                     $tophone = $row1['billingtophone'];
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

                  $output .= '<div id="edit_BillingToAddress" class="BillingToAddress">
                          <div id="edit_BillToAddress_name" class="form-group"><span><b>'.$row1['billtoname'].'</b></span><input type="hidden" name="billtoname" id="edit_billtoname" value="'.$row1['billtoname'].'" readonly="readonly"></div>
                          <div id="edit_BillToAddress_street" class="form-group"><span>'.$address_to.'</span>
                          <input type="hidden" name="shipping_address_street" id="edit_shipping_address_street" value="'.$street_to.'"  readonly="readonly"/>
                          <input type="hidden" name="shipping_address_city" id="edit_shipping_address_city" value="'.$city_to.'" readonly="readonly">
                          <input type="hidden" name="shipping_address_state" id="edit_shipping_address_state" value="'.$state_to.'"  readonly="readonly"/>
                          <input type="hidden" name="shipping_address_postal_code" id="edit_shipping_address_postal_code" value="'.$zipcode_to.'"  readonly="readonly"/>
                          <input type="hidden" name="shippingaddressgstin" id="edit_shippingaddressgstin" value="'.$gst_num_to.'"  readonly="readonly"/>
                          <input type="hidden" name="shippingaddresspanno" id="edit_shippingaddresspanno" value="'.$row1['billtopanno'].'" readonly="readonly"/>
                          <input type="hidden" name="shippingaddressemailid" id="edit_shippingaddressemailid" value="'.$toemail.'" readonly="readonly"/>
                          <input type="hidden" name="shippingaddresshphoneno" id="edit_shippingaddresshphoneno" value="'.$tophone.'" readonly="readonly"/>
                          <input type="hidden" name="billingto_udyamno" id="edit_billingto_udyamno" value="'.$row1['billingto_udyamno'].'" readonly="readonly"/>
                          </div>';

                     $output .= '<div id="edit_BillToAddress_email_phone" class="form-group"><span>'.$toemail_phone.'</span></div>';

                     $output .= '<div id="edit_BillToAddress_num" class="form-group"><span><b>GSTIN: </b>'.$gst_num_to.'</span></div>
                          <div id="edit_BillToAddress_panno" class="form-group"><span><b>PAN: </b>'.$row1['billtopanno'].'</span></div>';

                  // If udyam registration number is added then show
                  if($row1['billingto_udyamno']){
                     $output .= '<div id="edit_BillToAddress_udyam" class="form-group"><span><b>UDYAM REGISTRATION NO.: </b>'.$row1['billingto_udyamno'].'</span></div>';
                  }

                  $output .= '<div class="form-group diff_customer_link"><span class="estimateDiffcustomer">Choose a different customer</span></div>
                        </div>';    


                  $output .= '<div id="BillingToAddress_edit" class="BillingToAddress" style="display: none;">
                          <div id="edit_BillToAddress_name" class="form-group"></div>
                          <div id="edit_BillToAddress_street" class="form-group"></div>
                          <div id="edit_BillToAddress_email_phone" class="form-group"></div>
                          <div id="edit_BillToAddress_num" class="form-group"></div>
                          <div id="edit_BillToAddress_panno" class="form-group"></div>
                          <div id="edit_BillToAddress_udyam" class="form-group"></div>
                          <div class="form-group diff_customer_link"><span class="estimateDiffcustomer">Choose a different customer</span></div>
                        </div>
                        <div class="BillingTo_address_and_gst" style="display: none;">
                          <div class="form-group BillingTo_address_main">
                            <select name="" id="edit_BillingTo_addr" class="BillingTo_address form-control" disabled="true">
                              <option value="">Select Customer</option>
                            </select>
                          </div>
                          <div class="form-group BillingTo_gst_main" style="display: none;">
                            <div class="form-group BillingToGSTDetails_dropdown">
                              <select name="" id="edit_BillingTo_gstno" class="BillingTo_gst form-control" disabled="true">
                                <option value="">Select GSTIN</option>
                              </select>
                            </div>
                            <div class="form-group BillingToGSTDetails">
                                <div id="edit_BillToGST_name" class="form-group"></div>
                                <div id="edit_BillToGST_address" class="form-group"></div>
                                <div id="edit_BillToGST_email_phone" class="form-group"></div>
                                <div id="edit_BillToGST_gst" class="form-group"></div>
                                <div id="edit_BillToGST_pan" class="form-group"></div>
                                <div id="edit_BillToGST_udyam" class="form-group"></div>
                                <div class="form-group diff_customer_link"><span class="estimateDiffcustomer">Choose a different customer</span></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="table-responsive">
                        <table class="table" id="edit_participantTable">
                          <thead>
                            <tr>
                              <th>
                                <input type="checkbox" class="checkbox header_checkbox" style="display:none">
                              </th>
                              <th class="text-center">S.N</th>
                              <th class="text-center">Item description</th>
                              <th class="width_15 text-center">HSN/SAC</th>
                              <th class="width_10 text-center">Quantity</th>
                              <th class="width_10 text-center">Rate (₹)</th>
                              <th>Amount (₹)</th>
                              <th>
                              </th>
                            </tr>
                          </thead>
                          <tbody class="edit_participantRow">';
                           $estimate_id=$row1['id'];
                           $sql2="select * from estimates_items where estimate_id='$estimate_id'";
                           $result2=mysqli_query($conn,$sql2);
                           $total_items_num=mysqli_num_rows($result2);
                           $count=0;
                           $count2=0;
                           $total_amount=0;
                           $total_amount_taxes=0;
                           $total_amount_after_discount=0;
                           $igst = 0;
                           $cgst = 0;
                           $sgst = 0;
                           $total_tax_amount = '0000.00';
                           $edit_total_estimate_value = 0;
                           $edit_estimate_calculated_disc_amt = 0;

                           $output .= '<input type="hidden" name="edit_total_items" id="edit_total_items" value="'.$total_items_num.'" readonly="readonly"/>';

                           while($row2=mysqli_fetch_assoc($result2))
                           {  
                              $quantity = ($row2['quantity']!=0) ? $row2['quantity'] : "";
                              $rate = ($row2['rate']!=0) ? $row2['rate'] : "";
                              $amount = ($row2['amount']!=0) ? $row2['amount'] : "";

                               $output .= '<tr class="main-group">
                                    <td>
                                      <input type="checkbox" class="checkbox sub_checkbox" style="display:none">
                                    </td>
                                    <td class="sno"><span>1</span>
                                    </td>
                                    <td>
                                      <input name="edit_item_descr[]" id="edit_item_descr0" type="text" value="'.$row2['description'].'" class="form-control item_descr" readonly="readonly">
                                    </td>
                                    <td>
                                      <input name="edit_item_hsn[]" id="edit_item_hsn0" type="text" value="'.$row2['hsn'].'" class="form-control" readonly="readonly">
                                    </td>
                                    <td>
                                      <input name="edit_item_qty[]" id="edit_item_qty0" type="text" value="'.$quantity.'" class="form-control item_qty" onkeypress="return event.charCode >= 48 && event.charCode <= 57" readonly="readonly">
                                    </td>
                                    <td>
                                      <input name="edit_item_rate[]" id="edit_item_rate0" type="text" value="'.$rate.'" class="form-control item_rate" onkeypress="return event.charCode >= 48 && event.charCode <= 57" readonly="readonly">
                                    </td>
                                    <td>
                                      <input type="text" class="form-control main_amount" name="edit_item_main_amount[]" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="'.$amount.'" readonly="readonly" />
                                    </td>
                                    <td>  
                                    </td>
                                  </tr>';

                                  if($row2["discounttype"]===""){
                                      $row2["discounttype"] = "Select Type";
                                  }
                                 
                                 // Make discount type dropdown selected
                                 $output .= '<script>
                                       $(document).ready(function(){
                                          var discounttypeVal = "'.$row2["discounttype"].'";
                                          
                                          if(discounttypeVal){
                                              if(discounttypeVal!="Select Type"){ 
                                                  $("#edit_item_discount_type'.$count.'-menu").find(".custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
                                              }';

                                  $output .= '$("#edit_item_discount_type'.$count.'-button .custom-a11yselect-text").text(discounttypeVal);
                                              $("#edit_item_discount_type'.$count.'-menu li[data-val='."'".$row2["discounttype"]."'".']").addClass("custom-a11yselect-focused");
                                              $("#edit_item_discount_type'.$count.'-menu li[data-val='."'".$row2["discounttype"]."'".']").addClass("custom-a11yselect-selected");

                                              if(discounttypeVal!="Select Type"){
                                                 //$("#edit_Calculate_discounts").find(".CGST_TR_section").hide();
                                                 //$("#edit_Calculate_discounts").find(".SGST_Discount").hide();
                                              }
                                          }
                                       });
                                     </script>';

                           $output .= '<tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right">- Discount (At item level)</span>
                                    </td>
                                    <td class="width_15 discount_section">
                                      <select name="edit_item_discount_type[]" id="edit_item_discount_type'.$count.'" class="Estimate_Percentage form-control" disabled>
                                        <option value="">Select Type</option>
                                        <option value="Percentage">Percentage</option>
                                        <option value="Amount">Amount</option>
                                      </select>
                                    </td>
                                    <td class="width_10">
                                      <input name="edit_item_discount_rate[]" id="edit_item_discount_rate'.$count.'" type="text" value="'.$row2['discountvalue'].'" class="form-control rate" onkeypress="return event.charCode >= 48 && event.charCode <= 57" readonly="readonly">
                                    </td>';

                                    if($row2['discounttype'] == 'Percentage'){
                                       $discountamount = $row2['discountamount'];
                                       $total_amount_after_discount += $discountamount;
                                    }
                                    if($row2['discounttype'] == 'Amount'){
                                       $discountamount = $row2['discountvalue'];
                                       $total_amount_after_discount += $discountamount;
                                    }

                                    if(!$discountamount){
                                        $discountamount_label = str_pad($discountamount, 4, "0", STR_PAD_LEFT).'.'.str_pad($discountamount, 2, "0", STR_PAD_RIGHT);
                                        $discountamount = 0;
                                    }
                                    else{
                                        $discountamount_label = number_format($discountamount,2,'.','');
                                    }

                                    if($row2['discounttype'] == 'Select Type'){
                                       $display_delete_icon = ' style="display: none;"';
                                    }
                                    else {
                                       $display_delete_icon = ' style="display: block;"';
                                    }

                              $output .= '<td class="width_15"><span class="main_amount">₹ '.$discountamount_label.' <input name="calculated_discount[]" type="hidden" class="calculated_discount" value="'.$discountamount.'" readonly="readonly"></span>
                                    </td>
                                    <td class="width_10">
                                    </td>
                                  </tr>
                                  <tr class="CGST_TR_section">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right">+ GST (At item level)</span>
                                    </td>';

                              if($row2['gst_rate']!=0){

                                 if($row2['igst']!=0){
                                    $gst_type = 'IGST';
                                    $gst_total_rate = $row2['gst_rate'];
                                    $igst = $row2['igst'];
                                    $igst_label = ($row2['igst']) ? $row2['igst'] : '0000.00';
                                    $total_amount_taxes += $row2["igst"];
                                 }

                                 if($row2['cgst']!=0 && $row2['sgst']!=0){
                                    $gst_type = 'CGST';
                                    $gst_total_rate = $row2['gst_rate'];
                                    $cgst = $row2['cgst'];
                                    $cgst_label = ($row2['cgst']) ? $row2['cgst'] : '0000.00';
                                    $sgst = $row2['sgst'];
                                    $sgst_label = ($row2['sgst']) ? $row2['sgst'] : '0000.00';
                                    $total_amount_taxes += $row2["cgst"] + $row2["sgst"];
                                 }
                              }
                              else{
                                 $gst_type = 'Select Type';
                                 $gst_total_rate = 0;
                                 $igst_label = $cgst_label = $sgst_label = '0000.00';
                              }

                              // Make GST type & rate dropdown selected
                              $output .= '<script>
                                 $(document).ready(function(){
                                    var gsttypeVal = "'.$gst_type.'";
                                    if(gsttypeVal)
                                    {
                                        if(gsttypeVal!="Select Type"){
                                           $("#edit_item_gst_type'.$count.'-menu").find(".custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
                                           //$("#edit_Calculate_discounts .CGST_TR_section").hide();
                                        }
                                        $("#edit_item_gst_type'.$count.'-button .custom-a11yselect-text").text(gsttypeVal);
                                        $("#edit_item_gst_type'.$count.'-menu li[data-val='."'".$gst_type."'".']").addClass("custom-a11yselect-focused");
                                        $("#edit_item_gst_type'.$count.'-menu li[data-val='."'".$gst_type."'".']").addClass("custom-a11yselect-selected");

                                        if(gsttypeVal=="CGST"){
                                           $("#edit_SGST_Discount").show();
                                           $("#edit_Calculate_discounts").find(".CGST_TR_section").hide();
                                           $("#edit_Calculate_discounts").find(".SGST_Discount").hide();
                                        }

                                        var gstrateVal = "'.$gst_total_rate.'";
                                        if(gstrateVal!="Select Type"){
                                            $("#edit_item_gst_discont'.$count.'-menu").find(".custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
                                        }
                                        $("#edit_item_gst_discont'.$count.'-button .custom-a11yselect-text").text(gstrateVal+"%");
                                        $("#edit_item_gst_discont'.$count.'-menu li[data-val="+gstrateVal+"]").addClass("custom-a11yselect-focused");
                                        $("#edit_item_gst_discont'.$count.'-menu li[data-val="+gstrateVal+"]").addClass("custom-a11yselect-selected");
                                    }
                                 });
                               </script>';


                              $output .= '<td class="width_15 GST_section">
                                      <select name="edit_item_gst_type[]" id="edit_item_gst_type'.$count.'" class="Estimate_IGSTandCGST common_Estimate_IGSTandCGST form-control" disabled="true">
                                        <option value="">Select Type</option>
                                        <option value="IGST">IGST</option>
                                        <option value="CGST">CGST</option>
                                      </select>
                                    </td>
                                    <td class="width_10 rate_data">
                                      <select name="edit_item_gst_discont[]" id="edit_item_gst_discont'.$count.'" class="DiscountPer form-control" disabled="true">
                                        <option value="0">0%</option>
                                        <option value="1">1%</option>
                                        <option value="2">2%</option>
                                        <option value="3">3%</option>
                                        <option value="5">5%</option>
                                        <option value="6">6%</option>
                                        <option value="12">12%</option>
                                        <option value="18">18%</option>
                                        <option value="28">28%</option>
                                      </select>
                                      <input type="hidden" class="item_igst_amount" name="edit_item_igst_amount[]" value="'.$igst.'" readonly="readonly"/>
                                      <input type="hidden" class="item_cgst_amount" name="edit_item_cgst_amount[]" value="'.$cgst.'" readonly="readonly"/>
                                      <input type="hidden" class="item_sgst_amount" name="edit_item_sgst_amount[]" value="'.$sgst.'" readonly="readonly"/>
                                    </td>';

                                    if($igst!=0){
                              $output .= '<td class="width_15"><span class="main_amount">₹ '.$igst_label.'</span>
                                    </td>';
                                    $display1 = ' style="display: block;"';
                                    $display2 = ' style="display: none;"';
                                 }
                                 else{
                              $output .= '<td class="width_15"><span class="main_amount">₹ '.$cgst_label.'</span>
                                    </td>';
                                    if($gst_type!='Select Type'){
                                       $display1 = ' style="display: block;"';
                                       $display2 = ' style="display: block;"';
                                    }
                                 }

                                 if($gst_type=='Select Type'){
                                    $display1 = ' style="display: none;"';
                                    $display2 = ' style="display: none;"';
                                 }

                              $output .= '<td class="width_10">
                                    </td>
                                  </tr>
                                  <tr id="edit_SGST_Discount" class="SGST_Discount" style="display: none;">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right"></span>
                                    </td>
                                    <td class="width_15">
                                      <input name="edit_SGST" value="SGST" class="SGST form-control" type="text" readonly="readonly">
                                    </td>
                                    <td class="width_10 rate_data">
                                      <!--<select name="edit_item_sgst_discount[]" id="edit_item_sgst_discount0" class="DiscountPer form-control " disabled="true">
                                        <option value="">None</option>
                                        <option value="18%">18%</option>
                                        <option value="19%">19%</option>
                                      </select>-->
                                    </td>
                                    <td class="width_15"><span class="main_amount">₹ '.$sgst_label.'</span>
                                    </td>
                                    <td class="width_10">
                                    </td>
                                  </tr>';

                                  $edit_total_estimate_value += (float)$amount - (float)$row2['discountvalue'];
                                  $edit_estimate_calculated_disc_amt += (float)$row2['discountvalue'];

                              $count++;
                           }
                           
                     $output .= '
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div id="edit_addButtonRow">
                          <input type="hidden" name="items_selected_gst_type" id="edit_items_selected_gst_type" value="" readonly="readonly">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default" id="edit_estimate_calculation">
              <div class="panel-heading">
                <div class="table-responsive">
                  <table class="table" id="edit_Calculate_discounts">
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right">- Discount (At estimate level)</span>
                      </td>
                      <td class="width_15 discount_section">
                        <script>
                           $(document).ready(function(){
                              var discounttypeVal = "'.$row1["discounttype"].'";
                              if(discounttypeVal!="Select Type"){
                                  $("#edit_Estimate_Percentage_select-menu").find(".custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
                              }
                              $("#edit_Estimate_Percentage_select-button .custom-a11yselect-text").text(discounttypeVal);
                              $("#edit_Estimate_Percentage_select-menu li[data-val='."'".$row1["discounttype"]."'".']").addClass("custom-a11yselect-focused");
                              $("#edit_Estimate_Percentage_select-menu li[data-val='."'".$row1["discounttype"]."'".']").addClass("custom-a11yselect-selected");
                           });
                        </script>
                        <select name="Estimate_Percentage_select" id="edit_Estimate_Percentage_select" class="Estimate_Percentage form-control" disabled="true">
                          <option value="">Select Type</option>
                          <option value="Percentage">Percentage</option>
                          <option value="Amount">Amount</option>
                        </select>
                      </td>
                      <td class="width_10">';
                      
                       // If Estimate level discount rate & gst rate present
                      $estimate_disc_rate = ($row1["rate"]!=0 || $row1["rate"]!="") ? $row1["rate"] : 0;
                      $estimate_gst_rate = ($row1["gst_rate"]!=0 || $row1["gst_rate"]!="") ? $row1["gst_rate"] : 0;

                      if($row1["discounttype"] === 'Percentage'){ // If Estimate level discount type is Percentage
                          $estimate_disc_input_val = $row1["discountamount"];
                          $estimate_disc_amt = $estimate_disc_amt_label = number_format($row1["discountamount"],2,'.','');
                          $disp_style = ' style="display: block;"';
                      }
                      else if($row1["discounttype"] === 'Amount'){ // If Estimate level discount type is Amount
                          $estimate_disc_input_val = $row1["discountamount"];
                          $estimate_disc_amt = $estimate_disc_amt_label = number_format($row1["discountamount"],2,'.','');
                          $disp_style = ' style="display: block;"';
                      }
                      else { // If Estimate level discount type not present
                          $estimate_disc_input_val = '';  
                          $estimate_disc_amt = '';
                          $estimate_disc_amt_label = '0000.00';
                          $disp_style = ' style="display: none;"';
                      }

                      if($row1["igst"]!=0){ // If Estimate level IGST present
                          $estimate_igst_label = number_format($row1["igst"], 2, '.', '');
                          $estimate_igst = $row1["igst"];
                          $estimate_cgst = $estimate_sgst = 0;
                      }
                      else if($row1["c_g_s_t"]!=0){ // If Estimate level CGST present
                          $estimate_igst = 0;
                          $estimate_cgst_label = number_format($row1["c_g_s_t"], 2, '.', '');
                          $estimate_cgst = $row1["c_g_s_t"];
                          $estimate_sgst_label = number_format($row1["s_g_s_t"], 2, '.', '');
                          $estimate_sgst = $row1["s_g_s_t"];
                      }
                      else {
                          $estimate_igst = $estimate_cgst = $estimate_sgst = 0;
                          $estimate_cgst_label = $estimate_sgst_label = $estimate_igst_label = '0000.00';
                      }

                      // Shows total discount amount in summary
                      if($edit_estimate_calculated_disc_amt===0){
                          $check_estimate_calculated_disc_amt = ($row1["discountamount"]!=0) ? $row1["discountamount"] : 0;

                          if($check_estimate_calculated_disc_amt===0){
                            $total_discountvalue = str_pad($edit_estimate_calculated_disc_amt, 4, "0", STR_PAD_LEFT).'.'.str_pad($edit_estimate_calculated_disc_amt, 2, "0", STR_PAD_RIGHT);
                          }
                          else {
                            $total_discountvalue = number_format($check_estimate_calculated_disc_amt,2,'.','');
                          }
                      }
                      else {
                          $total_discountvalue = number_format($edit_estimate_calculated_disc_amt,2,'.','');
                      }

                  $output .= '<input type="hidden" id="hidden_estimate_discount_type" value="'.$row1['discounttype'].'" readonly="readonly"/>
                        <input type="hidden" id="hidden_estimate_discount_rate" value="'.$estimate_disc_input_val.'" readonly="readonly" />
                        <input type="hidden" id="hidden_estimate_gst_type" value="'.$row1["g_s_t"].'" />
                        <input type="hidden" id="hidden_estimate_gst_rate" value="'.$estimate_gst_rate.'" readonly="readonly"/>
                        <input type="hidden" id="hidden_estimate_igst_amt" value="'.$estimate_igst.'" readonly="readonly"/>
                        <input type="hidden" id="hidden_estimate_cgst_amt" value="'.$estimate_cgst.'"readonly="readonly" />
                        <input type="hidden" id="hidden_estimate_sgst_amt" value="'.$estimate_sgst.'" readonly="readonly"/>
                        <input type="hidden" id="hidden_estimate_igst_label" value="'.$estimate_igst_label.'" readonly="readonly"/>
                        <input type="hidden" id="hidden_estimate_cgst_label" value="'.$estimate_cgst_label.'" readonly="readonly"/>
                        <input type="hidden" id="hidden_estimate_sgst_label" value="'.$estimate_sgst_label.'" readonly="readonly"/>
                        <input name="estimate_disc_amt" id="edit_estimate_disc_amt" type="text" value="'.$estimate_disc_input_val.'" class="form-control rate" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  readonly="readonly">
                      <input type="hidden" name="estimate_calculated_disc_amt" id="edit_estimate_calculated_disc_amt" value="'.$total_discountvalue.'" readonly="readonly"/>
                      </td>
                      <td class="width_15"><span class="main_amount">₹ '.$estimate_disc_amt_label.'</span>
                      </td>
                      <td class="width_10">
                      </td>
                      <script>
                         $(document).ready(function(){
                            var gsttypeVal = "'.$row1["g_s_t"].'";

                            if(gsttypeVal!="Select Type"){
                                $("#edit_Calculate_IGSTandCGST_select-menu").find(".custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
                                if(gsttypeVal=="IGST"){
                                    $("#edit_Calculate_discounts").find(".CGST_TR_section").show();
                                }
                                if(gsttypeVal=="CGST"){
                                    $("#edit_Calculate_discounts").find(".CGST_TR_section").show();
                                    $("#edit_Calculate_discounts").find(".SGST_Discount").show();
                                }
                            }
                            $("#edit_Calculate_IGSTandCGST_select-button .custom-a11yselect-text").text(gsttypeVal);
                            $("#edit_Calculate_IGSTandCGST_select-menu li[data-val='."'".$row1["g_s_t"]."'".']").addClass("custom-a11yselect-focused");
                            $("#edit_Calculate_IGSTandCGST_select-menu li[data-val='."'".$row1["g_s_t"]."'".']").addClass("custom-a11yselect-selected");

                            var estimate_gstrateVal = "'.$estimate_gst_rate.'";
                            if(estimate_gstrateVal!="Select Type"){
                                $("#edit_Calculate_rate-menu").find(".custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
                            }
                            $("#edit_Calculate_rate-button .custom-a11yselect-text").text(estimate_gstrateVal+"%");
                            $("#edit_Calculate_rate-menu li[data-val="+estimate_gstrateVal+"]").addClass("custom-a11yselect-focused");
                            $("#edit_Calculate_rate-menu li[data-val="+estimate_gstrateVal+"]").addClass("custom-a11yselect-selected");
                         });
                      </script>
                    </tr>
                    <tr class="CGST_TR_section">
                      <td></td>
                      <td></td>
                      <td></td>
                      <td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right">+ GST (At estimate level)</span>
                      </td>
                      <td class="width_15 GST_section">
                        <select name="estimate_gst_type" id="edit_Calculate_IGSTandCGST_select" class="Calculate_IGSTandCGST common_Estimate_IGSTandCGST form-control Estimate_IGSTandCGST" disabled="true">
                          <option value="">Select Type</option>
                          <option disabled="disabled" value="IGST">IGST</option>
                          <option disabled="disabled" value="CGST">CGST</option>
                        </select>
                      </td>
                      <td class="width_10 rate_data">
                        <select name="calculate_rate" id="edit_Calculate_rate" class="DiscountPer form-control" disabled="true">
                          <option value="0">0%</option>
                          <option value="1">1%</option>
                          <option value="2">2%</option>
                          <option value="3">3%</option>
                          <option value="5">5%</option>
                          <option value="6">6%</option>
                          <option value="12">12%</option>
                          <option value="18">18%</option>
                          <option value="28">28%</option>
                        </select>
                        <input type="hidden" class="estimate_igst_amount" name="estimate_igst_amount" value="'.$estimate_igst.'" readonly="readonly"/>
                        <input type="hidden" class="estimate_cgst_amount" name="estimate_cgst_amount" value="'.$estimate_cgst.'" readonly="readonly"/>
                        <input type="hidden" class="estimate_sgst_amount" name="estimate_sgst_amount" value="'.$estimate_sgst.'" readonly="readonly"/>
                      </td>
                      <td class="width_15"><span class="main_amount">₹ '.$estimate_cgst_label.'</span>
                      </td>
                      <td class="width_10">
                      </td>
                    </tr>
                    <tr id="edit_SGST_Calculate" class="SGST_Discount" style="display: none;">
                      <td></td>
                      <td></td>
                      <td></td>
                      <td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right"></span>
                      </td>
                      <td class="width_15">
                        <input name="SGST" value="SGST" class="SGST form-control" type="text" readonly="readonly">
                      </td>
                      <td class="width_10 rate_data">
                        <!--<select name="SGST_Calculate_rate" id="edit_SGST_Calculate_rate" class="DiscountPer form-control" disabled="true">
                          <option value="">None</option>
                          <option value="18%">18%</option>
                          <option value="19%">19%</option>
                        </select>-->
                      </td>
                      <td class="width_15"><span class="main_amount">₹ '.$estimate_sgst_label.'</span>
                      </td>
                      <td class="width_10">
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="panel-body" id="edit_Address_Details_Calculation">
                <div class="row" style="border-bottom: 1px solid #ddd;padding-bottom: 10px;">
                  <div class="col-md-12">
                    <div id="edit_CalculateBtn"> <span>
                            <center>
                              <div class="form-group">
                              </div>
                              <input type="hidden" name="total_estimate_val" id="edit_total_estimate_value" value="0" readonly="readonly"/>
                              <input type="hidden" name="estimate_summary_value" id="edit_estimate_summary_value" value="0" readonly="readonly"/>
                            </center>
                          </span>
                    </div>
                  </div>
                </div>
                <div class="row" id="edit_main_calculation">
                  <div class="col-xs-12 col-md-offset-8 col-md-4">
                    <div class="form-group form-control">
                      <label class="col-xs-5 col-md-5 pr0 control-label">Subtotal</label>
                      <div class="col-xs-7 col-md-7"> <span class="estimate_subtotal">
                                ₹ '.number_format($row1['sub_total'],2,'.','').'
                              </span><input type="hidden" name="estimate_subtotal_amount" id="edit_estimate_subtotal_amount" value="'.$row1['sub_total'].'" readonly="readonly">
                      </div>
                    </div>
                    <div class="form-group form-control">
                      <label class="col-xs-5 col-md-5 pr0 control-label">Total discount</label>
                      <div class="col-xs-7 col-md-7"> <span class="estimate_total_discount">
                                ₹ '.$total_discountvalue.'
                              </span><input type="hidden" name="estimate_totaldiscount_amount" id="edit_estimate_totaldiscount_amount" value="'.$row1['discountvalue'].'" readonly="readonly">
                      </div>
                    </div>';
                    if(!$total_amount_taxes){ // If item level discount is not given
                        $taxes_total = 0;
                        if($estimate_igst){
                            $taxes_total = $estimate_igst;
                        }
                        if($estimate_cgst){
                            $taxes_total = $estimate_cgst + $estimate_sgst;
                        }

                        if(!$taxes_total){
                            $total_tax_amount = str_pad($total_amount_taxes, 4, "0", STR_PAD_LEFT).'.'.str_pad($total_amount_taxes, 2, "0", STR_PAD_RIGHT);
                        }
                        else{
                            $total_tax_amount = $taxes_total;
                            $total_tax_amount_label = number_format($taxes_total,2,'.','');
                        }
                    }
                    else{
                        $total_tax_amount = $total_amount_taxes;
                        $total_tax_amount_label = number_format($total_amount_taxes,2,'.','');
                    }

                    $total_amt = $row1['sub_total'] - $total_discountvalue + $total_tax_amount;
                    
               $output .= '<div class="form-group form-control">
                      <label class="col-xs-5 col-md-5 pr0 control-label">Total taxes</label>
                      <div class="col-xs-7 col-md-7"> <span class="estimate_total_taxes">
                                ₹ '.$total_tax_amount_label.'
                              </span><input type="hidden" name="estimate_totaltaxes_amount" id="edit_estimate_totaltaxes_amount" value="'.$total_tax_amount.'" readonly="readonly">
                      </div>
                    </div>
                    <div class="form-group form-control">
                      <label class="col-xs-5 col-md-5 pr0 control-label">Total amount</label>
                      <div class="col-xs-7 col-md-7"> <span class="estimate_total_amount">
                                ₹ '.number_format($total_amt,2,'.','').'
                              </span><input type="hidden" name="estimatetotal_amount" id="edit_estimatetotal_amount" value="'.$total_amt.'" readonly="readonly">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="panel panel-default" id="edit_Terms_Conditions">
              <div class="panel-heading">Add Terms & Conditions</div>
              <div class="panel-body" id="">
                <div class="row">
                  <div class="col-md-12">
                    <div class="">
                      <textarea name="estimate_terms_conditions" id="edit_estimate_terms_conditions" class="form-control textarea-content" readonly="readonly">'.$row1['terms_conditions'].'</textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                  <div class="col-md-12">
                    <div class="" style="display:none">
                    <input type="file" name="attachment[]" id="attachment" multiple>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div id="filelist">
                        <ol>';
                        $sql11 = "SELECT * FROM estimate_files where estimate_id='$id'";
                        $result11 = mysqli_query($conn, $sql11);
                        while($row11=mysqli_fetch_assoc($result11))
                        {
                        $output.='<div class="row" id="'.$row11['id'].'1">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                           <div class="li">
                              <li>'.$row11["original_filename"].'</li>
                           </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                       
                              <div class="delete_file" id="delete_file" data-id="'.$row11['id'].'" style="color:#0f243f; cursor:pointer;">
                           </div>
                        </div>
                     </div>';
                    
                        }

                $output .= '</ol>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        </form>
        </div>';
echo json_encode($output); 
?>