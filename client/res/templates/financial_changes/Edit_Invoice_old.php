
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

$account_id=$row1['account_id'];
$sql5="select * from account where id='$account_id'";
$result5=mysqli_query($conn,$sql5);
$row5=mysqli_fetch_assoc($result5);


$sql12="select * from invoice_files where invoice_id='".$id."'";
$result12=mysqli_query($conn,$sql12);
$row12=mysqli_fetch_assoc($result12);

$sql4="select * from user where user_name='$user_name'";
$result4=mysqli_query($conn,$sql4);
$row4=mysqli_fetch_assoc($result4);
$user=$row4['user_name'];

$output='
                      <form  method="post" id="updateInvoiceForm" enctype="multipart/form-data">
                         <div class="container">
                            <div class="row">
                               <div class="col-md-12">
                                  <div class="btn-group">
                                     <button type="submit" id="update_invoiceBTN" class="btn btn-primary">Update</button>
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
                                     <input type="text" value="'.$row1['billfromname'].'"  name="billfromname_invoice" id="" class="form-control" placeholder="Name" required>
                                  </div>
                                  <div class="form-group">
                                     <input type="text" value="'.$row1['billing_address_street'].'"  name="billing_address_street_invoice" id="" class="form-control" placeholder="Street" maxlength="56" >
                                  </div>
                                  <div class="row">
                                     <div class="col-sm-4 col-md-4" style="padding-right: 0px;">
                                        <div class="form-group">
                                           <input type="text" value="'.$row1['billing_address_city'].'"  name="billing_address_city_invoice" id="billing_address_city" class="form-control" placeholder="City" >
                                        </div>
                                     </div>
                                     <div class="col-sm-4 col-md-4" style="padding-right: 0px;">
                                        <div class="form-group">
                                           <select value="'.$row1['billing_address_state'].'" name="billing_address_state_invoice" id="billing_address_state_invoice" class="form-control" placeholder="State">';
                                            
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
                                           <input type="text" value="'.$row1['billing_address_postal_code'].'" name="billing_address_postal_code_invoice" id="billing_address_postal_code_invoice" class="form-control invoicepostal" placeholder="Postal Code"  maxlength="6"  maxlength="6" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  onchange="postal_code()" >
                                        </div>
                                     </div>
                                  </div>
                                  <div class="form-group">
                                     <input type="text" value="'.$row1['billing_address_country'].'" name="billing_address_country_invoice" id="billing_address_country" class="form-control" placeholder="Country" >
                                  </div>
                                  <div class="form-group">
                                     <input type="text" value="'.$row1['billingaddressgstin'].'" name="billingaddressgstin_invoice" class="form-control edit_gstinnumber_invoice" placeholder="GSTIN" id="gst_no_invoice" >
                                  </div>
                                  <div class="form-group">
                                     <input type="text" value="'. $row1["billfrompan"].'" name="billingaddresspanno_invoice" class="form-control edit_pannnumber_invoice"   placeholder="PAN No" id="pan_no_invoice" minlength="10"  maxlength="10" style="text-transform: uppercase;" >
                                  </div>
                               </div>
                               <div class="col-sm-6 col-md-6">
                                  <div class="form-group">
                                     <label >Bill To<span class="text-danger">*</span></label>
                                     <input type="text" value="'.$row1['billtoname'].'"  name="billtoname_invoice" id="" class="form-control" placeholder="Name" required>
                                  </div>
                                  <div class="form-group">
                                     <input type="text" value="'.$row1['shipping_address_street'].'"  name="shipping_address_street_invoice" id="" class="form-control" placeholder="Street" maxlength="56" >
                                  </div>
                                  <div class="row">
                                     <div class="col-sm-4 col-md-4" style="padding-right: 0px;">
                                        <div class="form-group">
                                           <input type="text" value="'.$row1['shipping_address_city'].'"  name="shipping_address_city_invoice" id="shipping_address_city_invoice" class="form-control" placeholder="City" >
                                        </div>
                                     </div>
                                     <div class="col-sm-4 col-md-4" style="padding-right: 0px;">
                                        <div class="form-group">
                                           <select value="'.$row1['shipping_address_state'].'"  name="shipping_address_state_invoice" id="shipping_address_state_invoice" class="form-control" placeholder="State">';
                                              
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
                                           <input type="text" value="'.$row1['shipping_address_postal_code'].'" name="shipping_address_postal_code_invoice" id="shipping_address_postal_code_invoice" class="form-control shipinvoicepostal" placeholder="Postal Code" maxlength="6"  maxlength="6" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  onchange="shipping_postal_code_invoice()">
                                        </div>
                                     </div>
                                  </div>
                                  <div class="form-group">
                                     <input type="text"  value="'.$row1['shipping_address_country'].'" name="shipping_address_country_invoice" id="shipping_address_country_invoice" class="form-control" placeholder="Country" >
                                  </div>
                                  <div class="form-group">
                                     <input type="text" value="'.$row1['shippingaddressgstin'].'"  name="shippingaddressgstin_invoice" class="form-control edit_gstinnumber_shipping_invoice" placeholder="GSTIN" >
                                  </div>
                                  <div class="form-group">
                                     <input type="text" name="shippingaddresspanno_invoice"  value="'.$row1['billtopan'].'" class="form-control edit_pannumber_shipping_invoice" placeholder="PAN No" minlength="10"  maxlength="10" style="text-transform: uppercase;" >
                                  </div>
                               </div>
                            </div>
                            <div class="row">
                               <div class="col-sm-6 col-md-6">
                                  <div class="form-group">
                                     <label>Account<span class="text-danger">*</span></label>
                                     <div class="input-group">
                                        <input type="text" value="'.$row5['name'].'" name="account_id_invoice" id="invoice_account_id" class="form-control " placeholder="Please Select Account"  required>
                                        <span class="input-group-addon"  data-toggle="modal" data-target="#Create_invoice_account_Modal"><i class="glyphicon glyphicon-arrow-up"></i></span>
                                     </div>
                                  </div>
                               </div>

                          <script>
                           $(".readonly").on("keydown paste", function(e){
                                 e.preventDefault();
                              });
                         </script>
                               <div class="col-sm-6 col-md-6">
                                  <div class="form-group">
                                     <label for="">Date</label>
                                     <div class="input-group date_invoice" data-date-format="dd.mm.yyyy">
                                        <input value="'.date("d/m/Y",strtotime($row1['date'])).'"  type="text" id="date_invoice" name="date_invoice" class="form-control" placeholder="Select Date"  >
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
                                     <input type="text" value="'.$row1['estimateno'].'"  name="invoice_number_invoice" class="form-control" placeholder="" readonly>
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
                                     <select name="placeofsupply_invoice" class="form-control"  id="placeofsupply_invoice">';
                                        
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
                                     <div class="input-group date_invoice" data-date-format="dd.mm.yyyy">
                                        <input value="'.date("d/m/Y",strtotime($row1["orderdate"])).'""  type="text" id="date_invoice3" name="orderdate_invoice" class="form-control orderDate1" placeholder="Select Date"  >
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
                                     <label for="">Invoice Number<span class="text-danger">*</span></label>
                                     <input type="text" value="'.$row1['invoiceno'].'"  name="invoiceno_invoice" class="form-control" placeholder="" required readonly>
                                  </div>
                               </div>
                               <div class="col-sm-6 col-md-6">
                                  <div class="form-group">
                                     <label for="">Invoice Date</label>
                                     <div class="input-group date_invoice" data-date-format="dd.mm.yyyy">
                                        <input value="'.date("d/m/Y",strtotime($row1['invoicedate'])).'""  type="text" id="date_invoice1" name="invoicedate_invoice" class="form-control invDate1" placeholder="Select Date"  >
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
                                     <input type="text" value="'.$row1['buyerorderno'].'"  name="buyerorderno_invoice" class="form-control" placeholder="">
                                  </div>
                               </div>
                               <div class="col-sm-6 col-md-6">
                                  <div class="form-group">
                                     <label for="">Due Date</label>
                                     <div class="input-group date_invoice" data-date-format="dd.mm.yyyy">
                                        <input value="'.date("d/m/Y",strtotime($row1['duedate'])).'""  type="text" id="date_invoice2" name="duedate_invoice" class="form-control dueDate1" placeholder="Select Date"  >
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
                                      $selected_IGST = ($row1["gst"] == "IGST") ? "selected" : "";
                                     $selected_CGST_SGST = ($row1["gst"] == "CGST/SGST") ? "selected" : "";
                                     $output.='
                                     <select id="edit_invoice_g_s_t" name="g_s_t_invoice" class="form-control" onchange="getval_invoice()" >
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
                                     $output.='<select id="edit_discount_type_invoice" name="discount_type_invoice" class="form-control" >
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
                                     <input type="text" value="'. $row1['beneficiary'].'"  name="beneficiary_invoice" class="form-control" placeholder="">
                                  </div>
                               </div>
                               <div class="col-sm-6   col-md-6">
                                  <div class="form-group">
                                     <label for="">Bank Name</label>
                                     <input type="text" value="'.$row1['bankname'].'"  name="bankname_invoice" id="" class="form-control" placeholder="">
                                  </div>
                               </div>
                            </div>
                            <div class="row">
                               <div class="col-sm-6 col-md-6">
                                  <div class="form-group">
                                     <label for="">Branch</label>
                                     <input type="text" value="'.$row1['branch'].'"  name="branch_invoice" class="form-control" placeholder="">
                                  </div>
                               </div>
                               <div class="col-sm-6   col-md-6">
                                  <div class="form-group">
                                     <label for="">Account No</label>
                                     <input type="text" value="'.$row1['accountno'].'"  name="accountno_invoice" id="" class="form-control" placeholder="" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                  </div>
                               </div>
                            </div>
                            <div class="row">
                               <div class="col-sm-6 col-md-6">
                                  <div class="form-group">
                                     <label for="">IFSC Code</label>
                                     <input type="text" value="'.$row1['ifsc'].'"  name="ifsc_invoice" class="form-control" placeholder="">
                                  </div>
                               </div>
                            </div>
                         </div>
                         <div class="" id="additem">
                            <div class="row">
                               <div class="col-sm-12 col-md-12">
                                  <div class="" style="border-bottom: 1px solid #e5e5e5; margin-bottom: 5px;">
                                     <h4>Add Item</h4>
                                  </div>
                               </div>
                            </div>';
                            
                               $sql2="select * from invoice_items where invoice_id='".$id."'";
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
                               <div style=" ">
                                  <div class="row">
                                     <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                           <label for="">Item Name<span class="text-danger">*</span></label>
                                           <input type="hidden" value="'.$row2["id"].'" name="item_invoice_id[]">
                                           <input type="text" value="'.$row2["item_name"].'"  name="item_invoice_name[]" id="item_name" class="form-control" placeholder="" maxlength="40" required>
                                        </div>
                                     </div>
                                     <div class=" col-sm-6 col-md-6">
                                        <div class="form-group">
                                           <label for="">Description</label>
                                           <textarea  type="text" value="'.$row2["description"].'"  name="description_invoice[]" id="description" class="form-control" placeholder="" maxlength="180" >'. $row2["description"].'</textarea>
                                        </div>
                                     </div>
                                  </div>
                                  <div class="row">
                                     <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                           <label for="">HSN/SAC</label>
                                           <input type="text" value="'.$row2["hsn"].'"  name="hsn_invoice[]" class="form-control" placeholder="">
                                        </div>
                                     </div>
                                     <div class="col-sm-6   col-md-6">
                                        <div class="form-group">
                                           <label for="">Quantity<span class="text-danger">*</span></label>
                                           <input type="text" value="'.$row2["quantity"].'"  name="quantity_invoice[]" id="quantity" class="form-control quantity_invoice" placeholder="" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required> 
                                        </div>
                                     </div>
                                  </div>
                                  <div class="row" style="padding-bottom:5px;">
                                     <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                           <label for="">Rate<span class="text-danger">*</span></label>
                                           <input type="text" value="'.$row2["rate"].'"  name="rate_invoice[]" id="rate_invoice" class="form-control rate_invoice" placeholder="" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                        </div>
                                     </div>
                                     <div class=" col-sm-6 col-md-6">
                                        <div class="form-group">
                                           <label for="">Gst Rate </label>
                                           <select name="gst_rate_invoice[]" id="edit_invoice_gst_rate" class="form-control edit_invoice_gst_rate" >';
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
                                  <div class="row discount_invoice"  id="discount_invoice">
                                     <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                           <label for="">Discount</label>
                                           <div class="input-group">
                                              <input id="discount_invoice" type="text" value="'. $row2["discountvalue"].'"  class="form-control discount_invoice" name="estimate_discount_amount_item_invoice[]" placeholder="" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                              <span class="input-group-addon" style="padding: 0px;">
                                                 <select style="padding: 6px 3px;border: none;" name="estimate_discount_option_item_invoice[]" id="option_invoice">';
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
                                     <div class=" col-sm-6 col-md-6">
                                     </div>
                                  </div>
                                  <div class="row">
                                     <div class="col-md-12">
                                        <a class="btn btn-primary btnUpdate3_invoice" data-db-id="'. $row2["id"].'" data-update-id="1'.$count2.'" id="remove_field3'. $count2.'" style="margin-bottom:10px;">Remove Item</a>
                                     </div>
                                  </div>
                               </div> </div></div>';
                               $count2++; } 
                            $output.='</div>
                            <div class="container" id="invoiceAdd"></div>
                            <div class="row">
                               <div class="col-sm-6 col-md-6">
                               </div>
                               <div class="col-sm-6 col-md-6">
                                  <div class="form-group">
                                     <label for=""></label>
                                     <div class="row">
                                        <div class=" col-sm-3 col-md-3">
                                           <div class="form-group">
                                              <a class="btn btn-primary" id="calculate_invoice" >Calculate</a>
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
                                              <input type="text" value="'.$total.'"  name="" id="subtotal_invoice" class="form-control" placeholder="" readonly="readonly">
                                           </div>
                                        </div>
                                     </div>
                                      <div class="row" id="IGST_BLOCK" style="display:none;">
                                        <div class=" col-sm-3 col-md-3">
                                           <div class="form-group">
                                              <label for="" style="margin-top:5px;">IGST:</label>
                                           </div>
                                        </div>
                                        <div class=" col-sm-9 col-md-9">
                                           <div class="form-group">
                                              <input readonly type="text" name="IGST" id="IGSTEst" class="form-control" value="'.$row2["igst"].'">
                                           </div>
                                        </div>
                                     </div>
                                     <div class="row" id="SGST_BLOCK" style="display:none;">
                                        <div class=" col-sm-3 col-md-3">
                                           <div class="form-group">
                                              <label for="" style="margin-top:5px;">SGST:</label>
                                           </div>
                                        </div>
                                        <div class=" col-sm-9 col-md-9">
                                           <div class="form-group">
                                              <input readonly type="text" value="'.$row2["sgst"].'"  name="SGST" id="SGSTEst" class="form-control" placeholder="">
                                           </div>
                                        </div>
                                     </div>
                                     <div class="row" id="CGST_BLOCK" style="display:none;">
                                        <div class=" col-sm-3 col-md-3">
                                           <div class="form-group">
                                              <label for="" style="margin-top:5px;">CGST:</label>
                                           </div>
                                        </div>
                                        <div class=" col-sm-9 col-md-9">
                                           <div class="form-group">
                                              <input readonly type="text" value="'.$row2["cgst"].'"  name="CGST" id="CGSTEst" class="form-control" placeholder="">
                                           </div>
                                        </div>
                                     </div>
                                     <div class="row" id="discount_esti_invoice" style="display: none;">
                                        <div class=" col-sm-3 col-md-3">
                                           <div class="form-group">
                                              <label for="" style="margin-top:5px;" >Discount:</label>
                                           </div>
                                        </div>
                                        <div class=" col-sm-9 col-md-9">
                                           <div class="form-group">
                                              <div class="input-group">
                                                 <input id="discount_calculate_invoice" type="text" value="'.$row1["discountvalue"].'" class="form-control discount_calculate_estimate" name="estimate_discount_amount_invoice" placeholder="" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                                 <span class="input-group-addon" style="padding: 0px;">
                                                    <select  style="padding: 6px 3px;border: none;" name="estimate_discount_option_invoice" id="invoice_option">';
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
                                              <input type="text" value="'.$row1["adjustments"].'"  name="adjustment_invoice" id="adjustmemt_calculate_invoice" class="form-control" placeholder="">
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
                                              <input type="text" value="'.$row1["total"].'"  name="amount" id="total_invoice" class="form-control" placeholder="" readonly="readonly">
                                           </div>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="row" style="margin-bottom: 10px;">
                               <div class="col-md-12">
                                  <div class="">
                                     <input type="file" name="file_invoice[]" id="file_invoice" multiple>
                                  </div>
                               </div>
                            </div>
                      </form><!--filelist_invoice Start -->
                      <div class="row">
                         <div class="col-md-12">
                            <div id="filelist_invoice">
                               <ol>';
                                  
                                     $sql11 = "SELECT * FROM invoice_files where invoice_id='$id'";
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
                                           <a class="delete_file_invoice" id="delete_file_invoice" data-id="'.$row11['id'].'" style="color:#0f243f;cursor:pointer;"><span class="glyphicon glyphicon-remove"></span></a>
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
                               <a class="btn btn-success" style="margin-bottom: 10px;" id="addInvoice">Add Item</a> 
                            </div>
                         </div>
                      </div>
                      <!--Add Item End -->

    <script>
            var gstVal= $("#edit_invoice_g_s_t").val();
          //alert(gstVal);
          if(gstVal=="IGST"){
            $("#IGST_BLOCK").css("display", "block");
            }else if(gstVal=="CGST/SGST"){
               $("#SGST_BLOCK").css("display", "block");
              $("#CGST_BLOCK").css("display", "block");

            }
       </script>

      <script type="text/javascript">
         $(document).ready(function(){
           var item = $("#edit_discount_type_invoice").val();
          
                  if(item=="At item level"){
                    $("#discount_invoice").show();
                     $(".discount_invoice").show();
                     $(".edit_dynamic_discount_invoice").show();
                     $("#discount_esti_invoice").hide();
                  }
                  else if(item=="At invoice level"){
                     $("#discount_invoice").hide();
                     $(".discount_invoice").hide();
                     $(".edit_dynamic_discount_invoice").hide();
                     $("#discount_esti_invoice").show();
         
         
                  }
                  else if(item == "Select Discount Type"){
                     $("#discount_estimate").hide();
                       $(".discount_estimate").hide();
                      $("#discount_esti").hide();
                      $(".edit_dynamic_discount").hide();
                  }
         
          });
      </script> ';


echo json_encode($output);

 ?>