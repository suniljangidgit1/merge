 <?php
session_start();
error_reporting(~E_ALL);
 $user_name = $_SESSION['Login'];
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

$output='
                      <form  name="updateForm" method="post" id="convert_InvoiceForm" enctype="multipart/form-data">
                         <div class="container">
                            <div class="row">
                               <div class="col-md-12">
                                  <div class="btn-group">
                                     <button type="submit" id="convert_invoiceBTN" class="btn btn-primary">Convert</button>
                                     <input type="hidden" id="recordId" name="recordId" value="'.$id.'" />
                                  </div>
                               </div>
                            </div>
                            <div class="row">
                               <div class="col-md-12">
                                  <div class="" style="border-bottom: 1px solid #e5e5e5; margin-bottom: 5px;">
                                     <h4>Overview</h4>
                                  </div>
                               </div>
                            </div>
                            <div class="row">
                               <div class="col-sm-6 col-md-6">
                                  <div class="form-group">
                                     <label >Bill From<span class="text-danger">*</span></label>
                                     <input type="text" value="'.$row1['billfromname'].'"  name="billfromname_convert" id="billfromname_convert" class="form-control" placeholder="Name" required>
                                  </div>
                                  <div class="form-group">
                                     <input type="text" value="'. $row1["billing_address_street"].'" name="billing_address_street_convert" id="billing_address_street_convert" class="form-control" placeholder="Street" maxlength="56" >
                                  </div>
                                  <div class="row">
                                     <div class="col-sm-4 col-md-4" style="padding-right: 0px;">
                                        <div class="form-group">
                                           <input type="text" value="'. $row1["billing_address_city"].'"  name="billing_address_city_convert" id="billing_address_city_convert" class="form-control" placeholder="City" >
                                        </div>
                                     </div>
                                     <div class="col-sm-4 col-md-4" style="padding-right: 0px;">
                                        <div class="form-group">
                                           <select value="'.$row1['billing_address_state'].'" name="billing_address_state_convert" id="billing_address_state_convert" class="form-control" placeholder="State">';
                                            
                                                 $indian_all_states  = 
                                                 array
                                                 ("AP" => "Andhra Pradesh","AR" => "Arunachal Pradesh","AS" => "Assam","BR" => "Bihar","CT" => "Chhattisgarh","GA" => "Goa","GJ" => "Gujarat","HR" => "Haryana","HP" => "Himachal Pradesh","JK" => "Jammu & Kashmir","JH" => "Jharkhand","KA" => "Karnataka","KL" => "Kerala","MP" => "Madhya Pradesh","MH" => "Maharashtra","MN" => "Manipur","ML" => "Meghalaya","MZ" => "Mizoram","NL" => "Nagaland","OR" => "Odisha","PB" => "Punjab","RJ" => "Rajasthan","SK" => "Sikkim","TN" => "Tamil Nadu","TR" => "Tripura","UK" => "Uttarakhand","UP" => "Uttar Pradesh","WB" => "West Bengal","AN" => "Andaman & Nicobar","CH" => "Chandigarh","DN" => "Dadra and Nagar Haveli","DD" => "Daman & Diu","DL" => "Delhi","LD" => "Lakshadweep","PY" => "Puducherry");
                                                 foreach ($indian_all_states  as $key => $value) {
                                                   $selected_indian_all_states = ( $row1["billing_address_state"] == $value ) ? "selected" : "";

                                               
                                               $output.='<option value="'.$value.'" '. $selected_indian_all_states.'>'.$value.'</option>';
                                               } 
                                            $output.='</select>
                                        </div>
                                     </div>
                                     <div class="col-sm-4 col-md-4">
                                        <div class="form-group">
                                           <input type="text" value="'.$row1['billing_address_postal_code'].'" name="billing_address_postal_code_convert" id="billing_address_postal_code_convert" class="form-control invoicepostal_to" placeholder="Postal Code"  maxlength="6"  minlength="6" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onchange="postal_code_Convert()" >
                                        </div>
                                     </div>
                                  </div>
                                  <div class="form-group">
                                     <input type="text" value="'.$row1['billing_address_country'].'" name="billing_address_country_convert" id="billing_address_country_convert" class="form-control" placeholder="Country" >
                                  </div>
                                  <div class="form-group">
                                     <input type="text" value="'.$row1['billingaddressgstin'].'" name="billingaddressgstin_convert" class="form-control billingaddressgstin_convert" placeholder="GSTIN" id="billingaddressgstin_convert" >
                                  </div>
                                  <div class="form-group">
                                     <input type="text" value="'. $row1["billfrompanno"].'" name="billingaddresspan_no_convert" class="form-control edit_pannnumber"   placeholder="PAN No" id="billingaddresspan_no_convert" minlength="10"  maxlength="10" style="text-transform: uppercase;" >
                                  </div>
                               </div>
                               <div class="col-sm-6 col-md-6">
                                  <div class="form-group">
                                     <label >Bill To<span class="text-danger">*</span></label>
                                     <input type="text" value="'.$row1['billtoname'].'"  name="billtoname_convert" id="billtoname_convert" class="form-control" placeholder="Name" required>
                                  </div>
                                  <div class="form-group">
                                     <input type="text" value="'.$row1['shipping_address_street'].'"  name="shipping_address_street_convert" id="shipping_address_street_convert" class="form-control" placeholder="Street" maxlength="56" >
                                  </div>
                                  <div class="row">
                                     <div class="col-sm-4 col-md-4" style="padding-right: 0px;">
                                        <div class="form-group">
                                           <input type="text" value="'.$row1['shipping_address_city'].'"  name="shipping_address_city_convert" id="shipping_address_city_convert" class="form-control" placeholder="City" >
                                        </div>
                                     </div>
                                     <div class="col-sm-4 col-md-4" style="padding-right: 0px;">
                                        <div class="form-group">
                                           <select value="'.$row1['shipping_address_state'].'"  name="shipping_address_state_convert" id="shipping_address_state_convert" class="form-control" placeholder="State">';
                                              
                                                 $indian_all_states  = 
                                                 array
                                                 ("AP" => "Andhra Pradesh","AR" => "Arunachal Pradesh","AS" => "Assam","BR" => "Bihar","CT" => "Chhattisgarh","GA" => "Goa","GJ" => "Gujarat","HR" => "Haryana","HP" => "Himachal Pradesh","JK" => "Jammu & Kashmir","JH" => "Jharkhand","KA" => "Karnataka","KL" => "Kerala","MP" => "Madhya Pradesh","MH" => "Maharashtra","MN" => "Manipur","ML" => "Meghalaya","MZ" => "Mizoram","NL" => "Nagaland","OR" => "Odisha","PB" => "Punjab","RJ" => "Rajasthan","SK" => "Sikkim","TN" => "Tamil Nadu","TR" => "Tripura","UK" => "Uttarakhand","UP" => "Uttar Pradesh","WB" => "West Bengal","AN" => "Andaman & Nicobar","CH" => "Chandigarh","DN" => "Dadra and Nagar Haveli","DD" => "Daman & Diu","DL" => "Delhi","LD" => "Lakshadweep","PY" => "Puducherry");
                                                 foreach ($indian_all_states  as $key => $value) {
                                                   $selected_indian_all_states = ( $row1["shipping_address_state"] == $value ) ? "selected" : "";
                                                
                                              $output.='<option value="'.$value.'" '.$selected_indian_all_states.'>'.$value.'</option>';
                                              }
                                           $output.='</select>
                                        </div>
                                     </div>
                                     <div class="col-sm-4 col-md-4">
                                        <div class="form-group">
                                           <input type="text" value="'.$row1['shipping_address_postal_code'].'" name="shipping_address_postal_code_convert" id="shipping_address_postal_code_convert" class="form-control shipinvoicepostal_to" placeholder="Postal Code" maxlength="6"  minlength="6" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  onchange="shipping_postal_code_Convert()">
                                        </div>
                                     </div>
                                  </div>
                                  <div class="form-group">
                                     <input type="text"  value="'.$row1['shipping_address_country'].'" name="shipping_address_country_convert" id="shipping_address_country_convert" class="form-control" placeholder="Country" >
                                  </div>
                                  <div class="form-group">
                                     <input type="text" value="'.$row1['shippingaddressgstin'].'"  name="shippingaddressgstin_convert"  id="shippingaddressgstin_convert" class="form-control edit_gstinnumber_shipping" placeholder="GSTIN" >
                                  </div>
                                  <div class="form-group">
                                     <input type="text" name="shippingaddresspan_no_convert"  value="'.$row1['billtopanno'].'" class="form-control edit_pannumber_shipping" placeholder="PAN No" minlength="10"  maxlength="10" id="shippingaddresspan_no_convert" style="text-transform: uppercase;" >
                                  </div>
                               </div>
                            </div>
                            <div class="row">
                               <div class="col-sm-6 col-md-6">
                                  <div class="form-group">
                                     <label>Account<span class="text-danger">*</span></label>
                                     <div class="input-group">
                                        <input type="text" value="'.$row5['name'].'" name="account_id_convert" id="account_id_convert" class="form-control" placeholder="Please Select Account"  required readonly>
                                        <span class="input-group-addon"  data-toggle="modal" data-target="#Convert_to_create_account_modal"><i class="glyphicon glyphicon-arrow-up"></i></span>
                                     </div>
                                  </div>
                               </div>
                               <div class="col-sm-6 col-md-6">
                                  <div class="form-group">
                                     <label for="">Date</label>
                                     <div class="input-group date" data-date-format="dd.mm.yyyy">
                                        <input value="'.date("d/m/Y",strtotime($row1['date'])).'"  type="text" id="date" name="date" class="form-control date" placeholder="Select Date" >
                                        <div class="input-group-addon" >
                                           <span class="glyphicon glyphicon-calendar"></span>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="row">
                               <div class="col-sm-6 col-md-6">
                                  <div class="form-group">
                                     <label for="">Estimate Number</label>
                                     <input type="text" value="'.$row1['invoice_number'].'"  name="estimate_number_convert"  id="estimate_number_convert" class="form-control" placeholder="" readonly>
                                  </div>
                               </div> 
                               <div class="col-sm-6 col-md-6">
                                  <div class="form-group">
                                     <label for="">Status</label>
                                     <select name="status_invoice" class="form-control">';
                                      $openStatus= ($row1["status"]=="Open") ? "selected" : "";
                                      $acceptedStatus= ($row1["status"]=="Accepted") ? "selected" : "";
                                      $declinedStatus= ($row1["status"]=="Declined") ? "selected" : "";

                                     $output.='
                                        <option value="Open" '.$openStatus.' >Open</option>
                                        <option value="Accepted" '.$acceptedStatus.' >Accepted</option>
                                        <option value="Declined" '.$declinedStatus.'>Declined</option>
                                     </select>
                                  </div>
                               </div>
                            </div>

                            <div class="row">
                               <div class="col-sm-6 col-md-6 ">
                                  <div class="form-group">
                                     <label for="">Place of Supply </label>
                                     <select name="placeofsupply_convert" class="form-control"  id="placeofsupply_convert">';
                                        
                                           $indian_all_states  = 
                                           array
                                           ("AP" => "Andhra Pradesh","AR" => "Arunachal Pradesh","AS" => "Assam","BR" => "Bihar","CT" => "Chhattisgarh","GA" => "Goa","GJ" => "Gujarat","HR" => "Haryana","HP" => "Himachal Pradesh","JK" => "Jammu & Kashmir","JH" => "Jharkhand","KA" => "Karnataka","KL" => "Kerala","MP" => "Madhya Pradesh","MH" => "Maharashtra","MN" => "Manipur","ML" => "Meghalaya","MZ" => "Mizoram","NL" => "Nagaland","OR" => "Odisha","PB" => "Punjab","RJ" => "Rajasthan","SK" => "Sikkim","TN" => "Tamil Nadu","TR" => "Tripura","UK" => "Uttarakhand","UP" => "Uttar Pradesh","WB" => "West Bengal","AN" => "Andaman & Nicobar","CH" => "Chandigarh","DN" => "Dadra and Nagar Haveli","DD" => "Daman & Diu","DL" => "Delhi","LD" => "Lakshadweep","PY" => "Puducherry");
                                           foreach ($indian_all_states  as $key => $value) {
                                             $selected_indian_all_states = ( $row1["placeofsupply"] == $value ) ? "selected" : "";
                                          
                                        $output.='<option value="'.$value.'" '.$selected_indian_all_states.'>'.$value.'</option>';
                                        }
                                     $output.='</select>
                                  </div>
                               </div>
                               <div class="col-sm-6 col-md-6">
                                  <div class="form-group">
                                     <label for="">Order Date</label>
                                     <div class="input-group date" data-date-format="dd.mm.yyyy">
                                        <input value=" "  type="text" id="date_invoice3" name="orderdate_invoice" class="form-control con_orderDate3" placeholder="Select Date"  >
                                        <div class="input-group-addon" >
                                           <span class="glyphicon glyphicon-calendar"></span>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="row">
                               <div class="col-sm-6 col-md-6">
                                  <div class="form-group">
                                     <label >Invoice Number<span class="text-danger">*</span></label>
                                     <input type="text" value=" "  name="invoiceno_convert" id="invoiceno" class="form-control invoiceno" placeholder="Invoice Number" required>
                                  </div>
                               </div>
                               <div class="col-sm-6 col-md-6">
                                  <div class="form-group">
                                     <label for="">Invoice Date</label>
                                     <div class="input-group date_invoice" data-date-format="dd.mm.yyyy">
                                        <input value=" "  type="text" id="date_invoice1" name="invoicedate_invoice" class="form-control con_invDate3" placeholder="Select Date"  >
                                        <div class="input-group-addon" >
                                           <span class="glyphicon glyphicon-calendar"></span>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="row">
                               <div class="col-sm-6 col-md-6">
                                  <div class="form-group">
                                     <label for="">Buyer order Number</label>
                                     <input type="text" value=" "  name="buyerorderno_convert" class="form-control" placeholder="">
                                  </div>
                               </div>
                               <div class="col-sm-6 col-md-6">
                                  <div class="form-group">
                                     <label for="">Due Date</label>
                                     <div class="input-group date" data-date-format="dd.mm.yyyy">
                                        <input value=" "  type="text" id="date_invoice2" name="duedate_invoice" class="form-control con_dueDate3" placeholder="Select Date"  >
                                        <div class="input-group-addon" >
                                           <span class="glyphicon glyphicon-calendar"></span>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="row">
                               <div class="col-sm-6 col-md-6">
                                  <div class="form-group"> 
                                     <label for="">GST </label>';
                                      $selected_IGST = ($row1["g_s_t"] == "IGST") ? "selected" : "";
                                     $selected_CGST_SGST = ($row1["g_s_t"] == "CGST/SGST") ? "selected" : "";
                                     $output.='
                                     <select id="g_s_t_convert" name="g_s_t_convert" class="form-control" onchange="getVal_Convert()" >
                                        <option value="IGST" '.$selected_IGST.' >IGST</option>
                                        <option value="CGST/SGST" '.$selected_CGST_SGST.' >CGST/SGST</option>
                                     </select>
                                  </div>
                               </div>
                               <div class="col-sm-6 col-md-6">
                                  <div class="form-group">
                                     <label for="">Discount Type</label>';
                                     
                                      $discountType1 = ($row1["discounttype"] == "Select Discount Type") ? "selected" : "";
                                     $discountType2 = ($row1["discounttype"] == "At item level") ? "selected" : "";
                                     $discountType3 = ($row1["discounttype"] == "At invoice level") ? "selected" : "";
                                     $output.='<select id="discount_type_convert" name="discount_type_convert" class="form-control" >
                                        <option '.$discountType1.' value="Select Discount Type">Select Discount Type</option>
                                        <option '.$discountType2.' value="At item level">At item level</option>
                                        <option '.$discountType3.'  value="At invoice level">At invoice level</option>
                                     </select>
                                  </div>
                               </div>
                            </div>
                        
                         <div id="addbankdetails">
                            <div class="row">
                               <div class="col-md-12">
                                  <div class="" style="border-bottom: 1px solid #e5e5e5; margin-bottom: 5px;">
                                     <h4>Bank Details</h4>
                                  </div>
                               </div>
                            </div>
                            <div class="row">
                               <div class="col-sm-6 col-md-6">
                                  <div class="form-group">
                                     <label for="">Beneficiary</label>
                                     <input type="text" value=" "  name="beneficiary_convert" class="form-control" placeholder="">
                                  </div>
                               </div>
                               <div class="col-sm-6   col-md-6">
                                  <div class="form-group">
                                     <label for="">Bank Name</label>
                                     <input type="text" value=""  name="bankname_convert" id="" class="form-control" placeholder="">
                                  </div>
                               </div>
                            </div>
                            <div class="row">
                               <div class="col-sm-6 col-md-6">
                                  <div class="form-group">
                                     <label for="">Branch</label>
                                     <input type="text" value=" "  name="branch_convert" class="form-control" placeholder="">
                                  </div>
                               </div>
                               <div class="col-sm-6   col-md-6">
                                  <div class="form-group">
                                     <label for="">Account No</label>
                                     <input type="text" value=" "  name="accountno_convert" id="" class="form-control" placeholder="" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                  </div>
                               </div>
                            </div>
                            <div class="row">
                               <div class="col-sm-6 col-md-6">
                                  <div class="form-group">
                                     <label for="">IFSC Code</label>
                                     <input type="text" value=""  name="ifsc_convert" class="form-control" placeholder="">
                                  </div>
                               </div>
                            </div>
                         </div>
                         <div class="" id="additem_convert">
                            <div class="row">
                               <div class="col-sm-12 col-md-12">
                                  <div class="" style="border-bottom: 1px solid #e5e5e5; margin-bottom: 5px;">
                                     <h4>Add Item</h4>
                                  </div>
                               </div>
                            </div>';
                            
                               $sql2="select * from estimates_items where estimate_id='".$estimate_id."'";
                               $result2=mysqli_query($conn,$sql2);
                               $count=0;
                               $count2=0;
                               $total_amount=0;
                               $total_amount_igst=0;
                                $total_amount_scst=0;
                               while($row2=mysqli_fetch_assoc($result2))
                               {
                              $output.='
                            <div class="item" id="1'.$count2.'">
                               <div style="">
                                  <div class="row">
                                     <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                           <label for="">Item Name<span class="text-danger">*</span></label>
                                           <input type="hidden" value="'.$row2["id"].'" name="item_id_convert[]">
                                           <input type="text" value="'.$row2["item_name"].'"  name="item_name_convert[]" id="item_name_convert" class="form-control" placeholder="" maxlength="40" required>
                                        </div>
                                     </div>
                                     <div class=" col-sm-6 col-md-6">
                                        <div class="form-group">
                                           <label for="">Description</label>
                                           <textarea  type="text" value="'.$row2["description"].'"  name="description_convert[]" id="description_convert" class="form-control" placeholder="" maxlength="180" >'. $row2["description"].'</textarea>
                                        </div>
                                     </div>
                                  </div>
                                  <div class="row">
                                     <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                           <label for="">HSN/SAC</label>
                                           <input type="text" value="'.$row2["hsn"].'"  name="hsn_convert[]" class="form-control" placeholder="" id="hsn_convert">
                                        </div>
                                     </div>
                                     <div class="col-sm-6   col-md-6">
                                        <div class="form-group">
                                           <label for="">Quantity<span class="text-danger">*</span></label>
                                           <input type="text" value="'.$row2["quantity"].'"  name="quantity_convert[]" id="quantity_convert" class="form-control quantity_convert" placeholder="" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                        </div>
                                     </div>
                                  </div>
                                  <div class="row" style="padding-bottom:5px;">
                                     <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                           <label for="">Rate<span class="text-danger">*</span></label>
                                           <input type="text" value="'.$row2["rate"].'"  name="rate_convert[]" id="rate_convert" class="form-control rate_convert" placeholder="" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                        </div>
                                     </div>
                                     <div class=" col-sm-6 col-md-6">
                                        <div class="form-group">
                                           <label for="">Gst Rate </label>
                                           <select name="gst_rate_convert[]" id="convert_estimate_gst_rate" class="form-control edit_gst_rate" >';
                                            $gstRate1= ($row2["gst_rate"]=="0") ? "selected" : "";
                                            $gstRate2= ($row2["gst_rate"]=="1") ? "selected" : "";
                                            $gstRate3= ($row2["gst_rate"]=="2") ? "selected" : "";
                                            $gstRate4= ($row2["gst_rate"]=="3") ? "selected" : "";
                                            $gstRate5= ($row2["gst_rate"]=="5") ? "selected" : "";
                                            $gstRate6= ($row2["gst_rate"]=="6") ? "selected" : "";
                                            $gstRate7= ($row2["gst_rate"]=="12") ? "selected" : "";
                                            $gstRate8= ($row2["gst_rate"]=="18") ? "selected" : "";
                                            $gstRate9= ($row2["gst_rate"]=="28") ? "selected" : "";
                                           $output.=
                                           '   <option value="0" '.$gstRate1.'>0</option>
                                              <option value="1" '.$gstRate2.'>1</option>
                                              <option value="2" '.$gstRate3.'>2</option>
                                              <option value="3" '.$gstRate4.'>3</option>
                                              <option value="5" '.$gstRate5.'>5</option>
                                              <option value="6" '.$gstRate6.'>6</option>
                                              <option value="12" '.$gstRate7.'>12</option>
                                              <option value="18" '.$gstRate8.'>18</option>
                                              <option value="28" '.$gstRate9.'>28</option>
                                           </select>
                                        </div>
                                     </div>
                                  </div>
                                  <div class="row  discount_convert_to_invoice"  id="discount_convert_to_invoice">
                                     <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                           <label for="">Discount</label>
                                           <div class="input-group">
                                              <input id="discount_convert" type="text" value="'. $row2["discountvalue"].'"  class="form-control edit_dynamic_discount_to " name="estimate_discount_amount_item_convert[]" placeholder="">
                                              <span class="input-group-addon" style="padding: 0px;">
                                                 <select style="padding: 6px 3px;border: none;" name="estimate_discount_option_item_convert[]" id="option_con">';
                                                  $discountoption1= ($row2['discountoption']=='%') ? "selected" : "";
                                                $discountoption2= ($row2['discountoption']=='Rs') ? "selected" : "";
                                                 $output.='
                                                    <option '.$discountoption1.'>%</option>
                                                    <option '.$discountoption2.'>Rs</option>
                                                 </select>
                                              </span>
                                           </div>
                                         </div>
                                     <div class=" col-sm-6 col-md-6">
                                     </div>
                                  </div>
                                   </div> </div></div></div>

                                  <div class="row">
                                     <div class="col-md-12">
                                        <a class="btn btn-primary btnUpdate3_convert" data-db-id="'. $row2["id"].'" data-update-id="1'.$count2.'" id="remove_field3_convert'. $count2.'" style="margin-bottom:10px;">Remove Item</a>
                                     </div>
                                  </div>
                              ';
                               $count2++; } 
                            $output.='</div>
                            <div class="container" id="con"></div>
                            <div class="row">
                               <div class="col-sm-6 col-md-6">
                               </div>
                               <div class="col-sm-6 col-md-6">
                                  <div class="form-group">
                                     <label for=""></label>
                                     <div class="row">
                                        <div class=" col-sm-3 col-md-3">
                                           <div class="form-group">
                                              <a class="btn btn-primary" id="calculate_convert_to" >Calculate</a>
                                           </div>
                                        </div>
                                        <div class=" col-sm-9 col-md-9">
                                           <div class="form-group" style="visibility:hidden;">
                                              <input  type="text" value=""  name="" id="" class="form-control" placeholder="" >
                                           </div>
                                        </div>
                                     </div>';
                                     
                                        $total=(float)$row1["total"]+(float)$row1["adjustments"];
                                        
                                     $output.=
                                     '<div class="row">
                                        <div class=" col-sm-3 col-md-3">
                                           <div class="form-group">
                                              <label for="" style="margin-top:5px;">Subtotal:</label>
                                           </div>
                                        </div>
                                        <div class=" col-sm-9 col-md-9">
                                           <div class="form-group">
                                              <input type="text" value="'.$total.'"  name="" id="subtotal_con" class="form-control" placeholder="" readonly="readonly">
                                           </div>
                                        </div>
                                     </div>
                                      <div class="row" id="IGST_BLOCK_CON" style="display:none;">
                                        <div class=" col-sm-3 col-md-3">
                                           <div class="form-group">
                                              <label for="" style="margin-top:5px;">IGST:</label>
                                           </div>
                                        </div>
                                        <div class=" col-sm-9 col-md-9">
                                           <div class="form-group">
                                              <input readonly type="text" name="IGST" id="IGSTCon" class="form-control" >
                                           </div>
                                        </div>
                                     </div>
                                     <div class="row" id="SGST_BLOCK_CON" style="display:none;">
                                        <div class=" col-sm-3 col-md-3">
                                           <div class="form-group">
                                              <label for="" style="margin-top:5px;">SGST:</label>
                                           </div>
                                        </div>
                                        <div class=" col-sm-9 col-md-9">
                                           <div class="form-group">
                                              <input readonly type="text" value=""  name="SGST" id="SGSTCon" class="form-control" placeholder="">
                                           </div>
                                        </div>
                                     </div>
                                     <div class="row" id="CGST_BLOCK_CON" style="display:none;">
                                        <div class=" col-sm-3 col-md-3">
                                           <div class="form-group">
                                              <label for="" style="margin-top:5px;">CGST:</label>
                                           </div>
                                        </div>
                                        <div class=" col-sm-9 col-md-9">
                                           <div class="form-group">
                                              <input readonly type="text" value=""  name="CGST" id="CGSTCon" class="form-control" placeholder="">
                                           </div>
                                        </div>
                                     </div>
                                     <div class="row" id="discount_esti_invoice_to" style="display: none;">
                                        <div class=" col-sm-3 col-md-3">
                                           <div class="form-group">
                                              <label for="" style="margin-top:5px;" >Discount:</label>
                                           </div>
                                        </div>
                                        <div class=" col-sm-9 col-md-9">
                                           <div class="form-group">
                                              <div class="input-group">
                                                 <input id="discount_calculate_convert_to" type="text" value="'.$row1["discountvalue"].'" class="form-control discount_calculate_convert_to" name="estimate_discount_amount_convert" placeholder="">
                                                 <span class="input-group-addon" style="padding: 0px;">
                                                    <select  style="padding: 6px 3px;border: none;" name="estimate_discount_option_convert" id="option_con1">';
                                                    $discountoption1= ($row2['discountoption']=='%') ? "selected" : "";
                                                $discountoption2= ($row2['discountoption']=='Rs') ? "selected" : "";
                                                    $output.='
                                                       <option '.$discountoption1.'>%</option>
                                                       <option '.$discountoption2.'>Rs</option>
                                                    </select>
                                                 </span>
                                              </div>
                                           </div>
                                        </div>
                                     </div>
                                     <div class="row">
                                        <div class=" col-sm-3 col-md-3">
                                           <div class="form-group">
                                              <label for="" style="margin-top:5px;">Adjustment:</label>
                                           </div>
                                        </div>
                                        <div class=" col-sm-9 col-md-9">
                                           <div class="form-group">
                                              <input type="text" value="'.$row1["adjustments"].'"  name="adjustment_convert" id="adjustmemt_calculate_convert_to" class="form-control" placeholder="">
                                           </div>
                                        </div>
                                     </div>
                                     <div class="row">
                                        <div class=" col-sm-3 col-md-3">
                                           <div class="form-group">
                                              <label for="" style="margin-top:5px;">Total:</label>
                                           </div>
                                        </div>
                                        <div class=" col-sm-9 col-md-9">
                                           <div class="form-group">
                                              <input type="text" value="'.$row1["total"].'"  name="amount" id="total_con" class="form-control" placeholder="" readonly="readonly">
                                           </div>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="row" style="margin-bottom: 10px;">
                               <div class="col-md-12">
                                  <div class="">
                                     <input type="file" name="file_convert[]" id="file_convert" multiple>
                                  </div>
                               </div>
                            </div>
                      </form><!--filelist_invoice Start -->
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
                                           <li>'.$row11['original_filename'].'</li>
                                        </div>
                                     </div>
                                     <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div>
                                           <a class="delete_file" id="delete_file" data-id="'.$row11['id'].'" style="color:#0f243f;cursor:pointer;"><span class="glyphicon glyphicon-remove"></span></a>
                                        </div>
                                     </div>
                                  </div>';
                                  
                                     }
                                  
                               $output.='</ol>
                            </div>
                         </div>
                      </div>
                      <!--filelist_invoice End -->
                      <!--Add Item Start -->
                      <div class="row">
                         <div class="col-md-12">
                            <div class="">
                               <a class="btn btn-success" style="margin-bottom: 10px;" id="convertToInvoice">Add Item</a> 
                            </div>
                         </div>
                      </div>
                      <!--Add Item End -->

    <script>

            var gstVal= $("#g_s_t_convert").val();
          //alert(gstVal);
          if(gstVal=="IGST"){
            $("#IGST_BLOCK_CON").css("display", "block");
            }else if(gstVal=="CGST/SGST"){
               $("#SGST_BLOCK_CON").css("display", "block");
              $("#CGST_BLOCK_CON").css("display", "block");

            }
  </script>


 <script type="text/javascript">
         $(document).ready(function(){
           var item = $("#discount_type_convert").val();
          // alert(item);
                  if(item=="At item level"){
                    $("#discount_convert_to_invoice").show();
                     $(".discount_convert_to_invoice").show();
                     $(".edit_dynamic_discount_to").show();
                     $("#discount_esti_invoice_to").hide();
                  }
                  else if(item=="At invoice level"){
                     $("#discount_convert_to_invoice").hide();
                     $(".discount_convert_to_invoice").hide();
                     $(".edit_dynamic_discount_to").hide();
                     $("#discount_esti_invoice_to").show();
         
         
                  }
                  else if(item == "Select Discount Type"){
                     $("#discount_convert_to_invoice").hide();
                       $(".discount_convert_to_invoice").hide();
                      $(".discount_esti_invoice_to").hide();
                      $("#edit_dynamic_discount_to").hide();
                  }
         
          });
      </script> ';




echo json_encode($output);

 ?>