<?php
session_start();
error_reporting(~E_ALL);
$user_name = $_SESSION['Login'];
$entity_id=$_SESSION['entityID'];
$entity_name=$_SESSION['name'];

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

$account_id=$_GET['account_id'];

$sql1="select * from account_gst_details where account_id='$account_id' and deleted = '0'";
$result1=mysqli_query($conn,$sql1);
$rowCount=mysqli_num_rows($result1);
if($rowCount)
{
	$output = '<div id="last_child_panel_edit" class="panel panel-default">
	<div class="panel-heading"><h4 class="panel-title">GST Details</h4></div>
	<div class="panel-body panel-body-form" id="numofgst_edit"><input type="hidden" id="totalGSTCnt" value="'.$rowCount.'" /><input type="hidden" id="totalGSTCntChanged" value="'.$rowCount.'" /><input type="hidden" data-name="staticValChanged" id="totalRec_new" value="'.$rowCount.'" /><input type="hidden" id="changedHaveGST" value="Yes"><input type="hidden" data-name="staticValChanged" id="rec_present" value="1" /><input type="hidden" data-name="staticValChanged" id="totalRec" value="'.$rowCount.'" />
		<div class="row" id="gst_no_edit"></div>';
	$cnt = 0;
	$cnt1 = 1;				
	while($row1=mysqli_fetch_assoc($result1))
	{
		$output .= '<div class="row gst" id="gst_'.$cnt.'_edit">
			<div class="cell col-sm-6 form-group" data-name="gstnoedit'.$cnt.'">
				<label class="control-label" data-name="gstnoedit'.$cnt.'">GST NO '.$cnt1.'</label>
				<div class="field" data-name="gstno0">
					<input type="hidden" class="main-element form-control acc_gst" id="gstnoedit_id'.$cnt.'" name="gstno_edit_id[]" data-name="gstnoedit'.$cnt.'" value="'.$row1['id'].'"autocomplete="espo-gstnoedit'.$cnt.'">
					<input type="text" class="main-element form-control acc_gst" id="gstnoedit'.$cnt.'" name="gstno_edit[]" data-name="gstnoedit'.$cnt.'" value="'.$row1['acc_gst_no'].'" maxlength="40" autocomplete="espo-gstnoedit'.$cnt.'" onblur="acc_getGST_state_edit(this.value, '.$cnt.')">
					<div class="row">
						<div class="col-sm-4 col-xs-4">
							<button type="button" class="btn btn-danger" onclick="acc_editremoveGST_edit('.$cnt.')">
								<span class="fas fa-trash-alt fa-sm"></span>
							</button>
						</div>
					</div>
				</div>
			</div>
			<div class="cell col-sm-6 form-group" data-name="acc_gstAddressEdit'.$cnt.'">
				<label class="control-label" data-name="acc_gstAddressEdit'.$cnt.'">
					<span class="label-text">Address '.$cnt1.'</span>
				</label>
				<div class="field" data-name="acc_gstAddressEdit'.$cnt.'">
					<textarea class="form-control auto-height" data-name="acc_gstAddressStreetEdit'.$cnt.'" id="acc_gstAddressStreetEdit'.$cnt.'" name="acc_gstAddressStreet_edit[]" rows="1" placeholder="Street" autocomplete="espo-acc_gststreetedit'.$cnt.'" maxlength="255">'.$row1['acc_gst_street'].'</textarea>
					<div class="row">
						<div class="col-sm-4 col-xs-4">
							<input type="text" class="form-control" id="acc_gstcityedit'.$cnt.'" data-name="acc_gstAddressCityEdit'.$cnt.'" name="acc_gstAddressCity_edit[]" value="'.$row1['acc_gst_city'].'" placeholder="City" autocomplete="espo-acc_gstcityedit'.$cnt.'" maxlength="255">
						</div>
						<div class="col-sm-4 col-xs-4">
							<input type="text" class="form-control" id="acc_gststateedit'.$cnt.'" name="acc_gstAddressState_edit[]" data-name="acc_gstAddressStateEdit'.$cnt.'" value="'.$row1['acc_gst_state'].'" placeholder="State" autocomplete="espo-acc_gststateedit'.$cnt.'" maxlength="255">
						</div>
						<div class="col-sm-4 col-xs-4">
							<input type="text" class="form-control" id="acc_gstpostalcodeedit'.$cnt.'" name="acc_gstAddressPostalCode_edit[]" data-name="acc_gstAddressPostalCodeEdit'.$cnt.'" value="'.$row1['acc_gst_postalcode'].'" placeholder="Postal Code" autocomplete="espo-acc_gstpostalCodeEdit'.$cnt.'" minlength="6" maxlength="6" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57">
						</div>
					</div>
				</div>
			</div>
		</div>';
		$cnt++;
		$cnt1++;
	}
	$output .= '</div></div>';

	echo json_encode($output);
}
else {
	echo '0';
}

?>