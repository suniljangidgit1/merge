<?php
session_start();

error_reporting(~E_ALL);

$user_name = $_SESSION['Login'];
// $entity_id=$_SESSION['entityID'];
// $entity_name=$_SESSION['name'];
date_default_timezone_set('asia/kolkata');   


//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql4="select * from user where user_name='$user_name'";
$result4=mysqli_query($conn,$sql4);
$row4=mysqli_fetch_assoc($result4);
$user=$row4['user_name'];
$id = $_POST['recordId'];

$sql7="select * from billing_entity where id='$id'";
$result7=mysqli_query($conn,$sql7);
$row7=mysqli_fetch_assoc($result7);
$billing_entity_id=$row7['billing_entity_id'];

$modified_by_id=$row4['id'];
$is_admin=$row4['is_admin'];

$name_of_entity=$_REQUEST['billing_entityname'];
$billing_entitywebsite=$_REQUEST['billing_entitywebsite'];
$billing_entityemail=$_REQUEST['billing_entityemail'];
$billing_entityphone=$_REQUEST['billing_entityphone'];

$address_street=$_REQUEST['billingEntityAddressStreet'];
$address_city=$_REQUEST['billingEntityAddressCity'];
$address_state=$_REQUEST['billingEntityAddressState'];
$address_postal_code=$_REQUEST['billingEntityAddressPostalCode'];

$billing_entityudyamno=$_REQUEST['billing_entityudyamno'];
$billing_entitypanno=$_REQUEST['billing_entitypanno'];

$modified_at=date("Y-m-d h:i:s ");

$sql6="select * from billing_entity_bankdetails where billing_entity_id='$id'";
$result6=mysqli_query($conn,$sql6);
//echo '<pre>';print_r($row6);echo '</pre>';
$added_bankdetails=0;
while ($row6=mysqli_fetch_assoc($result6)) {
    $added_bankdetails++;
}
//echo '<br/>'.$added_bankdetails;die;
// echo '<pre>';print_r($_POST);die;
$sql_billing_entity="update billing_entity set name='$name_of_entity',website='$billing_entitywebsite',emailid='$billing_entityemail',phoneno='$billing_entityphone',panno='$billing_entitypanno',udyam_registration_no='$billing_entityudyamno',addressstreet='$address_street',addresscity='$address_city',addressstate='$address_state' ,addresspostalcode='$address_postal_code',modified_at= '$modified_at' where id='$id' ";
$result1=mysqli_query($conn,$sql_billing_entity);

$len = (!empty(array_filter($_REQUEST['billingentity_bank_beneficiary']))) ? count($_REQUEST['billingentity_bank_beneficiary']) : 0;
$bankdetails_id=$_REQUEST['billing_entity_bankdetails_id'];

$sql2="select * from billing_entity_bankdetails where billing_entity_id='".$id."' and deleted = 0";
$result2=mysqli_query($conn,$sql2);
$rowCount=mysqli_num_rows($result2);
if($rowCount){
	$sql_bank_delete = "delete from billing_entity_bankdetails where billing_entity_id='".$id."' and deleted ='0' ";
	$result_billingentity_bank_details_del=mysqli_query($conn,$sql_bank_delete);
}

for ($i=0; $i < $len; $i++) {

	$beneficiary = $_REQUEST['billingentity_bank_beneficiary'][$i];
	$bank_name = $_REQUEST['billingentity_bank_name'][$i];
	$bank_ifsc = $_REQUEST['billingentity_bank_ifc'][$i];
	$bank_accountno = $_REQUEST['billingentity_bank_accountno'][$i];
	$bank_account_type = $_REQUEST['billingentity_bank_accounttype'][$i];
	$bank_upi = $_REQUEST['billingentity_bank_upi'][$i];
	//echo $added_bankdetails.' === '.$i.'<br/>';
	//if($added_bankdetails <= $i)
	//{
		// if($beneficiary!=""){
			$sql_billingentity_bank_details = "insert into billing_entity_bankdetails(billing_entity_id, beneficiary_name, bank_name, ifsc_code, account_no, account_type, upi_id)values('$id','$beneficiary','$bank_name','$bank_ifsc','$bank_accountno','$bank_account_type','$bank_upi')";
			$result_billingentity_bank_details=mysqli_query($conn,$sql_billingentity_bank_details);
		// }
    /*}
    else
    {
    	if($bankdetails_id[$i]){
	    	$sql_billingentity_bank_details = "update billing_entity_bankdetails set beneficiary_name='$beneficiary', bank_name='$bank_name', ifsc_code='$bank_ifsc', account_no='$bank_accountno', account_type='$bank_account_type', upi_id='$bank_upi' where id = '$bankdetails_id[$i]'";
	    	$result_billingentity_bank_details=mysqli_query($conn,$sql_billingentity_bank_details);
    	}
    	else {
    		$sql_billingentity_bank_details = "update billing_entity_bankdetails set deleted='1' where billing_entity_id = '$id'";
	    	$result_billingentity_bank_details=mysqli_query($conn,$sql_billingentity_bank_details);
    	}
    }*/
}


$sql6="select * from billing_entity_gstdetails where billing_entity_id='$id'";
$result6=mysqli_query($conn,$sql6);
$added_gstdetails=0;
while ($row6=mysqli_fetch_assoc($result6)) {
    $added_gstdetails++;
}

//echo '<pre>';print_r($_POST);echo '</pre>';die;
$len1 = (!empty(array_filter($_REQUEST['billingentity_gst']))) ? count($_REQUEST['billingentity_gst']) : 0;
$gstdetails_id=$_REQUEST['billing_entity_gstdetails_id'];

$sql3="select * from billing_entity_gstdetails where billing_entity_id='".$id."' and deleted = 0";
$result3=mysqli_query($conn,$sql3);
$rowCount1=mysqli_num_rows($result3);
if($rowCount1){
	$sql_gst_delete = "delete from billing_entity_gstdetails where billing_entity_id='".$id."' and deleted ='0' ";
	$result_billingentity_gst_details_del=mysqli_query($conn,$sql_gst_delete);
}

for ($k=0; $k < $len1; $k++) {

	$gst_number = $_REQUEST['billingentity_gst'][$k];
	$gst_addres = $_REQUEST['billingEntityGSTAddressStreet'][$k];
	$gst_city = $_REQUEST['billingEntityGSTAddressCity'][$k];
	$gst_state = $_REQUEST['billingEntityGSTAddressState'][$k];
	$gst_postal_code = $_REQUEST['billingEntityGSTAddressPostalCode'][$k];

	//if($added_gstdetails <= $k)
	//{
		// if($gst_number!=""){
			$sql_billingentity_gst_details = "insert into billing_entity_gstdetails(billing_entity_id, gst_number, street, city, state, postal_code)values('$id','$gst_number','$gst_addres','$gst_city','$gst_state','$gst_postal_code')";
			$result_billingentity_gst_details=mysqli_query($conn,$sql_billingentity_gst_details);
		// }
    /*}
    else
    {
    	if($gstdetails_id[$k]){
	    	$sql_billingentity_gst_details = "update billing_entity_gstdetails set gst_number='$gst_number', street='$gst_addres', city='$gst_city', state='$gst_state', postal_code='$gst_postal_code' where id = '$gstdetails_id[$k]'";
	    	$result_billingentity_gst_details=mysqli_query($conn,$sql_billingentity_gst_details);
    	}
    	else {
    		$sql_billingentity_gst_details = "update billing_entity_gstdetails set deleted='1' where billing_entity_id = '$id'";
	    	$result_billingentity_gst_details=mysqli_query($conn,$sql_billingentity_gst_details);
    	}
    }*/
}

echo "1";
?>