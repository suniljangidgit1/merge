
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

$output='
                     <html>
                     <form name="updateForm" method="post" id="updateEstimateForm" enctype="multipart/form-data" >
                        <div class="container">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="btn-group">
                                    <button type="submit" id="update_estimateBTN" class="btn btn-primary">Update</button>
                                    <input type="hidden" id="recordId" name="recordId" value="'.$id.'">
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
                                    <label >Bill From <span class="text-danger">*</span></label>
                                    <input type="text" value="'.$row1["billfromname"].'"  name="billfromname" id="name" class="form-control edit_name" placeholder="Name" required>
                                 </div>
                                 <div class="form-group">
                                    <input type="text" value="'. $row1["billing_address_street"].'"  name="billing_address_street" id="" class="form-control edit_addressstreet" placeholder="Street" maxlength="56" >
                                 </div>
                                 <div class="row">
                                    <div class="col-sm-4 col-md-4" style="padding-right: 0px;">
                                       <div class="form-group">
                                          <input type="text" value="'. $row1["billing_address_city"].'"  name="billing_address_city" id="billing_address_city" class="form-control edit_city" placeholder="City" >
                                       </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4" style="padding-right: 0px;">
                                       <div class="form-group">
                                          <select   value="'. $row1["billing_address_state"].'"  name="billing_address_state" id="billing_address_state_estimate" class="form-control" placeholder="State" >';

                                          

                                                $indian_all_states  = 
                                                array
                                                ("AP" => "Andhra Pradesh","AR" => "Arunachal Pradesh","AS" => "Assam","BR" => "Bihar","CT" => "Chhattisgarh","GA" => "Goa","GJ" => "Gujarat","HR" => "Haryana","HP" => "Himachal Pradesh","JK" => "Jammu & Kashmir","JH" => "Jharkhand","KA" => "Karnataka","KL" => "Kerala","MP" => "Madhya Pradesh","MH" => "Maharashtra","MN" => "Manipur","ML" => "Meghalaya","MZ" => "Mizoram","NL" => "Nagaland","OR" => "Odisha","PB" => "Punjab","RJ" => "Rajasthan","SK" => "Sikkim","TN" => "Tamil Nadu","TR" => "Tripura","UK" => "Uttarakhand","UP" => "Uttar Pradesh","WB" => "West Bengal","AN" => "Andaman & Nicobar","CH" => "Chandigarh","DN" => "Dadra and Nagar Haveli","DD" => "Daman & Diu","DL" => "Delhi","LD" => "Lakshadweep","PY" => "Puducherry");
                                                
                                                foreach ($indian_all_states  as $key => $value) {
                                                    
                                                    $selected_indian_all_states = ( $row1["billing_address_state"] == $value ) ? "selected" : "";

                                                    $output.='<option value="'.$value.'" '.$selected_indian_all_states.' >'.$value.'</option>';
                                                }
                                                
                                                $output.='</select>
                                       </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                       <div class="form-group">
                                          <input type="text" value="'. $row1["billing_address_postal_code"].'" name="billing_address_postal_code" id="billing_address_postal_code"class="form-control edit_postalcode" placeholder="Postal Code"  minlength="6"  maxlength="6" onkeypress="return event.charCode >= 48 && event.charCode <= 57" >
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <input type="text" value="'. $row1["billing_address_country"].'" name="billing_address_country" id="billing_address_country" class="form-control edit_country" placeholder="Country" >
                                 </div>
                                 <div class="form-group">
                                    <input type="text" value="'. $row1["billingaddressgstin"].'" name="billingaddressgstin" class="form-control edit_gstinnumber" id="gst_no_estimate"  placeholder="GSTIN" >
                                 </div>
                                 <div class="form-group">
                                    <input type="text" value="'. $row1["billfrompanno"].'" name="billingaddresspan_no" class="form-control edit_pannumber" id="pan_no_estimate"  placeholder="PAN No" minlength="10"  maxlength="10" style="text-transform: uppercase;">
                                 </div>
                              </div>
                              <div class="col-sm-6 col-md-6">
                                 <div class="form-group">
                                    <label >Bill To <span class="text-danger">*</span></label>
                                    <input type="text" value="'. $row1["billtoname"].'"  name="billtoname" id="" class="form-control editship_name" placeholder="Name" required>
                                 </div>
                                 <div class="form-group">
                                    <input type="text" value="'. $row1["shipping_address_street"].'"  name="shipping_address_street" id="" class="form-control editship_addressstreet" placeholder="Street" maxlength="56" >
                                 </div>
                                 <div class="row">
                                    <div class="col-sm-4 col-md-4" style="padding-right: 0px;">
                                       <div class="form-group">
                                          <input type="text" value="'. $row1["shipping_address_city"].'" name="shipping_address_city" id="shipping_address_city" class="form-control editship_city" placeholder="City" >
                                       </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4" style="padding-right: 0px;">
                                       <div class="form-group">
                                          <select   value="'. $row1["shipping_address_state"].'"  name="shipping_address_state" id="shipping_address_state" class="form-control" placeholder="State" >';
                                             
                                                $indian_all_states  = 
                                                array
                                                ("AP" => "Andhra Pradesh","AR" => "Arunachal Pradesh","AS" => "Assam","BR" => "Bihar","CT" => "Chhattisgarh","GA" => "Goa","GJ" => "Gujarat","HR" => "Haryana","HP" => "Himachal Pradesh","JK" => "Jammu & Kashmir","JH" => "Jharkhand","KA" => "Karnataka","KL" => "Kerala","MP" => "Madhya Pradesh","MH" => "Maharashtra","MN" => "Manipur","ML" => "Meghalaya","MZ" => "Mizoram","NL" => "Nagaland","OR" => "Odisha","PB" => "Punjab","RJ" => "Rajasthan","SK" => "Sikkim","TN" => "Tamil Nadu","TR" => "Tripura","UK" => "Uttarakhand","UP" => "Uttar Pradesh","WB" => "West Bengal","AN" => "Andaman & Nicobar","CH" => "Chandigarh","DN" => "Dadra and Nagar Haveli","DD" => "Daman & Diu","DL" => "Delhi","LD" => "Lakshadweep","PY" => "Puducherry");
                                                foreach ($indian_all_states  as $key => $value) {
                                                    $selected_indian_all_states = ( $row1["shipping_address_state"] == $value ) ? "selected" : "";
                                                $output.='
                                             <option value="'.$value.'"  '.$selected_indian_all_states.'>'.$value.'</option>';
                                              } 
                                          $output.='</select>
                                       </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                       <div class="form-group">
                                          <input type="text" value="'. $row1["shipping_address_postal_code"].'" name="shipping_address_postal_code"id="shipping_address_postal_code" class="form-control editship_postalcode" placeholder="Postal Code" minlength="6"  maxlength="6" onkeypress="return event.charCode >= 48 && event.charCode <= 57" >
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <input type="text"  value="'. $row1["shipping_address_country"].'" name="shipping_address_country" id="shipping_address_country" class="form-control editship_country" placeholder="Country" >
                                 </div>
                                 <div class="form-group">
                                    <input type="text" value="'. $row1["shippingaddressgstin"].'"  name="shippingaddressgstin" class="form-control editship_gstinnumber" placeholder="GSTIN" >
                                 </div>
                                 <div class="form-group">
                                    <input type="text" value="'. $row1["billtopanno"].'"  name="shippingaddresspan_no" class="form-control editship_pannumber" placeholder="PAN No" minlength="10"  maxlength="10" style="text-transform: uppercase;" >
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-sm-6 col-md-6">
                                 <div class="form-group">
                                    <label>Account <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                       <input type="text" id="estimate_account_id" name="account_id"  value="'. $row5["name"].'" class="form-control " placeholder="Please Select Account"  required readonly> 
                                       <span class="input-group-addon"  data-toggle="modal" data-target="#estimate_create_account_modal"><i class="glyphicon glyphicon-arrow-up"></i></span>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-6 col-md-6">
                                 <div class="form-group">
                                    <label for="">Date</label>
                                    <div class="input-group date" data-date-format="dd.mm.yyyy">
                                       <input value="'. date("d/m/Y",strtotime($row1["date"])).'"  type="text" id="date20" name="date" class="form-control" placeholder="Select Date"  >
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
                                    <input type="text" value="'. $row1["invoice_number"].'"  name="invoice_number" id="estimate" class="form-control" placeholder="" required readonly>
                                 </div>
                              </div>
                              <div class="col-sm-6 col-md-6 ">
                                 <div class="form-group">
                                    <label for="">Place of Supply</label>
                                    <select name="placeofsupply" class="form-control" id="placeofsupply_estimate">';
                                        
                                          $indian_all_states  = 
                                          array
                                          ("AP" => "Andhra Pradesh","AR" => "Arunachal Pradesh","AS" => "Assam","BR" => "Bihar","CT" => "Chhattisgarh","GA" => "Goa","GJ" => "Gujarat","HR" => "Haryana","HP" => "Himachal Pradesh","JK" => "Jammu & Kashmir","JH" => "Jharkhand","KA" => "Karnataka","KL" => "Kerala","MP" => "Madhya Pradesh","MH" => "Maharashtra","MN" => "Manipur","ML" => "Meghalaya","MZ" => "Mizoram","NL" => "Nagaland","OR" => "Odisha","PB" => "Punjab","RJ" => "Rajasthan","SK" => "Sikkim","TN" => "Tamil Nadu","TR" => "Tripura","UK" => "Uttarakhand","UP" => "Uttar Pradesh","WB" => "West Bengal","AN" => "Andaman & Nicobar","CH" => "Chandigarh","DN" => "Dadra and Nagar Haveli","DD" => "Daman & Diu","DL" => "Delhi","LD" => "Lakshadweep","PY" => "Puducherry");
                                          foreach ($indian_all_states  as $key => $value) {
                                         $selected_indian_all_states = ( $row1["placeofsupply"] == $value ) ? "selected" : "";
                                       $output.='<option value="'.$value.'" '.$selected_indian_all_states.'>'.$value.'</option>';
                                        }
                                    $output.='</select></div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-sm-6 col-md-6">
                                 <div class="form-group">
                                    <label for="">GST </label>';
                                     $selected_IGST = ($row1["g_s_t"] == "IGST") ? "selected" : "";
                                     $selected_CGST_SGST = ($row1["g_s_t"] == "CGST/SGST") ? "selected" : "";

                                     $output.='<select  name="g_s_t" class="form-control" id="edit_g_s_t" onchange="getVal()">
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
                                    $output.='<select id="edit_discount_type" name="discount_type" class="form-control  " >
                                       <option value="Select Discount Type" '.$discountType1.' >Select Discount Type</option>
                                       <option value="At item level" '.$discountType2.'>At item level</option>
                                       <option value="At invoice level" '.$discountType3.'> At invoice level</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="container" id="additem">
                           <div class="row">
                              <div class="col-sm-12 col-md-12">
                                 <div class="" style="border-bottom: 1px solid #e5e5e5; margin-bottom: 5px;">
                                    <h4>Add Item</h4>
                                 </div>
                              </div>
                           </div>';

                            $estimate_id=$row1['id'];
                              $sql2="select * from estimates_items where estimate_id='$estimate_id'";
                              $result2=mysqli_query($conn,$sql2);
                              $count=0;
                              $count2=0;
                              $total_amount=0;
                              $total_amount_igst=0;
                              $total_amount_scst=0;
                              while($row2=mysqli_fetch_assoc($result2))
                              {
                                $output.=' <div class="item" id="1'.$count2.'">
                              <div style="">
                                 <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                       <div class="form-group">
                                          <label for="">Item Name<span class="text-danger">*</span></label>
                                          <input type="hidden" value="'.$row2["id"].'" name="item_id[]">
                                          <input type="text" value="'.$row2["item_name"].'"  name="item_name[]" id="item_name" class="form-control edit_itemname" placeholder="" maxlength="40" required>
                                       </div>
                                    </div>
                                    <div class=" col-sm-6 col-md-6">
                                       <div class="form-group">
                                          <label for="">Description</label>
                                          <textarea  type="text" value="'.$row2["description"].'"  name="description[]" id="description" class="form-control" placeholder="" maxlength="180">'.$row2["description"].'</textarea>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                       <div class="form-group">
                                          <label for="">HSN/SAC</label>
                                          <input type="text" value="'.$row2["hsn"].'"  name="hsn[]" class="form-control" placeholder="">
                                       </div>
                                    </div>
                                    <div class="col-sm-6   col-md-6">
                                       <div class="form-group">
                                          <label for="">Quantity<span class="text-danger">*</span></label>
                                          <input type="text" value="'.$row2['quantity'].'"  name="quantity[]" id="quantity" class="form-control quantity_esti" placeholder="" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row"  style="padding-bottom:5px;">
                                    <div class="col-sm-6 col-md-6">
                                       <div class="form-group">
                                          <label for="">Rate<span class="text-danger">*</span></label>
                                          <input type="text" value="'.$row2['rate'].'"  name="rate[]" id="rate" class="form-control rate_esti" placeholder="" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                       </div>
                                    </div>
                                    <div class=" col-sm-6 col-md-6">
                                       <div class="form-group">
                                          <label for="">Gst Rate </label>
                                          
                                          <select name="gst_rate[]" id="edit_gst_rate"  class="form-control">';
                                            $gstRate1= ($row2["gst_rate"]=="0") ? "selected" : "";
                                            $gstRate2= ($row2["gst_rate"]=="1") ? "selected" : "";
                                            $gstRate3= ($row2["gst_rate"]=="2") ? "selected" : "";
                                            $gstRate4= ($row2["gst_rate"]=="3") ? "selected" : "";
                                            $gstRate5= ($row2["gst_rate"]=="5") ? "selected" : "";
                                            $gstRate6= ($row2["gst_rate"]=="6") ? "selected" : "";
                                            $gstRate7= ($row2["gst_rate"]=="12") ? "selected" : "";
                                            $gstRate8= ($row2["gst_rate"]=="18") ? "selected" : "";
                                            $gstRate9= ($row2["gst_rate"]=="28") ? "selected" : "";

                                            $output.=' <option value="0" '.$gstRate1.'>0</option>
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
                                 <div class="row discount_estimate"  id="discount_estimate" >
                                    <div class="col-sm-6 col-md-6">
                                       <div class="form-group">
                                          <label for="">Discount</label>
                                          <div class="input-group">
                                             <input id="edit_dynamic_discount" type="text" value="'.$row2['discountvalue'].'"  class="form-control edit_dynamic_discount " name="estimate_discount_amount_item[]" placeholder="" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                             <span class="input-group-addon" style="padding: 0px;">
                                                <select style="padding: 6px 3px;border: none;" name="estimate_discount_option_item[]" id="discount_option" class="discount_option">';
                                                $discountoption1= ($row2['discountoption']=='%') ? "selected" : "";
                                                $discountoption2= ($row2['discountoption']=='Rs') ? "selected" : "";
                                                $output.='   <option '.$discountoption1.'>%</option>
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
                                    <div class="col-md-12" style="border-bottom: 1px solid #e5e5e5; margin-bottom: 5px;">
                                       <a style="margin-bottom:10px;" class="btn btn-primary btnUpdate3" data-db-id="'.$row2["id"].'" data-update-id="1'.$count2.'" id="remove_field3'.$count2.'" style="margin-bottom:10px;">Remove Item</a>
                                    </div>
                                 </div>
                              </div>
                           </div>';
                             $count2++; }

                           $output.='</div>
                        <div class="container" id="textboxDivDemo"></div>
                        <div class="container">
                            <div class="row">
                               <div class="col-sm-6 col-md-offset-6 col-md-6">
                                  <div class="form-group">
                                     <div class="row">
                                        <div class=" col-sm-12 col-md-12">
                                           <div class="form-group">
                                              <a class="btn btn-primary" id="calculate_estimate">Calculate</a>
                                           </div>
                                        </div>
                                     </div>';
                                     
                                        $total=(float)$row1["total"]+(float)$row1["adjustments"];
                                       // $total="";
                                       
                                     $output.='<div class="row">
                                        <div class=" col-sm-3 col-md-3">
                                           <div class="form-group">
                                              <label for="" style="margin-top:5px;">Subtotal:</label>
                                           </div>
                                        </div>
                                        <div class=" col-sm-9 col-md-9">
                                           <div class="form-group">
                                              <input type="text" value="'.$total.'"  name="" id="subtotalEst" class="form-control" placeholder="" readonly="readonly">
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
                                              <input readonly type="text" name="IGST" id="IGSTEst" class="form-control" value="" >
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
                                              <input readonly type="text" value="'. $row1["s_g_s_t"].'"  name="SGST" id="SGSTEst" class="form-control" placeholder="">
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
                                              <input readonly type="text" value="'. $row1["c_g_s_t"].'"  name="CGST" id="CGSTEst" class="form-control" placeholder="">
                                           </div>
                                        </div>
                                     </div>
                                     <div class="row" id="discount_esti" style="display: none;">
                                        <div class=" col-sm-3 col-md-3">
                                           <div class="form-group">
                                              <label for="" style="margin-top:5px;" >Discount:</label>
                                           </div>
                                        </div>
                                        <div class=" col-sm-9 col-md-9">
                                           <div class="form-group">
                                              <div class="input-group">
                                                 <input id="discount_calculate_estimate" type="text" value="'.$row1['discountvalue'].'" class="form-control" name="estimate_discount_amount_invoice" placeholder="" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                                 <span class="input-group-addon" style="padding: 0px;">
                                                    <select  style="padding: 6px 3px;border: none;" name="estimate_discount_option_invoice" id="option_discount">';
                                                    $discountoption3= ($row1['discountoption']=='%') ? "selected" : "";
                                                    $discountoption4= ($row1['discountoption']=='Rs') ? "selected" : "";
                                                    $output.='   <option '.$discountoption3.'>%</option>
                                                       <option '.$discountoption4.'>Rs</option>
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
                                              <input type="text" value="'.$row1["adjustments"].'"  name="adjustment" id="adjustmemt_calculate_estimate" class="form-control" placeholder="">
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
                                              <input type="text" value="'.$row1['total'].'"  name="amount" id="totalEst" class="form-control" placeholder="" readonly="readonly">
                                           </div>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row" style="margin-bottom: 10px;">
                               <div class="col-md-12">
                                  <div class="">
                                     <input type="file" name="attachment[]" id="attachment" multiple>
                                  </div>
                               </div>
                            </div>
                        </div>
                     </form>
                     </html>
                     <!--End Form-->
                      <div class="container" id="filelist">
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
                             
                                    <div class="delete_file" id="delete_file" data-id="'.$row11['id'].'" style="color:#0f243f; cursor:pointer;"><span class="glyphicon glyphicon-remove" ></span>
                                 </div>
                              </div>
                           </div>';
                          
                              }
                             
                        $output.='</ol>
                     </div>
                     <!--filelist close -->
                     <div class="container">
                         <div class="row">
                            <div class="col-md-12">
                               <div class="">
                                  <button class="btn btn-success" style="margin-bottom: 10px;" id="Add">Add Item</button> 
                               </div>
                            </div>
                         </div>
                     </div>
                     <!--Add Item close -->

      <script>
          var gstVal= $("#edit_g_s_t").val();
          if(gstVal=="IGST"){
            $("#IGST_BLOCK").css("display", "block");
            }else if(gstVal=="CGST/SGST"){
               $("#SGST_BLOCK").css("display", "block");
              $("#CGST_BLOCK").css("display", "block");
            }
      </script>

      
      <script type="text/javascript">
        $(document).ready(function(){
            var item = $("#edit_discount_type").val();
                  if(item=="At item level"){
                    $("#discount_estimate").show();
                     $(".discount_estimate").show();
                     // $(".edit_dynamic_discount").show();
                     $("#discount_esti").hide();
                  }
                  else if(item=="At invoice level"){
                     $("#discount_estimate").hide();
                     $(".discount_estimate").hide();
                     // $(".edit_dynamic_discount").hide();
                     $("#discount_esti").show();
                     $("#discount_calculate_estimate").show();
                     
                  }
                  else if(item == "Select Discount Type"){
                     $("#discount_estimate").hide();
                       $(".discount_estimate").hide();
                      $("#discount_esti").hide();
                      // $(".edit_dynamic_discount").hide();
                  }
         
          });
      </script> 
       ';
                                 
        echo json_encode($output); 
?>


    
   


        