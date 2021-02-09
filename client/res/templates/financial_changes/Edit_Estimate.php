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

// Get total billing entities
$sql20 = "SELECT * FROM billing_entity where deleted='0'";
$result20 = mysqli_query($conn, $sql20);
$row20=mysqli_fetch_assoc($result20);
$total_billing_entity_nums=mysqli_num_rows($result20);

// Get total billing entities gsts 
$sql21 = "SELECT * FROM billing_entity_gstdetails where billing_entity_id='".$row20['id']."' and deleted='0'";
$result21 = mysqli_query($conn, $sql21);
$row21=mysqli_fetch_assoc($result21);
$total_billing_gst_nums=mysqli_num_rows($result21);

// Get total accounts
$sql22 = "SELECT * FROM account where deleted='0'";
$result22 = mysqli_query($conn, $sql22);
$row22=mysqli_fetch_assoc($result22);
$total_account_nums=mysqli_num_rows($result22);

// Get total accounts gsts 
$sql23 = "SELECT * FROM account_gst_details where account_id='".$row22['id']."' and deleted='0'";
$result23 = mysqli_query($conn, $sql23);
$row23=mysqli_fetch_assoc($result23);
$total_account_gst_nums=mysqli_num_rows($result23);

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
    
</style>';

$output = '
<script>
   $(".Estimate_Percentage").customA11ySelect();
   $(".Estimate_IGSTandCGST").customA11ySelect();
   $(".Calculate_IGSTandCGST").customA11ySelect();
   $(".DiscountPer").customA11ySelect();';

if($total_billing_entity_nums == 1 && $total_billing_gst_nums > 1){
  $output .= '$(".diff_gst_number").show();
              $(".diff_billing_entity").hide();';
}
if($total_billing_entity_nums == 1 && $total_billing_gst_nums == 0){
  $output .= '$(".diff_gst_number").hide();
              $(".diff_billing_entity").hide();';
}
else if($total_billing_entity_nums > 1){
  $output .= '$(".diff_gst_number").hide();
              $(".diff_billing_entity").show();';
}
else if($total_billing_entity_nums == 1 && $total_billing_gst_nums == 1)
{
  $output .= '$(".diff_gst_number").hide();
              $(".diff_billing_entity").hide();';
}

if($total_account_nums == 1 && $total_account_gst_nums > 1){
  $output .= '$(".diff_customer_gst").show();
              $(".diff_customer_link").hide();';
}
if($total_account_nums == 1 && $total_account_gst_nums == 0){
  $output .= '$(".diff_customer_gst").hide();
              $(".diff_customer_link").hide();';
}
else if($total_account_nums > 1){
  $output .= '$(".diff_customer_gst").hide();
              $(".diff_customer_link").show();';
}
else if($total_account_nums == 1 && $total_account_gst_nums == 1)
{
  $output .= '$(".diff_customer_gst").hide();
              $(".diff_customer_link").hide();';
}

$output.= '</script>';

//$output .= '<script src="../../client/js/financial_estimate_calculations_edit.js"></script>';

$output .='<div id="edit_estimate_main_details">
<form name="updateEstimateForm" id="updateEstimateForm" method="post" autocomplete="off">
            <div class="row">
              <div class="col-md-12">
                <div class="" style="margin-bottom: 15px;">
                  <button type="submit" class="btn btn-primary" id="update_estimateBTN_new">Update</button>
                  <input type="hidden" id="editId" name="recordId" value="'.$id.'">
                  <input type="hidden" id="attachedFilename" name="attachedFilename" value="'.$row1['filename'].'">
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

                     $street_label = ($street!="") ? $street.', ' : '';
                     $city_label = ($city!="") ? $city.', ' : '';
                     $state_label = ($state!="") ? $state.'- ' : '';
                     $zipcode_label = ($zipcode!="") ? $zipcode : '';

                     $address = $street_label.$city_label.$state_label.$zipcode_label;

                     if($address !=""){
                        $address = $address;
                     }
                     else {
                        $address = '';
                     }

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
                            <div id="edit_BillFromAddress_name" class="form-group"><span><b>'.$row1['billfromname'].'</b></span><input type="hidden" name="billfromname" id="edit_billfromname" value="'.$row1['billfromname'].'"></div>
                            <div id="edit_BillFromAddress_street" class="form-group"><span>'.$address.'</span>
                            <input type="hidden" name="billing_address_street" id="edit_billing_address_street" value="'.$street.'">
                            <input type="hidden" name="billing_address_city" id="edit_billing_address_city" value="'.$city.'">
                            <input type="hidden" name="billing_address_state" id="edit_billing_address_state" value="'.$state.'">
                            <input type="hidden" name="billing_address_postal_code" id="edit_billing_address_postal_code" value="'.$zipcode.'">
                            <input type="hidden" name="billingaddressgstin" id="edit_billingaddressgstin" value="'.$gst_num.'">
                            <input type="hidden" name="billingaddresspanno" id="edit_billingaddresspanno" value="'.$row1['billfrompanno'].'">
                            <input type="hidden" name="billingemailaddress" id="edit_billingemailaddress" value="'.$fromemail.'" />
                            <input type="hidden" name="billingphoneno" id="edit_billingphoneno" value="'.$fromphone.'" />
                            <input type="hidden" name="billingfrom_udyamno" id="edit_billingfrom_udyamno" value="'.$row1['billingfrom_udyamno'].'">
                            </div>';

                     if($fromemail_phone!=""){
                        $output .= '<div id="edit_BillFromAddress_email_phone" class="form-group"><span>'.$fromemail_phone.'</span></div>';
                     }
                     
                     if($gst_num!=""){        
                      $output .= '<div id="edit_BillFromAddress_num" class="form-group"><span><b>GSTIN: </b>'.$gst_num.'</span></div>';
                     }

                     if($row1['billfrompanno']!=""){
                      $output .= '<div id="edit_BillFromAddress_panno" class="form-group"><span><b>PAN: </b>'.$row1['billfrompanno'].'</span></div>';
                     }

                     // If udyam registration number is added then show
                     if($row1['billingfrom_udyamno']){
                        $output .= '<div id="edit_BillFromAddress_udyam" class="form-group"><span><b>UDYAM REGISTRATION NO.: </b>'.$row1['billingfrom_udyamno'].'</span></div>';
                     }

                     $output .= '<div class="form-group diff_billing_entity"><span class="estimateDiffBillingEntity" style="color: #337AB7;cursor: pointer;font-size: 14px;">Choose a different billing entity</span></div><div class="form-group diff_gst_number" style="color: #337AB7;cursor: pointer;font-size: 14px;"><span class="estimateDiffGSTNum">Choose a different GSTIN</span></div>
                        </div>';
                  
                     // When change billing entity or gst number then show this
                     $output .= '<div id="BillingFromAddress_edit" class="BillingFromAddress" style="display: none;">
                            <div id="edit_BillFromAddress_name" class="form-group"></div>
                            <div id="edit_BillFromAddress_street" class="form-group"></div>
                            <div id="edit_BillFromAddress_email_phone" class="form-group"></div>
                            <div id="edit_BillFromAddress_num" class="form-group"></div>
                            <div id="edit_BillFromAddress_panno" class="form-group"></div>
                            <div id="edit_BillFromAddress_udyam" class="form-group"></div>
                            <div class="form-group diff_billing_entity"><span class="estimateDiffBillingEntity" style="color: #337AB7;cursor: pointer;font-size: 14px;">Choose a different billing entity</span></div><div class="form-group diff_gst_number"><span class="estimateDiffGSTNum" style="color: #337AB7;cursor: pointer;font-size: 14px;">Choose a different GSTIN</span></div>
                        </div>
                        <div id="BillingFrom_address_and_gst_edit" class="BillingFrom_address_and_gst" style="display: none;">
                          <div class="form-group BillingFrom_address_main">
                            <select name="" id="edit_BillingFrom_addr" class="BillingFrom_address form-control">
                              <option value="">Select Billing Entity</option>
                            </select>
                          </div>
                          <div class="form-group BillingFrom_gst_main" style="display: none;">
                            <div class="form-group BillingFromGSTDetails_dropdown">
                                <select name="" id="edit_BillingFrom_gstno" class="BillingFrom_gst form-control">
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
                                <div class="form-group diff_billing_entity"><span class="estimateDiffBillingEntity" style="color: #337AB7;cursor: pointer;font-size: 14px;">Choose a different billing entity</span></div><div class="form-group diff_gst_number"><span class="estimateDiffGSTNum" style="color: #337AB7;cursor: pointer;font-size: 14px;">Choose a different GSTIN</span></div>
                            </div>
                          </div>
                        </div>';
                  

               $output .= '</div>
                      <div class="col-md-5">
                        <div class="row form-group">
                          <label class="col-md-5 pr0"><span class="pull-right">Estimate Number <span class="text-danger">*</span></span>
                          </label>
                          <div class="col-md-7">
                            <div class="">
                              <input name="estimate_number" id-"edit_estimate_number" class="form-control" type="text" value="'.$row1["invoice_number"].'" readonly />
                            </div>
                          </div>
                        </div>
                        <div class="row form-group">
                          <label class="col-md-5 pr0"><span class="pull-right">P.O./S.O. Number</span>
                          </label>
                          <div class="col-md-7">
                            <div class="">
                              <input name="po_so_number" class="form-control" type="text" value="'.$row1["po_order_no"].'" />
                            </div>
                          </div>
                        </div>
                        <div class="row form-group">
                          <label class="col-md-5 pr0"><span class="pull-right">Estimate Date <span class="text-danger">*</span></span>
                          </label>
                          <div class="col-md-7">
                            <div id="edit_datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
                              <input name="estimate_date" class="form-control edit_datepicker" type="text" value="'.date("d/m/Y", strtotime($row1["date"])).'" onClick="edit_estimate_getDateEvent(this);" onkeydown="return false"/> <span class="btn btn-default_gray input-group-addon edit_estimate_date_datepicker"><span class="material-icons-outlined" onclick="edit_estimate_focus_datepicker(this)">date_range</span></span>
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

                     // $address_to = $street_to.', '.$city_to.', '.$state_to.'- '.$zipcode_to;

                     $street_to_label = ($street_to!="") ? $street_to.', ' : '';
                     $city_to_label = ($city_to!="") ? $city_to.', ' : '';
                     $state_to_label = ($state_to!="") ? $state_to.'- ' : '';
                     $zipcode_to_label = ($zipcode_to!="") ? $zipcode_to : '';

                     $address_to = $street_to_label.$city_to_label.$state_to_label.$zipcode_to_label;

                     if($address_to!="")
                     {
                        $address_to = $address_to;
                     }
                     else {
                        $address_to = '';
                     }

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
                          <div id="edit_BillToAddress_name" class="form-group"><span><b>'.$row1['billtoname'].'</b></span><input type="hidden" name="billtoname" id="edit_billtoname" value="'.$row1['billtoname'].'"></div>
                          <div id="edit_BillToAddress_street" class="form-group"><span>'.$address_to.'</span>
                          <input type="hidden" name="shipping_address_street" id="edit_shipping_address_street" value="'.$street_to.'" />
                          <input type="hidden" name="shipping_address_city" id="edit_shipping_address_city" value="'.$city_to.'">
                          <input type="hidden" name="shipping_address_state" id="edit_shipping_address_state" value="'.$state_to.'" />
                          <input type="hidden" name="shipping_address_postal_code" id="edit_shipping_address_postal_code" value="'.$zipcode_to.'" />
                          <input type="hidden" name="shippingaddressgstin" id="edit_shippingaddressgstin" value="'.$gst_num_to.'" />
                          <input type="hidden" name="shippingaddresspanno" id="edit_shippingaddresspanno" value="'.$row1['billtopanno'].'" />
                          <input type="hidden" name="shippingaddressemailid" id="edit_shippingaddressemailid" value="'.$toemail.'" />
                          <input type="hidden" name="shippingaddresshphoneno" id="edit_shippingaddresshphoneno" value="'.$tophone.'" />
                          <input type="hidden" name="billingto_udyamno" id="edit_billingto_udyamno" value="'.$row1['billingto_udyamno'].'" />
                          </div>';

                      if($toemail_phone!=""){
                        $output .= '<div id="edit_BillToAddress_email_phone" class="form-group"><span>'.$toemail_phone.'</span></div>';
                      }

                      if($gst_num_to!=""){
                        $output .= '<div id="edit_BillToAddress_num" class="form-group"><span><b>GSTIN: </b>'.$gst_num_to.'</span></div>';
                      }

                    if($row1['billtopanno']!=""){
                      $output .= '<div id="edit_BillToAddress_panno" class="form-group"><span><b>PAN: </b>'.$row1['billtopanno'].'</span></div>';
                    }

                  // If udyam registration number is added then show
                  if($row1['billingto_udyamno']){
                     $output .= '<div id="edit_BillToAddress_udyam" class="form-group"><span><b>UDYAM REGISTRATION NO.: </b>'.$row1['billingto_udyamno'].'</span></div>';
                  }

                  $output .= '<div class="form-group diff_customer_link"><span class="estimateDiffcustomer" style="color: #337AB7;cursor: pointer;font-size: 14px;">Choose a different customer</span></div><div class="form-group diff_customer_gst"><span class="estimateDiffcustomergst" style="color: #337AB7;cursor: pointer;font-size: 14px;">Choose a different GSTIN</span></div>
                        </div>';    


                  $output .= '<div id="BillingToAddress_edit" class="BillingToAddress" style="display: none;">
                          <div id="edit_BillToAddress_name" class="form-group"></div>
                          <div id="edit_BillToAddress_street" class="form-group"></div>
                          <div id="edit_BillToAddress_email_phone" class="form-group"></div>
                          <div id="edit_BillToAddress_num" class="form-group"></div>
                          <div id="edit_BillToAddress_panno" class="form-group"></div>
                          <div id="edit_BillToAddress_udyam" class="form-group"></div>
                          <div class="form-group diff_customer_link"><span class="estimateDiffcustomer" style="color: #337AB7;cursor: pointer;font-size: 14px;">Choose a different customer</span></div>
                          <div class="form-group diff_customer_gst"><span class="estimateDiffcustomergst" style="color: #337AB7;cursor: pointer;font-size: 14px;">Choose a different GSTIN</span></div>
                        </div>
                        <div class="BillingTo_address_and_gst" style="display: none;">
                          <div class="form-group BillingTo_address_main">
                            <select name="" id="edit_BillingTo_addr" class="BillingTo_address form-control">
                              <option value="">Select Customer</option>
                            </select>
                          </div>
                          <div class="form-group BillingTo_gst_main" style="display: none;">
                            <div class="form-group BillingToGSTDetails_dropdown">
                              <select name="" id="edit_BillingTo_gstno" class="BillingTo_gst form-control">
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
                                <div class="form-group diff_customer_link"><span class="estimateDiffcustomer" style="color: #337AB7;cursor: pointer;font-size: 14px;">Choose a different customer</span></div>
                                <div class="form-group diff_customer_gst"><span class="estimateDiffcustomergst" style="color: #337AB7;cursor: pointer;font-size: 14px;">Choose a different GSTIN</span></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="table-responsive Finance_custom-a11yselect">
                        <table class="table" id="edit_participantTable">
                          <thead>
                            <tr>
                              <th>
                                <input type="checkbox" class="header_checkbox">
                              </th>
                              <th class="text-center">S.N</th>
                              <th class="text-center">Item description</th>
                              <th class="width_15 text-center">HSN/SAC</th>
                              <th class="width_10 text-center">Quantity</th>
                              <th class="width_10 text-center">Rate (₹)</th>
                              <th>Amount (₹)</th>
                              <th><span class="material-icons-outlined header_delete" style="display: none;">delete_outline</span>
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
                           $total_tax_amount = '0000.00';
                           $edit_total_estimate_value = 0;
                           $edit_estimate_calculated_disc_amt = 0;
                           $discountamount = 0;
                           $edit_estimate_items_gst_type_selected = 0;
                           $edit_estimate_items_discount_selected = 0;

                           $output .= '<input type="hidden" name="edit_total_items" id="edit_total_items" value="'.$total_items_num.'" /><input type="hidden" id="check_sub_checkboxes_cnt" name="check_sub_checkboxes_cnt" value="0" />';

                           $est_disc_disp = 0;
                           $est_gst_disp = 0;
                           $gst_type = '';
                           $edit_estimate_items_discount_selected = 0;
                           $edit_estimate_items_gst_selected = 0;
                           $discTypeArr = array();
                           $gstTypeArr = array();
                           
                           while($row2=mysqli_fetch_array($result2))
                           {
                              $igst = 0;
                              $cgst = 0;
                              $sgst = 0;  
                              $discountamount = 0;
                              $display_gst_rows = 0;
                              $quantity = ($row2['quantity']!=0) ? $row2['quantity'] : "";
                              $rate = ($row2['rate']!=0) ? $row2['rate'] : "";
                              $amount = ($row2['amount']!=0) ? $row2['amount'] : "";

                               $output .= '<tr class="main-group" style="border-top: 2px solid #ddd;">
                                    <td>
                                      <input type="checkbox" class="checkbox sub_checkbox" onchange="Count_of_selected_checkboxes(this,document.getElementById('."'check_sub_checkboxes_cnt'".').value)">
                                      <input type="hidden" name="item_id" id="item_id" value="'.$row2['id'].'" />
                                    </td>
                                    <td class="sno"><span>1</span>
                                    </td>
                                    <td>
                                      <input name="edit_item_descr[]" id="edit_item_descr0" type="text" value="'.$row2['description'].'" class="form-control item_descr">
                                    </td>
                                    <td>
                                      <input name="edit_item_hsn[]" id="edit_item_hsn0" type="text" value="'.$row2['hsn'].'" class="form-control">
                                    </td>
                                    <td>
                                      <input name="edit_item_qty[]" id="edit_item_qty0" type="text" value="'.$quantity.'" class="form-control item_qty" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                    </td>
                                    <td>
                                      <input name="edit_item_rate[]" id="edit_item_rate0" type="text" value="'.$rate.'" class="form-control item_rate" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                    </td>
                                    <td>
                                      <input type="text" class="form-control main_amount" name="edit_item_main_amount[]" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="'.$amount.'" />
                                    </td>
                                    <td>  <span class="material-icons-outlined estimate_remove">delete_outline</span>
                                    </td>
                                  </tr>';

                                  if($row2["discounttype"]===""){
                                      $row2["discounttype"] = "Select Type";
                                  }
                                  
                                  if($row2["discounttype"]!="Select Type"){
                                      array_push($discTypeArr, $row2["discounttype"]);
                                  }
                                 
                                 // Make discount type dropdown selected
                                 $output .= '<script>
                                       $(document).ready(function(){
                                          var discounttypeVal = "'.$row2["discounttype"].'";
                                          
                                          if(discounttypeVal){
                                              if(discounttypeVal!="Select Type"){ 
                                                  $(".custom-a11yselect-menu").find(".custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
                                              }';

                                  $output .= '$("#updateEstimateForm #edit_item_discount_type'.$count.'-button .custom-a11yselect-text").text(discounttypeVal);

                                              // alert("Hey");
                                              
                                              $("#updateEstimateForm #edit_item_discount_type'.$count.' li[data-val='."'".$row2["discounttype"]."'".']").addClass("custom-a11yselect-focused");

                                              // alert("Hi");
                                              
                                              $("#updateEstimateForm #edit_item_discount_type'.$count.' li[data-val='."'".$row2["discounttype"]."'".']").addClass("custom-a11yselect-selected");

                                              if(discounttypeVal!="Select Type"){
                                                 //$("#edit_Calculate_discounts").find(".CGST_TR_section").hide();
                                                 //$("#edit_Calculate_discounts").find(".SGST_Discount").hide();
                                              }
                                          }
                                       });
                                     </script>';

                                     $disc_type_selected = '';
                                     $disc_type_selected1 = '';
                                     $disc_type_selected2 = 'selected="selected"';
                                     if($row2["discounttype"] == 'Percentage'){
                                        $disc_type_selected = 'selected="selected"';
                                        $disc_type_selected1 = '';
                                        $disc_type_selected2 = '';
                                        $edit_estimate_items_discount_selected = 1;
                                     }
                                     else if($row2["discounttype"] == 'Amount'){
                                        $disc_type_selected = '';
                                        $disc_type_selected1 = 'selected="selected"';
                                        $disc_type_selected2 = '';
                                        $edit_estimate_items_discount_selected = 1;
                                     }

                                     $discountvalue_db_val = ($row2['discountvalue']) ? $row2['discountvalue'] : 0;
                                     
                           $output .= '<tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right">- Discount (At item level)</span>
                                    </td>
                                    <td class="width_15 discount_section">
                                      <select name="edit_item_discount_type[]" id="edit_item_discount_type'.$count.'" class="Estimate_Percentage form-control ">
                                        <option value="" '.$disc_type_selected2.'>Select Type</option>
                                        <option value="Percentage" '.$disc_type_selected.'>Percentage</option>
                                        <option value="Amount" '.$disc_type_selected1.'>Amount</option>
                                      </select>
                                      <input type="hidden" name="edit_item_discount_type_dbval[]" id="edit_item_discount_type_dbval'.$count.'" value="'.$row2["discounttype"].'" class="form-control">
                                    </td>
                                    <td class="width_10">
                                      <input name="edit_item_discount_rate[]" id="edit_item_discount_rate'.$count.'" type="text" value="'.$row2['discountvalue'].'" class="form-control rate" onkeypress="return event.charCode >= 48 && event.charCode <= 57">

                                      <input type="hidden" name="edit_item_discount_rate_dbval[]" id="edit_item_discount_rate_dbval'.$count.'" value="'.$discountvalue_db_val.'" class="form-control rate_dbdata">
                                    </td>';
                                    
                                    if($row2['discounttype'] === 'Percentage'){
                                        $discountamount = $row2['discountamount'];
                                        $total_amount_after_discount += $discountamount;
                                        
                                        if($discountamount!=0 || $discountamount!=""){
                                          $discountamount_label = number_format($row2['discountamount'],2,'.','');
                                          $est_disc_disp = 1;
                                        }
                                        else{
                                          $discountamount = 0;
                                          $discountamount_label = str_pad($discountamount, 4, "0", STR_PAD_LEFT).'.'.str_pad($discountamount, 2, "0", STR_PAD_RIGHT);
                                        }
                                    }
                                    else if($row2['discounttype'] === 'Amount'){
                                        $discountamount = $row2['discountvalue'];
                                        $total_amount_after_discount += $discountamount;
                                        
                                        if($discountamount!=0 || $discountamount!=""){
                                          $discountamount_label = number_format($discountamount,2,'.','');
                                          $est_disc_disp = 1;
                                        }
                                        else{
                                          $discountamount = 0;
                                          $discountamount_label = str_pad($discountamount, 4, "0", STR_PAD_LEFT).'.'.str_pad($discountamount, 2, "0", STR_PAD_RIGHT);
                                        }
                                    }
                                    else {
                                      $discountamount = 0;
                                      $discountamount_label = str_pad(0, 4, "0", STR_PAD_LEFT).'.'.str_pad(0, 2, "0", STR_PAD_RIGHT);
                                    }

                                    if($row2['discounttype'] == 'Select Type'){
                                        $display_delete_icon = ' style="display: none;"';
                                    }
                                    else {
                                        $edit_estimate_items_discount_selected = 1;
                                        $display_delete_icon = ' style="display: block;"';
                                    }

                              $output .= '<td class="width_15"><span class="main_amount">₹ '.$discountamount_label.' <input name="calculated_discount[]" type="hidden" class="calculated_discount" value="'.$discountamount.'"></span>
                                    </td>
                                    <td class="width_10"><span class="material-icons-outlined estimate_remove_discount"'.$display_delete_icon.'>delete_outline</span>
                                    </td>
                                  </tr>
                                  <tr class="CGST_TR_section">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right">+ GST (At item level)</span>
                                    </td>';

                              // if($row2['gst_rate']!=0){

                                  $gst_total_rate = $row2['gst_rate'];
                                  $igst_label = ($row2['igst']) ? $row2['igst'] : '0000.00';
                                  $cgst_label = ($row2['cgst']) ? $row2['cgst'] : '0000.00';
                                  $sgst_label = ($row2['sgst']) ? $row2['sgst'] : '0000.00';
                                  $gst_type = 'Select Type';
                                  if($row2['igst']!=0){
                                    $gst_type = 'IGST';
                                    $igst = $row2['igst'];
                                    $total_amount_taxes += $row2["igst"];
                                  }
                                  if($row2['cgst']!=0 && $row2['sgst']!=0){
                                    $gst_type = 'CGST';
                                    // $gst_total_rate = $row2['gst_rate'];
                                    $cgst = $row2['cgst'];
                                    $sgst = $row2['sgst'];
                                    $total_amount_taxes += $row2["cgst"] + $row2["sgst"];
                                  }
                                  
                                  if($gst_type!='Select Type'){
                                    array_push($gstTypeArr, $gst_type);
                                  }

                                  if($discountamount!=0 && ($row2['igst']!=0 || $row2['cgst']!=0)){
                                    $est_gst_disp = 1;
                                  }
                              // }
                              // else{
                                 // $gst_type = 'Select Type';
                                 // $gst_total_rate = 0;
                                 // $igst_label = $cgst_label = $sgst_label = '0000.00';
                              // }

                              // Make GST type & rate dropdown selected
                              $output .= '<script>
                                 $(document).ready(function(){
                                    var gsttypeVal = "'.$gst_type.'";
                                    if(gsttypeVal)
                                    {
                                        if(gsttypeVal!="Select Type"){
                                            $(".custom-a11yselect-menu").find(".custom-a11yselect-option").removeClass(".custom-a11yselect-selected .custom-a11yselect-focused");
                                            //$("#edit_Calculate_discounts .CGST_TR_section").hide();
                                        }
                                        $("#edit_item_gst_type'.$count.'-button .custom-a11yselect-text").text(gsttypeVal);
                                        
                                        $(".custom-a11yselect-menu li[data-val='."'".$gst_type."'".']").addClass("custom-a11yselect-focused");
                                        
                                        $(".custom-a11yselect-menu li[data-val='."'".$gst_type."'".']").addClass("custom-a11yselect-selected");

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

                                $selected = '';
                                $selected1 = '';
                                $selected2 = 'selected="selected"';
                                $display1 = ' style="display: none;"';
                                $display2 = ' style="display: none;"';
                                if($gst_type!="Select Type"){
                                  if($gst_type === 'IGST'){
                                    $selected = 'selected="selected"';
                                    $selected1 = '';
                                    $selected2 = '';

                                    $display1 = '';
                                    $display2 = ' style="display: none;"';
                                    $edit_estimate_items_gst_type_selected = 1;
                                  }
                                  if($gst_type === 'CGST'){
                                    $selected1 = 'selected="selected"';
                                    $selected2 = '';
                                    $selected = '';
                                    
                                    $display1 = ' style="display: block;"';
                                    $display2 = '';
                                    $edit_estimate_items_gst_type_selected = 1;
                                  }
                                }

                                $selected0_rate = "";
                                $selected1_rate = "";
                                $selected2_rate = "";
                                $selected3_rate = "";
                                $selected5_rate = "";
                                $selected6_rate = "";
                                $selected12_rate = "";
                                $selected18_rate = "";
                                $selected28_rate = "";

                               if($gst_total_rate == 0){
                                  $selected0_rate = 'selected="selected"';
                               }
                               else if($gst_total_rate == 1){
                                  $selected1_rate = 'selected="selected"';
                               }
                               else if($gst_total_rate == 2){
                                  $selected2_rate = 'selected="selected"';
                               }
                               else if($gst_total_rate == 3){
                                  $selected3_rate = 'selected="selected"';
                               }
                               else if($gst_total_rate == 5){
                                  $selected5_rate = 'selected="selected"';
                               }
                               else if($gst_total_rate == 6){
                                  $selected6_rate = 'selected="selected"';
                               }
                               else if($gst_total_rate == 12){
                                  $selected12_rate = 'selected="selected"';
                               }
                               else if($gst_total_rate == 18){
                                  $selected18_rate = 'selected="selected"';
                               }
                               else if($gst_total_rate == 28){
                                  $selected18_rate = 'selected="selected"';
                               }

                              $output .= '<td class="width_15 GST_section">
                                      <select name="edit_item_gst_type[]" id="edit_item_gst_type'.$count.'" class="Estimate_IGSTandCGST common_Estimate_IGSTandCGST form-control">
                                        <option value="" '.$selected2.'>Select Type</option>
                                        <option value="IGST" '.$selected.'>IGST</option>
                                        <option value="CGST" '.$selected1.'>CGST</option>
                                      </select>
                                    </td>
                                    <td class="width_10 rate_data">
                                      <select name="edit_item_gst_discont[]" id="edit_item_gst_discont'.$count.'" class="DiscountPer form-control">
                                        <option value="0" '.$selected0_rate.'>0%</option>
                                        <option value="1" '.$selected1_rate.'>1%</option>
                                        <option value="2" '.$selected2_rate.'>2%</option>
                                        <option value="3" '.$selected3_rate.'>3%</option>
                                        <option value="5" '.$selected5_rate.'>5%</option>
                                        <option value="6" '.$selected6_rate.'>6%</option>
                                        <option value="12" '.$selected12_rate.'>12%</option>
                                        <option value="18" '.$selected18_rate.'>18%</option>
                                        <option value="28" '.$selected28_rate.'>28%</option>
                                      </select>
                                      <input type="hidden" class="item_igst_amount" name="edit_item_igst_amount[]" value="'.$igst.'" />
                                      <input type="hidden" class="item_cgst_amount" name="edit_item_cgst_amount[]" value="'.$cgst.'" />
                                      <input type="hidden" class="item_sgst_amount" name="edit_item_sgst_amount[]" value="'.$sgst.'" />
                                    </td>';

                                    if($igst!=0){
                              $output .= '<td class="width_15"><span class="main_amount">₹ '.$igst_label.'</span>
                                    </td>';
                                    // $display1 = ' style="display: block;"';
                                    // $display2 = ' style="display: none;"';
                                 }
                                 else if($cgst!=0){
                              $output .= '<td class="width_15"><span class="main_amount">₹ '.$cgst_label.'</span>
                                    </td>';
                                 }
                                 else {
                                  $output .= '<td class="width_15"><span class="main_amount">₹ 0000.00</span>
                                    </td>';
                                 }

                                 /*if($gst_type=='Select Type'){
                                    $display1 = ' style="display: none;"';
                                    $display2 = ' style="display: none;"';
                                 }*/

                              $output .= '<td class="width_10"><span class="material-icons-outlined estimate_remove_adddiscount"'.$display1.'>delete_outline</span>
                                    </td>
                                  </tr>
                                  <tr id="edit_SGST_Discount" class="SGST_Discount"'.$display2.'>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right"></span>
                                    </td>
                                    <td class="width_15">
                                      <input name="edit_SGST" value="SGST" class="SGST form-control" type="text">
                                    </td>
                                    <td class="width_10 rate_data">
                                      <!--<select name="edit_item_sgst_discount[]" id="edit_item_sgst_discount0" class="DiscountPer form-control ">
                                        <option value="">None</option>
                                        <option value="18%">18%</option>
                                        <option value="19%">19%</option>
                                      </select>-->
                                    </td>';

                                    if($sgst!=0){
                                        $output .= '<td class="width_15"><span class="main_amount">₹ '.$sgst_label.'</span></td>';
                                    }
                                    else {
                                      $output .= '<td class="width_15"><span class="main_amount">₹ 0000.00</span></td>';
                                    }  

                                  $output .= '<td class="width_10"><span class="material-icons-outlined estimate_remove_adddiscount"'.$display2.'>delete_outline</span>
                                    </td>
                                    </tr>';

                                  if($row2['discounttype'] == 'Percentage'){
                                    $edit_total_estimate_value += ($amount - $row2['discountamount']);
                                    $edit_estimate_calculated_disc_amt += $row2['discountamount'];
                                  }
                                  else {
                                    $edit_total_estimate_value += ($amount - $row2['discountvalue']);
                                    $edit_estimate_calculated_disc_amt += $row2['discountvalue'];
                                  }

                              $count++;
                           }

                           if($est_disc_disp==1){
                              $est_disc_display = 'style="display:none"';
                           }
                           else {
                              $est_disc_display = '';
                           }

                           /*if($est_gst_disp==1){
                              $edit_estimate_items_gst_selected = 1;
                              $est_gst_display = 'style="display:none"';
                           }
                           else {
                              $est_gst_display = '';
                           }*/

                           $selected_est_disc = $selected_est_disc1 = '';
                           if($row1["discounttype"] == 'Percentage'){
                              $selected_est_disc = 'selected="selected"';
                           }
                           if($row1["discounttype"] == 'Amount'){
                              $selected_est_disc1 = 'selected="selected"';
                           }

                            if(count($discTypeArr) > 0)
                            {
                              $est_disc_display = 'style="display:none"';
                              $edit_estimate_items_discount_selected = 1;
                            }

                            if(count($gstTypeArr) > 0)
                            {
                              $estimate_gst_display = 'style="display:none"';
                              $edit_estimate_items_gst_selected = 1;
                            }

                            $hide_color_apply_css = '';
                            if(count($discTypeArr) > 0 && count($gstTypeArr) > 0){
                              // $hide_color_apply_css = 'style="padding:0px;margin-top:8px;"';
                            }
                            // echo '<pre>';print_r($gstTypeArr);echo '</pre>';

                     $output .= '
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div id="edit_addButtonRow"> <span>
                        <center>
                          <div class="edit_Estimate_add"><span class="material-icons-outlined" style="top:4px;">add_circle_outline</span> Add item</div>
                        </center>
                        </span><input type="hidden" name="items_selected_gst_type" id="edit_items_selected_gst_type" value="'.$gst_type.'">
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
              <div class="panel-heading" '.$hide_color_apply_css.'>
                <div class="table-responsive">
                  <table class="table" id="edit_Calculate_discounts">
                    <tr class ="edit_estimate_effect" '.$est_disc_display.'>
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
                              $("#edit_Estimate_Percentage_select-menu li[data-val='."'".$row1["discounttype"]."'".']").addClass("custom-a11yselect-selected");';

                              if($total_billing_gst_nums==0)
                              {
                                  $output .= '
                                  // Disabled item level GST fields
                                  $("#edit_participantTable .edit_participantRow .CGST_TR_section").find(".custom-a11yselect-btn").css({"background-color":"#eee","opacity":"1", "cursor":"not-allowed", "pointer-events":"none", "pointer-events":"none"});
                                  
                                  // Disabled estimate level GST fields
                                  $("option:selected", $("#edit_Calculate_discounts .CGST_TR_section .GST_section").find("#edit_Calculate_IGSTandCGST_select").val("")).attr("selected",true).siblings().removeAttr("selected");

                                  // For estimate level GST fields disable
                                  $("#edit_Calculate_discounts .CGST_TR_section").find(".custom-a11yselect-btn").css({"background-color":"#eee", "cursor":"not-allowed", "pointer-events":"none", "pointer-events":"none"});';
                              }

                  $output .= '});
                        </script>
                        <select name="Estimate_Percentage_select" id="edit_Estimate_Percentage_select" class="Estimate_Percentage form-control">
                          <option value="Select Type">Select Type</option>
                          <option value="Percentage" '.$selected_est_disc.'>Percentage</option>
                          <option value="Amount" '.$selected_est_disc1.'>Amount</option>
                        </select>
                      </td>
                      <td class="width_10">';
                      
                       // If Estimate level discount rate & gst rate present
                      $estimate_disc_rate = ($row1["rate"]!=0 || $row1["rate"]!="") ? $row1["rate"] : 0;
                      $estimate_gst_rate = ($row1["gst_rate"]!=0 || $row1["gst_rate"]!="") ? $row1["gst_rate"] : 0;

                      if($row1["discounttype"] === 'Percentage'){ // If Estimate level discount type is Percentage
                          $estimate_disc_input_val = $row1["discountamount"];
                          $estimate_disc_amt = $estimate_disc_amt_label = number_format($row1["discountamount"],2,'.','');
                          // $disp_style = ' style="display: block;"';
                      }
                      else if($row1["discounttype"] === 'Amount'){ // If Estimate level discount type is Amount
                          $estimate_disc_input_val = $row1["discountvalue"];
                          $estimate_disc_amt = $estimate_disc_amt_label = number_format($row1["discountvalue"],2,'.','');
                          // $disp_style = ' style="display: block;"';
                      }
                      else { // If Estimate level discount type not present
                          $estimate_disc_input_val = '';  
                          $estimate_disc_amt = '';
                          $estimate_disc_amt_label = '0000.00';
                          // $disp_style = ' style="display: none;"';
                      }

                      if($row1["discounttype"]!="Select Type"){
                        $disp_style = ' style="display: block;"';
                      }
                      else {
                        $disp_style = ' style="display: none;"';
                      }
                      // echo $disp_style;die;
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

                      if($row1["g_s_t"]==''){
                        $estimate_gst = "Select Type";
                      }
                      else{
                        $estimate_gst = $row1["g_s_t"];
                      }

                      if($estimate_gst == "Select Type"){
                        $est_sgst_display = 'style="display:none;"';
                      }
                      else {
                        $est_sgst_display = '';
                      }

                      // <input type="hidden" name="estimate_calculated_disc_amt" id="edit_estimate_calculated_disc_amt" value="'.$total_discountvalue.'" />

                  $output .= '<input type="hidden" id="hidden_estimate_discount_type" value="'.$row1['discounttype'].'" />
                        <input type="hidden" id="hidden_estimate_discount_rate" value="'.$estimate_disc_input_val.'" />
                        <input type="hidden" id="hidden_estimate_gst_type" value="'.$row1["g_s_t"].'" />
                        <input type="hidden" id="hidden_estimate_gst_rate" value="'.$estimate_gst_rate.'" />
                        <input type="hidden" id="hidden_estimate_igst_amt" value="'.$estimate_igst.'" />
                        <input type="hidden" id="hidden_estimate_cgst_amt" value="'.$estimate_cgst.'" />
                        <input type="hidden" id="hidden_estimate_sgst_amt" value="'.$estimate_sgst.'" />
                        <input type="hidden" id="hidden_estimate_igst_label" value="'.$estimate_igst_label.'" />
                        <input type="hidden" id="hidden_estimate_cgst_label" value="'.$estimate_cgst_label.'" />
                        <input type="hidden" id="hidden_estimate_sgst_label" value="'.$estimate_sgst_label.'" />
                        <input name="estimate_disc_amt" id="edit_estimate_disc_amt" type="text" value="'.$estimate_disc_input_val.'" class="form-control rate" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                      <input type="hidden" name="estimate_calculated_disc_amt" id="edit_estimate_calculated_disc_amt" value="'.$estimate_disc_input_val.'" />
                      </td>
                      <td class="width_15"><span class="main_amount">₹ '.$estimate_disc_amt_label.'</span>
                      </td>
                      <td class="width_10"><span class="material-icons-outlined estimate_remove_discount"'.$disp_style.'>delete_outline</span>
                      </td>
                      <script>
                         $(document).ready(function(){
                            var gsttypeVal = "'.$estimate_gst.'";
                            var tot_arr_count = "'.count($gstTypeArr).'";
                            
                            if(gsttypeVal!="Select Type"){
                                $("#edit_Calculate_IGSTandCGST_select-menu").find(".custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
                                if(gsttypeVal==="IGST" && tot_arr_count == 0){
                                    $("#edit_Calculate_discounts").find(".CGST_TR_section").show();
                                }
                                else if(gsttypeVal==="CGST" && tot_arr_count == 0){
                                    $("#edit_Calculate_discounts").find(".CGST_TR_section").show();
                                    $("#edit_Calculate_discounts").find(".SGST_Discount").show();
                                }
                            }
                            else {
                                $("#edit_Calculate_discounts").find(".SGST_Discount").hide();
                            }
                            $("#edit_Calculate_IGSTandCGST_select-button .custom-a11yselect-text").text(gsttypeVal);
                            $("#edit_Calculate_IGSTandCGST_select-menu li[data-val='."'".$estimate_gst."'".']").addClass("custom-a11yselect-focused");
                            $("#edit_Calculate_IGSTandCGST_select-menu li[data-val='."'".$estimate_gst."'".']").addClass("custom-a11yselect-selected");

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
                    <tr class="edit_estimate_effect CGST_TR_section" '.$estimate_gst_display.'>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right">+ GST (At estimate level)</span>
                      </td>';

                      $estGST_selected = '';
                      $estGST_selected1 = '';
                      $isGstDisplay = 'style="display:none;"';
                      if($estimate_gst=='IGST' && !$estimate_gst_display){
                        $estGST_selected1 = 'selected="selected"';
                        $isGstDisplay = 'style="display:block;"';
                      }
                      else if($estimate_gst=='CGST' && !$estimate_gst_display){
                        $estGST_selected = 'selected="selected"';
                        $isGstDisplay = 'style="display:block;"';
                      }

                      $selected_gst_rate0 = $selected_gst_rate1 = $selected_gst_rate2 = $selected_gst_rate3 = $selected_gst_rate5 = $selected_gst_rate6 = $selected_gst_rate12 = $selected_gst_rate18 = $selected_gst_rate28 = '';

                      if($estimate_gst_rate == 0){
                        $selected_gst_rate0 = 'selected="selected"';
                      }
                      if($estimate_gst_rate == 1){
                        $selected_gst_rate1 = 'selected="selected"';
                      }
                      if($estimate_gst_rate == 2){
                        $selected_gst_rate2 = 'selected="selected"';
                      }
                      if($estimate_gst_rate == 3){
                        $selected_gst_rate3 = 'selected="selected"';
                      }
                      if($estimate_gst_rate == 5){
                        $selected_gst_rate5 = 'selected="selected"';
                      }
                      if($estimate_gst_rate == 6){
                        $selected_gst_rate6 = 'selected="selected"';
                      }
                      if($estimate_gst_rate == 12){
                        $selected_gst_rate12 = 'selected="selected"';
                      }
                      if($estimate_gst_rate == 18){
                        $selected_gst_rate18 = 'selected="selected"';
                      }
                      if($estimate_gst_rate == 28){
                        $selected_gst_rate28 = 'selected="selected"';
                      }
                      

              $output .= '<td class="width_15 GST_section">
                        <select name="estimate_gst_type" id="edit_Calculate_IGSTandCGST_select" class="Calculate_IGSTandCGST common_Estimate_IGSTandCGST form-control Estimate_IGSTandCGST">
                          <option value="">Select Type</option>
                          <option value="IGST" '.$estGST_selected1.'>IGST</option>
                          <option value="CGST" '.$estGST_selected.'>CGST</option>
                        </select>
                      </td>
                      <td class="width_10 rate_data">
                        <select name="calculate_rate" id="edit_Calculate_rate" class="DiscountPer form-control">
                          <option value="0" '.$selected_gst_rate0.'>0%</option>
                          <option value="1" '.$selected_gst_rate1.'>1%</option>
                          <option value="2" '.$selected_gst_rate2.'>2%</option>
                          <option value="3" '.$selected_gst_rate3.'>3%</option>
                          <option value="5" '.$selected_gst_rate5.'>5%</option>
                          <option value="6" '.$selected_gst_rate6.'>6%</option>
                          <option value="12" '.$selected_gst_rate12.'>12%</option>
                          <option value="18" '.$selected_gst_rate18.'>18%</option>
                          <option value="28" '.$selected_gst_rate28.'>28%</option>
                        </select>
                        <input type="hidden" class="estimate_igst_amount" name="estimate_igst_amount" value="'.$estimate_igst.'" />
                        <input type="hidden" class="estimate_cgst_amount" name="estimate_cgst_amount" value="'.$estimate_cgst.'" />
                        <input type="hidden" class="estimate_sgst_amount" name="estimate_sgst_amount" value="'.$estimate_sgst.'" />
                      </td>
                      <td class="width_15"><span class="main_amount">₹ '.$estimate_cgst_label.'</span>
                      </td>
                      <td class="width_10"><span class="material-icons-outlined estimate_remove_adddiscount"'.$isGstDisplay.'>delete_outline</span>
                      </td>
                    </tr>
                    <tr id="edit_SGST_Calculate" class="SGST_Discount" '.$estimate_gst_display.'>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right"></span>
                      </td>
                      <td class="width_15">
                        <input name="SGST" value="SGST" class="SGST form-control" type="text">
                      </td>
                      <td class="width_10 rate_data">
                        <!--<select name="SGST_Calculate_rate" id="edit_SGST_Calculate_rate" class="DiscountPer form-control">
                          <option value="">None</option>
                          <option value="18%">18%</option>
                          <option value="19%">19%</option>
                        </select>-->
                      </td>
                      <td class="width_15"><span class="main_amount">₹ '.$estimate_sgst_label.'</span>
                      </td>
                      <td class="width_10"><span class="material-icons-outlined estimate_remove_adddiscount"'.$isGstDisplay.'>delete_outline</span>
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
                                <button class="btn btn-primary text-center" type="button" onclick="calculate_estimate_summary_edit()">Calculate</button>
                              </div>
                              <input type="hidden" name="total_estimate_val" id="edit_total_estimate_value" value="'.$edit_total_estimate_value.'" />
                              <input type="hidden" name="estimate_summary_value" id="edit_estimate_summary_value" value="1" />
                              <input type="hidden" name="estimate_items_discount_selected" id="edit_estimate_items_discount_selected" value="'.$edit_estimate_items_discount_selected.'" />
                              <input type="hidden" name="estimate_items_gst_type_selected" id="edit_estimate_items_gst_type_selected" value="'.$edit_estimate_items_gst_selected.'" />
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
                              </span><input type="hidden" name="estimate_subtotal_amount" id="edit_estimate_subtotal_amount" value="'.$row1['sub_total'].'">
                      </div>
                    </div>
                    <div class="form-group form-control">
                      <label class="col-xs-5 col-md-5 pr0 control-label">Total Discount</label>
                      <div class="col-xs-7 col-md-7"> <span class="estimate_total_discount">
                                ₹ '.$total_discountvalue.'
                              </span><input type="hidden" name="estimate_totaldiscount_amount" id="edit_estimate_totaldiscount_amount" value="'.$row1['discountvalue'].'">
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
                            $total_tax_amount_label = str_pad($total_amount_taxes, 4, "0", STR_PAD_LEFT).'.'.str_pad($total_amount_taxes, 2, "0", STR_PAD_RIGHT);
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
                      <label class="col-xs-5 col-md-5 pr0 control-label">Total Taxes</label>
                      <div class="col-xs-7 col-md-7"> <span class="estimate_total_taxes">
                                ₹ '.$total_tax_amount_label.'
                              </span><input type="hidden" name="estimate_totaltaxes_amount" id="edit_estimate_totaltaxes_amount" value="'.$total_tax_amount.'">
                      </div>
                    </div>
                    <div class="form-group form-control">
                      <label class="col-xs-5 col-md-5 pr0 control-label">Total Amount</label>
                      <div class="col-xs-7 col-md-7"> <span class="estimate_total_amount">
                                ₹ '.number_format($total_amt,2,'.','').'
                              </span><input type="hidden" name="estimatetotal_amount" id="edit_estimatetotal_amount" value="'.$total_amt.'">
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
                      <textarea name="estimate_terms_conditions" id="edit_estimate_terms_conditions" class="form-control textarea-content">'.$row1['terms_conditions'].'</textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="row">
                  <div class="col-xs-12">
                    <div class="edit-estimate-custom-file-upload">
                      <input type="file" name="attachment[]" id="edit_estimate_attachment" onchange="getedit_estimateFilenames()" multiple>
                      <input type="hidden" id="existing_file_name" name="existing_file_name" value="'.$row1['filename'].'">
                    </div>
                  </div>
                  <div class="col-xs-12 col-md-6">
                    <div class="">
                      <div class="">
                      <ul class="edit_estimate_filesList list-unstyled"></ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div id="filelist">
                        <ul class="list-unstyled">';
                        if(!empty($row1['filename']))
                        {
                            $sql4="select * from user where user_name='$user_name'";
                            $result4=mysqli_query($conn,$sql4);
                            $row4=mysqli_fetch_assoc($result4);
                            $user=$row4['user_name'];

                            $uploads_zipdir = 'estimate/zipFolder/';
                            if(!is_dir($uploads_zipdir))
                            {
                                mkdir($uploads_zipdir,0777,true);
                                // chmod($uploads_dir, 0755);
                            }

                            // transfer file from s3 buckets to local
                            // include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3Connect.php');
                            include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/wasabi_connect.php');
                            // Where the files will be source from
                            $source = 'Production/'.$_SERVER['SERVER_NAME'].'/financial_files/estimates/'.$user.'/'.$id.'/'.$row1['filename'];

                            // Where the files will be transferred to
                            $dest = $_SERVER['DOCUMENT_ROOT'].'/client/res/templates/financial_changes/estimate/zipFolder/'.$row1['filename'];

                            // Create a transfer object
                            /*$manager = new \Aws\S3\Transfer($s3, $source, $dest);

                            //Perform the transfer synchronously
                            $manager->transfer();*/
                            $result = $client->getObject(array(     
                                'Bucket' => 'fincrm',
                                'Key'    => $source,
                                'SaveAs' => $dest,
                            ));

                            $file_path = $_SERVER["DOCUMENT_ROOT"]."/client/res/templates/financial_changes/estimate/zipFolder/".$row1['filename'];

                            $ExtractFileName = '';
                            $zip = new ZipArchive;
                            $res = $zip->open($file_path);
                            if($res == TRUE)
                            {
                                for($i = 0; $i < $zip->numFiles; $i++)
                                {
                                    $ExtractFileName = $zip->getNameIndex($i);

                                    $output .= '<div class="row" id="'.$id."_".$i.'">
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                               <div class="li">
                                                  <li>'.$ExtractFileName.'</li>
                                               </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                  <div class="" id="" data-id="'.$id.'" data-name="'.$ExtractFileName.'" onclick="unLinkfile(this);" style="color:#0f243f; cursor:pointer;"><span class="material-icons-outlined glyphicon-remove unlinkFile" style="cursor: pointer; font-size: 14px;top: 3px; margin-left: 5px;">close</span>
                                               </div>
                                            </div>
                                         </div>';
                                }
                                $zip->close();
                            }
                        }

                        /*$sql11 = "SELECT * FROM estimate_files where estimate_id='$id'";
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
                       
                              <div class="delete_file" id="delete_file" data-id="'.$row11['id'].'" style="color:#0f243f; cursor:pointer;"><span class="material-icons-outlined glyphicon-remove" style="cursor: pointer; font-size: 14px;top: 3px; margin-left: 5px;">close</span>
                           </div>
                        </div>
                     </div>';
                    
                        }*/

                $output .= '</ol>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        </form>
        </div>
        <script>
          function unLinkfile(elem)
          {
              var er_id       = $(elem).data("id");
              var er_fileName = $(elem).data("name");

              $(elem).parent().parent().remove();

              $.ajax({
                  type        : "GET",
                  url         : "../../client/res/templates/financial_changes/unlink_estimate_files.php",
                  data        :  { "er_id":er_id, "er_fileName":er_fileName},
                  dataType    : "json",
                 
                  success: function(data)
                  { 
                          if(data.status == "true"){
                              $.alert({
                                  title: "Success!",
                                  content: data.msg,
                                  type: "dark",
                                  typeAnimated: true,
                              });
                              // var elem = document.getElementById(er_id);
                              // elem.parentNode.removeChild(elem);
                          }
                          else{
                              $.alert({
                                  title: "Alert!",
                                  content: data.msg,
                                  type: "dark",
                                  typeAnimated: true,
                              });
                          } 
                  }
              });
          }
        </script>';
echo json_encode($output); 
?>