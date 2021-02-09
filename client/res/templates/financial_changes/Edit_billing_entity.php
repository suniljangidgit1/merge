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
$sql1 = "SELECT * FROM billing_entity where id='$id'";
$result1 = mysqli_query($conn, $sql1);
$row1=mysqli_fetch_assoc($result1);

//echo "<pre>";print_r($row1);echo "</pre>";die;

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

$output = '
  	<form id="updateBillingEntityForm" method="post" enctype="multipart/form-data">
                <div class="row">
                   <div class="col-md-12">
                      <div class="" style="margin-bottom: 15px;">
                         <button type="button" class="btn btn-primary" id="update_billingentityBTN" onclick="saveButtonFun()" >Update</button>
                         <input type="hidden" id="recordId" name="recordId" value="'.$id.'" />
                      </div>
                   </div>
                </div>
                <div class="panel panel-default">
                   <div class="panel-body panel-body-form">
                      <div class="Overview_details">
                         <div class="row">
                            <div class="col-md-12">
                               <div class="panel-heading" style="border-bottom: 1px solid #e5e5e5; margin-bottom: 5px;padding: 10px 0px;">
                                  <h4 class="panel-title">
                                     Overview
                                  </h4>
                               </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-md-6">
                               <div class="form-group name_group">
                                  <label >Name <span class="text-danger">*</span></label>
                                  <input type="text" value="'.$row1['name'].'" name="billing_entityname" class="form-control name_edit">
                                  <span class="temp-error display_none text-danger">Please enter name</span>
                               </div>
                               <div class="form-group email_group">
                                  <label >Email-Id</label>
                                  <input type="email" value="'.$row1['emailid'].'" name="billing_entityemail" class="form-control email_edit">
                                  <span class="temp-error display_none text-danger">Please enter your e-mail id</span>
                                  <span class="Invalid-temp-error display_none text-danger">Please enter valid e-mail id</span>
                               </div>
                               <div class="form-group address_group">
                                  <label >Address</label>
                                  <input type="text" value="'.$row1['addressstreet'].'" name="billingEntityAddressStreet" class="form-control address_edit" maxlength="56" placeholder="Street">
                                  <span class="temp-error display_none text-danger">Please enter your address</span>
                               </div>
                               <div class="row">
                                  <div class="col-md-4">
                                     <div class="form-group city_group">
                                        <input type="text" name="billingEntityAddressCity" value="'.$row1['addresscity'].'" class="form-control city_edit" placeholder="City">
                                        <span class="temp-error display_none text-danger">Please enter your city</span>
                                     </div>
                                  </div>
                                  <div class="col-md-4">';

                    //if($row1["addressstate"]!=""){
                          $output .= '<script>
                            $(document).ready(function(){
                              var stateVal = "'.$row1["addressstate"].'";
                              $(".Select_state").customA11ySelect();
                            });

                            function selectState(myState){
                              $("#billingEntityAddressState").val(myState);
                            }
                          </script>';
                    //}
                            $output .= '<div class="form-group state_group">
                                        <select name="billingEntityAddressState" id="overview_state" class="form-control Select_state" onchange="selectState(this.value);">';

                                    $selected1 = ($row1['addressstate'] == 'Andhra Pradesh') ? 'selected="selected"' : '';
                                    $selected2 = ($row1['addressstate'] == 'Arunachal Pradesh') ? 'selected="selected"' : '';
                                    $selected3 = ($row1['addressstate'] == 'Assam') ? 'selected="selected"' : '';
                                    $selected4 = ($row1['addressstate'] == 'Bihar') ? 'selected="selected"' : '';
                                    $selected5 = ($row1['addressstate'] == 'Chhattisgarh') ? 'selected="selected"' : '';
                                    $selected6 = ($row1['addressstate'] == 'Goa') ? 'selected="selected"' : '';
                                    $selected7 = ($row1['addressstate'] == 'Gujarat') ? 'selected="selected"' : '';
                                    $selected8 = ($row1['addressstate'] == 'Haryana') ? 'selected="selected"' : '';
                                    $selected9 = ($row1['addressstate'] == 'Himachal Pradesh') ? 'selected="selected"' : '';
                                    $selected10 = ($row1['addressstate'] == 'Jammu and Kashmir') ? 'selected="selected"' : '';
                                    $selected11 = ($row1['addressstate'] == 'Jharkhand') ? 'selected="selected"' : '';
                                    $selected12 = ($row1['addressstate'] == 'Karnataka') ? 'selected="selected"' : '';
                                    $selected13 = ($row1['addressstate'] == 'Kerala') ? 'selected="selected"' : '';
                                    $selected14 = ($row1['addressstate'] == 'Madhya Pradesh') ? 'selected="selected"' : '';
                                    $selected15 = ($row1['addressstate'] == 'Maharashtra') ? 'selected="selected"' : '';
                                    $selected16 = ($row1['addressstate'] == 'Manipur') ? 'selected="selected"' : '';
                                    $selected17 = ($row1['addressstate'] == 'Meghalaya') ? 'selected="selected"' : '';
                                    $selected18 = ($row1['addressstate'] == 'Mizoram') ? 'selected="selected"' : '';
                                    $selected19 = ($row1['addressstate'] == 'Nagaland') ? 'selected="selected"' : '';
                                    $selected20 = ($row1['addressstate'] == 'Odisha') ? 'selected="selected"' : '';
                                    $selected21 = ($row1['addressstate'] == 'Punjab') ? 'selected="selected"' : '';
                                    $selected22 = ($row1['addressstate'] == 'Rajasthan') ? 'selected="selected"' : '';
                                    $selected23 = ($row1['addressstate'] == 'Sikkim') ? 'selected="selected"' : '';
                                    $selected24 = ($row1['addressstate'] == 'Tamil Nadu') ? 'selected="selected"' : '';
                                    $selected25 = ($row1['addressstate'] == 'Tripura') ? 'selected="selected"' : '';
                                    $selected26 = ($row1['addressstate'] == 'Uttarakhand') ? 'selected="selected"' : '';
                                    $selected27 = ($row1['addressstate'] == 'Uttar Pradesh') ? 'selected="selected"' : '';
                                    $selected28 = ($row1['addressstate'] == 'West Bengal') ? 'selected="selected"' : '';
                                    $selected29 = ($row1['addressstate'] == 'Andaman & Nicobar') ? 'selected="selected"' : '';
                                    $selected30 = ($row1['addressstate'] == 'Chandigarh') ? 'selected="selected"' : '';
                                    $selected31 = ($row1['addressstate'] == 'Dadra and Nagar Haveli') ? 'selected="selected"' : '';
                                    $selected32 = ($row1['addressstate'] == 'Daman and Diu') ? 'selected="selected"' : '';
                                    $selected33 = ($row1['addressstate'] == 'Delhi') ? 'selected="selected"' : '';
                                    $selected34 = ($row1['addressstate'] == 'Lakshadweep') ? 'selected="selected"' : '';
                                    $selected35 = ($row1['addressstate'] == 'Pondicherry') ? 'selected="selected"' : '';
                                    $selected36 = ($row1['addressstate'] == 'Telangana') ? 'selected="selected"' : '';
                                    $selected37 = ($row1['addressstate'] == 'Andhrapradesh(New)') ? 'selected="selected"' : '';
                                    $selected38 = ($row1['addressstate'] == 'Ladakh') ? 'selected="selected"' : '';


                                    $output .= '<option value="">Select state</option>
                                           <option value="Andhra Pradesh" '.$selected1.'>Andhra Pradesh</option>
                                           <option value="Arunachal Pradesh" '.$selected2.'>Arunachal Pradesh</option>
                                           <option value="Assam" '.$selected3.'>Assam</option>
                                           <option value="Bihar" '.$selected4.'>Bihar</option>
                                           <option value="Chhattisgarh" '.$selected5.'>Chhattisgarh</option>
                                           <option value="Goa" '.$selected6.'>Goa</option>
                                           <option value="Gujarat" '.$selected7.'>Gujarat</option>
                                           <option value="Haryana" '.$selected8.'>Haryana</option>
                                           <option value="Himachal Pradesh" '.$selected9.'>Himachal Pradesh</option>
                                           <option value="Jammu and Kashmir" '.$selected10.'>Jammu and Kashmir</option>
                                           <option value="Jharkhand" '.$selected11.'>Jharkhand</option>
                                           <option value="Karnataka" '.$selected12.'>Karnataka</option>
                                           <option value="Kerala" '.$selected13.'>Kerala</option>
                                           <option value="Madhya Pradesh" '.$selected14.'>Madhya Pradesh</option>
                                           <option value="Maharashtra" '.$selected15.'>Maharashtra</option>
                                           <option value="Manipur" '.$selected16.'>Manipur</option>
                                           <option value="Meghalaya" '.$selected17.'>Meghalaya</option>
                                           <option value="Mizoram" '.$selected18.'>Mizoram</option>
                                           <option value="Nagaland" '.$selected19.'>Nagaland</option>
                                           <option value="Odisha" '.$selected20.'>Odisha</option>
                                           <option value="Punjab" '.$selected21.'>Punjab</option>
                                           <option value="Rajasthan" '.$selected22.'>Rajasthan</option>
                                           <option value="Sikkim" '.$selected23.'>Sikkim</option>
                                           <option value="Tamil Nadu" '.$selected24.'>Tamil Nadu</option>
                                           <option value="Tripura" '.$selected25.'>Tripura</option>
                                           <option value="Uttarakhand" '.$selected26.'>Uttarakhand</option>
                                           <option value="Uttar Pradesh" '.$selected27.'>Uttar Pradesh</option>
                                           <option value="West Bengal" '.$selected28.'>West Bengal</option>
                                           <option value="Andaman & Nicobar" '.$selected29.'>Andaman & Nicobar</option>
                                           <option value="Chandigarh" '.$selected30.'>Chandigarh</option>
                                           <option value="Dadra and Nagar Haveli" '.$selected31.'>Dadra and Nagar Haveli</option>
                                           <option value="Daman and Diu" '.$selected32.'>Daman and Diu</option>
                                           <option value="Delhi" '.$selected33.'>Delhi</option>
                                           <option value="Lakshadweep" '.$selected34.'>Lakshadweep</option>
                                           <option value="Pondicherry" '.$selected35.'>Pondicherry</option>
                                           <option value="Telangana" '.$selected36.'>Telangana</option>
                                           <option value="Andhrapradesh(New)" '.$selected37.'>Andhrapradesh(New)</option>
                                           <option value="Ladakh" '.$selected38.'>Ladakh</option>
                                        </select>
                                        <span class="temp-error display_none text-danger">Please select state</span>
                                     </div>
                                  </div>
                                  <div class="col-md-4">
                                     <div class="form-group postal_code_group">
                                        <input type="text" name="billingEntityAddressPostalCode" value="'.$row1['addresspostalcode'].'" class="form-control overview_postal_code_edit" placeholder="Postal Code" minlength="6"  maxlength="6" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                        <span class="temp-error display_none text-danger">Please enter your postal code</span>
                                     </div>
                                  </div>
                               </div>
                               <div class="form-group pan_no_group">
                                  <label >PAN No. <span class="text-danger">*</span></label>
                                  <input type="text" name="billing_entitypanno" class="form-control overview_panno_edit" minlength="10" value="'.$row1['panno'].'" maxlength="10" placeholder="PAN No." style="text-transform:uppercase">
                                  <span class="temp-error display_none text-danger">Please enter your PAN no.</span>
                                  <span class="Invalid-temp-error display_none text-danger">Please enter valid pan number</span>
                               </div>
                            </div>
                            <div class="col-md-6">
                               <div class="form-group website_group">
                                  <label >Website</label>
                                  <input type="text" value="'.$row1['website'].'" name="billing_entitywebsite" class="form-control website_edit">
                                  <span class="temp-error display_none text-danger">Please enter website</span>
                               </div>
                               <div class="form-group phone_no_group">
                                  <label >Phone</label>
                                  <input type="text" value="'.$row1['phoneno'].'" name="billing_entityphone" class="form-control phone_edit" minlength="12" maxlength="12" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 32)">
                                  <span class="temp-error display_none text-danger">Please enter your phone no.</span>
                               </div>
                               <div class="form-group reg_group">
                                  <label>Udyam Registration No.</label>
                                  <input type="text" value="'.$row1['udyam_registration_no'].'" name="billing_entityudyamno" class="form-control regno_edit">
                                  <span class="temp-error display_none text-danger">Please enter registeration no.</span>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="panel panel-default main_bank_deatils_edit">
                  <div class="panel-body panel-body-form">
                   	<div class="row">
	                    <div class="col-md-12">
	                        <div class="" style="border-bottom: 1px solid #e5e5e5; margin-bottom: 5px;">
	                          <h4 class="panel-title" style="display:inline-block;">Bank details</h4>
	                        </div>
	                    </div>
	                  </div>
                  </div>';

                  $sql2="select * from billing_entity_bankdetails where deleted = 0 and billing_entity_id='".$id."'";
	               	$result2=mysqli_query($conn,$sql2);
	               	$rowCount=mysqli_num_rows($result2);
                  // $row2=mysqli_fetch_assoc($result2);
                  // echo '<pre>';print_r($row2);die;
	               	$count=0;
	               	$count_1=1;

	               	if($rowCount)
                  { $output .= '<input type="hidden" id="totalBankDetails" value="'.$rowCount.'" />';
		               	while($row2=mysqli_fetch_assoc($result2))
	                    {
	                   		$output .='<div class="panel-body panel-body-form newedit"><div id="editbankdetails'.$count.'" class="editbankdetails">
		                         <div class="row">
		                            <div class="col-md-12">
		                               <div class="panel-heading" style="border-bottom: 1px solid #e5e5e5; margin-bottom: 5px;padding: 10px 0px;">
		                                  <h4 class="panel-title bank_title" style="display:inline-block;">
		                                    Bank account '.$count_1.'
		                                  </h4>';

                                if($rowCount > 0){
		                              $output .= '<button type="button" data-db-id="'. $row2["id"].'" data-update-id="1'.$count.'" class="btn btn-danger bank_deleteBtn pull-right" onclick="delete_panel_edit(this, '.$count.', '. $row2["id"].')"><span class="material-icons-outlined">close</span></button>';
                                }

		                            $output .='</div>
		                            </div>
		                          </div>
		                         <div class="row">
		                            <div class="col-sm-6 col-md-6">
		                               <div class="form-group Beneficiary_group_edit">
		                                  <label for="">Beneficiary Name</label>
		                                  <input type="hidden" value="'.$row2["id"].'" name="billing_entity_bankdetails_id[]">
		                                  <input type="text" name="billingentity_bank_beneficiary[]" value="'.$row2["beneficiary_name"].'" class="form-control beneficiary_nm_edit" placeholder="Beneficiary name">
		                                  <span class="temp-error display_none text-danger">Please enter beneficiary name</span>
		                               </div>
		                            </div>
		                            <div class="col-sm-6   col-md-6">
		                               <div class="form-group bankName_group_edit">
		                                  <label for="">Name of Bank</label>
		                                  <input type="text" name="billingentity_bank_name[]" value="'.$row2["bank_name"].'" class="form-control bank_nm_edit" placeholder="Bank name">
		                                  <span class="temp-error display_none text-danger">Please enter bank name</span>
		                               </div>
		                            </div>
		                         </div>
		                         <div class="row">
		                            <div class="col-sm-6 col-md-6">
		                               <div class="form-group IFSC_group_edit">
		                                  <label for="">IFSC Code</label>
		                                  <input type="text" name="billingentity_bank_ifc[]" value="'.$row2["ifsc_code"].'" class="form-control bank_ifsc_edit" placeholder="IFSC Code">
		                                  <span class="temp-error display_none text-danger">Please enter IFSC code</span>
		                               </div>
		                            </div>
		                            <div class="col-sm-6   col-md-6">
		                               <div class="form-group account_group_edit">
		                                  <label for="">Account No.</label>
		                                  <input type="text" name="billingentity_bank_accountno[]" value="'.$row2["account_no"].'"class="form-control bank_ano_edit" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" placeholder="Account No.">
		                                  <span class="temp-error display_none text-danger">Please enter account no</span>
		                               </div>
		                            </div>
		                         </div>
		                         <div class="row">
		                            <div class="col-md-6">
		                               <div class="form-group accounttype_group_edit">
                                  <script>
                                    $(document).ready(function(){
                                      var accounttypeVal = "'.$row2["account_type"].'";
                                      if(accounttypeVal!="Select Type"){
                                        $("#Type_Account'.$count.'-menu").find(".custom-a11yselect-option").removeClass("custom-a11yselect-selected custom-a11yselect-focused");
                                      }
                                      $("#Type_Account'.$count.'-button .custom-a11yselect-text").text(accounttypeVal);
                                      $("#Type_Account'.$count.'-menu li[data-val='."'".$row2["account_type"]."'".']").addClass("custom-a11yselect-focused");
                                      $("#Type_Account'.$count.'-menu li[data-val='."'".$row2["account_type"]."'".']").addClass("custom-a11yselect-selected");

                                      // checkAccountType(accounttypeVal, '.$rowCount.');
                                    });
                                  </script>
		                                  <label >Account Type</label>
		                                  <select id="Type_Account'.$count.'" name="billingentity_bank_accounttype[]" class="form-control bank_account_type_edit">';

		                                $savings = (trim($row2["account_type"]) == 'Saving') ? 'selected="selected"' : '';

			                            $current = (trim($row2["account_type"]) == 'Current') ? 'selected="selected"' : '';
			                            $cashcredit = (trim($row2["account_type"]) == 'Cash Credit') ? 'selected="selected"' : '';
			                            $overdraft = (trim($row2["account_type"]) == 'Overdraft') ? 'selected="selected"' : '';

		                                  $output .='<option value="">Select Account Type</option>
		                                     <option value="Saving" '.$savings.'>Saving</option>
			                               	<option value="Current" '.$current.'>Current</option>
			                               	<option value="Cash Credit" '.$cashcredit.'>Cash Credit</option>
			                               	<option value="Overdraft" '.$overdraft.'>Overdraft</option>
		                                  </select>
		                                  <span class="temp-error display_none text-danger">Please Select Account Type</span>
		                               </div>
		                            </div>
		                            <div class="col-md-6">
		                               <div class="form-group UPI_group_edit">
		                                  <label for="">UPI ID</label>
		                                  <input type="text" name="billingentity_bank_upi[]" value="'.$row2["upi_id"].'" class="form-control bank_upiId_edit" placeholder="UPI ID">
		                                  <span class="temp-error display_none text-danger">Please enter UPI id</span>
		                               </div>
		                            </div>
		                         </div>
		                      </div>
                          </div>';
	                      	$count++;
					    	          $count_1++;
	                 	  }
                 	}
                 	else {
                 		$output .= '<div class="panel-body panel-body-form newedit"><div class="editbankdetails">
		                         <div class="row">
		                            <div class="col-md-12">
		                               <div class="panel-heading" style="border-bottom: 1px solid #e5e5e5; margin-bottom: 5px;padding: 10px 0px;">
		                                  <h4 class="panel-title bank_title" style="display:inline-block;">
		                                    Bank account 1
		                                  </h4>

                                      <button type="button" data-db-id="0" data-update-id="10" class="btn btn-danger bank_deleteBtn pull-right" onclick="delete_panel_edit(this, 0, 0)" style="display:none;"><span class="material-icons-outlined" >close</span></button>

		                               </div>
		                            </div>
		                          </div>
		                         <div class="row">
		                            <div class="col-sm-6 col-md-6">
		                               <div class="form-group Beneficiary_group_edit">
		                                  <label for="">Beneficiary Name</label>
		                                  <input type="hidden" value="" name="billing_entity_bankdetails_id[]">
		                                  <input type="text" name="billingentity_bank_beneficiary[]" value="" class="form-control beneficiary_nm_edit" placeholder="Beneficiary Name">
		                                  <span class="temp-error display_none text-danger">Please enter beneficiary name</span>
		                               </div>
		                            </div>
		                            <div class="col-sm-6   col-md-6">
		                               <div class="form-group bankName_group_edit">
		                                  <label for="">Name of Bank</label>
		                                  <input type="text" name="billingentity_bank_name[]" value="" class="form-control bank_nm_edit" placeholder="Bank name">
		                                  <span class="temp-error display_none text-danger">Please enter bank name</span>
		                               </div>
		                            </div>
		                         </div>
		                         <div class="row">
		                            <div class="col-sm-6 col-md-6">
		                               <div class="form-group IFSC_group_edit">
		                                  <label for="">IFSC Code</label>
		                                  <input type="text" name="billingentity_bank_ifc[]" value="" class="form-control bank_ifsc_edit" placeholder="IFSC Code">
		                                  <span class="temp-error display_none text-danger">Please enter IFSC code</span>
		                               </div>
		                            </div>
		                            <div class="col-sm-6   col-md-6">
		                               <div class="form-group account_group_edit">
		                                  <label for="">Account No</label>
		                                  <input type="text" name="billingentity_bank_accountno[]" value=""class="form-control bank_ano_edit" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" placeholder="Account no">
		                                  <span class="temp-error display_none text-danger">Please enter account no</span>
		                               </div>
		                            </div>
		                         </div>
		                         <div class="row">
		                            <div class="col-md-6">
		                               <div class="form-group accounttype_group_edit">
		                                  <label >Account Type</label>
		                                  <select id="Type_Account0" name="billingentity_bank_accounttype[]" class="form-control bank_account_type_edit">';

		                                  $output .='<option value="">Select Account Type</option>
		                                     <option value="Savings">Savings</option>
			                               	<option value="Current">Current</option>
			                               	<option value="Cash Credit">Cash Credit</option>
			                               	<option value="Overdraft">Overdraft</option>
		                                  </select>
		                                  <span class="temp-error display_none text-danger">Please select account type</span>
		                               </div>
		                            </div>
		                            <div class="col-md-6">
		                               <div class="form-group UPI_group_edit">
		                                  <label for="">UPI Id</label>
		                                  <input type="text" name="billingentity_bank_upi[]" value="" class="form-control bank_upiId_edit" placeholder="UPI ID">
		                                  <span class="temp-error display_none text-danger">Please enter UPI id</span>
		                               </div>
		                            </div>
		                         </div>
		                      </div>
                          </div><input type="hidden" id="totalBankDetails" value="1" style="display:none"/>';
                 	}	

                $output .= '</div>
                <div class="Bank_details_Panel"></div>
                <div class="" style="margin-bottom:15px;">
                   <div class="row">
                      <div class="col-md-12 text-center">
                      	<input type="hidden" id="totalBank_count" value="'.$rowCount.'">
                        <span class="btn btn-primary" id="add_bank_deatils_edit" onclick="add_more_bank_details()"><span class="material-icons-outlined" style="font-size:16px;top:3px;">add</span> Add More</span> 
                      </div>
                   </div>
                </div>';


            $sql3="select * from billing_entity_gstdetails where billing_entity_id='".$id."' and deleted = 0";
           	$result3=mysqli_query($conn,$sql3);
           	$rowCount1=mysqli_num_rows($result3);
           	$checked = ($rowCount1 > 1) ? 'checked="checked"' : '';
           	
           	$checke = ($rowCount1==0) ? 'block' : 'none';
           	$checke1 = ($rowCount1==0) ? 'none' : 'block';
           	
	        	$output .= '<div class="row" id="main_GSTIN_fields_edit1" style="display:'.$checke.';">
	                   <div class="col-md-12">
	                      <div id="GSTIN_fields_edit" class="">
	                         <span class="Gstin_Que">Do you have GST number?</span>&nbsp;&nbsp;
	                         <span class="form-check-inline">
	                         <label class="form-check-label"><input type="radio" class="form-check-input" '.$checked.' name="optradio" value="Yes" onclick="radio_check(this.value)"> Yes</label>
	                         </span>
	                         <span class="form-check-inline">
	                         <label class="form-check-label"><input type="radio" class="form-check-input" name="optradio" value="No" onclick="radio_check(this.value)"> No</label>
	                         </span> 
	                      </div>
	                   </div>
	                </div>
	                <div class="panel panel-default" id="main_gst_deatils_edit1" style="display:'.$checke1.';">
                   	<div class="panel-body panel-body-form">
                      <div id="gst_deatils_edit_1">
                         <div class="row">
                            <div class="col-md-12">
                               <div class="panel-heading" style="border-bottom: 1px solid #e5e5e5; margin-bottom: 5px;padding: 10px 0px;">
                                  <h4 class="panel-title">
                                     GST Details
                                  </h4>
                                  <input type="hidden" id="totalGstDetails" value="1" style="display:none"/>
                               </div>
                            </div>
                         </div>
                         <div class="GST_details_Panel_edit">';

                if($rowCount1!=0){
    	        	  $count=0;
               		$count_1=1;
    	        	  while($row3=mysqli_fetch_assoc($result3))
                	{
                		$output .= '
                         <div id="edit_billingentity_gstdetails'.$count.'" class="edit_billingentity_gstdetails GST_added_panel_edit">
                            <div class="">
                               <div class="row">
                                  <div class="col-md-12">
                                     <button type="button" data-id="'.$count.'" data-update-id="1'.$count.'" data-db-id="'. $row3["id"].'" class="btn btn-danger GST_deleteBtn pull-right" onclick="delete_gst_panel_edit(this, '.$count.', '. $row3["id"].')" style=""><span class="material-icons-outlined">close</span></button>
                                  </div>
                               </div>
                               <div class="row">
                                  <div class="col-sm-6 col-md-6">
                                     <div class="form-group gst_no_group_edit">
                                        <label for="" class="gst_title">GST '.$count_1.'</label>
                                        <input type="text" name="billingentity_gst[]" value="'.$row3['gst_number'].'" class="form-control gst_deatils_GST_1_edit" placeholder="GST No" onblur="getGST_state_edit(this.value, '.$count.');" onchange="GSTChange(this)">
                                        <span class="temp-error display_none text-danger">Please enter GST no</span>
                                     </div>
                                  </div>
                                  <div class="col-sm-6   col-md-6">
                                     <div class="form-group gst_addr_group_edit">
                                        <label>Address</label>
                                        <input type="text" name="billingEntityGSTAddressStreet[]" value="'.$row3['street'].'" class="form-control gst_addr_edit" placeholder="Street" maxlength="56">
                                        <span class="temp-error display_none text-danger">Please enter your address</span>
                                     </div>
                                     <div class="row">
                                        <div class="col-md-4" style="padding-right: 0px;">
                                           <div class="form-group gst_city_group_edit">
                                              <input type="text" name="billingEntityGSTAddressCity[]" value="'.$row3['city'].'" class="form-control gst_city_edit" placeholder="City">
                                              <span class="temp-error display_none text-danger">Please enter city</span>
                                           </div>
                                        </div>
                                        <div class="col-md-4" style="padding-right: 0px;">
                                           <div class="form-group gst_state_group_edit">
                                              <input type="text" class="form-control gst_state_edit" id="gst_state_edit_'.$count.'" data-id="edit_billingEntityGSTAddressState'.$count.'" data-name="billingEntityGSTAddressState[]" name="billingEntityGSTAddressState[]" value="'.$row3['state'].'" placeholder="State" autocomplete="espo-state" maxlength="255" >

                                           <span class="temp-error display_none text-danger">Please enter state</span>
                                           </div>
                                        </div>
                                        <div class="col-md-4">
                                           <div class="form-group gst_postal_group_edit">
                                              <input type="text" name="billingEntityGSTAddressPostalCode[]" value="'.$row3['postal_code'].'" id="GST_Details_postal_code_edit'.$count.'" class="form-control GST_Details_postal_code_edit gst_postal_code_edit" placeholder="Postal Code" minlength="6" maxlength="6" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57">
                                              <span class="temp-error display_none text-danger">Please enter postal code</span>
                                              <span class="digit-temp-error display_none text-danger">Please enter 6 digits postal code</span>
                                           </div>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>';

                		$count++;
    			    	    $count_1++;
                	}
                }
                else {
                  $output .= '<div class="GST_added_panel_edit edit_billingentity_gstdetails" id="noRec"><div class="row">
                                  <div class="col-md-12">
                                     <button type="button" class="btn btn-danger GST_deleteBtn pull-right" onclick="delete_gst_panel_edit(this, 0, 0)" style=""><span class="material-icons-outlined">close</span></button>
                                  </div>
                               </div>
                               <div class="row">
                                  <div class="col-sm-6 col-md-6">
                                     <div class="form-group gst_no_group_edit">
                                        <label for="" class="gst_title">GST 1</label>
                                        <input type="text" name="billingentity_gst[]" class="form-control gst_deatils_GST_1_edit" placeholder="GST No" onblur="getGST_state_edit(this.value, 0);" onchange="GSTChange(this)">
                                        <span class="temp-error display_none text-danger">Please enter GST no</span>
                                     </div>
                                  </div>
                                  <div class="col-sm-6 col-md-6">
                                     <div class="form-group gst_addr_group_edit">
                                        <label >Address</label>
                                        <input type="text" name="billingEntityGSTAddressStreet[]" class="form-control gst_addr_edit" placeholder="Street" maxlength="56">
                                        <span class="temp-error display_none text-danger">Please enter your address</span>
                                     </div>
                                     <div class="row">
                                        <div class="col-md-4" style="padding-right: 0px;">
                                           <div class="form-group gst_city_group_edit">
                                              <input type="text" name="billingEntityGSTAddressCity[]" class="form-control gst_city_edit" placeholder="City" >
                                              <span class="temp-error display_none text-danger">Please enter city</span>
                                           </div>
                                        </div>
                                        <div class="col-md-4" style="padding-right: 0px;">
                                           <div class="form-group gst_state_group_edit">
                                              <input type="text" class="form-control gst_state_edit" id="gst_state_0" data-id="billingEntityGSTAddressState_0" data-name="billingEntityGSTAddressState[]" name="billingEntityGSTAddressState[]" value="" placeholder="State" autocomplete="espo-state" maxlength="255" >
                                              <span class="temp-error display_none text-danger">Please enter state</span>
                                           </div>
                                        </div>
                                        <div class="col-md-4">
                                           <div class="form-group gst_postal_group_edit">
                                              <input type="text" name="billingEntityGSTAddressPostalCode[]" class="form-control GST_Details_postal_code_edit gst_postal_code_edit" placeholder="Postal Code" minlength="6"  maxlength="6" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                              <span class="temp-error display_none text-danger">Please enter postal code</span>
                                              <span class="digit-temp-error display_none text-danger">Please enter 6 digits postal code</span>
                                           </div>
                                        </div>
                                     </div>
                                  </div>
                               </div>';
                }
	        
            $output .= '</div></div><div id="gstDetRow_billingentity_edit"></div>
            		<div class="" style="margin-bottom: 20px !important;">
                            <div class="row">';

                    if($rowCount1!=0){

	                     $output .= '<div class="col-md-12 text-center">
	                               	<input type="hidden" id="totalGST_count" value="'.$rowCount1.'">
	                                  <span class="btn btn-primary add_gst_deatils" id="gst_deatils_edit" onclick="add_more_gst_details()"><span class="material-icons-outlined" style="font-size:16px;top:3px;">add</span> Add More</span> 
	                               </div>';

                    }
                    else {
                      $output .= '<div class="col-md-12 text-center">
                                  <input type="hidden" id="totalGST_count" value="1">
                                    <span class="btn btn-primary add_gst_deatils" id="gst_deatils_edit" onclick="add_more_gst_details()"><span class="material-icons-outlined" style="font-size:16px;top:3px;">add</span> Add More</span> 
                                 </div>';
                    }

                    $output .='</div>
                         </div>
                      </div>
                   </div>
                </div>
              </form>';

echo json_encode($output);
?>
