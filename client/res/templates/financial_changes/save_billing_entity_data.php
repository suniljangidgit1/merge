<?php
session_start();
error_reporting(~E_ALL);
  
$user_name = $_SESSION['Login'];
// $entity_id=$_SESSION['entityID'];
$entity_name=$_SESSION['name'];
date_default_timezone_set('asia/kolkata');

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
// echo '<pre>';print_r($_REQUEST);die;

function getToken($length)
{
	$token = "";
	$codeAlphabet = "abcdefghijklmnopqrstuvwxyz1234567890";
	$codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
	$codeAlphabet.= "0123456789";
	$max = strlen($codeAlphabet); // edited
	for ($i=0; $i < $length; $i++) {
		$token .= $codeAlphabet[crypto_rand_secure(0, $max-1)];
	}
	return $token;
}

function crypto_rand_secure($min, $max)
{
    $range = $max - $min;
    if ($range < 0) {
        return $min;
    }
    ## Not so random
    $log = log($range, 2);
    $bytes = (int) ($log / 8) + 1;
    ## Length in bytes
    $bits = (int) $log + 1;
    ## Length in bits
    $filter = (int) (1 << $bits) - 1;
    ## Set all lower bits to 1
    do {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter;
        ## Discard irrelevant bits
    } while ($rnd >= $range);
    return $min + $rnd;
}

$billing_entity_id=getToken(17);

$sql4="select * from user where user_name='$user_name'";
$result4=mysqli_query($conn,$sql4);
$row4=mysqli_fetch_assoc($result4);

$created_by_id=$row4['id'];

$name_of_entity=$_REQUEST['billing_entityname'];
$billing_entitywebsite=$_REQUEST['billing_entitywebsite'];
$billing_entityemail=$_REQUEST['billing_entityemail'];
$billing_entityphone=$_REQUEST['billing_entityphone'];

$address_street=$_REQUEST['billingEntityAddressStreet'];
$address_city=$_REQUEST['billingEntityAddressCity'];
$address_state=$_REQUEST['billingEntityAddressState'];
$address_postal_code=$_REQUEST['billingEntityAddressPostalCode'];

$billing_entityudyamno=$_REQUEST['billing_entityudyamno'];
$billing_entitypanno=strtoupper($_REQUEST['billing_entitypanno']);
$created_at=date("Y-m-d h:i:s ");
$modified_at=date("Y-m-d h:i:s ");
$sql_billing_entity="insert into billing_entity(id,name,website,emailid,phoneno,panno,udyam_registration_no,addressstreet,addresscity,addressstate,addresspostalcode,created_at,modified_at,created_by_id)values('$billing_entity_id','$name_of_entity','$billing_entitywebsite','$billing_entityemail','$billing_entityphone','$billing_entitypanno','$billing_entityudyamno', '$address_street','$address_city','$address_state','$address_postal_code','$created_at','$modified_at','$created_by_id')";
$result1=mysqli_query($conn,$sql_billing_entity);

$count_1 = (!empty(array_filter($_REQUEST['billingentity_bank_beneficiary']))) ? count($_REQUEST['billingentity_bank_beneficiary']) : 0;

if($count_1){
	for($i=0;$i<$count_1;$i++){
		if($_REQUEST['billingentity_bank_beneficiary'][$i]!=""){
			$beneficiary = $_REQUEST['billingentity_bank_beneficiary'][$i];
			$bank_name = $_REQUEST['billingentity_bank_name'][$i];
			$bank_ifsc = $_REQUEST['billingentity_bank_ifc'][$i];
			$bank_accountno = $_REQUEST['billingentity_bank_accountno'][$i];
			$bank_account_type = $_REQUEST['billingentity_bank_accounttype'][$i];
			$bank_upi = $_REQUEST['billingentity_bank_upi'][$i];

			$sql_billingentity_bank_details = "insert into billing_entity_bankdetails(billing_entity_id, beneficiary_name, bank_name, ifsc_code, account_no, account_type, upi_id)values('$billing_entity_id','$beneficiary','$bank_name','$bank_ifsc','$bank_accountno','$bank_account_type','$bank_upi')";
			$result_billingentity_bank_details=mysqli_query($conn,$sql_billingentity_bank_details);
		}
	}
}

$count_2 = (!empty(array_filter($_REQUEST['billingentity_gst']))) ? count($_REQUEST['billingentity_gst']) : 0;

if($count_2){
	for($k=0;$k<$count_2;$k++){
		if($_REQUEST['billingentity_gst'][$k]!=""){
			$gst_number = $_REQUEST['billingentity_gst'][$k];
			$gst_addres = $_REQUEST['billingEntityGSTAddressStreet'][$k];
			$gst_city = $_REQUEST['billingEntityGSTAddressCity'][$k];
			$gst_state = $_REQUEST['billingEntityGSTAddressState'][$k];
			$gst_postal_code = $_REQUEST['billingEntityGSTAddressPostalCode'][$k];

			$sql_billingentity_gst_details = "insert into billing_entity_gstdetails(billing_entity_id, gst_number, street, city, state, postal_code)values('$billing_entity_id','$gst_number','$gst_addres','$gst_city','$gst_state','$gst_postal_code')";
			$result_billingentity_gst_details=mysqli_query($conn,$sql_billingentity_gst_details);
		}
	}
}


if($result1)
{
  	echo "1";
}
else
{
	echo "0";
}

?>