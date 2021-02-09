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
			<form  method="post" id="updateBillingEntityForm" enctype="multipart/form-data">
				<div class="container">
					<div class="row">
                       <div class="col-md-12">
                          <div class="btn-group">
                             <button type="submit" id="update_billingentityBTN" class="btn btn-primary">Update</button>
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
                    	<div class="col-md-6">
	                        <div class="form-group">
	                          <label >Name<span class="text-danger">*</span></label>
	                          <input type="text" value="'.$row1['name'].'" name="billing_entityname" id="" class="form-control" placeholder="Name of entity" required>
	                        </div>
	                    </div>
	                    <div class="col-md-6">
							<div class="form-group">
								<label >Website</label>
								<input type="text" value="'.$row1['website'].'" name="billing_entitywebsite" id="" class="form-control" placeholder="Website">
							</div>
	                    </div>
                    </div>
                    <div class="row">
	                    <div class="col-md-6">
	                      	<div class="form-group">
	                        	<label >Email</label>
	                        	<input type="email" value="'.$row1['emailid'].'" name="billing_entityemail" id="" class="form-control" placeholder="Email id">
	                      	</div>
	                    </div>
	                    <div class="col-md-6">
	                      	<div class="form-group">
	                        	<label >Phone</label>
	                        	<input type="text" value="'.$row1['phoneno'].'" name="billing_entityphone" id="" class="form-control" minlength="10"  maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Phone">
	                      	</div>
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="cell col-sm-6 form-group" data-name="billingEntityAddress">
	                    	<label class="control-label" data-name="billingEntityAddress"><span class="label-text">Address</span></label>
	                    	<textarea class="form-control auto-height" name="billingEntityAddressStreet" data-name="billingEntityAddressStreet" rows="1" placeholder="Street" autocomplete="espo-street" maxlength="255">'.$row1['addressstreet'].'</textarea>
                        	<div class="row">
                        		<div class="col-sm-4 col-xs-4">
	                            	<input type="text" class="form-control" name="billingEntityAddressCity" data-name="billingEntityAddressCity" value="'.$row1['addresscity'].'" placeholder="City" autocomplete="espo-city" maxlength="255">
	                            </div>
	                            <div class="col-sm-4 col-xs-4">
	                            	<input type="text" class="form-control" name="billingEntityAddressState" data-name="billingEntityAddressState" value="'.$row1['addressstate'].'" placeholder="State" autocomplete="espo-state" maxlength="255">
	                            </div>
	                            <div class="col-sm-4 col-xs-4">
	                            	<input type="text" class="form-control" name="billingEntityAddressPostalCode" data-name="billingEntityAddressPostalCode" value="'.$row1['addresspostalcode'].'" placeholder="Postal Code" autocomplete="espo-postalCode" minlength="6" maxlength="6" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
	                            </div>
                        	</div> 	
	                    </div>
	                    <div class="col-md-6">
	                      	<div class="form-group">
	                        	<label >Udyam registration no</label>
	                        	<input type="text" value="'.$row1['udyam_registration_no'].'" name="billing_entityudyamno" id="" class="form-control" placeholder="Udyam registration number">
	                      	</div>
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="col-md-6">
	                      <div class="form-group">
	                        <label >PAN No<span class="text-danger">*</span></label>
	                        <input type="text" value="'.$row1['panno'].'" name="billing_entitypanno" id="" class="form-control billing_entitypanno" placeholder="PAN NO" style="text-transform:uppercase" required>
	                      </div>
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="" style="border-bottom: 1px solid #e5e5e5; margin-bottom: 5px;">
	                          <h4>Bank details</h4>
	                        </div>
	                    </div>
	                </div>';

	                $sql2="select * from billing_entity_bankdetails where billing_entity_id='".$id."'";
                   	$result2=mysqli_query($conn,$sql2);
                   	$rowCount=mysqli_num_rows($result2);
                   	$count=0;
                   	$count_1=1;
                   	while($row2=mysqli_fetch_assoc($result2))
                    {
                    	$output .= '<div id="edit_billingentity_bankdetails'.$count.'" class="editbankdetails">
					                    <div class="col-md-12">
					                      <div class="row">
					                        <div class="col-md-6">
					                          <div class="form-group">
					                            <label>Bank account <span class="billentlabelincr">'.$count_1.'</span></label>
					                          </div>
					                        </div>
					                      </div>
					                      <div class="row">
					                        <div class="col-md-6">
					                          <div class="form-group">
					                          	<input type="hidden" value="'.$row2["id"].'" name="billing_entity_bankdetails_id[]">
					                            <input type="text" value="'.$row2["beneficiary_name"].'" name="billingentity_bank_beneficiary[]" data-id="'.$count.'" id="edit_billingentity_bank_beneficiary'.$count.'" class="form-control bkDetails" placeholder="Beneficiary name" maxlength="56" onblur="checkBankValidation('.$count.')">
					                          </div>
					                        </div>
					                        <div class="col-md-6">
					                          <div class="form-group">
					                            <input type="text" value="'.$row2["bank_name"].'" name="billingentity_bank_name[]" data-id="'.$count.'" id="edit_billingentity_bank_name'.$count.'" class="form-control bkDetails" placeholder="Bank name" maxlength="56" onblur="checkBankValidation('.$count.')">
					                          </div>
					                        </div>
					                      </div>
					                      <div class="row">
					                        <div class="col-md-6">
					                          <div class="form-group">
					                            <input type="text" value="'.$row2["ifsc_code"].'" name="billingentity_bank_ifc[]" id="edit_billingentity_bank_ifc'.$count.'" class="form-control bkDetails" placeholder="IFSC Code" maxlength="56" onblur="checkBankValidation('.$count.')">
					                          </div>
					                        </div>
					                        <div class="col-md-6">
					                          <div class="form-group">
					                            <input type="text" value="'.$row2["account_no"].'" name="billingentity_bank_accountno[]" data-id="'.$count.'" id="edit_billingentity_bank_accountno'.$count.'" class="form-control bkDetails" placeholder="Account no" maxlength="56" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onblur="checkBankValidation('.$count.')">
					                          </div>
					                        </div>
					                      </div>
					                      <div class="row">
					                        <div class="col-md-6">
					                          <div class="form-group">
					                            <select name="billingentity_bank_accounttype[]" data-id="'.$count.'" id="edit_billingentity_bank_accounttype'.$count.'" class="form-control bkDetails" placeholder="Account type" onchange="checkBankValidation('.$count.')">';

					                            $savings = (trim($row2["account_type"]) == 'Savings') ? 'selected="selected"' : '';
					                            $current = (trim($row2["account_type"]) == 'Current') ? 'selected="selected"' : '';
					                            $cashcredit = (trim($row2["account_type"]) == 'Cash Credit') ? 'selected="selected"' : '';
					                            $overdraft = (trim($row2["account_type"]) == 'Overdraft') ? 'selected="selected"' : '';

					                            $output .= '<option value="">Select Account Type</option>
					                               <option value="Savings" '.$savings.'>Savings</option>
					                               <option value="Current" '.$current.'>Current</option>
					                               <option value="Cash Credit" '.$cashcredit.'>Cash Credit</option>
					                               <option value="Overdraft" '.$overdraft.'>Overdraft</option>
					                            </select>
					                          </div>
					                        </div>
					                        <div class="col-md-6">
					                          <div class="form-group">
					                            <input type="text" value="'.$row2["upi_id"].'" name="billingentity_bank_upi[]" id="" class="form-control" placeholder="UPI ID" maxlength="56">
					                          </div>
					                        </div>
					                      </div>
					                      <div class="row">
		                                     <div class="col-md-12">
		                                        <a class="btn btn-primary btnUpdate3_billingentity" data-db-id="'. $row2["id"].'" data-id="'.$count.'" data-update-id="1'.$count.'" id="remove_field3'. $count.'" style="margin-bottom:10px;">Remove bank details</a>
		                                     </div>
		                                  </div>
					                    </div>
					                </div>';
					    $count++;
					    $count_1++;
                    }

			$output .= '<div id="bankDetRow_billingentity_edit"></div>
	                  	<div class="row">
	                    	<div class="col-md-12">
	                    		<input type="hidden" id="totalBank_count" value="'.$rowCount.'">
	                        	<a  href="javascript:void(0)" class="btn btn-success" id="Add_billingentitybankdetails_edit">Add more bank details</a>
	                     	</div>
	                  	</div>
	                  	<div class="row">
		                    <div class="col-md-12">
		                        <div class="" style="border-bottom: 1px solid #e5e5e5; margin-bottom: 5px;">
		                          <h4>GST details</h4>
		                        </div>
		                    </div>
		                </div>';

		    $sql3="select * from billing_entity_gstdetails where billing_entity_id='".$id."'";
           	$result3=mysqli_query($conn,$sql3);
           	$rowCount1=mysqli_num_rows($result3);
           	$count=0;
           	$count_1=1;
           	while($row3=mysqli_fetch_assoc($result3))
            {
            	$output .= '<div id="edit_billingentity_gstdetails'.$count.'">
			                    <div class="col-md-12">
			                      <div class="row">
			                        <div class="col-md-6">
			                          <div class="form-group">
			                            <label >GST '.$count_1.'</label>
			                            <input type="hidden" value="'.$row3["id"].'" name="billing_entity_gstdetails_id[]">
			                            <input type="text" value="'.$row3['gst_number'].'" name="billingentity_gst[]" data-id="'.$count.'" id="billingentity_gst'.$count.'" class="form-control gstDet" placeholder="GST NO" maxlength="56" onblur="getGST_state(this.value, '.$count.')">
			                          </div>
			                        </div>
			                        <div class="cell col-sm-6 form-group" data-name="billingEntityGSTAddress">
			                          <label class="control-label" data-name="billingEntityGSTAddress"><span class="label-text">Address '.$count_1.'</span></label>
			                          <div class="field" data-name="billingEntityGSTAddress">
			                            <textarea class="form-control auto-height" data-id="billingEntityGSTAddressStreet'.$count.'" data-name="billingEntityGSTAddressStreet'.$count.'" name="billingEntityGSTAddressStreet[]" rows="1" placeholder="Street" autocomplete="espo-street" maxlength="255">'.$row3['street'].'</textarea>
			                            <div class="row">
			                                <div class="col-sm-4 col-xs-4">
			                                    <input type="text" class="form-control" data-id="edit_billingEntityGSTAddressCity'.$count.'" data-name="billingEntityGSTAddressCity[]" name="billingEntityGSTAddressCity[]" value="'.$row3['city'].'" placeholder="City" autocomplete="espo-city" maxlength="255">
			                                </div>
			                                <div class="col-sm-4 col-xs-4">
			                                    <input type="text" class="form-control" id="edit_gst_state'.$count.'" data-id="edit_billingEntityGSTAddressState'.$count.'" data-name="billingEntityGSTAddressState[]" name="billingEntityGSTAddressState[]" value="'.$row3['state'].'" placeholder="State" autocomplete="espo-state" maxlength="255">
			                                </div>
			                                <div class="col-sm-4 col-xs-4">
			                                    <input type="text" class="form-control" data-id="edit_billingEntityGSTAddressPostalCode'.$count.'" data-name="billingEntityGSTAddressPostalCode[]" name="billingEntityGSTAddressPostalCode[]" value="'.$row3['postal_code'].'" placeholder="Postal Code" autocomplete="espo-postalCode" minlength="6" maxlength="6" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
			                                </div>
			                            </div>
			                          </div>
			                        </div>
			                        <div class="row">
	                                     <div class="col-md-12">
	                                        <a class="btn btn-primary btnUpdate4_billingentity" data-db-id="'. $row3["id"].'" data-id="'.$count.'" data-update-id="1'.$count.'" id="remove_field3'. $count.'" style="margin-bottom:10px;">Remove GST details</a>
	                                     </div>
	                                  </div>
			                      </div>
			                    </div>
			                  </div>';
			    $count++;
			    $count_1++;
            }
                    

            $output .= '<div id="gstDetRow_billingentity_edit"></div>
	                  <div class="row">
	                    <div class="col-md-12">
	                    	<input type="hidden" id="totalGST_count" value="'.$rowCount1.'">
	                        <a href="javascript:void(0)" class="btn btn-success" id="Add_billingentitygst_edit">Add more</a>
	                     </div>
	                  </div>
                  </div>
				</form>';

echo json_encode($output);
?>