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
$sql1 = "SELECT * FROM invoice where id='$id'";
$result1 = mysqli_query($conn, $sql1);
$row1=mysqli_fetch_assoc($result1);

$billname=$row1['billfromname'];
$sql51= "SELECT * FROM billing_entity where name='$billname'";
$result51=mysqli_query($conn,$sql51);
$row51=mysqli_fetch_assoc($result51);

// $billing_entity_id=$row51['id'];

$account_id = $row1['account_id'];
$sql5= "SELECT * FROM account where id='$account_id'";
$result5=mysqli_query($conn,$sql5);
$row5=mysqli_fetch_assoc($result5);

$invoice_id=$row1['id'];
$sql2="select * from invoice_items where invoice_id='$invoice_id'";
$result2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_assoc($result2);

$sql12="select * from invoice_files where invoice_id='$id'";
$result12=mysqli_query($conn,$sql12);
$row12=mysqli_fetch_assoc($result12);

$sql4="select * from user where user_name='$user_name'";
$result4=mysqli_query($conn,$sql4);
$row4=mysqli_fetch_assoc($result4);
$user=$row4['user_name'];

$sql6 = "SELECT * FROM payments where invoiceno='".$row1['invoiceno']."'";
$result6 = mysqli_query($conn,$sql6);
$total_paid = 0;
while($row6 = mysqli_fetch_assoc($result6))
{
    $total_paid += $row6["amountcredited"];  
}


$output .='
<script>
   $(".invoice_Percentage").customA11ySelect();
   $(".invoice_IGSTandCGST").customA11ySelect();
   $(".Calculate_IGSTandCGST").customA11ySelect();
   $(".DiscountPer").customA11ySelect();
   $(".diff_billing_entity").show();
   $(".diff_customer_link").show();

</script>
';


$output .='<div id="edit_invoice_main_details">
<form name="updateinvoiceForm" id="updateinvoiceForm" method="post" autocomplete="off">
            <div class="row">
              <div class="col-md-12">
                <div class="" style="margin-bottom: 15px;">
                  <input type="hidden" id="editId" name="recordId" value="'.$id.'">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-default" id="edit_invoice_billedfrom">
                  <div class="panel-heading">Billed From</div>
                  <div class="panel-body" id="edit_invoice_Address_Details">
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

                     // When popup of edit invoice loads show
                     $output .= '<div id="edit_invoice_BillingFromAddress" class="BillingFromAddress">
                            <div id="edit_invoice_BillFromAddress_name" class="form-group"><span><b>'.$row1['billfromname'].'</b></span><input type="hidden" name="billfromname" id="edit_invoice_billfromname" value="'.$row1['billfromname'].'">
                            <input type="hidden" name="edit_bill_id" id="edit_bill_id" value="'.$row51['id'].'"></div>

                            <div id="edit_invoice_BillFromAddress_street" class="form-group"><span>'.$address.'</span>

                            <input type="hidden" name="billing_address_street" id="edit_billing_address_street" value="Office no.1, Tower no.2, Mayfair tower, Wakadewadi, Shivajinagar">
                            <input type="hidden" name="billing_address_city" id="edit_billing_address_city" value="'.$city.'">
                            <input type="hidden" name="billing_address_state" id="edit_billing_address_state" value="'.$state.'">
                            <input type="hidden" name="billing_address_postal_code" id="edit_billing_address_postal_code" value="'.$zipcode.'">
                            <input type="hidden" name="billingaddressgstin" id="edit_billingaddressgstin" value="'.$gst_num.'">
                            <input type="hidden" name="billingaddresspanno" id="edit_billingaddresspanno" value="'.$row1['billfrompan'].'">
                            <input type="hidden" name="billingemailaddress" id="edit_billingemailaddress" value="'.$fromemail.'" />
                            <input type="hidden" name="billingphoneno" id="billingphoneno" value="'.$fromphone.'" />
                            <input type="hidden" name="billingfrom_udyamno" id="edit_billingfrom_udyamno" value="'.$row1['billingfrom_udyamno'].'">
                            </div>';

                      if($fromemail_phone!=""){
                        $output .= '<div id="edit_invoice_BillFromAddress_email_phone" class="form-group"><span>'.$fromemail_phone.'</span></div>';
                      }
                        
                      if($gst_num!=""){       
                        $output .= '<div id="edit_invoice_BillFromAddress_num" class="form-group"><span><b>GSTIN: </b>'.$gst_num.'</span></div>';
                      }


                    $output .= '<div id="edit_invoice_BillFromAddress_panno" class="form-group"><span><b>PAN: </b>'.$row1['billfrompan'].'</span></div>';

                     // If udyam registration number is added then show
                     if($row1['billingfrom_udyamno']){
                        $output .= '<div id="edit_invoice_BillFromAddress_udyam" class="form-group"><span><b>UDYAM REGISTRATION NO.: </b>'.$row1['billingfrom_udyamno'].'</span></div>';
                     }

                     $output .= '<div class="form-group diff_billing_entity"></div>
                        </div>';
                  
                     // When change billing entity or gst number then show this
                     $output .= '<div id="BillingFromAddress_edit_invoice" class="BillingFromAddress" style="display: none;">
                            <div id="edit_invoice_BillFromAddress_name" class="form-group"></div>
                            <div id="edit_invoice_BillFromAddress_street" class="form-group"></div>
                            <div id="edit_invoice_BillFromAddress_email_phone" class="form-group"></div>
                            <div id="edit_invoice_BillFromAddress_num" class="form-group"></div>
                            <div id="edit_invoice_BillFromAddress_panno" class="form-group"></div>
                            <div id="edit_invoice_BillFromAddress_udyam" class="form-group"></div>
                            <div class="form-group diff_billing_entity"></div>
                        </div>
                        <div id="BillingFrom_address_and_gst_edit_invoice" class="BillingFrom_address_and_gst" style="display: none;">
                          <div class="form-group BillingFrom_address_main">
                            <select name="" id="edit_invoice_BillingFrom_addr" class="BillingFrom_address form-control">
                              <option value="">Select Billing Entity</option>
                            </select>
                          </div>
                          <div class="form-group BillingFrom_gst_main" style="display: none;">
                            <div class="form-group BillingFromGSTDetails_dropdown">
                                <select name="" id="edit_invoice_BillingFrom_gstno" class="BillingFrom_gst form-control">
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
                                <div class="form-group diff_billing_entity"></div>
                            </div>
                          </div>
                        </div>';
                  

               $output .= '</div>
                      <div class="col-md-5">
                        <div class="row form-group">
                          <label class="col-md-5 pr0"><span class="pull-right">Invoice number <span class="text-danger">*</span></span>
                          </label>
                          <div class="col-md-7">
                            <div class="">
                              <input name="invoice_number" id-"edit_invoice_number" class="form-control" type="text" value="'.$row1["invoiceno"].'" readonly />
                            </div>
                          </div>
                        </div>
                        <div class="row form-group">
                          <label class="col-md-5 pr0"><span class="pull-right">P.O./S.O. number</span>
                          </label>
                          <div class="col-md-7">
                            <div class="">
                              <input name="po_so_number" class="form-control" type="text" value="'.$row1["po_order_no"].'" readonly/>
                            </div>
                          </div>
                        </div>
                        <div class="row form-group">
                          <label class="col-md-5 pr0"><span class="pull-right">Invoice date</span>
                          </label>
                          <div class="col-md-7">
                            <div class="input-group" style="width:100%">
                              <input name="invoice_date" id="edit_invoice_date" class="form-control edit_invoice_date" type="text" value="'.date("d/m/Y", strtotime($row1["invoicedate"])).'" onkeydown="return false" disabled/> 
                            </div>
                          </div>
                        </div>

                        <div class="row form-group">
                          <label class="col-md-5 pr0"><span class="pull-right">Due date</span>
                          </label>
                          <div class="col-md-7">
                            <div class="input-group" style="width:100%">
                              <input name="due_date" id="edit_due_date" class="form-control edit_due_date"  onkeydown="return false" type="text" value="'.date("d/m/Y", strtotime($row1["duedate"])).'" disabled/> 
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
                <div class="panel panel-default" id="invoice_billedto">
                  <div class="panel-heading">Billed To</div>
                  <div class="panel-body" id="edit_invoice_Address_Details_BillTo">
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

                  $output .= '<div id="edit_invoice_BillingToAddress" class="BillingToAddress">
                          <div id="edit_invoice_BillToAddress_name" class="form-group"><span><b>'.$row1['billtoname'].'</b></span><input type="hidden" name="billtoname" id="edit_invoice_billtoname" value="'.$row1['billtoname'].'"></div>
                          <div id="edit_invoice_BillToAddress_street" class="form-group"><span>'.$address_to.'</span>
                          <input type="hidden" name="shipping_address_street" id="edit_shipping_address_street" value="'.$street_to.'" />
                          <input type="hidden" name="shipping_address_city" id="edit_shipping_address_city" value="'.$city_to.'">
                          <input type="hidden" name="shipping_address_state" id="edit_shipping_address_state" value="'.$state_to.'" />
                          <input type="hidden" name="shipping_address_postal_code" id="edit_shipping_address_postal_code" value="'.$zipcode_to.'" />
                          <input type="hidden" name="shippingaddressgstin" id="edit_shippingaddressgstin" value="'.$gst_num_to.'" />
                          <input type="hidden" name="shippingaddresspanno" id="edit_shippingaddresspanno" value="'.$row1['billtopan'].'" />
                          <input type="hidden" name="shippingaddressemailid" id="edit_shippingaddressemailid" value="'.$toemail.'" />
                          <input type="hidden" name="shippingaddresshphoneno" id="edit_shippingaddresshphoneno" value="'.$tophone.'" />
                          <input type="hidden" name="billingto_udyamno" id="edit_billingto_udyamno" value="'.$row1['billingto_udyamno'].'" />
                          </div>';

                     $output .= '<div id="edit_BillToAddress_email_phone" class="form-group"><span>'.$toemail_phone.'</span></div>';

                    if($gst_num_to!=""){
                      $output .= '<div id="edit_BillToAddress_num" class="form-group"><span><b>GSTIN: </b>'.$gst_num_to.'</span></div>';
                    }


                    $output .= '<div id="edit_BillToAddress_panno" class="form-group"><span><b>PAN: </b>'.$row1['billtopan'].'</span></div>';

                  // If udyam registration number is added then show
                  if($row1['billingto_udyamno']){
                     $output .= '<div id="edit_BillToAddress_udyam" class="form-group"><span><b>UDYAM REGISTRATION NO.: </b>'.$row1['billingto_udyamno'].'</span></div>';
                  }

                  $output .= '<div class="form-group diff_customer_link"></div>
                        </div>';    


                  $output .= '<div id="BillingToAddress_edit_invoice" class="BillingToAddress" style="display: none;">
                          <div id="edit_invoice_BillToAddress_name" class="form-group"></div>
                          <div id="edit_invoice_BillToAddress_street" class="form-group"></div>
                          <div id="edit_BillToAddress_email_phone" class="form-group"></div>
                          <div id="edit_BillToAddress_num" class="form-group"></div>
                          <div id="edit_BillToAddress_panno" class="form-group"></div>
                          <div id="edit_BillToAddress_udyam" class="form-group"></div>
                          <div class="form-group diff_customer_link"></div>
                        </div>
                        <div class="BillingTo_address_and_gst" style="display: none;">
                          <div class="form-group BillingTo_address_main">
                            <select name="" id="edit_invoice_BillingTo_addr" class="BillingTo_address form-control">
                              <option value="">Select Customer</option>
                            </select>
                          </div>
                          <div class="form-group BillingTo_gst_main" style="display: none;">
                            <div class="form-group BillingToGSTDetails_dropdown">
                              <select name="" id="edit_invoice_BillingTo_gstno" class="BillingTo_gst form-control">
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
                                <div class="form-group diff_customer_link"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="table-responsive Finance_custom-a11yselect">
                        <table class="table" id="edit_invoice_participantTable">

                          <thead>
                            <tr>
                              <th>
                                <input type="checkbox" class="header_checkbox" style="display:none">
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
                          <tbody class="edit_invoice_participantRow">';
                           $invoice_id=$row1['id'];
                           $sql2="select * from invoice_items where invoice_id='$invoice_id'";
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
                           $edit_total_invoice_value = 0;
                           $edit_invoice_calculated_disc_amt = 0;
                           $discountamount = 0;

                           $output .= '<input type="hidden" name="edit_total_items" id="edit_invoice_total_items" value="'.$total_items_num.'" />';
                           
                           $inv_disc_disp = 0;
                           $inv_gst_disp = 0;

                           while($row2=mysqli_fetch_assoc($result2))
                           {
                              $discountamount = 0;  
                              $quantity = ($row2['quantity']!=0) ? $row2['quantity'] : "";
                              $rate = ($row2['rate']!=0) ? $row2['rate'] : "";
                              $amount = ($row2['amount']!=0) ? $row2['amount'] : "";

                               $output .= '<tr class="main-group">
                                    <td>
                                      <input type="checkbox" class="checkbox sub_checkbox" style="display:none">
                                      <input type="hidden" name="item_id" id="item_id" value="'.$row2['id'].'"/>
                                    </td>
                                    <td class="sno"><span>1</span>
                                    </td>
                                    <td>
                                      <input name="edit_item_descr[]" id="edit_item_descr0" type="text" value="'.$row2['description'].'" class="form-control item_descr" readonly>
                                    </td>
                                    <td>
                                      <input name="edit_item_hsn[]" id="edit_item_hsn0" type="text" value="'.$row2['hsn'].'" class="form-control" readonly>
                                    </td>
                                    <td>
                                      <input name="edit_item_qty[]" id="edit_item_qty0" type="text" value="'.$quantity.'" class="form-control item_qty" onkeypress="return event.charCode >= 48 && event.charCode <= 57" readonly>
                                    </td>
                                    <td>
                                      <input name="edit_item_rate[]" id="edit_item_rate0" type="text" value="'.$rate.'" class="form-control item_rate" onkeypress="return event.charCode >= 48 && event.charCode <= 57" readonly>
                                    </td>
                                    <td>
                                      <input type="text" class="form-control main_amount" name="edit_item_main_amount[]" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="'.$amount.'" readonly/>
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

                                  $output .= '$("#updateinvoiceForm #edit_item_discount_type'.$count.'-button .custom-a11yselect-text").text(discounttypeVal);
                                              $("#updateinvoiceForm #edit_item_discount_type'.$count.'-menu li[data-val='."'".$row2["discounttype"]."'".']").addClass("custom-a11yselect-focused");
                                              $("#updateinvoiceForm #edit_item_discount_type'.$count.'-menu li[data-val='."'".$row2["discounttype"]."'".']").addClass("custom-a11yselect-selected");

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
                                     }
                                     if($row2["discounttype"] == 'Amount'){
                                        $disc_type_selected = '';
                                        $disc_type_selected1 = 'selected="selected"';
                                        $disc_type_selected2 = '';
                                     }

                           $output .= '<tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right">- Discount (At item level)</span>
                                    </td>
                                    <td class="width_15 discount_section">
                                      <select name="edit_item_discount_type[]" id="edit_item_discount_type'.$count.'" class="invoice_Percentage form-control ">
                                        <option value="" '.$disc_type_selected2.'>Select Type</option>
                                        <option value="Percentage" '.$disc_type_selected.'>Percentage</option>
                                        <option value="Amount" '.$disc_type_selected1.'>Amount</option>
                                      </select>
                                    </td>
                                    <td class="width_10">
                                      <input name="edit_item_discount_rate[]" id="edit_item_discount_rate'.$count.'" type="text" value="'.$row2['discountvalue'].'" class="form-control rate" onkeypress="return event.charCode >= 48 && event.charCode <= 57" readonly>
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
                                          $inv_disc_disp = 1;
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
                                       $display_delete_icon = ' style="display: block;"';
                                    }

                              $output .= '<td class="width_15"><span class="main_amount">₹ '.$discountamount_label.' <input name="calculated_discount[]" type="hidden" class="calculated_discount" value="'.$discountamount.'"></span>
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

                              // if($row2['gst_rate']!=0){

                                  $gst_total_rate = $row2['gst_rate'];
                                  $igst_label = ($row2['igst']) ? $row2['igst'] : '0000.00';
                                  $cgst_label = ($row2['cgst']) ? $row2['cgst'] : '0000.00';
                                  $sgst_label = ($row2['sgst']) ? $row2['sgst'] : '0000.00';
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
                                  if($row2['igst']!=0 && $row2['cgst']!=0){
                                    $inv_gst_disp = 1;
                                  }
                                  else {
                                    $inv_gst_disp = 0;
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
                                    var gsttypeVal = "'.$row2['gst_type'].'";
                                    if(gsttypeVal)
                                    {
                                        if(gsttypeVal!="Select Type"){
                                           $(".custom-a11yselect-menu").find(".custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
                                           //$("#edit_Calculate_discounts .CGST_TR_section").hide();
                                        }
                                        $("#edit_item_gst_type'.$count.'-button .custom-a11yselect-text").text(gsttypeVal);

                                        $(".custom-a11yselect-menu li[data-val='."'".$row2['gst_type']."'".']").addClass("custom-a11yselect-focused");

                                        $(".custom-a11yselect-menu li[data-val='."'".$row2['gst_type']."'".']").addClass("custom-a11yselect-selected");

                                        if(gsttypeVal=="CGST"){
                                           $("#edit_SGST_Discount").show();
                                           $("#edit_Calculate_discounts").find(".CGST_TR_section").hide();
                                           $("#edit_Calculate_discounts").find(".SGST_Discount").hide();
                                        }

                                        var gstrateVal = "'.$row2['gst_rate'].'";
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
                                  }
                                  if($gst_type === 'CGST'){
                                    $selected1 = 'selected="selected"';
                                    $selected2 = '';
                                    $selected = '';

                                    $display1 = ' style="display: block;"';
                                    $display2 = '';
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
                                      <select name="edit_item_gst_type[]" id="edit_item_gst_type'.$count.'" class="invoice_IGSTandCGST common_invoice_IGSTandCGST form-control">
                                        <option value="Select Type" '.$selected2.'>Select Type</option>
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
                                 else{
                              $output .= '<td class="width_15"><span class="main_amount">₹ '.$row2['cgst'].'</span>
                                    </td>';
                                    if($row2['gst_type']!='Select Type'){
                                       // $display1 = ' style="display: block;"';
                                       // $display2 = ' style="display: block;"';
                                    }
                                 }

                                 /*if($row2['gst_type']=='Select Type'){
                                    $display1 = ' style="display: none;"';
                                    $display2 = ' style="display: none;"';
                                 }*/

                              $output .= '<td class="width_10">
                                    </td>
                                  </tr>
                                  <tr id="edit_SGST_Discount" class="SGST_Discount"'.$display2.'>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right"></span>
                                    </td>
                                    <td class="width_15">
                                      <input name="edit_SGST" value="SGST" class="SGST form-control" type="text" readonly>
                                    </td>
                                    <td class="width_10 rate_data">
                                      <!--<select name="edit_item_sgst_discount[]" id="edit_item_sgst_discount0" class="DiscountPer form-control ">
                                        <option value="">None</option>
                                        <option value="18%">18%</option>
                                        <option value="19%">19%</option>
                                      </select>-->
                                    </td>
                                    <td class="width_15"><span class="main_amount">₹ '.$row2['sgst'].'</span>
                                    </td>
                                    <td class="width_10">
                                    </td>
                                  </tr>';

                                  // $edit_total_invoice_value += $amount - $row2['discountvalue'];
                                  // $edit_invoice_calculated_disc_amt += $row2['discountvalue'];
                                  if($row2['discounttype'] == 'Percentage'){
                                    $edit_total_invoice_value += $amount - $row2['discountamount'];
                                    $edit_invoice_calculated_disc_amt += $row2['discountamount'];
                                  }
                                  else {
                                    $edit_total_invoice_value += $amount - $row2['discountvalue'];
                                    $edit_invoice_calculated_disc_amt += $row2['discountvalue'];
                                  }

                              $count++;
                           }


                           if($inv_disc_disp==1){
                              $inv_disc_display = 'style="display:none"';
                           }
                           else {
                              $inv_disc_display = '';
                           }

                           if($inv_gst_disp == 1){
                              $inv_gst_display = 'style="display:none"';
                           }
                           else {
                              $inv_gst_display = '';
                           }

                           $selected_inv_disc = $selected_inv_disc1 = '';
                           if($row1["discounttype"] == 'Percentage'){
                              $selected_inv_disc = 'selected="selected"';
                           }
                           if($row1["discounttype"] == 'Amount'){
                              $selected_inv_disc1 = 'selected="selected"';
                           }

                           $hide_color_apply_css = '';
                           if($inv_disc_disp ==1 && $inv_gst_disp ==1){
                              $hide_color_apply_css = 'style="padding:0px;margin-top:8px;"';
                           }
                           
                     $output .= '
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div id="edit_addButtonRow"> <span>
                        <center>
                          <div class="edit_invoice_add"></div>
                        </center>
                        </span><input type="hidden" name="items_selected_gst_type" id="edit_items_selected_gst_type" value="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default" id="edit_invoice_calculation">
              <div class="panel-heading" '.$hide_color_apply_css.'>
                <div class="table-responsive">
                  <table class="table" id="edit_Calculate_discounts">
                    <tr '.$inv_disc_display.'>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right">- Discount (At invoice level)</span>
                      </td>
                      <td class="width_15 discount_section">
                        <script>
                           $(document).ready(function(){
                              var discounttypeVal = "'.$row1["discounttype"].'";
                              if(discounttypeVal!="Select Type"){
                                  $("#edit_invoice_Percentage_select-menu").find(".custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
                              }
                              $("#edit_invoice_Percentage_select-button .custom-a11yselect-text").text(discounttypeVal);
                              $("#edit_invoice_Percentage_select-menu li[data-val='."'".$row1["discounttype"]."'".']").addClass("custom-a11yselect-focused");
                              $("#edit_invoice_Percentage_select-menu li[data-val='."'".$row1["discounttype"]."'".']").addClass("custom-a11yselect-selected");
                           });
                        </script>
                        <select name="invoice_Percentage_select" id="edit_invoice_Percentage_select" class="invoice_Percentage form-control">
                          <option value="">Select Type</option>
                          <option value="Percentage" '.$selected_inv_disc.'>Percentage</option>
                          <option value="Amount" '.$selected_inv_disc1.'>Amount</option>
                        </select>
                      </td>
                      <td class="width_10">';
                      
                       // If invoice level discount rate & gst rate present
                      $invoice_disc_rate = ($row1["rate"]!=0 || $row1["rate"]!="") ? $row1["rate"] : 0;
                      $invoice_gst_rate = ($row1["gst_rate"]!=0 || $row1["gst_rate"]!="") ? $row1["gst_rate"] : 0;

                      if($row1["discounttype"] === 'Percentage'){ // If invoice level discount type is Percentage
                          $invoice_disc_input_val = $row1["discountamount"];
                          $invoice_disc_amt = $invoice_disc_amt_label = number_format($row1["discountamount"],2);
                          // $disp_style = ' style="display: block;"';
                      }
                      else if($row1["discounttype"] === 'Amount'){ // If invoice level discount type is Amount
                          $invoice_disc_input_val = $row1["discountamount"];
                          $invoice_disc_amt = $invoice_disc_amt_label = number_format($row1["discountamount"],2);
                          // $disp_style = ' style="display: block;"';
                      }
                      else { // If invoice level discount type not present
                          $invoice_disc_input_val = '';  
                          $invoice_disc_amt = '';
                          $invoice_disc_amt_label = '0000.00';
                          // $disp_style = ' style="display: none;"';
                      }

                      if($row1["discounttype"]!=""){
                        $disp_style = ' style="display: block;"';
                      }
                      else {
                        $disp_style = ' style="display: none;"';
                      }

                      if($row1["igst"]!=0){ // If invoice level IGST present
                          $invoice_igst_label = number_format($row1["igst"], 2);
                          $invoice_igst = $row1["igst"];
                          $invoice_cgst = $invoice_sgst = 0;
                      }
                      else if($row1["cgst"]!=0){ // If invoice level CGST present
                          $invoice_igst = 0;
                          $invoice_cgst_label = number_format($row1["cgst"], 2);
                          $invoice_cgst = $row1["cgst"];
                          $invoice_sgst_label = number_format($row1["sgst"], 2);
                          $invoice_sgst = $row1["sgst"];
                      }
                      else {
                          $invoice_igst = $invoice_cgst = $invoice_sgst = 0;
                          $invoice_cgst_label = $invoice_sgst_label = $invoice_igst_label = '0000.00';
                      }

                      // Shows total discount amount in summary
                      if($edit_invoice_calculated_disc_amt===0){
                          $check_invoice_calculated_disc_amt = ($row1["discountamount"]!=0) ? $row1["discountamount"] : 0;

                          if($check_invoice_calculated_disc_amt===0){
                            $total_discountvalue = str_pad($edit_invoice_calculated_disc_amt, 4, "0", STR_PAD_LEFT).'.'.str_pad($edit_invoice_calculated_disc_amt, 2, "0", STR_PAD_RIGHT);
                          }
                          else {
                            $total_discountvalue = number_format($check_invoice_calculated_disc_amt,2,'.','');
                          }
                      }
                      else {
                          $total_discountvalue = number_format($edit_invoice_calculated_disc_amt,2,'.','');
                      }

                      if($row1["gst"]==''){
                        $invoice_gst = "Select Type";
                      }
                      else{
                        $invoice_gst = $row1["gst"];
                      }

                      if($invoice_gst == "Select Type"){
                        $inv_sgst_display = 'style="display:none;"';
                      }
                      else {
                        $inv_sgst_display = '';
                      }

                  $output .= '<input type="hidden" id="hidden_invoice_discount_type" value="'.$row1['discounttype'].'" />
                        <input type="hidden" id="hidden_invoice_discount_rate" value="'.$invoice_disc_input_val.'" />
                        <input type="hidden" id="hidden_invoice_gst_type" value="'.$row1["gst"].'" />
                        <input type="hidden" id="hidden_invoice_gst_rate" value="'.$invoice_gst_rate.'" />
                        <input type="hidden" id="hidden_invoice_igst_amt" value="'.$invoice_igst.'" />
                        <input type="hidden" id="hidden_invoice_cgst_amt" value="'.$invoice_cgst.'" />
                        <input type="hidden" id="hidden_invoice_sgst_amt" value="'.$invoice_sgst.'" />
                        <input type="hidden" id="hidden_invoice_igst_label" value="'.$invoice_igst_label.'" />
                        <input type="hidden" id="hidden_invoice_cgst_label" value="'.$invoice_cgst_label.'" />
                        <input type="hidden" id="hidden_invoice_sgst_label" value="'.$invoice_sgst_label.'" />
                        <input name="invoice_disc_amt" id="edit_invoice_disc_amt" type="text" value="'.$invoice_disc_input_val.'" class="form-control rate" onkeypress="return event.charCode >= 48 && event.charCode <= 57" readonly>
                      <input type="hidden" name="invoice_calculated_disc_amt" id="edit_invoice_calculated_disc_amt" value="'.$total_discountvalue.'" />
                      </td>
                      <td class="width_15"><span class="main_amount">₹ '.$invoice_disc_amt_label.'</span>
                      </td>
                      <td class="width_10">
                      </td>
                      <script>
                         $(document).ready(function(){
                            var gsttypeVal = "'.$invoice_gst.'";

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
                            $("#edit_Calculate_IGSTandCGST_select-menu li[data-val='."'".$invoice_gst."'".']").addClass("custom-a11yselect-focused");
                            $("#edit_Calculate_IGSTandCGST_select-menu li[data-val='."'".$invoice_gst."'".']").addClass("custom-a11yselect-selected");

                            var invoice_gstrateVal = "'.$invoice_gst_rate.'";
                            if(invoice_gstrateVal!="Select Type"){
                                $("#edit_Calculate_rate-menu").find(".custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
                            }
                            $("#edit_Calculate_rate-button .custom-a11yselect-text").text(invoice_gstrateVal+"%");
                            $("#edit_Calculate_rate-menu li[data-val="+invoice_gstrateVal+"]").addClass("custom-a11yselect-focused");
                            $("#edit_Calculate_rate-menu li[data-val="+invoice_gstrateVal+"]").addClass("custom-a11yselect-selected");
                         });
                      </script>
                    </tr>
                    <tr class="CGST_TR_section"'.$inv_gst_display.'>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right">+ GST (At invoice level)</span>
                      </td>';

                      $invGST_selected = '';
                      $invGST_selected1 = '';
                      if($invoice_gst=='CGST'){
                        $invGST_selected = 'selected="selected"';
                      }
                      if($invoice_gst=='IGST'){
                        $invGST_selected1 = 'selected="selected"';
                      }

                      $selected_gst_rate0 = $selected_gst_rate1 = $selected_gst_rate2 = $selected_gst_rate3 = $selected_gst_rate5 = $selected_gst_rate6 = $selected_gst_rate12 = $selected_gst_rate18 = $selected_gst_rate28 = '';

                      if($invoice_gst_rate == 0){
                        $selected_gst_rate0 = 'selected="selected"';
                      }
                      if($invoice_gst_rate == 1){
                        $selected_gst_rate1 = 'selected="selected"';
                      }
                      if($invoice_gst_rate == 2){
                        $selected_gst_rate2 = 'selected="selected"';
                      }
                      if($invoice_gst_rate == 3){
                        $selected_gst_rate3 = 'selected="selected"';
                      }
                      if($invoice_gst_rate == 5){
                        $selected_gst_rate5 = 'selected="selected"';
                      }
                      if($invoice_gst_rate == 6){
                        $selected_gst_rate6 = 'selected="selected"';
                      }
                      if($invoice_gst_rate == 12){
                        $selected_gst_rate12 = 'selected="selected"';
                      }
                      if($invoice_gst_rate == 18){
                        $selected_gst_rate18 = 'selected="selected"';
                      }
                      if($invoice_gst_rate == 28){
                        $selected_gst_rate28 = 'selected="selected"';
                      }


              $output .= '<td class="width_15 GST_section">
                        <select name="invoice_gst_type" id="edit_Calculate_IGSTandCGST_select" class="Calculate_IGSTandCGST common_invoice_IGSTandCGST form-control invoice_IGSTandCGST">
                          <option value="">Select Type</option>
                          <option value="IGST" '.$invGST_selected.'>IGST</option>
                          <option value="CGST" '.$invGST_selected1.'>CGST</option>
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
                        <input type="hidden" class="invoice_igst_amount" name="invoice_igst_amount" value="'.$invoice_igst.'" />
                        <input type="hidden" class="invoice_cgst_amount" name="invoice_cgst_amount" value="'.$invoice_cgst.'" />
                        <input type="hidden" class="invoice_sgst_amount" name="invoice_sgst_amount" value="'.$invoice_sgst.'" />
                      </td>
                      <td class="width_15"><span class="main_amount">₹ '.$invoice_cgst_label.'</span>
                      </td>
                      <td class="width_10">
                      </td>
                    </tr>
                    <tr id="edit_SGST_Calculate" class="SGST_Discount" '.$inv_sgst_display.'>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td class="width_20" style="font-size: 12px;font-weight: 600;"><span class="pull-right"></span>
                      </td>
                      <td class="width_15">
                        <input name="SGST" value="SGST" class="SGST form-control" type="text" readonly>
                      </td>
                      <td class="width_10 rate_data">
                        <!--<select name="SGST_Calculate_rate" id="edit_SGST_Calculate_rate" class="DiscountPer form-control">
                          <option value="">None</option>
                          <option value="18%">18%</option>
                          <option value="19%">19%</option>
                        </select>-->
                      </td>
                      <td class="width_15"><span class="main_amount">₹ '.$invoice_sgst_label.'</span>
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
                    <div id="edit_invoice_CalculateBtn"> <span>
                            <center>
                              <div class="form-group">
                              </div>
                              <input type="hidden" name="total_invoice_val" id="edit_total_invoice_value" value="0" />
                              <input type="hidden" name="invoice_summary_value" id="edit_invoice_summary_value" value="1" />
                              <input type="hidden" name="invoice_items_discount_selected" id="edit_invoice_items_discount_selected" value="0" />
                              <input type="hidden" name="invoice_items_gst_type_selected" id="edit_invoice_items_gst_type_selected" value="0" />
                            </center>
                          </span>
                    </div>
                  </div>
                </div>
                <div class="row" id="edit_main_calculation">
                  <div class="col-xs-12 col-md-offset-8 col-md-4">
                    <div class="form-group form-control">
                      <label class="col-xs-5 col-md-5 pr0 control-label">Subtotal</label>
                      <div class="col-xs-7 col-md-7"> <span class="invoice_subtotal">
                                ₹ '.number_format($row1['sub_total'],2).'
                              </span><input type="hidden" name="invoice_subtotal_amount" id="edit_invoice_subtotal_amount" value="'.$row1['sub_total'].'">
                      </div>
                    </div>
                    <div class="form-group form-control">
                      <label class="col-xs-5 col-md-5 pr0 control-label">Total discount</label>
                      <div class="col-xs-7 col-md-7"> <span class="invoice_total_discount">
                                ₹ '.$total_discountvalue.'
                              </span><input type="hidden" name="invoice_totaldiscount_amount" id="edit_invoice_totaldiscount_amount" value="'.$row1['total_discount'].'">
                      </div>
                    </div>';
                    if(!$total_amount_taxes){ // If item level discount is not given
                        $taxes_total = 0;
                        if($invoice_igst){
                            $taxes_total = $invoice_igst;
                        }
                        if($invoice_cgst){
                            $taxes_total = $invoice_cgst + $invoice_sgst;
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

                    $total_due_amt = $total_amt - $total_paid;
                    
               $output .= '<div class="form-group form-control">
                      <label class="col-xs-5 col-md-5 pr0 control-label">Total taxes</label>
                      <div class="col-xs-7 col-md-7"> <span class="invoice_total_taxes">
                                ₹ '.$total_tax_amount_label.'
                              </span><input type="hidden" name="invoice_totaltaxes_amount" id="edit_invoice_totaltaxes_amount" value="'.$total_tax_amount.'">
                      </div>
                    </div>
                    <div class="form-group form-control">
                      <label class="col-xs-5 col-md-5 pr0 control-label">Total amount</label>
                      <div class="col-xs-7 col-md-7"> <span class="invoice_total_amount">
                                ₹ '.number_format($total_amt,2).'
                              </span><input type="hidden" name="invoicetotal_amount" id="edit_invoicetotal_amount" value="'.$total_amt.'">
                      </div>
                    </div>
                    <div class="form-group form-control">
                      <label class="col-xs-5 col-md-5 pr0 control-label">Total Paid</label>
                      <div class="col-xs-7 col-md-7"> <span class="invoice_total_paid_amount">
                                ₹ '.number_format($total_paid,2).'
                              </span><input type="hidden" name="invoicetotal_paid_amount" id="edit_invoicetotal_paid_amount" value="'.$total_paid.'">
                      </div>
                    </div>
                    <div class="form-group form-control">
                      <label class="col-xs-5 col-md-5 pr0 control-label">Total Due</label>
                      <div class="col-xs-7 col-md-7"> <span class="invoice_total_due_amount">
                                ₹ '.number_format($total_due_amt,2).'
                              </span><input type="hidden" name="invoicetotal_due_amount" id="edit_invoicetotal_due_amount" value="'.$total_due_amt.'">
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
                      <textarea name="invoice_terms_conditions" id="edit_invoice_terms_conditions" readonly="readonly"  class="form-control textarea-content">'.$row1['terms_conditions'].'</textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <div class="col-md-6">
        <div class="panel panel-default" id="edit_BankInvoice_Details">
                <div class="panel-heading">Add Bank details</div>
                  <div class="panel-body" id="">
                      <div class="row">
                        <div class="col-md-8">
                            <div class="form-group edit_invoice_select_account_main" style="display:none;" >
                              <select name="edit_invoice_select_account" id="edit_invoice_select_account" class="edit_invoice_select_account form-control">
                                <option value="">Select Account</option>
                              </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                            <div class="edit_Invoice_AccountDetails" >
                              <input type="hidden" name="bank_holder_name" id="bank_holder_name" value="'.$row1['beneficiary'].'" />
                              <input type="hidden" name="bank_name" id="bank_name" value="'.$row1['bankname'].'"  />
                              <input type="hidden" name="account_no" id="account_no" value="'.$row1['accountno'].'" />
                              <input type="hidden" name="IFSCcode" id="IFSCcode" value="'.$row1['ifsc'].'"  />
                              <input type="hidden" name="bank_UPI" id="bank_UPI" value="'.$row1['bank_upi'].'" />';

                            if($row1['beneficiary']){
                                $output .= '<div id="edit_Holder_name"><span><b>A/C Holder Name: </b>'.$row1['beneficiary'].'</span></div>';
                            }

                            if($row1['bankname']){
                                $output .= '<div id="edit_Holder_name"><span><b>Bank Name: </b>'.$row1['bankname'].'</span></div>';
                            }
                            
                            if($row1['accountno']){
                                $output .= '<div id="edit_Holder_name"><span><b>Account No.: </b>'.$row1['accountno'].'</span></div>';
                            }
                            
                            if($row1['ifsc']){
                                $output .= '<div id="edit_Holder_name"><span><b>IFSC Code: </b>'.$row1['ifsc'].'</span></div>';
                            }
                            
                            if($row1['bank_upi']){
                                $output .= '<div id="edit_Holder_name"><span><b>UPI: </b>'.$row1['bank_upi'].'</span></div>';
                            }

                            if(!$row1['beneficiary']){
                                $output .= '<div id="edit_Holder_name"><span><b>No bank details selected. </b></span></div>';
                            }

                    $output .= '<div class="form-group">
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

                <div class="row">
                  <div class="col-xs-12">
                    <div class="edit-custom-file-upload" style="display:none">
                      <input type="file" value="" name="attachment[]" id="edit_attachment" onchange="geteditFilenames()" multiple>
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <div class="">
                      <div class="">
                      <ul class="edit_invoice_filesList list-unstyled"></ul>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div id="filelist">
                        <ul class="list-unstyled">';
                        if(!empty($row1['filename']))
                        {
                            $sql4="select * from user where user_name='$user_name'";
                            $result4=mysqli_query($conn,$sql4);
                            $row4=mysqli_fetch_assoc($result4);
                            $user=$row4['user_name'];

                            $uploads_zipdir = 'invoice/zipFolder/';
                            if(!is_dir($uploads_zipdir))
                            {
                                mkdir($uploads_zipdir,0777,true);
                                // chmod($uploads_dir, 0755);
                            }

                            // transfer file from s3 buckets to local
                            include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3Connect.php');
                            // Where the files will be source from
                            $source = 's3://fincrm/Development/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$row1['user_name'].'/'.$id.'/';

                            // Where the files will be transferred to
                            $dest = $_SERVER['DOCUMENT_ROOT'].'/client/res/templates/financial_changes/invoice/zipFolder/';

                            // Create a transfer object
                            $manager = new \Aws\S3\Transfer($s3, $source, $dest);

                            //Perform the transfer synchronously
                            $manager->transfer();

                            $file_path = $_SERVER["DOCUMENT_ROOT"]."/client/res/templates/financial_changes/invoice/zipFolder/".$row1['filename'];

                            $ExtractFileName = '';
                            $zip = new ZipArchive;
                            $res = $zip->open($file_path);
                            if($res == TRUE)
                            {
                                for($i = 0; $i < $zip->numFiles; $i++)
                                {
                                    $ExtractFileName = $zip->getNameIndex($i);

                                    // $link="../../client/res/templates/financial_changes/download_invoice_attachments.php?id=".$row1['id'];

                                    $link="../../client/res/templates/financial_changes/download_invoice_attachments.php?filename=".$ExtractFileName;
                                    
                                    $output .= '<div class="row" id="'.$id."_".$i.'">
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                               <div class="li">
                                                  <li style="display: inline;list-style-type: none;">'.$ExtractFileName.'<span class="glyphicon glyphicon-download-alt" style="display: inline;list-style-type: none;float:right"><a id="download_viewed_invoice_attachment" data-name="'.$ExtractFileName.'" style="margin-left:-22px" href="'.$link.'">&nbsp; Download</a></span></li>
                                               </div>
                                            </div>
                                         </div>';
                                }
                                $zip->close();
                            }
                        }
                        /*$sql11 = "SELECT * FROM invoice_files where invoice_id='$id'";
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
                       
                              <div class="invoice_delete_file" id="invoice_delete_file" data-id="'.$row11['id'].'" style="color:#0f243f; cursor:pointer;"><span class="glyphicon-remove material-icons-outlined"style="cursor: pointer; font-size: 14px;top: 3px; margin-left: 5px;" >close</span>
                           </div>
                        </div>
                     </div>';
                    
                        }*/

                $output .= '</ul>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        </form>
        </div>';
echo json_encode($output);
?>